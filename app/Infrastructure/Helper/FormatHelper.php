<?php
if (!function_exists('dateFormat')) {
    function dateFormat($date)
    {
        return date('Y-m-d', strtotime($date));
    }
}
if (!function_exists('timeFormat')) {
    function timeFormat($date)
    {
        return date('H:i', strtotime($date));
    }
}
