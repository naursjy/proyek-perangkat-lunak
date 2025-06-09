<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class p3mModel extends Model
{
    use HasFactory;
    protected $table = 'p3m_models';
    protected $fillable = [
        'judul',
        'bidang',
        'ketua',
        'jeniskelamin',
        'nidn',
        'jabatan',
        'prodi',
        'telp',
        'alamat',
        'lokasi',
        'lamapenelitian',
        'biaya',
        'uppdf', // untuk file PDF
        'foto', // untuk foto
        'kategori_id',
        'user_id', // untuk user
    ];

    public function anggotap3m()
    {
        return $this->hasMany(anggotap3mModel::class, 'p3m_model_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kategori()
    {
        return $this->belongsTo(M_categories::class, 'kategori_id', 'id');
    }
}
