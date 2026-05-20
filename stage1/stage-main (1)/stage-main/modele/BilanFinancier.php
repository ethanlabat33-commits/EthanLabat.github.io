<?php

class BilanFinancier {
    private int $id_bilan_financier;
    private int $annee_exercice;
    private float $total_charges_exercice_ecoule;
    private float $total_charges_previsionnel;
    private float $total_produits_exercice_ecoule;
    private float $total_produits_previsionnel;
    private float $resultat_exercice_ecoule;
    private float $resultat_previsionnel;
    private ?int $id_dossier;

    // Getters
    public function getIdBilanFinancier(): int {
        return $this->id_bilan_financier;
    }

    public function getAnneeExercice(): int {
        return $this->annee_exercice;
    }

    public function getTotalChargesExerciceEcoule(): float {
        return $this->total_charges_exercice_ecoule;
    }

    public function getTotalChargesPrevisionnel(): float {
        return $this->total_charges_previsionnel;
    }

    public function getTotalProduitsExerciceEcoule(): float {
        return $this->total_produits_exercice_ecoule;
    }

    public function getTotalProduitsPrevisionnel(): float {
        return $this->total_produits_previsionnel;
    }

    public function getResultatExerciceEcoule(): float {
        return $this->resultat_exercice_ecoule;
    }

    public function getResultatPrevisionnel(): float {
        return $this->resultat_previsionnel;
    }

    public function getIdDossier(): ?int {
        return $this->id_dossier;
    }

    // Setters
    public function setAnneeExercice(int $annee_exercice): void {
        $this->annee_exercice = $annee_exercice;
    }

    public function setTotalChargesExerciceEcoule(float $total_charges_exercice_ecoule): void {
        $this->total_charges_exercice_ecoule = $total_charges_exercice_ecoule;
    }

    public function setTotalChargesPrevisionnel(float $total_charges_previsionnel): void {
        $this->total_charges_previsionnel = $total_charges_previsionnel;
    }

    public function setTotalProduitsExerciceEcoule(float $total_produits_exercice_ecoule): void {
        $this->total_produits_exercice_ecoule = $total_produits_exercice_ecoule;
    }

    public function setTotalProduitsPrevisionnel(float $total_produits_previsionnel): void {
        $this->total_produits_previsionnel = $total_produits_previsionnel;
    }

    public function setResultatExerciceEcoule(float $resultat_exercice_ecoule): void {
        $this->resultat_exercice_ecoule = $resultat_exercice_ecoule;
    }

    public function setResultatPrevisionnel(float $resultat_previsionnel): void {
        $this->resultat_previsionnel = $resultat_previsionnel;
    }

    public function setIdDossier(?int $id_dossier): void {
        $this->id_dossier = $id_dossier;
    }
}