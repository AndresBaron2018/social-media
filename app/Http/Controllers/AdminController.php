<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    /**
     * Undocumented function
     * @return void
     */

    public function index()
    {
        $roles = Role::get();
        $users = User::has('roles')->with('roles')->get();
        return view('admin.index', compact('users', 'roles'));
    }

    /**
     * Undocumented function
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->save();

        $this->updateRole($user, $request->roles);

        return response()->json([
            'user' => $user,
            'saved' => true
        ]);
    }

    /**
     * Undocumented function
     * @param Request $request
     * @param [type] $id
     * @return void
     */

    public function update(Request $request, User $user)
    {
        $roles = $request->roles;

        $attr = \Arr::except($request, ['role_user', 'roles']);
        if ($request->password == null) {
            $attr = \Arr::except($attr, ['password']);
        }

        $user->update($attr->toArray());
        $this->updateRole($user, $roles);

        return response()->json([
            'user' => $user,
            'saved' => true
        ]);
    }


    /**
     * Undocumented function
     * @param User $user
     * @param [type] $roles
     * @return void
     */

    public function updateRole(User $user, $roles)
    {
        $user->role_user->each(function ($item) use ($user) {
            $user->removeRole($item);
        });

        if (count($roles) > 0) {
            $user->assignRole($roles);
        }
    }

    public function destroy(User $user)
    {
        //
    }
}
