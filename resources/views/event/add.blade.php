@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <div class="panel panel-danger">
        <div class="panel-heading">Add event</div>
        <div class="panel-body">
          @if (session('status') == 204)
              <div class="alert alert-success">
                  Stock successfully added
              </div>
          @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/event/create') }}">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="quantity" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                  <label class="col-md-4 control-label">Date</label>
                  <div class="col-md-6">
                      <input type="text" class="form-control" name="date" value="{{ old('date') }}">

                      @if ($errors->has('date'))
                          <span class="help-block">
                              <strong>{{ $errors->first('date') }}</strong>
                          </span>
                      @endif

                  </div>
                </div>





                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-plus"></i>Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

  </div>

    </div>
  </div>
</div>
@endsection


@section('scripts')
  <script src='http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js'></script>
  <script src='http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js'></script>
  <script  type="text/javascript">
  $(document).ready(function () {
    $('input[name=date]').datetimepicker();
  })
  </script>
@endsection
