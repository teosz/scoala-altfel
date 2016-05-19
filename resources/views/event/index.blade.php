@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card col-md-4">
      <div class="card-block">
          <h4 class="card-title">Eveniment 1</h4>
          <p class="card-text">Event description.</p>
          <ul class="list-group list-group-flush">
              <li class="list-group-item">Incepela ora 00:00 pe 01.01.1970 </li>
              <li class="list-group-item">Profesor coordonator: Iuliana Serban</li>
          </ul>
      </div>
      <div class="card-block">
          <a href="#" class="btn btn-primary">Join</a>
      </div>
      <div class="card-footer text-muted">
        &nbsp;
      </div>
  </div>

    </div>
  </div>
</div>
@endsection


@section('navbar-right')
<li>
  <a class="red" href="{{ url('/event/add') }}">
    Add event
  </a>
</li>
@endsection
