<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href='../styles.css'>
  <link rel="stylesheet" type="text/css" href='./NewProduct.css'>
  <title>Novo produto</title>
</head>
<body>
  <h2 class="title">Cadastrar produto</h2>
 
  <!-- cria formulario -->
  <!-- esconde as informaçoes da url, da acesso as informaçoes para a outra pg  -->
  <!-- chama a pagina inicia para passar para a outra pg -->
  <form 
    class="product-form" 
    method="POST" 
    action="../index.php" 
  >

    <div class="input">
      <label> Nome do produto </label>
      <input id="productName" type="text" name="productName" required>
    </div>
    <div class="input"> 
      <label> Preço do produto </label>
      <input id="productPrice" type="number" name="productPrice"  required>
      <!-- name declara uma variavel com o mesmo nome do input, e so é possivel acessar a var com o nome (name) -->
    </div>
    <button 
      type="submit" 
      class="add-product-button"
    >
      Adicionar
    </button>
  </form>
</body>
</html>
