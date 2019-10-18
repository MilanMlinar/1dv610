<?php

namespace view;

class DateTimeView {

	public function show() {

		$day = date('l');
		$dayOfTheMonth = date('jS');
		$month = date('F');
		$year = date('Y');
		$time = date('H:i:s');

		date_default_timezone_set('Europe/Stockholm');

		$timeString = "$day, the $dayOfTheMonth of $month $year, The time is $time";

		return '<p>' . $timeString . '</p>';
	}
}