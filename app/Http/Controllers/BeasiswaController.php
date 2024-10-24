<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeasiswaController extends Controller
{

    public function pilihan()
    {
        return view('beasiswa.pilihan');
    }

    public function index()
    {
        return view('beasiswa.index');
    }

    public function daftar(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'nomor_hp' => 'required|numeric',
            'semester' => 'required|integer|min:1|max:8',
            'beasiswa' => 'nullable|string',
            'berkas' => 'nullable|file|mimes:pdf,jpg,zip|max:2048',
        ]);

        // Jika ada berkas yang diupload
        $filePath = null;
        $savedFileName = null;
        if ($request->hasFile('berkas')) {
            // ini untuk mendapatkan original filename
            $savedFileName = $request->file('berkas')->getClientOriginalName();
            $filePath = $request->file('berkas')->storeAs('public/berkas', $savedFileName);
        }

        // Menyimpan data pendaftaran
        Pendaftaran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'semester' => $request->semester,
            'ipk' => 3.4, // IPK default
            'beasiswa' => $request->ipk >= 3 ? $request->beasiswa : null, // Pilih beasiswa hanya jika IPK >= 3
            'berkas' => $savedFileName,
            'status_ajuan' => 'belum diverifikasi', // Status default
        ]);

        // Redirect ke halaman hasil dengan pesan sukses
        return redirect()->route('beasiswa.hasil')->with('success', 'Pendaftaran berhasil.');
    }

    public function hasil()
    {
        // Mengambil semua pendaftaran
        $pendaftarans = Pendaftaran::all();
        return view('beasiswa.hasil', compact('pendaftarans'));
    }
}
