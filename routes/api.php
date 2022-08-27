<?php
use App\http\controllers\MessagesController;
use App\http\controllers\AuthController;
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

// Route::resource('messages', MessagesController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/messages/search/{message}', [MessagesController::class, 'search']);
    Route::get('/messages', [MessagesController::class, 'index']);
    Route::get('/messages/{id}', [MessagesController::class, 'show']);
    Route::post('/messages', [MessagesController::class, 'store']);
    Route::put('/messages/{id}', [MessagesController::class, 'update']);
    Route::delete('/messages/{id}', [MessagesController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);    
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
