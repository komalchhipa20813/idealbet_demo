<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('changePassword');
    }

    /* checking old password */
    public function oldPasswordCheck(Request $request)
    {
        if(isset(Auth::user()->id)){
            if(!Hash::check($request->password, Auth::user()->password)){
                return true;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required:same:new_password',
        ]);
        if (strcmp($request->get('oldpassword'), $request->get('password')) == 0) {
            return response()->json([
                'status' => false,
                'new_message' => 'New Password cannot be same as your old password',
            ]);
        }
        if(isset(Auth::user()->id)){
            $user = Auth::user();
            $logout='logout';
        }
        if (!(Hash::check($request->get('oldpassword'), $user->password))) {
            return response()->json([
                'status' => false,
                'message' => 'Your old password does not matches with the password.',
            ]);
        }
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return response()->json([
                'status' => true,
                'message' => 'password updated successfully',
                'icon' => 'success',
                'redirect_url' => $logout,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
