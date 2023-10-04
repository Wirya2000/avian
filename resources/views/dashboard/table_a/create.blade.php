@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Toko</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/table_a" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="kode_toko_baru" class="form-label">Kode Toko</label>
        <input type="number" class="form-control" @error('kode_toko_baru') is-invalid @enderror id="kode_toko_baru" name="kode_toko_baru" required autofocus value="{{ old('kode_toko_baru') }}" max="1264" min="1">
        @error('kode_toko_baru')
         <div class="invalid-feedback">
           {{ $message }}   
        </div>   
        @enderror
      </div>

      
      <button type="submit" class="btn btn-primary">Create Toko</button>
    </form>
  </div>
@endsection