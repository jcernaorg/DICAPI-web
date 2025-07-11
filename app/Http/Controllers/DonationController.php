<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display the donation form.
     */
    public function index()
    {
        return view('donations');
    }

    /**
     * Store a new donation.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'custom-amount' => 'required_without:amount|numeric|min:1',
            'amount' => 'required_without:custom-amount|numeric|min:1'
        ]);

        // Determinar el monto final
        $amount = $request->input('custom-amount') ?: $request->input('amount');

        // Crear la donación
        $donation = Donation::create([
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'amount' => $amount,
            'payment_method' => 'pending', // Se actualizará cuando se procese el pago
            'status' => 'pending'
        ]);

        // Aquí iría la lógica para procesar el pago
        // Por ahora solo retornamos una respuesta de éxito
        return response()->json([
            'success' => true,
            'message' => '¡Gracias por tu donación!',
            'donation' => $donation
        ]);
    }
} 