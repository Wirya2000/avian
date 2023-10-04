@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Area Sales Toko</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/table_c/{{ $table_c->kode_toko }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="area_sales" class="form-label">Area Sales</label>
        <input type="text" class="form-control" @error('area_sales') is-invalid @enderror id="area_sales" name="area_sales" required autofocus value="{{ $table_c->area_sales }}">
        @error('area_sales')
         <div class="invalid-feedback">
           {{ $message }}   
        </div>   
        @enderror
      </div>
      
      <button type="submit" class="btn btn-primary">Edit Transaction</button>
    </form>
  </div>
@endsection