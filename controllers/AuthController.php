<?php


class AuthController
{
  public function handleConnexion(): void
  {
    $userManager = new UserManager();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $userManager->findUserByEmail($email);

    if ($user && password_verify($password, $user->getPassword())) {

      $_SESSION['userId'] = $user->getId();
      $_SESSION['userMail'] = $user->getEmail();

      header('Location: index.php?route=espace-perso');
    } else {
      echo "Identifiants incorrects";
    }
  }

  public function handleDeconnexion(): void
  {
    session_destroy();
    header('Location: index.php?route=connexion');
  }



  public function handleInscription(): void
  {
    $userManager = new UserManager();
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user = new User($email, $password);
    $userManager->createUser($user);

    header('Location: index.php?route=connexion');
  }
}
