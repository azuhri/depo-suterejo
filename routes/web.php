<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataTransaction;
use App\Http\Controllers\DataTrashController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return redirect()->route("landing.home");
});

Route::prefix("landing-page")->name("landing.")->group(function () {
    Route::controller(LandingPageController::class)->group(function () {
        Route::get("home", "homeView")->name("home");
        Route::get("about-us", "aboutusView")->name("aboutus");
        Route::get("services", "servicesView")->name("services");
        Route::get("blog", "blogView")->name("blog");
    });
});

Route::prefix("auth")->name("auth.")->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get("login", "viewLogin")->name("login");
        Route::post("login", "login")->name("login.post");

        Route::get("register", "viewRegister")->name("register");
        Route::post("register", "register")->name("register.post");
    });
});

Route::group(["middleware" => "auth"], function () {
    Route::prefix("account")->name("account.")->group(function () {
        Route::get("services/option", [LandingPageController::class, "servicesOptionIndex"])->name("services.option");
        Route::controller(DashboardController::class)->group(function () {
            Route::view("profile","app.landingpage.profile")->name("profile");
            Route::post("profile", "updateProfile")->name("profile.update");
            Route::post("change-password", "changePassword")->name("change-password");
            Route::post("services", "submitDataRequestService")->name("services.post");
            Route::get("services/next-step", "serviceNextStepIndex")->name("services.next.index");
            Route::post("services/next-step", "paymentService")->name("services.next.submit");
            Route::post("/logout", "logout")->name("logout");
            Route::get("transaction-succeed", "transactionSuccedIndex")->name("transaction.succeed.index");
            Route::prefix("list-transaction")->name("transaction.list.")->group(function () {
                Route::get("/", "transactionListIndex")->name("index");
                Route::get("/get-data", "getDataListTransaction")->name("json");
            });
        });

        Route::prefix("address")
            ->name("address.")
            ->controller(AddressController::class)
            ->group(function () {
                Route::post("/", "createOrUpdateAddress")->name("create");
                Route::delete("/", "deleteAddress")->name("delete");
                Route::post("select-address", "selectAddress")->name("select");
            });
    });
});


Route::prefix("admin")->name("admin.")->group(function () {
    Route::get("login", [AuthController::class, "loginAdminView"])->name("login.view");
    Route::post("login", [AuthController::class, "loginAdmin"])->name("login.post");
    Route::middleware("admin")->group(function () {
        Route::prefix("dashboard")->name("dashboard.")->group(function () {
            Route::controller(DashboardAdminController::class)->group(function () {
                Route::get("/", "adminDashboardView")->name("index");
                Route::post("logout", "logout")->name("logout");
                Route::get("/data-sampah", "dataSampahView")->name("trash.index");
                Route::get("/data-transaksi", "dataTransactionView")->name("transaction.index");
            });

            Route::prefix("data-transaksi")->controller(DataTransaction::class)
                ->name("trans.")
                ->group(function () {
                    Route::get("detail/{id}", "detail")->name("detail");
                    Route::get("scale-trash", "scalling")->name("scalling");
                    Route::post("scale-trash/{detailTrxId}", "postDataWeight")->name("post.weight");
                    Route::post("upload-payment-doc/{id}", "uploadPaymentDoc")->name("upload.payment-doc");
                    Route::get("pickup-order/{id}", "pickupOrder")->name("pickup");
                    Route::get("finish-order/{id}", "finishedOrder")->name("finish");
                    Route::get("/datatable", "getDatatable")->name("datatable");
                });

            Route::prefix("data-sampah")->controller(DataTrashController::class)
                ->name("trash.")
                ->group(function () {
                    Route::post("kategori-sampah", "newTrashCategory")->name("new-category");
                    Route::get("kategori-sampah", "getAllDataTrashCategory")->name("get-categories");
                    Route::delete("kategori-sampah", "deleteTrashCategory")->name("delete-category");
                    Route::post("kategori-sampah/update", "updateTrashCategory")->name("update-category");

                    Route::post("sub-sampah", "newSubTrash")->name("new-sub-trash");
                    Route::delete("sub-sampah", "deleteTrash")->name("delete-sub-trash");
                    Route::get("sub-sampah", "getAllDataTrash")->name("get-sub-trash");
                    Route::put("sub-sampah", "updateSubTrash")->name("update-sub-trash");
                });
            Route::prefix("blogs")->controller(BlogController::class)
                ->name("blog.")
                ->group(function() {
                    Route::get("/", "blogPage")->name("index");
                    Route::get("create", "blogCreatePage")->name("create");
                });
        });
    });
});
