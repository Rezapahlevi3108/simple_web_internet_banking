@extends('layouts.main')

@section('content')

    <div class="card bg-white shadow border-0 mx-auto w-50 my-5">
        <a href="{{ route('home') }}" class="font-weight-500 color-primary-1 m-3">
            <i class="fa-solid fa-arrow-left me-1" style="color: #5e99a8;"></i>
            Back
        </a>
        <div class="p-5 pt-4">
            @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <form enctype="multipart/form-data" method="POST" action="{{ route('profileUpdate') }}">
                @csrf
                <div class="d-flex align-items-center">
                    <img src="{{ $user->userDetail->profile_photo ? asset('profile/' . $user->userDetail->profile_photo) : asset('img/profile.svg') }}" id="preview" class="rounded" height="100px" width="100px" alt="photo_profil" style="object-fit: cover">
                    <x-button type="button" class="ms-3 py-2 px-3" onclick="document.getElementById('file').click()">Pilih Foto</x-button>
                    <input type="file" name="file" id="file" class="d-none">
                </div>
                <div class="mt-5">
                    <div class="form-group mb-3">
                        <label class="mb-2">Nama Lengkap <span class="text-danger fw-bold">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2">Email <span class="text-danger fw-bold">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2">Telepon <span class="text-danger fw-bold">*</span></label>
                        <input type="text" class="form-control" name="phone" value="{{ $user->userDetail->phone }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2">Alamat <span class="text-danger fw-bold">*</span></label>
                        <textarea class="form-control" name="address" rows="3">{{ $user->userDetail->address }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <x-button type="submit" class="py-2 px-3">Simpan</x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script>
    document.getElementById("file").addEventListener("change", function() {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById("preview").src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection