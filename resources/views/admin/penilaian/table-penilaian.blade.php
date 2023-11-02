<div class="table-responsive">
    <table class="table table-bordered table-sm text-center" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Nama Kriteria</th>
                <th>Keterangan</th>
                {{-- <th>Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($dataSupplier as $index => $sup)
                <tr>
                    <td class="align-middle" rowspan="6">{{ $loop->iteration }}</td>
                    <td class="align-middle" rowspan="6">{{ $sup['namaSupplier'] }}</td>
                </tr>
                @foreach ($dataPenilaian as $item)
                    @if ($item['idSupplier'] === $sup['idSupplier'])
                        <tr>
                            <td>{{ $item['namaKriteria'] }}</td>
                            <td>{{ $item['keterangan'] }}</td>
                            {{-- <td>{{ $index }}</td> --}}
                        </tr>
                    @endif
                @endforeach
            @endforeach
            @if (!count($dataSupplier))
            <tr>
                <td colspan="4">Tidak ada data penilaian supplier</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
