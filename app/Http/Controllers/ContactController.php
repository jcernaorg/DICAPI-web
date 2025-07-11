<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'motivo' => 'required|in:Consulta,Donación,Voluntariado,Otro',
            'mensaje' => 'required|string',
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Por favor, verifica que no eres un robot.'
        ]);

        // Validar reCAPTCHA v2
        $recaptcha = $request->input('g-recaptcha-response');
        $secret = '6LeCj3krAAAAAAjhZaUetS3fhJZsi0ymvjqDhyHy';
        $response = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $recaptcha), true);
        if (!$response['success']) {
            return back()->withInput()->with('error', 'Error de reCAPTCHA. Intenta nuevamente.');
        }

        // Preparar mensaje para Google Chat
        $mensaje = "Nuevo Contacto\n" .
            "Nombre: {$request->name}\n" .
            "Email: {$request->email}\n" .
            "Asunto: {$request->motivo}\n" .
            "Mensaje: {$request->mensaje}";

        // Enviar a Google Chat (webhook real)
        $webhookUrl = 'https://chat.googleapis.com/v1/spaces/AAQAQG87V6A/messages?key=AIzaSyDdI0hCZtE6vySjMm-WEfRq3CPzqKqqsHI&token=JXTjMTSHfz9YOCC-3gJsAYCAaBCa82opAfwbC8N5geA';
        @file_get_contents($webhookUrl, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode(['text' => $mensaje]),
            ]
        ]));

        return back()->with('success', '¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.');
    }
} 