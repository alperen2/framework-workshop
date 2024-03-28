<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(
    name: 'users_confirmations',
    uniqueConstraints: [new ORM\UniqueConstraint(name: 'selector', columns: ['selector'])],
    indexes: [new ORM\Index(name: 'email_expires', columns: ['email', 'expires']), new ORM\Index(name: 'user_id', columns: ['user_id'])]
)]
class UserConfirmation
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer', options: ['unsigned' => true], name:'user_id')]
    private int $userId;

    #[ORM\Column(type: 'string', length: 249)]
    private string $email;

    #[ORM\Column(type: 'string', length: 16, options: ['fixed' => true])]
    private string $selector;

    #[ORM\Column(type: 'string', length: 255, options: ['fixed' => true])]
    private string $token;

    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    private int $expires;

    public function getId(): ?int {
        return $this->id;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function setUserId(int $userId): self {
        $this->userId = $userId;
        return $this;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    public function getSelector(): string {
        return $this->selector;
    }

    public function setSelector(string $selector): self {
        $this->selector = $selector;
        return $this;
    }

    public function getToken(): string {
        return $this->token;
    }

    public function setToken(string $token): self {
        $this->token = $token;
        return $this;
    }

    public function getExpires(): int {
        return $this->expires;
    }

    public function setExpires(int $expires): self {
        $this->expires = $expires;
        return $this;
    }
}
