<?php
    $title = 'Accueil';
    require '_header.php';

	$viewShouts = get_shouts();
    $nbreMessages = count_value_array($viewShouts);
    
?>


<div id="main"><!-- MAIN -->
    <div class="content"><!-- CONTENT -->
		<div id="tribune">
			<div id="optionbar">
				<div id="optionbarcontent"></div>
			</div>
		<H1 id="titretribune">TRIBUNE / <a href="#" id="archives">VOIR LES ARCHIVES</a></H1>
		<div id="poststribune">
        <?php
          // Affichage des messages de la shoutbox
          for($j = 0; $j <= $nbreMessages; $j++){
              // Si la cellule du tableau contient qqchose, on traite !
              if(isset($viewShouts[$j])){
				
                  // De quel type de message s'agit il ? date ? me ? message ?
                  if($viewShouts[$j]['type'] == 'date'){

                    // C'est une date, on l'affiche simplement
                    echo '<div class="date"><h5>'.$viewShouts[$j]['date'].'</h5></div>';

                  }elseif($viewShouts[$j]['type'] == 'me'){

                      // C'est un auto-message... IRC etc etc...
                      $js = '';
                      // Si l'utilisateur est loggé on va activer les fonctions de réponses en js
                      if($forum_user['is_guest'] != 1){

                        $js = 'onclick="';
                        $js .= 'document.forms.shout.message.value=\'';
                        $js .= $viewShouts[$j]['sender'];
                        $js .= ' >> \';';
                        $js .= 'document.forms.shout.message.focus()"';
                      }

                      // On affiche le message
                      echo '<div class="me" '.$js.'>';

                      // On affiche un système de bookmark pour linker le shout....
                      if(isset($viewShouts[$j]['id'])) echo '<div class="shoutoptions"><a href="viewshout.php?id='.$viewShouts[$j]['id'].'" class="options"><img src="imgs/bookmark.png"></a></div>';
                      
                      echo '<div id="'. $viewShouts[$j]['id'] .'">';

                      // Si le visiteur est loggé et est admin, on affiche la possibilité de supprimer le shout
                      if(isset($forum_user['is_admmod']) AND $forum_user['is_admmod'] == 1) echo '<a href="delshout.php?id='.$viewShouts[$j]['id'].'"><img src="imgs/Blocked.png" class="inline"></a> ';

                      echo $viewShouts[$j]['sender'].' '.$viewShouts[$j]['message'];


                      echo '</div></div>';

                  }else{

                      // C'est un message normal
                      $jsDate = '';
                      $jsSender = '';
                      // Si l'utilisateur est loggé on va activer les fonctions de réponses en js
                      if($forum_user['is_guest'] != 1){

                          $jsDate = 'onclick="';
                          $jsDate .= 'document.forms.shout.message.value=\'';
                          $jsDate .= $viewShouts[$j]['date'];
                          $jsDate .= ' >> \';';
                          $jsDate .= 'document.forms.shout.message.focus()"';

                          $jsSender = 'onclick="';
                          $jsSender .= 'document.forms.shout.message.value=\'';
                          $jsSender .= $viewShouts[$j]['sender'];
                          $jsSender .= ' >> \';';
                          $jsSender .= 'document.forms.shout.message.focus()"';

                      }

                      // On affiche le message
                      echo '<div class="shout';
                      // Si c'est notre propre message, on affiche un autre indicateur, pareil, à modifier..
                      if(isset($viewShouts[$j]['own']) AND $viewShouts[$j]['own'] == 1){
                      	echo ' own">';
                      }elseif(isset($viewShouts[$j]['response']) AND $viewShouts[$j]['response'] == 1){
                      	echo ' response">';
                      }else{
                      	echo '">';
                      }

                      // On affiche un système de bookmark pour linker le shout....
                      if(isset($viewShouts[$j]['id'])) echo '<div class="shoutoptions"><a href="viewshout.php?id='.$viewShouts[$j]['id'].'" class="options"></a></div>';

                      echo '<div id="'. $viewShouts[$j]['id'] .'" class="shoutcontent">';

                      // Si le visiteur est loggé et est admin, on affiche la possibilité de supprimer le shout
                      if(isset($forum_user['is_admmod']) AND $forum_user['is_admmod'] == 1) echo '<a href="delshout.php?id='.$viewShouts[$j]['id'].'"><img src="imgs/Blocked.png" class="inline"></a> ';

                      echo '<span class="dateShout" '.$jsDate.'>'.$viewShouts[$j]['date'].'</span> ';
                      echo '<span class="sender" '.$jsSender.'>'.$viewShouts[$j]['sender'].'</span> : ';
                      echo '<span class="message" '.$jsSender.'>'.$viewShouts[$j]['message'].'</span>';

                      // Si c'est une réponse on affiche un indicateur, à modifier quand on aura le style CSS
                      //if(isset($viewShouts[$j]['response']) AND $viewShouts[$j]['response'] == 1) echo ' <img src="images/icons/arrow_right.gif">';

                      // Si c'est notre propre message, on affiche un autre indicateur, pareil, à modifier..
                      //if(isset($viewShouts[$j]['own']) AND $viewShouts[$j]['own'] == 1) echo ' <img src="images/icons/warning.gif">';


                      echo '</div></div>';

                  }
              }
          }
          ?>
       	  </div>
       </div><!-- /TRIBUNE -->
       <div id="lastposts">
       		<H1 id="titrelastposts">DERNIERS MESSAGES SUR LE FORUM</H1>
       		<div id="posts">
       			<?php
					get_10last_posts();
       			?>
       		</div>
       </div>
       <div id="online">
       		<H1 id="online_users">UTILISATEURS CONNECTES</H1>
       		<div id="users">
       			<?php
       				get_online_users();
       			?>
       		</div>
       </div>
       
       <?php
              
    
		define('FORUM_ALLOW_INDEX', 1);
		define('FORUM_PAGE', 'news');

		   
		// Fetch list of news
		$query = array(
			'SELECT'	=> 't.id, t.subject, t.posted, t.first_post_id, t.num_views, t.num_replies, p.poster, p.poster_id, p.message, p.hide_smilies, p.posted',
			'JOINS' 	=>  array(
				array(
					'LEFT JOIN'	=> 'posts AS p',
					'ON'		=> 't.first_post_id=p.id'
				),
				array(
					'LEFT JOIN'	=> 'forum_perms AS fp',
					'ON'		=> '(fp.forum_id=t.forum_id AND fp.group_id='.$forum_user['g_id'].')'
				)
			),
			'FROM'		=> 'topics AS t',
			'WHERE'		=> '(fp.read_forum IS NULL OR fp.read_forum=1) AND t.forum_id IN (23)',
			'ORDER BY'	=> 'p.posted DESC',
			'LIMIT'		=> '0, 3',
		);       

		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
		
		while ($cur_news = $forum_db->fetch_assoc($result)){
       
       		$forum_page['info'] = $forum_page['info-right'] = array();
       
       		$cur_news['subject'] = forum_htmlencode($cur_news['subject']);
       
       		if ($forum_config['o_censoring'] == '1')
       			$cur_news['subject'] = censor_words($cur_news['subject']);
       
       		$forum_page['info'][] = 'Posté le : '.format_time($cur_news['posted']);
       		$forum_page['info'][] = 'Auteur : '.forum_htmlencode($cur_news['poster']);
       
       		$forum_page['post_message'] = $cur_news['message'];
       		
       		if (utf8_strlen($forum_page['post_message']) > 500)
       		{
       			$forum_page['post_message'] = utf8_substr($forum_page['post_message'], 0, 500).'...';
       			$forum_page['info'][] = '<a href="'.forum_link($forum_url['topic'], array($cur_news['id'], sef_friendly($cur_news['subject']))).'">Lire la suite</a>';
       		}
       
       		$forum_page['post_message'] = parse_message($forum_page['post_message'], $cur_news['hide_smilies']);
       
       		//$forum_page['info'][] = $lang_portal['Views'].': '.$cur_news['num_views'];
       		$forum_page['info-right'][] = '<a href="'.forum_link($forum_url['topic'], array($cur_news['id'], sef_friendly($cur_news['subject']))).'">Commentaires : '.$cur_news['num_replies'].'</a>';
       

       
       ?>
       <div class="news">
       		<H1 class="titrenews">
       			<a href="<?php echo forum_link($forum_url['topic'], array($cur_news['id'], sef_friendly($cur_news['subject']))) ?>"><?php echo $cur_news['subject'] ?></a>
       		</H1>
       		<div class="postnews">
       			<?php
       				echo $forum_page['post_message'];
       			?>
       			<div class="news-info-right">
	       			<?php
	       				echo implode(' | ', $forum_page['info-right']);
	       			?>
       			</div>
       			<div class="news-info">
	       			<?php
	       				echo implode(' | ', $forum_page['info']);
	       			?>
       			</div>
       		</div>
       </div>
       <?php
       	}
       ?>
	</div><!-- /CONTENT -->
</div><!-- /MAIN -->
<script>
	$(document).ready(function () {
		$("#optionbar").css("display","none");
	});
</script>
<?php
	require '_footer.php';
?>