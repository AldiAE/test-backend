@extends('layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transaksi.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('transaksi.update',$transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis:</strong>
                    <select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
                        <option value="Pemasukan" {{ $transaksi->jenis == 'Pemasukan' ? 'selected' : '' }} >Pemasukan</option>
                        <option value="Pengeluaran" {{ $transaksi->jenis == 'Pengeluaran' ? 'selected' : '' }} >Pengeluaran</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Kategori:</strong>
                    <select class="form-select" aria-label="Default select example" name="nama_kategori" id="nama_kategori">
                        <option value="Pemasukan" {{ $transaksi->nama_kategori == 'Pemasukan' ? 'selected' : '' }} >Pemasukan</option>
                        <option value="Pengeluaran" {{ $transaksi->nama_kategori == 'Pengeluaran' ? 'selected' : '' }} >Pengeluaran</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nominal:</strong>
                    <input type="number" name="nominal" class="form-control" value="{{ $transaksi->nominal }}" placeholder="Nominal">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Deskripsi">{{ $transaksi->deskripsi }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
    
            const jenis = '{{ $transaksi->jenis }}';
    
            $.ajax({
                type: "POST",
                url: "{{ route('transaksi.getKategori') }}",
                data: {
                    'jenis' : jenis,
                    'method' : '{{ $transaksi->nama_kategori }}'
                },
                dataType: "json",
                success: function (response) {
                    let html = '';
                    $.each(response, function (i, v) { 
                        html += v;
                    });
                    $('#nama_kategori').html(html);
                }
            });

            $('#jenis').change(function (e) { 
                e.preventDefault();
    
                const jenis = $('#jenis').val();
    
                $.ajax({
                    type: "POST",
                    url: "{{ route('transaksi.getKategori') }}",
                    data: {
                        'jenis' : jenis
                    },
                    dataType: "json",
                    success: function (response) {
                        let html = '';
                        $.each(response, function (i, v) { 
                            html += v;
                        });
                        $('#nama_kategori').html(html);
                    }
                });
            });
        });
    </script>
@endsection