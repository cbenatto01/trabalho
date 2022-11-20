<!DOCTYPE html>

<html>
   <head>
      <meta charset="utf-8">
      <title>
	     Folha de Pagamento
      </title>
   </head>
   <body>
      <center><strong>Folha de Pagamento</strong></center>
      <form action = "calculo.php" method = "post">
	     <table>
		    <tr>
			   <td>Funcionário</td>
			   <td><input type="text" name="funcionario" size = "50" maxlength="50" style="text-transform:uppercase" required></td>
			</tr>
			<tr>
			   <td>Mês</td>
			   <td><input type="text" name="mes" size = "5" maxlength="2" required></td>
			</tr>
			<tr>
			   <td>Ano:</td>
			   <td><input type="text" name="ano" size = "5" maxlength="4" required></td>
			</tr>
			<tr>
			   <td>Horas trabalhadas</td>
			   <td><input type="text" name="horas" size = "5" maxlength="3" required></td>
			</tr>			
			<tr>
			   <td>Valor da hora</td>
			   <td><input type="text" name="valor" size = "10" maxlength="10" required></td>
			</tr>
		 </table> <br><br>
		 <input type="submit" value="Calcular folha">
		 <br><br>
      </form> 	  	  
   </body>
</html>
