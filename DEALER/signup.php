<?php
$err1="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
  {

$username=$_POST['username'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$cnumber=$_POST['cnumber'];
$email= $_POST['email'];
$address= $_POST ['address'];


if ($username=="" or  $pass=="" or $repass=="" or $repass=="" or $cnumber=="" or $address=="")
{

   echo "<span>Enter All Of The fields</span>";
  
}
elseif(strlen($username)<3 or (strlen ($username)>20))
{
    echo "<span> USername must be Between 3 and 20 charcter long <span>";  
}
elseif (strlen($pass)<6)
{
	echo "<span>Password must be more than 6 charcter  </span>";
}
elseif (ctype_upper($pass))
{
	echo "<span> Password must contain Atleast one Upper case. </span>";
}
elseif ($pass != $repass)
{
	echo "<span> Password Not Matching </span>";
}

elseif (strlen($repass)<6)
{
	echo "<span>Re-RtpePassword must be more than 6 charcter  </span>";
}
elseif (ctype_upper($repass))
{
	echo "<span> Re-type Password Must contain Atleast one Upper case. </span>";
}
elseif (!ctype_digit($cnumber))
{
	echo "<span> Contact Number onmy COntain Numbers. </span>";
}





elseif(strlen($_POST["email"])<6)
{
    echo "<span> Enter Your Email </span>";
}
else if (strlen($address)<0)
{
  echo "<span> Write Your Message </span>";

}
else
{
  include_once ('dbconnection.php');
  $conn=connection();
  $sql= "INSERT INTO `reg`(`id`, `username`, `pass`, `repass`, `cnumber`, `email`, `address`) VALUES ('','$username','$pass','$repass','$cnumber','$email','$address')";

if ( $conn -> query($sql))
{
  echo "<u> Data inset Sucefully </u>";
}
else
{
  "Error";
}

}



}




  ?>




<style >
    

.well
{
         padding: 35px;
         padding-left: 30px;
         box-shadow: 0 0 10px #666666;
         margin: 4% auto 0;
         width: 450px;

}

      body
      {
        background-color:  #dedede;
      }

      .input-group-addon
      {
        background-color: #ffde6c;
        color: #d17d00;
      }
.bodyx
{
    background-color: #3D9970  ;
    height: 754px;
}
.backhome
{
  background-color: green;
  color: white;
  margin-left: 35%;
}
span
{
  box-sizing: border-box;
  color: red;
  background-color: black;
  width: 100vw;
  padding: 20px 80px;
  margin-left: 40%;
}
u
{
  box-sizing: border-box;
  color: green;
  background-color: white;
  width: 100vw;
  padding: 20px 80px;
  margin-left: 40%;
}
</style>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<div class="bodyx">
<form action="#"  method="post" >
    <div class="container-fluid">
        <div class="row">
            <div class="well center-block">
                <div class="well-header">
                    <h3 class="text-center text-success"> Register Here! </h3>
                    <hr>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </div>
                                <input type="text" placeholder="Username" name="username" class="form-control">
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </div>
                                <input type="password" placeholder="Password" name="pass" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </div>
                                <input type="password" placeholder="Re-type Password" name="repass" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-phone"></i>
                                </div>
                                <input type="text" class="form-control" name="cnumber" placeholder="Contact No.">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="E-Mail">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                </div>
                                <textarea class="form-control" name="address" placeholder="address"></textarea>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row widget">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <button  class="btn btn-warning btn-block" type="submit"> Submit </button>
                    </div> <br> <br>

                    <b style="margin-left:25%">Already Register, Sign In From Here</b>

                <div class="row widget">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <a href="signin.php">
                        <button type="button" class="btn btn-warning btn-block" style="width: 50%; margin-left: 25%; background-color: black;"> Sign in </button> </a>
                    </div> <br> <br>
                    <button type="reset" onclick="location.href='index.php'" class="backhome">Return Back Home</button>

                </div>
            </div>
        </div>
    </div>


</form>
</div>