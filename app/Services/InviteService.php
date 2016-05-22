<?php
namespace App\Services;
use Illuminate\Support\Str;
use App\Jobs\SendInviteEmail;

use App\Invite;

class InviteService extends BaseService
{
	public static function generate($email, $name ,$expire)
	{

		$now = strtotime("now");
		$format = 'Y-m-d H:i:s ';
		$expiration = date($format, strtotime('+ '.$expire, $now));
		$code = Str::random(8) . self::hash_split(hash('sha256',$email)) . self::hash_split(hash('sha256',time())) . Str::random(8);
		$newInvi = [
				"code"			=> $code,
				"email"			=> $email,
				"name"			=> $name,
				"expiration"	=> $expiration,
				"active"		=> true,
				"used"			=> "0"
			];
		$invite = Invite::create($newInvi);
		return [
      'status' => 200,
      'invite' => $invite,
    ];


	}
	public function used($code,$email)
	{
		Invitation::where('code','=',$code)->where('email','=',$email)
				->update(array('used'=>True));
	}
	public function unuse($code,$email)
	{
		Invitation::where('code','=',$code)->where('email','=',$email)
				->update(array('used'=>False));
	}
	public function status($code,$email)
	{
		$temp = Invitation::where('code', '=', $code)->where('email','=',$email)
					->first();
		if($temp)
		{
			if(!$temp->active)
				return "deactive";
			else if($temp->used)
				return "used";
			else if(strtotime("now") > strtotime($temp->expiration))
				return "expired";
			else
				return "valid";
		}
		else
			return "not exist";
	}
	public function check($code,$email)
	{
		$temp = Invitation::where('code', '=', $code)->where('email','=',$email)
					->first();
		if($temp)
		{
			if(!$temp->active or $temp->used or strtotime("now") > strtotime($temp->expiration))
				return False;
			else
				return True;
		}
		else
			return False;
	}
	public function delete($code,$email)
	{
		$temp = Invitation::where('code', '=', $code)->where('email','=',$email)
					->delete();
	}
	public function emailStatus($email)
	{
		$temp = Invitation::where('email','=',$email)
					->first();
		if($temp)
		{
			$expired = false;
			if(strtotime("now") > strtotime($temp->expiration))
				$expired = true;
			$invite = array(
					"code"			=> $temp->code,
					"email"			=> $temp->email,
					"expiration"	=> $temp->expiration,
					"expired"		=> $expired,
					"active"		=> $temp->active,
					"used"			=> $temp->used
				);
			return json_encode($invite);
		}
		else
			return False;
	}
	protected function checkEmail($email)
	{
		$temp = Invitation::where('email', '=', $email)->first();
		if($temp)
			return False;
		else
			return True;
	}

	protected static function hash_split($hash)
	{
		$output = str_split($hash,8);
		return $output[rand(0,1)];
	}
}
