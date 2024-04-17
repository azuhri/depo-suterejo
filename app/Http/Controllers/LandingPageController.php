<?php

namespace App\Http\Controllers;

use App\Http\Services\TrashCategoryService;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public TrashCategoryService $trashCategory;

    public function __construct(
        TrashCategoryService $trashCategory
    )
    {
        $this->trashCategory = $trashCategory;
    }
    
    public function homeView() {
        return view("app.landingpage.home");
    }

    public function aboutusView() {
        return view("app.landingpage.aboutus");
    }

    public function servicesView() {
        return view("app.landingpage.services");
    }

    public function servicesOptionIndex() {
        $sessionTrash = \session("trashes");
        if ($sessionTrash) {
            return \redirect()->route("account.services.next.index");
        }
        $trashCategory = $this->trashCategory->getAllTrashCategory();
        return view("app.landingpage.services-option", [
            "trashCategory" => $trashCategory,
        ]);
    }
}
