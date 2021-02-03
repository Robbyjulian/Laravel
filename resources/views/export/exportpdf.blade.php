<table>Data Mahasiswa</table>
<table class="table" style="border: 1px solid black">
    <thead>
        <tr>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">NRP</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Rata-rata Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $m)
            <tr>
                <td>{{$m->nrp}}</td>
                <td>{{$m->nama_lengkap()}}</td>
                <td>{{$m->email}}</td>
                <td>{{$m->rataNilai()}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
