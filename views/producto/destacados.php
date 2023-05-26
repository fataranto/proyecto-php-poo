<h1>Algunos de nuestros productos</h1>

<?php while($producto = $productos->fetch_object()): ?>


        <div class="product">
          <?php if($producto->imagen != null): ?>

          <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="<?=$producto->nombre?>" />

          <?php else: ?>

          <img src="<?=base_url?>assets/img/camiseta.png" alt="<?=$producto->nombre?>" />

          <?php endif; ?>
          
          <h2><?=$producto->nombre?></h2>
          <p><?=$producto->precio?> euros</p>
          <a href="" class="button">Comprar</a>
        </div>

<?php endwhile; ?>



      </div>