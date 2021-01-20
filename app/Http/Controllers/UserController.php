<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar'=>$filename]);
        }
        return redirect()->back()->with('message','You have successfully upload image.');
    }

}
