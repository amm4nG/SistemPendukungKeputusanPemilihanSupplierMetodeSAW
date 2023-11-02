<div class="table-responsive">
    <table class="table table-bordered table-sm text-center" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $item)
                <tr class="text-capitalize">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->namaSupplier }}</td>
                    <td>
                        <input type="hidden" value="{{ $item->namaSupplier }}" name="namaSupplierOld{{ $item->id }}"
                            id="namaSupplierOld{{ $item->id }}">
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
<div class="modal fade" id="modalEditSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Edit Supplier</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="post" id="editForm">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <input type="hidden" name="idSupplier" id="idSupplier">
                    <input type="text" class="form-control" placeholder="Nama Supplier" name="namaSupplierUpdate"
                        id="namaSupplierUpdate">
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
{{-- edit Supplier --}}
<script>
    $(document).on('click', '.btnEdit', function() {
        var idSupplier = $(this).data('id');
        var namaSupplierOld = $('#namaSupplierOld' + idSupplier).val();

        $('#modalEditSupplier').modal('show');
        $('#idSupplier').val(idSupplier);
        $('#namaSupplierUpdate').val(namaSupplierOld);

        // Update the form action URL with the correct ID
        var editForm = $('#editForm');
        editForm.attr('action', 'supplier/' + idSupplier);
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
            var idSupplier = $(this).data('id')
            $('#konfirmasiDeleteModal').modal('show')

            var deleteForm = $('#deleteForm');
            deleteForm.attr('action', 'supplier/' + idSupplier);
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