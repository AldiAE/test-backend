@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah transaksi</h2>
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
   
<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis:</strong>
                <select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
                    <option value="">Pilih Jenis</option>
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kategori:</strong>
                <select class="form-select" aria-label="Default select example" name="nama_kategori" id="nama_kategori">
                    <option value="">Pilih Kategori</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nominal:</strong>
                <input type="number" name="nominal" class="form-control" placeholder="Nominal">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Deskripsi"></textarea>
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