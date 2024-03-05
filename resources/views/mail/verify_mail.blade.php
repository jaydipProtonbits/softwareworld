<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verification</title>
</head>
<body>
<p>Hello {{ $user->name }},</p>

<p>Thank you for registering on our website. Please click the following link to verify your email address:</p>

<a href="{{ route('verification.verify', $user->email_verification_token) }}">Verify Email</a>

<p>If you didn't create an account, you can safely ignore this email.</p>

<p>Regards,<br>
  {{ config('app.name') }}</p>
</body>
</html>
