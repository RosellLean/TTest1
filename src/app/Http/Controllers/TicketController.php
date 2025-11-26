<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Enums\TicketStatus;

class TicketController extends Controller
{
    public function create()
    {
        return view('tickets.create', [
            'ticketTypes' => \App\Enums\TicketType::toArray(),
            'transportModes' => \App\Enums\TransportMode::toArray(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ticket_type' => 'required|in:1,2,3',
            'transport_mode' => 'required|in:air,land,sea',
            'product' => 'required|string|max:255',
            'country_from' => 'required|string|max:255',
            'country_to' => 'required|string|max:255',
        ]);

        Ticket::create([
            'name' => $request->name,
            'ticket_type' => $request->ticket_type,
            'transport_mode' => $request->transport_mode,
            'product' => $request->product,
            'country_from' => $request->country_from,
            'country_to' => $request->country_to,
            'status' => TicketStatus::New,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Ticket creado correctamente.');
    }

    public function show(Ticket $ticket)
    {
        if (Auth::user()->role === UserRole::User && $ticket->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver este ticket');
        }

        return view('tickets.show', [
            'ticket' => $ticket,
            'documents' => $ticket->documents,  
            'documentRequests' => $ticket->documentRequests,
            'isAgent' => Auth::user()->role === UserRole::Agent,
            'isUser' => Auth::user()->role === UserRole::User,
        ]);
    }
}