<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Star Pasture - Account Deactivated</title>
</head>

<body>
    <div
        style="font-family:Arial,sans-serif;padding:20px;background-color:#f9f9f9;border:1px solid #ddd;border-radius:8px;max-width:600px;margin:20px auto">
        <div style="text-align:center;margin-bottom:20px">
            <h1 style="color:#f44336">Star Pasture - Account Deactivated</h1>
            <p style="font-size:1.2em;color:#555">Your account has been deactivated.</p>
        </div>
        <div style="background-color:#ffffff;padding:20px;border-radius:8px">
            <p style="font-size:1.1em;color:#f44336">Hello {{ $user->name }},</p>
            <p style="font-size:1em;color:#555">
                We regret to inform you that your Star Pasture account has been deactivated due to unpaid subscription
                or other account issues.
                To regain access and reactivate your account, please click the button below and complete the necessary
                steps.
            </p>
            <div style="margin:20px 0;text-align:center">
                <a href="{{ $reactivationUrl }}"
                    style="background-color:#f44336;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;font-size:1.2em;display:inline-block;">
                    Reactivate Account
                </a>
            </div>
        </div>
        <p style="font-size:1em;color:#555">Thank you for being a valued part of Star Pasture!</p>
        <p>
            For support, contact us at
            <a href="mailto:starpasture@gmail.com" style="color:#4caf50;text-decoration:none" rel="noreferrer"
                target="_blank">
                starpasture@gmail.com
            </a>
        </p>
    </div>
</body>

</html>
