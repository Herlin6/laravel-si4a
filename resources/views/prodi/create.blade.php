@extends('layout.main') @section('content') @section('title', 'Program Studi')
<div class="row">
    <div class="col-12">
        {{-- Form tambah prodi --}}
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Tambah Prodi</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action="{{ route('prodi.store') }}" method="POST">
                @csrf
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label"
                            >Nama Prodi</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            name="nama"
                            value="{{old('nama')}}"
                        />
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="singkatan" class="form-label"
                            >Singkatan</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            name="singkatan"
                            value="{{old('singkatan')}}"
                        />
                        @error('singkatan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kaprodi" class="form-label"
                            >Kaprodi</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            name="kaprodi"
                            value="{{old('kaprodi')}}"
                        />
                        @error('kaprodi')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sekretaris" class="form-label"
                            >Nama Sekretaris</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            name="sekretaris"
                            value="{{old('sekretaris')}}"
                        />
                        @error('sekretaris')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fakultas_id" class="form-label"
                            >Fakultas</label
                        >
                        <select class="form-control" name="fakultas_id">
                            @foreach ($fakultas as $item)
                                <option value="{{$item->id}}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('fakultas_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
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
