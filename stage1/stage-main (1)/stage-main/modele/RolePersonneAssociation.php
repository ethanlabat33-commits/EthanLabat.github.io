<?php

class RolePersonneAssociation {
    public int $id_role;
    public string $role;

    // Getters
    public function getIdRole(): int {
        return $this->id_role;
    }

    public function getRole(): string {
        return $this->role;
    }

    // Setters
    public function setIdRole(int $id_role): void {
        $this->id_role = $id_role;
    }
    public function setRole(string $role): void {
        $this->role = $role;
    }
       public static function fromArray(array $data): self {
        $instance = new self();
        $instance->setIdRole($data['id_role'] ?? 0);
        $instance->setRole($data['role'] ?? '');
        return $instance;
    }
}