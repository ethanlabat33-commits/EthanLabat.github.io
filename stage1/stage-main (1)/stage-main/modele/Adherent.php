<?php
class Adherent
{
    private int $id_adherent;
    private string $nom;
    private string $prenom;
    private int $age;
    private string $genre;
    private string $commune;
    private int $nombre_adherents;
    private int $id_dossier;

    public function __construct(
        int $id_adherent,
        string $nom,
        string $prenom,
        int $age,
        string $genre,
        string $commune,
        int $nombre_adherents,
        int $id_dossier
    ) {
        $this->id_adherent = $id_adherent;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->genre = $genre;
        $this->commune = $commune;
        $this->nombre_adherents = $nombre_adherents;
        $this->id_dossier = $id_dossier;
    }

    // Getters
    public function getIdAdherent(): int
    {
        return $this->id_adherent;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getCommune(): string
    {
        return $this->commune;
    }

    public function getNombreAdherents(): int
    {
        return $this->nombre_adherents;
    }

    public function getIdDossier(): int
    {
        return $this->id_dossier;
    }

    // Setters
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function setCommune(string $commune): void
    {
        $this->commune = $commune;
    }

    public function setNombreAdherents(int $nombre_adherents): void
    {
        $this->nombre_adherents = $nombre_adherents;
    }

    public function setIdDossier(int $id_dossier): void
    {
        $this->id_dossier = $id_dossier;
    }
}
