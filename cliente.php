<?php
require_once('lib/nusoap.php');
$cliente = new nusoap_client('http://localhost/calculadora/servicio.php');

include('calculadora.php');
if (isset($_REQUEST['calcular']) && isset($_POST['numero1']) && !empty($_POST['numero1']) && isset($_POST['numero2']) && !empty($_POST['numero2'])) {
  $x = $_REQUEST['numero1'];
  $y = $_REQUEST['numero2'];
  $operacion = $_REQUEST['opciones'];

  $resultado = $cliente->call(
    'calculadora',
    array($x, $y, $operacion)
  );
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
  <title>Calculadora</title>
</head>
<body>
  <div class="contenedor">
    <div class="calculadora">
      <div class="formulario">
        <div class="titulo">
          <h1>Calculadora</h1>
        </div>
        <form method="post" action="cliente.php">
          Numero1: <input type="text" name="numero1" autocomplete="off">
          Numero2: <input type="text" name="numero2" autocomplete="off">          
          Operación: <select name="opciones">
            <option value="+">sumar</option>
            <option value="-">restar</option>
            <option value="*">multiplicar</option>
            <option value="/">dividir</option>
          </select><br>
          <?php
            if (isset($resultado)) {
              echo "<br>El resultado es: <br> <input type='text' style='margin-bottom: -1px;' value='$x $operacion $y = $resultado'>";
            }
          ?>
          <input type="submit" name="calcular" value="Calcular" class="calcular">
        </form>
      </div>
    </div>
  </div>
</body>

</html>