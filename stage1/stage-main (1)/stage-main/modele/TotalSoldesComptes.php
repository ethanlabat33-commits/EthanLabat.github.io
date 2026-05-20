<?php

class TotalSoldesComptes {
    private int $id_total_soldes;
    private float $montant_total_solde;
    private int $id_dossier;

    public function __construct(int $id_total_soldes, float $montant_total_solde, int $id_dossier) {
        $this->id_total_soldes = $id_total_soldes;
        $this->montant_total_solde = $montant_total_solde;
        $this->id_dossier = $id_dossier;
    }

    // Getters
    public function getIdTotalSoldes(): int {
        return $this->id_total_soldes;
    }

    public function getMontantTotalSolde(): float {
        return $this->montant_total_solde;
    }

    public function getIdDossier(): int {
        return $this->id_dossier;
    }

    // Setters
    public function setMontantTotalSolde(float $montant_total_solde): void {
        $this->montant_total_solde = $montant_total_solde;
    }

    public function setIdDossier(int $id_dossier): void {
        $this->id_dossier = $id_dossier;
    }
}
