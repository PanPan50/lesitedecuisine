<?php

// Language definitions used in all admin files
$lang_admin_reindex = array(

'Reindex heading'			=>	'Reconstruire l’index de recherche pour restaurer les performances',
'Rebuild index legend'		=>	'Reconstruire l’index de recherche',
'Reindex info'				=>	'Si vous avez ajouté, modifié ou supprimé des messages manuellement dans la base de données ou si vous avez des problèmes de recherche, vous devriez reconstruire l’index.  Vous pouvez mettre le forum en maintenance pour améliorer la vitesse de reconstruction. Une fois l’opération terminée vous serez redirigé vers cette même page. Il est fortement recommandé d’activer JavaScript dans votre navigateur durant la reconstruction (pour la redirection automatique en fin de cycle).',
'Reindex warning'			=>	'<strong>Important !</strong> Reconstruire l’index de recherche peut être long et va charger le serveur. Si vous devez annuler le processus de reconstruction, notez le dernier ID traité et saisissez cet ID+1 dans « ID de démarrage » pour reprendre le traitement là où il s’est arrêté.',
'Empty index warning'		=>	'<strong>Attention !</strong> Si vous voulez reprendre une reconstruction annulée, ne cochez pas « Vider l’index ».',
'Posts per cycle'			=>	'Messages par cycle',
'Posts per cycle info'		=>	'Le nombre de messages à traiter par rafraîchissement de page. Par exemple si vous saisissez 100, 100 messages seront traités puis la page sera rafraîchie. Ceci permet d’éviter que le script ne passe en « time out » durant la reconstruction.',
'Starting post'				=>	'ID de démarrage',
'Starting post info'		=>	'L’ID du message où commencer la reconstruction. La valeur par défaut est le premier ID connu en base de données. En général vous n’avez pas à le modifier.',
'Empty index'				=>	'Vider l’index',
'Empty index info'			=>	'Vider l’index de recherche avant de reconstruire (voir ci-dessous).',
'Rebuilding index title'	=>	'Reconstruction de l’index de recherche…',
'Rebuilding index'			=>	'Reconstruction de l’index… C’est le moment d’aller chercher un café :-)',
'Processing post'			=>	'Traitement du message <strong>%s</strong> dans le sujet <strong>%s</strong>.',
'Javascript redirect'		=>	'Erreur de redirection JavaScript.',
'Click to continue'			=>	'Cliquez ici pour continuer',
'Rebuild index'				=>	'Reconstruire l’index',

);