<?php
require_once 'config.php';
if(isset($_POST['username']) && isset($_POST['password'])){
    if ($_POST['username'] == $username){
        if (md5($_POST['password']) == $password){
            if(isset($_POST['remember'])){
                setcookie("login", md5($username.$password), time()+2592000);
                header("Location: index.php");
            }
            else {
                setcookie("login", md5($username.$password), time()+3600);
                header("Location: index.php");
            }
        }
        else {
            header("Location: login.php?login_error=1");
        }
    }
    else {
        header("Location: login.php?login_error=1");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
 <style type="text/css" media="screen">
body {
    font-family: Helvetica, Arial, sans-serif;
    text-align: center;
    background: #404040;
  }
input {
  height: 25px;
  line-height: 23px;
  font-size: 21px;
}
#btn{
    background: #222 url('http://www.zurb.com/images/alert-overlay.png') repeat-x;
    display: inline-block;
    padding: 5px 10px 6px;
    color: #f5f5f5;
    text-decoration: none;
    font-weight: bold;
    line-height: 1;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    position: relative;
    cursor: pointer;
    text-shadow: 0 -1px 1px transparent;
    -webkit-transition-duration: 0.4s;
    margin-top: 15px;
    border: none;
    font-size: 90%;
    margin-left: 100px;
    background-color: #50A92D;
    margin-left: 10px;
  }
#btn:hover {
    -moz-box-shadow: 0 0px 10px #50A92D;
    -webkit-transition-duration: 0.4s;
    -webkit-box-shadow: 0 0px 10px #50A92D;
    text-shadow: 0 0px 3px white;
  }
#container {
  margin: 0 auto;
  margin-top: 200px;
  width: 300px;
  height: 200px;
  color: #404040;
  padding: 8px;
  background:#f5f5f5;
  background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#CCC));
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  -moz-box-shadow: 0 0px 10px #ccc;
  -webkit-box-shadow: 0 0px 10px #ccc;
}
form {
  margin-bottom: 25px;
}
#user {
    margin-bottom: 7px;
}
#pass {
    margin-left: -2px;
}
</style>
  <title>Dot Login</title>
<?php
if(isSet($_GET['login_error'])) {echo '<div id="error_notification" style="position: fixed; top: 0px; width: 110%;margin-left: -50px; background-color: red; text-align: center; color: white;">The submitted login info is incorrect.</div>';}
?>
<script type="text/javascript">
    //<![CDATA[
        function placeholder(id){
            document.getElementById(id).setAttribute("style", "color: #000;");
        }
    //]]>
</script>
</head>
<body>
<div id="container">
<h2>Dot Login</h2>
<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
<input style="color: #ccc;" id="user" onclick='setAttribute("value", "");setAttribute("style", "color: #000;");' type="text" title="Enter your Username" name="username" value="username"/>
<input style="color: #ccc;" id="pass" type="password" onclick='setAttribute("value", "");setAttribute("style", "color: #000;");' title="Enter your password" name="password" value="password"/> 
<p><input style="margin-left: 65px;margin-top: 16px;position: absolute;" type="checkbox" name="remember" value="1"><span style="font-size: 0.7em;margin-left: 5px;">Remember Me</span></input>
<input type="submit" name="submit" id="btn" value="Login" /> </p>
</form> 
</div>
</body>
</html>