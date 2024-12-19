<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;

    protected $table = 'kandidats';

    protected $fillable = [
        'user_id',
        'votes_count',
        'bulan',
        'tahun',
        'nama_kandidat',
        'email',
        'foto_kandidat',
        'pendidikan',
        'pekerjaan',
        'tinggi_badan',
        'berat_badan',
        'bahasa',
        'kebudayaan',
        'musik',
        'pengetahuan',
        'approve',
        'is_winner', // Tambahkan kolom ini
    ];

    protected $casts = [
        'votes_count' => 'integer',
        'approve' => 'string',
        'is_winner' => 'boolean', // Cast kolom is_winner ke boolean
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // Scope untuk pemenang
    public function scopeWinners($query)
    {
        return $query->where('is_winner', true);
    }

    // Dynamic Attribute untuk total votes
    public function getTotalVotesAttribute()
    {
        return $this->votes()->count();
    }
}
