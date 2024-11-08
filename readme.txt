API REST CRUD pour la gestion des étudiants

		Cette API REST CRUD a été développée en PHP pour permettre la gestion des étudiants.
	 Elle offre les fonctionnalités basiques de création, lecture,
	 mise à jour et suppression (CRUD) des étudiants dans une base de données MySQL.

	 L'API est accompagnée d'une interface utilisateur simple en HTML et JavaScript pour interagir avec l'API et visualiser les résultats en temps réel.

Fonctionnalités
		CRUD des étudiants : Cette API permet de créer de nouveaux étudiants, de lire les informations des étudiants existants,
	de mettre à jour les informations des étudiants et de supprimer des étudiants de la base de données.

		Interface utilisateur simple : L'interface utilisateur permet d'interagir avec l'API en utilisant un navigateur web standard.
	Elle permet de visualiser les résultats des opérations CRUD en temps réel.

Utilisation
		Cloner le dépôt : git clone https://github.com/MinaELKH/API_CRUD.git

		Importer la base de données : Exécutez le script SQL testapi.sql pour créer la base de données et la table des étudiants.

		Configurer la connexion à la base de données : Modifiez le fichier config.php dans le dossier includ pour spécifier les paramètres de connexion à votre base de données MySQL.

		Déployer l'API : Placez les fichiers dans votre serveur web (par exemple, Apache) pour déployer l'API.

		Accéder à l'interface utilisateur : Ouvrez le fichier index.html dans votre navigateur web pour accéder à l'interface utilisateur.

Tester l'API avec Postman : 
		Utilisez Postman pour tester les différentes routes de l'API (par exemple, POST pour ajouter un étudiant, PUT pour modifier un étudiant, etc.). 
		Utilisez l'URL de votre API (par exemple, http://localhost/API_CRUD_BASIC/api/read.php) et spécifiez le type de requête, les paramètres nécessaires et les en-têtes requis.

Exemples d'utilisation ( index.html)
		Ajouter un étudiant : Utilisez l'interface utilisateur pour ajouter un nouvel étudiant en saisissant son nom et son âge, puis en cliquant sur le bouton "Ajouter".

		Modifier un étudiant : Sélectionnez un étudiant dans la liste, modifiez ses informations et cliquez sur le bouton "Modifier".

		Supprimer un étudiant : Sélectionnez un étudiant dans la liste et cliquez sur le bouton "Supprimer".

