{{-- call this file in Supplier.blade.php --}}
<a href="#" data-toggle="modal" data-target="#modalCreateSupplier"
    class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i>
    Tambah Supplier
</a>
<div class="modal fade" id="modalCreateSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Supplier</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('supplier.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="text" class="form-control" placeholder="Nama Supplier" name="namaSupplier" id="namaSupplier">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" id="cancelSave" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="save">Save
                        <div class="spinner-border spinner-border-sm mb-1" id="loadingSave" role="status"
                            style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('scripts')
<script>
    $(document).ready(function() {
            $('form').on('submit', function() {
                var saveButton = $('#save');
                var cancelButton = $("#cancelSave");
                var loadingSpinner = $('#loadingSave');

                saveButton.prop('disabled', true);
                cancelButton.prop('disabled', true);
                loadingSpinner.show();
            });
        });
</script>
@endsection