<?php
require_once('header.php');
///Arquivos Necessários
use reservadatabase\Database;

require_once('config.php');
require_once('Database/database.php');

/// Verificar a existência de um Post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $database = new Database(MYSQL_CONFIG);
    /// Atributos obtidos via formulário
    $nome = $_POST['text_nome'];
    $cpf = $_POST['numero_cpf'];
    $telefone = $_POST['numero_telefone'];
    $data_nasc = $_POST['data_Nascimento'];
    $email = $_POST['text-email'];
    $endereco = $_POST['text_endereco'];
    $dataI = $_POST['Data_Inicial'];
    $dataF = $_POST['Data_Final'];

    $parametros = [
        ':nome' => $nome,
        ':cpf' => $cpf,
        ':telefone' => $telefone,
        ':data_nasc' => $data_nasc,
        ':email' => $email,
        ':endereco' => $endereco,
        ':dataI' => $dataI,
        ':dataF' => $dataF
    ];
    /// Inserido Informações no Banco de Dados 
    $results = $database->execute_non_query("INSERT INTO clientes VALUES(0,:nome,:cpf,:telefone,:data_nasc,:email,:endereco,:dataI,:dataF)", $parametros);
}
?>
<!----Formulário Da Reserva---->

<p class="d-flex justify-content-center mt-5 "><strong>NOVA RESERVA </strong></p>
<div class="border border-dark mt-3 p-4 shadow p-3 mb-5 bg-white rounded mt-5 ">
    <form action="AdicionarReserva.php" method="post">


        <div class="row">
            <div class="form-group col-md-5 mb-3">
                <label for="text_nome" class="form-label">Nome Completo</label>
                <input type="text" name="text_nome" id="text_nome" class="form-control" placeholder="Insira Seu Nome" minlength="3" maxlength="100" required>
            </div>

            <div class="form-group col-md-3 ">
                <label for="numero_cpf" class="form-label">CPF</label>
                <input type="number" name="numero_cpf" id="numero_cpf" class="form-control" placeholder="Insira Seu CPF" minlength="3" maxlength="11" required>
            </div>

            <div class="form-group col-md-3">
                <label for="numero_telefone" class="form-label">Telefone</label>
                <input type="text" name="numero_telefone" id="numero_telefone" class="form-control" placeholder="Insira Seu Telefone" minlength="3" maxlength="11" required>
            </div>

        </div>


        <div class="row">
            <div class="form-group col-md-5 ">
                <label for="text_endereco">Endereço</label>
                <input type="text" name="text_endereco" id="text_endereco" class="form-control" placeholder="Insira Seu Endereço" required>
            </div>

            <div class="form-group col-md-3 ">
                <label for="data_Nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data_Nascimento" class="form-control" id="data_Nascimento">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5 ">
                <label for="text-email" class="form-label">Email</label>
                <input type="text" name="text-email" id="text-email" class="form-control" placeholder="@exemplo.com" minlength="20" maxlength="80">
            </div>

            <div class="row">

                <label class="form-label my-1 mr-2 mx-1" for="inlineFormCustomSelectPref">Plano Escolhido</label>

                <select class="custom-select my-1 mr-sm-2 mx-3 col-md-2 " id="inlineFormCustomSelectPref">
                    <option selected>Escolher...</option>
                    <option value="1">Plano Básico</option>
                    <option value="2">Plano Intermediário </option>
                    <option value="3">Plano Premium</option>
                </select>

                <div class="col-auto">
                    <label for="DataI">Data Inicial</label>
                    <input type="date" name="Data_Inicial" id="DI">

                </div>

                <div class="col-auto">
                    <label for="DataF">Data Final</label>
                    <input type="date" name="Data_Final" id="DF">
                </div>
            </div>


            <div class="form-group">
                <input type="submit" value="Cadastrar" class="btn btn-outline-secondary my-2">
            </div>
        </div>

    </form>

    <div>
        <a class="btn btn-outline-secondary my-2 " href="listarReservas.php">Buscar Reservas</a>
    </div>
</div>

<?php
require_once('footer.php');
?>