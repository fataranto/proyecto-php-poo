<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de camisetas</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <div id="container">
    <!-- cabecera -->
    <header id="header">
      <div id="logo">
        <img src="assets/img/camiseta.png" alt="Camiseta logo" />
        <a href="index.php">
          Tienda de camisetas
        </a>
      </div>
    </header>
    <!-- menú -->
    <nav id="menu">
      <ul>
        <li>
          <a href="#">Inicio</a>
        </li>
        <li>
          <a href="#">Categoría x</a>
        </li>
        <li>
          <a href="#">Categoría x</a>
        </li>
        <li>
          <a href="#">Categoría x</a>
        </li>
        <li>
          <a href="#">Categoría x</a>
        </li>
        <li>
          <a href="#">Categoría x</a>
        </li>
      </ul>
    </nav>
    <div id="content">
      <!-- barra lateral -->
      <aside id="lateral">
        
        <div id="login" class="block_aside">
        <h3>Entrar a la web</h3>
          <form action="#" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="">
            <input type="submit" value="Enviar">
          </form>
          <ul>
            <li><a href="#">Mis pedidos</a></li>
            <li><a href="#">Gestionar pedidos</a></li>
            <li><a href="#">Gestionar categorías</a></li>
</ul>
        </div>
      </aside>
      <!-- contenido central -->
      <div id="central">
        <h1>Productos destacados</h1>
        <div class="product">
          <img src="assets/img/camiseta.png" alt="Camiseta producto" />
          <h2>Camiseta azul ancha</h2>
          <p>30 euros</p>
          <a href="" class="button">Comprar</a>
        </div>
        <div class="product">
          <img src="assets/img/camiseta.png" alt="Camiseta producto" />
          <h2>Camiseta azul ancha</h2>
          <p>30 euros</p>
          <a href="" class="button">Comprar</a>
        </div>
        <div class="product">
          <img src="assets/img/camiseta.png" alt="Camiseta producto" />
          <h2>Camiseta azul ancha</h2>
          <p>30 euros</p>
          <a href="" class="button">Comprar</a>
        </div>
      </div>
    </div>
    <!-- pie de página -->
    <footer id="footer">
      <p>Desarrollado por Fabian &copy; <?=date('Y')?></p>
    </footer>
  </div>
  
</body>
</html>