<?php

class Adhesion
{
    private int $id_adhesion;
    private float $montant;
    private string $details;
    private int $id_dossier;
    private int $id_type_adhesion;

    public function __construct(
        int $id_adhesion,
        float $montant,
        string $details,
        int $id_dossier,
        int $id_type_adhesion
    ) {
        $this->id_adhesion = $id_adhesion;
        $this->montant = $montant;
        $this->details = $details;
        $this->id_dossier = $id_dossier;
        $this->id_type_adhesion = $id_type_adhesion;
    }

    // Getters
    public function getIdAdhesion(): int
    {
        return $this->id_adhesion;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function getDetails(): string
    {
        return $this->details;
    }

    public function getIdDossier(): int
    {
        return $this->id_dossier;
    }

    public function getIdTypeAdhesion(): int
    {
        return $this->id_type_adhesion;
    }

    // Setters
    public function setMontant(float $montant): void
    {
        $this->montant = $montant;
    }

    public function setDetails(string $details): void
    {
        $this->details = $details;
    }

    public function setIdDossier(int $id_dossier): void
    {
        $this->id_dossier = $id_dossier;
    }

    public function setIdTypeAdhesion(int $id_type_adhesion): void
    {
        $this->id_type_adhesion = $id_type_adhesion;
    }
}
