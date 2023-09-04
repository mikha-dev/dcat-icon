<?php

use Illuminate\Support\Facades\Route;

Route::resources([
    'svg-icons' => Dcat\Admin\Http\Controllers\SvgIconController::class
]);