<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('selectWithParam')) {
    function selectWithParam($query)
    {
        return DB::select($query);
    }
}
