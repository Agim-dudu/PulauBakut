<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\FloraFauna;
use App\Models\Galery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $data['fasilitas'] = Fasilitas::all();
        $data['florafauna'] = FloraFauna::all();
        $data['galery'] = galery::all();
        return view('index',$data);
    }

}
