<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        $users->when($request->keyword, function ($query, $keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        });

        $users = $users->paginate();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create($input);

        return redirect()->route('users.index')->with('status', 'Usuário adicionado com sucesso!');
    }

    public function edit(User $user)
    {
        Gate::authorize('edit', User::class);

        $user->load(['profile', 'interests']);
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(User $user, Request $request)
    {
        Gate::authorize('update', User::class);

        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'exclude_if:password,null|min:8',
        ]);


        $user->update($input);

        return redirect()->route('users.index')->with('status', 'Usuário atualizado com sucesso!');
    }

    public function updateProfile(User $user, Request $request)
    {
        Gate::authorize('updateProfile', User::class);

        $input = $request->validate([
            'type' => 'required',
            'address' => 'nullable',
        ]);

        UserProfile::updateOrCreate(['user_id' => $user->id], $input);

        return back()->with('status', 'Perfil do Usuário atualizado com sucesso!');
    }

    public function updateInterests(User $user, Request $request)
    {
        Gate::authorize('updateInterests', User::class);

        $input = $request->validate([
            'interests' => 'nullable|array',
        ]);

        $user->interests()->delete();

        if (!empty($input['interests'])) {
            $interests = array_map(fn($item) => ['name' => $item], $input['interests']);
            $user->interests()->createMany($interests);
        }

        return back()->with('status', 'Usuário editado com sucesso!');
    }

    public function updateRoles(User $user, Request $request)
    {
        Gate::authorize('updateRoles', User::class);

        $input = $request->validate([
            'roles' => 'required|array',
        ]);

        $user->roles()->sync($input['roles']);

        return back()->with('status', 'Usuário editado com sucesso!');
    }

    public function delete(User $user)
    {
        Gate::authorize('delete', User::class);

        $user->delete();

        return back()->with('status', 'Usuário deletado com sucesso!');
    }
}
