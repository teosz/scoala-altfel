@extends('layouts.guest')

@section('content')
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
</form>
@endsection
