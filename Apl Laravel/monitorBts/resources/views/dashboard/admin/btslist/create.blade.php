@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Buat Data BTS Baru</h1>
    <div class="row">
        <form action="/dashboard/btslists/" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="nama" class="form-label">Nama BTS</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="btstype_id" class="form-label">Jenis BTS</label>
                    <select class="form-select" name="btstype_id">
                        @foreach ($btstypes as $btstype)
                            @if(old('btstype_id') == $btstype->id)
                                <option value="{{ $btstype->id }}" selected>{{ $btstype->type }}</option>
                            @else
                                <option value="{{ $btstype->id }}">{{ $btstype->type }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="provider_id" class="form-label">Provider</label>
                    <select class="js-example-basic-multiple" name="provider_id[]" multiple="multiple" style="width: 100%" required>
                        @foreach ($providers as $provider)
                            @if(old('provider_id') == $provider->id)
                                <option value="{{ $provider->id }}" selected>{{ $provider->nama }}</option>
                            @else
                                <option value="{{ $provider->id }}">{{ $provider->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="lokasi" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" required autofocus value="{{ old('lokasi') }}">
                    @error('lokasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="col-md-2 mb-3">
                    <label for="kecamatan_id" class="form-label">Kecamatan</label>
                    <select class="form-select" name="kecamatan_id" id="kecamatan_id">
                        @foreach ($kecamatans as $kecamatan)
                            @if(old('kecamatan_id') == $kecamatan->id)
                                <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->nama }}</option>
                            @else
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="village_id" class="form-label">Desa</label>
                    <select class="form-select" name="village_id" id="village_id">
                        @isset($villages)
                            @foreach ($villages as $village)
                                @if(old('village_id') == $village->id)
                                    <option value="{{ $village->id }}" selected>{{ $village->nama }}</option>
                                @else
                                    <option value="{{ $village->id }}">{{ $village->nama }}</option>
                                @endif
                            @endforeach
                        @endisset
                    </select>
                </div>


                <div class="col-md-2 mb-3">
                    <label for="genset" class="form-label">Genset</label>
                    <select class="form-select @error('genset') is-invalid @enderror" id="genset" name="genset" required autofocus value="{{ old('genset') }}">
                        <option value="1">Ada</option>
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="tembokBatas" class="form-label">Tembok Batas</label>
                    <select class="form-select @error('tembokBatas') is-invalid @enderror" id="tembokBatas" name="tembokBatas" required autofocus value="{{ old('tembokBatas') }}">
                        <option value="1">Ada</option>
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="panjangTanah" class="form-label">Panjang Tanah</label>
                    <div class="input-group row m-0">
                        <input type="number" class="col form-control @error('panjangTanah') is-invalid @enderror" id="panjangTanah" name="panjangTanah" required autofocus value="{{ old('panjangTanah') }}" aria-describedby="basic-addon1" step=".01">
                        <span class="col-md-2 text-break fw-normal input-group-text justify-content-center align-items-center" id="basic-addon1">meter</span>
                    </div>
                    @error('panjangTanah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="lebarTanah" class="form-label">Lebar Tanah</label>
                    <div class="input-group row m-0">
                        <input type="number" class="col form-control @error('lebarTanah') is-invalid @enderror" id="lebarTanah" name="lebarTanah" required autofocus value="{{ old('lebarTanah') }}" aria-describedby="basic-addon2" step=".01">
                        <span class="col-md-2 text-break fw-normal input-group-text justify-content-center align-items-center" id="basic-addon2">meter</span>
                    </div>
                    @error('lebarTanah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tinggiTower" class="form-label">Tinggi Tower</label>
                    <div class="input-group row m-0">
                        <input type="number" class="col form-control @error('tinggiTower') is-invalid @enderror" id="tinggiTower" name="tinggiTower" required autofocus value="{{ old('tinggiTower') }}" aria-describedby="basic-addon2" step=".01">
                        <span class="col-md-2 text-break fw-normal input-group-text justify-content-center align-items-center" id="basic-addon2">meter</span>
                    </div>
                    @error('tinggiTower')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <div class="input-group row m-0">
                        <input type="number" onkeypress="latitude(this.value)" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" required autofocus value="{{ old('latitude') }}" step=".01">
                    </div>
                    @error('latitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <div class="input-group row m-0">
                        <input type="number" onkeypress="longitude(this.value)" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" required autofocus value="{{ old('longitude') }}" step=".01">
                    </div>
                    @error('longitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="images" class="form-label @error('images') is-invalid @enderror">BTS Photos</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control" type="file" id="images" name="images[]" onchange="previewImage()" multiple>
                @error('images')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="button-container justify-content-center d-flex">
                <button type="submit" class="btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Tambah BTS</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        var kecamatan_id = document.getElementById('kecamatan_id').value
    </script>
    <script>

    function previewImage() {
        const btsfoto = document.querySelector('#images');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(btsfoto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection

@section('page-scripts')
    <script>

        function latitude( str ){
            var latInput = document.getElementById('latitude');
            if(str.length == 3){
                latInput.value = str+',';
            }
        }
        function longitude( str ){
            var longInput = document.getElementById('longitude');
            if(str.length == 2){
                longInput.value = str+',';
            }
        }
        
        $(function() {
            $('#kecamatan_id').on('change', function(e){
                console.log(e.target.value);
                var kecamatan_id = e.target.value;
                $.get('/dashboard/btslists/getVillages/' + kecamatan_id, function(data) {
                console.log(data);
                $('#village_id').empty();

                $.each(data, function(index, villagesObj){
                    $('#village_id').append('<option value="'+ villagesObj.id +'">'+ villagesObj.nama +'</option>');
                })
                });
            });
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
