<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::orderBy('appointment_date', 'asc')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
            'appointment_date' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        Appointment::create($validated);
        return back()->with('success', 'Cita agendada correctamente.');
    }

    public function updateStatus(Request $request, Appointment $appointment)
    {
        $request->validate(['status' => 'required|in:pendiente,completada,cancelada']);
        $appointment->update(['status' => $request->status]);
        return back()->with('success', 'Estado actualizado.');
    }
}