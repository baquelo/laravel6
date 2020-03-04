<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    public function home() {
        return File::get(public_path('index.php'));
    }
}
