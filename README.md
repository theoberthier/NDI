# NDI 2021

## Organisation

### Equipe
**Front-End :**
- *Théo Morin - contact@theomorin.fr*
**Back-End :**
- *Théo Morin - contact@theomorin.fr*
- Théo Berthier - berthiertheo@hotmail.fr
- Louis Chety - louischety@gmail.com
**Algorithmique :**
- Vincent Ghigo - vincent.ghigo@etu.u-bordeaux.fr
**Référent défis :**
- Vincent Ghigo - vincent.ghigo@etu.u-bordeaux.fr
**Database maker :**
- Vincent Ghigo - vincent.ghigo@etu.u-bordeaux.fr
- Théo Morin - contact@theomorin.fr
**Graphiste :**
- 
**Vidéaste :**
- 

### Nos défis

### ToDo
- Finir le template
    - Les classes
    - Les controleurs
    - Les views
    - Les exemples

## Code

### Langages
- PHP (MVC)
- Javascript (JQuery, Popper, OWL)
- CSS
- HTML
- SQL

### Normes d'utilisation
**Nom des variables et des fonction :**
- première lettre en minuscule
- Pas de "_", exemple user_agent -> userAgent
    - exception : Les variables globales (define())

**Ecriture des fonctions :**
```php
public function getUserAgent() {
    //...
}
```

**Base de donnée :**
- TOUJOURS ecrire à la suite du fichier, favoriser les "ALTER TABLE"

**Controllers :**
- Nommer les routes avec des "-" quand un espace doit être mis, exemple : forgot password -> forgot-password


### GitHub

**Initialisation du projet avec un personal access token :**
```
git clone https://<your_token>@github.com/Theo-Morin/NDI2021.git
```

**Créer un personal access token github :**
- Profile > settings
- developer settings
- Personal access token
- Generate new token