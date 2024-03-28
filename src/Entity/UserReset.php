<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(
    name: 'users_resets',
    uniqueConstraints: [new ORM\UniqueConstraint(name: 'selector', columns: ['selector'])],
    indexes: [new ORM\Index(name: 'user_expires', columns: ['user', 'expires'])]
)]
class UserReset
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint', options: ['unsigned' => true])]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    private int $user;

    #[ORM\Column(type: 'string', length: 20, options: ['fixed' => true])]
    private string $selector;

    #[ORM\Column(type: 'string', length: 255, options: ['fixed' => true])]
    private string $token;

    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    private int $expires;

    public function getId(): ?int {
        return $this->id;
    }

    public function getUser(): int {
        return $this->user;
    }

    public function setUser(int $user): self {
        $this->user = $user;
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
