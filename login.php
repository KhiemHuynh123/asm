<!DOCTYPE html>
  <?php
    SESSION_start();
    Ob_start();
  ?>
<html>
	<head>        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="viewport"
        content="width:device-width,initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"> </head>
<?php
include_once("connect.php");

if(isset($_POST['btnLogin'])){
	if(isset($_POST['txtPass'])&&isset($_POST['txtEmail'])){
		$pwd = $_POST['txtPass'];
		$email = $_POST['txtEmail'];
		$c = new Connect();
		$dblink = $c->connectToPDO();
		$sql = "SELECT * FROM user WHERE email = ? and password = ?";
		$stmt = $dblink->prepare($sql);
		$re = $stmt->execute(array("$email","$pwd"));
		$numrow = $stmt->rowCount();
		$row = $stmt->fetch(PDO::FETCH_BOTH);
		if ($numrow==1){
			echo "Login successfully"; 
			setcookie("cc_username",$row['fullname'],time()+3600);
			setcookie("cc_id",$row['id'],time()+3600);
			header("Location: index.php");
		} else{
			echo "Something wrong with your infomation <br>";
		}
	}else{
		echo "Please enter your information";
	}
}

if(isset($_POST['btnLogin'])){
	
}
/*
Put your code right here
1. Check if button 'btnLogin' is submitted, if it's true, go to 2.
2. Check if you get $_POST of input of email and input of password. if it's true, go to 3.
3. Connect to PDO
4. write a query to check from table 'Users' if user's email and user's password are both true.
5. Excute it.
6. Count row of result
7. Fetch data from result
8. save session 
9. Redirect to homepage.
*/
?>
<nav class= "container">
<div class="container">
        <h2 class="pt-3" >Please Login to Shopping</h2>
        <form id="form1" name="form1" method="POST" 
	action="login.php">
	<style>
div {
	
	color: #FF3333	;
	font-size: 30px;
}
</style>

	<div class="row">
		<div class="form-group">				    
			<label for="txtEmail" class="col-sm-2 control-label" style="font-size: 15px; margin:auto; text-align:center"> Email(*):  </label>
			<style> 
			div{
				color: #FF3333	;
				font-size: 30px;
			}
			</style>
			<div class="col-sm-10">
				<input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" value=""/>
			</div>
		</div>  
		
		<div class="form-group">
			<label for="txtPass" class="col-sm-2 control-label" style="font-size: 15px;text-align:center">Password(*):  </label>			
			<div class="col-sm-10">
					<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value=""/>
					
			</div>
		</div> 
	
		<div class="form-group pt-3"> 
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="btnLogin"  class="btn btn-primary" id="btnLogin" value="Login"/>
				<input type="reset" name="btnCancel"  class="btn btn-primary" id="btnCancel" value="Cancel"/>
			</div>  
		</div>
	</div>
		
	</form>
</div>
</html>
<a>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php
include_once 'footer.php';
?>
</a>

