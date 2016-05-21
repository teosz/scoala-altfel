<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Event;


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

    /**
     * Validate input date.
     * @param data(array)
     * @return Validator
     */
    protected function validator(array $data)
    {
      return Validator::make($data, [
        'name' => 'required|unique:events|max:255',
        'start' => 'required|date',
        'end' => 'required|date'
      ]);
    }
    protected function parseDate($data)
    {
      $data['start'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $data['start'])));
      $data['end'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $data['end'])));
      return $data;
    }
    public function create()
    {
      $data = Input::except('_token');
      $validator = $this->validator($data);
      if($validator->fails()) {
        return back()->withInput()->withErrors($validator)->with('status', 400);
      } else {
        $data = $this->parseDate($data);
        error_log(print_r($data));
        $event = new Event($data);
        $event->user()->associate(Auth::user());
        $event->save();


      }
    }
    public function add()
    {
        return view('event/add');
    }
    public function index()
    {
        return view('event/index');
    }
}
