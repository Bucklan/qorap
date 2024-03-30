<?php

require_once('frontend/base.php');


Route::get('/asd', function () {
   \Illuminate\Support\Facades\Mail::to('assylzhvn@gmail.com')->send(new \App\Mail\HelloMail());
});


