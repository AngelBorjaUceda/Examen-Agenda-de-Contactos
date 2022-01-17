<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAMEN ÁNGEL BORJA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .table{
        width: 200px;
    }
</style>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
    </tr>
  </thead>
  <tbody>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->

    <?php
        $archivo = "agenda.csv";

        
        
        $fp = fopen($archivo, "r");
        while (!feof($fp)){
            echo "<tr>";
            
            $contador = 0;
            while($contador<4){
                $linea = fgets($fp);
                echo "<td>{$linea}</td>";
                $contador++;
            }
           
            
           echo "</tr>";
      
}
fclose($fp);


    ?>
  </tbody>
</table>
    <form action="index.php" method="get">
  <div class="form-group">
    <label>Nombre:</label>
    <input type="text" class="form-control" type="text" name="nombre" placeholder="Introduzca su nombre">
  </div>
  <div class="form-group">
    <label>Apellidos:</label>
    <input type="text" class="form-control"type="text" name="apellidos" placeholder="Introduzca sus apellidos">
  </div>
  <div class="form-group">
    <label>Correo:</label>
    <input type="email" class="form-control" type="text" name="correo"placeholder="Introduzca su correo">
  </div>
  <div class="form-group">
    <label>Telefono:</label>
    <input type="text" class="form-control" type="text" name="telefono" placeholder="Introduzca su telefono">
  </div>
  <button type="submit" class="btn btn-primary" value="Guardar" name="ok">Enviar</button>
</form>

    <?php
    if(isset($_GET["ok"])){
        $archivo = "agenda.csv";
        $gestor = fopen($archivo, "a+");

        //Para que no se envien datos vacios
        if(empty($_GET["nombre"])||empty($_GET["apellidos"])||empty($_GET["correo"])||empty($_GET["telefono"])){
            echo "Algún campo está vacio.";
        }else{
            fwrite($gestor, $_GET["nombre"]);
            fwrite($gestor, "\n");
            fwrite($gestor, $_GET["apellidos"]);
            fwrite($gestor, "\n");
            fwrite($gestor, $_GET["correo"]);
            fwrite($gestor, "\n");
            fwrite($gestor, $_GET["telefono"]);
            fwrite($gestor, "\n");
        }
        fclose($gestor);
    }
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>