<?php

namespace App\Http\Controllers;

use App\Models\personas;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // Aquí obtén la pregunta actual del Akinator, podrías tener una lógica para obtener la próxima pregunta.
        $currentQuestion = "¿Tu personaje es hombre?";

        return view('index', compact('currentQuestion'));
    }
    public function pregunta()
    {
        // Aquí obtén la pregunta actual del Akinator, podrías tener una lógica para obtener la próxima pregunta.
        $currentQuestion = "¿Tu personaje es hombre?";

        return view('index', compact('currentQuestion'));
    }
    public function answer(Request $request)
{
    $answer = $request->input('answer');
    $currentQuestion = $request->input('question');

    $personas=personas::select(['id'])->where('sexo',$answer);

    $return->this



    // Aquí procesa la respuesta y obtén la siguiente pregunta
    // También verifica si la pregunta actual permite regresar
    // Puedes personalizar esta lógica según tus necesidades

    $response = [
        'question' => "Nueva pregunta...",
        'backAvailable' => true // Cambia esto según la lógica
    ];

    return response()->json($response);
}

}
