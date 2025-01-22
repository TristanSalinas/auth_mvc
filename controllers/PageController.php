<?php
class PageController
{
  public function showEspacePerso(): void
  {
    if (!isset($_SESSION['userId'])) {
      $route = 'notConnected';
      require 'templates/layouts/layout.phtml';
      return;
    }

    $route = 'espace-perso';
    require 'templates/layouts/layout.phtml';
  }

  private function handleAlreadyConnected(): void
  {
    if (isset($_SESSION['userId'])) {
      $route = 'alreadyConnected';
      require 'templates/layouts/layout.phtml';
      exit;
    }
  }

  public function showInscriptionForm(): void
  {
    $this->handleAlreadyConnected();

    $route = 'inscription';
    require 'templates/layouts/layout.phtml';
  }

  public function showConnexionForm(): void
  {
    $this->handleAlreadyConnected();
    $route = 'connexion';
    require './templates/layouts/layout.phtml';
  }

  public function notFound(): void
  {
    $route = 'notFound';
    require 'templates/layouts/layout.phtml';
  }
}
