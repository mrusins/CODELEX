<?php

namespace Tests;

use App\JSONPersonsRepository;
use App\SearchPersonService;


use PHPUnit\Framework\TestCase;

class SearchPersonServiceTest extends TestCase
{
    private array $post = ['search' => 'Maris'];

    public function testSearch()
    {
        $test = new SearchPersonService($this->post);

        $this->assertEquals(2, count($test->search()));



    }



}