<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PagesController extends Controller
{
    public function index(){
        $props = Property::where('published',1)->paginate(6);
        return view('pages.index', compact('props'));
    }

    public function show($id){
        $res = Property::findOrFail($id);
        return view('pages.property-details', compact('res'));
    }
    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }
}
