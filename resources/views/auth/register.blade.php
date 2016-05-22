@extends('layouts.guest')

@section('content')
<form class="login" role="form" method="POST" action="{{ url('/register') }}" novalidate>
  {!! csrf_field() !!}
  <fieldset>

  	<legend class="legend">Register</legend>

    <div class="input">
    	<input type="email" placeholder="Email" name="email" value="{{ $invite->email }}" required />
      <span><i class="fa fa-envelope-o"></i></span>
      @if ($errors->has('email'))
          <p class="error">{{ $errors->first('email') }}</p>
      @endif
    </div>

    <div class="input">
    	<input type="email" placeholder="Name" name="name" value="{{ $invite->name }}" readonly />
      <span><i class="fa fa-user"></i></span>
      @if ($errors->has('name'))
          <p class="error">{{ $errors->first('name') }}</p>
      @endif
    </div>
    <div class="input">
      <input type="password" placeholder="Password" name="password" required />
      <span><i class="fa fa-lock"></i></span>
      @if ($errors->has('password'))
          <p class="error">{{ $errors->first('password') }}</p>
      @endif
    </div>
    <div class="input">
      <input type="password" placeholder="Confirm password" name="password_confirmation" required />
      <span><i class="fa fa-lock"></i></span>
      @if ($errors->has('password_confirmation'))
          <p class="error">{{ $errors->first('password_confirmation') }}</p>
      @endif
    </div>

    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>

  </fieldset>
</form>
@endsection
