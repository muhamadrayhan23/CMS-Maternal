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
                <option value="name">Name</option>
                <option value="price">Price</option>
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
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Link</th>
                        <th>Image</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->product_name }}</td>
                            <td>
                                {{ optional($p->details->first())->desc ?? '-' }}
                            </td>
                            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                            <td>
                                @if ($p->is_active)
                                    <span class="badge bg-success">Stok Ada</span>
                                @else
                                    <span class="badge bg-danger">Sold Out</span>
                                @endif
                            </td>

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
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link">Previous</a></li>
                        <li class="page-item active"><a class="page-link">1</a></li>
                        <li class="page-item"><a class="page-link">2</a></li>
                        <li class="page-item"><a class="page-link">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>
{{-- @endsection --}}
