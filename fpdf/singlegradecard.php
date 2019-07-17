<?php


define('FPDF_FONTPATH', 'font/');
require('fpdf.php');

//Connect to your database
$cnx_id = mysql_connect('localhost','root','kamal123');
mysql_select_db('test',$cnx_id);

$sql_ok = ( isset($cnx_id) && is_resource($cnx_id) ) ? 1 : 0;
if ($sql_ok==0) $cnx_id = 'clear';
$link = $cnx_id; 

//---------------------------------------------------------------------//
$Semester = '6';
$enroll = 'IIT2013001';
$year = '2015';
//$brnch = 'IT';
$rdate = '2/3/15';


$year_part = 1;

if($Semester % 2 == 1){
	$year_part = 2;
}else{
	$year_part = 1;
}



$fonts = 'Times';
/*$query_text = "select distinct student_id from grade where sem = '".$Semester."' and year_part = '".$year_part."'and $year = '".$year."'";
$list_can=mysql_query($query_text, $link);

$fonts = 'Times';

//$pointer = 'student_id';
$pdf=new FPDF();

while($cand = mysql_fetch_array($list_can)){
	//echo $cand;
	//$stu_id = */
	$pdf=new FPDF();

	$q1 = "select first_name, middle_name, last_name, student_id, program_id from student where enroll_ment_no = '".$enroll."'";
	//$q3 = "select course_id ";

	$q = "select * from grade where student_id = '".$name[3]."' and sem = '".$Semester."'";




	//	echo $q1;
	$cname = mysql_query($q1, $link);
	$name = mysql_fetch_array($cname);


	//echo $cname['name'];
	//$cname = "select * from new where student_id = '".$cand[0]."'";
	//$pointer = $pointer+1;
	//	echo $q;

	$inf = mysql_query($q, $link);
	//	echo $inf;

	//$pdf=new FPDF();

	$sname = $name[0]." ".$name[1]." ".$name[2];
	$stu_id = $name[3];

	$q2 = "select program_code,program_name from program where program_id = '".$name[4]."'";
	$prog_q = mysql_query($q2, $link);
	$prog_table = mysql_fetch_array($prog_q);


	//	echo $enroll;


	$course = $prog_table[0];
	$sem = $Semester;



	//Disable automatic page break
	$pdf->SetAutoPageBreak(false);
	//Add first page

	$pdf->AddPage();
	if($year_part == 1)
		$asession = 'January - June '.$year;
	else
		$asession = 'July - December '.$year;

	$pdf->SetFont($fonts, 'B', 14);
	$pdf->SetY(40);
	$pdf->SetX(65);
	$pdf->Cell(45,6,'Academic Session : ');
	$pdf->Cell(30,6,$asession);

//---------------------------------------------------------------------//

	$branch_array['IT'] = "Information Technology";
	$branch_array['ECE'] = "Electronics and Communcation Engineering";
	$branch_array['IBM'] = "Biomedical Engineering";
	$branch_array['IIT'] = "Information Technology";
	$branch_array['IIT'] = "Information Technology";
	$branch_array['IIT'] = "Information Technology";
	$branch_array['IIT'] = "Information Technology";
	$branch_array['IIT'] = "Information Technology";
	$branch_array['IIT'] = "Information Technology";

	//$branch = 'Information Technology';

	$var = $prog_table[1]." in ".$branch_array[$brnch];
	$pdf->SetY(46);
	$pdf->SetX(70);
	$pdf->Cell(25,6,$var);
	$pdf->Cell(30,6,$branch);


	$pdf->SetFont($fonts, 'B', 12);
	//------------------------------------------------------------------------------------///////////
	$im = 'user.png';
	$pdf -> Image($im,150,70,33);

	$pdf->SetY(73);
	$pdf->SetX(25);

	$pdf->Cell(34, 6, 'Enrollment No. :');
	$pdf->SetFont($fonts, '', 10);
	$pdf->Cell(30, 6, $enroll);
	$pdf->SetFont($fonts, 'B', 12);
	$pdf->SetY(79);
	$pdf->SetX(25);
	$pdf->Cell(16, 6, 'Name : ');
	$pdf->SetFont($fonts, '', 10);
	$pdf->Cell(40, 6, $sname);
	$pdf->SetFont($fonts, 'B', 12);
	$pdf->SetY(85);
	$pdf->SetX(25);
	$pdf->Cell(19, 6, 'Course : ');
	$pdf->SetFont($fonts, '', 10);
	$pdf->Cell(30, 6, $course);
	$pdf->SetFont($fonts, 'B', 12);
	$pdf->SetY(91);
	$pdf->SetX(25);
	$pdf->Cell(23, 6, 'Semester : ');
	$pdf->SetFont($fonts, '', 10);
	$pdf->Cell(3, 6, $sem);

	//set initial y axis position per page
	$y_axis_initial = 120;
	$y_axis = 120;

	$t_credit = 0;
	$wid = 20;
	$widi = 2*$wid;
	//print column titles for the actual page
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetFont($fonts, 'B', 10);
	$pdf->SetY($y_axis_initial);
	$pdf->SetX(25);
	$pdf->Cell(80, 6, 'Subject', 1, 0, 'C', 1);
	//$widi = 2*$wid;
	$pdf->Cell($widi, 6, 'Credit', 1, 0, 'C', 1);
	$pdf->Cell($widi, 6, 'Grade', 1, 0, 'C', 1);
	$row_height = 6;
	$y_axis = $y_axis + $row_height;	
	$pdf->SetY($y_axis);
	$pdf->SetX(25);

	$pdf->Cell(20, 6, 'ID', 1, 0, 'L', 1);
	$pdf->Cell(60, 6, 'Name', 1, 0, 'L', 1);
	$pdf->Cell($wid, 6, 'Course', 1, 0, 'L', 1);
	$pdf->Cell($wid, 6, 'Lab', 1, 0, 'L', 1);
	$pdf->Cell($wid, 6, 'Course', 1, 0, 'L', 1);
	$pdf->Cell($wid, 6, 'Lab', 1, 0, 'L', 1);
	$row_height = 6;
	$pdf->SetFont($fonts,'' ,10);

	$y_axis = $y_axis + $row_height;

	//Select the Products you want to show in your PDF file
	//$result=mysql_query('select course_id, course_name, course_credit from course', $link);

	//initialize counter
	$i = 0;

	//Set maximum rows per page
	$max = 40;

	//Set Row Height
	//$row_height = 6;
	//$p = 0;
	$cnt = 0;
	$sgpi = 0;

	while($row = mysql_fetch_array($inf))
	{
		//If the current row is the last one, create new page and print column title
		/*if ($i == $max)
		  {
		  $pdf->AddPage();

		//print column titles for the current page
		$pdf->SetY($y_axis_initial);
		$pdf->SetX(25);
		$pdf->Cell(30, 6, 'Corse ID', 1, 0, 'L', 1);
		$pdf->Cell(100, 6, 'Course Name', 1, 0, 'L', 1);
		$pdf->Cell(30, 6, 'Course Credit', 1, 0, 'R', 1);

		//Go to next row
		$y_axis = $y_axis + $row_height;

		//Set $i variable to 0 (first row)
		$i = 0;
		}*/

		$id = $row['course_id'];
		$q4 = "select course_name, theory_credit, lab_credit from course where course_id = '".$id."'";
		
		$c__name = mysql_query($q4, $link);
		$c_name = mysql_fetch_array($c__name);

		$cname = $c_name[0];
		$credit = $c_name[1];
		$l_credit = $c_name[2];
		$c_grade = $row['theory_grade'];
		$l_grade = $row['lab_grade'];

		if($l_credit == 0){
			$l_grade = '--';
			$cnt--;
		}
		$cnt += 2;
		$t_credit += ($credit+$l_credit);
		//$sgpi = 0;
		if($c_grade == 'A+'){
			$sgpi += (10*3);
		}else if($c_grade == 'A'){
			$sgpi += (9*3);
		}else if($c_grade == 'B+'){
			$sgpi += (8*3);
		}else if($c_grade == 'B'){
			$sgpi += (7*3);
		}else if($c_grade == 'c'){
			$sgpi += (6*3);
		}else if($c_grade == 'D'){
			$sgpi += (5*3);
		}
		if($l_grade == 'A+'){
			$sgpi += 10*2;
		}else if($l_grade == 'A'){
			$sgpi += 9*2;
		}else if($l_grade == 'B+'){
			$sgpi += 8*2;
		}else if($l_grade == 'B'){
			$sgpi += 7*2;
		}else if($l_grade == 'c'){
			$sgpi += 6*2;
		}else if($l_grade == 'D'){
			$sgpi += 5*2;
		}




		$pdf->SetY($y_axis);
		$pdf->SetX(25);
		$pdf->Cell(20, 6, $id, 1, 0, 'L', 1);
		$pdf->Cell(60, 6, $cname, 1, 0, 'L', 1);
		$pdf->Cell($wid, 6, $credit, 1, 0, 'L', 1);
		$pdf->Cell($wid, 6, $l_credit, 1, 0, 'L', 1);
		$pdf->Cell($wid, 6, $c_grade, 1, 0, 'L', 1);
		$pdf->Cell($wid, 6, $l_grade, 1, 0, 'L', 1);

		//Go to next row
		$y_axis = $y_axis + $row_height;
		$i = $i + 1;
		//	$cnt++;
	}
	$pdf->SetFont($fonts,'B' ,10);
	$pdf->SetY($y_axis);
	$pdf->SetX(25);	
	$out = "Total Credit : ".$t_credit;

	$pdf->Cell(100, 6, $out, 1, 0, 'C', 1);
	$sg = $sgpi / $t_credit;
	$sg = round($sg, 2);
	$ss = "SGPI = ".$sg;
	$pdf->Cell(60, 6, $ss, 1, 0, 'C', 1);
	//$pdf->Cell(60, 6, '',1);
	$pdf->SetFont($fonts,'',10);

	$y_axis = $y_axis + 6;

	//$rdate = '26/11/2015';
	$pdf->SetY($y_axis+1);
	$pdf->SetX(25);
	$pdf->Cell(45, 6, 'Date of Result Declaration : ');
	$pdf->Cell(30, 6, date("d/m/Y"));
	$y_axis = $y_axis + $row_height;
	$pdf->SetY($y_axis);
	$pdf->SetX(25);
	$pdf->Cell(23, 6, 'Prepared on : ');
	$pdf->Cell(30, 6, $rdate);

	$y_axis = $y_axis + 5*$row_height;
	$pdf->SetFont($fonts,'B' ,10);
	$pdf->SetY($y_axis);
	$pdf->SetX(65);
	$flag = 1;

//-----------------------------------------------------------------------////////////////////
	if($flag == 1)
		$pdf->Cell(50, 6, 'Result: Passed and Promoted to next Semester');


	
	//BackSide Of  Page
	$pdf->AddPage();
	$pdf -> Rect(20,12,170,145);
	$y_axis = 15;
	$pdf->SetY($y_axis);
	$pdf->SetX(65);
	$pdf->SetFont($fonts,'BU' ,10);
	$pdf->Cell(25, 6, 'Award System and other relevant information');


	$y_axis = 25;
	$handle = @fopen("instructions.txt", "r");
	$pdf->SetFont($fonts,'' ,10);
	if ($handle) {
		while (($buffer = fgets($handle, 4096)) !== false) {
			//echo $buffer;
			$pdf->SetY($y_axis);
			$pdf->SetX(25);
			$flag = 0;
			if(strlen($buffer) > 107){
				$flag = 1;
				$str = substr($buffer, 107, strlen($buffer));
				$buffer = substr($buffer, 0, 107);
			}

			$pdf->Cell(2, 6, chr(127), 0, 0, 'L');
			$pdf->Cell($y_axis, 6, $buffer);
			$y_axis = $y_axis+6;
			if($flag){
				$pdf -> SetY($y_axis);
				$pdf->SetX(27);
				$pdf->Cell($y_axis, 6, $str);
				$y_axis = $y_axis+6;
			}
		}
		//if (!feof($handle)) {
		//	echo "Error: unexpected fgets() fail\n";
		//}
		fclose($handle);
		$pdf->SetFont($fonts,'B' ,10);
		$pdf -> SetY($y_axis);
		//$pdf->SetX(45);
		$x = 58;
		$pdf->SetX($x);
		$pdf->Cell(31, 6, 'Grade', 'C');
		$pdf->Cell(30, 6, 'Meaning', 'C');
		$pdf->Cell(30, 6, 'Grade value', 'C');
		$pdf->SetFont($fonts,'' ,10);
		
		$y_axis = $y_axis+6;
		$pdf -> SetY($y_axis);
		//$pdf->SetX(42);
		$x = 61;
		$pdf->SetX($x);
		$pdf->Cell(28, 6, 'A+', 'C');
		$pdf->Cell(35, 6, 'Outstanding', 'C');
		$pdf->Cell(30, 6, '10', 'C');

		$y_axis = $y_axis+6;
		$pdf -> SetY($y_axis);
		//$pdf->SetX(42);
		$pdf->SetX($x);
		$pdf->Cell(28, 6, 'A', 'C');
		$pdf->Cell(36, 6, 'Excellent', 'C');
		$pdf->Cell(30, 6, '9', 'C');

		$y_axis = $y_axis+6;
		$pdf -> SetY($y_axis);
		//$pdf->SetX(42);
		$pdf->SetX($x);
		$pdf->Cell(28, 6, 'B+', 'C');
		$pdf->Cell(36, 6, 'Good', 'C');
		$pdf->Cell(30, 6, '8', 'C');


		$y_axis = $y_axis+6;
		$pdf -> SetY($y_axis);
		//$pdf->SetX(42);
		$pdf->SetX($x);
		$pdf->Cell(28, 6, 'B', 'C');
		$pdf->Cell(36, 6, 'Average', 'C');
		$pdf->Cell(30, 6, '7', 'C');


		$y_axis = $y_axis+6;
		$pdf -> SetY($y_axis);
		//$pdf->SetX(42);
		$pdf->SetX($x);
		$pdf->Cell(28, 6, 'C', 'C');
		$pdf->Cell(36, 6, 'Below Average', 'C');
		$pdf->Cell(30, 6, '6', 'C');
		
		$y_axis = $y_axis+6;
		$pdf -> SetY($y_axis);
		//$pdf->SetX(42);
		$pdf->SetX($x);
		$pdf->Cell(28, 6, 'D', 'C');
		$pdf->Cell(36, 6, 'Just Passed', 'C');
		$pdf->Cell(30, 6, '5', 'C');

		$y_axis = $y_axis+6;
		$pdf -> SetY($y_axis);
		//$pdf->SetX(42);
		$pdf->SetX($x);
		$pdf->Cell(28, 6, 'F', 'C');
		$pdf->Cell(36, 6, 'Failed', 'C');
		$pdf->Cell(30, 6, '0', 'C');
		$file_name = $enroll.".pdf";
		//$pdf->Output('F', $file_name);
		//$pointer = $pointer+1;
	}
//}

mysql_close($link);

//Create file
$pdf->Output('F', $file_name);
?> 
