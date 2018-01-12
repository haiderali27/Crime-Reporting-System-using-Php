<?php
require("ad.php");


if(isset($_POST['btn_REPORT'])){
if(isset($_POST['verify'])){
$var1=$_POST['txtarea'];
$var2=$_POST['sname'];
$var3=$_POST['sdt'];
$var4=$_POST['gen'];
$var5=$_POST['sloc'];
$var6=$_POST['chklst'];
$var7=$_POST['name'];
$var8=$_POST['cnic'];

$size=sizeof($var6);
$skills="";
$t=1;
for($i=0;$i<$size;$i++)
{
	if($i<=$size-2)
	$skills=$skills.$var6[$i].",";
    else
    	$skills=$skills.$var6[$i];

}

$sql="select * from people where R_CNIC='$var8'&&R_NAME='$var7' ";

$result = $db->query($sql);
if($result->num_rows == 1){


$sql1="INSERT INTO REPORT(R_PARAGRAPH,R_SUSPECTNAME,R_DATETIME,R_GENDER,R_SUSPECTLOCATION,R_TYPES,R_STATUS,CNIC,NAME) VALUES('$var1','$var2','$var3','$var4','$var5','$skills','$t','$var8','$var7')";


if(Mysqli_query($db,$sql1)){
	echo "Your Report have been recorded :') "."<br>";   
echo '<a href="crimemainpage.html">';
echo "Go Back";
echo '</a>';
}

else
	echo "Sorry Something bad happened";
}
else{
echo "Please Enter Right Information for Verified Report, Thank You :)";
}
}
else
    echo "Pls Enter your Information First and Click on Verify your Self";
}


if(isset($_POST['sql'])){
$var1=$_POST['nme'];
$var2=$_POST['cnic'];
$var3=$_POST['rid'];

$sql="select * from report where  (R_ID='$var3' || NAME='$var1' || CNIC='$var2') && R_STATUS=1; ";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "CNIC: " . $row["CNIC"]. "<br>"."  Name: " . $row["NAME"]."<br>" ."Report_ID:" . $row["R_ID"]."<br>" ."  REPORT:".$row["R_PARAGRAPH"]."<br>"."   Date Time of Crime:".$row["R_DATETIME"]."<br>"."   Suspect Name:".$row["R_SUSPECTNAME"]."<br>"."   Crimes:".$row["R_TYPES"]."<br>"."   Location:".$row["R_SUSPECTLOCATION"]."<br>"."<hr>";
    }
} else {
    echo "No Records Exist";
}
echo '<a href="form3.html">';
echo "Go Back";
echo '</a>';
}

if(isset($_POST['sqlall'])){

$sql="select * from report";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
   while($row = $result->fetch_assoc()) {
        echo "CNIC: " . $row["CNIC"]. "<br>"."  Name: " . $row["NAME"]."<br>" ."Report_ID:" . $row["R_ID"]."<br>" ."  REPORT:".$row["R_PARAGRAPH"]."<br>"."   Date Time of Crime:".$row["R_DATETIME"]."<br>"."   Suspect Name:".$row["R_SUSPECTNAME"]."<br>"."   Crimes:".$row["R_TYPES"]."<br>"."   Location:".$row["R_SUSPECTLOCATION"]."<br>"."<hr>";
    
    }
} else {
    echo "No Records Exist";
}
echo '<a href="form3.html">';
echo "Go Back";
echo '</a>';

}



if(isset($_POST['sql1'])){
echo '<html>
<head>
<style>  
#b{color:#00ffff; background-color:#808080; font-size:12px; padding:10px; width:250px; height:640px; line-height:1.8; border: 2px groove (internal value); opacity: 0.8;}
.stat{ position: absolute;  left: 50px;} 

input[type=submit] {
    width: 70%;
    background-color: #4CAF50;
    color: white;
    padding: 7px 18px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: #45a049;
}
</style>
<title>
CRIME REPORTING SYSTEM
</title>
</head>
<body bgcolor="black" >
<div class="stat">
<center><h1 style="color: red"> CRIME REPORTING SYSTEM </h1></center>
<center><h2><form action="http://localhost/phpcodes/crsdb.php" method="post">

<fieldset id="b">
<legend>Customize Here</legend>
Enter R_ID:<br>
<input type="text" name="rrid" placeholder="enter id"><br>
Enter Report:<br>
<textarea rows="15" cols="35" name="txtarea" placeholder="enter your report here"></textarea><br>
Enter Suspect Name: <input type="text" name="sname" placeholder="enter suspect name"><br>
Enter the Location: <input type="text" name="sloc" placeholder="enter location of scene"><br>
Select Time of Scene:<input type="datetime-local" name="sdt" placeholder="select datetime"><br>
Enter Status:<br> <input type="text" name="statuss" placeholder="enter 0 or 1 only"><br>
Suspect Gender:<br>
Male<input type="radio" name="gen" value="male" checked> Female<input type="radio" name="gen" value="female"><br>
Crime Type:<br>
Murder<input type="checkbox" name="chklst[]" value="Murder" checked>
Voilence<input type="checkbox" name="chklst[]" value="Voilence">
Drugs<input type="checkbox" name="chklst[]" value="Drugs">
Theft<input type="checkbox" name="chklst[]" value="Theft">
Harrassment<input type="checkbox" name="chklst[]" value="Harrassment">
Threat<input type="checkbox" name="chklst[]" value="Threat">
<br>
<input type="submit" name="btn_REPORTT" value="Click Here to Update ">
</fieldset>
</form></h2></center></div>

</body>
</html>';

}

if(isset($_POST['btn_REPORTT'])){

if(isset($_POST['verify'])){
$var1=$_POST['txtarea'];
$var2=$_POST['sname'];
$var3=$_POST['sdt'];
$var4=$_POST['gen'];
$var5=$_POST['sloc'];
$var6=$_POST['chklst'];
$var7=$_POST['name'];
$var8=$_POST['cnic'];
$var9=$_POST['nmbr'];
$var10=$_POST['rrid'];
$var11=$_POST['statuss'];
$size=sizeof($var6);
$skills="";
for($i=0;$i<$size;$i++)
{
    if($i<=$size-2)
    $skills=$skills.$var6[$i].",";
    else
        $skills=$skills.$var6[$i];

}

$sql="select * from report where R_ID='$var10' ";

$result = $db->query($sql);
if($result->num_rows == 1){


$sql = "UPDATE report SET R_PARAGRAPH='$var1', R_SUSPECTNAME='$var2',R_DATETIME='$var3',R_GENDER='$var4', R_SUSPECTLOCATION='$var5',R_TYPES='$skills',R_STATUS='$var11' WHERE R_ID='$var10'";

if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo '<a href="form3.html">';
echo "Go Back";
echo '</a>';

} else {
    echo "Error updating record: " . $db->error;
}
}
else{
echo "Please Enter Right Information for Modification of Report, Thank You :)";
}
}

}

if(isset($_POST['sql2'])){

$var=$_POST['rid'];


mysqli_query($db,"delete from report where R_ID='$var'");

if ( mysqli_affected_rows($db)>0){
    echo "Record Have been deleted Success Fully";
        echo '<a href="form3.html">';
echo "Go Back";
echo '</a>';
    }
 else {
    echo "This record does not exist";
        echo '<a href="form3.html">';
echo "Go Back";
echo '</a>';
}
$db->close();


}

if(isset($_POST['display'])){
echo '<form  action="http://localhost/phpcodes/crsdb.php" method="post">
  

  <div>
    Name
    <input type="text"  name="nme" placeholder="Jane Doe">
   CNIC
    <input type="text"  name="cnic" placeholder="cnic">
    Report
    <input type="text"  name="rid" placeholder="enter if known">
    <br>

<input type="Submit" name="sql" value="DISPLAY">
</div> 
</form>';

}


if(isset($_POST['delete'])){
        echo '<form  action="http://localhost/phpcodes/crsdb.php" method="post">
<input type="text"  name="rid" placeholder="enter id of report,which is about to be deleted">
<input type="Submit" name="sql2" value="Delete">
</form>';
}

if(isset($_POST['assignp'])){
echo "Which office you want to assign for Selected Report";
echo '<form  action="http://localhost/phpcodes/crsdb.php" method="post">
  

  <div>
    Enter the Report ID you want to assign
    <input type="text"  name="rid" placeholder="enter if known">
    <h2>TO</h3>
    Enter The Name of Officer 
    <input type="text"  name="nme" placeholder="Jane Doe">
    Enter the Id of Officer
    <input type="text"  name="pid" placeholder="p_id">
    
    <br>

<input type="submit" name="assign" value="Assign Report">
</div> 
</form>';


}

if(isset($_POST['assign'])){

$var1=$_POST['nme'];
$var2=$_POST['pid'];
$reportid=$_POST['rid'];
$sql="select * from police where P_NAME='$var1'&&P_ID='$var2' ";

$result = $db->query($sql);
if($result->num_rows == 1){
$sql = "UPDATE report SET P_NAME='$var1',P_ID='$var2' where R_ID='$reportid'";
if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
        echo '<a href="form3.html">';
echo "Go Back";
echo '</a>';
} else {
    echo "Error updating record: " . $db->error;
}

}

else
    echo "This Police Officer Doesn't Exist, Thank You";
    echo '<a href="form3.html">';
echo "Go Back";
echo '</a>';


}

if(isset($_POST['see'])){
	echo '<form  action="http://localhost/phpcodes/crsdb.php" method="post">
	<input type="text" name="pid" placeholder="enter id"><br>
	<input type="text" name="pname" placeholder="enter id"><br>
	<input type="submit" name="seee" value="See">
    </form>';
}

if(isset($_POST['seee'])){

$var=$_POST['pid'];
$v=$_POST['pname'];
$sql="select * from report where P_ID='$var' && P_NAME='$v' ";
$result = $db->query($sql);
if($result->num_rows == 1){


}
else
	echo "Police ni ha ye wala pai";

}

?>
