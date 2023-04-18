<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function erro($errno, $errstr, $errfile, $errline){
    print '<center><b>';
    switch($errno){
        case '0': print 'Erro fatal'; break;    
        case '1': print 'Erro fatal'; break;
        case '2': print 'Erro comum'; break;
        case '8': print 'Aviso'; break;
        case '256': print 'Erro fatal a nível de usuário'; break;
        case '512': print 'Aviso comum de usuário'; break;
        case '1024': print 'Aviso a nível de usuário'; break;
        case '2048': print 'Não estritamente um erro'; break;
        case '8191': print 'Erro'; break;                                                        
        default: print 'Erro '.$errno.' desconhecido'; break;
    }
    echo ":</b><br>$errstr<br>$errfile na linha $errline";
    print "</center>";
    die();
}
set_error_handler('erro');
date_default_timezone_set('America/Sao_Paulo'); 
$db=new PDO('sqlite:'.__DIR__.'/db/db.sqlite3');
$mensagens=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $stmt = $db->prepare('INSERT INTO mensagens (mensagem, createdAt) VALUES (:mensagem, :createdAt)');
    $stmt->bindParam(':mensagem', $_POST['mensagem']);
    $createdAt=time();
    $stmt->bindParam(':createdAt', $createdAt);    
    $stmt->execute();
    header('Location: index.php');         
}else{
    $res = $db->query("SELECT * FROM mensagens ORDER BY id DESC");
    $mensagens=$res->fetchAll();
    require __DIR__.'/view/index.php';
}
?>
