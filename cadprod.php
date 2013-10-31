<?php 
	session_start();
    $usuario = $_SESSION['usrlogin'];
    $tipo=$_SESSION['usrtipo'];
    $nome = $_SESSION['usrnome'];
	$nomedecripto = base64_decode($nome);
	if($tipo==1){
	echo "";
	}
	else 
	header("location:erro.php");
?>
 		<?php
		require_once('reader2.php');
		?> 		
</ul>
</div>				                          
            </ul>
        </div>
        
        <div class="esq-div">
		      
      <div class="destaques-div">

      <h5>Cadastrar Produtos</h5>
      <form id="formulario" name="formulario" method="post" onsubmit="return validar(this);" action="reqcadprod.php">
      <br>
      <br>
      <table border=0  width=300 height=200>   
      <td width="69"><h7>Nome:</h7></td>
      <td width="100"><input name="nomeprod" type="text" text-align:"right" id="nomeprod" size="50" maxlength="60" />
      </tr>
      <tr>
      <td width="69"><h7>Preço: R$</h7></td>
      <td width="100"><input name="precoprod" text-align:"right" type="text" id="precoprod" onkeypress="mascara(this,monetaria)" size="8" maxlength="60" />
      </tr>
      <tr>
      <td width="69"><h7>Quantidade:</h7></td>
      <td width="100"><input name="qtdprod" type="text" text-align:"right" onkeypress="mascara(this,numeros)" id="qtdprod" size="8" maxlength="60" min="0"/>
      </tr>
	  <tr>
      <td width="69"><h7>Peso: (g)</h7></td>
      <td width="100"><input name="pesoprod" type="text" text-align:"right" onkeypress="mascara(this,numeros)" id="pesoprod" size="8" maxlength="60" min="0" />
      </tr>
      <tr>
      <td width="69"><h7>Tamanho:</h7></td>
      <td width="100">
	  <select name="tamprod">
		<option value="1" selected>Selecione</option>
		<option value="2">P</option>
		<option value="3">M</option>
		<option value="4">G</option>
		<option value="5">Único</option>
	  </select>
      </tr>
	  <tr>
      <td width="69"><h7>Categoria:</h7></td>
      <td width="100">
	  <select name="catprod">
		<option value="1" selected>Selecione</option>
		<option value="2">Camisas Masculinas</option>
		<option value="3">Camisas Femininas</option>
		<option value="4">Calças Masculinas</option>
		<option value="5">Calças Femininas</option>
		<option value="6">Bermudas Masculinas</option>
		<option value="7">Shorts Femininos</option>
		<option value="8">Acessórios</option>
	  </select>
      </tr>
	  <tr>
      <td width="69"><h7>Destaque:</h7></td>
      <td width="100">
	  <select name="destaqueprod">
		<option value="1" selected>Selecione</option>
		<option value="2">Sim</option>
		<option value="3">Não</option>
	  </select>
      </tr>
      <tr>
      <td width="69"><h7>Foto Produto:</h7></td>
      <td width="100"><input type="file" name="fotoprod" accept="image/x-png, image/gif, image/jpeg, image/jpg, image/bmp" />
      </tr>
      <tr>
      <td width="69"><h7>Descrição:</h7></td>
	  <td width="100"><textarea name="descprod" cols="50" rows="5"></textarea>
      </tr>
       
	  </table>
	  <br>
	  <br>
	  	   
	  <input name="btn_cadprod" class="button" type="submit" id="btn_cadprod" value="Cadastrar" size="40" />
      <input name="limpar" class="button" type="reset" id="limpar" value="Clean" size="40"/> 
	 
	  </form>     
        </div>
			
			
<script>
	 function validar(formulario){
	 
	 // Cor Padrao do formulario
	 
	 formulario.nomeprod.style.background="white";
	 formulario.precoprod.style.background="white";
	 formulario.qtdprod.style.background="white";
	 formulario.pesoprod.style.background="white";
	 formulario.catprod.style.background="white";
	 formulario.destaqueprod.style.background="white";
	 formulario.fotoprod.style.background="white";
	 formulario.descprod.style.background="white";
	 
	 	//caso campo nao esteja preenchido destacar campo se necessario
	 	
			if(formulario.nomeprod.value == ''){
			formulario.nomeprod.style.background="yellow";
			}
				if(formulario.precoprod.value == ''){
				formulario.precoprod.style.background="yellow";
				}
					if(formulario.qtdprod.value == ''){
					formulario.qtdprod.style.background="yellow";
					}
						if(formulario.pesoprod.value == ''){
						formulario.pesoprod.style.background="yellow";
						}
							if(formulario.catprod.value == '1'){
							formulario.catprod.style.background="yellow";
							}
								if(formulario.destaqueprod.value == '1'){
								formulario.destaqueprod.style.background="yellow";
								}
									if(formulario.fotoprod.value == ''){
									formulario.fotoprod.style.background="yellow";
									}
										if(formulario.descprod.value == ''){
										formulario.descprod.style.background="yellow";
										}
											//campos obrigatorios nao preenchidos emitir alerta
											if(formulario.nomeprod.value == '' || formulario.precoprod.value == '' ||
											formulario.pesoprod.value == '' || formulario.catprod.value == '1' || 
											formulario.destaqueprod.value == '1' || formulario.fotoprod.value == '' ||
											formulario.descprod.value == ''){
											
											alert("Existem Campos não preenchidos");
											return false;
											}
											
		//se preenchimento estiver correto							
		else
		return true;		
			}

			
//função para executar mascara
function mascara(objeto,funcao){  
    v_obj=objeto  
    v_fun=funcao  
    setTimeout("execmascara()",1)  
}  
function execmascara(){  
    v_obj.value=v_fun(v_obj.value)  
}

// mascara para valores monetarios
function monetaria(v){ 
v=v.replace(/\D/g,"")

v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca ponto nos dois ultimos digitos
return v; 
} 

//mascara para aceitar apenas numeros
function numeros(v){  
    v=v.replace(/\D/g,"");                                      
    return v;  
} 
	
</script>
<div class="rodape-div"><p>Loja Cusko</p></div>		
</div>
 <div class="dir-div">								
        <?php
		require_once('menulado.php');
		?> 		
</div>
</body>
</html>
