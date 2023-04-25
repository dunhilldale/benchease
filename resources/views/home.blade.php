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
                    <hr>

                    @foreach ($grants as $grant)
                        <table class="table table-hover">
                            <tr>
                                <th colspan="2">{{ $grant->name }}</th>
                            </tr>
                            <tr>
                                <th>Client ID</th>
                                <td>{{ $grant->id }}</td>
                            </tr>
                            <tr>
                                <th>Client Secret</th>
                                <td>{{ $grant->secret }}</td>
                            </tr>
                        </table>
                        <br>
                    @endforeach

                </div>

                <div class="card-footer">
                    ID: {{ Auth::user()->id }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
