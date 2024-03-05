<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verification</title>
</head>
<body>
<p>Hello {{ $user->name }},</p>

<p>Please click the following link to verify your email address:</p>

<a href="{{ route('verification.verify', $token) }}">Verify Email</a>

<p>If you didn't request for update an email, you can safely ignore this email.</p>

<p>Regards,<br>
  {{ config('app.name') }}</p>
</body>
</html>
