<div>
    <div class="col-sm-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h6 class="mb-4">User List</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomer Polisi</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Foto</th>
                        <th scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cars as $car)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $car->policeNumber }}</td>
                        <td>{{ $car->merk }}</td>
                        <td>{{ $car->type }}</td>
                        <td>{{ $car->capacity }}</td>
                        <td>{{ $car->price }}</td>
                        <td>
                            <img src="{{ asset('storage/cars/'.$car->photo) }}" alt="{{ $car->merk }}" class="w-3" style="width: 50px">
                        </td>
                        <td>
                            <button class="btn btn-warning" wire:click="edit({{ $car->id }})">Edit</button>
                            <button class="btn btn-danger" wire:click="destroy({{ $car->id }})">Delete</button>
                        </td>
                    </tr>
                        
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Mobil Belum Ada</td>
                        </tr>
                    @endforelse
                    {{ $cars->links() }}
                </tbody>
            </table>
            <button wire:click="create" class="btn btn-primary">Tambah</button>
        </div>
            @if ($addPage)
                @include('cars.create')
            @endif
            @if ($editPage)
                @include('cars.edit')
            @endif
    </div>
</div>
