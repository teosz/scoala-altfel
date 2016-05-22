<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Services\EventService;


class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:events|max:255',
        'start' => 'required|date',
        'end' => 'required|date'
      ]);
      $input = $request->all();
      extract(EventService::create($input));
      return back()->with('status', $status);
    }
    public function change($name, Request $request) {
      $this->validate($request, [
        'name' => 'required|max:255',
        'start' => 'required|date',
        'end' => 'required|date'
      ]);
      $input = $request->all();
      extract(EventService::find_by_name($name));
      extract(EventService::update($event, $input));
      return redirect()->route('event.update', $event->name)->with('status', $status)->with('event', $event);

    }
    public function update($name) {
      extract(EventService::find_by_name($name));
      return view('event.update')->with('event', $event);

    }
    public function delete($name) {
      extract(EventService::find_by_name($name));
      EventService::delete($event);
      return redirect()->route('event.index');

    }
    public function create()
    {
        return view('event.create');
    }
    public function index(Request $request)
    {
        $input = $request->all();
        extract(EventService::get($input));
        return view('event.index')->with('events', $events);
    }
}
