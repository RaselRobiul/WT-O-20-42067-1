<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> </title>
	<style type="text/css">
		.red{
			color: red;
		}
	</style>
</head>
<body>

	<?php
	$nameErr = $emailErr = $genderErr = $dob1Err = $dob2Err = $dob3Err = $degreeErr = "Checkbox is not selected!"; $bloodgroupErr = "";
	$name = $email = $gender = $degree =  $dob1 = $dob2 = $dob3 = $bloodgroup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //name handel
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  //email handel
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
   }

   //gender handel
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }



  //degree handel
	/*if (empty($_POST["degree"])) {
  	$degreeErr = "Must Select atleast 2 option";
  }else{
  	$degree = $_POST["degree"];
  }*/

  
  



  //blood group handel
  if (empty($_POST["bloodgroup"])) {
  	$bloodgroupErr = "Must Select an option";
  }else{
  	$bloodgroup = $_POST["bloodgroup"];

  }


  //date of birth handel
  //day
  if (empty($_POST["dob1"])) {
  	$dob1Err = "Must input information";
  }else{
  	$dob1 = $_POST["dob1"];
  	if (!preg_match("/^(^[1-9]$)|(^0[1-9]|1[0-9]|2[0-9]|3[0-1]$)$/",$dob1)) {
      $dob1Err = "Must be between 1-31";
    }
  }
  //month
  if (empty($_POST["dob2"])) {
  	$dob2Err = "Must input information";
  }else{
  	$dob2 = $_POST["dob2"];
  	if (!preg_match("/^(^[1-9]$)|(^0[1-9]|1[0-2]$)$/",$dob2)) {
      $dob2Err = "Must be between 1-12";
    }
  }
  //year
  if (empty($_POST["dob3"])) {
  	$dob3Err = "Must input information";
  }else{
  	$dob3 = $_POST["dob3"];
  	if (!preg_match("/^(195[3-9]|196[0-9]|197[0-9]|198[0-9]|199[0-8])$/",$dob3)) {
      $dob3Err = "Must be between 1953-1998";
    }
  }



}  
?>






<fieldset>


	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

		<fieldset >
			<legend><h2>NAME</h2></legend>
			<input type="text" name="name"> 
			<hr>
			<span class="red"> <?php echo $nameErr ?></span>
		</fieldset>
		<h2></h2>

		<fieldset>
			<legend><h2>EMAIL</h2></legend>
			<input type="email" name="email">
			<hr>
			<span class="red"> <?php echo $emailErr ?></span>
		</fieldset>
		<h2></h2>

		<fieldset>
			<legend><h2>DATE OF BIRTH</h2></legend>
			<label>&nbsp dd &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp mm &nbsp&nbsp&nbsp&nbsp&nbspyyyy</label><br>
			<input type="text" id="dob1" name="dob1" maxlength="2" size="2"> 
			<input type="text" id="dob2" name="dob2" maxlength="2" size="2"> 
			<input type="text" id="dob3" name="dob3" maxlength="4" size="4"> 
			<hr>
			<span class="red"><?php echo $dob1Err ?></span><br>
			<span class="red"><?php echo $dob2Err ?></span><br>
			<span class="red"><?php echo $dob3Err ?></span><br>
		</fieldset>
		<h2></h2>

		<fieldset>
			<legend><h2>GENDER</h2></legend>
			<input type="radio" name="gender">Male
			<input type="radio" name="gender">Female
			<input type="radio" name="gender">Other
			<hr>
			<span class="red"><?php echo $genderErr ?></span>
		</fieldset>
		<h2></h2>

		<fieldset>

			<legend><h2>DEGREE</h2></legend>
			<input type="checkbox" name='degree[]' value="ssc"> ssc 
    		<input type="checkbox" name='degree[]' value="hsc"> hsc 
   			<input type="checkbox" name='degree[]' value="bsc"> bsc 
    		<input type="checkbox" name='degree[]' value="msc"> msc 	
			<hr>
			<!--<span class="red"><?php echo $degreeErr ?></span>!-->

		</fieldset>
		<h2></h2>

		<fieldset>
      		<legend><h2> Blood Group </h2></legend>
      		<select id="bloodgroup" name="bloodgroup">
      		<option value="">
      		<option value="A+" name="name"
    		<?php if (isset($bloodgroup) && $bloodgroup=="A+") echo "checked";?>
        	value="A+">A+
        	<option value="A-" name="name"
    		<?php if (isset($bloodgroup) && $bloodgroup=="A-") echo "checked";?>
          	value="A-">A-
        	<option value="B+" name="name"
    		<?php if (isset($bloodgroup) && $bloodgroup=="B+") echo "checked";?>
        	value="B+">B+
        	<option value="B-" name="name"
    		<?php if (isset($bloodgroup) && $bloodgroup=="B-") echo "checked";?>
        	value="B-">B-
        	<option value="O+" name="name"
    		<?php if (isset($bloodgroup) && $bloodgroup=="O+") echo "checked";?>
       	 	value="O+">O+
        	<option value="O-" name="name"
    		<?php if (isset($bloodgroup) && $bloodgroup=="O-") echo "checked";?>
        	value="O-">O-
        	<option value="Ab+" name="name"
    		<?php if (isset($bloodgroup) && $bloodgroup=="AB+") echo "checked";?>
        	value="AB+">AB+
        	<option value="AB-" name="name"
    		<?php if (isset($bloodgroup) && $bloodgroup=="AB-") echo "checked";?>
        	value="AB-">AB-
    		</select><hr><span class="red"><?php echo $bloodgroupErr ?></span><br></option>
      	</fieldset><br><br>
		<h2></h2>

		<input type="submit" name="submit" value="submite">


		

		<fieldset>
		<legend><h2>Input data</h2></legend>
		<?php
		echo $name."<br>";
		echo $email."<br>";
		echo $dob1. "/";
		echo $dob2. "/";
		echo $dob3."<br>";
		//echo $value."<br>";
		//degre handel 
		if(isset($_POST['submit'])){

    		if(!empty($_POST['degree'])) {

        	foreach($_POST['degree'] as $value){
            	echo $value.' ';
       		}

    		}else {
        		//echo $degreeErr."";
    			}
			}	
		//echo $degree."<br>";
		echo $bloodgroup."<br>";
		?>
		</fieldset>

	</form>

</fieldset>
	
</body>
</html>