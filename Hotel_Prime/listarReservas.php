<?php
require_once('header.php');

use reservadatabase\Database;
/// Arquivos Necessários
require_once('config.php');
require_once('Database/database.php');

$reservas = null;
$total_reservas = 0;
$busca = null;
$database = new Database(MYSQL_CONFIG);

/// Buscar algum Post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $busca = $_POST['buscar_reserva'];

    $parametros = [
        ':busca' => $busca
    ];


    $results = $database->execute_query("SELECT * from clientes WHERE cpf LIKE :busca ORDER BY id DESC", $parametros);
    $reservas = $results->results;
    $total_reservas = $results->affected_rows;
}



?>

<div class="col">

    <form action="listarReservas.php" method="post">
        <div class="row">
            <div class="col-auto"><input type="text" class="form-control" name="buscar_reserva" id="buscar_reserva" placeholder="Insira seu CPF" required></div>
            <div class="col-auto"><input type="submit" class="btn btn-outline-dark" value="Procurar"></div>
        </div>
    </form>

</div>

<?php if ($busca !== null && $total_reservas != 0) : ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Data Inicial</th>
                <th scope="col">Data Final</th>
            </tr>
        </thead>
        <!---- Percorrendo a lista de dados e imprimindo ao usuário ----->
        <?php foreach ($reservas as $reserva) : ?>
            <tbody>
                <tr>
                    <th><?= $reserva->id ?></th>
                    <th><?= $reserva->nome ?></th>
                    <th><?= $reserva->cpf ?></th>
                    <th><?= $reserva->dataI ?></th>
                    <th><?= $reserva->dataF ?></th>
                    <th><a href="CancelarReserva.php?cpf=<?= $reserva->cpf ?>">Cancelar Reserva</a></th>
                </tr>
            </tbody>
        <?php endforeach; ?>
    <!------ Mensagem caso não haja reservas no CPF informado ---->
    <?php elseif ($busca !== null) : ?>
        <p class="text-center"><strong>Não Foram Encontradas Reservas Nesse CPF !!</strong></p>
    <?php endif; ?>

    </table>


    <?php
    require_once('footer.php');
    ?>