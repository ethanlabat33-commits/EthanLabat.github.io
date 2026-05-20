<?php

class Charge {
    private int $id_charge;
    private ?string $description; // Nullable
    private ?float $montant_exercice_ecoule; // Nullable
    private ?float $montant_previsionnel; // Nullable
    private ?int $id_dossier; // Nullable
    private ?int $id_categorie_charge; // Nullable

    // Getters
    public function getIdCharge(): int {
        return $this->id_charge;
    }

    public function getDescription(): ?string {
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

    public function getIdCategorieCharge(): ?int {
        return $this->id_categorie_charge;
    }

    // Setters
    public function setDescription(?string $description): void {
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

    public function setIdCategorieCharge(?int $id_categorie_charge): void {
        $this->id_categorie_charge = $id_categorie_charge;
    }
}