@section('title', isset($produk) ? 'Update Product' : 'Save Product')
@include('layout.sidebarAdmin')

<main class="flex-1 min-h-screen md:ml-64 transition-all duration-300">
    <div class="p-10"> @yield('content') </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title fw-bold"> {{ isset($produk) ? 'Edit Product' : 'Add New Product' }} </h3>
        </div>
        <form action="{{ isset($produk) ? route('produk.update', $produk->id_product) : route('produk.store') }}"
            method="POST" enctype="multipart/form-data"> @csrf @if (isset($produk))
                @method('PUT')
            @endif

            <div class="card-body">
                <div class="card-body">
                    <div class="card-footer text-end"> <button type="submit" class="btn btn-danger">
                            {{ isset($produk) ? 'Update Product' : 'Save Product' }} </button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="product_name" class="form-control"
                            value="{{ old('product_name', $produk->product_name ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="desc" class="form-control"
                            value="{{ old('desc', $produk->desc ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control"
                            value="{{ old('price', $produk->price ?? '') }}" required>
                    </div>

                    <h5 class="fw-bold mb-3">Product Links</h5>
                    <div id="links">
                        @if (isset($produk) && $produk->links->count())
                            @foreach ($produk->links as $link)
                                <div class="link-row mb-3 border p-2 rounded">
                                    <input type="text" name="link_name[]" class="form-control mb-1"
                                        value="{{ $link->link_name }}" placeholder="Link Name">

                                    <input type="url" name="link_address[]" class="form-control mb-1"
                                        value="{{ $link->link_address }}" placeholder="Link Address">

                                    <input type="file" name="link_image[]">

                                    @if ($link->link_image)
                                        <img src="{{ asset('storage/' . $link->link_image) }}" width="80"
                                            class="mt-2">
                                    @endif

                                    <button type="button" class="btn btn-sm btn-danger mt-2"
                                        onclick="removeLink(this)">✖
                                        Remove</button>
                                </div>
                            @endforeach
                        @else
                            <div class="link-row mb-3 border p-2 rounded">
                                <input type="text" name="link_name[]" class="form-control mb-1"
                                    placeholder="Link Name">
                                <input type="url" name="link_address[]" class="form-control mb-1"
                                    placeholder="Link Address">
                                <input type="file" name="link_image[]">
                            </div>
                        @endif
                    </div>

                    <button type="button" class="btn btn-sm btn-secondary mb-4" onclick="addLink()">
                        ➕ Add More Link
                    </button>

                    <div id="detail-wrapper">
                        @php
                            $details = $produk->details ?? collect([null]);
                        @endphp

                        @foreach ($details as $detail)
                            <div class="detail-row border p-3 mb-3 rounded">
                                <input type="hidden" name="detail_id[]" value="{{ $detail->id ?? '' }}">

                                <div class="mb-2">
                                    <label>Image</label>
                                    <input type="file" name="image_product[]">
                                    @if (!empty($detail?->image_product))
                                        <img src="{{ asset('storage/' . $detail->image_product) }}" width="80"
                                            class="mt-2">
                                    @endif
                                </div>

                                <div class="mb-2">
                                    <label>Attribute Name</label>
                                    <input type="text" name="atribute_name[]" class="form-control"
                                        value="{{ $detail->atribute_name ?? '' }}">
                                </div>

                                <div class="mb-2">
                                    <label>Attribute Value</label>
                                    <input type="text" name="atribut_value[]" class="form-control"
                                        value="{{ $detail->atribut_value ?? '' }}">
                                </div>

                                <button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this)">✖
                                    Remove</button>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-sm btn-secondary mb-4" onclick="addRow()">
                        ➕ Add More Attribute
                    </button>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-danger">
                        {{ isset($produk) ? 'Update Product' : 'Save Product' }}
                    </button>
                </div>
        </form>
    </div>
</main>
<script>
    function addRow() {
        document.getElementById('detail-wrapper').insertAdjacentHTML('beforeend', `
            <div class="detail-row border p-3 mb-3 rounded">
                <input type="hidden" name="detail_id[]" value="">
                <div class="mb-2">
                    <label>Image</label>
                    <input type="file" name="image_product[]">
                </div>
                <div class="mb-2">
                    <label>Attribute Name</label>
                    <input type="text" name="atribute_name[]" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Attribute Value</label>
                    <input type="text" name="atribut_value[]" class="form-control">
                </div>
                <button type="button" class="btn btn-sm btn-danger"
                        onclick="removeRow(this)">✖ Remove</button>
            </div>
        `);
    }

    function removeRow(btn) {
        btn.closest('.detail-row').remove();
    }

    function addLink() {
        document.getElementById('links').insertAdjacentHTML('beforeend', `
            <div class="link-row mb-3 border p-2 rounded">
                <input type="text" name="link_name[]" class="form-control mb-1" placeholder="Link Name">
                <input type="url" name="link_address[]" class="form-control mb-1" placeholder="Link Address">
                <input type="file" name="link_image[]">
                <button type="button" class="btn btn-sm btn-danger mt-2"
                        onclick="removeLink(this)">✖ Remove</button>
            </div>
        `);
    }

    function removeLink(btn) {
        btn.closest('.link-row').remove();
    }
</script>
