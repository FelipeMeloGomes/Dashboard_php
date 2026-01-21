<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserProfileController extends Controller
{
    public function updateProfile(User $user, Request $request)
    {
        Gate::authorize('update', User::class);

        $input = $request->validate([
            'type' => 'required',
            'address' => 'nullable',
        ]);

        UserProfile::updateOrCreate(['user_id' => $user->id], $input);

        return back()->with('status', 'Perfil do Usuário atualizado com sucesso!');
    }

    public function updateAvatar(User $user, Request $request)
    {
        Gate::authorize('updateAvatar', User::class);

        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $cloudinary = CloudinaryService::client();

        if ($user->avatar) {
            $cloudinary->uploadApi()->destroy($user->avatar);
        }

        $upload = $cloudinary->uploadApi()->upload(
            $request->file('avatar')->getRealPath(),
            ['folder' => 'avatars']
        );

        $user->update([
            'avatar' => $upload['public_id'],
        ]);

        return back()->with('status', 'Foto de perfil atualizada com sucesso!');
    }


    public function updateInterests(User $user, Request $request)
    {
        Gate::authorize('update', User::class);

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
        Gate::authorize('update', User::class);

        $input = $request->validate([
            'roles' => 'required|array',
        ]);

        $user->roles()->sync($input['roles']);

        return back()->with('status', 'Usuário editado com sucesso!');
    }
}
