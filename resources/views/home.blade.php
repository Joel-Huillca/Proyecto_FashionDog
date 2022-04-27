@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                @if (Auth::user()->rol == "administrativo")
                                     <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Administrar Estilistas</h5>
                                        <p class="card-text"><i class="fa-solid fa-paw fa-2xl"></i></p>
                                        <a href="/estilista" class="btn btn-primary">Ir</a>
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
