<?php

namespace App\Http\Controllers;

use App\Models\ClientCase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function calender()
    {
        return view('calendar');
    }

    public function fetchEvents()
    {
        $events = ClientCase::where('status', 'approved')
            ->get(['id', 'client_id', 'attorney_id', 'court_date', 'case_details']);

        // FullCalendar format mein convert karein
        $formattedEvents = $events->map(function ($event) {
            return [
                'id'    => $event->id,
                'title' => $event->client->name,
                'start' => $event->court_date,
                'description' => $event->case_details,
                'backgroundColor' => 'orange', // Optional: Custom Color
                'borderColor' => 'red', // Optional: Border Color
            ];
        });

        return response()->json($formattedEvents);
    }
}
