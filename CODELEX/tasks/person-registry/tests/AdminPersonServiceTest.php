<?php

namespace Tests;

use App\JSONPersonsRepository;
use App\AdminPersonService;


use PHPUnit\Framework\TestCase;

class AdminPersonServiceTest extends TestCase
{
    private array $post = ['search' => 'Maris'];

    public function testSearch()
    {
        $test = new AdminPersonService($this->post);

        $this->assertEquals(2, count($test->test()));



    }



}