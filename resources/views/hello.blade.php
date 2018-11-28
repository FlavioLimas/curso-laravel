@extends('layout')

@section('title')
    Hello Page
@endsection

@section('content')
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="content">
        <div class="title m-b-md">
            Hello, {{$name}}
            <hr>
            @if($name == 'Teste')
                @include('includes/any')
            @elseif($name == 'Flavio')
                <h1>{{$name}}</h1>
            @else
                <h1>Nenhum Arquivo Incluído</h1>
            @endif
            <hr>
            @if(isset($name))
                <h2>Testando isset</h2>
            @endif
            <!-- Ou nessa notação -->
            @isset($name)
                <h2>Testando isset 2</h2>
            @endisset
            @empty($name)
                <h2>Testando isset</h2>
            @endempty
        </div>
    </div>
@endsection