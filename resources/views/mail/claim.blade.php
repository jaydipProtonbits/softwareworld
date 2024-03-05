<html>
  <head>
    <title>Claim</title>
  </head>
  <body>
    Hi, {{ $user->name }}
    Your claim has been {{ $status }}

    @if($user->claim_token)
      <a href="{{ route('auth-register-basic', ['token' => $user->claim_token]) }}" target="blank">Complete Profile</a>
    @endif

    Thank you & Best Regards
    {{ config('app.name') }}
  </body>
</html>
