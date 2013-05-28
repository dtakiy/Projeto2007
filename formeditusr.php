<?php
require_once("conf.php");

  $cod ="$_POST[cid2]";
  $log="$_POST[clog2]";
  $nome ="$_POST[cnome2]";
  $datanasc="$_POST[cdata2]";
  $senha ="$_POST[csenha2]";
  $email ="$_POST[cemail2]";
  $tipo ="$_POST[ctipo2]";
  $rg = "$_POST[crg2]";
  $cpf = "$_POST[ccpf2]";
  $end = "$_POST[cend2]";
  $num = "$_POST[cnum2]";
  $compl = "$_POST[ccomp2]";
  $cep = "$_POST[cep2]";
  $cidade = "$_POST[ccidade2]";
  $estado = "$_POST[cestado2]";
  $tel = "$_POST[ctel2]";
  $cel = "$_POST[ccel2]";
  $status = "$_POST[status2]";
  
  
  $nomecripto = base64_encode($nome);
  $datanasccripto = base64_encode($datanasc);
  $emailcripto = base64_encode($email);
  $rgcripto = base64_encode($rg);
  $cpfcripto = base64_encode($cpf);
  $endcripto = base64_encode($end);
  $numcripto = base64_encode($num);
  $compcripto = base64_encode($compl);
  $cmpusrcripto = base64_encode($cmpusr);
  $cidadecripto = base64_encode($cidade);
  $estdcripto = base64_encode($estado);
  $cepcripto = base64_encode($cep);
  $telcripto = base64_encode($tel);
  $celcripto = base64_encode($cel);
  $cepcripto = base64_encode($cep);
  
   
$result = mysql_query("UPDATE usuarios SET nome='$nomecripto',datanasc='$datanasccripto' ,email='$emailcripto', rg='$rgcripto', cpf='$cpfcripto', cep='$cepcripto', tel='$telcripto' ,cel='$celcripto', endereco='$endcripto',
numero='$numcripto', complemento='$compcripto', estado='$estdcripto',cidade='$cidadecripto', tipo=$tipo, status=$status
WHERE idusuario=$cod");

echo "UPDATE usuarios SET nome='$nomecripto',datanasc='$datanasccripto' ,email='$emailcripto', rg='$rgcripto', cpf='$cpfcripto', cep='$cepcripto', tel='$telcripto' ,cel='$celcripto', endereco='$endcripto',
numero='$numcripto', complemento='$compcripto', estado='$estdcripto',cidade='$cidadecripto', tipo=$tipo, status=$status
WHERE idusuario=$cod";

echo "Mudança Efetuada com Sucesso, clique <a href=admusr.php>"; echo "aqui Para Voltar</a>.";
?>