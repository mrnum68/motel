<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album as AlbumModel;
use App\Models\Province as Province;

class HomeController extends Controller
{

    public function index()
    {
        
        return view('frontend.index');
    }

    

}
