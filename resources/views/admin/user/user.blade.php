@php use Illuminate\Support\Str; @endphp

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
        @endsession

        <div class="card">
            <div class="card-header">User List</div>
            <div class="card-body">


                <a href="#">Trash</a>

                <a href="{{ route('createUser') }}" class="btn btn-success"> Add New Admin</a>

                <form action="{{ route('homeUser') }}" method="GET" class="d-flex mb-3">
                    <input type="text" id="search" name="search" placeholder="Search users..." class="form-control mb-3">
                </form>


                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Admin</td>

                            <td>
                                <form action="{{ route('deleteUser', $user) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this user?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                                <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                            </td>
                        </tr>
                        @empty
                        <td colspan="6">
                            <span class="text-danger">
                                <strong>No User Found!</strong>
                            </span>
                        </td>
                        @endforelse
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>