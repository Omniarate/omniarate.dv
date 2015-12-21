<?php

namespace App\Http\Controllers;

use App\Category;
use App\UploadedPicture;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{

    public function home(){

        if(Auth::guest()){

            return Redirect::to('auth/login');
        }
        if(Auth::user()->role == 0){
            return view('templates/dashboard');
        }
        else{
            $user = Auth::user();
            $profile_picture = Auth::user()->avatar;

           $all_images = UploadedPicture::all();




            return view('templates/home')->with(compact('user', 'profile_picture', 'all_images'));
        }
    }

    public function store(Request $request)
    {
        $image = new UploadedPicture();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);
        $image->title = $request->title;
        $image->description = $request->description;
        $image->category_id = 2;
        $image->user_id = Auth::User()->id;
        if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        return Redirect::to('home/');
    }



    public function profile($id){

        $images = Auth::User()->uploaded_pictures;
        $categories = Category::lists('category_name', 'category_id');

        $user = User::findOrFail($id);

        return view('templates/singleProfile')->with(compact('user', 'images', 'categories'));

    }
}
