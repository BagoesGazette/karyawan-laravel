<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKaryawan extends Model
{
    
    protected $table = "detail_karyawan";
    protected $fillable = ["nama_karyawan","jumlah"];

}
