<?php

use App\Models\User;


test('deve reiniciar o banco de dados entre os testes', function () {
  expect(User::count())->toBe(0);

  User::factory()->create();

  expect(User::count())->toBe(1);
});
