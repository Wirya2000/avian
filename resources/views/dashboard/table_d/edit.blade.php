@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Sales</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/table_d/{{ $table_d->kode_sales }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="kode_sales" class="form-label">Kode Sales</label>
        <input type="text" class="form-control" @error('kode_sales') is-invalid @enderror id="kode_sales" name="kode_sales" required autofocus value="{{ $table_d->kode_sales }}">
        @error('kode_sales')
         <div class="invalid-feedback">
           {{ $message }}   
        </div>   
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama_sales" class="form-label">Nama Sales</label>
        <input type="text" class="form-control" @error('nama_sales') is-invalid @enderror id="nama_sales" name="nama_sales" required autofocus value="{{ $table_d->nama_sales }}">
        @error('nama_sales')
         <div class="invalid-feedback">
           {{ $message }}   
        </div>   
        @enderror
      </div>
      
      <button type="submit" class="btn btn-primary">Edit Sales</button>
    </form>
  </div>
@endsection