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
                        <h2>Verify User Management</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                @php
                                    $no = 1;
                                @endphp
                                <!-- table striped -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>No.WhatsApp</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($users) && count($users) > 0)
                                                @foreach ($users as $val)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $val->name }}</td>
                                                        <td>{{ $val->email }}</td>
                                                        <td>{{ $val->nowa }}</td>
                                                        <td>{{ date('d-m-y', strtotime($val->created_at)) }}</td>
                                                        <td>
                                                            <form action="{{ route('admin.verify.user', $val->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('POST')
                                                                <button type="submit"
                                                                    class="btn btn-sm {{ $val->is_verified ? 'btn-success' : 'btn-danger' }}">
                                                                    {{ $val->is_verified ? 'Terverifikasi' : 'Verifikasi' }}
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <!-- Tombol Hapus -->
                                                            <form action="{{ route('deleteuser', $val->id) }}"
                                                                method="POST" style="display:inline;"
                                                                onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">Hapus</button>
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
