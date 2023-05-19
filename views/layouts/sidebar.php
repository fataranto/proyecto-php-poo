 <!-- barra lateral -->
 <aside id="lateral">
        
        <div id="login" class="block_aside">
        <!-- si no existe la sesión "identity" muestro el formulario-->
        <?php if(!isset($_SESSION['identity'])): ?>

        <h3>Entrar a la web</h3>
          <form action="<?=base_url?>usuario/login" method="post">

            <label for="email">Email</label>
            <input type="email" name="email" id="">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="">
            <input type="submit" value="Enviar">
          </form>
        <!-- si existe la sesión "identity" muestro el nombre y apellidos del usuario-->
        <?php else: ?>
          <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
        <?php endif; ?>
          <ul>
            <li><a href="#">Mis pedidos</a></li>
            <li><a href="#">Gestionar pedidos</a></li>
            <li><a href="#">Gestionar categorías</a></li>
            <li><a href="<?=base_url?>usuario/logout">Cerrar sesión</a></li>
</ul>
        </div>
      </aside>
      <!-- contenido central -->
      <div id="central">      