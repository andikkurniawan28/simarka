@extends('template.master')

@section('title')
    {{ ucwords(str_replace('_', ' ', 'edit_seksi')) }}
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
                <form action="{{ route('seksi.update', $seksi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama_bagian')) }}</label>
                        <select class="form-control select2" id="bagian" name="bagian_id" width="100%" required>
                            <option disabled>Pilih {{ ucwords(str_replace('_', ' ', 'bagian')) }} :</option>
                            @foreach ($bagians as $bagian)
                                <option value="{{ $bagian->id }}" {{ $seksi->bagian_id == $bagian->id ? 'selected' : '' }}>
                                    {{ $bagian->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama_seksi')) }}</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $seksi->nama) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('seksi.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>

    </div>
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
