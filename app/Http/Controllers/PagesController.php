<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Blog;

class PagesController extends Controller
{
    public function index(){
        $props = Property::where('published',1)->paginate(6);
        $posts = Blog::orderBy('created_at','desc')->get();
        return view('pages.index', compact('props','posts'));
    }

    public function show($slug){

        $res = Property::where('slug',$slug)->first();
        return view('pages.property-details', compact('res'));
    }

    public function show_post($slug){

        $res = Blog::where('slug',$slug)->first();
        return view('pages.post-details', compact('res'));
    }

    public function all_property(){
        $prop = Property::orderBy('created_at','desc')->paginate(18);
        return view('pages.allproducts', compact('prop'));
    }

    public function all_post(){
        $posts = Blog::orderBy('created_at','desc')->paginate(18);
        return view('pages.allposts', compact('posts'));
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }
}
