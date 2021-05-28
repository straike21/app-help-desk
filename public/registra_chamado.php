<?php


    session_start();


    //trata as variaveis para que não haja perda de sequencia
    $titulo =  str_replace('#','-', $_POST['titulo']) ;
    $categoria = str_replace('#','-', $_POST['categoria']) ;
    $descricao = str_replace('#','-', $_POST['descricao']) ;

    $texto = $_SESSION['id'].'#'. $titulo .'#'. $categoria .'#'.$descricao . PHP_EOL;

    //Criação do arquivo
    $arquivo = fopen('../../app_help_desk/arquivo.hd','a');//Abre o arquivo:
    
    fwrite($arquivo, $texto); //escreve no arquivo

    fclose($arquivo);//fecha o arquivo
    
    header('Location: abrir_chamado.php')

?>