<?php

function Vencedor($tabuleiro, $jogador)
{
    if($tabuleiro[0][0] == $jogador && $tabuleiro[0][1] == $jogador && $tabuleiro[0][2] == $jogador
    || $tabuleiro[1][0] == $jogador && $tabuleiro[1][1] == $jogador && $tabuleiro[1][2] == $jogador
    || $tabuleiro[2][0] == $jogador && $tabuleiro[2][1] == $jogador && $tabuleiro[2][2] == $jogador
    || $tabuleiro[0][2] == $jogador && $tabuleiro[1][2] == $jogador && $tabuleiro[2][2] == $jogador
    || $tabuleiro[0][1] == $jogador && $tabuleiro[1][1] == $jogador && $tabuleiro[2][1] == $jogador
    || $tabuleiro[0][0] == $jogador && $tabuleiro[1][0] == $jogador && $tabuleiro[2][0] == $jogador
    || $tabuleiro[0][0] == $jogador && $tabuleiro[1][1] == $jogador && $tabuleiro[2][2] == $jogador
    || $tabuleiro[0][2] == $jogador && $tabuleiro[1][1] == $jogador && $tabuleiro[2][0] == $jogador
    ){
        return " O vencedor é \"$jogador\"";
    }
}

function Verificar($tabuleiro, $jogador1, $jogador2)
{
    return Vencedor($tabuleiro, $jogador1).Vencedor($tabuleiro, $jogador2);
}

$tabuleiro = array(
    array(NULL,NULL,NULL),
    array(NULL,NULL,NULL),
    array(NULL,NULL,NULL)
);
$jogador1 = "o";
$jogador2 = "x";
$vencedor = NULL;
$aviso = NULL;

if(isset($_POST['acao'])){
    $tabuleiro = array(
        array(strtolower($_POST['a1']),strtolower($_POST['a2']),strtolower($_POST['a3'])),
        array(strtolower($_POST['b1']),strtolower($_POST['b2']),strtolower($_POST['b3'])),
        array(strtolower($_POST['c1']),strtolower($_POST['c2']),strtolower($_POST['c3'])));
    if($tabuleiro[0][0] == $jogador1 || $tabuleiro[0][1] == $jogador1 || $tabuleiro[0][2] == $jogador1 ||
       $tabuleiro[1][0] == $jogador1 || $tabuleiro[1][1] == $jogador1 || $tabuleiro[1][2] == $jogador1 ||
       $tabuleiro[2][0] == $jogador1 || $tabuleiro[2][1] == $jogador1 || $tabuleiro[2][2] == $jogador1 ||
       $tabuleiro[0][0] == $jogador2 || $tabuleiro[0][1] == $jogador2 || $tabuleiro[0][2] == $jogador2 ||
       $tabuleiro[1][0] == $jogador2 || $tabuleiro[1][1] == $jogador2 || $tabuleiro[1][2] == $jogador2 ||
       $tabuleiro[2][0] == $jogador2 || $tabuleiro[2][1] == $jogador2 || $tabuleiro[2][2] == $jogador2)
       {
            $vencedor = Verificar($tabuleiro, $jogador1, $jogador2);
            
    }else{
        $aviso = "Apenas X e O";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="jogo-da-velha.png">
    <title>Jogo da Velha</title>
    <meta name="description" content="Um jogo da velha feito com PHP, feito para praticar">
</head>
<body>
    <form method="post">
        <p><?php echo $aviso;?></p>
        <div class="p1">
            <input type="text" name="a1" maxlength="1">
            <input type="text" name="a2" maxlength="1">
            <input type="text" name="a3" maxlength="1">
        </div>
        <div class="p2">
            <input type="text" name="b1" maxlength="1">
            <input type="text" name="b2" maxlength="1">
            <input type="text" name="b3" maxlength="1">
        </div>
        <div class="p3">
            <input type="text" name="c1" maxlength="1">
            <input type="text" name="c2" maxlength="1">
            <input type="text" name="c3" maxlength="1">
        </div>
        <input type="submit" name="acao" value="Verificar">
    </form>
    <div class="resultado">
        <p>Resultado do jogo: <b><?php echo $vencedor;?></b></p>
        <div class="a1">
            <p><?php if(isset($_POST['acao'])){
                        echo $tabuleiro[0][0]."|".$tabuleiro[0][1]."|".$tabuleiro[0][2]."<br>";
                        echo $tabuleiro[1][0]."|".$tabuleiro[1][1]."|".$tabuleiro[1][2]."<br>";
                        echo $tabuleiro[2][0]."|".$tabuleiro[2][1]."|".$tabuleiro[2][2];}
            ?></p>
        </div>
    </div>
</body>
</html>