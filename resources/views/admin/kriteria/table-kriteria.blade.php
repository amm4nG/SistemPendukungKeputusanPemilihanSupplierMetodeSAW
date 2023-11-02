<div class="table-responsive">
    <table class="table table-bordered table-sm text-center" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Sifat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria as $item)
                <tr class="text-capitalize">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->namaKriteria }}</td>
                    <td>{{ $item->bobotKriteria }}</td>
                    <td>{{ $item->sifatKriteria }}</td>
                    <td>
                        <input type="hidden" value="{{ $item->namaKriteria }}" name="namaKriteriaOld{{ $item->id }}"
                            id="namaKriteriaOld{{ $item->id }}">
                        <input type="hidden" value="{{ $item->bobotKriteria }}"
                            name="bobotKriteriaOld{{ $item->id }}" id="bobotKriteriaOld{{ $item->id }}">
                        <input type="hidden" value="{{ $item->sifatKriteria }}"
                            name="sifatKriteriaOld{{ $item->id }}" id="sifatKriteriaOld{{ $item->id }}">
                        <a href="#" data-id="{{ $item->id }}" style="width: 5rem"
                            class="btn btn-primary btn-sm mb-1 btnEdit"><i class="fas fa-edit"></i>
                            Edit</a>
                        <a href="#" data-id="{{ $item->id }}" style="width: 5rem"
                            class="btn btn-danger btn-sm mb-1 btnDelete"><i class="fas fa-trash"></i>
                            Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="modalEditKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <input type="hidden" name="idKriteria" id="idKriteria">
                    <input type="text" class="form-control" placeholder="Nama Kriteria" name="namaKriteriaUpdate"
                        id="namaKriteriaUpdate">
                    <input type="number" step="0.01" value="{{ old('bobotKriteriaUpdate') }}"
                        class="form-control mt-3" placeholder="Bobot kriteria" name="bobotKriteriaUpdate"
                        id="bobotKriteriaUpdate">
                    <select name="sifatKriteriaUpdate" class="form-control mt-3" id="sifatKriteriaUpdate">
                        <option selected disabled>-- Pilih Sifat Kriteria --</option>
                        <option id="benefit" value="benefit">Benefit</option>
                        <option id="cost" value="cost">Cost</option>
                    </select>
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
{{-- edit Kriteria --}}
<script>
    $(document).on('click', '.btnEdit', function() {
        var idKriteria = $(this).data('id');
        var namaKriteriaOld = $('#namaKriteriaOld' + idKriteria).val();
        var bobotKriteriaOld = $('#bobotKriteriaOld' + idKriteria).val();
        var sifatKriteriaaOld = $('#sifatKriteriaOld' + idKriteria).val();

        $('#modalEditKriteria').modal('show');
        $('#idKriteria').val(idKriteria);
        $('#bobotKriteriaUpdate').val(bobotKriteriaOld);
        $('#namaKriteriaUpdate').val(namaKriteriaOld);
        if (sifatKriteriaaOld == 'benefit') {
            $('#benefit').attr('selected', 'selected');
        } else {
            $('#cost').attr('selected', 'selected');
        }
        // Update the form action URL with the correct ID
        var editForm = $('#editForm');
        editForm.attr('action', 'kriteria/' + idKriteria);
    });

    $('#editForm').on('submit', function() {
        var updateButton = $('#update');
        var cancelUpdateButton = $("#cancelUpdate");
        var loadingUpdateSpinner = $('#loadingUpdate');

        updateButton.prop('disabled', true);
        cancelUpdateButton.prop('disabled', true);
        loadingUpdateSpinner.show();
    });
</script>
<script>
    $(document).ready(function() {
        $('.btnDelete').on('click', function() {
            var idKriteria = $(this).data('id')
            $('#konfirmasiDeleteModal').modal('show')

            var deleteForm = $('#deleteForm');
            deleteForm.attr('action', 'kriteria/' + idKriteria);
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
