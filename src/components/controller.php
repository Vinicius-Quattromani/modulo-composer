<?php
namespace App\Http\Controllers;
use App\Models\PoliticaPrivacidade;

class PoliticaPrivacidadeController extends Controller
{
    public function index()
    {
        $itens = PoliticaPrivacidade::getAtivos();
        return view("PoliticaPrivacidade.politicaPrivacidade", ["itens" => $itens]);
    }
}