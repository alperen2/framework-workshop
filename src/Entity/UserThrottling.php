<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(
    name: 'users_throttling',
    uniqueConstraints: [new ORM\UniqueConstraint(name: 'bucket', columns: ['bucket'])],
    indexes: [new ORM\Index(name: 'expires_at', columns: ['expires_at'])]
)]
class UsersThrottling
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 44, options: ['fixed' => true])]
    private string $bucket;

    #[ORM\Column(type: 'float', options: ['unsigned' => true])]
    private float $tokens;

    #[ORM\Column(type: 'integer', options: ['unsigned' => true], name:'replenished_at')]
    private int $replenishedAt;

    #[ORM\Column(type: 'integer', options: ['unsigned' => true], name:'expires_at')]
    private int $expiresAt;

    public function getBucket(): string {
        return $this->bucket;
    }

    public function setBucket(string $bucket): self {
        $this->bucket = $bucket;
        return $this;
    }

    public function getTokens(): float {
        return $this->tokens;
    }

    public function setTokens(float $tokens): self {
        $this->tokens = $tokens;
        return $this;
    }

    public function getReplenishedAt(): int {
        return $this->replenishedAt;
    }

    public function setReplenishedAt(int $replenishedAt): self {
        $this->replenishedAt = $replenishedAt;
        return $this;
    }

    public function getExpiresAt(): int {
        return $this->expiresAt;
    }

    public function setExpiresAt(int $expiresAt): self {
        $this->expiresAt = $expiresAt;
        return $this;
    }
}
