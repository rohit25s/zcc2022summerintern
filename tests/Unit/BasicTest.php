<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\ZendeskApi;

class BasicTest extends TestCase
{
    protected static $tickets_response;
    protected static $zendeskApi;

    /**
     * Setup for all other tests
     *
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        self::$zendeskApi = new ZendeskApi(); 
        self::$tickets_response = self::$zendeskApi->getTickets();
    }
   
    /**
     * A basic test to check if list is fetched from zendesk api.
     *
     * @return void
     */
    public function test_list_tickets_first_page()
    {
        $this->assertNotNull(self::$tickets_response);
        $this->assertGreaterThan(1, count(self::$tickets_response['tickets']));
    }

    /**
     * A basic test to check next list of tickets availability if next page available.
     *
     * @return void
     */
    public function test_list_tickets_with_page()
    {
        $this->assertNotNull(self::$tickets_response);
        if(self::$tickets_response['next_page']== null)
            $this->assertTrue(true);
        else{    
            $tickets_list = self::$zendeskApi->getTicketsNextPage(2)['tickets'];
            $this->assertNotNull($tickets_list);
            $this->assertGreaterThan(1, count($tickets_list));
        }
    }

    /**
     * A basic test to check if details are available for a ticket id.
     *
     * @return void
     */
    public function test_tickets_details()
    {
        $id = self::$tickets_response['tickets'][0]['id'];
        $details = self::$zendeskApi->getDetails($id);
        $this->assertNotNull($details);
    }
}
