<?php
session_start();
echo "";
//echo session_id();
$usuario = $_SESSION['usrlogin']; 
$email = $_SESSION['email'];
$emailcripto = base64_decode($email);
?>
         <?php
         require_once('reader.php');	
         ?>  
</ul>
</div>				                          
            </ul>
        </div>      
        <div class="esq-div">
        	<div class="destaques-div">
            <h5>Recuperar Senha</h5>	    
      <form id="formrec" name="formrec" method="post" onsubmit="return validar(this);" action="reqrecpass.php">
      <br>
      <br>
      <table border=0  width=auto height=auto>
      <tr> 
      <td width="auto"> <h7>E-mail:</h7> </td>
      <td width="auto"><input type="text" name="recpass" placeholder="E-Mail Cadastrado" onBlur="vemail(formrec.recpass);" size="20" maxlength="60" /></td>
      </tr>
       </table>
	  <br>
	  <br>	   
	  <input name="btn_recpass" class="button" type="submit" id="btn_recpass" value="Recuperar" size="40" />
	  </form>
   <script>
   function validar(formrec){
   formrec.recpass.style.background="white";
   		
   		if(formrec.recpass.value ==''){
   		formrec.recpass.style.background="yellow";
   		alert("E-mail Não Preenchido");
   		return false;
	 	}
   return true;
    }   
    function vemail(email){
    exp = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
	
    if(exp.test(email.value)){         
	  return true;
    }
	else{
		alert("Formato De E-mail Inválido!"); 
		return false;
    }
}
	</script>
        </div>
<div class="rodape-div"><p>Loja Cusko</p></div>		
</div>
         <div class="dir-div">								
		<?php
         require_once('menulado.php');	
         ?>
		</div>
		
</div>
</body>
</html>