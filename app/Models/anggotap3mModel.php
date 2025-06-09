<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggotap3mModel extends Model
{
    use HasFactory;
    protected $table = 'anggotap3m_models';
    protected $fillable = ['p3m_model_id', 'nama', 'prodi', 'jabatan'];

    public function p3m()
    {
        return $this->belongsTo(p3mModel::class, 'p3m_model_id');
    }
}
