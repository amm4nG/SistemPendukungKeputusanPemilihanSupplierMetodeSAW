{{-- call this file in Kriteria.blade.php --}}
<a href="#" data-toggle="modal" data-target="#modalCreateKriteria"
    class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i>
    Tambah Kriteria
</a>
<div class="modal fade" id="modalCreateKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Kriteria</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('kriteria.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="text" value="{{ old('namaKriteria') }}" class="form-control"
                        placeholder="Nama Kriteria" name="namaKriteria" id="namaKriteria">
                    <input type="number" step="0.01" value="{{ old('bobotKriteria') }}" class="form-control mt-3"
                        placeholder="Bobot kriteria" name="bobotKriteria" id="bobotKriteria">
                    <select name="sifatKriteria" class="form-control mt-3" id="sifatKriteria">
                        <option selected disabled>-- Pilih Sifat Kriteria --</option>
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" id="cancelSave"
                        type="button">Cancel</button>
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
