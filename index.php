<?php
    // inicia uma sessao, para guardar variaveis e recuperar depois
    // if para caso nao exista uma sessao, caso exista ele puxa essa sessao iniciada

  session_start();
  if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = array();
  }

  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href='./styles.css' />

  <title>Cart do cezinha</title>
</head>
<body>
  <h2 class="title">Carrinho</h2>

  <?php 
    // puxa as variaveis da pg anterior com o post
    $productName = @$_POST['productName'];
    $productPrice = @$_POST['productPrice'];

    // cria um contador para verificar a quantidade de produtos adicionados
    $_SESSION['contador'] = count($_SESSION['products']);

    // o novo produto é declarado com um novo array
    $productsTemp = array();

    // verifica se um produto com o mesmo nome já existe
    for ($i=0; $i < $_SESSION['contador']; $i++) { 
    // caso o produto exista, ele retorna um erro informando que ja o produto existe
      if($_SESSION['products'][$i]['name'] == $productName) {
  ?>
        <div class="error">
            <!-- informador de erro  -->
          <span> O produto já existe!</span>
          <a href="http://localhost/Carrinho_PHP/NewProduct">Tente outro produto</a>
        </div>;
  <?php
        return;
      }
    }

    // caso o produto nao exista ele adiciona ao array de produtos
    if($productName){
      $productsTemp['name'] = $productName;
      $productsTemp['price'] = $productPrice;
      array_push($_SESSION['products'], $productsTemp);
    }
      echo '<div class="products">';

    //   mostra cada produto existente no array produtos
    foreach($_SESSION['products'] as $product => $value){
  ?>
    <div class="product">
      <h2 class="product-name">
        <?php echo $value['name']?>
      </h2>
      <span class="product-price">R$:<?php echo $value['price']?></span>
      <!-- manda o id_produto pela url para adicionar ao carrinho -->
      <a href="?adicionar=<?php echo $product?>" class="add-to-cart">Adicionar ao carrinho</a>
    </div>
  <?php
    }
    echo '</div>';
  ?>

  <?php
    if(isset($_GET['adicionar'])){
    //  verifica se esta vindo algo pelo get
    //   a variavel pega o valor do get e adiciona a ela mesma 
      $idProduct = (int) $_GET['adicionar'];

    //   verifica se existe algum produto com o mesmo id vindo atraves do get id_produto
      if(isset($_SESSION['products'][$idProduct])){
        // verifica se o produto ja foi adicionado ao carrinho
        // caso ja tenho sido adicionado, a quantidade ++
        if(isset($_SESSION['cart'][$idProduct])){
        $_SESSION['cart'][$idProduct]['quantity']++;
      }else{
        // caso produto nao tenha sido adiciondo, ele adiciona ao carrinho
        // entra na sessao carrinho no indice com o mesmo id_produto, declara um array nesse indice e dentro do array ele adiciona
        // um campo de quantidade com o padrao = 1, adiciona o nome_produto e o preço
        $_SESSION['cart'][$idProduct] = array('quantity'=>1, 'name'=>$_SESSION['products'][$idProduct]['name'],'price'=>$_SESSION['products'][$idProduct]['price']);
      }
        echo '<script>alert("o item foi adicionado ao carrinho.");</script>';
      }else{
        die('Voce não pode adicionar um item que não existe.');
      }
    }
  ?>

  <a class='add-NewProduct' href="http://localhost/Carrinho_PHP/NewProduct">Adicionar um novo produto para vender</a>

  <?php
    echo '<div class="cart">';
    // mostra os itens dentro do carrinho
    foreach ($_SESSION['cart'] as $key => $value) {
      echo '<div class="carrinho-item">';
      echo '<p>Nome: '.$value['name'].' | quantidade: '.$value['quantity'].' | Preço: R$:'.($value['quantity']*$value['price']).'</p>';
      echo '</div>';
    }
    echo '</div>';
  ?>
</body>
</html>