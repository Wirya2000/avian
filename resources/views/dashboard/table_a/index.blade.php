@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Toko Data</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
@endif
<form action="{{ route('table_a.import') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="file" class="form-control">
  <br>
  <button class="btn btn-success">
    Import Data
  </button>
  <a class="btn btn-warning" href="{{ route('table_a.export') }}"> Export Data To Excel
  </a>
  <a class="btn btn-info" href="{{ route('table_a.exportPDF') }}"> Export Data To PDF
  </a>
</form>

<div class="table-responsive mt-1">
  <a href="/table_a/create" class="btn btn-primary mb-3">Create New Toko data</a>
  <table class="table table-striped table-lg">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kode Toko Baru</th>
        <th scope="col">Kode Toko Lama</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($table_as as $table_a)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $table_a->kode_toko_baru }}</td>
        <td>{{ $table_a->kode_toko_lama }}</td>
        <td>
          {{-- <a href="/table_a/{{ $table_a->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
          <a href="/table_a/{{ $table_a->kode_toko_baru }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/table_a/{{ $table_a->kode_toko_baru }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
          
      @endforeach
    </tbody>
  </table>
</div>

@endsection