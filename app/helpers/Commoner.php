<?php

class Commoner{

    static function debug(){
        static $count = 0;
        $args = func_get_args();

        if (!empty($args)) {
            echo '<ol style="font-family: Courier; font-size: 12px; border: 1px solid #dedede; background-color: #efefef; float: left; padding-right: 20px;">';
            foreach ($args as $k => $v) {
                $v = htmlspecialchars(print_r($v, true));
                if ($v == '') {
                    $v = '    ';
                }

                echo '<li><pre>' . $v . "\n" . '</pre></li>';
            }
            echo '</ol><div style="clear:left;"></div>';
        }
        $count++;
    }
}