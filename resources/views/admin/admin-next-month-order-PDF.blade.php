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
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Item description </th>
            <th>Qty</th>
            {{-- <th>Totle</th> --}}
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->item_Code}}</td>
            <td>{{ $user->item_name }}</td>
            <td>{{ $user->item_description }}</td>
            <td>20</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
