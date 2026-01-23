{{-- @extends('admin.layout.main')
@section('content') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>History Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container-fluid">
        <h3 class="fw-bold mb-4">History Produk</h3>

        <div class="row">
            @foreach ($produk as $p)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong>{{ $p->product_name }}</strong>

                            @if ($p->deleted_at)
                                <span class="badge bg-danger">Deleted</span>
                            @else
                                <span class="badge bg-success">Active</span>
                            @endif
                        </div>

                        <div class="card-body">
                            <p><strong>Price :</strong><br>
                                Rp {{ number_format($p->price, 0, ',', '.') }}
                            </p>

                            <p><strong>Link :</strong><br>
                                @if ($p->link)
                                    <a href="{{ $p->link }}" target="_blank">Open Link</a>
                                @else
                                    -
                                @endif
                            </p>

                            <hr>

                            <p><strong>Created By :</strong>
                                {{ optional($p->creator)->name ?? '-' }}
                            </p>

                            <p><strong>Updated By :</strong>
                                {{ optional($p->updater)->name ?? '-' }}
                            </p>

                            <p><strong>Deleted By :</strong>
                                {{ optional($p->deleter)->name ?? '-' }}
                            </p>

                            <hr>

                            <p><strong>Created At :</strong><br>
                                {{ $p->created_at }}
                            </p>

                            <p><strong>Updated At :</strong><br>
                                {{ $p->updated_at ?? '-' }}
                            </p>

                            <p><strong>Deleted At :</strong><br>
                                {{ $p->deleted_at ?? '-' }}
                            </p>
                        </div>

                        <div class="card-footer text-end">
                            <a href="{{ route('produk.show', $p->id_product) }}"
                                class="btn btn-sm btn-outline-secondary">
                                Detail
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>

{{-- @endsection --}}
