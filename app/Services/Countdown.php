<?php
namespace App\Services;
use Session;

class Countdown
{
	protected $carbon;

	public function __construct()
	{
		$this->carbon = new \Carbon\Carbon;
	}

	public function remain($key)
	{
		if(!Session::has($key)) return 0;

		$next_time = (int)Session::get($key);
		
		if($this->carbon->timestamp <= $next_time)
		{
			return $next_time - $this->carbon->timestamp;
		}

		Session::forget($key);
		return 0;
	}

	public function create($key, $plus = 60)
	{
		Session::put($key, $this->carbon->timestamp + $plus);
	}
}