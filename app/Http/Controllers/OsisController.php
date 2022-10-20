<?php

namespace App\Http\Controllers;

use App\Models\Osis;
use App\Http\Requests\StoreOsisRequest;
use App\Http\Requests\UpdateOsisRequest;

class OsisController extends Controller
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
     * @param  \App\Http\Requests\StoreOsisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOsisRequest $request)
    {
        $kandidat = new osis;
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
     * @param  \App\Models\Osis  $osis
     * @return \Illuminate\Http\Response
     */
    public function show(Osis $osis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Osis  $osis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $osis = Osis::where('id',$id);
        
        return view('admin.kandidat',[
            'osis' => $osis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOsisRequest  $request
     * @param  \App\Models\Osis  $osis
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateOsisRequest $request,$id)
    {
       $osis = Osis::where('id',$id);
        auth()->user()->update([
            'osis' => $request->osis
        ]);
        $osis->update([
            'suara' => $request->suara
        ]);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Osis  $osis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $osis = Osis::where('id',$id);
        $osis->delete();
    }
}
