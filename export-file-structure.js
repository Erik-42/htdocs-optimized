const fs = require("fs");
const path = require("path");

function readDirRecursive(dir) {
	let results = [];

	// Vérifiez si le répertoire existe avant de tenter de le lire
	if (!fs.existsSync(dir)) {
		console.warn(`Directory not found: ${dir}`);
		return results;
	}

	const list = fs.readdirSync(dir);

	list.forEach(function (file) {
		const filePath = path.join(dir, file);

		// Ajoutez un bloc try-catch pour gérer les erreurs de lecture
		try {
			const stat = fs.statSync(filePath);

			if (stat && stat.isDirectory()) {
				results.push({
					name: file,
					type: "directory",
					children: readDirRecursive(filePath),
				});
			} else {
				results.push({
					name: file,
					type: "file",
				});
			}
		} catch (error) {
			console.warn(`Error accessing file or directory: ${filePath}`);
		}
	});

	return results;
}

// Définir le chemin du répertoire à lire
const dirPath = "/opt/lampp/htdocs/www-org"; // Changer ici pour 'www-org'

// Obtenir la structure du répertoire
const structure = readDirRecursive(dirPath);

// Exporter la structure dans un fichier JSON
fs.writeFileSync("structure.json", JSON.stringify(structure, null, 2));
console.log("Structure exported to structure.json");

// Si vous souhaitez exporter la structure du projet
// `node export-file-structure.js`
