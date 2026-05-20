<?php

class CategorieCharge {
    private int $id_categorie_charge;
    private string $libelle_categorie;

    // Getters
    public function getIdCategorieCharge(): int {
        return $this->id_categorie_charge;
    }

    public function getLibelleCategorie(): string {
        return $this->libelle_categorie;
    }

    // Setters
    public function setLibelleCategorie(string $libelle_categorie): void {
        $this->libelle_categorie = $libelle_categorie;
    }
}