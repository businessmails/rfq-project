<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      @if(Auth::user())
      <li><a href="#" class="text-uppercase">{{Auth::user()->name}} </a></li>
      <li><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('/logout')}}">logout</a></li>
      @else
      <li class="active"><a href="#">Home</a></li>
      <li><a href="{{url('/buyer-signup')}}">Buyer Sign Up</a></li>
      <li><a href="{{url('/seller-signup')}}">Seller Sign Up</a></li>

      <li><a href="{{url('/login')}}">Login</a></li>
      <li><a href="{{url('admin/login')}}"> Admin Login</a></li>

      @endif
    </ul>
  </div>
</nav>
<div class="container">
  <h2>User Detais</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th> Company Name</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
        @foreach($records as $key => $record)
      <tr>
        <td>{{$record->name}}</td>
        <td>{{$record->UserDetail->company_name}}</td>
        <td>{{array_key_exists($record->UserDetail->account_type,StaticArray::$account_types)  ? StaticArray::$account_types[$record->UserDetail->account_type] : 'Seller' }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
