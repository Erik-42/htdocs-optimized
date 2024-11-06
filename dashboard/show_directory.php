<?php
// Vérifier si le paramètre 'dir' existe dans l'URL
if (isset($_GET['dir'])) {
    // Le nom du dossier sélectionné
    $dir = basename($_GET['dir']);
    
    // Chemin vers le dossier
    $directoryPath = __DIR__ . '/../www-org/' . $dir;

    // Vérifie si le dossier existe
    if (is_dir($directoryPath)) {
        echo '<h2>Contenu du dossier : ' . htmlspecialchars($dir) . '</h2>';
        
        // Ouvre le répertoire et parcourt son contenu
        if ($handle = opendir($directoryPath)) {
            echo '<ul>';
            
            // Boucle pour lire chaque élément dans le répertoire
            while (false !== ($entry = readdir($handle))) {
                // Ignore les dossiers . et ..
                if ($entry != "." && $entry != ".." && !preg_match('/^\./', $entry)) {
                    echo '<li>' . htmlspecialchars($entry) . '</li>';
                }
            }
            
            echo '</ul>';
            closedir($handle);
        } else {
            echo '<p>Impossible d\'ouvrir le répertoire.</p>';
        }
    } else {
        echo '<p>Le dossier spécifié n\'existe pas.</p>';
    }
} else {
    echo '<p>Aucun dossier sélectionné.</p>';
}
?>

