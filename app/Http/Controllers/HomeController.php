<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile(){
        $dataUser = Auth::user();
        return view('profile', compact('dataUser'));
    }

    public function character(Request $request){
        $id = $request->id;
        return view('character', compact('id'));
    }

    public function update(UserRequest $request){
        $data = $request;
        DB::table('users')->where('id', Auth::user()->id)->update( [ 'name' => $data->name, 'address' => $data->address, 'email' => $data->email, 'city' => $data->city, 'birthday' => $data->birthday]);
    }
}
