@extends('layouts.main')
@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Tambah Pengajuan</h1>
      </div>

      <div class="section-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route("pengaduanStore") }}" method="post" autocomplete="off">@csrf
                            <input type="hidden" name="nama_karyawan" value="{{ Auth::user()->name }}">
                            <div class="form-group">
                                <label>Tanggal Pengajuan</label>
                                <input type="date" name="tanggal_pengajuan"  class="form-control">
                                @error('tanggal_pengajuan')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Isi Laporan</label>
                                <textarea name="isi_laporan" class="form-control" cols="30" rows="10"></textarea>
                                @error('isi_laporan')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <a href="{{ route("karyawan") }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Kirim Pengajuan Cuti</button>  
                            </form>
                        </div>    
                    </div>   
                </div>    
            </div>    
        </div>  
      </div>
    </section>
@endsection