@extends('layouts.main')
@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Approval</h1>
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

      <div class="section-body">
        <div class="card">
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
                        <th>Action</th>
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
                        <td><span class="badge badge-danger">{{ $j->status }}</span></td>    
                        <td>
                            <a href="{{ url("approval/check/".$j->id) }}" class="btn btn-success"><i class="far fa-check-circle"></i> Setujui</a>
                        </td>
                        
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