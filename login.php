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

            $nombre = "";
            $password = "";
            $email = "";
            $pais = "";
            $nivel = "";
            $lenguajes = array();

            if(isset($_POST['nombre'])){
                $nombre = $_POST['nombre'];
                $email = $_POST['user'];
                $password = $_POST['password'];
                $pais = $_POST['pais'];
            
            if(isset($_POST['nivel'])){
                $nivel = $_POST['nivel'];
            }else{
                $nivel = "";
            }

            if(isset($_POST['lenguajes'])){
                $lenguajes = $_POST['lenguajes'];
            }else{
                $lenguajes = [];
            }

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

            if($pais == ""){
                array_push($campos, "Selecciona un país de la lista");
            }

            if($nivel == ""){
                array_push($campos, "Selecciona un nivel de desarrollo");
            }

            if($lenguajes == "" || count($lenguajes) < 2){
                array_push($campos, "Selecciona al menos dos (2) lenguajes de programación");
            }

            if(count($campos) > 0){
                echo "<div class='error'>";
                for($i = 0; $i < count($campos);$i++){
                echo "<li>".$campos[$i]."</li>";
            }
            }else{
                echo "<div class='correcto'>Datos enviados correctamente";
            }
            echo "</div>";
            }
            ?>


            <h2>LOGIN</h2>
            <div>
                <input type="text" name="nombre" placeholder="Nombre completo" value="<?php echo $nombre; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="user" placeholder="Nombre de usuario" value="<?php echo $email; ?>">
            </div>
            <br>
            <div>
                <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
            </div>

            <div>
                <h5>País de Origen: </h5>
                <select name="pais" id="">
                    <option value="">Selecciona un país...</option>
                    <option value="col" <?php if($pais == "col") echo "selected" ?>>Colombia</option>
                    <option value="chi" <?php if($pais == "chi") echo "selected" ?>>Chile</option>
                    <option value="ned" <?php if($pais == "ned") echo "selected" ?>>Holanda</option>
                    <option value="esp" <?php if($pais == "esp") echo "selected" ?>>España</option>
                    <option value="jap" <?php if($pais == "jap") echo "selected" ?>>Japón</option>
                    <option value="arg" <?php if($pais == "arg") echo "selected" ?>>Argentina</option>
                </select>
            </div>
            <br>

            <div>
                <h5>Nivel de desarrollador:</h5>
                <input type="radio" name="nivel" value="entry_level"
                    <?php if($nivel == "entry_level") echo "checked"; ?>>Entry level
                <input type="radio" name="nivel" value="junior" <?php if($nivel == "junior") echo "checked"; ?>>Junior
                <input type="radio" name="nivel" value="senior" <?php if($nivel == "senior") echo "checked"; ?>>Senior
                <input type="radio" name="nivel" value="arquitect"
                    <?php if($nivel == "arquitect") echo "checked"; ?>>Arquitecto
            </div>
            <br>

            <div>
                <h5>Lenguajes de programación:</h5>
                <input type="checkbox" name="lenguajes[]" value="js" <?php if(in_array("js", $lenguajes)) echo "checked"; ?>>JavaScript<br>
                <input type="checkbox" name="lenguajes[]" value="php" <?php if(in_array("php", $lenguajes)) echo "checked"; ?>>PHP<br>
                <input type="checkbox" name="lenguajes[]" value="java" <?php if(in_array("java", $lenguajes)) echo "checked"; ?>>Java<br>
                <input type="checkbox" name="lenguajes[]" value="dart" <?php if(in_array("dart", $lenguajes)) echo "checked"; ?>>Dart<br>
                <input type="checkbox" name="lenguajes[]" value="c" <?php if(in_array("c", $lenguajes)) echo "checked"; ?>>C<br>
            </div>
            <br>

            <div>
                <input id="submit" type="submit" value="Enviar datos">
            </div>
        </form>
    </div>
</body>

</html>