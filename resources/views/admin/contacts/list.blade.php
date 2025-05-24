@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
    <div id="main">
        @include('admin.layouts.message')

        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="page-heading">
                        <h2>Kategori Kontak</h2>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-3">
                                    <a href="{{ route('contacts.create') }}" class="btn btn-primary"
                                        style="background-color: #0f636d; border-color: #0f636d;">
                                        Tambah
                                    </a>
                                </div>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Email</th>
                                                <th>No WA</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp

                                            @if ($contacts->count() > 0)
                                                @foreach ($contacts as $item)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>
                                                            @if ($item->foto)
                                                                <img src="{{ asset('storage/' . $item->foto) }}"
                                                                    width="50" alt="Foto {{ $item->nama }}">
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ $item->jabatan ?? '-' }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->nowa }}</td>
                                                        <td>
                                                            <a href="{{ route('contacts.edit', $item->id) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>

                                                            <form action="{{ route('contacts.destroy', $item->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada data kontak tersedia.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert-delete.js') }}"></script>
@endsection