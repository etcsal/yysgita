<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = ['namaBank', 'logoBank', 'noRek','petunjuk'];
}
