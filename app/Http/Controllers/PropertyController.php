<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Category;

class PropertyController extends Controller
{
    public function index(){
        $props =  Property::orderBy('created_at','desc')->where('user_id',Auth()->user()->id)->get();
      
        return view('property.index', compact('props'));
    }

    public function create(){
        $cats = Category::all();
        return view('property.create',compact('cats'));
    }

    public function store(Request $req){
        $this->validate($req, [
            $req->title,
            $req->description,
            $req->address
        ]);

        if($req->file('file') != null){
            foreach($req->file('file') as $image)
            {
                $imageName=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $imageName);  
                $fileNames[] = $imageName;
            }
            $img = $fileNames[0];
            $images = json_encode($fileNames);
        }

        $digits = 6;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);

        $prop = new Property();
        $prop->title = $req->title;
        $prop-> description = $req->description;
        $prop->type = $req->type;
        $prop->category_id = $req->category_id;
        $prop->user_id = $req->user_id;
        $prop->item_code = $code;
        $prop->phone = $req->phone;
        $prop->condition = $req->condition;
        $prop->price = $req->price;
        $prop->image = $images;
        $prop->featureImg = $img;
        $prop->lga = $req->lga;
        $prop->state = $req->state;
        $prop->address = $req->address;
        $prop->published = 1;

        $prop->save();
        return redirect(route('property.index'))->with('success', 'You posted successfully');   
    }

    public function edit($item_code){
        $item = Property::findOrFail($item_code);
         return view('property.edit',compact('item'));
    }

    public function update(Request $req, $id){

       // $prop = Property::whereId($id)->update();
       $images ="";
       $prop = Property::findOrFail($id);
        if($req->file('file') != null){
            foreach($req->file('file') as $image)
            {
                $imageName=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $imageName);  
                $fileNames[] = $imageName;
            }
            $img = $fileNames[0];
            $images = json_encode($fileNames);
        }
        
        
        $prop->title = $req->title;
        $prop-> description = $req->description;
        $prop->type = $req->type;
        $prop->category_id = $req->category_id;
        //$prop->user_id = $req->user_id;
        $prop->item_code = $req->item_code;
        $prop->phone = $req->phone;
        $prop->condition = $req->condition;
        $prop->price = $req->price;
        $prop->image = $images;
        $prop->featureImg = $img;
        $prop->lga = $req->lga;
        $prop->state = $req->state;
        $prop->address = $req->address;
        //$prop->published = 0;

        $prop->save();
        return redirect(route('property.index'))->with('success', 'Your Data has been updated');
    } 

    public function destroy($id)
    {
        $student = Property::findOrFail($id);
        $student->delete();

        return redirect(route('property.index'))->with('success', 'Property has been deleted');
    }
}
