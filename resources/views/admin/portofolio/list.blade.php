<!-- filepath: c:\xampp\htdocs\e-commerce\resources\views\admin\admin\list.blade.php -->
@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div id="main">

        @include('admin.layouts.message')

        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="page-heading">
                        <h2>Daftar Testimoni</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-3 ">
                                    <a href="{{ route('portofolios.create') }}" class="btn btn-primary"
                                        style="background-color: #0f636d; border-color: #0f636d;">Tambah</a>
                                </div>
                                <!-- table striped -->
                                @php
                                    $no = 1;
                                @endphp
                                <!-- resources/views/admin/portofolios/list.blade.php -->

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table1">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                <th>Pemilik</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @if ($portofolios->count() > 0)
                                                @foreach ($portofolios as $portofolio)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td><img src="{{ asset('storage/' . $portofolio->gambar) }}"
                                                                alt="Gambar Portofolio" width="200"></td>
                                                        <td>{{ $portofolio->judul }}</td>
                                                        <td>{{ $portofolio->pemilik }}</td>
                                                        <td>{{ $portofolio->alamat }}</td>
                                                        <td>
                                                            <a href="{{ route('portofolios.edit', $portofolio) }}"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <form action="{{ route('portofolios.destroy', $portofolio) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="13" class="text-center">Data tidak ditemukan</td>
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
    @endsection
