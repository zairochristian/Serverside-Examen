<?php include("connect.php");
		// $users = contentBd();
		// var_dump ($users);

$errors = [];if(!empty($_POST)){ 
	if(empty($_POST["firstName"])){
	 $errors["firstName"] = "vous n'avez pas renseigné votre prénom"; 
	 }    
	 if(empty($_POST["lastName"])){
	$errors["lastName"] = "vous n'avez pas renseigné votre nom";
	}    
	elseif(empty($_POST["email"])){ 
	$errors["email"] = "vous n'avez pas renseigné votre email";
	}else{
		if(!empty($_POST['email'])){	

			$connection = DatabaseConnection::get();
			$sql = "SELECT COUNT(*) AS total FROM tfeUser WHERE email = :email";
			$prepared = $connection->prepare($sql);
			$prepared->bindValue("email", strip_tags($_POST["email"]));
			$prepared->execute();
			$data = $prepared->fetch();
			if(!empty($data['total'])){
				$errors['email'] = 'Cet email est déjà dans la base de donnée';
			}
		}
	} 
	var_dump ($errors);    
	if(empty($errors)) {
	addLogin($_POST["firstName"], $_POST["lastName"], $_POST["email"]); 
	 }

	}
	// $errors = array();

	// Gérer les erreurs
	
	
		// if(!empty($_POST)){
		// 	// if(empty($_POST['login'])){
		// 	// 	$errors['login'] = 'Le login est obligatoire';
		// 	// }
		// 	// if(empty($_POST['password'])){
		// 	// 	$errors['password'] = 'Le mot de passe est obligatoire';
		// 	// }
		// 	if(empty($_POST['firstName'])){
		// 		$errors['firstName'] = 'Votre prénom est obligatoire';
		// 	}
		// 	if(empty($_POST['lastName'])){
		// 		$errors['lastName'] = 'Votre nom est obligatoire';
		// 	}
		
	
		// Vérifie que le login entré par l'user n'est pas déjà pris
	
		// if(!empty($_POST['email'])){	

		// 	$connection = DatabaseConnection::get();
		// 	$sql = "SELECT COUNT(*) AS total FROM tfeUser WHERE email = :email";
		// 	$prepared = $connection->prepare($sql);
		// 	$prepared->bindValue("email", strip_tags($_POST["email"]));
		// 	$prepared->execute();
		// 	$data = $prepared->fetch();
		// 	if(!empty($data['total'])){
		// 		$errors['email'] = 'Cet email est déjà dans la base de donnée';
		// 	}
		// }
	
		// Si pas d'erreur on ajoute le nouvel utilisateur dans la db
		if(empty($errors)){
		if(addLogin($_POST['firstName'],$_POST['lastName'],$_POST['email'])){
		echo " Merci" ." ".htmlspecialchars($_POST["firstName"])." ".htmlspecialchars($_POST["lastName"])." "."pour l'intérêt que tu porte à la consultation de mon travail";
		
		 	}
		}
	?>
	
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Landing page tfe | christian YOSSA TIANI</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="initial-scale=1">
		<!-- build:css main.min.css -->
		<link rel="stylesheet" href="main.css" />
		<!-- endbuild -->
		<!-- a supprimer https://anthonypauwels.be/quarantedeux/metadatas/ -->
		<!-- Méta Google -->
		<meta name="title" content="" />
		<meta name="description" content="" />
		<!-- Métas Facebook Opengraph -->
		<meta property="og:title" content="" />
		<meta property="og:description" content="" />
		<meta property="og:url" content="" />
		<meta property="og:image" content="" />
		<meta property="og:type" content="website"/>
		<!-- Métas Twitter Card -->
		<meta name="twitter:title" content="" />
		<meta name="twitter:description" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:image" content="" />
	</head>
	<body>
		<div class="container">
			<header>
				<h1 class="title">Welcome to the presentation page
de weblanguage.</h1>
			</header>
			<section class="pageFormulaire">
				<div class="bloc1-form">
					<a href="">WebLanguage</a>
					Hello my friend! 
						<br>		
					Complete this form and is the first one to see my tfe when I would have him put on-line.
					</p>
					<P>It is my first time to use git and github in workflow</P>
				</div>
				<div class="form" >
					<form  method="POST">
						<div class="form__el">
							<label for="text">Fisrt name*</label>
							<input type="text" name="firstName" placeholder="your first name" >
						</div class="form__el">
						<div>
							<label for="text">Last name*</label>
							<input type="text" name="lastName" placeholder="your last name" >
						</div>
						<div class="form__el">
							<label for="email">Enter your email*</label>
							<input type="text" name="email" placeholder="your email" >
						</div>
						<div class="form__el">
							<input class="submit" type="submit" value="Subscribe">
						</div>
					</form>
				</div>
			</section>
			
		</div>
		<script src="assets/js/app.js"></script>
	</body>
</html>
