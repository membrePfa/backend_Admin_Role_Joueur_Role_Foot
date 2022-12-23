<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\JoeurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Admin
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//Joueur
Route::post('/joeur/register', [JoeurController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
