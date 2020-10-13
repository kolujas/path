<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function __construct(){
    //     ini_set('max_execution_time', 300);
    // }

    /**
     * * Replace a string with another.
     * @param mixed $string
     * @param mixed $regexp
     * @param mixed $newString
     * @return [type]
     */
    public function replaceString($string, $regexp, $newString){
        return preg_replace("/$regexp/", $newString, $string);
    }
}
