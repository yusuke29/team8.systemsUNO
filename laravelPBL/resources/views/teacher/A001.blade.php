<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="login.css" media="all" />
</head>
<body>
<div id="form">
    <p class="form-title">教師用</p>
    <form action="" method="post">

        <p>ID</p>
        <p class="mail"><input type="text" name="mail" id ="ID" /></p>
        <p>Password</p>
        <p class="pass"><input type="text" name="password" id = "pass"/></p>

        <a href ="#"><button type="button" onclick="login();" class='btn-square'id="button">login</button></a>
    </form>
</body>

<script>

function login(){

    var id =  document.getElementById("ID").value;
    var pass =  document.getElementById("pass").value;

    if(id == 111 && pass == 222){

    window.location.href ='http://localhost/team8.systemsUNO/laravelPBL/public/A002';
 }else{
     alert('再度やり直してください')
 }
 
}
</script>
<style>
body,p,form,input{margin: 0}
#form{
  width: 500px;
  margin: 30px auto;
  padding: 70px;
  border: 1px solid #555;
  }

form p{
    font-size: 19px;
    }

.form-title{
  text-align: center;
  }

.text.pass{
  margin-bottom: 26px;
  }

input[type="text"],
input[type="password"] {
  width: 450px;
  padding: 7px;
  font-size: 20px;
  }

.btn-square{
    position: absolute;
    padding: 0.5em 1em;
    text-decoration: none;
    background: #668ad8;/*ボタン色*/
    color: #FFF;
    border-bottom: solid 4px #627295;
    border-radius: 4px;
    top: 350px;
    left: 620px;
}

/* font */
#form p{
  color: #077685;
  font-weight: bold;
  }

#form .form-title{
  font-family: Arial;
  font-size: 35px;
  color: #4eb4c2;
  }

/* skin */
#form{
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
  -webkit-box-shadow: 0px 1px 10px #488a9e;
  -moz-box-shadow: 0px 1px 10px #488a9e;
  box-shadow: 0px 1px 10px #488a9e;
  border: solid #4eb4c2 1px;
  background: #fafafa;
  }

#form .form-title{
  padding-bottom: 6px;
  border-bottom: 2px solid #4eb4c2;
  margin-bottom: 20px;
  }

.button input{
  font-family: Arial;
  color: #ffffff;
  font-size: 25px;
  padding-top: 10px;
  padding-right: 20px;
  padding-bottom: 10px;
  padding-left: 20px;
  text-decoration: none;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  -webkit-box-shadow: 0px 8px 6px #e3e3e3;
  -moz-box-shadow: 0px 8px 6px #e3e3e3;
  box-shadow: 0px 8px 6px #e3e3e3;
  border: solid #f5fdff 4px;
  background: -webkit-gradient(linear, 0 0, 0 100%, from(#61c7e0), to(#418da8));
  background: -moz-linear-gradient(top, #61c7e0, #418da8);
  }
.button input:hover{
  background: #37a4bf;
}
</style>
</html>
