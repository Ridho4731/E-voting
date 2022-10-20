<?php

namespace App\Http\Controllers;

use App\Models\Mpk;
use App\Http\Requests\StoreMpkRequest;
use App\Http\Requests\UpdateMpkRequest;

class MpkController extends Controller
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
     * @param  \App\Http\Requests\StoreMpkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMpkRequest $request)
    {
        $kandidat = new mpk;
        $kandidat->nama = $request->nama;
        $kandidat->kelas = $request->kelas ." " .$request->jurusan;
        $kandidat->foto = $request->file('foto')->store('ft-kandidat');
        $kandidat->visi = $request->visi;
        $kandidat->save();
        return redirect('/tambah-kandidat');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mpk  $mpk
     * @return \Illuminate\Http\Response
     */
    public function show(Mpk $mpk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mpk  $mpk
     * @return \Illuminate\Http\Response
     */
    public function edit(Mpk $mpk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMpkRequest  $request
     * @param  \App\Models\Mpk  $mpk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMpkRequest  $request,$id)
    {
        $mpk = Mpk::where('id',$id);
        auth()->user()->update([
            'mpk' => $request->mpk
        ]);
        $mpk->update([
            'suara' => $request->suara
        ]);
        return back()->with('voteSuccess','Terimakasih telah melakukan voting :D.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mpk  $mpk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mpk = Mpk::where('id',$id);
        $mpk->delete();
    }
}
