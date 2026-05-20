<?php

class ProjetSubvention {
    private int $id_projet;
    private string $presentation_projet;
    private float $cout_total;
    private float $autofinancement;
    private int $id_dossier;

    public function __construct(int $id_projet, string $presentation_projet, float $cout_total, float $autofinancement, int $id_dossier) {
        $this->id_projet = $id_projet;
        $this->presentation_projet = $presentation_projet;
        $this->cout_total = $cout_total;
        $this->autofinancement = $autofinancement;
        $this->id_dossier = $id_dossier;
    }

    // Getters
    public function getIdProjet(): int {
        return $this->id_projet;
    }

    public function getPresentationProjet(): string {
        return $this->presentation_projet;
    }

    public function getCoutTotal(): float {
        return $this->cout_total;
    }

    public function getAutofinancement(): float {
        return $this->autofinancement;
    }

    public function getIdDossier(): int {
        return $this->id_dossier;
    }

    // Setters
    public function setPresentationProjet(string $presentation_projet): void {
        $this->presentation_projet = $presentation_projet;
    }

    public function setCoutTotal(float $cout_total): void {
        $this->cout_total = $cout_total;
    }

    public function setAutofinancement(float $autofinancement): void {
        $this->autofinancement = $autofinancement;
    }

    public function setIdDossier(int $id_dossier): void {
        $this->id_dossier = $id_dossier;
    }
}
