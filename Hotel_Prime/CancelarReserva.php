<?php

use reservadatabase\Database;
/// Arquivos Necessários
require_once('header.php');
require_once('config.php');
require_once('Database/database.php');

$database = new Database(MYSQL_CONFIG);
$reservas = null;

/// Pegando informações dos contatos
$cpf = $_GET['cpf'];
$database = new Database(MYSQL_CONFIG);
$params = [
    ':cpf' => $cpf
];


/// Verificando se o Delete foi executado
if (empty($_GET['delete'])) {
    $results = $database->execute_query("SELECT * FROM clientes WHERE cpf = :cpf", $params);
    $reservas = $results->results[0];
} else {
    $results = $database->execute_non_query("DELETE FROM clientes WHERE cpf = :cpf", $params);
    header('Location: listarReservas.php');
}

?>

<!--- Canelamento de Reserva --->
<div class="row">
    <div class="col text-center">
        <h3>Deseja Cancelar a Reserva, cujo Nome e Data são? </h3>

        <div class="my-4">
            <div>
                <span class="me-5">Nome: <strong> <?= $reservas->nome ?> </strong></span>
                <span>Data Inicial: <strong> <?= $reservas->dataI ?> </strong></span>
            </div>
        </div>

        <a href="index.php" class="btn btn-outline-dark yes-no-width">Não</a>
        <a href="CancelarReserva.php?cpf=<?= $cpf ?>&delete=yes" class="btn btn-outline-dark yes-no-width">Sim</a>
    </div>
</div>

<?php
require_once('footer.php');
?>