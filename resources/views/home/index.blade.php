@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Home</h2>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Saldo</h5>
                      <p class="card-text">(Pemasukan - Pengeluaran)</p>
                      <a href="#" class="btn btn-primary">Rp. {{ number_format($saldo,0,',','.') }}</a>
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Total Pemasukan</h5>
                      <p class="card-text">(All Time)</p>
                      <a href="#" class="btn btn-primary">Rp. {{ number_format($income,0,',','.') }}</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Total Pengeluaran</h5>
                      <p class="card-text">(All Time)</p>
                      <a href="#" class="btn btn-primary">Rp. {{ number_format($outcome,0,',','.') }}</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
      
@endsection