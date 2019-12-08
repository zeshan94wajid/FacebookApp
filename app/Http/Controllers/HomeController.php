<?php

namespace App\Http\Controllers;

use Facebook\Facebook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Facebook $fb)
    {
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken(Auth::user()->facebook_token);
            $this->api = $fb;
            return $next($request);
        });
    }

    /**
     * Show user's facebook postr
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function index()
    {
        try {
            $posts = json_decode($this->api->get('/me/feed')->getBody(), true);

        } catch (FacebookSDKException $e) {

        }

        dd($posts);
        return view('home', ['posts' => $posts['data'], 'user' => Auth::user()]);
    }

    /**
     * Logout and clear all sessions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return view('welcome');
    }
}
