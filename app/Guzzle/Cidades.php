<?php

namespace App\Guzzle;

use GuzzleHttp\Client;

class Cidades {

    public function porId($id) {
        $client = new Client(['base_uri' => 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/' . $id . '/municipios']);
        $response = $client->request('GET');
        return json_decode($response->getBody()->getContents());
    }

    public function get($cod) {

        $client = new Client(['base_uri' => 'http://servicodados.ibge.gov.br/api/v1/localidades/municipios' . '/' . $cod]);
        $response = $client->request('GET');
        return json_decode($response->getBody()->getContents());
    }

}
