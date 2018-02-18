<?php

if (!function_exists('menu_ul')) {

    function menu_ul($config) {
        $menu = '<ul class="main_nav">' . "\n";
        foreach ($config as $k => $v) {
            $menu .= '<li><a href="' . $k . '">' . $v . '</a></li>' . "\n";
        }
        $menu .= '</ul>' . "\n";
        return $menu;
    }
}
?>