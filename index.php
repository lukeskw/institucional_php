<?php 
    $conn = new mysqli("localhost", "root", "", "carousel");

    $result = $conn->query("SELECT caminho FROM slider");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Tatica</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="public/css/main.css" />
    <link rel="stylesheet" href="public/css/form.css" />
    <link rel="icon" href="public/images/logo_ico.png" />
    
</head>
<body>
    <div class="section">
        <div class="container">
            <div class="container-header">
            <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="function.php">
                    <img src="public/images/logo_ico.png" height= "32px" alt="logo">
                    <div class="text-logo"><p>Tática</p><span>web</span></div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link " href="#">INÍCIO<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#institucional">INSTITUCIONAL</a>
                    <a class="nav-item nav-link" href="#contact">CONTATO</a>
                  </div>
                </div>
              </nav>
        </header></div>

        <div class="carousel">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <!-- <div class="carousel-item active">
                    <img class="d-block w-100" src="images/Screenshot_3.png" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="images/blog.jpg" alt="Second slide">
                  </div> -->

                  <?php
                        $i = 0;
                        foreach($result as $row){
                            $actives= '';
                        
                        if( $i== 0 ){
                            $actives = 'active';
                        }
                    ?>
                    <div class="carousel-item <?= $actives; ?>">
                    <img class="d-block w-100" src="<?= $row['caminho'] ?>" width="100%" alt="Slides">
                    </div>
                        <?php $i++; } ?>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
      </div>
    </div>
    
    <div class="section-2">
        <section id="institucional">
        <div class="container">
            <div class="institucional"><h2>Institucional</h2><hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dapibus tortor nec ex porta auctor. Mauris venenatis rutrum convallis. Ut congue nunc ac consequat venenatis. Vestibulum eu velit pulvinar, mollis erat vel, pretium leo. Aenean eu lectus et nunc tristique laoreet et ut massa. Aenean vestibulum ex vel libero rutrum semper. Cras libero velit, aliquet blandit varius a, varius eget quam. Ut eleifend maximus feugiat. Morbi tellus ex, efficitur rutrum nisl ut, dapibus molestie lorem. Donec vestibulum non enim vel tempor. Quisque ullamcorper tristique tempor.</p>
            <button>Saiba mais</button></div>
        </div></section>
    </div>

    <div class="section-3">
        <section id="contact">
        <div class="container">
            <div class="contact">
                <h2>Fale com a gente</h2><hr>
                <form action="contact" method="POST" onsubmit="">
                      <div class="input-block">
                        <input id="name" name="name" placeholder="NOME COMPLETO" />
                      </div>

                      <div class="input-block-2">
                        <input id="email" name="email" placeholder="EMAIL" />
                        <input id="telefone" name="telefone" placeholder="TELEFONE" />
                      </div>

                      <div class="input-block">
                        <input id="assunto" name="assunto" placeholder="ASSUNTO" />
                      </div>
          
                      <div class="input-block">
                       <textarea id="about" name="about" placeholder="MENSAGEM" ></textarea>
                      </div>

                      <button type="submit" class="primary-button">Enviar Mensagem</button>

                </form>
            </div>
            <footer>
              <a href="https://www.facebook.com" target=_blank><img src="public/images/facebook.svg"></a>
              <a href="https://www.taticaweb.com.br/" target=_blank><p>Desenvolvido por <b>Tática Web</b></p></a>
            </footer>
        </div></section>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>