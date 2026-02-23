<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\UpdateInterestsRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\Services\CloudinaryService;
use App\Models\User;

class UserProfileController extends Controller

{

    public function updateProfile(User $user, UpdateProfileRequest $request)
    {

        $user->update($request->validated());

        return back()->with('status', 'Perfil do Usuário atualizado com sucesso!');
    }

    public function updateAvatar(User $user, UpdateAvatarRequest $request,  CloudinaryService $cloudinary)
    {

        $file = $request->file('avatar');

        // upload avatar
        $upload = $cloudinary->upload(
            $file->getRealPath(),
            ['folder' => 'avatars']
        );

        $oldAvatar = $user->avatar;

        $user->update([
            'avatar' => $upload['public_id'],
        ]);

        // delete old avatar
        if ($oldAvatar) {
            $cloudinary->destroy($oldAvatar);
        }

        return back()->with('status', 'Foto de perfil atualizada com sucesso!');
    }


    public function updateInterests(User $user, UpdateInterestsRequest $request)
    {

        $user->interests()->delete();

        if ($request->filled('interests')) {
            $user->interests()->createMany(
                collect($request->validated('interests'))
                    ->map(fn($item) => ['name' => $item])
                    ->toArray()
            );
        }

        return back()->with('status', 'Interesses atualizados com sucesso!');
    }

    public function updateRoles(User $user, UpdateRolesRequest $request)
    {

        $user->roles()->sync($request->validated('roles'));

        return back()->with('status', 'Usuário editado com sucesso!');
    }
}
