<?php

class Remarque {
    private int $id_remarque;
    private string $texte;
    private int $id_dossier;

    public function __construct(int $id_remarque, string $texte, int $id_dossier) {
        $this->id_remarque = $id_remarque;
        $this->texte = $texte;
        $this->id_dossier = $id_dossier;
    }

    // Getters
    public function getIdRemarque(): int {
        return $this->id_remarque;
    }

    public function getTexte(): string {
        return $this->texte;
    }

    public function getIdDossier(): int {
        return $this->id_dossier;
    }

    // Setters
    public function setTexte(string $texte): void {
        $this->texte = $texte;
    }

    public function setIdDossier(int $id_dossier): void {
        $this->id_dossier = $id_dossier;
    }
}
