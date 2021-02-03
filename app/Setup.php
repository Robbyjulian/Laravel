<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    protected $table = 'setup_aplikasi';
    protected $fillable = ['jumlah_hari_kerja', 'nama_aplikasi'];
}
