<div>
  <h1>Connexion</h1>
  <form method="post">

    <?php if(isset($errors['email'])): ?>
    <p class="alert"><?= $errors['email'] ?></p>
    <?php endif; ?>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Email">

    <?php if(isset($errors['password'])): ?>
    <p class="alert"><?= $errors['password'] ?></p>
    <?php endif; ?>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Password">

    <button name="login">Se connecter</button>
  </form>
  <p>Pas encore de compte ? <a href="./register">Créer un compte</a></p>
</div>
