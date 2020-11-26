<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interview;
use App\Models\Pelamar;

class InterviewController extends Controller
{
    public function index()
    {

        $interview = Interview::all();
        $invwPending = Interview::where('status','pending')->get();
        $invwSuccess = Interview::where('status','success')->get();
        return view('company.interview.index',compact('invwPending','invwSuccess'));
    }

    public function store(Request $request,$id)
    {
    	Interview::create([
    		'pelamar_id' => $id,
    		'tempat' => $request->tempat,
    		'tanggal' => $request->tanggal,
    		'waktu' => $request->waktu,
    		'deskripsi' => $request->deskripsi,
            'status' => 'pending'
    	]);

        Pelamar::find($id)->update(['status' => 'process']);

    	return redirect()->route('pelamar.index');
    }

    public function doneInverview($id)
    {
        Interview::find($id)->update(['status'=>'success']);

        return redirect()->back();
    }

    public function keputusanAkhir(Request $request,$id)
    {
        Pelamar::find($id)->update(['status' => $request->status]);

        return redirect()->back(); 
    }

    /* -------------------------- HALAMAN UNTUK USER --------------------------------- */
    public function myinterview()
    {  
        $interview = Interview::where('user_id',auth()->user()->id)->get();
        return view('user.interview.index',compact('interview'));
    }

}
