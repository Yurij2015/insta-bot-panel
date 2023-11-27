<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class InstSearchResultController extends Controller
{
    public function index(){
        return view('inst-search-result.index');
    }
}
