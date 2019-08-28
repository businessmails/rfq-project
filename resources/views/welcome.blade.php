
<html lang="en">
<head>
  <title>WebSiteName</title>
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
      <li class="active"><a href="#">Home</a></li>
      <li><a href="{{url('/buyer-signup')}}">Buyer Sign Up</a></li>
      <li><a href="{{url('/seller-signup')}}">Seller Sign Up</a></li>
      @if(Auth::user())
      <li><a href="{{url('/logout')}}">logout</a></li>
      @else
      <li><a href="{{url('/login')}}">Login</a></li>

      @endif
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Home Page</h3>
  <p>Coming Soon.</p>
</div>

</body>
</html>
