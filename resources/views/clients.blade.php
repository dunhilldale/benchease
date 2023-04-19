@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('New Client') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('passport.clients.store') }}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-end">
                                {{ __('Name') }} :
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="redirect" class="col-md-4 col-form-label text-end">
                                {{ __('Redirect URL') }} :
                            </label>

                            <div class="col-md-6">
                                <input id="redirect" type="text" class="form-control @error('redirect') is-invalid @enderror"
                                    name="redirect" value="{{ old('redirect') }}" required autocomplete="redirect" autofocus>

                                @error('redirect')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of all Clients') }}</div>

                <div class="card-body">
                    <table class="table table-stripped table-hover">
                        <thead>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Secret</td>
                            <td>Callback</td>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->secret }}</td>
                                <td>{{ $client->redirect }}</td>
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
