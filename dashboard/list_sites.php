<?php
// Chemin vers le répertoire à lister
$directoryPath = __DIR__ . '/../www-org'; // Remplace avec le chemin correct si différent

// Commentaire par défaut si aucune description n'est trouvée
$defaultComment = ' ==> Aucun commentaire disponible pour ce site.';

// Vérifie si le répertoire existe
if (is_dir($directoryPath)) {
    // Ouvre le répertoire et parcourt son contenu
    if ($handle = opendir($directoryPath)) {
        echo '<h2>Liste des sites dans www-org</h2>';
        echo '<ul>';
        
        // Boucle pour lire chaque élément dans le répertoire
        while (false !== ($entry = readdir($handle))) {
            // Ignore les dossiers . et .. et les dossiers qui commencent par un point
            if ($entry != "." && $entry != ".." && !preg_match('/^\./', $entry) && is_dir($directoryPath . '/' . $entry)) {
                // Définir les chemins vers les fichiers index.php et index.html
                $indexFilePhp = $directoryPath . '/' . $entry . '/index.php';
                $indexFileHtml = $directoryPath . '/' . $entry . '/index.html';

                // Si l'index.php ou index.html existe, on redirige vers ce fichier
                if (file_exists($indexFilePhp)) {
                    // Lire le contenu du fichier index.php
                    $fileContent = file_get_contents($indexFilePhp);

                    // Cherche la balise <meta name="description">
                    preg_match('/<meta name="description" content="([^"]+)"/i', $fileContent, $matches);

                    // Si une description est trouvée, l'afficher
                    if (isset($matches[1])) {
                        $comment = $matches[1];  // La description trouvée dans la balise meta
                    } else {
                        $comment = $defaultComment;  // Commentaire par défaut
                    }

                    // Afficher le lien vers index.php avec le commentaire
                    echo '<li><a href="/www-org/' . htmlspecialchars($entry) . '/index.php" target="_blank">' . htmlspecialchars($entry) . '</a> - ' . htmlspecialchars($comment) . '</li>';
                } elseif (file_exists($indexFileHtml)) {
                    // Si l'index.html existe, afficher ce lien
                    $fileContent = file_get_contents($indexFileHtml);

                    // Cherche la balise <meta name="description">
                    preg_match('/<meta name="description" content="([^"]+)"/i', $fileContent, $matches);

                    // Si une description est trouvée, l'afficher
                    if (isset($matches[1])) {
                        $comment = $matches[1];  // La description trouvée dans la balise meta
                    } else {
                        $comment = $defaultComment;  // Commentaire par défaut
                    }

                    // Afficher le lien vers index.html avec le commentaire
                    echo '<li><a href="/www-org/' . htmlspecialchars($entry) . '/index.html" target="_blank">' . htmlspecialchars($entry) . '</a> - ' . htmlspecialchars($comment) . '</li>';
                } else {
                    // Si aucun index.php ou index.html n'existe, afficher le lien vers show_directory.php
                    echo '<li><a href="show_directory.php?dir=' . urlencode($entry) . '" target="_blank">' . htmlspecialchars($entry) . '</a> - ' . htmlspecialchars($defaultComment) . '</li>';
                }
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
