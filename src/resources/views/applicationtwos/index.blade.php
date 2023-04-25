<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CashFactory Loan App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>CashFactory Loan App</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('applicationtwos.create') }}"> Create Application</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Credit Score</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicationtwos as $applicationtwo)
                    <tr>
                        <td>{{ $applicationtwo->name }}</td>
                        <td>{{ $applicationtwo->email }}</td>
                        <td>{{ $applicationtwo->creditscore }}</td>
                        @if ($applicationtwo->creditscore <= 450)
                            <td style="color: red; font-weight: 700;">Rejected</td>
                        @else 
                            <td style="color: green; font-weight: 700;">Accepted</td>
                        @endif
                        <td>
                            <form action="{{ route('applicationtwos.destroy',$applicationtwo->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $applicationtwos->links() !!}
    </div>
</body>
</html>
