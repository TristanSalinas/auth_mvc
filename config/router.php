<?php

class Router
{
  public function handleRequest(array $get): void
  {
    $route = $get['route'] ?? 'connexion';

    switch ($route) {
      case 'connexion':
        (new PageController())->showConnexionForm();
        break;
      case 'check-connexion':
        (new AuthController())->handleConnexion();
        break;
      case 'inscription':
        (new PageController())->showInscriptionForm();
        break;
      case 'check-inscription':
        (new AuthController())->handleInscription();
        break;
      case 'espace-perso':
        (new PageController())->showEspacePerso();
        break;
      case 'deconnexion':
        (new AuthController())->handleDeconnexion();
        break;
      default:
        (new PageController())->notFound();
        break;
    }
  }
}
