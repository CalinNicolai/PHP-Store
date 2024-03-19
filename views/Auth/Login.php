<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login & Registration Form</title>
    <!---Custom CSS File--->
    <link href="../../public/CSS/auth.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
        <header>Login</header>
        <form method="post" action="index.php?page=login">
            <input name="email" type="text" placeholder="Enter your email">
            <input name="password" type="password" placeholder="Enter your password">
            <a href="#">Forgot password?</a>
            <input type="submit" class="button" value="Login">
        </form>
        <div class="signup">
            <span class="signup">Don't have an account?
                <a href="/registration">Signup</a>
            </span>
        </div>
    </div>
</div>
</body>
</html>
