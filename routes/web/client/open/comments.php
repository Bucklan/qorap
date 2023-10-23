<?php

use App\Http\Controllers\Client\Open\CommentController;
use Illuminate\Support\Facades\Route;

Route::resource('comments', CommentController::class);
