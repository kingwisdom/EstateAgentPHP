<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $cats = Category::all();
        return view('admin.category.index',compact('cats'));
    }

    public function store(Request $req){
        $exist = Category::where('name', $req->name)->first();
        // if(strtolower($exist->name) == strtolower($req->name)){
        //     return back()->with('message', 'Category exists, please try another name');
        // }
        if($exist != null){
            return redirect()->back()->with('message', 'Category exists, please try another name');
        }
        $cat = new Category();
        $cat->name = $req->name;

        $cat->save();
        return redirect()->back();
    }
}
