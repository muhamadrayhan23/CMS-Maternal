<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Links
                </div>
                <div class="float-end">
                    <a href="{{ route('homeLink') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('storeLink') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="link_name" class="col-md-4 col-form-label text-md-end text-start">Link Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('link_name') is-invalid @enderror" id="link_name" name="link_name" value="{{ old('link_name') }}">
                            @error('link_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="link_logo" class="col-md-4 col-form-label text-md-end text-start">Link Logo</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control @error('link_logo') is-invalid @enderror" id="link_logo" name="link_logo" value="{{ old('link_logo') }}">
                            @error('link_logo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="link_address" class="col-md-4 col-form-label text-md-end text-start">Link Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('link_address') is-invalid @enderror" id="link_address" name="link_address" value="{{ old('link_address') }}">
                            @error('link_address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Link">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>