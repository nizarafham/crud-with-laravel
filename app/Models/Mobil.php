<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'bahan_bakar', 'asal_negara'];
    protected $table = 'Mobil';
    public $timestamps = false;
}
