<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\DocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentRequestController extends Controller
{
    public function store(Request $request, Ticket $ticket)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        DocumentRequest::create([
            'ticket_id' => $ticket->id,
            'requested_by' => Auth::id(),
            'name' => $request->name,
            'is_submitted' => false,
            'submitted_document_id' => null
        ]);

        return back()->with('success', 'Documento solicitado.');
    }
}