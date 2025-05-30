<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('nis', 'like', '%' . $request->search . '%')
                ->orWhere('kelas', 'like', '%' . $request->search . '%')
                ->orWhere('jenis_kelamin', 'like', '%' . $request->search . '%')
                ->orWhere('alamat', 'like', '%' . $request->search . '%');
        }

        if ($request->has('filter')) {
            $query->where('jenis_kelamin', $request->filter); // 'L' atau 'P'
        }


        $siswa = $query->latest()->paginate(10)->appends(request()->query());

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validasi = validator($request->all(), [
            'nama'          => 'required|unique:siswas,nama',
            'nis'           => 'required|unique:siswas,nis',
            'kelas'         => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withInput()->withErrors($validasi);
        }

        $image = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'image/siswa/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        $siswa['nama'] = $request->nama;
        $siswa['nis'] = $request->nis;
        $siswa['kelas'] = $request->kelas;
        $siswa['jenis_kelamin'] = $request->jenis_kelamin;
        $siswa['alamat'] = $request->alamat;
        $siswa['image'] = $filename;





        // Simpan ke database
        Siswa::create($siswa);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $validasi = validator($request->all(), [
            'nama'          => 'required',
            'nis'           => 'required',
            'kelas'         => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withInput()->withErrors($validasi);
        }

        $find = Siswa::find($id);



        $siswa['nama'] = $request->nama;
        $siswa['nis'] = $request->nis;
        $siswa['kelas'] = $request->kelas;
        $siswa['jenis_kelamin'] = $request->jenis_kelamin;
        $siswa['alamat'] = $request->alamat;

        $image = $request->file('image');
        if ($image) {

            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'image/siswa/' . $filename;

            if($find->image) {
                Storage::disk('public')->delete('image/siswa/'.$find->image);
            }

            Storage::disk('public')->put($path, file_get_contents($image));

            $siswa['image'] = $filename;
        }


        $find->update($siswa);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $siswa = Siswa::find($id);

    if ($siswa) {
        // Hapus gambar jika ada
        if ($siswa->image && Storage::exists('public/image/siswa/' . $siswa->image)) {
            Storage::delete('public/image/siswa/' . $siswa->image);
        }

        // Hapus data siswa
        $siswa->delete();

        return redirect()->back()->with('success', 'Data dan gambar berhasil dihapus');
    }

    return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
}
