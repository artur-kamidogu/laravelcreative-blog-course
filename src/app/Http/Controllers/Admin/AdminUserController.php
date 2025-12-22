<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function show(User $user): View
    {
        return view('admin.user.show',compact('user'));
    }
    public function create(): View
    {
        $roles = User::getRoles();
        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
//        dd($data);
        User::firstOrCreate(['email' => $data['email']],$data); // тк почта должна быть уникальной то проверка идет по ней
        return redirect()->route('admin.user.index');
    }

    public function edit(User $user): View
    {
        $roles = User::getRoles();
        return view('admin.user.edit',compact('user','roles'));
    }

    public function update(User $user,UpdateRequest $request): RedirectResponse
    {

        $data = $request->validated();
//        dd($data);
        $user->update($data);
        return redirect()->route('admin.user.show', compact('user'));
    }

    public function delete(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }

}
