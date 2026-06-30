# TP4 Déploiement d'une application PHP/MySQL sur N0C

## Lien pour mes images
file:///C:/Users/Joannie%20Ortega%20Alva/Documents/Session2/Environnement%20dev%20web%202/TP4/TP4%20_DEPLOIEMENT_N0C_%20IMAGES.pdf

## 1. Nom du projet
Application d'ajout de produits dans une liste.

## 2. Description
Mon application est très simple, elle permet d'ajouter des produits et leurs prix et aussi de les supprimer.

## 3. Lien GitHub
https://github.com/joannieoa/mon-app-tp4

## 4. Lien N0C
https://mon-app-tp4.e2495411.webdevmaisonneuve.ca/

## 5. Structure du projet
- `app/` → contient le db.php
- `public/` → contient index.php, style.css, supprimer.php
- `.env.example` → modèle de configuration
- `.gitignore` → empêche .env d’être envoyé sur GitHub
- Pas de `.env` sur GitHub par sécurité

## 6. Base de données
Elle contient une table :

- **Nom de la base** : `produits_app`
- **Nom de la table** : `produits` → Elle contient les produits ajouté.

## 7. Variables d’environnement
- Les variables se trouve dans le fichier `.env` qui n'est pas exposer sur le dépôt GitHub, car ce sont des informations sensibles.
- Le fichier `.env.example` qui nous montre ce qui devrait être écrit dans le fichier .env.

## 8. Configuration du sous-domaine N0C
- **Lien N0C** : `https://mon-app-tp4.e2495411.webdevmaisonneuve.ca/`
- **Sous-domaine** : `mon-app-tp4.e2495411.webdevmaisonneuve.ca`
- **Root du document** : `mon-application/public`
- **Le sous-domaine pointe vers public, car il contient mes pages principales, comme index.php, supprimer.php qui sert de page d’accueil. Je veux faire afficher mon projet sur le navigateur sans divulguer et rendre public les fichiers sensibles et privé, comme le .env ou le db.php.**

## 9. Étapes de déploiement

### 9.1 Préparation locale dans WSL
- J'ai placé mon projet dans `/var/www/mon-application`. 
- Création de mon fichier `.gitignore`.
- Configuration du fichier `.env`, `.env.example`.

### 9.2 Mise sur GitHub
- Je créer mon dépôt `mon-app-tp4` sur le site web **GitHub**.
- Initalisation du dépôt Git avec `git init`.
- Je git remote add origin `htps...`
- Je m'assure que mon fichier `.env` et bel et bien ignoré dans `.gitignore`, je `add` et `commit` mon projet.
- Je `git push origin main`.

### 9.3 Préparation de la base sur N0C
- Création de la base dans N0C
- Création de l’utilisateur MySQL
- Import du `.sql` dans phpMyAdmin
- Vérification des tables

### 9.4 Connexion SSH
Commande utilisées : `ssh khycbjjetn@209.16.158.158 -p 5022` . J'utilise ensuite des commandes pour vérifier que je suis au bon endroit.
- whoami
- pwd
- git --version

### 9.5 Récupération du projet sur N0C
- Je m'assure d'être dans `/home/khycbjjetn/`
- Je clone avec la commande : `git clone https://github.com/joannieoa/mon-app-tp4.git mon-application`.

### 9.6 Configuration du .env sur N0C
- Je fais la création du fichier `.env` dans `/home/khycbjjetn/mon-application/` avec la commande `nano .env`. 
- J'ajoute mes variables MySQL provenant de N0C.
- Il faut s'assurer qu'on ne met pas les informations qu'on a mis sur le fichier `.env` local, mais de mettre les variables MySQL de N0C.
- Ce fichier n'est jamais exposer grâce à `.gitignore`.

### 9.7 Configuration du sous-domaine
Je m'assure que le document root de mon lien N0C pointe vers le bon sous-dossier et qu'il ait le public d'inscrit :
- `/mon-application/public`

### 9.8 Tests finaux
J’ai mis mon lien N0C sur le navigateur et ma page affiche correctement. Elle fait les action CRUD sans problème et elle connecte bien avec la base de données.

## 10. Problèmes rencontrés
- J’ai rencontré beaucoup de problème, par exemple j’ai eu l’erreur 404 sur mon navigateur. Je
les régler en changeant le nom de mon document root pour qu’il pointe vraiment vers monapplication/public.
- Ensuite, lors de l’importation de mon fichier SQL dans phpMyAdmin j’avais une erreur dans
mon fichier, donc sa ne voulait pas l’accepter et finalement c’était une erreur sur une ligne
que je devais remplacer par COLLATE=utf8mb4_unicode_ci.

## 11. Validation finale
Après le déploiement, j’ai vérifié que l’application fonctionne correctement sur N0C. Le sous‑domaine pointe bien vers le dossier public/ et le site s’affiche sans erreur. La connexion à la base de données a été testée en effectuant les opérations CRUD, qui fonctionnent toutes normalement. J’ai aussi confirmé que les fichiers sensibles comme .env ne soit pas accessibles publiquement. L’application en ligne correspond à la version locale et respecte toutes les exigences du TP.
