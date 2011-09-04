<?php

// Language definitions for frequently used strings
$lang_common = array(

// Text orientation and encoding
'lang_direction'			=>	'ltr',	// ltr (Left-To-Right) or rtl (Right-To-Left)
'lang_identifier'			=>	'fr',

// Number formatting
'lang_decimal_point'	=>	',',
'lang_thousands_sep'	=>	' ',

// Notices
'Bad request'				=>	'Requête invalide. Le lien demandé est incorrect ou caduc.',
'No view'					=>	'Vous n’avez malheureusement pas l’autorisation de consulter ces forums.',
'No permission'				=>	'Vous n’avez malheureusement pas l’autorisation d’accéder à cette page.',
'CSRF token mismatch'		=>	'Confirmation du jeton de sécurité impossible. Le plus probable est que trop de temps s’est écoulé entre votre entrée dans la page et le moment où vous avez cliqué. Si c’est le cas et que vous souhaitez poursuivre, veuillez cliquer sur le bouton Confirmer. Sinon, cliquez sur Annuler pour retourner d’où vous venez.',
'No cookie'					=>	'Vous semblez identifié correctement, bien qu’aucun cookie n’ait été enregistré. Merci de vérifier votre paramétrage et si nécessaire d’autoriser les cookies pour ce site.',


// Miscellaneous
'Forum index'				=>	'Index du forum',
'Submit'					=>	'Envoyer',	// "name" of submit buttons
'Cancel'					=>	'Annuler', // "name" of cancel buttons
'Preview'					=>	'Aperçu',	// submit button to preview message
'Delete'					=>	'Supprimer',
'Split'						=>	'Scinder',
'Ban message'				=>	'Vous êtes banni de ce forum.',
'Ban message 2'				=>	'Le bannissement prend fin le %s.',
'Ban message 3'				=>	'L’administrateur ou le modérateur qui vous a banni vous a laissé ce message :',
'Ban message 4'				=>	'Veuillez soumettre vos requêtes à l’administrateur du forum %s.',
'Never'						=>	'Jamais',
'Today'						=>	'Aujourd’hui',
'Yesterday'					=>	'Hier',
'Forum message'				=>	'Message du forum',
'Maintenance warning'		=>	'<strong>Attention ! %s activé.</strong> NE VOUS DECONNECTEZ PAS car vous ne pourrez pas vous reconnecter.',
'Maintenance mode'			=>	'En maintenance ',
'Redirecting'				=>	'Redirection',
'Forwarding info'			=>	'Vous allez être automatiquement renvoyé vers une autre page dans %s %s.',
'second'					=>	'seconde',	// singular
'seconds'					=>	'secondes',	// plural
'Click redirect'			=>	'Cliquez ici si vous ne souhaitez pas attendre (ou si votre navigateur ne vous redirige pas automatiquement)',
'Invalid e-mail'			=>	'L’adresse e-mail que vous avez saisie est invalide.',
'New posts'					=>	'Nouveaux messages',	// the link that leads to the first new post
'New posts title'			=>	'Trouver les sujets contenant des messages postérieurs à votre dernière visite.',	// the popup text for new posts links
'Active topics'				=>	'Sujets actifs',
'Active topics title'		=>	'Trouver les sujets contenant des messages récents.',
'Unanswered topics'			=>	'Sujets sans réponse',
'Unanswered topics title'	=>	'Trouver les sujets sans réponse.',
'Username'					=>	'Utilisateur',
'Registered'				=>	'Inscrit',
'Write message'				=>	'Ecrire un message:',
'Forum'						=>	'Forum',
'Posts'						=>	'Messages',
'Pages'						=>	'Pages',
'Page'						=>	'Page',
'BBCode'					=>	'BBCode',	// You probably shouldn't change this
'Smilies'					=>	'Binettes',
'Images'					=>	'Images',
'You may use'				=>	'Vous pouvez utiliser : %s',
'and'						=>	'et',
'Image link'				=>	'image',	// This is displayed (i.e. <image>) instead of images when "Show images" is disabled in the profile
'wrote'						=>	'a écrit',	// For [quote]'s (e.g., User wrote:)
'Code'						=>	'Code',		// For [code]'s
'Forum mailer'				=>	'%s Mailer',	// As in "MyForums Mailer" in the signature of outgoing e-mails
'Write message legend'		=>	'Composez votre message',
'Required information'		=>	'Information obligatoire',
'Reqmark'					=>	'*',
'Required'					=>	'(Obligatoire)',
'Required warn'				=>	'Les champs marqués %s doivent être remplis avant d’envoyer ce formulaire.',
'Crumb separator'			=>	' » ', // The character or text that separates links in breadcrumbs
'Title separator'			=>	' – ',
'Page separator'			=>	' ', //The character or text that separates page numbers
'Spacer'					=>	'…', // Ellipsis for paginate
'Paging separator'			=>	' ', //The character or text that separates page numbers for page navigation generally
'Previous'					=>	'Précédent',
'Next'						=>	'Suivant',
'Cancel redirect'			=>	'Operation annulée. Redirection…',
'No confirm redirect'		=>	'Pas de confirmation. Operation annulée. Redirection…',
'Please confirm'			=>	'Veuillez confirmer :',
'Help page'					=>	'Aide sur : %s',
'Re'						=>	'Re:',
'Page info'					=>	'(Page %1$s sur %2$s)',
'Item info single'			=>	'%s [ %s ]',
'Item info plural'			=>	'%s [ %s à %s sur %s ]', // e.g. Topics [ 10 to 20 of 30 ]
'Info separator'			=>	' ', // e.g. 1 Page | 10 Topics
'Powered by'				=>	'Propulsé par <strong>%s</strong>, supporté par <strong>%s</strong>.',
'Maintenance'				=>	'Maintenance',

// CSRF confirmation form
'Confirm'					=>	'Confirmer',	// Button
'Confirm action'			=>	'Confirmer cette action',
'Confirm action head'		=>	'Veuillez confirmer ou annuler votre dernière action',

// Title
'Title'						=>	'Titre',
'Member'					=>	'Membre',	// Default title
'Moderator'					=>	'Modérateur',
'Administrator'				=>	'Administrateur',
'Banned'					=>	'Banni',
'Guest'						=>	'Invité',

// Stuff for include/parser.php
'BBCode error 1'			=>	'[/%1$s] trouvé sans [%1$s] correspondant',
'BBCode error 2'			=>	'Le tag [%s] est vide',
'BBCode error 3'			=>	'[%1$s] est ouvert dans [%2$s], ce qui est interdit',
'BBCode error 4'			=>	'[%s] est ouvert dans lui-même, ce qui est interdit',
'BBCode error 5'			=>	'[%1$s] trouvé sans  [/%1$s] correspondant',
'BBCode error 6'			=>	'La section attribut du tag [%s] est vide',
'BBCode nested list'		=>	'Les tags [list] ne peuvent pas être imbriqués',
'BBCode code problem'		=>	'Il y a un problème dans vos tags [code]',

// Stuff for the navigator (top of every page)
'Index'						=>	'Accueil',
'User list'					=>	'Membres',
'Rules'						=>  'Règles',
'Search'					=>  'Chercher',
'Register'					=>  'S’inscrire',
'register'					=>	'vous inscrire',
'Login'						=>  'Connexion',
'login'						=>	'vous connecter',
'Not logged in'				=>  'Vous n’êtes pas identifié.',
'Profile'					=>	'Profil',
'Logout'					=>	'Déconnexion',
'Logged in as'				=>	'Connecté sous %s.',
'Admin'						=>	'Administration',
'Last visit'				=>	'Dernière visite %s',
'Mark all as read'			=>	'Marquer en Lu tous les sujets',
'Login nag'					=>	'Veuillez vous connecter ou vous inscrire.',
'New reports'				=>	'Nouveaux rapports',

// Alerts
'New alerts'				=>	'Nouvelles alertes',
'Maintenance alert'			=>	'<strong>Attention ! Maintenance activée.</strong> Ce forum est en maintenance. <em>NE PAS</em> vous déconnecter, sinon vous ne pourrez plus vous reconnecter.',
'Updates'					=>	'Mises à jour de PunBB :',
'Updates failed'			=>	'La dernière recherche de mises à jour sur le site <a href="http://punbb.informer.com/">punbb.informer.com</a> a échoué. Il est probable qu’il soit surchargé ou arrêté. Quoiqu’il en soit, si cette alerte persiste au delà de quelques jours, désactivez la recherche automatique des mises à jour et recherchez-les manuellement à l’avenir.',
'Updates version n hf'		=>	'Une nouvelle version de PunBB, version %s, peut être téléchargée sur <a href="http://punbb.informer.com/">punbb.informer.com</a>. De plus, un ou des hotfixes sont disponibles sur l’onglet <a href="%s">Gérer les hotfixes</a> de l’interface d’administration.',
'Updates version'			=>	'Une nouvelle version de PunBB, version %s, peut être téléchargée sur <a href="http://punbb.informer.com/">punbb.informer.com</a>.',
'Updates hf'				=>	'Un ou des hotfixes sont disponibles sur l’onglet <a href="%s">Gérer les hotfixes</a> de l’interface d’administration.',
'Database mismatch'			=>	'Erreur de version de la base de données',
'Database mismatch alert'	=>	'Votre base de données est prévue pour une version plus récente de PunBB. Cet écart peut affecter le fonctionnement de votre forum. Vous devriez mettre à jour PunBB avec la dernière version.',

// Stuff for Jump Menu
'Go'						=>	'Aller',		// submit button in forum jump
'Jump to'					=>	'Aller au forum :',

// For extern.php RSS feed
'RSS description'			=>	'Sujets les plus récents de %s.',
'RSS description topic'		=>	'Messages les plus récents de %s.',
'RSS reply'					=>	'Re: ',	// The topic subject will be appended to this string (to signify a reply)

// Accessibility
'Skip to content'			=>	'Passer au contenu du forum',

// Debug information
'Querytime'					=>	'Généré en %1$s secondes, %2$s requêtes exécutées',
'Debug table'				=>	'Informations de debug ',
'Debug summary'				=>	'Performances des requêtes sur la base de données',
'Query times'				=>	'Fois',
'Query'						=>	'Requête',
'Total query time'			=>	'Durée totale de la requête',

// For official extensions
'Official extensions inst'	=>	'<span id="extensions-used" title="%1$s">Extensions officielles : %2$s installées.</span>',

);
