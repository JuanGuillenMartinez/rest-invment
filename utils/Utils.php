<?php
class Utils {
    public static function parametersAreEmpty($array) {
        $empty = true;
        $i = 0;
        $length = count($array);
        while($i < $length) {
            if(isset($array[$i]) and !empty($array[$i])) {
                $empty = false;
                $i++;
            } else {
                $empty = true;
                $i = $length;
            }
        }
        return $empty;
    }
}