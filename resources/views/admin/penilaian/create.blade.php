<a href="#" data-toggle="modal" data-target="#modalCreateBarang"
    class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i>
    Tambah Data
</a>
<div class="modal fade" id="modalCreateBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('penilaian.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <select name="idSupplier" id="" class="form-control">
                        <option value="" disabled selected>-- Select supplier --</option>
                        @foreach ($supplier as $item)
                            <option value="{{ $item->id }}">{{ $item->namaSupplier }}</option>
                        @endforeach
                    </select>
                    @foreach ($kriteria as $item)
                        <label class="mt-3">{{ $item->namaKriteria }}</label>
                        <input type="hidden" value="{{ $item->id }}" name="idKriteria[]" id="">
                        <select name="idNilaiKriteria[]" class="form-control" id="">
                            <option value="" selected disabled>-- Select {{ $item->namaKriteria }} --</option>
                            @foreach ($item->nilaiKriteria as $nilai)
                                <option value="{{ $nilai->id }}">
                                    {{ $nilai->keterangan }}
                                </option>
                            @endforeach
                        </select>
                    @endforeach
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
