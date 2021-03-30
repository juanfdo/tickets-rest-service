<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketXBuyer extends Model
{
    use HasFactory;

    protected $table = 'tbl_ticket_x_buyers';
    protected $fillable = [
        'txb_ticket_id',
        'txb_buyer_id',
        'txb_quantity'
    ];
}
