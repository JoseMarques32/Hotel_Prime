<?php

    use reservadatabase\Database;

    require_once('header.php');

    /// Incluindo os arquivos necessários

    require_once('config.php');
    require_once('Database/database.php');

    $database = new Database(MYSQL_CONFIG);

    
    

?>

<div class="container-fluid d-flex align-items-center border border-dark mt-3 p-4 shadow p-3 mb-5 bg-white rounded" style="min-height: 75vh;">
    <div class="col text-start ">
      <!-- Primeiro Elemento -->
      <h1 class="mb-4">Os Melhores Serviços De Hospedagem</h1>
      <h4 class="mb-5">A Estrutura Perfeita</h4>
      <p>Descubra o equilíbrio perfeito entre design contemporâneo e 
        tradição, enquanto desfruta de acomodações sofisticadas e 
        amenidades de classe mundial. 
        
      </p>
      <a class="btn btn-outline-dark" href="AdicionarReserva.php" >Faça Já Sua Reserva</a>
    </div>

    <div class="col justify-content-center">
          <img src="/Assets/imgs/foto-layout.avif" class="img-fluid mt-5" style="height: 60vh;" alt="Imagem">
    </div>
  </div>


  <?php
    require_once('footer.php');
?>