<html id="z">
	<head>
	<style>
#img1{
  z-index: 3;
  animation: xfade 4s -0s infinite;
  animation-timing-function: ease-in-out;
  height:78%;
  width:100%;
}
@keyframes xfade{
     0% {opacity: 0;}
    20% {opacity: 1;}
    33% {opacity: 1;}
    53% {opacity: 1;}
    100% {opacity: 0;}

}
	html, body {margin: 0; height: 100%; overflow: hidden }
	* {margin:0 ;boder: 0; padding:0}
	</style>
		<title>Login</title>
		<meta name="description" content="website description" />
		<meta name="keywords" content="website keywords, website keywords" />
		<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
		<link rel="stylesheet" type="text/css" href="../style/styleLogin.css" title="style" />
		<script>
			function wrongpassword(){
					var myp=document.getElementById('xxx')
					myp.innerHTML ="Your password is incorrect.<br> If you don't remember your password, <br>"
					var ahref=document.createElement('a')
					ahref.href="../forgotpass/forgotpass.php"
					ahref.innerHTML="reset it now"
					myp.appendChild(ahref)
					myp.innerHTML +="."	
			}
			function accountdoesnotexist(){
					var myp=document.getElementById('xxx')
					myp.innerHTML ="This account doesn't exist.<br> Enter a different account or "
					var ahref=document.createElement('a')
					ahref.href="../signup/signup.php"
					ahref.innerHTML="get a new one"
					myp.appendChild(ahref)
					myp.innerHTML +="."
			}
			function adminPassword() {
				var aLink = document.getElementById("aLink");
				var pass = prompt("Enter the Admin Password to Continue:");
				if (pass == "abc123") {
					aLink.href = "../admin/viewFac.php";
				} else if(pass == null || pass == "") {
					return;
				} else {
					alert("Icorrect Password! Try again!");
				}
			}
		</script>
	</head>
	<?php 
	include 'initSessionId.php';
	?>
	<body style="margin: 0px;height:100%;width:100%">
		<?php
			if(isset($_POST['logout'])) {
				$idsent->id=0;
				$idsent->functionn="empty";
			}
			else{
				if($idsent->id!=0){
					if($idsent->functionn=="pr"){
					header('Location:../prof/prof_upload_files.php');}
					else
					if($idsent->functionn=="st"){
					header('Location:../std/std_view_files.php');}
				}
			}
				
		?>
		<div id="a">
			<text id="b" style="line-height:2em;">All You Need In One Place</text>
			<a id="aLink" href=""><img id="adminImg" onclick="adminPassword()" style="margin-left:895px;margin-top:10px" src="../style/admin.ico"></a>
		</div>
		<form id="c" name="bata" method="post">
			<table id="d">
				<tr id="e" >
					<td id="f">
					<img id="img1" src="../style/1.jpg" />
					</td>
					<td id="h">
						<span id="i"><span id="j" >Login To Continue</span><br>
							<p id="xxx" style="font-size:small;color:red;font-weight:normal;margin-top:20px;"></p><br>
						</span>
						<input required placeholder="Email" name="email" type="text" id="k" style="padding-left:10px"><br>
						<input required placeholder="Password" name="password" type="password" id="l" style="padding-left:10px"><br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span id="o" >
							<a style="text-decoration:none;color:orange" href="../forgotpass/forgotpass.php">Forgot Password?</a>
						</span><br><br>
						<input type="submit" name="submitt" value="Login" id="p"><br><br>
						<span id="r">
							<a style="text-decoration:none;color:orange" href="../signup/signup.php">or Sign Up</a>
						</span>
						<br><br><br><br>
					</td>
				</tr>
			</table>
			<div id="q">© 2019–2020. Web development by PHP.</div>

		<?php 
			include 'initConnection.php';
			if(isset($_POST['submitt'])){	
				$email=$_POST['email'];
				$password=$_POST['password'];
				$query = 'select * from user where email="'.$email.'";';
				$result = mysqli_query($con, $query);
				$nbrow=mysqli_num_rows($result);
				if($nbrow==0){
			?>
					<script type="text/javascript">
					accountdoesnotexist();
					</script>
					<?php
				}
				else{
					$query = 'select * from user where email="'.$email.'" and password="'.$password.'";';
					$result = mysqli_query($con, $query);
					$nbrow=mysqli_num_rows($result);
					if($nbrow==0){
					?>
						<script type="text/javascript">
							wrongpassword();
						</script>
					<?php
					}
					else{
						$query='select idUser,function from user where email="'.$email.'" and password="'.$password.'";';
						$result = mysqli_query($con, $query);
						$nbrow=mysqli_num_rows($result);
						if($nbrow==1){
							$line = mysqli_fetch_array($result, MYSQLI_ASSOC);
							$idUser=$line['idUser'];
							$function=$line['function'];
							if($function=='pr'){
								$idsent->id=$idUser;
								$idsent->functionn="pr";
							echo '
								<script>
								document.getElementById("c").action="../prof/prof_upload_files.php";
								var oForm = document.forms["bata"];
								oForm.submit();
								</script>';
							}
							else 
							if($function=='st'){
									$idsent->id=$idUser;
									$idsent->functionn="st";
							echo '
								<script>
								document.getElementById("c").action="../std/std_view_files.php";
								var oForm = document.forms["bata"];
								oForm.submit();
								</script>';	
							}
						}
					}
				}
			}
	?>
			</form>
			<script>
			var images = ["../style/2.jpg","../style/33.jpg","../style/4.jpg","../style/5.jpg","../style/1.jpg"];
			var i = 0;
			var renew = setInterval(function(){
            if(i == 5){
                i = 0;
            }
            document.getElementById("img1").src = images[i]; 
            i++;
			},4000);
			
			
			
			
			
			
			</script>
	</body>
</html>