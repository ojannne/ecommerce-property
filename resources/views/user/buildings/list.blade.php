@extends('user.layouts.app')

@section('style')
@endsection

@section('content')
    <div id="main">
        @include('user.layouts.message')

        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="page-heading">
                        <h2>Daftar Bangunan</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-3">
                                    <a href="{{ route('user.buildings.create') }}" class="btn btn-primary"
                                        style="background-color: #0f636d; border-color: #0f636d;">Tambah</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Harga</th>
                                                <th>Tipe Bangunan</th>
                                                <th>Status</th>
                                                <th>Lokasi</th>
                                                <th>Gambar</th>
                                                <th>Status Sewa</th>
                                                <th>Tampil di Website</th>
                                                <th>Dibuat oleh</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @if (isset($buildings) && count($buildings) > 0)
                                                @foreach ($buildings as $building)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $building->judul }}</td>
                                                        <td>Rp{{ number_format((float) str_replace(['Rp', '.', ' '], '', $building->harga), 0, ',', '.') }}
                                                        </td>
                                                        <td>{{ ucfirst($building->tipe_bangunan) }}</td>
                                                        <td>
                                                            @if ($building->status == 'Dijual')
                                                                <span class="badge bg-success">Dijual</span>
                                                            @elseif ($building->status == 'Disewa')
                                                                <span class="badge bg-warning text-dark">Disewa</span>
                                                            @else
                                                                <span class="badge bg-danger">Tidak ada status</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $building->lokasi }}</td>
                                                        <td>
                                                            @if (!empty($building->gambar) && is_array($building->gambar))
                                                                @if (isset($building->gambar[0]))
                                                                    <img src="{{ asset($building->gambar[0]) }}"
                                                                        alt="Gambar" width="50">
                                                                @else
                                                                    <span class="text-muted">Tidak ada</span>
                                                                @endif
                                                            @else
                                                                <span class="text-muted">Tidak ada</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('user.buildings.mark-sold', $building->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                @if ($building->status_sewa == 'disewa')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-warning text-dark">
                                                                        Disewa
                                                                    </button>
                                                                @else
                                                                    <button type="submit" class="btn btn-sm btn-success">
                                                                        Kosong
                                                                    </button>
                                                                @endif
                                                            </form>
                                                        </td>

                                                        <td>
                                                            <form
                                                                action="{{ route('user.buildings.toggle-website', $building->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit"
                                                                    class="btn btn-sm {{ $building->tampilkan_website ? 'btn-success' : 'btn-danger' }}">
                                                                    {{ $building->tampilkan_website ? 'Aktif' : 'Nonaktif' }}
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            {{ optional($building->user)->name ?? 'Tidak ditemukan' }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('user.buildings.edit', $building->id) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                            <form action="{{ route('user.buildings.destroy', $building->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Yakin ingin tandai sebagai terjual?')">Terjual</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="11" class="text-center">Data tidak ditemukan</td>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new simpleDatatables.DataTable("#table1");
        });
    </script>
@endsection
