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
@include('layout.sidebarAdmin')

<body>
    <main class="flex-1 min-h-screen md:ml-64 transition-all duration-300">
        <div class="p-10">
            @yield('content')
        </div>
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
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-danger">
                            {{ isset($produk) ? 'Update Product' : 'Save Product' }}
                        </button>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="product_name" class="form-control"
                            value="{{ old('product_name', $produk->product_name ?? '') }}" required>
                    </div>

                    <div class="field">
                        <label>Description</label>
                        <input type="text" name="desc" value="{{ old('desc', $produk->desc ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control"
                            value="{{ old('price', $produk->price ?? '') }}" required>
                    </div>
                </div>

                <br>

                <h5 class="fw-bold mb-3">Product Links</h5>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Product Links</label>

                    <div id="links">
                        @if (isset($produk) && $produk->links->count())
                            @foreach ($produk->links as $link)
                                <div class="link-row mb-2">
                                    <input type="text" name="link_name[]" class="form-control mb-1"
                                        value="{{ $link->link_name }}" placeholder="Link Name">

                                    <input type="url" name="link_address[]" class="form-control mb-1"
                                        value="{{ $link->link_address }}" placeholder="Link Address">

                                    <input type="file" name="link_image[]">

                                    @if ($link->link_image)
                                        <img src="{{ asset('storage/' . $link->link_image) }}" width="80">
                                    @endif

                                    <button type="button" onclick="removeLink(this)">✖</button>
                                </div>
                            @endforeach
                        @else
                            <div class="link-row mb-2">
                                <input type="text" name="link_name[]" class="form-control mb-1"
                                    placeholder="Link Name">
                                <input type="url" name="link_address[]" class="form-control mb-1"
                                    placeholder="Link Address">
                                <input type="file" name="link_image[]">
                            </div>
                        @endif
                    </div>

                    <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="addLink()">
                        ➕ Add More Link
                    </button>
                </div>


                <h5 class="fw-bold mb-3">Product Attributes</h5>
                <div id="detail-wrapper">
                    @php
                        $details = $produk->details ?? collect([null]);
                    @endphp
                    @foreach ($details as $detail)
                        <div class="detail-row">
                            <input type="hidden" name="detail_id[]" value="{{ $detail->id ?? '' }}">

                            <div class="field">
                                <label>Image</label>
                                <input type="file" name="image_product[]">
                                @if (!empty($detail?->image_product))
                                    <img src="{{ asset('storage/' . $detail->image_product) }}" width="80">
                                @endif
                            </div>

                            <div class="field">
                                <label>Attribute Name</label>
                                <input type="text" name="atribute_name[]"
                                    value="{{ $detail->atribute_name ?? '' }}">
                            </div>

                            <div class="field">
                                <label>Attribute Value</label>
                                <input type="text" name="atribut_value[]"
                                    value="{{ $detail->atribut_value ?? '' }}">
                            </div>
                            <button type="button" onclick="removeRow(this)">✖</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn-add" onclick="addRow()">➕ Add More Attribute</button>
        </div>
        </form>
        </div>
    </main>
</body>
<script>
    function addRow() {
        const wrapper = document.getElementById('detail-wrapper');

        wrapper.insertAdjacentHTML('beforeend', `
            <div class="detail-row" style="border:1px solid #ddd; padding:10px; margin-bottom:10px;">
                <input type="hidden" name="detail_id[]" value="">

                <div class="field">
                    <label>Image</label>
                    <input type="file" name="image_product[]">
                </div>

                <div class="field">
                    <label>Attribute Name</label>
                    <input type="text" name="atribute_name[]">
                </div>

                <div class="field">
                    <label>Attribute Value</label>
                    <input type="text" name="atribut_value[]">
                </div>

                <button type="button" onclick="removeRow(this)">✖</button>
            </div>
        `);
    }

    function removeRow(button) {
        button.closest('.detail-row').remove();
    }

    function addLink() {
        const link = document.getElementById('Links');

        link.insertAdjacentHTML('beforeend', `
            <div class="col-md-12 mb-3" id="Links">
                <label class="form-label">Link</label>
                <input type="text" name="link" class="form-control"
                    value="{{ old('link', $produk->link ?? '') }}">
            </div>
        `);
    }

    function removeLink(button) {
        button.closest('.linK').remove();
    }
</script>


</html>


{{-- @endsection --}}
