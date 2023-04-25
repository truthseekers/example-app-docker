<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Applications in the view: </h1>
                        <a style="margin-right: 15px; text-decoration: underline; color: blue;" href="{{route('apply')}}">Apply</a>
    @foreach ($applications as $application)
        <div style="background-color: lightgray; padding: 15px; margin: 10px; width: 50%; border-radius: 15px;">
            <p>{{$application->name}}</p>
            <p>{{$application->email}}</p>
            <p>{{$application->creditscore}}</p>
            @if ($application->creditscore <= 450)
                <p style="color: red; font-weight: 700;">Status: Rejected</p>
            @else
                <p style="color: green; font-weight: 700;">Status: Accepted</p>
            @endif
        </div>
    @endforeach

</body>

</html>
