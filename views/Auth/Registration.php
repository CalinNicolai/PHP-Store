<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login & Registration Form</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../../public/CSS/auth.css">
</head>
<body>
<div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
        <header>Signup</header>
        <form method="post" action="index.php?page=register">
            <input name="email" type="text" placeholder="Enter your email">
            <input name="password" type="password" placeholder="Create a password">
            <input name="confirm_password" type="password" placeholder="Confirm your password">
            <input type="submit" class="button" value="Signup">
        </form>
        <div class="signup">
        <span class="signup">Already have an account?
         <a href="/login">Login</a>
        </span>
        </div>
    </div>
</div>
</body>
</html>
