@extends('layouts.main')
@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>

      <div class="row">
        @if (Auth::user()->role === "karyawan")
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Sisa Cuti</h4>
              </div>
              <div class="card-body">
                {{ $karyawan->jumlah }}
              </div>
            </div>
          </div>
        </div>
        @endif

        @if (Auth::user()->role === "super-admin" || Auth::user()->role === "staf")
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-check"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Disetujui</h4>
              </div>
              <div class="card-body">
                {{ $disetujui }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-times-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Disetujui</h4>
              </div>
              <div class="card-body">
                {{ $belum_disetujui }}
              </div>
            </div>
          </div>
        </div>
        @endif
   

      </div>

      <div class="section-body">
      </div>
    </section>
@endsection