

# Pourquoi est-ce que tous nos ID sont des gros cristies de string? 

Pourquoi pas juste utiliser des int, qui s'auto-incrémentent?

Avec les string créés aléatoirement, à la longue, c'est presque certain qu'on finirait qu'on finirait par retomber sur un ID déjà utilisé (oui, ce serait fucking long et faudrait être foutument malchanceux dans notre cas pour que ça arrive, mais ds un vrai logiciel avec une longue durée de vie, on s'exposerait à ça... et je comprends pas quel est l'avantage...)

# ACTIVITE_PROGRAMME.SQL
À quoi sert la table "activite_programme". Elle a juste un champ (id). 
- ooookkk... c'est surement parce qu'un horaire_programme peut être peuplé d'_activités_ ou de _blocs d'activités_. 
==> pê qu'on pourrait nommer cette table qqchose qui englobe englobe _bloc_ et _activite_ . i.e. : `ITEM_PROGRAMME`

# caline de bine.. 
faites attention, le type de la FK activite.type_activite devrait etre varchar(40) et non varchar(30)

# setters retournent qqchose? biz!
Des setters, d'habitude c'Est des fonctions avec un type de retour "void" non?
pourquoi on retourne "self"?

# viewModel vs calls multiples a la BD

Presentement, $viewModel est fournit à la page "gestion_programme.php". Cela veut dire qu'on va chercher dans la DB toute l'information dont l'utilisateur risque d'avoir besoin. Ça rend son accès aux données plus rapides par la suite, mais ça crée un load time plus grand. 

L'autre vision, c'est de lui loader très peu au début (juste la vue, sans données), et de faire les calls à la BD une fois qu'il clique sur un bouton "voir plus" ("Voir les sessions", "Voir les types d'activité", etc.)

# Boutons pour modifier/supprimer une session/activité/bloc" ?

Est-ce qu'on devrait ajouter un bouton "supprimer" sur les items ?
Même question pour un bouton "modifier".
Présentement, si on veut retirer/modifier une valeur, on doit y accéder directement par la BD
