<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Disease;
use App\Models\Treatment;
use Image;
use Validator;
use File;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back-end.dashboard.dashboard');
    }

    public function menu(){
        $menuList=Menu::orderBy('id','ASC')->get();
        return view('back-end.menuList',compact('menuList'));
    }

    public function saveNewMenu(Request $request){
        Validator::make($request->all(), [
            'name' => 'required|min:2|max:30',
        ])->validate();
        $menu = new menu();
        $menu->name = $request->name;
        $menu->status = 1;
        $menu->description = $request->description;
        if ($request->file('image')) :

            $validation=Validator::make($request->all(), [
                'image' => 'required|mimes:jpg,JPG,JPEG,jpeg,gif,png|max:2120',
            ])->validate(); 
        
                $requestImage = $request->file('image');
                $fileType = $requestImage->getClientOriginalExtension();
                $originalImageName = date('YmdHis') . rand(1, 50) . '.' . $fileType;
                $directory = 'image_gallery/';
                $originalImageUrl = $directory . $originalImageName;
                $imgOriginal=Image::make($requestImage)->stream();
                Image::make($requestImage)->save($originalImageUrl);
                $menu->image = $originalImageUrl;
            endif;
        $menu->save();

        return \redirect()->back()->with('success','Successfully added new menu.');
    }

    public function updateMenu(Request $request){
        Validator::make($request->all(), [
            'name' => 'required|min:2|max:30',
        ])->validate();
        $menu = Menu::findOrFail($request->id);
        $menu->name = $request->name;
        $menu->status = $request->status;
        $menu->description = $request->description;
        if ($request->file('image')) :

            $validation=Validator::make($request->all(), [
                'image' => 'required|mimes:jpg,JPG,JPEG,jpeg,gif,png|max:2120',
            ])->validate();
            if (File::exists($menu->image)) :
                unlink($menu->image);
            endif; 
        
                $requestImage = $request->file('image');
                $fileType = $requestImage->getClientOriginalExtension();
                $originalImageName = date('YmdHis') . rand(1, 50) . '.' . $fileType;
                $directory = 'image_gallery/';
                $originalImageUrl = $directory . $originalImageName;
                $imgOriginal=Image::make($requestImage)->stream();
                Image::make($requestImage)->save($originalImageUrl);
                $menu->image = $originalImageUrl;
            endif;
        $menu->save();

        return \redirect()->back()->with('success','Successfully updated menu.');
    }
    public function statusChange($id){

        $menu=Menu::FindOrFail($id);
        if($menu->status==0){
            $menu->status=1;
        }else{
            $menu->status=0;
        }
        $menu->save();

        return \redirect()->back()->with('success','Successfully updated menu.');
    }
    public function deleteMenu($id){

        $menu=Menu::FindOrFail($id);
        if (File::exists($menu->image)) :
            unlink($menu->image);
        endif; 
        $menu->delete();

        return \redirect()->back()->with('success','Successfully delete.');
    }
    public function editMenu($id){
        $menu=Menu::FindOrFail($id);

        return view('back-end.editMenu',compact('menu'));

    }
    public function diseaseByMenu($menu_id){
        $diseases=Disease::where('menu_id',$menu_id)->get();
        // return $menu_id;

        return view('back-end.diseasesByMenu',compact('diseases','menu_id'));

    }
    public function saveNewDisease(Request $request){
        
        Validator::make($request->all(), [
            'name' => 'required|min:2|max:30',
        ])->validate();

        $disease = new Disease();
        $disease->name = $request->name;
        $disease->menu_id = $request->menu_id;
        $disease->status = 1;
        $disease->type = $request->type;
        if ($request->file('image')) :

            $validation=Validator::make($request->all(), [
                'image' => 'required|mimes:jpg,JPG,JPEG,jpeg,gif,png|max:2120',
            ])->validate(); 
        
                $requestImage = $request->file('image');
                $fileType = $requestImage->getClientOriginalExtension();
                $originalImageName = date('YmdHis') . rand(1, 50) . '.' . $fileType;
                $directory = 'image_gallery/';
                $originalImageUrl = $directory . $originalImageName;
                $imgOriginal=Image::make($requestImage)->stream();
                Image::make($requestImage)->save($originalImageUrl);
                $disease->image = $originalImageUrl;
            endif;
        $disease->save();
        return \redirect()->back()->with('success','Successfully Added.');

    }
    
}
