<?php

class RessourcesHumaines {
    private int $id_ressources_humaines;
    private int $nombre_benevoles;
    private int $nombre_salaries_total;
    private int $nombre_salaries_autres;
    private int $nombre_salaries_temps_complet;
    private int $nombre_salaries_temps_non_complet;
    private int $nombre_heures_hebdomadaires_salaries;
    private ?int $id_dossier;

    // Getters
    public function getIdRessourcesHumaines(): int {
        return $this->id_ressources_humaines;
    }

    public function getNombreBenevoles(): int {
        return $this->nombre_benevoles;
    }

    public function getNombreSalariesTotal(): int {
        return $this->nombre_salaries_total;
    }

    public function getNombreSalariesAutres(): int {
        return $this->nombre_salaries_autres;
    }

    public function getNombreSalariesTempsComplet(): int {
        return $this->nombre_salaries_temps_complet;
    }

    public function getNombreSalariesTempsNonComplet(): int {
        return $this->nombre_salaries_temps_non_complet;
    }

    public function getNombreHeuresHebdomadairesSalaries(): int {
        return $this->nombre_heures_hebdomadaires_salaries;
    }

    // Setters
    public function setNombreBenevoles(int $nombre_benevoles): void {
        $this->nombre_benevoles = $nombre_benevoles;
    }

    public function setNombreSalariesTotal(int $nombre_salaries_total): void {
        $this->nombre_salaries_total = $nombre_salaries_total;
    }

    public function setNombreSalariesAutres(int $nombre_salaries_autres): void {
        $this->nombre_salaries_autres = $nombre_salaries_autres;
    }

    public function setNombreSalariesTempsComplet(int $nombre_salaries_temps_complet): void {
        $this->nombre_salaries_temps_complet = $nombre_salaries_temps_complet;
    }

    public function setNombreSalariesTempsNonComplet(int $nombre_salaries_temps_non_complet): void {
        $this->nombre_salaries_temps_non_complet = $nombre_salaries_temps_non_complet;
    }

    public function setNombreHeuresHebdomadairesSalaries(int $nombre_heures_hebdomadaires_salaries): void {
        $this->nombre_heures_hebdomadaires_salaries = $nombre_heures_hebdomadaires_salaries;
    }

    public static function fromArray(array $data): RessourcesHumaines {
    $ressources = new RessourcesHumaines();

    $ressources->id_ressources_humaines = $data['id_ressources_humaines'] ?? null;
    $ressources->nombre_benevoles = $data['nombre_benevoles'] ?? null;
    $ressources->nombre_salaries_total = $data['nombre_salaries_total'] ?? null;
    $ressources->nombre_salaries_autres = $data['nombre_salaries_autres'] ?? null;
    $ressources->nombre_salaries_temps_complet = $data['nombre_salaries_temps_complet'] ?? null;
    $ressources->nombre_salaries_temps_non_complet = $data['nombre_salaries_temps_non_complet'] ?? null;
    $ressources->nombre_heures_hebdomadaires_salaries = $data['nombre_heures_hebdomadaires_salaries'] ?? null;
    $ressources->id_dossier = $data['id_dossier'] ?? null;

    return $ressources;
}


}