<?php

class SoldeComptes {
    private int $id_solde_compte;
    private float $montant_solde;
    private int $id_dossier;

    public function __construct(int $id_solde_compte, float $montant_solde, int $id_dossier) {
        $this->id_solde_compte = $id_solde_compte;
        $this->montant_solde = $montant_solde;
        $this->id_dossier = $id_dossier;
    }

    // Getters
    public function getIdSoldeCompte(): int {
        return $this->id_solde_compte;
    }

    public function getMontantSolde(): float {
        return $this->montant_solde;
    }

    public function getIdDossier(): int {
        return $this->id_dossier;
    }

    // Setters
    public function setMontantSolde(float $montant_solde): void {
        $this->montant_solde = $montant_solde;
    }

    public function setIdDossier(int $id_dossier): void {
        $this->id_dossier = $id_dossier;
    }
}
