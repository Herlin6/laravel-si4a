<h1>Program Studi</h1>

<table>
    <tr>
        <th>Nama</th>
        <th>Singkatan</th>
        <th>kaprodi</th>
        <th>Sekretaris</th>
        <th>Fakultas</th>
    </tr>
    @foreach ($prodi as $item)
    <tr>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->singkatan }}</td>
        <td>{{ $item->kaprodi }}</td>
        <td>{{ $item->sekretaris }}</td>
        <td>{{ $item->fakultas->nama }}</td> {{-- fakultas: nama function di models// fakultas->dekan --}}
    </tr>
    
    @endforeach
</table>