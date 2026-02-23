<?php



test('visitante nao pode acessar o dashboard', function () {
  $this->get('/')
    ->assertRedirect('/login');
});

test('visitante nao pode acessar a listagem de usuarios', function () {
  $this->get(route('users.index'))
    ->assertRedirect('/login');
});
