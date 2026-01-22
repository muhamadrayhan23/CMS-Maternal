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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title fw-bold">
                {{ isset($produk) ? 'Edit Product' : 'Add New Product' }}
            </h3>
        </div>

        <form action="{{ isset($produk) ? route('produk.update', $produk->id_product) : route('produk.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($produk))
                @method('PUT')
            @endif

            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control"
                            value="{{ old('product_name', $produk->product_name ?? '') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control"
                            value="{{ old('price', $produk->price ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Stok</label>
                        <select name="is_active" class="form-control">
                            <option value="1"
                                {{ old('is_active', $produk->is_active ?? 1) == 1 ? 'selected' : '' }}>
                                Stok Ada
                            </option>
                            <option value="0"
                                {{ old('is_active', $produk->is_active ?? 1) == 0 ? 'selected' : '' }}>
                                Sold Out
                            </option>
                        </select>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label class="form-label">Product Link</label>
                        <input type="text" name="link" class="form-control"
                            value="{{ old('link', $produk->link ?? '') }}">
                    </div>
                </div>

                <hr>
                <h5 class="fw-bold mb-3">Product Details</h5>

                <div id="detail-wrapper">

                    @php
                        $details = $produk->details ?? collect([null]);
                    @endphp

                    @foreach ($details as $detail)
                        <div class="detail-row">
                            <div class="field">
                                <label>Image</label>
                                <input type="file" name="image_product[]">
                                @if (!empty(optional($detail)->image_product))
                                    <img src="{{ asset('storage/' . $detail->image_product) }}" width="80"
                                        class="img-thumbnail">
                                @else
                                    -
                                @endif
                            </div>

                            <div class="field">
                                <label>Description</label>
                                <input type="text" name="desc[]" value="{{ $detail->desc ?? '' }}">
                            </div>

                            <button type="button" class="btn-remove" onclick="removeRow(this)">✖</button>
                        </div>
                    @endforeach

                </div>

                <button type="button" class="btn-add" onclick="addRow()">➕ Tambah Foto</button>

                <small class="text-muted d-block mt-2">
                    * Kosongkan jika tidak ingin diubah / ditambahkan
                </small>

            </div>

            <div class="card-footer text-end">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-danger">
                    {{ isset($produk) ? 'Update Product' : 'Save Product' }}
                </button>
            </div>
        </form>
    </div>
</body>
<script>
    function addRow() {
        const wrapper = document.getElementById('detail-wrapper');

        const row = document.createElement('div');
        row.className = 'detail-row';

        row.innerHTML = `
        <div class="field">
            <label>Image</label>
            <input type="file" name="image_product[]">
        </div>

        <div class="field">
            <label>Description</label>
            <input type="text" name="desc[]">
        </div>

        <button type="button" class="btn-remove" onclick="removeRow(this)">✖</button>
    `;

        wrapper.appendChild(row);
    }

    function removeRow(btn) {
        btn.parentElement.remove();
    }
</script>

</html>


{{-- @endsection --}}
