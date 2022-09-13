<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CalculateDataJob;

class TestController extends Controller
{
    public function testFunction()
    {
        CalculateDataJob::dispatch();
    } 
}
