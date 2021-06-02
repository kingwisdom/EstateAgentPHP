<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Property;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.dashboard');
    }

    public function all_property(){
        $properties = Property::orderBy('created_at','desc')->get();
        return view('admin.properties',compact('properties'));
    }

    public function all_users(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }
    public function make_admin($id){
        $users = User::findOrFail($id);
        $users->is_admin = 1;
        $users->save();
        return redirect()->back()->with('success','Successful');
    }
    public function remove_admin($id){
        $users = User::findOrFail($id);
        $users->is_admin = 0;
        $users->save();
        return redirect()->back()->with('success','Successful');
    }

    public function publish($id){
        $users = Property::findOrFail($id);
        $users->published = 1;
        $users->save();
        return redirect()->back()->with('success','Successful');
    }
    public function unpublish($id){
        $users = Property::findOrFail($id);
        $users->published = 0;
        $users->save();
        return redirect()->back()->with('success','Successful');
    }


}


// <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
//                     @csrf
//                     @method('DELETE')
//                     <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
//                   </form>