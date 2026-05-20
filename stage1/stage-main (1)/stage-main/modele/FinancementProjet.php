<?php

class FinancementProjet {
    private int $id_financement;
    private string $type_financement;
    private float $montant_sollicite;
    private int $id_dossier;

    public function __construct(int $id_financement, string $type_financement, float $montant_sollicite, int $id_dossier) {
        $this->id_financement = $id_financement;
        $this->type_financement = $type_financement;
        $this->montant_sollicite = $montant_sollicite;
        $this->id_dossier = $id_dossier;
    }

    // Getters
    public function getIdFinancement(): int {
        return $this->id_financement;
    }

    public function getTypeFinancement(): string {
        return $this->type_financement;
    }

    public function getMontantSollicite(): float {
        return $this->montant_sollicite;
    }

    public function getIdDossier(): int {
        return $this->id_dossier;
    }

    // Setters
    public function setTypeFinancement(string $type_financement): void {
        $this->type_financement = $type_financement;
    }

    public function setMontantSollicite(float $montant_sollicite): void {
        $this->montant_sollicite = $montant_sollicite;
    }

    public function setIdDossier(int $id_dossier): void {
        $this->id_dossier = $id_dossier;
    }
}
