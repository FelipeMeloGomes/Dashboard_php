<?php

use App\Models\User;

test('deve permitir usuario autenticado visualizar a listagem de usuarios', function () {
  login();

  User::factory()->count(3)->create();

  $this->get(route('users.index'))
    ->assertStatus(200);
});
