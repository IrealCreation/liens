<!DOCTYPE html>
<html>
<head>
	<title><?= "Liens - " . $page_titre ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- Bootstrap icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<script src="<?= ROOTHTML ?>/lib/jquery.js" type="text/javascript"></script>
	<!-- Jquery UI -->
	<link href="<?= ROOTHTML ?>/lib/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<script src="<?= ROOTHTML ?>/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<!-- Summernote -->
	<link href="<?= ROOTHTML ?>/lib/summernote/summernote-lite.css" rel="stylesheet">
	<script src="<?= ROOTHTML ?>/lib/summernote/summernote-lite.js"></script>
	<!-- ToastrJS -->
	<link href="<?= ROOTHTML ?>/lib/toastr.min.css" rel="stylesheet">
	<script src="<?= ROOTHTML ?>/lib/toastr.min.js"></script>

	<!-- Custom -->
	<link href="<?= ROOTHTML ?>/style.css" rel="stylesheet" type="text/css">
	<script src="<?= ROOTHTML ?>/script.js"></script>
</head>
<body>
	<nav class="navbar sticky-top navbar-dark bg-dark">
		<div class="container-fluid">
			<h1 class="navbar-brand">Liens</h1>

		    <?php if(isset($user)) { ?>
			<ul class="navbar-nav">
		        <li class="nav-item">
		        	<a class="nav-link <?php if($title == 'Ajouter' || $title == 'Éditer') echo 'active'; ?>" href="<?= ROOTHTML ?>/note">Ajouter</a>
		        </li>
		        <li class="nav-item">
		        	<a class="nav-link <?php if($title == 'Liste') echo 'active'; ?>" href="<?= ROOTHTML ?>/liste">Consulter</a>
		        </li>
		        <li class="nav-item">
		        	<a class="nav-link <?php if($title == 'Thésaurus') echo 'active'; ?>" href="<?= ROOTHTML ?>/thesaurus">Thésaurus</a>
		        </li>
		    </ul>
		    <ul class="navbar-nav">
		    	<li>
		    		<a class="nav-link" href="#"><?= $user->login; ?></a>
		    	</li>
		    	<li>
		    		<a class="nav-link" href="<?= ROOTHTML ?>/logout">Déconnexion</a>
		    	</li>
		    </ul>
		    <?php }
		    else { ?>
		    <ul class="navbar-nav">
		        <li class="nav-item">
		        	<a class="nav-link <?php if($title == 'Connexion') echo 'active'; ?>" href="<?= ROOTHTML ?>/login">Connexion</a>
		        </li>
		    </ul>
		    <?php } ?>
		</div>
	</nav>
	
	<?php if(isset($_SESSION['message'])) { ?>
		<div class="container-fluid mt-3 mb-3">
			<div class="alert alert-<?= $_SESSION['message']['type'] ?>" role="alert">
				<?= $_SESSION['message']['texte'] ?>
			</div>
		</div>
		<?php unset($_SESSION['message']);
	} ?>