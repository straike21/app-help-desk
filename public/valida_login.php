

<?php
//iniciar a função session start sempre antes de qualquer coisa
session_start();


// variavel que verifica se a autenticação foi realizada
$usuario_autenticado = false;
$usuario_id = null;
$perfil_id = null;
$perfis = array(1 => 'Administrativo', 2 => 'Usuário');

//Usuarios do sistema
$usuarios_app = array(
    array('id' => 1, 'email' => 'admin@teste.com.br', 'senha' => 'admin', 'perfil_id' => 1),
    array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'admin', 'perfil_id' => 1),
    array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => 'admin', 'perfil_id' => 2),
    array('id' => 4, 'email' => 'ana@teste.com.br', 'senha' => 'admin', 'perfil_id' => 2)

);


//Faz uma varredura em todos os emails cadastrados no array
foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $perfil_id = $user['perfil_id'];
    }
}

if ($usuario_autenticado) {
    echo 'Usuario autenticado no sistema';
    $_SESSION['autenticado'] = 'SIM';
    // coloca o id como escopo global da aplicação 
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $perfil_id;
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
}
?>