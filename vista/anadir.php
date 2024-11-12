<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../resources/style.css">
</head>
<body>
    <div class="header">
        Añadir Producto
        <a href="compra.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
    <form action="../controlador/ControladorAnadir.php" method="post">
        <label for="nombre"></label>
        <input type="text" name="nombre" id="nombre">
        <label for="descripcion"></label>
        <input type="text" name="descripcion" id="descripcion">
        <label for="precio"></label>
        <input type="number" name="precio" id="precio">
        <input type="submit" value="Añadir">
    </form>
</body>
</html>
