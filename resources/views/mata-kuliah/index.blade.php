@extends('layout.main') @section('content') @section('title', 'Mata Kuliah')
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Mata Kuliah</h3>
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
                <a href="{{ route('mata-kuliah.create') }}" class="btn btn-primary">Tambah</a><br/><br/>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($mata_kuliah as $item)
                    <tr>
                        <td>{{ $item->kode_mk }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->prodi->nama }}</td>
                        <td>
                            <a href="{{ route('mata-kuliah.show', $item->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('mata-kuliah.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route("mata-kuliah.destroy", $item->id) }}" method="POST" class="d-inline"> {{-- class d inline agar sejajar --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                  class="btn btn-danger show_confirm"
                                  data-toggle="tooltip"
                                  title='Delete'
                                  data-nama='{{ $item->nama }}'>
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
