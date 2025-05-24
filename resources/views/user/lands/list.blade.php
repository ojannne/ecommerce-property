@extends('user.layouts.app')

@section('content')
    <div id="main">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="page-heading">
                    <h2>Daftar Tanah</h2>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-3">
                                <a href="{{ route('user.lands.create') }}" class="btn btn-primary"
                                    style="background-color: #0f636d; border-color: #0f636d;">Tambah</a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Lokasi</th>
                                            <th>Harga</th>
                                            <th>Kategori</th>
                                            <th>Luas Tanah</th>
                                            <th>Status</th>
                                            <th>Tampil di Website</th>
                                            <th>Dibuat oleh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lands as $land)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $land->judul }}</td>
                                                <td>{{ $land->lokasi }}</td>
                                                <td>Rp{{ number_format((float) str_replace(['Rp', '.', ' '], '', $land->harga), 0, ',', '.') }}
                                                </td>
                                                <td>{{ ucfirst(str_replace('_', ' ', $land->kategori)) }}</td>
                                                <td>{{ $land->luas_tanah }} m²</td>
                                                <td>
                                                    @if ($land->status == 'tersedia')
                                                        <span class="badge bg-success">Tersedia</span>
                                                    @elseif($land->status == 'terjual')
                                                        <span class="badge bg-danger">Terjual</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Disewa</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('user.lands.toggle.website', $land->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="btn btn-sm {{ $land->tampilkan_website ? 'btn-success' : 'btn-danger' }}">
                                                            {{ $land->tampilkan_website ? 'Aktif' : 'Nonaktif' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>{{ $land->user->name ?? 'N/A' }}</td>
                                                <td>
                                                    @if ($land->user_id === Auth::id() || Auth::user()->role === 'admin')
                                                        <a href="{{ route('user.lands.edit', $land->id) }}"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <form action="{{ route('user.lands.destroy', $land->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let table1 = document.querySelector('#table1');
            if (table1) {
                let dataTable = new simpleDatatables.DataTable(table1);
            }
        });
    </script>
@endsection
