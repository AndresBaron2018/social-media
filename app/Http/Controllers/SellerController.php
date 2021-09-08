<?php

namespace App\Http\Controllers;

use App\Brand;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SellerController extends Controller
{

    public function index()
    {
        $roles = Role::where('name', '!=', "admin")->where('name', '!=', "seller")->get();
        $users = User::has('roles')->with('roles')->get();
        return view('seller.index', compact('users', 'roles'));
    }
    public function options()
    {
        return view('seller.options');
    }

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

    public function updateRole(User $user, $roles)
    {
        $user->role_user->each(function ($item) use ($user) {
            $user->removeRole($item);
        });

        if (count($roles) > 0) {
            $user->assignRole('client');
        }
    }
    public function showClient()
    {
        $brands = Brand::with('product')->get();
        return view('client.index', compact('brands'));
    }
    public function showProducts()
    {
        $brands = Brand::with('product')->get();
        return view('client.products', compact('brands'));
    }

    public function api()
    {
        return Brand::with('product')->get();
    }

    public function destroy(User $user)
    {
        //
    }
}
