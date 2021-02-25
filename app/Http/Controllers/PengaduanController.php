<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "pengajuan" => DB::table('pengajuan')->where('nama_karyawan',Auth::user()->name)->get(),
            "detail"    => DB::table('detail_karyawan')->where("nama_karyawan",Auth::user()->name)->first()
        ];
        return view("pengaduan.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail = DB::table('detail_karyawan')->where("nama_karyawan",Auth::user()->name)->first();
        $check = $detail->jumlah;
        if($check == 0){
            return redirect('/pengaduan')->with('error','Pengajuan anda telah habis');
        }else{
            return view("pengaduan.create");
        }
        
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
            "tanggal_pengajuan" => "required",
            "isi_laporan"       => "required"
        ]);
        
        $detail     = DB::table('detail_karyawan')->where("nama_karyawan",Auth::user()->name)->first();
        $hasil      = $detail->jumlah - 1;

        DB::table('detail_karyawan')
        ->where('nama_karyawan', Auth::user()->name)
        ->update([
                'jumlah'             => $hasil,
                'updated_at'         => \Carbon\Carbon::now('Asia/Jakarta')
        ]);

        DB::table('pengajuan')->insert(
            [
                'nama_karyawan'         => Auth::user()->name,
                'tanggal_pengajuan'     => $request->tanggal_pengajuan,
                'isi_pengajuan'         => $request->isi_laporan,
                'status'                => 'belum-disetujui',
                'created_at'            => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        );
        return redirect('/pengaduan')->with('message','Anda telah mengirim pengajuan cuti');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pengajuanAll()
    {
        $data = [
            "pengajuan" => DB::table('pengajuan')->get()
        ];
        return view("pengaduan.all",$data);
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
