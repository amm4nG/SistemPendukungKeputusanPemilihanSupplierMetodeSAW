<h5 class="mb-3">Matriks Keputusan</h5>
<div class="table-responsive">
    <table class="table table-bordered table-sm text-center" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="align-middle" rowspan="{{ $kriteria->count() }}">Alternative</th>
            </tr>
            <tr>
                <th colspan="{{ $kriteria->count() }}">Kriteria</th>
            </tr>
            <tr>
                @foreach ($kriteria as $item)
                    <th>{{ $item->namaKriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $item)
                <tr>
                    <td>{{ $item->namaSupplier }}</td>
                    @foreach ($dataSupplier as $nilai)
                        @if ($nilai['idSupplier'] === $item->id)
                            <td>{{ $nilai['nilaiSupplier'] }}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<h5 class="mb-3 mt-3">Normalisasi Matriks</h5>
<div class="table-responsive">
    <table class="table table-bordered table-sm text-center" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="align-middle" rowspan="{{ $kriteria->count() }}">Alternative</th>
            </tr>
            <tr>
                <th colspan="{{ $kriteria->count() }}">Kriteria</th>
            </tr>
            <tr>
                @foreach ($kriteria as $item)
                    <th>{{ $item->namaKriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $item)
                <tr>
                    <td>{{ $item->namaSupplier }}</td>
                    @foreach ($dataSupplier as $nilai)
                        @if ($nilai['idSupplier'] === $item->id)
                            @foreach ($nilaiData as $data)
                                @if ($data['idKriteria'] === $nilai['idKriteria'])
                                    @if ($nilai['sifatKriteria'] === 'benefit')
                                        <td>{{ $nilai['nilaiSupplier'] / $data['nilai'] }}</td>
                                    @else
                                        <td>{{ $data['nilai'] / $nilai['nilaiSupplier'] }}</td>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<h5 class="mb-3 mt-3">Perangkingan</h5>
<div class="table-responsive">
    <table class="table table-bordered table-sm text-center" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="align-middle" rowspan="{{ $kriteria->count() }}">Alternative</th>
            </tr>
            <tr>
                <th colspan="{{ $kriteria->count() }}">Kriteria</th>
                <th class="align-middle" rowspan="{{ $kriteria->count() }}">Hasil</th>
            </tr>
            <tr>
                @foreach ($kriteria as $item)
                    <th>{{ $item->namaKriteria }}</th>
                @endforeach
            </tr>
        </thead>
        @foreach ($supplier as $item)
            <tr>
                @php
                    $hasil = 0;
                @endphp
                <td>{{ $item->namaSupplier }}</td>
                @foreach ($dataSupplier as $nilai)
                    @if ($nilai['idSupplier'] === $item->id)
                        @foreach ($nilaiData as $data)
                            @if ($data['idKriteria'] === $nilai['idKriteria'])
                                @if ($nilai['sifatKriteria'] === 'benefit')
                                    @php
                                        $hasil += ($nilai['nilaiSupplier'] / $data['nilai']) * $data['bobot'];
                                    @endphp
                                    <td>{{ ($nilai['nilaiSupplier'] / $data['nilai']) * $data['bobot'] }} </td>
                                @else
                                    @php
                                        $hasil += ($data['nilai'] / $nilai['nilaiSupplier']) * $data['bobot'];
                                    @endphp
                                    <td>{{ ($data['nilai'] / $nilai['nilaiSupplier']) * $data['bobot'] }}</td>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <td>{{ $hasil }}</td>
                @php
                    $hasil = 0;
                @endphp
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
