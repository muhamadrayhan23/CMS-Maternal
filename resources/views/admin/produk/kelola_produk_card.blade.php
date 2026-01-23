{{-- @extends('admin.produk.layout.main')

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
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">MANAGE PRODUCTS</h3>
        <a href="{{ route('produk.create') }}" class="btn btn-danger">
            + Add New Product
        </a>
    </div>

    <div class="row mb-3">
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Search Products">
        </div>
        <div class="col-md-3">
            <select class="form-control">
                <option>Sort</option>
                <option value="name">Tersedia</option>
                <option value="price">Soldout</option>
            </select>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Status</th>
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
                            {{-- <td>
                                <form action="{{ route('produk.toggle', $p->id_product) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" onchange="this.form.submit()"
                                            {{ $p->is_active ? 'checked' : '' }}>
                                    </div>
                                </form>
                            </td> --}}
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
                                    <img src="{{ asset('storage/' . $p->details->first()->image_product) }}"
                                        width="40" alt="Product Image">
                                @else
                                    -
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('produk.show', $p->id_product) }}"
                                    class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-eye"></i>
                                    Detail
                                </a>

                                <a href="{{ route('produk.edit', $p->id_product) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                <form action="{{ route('produk.destroy', $p->id_product) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus produk?')"
                                        class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $produk->links() }}
            </div>
        </div>
    </div>
</body>

</html>
{{-- @endsection --}}
