<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahp{
    private $dataset;
    private $criterion_matrix;
    private $criterion_matrix_norm;
    
    public $criterion_weight;
    private $eigen_max;

    public function __construct($dataset)
    {
        $this->dataset = array();
        foreach ($dataset as $key => $value) {
            $this->dataset[$value->id]["datediff"] = $value->datediff;
            $this->dataset[$value->id]["duty"] = $value->duty;
            $this->dataset[$value->id]["urgency"] = $value->urgency;
        }
        
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
                $this->criterion_matrix_norm[$i][$j] = $this->criterion_matrix[$i][$j] / $normalizator_sum[$j]; 
            }
        }
    }
    
    public function build_criterion_weight()
    {
        for ($i=0; $i < count($this->criterion_matrix_norm); $i++) { 
            $this->criterion_weight[$i] = array_sum($this->criterion_matrix_norm[$i]) / count($this->criterion_matrix_norm[$i]);
        }
    }

    public function get_ranked_data()
    {
        $ranked_coeff = [];
        foreach ($this->dataset as $row_key => $row) {
            $sum = 0;
            $i = 0;
            foreach ($row as $col_key => $value) { 
                $sum += ($value * $this->criterion_weight[$i]);
                $i++;
            }
            $ranked_coeff[$row_key] = $sum;
        }
        return $ranked_coeff;
    }

    public function calculate_eigen_max()
    {
        $ax;
        for ($i=0; $i < count($this->criterion_matrix); $i++) { 
            $sum = 0;
            for ($j=0; $j < count($this->criterion_weight); $j++) { 
                $sum += ($this->criterion_matrix[$i][$j] * $this->criterion_weight[$j]);
            }
            $ax[$i] = $sum;
        }
        $lambda;
        for ($i=0; $i < count($this->criterion_weight); $i++) { 
            $lambda[$i] = $ax[$i] / $this->criterion_weight[$i];
        }
        $this->eigen_max = array_sum($lambda) / count($lambda);
    }

    public function AHPconsistency()
    {
        $CI = ($this->eigen_max - 3) / (3-1);
        $CR = $CI / 0.58;

        $consitency = ($CR < 0.1) ? "Matriks bobot konsisten" : "Matriks bobot tidak konsisten";

        $string = "CR:" . $CR . ". " . $consitency;
        return $string;

    }

    function transpose($array) {
        array_unshift($array, null);
        return call_user_func_array('array_map', $array);
    }

    
}