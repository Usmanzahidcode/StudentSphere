<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index(){
        return view('pages.project.opportunities_listing');
    }
}
