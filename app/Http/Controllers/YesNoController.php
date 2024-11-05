<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YesNoController extends Controller
{
    public function index()
    {
        return view('yesno');
    }

    public function getAnswer()
    {
        try {
            $response = Http::get('https://yesno.wtf/api');

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => 'No se pudo obtener la respuesta'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al conectar con la API'], 500);
        }
    }
}
