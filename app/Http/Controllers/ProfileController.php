<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
    }

    public function viewposts()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('myposts')->with('posts', $user->Posts);
    }
  
}
