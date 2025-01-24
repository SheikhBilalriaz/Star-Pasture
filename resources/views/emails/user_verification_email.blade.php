<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Star Pasture - Verify Your Email</title>
</head>

<body>
    <div
        style="font-family:Arial,sans-serif;padding:20px;background-color:#f9f9f9;border:1px solid #ddd;border-radius:8px;max-width:600px;margin:20px auto">
        <div style="text-align:center;margin-bottom:20px">
            <h1 style="color:#3130F9">Welcome to Star Pasture Family!</h1>
            <p style="font-size:1.2em;color:#555">Your ultimate hub for Grazing the Stars!.</p>
        </div>
        <div style="background-color:#ffffff;padding:20px;border-radius:8px">
            <p style="font-size:1.1em;color:#3130F9">Hello {{ $user->name }},</p>
            <p style="font-size:1em;color:#555">
                Thank you for joining Star Pasture Family! We're excited to have you on board. To complete your
                registration, please click on the button below to verify your email address:
            </p>
            <div style="margin:20px 0;text-align:center">
                <a href="{{ $verificationUrl }}"
                    style="background-color:#3130F9;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;font-size:1.2em;display:inline-block;">
                    Verify Your Email
                </a>
            </div>
            <p style="font-size:1em;color:#555">This verification link is valid for the next <b>15 minutes</b>. If you
                did not sign up, please ignore this email.</p>
        </div>
        <p>Grazing the stars - Star Pasture</p>
        <p>For support, contact us at <a href="mailto:starpasture@gmail.com" style="color:#4caf50;text-decoration:none"
                rel="noreferrer" target="_blank">starpasture@gmail.com</a></p>
    </div>
</body>

</html>
