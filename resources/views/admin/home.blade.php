@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenue') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Email</td>
                                <td>Statut</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )
                            @if($user->statut == 'restaurant')
                                <tr>
                                    <td>{{ $user->nom }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->approved == 0)
                                            Inactive
                                        @else
                                            Active
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('approved', $user->id) }}">
                                            @if($user->approved ==1)
                                                Inactive
                                            @else
                                                Active
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
