<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahp{
    private $dataset;
    private $criterion_matrix;
    public $criterion_weight;

    public function __construct($dataset)
    {
        $this->dataset = array();
        foreach ($dataset as $key => $value) {
            $this->dataset[$value->id]["datediff"] = $value->datediff;
            $this->dataset[$value->id]["duty"] = $value->duty;
            $this->dataset[$value->id]["urgency"] = $value->urgency;
        }
        var_dump($this->dataset);
        echo("<br><br>");
        
    }
    

    public function init_criterion($datediff_urgency, $datediff_duty, $duty_urgency)
    {
        $urgency_datediff = 1 / $datediff_urgency;
        $duty_datediff = 1 / $datediff_duty;
        $urgency_duty = 1 / $duty_urgency;
        $this->criterion_matrix = [
            [1, $datediff_urgency, $datediff_duty],
            [$urgency_datediff, 1, $urgency_duty],
            [$duty_datediff, $duty_urgency, 1]
        ];

        var_dump($this->criterion_matrix);
        echo("<br>");
        echo("<br>");
        

    }

    public function normalize_criterion()
    {
        $normalizator_sum = [];
        foreach ($this->transpose($this->criterion_matrix) as $key => $row) {
            $sum = 0;
            foreach ($row as $value) {
                $sum += $value;
            }
            array_push($normalizator_sum, $sum);
        }
        for ($i=0; $i < count($this->criterion_matrix); $i++) { 
            for ($j=0; $j < count($this->criterion_matrix[0]); $j++) { 
                $this->criterion_matrix[$i][$j] /= $normalizator_sum[$j]; 
            }
        }
        var_dump($this->criterion_matrix);
        echo("<br>");
        echo("<br>");

    }
    
    public function build_criterion_weight()
    {
        $this->criterion_weight = [];
        for ($i=0; $i < count($this->criterion_matrix); $i++) { 
            $this->criterion_weight[$i] = array_sum($this->criterion_matrix[$i]) / count($this->criterion_matrix[$i]);
        }
        var_dump($this->criterion_weight);
        echo("<br>");
        echo("<br>");
    }

    public function get_ranked_data()
    {
        $ranked_coeff = [];
        foreach ($this->dataset as $row_key => $row) {
            $sum = 0;
            $i = 0;
            foreach ($row as $col_key => $value) { 
                $sum += $value * $this->criterion_weight[$i];
                $i++;
            }
            $ranked_coeff[$row_key] = $sum;
        }
        return $ranked_coeff;
    }

    function transpose($array) {
        array_unshift($array, null);
        return call_user_func_array('array_map', $array);
    }

    
}