<?php
	function __autoload($class_name){
		require_once 'classes/' . $class_name . '.php';
	}
?>

<!DOCTYPE HTML>
<html land="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Rodrigo - Crud</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">

		<?php
	
		$usuario = new Usuarios();

		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$email = $_POST['email'];
			$cpf = $_POST['cpf'];
			$endereco = $_POST['endereco'];
			$complemento = $_POST['complemento'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$cep = $_POST['cep'];
			$telefone = $_POST['telefone'];

			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setCpf($cpf);
			$usuario->setEndereco($endereco);
			$usuario->setComplemento($complemento);
			$usuario->setBairro($bairro);
			$usuario->setCidade($cidade);
			$usuario->setEstado($estado);
			$usuario->setCep($cep);
			$usuario->setTelefone($telefone);

			# Insert
			if($usuario->insert()){
				echo "Inserido com sucesso!";
			}
			else{
				echo "CPF ou Email já consta no sistema";
			}

		endif;

		?>

		<header class="masthead">
			<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Pagina Inicial</a></li>
    </ul>
  </div>
</nav>
		</header>
	<?php 
		if(isset($_POST['atualizar'])):
			$id = $_POST['id'];
			$nome  = $_POST['nome'];
			$email = $_POST['email'];
			$cpf = $_POST['cpf'];
			$endereco = $_POST['endereco'];
			$complemento = $_POST['complemento'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$cep = $_POST['cep'];
			$telefone = $_POST['telefone'];

			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setCpf($cpf);
			$usuario->setEndereco($endereco);
			$usuario->setComplemento($complemento);
			$usuario->setBairro($bairro);
			$usuario->setCidade($cidade);
			$usuario->setEstado($estado);
			$usuario->setCep($cep);
			$usuario->setTelefone($telefone);

			if($usuario->update($id)){
				echo "Atualizado com sucesso!";
			}
			else{
				echo "CPF ou Email já consta no sistema";
			}

		endif;
		?>
		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($usuario->delete($id)){
				echo "Deletado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){ 

			$id = (int)$_GET['id'];
			$resultado = $usuario->find($id);
		?>

		<form method="post" action="">
			<div class="container">
			<div class="row">
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">Nome</div>
									<input type="text" name="nome" value="<?php echo $resultado->nome; ?>" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Email</div>
									<input type="text" name="email" value="<?php echo $resultado->email; ?>" class="input" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">CPF</div>
									<input type="text" name="cpf" value="<?php echo $resultado->cpf; ?>" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Endereço</div>
									<input type="text" name="endereco" value="<?php echo $resultado->endereco; ?>" class="input" required> 
								</div>
							</div>
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">Complemento</div>
									<input type="text" name="complemento" value="<?php echo $resultado->complemento; ?>" class="input">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Bairro</div>
									<input type="text" name="bairro" value="<?php echo $resultado->bairro; ?>"  class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Cidade</div>
									<input type="text" name="cidade" value="<?php echo $resultado->cidade; ?>" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Estado</div>
									<input type="text" name="estado" value="<?php echo $resultado->estado; ?>" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">CEP</div>
									<input type="text" name="cep" class="input" value="<?php echo $resultado->cep; ?>" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Telefone</div>
									<input type="text" name="telefone" value="<?php echo $resultado->telefone; ?>" class="input" required>
								</div>
							</div>
						</div>
			<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">

			<br />
			<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">	
		</div>
		</form>

		<?php }else{ ?>


		<form method="post" action="">
			<div class="container">

<div class="row">
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">Nome</div>
									<input type="text" name="nome" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Email</div>
									<input type="text" name="email" class="input" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">CPF</div>
									<input type="text" name="cpf" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Endereço</div>
									<input type="text" name="endereco" class="input" required> 
								</div>
							</div>
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">Complemento</div>
									<input type="text" name="complemento" class="input">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Bairro</div>
									<input type="text" name="bairro" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Cidade</div>
									<input type="text" name="cidade" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Estado</div>
									<input type="text" name="estado" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">CEP</div>
									<input type="text" name="cep" class="input" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Telefone</div>
									<input type="text" name="telefone" class="input" required>
								</div>
							</div>
						</div>

			<br />
			<input type="submit" name="cadastrar" class="button" value="Cadastrar dados">	
			</div>		
		</form>

		<?php } ?>

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Nome:</th>
					<th>E-mail:</th>
					<th>Ações:</th>
				</tr>
			</thead>
			
			<?php foreach($usuario->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->nome; ?></td>
					<td><?php echo $value->email; ?></td>
					<td>
						<?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
						<?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
					</td>
				</tr>
			</tbody>

			<?php endforeach; ?>

		</table>

	</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.js"></script>
	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>
</body>
</html>