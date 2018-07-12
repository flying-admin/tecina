@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de administración</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="http://tecina.flyingpigs.es" class="link">
                      <i class="material-icons">arrow_back</i>
                      <span>Volver al distribuidor</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
