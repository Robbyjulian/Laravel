<?php

namespace App;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;

class makul extends Model
{
    protected $table = 'makul';
    protected $fillable = ['kode', 'nama', 'semester'];

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class)->withPivot(['nilai']);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
