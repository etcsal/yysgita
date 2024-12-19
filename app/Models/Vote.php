<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'votes'; // Define the table name (optional if it follows Laravel's naming convention)

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'kandidat_id',
    ];

    /**
     * Get the user who cast the vote.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the kandidat that received the vote.
     */
    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }
}
