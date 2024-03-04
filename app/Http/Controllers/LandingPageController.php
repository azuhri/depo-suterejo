<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function homeView() {
        return view("app.landingpage.home");
        // return view("app.template.master_landingpage");
    }
}
