<?php

namespace Drupal\event_time_service\Service;

class eventTimeService {

	public function showTimeLeft($date){
		$currentDate = date('m/d/Y');
		if ($currentDate < $date) {
			$curr = strtotime($currentDate);
			$dat = strtotime($date);
			$datediff = round(($dat - $curr) / (60 * 60 * 24));
			switch ($datediff){
				case 1:
					return $datediff . " day left until event starts";
				default: 
					return $datediff . " days left until event starts";
			}
		}
		else if ($currentDate == $date){
			return "This event is happening today";
		}
		else{
			return "This event already passed.";
		}
	}
}

