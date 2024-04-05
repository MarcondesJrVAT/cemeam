<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public readonly User $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function index(): View
    {
        $users = $this->user->query()->orderByDesc('created_at')->paginate(10);
        return view('admin.acl.users.dashboard', compact('users'));
    }

    public function create(): View
    {
        return view('admin.acl.users.partials.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
