<?php

include('includes/header.php');

?>

<div class="container">

	<header class="flex">
		<p class="margin-right">Bienvenue sur l'application Comptes Bancaires</p>
		<p><a href="./logout">Se déconnecter</a></p>
	</header>

	<h1>Mon application bancaire</h1>
	<h2>Content de vous revoir, <?= $user->getFirstname() . $user->getLastname() ?></h2>

	<form class="newAccount" method="post">
		<label>Sélectionner un type de compte</label>
		<select class="" name="name" required>
			<option value="" disabled>Choisissez le type de compte à ouvrir</option>
			<?php foreach (Account::TYPE_LIST as $type) : ?>
			<option value="<?= $type ?>"><?= $type ?></option>
			<?php endforeach; ?>
		</select>
		<input type="submit" name="new" value="Ouvrir un nouveau compte">
	</form>

	<hr>

	<div class="main-content flex">

	<!-- Pour chaque compte enregistré en base de données, il faudra générer le code ci-dessous -->

	<?php if ($accounts) : foreach ($accounts as $account) : ?>

		<div class="card-container <?= $account->getBalance() < 0 ? 'alert' : '' ?>">

			<div class="card">
				<h3><strong><?= $account->getName() ?></strong></h3>
				<div class="card-content">


					<p>Somme disponible : <?= $account->getBalance() ?> €</p>

					<?php if ($account->getName() !== 'PEL') : ?>
					<!-- Formulaire pour dépot/retrait -->
					<h4>Dépot / Retrait</h4>
					<form method="post">

						<input type="hidden" name="id" value=" <?= $account->getId() ?>"  required>

						<label>Entrer une somme à débiter/créditer</label>
						<input type="number" name="balance" placeholder="Ex: 250" required>

						<input type="submit" name="payment" value="Créditer">
						<input type="submit" name="debit" value="Débiter">

					</form>


					<!-- Formulaire pour virement -->
			 		<form method="post">

						<h4>Transfert</h4>
						
						<label>Entrer une somme à transférer</label>
						<input type="number" name="balance" placeholder="Ex: 300"  required>
						<input type="hidden" name="idDebit" value="<?= $account->getId() ?>" required>
						
						<label for="">Sélectionner un compte pour le virement</label>
						<select name="idPayment" required>

							<option value="" disabled>Choisir un compte</option>

							<?php foreach ($accounts as $acc) : if ($acc->getId() !== $account->getId()) : ?>
							<option value="<?= $acc->getId() ?>"><?= $acc->getName() ?></option>
							<?php endif; endforeach; ?>
						
					</select>
						<input type="submit" name="transfer" value="Transférer l'argent">

					</form>
					<?php endif; ?>
					<!-- Formulaire pour suppression -->
			 		<form class="delete" method="post">
				 		<input type="hidden" name="id" value="<?= $account->getId() ?>"  required>
				 		<input type="submit" name="delete" value="Supprimer le compte">
			 		</form>

				</div>
			</div>
		</div>

	<?php endforeach; endif; ?>

	</div>

</div>

<?php

include('includes/footer.php');
