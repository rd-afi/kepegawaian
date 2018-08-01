<?php
	function get_monthname($number){
		if($number == 1 or $number ==  "01"){
			return "January";
		}else if($number == 2 or $number == "02"){
			return "February";
		}else if($number == 3 or $number ==  "03"){
			return "March";
		}else if($number == 4 or  $number == "04"){
			return "April";
		}else if($number == 5 or  $number == "05"){
			return "May";
		}else if($number == 6 or  $number == "06"){
			return "June";
		}else if($number == 7 or  $number == "07"){
			return "July";
		}else if($number == 8 or  $number == "08"){
			return "August";
		}else if($number == 9 or $number == "09"){
			return "September";
		}else if($number == "10"){
			return "October";
		}else if($number == "11"){
			return "November";
		}else if($number == "12"){
			return "December";
		}
	}
	function get_monthnumber($bulan){
	  if($bulan ==  "January"){
	    return "01";
	  }else if($bulan == "February"){
	    return "02";
	  }else if($bulan ==  "March"){
	    return "03";
	  }else if($bulan == "April"){
	    return "04";
	  }else if($bulan == "May"){
	    return "05";
	  }else if($bulan == "June"){
	    return "06";
	  }else if($bulan == "July"){
	    return "07";
	  }else if($bulan == "August"){
	    return "08";
	  }else if($bulan == "September"){
	    return "09";
	  }else if($bulan == "October"){
	    return "10";
	  }else if($bulan == "November"){
	    return "11";
	  }else if($bulan == "December"){
	    return "12";
	  }
	}
	// function get_monthnumber($number){
	// 	if($number == 1 or $number ==  "01"){
	// 		return "Januari";
	// 	}else if($number == 2 or $number == "02"){
	// 		return "Februari";
	// 	}else if($number == 3 or $number ==  "03"){
	// 		return "Maret";
	// 	}else if($number == 4 or  $number == "04"){
	// 		return "April";
	// 	}else if($number == 5 or  $number == "05"){
	// 		return "Mei";
	// 	}else if($number == 6 or  $number == "06"){
	// 		return "Juni";
	// 	}else if($number == 7 or  $number == "07"){
	// 		return "Juli";
	// 	}else if($number == 8 or  $number == "08"){
	// 		return "Agustus";
	// 	}else if($number == 9 or $number == "09"){
	// 		return "September";
	// 	}else if($number == "10"){
	// 		return "Oktober";
	// 	}else if($number == "11"){
	// 		return "November";
	// 	}else if($number == "12"){
	// 		return "Desember";
	// 	}
	// }
