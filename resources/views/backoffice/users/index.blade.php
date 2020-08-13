@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <h3 class="mb-5">Utilisateurs</h3>
        <table class="table">
            <thead>
            <tr class="text-center">
                <th>Nom</th>
                <th>Email</th>
                <th>Roles</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="align-middle text-primary">
                        <a href="{{ route('backoffice.user.show', $user) }}"><b>{{ $user->name }}</b></a>
                    </td>
                    <td class="align-middle text-primary">
                        <b>{{ $user->email }}</b>
                    </td>
                    <td class="align-middle text-primary">
                        @foreach($user->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
@endsection
