@extends('layouts.app')
@section('content')
    <div class="text-center">This is home page</div>
    <div class="container">
        <div>Create a user</div>
        <a href="{{ route('home.add') }}" class="btn btn-primary">Add user</a>
        <h1>List something</h1>
        {{-- {{ $users }} --}}

        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        <table class="table">

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td><a href={{ route('home.detail', ['id' => $user->id]) }} class="btn btn-info">Detail </a> </td>
                        <td>
                            <a href={{ route('home.edit', ['id' => $user->id]) }} class="btn btn-info">Edit </a>
                        </td>
                        <td><button class="btn btn-warning">Remove</button></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
