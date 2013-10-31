 		<?php
		require_once('reader.php');
		?> 		
</ul>

</div>				                          
            </ul>
        </div>
        
        <div class="esq-div">
		      
      <div class="destaques-div">

      <h5>Cadastrar Usuário</h5>
     
      <form id="formulariousr" name="cadusr" method="post" onsubmit="return validar(this);" action="reqcadusr.php">
      <br>
      <br>
      <table border=0  width=auto height=150>   
      <td width="auto"> <h7>Login: </h7> </td>
      <td width="auto"><input type="text" name="username" id="username" size="20" placeholder="Escolha um Login" onblur="checkUserName(this.value)" /> 
	  <span id="usercheck" style="padding-left:10px; ; vertical-align: middle;"></span>
      <tr>
      <td width="auto"><h7>Senha:</h7></td>
      <td width="auto"><input type="password" name="passusr" placeholder="Escolha uma Senha" type="text" id="passusr" size="20" maxlength="20" />
      </tr>
      <tr>
      <td width="auto"><h7>Confirma Senha:</h7></td>
      <td width="auto"><input type="password" name="conpassusr" placeholder="Confirme a Senha" type="text" id="conpassusr" size="20" maxlength="20" />    
      </tr>    
      <tr>
      <td width="auto"><h7>E-mail:</h7></td>
      <td width="auto"><input type="email" name="emailusr" placeholder="Insira seu E-Mail" type="text" id="emailusr" size="20" maxlength="60" onBlur="vemail(formulariousr.emailusr);" />
      </tr>
      <tr>
      <td width="auto"><h7>Digite o Código</h7></td>
      <td><img src="codigo_captcha.php"></td>
      </tr>
      <tr>
      <td></td>
      <td><input name="codigo" placeholder="Código da Figura" type="text" id="codigo2" size="20"></td>
      </tr>
	  </table>
	  <br>
	  <br> 	   
	  <input name="btn_cadusr" class="button" type="submit" id="btn_cadusr" value="Cadastrar" size="40"  />
      <input name="limpar" class="button" type="reset" id="limpar" value="Clean" size="40"/>
      <input name="atualizar" class="button" type="reset" value="Gerar Outra Imagem" size="15" onClick="window.location.href='JavaScript:location.reload(true);'">
	  </form>     
      </div>
<script>
	 function validar(formulariousr){
	 
	 // Cor Padrao do formulario para os campos
	 formulariousr.username.style.background="white";
	 formulariousr.passusr.style.background="white";
	 formulariousr.conpassusr.style.background="white";
     formulariousr.emailusr.style.background="white";
     formulariousr.codigo.style.background="white";

	 	//caso campo nao esteja preenchido destacar campo se necessario
	 	if(formulariousr.username.value == ''){
		formulariousr.username.style.background="yellow";
		}
			if(formulariousr.passusr.value == ''){
			formulariousr.passusr.style.background="yellow";
			}
				if(formulariousr.conpassusr.value == ''){
				formulariousr.conpassusr.style.background="yellow";
				}
                                    if(formulariousr.emailusr.value == ''){
                                    formulariousr.emailusr.style.background="yellow";    
                                    }
                                          if(formulariousr.codigo.value == ''){
                                    	  formulariousr.codigo.style.background="yellow";    
                                    	}

															
                                    //campos obrigatorios nao preenchidos emitir alerta
                                    if(formulariousr.username.value == '' || formulariousr.passusr.value == '' ||
                                    formulariousr.conpassusr.value == '' || formulariousr.emailusr.value == '' || 
                                    formulariousr.codigo.value == '' ){															
				
                                    alert("Existem Campos não preenchidos");
                                    return false;
                                    }
				   //verificar se a senha e confirmacao de senha sao as mesmas
				   senha = formulariousr.passusr.value
				   senhaconf = formulariousr.conpassusr.value
				   if (senha != senhaconf){
				   					formulariousr.passusr.value='';
				   					formulariousr.conpassusr.value='';				
                                    alert("Senhas divergentes por favor insira senha novamente")
				    return false;		
                                   }
		//se preenchimento estiver correto true				
		else
		return true;	
	}


function vemail(email){	
    exp = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
	
    if(exp.test(email.value)){         
	  return true;
    }
	else{
		formulariousr.emailusr.value='';
		alert("E-mail Inválido!"); 
		return false;
    }
}

</script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

function checkUserName(usercheck)
{
	$('#usercheck').html;
	$.post("checkuser.php", {user_name: usercheck} , function(data)
		{
			
			   if (data != '' || data != undefined || data != null) 
			   {				   
				  $('#usercheck').html(data);
				  		
			   }
			  
          });
}
</script>
	
<div class="rodape-div"><p>Loja Cusko</p></div>		
</div>
         <div class="dir-div">								
 		<?php
		require_once('menulado2.php');
		?> 			
</div>

</body>
</html>