<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h1>Welcome,Back</h1>
    <p>You are logged in as an administrator.</p>
    <form action="{{route('admin_logout')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    @php
        $item = DB::table('waste_item')->get();
        $display = $item
    @endphp

    @foreach($display as $displays)
    <li>{{ $displays->item_category }}</li>

    @endforeach


</body>
</html>