<?php

class Produit {
    private int $id_produit;
    private string $description;
    private ?float $montant_exercice_ecoule;
    private ?float $montant_previsionnel;
    private ?int $id_dossier;
    private ?int $id_CategProduit;

    // Getters
    public function getIdProduit(): int {
        return $this->id_produit;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getMontantExerciceEcoule(): ?float {
        return $this->montant_exercice_ecoule;
    }

    public function getMontantPrevisionnel(): ?float {
        return $this->montant_previsionnel;
    }

    public function getIdDossier(): ?int {
        return $this->id_dossier;
    }

    public function getIdCategProduit(): ?int {
        return $this->id_CategProduit;
    }

    // Setters
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setMontantExerciceEcoule(?float $montant_exercice_ecoule): void {
        $this->montant_exercice_ecoule = $montant_exercice_ecoule;
    }

    public function setMontantPrevisionnel(?float $montant_previsionnel): void {
        $this->montant_previsionnel = $montant_previsionnel;
    }

    public function setIdDossier(?int $id_dossier): void {
        $this->id_dossier = $id_dossier;
    }

    public function setIdCategProduit(?int $id_CategProduit): void {
        $this->id_CategProduit = $id_CategProduit;
    }
}