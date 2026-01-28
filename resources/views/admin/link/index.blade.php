@php use Illuminate\Support\Str; @endphp

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
        @endsession

        <div class="card">
            <div class="card-header">Link List</div>
            <div class="card-body">
                <a href="#">Trash</a>

                <a href="{{ route('createLink') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New link</a>

                <form action="{{ route('homeLink') }}" method="GET" class="d-flex mb-3">
                    <input type="text" id="search" name="search" placeholder="Search links..." class="form-control mb-3">
                </form>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Img</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($links as $link)
                        <tr>
                            <td><img src="{{ asset($link->link_logo) }}" alt="{{ $link->link_name }}" width="50"></td>
                            <td>{{ $link->link_name }}</td>
                            <td>
                                <a href="{{ $link->link_address }}" target="_blank">
                                    {{ Str::limit($link->link_address, 40) }}
                                </a>
                            </td>

                            <td>
                                <form action="{{ route('deleteLink', $link) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('editLink', $link->id_link) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>


                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this link?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="6">
                            <span class="text-danger">
                                <strong>No Link Found!</strong>
                            </span>
                        </td>
                        @endforelse
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

