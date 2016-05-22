@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <div class="panel panel-danger">
        <div class="panel-heading">Edit event</div>
        <div class="panel-body">
          @if (session('status') == 204)
              <div class="alert alert-success">
                  Event successfully added
              </div>
          @endif
          {{Form::open(array('method'=> 'post', 'class' => 'form-horizontal', 'action' => array('EventController@store'))) }}
              @include('event.fields')
              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">
                          <i class="fa fa-btn fa-plus"></i>Create
                      </button>
                  </div>
              </div>
          {{ Form::close() }}
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
    $('input[name=start]').datetimepicker();
    $('input[name=end]').datetimepicker();
  })
  </script>
@endsection
