<!DOCTYPE HTML>

<head>
    <title>Minha Loja</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width,initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

    <!-- jQuery livraria --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- JavaScript compiladd-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .navbar{
            margin-bottom: 0;
        }
    </style>

</head>

<body>
 
    <?php include 'nav.php';
          include 'cabecalho.html';
          include 'conexao.php';
          
          $consulta = $cn->query('select nm_livro,vl_preco,ds_capa,qt_estoque from vw_livro where sg_lancamento = "S"');
          
          ?>

    <div class="container-fluid">
        <div class="row">
            <?php 
            while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="col-sm-3">
                <img src="img/<?php echo $exibe['ds_capa']; ?>.jpg" class="img-responsive" style="width:100%">
                <div><h4><b><?php echo mb_strimwidth ($exibe['nm_livro'],0,30,'...'); ?></b></h4></div>
                <div><h5>R$ <?php echo number_format ($exibe['vl_preco'],2,',','.'); ?></h5></div>
            
                <div class="text-center">
                    <button class="btn btn-lg btn-block btn-info">
                        <span class="glyphicon glyphicon-info-sign" > Detalhes</span>
                    </button>
                </div>

                <div class="text-center" style="margin-top:5px; margin-bottom:5px;">
                    <?php
                    if($exibe['qt_estoque'] > 0){
                    ?>
                    <button class="btn btn-lg btn-block btn-primary">
                        <span class="glyphicon glyphicon-usd"> Comprar</span>
                    </button>
                    <?php } else { ?>
                    <button class="btn btn-lg btn-block btn-primary" disabled>
                        <span class="glyphicon glyphicon-remove-circle"> Indisponível</span>
                    </button>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php include 'rodape.html'?>

</body>
</html>