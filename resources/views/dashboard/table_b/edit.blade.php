@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Transaction</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/table_b/{{ $table_b->kode_toko }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="nominal_transaksi" class="form-label">Nominal Transaksi</label>
        <input type="number" class="form-control" @error('nominal_transaksi') is-invalid @enderror id="nominal_transaksi" name="nominal_transaksi" required autofocus value="{{ $table_b->nominal_transaksi }}" max="1264" min="1">
        @error('nominal_transaksi')
         <div class="invalid-feedback">
           {{ $message }}   
        </div>   
        @enderror
      </div>
      
      <button type="submit" class="btn btn-primary">Edit Transaction</button>
    </form>
  </div>
@endsection