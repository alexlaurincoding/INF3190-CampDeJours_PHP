# INF3190 TRAVAIL DE SESSION

## EQUIPE

### Membres

**Etienne Comtois** : COME17029800  
**Louis Roy Therrien** : ROYL20059103  
**Alexandre Laurin** : LAUA23108205  
**Mathieu Charbonneau** : CHAM25029407

### Partage de Connaissance

Le `GitHub` suivant sera utilisé afin de centraliser le travail : [GitHub INF3190 TS](https://github.com/alexlaurincoding/INF3190_Travail_de_session.git)

Le `OneNote` suivant sera utilisé comme planche à dessin commune et afin de partages des documents de coordinations [OneNote INF3190 TS](https://uqam-my.sharepoint.com/:o:/g/personal/jb591912_ens_uqam_ca/Ei4SeovgjfJApBzsdJSmaCsBOT2XgswlFoS4ARMlf6SUSQ?e=PtQ1UL)

Les communications s'effectuerons sur le serveur `Discord` commun.

### Rencontres

- Une à deux rencontres de coordination par semaine seront de mise afin de diviser et de faire un suivi du travail:
  - Lundi 20h
  - Vendredi 17h
- Le travail se fera en sous équipes ou individuellement afin d'accélérer le travail.
- Les tâches atomiques seront attribués afin d'être réalisé avant la prochaine rencontre de coordination.

## ARBORESCENCE

```bash
.
├── README.md
├── img # Dossier des images de profils
│   ├── bart_mini.jpg
│   ├── cartman_mini.jpg
│   ├── homer_mini.jpg
│   ├── liane_cartman_mini.jpg
│   ├── lisa_mini.jpg
│   ├── profil.png
│   ├── randy_mini.jpg
│   └── stan_mini.jpg
├── jQuery
│   └── jquery-3.6.0.js
├── javascript # Code Javascript
│   ├── bootstrap.bundle.min.js
│   ├── dossier_enfant.json
│   ├── dossier_parent.json
│   ├── inscriptions.json
│   ├── javaScript.js
│   └── testTableau.js
├── style # Code css
│   ├── bootstrap.min.css
│   └── main.css
└── vues # Autres Pages
    ├── contact.html # Page d'information sur le client
    ├── footer.html # Pied de page inséré sur toutes les pages
    ├── gestion.html # Page d'administration des programmes
    ├── horaire.html
    ├── index.html # Page d'accueil
    ├── infos_profil.html
    ├── inscription_admin.html
    ├── inscription_parent.html # Page d'inscription
    ├── navbar.html # Barre de navigation inséré sur toutes les pages
    └── programmes.html # Présentation des programmes
```

## STRATÉGIE 

### TECHNOLOGIES

- Afin de simplifier la maintenance et la cohérence du frontend, [`Bootstrap 5`](https://getbootstrap.com/docs/5.0/getting-started/introduction/) est utilisé par toutes les pages.
- Des fichiers css supplémentaires permettent d'harmoniser le style du site. 
Voir fichier [`/style/main.css`](./style/main.css).
- Certaines données sont stockées au format `.json` pour la démonstration. Les méthodes de ce prototype permettent la lecture seulement.
  - L'accès aux données se fait en partie avec [`jQuery`](https://api.jquery.com/).
- La simulation de paiement se fait à l'aide de `PayPal Sandbox`.
  -  courriel : `sb-ybcnk6512123@personal.example.com`
  -  mot de passe : `lesnerds`
- Le `javascript` est utilisé pour augmenter l'interactivité des éléments du site.
  -  Le fichier [`/javascript/javaScript.js`](./javascript/javaScript.js)  réduit la répétition de code et augmente ainsi la maintenabilité.
  - Le fichier [`/javascript/tableau_admin.js`](./javascript/tableau_admin.js) génère, à partir des données json, un [tableau interactif `datatable`](https://datatables.net/) 

### EXPÉRIENCE UTILISATEUR

Pour rendre plus agréable l'expérience de navigation, le nombre de pages est limité. 

Afin de ne pas trop charger les pages, seuls les éléments-clés sont affichés par défaut. Il faut cliquer sur un bouton pour que les informations supplémentaires disponible s'affichent.

Les formulaires sont accessibles par l'entremise de boutons qui ouvrent des `modals Bootstrap`, comme `Ajouter` et `Modifier`.

##### Visiteur
- Quelques pages de base sont accessibles sans authentification (`Accueil`, `Description des programmes`, `Inscription des parents`, `Contact`)

##### Parents
 _N.B. Pour simuler une connection en tant que parent, authentifiez-vous à l'aide d'un nom d'utilisateur différent de:_ `admin`

Toute la gestion de compte des parents se fait à partir de leur tableau de bord, qui permet de :
- Consulter ou modifier les informations d'un enfant ou ajouter un enfant à leur charge. 
- Visualiser les programmes passés, futurs et en cours, ainsi que leur statut (payé, non-payé, non-inscrit).
- Inscrire ses enfants à des programmes.
- Visualiser et régler son panier d'achats.

##### Administrateur 
 _N.B. Pour simuler une connection en tant qu'administrateur, authentifiez-vous à l'aide du nom d'utilisateur :_ `admin`
La gestion se divise en 2 sections.  
- L'une permet la gestion des sessions, programmes, activités et types et blocs d'activité.  
- L'autre section donne accès à toutes les inscriptions et les comptes d'utilisateurs.
