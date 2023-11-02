<div class="table-responsive">
    <table class="table table-bordered table-sm text-center" id="" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Nilai Kriteria</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilaiKriteria as $index => $nilai)
                @php
                    $count = $nilai->nilaiKriteria->count();
                @endphp
                @foreach ($nilai->nilaiKriteria as $itemIndex => $item)
                    <tr class="align-items-center">
                        @if ($itemIndex === 0)
                            <td class="align-middle" rowspan="{{ $count }}">{{ $index + 1 }}</td>
                            <td class="align-middle" rowspan="{{ $count }}">{{ $nilai->namaKriteria }}</td>
                        @endif
                        <td>{{ $item->nilaiKriteria }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="#" data-id="{{ $item->id }}"
                                data-namakriteria="{{ $item->kriteria->namaKriteria }}"
                                data-nilaikriteriaold="{{ $item->nilaiKriteria }}"
                                data-keterangan="{{ $item->keterangan }}" style="width: 5rem"
                                class="btn btn-primary btn-sm mb-1 btnEdit"><i class="fas fa-edit"></i>
                                Edit</a>
                            <a href="#" data-id="{{ $item->id }}" style="width: 5rem"
                                class="btn btn-danger btn-sm mb-1 btnDelete"><i class="fas fa-trash"></i>
                                Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="modalEditSubKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Edit Kriteria</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="post" id="editForm">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <input type="text" disabled class="form-control" name="namaKriteriaOld" id="namaKriteriaOld">
                    <input type="number" class="form-control mt-3" placeholder="Nilai Kriteria"
                        name="nilaiKriteriaUpdate" id="nilaiKriteriaUpdate">
                    <input type="text" class="form-control mt-3" placeholder="Keterangan" name="keteranganUpdate"
                        id="keteranganUpdate">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" id="cancelUpdate"
                        type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="update">Save
                        <div class="spinner-border spinner-border-sm mb-1" id="loadingUpdate" role="status"
                            style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="konfirmasiDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" id="deleteForm">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah kamu yakin akan menghapusnya?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="cancelDelete" type="button"
                        data-dismiss="modal">Cancel</button>
                    <button type="submit" id="delete" class="btn btn-primary">Ya
                        <div class="spinner-border spinner-border-sm mb-1" id="loadingDelete" role="status"
                            style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('/') }}vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btnEdit').on('click', function() {
            var idSubKriteria = $(this).data('id')
            var nilaiKriteriaOld = $(this).data('nilaikriteriaold')
            var namaKriteria = $(this).data('namakriteria')
            var keterangan = $(this).data('keterangan')

            $('#namaKriteriaOld').val(namaKriteria)
            $('#nilaiKriteriaUpdate').val(nilaiKriteriaOld)
            $('#keteranganUpdate').val(keterangan)

            $('#modalEditSubKriteria').modal('show')
            var editForm = $('#editForm');
            editForm.attr('action', 'sub-kriteria/' + idSubKriteria);

            $('#editForm').on('submit', function() {
                var updateButton = $('#update');
                var cancelUpdateButton = $("#cancelUpdate");
                var loadingUpdateSpinner = $('#loadingUpdate');

                updateButton.prop('disabled', true);
                cancelUpdateButton.prop('disabled', true);
                loadingUpdateSpinner.show();
            });
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('.btnDelete').on('click', function() {
            var idSubKriteria = $(this).data('id')
            $('#konfirmasiDeleteModal').modal('show')

            var deleteForm = $('#deleteForm');
            deleteForm.attr('action', 'sub-kriteria/' + idSubKriteria);
        })

        $('#deleteForm').on('submit', function() {
            var deleteButton = $('#delete');
            var cancelDeleteButton = $("#cancelDelete");
            var loadingDeleteSpinner = $('#loadingDelete');

            deleteButton.prop('disabled', true);
            cancelDeleteButton.prop('disabled', true);
            loadingDeleteSpinner.show();
        });
    });
</script>
