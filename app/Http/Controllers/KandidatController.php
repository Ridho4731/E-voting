<?php

namespace App\Http\Controllers;

use App\Models\kandidat;
use App\Http\Requests\StorekandidatRequest;
use App\Http\Requests\UpdatekandidatRequest;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorekandidatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekandidatRequest $request)
    {
        $this->validate(request(),[
            //put fields to be validated here
            ]);         
       
    $user= new User();
        $user->username= $request['username'];
        $user->company= $request['company'];
        $user->company= $request['company'];
        $user->company= $request['company'];
    // add other fields
    $user->save();

        return redirect('admin/kandidat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function show(kandidat $kandidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function edit(kandidat $kandidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekandidatRequest  $request
     * @param  \App\Models\kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekandidatRequest $request, kandidat $kandidat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function destroy(kandidat $kandidat)
    {
        //
    }
}
