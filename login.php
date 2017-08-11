<!DOCTYPE html>
<html lang="en">

<script>
        function cadastrar () {
            alert("nao é possivel se cadastrar assim");

        }</script>

<head>

	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
	<title>login</title>

</head>


    <body  background="juliaFOTO.jpg" >


	
	<div class="form-login">


		<form method="post" action="controlador_login.php?acao=login">
            <input type="text"     name="zuera" placeholder="Digite seu nome">
            <br />

			<input type="text"     name="login" placeholder="digite seu login ">
			<br />
			<input type="password" name="senha" placeholder="digite sua senha ">
			<br />
			<input type="submit"   name="login_form" value="logar" >

            <input type="submit"   name="cadastrar  " value="cadastrar" onclick="cadastrar()" >



		</form>

	</div>
	
</body>
</html>