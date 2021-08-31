<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>
<div id="contenedor">
<aside id="sidebar">
  
<?php if(isset($_SESSION['error-login'])): ?>
<div id="error" class="bloque">
<?php echo "Error ".$_SESSION['error-login'];?>
</div>
<?php endif; ?>

<?php if(isset($_SESSION['usuarios'])): ?>
<div id="error" class="bloque">
<?php echo "Bienvenido ".$_SESSION['usuarios']['nombre'];?>
</div>
<?php endif; ?>

      <div id="login" class="bloque">
        <h3>Logeate</h3>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password">

            <input type="submit" value="Logearte">
            
        </form>
      </div>

      <div id="register" class="bloque">
        <h3>Identificate</h3>
    <!-- Mostrar Errores -->
        <?php if (isset($_SESSION['completado'])): ?>
          <div class="alerta alerta-exito"> 
            <?php echo $_SESSION['completado']; ?>
          </div>
          <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-exito"> 
            <?php echo $_SESSION['errores']['general']; ?>
          </div>
            <?php endif; ?> 
            
        <form action="registro.php" method="POST">
          
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="">
            <div class="alerta-error"> 
            <?php if (isset($_SESSION['errores'])) echo mostrarError($_SESSION['errores'],'nombre') ?>
            <?//php if (error()==false) echo mostrarError2('nombre'); ?>
            </div>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="">
            <div class="alerta-error"> 
            <?php if (isset($_SESSION['errores'])) echo mostrarError($_SESSION['errores'],'apellido') ?>
            </div>
            <label for="email">Email</label>
            <input type="email" name="email">
            <div class="alerta-error"> 
            <?php if (isset($_SESSION['errores'])) echo mostrarError($_SESSION['errores'],'correo') ?>
            </div>
            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <div class="alerta-error"> 
            <?php if (isset($_SESSION['errores'])) echo mostrarError($_SESSION['errores'],'password') ?>
              </div>
            <input type="submit" name="submit" value="Registrarse">
        </form>
        
        <?php borrarErrores(); ?>
      </div>
  </aside>