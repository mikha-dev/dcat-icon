<?php

use Weiwait\DcatIcon\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('svg-icon', Controllers\SvgIconController::class.'@index');