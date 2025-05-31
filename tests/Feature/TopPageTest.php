<?php

namespace Tests\Feature;

use Tests\TestCase;

class TopPageTest extends TestCase
{
    public function test_top_page_loads_successfully()
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
        $response->assertSee('東京不動産物件検索');
        $response->assertSee('東京23区');
        $response->assertSee('市部');
    }
    
    public function test_top_page_contains_expected_ward_links()
    {
        $response = $this->get('/');
        
        $response->assertSee('新宿区');
        $response->assertSee('渋谷区');
        $response->assertSee('href="/list/shinjuku"', false);
        $response->assertSee('href="/list/shibuya"', false);
    }
    
    public function test_top_page_contains_expected_city_links()
    {
        $response = $this->get('/');
        
        $response->assertSee('八王子市');
        $response->assertSee('町田市');
        $response->assertSee('href="/list/hachioji"', false);
        $response->assertSee('href="/list/machida"', false);
    }
}