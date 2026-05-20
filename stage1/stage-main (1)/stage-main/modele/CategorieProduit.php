<?php

class CategorieProduit {
    private int $id_CategProduit;
    private string $libelle_CategProduit;

    // Getters
    public function getIdCategProduit(): int {
        return $this->id_CategProduit;
    }

    public function getLibelleCategProduit(): string {
        return $this->libelle_CategProduit;
    }

    // Setters
    public function setLibelleCategProduit(string $libelle_CategProduit): void {
        $this->libelle_CategProduit = $libelle_CategProduit;
    }
}