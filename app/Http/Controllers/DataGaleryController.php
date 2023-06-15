<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Galery;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataGaleryController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data['contacts'] = Contact::all();
        $data['users'] = User::all();
        $data['galery'] = galery::all();
        return view('data_galery', $data);
    }

    public function create()
    {
        return view('tambah_galery');
    }

    // Menambah data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/app/images/galery/img', $imageName); // Simpan file di folder storage
            $validatedData['gambar'] = $imageName;
        }

        galery::create($validatedData);

        return redirect()->route('admin.data_galery.index')->with('success', 'galery berhasil dibuat.');
    }

    // Pindah ke tampilan edit
    public function edit($id)
    {
        $data['galery'] = galery::findOrFail($id);
        return view('edit_galery', $data);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required',
        ]);

        $galery = galery::findOrFail($id);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($galery->gambar) {
                // Hapus gambar dari storage
                $oldImagePath = storage_path('app/public/app/images/galery/img/' . $galery->gambar);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/app/images/galery/img', $imageName); // Simpan file di folder storage
            $validatedData['gambar'] = $imageName;
        }

        $galery->update($validatedData);

        return redirect()->route('admin.data_galery.index')->with('success', 'galery berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $galery = galery::findOrFail($id);

        // Hapus gambar dari storage
        $storagePath = storage_path('app/public/app/images/galery/img/' . $galery->gambar);
        if (File::exists($storagePath)) {
            File::delete($storagePath);
        }

        $galery->delete();

        return redirect()->route('admin.data_galery.index')->with('success', 'Data galery berhasil dihapus.');
    }
}

