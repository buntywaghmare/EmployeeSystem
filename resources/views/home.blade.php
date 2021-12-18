@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                            <b><p class="h4">Total <br> User</p></b>
                        </div>
                        <div class="col-md-7 text-center justify-content-center">
                            <h3><b>{{ $employee->count() }}</b></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <i class="fas fa-money-bill fa-4x"></i>
                            <b><p class="h4">Second Highest</p></b>
                        </div>
                        <div class="col-md-7 text-center justify-content-center">
                            
                                @if($salary->count() > 1)
                                <h3><b>{{ $salary[1]->salary }}</b></h3>
                                @else
                                <h6><b>2 value Not Added</b></h6>
                                @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <i class="fas fa-coins fa-4x"></i>
                            <b><p class="h4">Fifth Highest</p></b>
                        </div>
                        <div class="col-md-7 text-center justify-content-center">
                            
                                @if($salary->count() > 4)
                                <h3><b>{{ $salary[4]->salary }}</b></h3>
                                @else
                                <h6><b>5 value Not Added</b></h6>
                                @endif
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                          <i class="fas fa-tachometer-average fa-4x"></i>
                            <b><p class="h4">Avg <br> salary</p></b>
                        </div>
                        <div class="col-md-7 text-center justify-content-center">
                            <h3><b>{{ round($average) }}</b></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
