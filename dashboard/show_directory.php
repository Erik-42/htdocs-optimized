<?php
// Vérifier si le paramètre 'dir' existe dans l'URL
if (isset($_GET['dir'])) {
    // Le nom du dossier sélectionné
    $dir = $_GET['dir'];

    // Construire le chemin complet
    $directoryPath = __DIR__ . '/../www-org/' . $dir;

    // Vérifier si le chemin est valide et existe
    if ($directoryPath && is_dir($directoryPath)) {
        echo '<h2>Contenu du dossier : ' . htmlspecialchars($dir) . '</h2>';
        
        // Vérifier si un fichier index.php ou index.html existe
        $indexFilePhp = $directoryPath . '/index.php';
        $indexFileHtml = $directoryPath . '/index.html';

        // Si un fichier index existe, l'afficher
        if (file_exists($indexFilePhp)) {
            echo '<h3>Fichier index.php trouvé, voici son contenu :</h3>';
            echo '<iframe src="/www-org/' . htmlspecialchars($dir) . '/index.php" width="100%" height="600px"></iframe>';
        } elseif (file_exists($indexFileHtml)) {
            echo '<h3>Fichier index.html trouvé, voici son contenu :</h3>';
            echo '<iframe src="/www-org/' . htmlspecialchars($dir) . '/index.html" width="100%" height="600px"></iframe>';
        } else {
            // Si aucun fichier index, lister les fichiers et répertoires
            if ($handle = opendir($directoryPath)) {
                echo '<ul>';
                
                // Boucle pour lire chaque élément dans le répertoire
                while (false !== ($entry = readdir($handle))) {
                    // Ignore les dossiers . et .. et les fichiers qui commencent par un point
                    if ($entry != "." && $entry != ".." && !preg_match('/^\./', $entry)) {
                        $entryPath = $directoryPath . '/' . $entry;

                        // Si c'est un fichier, on génère un lien vers ce fichier
                        if (is_file($entryPath)) {
                            echo '<li><a href="/www-org/' . htmlspecialchars($dir) . '/' . htmlspecialchars($entry) . '" target="_blank">' . htmlspecialchars($entry) . '</a></li>';
                        }
                        // Si c'est un dossier, on génère un lien vers show_directory.php pour afficher son contenu
                        elseif (is_dir($entryPath)) {
                            echo '<li><a href="show_directory.php?dir=' . urlencode($dir . '/' . $entry) . '" target="_self">' . htmlspecialchars($entry) . '</a></li>';
                        }
                    }
                }
                
                echo '</ul>';
                closedir($handle);
            } else {
                echo '<p>Impossible d\'ouvrir le répertoire.</p>';
            }
        }
    } else {
        echo '<p>Le dossier spécifié n\'existe pas ou n\'est pas accessible.</p>';
        echo '<p>Chemin du dossier après realpath (invalide ou inexistant) : ' . htmlspecialchars($directoryPath) . '</p>';
    }
} else {
    echo '<p>Aucun dossier sélectionné.</p>';
}
?>
