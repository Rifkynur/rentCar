<div class="col-sm-12 mt-4">
    <div class="bg-light rounded h-100 p-4 ">
        <h6 class="mb-4">Add Transaction</h6>
        <form wire:submit.prevent = "store">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="name" placeholder="masukan nomer nama" wire:model="name">
                @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">No Ponsel</label>
                <input type="text" class="form-control" id="phone" placeholder="masukan nomer ponsel" wire:model="phone">
                @error('phone')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>    
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea  id="address" cols="30" rows="5" class="form-control" wire:model="address" placeholder="Masukan alamat"></textarea>
                @error('address')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rentTime" class="form-label">Lama Sewa</label>
                <input type="number" class="form-control" id="rentTime" placeholder="masukan lama sewa" wire:model='price'>
                @error('rentTime')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rentDate" class="form-label">Tanggal sewa</label>
                <input type="date" class="form-control" id="rentDate" placeholder="masukan tanggal sewa" wire:model='price'>
                @error('rentDate')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>