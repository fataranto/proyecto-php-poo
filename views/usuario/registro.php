
<h1>Registrarse</h1>

 <?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
 <strong class="alert_green">Registro completado correctamente</strong>
 <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
 <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
 <?php endif; ?>
 <?php Utils::deleteSession('register');?>


<form action="<?=base_url?>usuario/save" method="post">
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="" required>

  <label for="nombre">Apellidos</label>
  <input type="text" name="apellidos" id="" required>

  <label for="nombre">Email</label>
  <input type="email" name="email" id="" required>

  <label for="nombre">Contraseña</label>
  <input type="password" name="password" id="" required>

  <input type="submit" value="Registrarse">
</form>