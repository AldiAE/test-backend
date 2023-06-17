@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Kategori</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('kategori.create') }}"> Tambah Kategori</a>
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
            <th>Tipe</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($kategori as $kat)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $kat->tipe }}</td>
            <td>{{ $kat->nama_kategori }}</td>
            <td>{{ $kat->deskripsi }}</td>
            <td>
                <form action="{{ route('kategori.destroy',$kat->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('kategori.edit',$kat->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $kategori->links() !!}
      
@endsection