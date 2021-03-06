<?php
namespace App\Services;
use Illuminate\Support\Str;
use App\Jobs\SendInviteEmail;

use App\Invite;

class InviteService extends BaseService
{
	public static function generate($email, $name, $role, $expire)
	{
		$now = strtotime("now");
		$format = 'Y-m-d H:i:s ';
		$expiration = date($format, strtotime('+ '.$expire, $now));
		$code = Str::random(8) . self::hash_split(hash('sha256',$email)) . self::hash_split(hash('sha256',time())) . Str::random(8);
		$newInvi = [
				"code"			=> $code,
				"email"			=> $email,
				"name"			=> $name,
				"role"			=> $role,
				"expiration"	=> $expiration,
			];
		$invite = Invite::create($newInvi);
		error_log("aici....");
		error_log($role);
		error_log(var_dump($invite->role));
		return [
      'status' => 200,
      'invite' => $invite,
    ];


	}
	public function unuse($code,$email)
	{
		Invitation::where('code','=',$code)->where('email','=',$email)
				->update(array('used'=>False));
	}
	public static function get($code)
	{
		$temp = Invite::where('code', '=', $code)->first();
		if($temp)
		{
			if(!$temp->active or $temp->used or strtotime("now") > strtotime($temp->expiration))
				return [
					'status' => 200,
					'invite' => $temp,
				];
		}
		else {
			return [
					'status' => 400,
					'error' => 'Invalid code'
			];
		}
	}
	public static function get_by_email($email)
	{
		$temp = Invite::where('email', '=', $email)->first();
		if($temp)
		{
			if(!$temp->active or $temp->used or strtotime("now") > strtotime($temp->expiration))
				return [
					'status' => 200,
					'invite' => $temp,
				];
		}
		else {
			return [
					'status' => 400,
					'error' => 'Invalid code'
			];
		}
	}
	public static function delete($email)
	{
		Invite::where('email',$email)->delete();
	}


	protected static function hash_split($hash)
	{
		$output = str_split($hash,8);
		return $output[rand(0,1)];
	}
}
