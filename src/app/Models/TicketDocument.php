<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'path',
        'description',
        'uploaded_by',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}