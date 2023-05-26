<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieGenres;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    function __construct()
    {
    }

    public function home()
    {
        return view('web.pages.home');
    }

    public function movieDetail()
    {
        return view('web.pages.movieDetail');
    }

    public function ticket()
    {
        return view('web.pages.ticket');
    }

    public function schedules()
    {
        $movies = Movie::all();
        foreach ($movies as $movie) {
            dd($movie->releaseDate >= date("YYYY-mm-dd"));
        }
        return view('web.pages.schedules', [
            'movies' => $movies
        ]);
    }

    public function movies()
    {
        $movies = Movie::all();
        $movieGenres = MovieGenres::all();
        $rating = Rating::all();
        return view('web.pages.movies', [
            'movies' => $movies,
            'movieGenres' => $movieGenres,
            'rating' => $rating
        ]);
    }

    public function events()
    {
        return view('web.pages.events');
    }

    public function signIn(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Please enter your email!',
                'password.required' => 'Please enter your password!'
            ]
        );
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'fullName' => 'required|min:1',
            'email' => 'required|unique:users',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ], [
            'fullName.required' => 'fullName is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'repassword.required' => 'Password is required',
            'repassword.same' => "Password doesn't match",
        ]);
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());
        $user->syncRoles('user');
        return redirect('/')->with('success', 'Sign Up Successfully!');
    }

    public function signOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
