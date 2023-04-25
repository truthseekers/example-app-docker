<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <p>Hello {{$name}}</p>
    <h2>Your Loan Application Results:</h2>
    @if ($creditscore <= 450)
      <p>Rejected</p>
    @else
      <p>Accepted</p>
    @endif
  </body>
</html>
