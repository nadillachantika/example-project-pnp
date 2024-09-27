@extends('admin.layouts.master')
@section('title', 'Create Informasi')

@section('content')
    <div class="col-md-8 px-4">
        <div class="card p-2">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Create Information</p>
                    <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.informasi') }}">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Judul</label>
                                <input class="form-control" type="text" placeholder="Judul" name="title"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Deksripsi</label>
                                <textarea class="form-control" type="text" placeholder="Deksripsi" name="description" onfocus="focused(this)"
                                    onfocusout="defocused(this)"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" name="image" onchange="previewImage(event)"
                                    @error('image') is-invalid @enderror>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="col-auto mt-3">
                                    <div class="avatar avatar-xxl position-relative">
                                        <img alt="image" class="w-100 border-radius-sm" id="preview_image">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-success btn-sm ms-auto" type="submit">Simpan</>
                                </div>

                        </form>
                    </div>




                </div>

            </div>
        </div>
    </div>
    </div>

@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
