@extends('layout.template')

@section('konten')

<form action='{{ url('Mobil') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('Mobil') }}' class="btn btn-secondary"><< kembali</a>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="bahan_bakar" class="col-sm-2 col-form-label">Bahan Bakar</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='bahan_bakar' value="{{ Session::get('bahan_bakar') }}" id="bahan_bakar">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="asal_negara" class="col-sm-2 col-form-label">Asal Negara</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='asal_negara' value="{{ Session::get('asal_negara') }}" id="asal_negara">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="asal_negara" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>

@endsection
