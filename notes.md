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
