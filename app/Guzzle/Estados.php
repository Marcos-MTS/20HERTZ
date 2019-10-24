<?php

namespace App\Guzzle;

use GuzzleHttp\Client;

class Estados {

    public function get($cod = null) {

        if ($cod) {
            $client = new Client(['base_uri' => 'http://servicodados.ibge.gov.br/api/v1/localidades/estados' . '/' . $cod]);
        } else {
            $client = new Client(['base_uri' => 'https://servicodados.ibge.gov.br/api/v1/localidades/estados']);
        }
        $response = $client->request('GET');
        $estadosL = json_decode($response->getBody()->getContents());

        return $estadosL;
    }

}
