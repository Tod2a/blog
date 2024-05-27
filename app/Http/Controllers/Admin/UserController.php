<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //on vérifie l'authorisation via la UserPolicy
        Gate::authorize('viewAny', User::class);

        $users = User::paginate(10);

        // On passe les utilisateurs à la vue `admin.users.index`
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        Gate::authorize('update', $user);

        // On utilise la méthode pluck() pour récupérer uniquement le nom des rôles dans un tableau
        $roles = \App\Models\Role::pluck('name');

        // On passe l'utilisateur et les rôles à la vue `admin.users.edit`
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        Gate::authorize('update', $user);

        $request->validate([
            // On vérifie que le rôle est bien un des rôles définis dans le modèle Role
            'role' => 'required|in:'.implode(',', \App\Models\Role::roles()),
        ]);

        // Mise à jour du rôle
        // On récupère le rôle correspondant au nom du rôle passé dans la requête
        $role = \App\Models\Role::where('name', $request->role)->first();
        // On associe le rôle à l'utilisateur en passant par la relation
        $user->role()->associate($role);
        // On sauvegarde l'utilisateur en base de données
        $user->save();

        // Redirection vers la page de modification de l'utilisateur
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
