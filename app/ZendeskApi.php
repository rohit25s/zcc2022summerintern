<?php
namespace App;
use stdClass;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;
use Exception;

class ZendeskApi
{
    private $client;
     /**
     * Build Zendesk connection.
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $user = env('user', '');
            $password = env('password', '');
            $base_uri = env('base_uri', '');
            $this->client = new \GuzzleHttp\Client(['base_uri' =>  $base_uri, 'auth' => [$user, $password], 'verify' => false ]);
        } catch (\Exception $e) {
             throw new \Exception($e->getMessage(), 1);
        }  
    }

    public function getTickets(){
        $response = $this->client->request("GET", "tickets.json");
        $contents = $response->getBody();   
        return json_decode($contents, true);
    }

    public function getTicketsNextPage($page){
        $response = $this->client->request("GET", "tickets.json?page=".$page);
        $contents = $response->getBody();
        return json_decode($contents, true);
    }

    public function getDetails($ticket_id){
        $response = $this->client->request("GET", "tickets/".$ticket_id.".json");
        $contents = $response->getBody();
        return json_decode($contents, true);
    }
}
