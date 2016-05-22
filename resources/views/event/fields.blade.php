<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        <!-- <input type="text" class="" name="name" value="{{ old('name') }}"> -->
        {{ Form::text('name', null,  ['class' => 'form-control']) }}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif

    </div>
</div>
<div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
    {{ Form::label('start', 'Start', ['class' => 'col-md-4 control-label']) }}
  <div class="col-md-6">
      {{ Form::text('start', null,  ['class' => 'form-control']) }}

      @if ($errors->has('start'))
          <span class="help-block">
              <strong>{{ $errors->first('start') }}</strong>
          </span>
      @endif

  </div>
</div>
<div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
  {{ Form::label('end', 'End', ['class' => 'col-md-4 control-label']) }}
  <div class="col-md-6">
      {{ Form::text('end', null,  ['class' => 'form-control']) }}

      @if ($errors->has('end'))
          <span class="help-block">
              <strong>{{ $errors->first('end') }}</strong>
          </span>
      @endif

  </div>
</div>
