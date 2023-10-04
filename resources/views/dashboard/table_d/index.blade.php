@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Sales Data</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
@endif
<form action="{{ route('table_d.import') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="file" class="form-control">
  <br>
  <button class="btn btn-success">
    Import Data
  </button>
  <a class="btn btn-warning" href="{{ route('table_d.export') }}"> Export Data To Excel
  </a>
  <a class="btn btn-info" href="{{ route('table_d.exportPDF') }}"> Export Data To PDF
  </a>
</form>

<div class="table-responsive mt-1">
  <a href="/table_d/create" class="btn btn-primary mb-3">Create New Sales data</a>
  <table class="table table-striped table-lg">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kode Sales</th>
        <th scope="col">Nama Sales</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($table_ds as $table_d)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $table_d->kode_sales }}</td>
        <td>{{ $table_d->nama_sales }}</td>
        <td>
          {{-- <a href="/table_d/{{ $table_d->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
          <a href="/table_d/{{ $table_d->kode_sales }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/table_d/{{ $table_d->kode_sales }}" method="POST" class="d-inline">
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