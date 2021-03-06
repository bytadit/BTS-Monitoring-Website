@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Profil</h1>
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form class="col mb-5" action="/dashboard/users/{{ $user->id }}" method="post" enctype="multipart/form-data" >
        @method('patch')
        @csrf
        <div class="row-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if($user->photo)
                    <div style="max-height: 300px; max-width:300px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="foto admin" class="rounded-5 border border-2" style="max-height:300px;max-width:300px">
                    </div>
                @else
                    <img class="rounded-5 border border-2" src="https://thumbs.dreamstime.com/b/happy-office-guy-20610554.jpg" style="max-height:300px;max-width:300px">
                @endif
                <span id='fullName' class="font-weight-bold">{{ $user->firstName . ' ' . $user->lastName }}</span>

                @if($user->is_admin)
                    <span id='current-address' class="text-black-50">Administrator</span>
                @else
                    <span id='current-address' class="text-black-50">Surveyor</span>
                @endif
            </div>
        </div>
        <div class="row border-right">
            <div class="p-3 py-5">
                <div class="row mt-3">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='username'>Username</label>
                        <input id='username' name="username" type="text" class="form-control @error('username') is-invalid @enderror" required value="{{ old('username', $user->username) }}" autocomplete="username" autofocus>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='firstName'>Nama Depan</label>
                        <input id='firstName' name="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" placeholder="masukkan nama depan..." required value="{{ old('firstName', $user->firstName) }}" autocomplete="firstName" autofocus>
                        @error('firstName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for='lastName'>Nama Belakang</label>
                        <input id='lastName' type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" placeholder="masukkan nama belakang..." required value="{{ old('lastName', $user->lastName) }}" autocomplete="lastName" autofocus>
                        @error('lastName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='email'>E-mail</label>
                        <input id='email' type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="masukkan email Anda..." required value="{{ old('email', $user->email) }}" autocomplete="email" autofocus>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='alamat'>Alamat</label>
                        <input id='alamat' type="text" name="alamat"class="form-control @error('alamat') is-invalid @enderror" placeholder="masukkan alamat Anda..." value="{{ old('alamat', $user->alamat) }}" autocomplete="alamat" autofocus>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='noTelp'>Nomor Telepon</label>
                        <input id='noTelp' name="noTelp" type="text" class="form-control @error('noTelp') is-invalid @enderror" placeholder="masukkan Nomor Telepon Anda..." required value="{{ old('noTelp', $user->noTelp) }}" autocomplete="noTelp" autofocus>
                        @error('noTelp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label>Ganti Password</label>
                    </div>
                    <div class="mb-3 col-md-4">
                        <input id='current_password' name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="current password" value="{{ old('current_password') }}" >
                        @error('current_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-4">
                        <input id='new_password' name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="new password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-4">
                        <input id='confirm_password' name="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="confirm new password">
                        @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="photo" class="form-label @error('photo') is-invalid @enderror">Foto Profil</label>
                        @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" class="img-preview img-fluid mb-3 col-sm-5 rounded-5" style="max-height:300px;max-width:300px">
                            @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input type="hidden" name="oldPhoto" id="oldPhoto" value="{{ $user->photo }}">
                        <input class="form-control" type="file" id="photo" name="photo" onchange="previewImage()">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <button type="submit"  class="btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff">Save Profile</button>
        </div>
    </form>
@endsection
<!-- Main Akhir -->

@section('page-scripts')

    <script>
        function previewImage() {
        const photo = document.querySelector('#photo');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(photo.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    </script>

@endsection
