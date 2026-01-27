<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@include('layout.sidebarAdmin')

<body>
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
            <a href="{{ route('produk.restore') }}" class="btn btn-danger">
                Trash
            </a>
            <a href="{{ route('produk.index') }}" class="btn btn-danger">
                List View
            </a>
            <a href="{{ route('produk.kelola_card') }}" class="btn btn-danger">
                Grid View
            </a>
            <a href="{{ route('produk.create') }}" class="btn btn-danger">
                + Add New Product
            </a>
        </div>

        <div class="row mb-3">
            <form method="GET" action="{{ route('produk.kelola_card') }}">
                <div class="row mb-3">
                    <div class="col-md-9">
                        <input type="text" name="search" class="form-control" placeholder="Search Products"
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark w-100">
                            Search Products
                        </button>
                        <a href="{{ route('produk.kelola_card') }}" class="btn btn-danger">
                            Reset
                        </a>
                    </div>
                </div>
            </form>

            <div class="col-md-3">
                <select class="form-control">
                    <option>Sort By Status</option>
                    <option value="name">Published</option>
                    <option value="price">Unpublished</option>
                </select>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            @foreach ($produk as $p)
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm position-relative">

                        <span
                            class="badge position-absolute top-0 start-0 m-2 {{ $p->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $p->is_active ? 'Published' : 'Unpublished' }}
                        </span>

                        <div class="dropdown position-absolute top-0 end-0 m-2">
                            <button class="btn btn-sm btn-light border" data-bs-toggle="dropdown">
                                &#8942;
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>
                                    <form action="{{ route('produk.toggle', $p->id_product) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="dropdown-item">
                                            {{ $p->is_active ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                </li>

                                @if ($p->link)
                                    <li>
                                        <a class="dropdown-item" href="{{ $p->link }}" target="_blank">
                                            View Link
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a class="dropdown-item" href="{{ route('produk.edit', $p->id_product) }}">
                                        Edit
                                    </a>
                                </li>

                                <li>
                                    <form action="{{ route('produk.destroy', $p->id_product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item text-danger"
                                            onclick="return confirm('Hapus produk?')">
                                            Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        @if (optional($p->details->first())->image_product)
                            <img src="{{ asset('storage/' . $p->details->first()->image_product) }}"
                                class="card-img-top" style="height:200px; object-fit:cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center"
                                style="height:200px;">
                                No Image
                            </div>
                        @endif

                        <div class="card-body">
                            <h6 class="fw-bold">{{ $p->product_name }}</h6>
                            <p class="text-muted small mb-2">
                                {{ Str::limit($p->desc, 60) }}
                            </p>
                            <div class="fw-semibold">
                                Rp {{ number_format($p->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="card-footer text-muted small">
                            Created {{ $p->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $produk->links() }}
        </div>

    </body>

    </html>
