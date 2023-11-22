<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Http\Requests\PeminjamanRequest;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Token;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamans = Peminjaman::all();

        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mobils = Mobil::all();
        
        return view('peminjaman.add', compact('mobils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeminjamanRequest $request)
    {
        $validatedData = $request->all();

        $validatedData['user_id'] = Auth::user()->id;
        
        $peminjaman = Peminjaman::create($validatedData);
        
        return redirect()->route('peminjaman.index');
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
    
    public function find($awal, $akhir)
    {
        $tgl_awal = Carbon::createFromFormat('Y-m-d', $awal);
        $tgl_akhir = Carbon::createFromFormat('Y-m-d', $akhir);
        
        $mobilTersedia = DB::table('mobils')
        ->leftJoin('peminjamen', function ($join) use ($tgl_awal, $tgl_akhir) {
            $join->on('mobils.id', '=', 'peminjamen.mobil_id')
                ->where(function ($query) use ($tgl_awal, $tgl_akhir) {
                    $query->whereBetween('peminjamen.tgl_awal', [$tgl_awal, $tgl_akhir])
                        ->orWhereBetween('peminjamen.tgl_akhir', [$tgl_awal, $tgl_akhir]);
                });
        })
        ->leftJoin('pengembalians', function ($join) use ($tgl_awal) {
            $join->on('peminjamen.id', '=', 'pengembalians.peminjaman_id')
                ->where('pengembalians.tgl_kembali', '>', $tgl_awal);
        })
        ->whereNull('peminjamen.id')
        ->whereNull('pengembalians.id')
        ->select('mobils.id', 'mobils.model') // Ganti 'nama' dengan atribut yang ingin Anda gunakan sebagai label dalam dropdown
        ->distinct()
        ->get();
    
        // $mobilTersedia = Mobil::all();

        $options = $mobilTersedia->map(function ($mobil) {
            return [
                'value' => $mobil->id,
                'label' => $mobil->model // Sesuaikan dengan atribut yang ingin Anda gunakan sebagai label
            ];
        });

        return response()->json($options);
    }
}
