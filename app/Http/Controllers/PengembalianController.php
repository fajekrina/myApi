<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Http\Requests\PengembalianRequest;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Token;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalians = Pengembalian::join('peminjamen', 'pengembalians.peminjaman_id', '=', 'peminjamen.id')
        ->join('mobils', 'mobils.id', '=', 'peminjamen.mobil_id')
        ->where('peminjamen.user_id', Auth::user()->id)
        ->get();

        // dd($pengembalians);

        return view('pengembalian.index', compact('pengembalians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminjamans = Peminjaman::whereDoesntHave('pengembalian')
        ->join('mobils', 'mobils.id', '=', 'peminjamen.mobil_id')
        ->where('user_id', Auth::user()->id)
        ->get();

        // dd($peminjamans);
       
        return view('pengembalian.add', compact('peminjamans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengembalianRequest $request)
    {
        $validatedData = $request->all();

        $peminjaman = Peminjaman::where('user_id', Auth::user()->id)
        ->where('mobil_id', $validatedData['mobil_id'])
        ->first();

        $mobil = Mobil::find($validatedData['mobil_id']);

        $validatedData['peminjaman_id'] = $peminjaman->id;
        $validatedData['tgl_kembali'] = Carbon::now();
        $validatedData['durasi'] = $validatedData['tgl_kembali']->diffInDays(Carbon::parse($peminjaman->tgl_awal));
        $validatedData['total_tarif'] = $mobil->tarif_harian * $validatedData['durasi'];
        // dd($validatedData);
        
        $pengembalian = Pengembalian::create($validatedData);
        
        return redirect()->route('pengembalian.index');
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
