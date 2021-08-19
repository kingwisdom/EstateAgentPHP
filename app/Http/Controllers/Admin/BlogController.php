<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        $blog = Blog::orderBy('created_at','desc')->get();
        return view('admin.blog.index', compact('blog'));
    }

    public function store(Request $req){
        $this->validate($req, [
            $req->title,
            $req->body
        ]);
        $img = "";
        if($req->file('file') != null){
            $image = $req->file('file');
            $imageName=$image->getClientOriginalName();
            $image->move(public_path().'/images/', 'blog-'.$imageName);  
            $img = $imageName;
        }

        
        $prop = new Blog();
        $prop->title = $req->title;
        $prop->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        $prop->author = Auth::user()->name;
        $prop-> body = $req->body;
        $prop->image = $img!="" ? $img : "";

        $prop->save();
        return redirect(route('blog.index'))->with('success', 'You posted successfully');   
    } 

    public function edit($slug){
        $item = Blog::findOrFail($slug);
        return view('admin.blog.edit', compact('item'));
    }

    public function update(Request $req, $id){

        $prop = Blog::findOrFail($id);
        $img = "";
        if($req->file('file') != null){
            $image = $req->file('file');
            $imageName=$image->getClientOriginalName();
            $image->move(public_path().'/images/', 'blog-'.$imageName);  
            $img = $imageName;
        }
         
         $prop->title = $req->title;
         $prop-> body = $req->body;
         $prop->image = $img!="" ? $img : "";
 
         $prop->save();
         return redirect(route('blog.index'))->with('success', 'You updated successfully');   
         
         
     } 

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect(route('blog.index'))->with('success', 'Post has been deleted');
    }
}
