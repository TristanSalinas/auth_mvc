<?php
require_once 'models/user.php';
require_once 'managers/abstract_manager.php';

class UserManager extends AbstractManager
{
  public function createUser(User $user): void
  {
    $query = $this->db->prepare(
      'INSERT INTO users (email, password) 
      VALUES (:email, :password)'
    );

    $parameters = [
      'email' => $user->getEmail(),
      'password' => $user->getPassword()
    ];

    $query->execute($parameters);
  }
  public function findUserByEmail(string $email): ?User
  {
    $query = $this->db->prepare(
      'SELECT * FROM users 
      WHERE email = :email'
    );

    $query->execute(['email' => $email]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if ($result) {
      $user = new User($result['email'], $result['password']);
      $user->setId($result['id']);
    }
    echo "alo";

    return $user;
  }
}
