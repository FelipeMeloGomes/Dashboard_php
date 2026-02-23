<?php

test('deve permitir usuario autenticado acessar o dashboard', function () {
  login();

  $this->get('/')
    ->assertStatus(200);
});
