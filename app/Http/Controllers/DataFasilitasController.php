<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Fasilitas;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class DataFasilitasController extends Controller
{
    //menampilkan semua data
    public function index()
    {
        $data['contacts'] = Contact::all();
        $data['users'] = User::all();
        $data['fasilitas'] = Fasilitas::all();
        return view('data_fasilitas',$data);
    }

    public function create()
    {
        return view('tambah_fasilitas');
    }

    //menambah data
        public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/app/images', $imageName); // Simpan file di folder storage
            $validatedData['gambar'] = $imageName;
        }

        Fasilitas::create($validatedData);

        return redirect()->route('admin.data_fasilitas.index')->with('success', 'Fasilitas created successfully.');
    }

    //pindah ke tampilan edit
    public function edit($id)
    {
        $data['fasilitas'] = Fasilitas::findOrFail($id);
        return view('edit_fasilitas', $data);
    }

    //update data data
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($fasilitas->gambar) {
                // Hapus gambar dari storage
                $oldImagePath = storage_path('app/public/app/images/' . $fasilitas->gambar);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/app/images', $imageName); // Simpan file di folder storage
            $validatedData['gambar'] = $imageName;
        }

        $fasilitas->update($validatedData);

        return redirect()->route('admin.data_fasilitas.index')->with('success', 'Fasilitas Berhasil di Perbarui.');
    }


    //hapus data
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        // Hapus gambar dari storage
        $storagePath = storage_path('app/public/app/images/' . $fasilitas->gambar);
        if (File::exists($storagePath)) {
            File::delete($storagePath);
        }

        $fasilitas->delete();

        return redirect()->route('admin.data_fasilitas.index')->with('success', 'Data fasilitas berhasil dihapus.');
    }

}