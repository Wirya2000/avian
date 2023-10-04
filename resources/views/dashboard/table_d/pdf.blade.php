<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wirya Avian | Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Sales Data</h1>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-lg">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Sales</th>
            <th scope="col">Nama Sales</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($table_ds as $table_d)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $table_d->kode_sales }}</td>
            <td>{{ $table_d->nama_sales }}</td>
          </tr>
              
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>
