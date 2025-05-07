@extends('layout.main') @section('content') @section('title', 'Mahasiswa')
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Mahasiswa</h3>
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
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Asal SMA</th>
                        <th>Program Studi</th>
                    </tr>
                    @foreach ($mahasiswa as $item)
                    <tr>
                        <td>{{ $item->npm }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            @php if ($item->jenis_kelamin == 'L') { echo
                            'Laki-laki'; } else { echo 'Perempuan'; } @endphp
                        </td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->tempat_lahir }}</td>
                        <td>{{ $item->asal_sma }}</td>
                        <td>{{ $item->prodi->nama }}</td>
                    </tr>

                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">Footer</div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
