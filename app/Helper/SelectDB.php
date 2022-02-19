<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('selectWithParam')) {
    function selectWithParam($query)
    {
        return DB::select($query);
    }
}

if (!function_exists('editWithParam')) {
    function editWithParam($query, $where)
    {
        return DB::update($query, $where);
    }
}
