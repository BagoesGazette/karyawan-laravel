<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\DetailKaryawan;
use Illuminate\Support\Str;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "karyawan" => DB::table('users')
            ->join('detail_karyawan', 'users.name', '=', 'detail_karyawan.nama_karyawan')
            ->select('users.*', 'detail_karyawan.jumlah')
            ->where('role','karyawan')
            ->get()
        ];
        return view("karyawan.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("karyawan.create");
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
            "nama_karyawan"     => "required",
            "email"             => "required",
            "password"          => "required",
            "jumlah"            => "required"
        ]);
        
        DB::table('users')->insert(
            [
                'name'              => $request->nama_karyawan,
                'email'             => $request->email,
                'password'          => bcrypt($request->password),
                'role'              => 'karyawan',
                'remember_token'    => Str::random(100),
                'created_at'        => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        );
      

        DB::table('detail_karyawan')->insert(
            [
                'nama_karyawan'     => $request->nama_karyawan,
                'jumlah'            => $request->jumlah,
                'created_at'        => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        );


        return redirect('/dataKaryawan')->with('message','Data berhasil ditambahkan');
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
        $data = [
            "karyawan" => DB::table('users')
            ->join('detail_karyawan', 'users.name', '=', 'detail_karyawan.nama_karyawan')
            ->select('users.*', 'detail_karyawan.jumlah','detail_karyawan.id as idKaryawan')
            ->where('users.id',$id)
            ->first()
        ];
        return view("karyawan.update",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "nama_karyawan"     => "required",
            "email"             => "required",
            "jumlah"            => "required"
        ]);

        DB::table('users')
        ->where('id', $request->idUser)
        ->update([
                'name'              => $request->nama_karyawan,
                'email'             => $request->email,
                'password'          => $request->password,
                'updated_at'        => \Carbon\Carbon::now('Asia/Jakarta')
        ]);

        DB::table('detail_karyawan')
        ->where('id', $request->idKaryawan)
        ->update([
                'nama_karyawan'      => $request->nama_karyawan,
                'jumlah'             => $request->jumlah,
                'updated_at'         => \Carbon\Carbon::now('Asia/Jakarta')
        ]);

        return redirect('/dataKaryawan')->with('message','Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        DB::table('users')->where('name',$name)->delete();
        DB::table('detail_karyawan')->where('nama_karyawan',$name)->delete();
        return redirect('/dataKaryawan')->with('message','Data berhasil dihapus');
    }
}
