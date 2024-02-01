<?php
    function randomNum($length) {
        $result = '';
        for($i = 0; $i<$length; $i++) {
            $result = $result.rand(1,9);
        }
        return $result;
    }
?>