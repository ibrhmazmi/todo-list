@include('script')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List Server</title>
</head>
<style>
    body {
        margin: 0 auto;
        text-align: center;
        padding: 1rem;

    }

    .login-options {
        padding: 1rem;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        width: fit-content;
        ;
        max-height: 50vh;
        border-radius: 5px;
        border: 1px solid black;
        /* background-color: dodgerblue; */
        color: black;
    }

    .login-options a {
        text-decoration: none;
        margin: 0.5rem;
        /* color: white */
    }

    .login-options a:hover {
        color: greenyellow;
    }
    .Google,.Facebook,.Github{
        color:white;
        padding: 1rem;
    }
    .Google {
        background-color: #cf4332
    }

    .Facebook {
        background-color: #3b5998
    }

    .Github {
        background-color: #23292c
    }
</style>

<body>
    <h3>Login</h3>
    <div class="login-options">
        <a class="Google" href="/Auth/Google"> Login with Google</a>
        <a class="Facebook" href="/Auth/Facebook"> Login with Facebook</a>
        <a class="Github" href="/Auth/Github"> Login with GitHub</a>

    </div>
</body>

</html>
