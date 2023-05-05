<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\DisplayEditor;
use App\Models\Product;
use App\Models\Project;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        return view('pages.home',[
            'web' => [
                'name' => 'الصفحة الرئيسية | Box Print'
            ],
            'sliders' => Slide::get(),
            'products' => Product::orderBy('created_at','DESC')->get()->take(6),
            'projects' => Project::orderBy('created_at','DESC')->get()->take(6),
            'aboutAs' => Aboutus::first(),
            'sectionOne' => DisplayEditor::first(),
            'sectionTwo' => DisplayEditor::get()->last()

        ]);
    }
}
