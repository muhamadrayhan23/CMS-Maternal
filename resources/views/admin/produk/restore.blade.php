{{-- @extends('admin.layout.main')

@section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <h3 class="fw-bold mb-3">Recycle Bin Produk</h3>

        <a href="{{ route('produk.index') }}" class="btn btn-danger">
            Back
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Deleted At</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Harga</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $p)
                    <tr>
                        <td>{{ $p->deleted_at }}</td>
                        <td>{{ $p->is_active }}</td>
                        <td>{{ $p->product_name }}</td>
                        <td>{{ $p->desc }}</td>
                        <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                        <td>
                            @if ($p->link)
                                <a href="{{ $p->link }}" target="_blank">Link</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if (optional($p->details->first())->image_product)
                                <img src="{{ asset('storage/' . $p->details->first()->image_product) }}" width="40"
                                    alt="Product Image">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="dropdown position-absolute top-0 end-0 m-2">
                                <button class="btn btn-sm btn-light border" data-bs-toggle="dropdown">
                                    &#8942;
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">

                                    <li>
                                        <form action="{{ route('produk.restore.process', $p->id_product) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-success"
                                                onclick="return confirm('Pulihkan produk ini?')">
                                                Restore
                                            </button>
                                        </form>
                                    </li>

                                    <li>
                                        <form action="{{ route('produk.force.delete', $p->id_product) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus PERMANEN? Data tidak bisa dikembalikan!')">
                                                Delete Permanen
                                            </button>
                                        </form>
                                    </li>

                                    <li>
                                        <a href="{{ route('produk.detail_trash', $p->id_product) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-eye"></i>
                                            Detail
                                        </a>
                                    </li>
                                </ul>
                        </td>
                        {{-- <td>
                            <form action="{{ route('produk.restore.process', $p->id_product) }}" method="POST"
                                class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-success" onclick="return confirm('Pulihkan produk ini?')">
                                    Restore
                                </button>
                            </form>

                            <form action="{{ route('produk.force.delete', $p->id_product) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus PERMANEN? Data tidak bisa dikembalikan!')">
                                    Delete Permanen
                                </button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
{{-- @endsection --}}
