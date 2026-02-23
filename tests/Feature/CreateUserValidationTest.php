<?php

use App\Models\User;


dataset('campos_obrigatorios', [
  'name',
  'email',
  'password',
]);

test('nao deve criar usuario com campos obrigatorios vazios', function ($campo) {

  $admin = login();
  assignRole($admin, 'admin');

  $dados = [
    'name' => 'Teste',
    'email' => 'teste@email.com',
    'password' => 'password',
    'password_confirmation' => 'password',
  ];

  $dados[$campo] = '';

  $response = $this->post(route('users.store'), $dados);

  $response->assertSessionHasErrors($campo);
})->with('campos_obrigatorios');

test('nao deve criar usuario com email duplicado', function () {

  $admin = login();
  assignRole($admin, 'admin');

  User::factory()->create([
    'email' => 'teste@email.com'
  ]);

  $response = $this->post(route('users.store'), [
    'name' => 'Teste',
    'email' => 'teste@email.com',
    'password' => 'password',
    'password_confirmation' => 'password',
  ]);

  $response->assertSessionHasErrors('email');
});
