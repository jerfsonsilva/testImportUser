<?php

namespace App\Http\Controllers\util;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetFiletoArrayController extends Controller
{
    public static function JsonToArray($pathFile)
    {
        try {
            if(!file_exists($pathFile)) throw new \Exception("File does not exist", 1);

            $listArray = json_decode(file_get_contents($pathFile), true);

            if($listArray !== null ) return $listArray;
            else throw new \Exception("File invalid", 1);

        } catch (\Throwable $th) {
            return [];
        }
    }
    public static function CSVtoArray()
    {
       #TODO
       return [];
    }
    public static function XMLtoArray()
    {
       #TODO
       return [];
    }
}
