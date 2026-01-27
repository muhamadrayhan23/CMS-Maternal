{{-- @extends('admin.produk.layout.main')

@section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .product-detail {
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 15px;
            color: #333;
            text-decoration: none;
        }

        .product-wrapper {
            display: flex;
            gap: 40px;
        }

        /* LEFT */
        .product-images {
            width: 45%;
        }

        .main-image {
            width: 100%;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .thumbnail-list {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .thumb {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border: 1px solid #ddd;
            cursor: pointer;
            border-radius: 4px;
        }

        /* RIGHT */
        .product-info {
            width: 55%;
        }

        .product-title {
            font-size: 26px;
            margin-bottom: 10px;
        }

        .price {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .description {
            color: #555;
            margin-bottom: 20px;
        }

        .attributes h4 {
            margin-bottom: 8px;
        }

        .attributes p {
            margin: 4px 0;
        }

        .btn-link {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            border: 1px solid #000;
            text-decoration: none;
            color: #000;
            border-radius: 6px;
        }

        .meta {
            margin-top: 20px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
@include('layout.sidebarAdmin')

<body>

    <div class="product-detail">

        <a href="{{ route('produk.index') }}" class="back-link">← Detail Products</a>

        <div class="product-wrapper">
            {{-- LEFT : IMAGE --}}
            <div class="product-images">
                <img src="{{ asset('storage/' . $produk->details->first()->image_product) }}" class="main-image"
                    id="mainImage">

                <div class="thumbnail-list">
                    @foreach ($produk->details as $detail)
                        @if ($detail->image_product)
                            <img src="{{ asset('storage/' . $detail->image_product) }}" class="thumb"
                                onclick="changeImage(this.src)">
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- RIGHT : INFO --}}
            <div class="product-info">
                <h1 class="product-title">{{ $produk->product_name }}</h1>
                <div class="price">Rp {{ number_format($produk->price, 0, ',', '.') }}</div>

                <p class="description">
                    {{ $produk->desc }}
                </p>

                <div class="attributes">
                    <h4>Attributes</h4>
                    <p><strong>Color :</strong>
                        @foreach ($produk->details as $detail)
                            {{ $detail->atribute_name }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </p>
                    <p><strong>Size :</strong>
                        @foreach ($produk->details as $detail)
                            {{ $detail->atribute_value }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </p>
                </div>

                @if ($produk->link)
                    <a href="{{ $produk->link }}" target="_blank" class="btn-link">
                        🔗 Link
                    </a>
                @endif

                <div class="meta">
                    @if ($produk->updated_by && $produk->updated_at)
                        Updated by <strong>{{ $produk->updater?->name ?? '-' }}</strong><br>
                        Updated at {{ $produk->updated_at }}
                    @else
                        Created by <strong>{{ $produk->creator?->name ?? '-' }}</strong><br>
                        Created at {{ $produk->created_at }}
                    @endif
                </div>

            </div>
        </div>
    </div>

    {{-- JS --}}
    <script>
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>
    {{-- @endsection --}}

</body>

</html>
