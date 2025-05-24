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
                        <h2>Daftar Pengguna</h2>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-3 ">
                                    <a href="{{ route('admin.register') }}" class="btn btn-primary"
                                        style="background-color: #0f636d; border-color: #0f636d;">Tambah</a>
                                </div>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($data) && count($data) > 0)
                                                @foreach ($data as $val)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $val->name }}</td>
                                                        <td>{{ $val->email }}</td>
                                                        <td>{{ $val->nowa }}</td>
                                                        <td>{{ date('d-m-y', strtotime($val->created_at)) }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.edit', $val->id) }}"
                                                                class="btn btn-warning btn-sm"><span
                                                                    class="bi bi-pencil"></span></a>
                                                            <form action="{{ route('admin.delete', $val->id) }}"
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
