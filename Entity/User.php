<?php

declare(strict_types=1);

namespace Silimium\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="u_user")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private string $id;

    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    private string $username;

    /**
     * @var string[]
     *
     * @ORM\Column(type="json", nullable=false)
     */
    private array $roles;

    public static function create(
        string $username,
        array $roles
    ): self {
        $self = new self();
        $self->username = $username;
        $self->roles = $roles;

        return $self;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPassword(): ?string
    {
        return null;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {

    }
}
