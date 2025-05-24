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
                        <h2>Property list</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-3 ">
                                    <a href="{{ route('testimonis.create') }}" class="btn btn-primary"
                                        style="background-color: #0f636d; border-color: #0f636d;">Tambah</a>
                                </div>
                                <!-- table striped -->
                                @php
                                    $no = 1;
                                @endphp
                                <!-- resources/views/admin/property/list.blade.php -->

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama</th>
                                                <th>Pekerjaan</th>
                                                <th>Testimoni</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @if (isset($testimonis) && count($testimonis) > 0)
                                                @foreach ($testimonis as $testimoni)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>
                                                            @if ($testimoni->foto)
                                                                <img src="{{ asset('storage/' . $testimoni->foto) }}"
                                                                    alt="{{ $testimoni->nama }}" width="100">
                                                            @else
                                                                <span>Tidak ada gambar</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $testimoni->nama }}</td>
                                                        <td>{{ $testimoni->pekerjaan }}</td>
                                                        <td>{{ $testimoni->testimoni }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($testimoni->created_at)) }}</td>
                                                        <td>
                                                            <a href="{{ route('testimonis.edit', $testimoni) }}"
                                                                class="btn btn-warning btn-sm">
                                                                <span class="bi bi-pencil"></span>
                                                            </a>
                                                            <form action="{{ route('testimonis.destroy', $testimoni) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
                                                                    <span class="bi bi-trash"></span>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="text-center">Data tidak ditemukan</td>
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
