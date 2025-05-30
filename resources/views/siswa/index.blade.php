@extends('layout.main')

@section('title', 'Siswa')

@section('content')



    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Data Siswa</h5>
                <small>Data siswa SMKN 1 KAWALI 2025-2030</small>
                <br>
                <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalCreate"><i
                        class="bi bi-person-plus"></i> Tambah Data</button>

                <div class="mt-3 d-flex">
                    @if (request('filter') == 'Laki-laki')
                        <div class="alert alert-primary">Menampilkan data siswa Laki-laki</div>
                    @elseif(request('filter') == 'Perempuan')
                        <div class="alert alert-primary">Menampilkan data siswa Perempuan</div>
                    @endif
                    <div class="text-end p-2">
                        @if (request('filter'))
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary"><i
                                    class="bi bi-arrow-clockwise"></i>Reset</a>
                        @endif
                    </div>
                </div>


                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif


            </div>
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center ">


                    <form action="{{ route('siswa.index') }}" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-primary"><i class="bi bi-search"></i></button>

                            @if (request('search'))
                                <a href="{{ route('siswa.index') }}" class="btn btn-secondary ms-1 p-2"><i
                                        class="bi bi-arrow-clockwise"></i> Reset</a>
                            @endif
                        </div>
                    </form>

                    <div>
                        {{ $siswa->links('siswa.custom-bootstrap') }}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                                <tr>
                                    <td>{{ $loop->index + $siswa->firstItem() }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td class="text-center">
                                        <img src="{{ $item->image }}" alt="foto" width="100">


                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $item->id }}"><i
                                                class="bi bi-pencil-square"></i>
                                            Edit</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{ $item->id }}"><i class="bi bi-trash"></i>
                                            Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>

    </div>

    @include('siswa.modal-create')
    @include('siswa.modal-edit')
    @include('siswa.modal-delete')
@endsection
