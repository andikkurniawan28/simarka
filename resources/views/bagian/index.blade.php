@extends('template.master')

@section('title')
    {{ ucwords(str_replace('_', ' ', 'daftar_bagian')) }}
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
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addBagianModal">
                        {{ ucwords(str_replace('_', ' ', 'tambah')) }}
                    </button>
                </div>
                <div class="table-responsive">
                    <span class="half-line-break"></span>
                    <table class="table table-hover table-bordered" id="example" width="100%">
                        <thead>
                            <tr>
                                <th>{{ strtoupper(str_replace('_', ' ', 'id')) }}</th>
                                <th>{{ ucwords(str_replace('_', ' ', 'nama')) }}</th>
                                <th>{{ ucwords(str_replace('_', ' ', 'action')) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bagians as $bagian)
                                <tr>
                                    <td>{{ $bagian->id }}</td>
                                    <td>{{ $bagian->nama }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="action">
                                            <button type="button" class="btn btn-secondary btn-sm btn-edit"
                                                data-id="{{ $bagian->id }}" data-nama="{{ $bagian->nama }}">
                                                {{ ucwords(str_replace('_', ' ', 'edit')) }}
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-id="{{ $bagian->id }}" data-name="{{ $bagian->name }}">
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

    <div class="modal fade" id="addBagianModal" tabindex="-1" role="dialog" aria-labelledby="addBagianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBagianModalLabel">{{ ucwords(str_replace('_', ' ', 'tambah_bagian')) }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('bagian.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama_bagian')) }}</label>
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

    <div class="modal fade" id="editBagianModal" tabindex="-1" role="dialog" aria-labelledby="editBagianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBagianModalLabel">{{ ucwords(str_replace('_', ' ', 'edit_bagian')) }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editBagianForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editNama">{{ ucwords(str_replace('_', ' ', 'nama_bagian')) }}</label>
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
        document.addEventListener("DOMContentLoaded", function() {
            const editModal = document.getElementById('editBagianModal');
            const editForm = document.getElementById('editBagianForm');
            const editNamaInput = document.getElementById('editNama');

            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {
                    const bagianId = this.getAttribute('data-id');
                    const bagianNama = this.getAttribute('data-nama');

                    // Set form action dynamically
                    editForm.action = `{{ url('bagian') }}/${bagianId}`;

                    // Set input values dynamically
                    editNamaInput.value = bagianNama;

                    // Show the modal
                    $(editModal).modal('show');
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const bagian_id = this.getAttribute('data-id');
                    const bagian_name = this.getAttribute('data-name');
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
                                `{{ route('bagian.destroy', ':id') }}`.replace(
                                    ':id', bagian_id));
                            const csrfToken = document.getElementsByName("_token")[0].value;

                            const hiddenMethod = document.createElement('input');
                            hiddenMethod.setAttribute('type', 'hidden');
                            hiddenMethod.setAttribute('name', '_method');
                            hiddenMethod.setAttribute('value', 'DELETE');

                            const name = document.createElement('input');
                            name.setAttribute('type', 'hidden');
                            name.setAttribute('name', 'name');
                            name.setAttribute('value', bagian_name);

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
