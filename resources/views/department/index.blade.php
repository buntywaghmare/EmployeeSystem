@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white h3 text-center">{{ __('Department') }}</div>

                <div class="card-body">
                   <table class="table table-striped|sm|bordered|hover|inverse table-inverse table-responsive">
                       <thead class="thead-inverse|thead-default">
                           <tr>
                               <th>#</th>
                               <th>name</th>
                           </tr>
                           </thead>
                           <tbody>
                               @foreach ($department as $row)
                               <tr>
                                <td scope="row">{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                            </tr>
                               @endforeach
                           </tbody>
                   </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
