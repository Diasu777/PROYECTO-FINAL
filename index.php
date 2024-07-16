<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="https://unpkg.com/ionicons@5.0.0/dist/css/ionicons.min.css" rel="stylesheet" />
    <style>
        @font-face {
            font-family: 'Dolce';
            src: url(/fonts/Dolce-Vita.ttf);
            font-style: normal;
            font-weight: normal;
        }

        @import url('https://fonts.googleapis.com/css2?family=Cinzel&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-image: url('Fondo6.gif');
            background-size: cover;
            text-align: center;
            font-size: 25px;
            color: #000000;
            font-family: 'Constantia', sans-serif;
            margin: 0;
            padding: 0;
        }

        .principal {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
            background: url("assets/img/Background Login.avif") no-repeat;
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .bubbles {
            position: relative;
            display: flex;
        }

        .bubbles span {
            position: relative;
            width: 30px;
            height: 30px;
            background: #4fc3dc;
            margin: 0 4px;
            border-radius: 50%;
            box-shadow: 0 0 0 10px #4fc3dc44, 0 0 50px #4fc3dc, 0 0 100px #4fc3dc;
            animation: animate 15s linear infinite;
            animation-duration: calc(125s / var(--i));
        }

        .bubbles span:nth-child(even) {
            background-color: beige;
            box-shadow: 0 0 0 10px rgb(178, 179, 177), 0 0 50px beige, 0 0 100px beige;
        }

        @keyframes animate {
            0% {
                transform: translateY(100vh) scale(0);
            }

            100% {
                transform: translateY(-10vh) scale(1);
            }
        }

        .login {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            margin: 100px auto;
            position: relative;
            width: 400px;
            height: 450px;
            background-color: rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            font-size: 2em;
            font-family: 'Dolce', serif;
            color: rgb(121, 206, 179);
            text-align: center;
        }

        .caja {
            position: relative;
            width: 310px;
            margin: 30px 0;
            border-bottom: 1px solid #fff;
            font-family: 'Cinzel', serif;
            color: azure
        }

        .caja input:focus~label.caja,
        .caja input:valid~label {
            top: -5px;
        }

        .caja input {
            width: 100%;
            height: 50%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: #fff;
            padding: 0 35px 0 5px;
        }

        .caja label {
            position: absolute;
            top: 50%;
            left: 2%;
            transform: translateY(-50%);
            font-size: 1em;
            pointer-events: none;
            transition: 0.5s;
        }

        .caja .icono {
            position: absolute;
            right: 8px;
            top: 50%;
            color: #fff;
            transform: translateY(-50%);
        }

        .recordar {
            margin: -15px 0 15px;
            font-size: 0.9em;
            color: #fff;
            display: flex;
            justify-content: space-between;
        }

        .recordar label input {
            margin-right: 3px;
        }

        .recordar a {
            color: #fff;
            text-decoration: none;
        }

        .recordar a:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            height: 40px;
            background-color: #fff;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 1em;
            color: #000;
            font-weight: 500;
        }

        button2 {
            font-size: 2em;
            font-family: 'Dolce', serif;
            color: rgb(121, 206, 179);
            text-align: center;
        }

        .registro {
            font-size: 0.9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }

        .registro p a {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }

        .registro p a:hover {
            text-decoration: underline;
        }

        @media (max-width: 500px) {
            .login {
                width: 100%;
                height: 100vh;
                border: none;
                border-radius: 0;
            }
        }

        .caja {
            width: 290px;
        }
    </style>
</head>

<body class="bg-primary">
    <?php
    if (isset($_POST['enviar'])) {

        if (empty($_POST['nombre']) || empty($_POST['pass'])) {
            echo "<script language='JavaScript'>
                alert('Ingresa un dato valido')
                location.assign('index.php');
                </script>";
        } else {
            $nom = $_POST['nombre'];
            $password = $_POST['pass'];
            $privilegio = "";
            include("acceso_bd.php");
            $sql = "select * from usuario where Nombre='" . $nom . "' and pass ='" . $password . "' ";
            $resultado = mysqli_query($conexion, $sql);

            if ($fila = mysqli_fetch_assoc($resultado)) {

                $privilegio = $fila['Privilegio'];
                $_SESSION['Nombre'] = $nom;
                $_SESSION['Privilegio'] = $privilegio;
                $_SESSION['ID'] = $fila['ID'];

                if ($privilegio == "usuario") {
                    echo "<script language='JavaScript'>
                alert('Bienvenido " . $nom . "  !!!');
                location.assign('Portada.html');
                </script>";
                } 
            } else {
                echo "<script language='JavaScript'>
                alert('No existe el nombre o password en la BD')
                location.assign('index.php');
                </script>";
            }
        }
    } else {
    ?>
        <!-- Empieza el formulario  -->
        <div class="principal">
            
            
            <div class="bubbles">
                <span style="--i:11"></span>
                <span style="--i:12"></span>
                <span style="--i:24"></span>
                <span style="--i:10"></span>
                <span style="--i:14"></span>
                <span style="--i:23"></span>
                <span style="--i:18"></span>
                <span style="--i:16"></span>
                <span style="--i:19"></span>
                <span style="--i:20"></span>
                <span style="--i:22"></span>
                <span style="--i:25"></span>
                <span style="--i:18"></span>
                <span style="--i:21"></span>
                <span style="--i:15"></span>
                <span style="--i:13"></span>
                <span style="--i:26"></span>
                <span style="--i:17"></span>
                <span style="--i:13"></span>
                <span style="--i:18"></span>
                

                <div class="login">
                    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <h2>Inicio De Sesión</h2>

                        <div class="caja">
                            <span class="icono">
                                <ion-icon name="codigo"></ion-icon>
                            </span>
                            <input type="text" name="nombre" required />
                            <label>Nombre de usuario</label>
                        </div>

                        <div class="caja">
                            <span class="icono">
                                <ion-icon name="lock-closed"></ion-icon>
                            </span>
                            <input type="password" name="pass" required />
                            <label>Contraseña</label>
                        </div>

                        <div class="recordar">
                            <label><input type="checkbox" /> Recordar</label>
                            <a href="">¿Olvidaste tu contraseña?</a>
                        </div>

                        <button type="submit" name="enviar">Iniciar</button>

                        <div class="registro">
                            <p>¿Aún no tienes cuenta? <a href="AddNewUser.php">Regístrate</a></p>
                            <br>
                            <p><button2 type="submit" onclick="window.location.assign('Portada.html')">Inicio</button2></p>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>

    </html>
<?php
    }
?>

