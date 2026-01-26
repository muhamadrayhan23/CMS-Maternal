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

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Dihapus Oleh</th>
                    <th>Dihapus Pada</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $p)
                    <tr>
                        <td>{{ $p->product_name }}</td>
                        <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                        <td>{{ optional($p->deleter)->name ?? '-' }}</td>
                        <td>{{ $p->deleted_at }}</td>
                        <td>
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
{{-- @endsection --}}
