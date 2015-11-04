<?php

class Settings extends Eloquent {
	protected $table = 'settings';

	public static function get ($key) {
		$settings = Settings::where('key', '=', $key)->take(1)->get();
		$setting = $settings[0];
		return $setting->value;
	}

	public static function set ($key, $value) {
		$selfuser = Auth::user();
		$settings = Settings::where('key', '=', $key)->take(1)->get();
		$setting = $settings[0];

		$setting->value = $value;
		$setting->updatedBy = $selfuser->uid;
		$setting->save();
	}
}