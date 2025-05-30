@foreach ($siswa as $item)
    <div class="modal fade" id="modalEdit{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light" id="staticBackdropLabel">Create Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-10 mx-auto">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ $item->nama }}">
                            </div>

                            <div class="col-10 mx-auto mt-2">
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" id="nis" class="form-control"
                                    value="{{ $item->nis }}">
                            </div>

                            <div class="col-10 mx-auto mt-2">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control"
                                    value="{{ $item->kelas }}">

                            </div>

                            <div class="mb-3 col-10 mx-auto mt-2 ">
                                <label class="form-label">Jenis Kelamin</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            value="Laki-laki"
                                            {{ old('jenis_kelamin', $item->jenis_kelamin) == 'Laki-Laki' ? 'checked' : '' }}>
                                        <label class="form-check-label">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            value="Perempuan"
                                            {{ old('jenis_kelamin', $item->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }}>
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-10 mx-auto mt-2">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">

                                @if ($item->image)
                                    <img src="{{ asset('storage/image/siswa/' . $item->image) }}" alt=""
                                        width="150px">
                                @endif
                            </div>

                            <div class="col-10 mx-auto mt-2">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    value="{{ $item->alamat }}">

                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endforeach
