{{-- @extends('admin.produk.layout.main')

@section('content') --}}
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title fw-bold">Product Detail</h3>

        <div>
            <a href="{{ route('produk.edit', $produk->id_product) }}" class="btn btn-sm btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>

            <a href="{{ route('produk.index') }}" class="btn btn-sm btn-secondary">
                Back
            </a>
        </div>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th width="200">Product Name</th>
                <td>{{ $produk->product_name }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>Rp {{ number_format($produk->price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Link</th>
                <td>
                    @if ($produk->link)
                        <a href="{{ $produk->link }}" target="_blank">
                            {{ $produk->link }}
                        </a>
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <th>Created By</th>
                <td>{{ $produk->creator->name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Updated By</th>
                <td>{{ $produk->updater->name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Deleted By</th>
                <td>{{ $produk->deleter->name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $produk->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $produk->updated_at }}</td>
            </tr>
        </table>

        <hr>

        <h5 class="fw-bold mb-3">Product Details</h5>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th width="60">No</th>
                    <th width="150">Image</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk->details as $detail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">
                            @if ($detail->image_product)
                                <img src="{{ asset('storage/' . $detail->image_product) }}" width="80"
                                    class="img-thumbnail">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $detail->desc }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            No product details
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
{{-- @endsection --}}
