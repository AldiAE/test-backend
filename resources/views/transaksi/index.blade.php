@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('transaksi.create') }}"> Tambah Transaksi</a>
                
                    <form action="{{ route('transaksi.index') }}" method="GET" class="float-right">
                    <input type="date" name="start" id="start" placeholder="Tanggal Mulai" value="{{ !empty($_GET['start']) ? $_GET['start'] : '' }}">
                    &ensp;-&ensp;
                    <input type="date" name="end" id="end" placeholder="Tanggal Selesai" value="{{ !empty($_GET['end']) ? $_GET['end'] : '' }}">
                    <button type="submit" class="btn btn-secondary btn-sm">Filter</button>
                    </form>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Nama Kategori</th>
            <th>Nominal</th>
            <th>Deskripsi</th>
            <th>Tanggal Transaksi</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($transaksi as $tran)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tran->jenis }}</td>
            <td>{{ $tran->nama_kategori }}</td>
            <td>Rp. {{ number_format($tran->nominal,0,',','.') }}</td>
            <td>{{ $tran->deskripsi }}</td>
            <td>{{ date('d M Y', strtotime($tran->created_at)) }}</td>
            <td>
                <form action="{{ route('transaksi.destroy',$tran->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('transaksi.edit',$tran->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $transaksi->links() !!}
      
@endsection