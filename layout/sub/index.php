<div id="season-countdown" class="alert" style="font-size: 13px; font-family: 'verdana'; border-color: var(--shark-main); background-color: var(--cream-d2); margin: 20px 0 0;text-align: center;">
<?php
// Front page server information box by Raggaer. Improved by Znote. (Using cache system and Znote SQL functions)
// Create a cache system
$infoCache = new Cache('engine/cache/serverInfo');
$infoCache->setExpiration(60); // This will be a short cache (60 seconds)
if ($infoCache->hasExpired()) {

    // Fetch data from database
    $data = array(
        'newPlayer' => mysql_select_single("SELECT `name` FROM `players` ORDER BY `id` DESC LIMIT 1"),
        'bestPlayer' => mysql_select_single("SELECT `name`, `level` FROM `players` ORDER BY `experience` DESC LIMIT 1"),
        'playerCount' => mysql_select_single("SELECT COUNT(`id`) as `count` FROM `players`"),
        'accountCount' => mysql_select_single("SELECT COUNT(`id`) as `count` FROM `accounts`"),
        'guildCount' => mysql_select_single("SELECT COUNT(`id`) as `count` FROM `guilds`")
    );

    // Initiate default values where needed
    if ($data['playerCount'] !== false && $data['playerCount']['count'] > 0) $data['playerCount'] = $data['playerCount']['count'];
    else $data['playerCount'] = 0;
    if ($data['accountCount'] !== false && $data['accountCount']['count'] > 0) $data['accountCount'] = $data['accountCount']['count'];
    else $data['accountCount'] = 0;
    if ($data['guildCount'] !== false && $data['guildCount']['count'] > 0) $data['guildCount'] = $data['guildCount']['count'];
    else $data['guildCount'] = 0;

    // Store data to cache
    $infoCache->setContent($data);
    $infoCache->save();
} else {
    // Load data from cache
    $data = $infoCache->load();
}
?>

<!-- Render HTML for server information -->
<table border="0" cellspacing="0" style="text-align: center;">
    <tr class="yellow">
        <td>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; Server Information</td>
    </tr>
    <tr>
        <td>
          &emsp; &emsp;  &emsp; &emsp; &emsp; &emsp; &emsp;  &emsp; &emsp; &emsp;&emsp; &emsp;  &emsp; Welcome to our newest player:
                <a href="characterprofile.php?name=<?php echo $data['newPlayer']['name']; ?>" style="color:gold">
                 <strong><?php echo $data['newPlayer']['name']; ?></strong>
                </a>
            
        </td>
    </tr>
    <tr>
        <td>
            &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;  The best player is:
                <a href="characterprofile.php?name=<?php echo $data['bestPlayer']['name']; ?>" style="color:gold">
                 <strong><?php echo $data['bestPlayer']['name']; ?></strong>
                </a> level: <strong><?php echo $data['bestPlayer']['level']; ?> </strong> congratulations!
            
        </td>
    </tr>
    <tr>
        <td>
        &emsp; &emsp; &emsp; &emsp; &emsp;   &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;  We have <b><?php echo $data['accountCount']; ?></b> accounts in our database, <b><?php echo $data['playerCount']; ?></b> players, and <b><?php echo $data['guildCount']; ?></b> guilds 
        </td>
    </tr>
</table>
</div>

<?php
if ($config['UseChangelogTicker']) {
	//////////////////////
	// Changelog ticker //
	// Load from cache
	$changelogCache = new Cache('engine/cache/changelog');
	$changelogs = $changelogCache->load();

	if (isset($changelogs) && !empty($changelogs) && $changelogs !== false) {
		?><hr>
		<div class="panel panel-default">
		<div class="panel-heading">
		<table id="changelogTable">
			<tr class="yellow">
				<td colspan="2">Latest Changelog Updates (<a href="changelog.php" style="color: darkorange;">Click here to see full changelog</a>)</td>
			</tr>
			<?php
			for ($i = 0; $i < count($changelogs) && $i < 5; $i++) {
				?>
				<tr>
					<td><?php echo getClock($changelogs[$i]['time'], true, true); ?></td>
					<td><?php echo $changelogs[$i]['text']; ?></td>
				</tr>
				<?php
			}
			?>
		</table></div></div>
		<?php
	} else echo "No changelogs submitted.";
}
$cache = new Cache('engine/cache/news');
if ($cache->hasExpired()) {
	$news = fetchAllNews();
	
	$cache->setContent($news);
	$cache->save();
} else {
	$news = $cache->load();
}

// Design and present the list
if ($news) {
	function TransformToBBCode($string) {
		$tags = array(
			'[center]{$1}[/center]' => '<center>$1</center>',
			'[b]{$1}[/b]' => '<b>$1</b>',
			'[size={$1}]{$2}[/size]' => '<font size="$1">$2</font>',
			'[img]{$1}[/img]'    => '<a href="$1" target="_BLANK"><img src="$1" alt="image" style="width: 100%"></a>',
			'[link]{$1}[/link]'    => '<a href="$1">$1</a>',
			'[link={$1}]{$2}[/link]'   => '<a href="$1" target="_BLANK">$2</a>',
			'[color={$1}]{$2}[/color]' => '<font color="$1">$2</font>',
			'[*]{$1}[/*]' => '<li>$1</li>',
		);

		foreach ($tags as $tag => $value) {
			$code = preg_replace('/placeholder([0-9]+)/', '(.*?)', preg_quote(preg_replace('/\{\$([0-9]+)\}/', 'placeholder$1', $tag), '/'));
			$string = preg_replace('/'.$code.'/i', $value, $string);
		}

		return $string;
	}
	foreach ($news as $n) {
		?>

		<div class="panel panel-default">
	    	<div class="panel-heading"><?php echo getClock($n['date'], true); ?> | <?php echo TransformToBBCode($n['title']); ?> Published by <?php echo '<a href="characterprofile.php?name='. $n['name'] .'">'. $n['name'] .'</a>'; ?>.</div>
	    	<div class="panel-body">
	    		<?php echo TransformToBBCode(nl2br($n['text'])); ?>
	    	</div>
	  </div>
	
		<?php
	}
}
?>