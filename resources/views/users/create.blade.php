<div class="col-sm-12 mt-4">
    <div class="bg-light rounded h-100 p-4 ">
        <h6 class="mb-4">Add User</h6>
        <form wire:submit.prevent = "store">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" placeholder="masukan nama" value="{{ @old('name') }}" wire:model="name">
                @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="masukan email" value="{{ @old('email') }}" wire:model="email">
                @error('email')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>    
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="masukan password" wire:model='password'>
                @error('password')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Role</label>
                <select name="" id="role" class="form-select" wire:model='role'>
                    <option value="">--Pilih--</option>
                    <option value="admin">Admin</option>
                    <option value="pemilik">Pemilik</option>
                </select>
                @error('role')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Sign in</button>
        </form>
    </div>
</div>