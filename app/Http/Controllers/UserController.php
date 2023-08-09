<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $uName= $request->has('uname')?$request->get('uname'):'';
        $pass= $request->has('pass')?$request->get('pass'):'';

        $userInfo= User::where('name', '=', $uName)->where('password', '=' ,$pass)->first();

        if(isset($userInfo) && $userInfo!=null){
            return redirect('/admin_products');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        User::insert([
            'name'=>$request->has('uname')? $request->get('uname'):'',
            'email'=>$request->has('email')? $request->get('email'):'',
            'mobile'=>$request->has('mobile')? $request->get('mobile'):'',
            'password'=>$request->has('pass')? $request->get('pass'):'',
        ]);
        return redirect('/admin_products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
