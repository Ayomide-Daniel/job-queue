<?php

namespace App\Http\Controllers;

use App\Jobs\CreateUser;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function test(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        CreateUser::dispatch($request->all());
        return response(json_encode(["message"=> "success"]), 200);
    }
}
