<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Scoala altfel</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width" />
  	<link href="assets/css/login.css" rel="stylesheet" />

	</head>
	<body>
    <form class="login" role="form" method="POST" action="{{ url('/login') }}" novalidate>
      {!! csrf_field() !!}
      <fieldset>

      	<legend class="legend">Login</legend>

        <div class="input">
        	<input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required />
          <span><i class="fa fa-envelope-o"></i></span>
          @if ($errors->has('email'))
              <p class="error">{{ $errors->first('email') }}</p>
          @endif
        </div>

        <div class="input">
        	<input type="password" placeholder="Password" name="password" required />
          <span><i class="fa fa-lock"></i></span>
          @if ($errors->has('password'))
              <p class="error">{{ $errors->first('password') }}</p>
          @endif
        </div>

        <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>

      </fieldset>

      <div class="feedback">
      	login successful <br />
        redirecting...
      </div>

    </form>
	</body>
</html>
