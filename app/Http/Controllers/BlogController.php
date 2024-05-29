<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogPage() {
        return view("app.admin.blog");
    }

    public function blogCreatePage() {
        return view("app.admin.create-blog");
    }
}
