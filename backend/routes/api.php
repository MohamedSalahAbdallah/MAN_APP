<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserBillController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//User API Routes
//User register API
Route::post('/register', [UserController::class,'register'])->name("register");
//User login API
Route::post('/login', [UserController::class,'login'])->name("login");
//User logout
Route::middleware('auth:sanctum')->post("/logout",[UserController::class,"logout"])->name("logout");


//User index
Route::middleware('auth:sanctum')->get("/user",[UserController::class,"index"])->name("user.index");
//User show
Route::middleware('auth:sanctum')->get("/user/{id}",[UserController::class,"show"])->name("user.show");
//User update
Route::middleware('auth:sanctum')->put("/user/{id}",[UserController::class,"update"])->name("user.update");
//User delete
Route::middleware('auth:sanctum')->delete("/user/{id}",[UserController::class,"destroy"])->name("user.destroy");

//Admin API Routes

//admin create
Route::middleware(['auth:sanctum','abilities:admin'])->post("/admin/create",[UserController::class,"create"]);

//UserBill API Routes

//UserBill index
Route::middleware(['auth:sanctum','abilities:admin'])->get("/userBill",[UserBillController::class,"index"])->name("userBill.index");
//UserBill show
Route::middleware(['auth:sanctum','abilities:admin'])->get("/userBill/{id}",[UserBillController::class,"show"])->name("userBill.show");
//UserBill update
Route::middleware(['auth:sanctum','abilities:admin'])->put("/userBill/{id}",[UserBillController::class,"update"])->name("userBill.update");
//UserBill delete
Route::middleware(['auth:sanctum','abilities:admin'])->delete("/userBill/{id}",[UserBillController::class,"destroy"])->name("userBill.destroy");
//UserBill store
Route::middleware(['auth:sanctum'])->post("/userBill",[UserBillController::class,"store"])->name("userBill.store");

Route::middleware(['auth:sanctum','abilities:admin'])->get("/travelbills",[UserBillController::class,"getTravelUsers"])->name("userBill");
Route::middleware(['auth:sanctum','abilities:admin'])->get("/gradbills",[UserBillController::class,"getGradUsers"])->name("userBill");
//Event API Routes

//Event index
Route::get("/event",[EventController::class, 'index']);
//Event show
Route::get("/event/{id}",[EventController::class, 'show']);
//
Route::get("/travel",[EventController::class, 'getTravel']);
Route::get("/grad",[EventController::class, 'getGrad']);


//Event update
Route::middleware(['auth:sanctum','abilities:admin'])->put("/event/{id}",[EventController::class, 'update']);
//Event delete
Route::middleware(['auth:sanctum',"abilities:admin"])->delete("/event/{id}",[EventController::class, 'destroy']);
//Event store
Route::middleware(['auth:sanctum',"abilities:admin"])->post("/event",[EventController::class, 'store']);
