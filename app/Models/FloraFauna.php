<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloraFauna extends Model
{
    use HasFactory;

    protected $table = 'florafauna';
    protected $fillable = ['judul', 'deskripsi', 'gambar', 'icon'];
}
