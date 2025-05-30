<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $siswa = Siswa::get();
        $total_siswa = Siswa::count();
        $total_cowo = Siswa::where('jenis_kelamin', 'Laki-laki')->count();
        $total_cw = Siswa::where('jenis_kelamin', 'Perempuan')->count();
        $siswa_terbaru = Siswa::take(5)->latest()->get();
        return view('dashboard.index', compact( 'siswa','total_siswa', 'total_cowo', 'total_cw' , 'siswa_terbaru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
