<?php

test('usuario comum nao pode criar usuario', function () {

  $user = login();
  assignRole($user, 'user');

  $response = $this->post(route('users.store'), [
    'name' => 'Teste',
    'email' => 'teste@email.com',
    'password' => 'password',
    'password_confirmation' => 'password',
  ]);

  $response->assertForbidden();
});


test('admin pode criar usuario', function () {
  $admin = login();
  assignRole($admin, 'admin');

  $response = $this->post(route('users.store'), [
    'name' => 'Novo Usuario',
    'email' => 'novo@email.com',
    'password' => 'password',
    'password_confirmation' => 'password',
  ]);

  $response->assertRedirect(route('users.index'));

  $this->assertDatabaseHas('users', [
    'email' => 'novo@email.com',
  ]);
});

test('editor nao pode criar usuario', function () {
  $editor = login();
  assignRole($editor, 'editor');

  $response = $this->post(route('users.store'), [
    'name' => 'Novo Usuario',
    'email' => 'novo@email.com',
    'password' => 'password',
    'password_confirmation' => 'password',
  ]);

  $response->assertForbidden();
});
