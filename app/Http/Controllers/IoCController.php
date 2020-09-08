<?php

namespace App\Http\Controllers;


use App\Classes\IoCClass;

class IoCController extends Controller
{
    public function index(IoCClass $class)
    {
        $class->sth();
    }

}
