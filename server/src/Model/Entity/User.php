<?php

namespace App\Model\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Link;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[Get(
    uriTemplate: '/user/{userId}',
    uriVariables: [
        'userId' => new Link(fromClass: User::class)
    ]
)]
#[ORM\Entity]
class User implements UserInterface, PasswordAuthenticatedUserInterface {
    #[ORM\Id]
    #[ORM\Column(
        length: 36,
        options: [
            'fixed'=> true,
        ]
    )]
    #[ORM\GeneratedValue]
    public readonly string $id;

    #[ORM\Column(unique: true)]
    #[Assert\NotBlank]
    #[Assert\Email]
    public ?string $email = null;

    #[ORM\Column]
    #[Ignore]
    private string $password;

    public function __construct() {
        $this->id = Uuid::v4()->toRfc4122();
    }

    public function getId(): string {
        return $this->id;
    }

    public function getRoles(): array {
        return [];
    }

    public function eraseCredentials(): void {}

    #[Ignore]
    public function getUserIdentifier(): string {
        return $this->id;
    }

    public function getPassword(): ?string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }
}
