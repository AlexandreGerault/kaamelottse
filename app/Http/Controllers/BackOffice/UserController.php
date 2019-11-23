<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator as Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:access-backoffice');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('backoffice.users.index')
            ->with('users', User::paginate(config('paginate.backoffice.users.index')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('backoffice.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * @param Request $request
     * @param User $user
     */
    public function attachRoles(Request $request, User $user)
    {
        $validator = Validator::make($request->except('_token'), [
            'roles' => 'array',
        ]);

        $validator->after(function ($validator) use ($request, $user) {
            foreach ($request->except('_token') as $key => $roleId) {
                try {
                    $role = Role::findOrFail($roleId)->first();

                    if ($user->hasRole($role->name)) {
                        $validator->errors()->add('role-alerady-set', $user->name . ' a déjà le rôle ' . $role->name);
                    }
                } catch (ModelNotFoundException $e) {
                    $validator->errors()->add('role-not-found', 'Un des rôles sélectionnés est introuvable');
                }
            }
        });

        if($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        foreach ($request->except('_token') as $key => $roleId) {
            $user->roles()->attach($roleId);
        }

        $user->save();

        return back();
    }

    /**
     * @param Request $request
     * @param User $user
     */
    public function detachRoles(Request $request, User $user)
    {
        $validator = Validator::make($request->except('_token'), [
            'roles' => 'array',
        ]);

        $validator->after(function ($validator) use ($request, $user) {
            foreach ($request->except('_token') as $key => $roleId) {
                try {
                    $role = Role::findOrFail($roleId)->first();

                    if (! $user->hasRole($role->name)) {
                        $validator->errors()->add('role-alerady-set', $user->name . ' n\'a pas le rôle ' . $role->name);
                    }
                } catch (ModelNotFoundException $e) {
                    $validator->errors()->add('role-not-found', 'Un des rôles sélectionnés est introuvable');
                }
            }
        });

        if($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        foreach ($request->except('_token') as $key => $roleId) {
            $user->roles()->detach($roleId);
        }

        $user->save();

        return back();
    }
}
