<?php
require_once 'Upload.class-pdo.php';

$objUp = new Upload();

$path = '';

// if(isset($_POST['btEnviar'])){

// }

if(isset($_POST['btEnviar'])){
    $image = $_FILES['arquivo']['name'];
    $path = 'images/'.$image;

    echo '<script type="text/javascript">alert("path: '.($path).'");</script>';
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $path);
    $objUp->queryInsert($path);
   
}



if(!empty($_GET['acao'])){
	switch($_GET['acao']){
       
         case 'delet': $objUp->queryDelete($_GET['id']); break; 

	}
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <title>Upload de Imagem Teste</title>
    <link rel="icon" href="public/images/logo_ico.png" />
    <link href="public/css/estilo.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div id="conteudo">
	<div id="lista">
    	<?php foreach($objUp->querySelect() as $rst){ ?>
    	<div class="linha">
        <div class="leng"><?=(substr($rst['caminho'], 0, 20))?></div>
            <div class="bt">
                <a href="?acao=delet&id=<?=$rst['id']?>" title="Deletar"><img src="public/images/delete.png" width="16" height="16"></a>
                
            </div>
        </div>
        
        <?php } ?>
    </div>
    <div id="formulario">
    	<form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="arquivo"><br><br>
            <input type="submit" name=
            "btEnviar" 
            value="Cadastrar">
            <input type="hidden" name="id" value="<?php 
            ?>" >
           
        </form>
        </div>

        <button class="btn btn-danger ml-5 mt-2" type="button"><a href="index.php">Retornar</a></button>
</div>    

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>