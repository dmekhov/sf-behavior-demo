<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

use App\Infrastructure\Persistence\CycleORMUserRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity(
    repository: CycleORMUserRepository::class,
)]
#[Behavior\CreatedAt(field: 'createdAt', column: 'created_at')]
#[Behavior\UpdatedAt(field: 'updatedAt', column: 'updated_at')]
#[Behavior\SoftDelete(field: 'deletedAt', column: 'deleted_at')]
class User
{
    /** @psalm-suppress PropertyNotSetInConstructor */
    #[Column(type: 'primary')]
    private int $id;

    public function __construct(
        #[Column(type: 'string')]
        private string $username,
        #[Column(type: 'string')]
        private string $email,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
