<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FloraFauna;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class DataFloraFaunaController extends Controller
{

    // Menampilkan semua data
    public function index()
    {
        $data['contacts'] = Contact::all();
        $data['users'] = User::all();
        $data['florafauna'] = FloraFauna::all();
        return view('data_florafauna', $data);
    }

    public function create()
    {
        return view('tambah_florafauna');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/app/images/florafauna/img', $imageName); // Simpan file di folder storage
            $validatedData['gambar'] = $imageName;
        }
        // Upload gambar jika ada
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/app/images/florafauna/icon', $imageName); // Simpan file di folder storage
            $validatedData['icon'] = $imageName;
        }

        FloraFauna::create($validatedData);

        return redirect()->route('admin.data_florafauna.index')->with('success', 'florafauna berhasil dibuat.');
    }

    // Pindah ke tampilan edit
    public function edit($id)
    {
        $data['florafauna'] = FloraFauna::findOrFail($id);
        return view('edit_florafauna', $data);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $florafauna = FloraFauna::findOrFail($id);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($florafauna->gambar) {
                // Hapus gambar dari storage
                $oldImagePath = storage_path('app/public/app/images/florafauna/img/' . $florafauna->gambar);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/app/images/florafauna/img', $imageName); // Simpan file di folder storage
            $validatedData['gambar'] = $imageName;
        }
        // Upload gambar jika ada
        if ($request->hasFile('icon')) {
            // Hapus gambar lama jika ada
            if ($florafauna->icon) {
                // Hapus gambar dari storage
                $oldImagePath = storage_path('app/public/app/images/florafauna/icon/' . $florafauna->icon);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $image = $request->file('icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/app/images/florafauna/icon', $imageName); // Simpan file di folder storage
            $validatedData['icon'] = $imageName;
        }

        $florafauna->update($validatedData);

        return redirect()->route('admin.data_florafauna.index')->with('success', 'florafauna berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $florafauna = FloraFauna::findOrFail($id);

        // Hapus gambar dari storage
        $storagePath = storage_path('app/public/app/images/florafauna/img/' . $florafauna->gambar);
        if (File::exists($storagePath)) {
            File::delete($storagePath);
        }
        // Hapus gambar dari storage
        $storagePath = storage_path('app/public/app/images/florafauna/icon/' . $florafauna->icon);
        if (File::exists($storagePath)) {
            File::delete($storagePath);
        }

        $florafauna->delete();

        return redirect()->route('admin.data_florafauna.index')->with('success', 'Data florafauna berhasil dihapus.');
    }
}
