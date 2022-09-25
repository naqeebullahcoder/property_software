<?php

namespace App\Http\Controllers\Admin;

use App\Project;

class HomeController
{
    public function index()
    {
        $projects= Project::all();
        return view('home',compact('projects'));

    }

}
