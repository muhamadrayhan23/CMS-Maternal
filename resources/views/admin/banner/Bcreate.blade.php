@extends('layout.admin')


@section('content')
    <h1>Create Banner</h1>
    <form action="{{ route ('addBanner')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="banner_name" >Banner name : </label>
        <input type="text" name="banner_name" id="banner_name">
        <label for="banner_image"> Image : </label>
        <input type="file" name="banner_image" id="banner_image">

        <input type="hidden" name="is_active" value="0">

        <label class="switch">
        <input type="checkbox" name="is_active" value="1"
                     {{ old('is_active', $banner->is_active ?? 0) == 1 ? 'checked' : '' }}>
        <span class="slider"></span>
        </label>

        <button>Submit</button>
    </form>
@endsection
