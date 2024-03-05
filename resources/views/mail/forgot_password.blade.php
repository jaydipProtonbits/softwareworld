<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
</head>
<body>
<p>Hello {{ $user->name }},</p>

<p>We received a request to reset your password. If you made this request, please click the button below to reset your password:</p>
<p>
    <a href="{{route('showResetForm',$token)}}" target="_blank">
        <button>Reset Password</button>
    </a>
</p>
<p>If you didn't request a password reset, please ignore this email.</p>
<p>Regards,<br>
  {{ config('app.name') }}</p>
</body>
</html>
