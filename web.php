<?php
$con=mysqli_connect("localhost","root","","webform");
if(!$con){
	die("connection failed");
}
else{
	echo "connected to database","<br>";
}
if(isset($_POST['submit']) && isset($_FILES['FILE']))
{
$Studentname=$_POST['SNAME'];
$D_Birth=$_POST['DATE'];
$Contact=$_POST['CONTACT'];
$Email=$_POST['EMAIL'];
$Gender=$_POST['GENDER'];
$Religion=$_POST['RELIGION'];
$Courses=$_POST['COURSES'];
$Department=$_POST['DEPARTMENT'];
$L_Qualification=$_POST['LASTQ'];
$Fathername=$_POST['FNAME'];
$Fathercontact=$_POST['FCONTACT'];
$F_Cnic=$_POST['CNIC'];
$permanentaddress=$_POST['ADDRESS'];
$Filename=$_FILES['FILE']['name'];
$Filetmpname=$_FILES['FILE']['tmp_name'];
$Branches=$_POST['BRANCH'];
$password= 	$_POST['PASSWORD'];
if(empty($Studentname) || ctype_space($Studentname)) {
		echo "Student Name field is empty","<br>";
	}
elseif (strlen($Studentname)<=2 ) {
echo "student name is tooo short";	
}


elseif (!preg_match("/[a-zA-Z]/", $Studentname)) {
	echo "Student Name is not valid","<br>";
}
if(empty($D_Birth) || ctype_space($D_Birth)) {
	echo "Fill Date of Birth","<br>";
}
if(empty($Contact) || ctype_space($Contact)) {
	echo "Fill Student cell no:","<br>";
}
elseif (!preg_match("/[0-9]/", $Contact)){
	echo "Student cell is not valid","<br>";
}
if(empty($Email) || ctype_space($Email)) {
	echo "Fill email address","<br>";
}
elseif (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
	echo "Email is not valid","<br>";
}
if(empty($Gender))
{
	echo "gender field empty","<br>";
}
if(empty($Religion) || ctype_space($Religion)) {
	echo "Fill Religion field","<br>";
}
elseif (!preg_match("/[a-zA-Z]/", $Religion)) {
	echo "Religion is not valid","<br>";
}
if(empty($Courses))
{
	echo "select course","<br>";
}
if(empty($Department))
{
	echo "select Department","<br>";
}
if(empty($L_Qualification))
{
	echo "please select last qualification","<br>";
}
if(empty($Fathername) || ctype_space($Fathername)) {
	echo "Father name name is empty","<br>";
}
elseif (!preg_match("/[a-zA-Z]/", $Fathername)) {
	echo "Father name is not valid","<br>";
}
if(empty($Fathercontact) || ctype_space($Fathercontact)) {
	echo "Father Contact is empty","<br>";
}
elseif (!preg_match("/[0-9]/", $Fathercontact)) {
	echo "Father contact is not valid","<br>";
}
if(empty($F_Cnic) || ctype_space($F_Cnic)){
	echo "Father cnic is empty","<br>";
}
elseif (!preg_match("/[0-9]{5}[-]{1}[0-9]{7}[-]{1}[0-9]{1}/",$F_Cnic)){
echo "father cnic is not valid","<br>";
}
if(empty($permanentaddress) || ctype_space($permanentaddress)) {
	echo "permanent address field is empty","<br>";
}
elseif (!preg_match("/[a-zA-Z0-9]/", $permanentaddress)) {
	echo "permanent address in not valid","<br>";
}
if (!move_uploaded_file($Filetmpname, "serverfiles/".$Filename)){
	echo "file is not uploaded","<br>";
}
if(empty($Branches)){
	echo "Select Branche","<br>";
}
if(empty($password) || ctype_space($password)) {
	echo "Passsword is empty","<br>";
}
elseif (!preg_match("/[a-zA-Z0-9]/",$password)) {
	echo "Passsword is not valid","<br>";
}
$query="INSERT INTO webdata(STUDENT_NAME,D_BIRTH,STUDENT_CELL_NO,EMAIL,GENDER,RELIGION,COURSES,DEPARTMENT,LAST_QUALIFICATION,FATHER_NAME,FATHER_CELL_NO,FATHER_CNIC,ADDRESS,PRFILE,BRANCH)
	values('$Studentname','$D_Birth','$Contact','$Email','$Gender','$Religion','$Courses','$Department',
	'$L_Qualification','$Fathername','$Fathercontact','$F_Cnic','$permanentaddress','$Filename','$Branches')";
	if(mysqli_query($con,$query))
	{
		echo "data inserted";
	}
	else
	{
		echo "data not inserted";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>practice form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
	<form action="#" method="post" enctype="multipart/form-data">
<div class="background">
	<div class="backgroundwhite">
	<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 heading" >
			<h3>REGISTRATION FORM:</h3>
		</div>
	</div>
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 Pinfo" >
			<h3>Personal Information:</h3>
		</div>
	</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 formformatting">
		<input type="text" name="SNAME" placeholder="Enter student name">
	</div>
<div class="col-lg-6 col-md-6 col-sm-12 formformatting">
		<input type="date" name="DATE" placeholder="Date of birth">
</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 formformatting">
		<input type="text" name="CONTACT" placeholder="Student cell number">
	</div>
<div class="col-lg-6 col-md-6 col-sm-12 formformatting">
		<input type="email" name="EMAIL" placeholder="Enter email address">
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 select">
	<p>Gender:
		<select name="GENDER">
			<option value=""></option>
		<option value="Male">Male</option>
			<option value="female">female</option>
				<option value="gay">Gay</option>
	</select>
	</div>
<div class="col-lg-6 col-md-6 col-sm-12 formformatting">
	<input type="text" name="RELIGION" placeholder="Religion">
</div>
</div>
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 Pinfo" >
			<h3>Academic Details:</h3>
		</div>
	</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 select">
		<p>Courses:
			<select name="COURSES">
				<option value=""></option>
				<option value="intermediate">Intermediate</option>
				<option value="2-years programs">2-years program</option>
					<option value="4-years programs">4-years program</option>
						<option value="Masters">Masters</option>
							<option value="PHD">PHD</option>
			</select>
		</p>
			</div>
	<div class="col-lg-6 col-md-6 col-sm-12 select">
		<p>Dep:<select name="DEPARTMENT">
			<option value=""></option>
			<option value="Data Science">Data Science </option>
			<option value="Buisness Analytics">Buisness Analytics </option>
			<option value="Machine learning">Machine learning </option>
			<option value="Computer Science">Computer Science</option>
			<option value="AutoCAD">AutoCAD</option>
			<option value="journaism">journaism</option>
			<option value="Commerce">Commerce</option>
			<option value="Software Engineering">Software Engineering</option>
			<option value="BS Mathematics">BS Mathematics</option>
			<option value="BS English">BS English</option>
			<option value="Cyber Security">Cyber Security</option>
		</select></p>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 select">
		<p>Your Last Qualification:<select name="LASTQ">
			<option value=""></option>
			<option value="Matric">Matric</option>
			<option value="intermediate">Intermediate</option>
			<option value="Graduation">Graduation</option>
			<option value="Masters">Masters</option>
		</select></p>
	</div>
</div>
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 Pinfo" >
			<h3>Parents/Guardian Details:</h3>
		</div>
	</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 formformatting">
		<input type="text" name="FNAME" placeholder="father name">
	</div>
<div class="col-lg-6 col-md-6 col-sm-12 formformatting" >
	<input type="text" name="FCONTACT" placeholder="father cell no:">
</div>
</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 formformatting">
		<input type="text" name="CNIC" placeholder="father cnic">
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 formformatting">
		<input type="text" name="ADDRESS" placeholder="Permanent Address">
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 Pinfo">
		<h3>Last SteP:</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 file">
		<input type="file" name="FILE">
		<img src="serverfiles/<?php echo $Filename;?> height=100px width=100px">
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 select" >
		<p> Branches:<select name="BRANCH">
			<option value=""></option>
			<option value="pakistan,karachi">pakistan,karachi</option>
			<option value="pakistan,HYD">pakistan,HYD</option>
			<option value="Dubai">Dubai</option>
			<option value="America,washingtone">America,washigtone</option>
		</select></p>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 password">
		<input type="password" name="PASSWORD" placeholder="Password">
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 buttons">
		<input type="submit" name="submit" value="Submit">
		<input type="reset" name="reset" value="Reset">
	</div>
</div>
	</div>
</div>
</div>
</form>
</body>
</html>	 