# IUTgroupeA2
Espace pour le TP du groupe A2

## Comment installer le projet ?

- Lancer dans le terminal la commande `git clone https://github.com/Ludoutt/IUTgroupeA2.git`
- Se rendre dans le dossier créé
- Lancer dand le terminal la commande `composer install`
- Créer un fichier .env.local (basé sur le .env) afin de spécifier le chemin vers la base de données
- Lancer dans le terminal la commande `php bin/console doctrine:database:create`
- Lancer dans le terminal la commande `php bin/console doctrine:migrations:migrate`
- Lancer dans le terminal la commande `php bin/console server:run`

Et voilà, le projet est installé et lancé !
