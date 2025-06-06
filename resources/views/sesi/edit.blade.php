@extends('layout.main') @section('content') @section('title', 'Sesi')
<div class="row">
    <div class="col-12">
        {{-- Form tambah sesi --}}
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Sesi</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action="{{ route('sesi.update', $sesi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label"
                            >Nama Sesi</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            name="nama"
                            value="{{old('nama') ? old('nama') : $sesi->nama}}"
                        />
                        @error('nama')
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
