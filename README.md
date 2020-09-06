# KaamelotTSE

Il s'agit d'un site pour passer des commandes de plats et suivre sa livraison. Réalisé en collaboration avec [_Ded@le_](https://github.com/thomasLecler) dans le cadre d'uné campagne BDE à l'école Télécom Saint-Etienne nous avions donc des contraintes de temps à respecter.

## Fonctionnalités du site

Le site est composé d'une partie frontoffice pour les clients, d'une partie de suivi de commande pour les livreurs et d'une partie administration. 
En réalité, les parties administration et suivi de commandes sont regroupées dans le backoffice.

Les clients peuvent :
- passer une nouvelle commande ;
- compléter une commande ;
- suivre leurs commandes ;
- ajouter un message à leur commande ;
- annuler leurs commandes.

Les livreurs peuvent :
- voir la liste des commandes ;
- prendre en charge une commande ;
- envoyer des messages sur la commande ;

Les éditeurs peuvent :
- écrire des articles
- éditer des articles

Les administrateurs peuvent :
- gérer les rôles des utilisateurs ;
- voir la liste des commandes ;
- ajouter des plats ;
- gérer le stock manuellement ;
- gérer les citations qui s'affichent sur la page d'accueil ;



## Quelles sont les difficultés que j'ai rencontré sur ce projet ?

Il s'agissait de mon premier projet en équipe. J'ai donc du apprendre à utiliser Git de façon plus approfondie. J'étais accompagné par Dédale qui prenait le temps de m'expliquer comment utiliser Git de façon plus approfondie qu'un simple git add / git commit / git push. J'ai fait beaucoup d'erreurs sur la gestion des branches et j'ai créé de nombreux conflits. J'avais également du mal à tester l'application à la main, reproduire des situations que mon collaborateur rencontrait etc pour corriger les erreurs.

## Qu'en ai-je retiré ?

J'ai pris le temps de m'intéresser à Git et j'ai approfondie mes connaissances sur le sujet. J'ai regardé des talks traitant de GitFlow, de GitHub flow etc notamment sur la chaine YouTube de DevoxxFrance. J'y ai découvert la notion d'intégration continu que je n'ai pas souvent mis en place par la suite. Au final, je suis beaucoup plus à l'aise avec Git et GitHub.

En discutant avec des développeurs, j'ai fini par apprendre à écrire des tests, chose qui me paraissait particulièrement compliquée et non utile à une petite échelle. J'ai pris conscience de leur utilité et de la confiance que ça nous apporte à l'écriture de code. J'ai commencé à m'intéresser au sujet et de la même façon que je regardais des talks sur Git, j'ai regardé pas mal de vidéos sur les tests, les méthodes de TDD, BDD etc.

## Comment essayer ce site ?

Je n'ai pas encore créer de conteneur Docker pour tester l'application. Il faut donc installer manuellement l'application comme n'importe quelle application Laravel.

```bash
git clone git@github.com:AlexandreGerault/kaamelottse.git
composer install
php artisan migrate
php artisan db:seed
php artisan serve
```
Pour tester le site, il faut créer un compte avec une adresse mail qui fini par "@kaamelottse.fr".

