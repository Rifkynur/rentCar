<div>
    <div class="col-sm-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <h6 class="mb-4">Daftar Mobil</h6>

            <div class="row ">
                @forelse ($cars as $car)
                <div class="col-sm-6 col-lg-4">
                    <div class="card " >
                        <img src="{{ asset('storage/cars/'.$car->photo ) }}" class="card-img-top mx-auto" alt="..." style="width: 200px;">
                        <div class="card-body">
                            <h5 class="card-title text-capitalize">{{ $car->merk }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $car->policeNumber }}</li>
                            <li class="list-group-item">Rp.{{ $car->price }}</li>
                            <li class="list-group-item">{{ $car->capacity }} orang</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" wire:click='create({{ $car->id }},{{ $car->price }})' class="btn btn-outline-primary">Pesan</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center">Data mobil kosong</div>
                @endforelse
            </div>
          {{ $cars->links() }}
        </div>
            @if ($addPage)
                @include('transactions.create')
            @endif
          
    </div>
</div>
