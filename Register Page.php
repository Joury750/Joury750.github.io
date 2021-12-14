<!--Register-->
<!DOCTYPE html>
<html>

<head>
      <title>Register</title>
<style>
  .e{color:red;}
</style>
</head>
<body>
<img src="logo.png" style="width:150px">
<!-- شريط التنقل -->
<div class="tape">
  <a class="active" href="#home">Home</a>
  <a href="Overview">Overview</a>
  <a href="About Donation">About Donation</a>
  <a href="Register">Register</a>
  <a href="Sign in">Sign in</a>
  <a href="Conditions for donating blood">Conditions for donating blood</a>
  <a href="Donation Places">Donation Places</a>
  <a herf="Posters">Posters</a>
  <a href="FAQs">FAQs</a>
  <a herf="Contact">Contact Us </a>
</div>
  
  <div style="padding-left:16px">


  <?php
//Create Connection mysqli
$conn = mysqli_connect( $fname, $email);
//Check Connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$fname = $email = "";
$flag1 = false; //fname
$flag2 = false; // email
$fnameErrM = "";
$emailErrM = "";
$finalMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["fname"]);
  $email = test_input($_POST["email"]);

  if (empty($fname)) {
    $fnameErrM = "  * Please enter your name";
    $flag1 = false;
  } 
  else {
    $fnameErrM = "";
    $flag1 = true;
  }
  if (empty($email)) {
    $emailErrM = "  *Please enter your email";
    $flag2 = false;
  } 
  else {
    $emailErr = "";
    $flag2 = true;
  }
  if ($flag1 == true && $flag2 ) 
  {
      //insert user information 
    $sql = "INSERT INTO contactus (Fname,Email)
    VALUES ( '$fname' , '$email')";

    if (mysqli_query($conn, $sql)) {

        //Check and show masg
        $finalMsg = "My Dear " .$fname. " Your comment has been sent successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
             }
    
      else {
          $finalMsg = "There was an error sending ";
      }
    
    }
      
     function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data; }
mysqli_close($conn); 
    
  ?>
<!--login Info:-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"></form>" method="post">
<br>
  <label for="fname">User Name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <span id = "e"><?php echo  $fnameErrM;?></span>
          <input
            type="text"
            id="fname"
            name="fName"
            value="<?php echo $fname; ?>"
            placeholder="Write your name..."/>


  <label for="email">Enter Your Email:</label>
  <input type="email" id="email" name="email"><br>
  <span id = "e2"><?php echo  $emailErrM;?></span>
          <input
            type="email"
            id="em" 
            name="email"
            value="<?php echo $email;?>"      
            placeholder="ex.AHD@it.com"/>



    <button type="button" id="prevBtn" onclick="nextPrev">Previous</button>
      
      <input type="submit" value="Submit">
    </form>

</body>
</html>
