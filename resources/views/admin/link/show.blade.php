<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Links Information
                </div>
                <div class="float-end">
                    <a href="{{ route('adm-links.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="link_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Link Name:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $link->link_name }}
                    </div>
                </div>

                <div class="row">
                    <label for="link_address" class="col-md-4 col-form-label text-md-end text-start"><strong>Link Address:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $link->link_address }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>