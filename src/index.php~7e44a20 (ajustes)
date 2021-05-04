<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lgpd - Modulos composer</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center bg-light">
    <section class="col-12 col-lg-5 col-md-9 my-lg-5 px-lg-5 my-md-4 px-md-4 rounded" style="background: white;">
        <h1 class="text-center my-3 py-5">Lgpd - Modulo Composer</h1>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label>Nome empresa: </label>
                <input type="text" name="nome_empresa" class="form-control" aria-describedby="nomeEmpresa" placeholder="Digite o nome da empresa" required>
                <small id="nomeEmpresa" class="form-text text-muted text-justify">ex: HIDEA MOTORES</small>
            </div>
            <div class="form-group">
                <label>Email da empresa: </label>
                <input type="text" name="email_empresa" class="form-control" aria-describedby="emailEmpresa" placeholder="Digite o email da empresa" required>
                <small id="emailEmpresa" class="form-text text-muted text-justify">ex: lgpd@hidea.com.br</small>
            </div>
            <div class="form-group">
                <label>Site da empresa: </label>
                <input type="text" name="site_empresa" class="form-control" aria-describedby="siteEmpresa" placeholder="Digite o site da empresa" required>
                <small id="siteEmpresa" class="form-text text-muted text-justify">ex: www.hidea.com.br</small>
            </div>
            <div class="form-group">
                <label>Pessoa juridica: </label>
                <textarea name="pessoa_juridica" class="form-control" rows="5" required></textarea>
                <small id="nomeEmpresa" class="form-text text-muted text-justify">ex: A HIDEA IMPORTAÇÃO E COMÉRCIO LTDA, pessoa jurídica de direito privado inscrita no CNPJ sob o nº 29.071.280/0001-00, com sede na Rua Dois de Setembro, 4241 – Itoupava Norte – Blumenau - SC, CEP: 89053-200</small>
            </div>
            <?php
            use ViniciusQuattromani\Lgpd;
            if(isset($_POST['btn_enviar'])){
                require_once('Lgpd.php');
                $obj_lgpd = new Lgpd();

                $nome_empresa = $_POST['nome_empresa'];
                $email_empresa = $_POST['email_empresa'];
                $site_empresa = $_POST['site_empresa'];
                $pessoa_juridica = $_POST['pessoa_juridica'];

                if($obj_lgpd->handler($nome_empresa, $email_empresa, $site_empresa, $pessoa_juridica)){
                    echo '<div class="text-center text-success">Formulario enviado com sucesso</div>';
                }else{
                    echo '<div class="text-center text-danger">Erro!!</div>';
                }
            }
            ?>
            <div class="pb-3">
                <input type="submit" name="btn_enviar" class="btn btn-primary mx-auto btn-block col-lg-3 col-12 mt-3" />
            </div>
        </form>
    </section>
</body>
</html>

