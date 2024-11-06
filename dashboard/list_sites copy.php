<?php
// Chemin vers le répertoire à lister
$directoryPath = __DIR__ . '/../www-org'; // Remplace avec le chemin correct si différent

// Vérifie si le répertoire existe
if (is_dir($directoryPath)) {
    // Ouvre le répertoire et parcourt son contenu
    if ($handle = opendir($directoryPath)) {
        echo '<h2>Liste des sites dans Xampp</h2>';
        echo '<ul>';
        
        // Boucle pour lire chaque élément dans le répertoire
        while (false !== ($entry = readdir($handle))) {
            // Ignore les dossiers . et ..
            if ($entry != "." && $entry != ".." && is_dir($directoryPath . '/' . $entry)) {
                // Affiche chaque dossier sous forme de lien
                echo '<li><a href="/www-org/' . htmlspecialchars($entry) . '/index.php" target="_blank">' . htmlspecialchars($entry) . '</a></li>';
            }
        }
        
        echo '</ul>';
        closedir($handle);
    } else {
        echo '<p>Impossible d\'ouvrir le répertoire.</p>';
    }
} else {
    echo '<p>Le répertoire spécifié n\'existe pas.</p>';
}
?>
<?php
// Chemin vers le répertoire à lister
$directoryPath = __DIR__ . '/../www-org'; // Remplace avec le chemin correct si différent

// Commentaire par défaut si aucune description n'est trouvée
$defaultComment = 'Aucun commentaire disponible pour ce site.';

// Vérifie si le répertoire existe
if (is_dir($directoryPath)) {
    // Ouvre le répertoire et parcourt son contenu
    if ($handle = opendir($directoryPath)) {
        echo '<h2>Liste des sites dans Xampp</h2>';
        echo '<ul>';
        
        // Boucle pour lire chaque élément dans le répertoire
        while (false !== ($entry = readdir($handle))) {
            // Ignore les dossiers . et ..
            if ($entry != "." && $entry != ".." && is_dir($directoryPath . '/' . $entry)) {
                // Définir le chemin vers le fichier index
                $indexFile = $directoryPath . '/' . $entry . '/index.php';  // ou index.html

                // Vérifie si le fichier index.php ou index.html existe dans le dossier
                if (file_exists($indexFile)) {
                    // Lire le contenu du fichier index.php
                    $fileContent = file_get_contents($indexFile);

                    // Cherche la balise <meta name="description">
                    preg_match('/<meta name="description" content="([^"]+)"/i', $fileContent, $matches);

                    // Si une description est trouvée, l'afficher
                    if (isset($matches[1])) {
                        $comment = $matches[1];  // La description trouvée dans la balise meta
                    } else {
                        $comment = $defaultComment;  // Commentaire par défaut
                    }
                } else {
                    $comment = $defaultComment;  // Commentaire par défaut si index.php/index.html n'existe pas
                }

                // Affiche chaque dossier sous forme de lien avec le commentaire
                echo '<li><a href="/www-org/' . htmlspecialchars($entry) . '/index.php" target="_blank">' . htmlspecialchars($entry) . '</a> - ' . htmlspecialchars($comment) . '</li>';
            }
        }
        
        echo '</ul>';
        closedir($handle);
    } else {
        echo '<p>Impossible d\'ouvrir le répertoire.</p>';
    }
} else {
    echo '<p>Le répertoire spécifié n\'existe pas.</p>';
}
?>
