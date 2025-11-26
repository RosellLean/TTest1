<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'requested_by',
        'name',
        'is_submitted',
        'submitted_document_id',
    ];

    protected $casts = [
        'is_submitted' => 'boolean'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function submittedDocument()
    {
        return $this->belongsTo(TicketDocument::class, 'submitted_document_id');
    }
}