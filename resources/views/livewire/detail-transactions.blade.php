<div>
    <div class="col-sm-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h6 class="mb-4">Daftar Transaksi</h6>
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
                        <th scope="col">Status</th>
                        <th scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
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
                        <td>{{ $transaction->status }}</td>
                    </tr>
                        
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Transaksi Belum Ada</td>
                        </tr>
                    @endforelse
                    {{ $transactions->links() }}
                </tbody>
            </table>
        </div>
           
    </div>
</div>
