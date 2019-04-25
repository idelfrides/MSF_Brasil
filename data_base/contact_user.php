<?php

include("db_conection_config.php");
/*include("../nwitter/_css/estilo_contato.css");*/


// isset($var) - informa se a variavel foi iniciada, ou seja, verifica se a variável é definida. se sim retorna TRUE, se não FALSE.

//  (isset($_POST['phone']) && (!empty($_POST['phone']) || empty($_POST['phone']))) 

//verifica os campos obrigatórios
if(isset($_POST['nome']) && !empty($_POST['nome'])&&
   isset($_POST['adress']) && !empty($_POST['adress'])&&
   isset($_POST['email']) && !empty($_POST['email'])&&
   isset($_POST['assunto']) && !empty($_POST['assunto'])&&
   isset($_POST['sms']) && !empty($_POST['sms']))  
   {
    // faz conexão ao servidor MySQL
	  $conec = mysqli_connect($host,$user,$pw,$db) or die ("<h2><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Problema ao conectar ao servidor!</h2>");
	  
    // conectar ao banco de dados
	  /* @mysql_select_db($conec,$db)or die ("<h2>Não foi possível conectar ao Banco de Dados!</h2>");
	     OBS: com @ antes da função não será exibido o erro
    */
       mysqli_select_db($conec,$db)or die ("<h2><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Não foi possível conectar ao Banco de Dados!</h2>");
    
    // realiza operação de inserção no DB.
     mysqli_query($conec, "INSERT INTO contato_msf_brasil(NAME,ADRESS,PHONE,EMAIL, MATTER, MESSAGE)
     VALUES('$_POST[nome]','$_POST[adress]','$_POST[phone]','$_POST[email]','$_POST[assunto]','$_POST[sms]'");
	 
     echo ("<h3><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sua Mensagem foi enviada com sucesso!<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Obrigado pelo contato!</h3>"); 
	 
    // mostra os dados de contato
     echo "&nbsp;&nbsp;&nbsp;&nbsp; NOME:&nbsp;&nbsp; ".$_POST['nome']."<br>";  
     echo "&nbsp;&nbsp;&nbsp;&nbsp; ENDERECO:&nbsp;&nbsp; ".$_POST['adress']."<br>";    
     echo "&nbsp;&nbsp;&nbsp;&nbsp; EMAIL:&nbsp;&nbsp; ".$_POST['email']."<br>"; 
     echo "&nbsp;&nbsp;&nbsp;&nbsp; CONTATO: &nbsp;&nbsp;".$_POST['phone']."<br>"; 
     echo "&nbsp;&nbsp;&nbsp;&nbsp; ASSUNTO: &nbsp;&nbsp;".$_POST['assunto']."<br>"; 
     echo "&nbsp;&nbsp;&nbsp;&nbsp; MENSAGEM:&nbsp;&nbsp; ".$_POST['sms']."<br>"; 

           
   }
   else{
    /* Esta parte é executada somente se um ou mais campos 
       obrigatórios não forem preenchidos */

	    echo ("<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>AVISO: preenchimento invalido!<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Verifique os campos obrigatorios!</h2>");
    
      // echo("<h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br>AVISO: preenchimento invalido!<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Verifique os campos obrigatorios!</h2>");
      // echo "<a href="../_pages/contato.html" style="text-decoration: none; text-transform: uppercase; color: #007236;">Voltar</a>";
      // echo ("<a href="../_pages/contato.html" style="font-weight: 900; font-size: 13pt; text-decoration: none; text-transform: uppercase; color: #007236; margin: 50px 0 10% 10%;">Voltar</a>");
   }
?>