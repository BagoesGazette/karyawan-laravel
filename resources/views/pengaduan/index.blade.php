@extends('layouts.main')
@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Pengajuan Cuti</h1>
      </div>

        @if (session('message'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
                {{ session('message') }}
            </div>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
                {{ session('error') }}
            </div>
        </div>
        @endif


      <div class="section-body">
        <div class="card">
            <div class="card-header">
              @if ($detail->jumlah == 0)
              <button class="btn btn-danger">Total pengajuan cuti sudah habis</button>
              @else 
              <a href="{{ route("pengaduanCreate") }}" class="btn btn-primary">Tambah Pengajuan Cuti</a>
              @endif
                
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $no=1;
                      @endphp
                      @foreach ($pengajuan as $j)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $j->nama_karyawan }}</td>
                        <td>{{ date("m-d-Y",strtotime($j->tanggal_pengajuan)) }}</td>
                        <td>{{ $j->isi_pengajuan }}</td>
                        @if ($j->status === "disetujui")
                        <td><span class="badge badge-success">{{ $j->status }}</span></td>
                        @else
                        <td><span class="badge badge-danger">{{ $j->status }}</span></td>    
                        @endif
                        
                      </tr>
                      @endforeach
                    </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>
    </section>
@endsection
@push('page-scripts')
<script>
    $(function() {
        $(document).ready( function () {
            $('.datatable').DataTable();
        });
    })
  </script>
@endpush