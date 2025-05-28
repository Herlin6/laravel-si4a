@extends('layout.main') @section('content') @section('title', 'Fakultas')
<div class="row">
    <div class="col-12">
        {{-- Form tambah fakultas --}}
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Fakultas</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form
                action="{{ route('fakultas.update', $fakultas->id) }}"
                method="POST"
            >
                @csrf
                {{-- method put untuk ubah/edit data --}}
                @method('PUT')
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">
                            Nama Fakultas
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            name="nama"
                            value="{{old('nama') ? old('nama') : $fakultas->nama}}"
                        />
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="singkatan" class="form-label">
                            Singkatan
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            name="singkatan"
                            value="{{old('singkatan') ? old('singkatan') : $fakultas->singkatan}}"
                        />
                        @error('singkatan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dekan" class="form-label">Dekan</label>
                        <input
                            type="text"
                            class="form-control"
                            name="dekan"
                            value="{{old('dekan') ? old('dekan') : $fakultas->dekan}}"
                        />
                        @error('dekan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="wakil_dekan" class="form-label"
                            >Wakil Dekan</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            name="wakil_dekan"
                            value="{{old('wakil_dekan') ? old('wakil_dekan') : $fakultas->wakil_dekan}}"
                        />
                        @error('wakil_dekan')
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
