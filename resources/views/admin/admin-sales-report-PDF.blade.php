<!DOCTYPE html>
<html>
<head>
    {{-- <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p> --}}

    <table class="table table-bordered">
        <tr>
            <th>Totle Quantity</th>
            <th>	Totle Amount</th>
            <th>Customer Name</th>
            <th>Date</th>
            {{-- <th>Totle</th> --}}
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->totle_qty }}</td>
            <td>{{ $user->Totle_amount }}</td>
            <td>{{ $user->description}}</td>
            <td>{{ $user->created_at}}</td>

            {{-- <td>created_at</td> --}}
        </tr>
        @endforeach
    </table>

</body>
</html>
