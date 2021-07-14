# Plan de tests fonctionnels

Voici les cas de test que l'application web devra minimalement respecter afin de répondre aux exigences du client (énoncé), de sécurité et d'intégrité des données.  

### Exigences Fonctionnelles

| ID des fonctionnalités | ID des suites de tests | Description des fonctionnalités       | Chemin                  |
|------------------------|------------------------|---------------------------------------|-------------------------|
| EF - 001               | ST - 001               | Insertion d'une Session               | /admin/gestionProgramme |
| EF - 002               | ST - 002               | Insertion d'un Programme              | /admin/gestionProgramme |
| EF - 003               | ST - 003               | Insertion d'un Bloc d'activité        | /admin/gestionProgramme |
| EF - 004               | ST - 004               | Insertion d'un Type d'activité        | /admin/gestionProgramme |
| EF - 005               | ST - 005               | Insertion d'une Activité              | /admin/gestionProgramme |
| EF - 006               | ST - 006               | Inscription d'un parent               | /accueil/inscription    |
| EF - 007               | ST - 007               | Ajout d'un enfant                     | /parent/…               |
| EF - 008               | ST - 008               | Modification d'un enfant              | /parent/…               |
| EF - 009               | ST - 009               | Suppression d'un enfant               | /parent/…               |
| EF - 010               | ST - 010               | Modification d'un parent              | /parent/…               |
| EF - 011               | ST - 011               | Ajout d'un programme au panier        | /parent/…               |
| EF - 012               | ST - 012               | Retrait d'un programme du panier      | /parent/…               |
| EF - 013               | ST - 013               | Paiement de programmes dans le panier | /parent/…               |
| EF - 014               | ST - 014               | Gestion des accès ( admin / parent )  | /                       |

Tous les suites de test visent à :  
- Tester la saisie des champs  
- S'assurer du bon enregistrement dans la base de donnée  
- Ajustement des données affiché dans l'interface  
- Tester la gestion des erreurs  

Pour la suite de tests `EF - 014`, il est important de tester les accès adéquat aux pages ainsi que leur affichage.  


### ST - 001

| ID des cas de tests | Description du cas de test                 | Précondition | Résultat attendu                                                               | Priorité |
|---------------------|--------------------------------------------|--------------|--------------------------------------------------------------------------------|----------|
| CT - 001            | Champs vides                               | Aucune       | Avertissement sous les champs vides                                            | Haute    |
| CT - 002            | Champs partiellement vides                 | Aucune       | Reafichage des valeurs valides + Avertissement                                 | Moyenne  |
| CT - 003            | Dernière journée avant la première journée | Aucune       | Avertissement de dates invalides                                               | Moyenne  |
| CT - 004            | Insertion balise html                      | Aucune       | Sauvegarde dans la base de donnée non interpretation de l'entrée à l'affichage | Haute    |
| CT - 005            | Insertion de données valides               | Aucune       | Sauvegarde dans la base de donnée et affichage                                 | Haute    |


### ST - 002

| ID des cas de tests | Description du cas de test       | Précondition                            | Résultat attendu                                                                   | Priorité |
|---------------------|----------------------------------|-----------------------------------------|------------------------------------------------------------------------------------|----------|
| CT - 006            | Champs vides                     | Aucune                                  | Avertissement sous les champs vides                                                | Haute    |
| CT - 007            | Champs partiellement vides       | Aucune                                  | Reafichage des valeurs valides + Avertissement                                     | Moyenne  |
| CT - 008            | Sélection d'une Session          | Création d'une Session                  | Affichage des Sessions dans la liste déroulante                                    | Haute    |
| CT - 009            | Sélection d'une Activité         | Création d'une Activité / Bloc activité | Affichage des Activités et des Blocs d'activités dans la liste déroulante          | Haute    |
| CT - 010            | Ajout de plus de 6 activités     | Création d'une Activité / Bloc activité | Désactivation du bouton d'ajout d'activités                                        | Haute    |
| CT - 011            | Durée des Activités dépassant 8h | Création d'une Activité / Bloc activité | Avertissement que la durée est incorecte et réafichage des activités sélectionnées | Haute    |
| CT - 012            | Insertion balise html            | Aucune                                  | Sauvegarde dans la base de donnée non interpretation de l'entrée à l'affichage     | Haute    |
| CT - 013            | Insertion de données valides     | Aucune                                  | Sauvegarde dans la base de donnée et affichage                                     | Haute    |


### ST - 003

| ID des cas de tests | Description du cas de test     | Précondition                                                  | Résultat attendu                                                               | Priorité |
|---------------------|--------------------------------|---------------------------------------------------------------|--------------------------------------------------------------------------------|----------|
| CT - 014            | Champs vides                   | Aucune                                                        | Avertissement sous les champs vides                                            | Haute    |
| CT - 015            | Champs partiellement vides     | Aucune                                                        | Reafichage des valeurs valides + Avertissement                                 | Moyenne  |
| CT - 016            | Ajout de plus de 6 activités   | Création d'une Activité / Bloc activité                       | Désactivation du bouton d'ajout d'activités                                    | Haute    |
| CT - 017            | Sélection d'un type d'activité | Création d'un type d'activité                                 | Filtre des activités disponibles                                               | Moyenne  |
| CT - 018            | Insertion balise html          | Création d'une Activité / Bloc activité et de type d'activité | Sauvegarde dans la base de donnée non interpretation de l'entrée à l'affichage | Haute    |
| CT - 019            | Insertion de données valides   | Création d'une Activité / Bloc activité et de type d'activité | Sauvegarde dans la base de donnée et affichage                                 | Haute    |


### ST - 004






