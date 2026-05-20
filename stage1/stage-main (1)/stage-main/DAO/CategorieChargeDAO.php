<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/CategorieCharge.php';

class CategorieChargeDAO {
    private $db;
    private $table = 'categ_charge'; // Nom de la table des catégories de charges

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllCategoriesCharges() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id_categorie_charge DESC"; // Utilisation de id_categorie_charge
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, CategorieCharge::class);
    }

    public function ajouterCategorieCharge(array $data) {
        $sql = "INSERT INTO {$this->table} (libelle_categorie) VALUES (:libelle_categorie)"; // Utilisation de libelle_categorie

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':libelle_categorie' => trim($data['libelle_categorie'] ?? '')
        ]);
    }

    public function modifierCategorieCharge(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET libelle_categorie = :libelle_categorie WHERE id_categorie_charge = :id"; // Utilisation de id_categorie_charge et libelle_categorie

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':libelle_categorie' => trim($data['libelle_categorie']),
            ':id' => $id
        ]);
    }

    public function supprimerCategorieCharge(int $id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_categorie_charge = :id"); // Utilisation de id_categorie_charge
        return $stmt->execute([':id' => $id]);
    }

    public function getCategorieChargeById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_categorie_charge = :id"); // Utilisation de id_categorie_charge
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, CategorieCharge::class);
        return $stmt->fetch();
    }
}