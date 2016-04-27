<?

	/* Datenbankverbindung herstellen */
	function connectdb() {

		$db_connection = mysql_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT);
		if (!$db_connection ) die('<div id="phperror">Verbindung zur Datenbank fehlgeschlagen.</div>');
		// if (!$db_connection ) die('<div id="phperror">Verbindung zur Datenbank fehlgeschlagen: '.mysql_error().'</div>');

		mysql_set_charset('utf8', $db_connection);

		$db_selection = mysql_select_db( MYSQL_DATENBANK );
		if (!$db_selection) die('<div id="phperror">Auswahl der Datenbank fehlgeschlagen.</div>');
		// if (!$db_selection) die('<div id="phperror">Auswahl der Datenbank fehlgeschlagen:'.mysql_error().'</div>');

		return $db_connection;
	}

	/* Datenbankanfrage */
	function querydb($db_query) {

		/* Verbindungskram in function connectdb() und function closedb() ausgelagert,
		 * damit mysql_real_escape_string() eine offene DB-Verbindung hat
		 */

		$db_query = mysql_query ($db_query);
		if (!$db_query) die('<div id="phperror">Anfrage fehlgeschlagen!</div>');
		// if (!$db_query) die('<div id="phperror">Anfrage fehlgeschlagen! '. mysql_error().'</div>');

		return $db_query;
	}

	/* Datenbankverbundung schließen */
	function closedb($db_connection) {

		$db_closed = mysql_close($db_connection);
		if (!$db_closed) die('<div id="phperror">Verbindung zur Datenbank fehlgeschlagen.</div>');
		// if (!$db_closed) die('<div id="phperror">Verbindung zur Datenbank fehlgeschlagen:'.mysql_error().'</div>');

		return $db_closed;
	}

	/* Teile aus String auslesen (für Eventbeschreibung aus eXma-DB) */
	function extractString($str, $start, $end) {

		$str_low = strtolower($str);
		$pos_start = strpos($str_low, $start);
		$pos_end = strpos($str_low, $end, ($pos_start + strlen($start)));
		if ( ($pos_start !== false) && ($pos_end !== false) ) {
			$pos1 = $pos_start + strlen($start);
			$pos2 = $pos_end - $pos1;
			return substr($str, $pos1, $pos2);
		}
	}

	/* aktuelle URL ausgeben*/
	function curPageURL() {

		$pageURL = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';

		if ( preg_match("/80|443/", $_SERVER['SERVER_PORT']) ) {
			$pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		} else {
			$pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		}
		return $pageURL;
	}


	/* String für RealURL vorbereiten */ // http://cubiq.org/the-perfect-php-clean-url-generator
	setlocale(LC_ALL, 'en_US.UTF-8');
	function toAscii($str, $replace=array(), $delimiter='-') {
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$clean = iconv('utf8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
		$clean = strtolower(trim($clean, '-'));

		return $clean;
	}


	/************************************* Query Funktionen ****************************************/


	/* Normale Inhalte holen */
	function getContent($id) {

		$db_connection = connectdb();
		$result = querydb('	SELECT ipb_posts.post
							FROM ipb_posts
							WHERE ipb_posts.pid = '.mysql_real_escape_string($id).'
		');
		$db_closed = closedb($db_connection);

		return mysql_fetch_array( $result, MYSQL_ASSOC);
	}

	/* Ein Event holen */
	function getEvent($id) {

		$db_connection = connectdb();
		$result = querydb('	SELECT ipb_topics.title, ipb_posts.post, exma_events.event_id, exma_events.price, exma_events.start, exma_events.end,
									exma_locations.location, exma_locations.strasse, exma_locations.plz, exma_locations.stadt, ipb_attachments.attach_location
							FROM exma_events
							LEFT JOIN ipb_topics ON exma_events.event_id = ipb_topics.tid
							LEFT JOIN ipb_posts ON ipb_topics.topic_firstpost = ipb_posts.pid
							LEFT JOIN ipb_attachments ON ipb_posts.pid = ipb_attachments.attach_pid
							LEFT JOIN exma_locations ON exma_events.location_id = exma_locations.lid
							WHERE exma_events.event_id = '.mysql_real_escape_string($id).'
		');
		$db_closed = closedb($db_connection);

		return mysql_fetch_array( $result, MYSQL_ASSOC);
	}

	/* Alle Events der Kategorie $id holen */
	function getAllEvents($category, $start, $end) {

		$db_connection = connectdb();
		$result = querydb('	SELECT ipb_topics.title, ipb_posts.post, exma_events.event_id, exma_events.price, exma_events.start, exma_events.end,
									exma_locations.location, exma_locations.strasse, exma_locations.plz, exma_locations.stadt, ipb_attachments.attach_location
							FROM exma_events
							LEFT JOIN ipb_topics ON exma_events.event_id = ipb_topics.tid
							LEFT JOIN ipb_posts ON ipb_topics.topic_firstpost = ipb_posts.pid
							LEFT JOIN ipb_attachments ON ipb_posts.pid = ipb_attachments.attach_pid
							LEFT JOIN exma_locations ON exma_events.location_id = exma_locations.lid
							WHERE exma_events.category = '.mysql_real_escape_string($category).'
							AND exma_events.start > '.mysql_real_escape_string($start).'
							AND exma_events.end < '.mysql_real_escape_string($end).'
							ORDER BY exma_events.start ASC
		');
		$db_closed = closedb($db_connection);

		$result_array = array();
		while ($a = mysql_fetch_array($result, MYSQL_ASSOC)) {
			array_push($result_array, $a);
		}

		return $result_array;
	}

	/* Alle Events der Kategorie $id holen */
	function getAllEvents2() {

		$db_connection = connectdb();
		$result = querydb('	SELECT exma_locations.location, ipb_posts.post
							FROM `ipb_posts`
							LEFT JOIN exma_veranstalter ON exma_veranstalter.mid = ipb_posts.author_id
							LEFT JOIN exma_locations ON exma_locations.lid = exma_veranstalter.location_id
							WHERE ipb_posts.topic_id = 6059445
							AND exma_locations.logo != \'\'
		');
		$db_closed = closedb($db_connection);

		$result_array = array();
		while ($a = mysql_fetch_array($result, MYSQL_ASSOC)) {
			array_push($result_array, $a);
		}

		return $result_array;
	}

	/* Liste aller Clubs (Locations mit Logo)  */
	function getAllClubs($id) {

		$db_connection = connectdb();
		$result = querydb('	SELECT DISTINCT exma_locations.location AS name, exma_locations.url
							FROM exma_events
							LEFT JOIN exma_locations ON exma_events.location_id = exma_locations.lid
							WHERE exma_events.category = '.mysql_real_escape_string($id).'
							AND exma_locations.logo <> ""
							AND exma_events.start > 1335830400
							ORDER BY exma_events.start ASC
		');
		$db_closed = closedb($db_connection);

		$result_array = array();
		while ($a = mysql_fetch_array($result, MYSQL_ASSOC)) {
			array_push($result_array, $a);
		}

		return $result_array;
	}




	/************************************* Ausgabefunktionen ****************************************/

	function printContent($contentid){

		$content = getContent($contentid);

		$text = $content['post'];
		// eXma-Müll
		// $text = preg_replace('/<span style=\'font-family:Impact\'>(.*)<\/span>/Usi','<h1>$1</h1>',$text); // Überschriften
		// $text = preg_replace('/<span style=\'font-family:Geneva\'>(.*)<\/span>/Usi','<h2>$1</h2>',$text); // Überschriften
		// $text = preg_replace('/\[table\]<br \/>(.*)\[\/table\]/Usi','<table>$1</table>',$text); // Tabellen
		// $text = preg_replace('/\[tr\]<br \/>(.*)\[\/tr\]<br \/>/Usi','<tr>$1</tr>',$text); // Tabellen
		// $text = preg_replace('/\[th\](.*)\[\/th\]<br \/>/Usi','<th>$1</th>',$text); // Tabellen
		// $text = preg_replace('/\[td\](.*)\[\/td\]<br \/>/Usi','<td>$1</td>',$text); // Tabellen
		$text = preg_replace('/\[attachmentid=(.*)\]/Usi','<img class="attachment thumbnail" src="http://www.exmatrikulationsamt.de/?act=Attach&amp;type=post&amp;id=$1" alt=""/>',$text); // Anhänge
		// $text = preg_replace('/\[float=(.*)\](.*)\[\/float\]/Usi','<span class="$1">$2</span>',$text); // Floats
		// $text = preg_replace('/http:\/\/www\.exmatrikulationsamt\.de\/index\.php\?act=ST&f=177&t=6059445&st=0#entry/i','index.php?id=',$text); // Programm-Links
		// $text = preg_replace('/><br \/>/i','>',$text); // Umbrüche nach Überschriften

		// $text = extractString($text, '<!--sinfo-->', '<!--einfo-->');

		$text = preg_replace('/\[.*?\]|\[\/(.*?)\]/i','',$text); // BB-Code
		// $text = preg_replace('/http\:\/\/index\.php/i','index.php',$text); // BB-Code
		// $text = preg_replace('/border=\'0\'|bild kann nicht angezeigt werden/i','',$text); // valide Images
		// $text = preg_replace('/<center>(.*)<\/center>/i','</p><p style="text-align:center;">$1<\/p><p>',$text); // deprecated Center-Tag
		// $text = preg_replace('/<div class="event-essentials">(.*)<\/div>/i','',$text); // ort und zeit weg

		echo $text."\n";
	}


	function printEvent($eventId){

		$event = getEvent($eventId);

		$text = $event['post'];
		// eXma-Müll
		$text = preg_replace('/\[.*?\]|\[\/.*?\]/i','',$text); // BB-Code
		$text = preg_replace('/border=\'0\'|bild kann nicht angezeigt werden/i','',$text); // valide Images
		$text = preg_replace('/<center>/i','</p><p style="text-align:center;">',$text); // deprecated HTML
		$text = preg_replace('/<\/center>/i','</p><p>',$text);

		$imageThumb = 'http://exma.de/uploads/'.substr($event['attach_location'], 0, -4).'_thumb.jpg';
		if (@GetImageSize($imageThumb)) {
			$image = $imageThumb;
		} else {
			$image = $imageThumb = 'http://exma.de/uploads/'.substr($event['attach_location'], 0, -4).'.jpg';
		}
		echo '<div class="club-event row" id="e'.$event['event_id'].'">';
			echo '<div class="span9">';
				echo '<h3>'.$event['location'].'</h3>'."\n";
				echo '<div class="event-section">';
					echo ''.(isset($event['attach_location']) ? '<figure class="event-image"><img src="'.$image.'" alt="'.$event['title'].'" /></figure>':'').'';
					echo '<h4>'.$event['title'].'</h4>'."\n";
					echo '<p>'.extractstring($text, '<!--sinfo-->', '<!--einfo-->').'</p>'; // Nur der Ausschnitt mit Text
				echo '</div>'."\n";
			echo '</div>';
		echo '</div>';
	}

	function returnEvent($eventId){

		$event = getEvent($eventId);

		$text = $event['post'];
		// eXma-Müll
		$text = preg_replace('/\[.*?\]|\[\/.*?\]/i','',$text); // BB-Code
		$text = preg_replace('/border=\'0\'|bild kann nicht angezeigt werden/i','',$text); // valide Images
		$text = preg_replace('/<center>/i','</p><p style="text-align:center;">',$text); // deprecated HTML
		$text = preg_replace('/<\/center>/i','</p><p>',$text);

		$imageThumb = 'http://exma.de/uploads/'.substr($event['attach_location'], 0, -4).'_thumb.jpg';
		if (@GetImageSize($imageThumb)) {
			$image = $imageThumb;
		} else {
			$image = $imageThumb = 'http://exma.de/uploads/'.substr($event['attach_location'], 0, -4).'.jpg';
		}
		return '
		<div class="slider-elements" id="e'.$event['event_id'].'">
			<div class="clubName">'.$event['location'].'</div>'.(isset($event['attach_location']) ? '
				<div class="clubEvent">'.$event['title'].'</div>
			    	<div class="flex-wrapper">
                	<div class="image-wrapper">	
						<img src="'.$image.'" alt="'.$event['title'].'" />
					</div>':'').'
					<div class="text-wrapper">
					<p>'.extractstring($text, '<!--sinfo-->', '<!--einfo-->').'</p>
				</div>
			</div>
		</div>'; // Nur der Ausschnitt mit Text
	}



	function printLocation($eventId,$locationId){

		$event = getEvent($eventId);
		if ($event) {
			echo '<dt><span>'.$locationId.'</span></dt>';
			echo '<dd><a class="nav-links" href="#e'.$event['event_id'].'">'.$event['location'].'</a></dd>';
		}

	}

	function returnLocation($eventId,$locationId){

		$event = getEvent($eventId);
		if ($event) {
			return '<div><a href="#e'.$event['event_id'].'"><p><img src="img/numbers/n-'.$locationId.'.png">'.$event['location'].'</p></a></div>'; 
		}

	}




	function printAllEvents($categoryid, $start, $end){

		$allevents = getAllEvents($categoryid, $start, $end);

		foreach ($allevents as $event) {

			$text = $event['post'];
			// eXma-Müll
			$text = preg_replace('/\[.*?\]|\[\/.*?\]/i','',$text); // BB-Code
			$text = preg_replace('/border=\'0\'|bild kann nicht angezeigt werden/i','',$text); // valide Images
			$text = preg_replace('/<center>/i','</p><p style="text-align:center;">',$text); // deprecated HTML
			$text = preg_replace('/<\/center>/i','</p><p>',$text);

			$imageThumb = 'http://exma.de/uploads/'.substr($event['attach_location'], 0, -4).'_thumb.jpg';
			if (@GetImageSize($imageThumb)) {
				$image = $imageThumb;
			} else {
				$image = $imageThumb = 'http://exma.de/uploads/'.substr($event['attach_location'], 0, -4).'.jpg';
			}

			echo '<div class="row" id="'.$event['event_id'].'">';
				echo '<div class="span9">';
					echo '<h3>'.$event['location'].'</h3>'."\n";
					echo '<div class="event-section">';
						echo ''.(isset($event['attach_location']) ? '<figure class="event-image"><img src="'.$image.'" alt="'.$event['title'].'" /></figure>':'').'';
						echo '<h4>'.$event['title'].'</h4>'."\n";
						echo '<p>'.extractstring($text, '<!--sinfo-->', '<!--einfo-->').'</p>'; // Nur der Ausschnitt mit Text
					echo '</div>'."\n";
				echo '</div>';
			echo '</div>';

		}
	}


	function printEventMenuItems($categoryid){

		$allevents = getAllEvents($categoryid);

		foreach ($allevents as $event) {
			echo '<li><a href="#e'.$event['event_id'].'">';
				echo '<span class="date">'.date('d.m.',$event['start']).'</span> ';
				echo '<span class="event">'.$event['title'].'</span> ';
				echo '<span class="location">'.$event['location'].'</span>';
			echo '</a></li>'."\n";
		}
	}

	function printEventIndexItems($categoryid){

		$allevents = getAllEvents($categoryid);

		foreach ($allevents as $event) {
			echo '<tr>';
				echo '<td><a href="#e'.$event['event_id'].'">'.date('d.m.',$event['start']).'</a></td>';
				echo '<td><a href="#e'.$event['event_id'].'">'.$event['title'].'</a></td> ';
				echo '<td><a href="#e'.$event['event_id'].'">'.$event['location'].'</a></td>';
				echo '<td><a href="#e'.$event['event_id'].'">'.(( ($event['price'] =='0') || ($event['price'] =='') ) ? '-' : ' '.$event['price'].'&euro;').'</a></td>';
			echo '</tr>'."\n";
		}
	}



	function printClubListItems($categoryid){

		$allclubs = getAllClubs($categoryid);

		foreach ($allclubs as $club) {
			echo '<li><a href="'.$club['url'].'">'.$club['name'].'</a></li>'."\n";
		}
	}

?>
