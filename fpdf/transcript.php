<?php


define('FPDF_FONTPATH', 'font/');
require('fpdf.php');

//Connect to your database
$cnx_id = mysql_connect('localhost','root','kamal123');
mysql_select_db('test',$cnx_id);

$sql_ok = ( isset($cnx_id) && is_resource($cnx_id) ) ? 1 : 0;
if ($sql_ok==0) $cnx_id = 'clear';
$link = $cnx_id;

$list_can=mysql_query('select distinct student_id from newtranscript', $link);
$pointer = 'student_id';
$pdf=new FPDF();
$fonts = 'Times';


//$date = date('d-m-Y', '1-7-2013');

//$a_date = date('M Y',mktime('July 2011'));
/*$a_date = new DateTime();
  $a_date -> setDate(2011,7,28);
  $a_date -> format('M Y');
 */
//$a_date = 'july 2011';
while($cand = mysql_fetch_array($list_can)){
	$a_date = 'july 2011';
	//echo $cand;
	//$q = "select * from newtranscript where student_id = '".$cand[0]."'";
	$q1 = "select * from student where student_id = '".$cand[0]."'";

	$cname=mysql_query($q1, $link);
	$name = mysql_fetch_array($cname);


	//	$inf = mysql_query($q, $link);
	$hei = 5;

	//$pdf=new FPDF();

	$sname = $name[1];
	$enroll = $cand[0];
	$course = 'B.Tech.(IT)';
	//$sem = '6';
	//	$date = date('Y-m-d');



	//Disable automatic page break
	$pdf->SetAutoPageBreak(false);

	//Add first page
	$pdf->AddPage();
	$pdf->SetFont($fonts, 'B', 14);

	$y_axis = 10;
	$pdf->SetY(10);
	$pdf->SetX(60);
	$ins_name = 'Indian Institute of Information Technology, Allahabad';
	//echo strlen($ins_name);
	$pdf->Cell(54,$hei,$ins_name);

	$pdf->SetFont($fonts, '', 12);
	$y_axis = $y_axis + $hei;
	$pdf->SetY($y_axis);

	$address = 'Deoghat Jhalwa, Allahabad-211012, U.P. India';
	$len = strlen($address);
	$init = (210-$len)/2;//$
	$pdf->SetX($init);
	$pdf->Cell($len,$hei,$address);
	//$pdf->SetX($init);
	$y_axis = $y_axis + $hei;


	$head = 'TRANSCRIPT';
	$len = strlen($head);
	$init = (210-$len)/2;//$
	//$pdf->SetX($init);
	//	echo $init;
	$pdf->SetY($y_axis);
	$pdf->SetX($init);
	//$pdf->SetX(12);
	$pdf->Cell($len,$hei,$head);
	//$pdf->SetX($init);
	$y_axis = $y_axis + $hei;

	//echo $y_axis."\n";

	$pdf -> rect(9,$y_axis, 193, 220);
	$pdf -> rect(9,$y_axis, 64, 21);
	$pdf -> rect(74,$y_axis, 128, 21);
	$y_axis = $y_axis + 1;
	$y = $y_axis;
	$pdf->SetFont($fonts, '', 10);

	$ini = 9;
	$pdf->SetY($y_axis);
	$pdf->SetX($ini);

	$pdf->Cell(25, $hei, 'Enrollment No. :');
	$pdf->SetFont($fonts, 'B', 10);
	$pdf->Cell(15, $hei, $enroll);
	$pdf->SetFont($fonts, '', 10);

	$y_axis = $y_axis + $hei;
	$pdf->SetY($y_axis);
	$pdf->SetX($ini);

	$pdf->Cell(25, $hei, 'Student Name:');
	$pdf->SetFont($fonts, 'B', 10);
	$pdf->Cell(30, $hei, $sname);
	$pdf->SetFont($fonts, '', 10);

	$y_axis = $y_axis + $hei;
	$pdf->SetY($y_axis);
	$pdf->SetX($ini);

	$dob = date('4-5-1996');
	$pdf->Cell(25, $hei, 'Date of Birth:');
	$pdf->SetFont($fonts, 'B', 10);
	$pdf->Cell(20, $hei, $dob);
	$pdf->SetFont($fonts, '', 10);

	$y_axis = $y_axis + $hei;
	$pdf->SetY($y_axis);
	$pdf->SetX($ini);

	$fname = 'Abcd';
	$pdf->Cell(25, $hei, 'Father\'s name: ');
	$pdf->SetFont($fonts, 'B', 10);
	$pdf->Cell(20, $hei, $fname);
	$pdf->SetFont($fonts, '', 10);

	$ini = 75;
	$y_axis = $y;
	$pdf->SetY($y_axis);
	$pdf->SetX($ini);

	$cname = 'B.Tech(Information Technology) ';
	$pdf->Cell(15, $hei, 'Course: ');
	$pdf->SetFont($fonts, 'B', 10);
	$pdf->Cell(30, $hei, $cname);
	$pdf->SetFont($fonts, '', 10);

	//$ini = 77.8;
	$y_axis = $y_axis+$hei;
	$pdf->SetY($y_axis);
	$pdf->SetX($ini);

	//$cname = 'B.Tech(Information Technology) ';
	$pdf->Cell(30, $hei, 'Date of Admission: ');
	$pdf->SetFont($fonts, 'B', 10);
	$pdf->Cell(20, $hei, $a_date);
	$pdf->SetFont($fonts, '', 10);

	$y_axis = $y_axis+$hei;
	$pdf->SetY($y_axis);
	$pdf->SetX($ini);	

	$a_date = $a_date.'- june 2016';
	//$cname = 'B.Tech(Information Technology) ';
	$pdf->Cell(30, $hei, 'Period of Course: ');
	$pdf->SetFont($fonts, 'B', 10);
	//$pdf->SetFont($fonts, '', 8);
	$pdf->Cell(20, $hei, $a_date);
	$pdf->SetFont($fonts, '', 10);


	$y_axis = $y_axis+$hei;
	$pdf->SetY($y_axis);
	$pdf->SetX($ini);	

	$dur = '4 Years (8 Semester)';
	//$a_date = $a_date.'- june 2016';
	//$cname = 'B.Tech(Information Technology) ';
	$pdf->Cell(33, $hei, 'Duration of Course: ');
	$pdf->SetFont($fonts, 'B', 10);
	$pdf->Cell(20, $hei, $dur);
	$pdf->SetFont($fonts, '', 10);

	$y_axis = $y_axis+$hei;
	$pdf->SetFillColor(255, 255, 255);
	$xa = 10;
	//echo $y_axis."\n";



	$y = $y_axis+1;
	//$y -= 70;
	$olcredit=0;
	echo $y;
	//$down = 70;
	$mx = -4;
	$t_sgpi=0;
	for($x = 1; $x <=10; $x++){
		$q = "select * from newtranscript where student_id = '".$cand[0]."' and sem = '".$x."'";

		//$q = "select * from newtranscript where student_id = '".$cand[0]."' and sem = '".$x."'";
		$inf = mysql_query($q, $link);
		$num_rows = mysql_num_rows($inf);
		//if(empty($inf)){
		//echo $x.'\n';
		//	break;
		//}

		if($x % 3 == 1){
			$y = $y + ($mx+4)*$hei+2;
			$xa = 10;
			$mx = 0;
		}else{
			$xa += 64;
		}
		$down = 0;

		$flag = 0;
		$t_credit = 0;
		$sgpi = 0;
		//echo $y;
		//$herex -> GetX();
		//$herey -> GetY();
		//echo $herex." ".$herey;
		$cnt = 0;
		//$mx = -1;
		if($x == 10 && $num_rows == 1){
			if($x % 3 != 1){
				$y = $y + ($mx+4)*$hei+2;
				$xa = 10;
			}
			$row = mysql_fetch_array($inf);
			$pdf->SetFont($fonts, 'B', 8);
			$y_axis = $y;
			$pdf->SetY($y_axis);
			$pdf->SetX($xa);
			$pdf->Cell(190, $hei, $x.' Semester', 1, 0, 'C', 1);
			$y_axis += $hei;
			$pdf->SetY($y_axis);
			$pdf->SetX($xa);
			$pdf->Cell(90, $hei, 'Subject Code', 1, 0, 'C', 1);
			$pdf->Cell(50, $hei, 'Course Grade', 1, 0, 'C', 1);
			$pdf->Cell(50, $hei, 'Credit', 1, 0, 'C', 1);
			$y_axis = $y_axis + $hei;
			//$flag = 1;
			$id = $row['course_id'];
			$cname = $row['course_name'];
			$credit = $row['course_credit'];
			$l_credit = $row['lab_credit'];
			$c_grade = $row['course_grade'];
			$l_grade = $row['lab_grade'];
			$t_credit += ($credit+$l_credit);
			if($l_credit == 0){
				$l_grade = '--';
				//$cnt--;
			}
			echo $cname."\n";
			//$cnt += 2;
			//$t_credit += ($credit+$l_credit);
			//$sgpi = 0;
			if($c_grade == 'A+'){
				$sgpi += (10*$credit);
			}else if($c_grade == 'A'){
				$sgpi += (9*$credit);
			}else if($c_grade == 'B+'){
				$sgpi += (8*$credit);
			}else if($c_grade == 'B'){
				$sgpi += (7*$credit);
			}else if($c_grade == 'c'){
				$sgpi += (6*$credit);
			}else if($c_grade == 'D'){
				$sgpi += (5*$credit);
			}

			if($l_grade == 'A+'){
				$sgpi += (10*$l_credit);
				//$sgpi += 10;
			}else if($l_grade == 'A'){
				$sgpi += (9*$l_credit);
				//$sgpi += 9;
			}else if($l_grade == 'B+'){
				$sgpi += (8*$l_credit);
				//$sgpi += 8;
			}else if($l_grade == 'B'){
				$sgpi += (7*$l_credit);
				//	$sgpi += 7;
			}else if($l_grade == 'c'){
				$sgpi += (6*$l_credit);
				//$sgpi += 6;
			}else if($l_grade == 'D'){
				$sgpi += (5*$l_credit);
				//$sgpi += 5;
			}




			//$pdf->SetFont($fonts, '', 8);
			$pdf->SetY($y_axis);
			$pdf->SetX($xa);
			$pdf->Cell(90, 3*$hei, $id, 1, 0, 'C', 1);
			//$pdf->Cell(60, 6, $cname, 1, 0, 'L', 1);
			//$pdf->Cell(15, $hei, $id, 1, 0, 'L', 1);
			//	$pdf->Cell($wid, 6, $credit, 1, 0, 'R', 1);
			//	$pdf->Cell($wid, 6, $l_credit, 1, 0, 'R', 1);
			$pdf->Cell(50, 3*$hei, $credit, 1, 0, 'C', 1);
			$pdf->Cell(50, 3*$hei, $c_grade, 1, 0, 'C', 1);
			//Go to next row
			$y_axis = $y_axis +3* $hei;
			//$i = $i + 1;
			$ya=$y_axis;

			//$pdf->SetFont($fonts,'B' ,8);
			$pdf->SetY($ya);
			//echo $ya;
			$pdf->SetX($xa);	
			$out = "Total Credit : ".$t_credit;
			$olcredit += $t_credit;
			//echo $ya;
			$pdf->Cell(90, $hei, $out, 1, 0, 'C', 1);
			$sg = $sgpi / $t_credit;
			$t_sgpi += $sgpi;
			$sg = round($sg, 2);
			$ss = "SGPI = ".$sg;
			$pdf->Cell(100, $hei, $ss, 1, 0, 'C', 1);
			//$pdf->SetFont($fonts,'' ,8);
			$pdf->SetY($ya+5);
			//echo $ya;
			$pdf->SetX($xa);	
			$pdf->Cell(190, $hei, 'Result: Passed and Course Completed Successfully' ,1,0,'L',1);







		}else{
			while($row = mysql_fetch_array($inf)){
				$cnt++;
				if($flag == 0){
					$pdf->SetFont($fonts, 'B', 8);
					$y_axis = $y;
					$pdf->SetY($y_axis);
					$pdf->SetX($xa);

					//		$str = $x." Semester "
					$pdf->Cell(63, $hei, $x.' Semester', 1, 0, 'C', 1);

					//$pdf->SetY($y_axis);
					$y_axis += $hei;
					$pdf->SetY($y_axis);
					$pdf->SetX($xa);
					$pdf->Cell(23, $hei, 'Subject Code', 1, 0, 'L', 1);
					$pdf->Cell(20, $hei, 'Course Grade', 1, 0, 'L', 1);
					$pdf->Cell(20, $hei, 'Lab Grade', 1, 0, 'R', 1);
					$y_axis = $y_axis + $hei;
					$flag = 1;
				}
				
				$id = $row['course_id'];
				$cname = $row['course_name'];
				$credit = $row['course_credit'];
				$l_credit = $row['lab_credit'];
				$c_grade = $row['course_grade'];
				$l_grade = $row['lab_grade'];

				$t_credit += ($credit+$l_credit);
				if($l_credit == 0){
					$l_grade = '--';
					//$cnt--;
				}
				//echo $cand[0]." ".$id."  ".$credit."   ".$l_credit."  ".$x."\n";
				//$cnt += 2;
				//$t_credit += ($credit+$l_credit);
				//$sgpi = 0;
				if($c_grade == 'A+'){
					$sgpi += (10*$credit);
				}else if($c_grade == 'A'){
					$sgpi += (9*$credit);
				}else if($c_grade == 'B+'){
					$sgpi += (8*$credit);
				}else if($c_grade == 'B'){
					$sgpi += (7*$credit);
				}else if($c_grade == 'c'){
					$sgpi += (6*$credit);
				}else if($c_grade == 'D'){
					$sgpi += (5*$credit);
				}

				if($l_grade == 'A+'){
					$sgpi += (10*$l_credit);
					//$sgpi += 10;
				}else if($l_grade == 'A'){
					$sgpi += (9*$l_credit);
					//$sgpi += 9;
				}else if($l_grade == 'B+'){
					$sgpi += (8*$l_credit);
					//$sgpi += 8;
				}else if($l_grade == 'B'){
					$sgpi += (7*$l_credit);
					//	$sgpi += 7;
				}else if($l_grade == 'c'){
					$sgpi += (6*$l_credit);
					//$sgpi += 6;
				}else if($l_grade == 'D'){
					$sgpi += (5*$l_credit);
					//$sgpi += 5;
				}




				$pdf->SetFont($fonts, '', 8);
				$pdf->SetY($y_axis);
				$pdf->SetX($xa);
				$pdf->Cell(23, $hei, $id, 1, 0, 'L', 1);
				//$pdf->Cell(60, 6, $cname, 1, 0, 'L', 1);
				//$pdf->Cell(15, $hei, $id, 1, 0, 'L', 1);
				//	$pdf->Cell($wid, 6, $credit, 1, 0, 'R', 1);
				//	$pdf->Cell($wid, 6, $l_credit, 1, 0, 'R', 1);
				$pdf->Cell(20, $hei, $c_grade, 1, 0, 'C', 1);
				$pdf->Cell(20, $hei, $l_grade, 1, 0, 'C', 1);
				//Go to next row
				$y_axis = $y_axis + $hei;
				//$i = $i + 1;
				$ya=$y_axis;
				//	$y=$y_axis;
			}
			if($cnt > $mx){
				$mx = $cnt;
			}
		}

		//	$down = $y_axis-$y;
		//	}
		//	echo $cnt."\n";
		if($flag){
			$pdf->SetFont($fonts,'B' ,8);
			$pdf->SetY($ya);
			//echo $ya;
			$pdf->SetX($xa);	
			$out = "Total Credits : ".$t_credit;
			$olcredit += $t_credit;
			//echo $ya;
			$pdf->Cell(23, $hei, $out, 1, 0, 'C', 1);
			$sg = $sgpi / $t_credit;
			$t_sgpi += $sgpi;
			$sg = round($sg, 2);
			$ss = "SGPI = ".$sg;
			$pdf->Cell(40, $hei, $ss, 1, 0, 'C', 1);
			$pdf->SetFont($fonts,'' ,8);
			$pdf->SetY($ya+5);
			//echo $ya;
			$pdf->SetX($xa);	
			$pdf->Cell(63, $hei, 'Result: Passed and Promoted to Next Semester',1,0,'C',1);
		}
}
$pdf->SetFont($fonts,'B' ,10);
$pdf->SetY(247);			//echo $ya;
$pdf->SetX(10);

$var = $t_sgpi / $olcredit;
$var = round($var, 2);
$cgpi = "CGPI: ".$var;
$pdf->Cell(20, $hei, $cgpi,'C');
$pdf->Cell(40, $hei, 'Credits Appeared: ','C');
$pdf->Cell(40, $hei, 'Credits Earned: ','C');

$pdf->SetFont($fonts,'B' ,10);
$pdf->SetY(257);			//echo $ya;
$pdf->SetX(24);
$pdf->Cell(64, $hei, 'Prepared By','C');
$pdf->Cell(64, $hei, 'Checked By','C');
$pdf->Cell(64, $hei, 'Assistant Registrar','C');
}

mysql_close($link);
//Create file
$pdf->Output('F', 'srciptdoc.pdf');
//

?>
