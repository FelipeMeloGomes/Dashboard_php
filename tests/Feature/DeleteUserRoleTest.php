<?php


use App\Models\User;

test('apenas admin pode deletar usuario', function () {
  $admin = login();
  assignRole($admin, 'admin');

  $target = User::factory()->create();

  $response = $this->delete(route('users.delete', $target));

  $response->assertStatus(302);
});

test('editor nao pode deletar usuario', function () {
  $editor = login();
  assignRole($editor, 'editor');

  $target = User::factory()->create();

  $response = $this->delete(route('users.delete', $target));

  $response->assertForbidden();
});

test('qualquer role pode atualizar avatar', function () {
  $user = login();
  assignRole($user, 'user');

  $response = $this->post(route('users.avatar', $user), [
    'avatar' => \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg')
  ]);

  $response->assertStatus(302);
});
