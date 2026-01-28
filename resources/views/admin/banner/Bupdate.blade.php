@extends('layout.admin')

@section('content')

<h1>Edit Banner</h1>
<form action="{{ route ('updateBanner', $banner->id_banner)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="banner_name">Banner name : </label>
    <input type="text" name="banner_name" id="banner_name" value="{{$banner->banner_name}}">
    <label for="banner_image"> Image : </label>
    {{-- <img src="{{ asset('img/'.$banner->banner_image) }}" width="150"> --}}
    <input type="text" value="{{ $banner->banner_image}}" readonly>
    <input type="file" name="banner_image" id="banner_image">

    <button>Submit</button>
</form>

@endsection