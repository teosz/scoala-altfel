@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    @if (session('status') == 200)
                        <div class="alert alert-success">
                            Invitation successfully sent
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select class="form-control" name="role">
                                  @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->display_name}}</option>
                                  @endforeach
                                </select>
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
