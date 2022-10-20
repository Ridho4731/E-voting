<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    

public function authenticate(Request $request)
{
    $input = $request->all();

    $this->validate($request, [

        'nipd' => 'required',

        'password' => 'required',

    ]);
    $fieldType = filter_var($request->nipd, FILTER_VALIDATE_EMAIL) ? 'email' : 'nipd';

    if(auth()->attempt(array($fieldType => $input['nipd'], 'password' => $input['password'])))

    {

        return redirect('/admin');

    }else{

        return redirect('/')

            ->with('error','Email-Address And Password Are Wrong.');

    }
    // if (Auth::attempt($credentials)) {
    //     $request->session()->regenerate();

    //     return redirect()->intended('/admin');
    // }
    
    //     return back()->with('loginFailed','LOGIN GAGAL!');
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response~
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreadminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateadminRequest  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
