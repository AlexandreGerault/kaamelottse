@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <h3 class="mb-5">
            Profil de  {{ $user->name }}
        </h3>

        <div class="d-flex flex-wrap">
            <div class="card m-3">
                <div class="card-body">
                    <h4 class="mb-3">Roles</h4>
                    <table class="table">
                        <tr>
                            <th>Nom du rôle</th>
                        </tr>
                        @foreach($user->roles as $role)
                            <tr>
                                <td class="text-capitalize">{{ $role->name }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="row">
                        <form method="post" action="{{ route('backoffice.user.roles.attach', $user) }}" class="col">
                            <div class="form-group">
                                <label>Ajouter des rôles :</label>
                                <select class="form-control text-capitalize" multiple>
                                    @foreach(App\Models\Role::all() as $role)
                                        @if(! $user->roles()->get()->contains($role))
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input type="submit" value="Ajouter les rôles sélectionnés" class="btn btn-primary my-3" >
                            </div>
                        </form><form method="post" action="{{ route('backoffice.user.roles.attach', $user) }}" class="col">
                            <div class="form-group">
                                <label>Enlever des roles :</label>
                                <select class="form-control text-capitalize" multiple>
                                    @foreach($user->roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="Enlever les rôles sélectionnés" class="btn btn-danger my-3" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
