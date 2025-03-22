<div>
    <div class="col-sm-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h6 class="mb-4">Data Laporan Transaksi</h6>
            <form class="row" wire:submit.prevent = "find">
                @csrf
                <div class="col-md-4">
                    <input type="date" wire:model='date1' id="" placeholder="masukan tanggal mulai" class="form-control">
                    @error('date1')
                    <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4">
                    <input type="date" wire:model='date2' id="" placeholder="masukan tanggal selesai" class="form-control">
                    @error('date2')
                    <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary " type="submit">Cari</button>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomer Polisi</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Sewa</th>
                        <th scope="col">Lama Sewa</th>
                        <th scope="col">Total</th>
                        {{-- <th scope="col">
                            Action
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $report->car->policeNumber }}</td>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->address }}</td>
                        <td>{{ $report->rentDate }}</td>
                        <td>{{ $report->rentTime }}</td>
                        <td>{{ $report->total }}</td>
                    </tr>
                        
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Mobil Belum Ada</td>
                        </tr>
                    @endforelse
                    {{ $reports->links() }}
                </tbody>
            </table>
            <button wire:click="export" class="btn btn-primary">Export PDF</button>
        </div>
    </div>
</div>
