<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['auth']]);
    }

    public function auth(Request $request)
    {
        
        return response()->json(['auth_token' => 'sd57sdfK4sdfsd5sdfsd5']);
    }

    //
}
