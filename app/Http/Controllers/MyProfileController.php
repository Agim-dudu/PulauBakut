<?php

namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    public function edit()
    {
        $Id = Auth::id();
        $data['users'] = User::findOrFail($Id);
        return view('myprofile', $data);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'inputUsername' => 'required',
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputJenisKelamin' => 'nullable',
            'inputLocation' => 'nullable',
            'inputEmailAddress' => 'required|email',
            'inputPhone' => 'nullable',
            'inputBirthday' => 'nullable',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $validatedData['inputUsername'],
            'first_name' => $validatedData['inputFirstName'],
            'last_name' => $validatedData['inputLastName'],
            'pekerjaan' => $validatedData['inputOrgName'],
            'lokasi' => $validatedData['inputLocation'],
            'email' => $validatedData['inputEmailAddress'],
            'no_telpon' => $validatedData['inputPhone'],
            'tanggal_lahir' => $validatedData['inputBirthday']
        ]);

        if ($user) {
            return redirect()->route('admin.data_pengguna.index')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('admin.data_pengguna.index')->with('failed', 'Data Gagal Diupdate');
        }
    }

}
