<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendInviteEmail;

use App\Services\InviteService;


class InviteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request) {
      $this->validate($request, [
        'name' => 'required|unique:events|max:255',
        'email' => 'required|email',
      ]);
      extract(InviteService::generate($request['email'], $request['name'], '2 days'));
      $job = (new SendInviteEmail($invite))->onQueue('emails');
  		$this->dispatch($job);
      return back()->withInput()->with('status', $status);
    }
    public function index() {
      return view('auth.invite');
    }
}
