<div>
  <h1>Inscription</h1>
  <form method="post" action="#submit">

    <?php if(isset($errors['firstname'])): ?>
    <p class="alert"><?= $errors['firstname'] ?></p>
    <?php endif; ?>
    
    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname" placeholder="Firstname">

    <?php if(isset($errors['lastname'])): ?>
    <p class="alert"><?= $errors['lastname'] ?></p>
    <?php endif; ?>

    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="lastname" placeholder="Lastname">

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

    <button name="register">Inscription</button>
  </form>
  <p>Déjà un compte ? <a href="./login">Se connecter</a></p>
</div>
