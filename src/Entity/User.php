<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 249)]
    private string $email;

    #[ORM\Column(type: 'string', length: 255)]
    private string $password;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(type: 'smallint', options: ["default" => 0])]
    private int $status = 0;

    #[ORM\Column(type: 'boolean')]
    private bool $verified = false;

    #[ORM\Column(type: 'boolean', options: ["default" => 0])]
    private bool $resettable = true;

    #[ORM\Column(type: 'integer', options: ["default" => 0])]
    private int $roles_mask = 0;

    #[ORM\Column(type: 'integer')]
    private int $registered;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $last_login = null;

    #[ORM\Column(type: 'integer', options: ["default" => 0])]
    private int $force_logout = 0;

    /**
     * Get the value of id
     *
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param ?int $id
     *
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of username
     *
     * @return ?string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @param ?string $username
     *
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of status
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param int $status
     *
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of verified
     *
     * @return bool
     */
    public function getVerified(): bool
    {
        return $this->verified;
    }

    /**
     * Set the value of verified
     *
     * @param bool $verified
     *
     * @return self
     */
    public function setVerified(bool $verified): self
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get the value of resettable
     *
     * @return bool
     */
    public function getResettable(): bool
    {
        return $this->resettable;
    }

    /**
     * Set the value of resettable
     *
     * @param bool $resettable
     *
     * @return self
     */
    public function setResettable(bool $resettable): self
    {
        $this->resettable = $resettable;

        return $this;
    }

    /**
     * Get the value of roles_mask
     *
     * @return int
     */
    public function getRolesMask(): int
    {
        return $this->roles_mask;
    }

    /**
     * Set the value of roles_mask
     *
     * @param int $roles_mask
     *
     * @return self
     */
    public function setRolesMask(int $roles_mask): self
    {
        $this->roles_mask = $roles_mask;

        return $this;
    }

    /**
     * Get the value of registered
     *
     * @return int
     */
    public function getRegistered(): int
    {
        return $this->registered;
    }

    /**
     * Set the value of registered
     *
     * @param int $registered
     *
     * @return self
     */
    public function setRegistered(int $registered): self
    {
        $this->registered = $registered;

        return $this;
    }

    /**
     * Get the value of last_login
     *
     * @return ?int
     */
    public function getLastLogin(): ?int
    {
        return $this->last_login;
    }

    /**
     * Set the value of last_login
     *
     * @param ?int $last_login
     *
     * @return self
     */
    public function setLastLogin(?int $last_login): self
    {
        $this->last_login = $last_login;

        return $this;
    }

    /**
     * Get the value of force_logout
     *
     * @return int
     */
    public function getForceLogout(): int
    {
        return $this->force_logout;
    }

    /**
     * Set the value of force_logout
     *
     * @param int $force_logout
     *
     * @return self
     */
    public function setForceLogout(int $force_logout): self
    {
        $this->force_logout = $force_logout;

        return $this;
    }
}

