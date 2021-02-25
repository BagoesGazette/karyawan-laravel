@extends('layouts.main')
@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Update Karyawan</h1>
      </div>

      <div class="section-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route("karyawanUpdate") }}" method="post" autocomplete="off">@csrf
                            <input type="hidden" name="idUser" value="{{ $karyawan->id }}">
                            <input type="hidden" name="idKaryawan" value="{{ $karyawan->idKaryawan }}">
                            <input type="hidden" name="password" value="{{ $karyawan->password }}">
                            <div class="form-group">
                                <label>Nama Karyawan</label>
                                <input type="text" class="form-control" name="nama_karyawan" value="{{ $karyawan->name }}" placeholder="Masukkan nama karyawan" id="nama_karyawan">
                                @error('nama_karyawan')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $karyawan->email }}" placeholder="Masukkan email">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label>Jumlah Cuti</label>
                              <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $karyawan->jumlah }}" placeholder="Masukkan jumlah cuti">
                              @error('jumlah')
                              <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div> 
                            <a href="{{ route("karyawan") }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Update Data</button>  
                            </form>
                        </div>    
                    </div>   
                </div>    
            </div>    
        </div>  
      </div>
    </section>
@endsection