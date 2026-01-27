<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Edit Link</div>

            <div class="card-body">

                <form action="{{ route ('adm-links.update', $link->id_link)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Link Name</label>
                        <input
                            type="text"
                            name="link_name"
                            class="form-control @error('link_name') is-invalid @enderror"
                            value="{{ old('link_name', $link->link_name) }}">
                        @error('link_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Link Logo</label>
                        <input
                            type="file"
                            name="link_logo"
                            class="form-control @error('link_logo') is-invalid @enderror"
                            value="{{ old('link_logo', $link->link_logo) }}">
                        @error('link_logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Link Address</label>
                        <input
                            type="text"
                            name="link_address"
                            class="form-control @error('link_address') is-invalid @enderror"
                            value="{{ old('link_address', $link->link_address) }}">
                        @error('link_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('adm-links.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>