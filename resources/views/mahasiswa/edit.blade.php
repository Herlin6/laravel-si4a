@extends('layout.main') @section('content') @section('title', 'Mahasiswa')
<div class="row">
    <div class="col-12">
        {{-- Form tambah fakultas --}}
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Mahasiswa</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form
                action="{{ route('mahasiswa.update', $mahasiswa->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf @method('PUT')
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="npm" class="form-label">NPM</label>
                        <input
                            type="text"
                            class="form-control"
                            name="npm"
                            value="{{old('npm') ? old('npm') : $mahasiswa->npm}}"
                        />
                        @error('npm')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label"
                            >Nama Mahasiswa</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            name="nama"
                            value="{{{old('nama') ? old('nama') : $mahasiswa->nama}}}"
                        />
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label"
                            >Jenis Kelamin</label
                        >
                        <br />
                        <input type="radio" class="form-check-input"
                        name="jenis_kelamin" value="L"
                        {{ (old("jenis_kelamin") == "L" ? "checked" : "") ? (old("jenis_kelamin") == "L" ? "checked" : "") : ($mahasiswa->jenis_kelamin == "L" ? "checked" : "") }} />
                        Laki-laki <br />
                        <input type="radio" class="form-check-input"
                        name="jenis_kelamin" value="P"
                        {{ (old("jenis_kelamin") == "P" ? "checked" : "") ? (old("jenis_kelamin") == "P" ? "checked" : "") : ($mahasiswa->jenis_kelamin == "P" ? "checked" : "")}} />
                        Perempuan <br />
                        @error('jenis_kelamin')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label"
                            >Tanggal Lahir</label
                        >
                        <input
                            type="date"
                            class="form-control"
                            name="tanggal_lahir"
                            value="{{old('tanggal_lahir') ? old('tanggal_lahir') : $mahasiswa->tanggal_lahir}}"
                        />
                        @error('tanggal_lahir')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label"
                            >Tempat Lahir</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            name="tempat_lahir"
                            value="{{old('tempat_lahir') ? old('tempat_lahir') : $mahasiswa->tempat_lahir}}"
                        />
                        @error('tempat_lahir')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="asal_sma" class="form-label"
                            >Asal SMA</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            name="asal_sma"
                            value="{{old('asal_sma') ? old('asal_sma') : $mahasiswa->asal_sma}}"
                        />
                        @error('asal_sma')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="prodi_id" class="form-label">Prodi</label>
                        <select class="form-control" name="prodi_id">
                            @foreach ($prodi as $item)
                            <option value="{{$item->id}}" {{ old('prodi_id') == $item->id ? 'selected' : ($mahasiswa->prodi_id == $item->id ? 'selected' : null) }}>
                                {{ $item->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('prodi_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">
                            Foto Mahasiswa
                        </label>
                        <div class="p-2">
                            @if ($mahasiswa->foto)
                                <img src="{{ asset('images/' . $mahasiswa->foto) }}" width="100">
                            @else
                                <img src="{{ asset('images/default.png') }}" width="100">
                            @endif
                        </div>
                        <input
                            type="file"
                            class="form-control"
                            name="foto"
                        />
                        @error('foto')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection
