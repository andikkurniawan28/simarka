@extends('template.master')

@section('title')
    {{ ucwords(str_replace('_', ' ', 'daftar_seksi')) }}
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
                    <!-- Trigger Modal Button -->
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addseksiModal">
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
                                <th>{{ ucwords(str_replace('_', ' ', 'nama')) }}</th>
                                <th>{{ ucwords(str_replace('_', ' ', 'action')) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seksis as $seksi)
                                <tr>
                                    <td>{{ $seksi->id }}</td>
                                    <td>{{ $seksi->bagian->nama }}</td>
                                    <td>{{ $seksi->nama }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="action">
                                            <a href="{{ route('seksi.edit', $seksi->id) }}"
                                                class="btn btn-secondary btn-sm">{{ ucwords(str_replace('_', ' ', 'edit')) }}</a>
                                            <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-id="{{ $seksi->id }}" data-name="{{ $seksi->name }}">{{ ucwords(str_replace('_', ' ', 'hapus')) }}</button>
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

    <!-- Modal -->
    <div class="modal fade" id="addseksiModal" tabindex="-1" role="dialog" aria-labelledby="addseksiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addseksiModalLabel">{{ ucwords(str_replace('_', ' ', 'tambah_seksi')) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('seksi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama_bagian')) }}</label>
                            <select class="form-control select2" id="bagian" name="bagian_id" width="100%" required>
                                <option disabled selected>Pilih {{ ucwords(str_replace('_', ' ', 'bagian')) }} :</option>
                                @foreach ($bagians as $bagian)
                                    <option value="{{ $bagian->id }}">{{ $bagian->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama_seksi')) }}</label>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const seksi_id = this.getAttribute('data-id');
                    const seksi_name = this.getAttribute('data-name');
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
                                `{{ route('seksi.destroy', ':id') }}`.replace(
                                    ':id', seksi_id));
                            const csrfToken = document.getElementsByName("_token")[0].value;

                            const hiddenMethod = document.createElement('input');
                            hiddenMethod.setAttribute('type', 'hidden');
                            hiddenMethod.setAttribute('name', '_method');
                            hiddenMethod.setAttribute('value', 'DELETE');

                            const name = document.createElement('input');
                            name.setAttribute('type', 'hidden');
                            name.setAttribute('name', 'name');
                            name.setAttribute('value', seksi_name);

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
        $('#bagian').select2({
            theme: 'bootstrap',
            placeholder: "Pilih bagian"
        });
    });
</script>
@endsection
