<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function consulta(Request $request) {

        if(isset($request)) {
            $cep = $request->cep;
            $client = new Client();

            try {
                $response = $client->request('GET', 'https://viacep.com.br/ws/'. $cep .'/json/');
            } catch (Exception $e) {
                return redirect()->route('index')->with('msg', 'Erro na consulta!: '.$e->getMessage());
            }

            $data = json_decode($response->getBody(), true);

            if (isset($data['erro']) && $data['erro'] == true) {
                return redirect()->route('index')->with('msg', 'CEP não encontrado.');
            }

            return view('welcome', ['data' => $data]);
        }
    }
}
