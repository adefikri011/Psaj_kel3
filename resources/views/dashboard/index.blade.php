@extends('layout.main')

@section('title', 'Dahboard')


@section('content')

    <div class="container">
        <h2>Dashboard</h2>

    </div>

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <div class="col">
                <div class="card h-100 text-center shadow">
                    <div class="card-body">
                        <div class="display-4 text-primary mb-2">
                            <i class="bi bi-people"></i>
                        </div>
                        <h2 class="card-title mb-3">{{ $total_siswa }}</h2>
                        <p class="card-text text-muted">Jumlah Siswa</p>
                        <hr>
                        <a href="{{ route('siswa.index') }}">Views</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 text-center shadow">
                    <div class="card-body">
                        <div class="display-4 text-primary mb-2">
                            <i class="bi bi-people"></i>
                        </div>
                        <h2 class="card-title mb-3">{{ $total_cowo }}</h2>
                        <p class="card-text text-muted">Jumlah Siswa Laki - Laki</p>
                        <hr>
                        <a href="{{ route('siswa.index', ['filter' => 'Laki-laki']) }}">Views</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 text-center shadow">
                    <div class="card-body">
                        <div class="display-4 text-primary mb-2">
                            <i class="bi bi-people"></i>
                        </div>
                        <h2 class="card-title mb-3">{{ $total_cw }}</h2>
                        <p class="card-text text-muted">Jumlah Siswa Perempuan</p>
                        <hr>
                        <a href="{{ route('siswa.index', ['filter' => 'Perempuan']) }}">Views</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container">
        <h2>Siswa Terbaru</h2>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nis</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($siswa_terbaru as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalViews{{$item->id}}"><i class="bi bi-eye"></i>
                                View</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>


@include('dashboard.modal-views')

@endsection
