@extends('layout.main') @section('content') @section('title', 'Fakultas')
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Fakultas</h3>
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
                <a href="{{ route('fakultas.create') }}" class="btn btn-primary"
                    >Tambah</a
                ><br /><br />
                {{-- atau --}}
                {{-- <a href="{{ url('fakultas/create') }}"></a> --}}
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Nama</th>
                        <th>Singkatan</th>
                        <th>Dekan</th>
                        <th>Wakil Dekan</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($fakultas as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->singkatan }}</td>
                        <td>{{ $item->dekan }}</td>
                        <td>{{ $item->wakil_dekan }}</td>
                        <td>
                            <a href="{{ route('fakultas.show', $item->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('fakultas.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route("fakultas.destroy", $item->id) }}" method="POST" class="d-inline"> {{-- class d inline agar sejajar --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
