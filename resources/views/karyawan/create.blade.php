@extends('layouts.main')
@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Tambah Karyawan</h1>
      </div>

      <div class="section-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route("karyawanStore") }}" method="post" autocomplete="off">@csrf
                            <div class="form-group">
                                <label>Nama Karyawan</label>
                                <input type="text" class="form-control" name="nama_karyawan" placeholder="Masukkan nama karyawan" id="nama_karyawan">
                                @error('nama_karyawan')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan email">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label>Jumlah Cuti</label>
                              <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah cuti">
                              @error('jumlah')
                              <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div> 
                            <a href="{{ route("karyawan") }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Tambah Data</button>  
                            </form>
                        </div>    
                    </div>   
                </div>    
            </div>    
        </div>  
      </div>
    </section>
@endsection