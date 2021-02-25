@extends('layouts.main')
@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Karyawan</h1>
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
            <div class="card-header">
                <a href="{{ route("karyawanCreate") }}" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered datatable">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Total Cuti</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($karyawan as $k)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $k->name }}</td>
                                <td>{{ $k->email }}</td>
                                <td>{{ $k->jumlah }}</td>
                                <td>
                                  <a href="{{ url("karyawan/edit/".$k->id) }}" class="btn btn-warning tombolUpdateData">Update</a>
                                  <a href="{{ url("karyawan/destroy/".$k->name) }}" class="btn btn-danger">Hapus</a>
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