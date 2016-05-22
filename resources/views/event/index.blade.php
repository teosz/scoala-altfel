@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      @foreach ($events as $event)
        <div class="card col-md-4">
          <div class="card-block">
              <p class="card-header pull-right">
                <a href="/event/{{$event->name}}/edit" class="btn btn-link">Edit</a>
                {{ Form::open(['method' => 'DELETE', 'route' => ['event.delete', $event->name] ]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger pull-right']) }}
                {{ Form::close() }}
              </p>
              <h4 class="card-title"> {{ $event->name }}</h4>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">Incepe pe {{ $event->start }} </li>
                  <li class="list-group-item">Se termina la {{ $event->end }} </li>
                  <li class="list-group-item">Profesor coordonator: {{ $event->user()->get()->first()->name }}</li>
              </ul>
          </div>
          <div class="card-block">
              <a href="#" class="btn btn-primary">Join</a>
          </div>
          <div class="card-footer text-muted">
            &nbsp;
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection


@section('navbar-right')
<li>
  <a class="red" href="{{ url('/event/create') }}">
    Add event
  </a>
</li>
@endsection
