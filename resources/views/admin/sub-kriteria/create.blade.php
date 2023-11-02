{{-- call this file in Kriteria.blade.php --}}
<a href="#" data-toggle="modal" data-target="#modalCreateSubKriteria"
    class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i>
    Tambah Data Sub Kriteria
</a>
<div class="modal fade" id="modalCreateSubKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Data Sub Kriteria</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('sub-kriteria.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <select name="idKriteria" id="" class="form-control">
                        <option value="" selected disabled>--- Pilih Kriteria ---</option>
                        @foreach ($nilaiKriteria as $nilai)
                            <option value="{{ $nilai->id }}" {{ old('idKriteria') == $nilai->id ? 'selected' : '' }}>
                                {{ $nilai->namaKriteria }}</option>
                        @endforeach
                    </select>
                    <input type="number" value="{{ old('nilaiKriteria') }}" class="form-control mt-3"
                        placeholder="Nilai kriteria" name="nilaiKriteria" id="">
                    <input type="text" value="{{ old('keterangan') }}" class="form-control mt-3"
                        placeholder="Keterangan" name="keterangan" id="">
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
