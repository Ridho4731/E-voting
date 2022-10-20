<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Imports\PemilihImport;
use App\Http\Requests\StorePemilihRequest;
use App\Http\Requests\UpdatePemilihRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mpk;
use App\Models\Osis;

class PemilihController extends Controller
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

    public function UserExport(){

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
     * @param  \App\Http\Requests\StorePemilihRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemilihRequest $request)
    {
        $user = new User;
        if($request->password != ""){
            $user->nipd = $request->nipd;
            $user->nama = $request->nama;
            $user->kelas = $request->kelas;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();
                return redirect('/admin#pemilih');
        } 
        else{
         $user->nipd = $request->nipd;
         $user->nama = $request->nama;
         $user->kelas = $request->kelas;
         $user->email = $request->email;


            $user->save();
            return redirect('/admin#pemilih');
        }
   }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function show(Pemilih $pemilih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilih $pemilih)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemilihRequest  $request
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = User::where('id',$id);
        $OsisId = User::find($id)->osis;
        $MpkId = User::find($id)->mpk;
        $osis = Osis::where('id',$OsisId);
        $mpk = Mpk::where('id',$MpkId);
        $VoteOsis = Osis::find($OsisId)->suara;
        $VoteMpk = Mpk::find($MpkId)->suara;

        if($request->has(['osis','mpk'])){
            $user->update([
                'osis' => '0',
                'mpk' => '0'
            ]);
            $osis->update([
                'suara' => $VoteOsis-1
            ]);
            $mpk->update([
                'suara' => $VoteMpk-1
            ]);
            return redirect('/admin')->with('resetSuccess','Reset Berhasil!!!');
        }
        return redirect('/admin')->with('resetSuccess','Reset Gaga!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin#pemilih');
    }
}
