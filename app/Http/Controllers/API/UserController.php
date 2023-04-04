<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function store(Request $request)
    {

        return User::create($request->all());
    }
}
