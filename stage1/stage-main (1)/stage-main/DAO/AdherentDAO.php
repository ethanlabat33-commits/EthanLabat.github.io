<?php
require_once __DIR__ . '/../config/accesDonnees.php';

class AdherentDAO {
    private $db;
    private $table = 'adherent';

    public function __construct() {
        // adapte la connexion selon ta config
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllAdherents() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY nom, prenom";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouterAdherent(string $nom, string $prenom, int $age, string $genre, string $commune, int $nombre_adherents) {
        $sql = "INSERT INTO " . $this->table . " (nom, prenom, age, genre, commune, nombre_adherents) 
                VALUES (:nom, :prenom, :age, :genre, :commune, :nombre_adherents)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':age' => $age,
            ':genre' => $genre,
            ':commune' => $commune,
            ':nombre_adherents' => $nombre_adherents
        ]);
    }

    public function modifierAdherent(int $id, string $nom, string $prenom, int $age, string $genre, string $commune, int $nombre_adherents): bool {
        $sql = "UPDATE " . $this->table . " 
                SET nom = :nom, prenom = :prenom, age = :age, genre = :genre, commune = :commune, nombre_adherents = :nombre_adherents 
                WHERE id_adherent = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':age' => $age,
            ':genre' => $genre,
            ':commune' => $commune,
            ':nombre_adherents' => $nombre_adherents,
            ':id' => $id
        ]);
    }

    public function supprimerAdherentParId(int $id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id_adherent = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAdherentParId(int $id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id_adherent = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
