         <?php
         require_once('reader.php');	
         ?>
</div>				                          
            </ul>
        </div>   
        <div class="esq-div">
        	<div class="destaques-div">
            <h5>Recuperando Senha</h5>
      <form id="formcod" name="formcod" method="post" onsubmit="return validar(this);" action="reqcodpass.php">
      <br>
      <br>
      <table border=0  width=auto height=auto>
      <tr> 
      <td width="auto"> <h7>Código:</h7> </td>
      <td width="auto"><input type="text" name="codpass" placeholder="Código Enviado"  size="20" maxlength="60" /></td>
      <br>
      </tr>
      <tr> 
      <td width="auto"> <h7>E-mail:</h7> </td>
      <td width="auto"><input type="text" name="emailpass" placeholder="E-mail Cadastrado"  size="20" maxlength="60" /></td>
      </tr>
       </table>
	  <br>
	  <br>	   
	  <input name="btn_codpass" class="button" type="submit" id="btn_codpass" value="Recuperar" size="40" />
	  </form>
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