@foreach ($siswa as $item)
    <div class="modal fade" id="modalViews{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light" id="staticBackdropLabel">Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Nama</td>
                                <td>{{ $item->nama }}</td>
                            </tr>
                            <tr>
                                <td>Nis</td>
                                <td>{{ $item->nis }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>{{ $item->kelas }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $item->alamat }}</td>
                            </tr>

                            <tr>
                                <td>Profile</td>
                                <td>
                                    @if ($item->image)
                                        {{-- <img src="{{ asset('storage/image/siswa/' . $item->image) }}"
                                            alt="Profile Image" width="100px"> --}}
                                            <img src="{{ $item->image }}" alt="foto" width="100">

                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                            </tr>



                        </table>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endforeach
