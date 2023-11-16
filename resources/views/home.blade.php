@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <!-- Vous pouvez ajouter du contenu HTML ici -->
                    <!-- Votre contenu HTML personnalisé commence -->
                    <div>
                        <!-- Votre code HTML -->
                    </div>
                    <!-- Votre contenu HTML personnalisé finit -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
