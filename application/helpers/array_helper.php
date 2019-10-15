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
?>