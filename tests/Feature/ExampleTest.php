<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $this->withoutExceptionHandling();
        $this->get('/login')->assertStatus(200);
    }

    public function testBelumAuthenticate()
    {
        $this->get('/dashboard')->assertRedirect(route('login'));
    }
    public function testBelumAuthenticate1()
    {
        $this->get('/datalog-performance')->assertRedirect(route('login'));
    }
    public function testBelumAuthenticate2()
    {
        $this->get('/datalog-quality')->assertRedirect(route('login'));
    }
    public function testBelumAuthenticate3()
    {
        $this->get('/datalog-availability')->assertRedirect(route('login'));
    }
    
    public function testLogin()
    {
        $this->get('/datalog-availability')->assertRedirect(route('login'));
    }
}
