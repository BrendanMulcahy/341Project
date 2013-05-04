<?php
session_start();
require_once '../php/Membership.php';
$membership = new Membership();

// If the user clicks the "Log Out" link on the index page.
if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$membership->log_User_Out();
}

?>

<html>
	<head>
	  <meta name="description" content="Dota 2 Alt-Tab is a simple site with quick and easy guides to every hero in Dota 2.  Great for players to learn the standard skill and item builds.">
	  <meta name="keywords" content="dota2, dota 2, guides, guide, alt-tab, alttab, builds, skills, items, dota, playdota, hero, heroes, defense, ancients">
	  <meta name="author" content="Brendan Mulcahy">
	  <meta charset="utf-8">
	  <title>Dota 2 Alt-Tab Guides</title>
	  <link rel="shortcut icon" href="../images/favicon.ico" >
	  <link rel="stylesheet" href="../css/guide.css?v=9" >
	  <script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-34781660-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	  </script>
	</head>
	<body>
		<div id="textbox">
			<div class="alignleft">
				<?php
					echo "<a href=\"SuggestionList.php\">Suggestions Forum</a>&nbsp;<a href=\"alttab_suggestion.php\">Submit a Suggestion</a>";
				?>
			</div>
			<div class="alignright">
				<?php
					if(isset($_SESSION['username'])) {
						echo "Welcome, " . $_SESSION['username'] . "!&nbsp;<a href=\"changePassword.php\">Change Password</a>&nbsp;";
					}

					if (isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
						echo "<a href=\"index.php?status=loggedout\">Log Out</a>";
					} else {
						echo "<a href=\"login.php?target=index\">Log In</a>&nbsp;<a href=\"registration.php\">Register</a>";
					}
				?>
			</div>
		</div>
		<div style="clear: both;"></div>
		<h1 class="title"><a href="./#"><img src="../Images/banner.png"></a></h1>
		<script>
		  document.write(
			'<div id="autocomplete" class="autocomplete">' +
			  '<table class="autocomplete-input">' +
				'<tr>' +
				  '<td class="label"><label for="hero_search">Find your hero:</label></td>' +
				  '<td><input type="text" id="hero_search"></td>' +
				'</tr>' +
			  '</table>' +
			'</div>'
		  );
		</script>
		<div class="section taverns">
			<div class="tavern"><h3 class="str"><span class="s_tavern si_stat_str"></span>Radiant Strength<span class="s_tavern si_team_sentinel"></span></h3><table><tr><td><a href="#ES" class="nav"><span class="s_hero si_ES" title="Go to the Earthshaker guide"></span></a></td><td><a href="#Sven" class="nav"><span class="s_hero si_Sven" title="Go to the Sven guide"></span></a></td><td><a href="#Tiny" class="nav"><span class="s_hero si_Tiny" title="Go to the Tiny guide"></span></a></td><td><a href="#Kunkka" class="nav"><span class="s_hero si_Kunkka" title="Go to the Kunkka guide"></span></a></td></tr><tr><td><a href="#Beast" class="nav"><span class="s_hero si_Beast" title="Go to the Beastmaster guide"></span></a></td><td><a href="#DK" class="nav"><span class="s_hero si_DK" title="Go to the Dragon Knight guide"></span></a></td><td><a href="#Clock" class="nav"><span class="s_hero si_Clock" title="Go to the Clockwerk guide"></span></a></td><td><a href="#Omni" class="nav"><span class="s_hero si_Omni" title="Go to the Omniknight guide"></span></a></td></tr><tr><td><a href="#Huskar" class="nav"><span class="s_hero si_Huskar" title="Go to the Huskar guide"></span></a></td><td><a href="#Alch" class="nav"><span class="s_hero si_Alch" title="Go to the Alchemist guide"></span></a></td><td><a href="#Brew" class="nav"><span class="s_hero si_Brew" title="Go to the Brewmaster guide"></span></a></td><td><a href="#Treant" class="nav"><span class="s_hero si_Treant" title="Go to the Treant Protector guide"></span></a></td></tr><tr><td><a href="#Wisp" class="nav"><span class="s_hero si_Wisp" title="Go to the Wisp guide"></span></a></td><td><a href="#Cent" class="nav"><span class="s_hero si_Cent" title="Go to the Centaur Warunner guide"></span></a></td><td><a href="#Shredder" class="nav"><span class="s_hero si_Shredder" title="Go to the Timbersaw guide"></span></a></td><td><a href="#Tuskarr" class="nav"><span class="s_hero si_Tuskarr" title="Go to the Tusk guide"></span></a></td></tr></table></div><div class="tavern"><h3 class="agi"><span class="s_tavern si_stat_agi"></span>Radiant Agility<span class="s_tavern si_team_sentinel"></span></h3><table><tr><td><a href="#AM" class="nav"><span class="s_hero si_AM" title="Go to the Anti-Mage guide"></span></a></td><td><a href="#Drow" class="nav"><span class="s_hero si_Drow" title="Go to the Drow Ranger guide"></span></a></td><td><a href="#Jugger" class="nav"><span class="s_hero si_Jugger" title="Go to the Juggernaut guide"></span></a></td><td><a href="#POTM" class="nav"><span class="s_hero si_POTM" title="Go to the Mirana guide"></span></a></td></tr><tr><td><a href="#Morph" class="nav"><span class="s_hero si_Morph" title="Go to the Morphling guide"></span></a></td><td><a href="#PL" class="nav"><span class="s_hero si_PL" title="Go to the Phantom Lancer guide"></span></a></td><td><a href="#VS" class="nav"><span class="s_hero si_VS" title="Go to the Vengeful Spirit guide"></span></a></td><td><a href="#Riki" class="nav"><span class="s_hero si_Riki" title="Go to the Riki guide"></span></a></td></tr><tr><td><a href="#Sniper" class="nav"><span class="s_hero si_Sniper" title="Go to the Sniper guide"></span></a></td><td><a href="#TA" class="nav"><span class="s_hero si_TA" title="Go to the Templar Assassin guide"></span></a></td><td><a href="#Luna" class="nav"><span class="s_hero si_Luna" title="Go to the Luna guide"></span></a></td><td><a href="#BH" class="nav"><span class="s_hero si_BH" title="Go to the Bounty Hunter guide"></span></a></td></tr><tr><td><a href="#Ursa" class="nav"><span class="s_hero si_Ursa" title="Go to the Ursa guide"></span></a></td><td><a href="#Gyro" class="nav"><span class="s_hero si_Gyro" title="Go to the Gyrocopter guide"></span></a></td><td><a href="#LD" class="nav"><span class="s_hero si_LD" title="Go to the Lone Druid guide"></span></a></td><td><a href="#Naga" class="nav"><span class="s_hero si_Naga" title="Go to the Naga Siren guide"></span></a></td></tr><tr><td><a href="#Troll" class="nav"><span class="s_hero si_Troll" title="Go to the Troll Warlord guide"></span></a></td></tr></table></div><div class="tavern"><h3 class="int"><span class="s_tavern si_stat_int"></span>Radiant Intelligence<span class="s_tavern si_team_sentinel"></span></h3><table><tr><td><a href="#CM" class="nav"><span class="s_hero si_CM" title="Go to the Crystal Maiden guide"></span></a></td><td><a href="#Puck" class="nav"><span class="s_hero si_Puck" title="Go to the Puck guide"></span></a></td><td><a href="#Storm" class="nav"><span class="s_hero si_Storm" title="Go to the Storm Spirit guide"></span></a></td><td><a href="#WR" class="nav"><span class="s_hero si_WR" title="Go to the Windrunner guide"></span></a></td></tr><tr><td><a href="#Zeus" class="nav"><span class="s_hero si_Zeus" title="Go to the Zeus guide"></span></a></td><td><a href="#Lina" class="nav"><span class="s_hero si_Lina" title="Go to the Lina guide"></span></a></td><td><a href="#Rhasta" class="nav"><span class="s_hero si_Rhasta" title="Go to the Shadow Shaman guide"></span></a></td><td><a href="#Tinker" class="nav"><span class="s_hero si_Tinker" title="Go to the Tinker guide"></span></a></td></tr><tr><td><a href="#Prophet" class="nav"><span class="s_hero si_Prophet" title="Go to the Nature&apos;s Prophet guide"></span></a></td><td><a href="#Ench" class="nav"><span class="s_hero si_Ench" title="Go to the Enchantress guide"></span></a></td><td><a href="#Jakiro" class="nav"><span class="s_hero si_Jakiro" title="Go to the Jakiro guide"></span></a></td><td><a href="#Chen" class="nav"><span class="s_hero si_Chen" title="Go to the Chen guide"></span></a></td></tr><tr><td><a href="#Silencer" class="nav"><span class="s_hero si_Silencer" title="Go to the Silencer guide"></span></a></td><td><a href="#Ogre" class="nav"><span class="s_hero si_Ogre" title="Go to the Ogre Magi guide"></span></a></td><td><a href="#Rubick" class="nav"><span class="s_hero si_Rubick" title="Go to the Rubick guide"></span></a></td><td><a href="#Disruptor" class="nav"><span class="s_hero si_Disruptor" title="Go to the Disruptor guide"></span></a></td></tr><tr><td><a href="#KOTL" class="nav"><span class="s_hero si_KOTL" title="Go to the Keeper of the Light guide"></span></a></td></tr></table></div>
			<div class="tavern"><h3 class="str"><span class="s_tavern si_stat_str"></span>Dire Strength<span class="s_tavern si_team_scourge"></span></h3><table><tr><td><a href="#Axe" class="nav"><span class="s_hero si_Axe" title="Go to the Axe guide"></span></a></td><td><a href="#Pudge" class="nav"><span class="s_hero si_Pudge" title="Go to the Pudge guide"></span></a></td><td><a href="#SK" class="nav"><span class="s_hero si_SK" title="Go to the Sand King guide"></span></a></td><td><a href="#Slardar" class="nav"><span class="s_hero si_Slardar" title="Go to the Slardar guide"></span></a></td></tr><tr><td><a href="#Tide" class="nav"><span class="s_hero si_Tide" title="Go to the Tidehunter guide"></span></a></td><td><a href="#Leoric" class="nav"><span class="s_hero si_Leoric" title="Go to the Skeleton King guide"></span></a></td><td><a href="#Naix" class="nav"><span class="s_hero si_Naix" title="Go to the Lifestealer guide"></span></a></td><td><a href="#NS" class="nav"><span class="s_hero si_NS" title="Go to the Night Stalker guide"></span></a></td></tr><tr><td><a href="#Doom" class="nav"><span class="s_hero si_Doom" title="Go to the Doom guide"></span></a></td><td><a href="#SB" class="nav"><span class="s_hero si_SB" title="Go to the Spirit Breaker guide"></span></a></td><td><a href="#Lycan" class="nav"><span class="s_hero si_Lycan" title="Go to the Lycanthrope guide"></span></a></td><td><a href="#CK" class="nav"><span class="s_hero si_CK" title="Go to the Chaos Knight guide"></span></a></td></tr><tr><td><a href="#Dirge" class="nav"><span class="s_hero si_Dirge" title="Go to the Undying guide"></span></a></td><td><a href="#Magnus" class="nav"><span class="s_hero si_Magnus" title="Go to the Magnus guide"></span></a></td></tr></table></div><div class="tavern"><h3 class="agi"><span class="s_tavern si_stat_agi"></span>Dire Agility<span class="s_tavern si_team_scourge"></span></h3><table><tr><td><a href="#BS" class="nav"><span class="s_hero si_BS" title="Go to the Bloodseeker guide"></span></a></td><td><a href="#SF" class="nav"><span class="s_hero si_SF" title="Go to the Shadow Fiend guide"></span></a></td><td><a href="#Razor" class="nav"><span class="s_hero si_Razor" title="Go to the Razor guide"></span></a></td><td><a href="#Veno" class="nav"><span class="s_hero si_Veno" title="Go to the Venomancer guide"></span></a></td></tr><tr><td><a href="#Void" class="nav"><span class="s_hero si_Void" title="Go to the Faceless Void guide"></span></a></td><td><a href="#PA" class="nav"><span class="s_hero si_PA" title="Go to the Phantom Assassin guide"></span></a></td><td><a href="#Viper" class="nav"><span class="s_hero si_Viper" title="Go to the Viper guide"></span></a></td><td><a href="#Clinkz" class="nav"><span class="s_hero si_Clinkz" title="Go to the Clinkz guide"></span></a></td></tr><tr><td><a href="#Brood" class="nav"><span class="s_hero si_Brood" title="Go to the Broodmother guide"></span></a></td><td><a href="#Weaver" class="nav"><span class="s_hero si_Weaver" title="Go to the Weaver guide"></span></a></td><td><a href="#Spectre" class="nav"><span class="s_hero si_Spectre" title="Go to the Spectre guide"></span></a></td><td><a href="#Meepo" class="nav"><span class="s_hero si_Meepo" title="Go to the Meepo guide"></span></a></td></tr><tr><td><a href="#NA" class="nav"><span class="s_hero si_NA" title="Go to the Nyx Assassin guide"></span></a></td><td><a href="#Slark" class="nav"><span class="s_hero si_Slark" title="Go to the Slark guide"></span></a></td><td><a href="#Medusa" class="nav"><span class="s_hero si_Medusa" title="Go to the Medusa guide"></span></a></td></tr></table></div><div class="tavern"><h3 class="int"><span class="s_tavern si_stat_int"></span>Dire Intelligence<span class="s_tavern si_team_scourge"></span></h3><table><tr><td><a href="#Bane" class="nav"><span class="s_hero si_Bane" title="Go to the Bane guide"></span></a></td><td><a href="#Lich" class="nav"><span class="s_hero si_Lich" title="Go to the Lich guide"></span></a></td><td><a href="#Lion" class="nav"><span class="s_hero si_Lion" title="Go to the Lion guide"></span></a></td><td><a href="#WD" class="nav"><span class="s_hero si_WD" title="Go to the Witch Doctor guide"></span></a></td></tr><tr><td><a href="#Enigma" class="nav"><span class="s_hero si_Enigma" title="Go to the Enigma guide"></span></a></td><td><a href="#Necro" class="nav"><span class="s_hero si_Necro" title="Go to the Necrolyte guide"></span></a></td><td><a href="#Warlock" class="nav"><span class="s_hero si_Warlock" title="Go to the Warlock guide"></span></a></td><td><a href="#QoP" class="nav"><span class="s_hero si_QoP" title="Go to the Queen of Pain guide"></span></a></td></tr><tr><td><a href="#Krob" class="nav"><span class="s_hero si_Krob" title="Go to the Death Prophet guide"></span></a></td><td><a href="#Pugna" class="nav"><span class="s_hero si_Pugna" title="Go to the Pugna guide"></span></a></td><td><a href="#Dazzle" class="nav"><span class="s_hero si_Dazzle" title="Go to the Dazzle guide"></span></a></td><td><a href="#Lesh" class="nav"><span class="s_hero si_Lesh" title="Go to the Leshrac guide"></span></a></td></tr><tr><td><a href="#DS" class="nav"><span class="s_hero si_DS" title="Go to the Dark Seer guide"></span></a></td><td><a href="#Bat" class="nav"><span class="s_hero si_Bat" title="Go to the Batrider guide"></span></a></td><td><a href="#AA" class="nav"><span class="s_hero si_AA" title="Go to the Ancient Apparition guide"></span></a></td><td><a href="#Invoker" class="nav"><span class="s_hero si_Invoker" title="Go to the Invoker guide"></span></a></td></tr><tr><td><a href="#OD" class="nav"><span class="s_hero si_OD" title="Go to the Outworld Devourer guide"></span></a></td><td><a href="#SD" class="nav"><span class="s_hero si_SD" title="Go to the Shadow Demon guide"></span></a></td><td><a href="#Visage" class="nav"><span class="s_hero si_Visage" title="Go to the Visage guide"></span></a></td></tr></table></div>
		</div>
		<div class="section">
			<h1>How to Use</h1>
			<p>Choose your guide using the search bar or by clicking on the hero taverns. You can use arrow keys to navigate and enter to select the options given by the search bar.</p>
			<p>To pick another hero use the "Go to top" link or use the back button of your browser.</p>
			<p><strong>For faster access to the guides from within the game, we recommend using the Steam web browser</strong>. It is available from inside Dota2 via the Shift-Tab shortcut and avoids the usual delay from alt-tabbing.</p>
			<p>You can replace the ingame recommended items lists with ours. <a href="./itembuilds.zip">Click here</a> to download the files.</p>
			<p>The skill and item builds in this guide are typically "standard" or "dependable" builds, since we have little time to explain things and since we err on the side of making builds that can also help beginning and intermediate players. Do not assume that these builds are the only way to play the heroes and <strong>always adapt them to your game</strong>!</p>
			<p>I particular, feel free to pick up some extra early game items, such as TP scrolls or bracers, even if they aren't explicitly listed in the guides.</p>
			<p>Skills are color coded:</p>
			<ul>
				<li><span class="Q">The first skill is green.</span></li>
				<li><span class="W">The second skill is tan.</span></li>
				<li><span class="E">The third skill is blue.</span></li>
				<li><span class="R">The ultimate is red.</span></li>
				<li><span class="S">Attribute Bonus is yellow.</span></li>
			</ul>
			<p>The following symbols are used in these guides:
			<table>
				<tr>
					<th style="width:30px"><span class="s_symbol si_Slash"></span></th>
					<td>Pick either item to the immediate left or right of a slash, but typically don't get both.</td>
				</tr>
				<tr>
					<th><span class="s_symbol si_Arrow"></span></th>
					<td>Prioritize items to the left of an arrow before getting the items on the right.</td>
				</tr>
				<tr>
					<th><span class="s_symbol si_LBracket"></span><span class="s_symbol si_RBracket"></span></th>
					<td>Items in brackets are situational and are up to player judgement. For example, only buy a bottle if you are mid or no one else has one.</td>
				</tr>
			</table>
			<h1>Notes</h1>
			<p>Last updated: February 15, 2013.  Added Tusk. Still needs description.</p>
			<p>Suggestions, typos, bugs? Contact me at deathcalibur@dota2alttab.com</p>
			<p>Submitting a guide? Send to guides@dota2alttab.com</p>
			<h1>Acknowledgements</h1>
			<button id="toggleAcks" data-alt="Hide acknowledgements">Show acknowledgements</button>
			<div id="acks" class="hidden"><p>Special thanks to Val for writing and organizing the community for the first versions of this guide on Playdota, and Lycan, for creating the first version of the new guide layout as well as providing lots of feedback.
				<p>The current version is being maintained by Ninguem and DeathCalibur. We wish to thank he following people for helping us write the guides:
				<p>Decency, deathpie, Gregarious, Valiant Penguin
				<p>Ninguem would also want to thank the following people:
				<p>grimlock123 and Homer00, for hosting the weekly hero discussions in the dota2 subreddit. They have been a great source of info on the current metagame and have served the same purpose as the treads Val used to run on Playdota back in the day.
				<p>Shred_kid, for writing so many insightful posts in those said discussion treads and
				<p>Adm_Chookington, albaek, Blitzmael, capgrass, corporate_g, KnightingGale, orgodemir, Stop_Sign for also giving valuable tips on some heroes.
				<p>fireblaze762, No_Worries and Bude for giving valuable feedback on the guide itself
				<p>Throught the long history of this guide, many people have also given valuable feedback in suggestion. In alphabetical order:
				<p>3955elits, -3d, 817, Ab0rti0N, alick12345, Ali Radicali, Althorin, Amiag, Anaroth, Antifate, Apparentlynew, ArcheKleine, AzureD,
				B4Nick, BabuinulVerde, Baconnaise, banjkan3, begy, Bengal_Tigger, billly, blaow, bountyface, Cenerae, Cerealmaniac, CooLah, Cosmic,
				CounterGambit, Cross-Hair, DarkArcana, darkmega, DarK_MischieF, de_end, dondy, Doppelnull, DrDragun, Entlee, ^Eternity^, EternityPala,
				ETurn, feral_nature, fevgatos, fgivme, FightF4te, fodminah, FUSE, Gheizen64, GoD_Tyr, green.bear, HappyCat, iKrivetko, Isa, iser, JaCKaSS_69,
				Jay.J, JimRaynor55, JukeboxDragon, Karst, kawumm, Killer Draco, kitsune1255, Kris, Leadblast, leathality, leomon235, Logo, Lycan, Manta, Mercy,
				MonsterFEED, Monsterlord, Motas, mrmemories, MurazorOFAngmar, Nae ireun, Nights16, nix, Pepsi-Plunge, Phantom_IV, pipser, pnoize, PNutz, progenitus, rayMi,
				reh, Senkon, Shadow-Seeker, SirDumpling, sLiff, Sohl, Solistus, Sonicspear, Steric, -]stOka[-, SuperSheep, Swiftkick, Syaska, teStud0,
				The Oreo, The Other Guy, TheTrickster2, (TK)WhiteWolf, Val, Vienna, Vindicate, Visnger, Vlricus, Vot1_Bear, WGDB|SCC, wutwat, XJDevil, Zesty_Pancakes,
				Zieth, Ziodex
				</p>
			</div>
			<h1>Hero Guides</h1>
			<div class="guide" id="ES">
				<div class="guideHeader">
					<span class="s_herobig si_ES" title="Earthshaker"></span>
					<h2>Earthshaker</h2>
					<div class="nav">
						<a href="http://dota2wiki.com/wiki/Earthshaker" target="_blank">Detailed Info</a>
						<a href="#ES">Permalink</a>
						<a href="#">Back to top</a>
					</div>
				</div>
				<div class="guideBody">
					<div class="tip">Earthshaker is a support hero with a very long range stun and great initiation ability once he farms a Blink Dagger.</div>
					<div class="tip">Early game, Earthshaker can either support or roam, using <span class="Q">Fissure</span> to block terrain to secure kills or save allies. Either way, stay hidden in the trees to get the best <span class="Q">Fissure</span> angles (and to leech XP).</div>
					<div class="tip">Later in the game, try to farm a Blink Dagger. <span class="R">Echo Slam</span> deals devastating damage against clumped enemies and you can keep them stunned for a long time by chaining your skills correctly.</div>
					<div class="tabs"><div class="tab active">
						<h3>Skills</h3>
					</div><div class="pane visible"><div class="paneContents">
					<table class="skillBuild">
						<tr>
							<td class="tn">1</td><td class="Q">Fissure</td>
							<td class="tn">7</td><td class="Q">Fissure</td>
							<td class="tn">13</td><td class="W">Enchant Totem</td>
						</tr>
						<tr>
							<td class="tn">2</td><td class="E">Aftershock</td>
							<td class="tn">8</td><td class="E">Aftershock</td>
							<td class="tn">14</td><td class="W">Enchant Totem</td>
						</tr>
						<tr>
							<td class="tn">3</td><td class="Q">Fissure</td>
							<td class="tn">9</td><td class="E">Aftershock</td>
							<td class="tn">15</td><td class="S">Attribute Bonus</td>
						</tr>
						<tr>
							<td class="tn">4</td><td class="W">Enchant Totem</td>
							<td class="tn">10</td><td class="E">Aftershock</td>
							<td class="tn">16</td><td class="R">Echo Slam</td>
						</tr>
						<tr>
							<td class="tn">5</td><td class="Q">Fissure</td>
							<td class="tn">11</td><td class="R">Echo Slam</td>
							<td class="tn">17</td><td class="S">Attribute Bonus</td>
						</tr>
						<tr>
							<td class="tn">6</td><td class="R">Echo Slam</td>
							<td class="tn">12</td><td class="W">Enchant Totem</td>
							<td class="tn">18</td><td class="S">Attribute Bonus</td>
						</tr>
					</table></div></div></div>
					<div class="tabs"><div class="tab active">
						<h3>Items</h3>
					</div><div class="pane visible"><div class="paneContents">
						<table class="itemBuild">
							<tr>
								<th>Starting</th>
								<td>
									<span class="s_symbol si_LBracket"></span>
									<span class="s_item si_courier" title="Animal Courier"></span>
									<span class="s_symbol si_Slash"></span>
									<span class="s_item si_ward_observer" title="Observer Ward"></span>
									<span class="s_symbol si_RBracket"></span>
									<span class="s_item si_branches" title="Iron Branch"></span>
									<span class="s_item si_branches" title="Iron Branch"></span>
									<span class="s_item si_branches" title="Iron Branch"></span>
									<span class="s_item si_tango" title="Tango"></span>
									<span class="s_item si_tango" title="Tango"></span>
									<span class="s_item si_clarity" title="Clarity"></span>
									<span class="s_item si_clarity" title="Clarity"></span>
								</td>
							</tr>
							<tr>
								<th>Core</th>
								<td>
									<span class="s_item si_magic_wand" title="Magic Wand"></span>
									<span class="s_item si_arcane_boots" title="Arcane Boots"></span>
									<span class="s_item si_blink" title="Blink Dagger"></span>
								</td>
							</tr>
							<tr>
								<th>Extension</th>
								<td>
									<span class="s_item si_ultimate_scepter" title="Aghanim&apos;s Scepter"></span>
									<span class="s_item si_shivas_guard" title="Shiva&apos;s Guard"></span>
									<span class="s_item si_sheepstick" title="Scythe of Vise"></span>
									<span class="s_item si_heart" title="Heart of Tarrasque"></span>
								</td>
							</tr>
							<tr>
								<th>Fallback</th>
								<td>
									<span class="s_item si_ward_observer" title="Observer Ward"></span>
									<span class="s_item si_bottle" title="Bottle"></span>
									<span class="s_item si_bracer" title="Bracer"></span>
									<span class="s_item si_vitality_booster" title="Vitality Booster"></span>
								</td>
							</tr>
						</table>
					</div></div></div>
					<div class="tabs"><div class="tab active">
						<h3>Tips</h3>
					</div><div class="pane visible"><div class="paneContents">
						<div class="tip">Unit-targeting <span class="Q">Fissure</span> is a sure hit, but ground-targeting allows for longer range and finer positioning.</div>
						<div class="tip"><span class="W">Enchant Totem</span> is only really good for triggering <span class="E">Aftershock</span>; Don&apos;t get too excited about the damage.</div>
					</div></div></div>
				</div>
			</div>
		</div>

		<p class="copyright">
		&copy; Brendan Mulcahy 2012-2013. Dota 2 content and materials are trademarks and copyrights of Valve or its licensors.
		This site is not affiliated with Valve.
		</p>
		<script src="../js/data.js?v=9"></script>
		<script src="../js/guide.js?v=2"></script>
	</body>
</html>