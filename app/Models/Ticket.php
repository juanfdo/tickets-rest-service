<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{    
    use HasFactory;

    protected $table = 'tbl_tickets';
    protected $fillable = [
        'tic_event_name',
        'tic_quantity',
        'tic_sold'
    ];

    public function available_quantity(){
        return $this->tic_quantity - $this->sold;
    }
}
