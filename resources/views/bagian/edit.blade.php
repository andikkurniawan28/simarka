@extends('template.master')

@section('title')
    {{ ucwords(str_replace('_', ' ', 'edit_bagian')) }}
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
                <form action="{{ route('bagian.update', $bagian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama_bagian')) }}</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $bagian->nama) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('bagian.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>

    </div>
@endsection
