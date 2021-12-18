@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                            <b><p class="h4">Total User</p></b>
                        </div>
                        <div class="col-md-3 text-center justify-content-center">
                            <h1><b>3</b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <i class="fas fa-money-bill fa-4x"></i>
                            <b><p class="h4">Second Highest</p></b>
                        </div>
                        <div class="col-md-3 text-center justify-content-center">
                            <h1><b>3</b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <i class="fas fa-coins fa-4x"></i>
                            <b><p class="h4">Fifth Highest</p></b>
                        </div>
                        <div class="col-md-3 text-center justify-content-center">
                            <h1><b>3</b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                          <i class="fas fa-tachometer-average fa-4x"></i>
                            <b><p class="h4">Avg salary</p></b>
                        </div>
                        <div class="col-md-3 text-center justify-content-center">
                            <h1><b>3</b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
