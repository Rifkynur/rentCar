<div>
    <div class="col-sm-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h6 class="mb-4">Daftar User</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button class="btn btn-warning" wire:click="edit({{ $user->id }})">Edit</button>
                            <button class="btn btn-danger" wire:click="destroy({{ $user->id }})">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    {{ $users->links() }}
                </tbody>
            </table>
            <button wire:click="create" class="btn btn-primary">Tambah</button>
        </div>
        @if ($addPage)
            @include('users.create')
        @endif
        @if ($editPage)
            @include('users.edit')
        @endif
    </div>
</div>
