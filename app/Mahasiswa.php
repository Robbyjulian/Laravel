<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;
    protected $table = 'mahasiswa';
    protected $fillable = ['nrp', 'nama_depan', 'nama_belakang', 'email', 'avatar'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.png');
        }
        return asset('images/' . $this->avatar);
    }

    public function makul()
    {
        return $this->belongsToMany(makul::class)->withPivot(['nilai'])->withTimestamps();
    }

    public function rataNilai()
    {
        $total = 0;
        $hitung = 0;
        foreach ($this->makul as $makul) {
            $total += $makul->pivot->nilai;
            $hitung++;
        }

        return round($total / $hitung);
    }

    public function nama_lengkap()
    {
        return $this->nama_depan . ' ' . $this->nama_belakang;
    }
}
