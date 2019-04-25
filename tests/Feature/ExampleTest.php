<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Client;

class ExampleTest extends TestCase
{ 

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
       

    $client = new Client(['base_uri' => 'https://api.github.com/']);
    $response = $client->request('GET', '/user', ['auth' => ['alangatt@gmail.com', 'Roofie100']]);
   
    $code = $response->getBody()->getContents();
    $code_json = json_decode($code);
    //dd($code_json->login);
       // $response->assertStatus(200);
    }
}
