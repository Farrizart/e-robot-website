<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\ListPostController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\MemberPositionController;
use App\Http\Controllers\Api\PostContentController;
use App\Http\Controllers\Api\SocailController;
use App\Http\Controllers\Api\SocailLinkController;
use App\Http\Controllers\Api\SubCommentController;
use App\Http\Controllers\Api\TeamController;
use App\Models\MemberPosition;
use App\Models\PostContent;
use App\Models\SubComment;
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


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::get('list-post-content/index', [ListPostController::class, 'index']);
Route::post('list-post-content/show', [ListPostController::class, 'show']);
Route::post('list-post-content/show-detail/{post_content_id}', [ListPostController::class, 'detail']);

Route::get('comment/{post_content_id}', [CommentController::class, 'show']);
Route::post('comment/sub-comment', [SubCommentController::class, 'show']);

Route::post('team/store',[TeamController::class,'store']);
Route::get('team/show-all',[TeamController::class,'show']);

Route::post('socail/store',[SocailController::class,'store']);
Route::get('socail/show-all',[SocailController::class,'show']);

Route::post('member/store',[MemberController::class,'store']);
Route::get('member/show-all',[MemberController::class,'show']);

Route::post('member-position/store',[MemberPositionController::class,'store']);
Route::get('member-position/show-all',[MemberPositionController::class,'show']);

Route::post('socail-link/store',[SocailLinkController::class,'store']);

Route::middleware(['auth:api'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::post('category/store', [CategoryController::class, 'store']);
    Route::get('category/show', [CategoryController::class, 'show']);

    Route::post('post-content/store', [PostContentController::class, 'store']);
    Route::get('post-content/index', [PostContentController::class, 'index']);
    Route::post('post-content/show', [PostContentController::class, 'show']);
    Route::delete('post-content/{post_content_id}', [PostContentController::class, 'destroy']);

    Route::post('like/store', [LikeController::class, 'store']);

    Route::post('comment/store', [CommentController::class, 'store']);
    Route::delete('comment/{comment_id}', [CommentController::class, 'destroy']);

    Route::post('comment/sub-comment/store', [SubCommentController::class, 'store']);
    Route::post('comment/sub-comment/delete', [SubCommentController::class, 'destroy']);
});
