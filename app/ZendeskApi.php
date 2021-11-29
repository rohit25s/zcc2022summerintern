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
            $token = env('token', '');
            $base_uri = env('base_uri', '');
            $this->client = new \GuzzleHttp\Client(['base_uri' =>  $base_uri, 'auth' => [$user."/token", $token], 'verify' => false ]);
        } catch (\Exception $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $responseCode = $response->getStatusCode();
            throw new \Exception($responseBodyAsString, $responseCode);
        }  
    }

    /**
     * fetch list of tickets using zendesk api
     *
     * @return Array
     */
    public function getTickets(){
        try {
            $response = $this->client->request("GET", "tickets.json");
            $contents = $response->getBody();   
            return json_decode($contents, true);
        } catch (\Exception $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $responseCode = $response->getStatusCode();
            throw new \Exception($responseBodyAsString, $responseCode);
        }    
    }

    /**
     * fetch list of tickets using zendesk api given a page no
     *
     * @return Array
     */
    public function getTicketsNextPage($page){
        try {
            $response = $this->client->request("GET", "tickets.json?page=".$page);
            $contents = $response->getBody();
            return json_decode($contents, true);
        } catch (\Exception $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $responseCode = $response->getStatusCode();
            throw new \Exception($responseBodyAsString, $responseCode);
        }
    }

    /**
     * fetch details for $ticket_id
     *
     * @return Array
     */
    public function getDetails($ticket_id){
        try {
            $response = $this->client->request("GET", "tickets/".$ticket_id.".json");
            $contents = $response->getBody();
            return json_decode($contents, true);
        } catch (\Exception $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $responseCode = $response->getStatusCode();
            throw new \Exception($responseBodyAsString, $responseCode);
        }
    }
}
