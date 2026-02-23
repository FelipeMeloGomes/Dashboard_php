<?php


use App\Models\User;

test('editor pode atualizar usuario', function () {
  $editor = login();
  assignRole($editor, 'editor');

  $target = User::factory()->create();

  $response = $this->put(route('users.update', $target), [
    'name' => 'Atualizado',
    'email' => $target->email,
  ]);

  $response->assertStatus(302);
});


test('user comum nao pode atualizar usuario', function () {
  $user = login();
  assignRole($user, 'user');

  $target = User::factory()->create();

  $response = $this->put(route('users.update', $target), [
    'name' => 'Atualizado',
    'email' => $target->email,
  ]);

  $response->assertForbidden();
});
