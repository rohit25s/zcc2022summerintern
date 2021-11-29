<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZendeskApi;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Support\Collection;
use Exception;
use stdClass;
use GuzzleHttp\Client;


class TicketsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Fetch the tickets and show the paginated list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tickets(ZendeskApi $zendeskApi) {
    
        try{
            $current_page=1;  
            $tickets_response = $zendeskApi->getTickets();
            $tickets_list = $tickets_response["tickets"];

            while($tickets_response['next_page'] != null){ 
                $current_page = $current_page + 1;
                $tickets_response = $zendeskApi->getTicketsNextPage($current_page);
                $tickets_slice = $tickets_response["tickets"];
                $tickets_list = array_merge($tickets_list, $tickets_slice);
            }

            $per_page = 25;
            $data = (new Collection($tickets_list))->paginate($per_page);
            return view('tickets', compact('data'));

        } catch (\Exception $e){
            abort($e->getCode());
        }
    }

    /**
     * Fetch the details given a ticket Id and show the ticket dashboard
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function details(ZendeskApi $zendeskApi, $ticket_id){
        try{
            $details = $zendeskApi->getDetails($ticket_id)['ticket'];
            return view('details', compact('details'));
        } catch (\Exception $e){
            abort($e->getCode());
        }
    }
}