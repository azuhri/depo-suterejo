<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function homeView() {
        return view("app.landingpage.home");
    }

    public function aboutusView() {
        return view("app.landingpage.aboutus");
    }

    public function servicesView() {
        return view("app.landingpage.services");
    }
}
