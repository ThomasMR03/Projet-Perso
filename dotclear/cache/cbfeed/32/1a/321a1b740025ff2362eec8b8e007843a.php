O:10:"feedParser":7:{s:9:"feed_type";s:8:"atom 1.0";s:5:"title";s:20:"Blog Dotclear - News";s:4:"link";s:29:"https://fr.dotclear.org/blog/";s:11:"description";s:33:"Prenez le contrôle de votre blog";s:7:"pubdate";s:25:"2017-01-28T17:35:59+01:00";s:9:"generator";s:8:"Dotclear";s:5:"items";a:20:{i:0;O:8:"stdClass":8:{s:4:"link";s:60:"https://fr.dotclear.org/blog/post/2016/12/29/Dotclear-2.11.2";s:5:"title";s:15:"Dotclear 2.11.2";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:586:"    <p>Une nouvelle petite mise à jour aujourd'hui qui corrige quelques bugs gênants avec PHP 5.3 et PHP 5.4&nbsp;; elle règle également le problème de prévisualisation des billets et pages en cours d'édition.</p>


<p>N'oubliez pas de vider le cache des templates (plugin Entretien) ainsi que le cache de votre navigateur après avoir fait une mise à jour. Dans le cas où vous auriez opté pour une mise à jour manuelle, n'oubliez pas non plus de vous déconnecter et de vous reconnecter, certaines mises à jour (concernant la base de données) se font à ce moment là.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-12-29T15:29:00+01:00";s:2:"TS";i:1483021740;}i:1;O:8:"stdClass":8:{s:4:"link";s:60:"https://fr.dotclear.org/blog/post/2016/12/28/Dotclear-2.11.1";s:5:"title";s:15:"Dotclear 2.11.1";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:278:"    <p>Une petite mise à jour qui corrige un problème passé inaperçu lorsqu'on utilise une version de PHP antérieure à 5.5.</p>


<p>Ce problème empêche l'affichage du menu d'administration (colonne de gauche) avec la plupart des plugins, voire empêche leur accès.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-12-28T14:20:00+01:00";s:2:"TS";i:1482931200;}i:2;O:8:"stdClass":8:{s:4:"link";s:58:"https://fr.dotclear.org/blog/post/2016/12/28/Dotclear-2.11";s:5:"title";s:13:"Dotclear 2.11";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:6361:"    <p>Une nouvelle version qui déroge à nos habitudes, vu qu'elle n'est pas publiée un <strong>13</strong>, et en avance par rapport au planning, vu qu'elle était prévue <strong>mi-février 2017</strong>. Elle déroge aussi avec l'habitude d'avoir un copieux <a href="https://hg.dotclear.org/dotclear/rev/712559193a6e" hreflang="en">CHANGELOG</a> (liste des modifications/corrections).</p>


<p>En effet, cette version n'apporte rien d'extraordinaire sauf qu'elle facilite à pas mal d'endroits, l'utilisation de Dotclear, et elle corrige quelques bugs parfois gênants au quotidien&nbsp;:</p>

<ul>
<li>Accès plus facile aux réglages des plugins,</li>
<li>une personnalisation un peu plus poussée (taille des textes, affichage ou pas d'information complémentaires, …),</li>
<li>quelques attributs supplémentaires pour les développeurs/bidouilleurs de thèmes,</li>
<li>les <a href="https://www.w3.org/TR/webmention/" hreflang="en">webmentions</a> qui viennent s'ajouter aux existants rétroliens (trackbacks) et <a href="https://en.wikipedia.org/wiki/Pingback" hreflang="en">pingbacks</a>,</li>
<li>le thème <strong>Berlin</strong> s'appuie maintenant sur le jeu de template <strong>dotty</strong>, qui exploite au mieux <strong>HTML5</strong>,</li>
<li>…</li>
</ul>

<p>L'aspect général de l'administration change également parce qu'avec la 2.11, on utilise dorénavant la police système disponible sur votre machine plutôt que l'Helvetica Neue habituelle. Elle change aussi parce qu'elle met en œuvre une taille de police qui s'adapte, entre deux seuils, à la place disponible sur votre écran. Vous pourrez modifier la taille générale de la police dans vos préférences (3 réglages sont proposés).</p>


<p>À noter qu'on a laissé tomber le support des vieux navigateurs, en particulier toutes les versions d'Internet Explorer à un chiffre, soit jusqu'à la version 9 incluse&nbsp;; ça permet d'utiliser un peu plus facilement quelques nouveautés de CSS 3, en particulier le système <a href="https://developer.mozilla.org/fr/docs/Web/CSS/Disposition_des_bo%C3%AEtes_flexibles_CSS/Utilisation_des_flexbox_en_CSS">flex</a> pour l'agencement des blocs dans une zone.</p>


<p>Mais je vous laisse découvrir ça chez vous, une fois que vous aurez fait l'attendue mise-à-jour&nbsp;!</p>


<p>PS&nbsp;: Cette version nécessite <strong>PHP 5.3</strong> a minima, mais je ne saurais trop vous conseiller de passer à <strong>PHP 5.6</strong> voire <strong>PHP 7</strong> sans attendre — cette dernière offre un gain de vitesse très appréciable. Il est très possible que la version suivante de Dotclear nécessite une version plus récente que la déjà obsolète 5.3.</p>


<hr />


<p>Quelques détails techniques pour les développeurs de plugins et les administrateurs de blog&nbsp;:</p>


<h3>Réglages et paramètres des plugins</h3>


<p>La nouvelle version 2.11 introduit un nouveau système qui permet de définir et de trouver les différents endroits où un plugin peut être paramétré.</p>


<h4>Définitions</h4>


<p>Il faut définir dans le fichier _define.php du plugin une propriété supplémentaire, nommée settings et qui se construit de la façon suivante&nbsp;:</p>

<pre>
'settings' =&gt; array(
    'self'  =&gt; '',
    'blog'  =&gt; '#params.id',
    'pref'  =&gt; '#user-options.id'
)
</pre>


<p>La ligne avec ‘self’ permet d’indiquer qu’il y a des réglages sur la page principale du plugin (c’est-à-dire pour les développeurs, dans le fichier index.php).</p>


<p>La ligne avec ‘blog’ permet d’indiquer qu’il y a des réglages dans les paramètres du blog, normalement sur l’onglet «&nbsp;Paramètres&nbsp;» (le #params sert à ça) et que le premier élément concernant le plugin a un identifiant égal à id (on peut par exemple positionner cet id sur l’élément de titre, h4 ou h5, qui précède les options du plugin).</p>


<p>La ligne avec ‘pref’ permet d’indiquer qu’il y a des réglages dans les préférences utilisateur, normalement sur l’onglet «&nbsp;Mes options&nbsp;» (le #user-options sert à ça) et que le premier élément concernant le plugin a un identifiant égal à id.</p>


<p>Vous pouvez, et même devez, ne préciser que les lignes qui sont pertinentes.</p>


<p>Il n’est pas obligatoire de préciser l’id, dans ce cas il suffit de préciser simplement l’onglet. Il n’est pas non plus obligatoire de préciser l’onglet, dans ce cas laisser simplement une chaine vide (”).</p>


<p>Les liens seront affichés dans l’ordre où ils sont définis dans la propriété ‘settings’.</p>


<p>Nota&nbsp;: À cette liste de lien sera ajoutée en premier, s’il existe, le lien vers le fichier _config.php du plugin.</p>


<h5>Exemples de définitions</h5>


<p>Plugin Antispam</p>

<pre>
'settings' =&gt; array(
    'self' =&gt; '',
    'blog' =&gt; '#params.antispam_params'
)
</pre>

<ul>
<li>self → accès aux réglages principaux du plugin sur sa propre page (index.php)</li>
<li>blog → accès aux réglages secondaires dans les paramètres du blog</li>
</ul>

<p>Plugin Mot-clés</p>

<pre>
'settings' =&gt; array(
    'pref' =&gt; '#user-options.tags_prefs'
)
</pre>

<ul>
<li>pref → accès au réglage du format de liste des mot-clés dans les préférences utilisateur</li>
</ul>

<p>Plugin Maintenance</p>

<pre>
'settings' =&gt; array(
    'self' =&gt; '#settings'
)
</pre>

<ul>
<li>self → accès à l’onglet “Réglages” de la propre page du plugin (index.php)</li>
</ul>

<h4>Affichage</h4>


<p>L’affichage des URLs de réglage se font à deux endroits&nbsp;:</p>


<p>Sur la page de gestion des plugins, en dépliant les infos supplémentaires (il suffit de cliquer sur le nom du plugin pour les obtenir)</p>


<p>Sur chacune des pages principales des plugins, à condition d’avoir les droits pour y accéder aux différents réglages, sachant que ce qui est définit pour ‘self’ ne sera pas affiché (a priori on y est déjà).</p>


<hr />


<p>Si vous avez besoin de plus d'information sur ces développements techniques, utilisez <a href="https://forum.dotclear.org/">le forum</a> et/ou <a href="http://ml.dotclear.org/listinfo/dev">la mailing-list de développement</a>, voire même le canal IRC #dotclear (irc.freenode.net) où certains d'entre nous traînent parfois…</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-12-28T10:00:00+01:00";s:2:"TS";i:1482915600;}i:3;O:8:"stdClass":8:{s:4:"link";s:60:"https://fr.dotclear.org/blog/post/2016/11/02/Dotclear-2.10.4";s:5:"title";s:15:"Dotclear 2.10.4";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:2153:"    <p>Une mise à jour qui corrige un problème de connexion à la base de données avec les installations utilisant <strong>PostgreSQL inférieur à 9.1</strong></p>


<p>Si vous n'êtes <strong>pas</strong> dans ce cas, la mise à jour automatique fonctionnera comme d'habitude.</p>


<p>Si <strong>vous êtes dans ce cas</strong>, pour pouvoir faire la mise à jour automatique, suivez la procédure suivante&nbsp;:</p>

<ol>
<li>Ouvrez le fichier /inc/libs/clearbricks/dblayer/class.pgsql.php</li>
<li>Insérez une ligne devant la ligne 103 et insérer sur cette nouvelle ligne le code suivant et sauvegardez&nbsp;:</li>
</ol>
<pre>
return;
</pre>


<p>Vous devriez avoir quelque chose comme ça&nbsp;:</p>

<pre>
		/** @ignore */
		private function db_post_connect($handle,$database)
		{
return;
			$result = $this-&gt;db_query($handle,&quot;SELECT * FROM pg_collation WHERE (collcollate LIKE '%.utf8')&quot;);
			if($this-&gt;db_num_rows($result) &gt; 0) {
				$this-&gt;db_result_seek($result, 0);
				$row = $this-&gt;db_fetch_assoc($result);
				$this-&gt;utf8_unicode_ci = '&quot;'.$row['collname'].'&quot;';
			}
		}
</pre>


<p>Cette modification vous redonnera accès à votre installation.</p>


<p>Pour la mise à jour automatique, qui détectera cette modification, il faudra installer au préalable un plugin qui permet de passer outre l'avertissement. Ce plugin, FakeMeUp, est <a href="http://plugins.dotaddict.org/dc2/details/fakemeup">disponible sur DotAddict</a>.</p>


<p>Une fois ce plugin installé, vous pourrez faire la mise à jour, puis une fois celle-ci terminée, le désactiver ou le désinstaller.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.10.3-2.10.4.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>


<hr />


<p>Le CHANGELOG de cette version&nbsp;:</p>

<pre>
Dotclear 2.10.4 - 2016-11-02
===========================================================
* PostgreSQL &lt; 9.1 fix
</pre>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-11-02T10:45:00+01:00";s:2:"TS";i:1478079900;}i:4;O:8:"stdClass":8:{s:4:"link";s:60:"https://fr.dotclear.org/blog/post/2016/11/01/Dotclear-2.10.3";s:5:"title";s:15:"Dotclear 2.10.3";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:1374:"    <p>Une petite mise à jour qui corrige principalement deux failles de sécurité légères et qui devrait permettre un fonctionnement plus souple avec certaines configurations de serveur utilisant un proxy.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.10.2-2.10.3.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>


<hr />


<p>Le CHANGELOG de cette version&nbsp;:</p>

<pre>
Dotclear 2.10.3 - 2016-11-01
===========================================================
* Security: Fix CVE-2016-7903: Password Reset Address Spoof — Thank's Hongkun Zeng for report
* Security: Fix CVE-2016-7902: Media Manager, unrestricted File Upload — Thank's Hongkun Zeng for report
* CSP: Cope with external sources used in editor's iframe to preview public external content
* Fix: Cope with post.post_position field during flat import
* Fix: Prevents precondition failed during currently activated theme update
* Fix: Remove unecessary header (cope by dotclear) in page plugin
* Fix: Let some proxies playing with standard http and https ports
* Fix: Let SSL runs through a proxy, it may be ok, sometimes
* 🐛 → Various bugs and typos fixed
</pre>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-11-01T15:20:00+01:00";s:2:"TS";i:1478010000;}i:5;O:8:"stdClass":8:{s:4:"link";s:60:"https://fr.dotclear.org/blog/post/2016/08/17/Dotclear-2.10.2";s:5:"title";s:15:"Dotclear 2.10.2";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:500:"    <p>Une petite mise à jour qui corrige un problème qui empêche la mise à jour avec les installations utilisant le système de base de données PostgreSQL.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.10.1-2.10.2.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-08-17T10:22:00+02:00";s:2:"TS";i:1471422120;}i:6;O:8:"stdClass":8:{s:4:"link";s:60:"https://fr.dotclear.org/blog/post/2016/08/15/Dotclear-2.10.1";s:5:"title";s:15:"Dotclear 2.10.1";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:659:"    <p>Une petite mise à jour qui corrige un problème qui empêche l'affichage correct de l'administration pour les nouvelles installations (les mises à jour ne sont pas concernées), une application un peu trop stricte des CSP (Content-Security-Policies) en est la cause, signe que cette protection est efficace&nbsp;!</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.10-2.10.1.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-08-15T09:15:00+02:00";s:2:"TS";i:1471245300;}i:7;O:8:"stdClass":8:{s:4:"link";s:76:"https://fr.dotclear.org/blog/post/2016/08/14/Dotclear-2.10-%3A-attention-%21";s:5:"title";s:27:"Dotclear 2.10 : attention !";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:662:"    <p>On vient de me signaler un problème qui empêche les feuilles de style CSS et les scripts Javascript d'être chargées dans l'administration de Dotclear, mais <strong>uniquement</strong> pour les <strong>nouvelles installations</strong>.</p>


<p>Si vous êtes confrontés à ce problème, téléchargez plutôt une <a href="https://download.dotclear.org/attic/dotclear-2.9.1.zip">version 2.9.1</a>, installez-là, puis faites ensuite la mise à jour proposée sur le tableau de bord, cette dernière n'étant pas concernée par ce problème.</p>


<p>Vous pouvez aussi attendre demain que je sorte une version 2.10.1 de Dotclear qui réglera ce bug.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-08-14T10:35:00+02:00";s:2:"TS";i:1471163700;}i:8;O:8:"stdClass":8:{s:4:"link";s:58:"https://fr.dotclear.org/blog/post/2016/08/13/Dotclear-2.10";s:5:"title";s:13:"Dotclear 2.10";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:7573:"    <p>Il ne fallait pas manquer l'occasion de sortir une version pour le 13e anniversaire de Dotclear  et donc voilà, la 2.10 est disponible dès maintenant et très rapidement sur votre tableau de bord<sup>[<a href="https://fr.dotclear.org/blog/post/2016/08/13/Dotclear-2.10#pnote-1044-1" id="rev-pnote-1044-1">1</a>]</sup>&nbsp;!</p>


<p>Au menu (liste non exhaustive, voyez le <a href="https://hg.dotclear.org/dotclear/file/18dc878c1178/CHANGELOG" hreflang="en">CHANGELOG</a> pour plus de détails)&nbsp;:</p>

<ul>
<li>Quelques vulnérabilités corrigées</li>
<li>Pas mal de bugs éradiqués</li>
<li>Un nouveau jeu de template nommé <strong>dotty</strong> utilisant autant que faire se peut les nouvelles balises sémantiques HTML5</li>
<li>De nouvelles options pour personnaliser et utiliser un peu plus facilement votre administration (dossiers favoris pour la médiathèque, colonnes optionnelles pour les listes de pages et de billets, …)</li>
<li>La mise en place des <a href="https://developer.mozilla.org/fr/docs/S%C3%A9curit%C3%A9/CSP">Content-Security-Policies</a> pour l'administration, prélude à une implémentation côté blogs pour la future version 2.11<sup>[<a href="https://fr.dotclear.org/blog/post/2016/08/13/Dotclear-2.10#pnote-1044-2" id="rev-pnote-1044-2">2</a>]</sup></li>
<li>De nouvelles facilités et possibilités pour les développeurs de plugins (elles sont détaillées ci-dessous)</li>
<li>Des mises à jour des librairies Javascript utilisées (CKEditor, Codemirror, …)</li>
</ul>

<p>Pas de révolution donc, mais des évolutions pour une application plus sécurisée et plus robuste&nbsp;; pour finir, <strong>joyeux anniversaire Dotclear \o/</strong></p>


<p>PS&nbsp;: Cette version nécessite PHP 5.3 a minima, mais je ne saurais trop vous conseiller de passer à PHP 5.6 voire PHP 7 sans attendre — cette dernière offre un gain de vitesse très appréciable. Il est très possible que la version suivante de Dotclear nécessite une version plus récente que la déjà obsolète 5.3.</p>


<hr />


<p>Quelques détails techniques pour les développeurs de plugins (et de thèmes) et les administrateurs de blog&nbsp;:</p>


<h3>CSP, aka Content-Security-Policies</h3>


<blockquote><p>Content Security Policy (abrégé CSP) est un mécanisme de sécurité permettant de restreindre l'origine du contenu (tel qu'un script Javascript, une feuille de style etc.) dans une page web à certains sites autorisés. Cela permet de mieux se prémunir d'une éventuelle faille XSS.</p></blockquote>


<p>[ Wikipedia «&nbsp;<a href="https://fr.wikipedia.org/wiki/Content_Security_Policy">Content Security Policy</a>&nbsp;» ]</p>


<p>Les paramètres utilisés (activation et directives) sont accessibles via le module <strong>about:config</strong> du menu <strong>Réglages système</strong>. Voir la partie «&nbsp;system », les paramètres concernés étant les suivants&nbsp;:</p>

<ul>
<li>csp_admin_on&nbsp;: activation/désactivation</li>
<li>csp_admin_default&nbsp;: directive CSP <strong>default-src</strong></li>
<li>csp_admin_img&nbsp;: directive CSP <strong>img-src</strong></li>
<li>csp_admin_script&nbsp;: directive CSP <strong>script-src</strong></li>
<li>csp_admin_style&nbsp;: directive CSP <strong>style-src</strong></li>
</ul>

<p>Un plugin tiers devant utiliser les services d'un serveur externe peut compléter tout ou partie de ces directives à l'aide du <em>behavior</em> <strong>adminPageHTTPHeaderCSP</strong> qui fournit en argument un tableau à clé, Chacune des clés correspond à une des directives CSP, sa valeur fournissant la liste des éléments (séparés par des espaces) de la directive.</p>


<p>Exemple&nbsp;:</p>


<p>Si un plugin utilise côté administration l'API Google Maps (pour les scripts), il peut ajouter le serveur correspondant de cette façon&nbsp;:</p>

<pre>
$core-&gt;addBehavior('adminPageHTTPHeaderCSP',array('myAdminBehaviors','adminPageHTTPHeaderCSP'));

class myAdminBehaviors
{
	public static function adminPageHTMLHead($csp)
	{
		if (isset($csp['script-src'])) {
			$csp['script-src'] .= ' maps.googleapis.com';
		} else {
			$csp['script-src'] = 'maps.googleapis.com';
		}
	}
}
</pre>


<h3>Répertoire privé <strong>/var</strong></h3>


<p>Un nouveau répertoire, nommé <strong>var</strong> fait son apparition avec la 2.10. Il est situé à la racine et devrait être utilisé pour le stockage d'éléments n'ayant rien à faire dans la médiathèque ou dans le répertoire de cache (qui peut être supprimé à n'importe quel moment sans remettre en question le fonctionnement de Dotclear).</p>


<p>Une constante, <strong>DC_VAR</strong>, est disponible automatiquement et peut être personnalisée dans le fichier <strong>config.php</strong> pour construire des chemins d'accès. Deux fonctions sont également disponibles pour récupérer des URLs&nbsp;:</p>

<ul>
<li>dcPage::getVF() pour une URL basée sur l'URL d'administration du blog</li>
<li>dcBlog::getVF() pour une URL publique basée sur l'URL du blog</li>
</ul>

<p>Les développeurs de plugin sont fortement encouragés à créer leur propre répertoire au sein de ce répertoire <strong>/var</strong> afin de conserver un semblant d'ordre.</p>


<h3>Coloration syntaxique via Codemirror</h3>


<p>La librairie Codemirror utilisée par l'éditeur de thème est désormais utilisable (côté administration) par n'importe quel plugin. Deux fonctions sont disponibles pour le chargement de la librairie et pour son exécution&nbsp;:</p>

<ul>
<li>dcPage::jsLoadCodeMirror() pour le chargement</li>
<li>dcPage::jsRunCodeMirror() pour l'exécution</li>
</ul>

<p>Exemple pour du code CSS&nbsp;:</p>

<pre>
# Get interface setting
$core-&gt;auth-&gt;user_prefs-&gt;addWorkspace('interface');
$user_ui_colorsyntax = $core-&gt;auth-&gt;user_prefs-&gt;interface-&gt;colorsyntax;
$user_ui_colorsyntax_theme = $core-&gt;auth-&gt;user_prefs-&gt;interface-&gt;colorsyntax_theme;

# in &lt;head&gt;
if ($user_ui_colorsyntax) {
	echo dcPage::jsLoadCodeMirror($user_ui_colorsyntax_theme,false,array('css'));
}

# in &lt;body&gt;
if ($user_ui_colorsyntax) {
	echo dcPage::jsRunCodeMirror('editor_css','css_content','css',$user_ui_colorsyntax_theme);
}
</pre>


<p>L'activation de la coloration syntaxique et le choix du thème à utiliser (parmi les quarante et plus proposés) se font dans «&nbsp;Mes préférences », onglet «&nbsp;Mes options ».</p>


<hr />


<p>Si vous avez besoin de plus d'information sur ces développements techniques, utilisez <a href="https://forum.dotclear.org/">le forum</a> et/ou <a href="http://ml.dotclear.org/listinfo/dev">la mailing-list de développement</a>, voire même le canal IRC #dotclear (irc.freenode.net) où certains d'entre nous traînent parfois…</p>
<div class="footnotes"><h4 class="footnotes-title">Notes</h4>
<p>[<a href="https://fr.dotclear.org/blog/post/2016/08/13/Dotclear-2.10#rev-pnote-1044-1" id="pnote-1044-1">1</a>] <a href="http://download.dotclear.org/patches/2.9.1-2.10.diff.gz">Un patch</a> est également disponible pour ceux qui préfèrent cette méthode pour appliquer la mise à jour.</p>
<p>[<a href="https://fr.dotclear.org/blog/post/2016/08/13/Dotclear-2.10#rev-pnote-1044-2" id="pnote-1044-2">2</a>] La mise en place des CSP est consécutive à une conférence de <a href="http://www.nicolas-hoffmann.net/content-security-policy-parisweb-2015/#/">Nicolas Hoffmann</a> à ce sujet, à <a href="https://www.paris-web.fr/2015/conferences/csp-content-security-policy.php">Paris-Web en 2015</a>, à laquelle j'ai assisté.</p></div>
";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-08-13T13:13:00+02:00";s:2:"TS";i:1471086780;}i:9;O:8:"stdClass":8:{s:4:"link";s:59:"https://fr.dotclear.org/blog/post/2016/03/27/Dotclear-2.9.1";s:5:"title";s:14:"Dotclear 2.9.1";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:1068:"    <p>Une version de maintenance qui corrige quelques défauts de la 2.9 précédente. Je rappelle que Dotclear est compatible avec PHP 7 et que les performances en sont considérablement améliorées<sup>[<a href="https://fr.dotclear.org/blog/post/2016/03/27/Dotclear-2.9.1#pnote-1042-1" id="rev-pnote-1042-1">1</a>]</sup>.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.9-2.9.1.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>
<div class="footnotes"><h4 class="footnotes-title">Note</h4>
<p>[<a href="https://fr.dotclear.org/blog/post/2016/03/27/Dotclear-2.9.1#rev-pnote-1042-1" id="pnote-1042-1">1</a>] Si vous utilisez MySQL pour votre base de données, veillez à utiliser <strong>mysqli</strong> au lieu de <strong>mysql</strong> qui n'est plus supporté par PHP 7 (voir dans votre fichier <code>inc/config.php</code>).</p></div>
";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-03-27T11:11:00+02:00";s:2:"TS";i:1459069860;}i:10;O:8:"stdClass":8:{s:4:"link";s:57:"https://fr.dotclear.org/blog/post/2016/02/29/Dotclear-2.9";s:5:"title";s:12:"Dotclear 2.9";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:2924:"    <blockquote><p>Mes agneaux, c'est l'heure de mettre à jour, la nouvelle version 2.9 vous tend les bras&nbsp;!</p>
<p>
<em>Fédor Balanovitch</em> (en sortant du bus, ou presque) — Zazie dans le métro, R. Queneau</p></blockquote>


<p>Au menu de cette version essentiellement de quoi faciliter un peu la vie de ceux qui passent du temps du côté de l'administration de leur(s) blog(s). Une recherche et les derniers dossiers visités pour le gestionnaire de médias, des menus mieux triés et des listes un peu plus filtrables, quelques mises à jour bienvenues pour les librairies javascript utilisées<sup>[<a href="https://fr.dotclear.org/blog/post/2016/02/29/Dotclear-2.9#pnote-1040-1" id="rev-pnote-1040-1">1</a>]</sup>.</p>


<p>Et puis on a aussi fait le nécessaire pour que Dotclear tourne correctement avec la nouvelle version 7 de PHP, version assez impressionnante en termes de gain de vitesse, et vous noterez au passage que la version minimum requise de PHP est la 5.3, comme on l'avait annoncé au moment de la <a href="https://fr.dotclear.org/blog/post/2015/08/13/Dotclear-2.8">sortie de la version 2.8</a><sup>[<a href="https://fr.dotclear.org/blog/post/2016/02/29/Dotclear-2.9#pnote-1040-2" id="rev-pnote-1040-2">2</a>]</sup>.</p>


<p>Pas mal de bugs ont été éradiqués, quelques possibilités nouvelles ont été implémentées pour les développeurs de plugins et les concepteurs de thème, et pour finir une application plus robuste pour tout le monde.</p>


<p>La future version 2.10 sera essentiellement axée sur deux aspects. Premièrement une «&nbsp;remise à plat&nbsp;» des scripts javascript utilisés côté administration, parce qu'à force on finit par avoir quelques vieilleries dans notre «&nbsp;collection », et, deuxièmement, une migration «&nbsp;douce&nbsp;» vers plus de HTML5/CSS3 côté templates et thèmes. Cela dit nous comptons sur vous pour nous dire si vous préféreriez autre chose pour la suite, rien n'est gravé dans le marbre&nbsp;!</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et <a href="http://download.dotclear.org/patches/2.8.2-2.9.diff.gz">un patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>
<div class="footnotes"><h4 class="footnotes-title">Notes</h4>
<p>[<a href="https://fr.dotclear.org/blog/post/2016/02/29/Dotclear-2.9#rev-pnote-1040-1" id="pnote-1040-1">1</a>] D'ailleurs la version 2.2.0 de jQuery est dorénavant disponible côté public de vos blogs, si nécessaire.</p>
<p>[<a href="https://fr.dotclear.org/blog/post/2016/02/29/Dotclear-2.9#rev-pnote-1040-2" id="pnote-1040-2">2</a>] Il n'y a d'ailleurs plus guère d'hébergeurs utilisant encore une version antérieure ; même les Pages Perso chez Free sont dorénavant motorisées avec une version 5.6.</p></div>
";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2016-02-29T12:46:00+01:00";s:2:"TS";i:1456746360;}i:11;O:8:"stdClass":8:{s:4:"link";s:59:"https://fr.dotclear.org/blog/post/2015/10/25/Dotclear-2.8.2";s:5:"title";s:14:"Dotclear 2.8.2";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:1247:"    <p>Une nouvelle version de maintenance qui règle une potentielle faille de sécurité du côté de la liste des commentaires, et qui renforce le contrôle des extensions de média pouvant être envoyés à la médiathèque<sup>[<a href="https://fr.dotclear.org/blog/post/2015/10/25/Dotclear-2.8.2#pnote-1038-1" id="rev-pnote-1038-1">1</a>]</sup>, vulnérabilités signalées par Tim Coen (Curesec GmbH) que nous remercions pour le signalement, ainsi que deux autres défauts.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.8.1-2.8.2.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>
<div class="footnotes"><h4 class="footnotes-title">Note</h4>
<p>[<a href="https://fr.dotclear.org/blog/post/2015/10/25/Dotclear-2.8.2#rev-pnote-1038-1" id="pnote-1038-1">1</a>] Vous pouvez également créer un fichier <strong>.htaccess</strong> à la racine de votre dossier public et y insérer une directive <strong>php_flag engine Off</strong> pour empêcher toute exécution de code PHP depuis votre médiathèque.</p></div>
";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2015-10-25T09:37:00+01:00";s:2:"TS";i:1445762220;}i:12;O:8:"stdClass":8:{s:4:"link";s:59:"https://fr.dotclear.org/blog/post/2015/09/23/Dotclear-2.8.1";s:5:"title";s:14:"Dotclear 2.8.1";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:658:"    <p>Une nouvelle version de maintenance qui règle une potentielle faille de sécurité du côté des listes des billets et des pages, faille signalée par Yuji Tounai of NTT Com Security (Japan) KK (via Keiko Yashiki du JPCERT/CC) que nous remercions pour le signalement, ainsi que deux autres défauts moins critiques.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.8-2.8.1.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2015-09-23T15:34:00+02:00";s:2:"TS";i:1443015240;}i:13;O:8:"stdClass":8:{s:4:"link";s:79:"https://fr.dotclear.org/blog/post/2015/08/14/Dotclear-2.8-%3A-CKEditor-en-panne";s:5:"title";s:34:"Dotclear 2.8 : CKEditor en panne ?";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:591:"    <p>Quelques uns d'entres vous nous ont rapporté des soucis avec l'usage de CKEditor depuis la mise à jour en 2.8 de Dotclear.</p>


<p>Après vérification il s'agit, dans la majorité des cas (a priori tous), d'un souci avec le réglage d'une constante dans le fichier <code>inc/config.php</code> de vos installations.</p>


<p>Dans ce fichier, une ligne indique l'URL de l'administration&nbsp;:</p>

<pre>
// Admin URL. You need to set it for some features.
define('DC_ADMIN_URL','http://exemple.com/dotclear/admin/');
</pre>


<p>Vérifiez qu'elle est correctement positionnée.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2015-08-14T11:25:00+02:00";s:2:"TS";i:1439544300;}i:14;O:8:"stdClass":8:{s:4:"link";s:57:"https://fr.dotclear.org/blog/post/2015/08/13/Dotclear-2.8";s:5:"title";s:12:"Dotclear 2.8";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:3070:"    <p>Quelques mois après la version 2.7.5 voilà aujourd'hui, pour le 12e anniversaire de Dotclear, la version 2.8 qui pointe le bout de son nez sous les traits de <strong>Dotty</strong><sup>[<a href="https://fr.dotclear.org/blog/post/2015/08/13/Dotclear-2.8#pnote-1033-1" id="rev-pnote-1033-1">1</a>]</sup>, notre nouvelle mascotte<sup>[<a href="https://fr.dotclear.org/blog/post/2015/08/13/Dotclear-2.8#pnote-1033-2" id="rev-pnote-1033-2">2</a>]</sup>&nbsp;:</p>


<p><img src="https://fr.dotclear.org/public/dotty.jpg" alt="Dotty the new Dotclear mascot" style="display:block; margin:0 auto;" title="Dotty the new Dotclear mascot, août 2015" /></p>
<p style="text-align: center;">Dotty</p>



<p>Cette nouvelle version introduit un nouveau mécanisme qui permet de gérer des dépendances entres modules (plugins pour l'instant et bientôt pour les thèmes), intègre le plugin Breadcrumb (fil d'Ariane que certains d'entre-vous utilisent peut-être déjà), met à jour l'éditeur CKEditor et la librairie jQuery, corrige pas mal de bugs et de petits problèmes cosmétiques.</p>


<p>Le système d'extension/héritage des templates a été appliqué au jeu de template <code>mustek</code>, afin de simplifier le développement les thèmes qui s'appuient dessus, quelques critères de tri et de filtre ont été ajoutés pour l'affichage des billets et des commentaires (et spams) côté administration, les mots-clés et widgets sont dorénavant triés selon un ordre lexical pour les langues utilisant un alphabet latin, entre autre choses sur lesquelles nous reviendrons de temps en temps par ici.</p>


<p><strong>Important</strong>&nbsp;: Si vous avez installé le plugin <strong>breadcrumb</strong> (intitulé «&nbsp;Fil d'Ariane »), désinstallez-le avant de faire cette mise à jour.</p>


<p>Autre chose&nbsp;: nous allons abandonner le support de la version 5.2 de PHP et imposer a minima la version 5.3 (qui rappellons-le est déjà obsolète). Sachez que Dotclear a été testé jusqu'à la version 5.6 de PHP.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et <a href="http://download.dotclear.org/patches/2.7.5-2.8.diff.gz">un patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>
<div class="footnotes"><h4 class="footnotes-title">Notes</h4>
<p>[<a href="https://fr.dotclear.org/blog/post/2015/08/13/Dotclear-2.8#rev-pnote-1033-1" id="pnote-1033-1">1</a>] Nous devons ce joli nom à Noé (aka Lomalarch) et quand nous avons découvert ce que ça voulait dire en anglais (toqué), nous avons trouvé ça très approprié, vu qu'on l'est tous à des degrés divers chez Dotclear !</p>
<p>[<a href="https://fr.dotclear.org/blog/post/2015/08/13/Dotclear-2.8#rev-pnote-1033-2" id="pnote-1033-2">2</a>] Nous devons cette magnifique illustration à notre ami et artiste <a href="https://fr.wikipedia.org/wiki/Alain_Korkos">Alain Korkos</a> que peut-être connaissez-vous déjà.</p></div>
";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2015-08-13T11:11:00+02:00";s:2:"TS";i:1439457060;}i:15;O:8:"stdClass":8:{s:4:"link";s:59:"https://fr.dotclear.org/blog/post/2015/03/25/Dotclear-2.7.5";s:5:"title";s:14:"Dotclear 2.7.5";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:694:"    <p>Une nouvelle version de maintenance qui règle deux potentielles failles de sécurité du côté de l'édition des billets et des pages, failles signalées ce matin par the <a href="http://secpod.org/blog/" hreflang="en">SecPod Research Team Member</a> Shakeel que nous remercions pour le signalement, ainsi que trois autres défauts moins critiques.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.7.4-2.7.5.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2015-03-25T10:36:00+01:00";s:2:"TS";i:1427276160;}i:16;O:8:"stdClass":8:{s:4:"link";s:59:"https://fr.dotclear.org/blog/post/2015/02/13/Dotclear-2.7.4";s:5:"title";s:14:"Dotclear 2.7.4";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:503:"    <p>Petite version de maintenance, qui a pour petit nom «&nbsp;The Cat », et qui apporte son (petit) lot de corrections et d'améliorations ce vendredi 13&nbsp;!</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.7.3-2.7.4.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2015-02-13T09:57:00+01:00";s:2:"TS";i:1423817820;}i:17;O:8:"stdClass":8:{s:4:"link";s:59:"https://fr.dotclear.org/blog/post/2015/01/13/Dotclear-2.7.3";s:5:"title";s:14:"Dotclear 2.7.3";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:687:"    <p>Petite version de correction, qui a pour petit nom «&nbsp;Le Grand Duduche&nbsp;» et qui restaure la possibilité d'utiliser un éditeur pour la description des catégories, rétablit le fonctionnement correct des popups d'insertion de média, corrige la pagination dans certains cas particuliers, règle quelques messages intempestifs, etc.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.7.2-2.7.3.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2015-01-13T10:26:00+01:00";s:2:"TS";i:1421141160;}i:18;O:8:"stdClass":8:{s:4:"link";s:59:"https://fr.dotclear.org/blog/post/2014/12/25/Dotclear-2.7.2";s:5:"title";s:14:"Dotclear 2.7.2";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:481:"    <p>Une version de correction pour régler un bug qui empêchait les utilisateurs non administrateurs d'utiliser l'éditeur Wiki de Dotclear.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.7.1-2.7.2.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2014-12-25T14:07:00+01:00";s:2:"TS";i:1419512820;}i:19;O:8:"stdClass":8:{s:4:"link";s:59:"https://fr.dotclear.org/blog/post/2014/12/25/Dotclear-2.7.1";s:5:"title";s:14:"Dotclear 2.7.1";s:7:"creator";s:6:"Franck";s:11:"description";s:0:"";s:7:"content";s:798:"    <p>Une version de maintenance qui corrige quelques bugs signalés depuis la sortie de la 2.7 il y a quelques jours et apporte quelques retouches cosmétiques du côté du nouveau thème Berlin et du jeu de template Currywurst.</p>


<p>La proposition de mise à jour de votre installation devrait apparaître sur votre tableau de bord aujourd'hui ou demain (selon les réglages de votre hébergement) et un <a href="http://download.dotclear.org/patches/2.7-2.7.1.diff.gz">patch</a> est disponible pour les développeurs préférant appliquer cette méthode.</p>


<p>Le seul regret que nous avons, et que j'espère temporaire, est que nos utilisateurs chez Free sont contraints de continuer avec la version 2.5.3 seulement, compte tenu de la version trop ancienne de PHP en service là-bas.</p>";s:7:"subject";a:1:{i:0;s:4:"News";}s:7:"pubdate";s:25:"2014-12-25T08:25:00+01:00";s:2:"TS";i:1419492300;}}}