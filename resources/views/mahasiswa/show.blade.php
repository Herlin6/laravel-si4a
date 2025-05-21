@extends('layout.main') @section('content') @section('title', 'Mahasiswa')
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Mahasiswa</h3>
                <div class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-collapse"
                        title="Collapse"
                    >
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr class="text-center">
                        <td rowspan="7">
                            @if ($mahasiswa->foto)
                                <img src="{{ asset('images/' . $mahasiswa->foto) }}" width="250">
                            @else
                                <img src="{{ asset('images/default.png') }}" width="250">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $mahasiswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>NPM</th>
                        <td>{{ $mahasiswa->npm }}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <td>{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Asal SMA</th>
                        <td>{{ $mahasiswa->asal_sma }}</td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td>{{ $mahasiswa->prodi->nama }}</td>
                    </tr>
                    <tr>
                        <th>Fakultas</th>
                        <td>{{ $mahasiswa->prodi->fakultas->nama }}</td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
