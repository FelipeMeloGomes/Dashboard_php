<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Role;
use Database\Seeders\RoleSeeder;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(Tests\TestCase::class)
    ->use(RefreshDatabase::class)
    ->beforeEach(function () {
        $this->seed(RoleSeeder::class);
    })
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}


/*
|--------------------------------------------------------------------------
| Helper de autenticação
|--------------------------------------------------------------------------
|
| Permite autenticar um usuário rapidamente nos testes.
| Pode criar automaticamente ou receber um usuário existente.
|
*/

function login(?User $user = null): User
{
    $user ??= User::factory()->create();

    test()->actingAs($user);

    return $user;
}

/*
|--------------------------------------------------------------------------
| Helper de atribuição de roles
|--------------------------------------------------------------------------
|
| Função auxiliar utilizada nos testes para associar uma role específica
| a um usuário.
|
| Essa função facilita a escrita de testes de autorização, permitindo
| configurar rapidamente permissões como "admin", "editor" ou "user"
| antes de executar ações protegidas por policies.
|
| Exemplo de uso:
|
|   $user = login();
|   assignRole($user, 'admin');
|
| A role informada deve existir no banco de dados (garantido pelo
| RoleSeeder executado antes de cada teste).
|
*/

function assignRole($user, string $roleName)
{
    $role = Role::where('name', $roleName)->first();
    $user->roles()->attach($role);
}
