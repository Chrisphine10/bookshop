<?php
//  ------------------------------------------------------------------------ //
//                      BOOKSHOP - MODULE FOR XOOPS 2                		 //
//                  Copyright (c) 2007, 2008 Instant Zero                    //
//                     <http://www.instant-zero.com/>                        //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

// The name of this module
define("_MI_BOOKSHOP_NAME","Librairie");

// A brief description of this module
define("_MI_BOOKSHOP_DESC","Cr�ation d'une librairie en ligne pour vendre des livres.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_BOOKSHOP_BNAME1","Livres r�cents");
define("_MI_BOOKSHOP_BNAME2","Livres les plus vus");
define("_MI_BOOKSHOP_BNAME3","Cat�gories");
define("_MI_BOOKSHOP_BNAME4","Meilleures ventes");
define("_MI_BOOKSHOP_BNAME5","Livres les mieux not�s");
define("_MI_BOOKSHOP_BNAME6","Livre au hasard");
define("_MI_BOOKSHOP_BNAME7","Livres en promotion");
define("_MI_BOOKSHOP_BNAME8","Caddy");
define("_MI_BOOKSHOP_BNAME9","Derniers livres recommand�s");

// Sub menu titles
define("_MI_BOOKSHOP_SMNAME1","Panier");
define("_MI_BOOKSHOP_SMNAME2","Index");
define("_MI_BOOKSHOP_SMNAME3","Cat�gories");
define("_MI_BOOKSHOP_SMNAME4","Plan des cat�gories");
define("_MI_BOOKSHOP_SMNAME5","Annuaire des auteurs");
define("_MI_BOOKSHOP_SMNAME6","Tous les livres");
define("_MI_BOOKSHOP_SMNAME7","Recherche");
define("_MI_BOOKSHOP_SMNAME8","Conditions G�n�rales de Vente");
define("_MI_BOOKSHOP_SMNAME9","Livres recommand�s");

// Names of admin menu items
define("_MI_BOOKSHOP_ADMENU0","Langues");
define("_MI_BOOKSHOP_ADMENU1","TVA");
define("_MI_BOOKSHOP_ADMENU2","Cat�gories");
define("_MI_BOOKSHOP_ADMENU3","Auteurs / Traducteurs");
define("_MI_BOOKSHOP_ADMENU4","Livres");
define("_MI_BOOKSHOP_ADMENU5","Commandes");
define("_MI_BOOKSHOP_ADMENU6","R�ductions");
define("_MI_BOOKSHOP_ADMENU7","Newsletter");
define("_MI_BOOKSHOP_ADMENU8", "Textes");
define("_MI_BOOKSHOP_ADMENU9", "Stocks bas");
define("_MI_BOOKSHOP_ADMENU10", "Tableau de bord");
define("_MI_BOOKSHOP_ADMENU11", "Email");

// Title of config items
define('_MI_BOOKSHOP_NEWLINKS', "Choisissez le nombre maximum de nouveaux livres � afficher sur la page d'accueil");
define('_MI_BOOKSHOP_PERPAGE', "Choisissez le nombre maximum de livres � afficher sur chaque page");
define('_MI_BOOKSHOP_AUTOAPPROVE',"Approuvez automatiquement les nouveaux livres sans intervention de l'administrateur ?");

// Description of each config items
define('_MI_BOOKSHOP_NEWLINKSDSC', '');
define('_MI_BOOKSHOP_PERPAGEDSC', '');

// Text for notifications

define('_MI_BOOKSHOP_GLOBAL_NOTIFY', 'Globale');
define('_MI_BOOKSHOP_GLOBAL_NOTIFYDSC', 'Options globales de notification.');

define('_MI_BOOKSHOP_GLOBAL_NEWCATEGORY_NOTIFY', 'Nouvelle cat�gorie');
define('_MI_BOOKSHOP_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Notifiez-moi lorsqu'une nouvelle cat�gorie est cr��.");
define('_MI_BOOKSHOP_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Revecoir une notification lorsqu'une nouvelle cat�gorie est cr��e");
define('_MI_BOOKSHOP_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification : Nouvelle cat�gorie cr��e');

define('_MI_BOOKSHOP_GLOBAL_NEWLINK_NOTIFY', 'Nouveau livre');
define('_MI_BOOKSHOP_GLOBAL_NEWLINK_NOTIFYCAP', "Notifiez-moi quand un nouveau livre est publi�.");
define('_MI_BOOKSHOP_GLOBAL_NEWLINK_NOTIFYDSC', "Recevoir une notification lorsqu'un nouveau livre est publi�.");
define('_MI_BOOKSHOP_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification : Nouveau livre');

// Ajouts Herv� Thouzard, Instant Zero ********************************************************************************
define('_MI_BOOKSHOP_PAYPAL_EMAIL', "Adresse Email Paypal");
define('_MI_BOOKSHOP_PAYPAL_EMAILDSC', "Adresse � utiliser pour les paiements et les notifications de commandes");
define('_MI_BOOKSHOP_PAYPAL_TEST', "Paypal en mode test ?");
define("_MI_BOOKSHOP_FORM_OPTIONS","Option de formulaire");
define('_MI_BOOKSHOP_FORM_OPTIONS_DESC', "S&eacute;lectionnez l'�diteur � utiliser. Si vous avez une installation 'simple' (i.e vous utilisez seulement l'&eacute;diteur xoops fourni en standard), alors vous ne pouvez que s&eacute;lectionner DHTML et Compact");

define("_MI_BOOKSHOP_FORM_COMPACT","Compact");
define("_MI_BOOKSHOP_FORM_DHTML","DHTML");
define("_MI_BOOKSHOP_FORM_SPAW","Spaw Editor");
define("_MI_BOOKSHOP_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_BOOKSHOP_FORM_FCK","FCK Editor");
define("_MI_BOOKSHOP_FORM_KOIVI","Koivi Editor");
define("_MI_BOOKSHOP_FORM_TINYEDITOR","TinyEditor");

define("_MI_BOOKSHOP_INFOTIPS","Nombre de caract�res pris en compte dans les infobulles");
define("_MI_BOOKSHOP_INFOTIPS_DES","Si vous utilisez cette option, les liens relatifs � des livres contiendront une infobulle reprennant les premiers (n) caract�res de chaque livre. Si vous param&eacute;trez cette valeur � 0, alors l'infobulle sera vide");

define("_MI_BOOKSHOP_UPLOADFILESIZE", "Taille maximale des fichiers joints en Ko (1048576 = 1 M�ga)");

define('_MI_BOOKSBYTHISAUTHOR', 'Livres du m�me auteur');

define('_MI_BOOKSHOP_PREVNEX_LINK','Afficher les liens vers les livres pr&eacute;c&eacute;dents et suivants ?');
define("_MI_BOOKSHOP_PREVNEX_LINK_DESC","Si cette option est activ&eacute;e, deux nouveaux liens seront visibles en bas de chaque article. Ces liens seront utiles pour lire l'article pr&eacute;c&eacute;dent et suivant en fonction de la date de publication");

define('_MI_BOOKSHOP_SUMMARY1_SHOW',"Afficher une table listant les derniers livres toutes categories confondues ?");
define('_MI_BOOKSHOP_SUMMARY1_SHOW_DESC',"Quand vous utilisez cette option, une table contenant les liens vers tous les livres r&eacute;cents publi&eacute;s sera visible en bas de chaque livre");

define('_MI_BOOKSHOP_SUMMARY2_SHOW',"Afficher une table listant les derniers livres  publi�s dans la cat�gorie en cours");
define('_MI_BOOKSHOP_SUMMARY2_SHOW_DESC',"Quand vous utilisez cette option, une table contenant les liens vers tous les livres r&eacute;cents publi&eacute;s sera visible en bas de chaque livre");

define('_MI_BOOKSHOP_OPT23',"[METAGEN] - Nombre maximal de meta mots cl�s � g�n�rer");
define('_MI_BOOKSHOP_OPT23_DSC',"Choisissez le nombre maximum de mots cl�s qui seront g�n�r�s par le module � partir du contenu.");

define('_MI_BOOKSHOP_OPT24',"[METAGEN] - Ordre des mots cl�s");
define('_MI_BOOKSHOP_OPT241',"Ordre d'apparition dans le texte");
define('_MI_BOOKSHOP_OPT242',"Ordre de fr�quence des mots");
define('_MI_BOOKSHOP_OPT243',"Ordre inverse de la fr�quence des mots");

define('_MI_BOOKSHOP_OPT25',"[METAGEN] - Blacklist");
define('_MI_BOOKSHOP_OPT25_DSC',"Entrez des mots (s�par�s par une virgule) qui ne doivent pas faire partie des mots cl�s g�n�r�s.");

define('_MI_BOOKSHOP_RATE','Permettre aux utilisateurs de noter les livres ?');

define("_MI_BOOKSHOP_ADVERTISEMENT","Publicit�");
define("_MI_BOOKSHOP_ADV_DESCR","Entrez un texte ou du code javascript � afficher dans les pages de description des livres");
define("_MI_BOOKSHOP_MIMETYPES","Entrez les types mime autoris�s pour le t�l�chargement des pi�ces jointes dans les livres (s�parez les par un retour � la ligne)");

define('_MI_BOOKSHOP_STOCK_EMAIL', "Groupe � qui envoyer un email quand les stocks sont bas");
define('_MI_BOOKSHOP_STOCK_EMAIL_DSC', "Ne rien rentrer pour ne pas utiliser cette fonctionnalit� d'alerte en cas de stock bas");

define('_MI_BOOKSHOP_OPT7',"Utiliser les flux RSS ?");
define('_MI_BOOKSHOP_OPT7_DSC',"Si vous utilisez cette option, les derni&egrave;res livres seront accessibles via un flux RSS.");

define('_MI_BOOKSHOP_CHUNK1',"Espace pour les livres les plus r�cents");
define('_MI_BOOKSHOP_CHUNK2',"Espace pour les livres les plus achet�s");
define('_MI_BOOKSHOP_CHUNK3',"Espace pour les livres les plus vus");
define('_MI_BOOKSHOP_CHUNK4',"Espace pour les livres les mieux not�s");
define('_MI_BOOKSHOP_ITEMSCNT',"Nombre d'�l�ments � afficher dans l'administration");
define('_MI_BOOKSHOP_PDF_CATALOG',"Autoriser l'utilisation du catalogue en PDF ?");
define('_MI_BOOKSHOP_URL_REWR',"Voulez vous utiliser l'url rewriting ?");

define('_MI_BOOKSHOP_MONEY_F',"Libell� long de la monnaie");
define('_MI_BOOKSHOP_MONEY_S',"Libell� court de la monnaie");
define('_MI_BOOKSHOP_MONEY_P',"Libell� de la monnaie pour Paypal");
define('_MI_BOOKSHOP_NO_MORE',"Afficher les livres m�me lorsqu'il n'y a plus de stock ?");
define('_MI_BOOKSHOP_MSG_NOMORE',"Texte � afficher lorsqu'il n'y a plus d'un livre");
define('_MI_BOOKSHOP_GRP_SOLD',"Groupe � qui envoyer un email lorsqu'un livre est vendu");
define('_MI_BOOKSHOP_GRP_QTY',"Groupe autoris� � modifier les quantit�s de livres disponibles depuis la page d'un livre");
define('_MI_BOOKSHOP_BEST_TOGETHER',"Afficher 'Deux, c'est mieux !' ?");
define('_MI_BOOKSHOP_UNPUBLISHED',"Afficher les livres dont la date du publication est sup�rieure � aujourd'hui ?");
define('_MI_BOOKSHOP_DECIMAL', "Nombre de d�cimales");
define('_MI_BOOKSHOP_PDT', "Paypal - Jeton d'identification pour transfert des donn�es de paiement (optionnel)");
define('_MI_BOOKSHOP_MANUAL_META', "Entrer les meta donn�es manuellement ?");
?>