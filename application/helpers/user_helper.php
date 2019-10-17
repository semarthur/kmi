<?php
    function sort_by_id($array_of_objects, $rank_of_ids){
        $sorted = array();  
        arsort($rank_of_ids);

        foreach ($rank_of_ids as $key => $value) {
            $idx = array_search($key, array_column($array_of_objects, 'id'));
            array_push($sorted, $array_of_objects[$idx]);
        }

        return $sorted;
    }

    function changeValueCriterion($val) {

        if ($val == 8) {
            return 1;
        }else if ($val > 8) {
            return 1 / ($val - 7);
        }else{
            return abs ($val - 9);
        }
  }
?>