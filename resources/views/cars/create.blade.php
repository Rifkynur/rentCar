<div class="col-sm-12 mt-4">
    <div class="bg-light rounded h-100 p-4 ">
        <h6 class="mb-4">Add Cars</h6>
        <form wire:submit.prevent = "store">
            @csrf
            <div class="mb-3">
                <label for="policeNumber" class="form-label">Nomer Polisi</label>
                <input type="text" class="form-control" id="policeNumber" placeholder="masukan nomer polisi" wire:model="policeNumber">
                @error('policeNumber')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk" placeholder="masukan merk" wire:model="merk">
                @error('merk')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>    
            <div class="mb-3">
                <label for="type" class="form-label">Tipe</label>
                <select name="" id="type" class="form-select" wire:model="type">
                    <option value="">--Pilih--</option>
                    <option value="mpv">Mpv</option>
                    <option value="suv">Suv</option>
                    <option value="sedan">Sedan</option>
                </select>
                @error('type`')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="capacity" class="form-label">Kapasitas</label>
                <input type="text" class="form-control" id="capacity" placeholder="masukan kapasitas" wire:model='capacity'>
                @error('capacity')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="text" class="form-control" id="price" placeholder="masukan harga" wire:model='price'>
                @error('price')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="file" placeholder="masukan foto" wire:model='photo'>
                @error('photo')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>