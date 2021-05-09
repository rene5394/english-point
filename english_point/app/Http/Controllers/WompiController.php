<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WompiController extends Controller
{
    //Function Test Wompi Purchase Transaction
    public function index(){

    }

    public function authWompi(){
        $client = new Client();
        $endpoint = 'https://id.wompi.sv/connect/token';

        $response = $client->request('POST', $endpoint, ['form_params' => [
        'grant_type' => 'client_credentials',
        'audience' => 'wompi_api',
        'client_id' => env("WOMPI_APP_ID"),
        'client_secret'=> env("WOMPI_API_SECRET"),
        ]]);

        $content = $response->getBody()->getContents();
        $data = json_decode($content);
        return $data->access_token;
    }

    public function createTransaction($card, $amount, $user){
        try{
            $client = new Client();
            $endpoint = 'https://api.wompi.sv/TransaccionCompra';
            $token = $this->authWompi();
            $json = json_encode (
                [
                    'tarjetaCreditoDebido' => [
                        'numeroTarjeta' => $card->number,
                        'cvv' => $card->cvc,
                        'mesVencimiento' => $card->expire_month,
                        'anioVencimiento' => $card->expire_year
                    ],
                    'monto' => $amount,
                    'emailCliente' => $user->email,
                    'nombreCliente' => $user->name,
                    'formaPago' => 'PagoNormal',
                    'configuracion' => [
                        'emailsNotificacion'=> 'renet@uassistme.com',
                        'urlWebhook' => 'https://google.com',
                        'notificarTransaccionCliente' => true
                    ]
                ]
            );

            $response = $client->request('POST', $endpoint, [
                'body' => $json,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ]
            ]);

            $content = $response->getBody()->getContents();
            $data = json_decode($content);
            $response = [false, $data];
            return $response;
        }catch (\GuzzleHttp\Exception\ClientException $e) {
            $error = $e->getResponse()->getBody()->getContents();
            $err = json_decode($error);
            $response = [true, $err->mensajes];
            return $response;
        }
    }

    public function testCreateTransaction(){
        try{ 
            $client = new Client();
            $endpoint = 'https://api.wompi.sv/TransaccionCompra';
            $token = $this->authWompi();
            $json = json_encode (
                [
                    'tarjetaCreditoDebido' => [
                        'numeroTarjeta' => '4111111111111111', // 4111111111111111
                        'cvv' => '222', // 111 para rechazado
                        'mesVencimiento' => 12,
                        'anioVencimiento' => 2023
                    ],
                    'monto' => 20,
                    'emailCliente' => 'renet@uassistme.com',
                    'nombreCliente' => 'Rene Torres',
                    'formaPago' => 'PagoNormal',
                    'configuracion' => [
                        'emailsNotificacion'=> 'renet@uassistme.com',
                        'urlWebhook' => 'https://google.com',
                        'notificarTransaccionCliente' => true
                    ]
                ]
            );

            $response = $client->request('POST', $endpoint, [
                'body' => $json,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ]
            ]);

            $content = $response->getBody()->getContents();
            $data = json_decode($content);
            dd($content);
            return $content;
        }catch (\GuzzleHttp\Exception\ClientException $e) {
            $error = $e->getResponse()->getBody()->getContents();
            $err = json_decode($error);
            dd($err->mensajes);
            return $err->mensajes;
        }
    }
}
