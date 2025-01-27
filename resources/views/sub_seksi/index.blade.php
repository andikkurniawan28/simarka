@extends('template.master')

@section('title')
    {{ ucwords(str_replace('_', ' ', 'daftar_sub_seksi')) }}
@endsection

@section('setupAwal')
    {{ 'active' }}
@endsection

@section('content')
    @csrf
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">@yield('title')</h4>
            </div>
            <div class="card-body">
                <div class="btn-group" role="group" aria-label="action">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addsub_seksiModal">
                        {{ ucwords(str_replace('_', ' ', 'tambah')) }}
                    </button>
                </div>
                <div class="table-responsive">
                    <span class="half-line-break"></span>
                    <table class="table table-hover table-bordered" id="example" width="100%">
                        <thead>
                            <tr>
                                <th>{{ strtoupper(str_replace('_', ' ', 'id')) }}</th>
                                <th>{{ ucwords(str_replace('_', ' ', 'bagian')) }}</th>
                                <th>{{ ucwords(str_replace('_', ' ', 'seksi')) }}</th>
                                <th>{{ ucwords(str_replace('_', ' ', 'nama')) }}</th>
                                <th>{{ ucwords(str_replace('_', ' ', 'action')) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub_seksis as $sub_seksi)
                                <tr>
                                    <td>{{ $sub_seksi->id }}</td>
                                    <td>{{ $sub_seksi->seksi->bagian->nama }}</td>
                                    <td>{{ $sub_seksi->seksi->nama }}</td>
                                    <td>{{ $sub_seksi->nama }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="action">
                                            <button type="button" class="btn btn-secondary btn-sm btn-edit"
                                                data-id="{{ $sub_seksi->id }}"
                                                data-nama="{{ $sub_seksi->nama }}"
                                                data-seksi-id="{{ $sub_seksi->seksi_id }}">
                                                {{ ucwords(str_replace('_', ' ', 'edit')) }}
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-id="{{ $sub_seksi->id }}" data-name="{{ $sub_seksi->name }}">
                                                {{ ucwords(str_replace('_', ' ', 'hapus')) }}
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addsub_seksiModal" tabindex="-1" role="dialog" aria-labelledby="addsub_seksiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addsub_seksiModalLabel">{{ ucwords(str_replace('_', ' ', 'tambah_sub_seksi')) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('sub_seksi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama_seksi')) }}</label>
                            <select class="form-control select2" id="seksi" name="seksi_id" width="100%" required>
                                <option disabled selected>Pilih {{ ucwords(str_replace('_', ' ', 'seksi')) }} :</option>
                                @foreach ($seksis as $seksi)
                                    <option value="{{ $seksi->id }}">{{ $seksi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama_sub_seksi')) }}</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editSeksiModal" tabindex="-1" role="dialog" aria-labelledby="editSeksiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSeksiModalLabel">{{ ucwords(str_replace('_', ' ', 'edit_sub_seksi')) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editSeksiForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editBagian">{{ ucwords(str_replace('_', ' ', 'nama_seksi')) }}</label>
                            <select class="form-control select2" id="editBagian" name="seksi_id" required>
                                <option disabled>Pilih {{ ucwords(str_replace('_', ' ', 'seksi')) }}</option>
                                @foreach ($seksis as $seksi)
                                    <option value="{{ $seksi->id }}">{{ $seksi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editNama">{{ ucwords(str_replace('_', ' ', 'nama_sub_seksi')) }}</label>
                            <input type="text" class="form-control" id="editNama" name="nama" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editModal = document.getElementById('editSeksiModal');
            const editForm = document.getElementById('editSeksiForm');
            const editNamaInput = document.getElementById('editNama');
            const editBagianSelect = document.getElementById('editBagian');

            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function () {
                    const sub_seksiId = this.getAttribute('data-id');
                    const sub_seksiNama = this.getAttribute('data-nama');
                    const seksiId = this.getAttribute('data-seksi-id');

                    // Set form action dynamically
                    editForm.action = `{{ url('sub_seksi') }}/${sub_seksiId}`;

                    // Set input values dynamically
                    editNamaInput.value = sub_seksiNama;
                    editBagianSelect.value = seksiId;

                    // Trigger Select2 to refresh the dropdown
                    $(editBagianSelect).trigger('change');

                    // Show the modal
                    $(editModal).modal('show');
                });
            });

            // Initialize Select2 for seksi dropdown
            $('#editBagian').select2({
                theme: 'bootstrap',
                placeholder: 'Pilih seksi',
                width: '100%'
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const sub_seksi_id = this.getAttribute('data-id');
                    const sub_seksi_name = this.getAttribute('data-name');
                    Swal.fire({
                        title: 'Apa Anda yakin?',
                        text: 'Anda tidak bisa mengembalikan data ini jika terhapus!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.setAttribute('method', 'POST');
                            form.setAttribute('action',
                                `{{ route('sub_seksi.destroy', ':id') }}`.replace(
                                    ':id', sub_seksi_id));
                            const csrfToken = document.getElementsByName("_token")[0].value;

                            const hiddenMethod = document.createElement('input');
                            hiddenMethod.setAttribute('type', 'hidden');
                            hiddenMethod.setAttribute('name', '_method');
                            hiddenMethod.setAttribute('value', 'DELETE');

                            const name = document.createElement('input');
                            name.setAttribute('type', 'hidden');
                            name.setAttribute('name', 'name');
                            name.setAttribute('value', sub_seksi_name);

                            const csrfTokenInput = document.createElement('input');
                            csrfTokenInput.setAttribute('type', 'hidden');
                            csrfTokenInput.setAttribute('name', '_token');
                            csrfTokenInput.setAttribute('value', csrfToken);

                            form.appendChild(hiddenMethod);
                            form.appendChild(name);
                            form.appendChild(csrfTokenInput);
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection

@section('additional_script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#seksi').select2({
            theme: 'bootstrap',
            placeholder: "Pilih seksi"
        });
    });
</script>
@endsection
