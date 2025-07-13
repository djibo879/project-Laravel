#  Application Laravel Immobilier — Portfolio Développeur Web (Laravel)



Bienvenue dans mon projet Laravel complet, développé comme démonstration concrète de mes compétences back-end et front-end avec le framework Laravel.  

Il a été conçu pour **démontrer ma maîtrise de Laravel dans un contexte professionnel**, notamment en vue d'opportunités professionnelles.

---



##  Fonctionnalités principales



- Gestion et affichage dynamique des propriétés

- Création automatique des données avec **Seeder** et **Factory**
- Formulaire de contact avec validation et envoi d’e-mail
- Contrôle d’accès via **Policy**
- Formulaires validés via **Form Request classes**
- Relations Eloquent (`hasMany`, `belongsTo`, etc.)
- Recherche, tri, et **pagination** sur les listes de biens
- Gestion de l'internationalisation 
- les files d'attentes
- Architecture modulaire avec **Service Providers**
- API REST avec réponse JSON (`routes/api.php`)
- Gestion d’événements Laravel
- Tests automatisés avec **PHPUnit**
- Frontend moderne avec **Vite** (JS/CSS)
- Email local avec **Mailhog**





---



##  Stack Technique
- Laravel 10
- PHP 8.2
- MySQL
- Blade + Vite\*\*
- PHPUnit\*\*
- Seeder, Factory, Policy, Event, Service Provider
- Mailhog (SMTP local pour tests emails)



---



## Structure du code



| Chemin | Description |

|-------|-------------|

| `app/Models/Property.php` | Modèle Eloquent |

| `app/Http/Controllers/PropertyController.php` | Logique métier |

| `app/Policies/PropertyPolicy.php` | Autorisations |

| `app/Providers/` | Configuration personnalisée |

| `routes/web.php` / `routes/api.php` | Routes Web et API |

| `resources/views/` | Vues Blade |

| `tests/Feature/PropertyTest.php` | Tests fonctionnels |





---



##  Configuration Mailhog



Pour tester les emails sans serveur SMTP réel, le projet utilise \*\*Mailhog\*\*.



### Lancer Mailhog avec Docker :



```bash

docker run -d -p 1025:1025 -p 8025:8025 mailhog/mailhog









MAIL_MAILER=smtp

MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="Immobilier App"



##   voici la capture d ecran du projet:


Ce projet Laravel permet d'afficher, contacter et tester des propriétés via un système de blog dynamique. Tu y trouveras un formulaire de contact, un système de mails, des routes bien définies et des tests automatisés.



\##  Aperçu du projet



\###  Formulaire de contact



!\[Formulaire](./image/form.png)



\###  Mail envoyé



!\[Mail](./image/mail.png)



\###  Définition des routes



!\[Routes](./image/route.png)



\###  Résultat des tests



!\[Tests](./image/test.png)





