
<?php 
header('Content-Type: text/html; charset=utf-8');

mysql_query("set names 'utf8'");
mysql_connect('localhost','root','');
mysql_select_db('php');
//print_r($_POST);
$id=1;
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$result = mysql_query("SELECT * FROM `taltal` where `userid`=$id");
	$num_rows = mysql_num_rows($result);

	if(isset($_POST['name']))
		$name = $_POST['name'];
	if(isset($_POST['q1']))
		$q1 = $_POST['q1'];
	$now = time();
	if($num_rows === 1){
		mysql_query("UPDATE `taltal` SET userid=$id, username='$name', q1='$q1', time=$now WHERE `userid`=$id");
		echo "Updated";
	} else {
		$query = mysql_query("INSERT INTO `taltal` (`userid`,`username`, `q1`, `time`) VALUES ($id,'$name', '$q1', $now)") or die(mysql_error());
		echo "Insert";
	}		
}

//$result = mysql_query("SELECT * FROM `taltal` where `userid`=$id");
//$xml=new SimpleXMlElement("example_3_levels.xml");

$xml = new SimpleXMLElement('<cmi>
	<mode>normal</mode>
	<!-- הרמה הראשונה של דיווח נתוני הערכה -->
	<!-- ציון המבחן כולו, כפי שחושב ע"י התוכן -->
	<score>
		<scaled>0.6</scaled>
		<min>0</min>
		<max>100</max>
		<raw>60</raw>
	</score>
	<!-- נתוני הערכה נוספים של הרמה הראשונה -->
	<completion_status>completed</completion_status>
	<success_status>passed</success_status>
	
	<total_time>PT1H10M10.52S</total_time>
	<session_time>PT1H11M</session_time>
	<exit>normal</exit>

	<!-- הרמה השנייה של דיווח נתוני הערכה -->
	<objectives>
		<!-- שאלה ראשונה המורכבת משני תתי-סעיפים המופעים בהמשך -->
		<objective>
			<id>QUESTION_1</id>
			<score>
				<raw>60</raw>
				<scaled>0.6</scaled>
				<min>0</min>
				<max>100</max>
			</score>
			<success_status>passed</success_status>
			<completion_status>completed</completion_status>
			<description lang="he">ערי בירה</description>
		</objective>
		<!-- שאלה שניה המורכבת משני תתי-סעיפים המופעים בהמשך -->
		<objective>
			<id>QUESTION_2</id>
			<score>
				<scaled>0.5</scaled>
				<min>0</min>
				<max>100</max>
				<raw>50</raw>
			</score>
			<success_status>failed</success_status>
			<completion_status>incomplete</completion_status>
			<description lang="he">סוג מטבע</description>
		</objective>
		
	</objectives>

	<!-- הרמה השלישית של דיווח נתוני הערכה -->
	<interactions>	
		<!-- סעיפי שאלה ראשונה -->
		<!-- סעיף ראשון של שאלה ראשונה -->
		<interaction>
			<id>SUB_QUESTION_1_1</id>
			<type>choice</type>
			<objectives>
				<objective>QUESTION_1</objective>
			</objectives>
			<timestamp>2012-09-27T18:10:00</timestamp>

			<correct_responses>
				<multiple_choices>
					<multiple_choice>2</multiple_choice>
				</multiple_choices>
			</correct_responses>
			
			<weighting>60</weighting>
			<learnerResponse>
			<multiple_choices>
				<multiple_choice>2</multiple_choice>
			</multiple_choices>
			</learnerResponse>
			
			<result>correct</result>
			<latency>PT1M30S</latency>
			<description lang="he">
				מהי עיר הבירה של ישראל?
				1. תל אביב
				2. ירושלים
				3. חיפה
				4. באר שבע
			</description>
		</interaction>
		<!-- סעיף שני של שאלה ראשונה -->
		<interaction>
			<id>SUB_QUESTION_1_2</id>
			<type>choice</type>
			<objectives>
				<objective>QUESTION_1</objective>
			</objectives>
			<timestamp>2012-09-27T18:11:30</timestamp>

			<correct_responses>
				<multiple_choices>
					<multiple_choice>3</multiple_choice>
				</multiple_choices>
			</correct_responses>
			
			<weighting>40</weighting>
			<learnerResponse>
			<multiple_choices>
				<multiple_choice>1</multiple_choice>
			</multiple_choices>
			</learnerResponse>
			
			<result>incorrect</result>
			<latency>PT0M30S</latency>
			<description lang="he">
				מהי עיר הבירה של שוויץ?
				1. ציריך
				2. גנבה
				3. ברן
			</description>
		</interaction>
		
		<!-- סעיפי שאלה שנייה -->
		<!-- סעיף ראשון של שאלה שנייה -->
		<interaction>
			<id>SUB_QUESTION_2_1</id>
			<type>fill-in</type>
			<objectives>
				<objective>QUESTION_2</objective>
			</objectives>
			<timestamp>2012-09-27T18:12:00</timestamp>

			<correct_responses>
				<fill_ins>
					<fill_in lang="he">שקל חדש</fill_in>
				</fill_ins>
				<fill_ins>
					<fill_in lang="he">ש"ח</fill_in>
				</fill_ins>
			</correct_responses>
			
			<weighting>50</weighting>
			<learnerResponse>
				<fill_in lang="he">ש"ח</fill_in>
			</learnerResponse>
			
			<result>correct</result>
			<latency>PT1M</latency>
			<description lang="he">
			המטבע הנמצא בשימוש בישראל הוא ___
			</description>
		</interaction>
		<!-- סעיף שני של שאלה שנייה -->
		<interaction>
			<id>SUB_QUESTION_2_2</id>
			<type>fill-in</type>
			<objectives>
				<objective>QUESTION_2</objective>
			</objectives>
			<timestamp>2012-09-27T18:13:00</timestamp>

			<correct_responses>
				<fill_ins>
					<fill_in lang="he">פרנק</fill_in>
				</fill_ins>
				<fill_ins>
					<fill_in lang="he">פרנק שוויצרי</fill_in>
				</fill_ins>
			</correct_responses>
			
			<weighting>50</weighting>

			<!-- No learner response. -->
			
			<result>incorrect</result>
			<description lang="he">
			המטבע הנמצא בשימוש בשוויץ הוא ___
			</description>
		</interaction>
	</interactions>

</cmi>
');

$vals = array(); 
$extra_vals = array();
//$extra_vals['x.start.time'] = time();
$all = array();

RecurseXML($xml,$vals);
$all = array_merge($extra_vals, $vals);
//print_r($all); die;
$var_to_find = array("lesson_status,exit,score.raw,");
$var_to_replace = array("lesson_status,exit,score.raw,");


mysql_query("set names 'utf8'");
/*   
echo '<pre>';
print_r($vals);
echo '</pre>';
*/
$count = 0;
$query = mysql_query("DELETE FROM `mdl_scorm_scoes_track` WHERE `userid` = $id;");
$i=0;
foreach($all as $key=>$value) {	
	//print only nodes with values
	if(!empty($value)){	
	/*
			$key = str_replace("interaction.","",$key);
			$key = str_replace("objective.","",$key);
			$key = str_replace("interactions.","interactions_",$key);
			$key = str_replace("objectives.","objectives_",$key);
			$key = str_replace("objectives_i","objectives_0.i",$key);
			$key = str_replace("objectives_s","objectives_0.s",$key);
			$key = str_replace("objectives_c","objectives_0.c",$key);
			$key = str_replace("objectives_d","objectives_0.d",$key);
			$key = str_replace("interactions_d","interactions_0.d",$key);
			$key = str_replace("interactions_i","interactions_0.i",$key);
			$key = str_replace("interactions_t","interactions_0.t",$key);
			$key = str_replace("interactions_o","interactions_0.o",$key);
			$key = str_replace("interactions_c","interactions_0.c",$key);
			$key = str_replace("interactions_w","interactions_0.w",$key);
			$key = str_replace("interactions_l","interactions_0.l",$key);
			$key = str_replace("interactions_r","interactions_0.r",$key);
			*/
	}
	if(trim($value) || trim($value)==0){
		if($i>0)
		{
			print("cmi.{$key} = {$value}<BR>\n"); 
			$key = "cmi.".$key;
		}
		else
		{
			//print("{$key} = {$value}<BR>\n"); 
			
		}
	} 
	$i++;
		
	$now = time();	
  //echo "INSERT INTO `mdl_scorm_scoes_track` (`id`,`userid`,`scormid`,`scoid`,`attemp`,`element`,`value`,`timemodified`) VALUES ('',$id,0, 0,0,'$key','$value',$now)";
  $key = trim($key);
  $value = trim($value);
  if($value || $value==0)
	$query = mysql_query("INSERT INTO `mdl_scorm_scoes_track` (`id`,`userid`,`scormid`,`scoid`,`attempt`,`element`,`value`,`timemodified`) VALUES ('',$id,0, 0,0,'$key','$value',$now)") or die(mysql_error());
  //echo "<br/>";

  //echo "Deleted";
  }
echo "Count: ", $count;
function RecurseXML($xml,&$vals,$parent="") { 
  $childs=0; 
  $child_count=-1; # Not realy needed. 
  $arr=array(); 
        foreach ($xml->children() as $key=>$value) { 
                if (in_array($key,$arr)) { 
                        $child_count++; 
                } else { 
                        $child_count=0; 
                } 
                $arr[]=$key; 
				if($child_count == 0)
					$k=($parent == "") ? "$key" : "$parent.$key"; 
				else{
					$temp_num = $child_count;
					$k=($parent == "") ? "$key.$temp_num" : "$parent.$key.$temp_num"; 
					}
                $childs=RecurseXML($value,$vals,$k); 
                if ($childs==0) { 
                        $vals[$k]= (string)$value; 
                } 
        } 
  return $childs; 
} 
?>

