<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>
    body{
        text-align:center;
    }
    .avatar{
        border-radius: 5rem;
    }
</style>
@php
    $user = Auth::user();
@endphp
<body>

    <h1>Welcome <img class="avatar" src="{{ $user->avatar }}" alt="Profile Image" height="40px" width="40px"></h1>
         {{$user->full_name}} <br>
    <a href="{{route('Logout')}}" type="submit" class="btn btn-link"> <small> Logout </small></a>
    @php
        // dd($user);
    @endphp
</body>
</html>
