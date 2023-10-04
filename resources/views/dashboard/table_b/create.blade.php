@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Transaction</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/table_b" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="kode_toko" class="form-label">Kode Toko</label>
        <select class="form-select" name="kode_toko">
          @foreach ($table_as as $table_a)
          @if (old('kode_toko') == $table_a->kode_toko_baru)
            <option value="{{ $table_a->kode_toko_baru }}" selected>{{ $table_a->kode_toko_baru }}</option>
          @else
            <option value="{{ $table_a->kode_toko_baru }}">{{ $table_a->kode_toko_baru }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="nominal_transaksi" class="form-label">Nominal Transaksi</label>
        <input type="number" class="form-control" @error('nominal_transaksi') is-invalid @enderror id="nominal_transaksi" name="nominal_transaksi" required autofocus value="{{ old('nominal_transaksi') }}" max="1264" min="1">
        @error('nominal_transaksi')
         <div class="invalid-feedback">
           {{ $message }}   
        </div>   
        @enderror
      </div>

      
      <button type="submit" class="btn btn-primary">Create Transaction</button>
    </form>
  </div>
@endsection