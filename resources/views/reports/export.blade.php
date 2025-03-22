<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <h1>Laporan Transaksi</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nomer Polisi</th>
            <th scope="col">Merk</th>
            <th scope="col">Nama</th>
            <th scope="col">No Ponsel</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tanggal Pesan</th>
            <th scope="col">Lama</th>
            <th scope="col">Total harga</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $transaction->car->policeNumber }}</td>
                <td>{{ $transaction->car->merk }}</td>
                <td>{{ $transaction->name }}</td>
                <td>{{ $transaction->phone }}</td>
                <td>{{ $transaction->address }}</td>
                <td>{{ $transaction->rentDate }}</td>
                <td>{{ $transaction->rentTime }}</td>
                <td>{{ $transaction->total }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>