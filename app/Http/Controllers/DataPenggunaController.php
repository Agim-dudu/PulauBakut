<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DataPenggunaController extends Controller
{
    public function index()
    {
        $data['contacts'] = Contact::all();
        $data['users'] = User::all();
        return view('data_pengguna', $data);
    }

    // ... kode lainnya

 


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function edit(string $id)
    {
        $data['users'] = DB::table('users')->where('id', $id)->first();


        return view('edit_pengguna', $data);
    }

    // public function update(Request $request, string $id)
    // {
    //     $validatedData = $request->validate([
    //         'inputUsername' => 'required',
    //         'inputFirstName' => 'required',
    //         'inputLastName' => 'required',
    //         'inputJenisKelamin' => 'nullable',
    //         'inputLokasi' => 'nullable',
    //         'inputEmail' => 'required|email',
    //         'inputPhone' => 'nullable',
    //         'inputBirthday' => 'nullable',
    //         'inputAvatar' => 'nullable',
    //         'PasswordInput' => 'required',
    //         'is_adminInput' => 'required|boolean',
    //     ]);

    //     $user = User::findOrFail($id);
    //     $hashedPassword = Hash::make($validatedData['PasswordInput']);

    //     $user->update([
    //         'name' => $validatedData['inputUsername'],
    //         'first_name' => $validatedData['inputFirstName'],
    //         'last_name' => $validatedData['inputLastName'],
    //         'pekerjaan' => $validatedData['inputOrgName'],
    //         'lokasi' => $validatedData['inputLocation'],
    //         'email' => $validatedData['inputEmailAddress'],
    //         'no_telpon' => $validatedData['inputPhone'],
    //         'tanggal_lahir' => $validatedData['inputBirthday'],
    //         'avatar' => $validatedData['inputAvatar'],
    //         'password' => $hashedPassword,
    //         'is_admin' => $validatedData['is_adminInput']
    //     ]);

    //     if ($user) {
    //         return redirect()->route('admin.data_pengguna.index')->with('success', 'Data Berhasil Diupdate');
    //     } else {
    //         return redirect()->route('admin.data_pengguna.index')->with('failed', 'Data Gagal Diupdate');
    //     }
    // }

    //update data data
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            // 'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'inputUsername' => 'required',
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputJenisKelamin' => 'required',
            'inputLokasi' => 'required',
            'inputEmail' => 'required|email',
            'inputPhone' => 'required',
            'inputBirthday' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'PasswordInput' => 'required',
            'is_adminInput' => 'required|boolean',
        ]);

        $user = User::findOrFail($id);
        $hashedPassword = Hash::make($validatedData['PasswordInput']);

        // Upload gambar jika ada
        if ($request->hasFile('avatar')) {
            // Hapus gambar lama jika ada
            if ($user->avatar) {
                // Hapus gambar dari storage
                $oldImagePath = storage_path('app/public/app/images/avatar/' . $user->avatar);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $image = $request->file('avatar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/app/images/avatar/', $imageName); // Simpan file di folder storage
            $validatedData['avatar'] = $imageName;
        }

        $user->update($validatedData);

        return redirect()->route('admin.data_pengguna.index')->with('success', 'pengguna Berhasil di Perbarui.');
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.data_pengguna.index')->with('success', 'Data pengguna berhasil dihapus.');
    }



}
