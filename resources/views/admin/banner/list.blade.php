<!-- filepath: c:\xampp\htdocs\e-commerce\resources\views\admin\admin\list.blade.php -->
@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ 'assets/vendors/sweetalert2/sweetalert2.min.css' }}">
@endsection

@section('content')
    <div id="main">

        @include('admin.layouts.message')

        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="page-heading">
                        <h2>Daftar Banner</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-3 ">
                                    <a href="{{ route('banner.create') }}" class="btn btn-primary"
                                        style="background-color: #0f636d; border-color: #0f636d;">Tambah</a>
                                </div>
                                <!-- table striped -->
                                @php
                                    $no = 1;
                                @endphp
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($images) && count($images) > 0)
                                                @foreach ($images as $image)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>
                                                            @if ($image->image)
                                                                <img src="{{ asset('storage/' . $image->image) }}"
                                                                    alt="Banner Image" style="max-width: 100px;">
                                                            @else
                                                                Tidak ada gambar
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $image->status ? 'Aktif' : 'Tidak Aktif' }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('banner.edit', $image->id) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                            <form action="{{ route('banner.destroy', $image->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4" class="text-center">Banner tidak ditemukan</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endsection

    @section('script')
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <script src="{{ asset('assets/js/sweetalert-delete.js') }}"></script>
    @endsection
