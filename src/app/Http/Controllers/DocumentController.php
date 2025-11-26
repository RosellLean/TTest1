<?php
namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\TicketDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function upload(Request $request, Ticket $ticket)
    {
        $request->validate([
            'file' => 'required|file|max:8192',
            'description' => 'nullable|string'
        ]);

        $path = $request->file('file')->store(
            'tickets/' . $ticket->id . '/documents',
            'public'
        );

        $document = TicketDocument::create([
            'ticket_id' => $ticket->id,
            'path' => $path,
            'description' => $request->description,
            'uploaded_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Documento subido correctamente.');
    }
}