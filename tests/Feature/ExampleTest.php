<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_publica_e_exibida_com_o_conteudo_principal(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('IEQ Canto do Mar')
            ->assertSee('Uma família para pertencer.')
            ->assertSee('Próximos cultos')
            ->assertSee('Área do membro');
    }
}
