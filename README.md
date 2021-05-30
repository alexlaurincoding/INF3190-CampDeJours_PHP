# INF3190 TRAVAIL DE SESSION

## EQUIPE
### Membres

**Etienne Comtois** : COME17029800  
**Louis Roy Therrien** :  
**Alexandre Laurin** :  
**Mathieu QQCHOSE** :  

### Partage de Connaissance
Le `GitHub` suivant sera utilisé afin de centraliser le travail : [GitHub INF3190 TS](https://github.com/alexlaurincoding/INF3190_Travail_de_session.git)  

Le `OneNote` suivant sera utilisé comme planche à dessin commune et afin de partages des documents de coordinations [OneNote INF3190 TS](https://uqam-my.sharepoint.com/:o:/g/personal/jb591912_ens_uqam_ca/Ei4SeovgjfJApBzsdJSmaCsBOT2XgswlFoS4ARMlf6SUSQ?e=PtQ1UL)  

Les communications s'effectuerons sur le serveur `Discord` commun.  

### Rencontres
- Une à deux rencontres de coordination par semaine (à déterminer combien et quand) seront de mise afin de diviser et de faire un suivi du travail.  
- Le travail se fera en sous équipes ou individuellement afin d'accélérer le travail. 
- Les tâches atomiques seront attribués afin d'être réalisé avant la prochaine rencontre de coordination.  



## ARBORESCENCE
La structure du projet est à déterminer.  

```bash
.
├── README.md
└── src
    ├── index.html
    └── main.css
```

## STRUCTURE
### Structure
- 3 programmes / semaine
- 1 programme = 1 semaine / 15 semaines
- 1 semaine = 5 jours d'activités
- 1 jour = 1+ bloc d'activité **ou** 1+ activité 
- 1 jour = 1 à 6 activités
- 1 bloc = 1+ activités
- Enfant inscrit à 1+ semaines différentes (1 par semaine)

### Composition
**Programme**  
```
Programme
├── Titre (Classique / Actif / Art et science)  
├── Description  
├── Animateurs  
├── Horaire  
├── Liste d'enfants  
└── Liste d'activités &/ blocs d'activités  
```

**Bloc -> Type Activité**  
```
Bloc
├── Sportif
│   ├── Course
│   ├── Yoga
│   └── Autre
├── Art
│   ├── Culinaire
│   ├── Visuel
│   └── Plastique
├── Science
│   ├── Chimie
│   ├── Biologie
│   └── Physique
└── Mixte
```

**Compte**
```
Usager(Parent)
├── Nom
├── Prenom
├── Courriel
├── Mot de passe
├── Adresse
├── Date Naissance
└── Enfant(s)
    ├── Nom
    ├── Prenom
    ├── Date Naissance
    └── Programme (default = null)
```

**Pages**
```
Presentation generale
├── S'inscrire  
├── Panier (sans connection)
│   └── Payer la facture
├── Connection  
│   ├── Guest
│   │   ├── Horraire de l'ete (Generique) 
│   │   └── Programme en cours (Generique)
│   ├── Usager
│   │   ├── Horraire par enfant inscrit
│   │   └── Programmes inscrits par enfants
│   └── Administrateur
│       ├── Horraire par enfant inscrit (tous)
│       ├── Programmes inscrits par enfants (tous)
│       ├── Creation nouvelle session (ete 2022)
│       ├── Creation bloc d'activités
│       ├── Ajout d'activités / association du type / association du bloc
│       └── Creation nouveau programme (Hyperactif...)
└── Programmes (pour ajouter au panier)  
```

**Database**
```
Comptes administrateurs
Comptes usagers
Enfants inscrits
Journal connections + creation comptes + transactions + pages consultés?
```
