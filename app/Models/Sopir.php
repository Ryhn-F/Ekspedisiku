<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sopir extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */


    protected $fillable = [
        'nama_sopir',
        'kepala_bagian',
        'plat_no',
        'tujuan',
        'no_telp',
        'muatan',
        'tgl_berangkat',
        'keterangan',
        'kartu_sim',
        'foto_surat',
        'foto_kendaraan',
        'foto_sertim',
        'foto_sopir',
        'deskripsi',
        'status'
    ];

}
