<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div>
        <form action="login.php" method="POST">
            <?php

            if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $email = $_POST['user'];
            $password = $_POST['password'];

            $campos = array();

            if($nombre == ""){
                array_push($campos, "Nombre no puede estar vacío");
            }

            if($password == "" || strlen($password) < 6){
                array_push($campos, "Password no puede estar vacío ni tener menos de 6 caracteres");
            }

            if($email == "" || strpos($email,"@") === false){
                array_push($campos, "Debes ingresar un correo electrónico válido");
            }

            if(count($campos) > 0){
                echo "<div class='error'>";
                for($i = 0; $i < count($campos);$i++){
                echo "<li>".$campos[$i]."</li>";
            }
            }else{
                echo "<div class='correcto'>Datos correctos";
            }
            echo "</div>";
            }
            ?>


            <h2>LOGIN</h2>
            <div>
                <input type="text" name="nombre" placeholder="Nombre completo">
            </div>
            <br>
            <div>
                <input type="text" name="user" placeholder="Nombre de usuario">
            </div>
            <br>
            <div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <br>
            <div>
                <input id="submit" type="submit" value="Enviar datos">
            </div>
        </form>
    </div>
</body>

</html>