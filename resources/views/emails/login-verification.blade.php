<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Verification</title>
</head>
<body>
<div style="font-family: sans-serif">
    <p
        style="margin: 0; font-size: 14px; text-align: center; font-family: Arial, Helvetica, sans-serif; color: #555555; line-height: 1.2;">
        Hello {{ $user->first_name . ' ' . $user->last_name }},
    </p>
    <p
        style="margin: 0; font-size: 14px; text-align: center; font-family: Arial, Helvetica, sans-serif; color: #555555; line-height: 1.2;">

        We noticed you are trying to login. For security reasons please
        enter the code to verify your login. Enter the code below :
    </p>
    <hr>
    <p style="border: 1px solid black; margin: 0; font-size: 24px; width:100%; text-align: center; font-family: Arial, Helvetica, sans-serif; color: #555555; line-height: 2.2;"><strong>{{$token}}</strong></p>
</div>
</body>
</html>
