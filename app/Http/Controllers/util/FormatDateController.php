<?php

namespace App\Http\Controllers\util;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormatDateController extends Controller
{
    public static function formatDate($date)
    {
        $date = str_replace('/','-',$date);
        return date("Y-m-d", strtotime($date));
    }
}
