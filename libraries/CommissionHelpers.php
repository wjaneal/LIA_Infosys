<?php
class CommissionHelpers{
	
	public static function levels($numstudents){
		if($numstudents < 5){ return 'levelA';}
		elseif($numstudents >= 5 and $numstudents <10){ return 'levelB';}
		elseif($numstudents >= 10 and $numstudents <20){ return 'levelC';}
		elseif($numstudents >= 20){return 'levelD';}
		else{return 0;}
		}
	public static function commission_calc($tuition, $grade, $numstudents){
		$commissiongrid = array(9=>array('levelA'=>0.35, 'levelB'=>0.4, 'levelC'=>0.45, 'levelD'=>0.5), 10=>array('levelA'=>0.30, 'levelB'=>0.35, 'levelC'=>0.40, 'levelD'=>0.45), 11=>array('levelA'=>0.25, 'levelB'=>0.275, 'levelC'=>0.30, 'levelD'=>0.35), 12=>array('levelA'=>0.20, 'levelB'=>0.20, 'levelC'=>0.25, 'levelD'=>0.25));
		$commissiontotal = (int)$tuition * $commissiongrid[(int)$grade][CommissionHelpers::levels($numstudents)];
		return $commissiontotal;
		}
//Checks for title case in single words:
	public static function commission_differential($Total_Students, $Sub_Agent_Students, $grade, $tuition){
		return CommissionHelpers::commission_calc($tuition, $grade, $Total_Students) - CommissionHelpers::commission_calc($tuition, $grade, $Sub_Agent_Students);
}	

	public static function commission_percentage($grade, $numstudents){
		$level = CommissionHelpers::levels($numstudents);
		$commissiongrid = array(9=>array('levelA'=>0.35, 'levelB'=>0.4, 'levelC'=>0.45, 'levelD'=>0.5), 10=>array('levelA'=>0.30, 'levelB'=>0.35, 'levelC'=>0.40, 'levelD'=>0.45), 11=>array('levelA'=>0.25, 'levelB'=>0.275, 'levelC'=>0.30, 'levelD'=>0.35), 12=>array('levelA'=>0.20, 'levelB'=>0.20, 'levelC'=>0.25, 'levelD'=>0.25));
		return $commissiongrid[$grade][$level]*100;
	}
}
?>

