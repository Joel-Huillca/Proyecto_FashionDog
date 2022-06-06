<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function carga_pagina_inicio():void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function acceso_sin_datos():void{

        $this->post(route('login'), [])->assertSessionHasErrors('rut');

    }

    /**
     * @test
     */
    public function inicio_sesion_exito():void
    {
        $credentials = [
            "rut" => "225588",
            "password" => "1234"
        ];

        $this->post(route('login'),$credentials)
            ->assertRedirect('/home');
        $this->assertCredentials($credentials);

    }
}
