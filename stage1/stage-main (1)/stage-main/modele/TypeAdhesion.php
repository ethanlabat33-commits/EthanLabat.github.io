<?php

class TypeAdhesion {
    private int $id_type_adhesion;
    private string $libelle_type;

    public function __construct(int $id_type_adhesion, string $libelle_type) {
        $this->id_type_adhesion = $id_type_adhesion;
        $this->libelle_type = $libelle_type;
    }

    // Getters
    public function getIdTypeAdhesion(): int {
        return $this->id_type_adhesion;
    }

    public function getLibelleType(): string {
        return $this->libelle_type;
    }

    // Setters
    public function setLibelleType(string $libelle_type): void {
        $this->libelle_type = $libelle_type;
    }
}
