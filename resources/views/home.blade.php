@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Panel') }}</div>

                    <div class="card-body">
                        <div class="row">
                            @if (Auth::user()->rol == 'administrativo')
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Administrar Estilistas</h5>
                                            <p class="card-text"><i class="fa-solid fa-paw fa-2xl"></i></p>
                                            <a href="/estilista" class="btn btn-primary">Ir</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Cambiar estado usuarios</h5>
                                            <p class="card-text"><i class="fa-solid fa-user fa-2xl"></i></p>
                                            <a href="/usuario" class="btn btn-primary">Ir</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(Auth::user()->rol == 'cliente')
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Solicitar servicio</h5>
                                            <p class="card-text"><i class="fa-solid fa-clock fa-2xl"></i></p>
                                            <a href="/servicio" class="btn btn-primary">Ir</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
