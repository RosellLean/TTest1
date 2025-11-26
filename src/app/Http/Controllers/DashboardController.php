<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Depends on the role, fetch tickets accordingly
        if ($user->role === UserRole::Agent) {
            $tickets = Ticket::latest()->get();
        } else {
            $tickets = Ticket::where('user_id', $user->id)
                        ->latest()
                        ->get();
        }

        return view('dashboard', compact('tickets'));
    }
}