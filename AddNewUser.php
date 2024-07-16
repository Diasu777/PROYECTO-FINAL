<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h3 {
            color: #007bff;
        }

        label {
            color: #007bff;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 4px 0;
            display: inline-block;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        center {
            text-align: center;
        }
    </style>
</head>
<body >
   <?php
    if (isset($_POST['Enviar'])) {
        
        if (empty($_POST['Nombre']) || empty($_POST['Ap_Paterno']) 
            || empty($_POST['Ap_Materno'])|| empty($_POST['Direccion']) 
            || empty($_POST['Telefono'])|| empty($_POST['email'])
            || empty($_POST['RFC'])|| empty($_POST['pass']) ) {
            echo "<script language='JavaScript'>
            alert('Ingresa un dato valido')
            location.assign('AddNewUser.php');
            </script>";

     } else{
        $Nombre=$_POST['Nombre'];
		$Ap_Paterno=$_POST['Ap_Paterno'];
		$Ap_Materno=$_POST['Ap_Materno'];
		$Direccion=$_POST['Direccion'];
		$Telefono=$_POST['Telefono'];
		$email=$_POST['email'];
		$RFC=$_POST['RFC'];
		$pass=$_POST['pass'];
        include("acceso_bd.php");

        // $sql="insert into alumnos (Id_CURP,Ap_Paterno,Ap_Materno,Nombre,Genero,Grupo) values ('".$Id."','".$Ap."','".$Am."','".$N."','".$Genero."','".$Grupo."')";
        $sql="insert into usuario (Nombre, Ap_Paterno, Ap_Materno, Direccion, Telefono, email, RFC, Privilegio, pass) VALUES ('$Nombre', '$Ap_Paterno', '$Ap_Materno', '$Direccion', '$Telefono', '$email', '$RFC', 'usuario', '$pass')";
        $resultado=mysqli_query($conexion,$sql);
        if ($resultado==true) {
            echo "<script language='JavaScript'>
            alert('Se ha agregado usuario correctamente')
            location.assign(history.back());
            </script>";
        }else{
            echo "<script language='JavaScript'>
            alert('No existe el nombre o password en la BD')
            location.assign('index.php');
            </script>";
        }
     }

     }else{
    ?>

        <div class="container">
        <div class="text-center">
            <h3>Datos de usuario</h3>
        </div>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name="Nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="Ap_Paterno">Apellido Paterno</label>
                <input type="text" class="form-control" name="Ap_Paterno" placeholder="Apellido Paterno" required>
            </div>
            <div class="form-group">
                <label for="Ap_Materno">Apellido Materno</label>
                <input type="text" class="form-control" name="Ap_Materno" placeholder="Apellido Materno" required>
            </div>
            <div class="form-group">
                <label for="Direccion">Dirección</label>
                <input type="text" class="form-control" name="Direccion" placeholder="Dirección" required>
            </div>
            <div class="form-group">
                <label for="Telefono">Teléfono</label>
                <input type="text" class="form-control" name="Telefono" placeholder="Teléfono" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="text" class="form-control" name="email" placeholder="Correo Electrónico" required>
            </div>
            <div class="form-group">
                <label for="RFC">RFC/CURP</label>
                <input type="text" class="form-control" name="RFC" placeholder="RFC/CURP" required>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" name="Enviar" value="AGREGAR">
            </div>
        </form>
    </div>
<?php 
}
?>
</body>
</html>
