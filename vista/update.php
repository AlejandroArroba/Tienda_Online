<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../resources/style.css">
</head>
<body>
    <div class="header">
        <a href="index.php" class="house-icon"><i class="fa-solid fa-house"></i></a>
        Actualizar Producto
        <a href="compra.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
    <form action="../controlador/ControladorUpdate.php" method="post" enctype="multipart/form-data">
        <label for="id">ID:</label>
        <input type="number" name="id" id="id">
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion">
        <br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio">
        <br>
        <input type="submit" value="Añadir">
    </form>
</body>
</html>