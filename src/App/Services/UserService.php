<?php

declare(strict_types=1);

namespace App\Services;

use Dotenv\Exception\ValidationException as ExceptionValidationException;
use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService
{
  public function __construct(private Database $db)
  {
  }
  public function isEmailTaken(string $email)
  {
    $emailCount = $this->db->query(
      'SELECT COUNT(*) FROM users WHERE email = :email',
      [
        'email' => $email
      ]
    )->count();

    if ($emailCount > 0) {
      throw new ValidationException(['email' => 'Email already taken!']);
    }
  }
}
