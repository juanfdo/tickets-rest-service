<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $table = 'tbl_buyers';
    protected $fillable = [
        'buy_first_name',
        'buy_last_name',
        'buy_id_number'
    ];
}
