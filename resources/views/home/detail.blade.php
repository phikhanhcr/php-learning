@extends('layouts.app')
@section('content')
    <div class="text-center">This is detail page</div>
    <div class="container">
        @foreach ($users as $user)
            <div class="avatar"></div>
            <div>
                <p>name: {{ $user->name }}</p>
                <p>email: {{ $user->email }}</p>
            </div>
        @endforeach

        <form action="{{ route('home.postEdit')}}" method="POST">
            @csrf
            <input type="text" name="name">
            <input type="email" name="email">
            <button class="btn btn-info">Add</button>
        </form>
    </div>
@endsection
