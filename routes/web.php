<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Osis;
use App\Models\Mpk;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OsisController;
use App\Http\Controllers\MpkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/admin', function ( Request $request ) {

    if(Auth::check()){

    if(auth()->user()->kelas == "admin"){  
        //Search
        if($request->has('cari')){
            return view('admin/dashboard', [
                'users' => User::latest()->where('id','!=','1')->where('nipd' , 'like' , $request->cari.'%')->get(),
                'last' => User::latest()->limit(1)->get(),
                'osis' => Osis::latest()->get(),
                'mpk' => Mpk::latest()->get()
            ]);
        }
        else{
            return view('admin/dashboard', [
                
                'users' => User::latest()->where('id','!=','1')->get(),
                'last' => User::latest()->limit(1)->get(),
                'osis' => Osis::latest()->get(),
                'mpk' => Mpk::latest()->get()
            ]);
        }
        }
        if(auth()->user()->osis != 0 && auth()->user()->mpk != 0){
            return redirect('/')->with('loginError','Kamu Sudah Vote nih. Jika belum, silahkan beri tahu Admin atau Panitia!');
            }
        else{
            return redirect('/vote');
           }
    }
    else{
        return redirect('/');
    }
});


Route::get('/tambah-kandidat', function () {
    if(Auth::check()){
        return view('admin.kandidat');
    }
    else{
        return redirect('/');
    }
});

Route::get('/', function () {
    return view('login');
});


Route::get('/vote', function () {   
        return view('vote.voting', [
            'osis' => Osis::latest()->get(),
            'mpk' => Mpk::latest()->get()]);
});

Route::get('/voteMpk', function () {   
    return view('admin.voteMpk', [
        'mpk' => Mpk::latest()->get()
    ]);
});

Route::get('/voteOsis', function () {   
    return view('admin.voteOsis', [
        'osis' => Osis::latest()->get(),
    ]);
});

Route::get('/dataOsis', function () {   
    return view('data.php', [
        'osis' => Osis::latest()->get(),
    ]);
});

Route::post('login', [AdminController::class,'authenticate']);
Route::resource('osis', OsisController::class);
Route::resource('mpk', MpkController::class);
Route::post('logout', [AdminController::class,'logout']);
Route::resource('pemilih', PemilihController::class);

