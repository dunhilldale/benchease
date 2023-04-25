@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('List of Users') }}</div>
                    
                    <div class="card-body">

                        <div class="list-group-flush">
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($users as $user)
                                <button onclick="show_user_clients('{{ $user->id }}')" class="list-group-item list-group-item-action" >{{ $count++; }}. {{ $user->first_name . ' ' . $user->last_name }}</button>
                            @endforeach
                        </div>

                        <div class="list-group">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="show_user_clients">Click a user to show associated clients.</div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function show_user_clients(id){
            alert(id);
        }

    </script>

@endsection
