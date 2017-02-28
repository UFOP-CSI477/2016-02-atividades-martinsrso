<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sample1()
    {
        return dd( Cookie::get('name') );
    }

    public function sample2($id)
    {
        if (Cookie::get('name')) {
            $data   = array();
            $data[] = Cookie::get('name');
            array_push($data, $id);
        } else {
            $data   = $id;
        }

        $response = new Response('added');
        $response->withCookie(cookie('name', $data, 60));
        return $response;

    }

    public function sample3()
    {
        $cookie = Cookie::forget('name');
        $response = new Response('removed');
        $response->withCookie($cookie);
        return $response;
    }

}
