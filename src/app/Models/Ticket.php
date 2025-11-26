<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'agent_id',
        'name',
        'ticket_type',
        'transport_mode',
        'product',
        'country_from',
        'country_to',
        'status',
    ];

    public function documentRequests()
    {
        return $this->hasMany(DocumentRequest::class);
    }

    public function documents()
    {
        return $this->hasMany(TicketDocument::class);
    }
}