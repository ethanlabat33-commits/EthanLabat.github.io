<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Adhérents</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Sidebar gauche -->
    <div class="bouton-gauche">
        <ul>
            <li><a href="#" class="active">Accueil</a></li>
            <li><a href="#">Dossier</a></li>
            <li><a href="#">Personne</a></li>
            <li><a href="#">Adhérents</a></li>
        </ul>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <div class="container">
            <!-- Header avec actions -->
            <div class="header-section">
                <div class="header-actions">
                    <button class="btn-primary" >Liste des adhérents</button>
                    <a href="index.php?page=creeradherent" class="btn-primary">Ajouter un adhérent</a>
                    <a href="index.php?page=adhesion" class="btn-primary">gestion des adhesions</a>
                </div>
                
                <!-- Barre de recherche -->
                <div class="search-container">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-bar" placeholder="Rechercher par nom, type d'adhésion ou statut" id="searchInput">
                </div>
            </div>

            <!-- Layout principal -->
            <div class="main-layout">
            <div class="table-section">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>age</th>
                            <th>genre</th>
                            <th>commune</th>
                            <th>Type d'adhésion</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="adherentsTable">
                        <?php foreach($adherents as $adh): ?>
                            <tr onclick="selectAdherent('<?= htmlspecialchars($adh['prenom']) ?>', '<?= htmlspecialchars($adh['nom']) ?>', '<?= htmlspecialchars($adh['age']) ?>',  '<?= htmlspecialchars($adh['genre']) ?>', '<?= htmlspecialchars($adh['commune']) ?>', '<?= htmlspecialchars($adh['type_adhesion'] ?? 'N/A') ?>', '<?= htmlspecialchars($adh['statut'] ?? 'Actif') ?>')">
                                <td><?= htmlspecialchars($adh['nom']) ?></td>
                                <td><?= htmlspecialchars($adh['prenom']) ?></td>
                                <td><?= htmlspecialchars($adh['age']) ?></td>
                                <td><?= htmlspecialchars($adh['genre']) ?></td>
                                <td><?= htmlspecialchars($adh['commune']) ?></td>
                                <td><?= htmlspecialchars($adh['type_adhesion'] ?? 'N/A') ?></td>
                                <td>
                                    <?php if (($adh['statut'] ?? 'Actif') == 'Actif'): ?>
                                        <span class="status actif">Actif</span>
                                    <?php else: ?>
                                        <span class="status expire"><?= htmlspecialchars($adh['statut']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="table-actions">
                                    <button class="btn-small btn-edit" onclick="event.stopPropagation(); openModal('editModal')">✏️</button>
                                    <button class="btn-small btn-delete" onclick="event.stopPropagation(); openModal('deleteModal')">🗑️</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Sidebar profil -->
            <div class="profile-sidebar">
                <div class="profile-avatar" id="profileAvatar">👤</div>
                <div class="profile-name" id="profileName"><?= htmlspecialchars($adherents[0]['prenom'] ?? '') . ' ' . htmlspecialchars($adherents[0]['nom'] ?? '') ?></div>
                <div class="profile-type" id="profileType">Type d'adhésion<br><strong><?= htmlspecialchars($adherents[0]['type_adhesion'] ?? 'N/A') ?></strong></div>
                <div class="profile-status">
                    <span class="status actif" id="profileStatus"><?= htmlspecialchars($adherents[0]['statut'] ?? 'Actif') ?></span>
                </div>
                <a href="index.php?page=modifieradherent" class="btn-modify">modifier un adhérent</a>
            </div>
        </div>
    </div>
</div>


    <!-- Modal Modifier -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">Modifier l'adhérent</div>
            <form>
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="Claude">
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" value="Durand">
                </div>
                <div class="form-group">
                    <label>Type d'adhésion</label>
                    <select>
                        <option selected>Bénévole</option>
                        <option>Membre</option>
                        <option>Soutien</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Statut</label>
                    <select>
                        <option selected>Actif</option>
                        <option>Inactif</option>
                    </select>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="closeModal('editModal')">Annuler</button>
                    <button type="submit" class="btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>