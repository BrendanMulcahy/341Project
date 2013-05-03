-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2013 at 05:30 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dota2admin`
--
CREATE DATABASE `dota2admin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dota2admin`;

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE IF NOT EXISTS `guide` (
  `guideID` int(11) NOT NULL AUTO_INCREMENT,
  `heroName` varchar(255) NOT NULL,
  `buildName` varchar(255) NOT NULL,
  `skillBuild` varchar(50) NOT NULL,
  `starting` text NOT NULL,
  `core` text NOT NULL,
  `extension` text NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`guideID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`guideID`, `heroName`, `buildName`, `skillBuild`, `starting`, `core`, `extension`, `notes`) VALUES
(2, 'Earthshaker', 'Standard', 'QEQWQRQEEERWWWSRSS', 'item_branches,item_branches,item_branches,', 'item_branches,item_branches,item_branches,', 'item_branches,item_branches,item_branches,', 'SLAMMIN'''),
(10, 'Tiny', 'Standard', 'QWQWQQQQQQQQQQQQQQ', 'item_arcane_boots,', 'item_armlet,', 'item_bfury,', 'This is a guide made with the suggestion form!'),
(11, 'Kunkka', 'Standard', 'QWWQWRQQQQQQQQQQQQ', 'item_bfury,item_basher,item_blink,', 'item_bracer,item_bracer,item_bottle,', 'item_boots_of_elves,item_branches,item_branches,', 'This is a guide made with the suggestion form!');

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE IF NOT EXISTS `hero` (
  `heroID` int(11) NOT NULL AUTO_INCREMENT,
  `heroName` varchar(30) NOT NULL,
  `wikiName` varchar(30) NOT NULL,
  `alliance` enum('radiant','dire') NOT NULL,
  `attribute` enum('strength','agility','intelligence') NOT NULL,
  `skillQ` varchar(30) NOT NULL,
  `skillW` varchar(30) NOT NULL,
  `skillE` varchar(30) NOT NULL,
  `skillR` varchar(30) NOT NULL,
  `guideID` int(11) DEFAULT NULL,
  PRIMARY KEY (`heroID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`heroID`, `heroName`, `wikiName`, `alliance`, `attribute`, `skillQ`, `skillW`, `skillE`, `skillR`, `guideID`) VALUES
(1, 'Earthshaker', 'Earthshaker', 'radiant', 'strength', 'Fissure', 'Enchant Totem', 'Aftershock', 'Echo Slam', NULL),
(2, 'Sven', 'Sven', 'radiant', 'strength', 'Storm Hammer', 'Great Cleave', 'Warcry', 'God''s Strength', NULL),
(3, 'Tiny', 'Tiny', 'radiant', 'strength', 'Avalanche', 'Toss', 'Craggy Exterior', 'Grow', NULL),
(4, 'Kunkka', 'Kunkka', 'radiant', 'strength', 'Torrent', 'Tidebringer', 'X Marks the Spot', 'Ghostship', NULL),
(5, 'Beastmaster', 'Beastmaster', 'radiant', 'strength', 'Wild Axes', 'Call of the Wild', 'Inner Beast', 'Primal Roar', NULL),
(6, 'Dragon Knight', 'Dragon_Knight', 'radiant', 'strength', 'Breathe Fire', 'Dragon Tail', 'Dragon Blood', 'Elder Dragon Form', NULL),
(7, 'Clockwerk', 'Clockwerk', 'radiant', 'strength', 'Battery Assault', 'Power Cogs', 'Rocket Flare', 'Hookshot', NULL),
(8, 'Omniknight', 'Omniknight', 'radiant', 'strength', 'Purification', 'Repel', 'Degen Aura', 'Guardian Angel', NULL),
(9, 'Huskar', 'Huskar', 'radiant', 'strength', 'Inner Vitality', 'Burning Spear', 'Berserker''s Blood', 'Life Break', NULL),
(10, 'Alchemist', 'Alchemist', 'radiant', 'strength', 'Acid Spray', 'Unstable Concoction', 'Greevil''s Greed', 'Chemical Rage', NULL),
(11, 'Brewmaster', 'Brewmaster', 'radiant', 'strength', 'Thunder Clap', 'Drunken Haze', 'Drunken Brawler', 'Primal Split', NULL),
(13, 'Treant Protector', 'Treant_Protector', 'radiant', 'strength', 'Nature''s Guise', 'Leech Seed', 'Living Armor', 'Overgrowth', NULL),
(14, 'Io', 'Io', 'radiant', 'strength', 'Tether', 'Spirits', 'Overcharge', 'Relocate', NULL),
(15, 'Centaur Warunner', 'Centaur_Warunner', 'radiant', 'strength', 'Hoof Stomp', 'Double Edge', 'Return', 'Stampede', NULL),
(16, 'Timbersaw', 'TimberSaw', 'radiant', 'strength', 'Whirling Death', 'Timber Chain', 'Reactive Armor', 'Chakram', NULL),
(17, 'Tusk', 'Tusk', 'radiant', 'strength', 'Ice Shards', 'Snowball', 'Frozen Sigil', 'Walrus PUNCH!', NULL),
(18, 'Anti-Mage', 'Anti-Mage', 'radiant', 'agility', 'Mana Break', 'Blink', 'Spell Shield', 'Mana Void', NULL),
(19, 'Drow Ranger', 'Drow_Ranger', 'radiant', 'agility', 'Frost Arrows', 'Silence', 'Precision Aura', 'Marksmanship', NULL),
(20, 'Juggernaut', 'Juggernaut', 'radiant', 'agility', 'Blade Fury', 'Healing Ward', 'Blade Dance', 'Omnislash', NULL),
(21, 'Mirana', 'Mirana', 'radiant', 'agility', 'Starstorm', 'Sacred Arrow', 'Leap', 'Moonlight Shadow', NULL),
(22, 'Morphling', 'Morphling', 'radiant', 'agility', 'Waveform', 'Adaptive Strike', 'Morph', 'Replicate', NULL),
(23, 'Phantom Lancer', 'Phantom_Lancer', 'radiant', 'agility', 'Spirit Lance', 'Doppelwalk', 'Juxtapose', 'Phantom Edge', NULL),
(24, 'Vengeful Spirit', 'Vengeful_Spirit', 'radiant', 'agility', 'Magic Missile', 'Wave of Terror', 'Vengeance Aura', 'Nether Swap', NULL),
(25, 'Riki', 'Riki', 'radiant', 'agility', 'Smoke Screen', 'Blink Strike', 'Backstab', 'Permanent Invisibility', NULL),
(26, 'Sniper', 'Sniper', 'radiant', 'agility', 'Shrapnel', 'Headshot', 'Take Aim', 'Assassinate', NULL),
(27, 'Templar Assassin', 'Templar_Assassin', 'radiant', 'agility', 'Refraction', 'Meld', 'Psi Blades', 'Psionic Trap', NULL),
(28, 'Luna', 'Luna', 'radiant', 'agility', 'Lucent Beam', 'Moon Glaive', 'Lunar Blessing', 'Eclipse', NULL),
(29, 'Bounty Hunter', 'Bounty Hunter', 'radiant', 'agility', 'Shuriken Toss', 'Jinada', 'Shadow Walk', 'Track', NULL),
(30, 'Ursa', 'Ursa', 'radiant', 'agility', 'Earthshock', 'Overpower', 'Fury Swipes', 'Enrage', NULL),
(31, 'Gyrocopter', 'Gyrocopter', 'radiant', 'agility', 'Rocket Barrage', 'Homing Missile', 'Flak Cannon', 'Call Down', NULL),
(32, 'Lone Druid', 'Lone_Druid', 'radiant', 'agility', 'Summon Spirit Bear', 'Rabid', 'Synergy', 'True Form', NULL),
(33, 'Naga Siren', 'Naga_Siren', 'radiant', 'agility', 'Mirror Image', 'Ensnare', 'Rip Tide', 'Song of the Siren', NULL),
(34, 'Troll Warlord', 'Troll_Warlord', 'radiant', 'agility', 'Berserker Rage', 'Whirling Axes', 'Fervor', 'Battle Trance', NULL),
(35, 'Crystal Maiden', 'Crystal_Maiden', 'radiant', 'intelligence', 'Crystal Nova', 'Frostbite', 'Arcane Aura', 'Freezing Field', NULL),
(36, 'Puck', 'Puck', 'radiant', 'intelligence', 'Illusory Orb', 'Waning Rift', 'Phase Shift', 'Dream Coil', NULL),
(37, 'Storm Spirit', 'Storm Spirit', 'radiant', 'intelligence', 'Static Remnant', 'Electric Vortex', 'Overload', 'Ball Lightning', NULL),
(38, 'Windrunner', 'Windrunner', 'radiant', 'intelligence', 'Shackleshot', 'Powershot', 'Windrun', 'Focus Fire', NULL),
(39, 'Zeus', 'Zeus', 'radiant', 'intelligence', 'Arc Lightning', 'Lightning Bolt', 'Static Field', 'Thundergod''s Wrath', NULL),
(40, 'Lina', 'Lina', 'radiant', 'intelligence', 'Dragon Slave', 'Light Strike Array', 'Fiery Soul', 'Laguna Blade', NULL),
(41, 'Shadow Shaman', 'Shadow Shaman', 'radiant', 'intelligence', 'Ether Shock', 'Hex', 'Shackles', 'Mass Serpent Wards', NULL),
(42, 'Tinker', 'Tinker', 'radiant', 'intelligence', 'Laser', 'Heat-Seeking Missile', 'March of the Machines', 'Rearm', NULL),
(43, 'Nature''s Prophet', 'Nature''s_Prophet', 'radiant', 'intelligence', 'Sprout', 'Teleportation', 'Nature''s Call', 'Wrath of Nature', NULL),
(44, 'Enchantress', 'Enchantress', 'radiant', 'intelligence', 'Untouchable', 'Enchant', 'Nature''s Attendants', 'Impetus', NULL),
(45, 'Jakiro', 'Jakiro', 'radiant', 'intelligence', 'Dual Breath', 'Ice Path', 'Liquid Fire', 'Macropyre', NULL),
(46, 'Chen', 'Chen', 'radiant', 'intelligence', 'Penitence', 'Test of Faith', 'Holy Persuasion', 'Hand of God', NULL),
(47, 'Silencer', 'Silencer', 'radiant', 'intelligence', 'Curse of the Silent', 'Glaives of Wisdom', 'Last Word', 'Global Silence', NULL),
(48, 'Ogre Magi', 'Ogre_Magi', 'radiant', 'intelligence', 'Fireblast', 'Ignite', 'Bloodlust', 'Multicast', NULL),
(49, 'Rubick', 'Rubick', 'radiant', 'intelligence', 'Telekinesis', 'Fade Bolt', 'Null Field', 'Spell Steal', NULL),
(50, 'Disruptor', 'Disruptor', 'radiant', 'intelligence', 'Thunder Strike', 'Glimpse', 'Kinetic Field', 'Static Storm', NULL),
(51, 'Keeper of the Light', 'Keeper_of_the_Light', 'radiant', 'intelligence', 'Illuminate', 'Mana Leak', 'Chakra Magic', 'Spirit Form', NULL),
(52, 'Axe', 'Axe', 'dire', 'strength', 'Berserker''s Call', 'Battle Hunger', 'Counter Helix', 'Culling Blade', NULL),
(53, 'Pudge', 'Pudge', 'dire', 'strength', 'Meat Hook', 'Rot', 'Flesh Heap', 'Dismember', NULL),
(54, 'Sand King', 'Sand_King', 'dire', 'strength', 'Burrowstrike', 'Sand Storm', 'Caustic Finale', 'Epicenter', NULL),
(55, 'Slardar', 'Slardar', 'dire', 'strength', 'Sprint', 'Slithereen Crush', 'Bash', 'Amplify Damage', NULL),
(56, 'Tidehunter', 'Tidehunter', 'dire', 'strength', 'Gush', 'Kraken Shell', 'Anchor Smash', 'Ravage', NULL),
(57, 'Skeleton King', 'Skeleton_King', 'dire', 'strength', 'Hellfire Blast', 'Vampiric Aura', 'Critical Strike', 'Reincarnation', NULL),
(58, 'Lifestealer', 'Lifestealer', 'dire', 'strength', 'Rage', 'Feast', 'Open Wounds', 'Infest', NULL),
(59, 'Night Stalker', 'Night_Stalker', 'dire', 'strength', 'Void', 'Crippling Fear', 'Hunter in the Night', 'Darkness', NULL),
(60, 'Doom', 'Doom', 'dire', 'strength', 'Devour', 'Scorched Earth', 'Lvl? Death', 'Doom', NULL),
(61, 'Spirit Breaker', 'Spirit_Breaker', 'dire', 'strength', 'Charge of Darkness', 'Empowering Haste', 'Greater Bash', 'Nether Strike', NULL),
(62, 'Lycanthrope', 'Lycanthrope', 'dire', 'strength', 'Summon Wolves', 'Howl', 'Feral impulse', 'Shapeshift', NULL),
(63, 'Chaos Knight', 'Chaos_Knight', 'dire', 'strength', 'Chaos Bolt', 'Reality Rift', 'Critical Strike', 'Phantasm', NULL),
(64, 'Undying', 'Undying', 'dire', 'strength', 'Decay', 'Soul Rip', 'Tombstone', 'Flesh Golem', NULL),
(65, 'Magnus', 'Magnus', 'dire', 'strength', 'Shockwave', 'Empower', 'Skewer', 'Reverse Polarity', NULL),
(66, 'Bloodseeker', 'Bloodseeker', 'dire', 'agility', 'Bloodrage', 'Blood Bath', 'Thirst', 'Rupture', NULL),
(67, 'Shadow Fiend', 'Shadow_Fiend', 'dire', 'agility', 'Shadowraze', 'Necromastery', 'Presence of the Dark Lord', 'Requiem of Souls', NULL),
(68, 'Razor', 'Razor', 'dire', 'agility', 'Plasma Field', 'Static Link', 'Unstable Current', 'Eye of the Storm', NULL),
(69, 'Venomancer', 'Venomancer', 'dire', 'agility', 'Venomous Gale', 'Poison Sting', 'Plague Ward', 'Poison Nova', NULL),
(70, 'Faceless Void', 'Faceless_Void', 'dire', 'agility', 'Time Walk', 'Backtrack', 'Time Lock', 'Chronosphere', NULL),
(71, 'Phantom Assassin', 'Phantom_Assassin', 'dire', 'agility', 'Stifling Dagger', 'Phantom Strike', 'Blur', 'Coup de Grace', NULL),
(72, 'Viper', 'Viper', 'dire', 'agility', 'Poison Attack', 'Nethertoxin', 'Corrosive Skin', 'Viper Strike', NULL),
(73, 'Clinkz', 'Clinkz', 'dire', 'agility', 'Strafe', 'Searing Arrows', 'Skeleton Walk', 'Death Pact', NULL),
(74, 'Broodmother', 'Broodmother', 'dire', 'agility', 'Spawn Spiderlings', 'Spin Web', 'Incapacitating Bite', 'Insatiable Hunger', NULL),
(75, 'Weaver', 'Weaver', 'dire', 'agility', 'The Swarm', 'Shukuchi', 'Geminate Attack', 'Time Lapse', NULL),
(76, 'Spectre', 'Spectre', 'dire', 'agility', 'Spectral Dagger', 'Desolate', 'Dispersion', 'Haunt', NULL),
(77, 'Meepo', 'Meepo', 'dire', 'agility', 'Earthbind', 'Poof', 'Geostrike', 'Divided We Stand', NULL),
(78, 'Nyx Assassin', 'Nyx_Assassin', 'dire', 'agility', 'Impale', 'Mana Burn', 'Spiked Carapace', 'Vendetta', NULL),
(79, 'Slark', 'Slark', 'dire', 'agility', 'Dark Pact', 'Pounce', 'Essence Shift', 'Shadow Dance', NULL),
(80, 'Medusa', 'Medusa', 'dire', 'agility', 'Split Shot', 'Mystic Snake', 'Mana Shield', 'Stone Gaze', NULL),
(81, 'Bane', 'bane', 'dire', 'intelligence', 'Enfeeble', 'Brain Sap', 'Nightmare', 'Fiend''s Grip', NULL),
(82, 'Lich', 'Lich', 'dire', 'intelligence', 'Frost Blast', 'Ice Armor', 'Sacrifice', 'Chain Frost', NULL),
(83, 'Lion', 'Lion', 'dire', 'intelligence', 'Earth Spike', 'Hex', 'Mana Drain', 'Finger of Death', NULL),
(84, 'Witch Doctor', 'Witch_Doctor', 'dire', 'intelligence', 'Paralyzing Cask', 'Voodoo Restoration', 'Maledict', 'Death Ward', NULL),
(85, 'Enigma', 'Enigma', 'dire', 'intelligence', 'Malefice', 'Demonic Conversion', 'Midnight Pulse', 'Black Hole', NULL),
(86, 'Necrolyte', 'Necrolyte', 'dire', 'intelligence', 'Death Pulse', 'Heartstopper Aura', 'Sadist', 'Reaper''s Scythe', NULL),
(87, 'Warlock', 'Warlock', 'dire', 'intelligence', 'Fatal Bonds', 'Shadow Word', 'Upheaval', 'Chaotic Offering', NULL),
(88, 'Queen of Pain', 'Queen_of_Pain', 'dire', 'intelligence', 'Shadow Strike', 'Blink', 'Scream of Pain', 'Sonic Wave', NULL),
(89, 'Death Prophet', 'Death_Prophet', 'dire', 'intelligence', 'Crypt Swarm', 'Silence', 'Witchcraft', 'Exorcism', NULL),
(90, 'Pugna', 'Pugna', 'dire', 'intelligence', 'Nether Blast', 'Decrepify', 'Nether Ward', 'Life Drain', NULL),
(91, 'Dazzle', 'Dazzle', 'dire', 'intelligence', 'Poison Touch', 'Shallow Grave', 'Shadow Wave', 'Weave', NULL),
(92, 'Leshrac', 'Leshrac', 'dire', 'intelligence', 'Split Earth', 'Diabolic Edict', 'Lightning Storm', 'Pulse Nova', NULL),
(93, 'Dark Seer', 'Dark_Seer', 'dire', 'intelligence', 'Vacuum', 'Ion Shell', 'Surge', 'Wall of Replica', NULL),
(94, 'Batrider', 'Batrider', 'dire', 'intelligence', 'Sticky Napalm', 'Flamebreak', 'Firefly', 'Flaming Lasso', NULL),
(95, 'Ancient Apparition', 'Ancient_Apparition', 'dire', 'intelligence', 'Cold Feet', 'Ice Vortex', 'Chilling Touch', 'Ice Blast', NULL),
(96, 'Invoker', 'Invoker', 'dire', 'intelligence', 'Quas', 'Wex', 'Exort', 'Invoke', NULL),
(97, 'Outworld Devourer', 'Outworld_Devourer', 'dire', 'intelligence', 'Arcane Orb', 'Astral Imprisonment', 'Essence Aura', 'Sanity''s Eclipse', NULL),
(98, 'Shadow Demon', 'Shadow_Demon', 'dire', 'intelligence', 'Disruption', 'Soul Catcher', 'Shadow Poison', 'Demonic Purge', NULL),
(99, 'Visage', 'Visage', 'dire', 'intelligence', 'Grave Chill', 'Soul Assumption', 'Gravekeeper''s Cloak', 'Summon Familiars', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `dotaID` varchar(30) NOT NULL,
  `displayName` varchar(50) NOT NULL,
  `goldCost` smallint(6) NOT NULL,
  `description` text NOT NULL,
  `uniqueModifier` enum('Feedback','Lifesteal','Corruption','Cold Attack','Chain Lightning','Poison Attack','None') NOT NULL,
  `cooldown` smallint(6) NOT NULL,
  `manacost` smallint(6) NOT NULL,
  `flavortext` text NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `dotaID`, `displayName`, `goldCost`, `description`, `uniqueModifier`, `cooldown`, `manacost`, `flavortext`) VALUES
(1, 'item_abyssal_blade', 'Abyssal Blade', 6750, 'Active: Stun a target enemy unit for 2.0 seconds. Goes through Magic Immunity.\r\nPassive: Bash - Gives a chance to stun for 1.4 seconds.\r\n+ 100 Damage\r\n+ 10 Strength\r\nMELEE CHANCE: 25%\r\nRANGED CHANCE: 10%', 'None', 60, 150, 'The lost blade of the Commander of the Abyss, this edge cuts into an enemy''s soul.'),
(2, 'item_ancient_janggo', 'Drum of Endurance', 1725, 'Active: Endurance - Gives bonus +10 attack and +10% movement speed to surrounding allies.\r\nPassive: Swiftness Aura - Gives bonus attack and movement speed to surrounding allies.\r\n\r\nMultiple instances of Swiftness Aura do not stack.\r\n+ 9 All Attributes\r\n+ 3 Damage\r\nAURA ATTACK SPEED: 5\r\nAURA MOVE SPEED: 5%', 'None', 30, 0, 'A relic that enchants the bodies of those around it for swifter movement in times of crisis.'),
(3, 'item_arcane_boots', 'Arcane Boots', 1450, 'Active: Replenish Mana - Restores mana in an area around the hero.\r\n\r\nFlat movement speed bonuses from multiple pairs of boots do not stack.\r\n+ 60 Movement Speed\r\n+ 250 Mana\r\nMANA RESTORED: 135', 'None', 55, 25, 'Magi equipped with these boots are valued in battle.'),
(4, 'item_armlet', 'Armlet of Mordiggian', 2600, 'Active: Unholy Strength - Gives +31 damage, +10 attack speed, and +25 strength while active, but drains 40 HP per second. You cannot die from the health loss when the bonus strength is gone, or the health drain per second.\r\n+ 9 Damage\r\n+ 15 Attack Speed\r\n+ 5 Armor\r\n+ 8 HP Regeneration', 'None', 2, 0, 'Weapon of choice among brutes, the bearer sacrifices his life energy to gain immense strength and power.'),
(5, 'item_assault', 'Assault Cuirass', 5350, 'Passive: Assault Aura - Grants attack speed and armor to nearby allied units, and decreases armor for nearby enemies.\r\n\r\nMultiple instances of Assault Aura do not stack.\r\n+ 35 Attack Speed\r\n+ 10 Armor\r\nAURA ATTACK SPEED: 20\r\nAURA BONUS ARMOR: 5\r\nARMOR REDUCTION: 5', 'None', 0, 0, 'Forged in the depths of the nether reaches, this hellish mail provides an army with increased armor and attack speed.'),
(6, 'item_basher', 'Skull Basher', 2950, 'Passive: Bash - Gives a chance to stun for 1.4 seconds.\r\n+ 40 Damage\r\n+ 6 Strength\r\nMELEE CHANCE: 25%\r\nRANGED CHANCE: 10%', 'None', 2, 0, 'A feared weapon in the right hands, this maul''s ability to shatter the defenses of its opponents should not be underestimated.'),
(7, 'item_belt_of_strength', 'Belt of Strength', 450, '+ 6 Strength', 'None', 0, 0, 'A valued accessory for improving vitality.'),
(8, 'item_bfury', 'Battle Fury', 4350, 'Passive: Cleave -  Deals a percent of attack damage in a 225 AoE around the target. Ranged units cannot Cleave.\r\n+ 65 Damage\r\n+ 6 HP Regeneration\r\n+ 150% Mana Regeneration\r\nCLEAVE DAMAGE: 35%', 'None', 0, 0, 'The bearer of this mighty axe gains the ability to cut down swaths of enemies at once.'),
(9, 'item_black_king_bar', 'Black King Bar', 3900, 'Active: Avatar - Grants magic immunity. Duration and cooldown decrease with each use. Some Ultimate abilites are able to disable through Black King Bar.\r\n+ 10 Strength\r\n+ 24 Damage\r\nDURATION: 10/9/8/7/6/5', 'None', 80, 0, 'A powerful staff imbued with the strength of giants.'),
(10, 'item_blade_mail', 'Blade Mail', 2200, 'Active: Damage Return - Returns any damage you take to the unit that dealt the damage. Lasts 4.5 seconds.\r\n+ 22 Damage\r\n+ 5 Armor\r\n+ 10 Intelligence', 'None', 22, 25, 'A razor-sharp coat of mail, it is the choice of selfless martyrs in combat.'),
(11, 'item_blade_of_alacrity', 'Blade of Alacrity', 1000, '+ 10 Agility', 'None', 0, 0, 'A long blade imbued with time magic.'),
(12, 'item_blades_of_attack', 'Blades of Attack', 450, '+ 9 Damage', 'None', 0, 0, 'The damage of these small, concealable blades should not be underestimated.'),
(13, 'item_blink', 'Blink Dagger', 2150, 'Active: Blink - Teleport to a target point up to 1200 units away. If damage is taken from an enemy hero, Blink Dagger cannot be used for 3 seconds.', 'None', 14, 75, 'The fabled dagger used by the fastest assassin ever to walk the lands.'),
(14, 'item_bloodstone', 'Bloodstone', 5050, 'Passive: Bloodpact - Starts with 6 charges. Gains 1 charge each time an enemy hero dies within 1675 range. Each charge bestows 1 mana regeneration per second, reduces gold lost from death by 25, and reduces respawn time by 4 seconds. When the bearer dies, restores 400 HP + 30 HP per charge to allied units within 1675 units, then loses a third of its charges. While dead, the bearer continues to receive experience at the death location and gives 1800 unit vision there.\r\n+ 500 Health\r\n+ 400 Mana\r\n+ 9 HP Regeneration\r\n+ 200% Mana Regeneration', 'None', 0, 0, 'The Bloodstone''s bright ruby color is unmistakable on the battlefield, as the owner seems to have infinite vitality and spirit.'),
(15, 'item_boots', 'Boots of Speed', 450, 'Flat movement speed bonuses from multiple pairs of boots do not stack.\r\n+ 50 Movement Speed', 'None', 0, 0, 'Fleet footwear, increasing movement.'),
(16, 'item_boots_of_elves', 'Band of Elvenskin', 450, '+ 6 Agility', 'None', 0, 0, 'A tensile fabric often used for its light weight and ease of movement.'),
(17, 'item_bottle', 'Bottle', 600, 'Use: Regeneration - Restores HP and Mana over time. Effect is lost if unit is attacked. Empty Bottle refills near town fountain. You can also store runes in the bottle, to save for later use. After 2 minutes, stored Runes will be activated.\r\nHEALTH RESTORED: 135\r\nMANA RESTORED: 70\r\nDURATION: 3', 'None', 1, 0, 'An old bottle that survived the ages, the contents placed inside become enchanted.'),
(18, 'item_bracer', 'Bracer', 525, '+ 6 Strength\r\n+ 3 Agility\r\n+ 3 Intelligence\r\n+ 3 Damage', 'None', 0, 0, 'The bracer is a common choice to toughen up defenses and increase longevity.'),
(19, 'item_branches', 'Iron Branch', 53, '+ 1 All Attributes', 'None', 0, 0, 'A seemingly ordinary branch, its ironlike qualities are bestowed upon the bearer.'),
(20, 'item_broadsword', 'Broadsword', 1200, '+ 18 Damage', 'None', 0, 0, 'The classic weapon of choice for knights, this blade is sturdy and reliable for slaying enemies.'),
(21, 'item_buckler', 'Buckler', 803, 'Active: Armor Bonus - Gives +2 to all nearby allied units. Lasts 25 seconds on heroes, 30 seconds on units.\r\n+ 5 Armor\r\n+ 2 All Attributes', 'None', 25, 10, 'A powerful shield that imbues the bearer with the strength of heroes past, it is capable of protecting entire armies in battle.'),
(22, 'item_butterfly', 'Butterfly', 6000, '+ 30 Agility\r\n+ 30 Damage\r\n+ 35% Evasion\r\n+ 30 Attack Speed', 'None', 0, 0, 'Only the mightiest and most experienced of warriors can wield the Butterfly, but it provides incredible dexterity in combat.'),
(23, 'item_chainmail', 'Chainmail', 550, '+ 5 Armor', 'None', 0, 0, 'A medium weave of metal chains.'),
(24, 'item_circlet', 'Circlet', 185, '+ 2 All Attributes', 'None', 0, 0, 'An elegant circlet designed for human princesses.'),
(25, 'item_clarity', 'Clarity', 50, 'Use: Restores mana over time. If the user is attacked, the effect is lost.\r\nDURATION: 30\r\nMANA RESTORED: 100', 'None', 0, 0, 'Clear water that enhances the ability to meditate.'),
(26, 'item_claymore', 'Claymore', 1400, '+ 21 Damage', 'None', 0, 0, 'A sword that can cut through armor, it''s a commonly chosen first weapon for budding swordsmen.'),
(27, 'item_cloak', 'Cloak', 550, 'Multiple instances of spell resistance from items do not stack.\r\n+ 15% Spell Resistance', 'None', 0, 0, 'A cloak made of a magical material that works to dispel any magic cast on it.'),
(28, 'item_courier', 'Animal Courier', 150, 'Creature that carries items to and from your base.', 'None', 0, 0, 'Losing the donkey is punishable by death.'),
(29, 'item_cyclone', 'Eul''s Scepter of Divinity', 2700, 'Active: Cyclone -  Target unit is swept up in a cyclone for 2.5 seconds, and is invulnerable.\r\n\r\nFlat movement speed bonuses from multiple Eul''s Scepters do not stack.\r\n+ 10 Intelligence\r\n+ 150% Mana Regeneration\r\n+ 30 Movement Speed', 'None', 30, 75, 'A mysterious scepter passed down through the ages, its disruptive winds can be used for good or evil.'),
(30, 'item_dagon', 'Dagon', 2780, 'Active: Energy Burst -  Burst of damage to target enemy unit. Upgradable.\r\n+ 13/15/17/19/21 Intelligence\r\n+ 3 All Attributes\r\n+ 9 Damage\r\nBURST DAMAGE: 400/500/600/700/800', 'None', 35, 180, 'A lesser wand that grows in power the longer it is used, it brings magic to the fingertips of the user.'),
(31, 'item_demon_edge', 'Demon Edge', 2400, '+ 46 Damage', 'None', 0, 0, 'One of the oldest weapons forged by the Demon-Smith Abzidian, it killed its maker when he tested its edge.'),
(32, 'item_desolator', 'Desolator', 4100, 'Passive: Corruption - Your attacks reduce target''s armor for 15 seconds.\r\n\r\nDesolator is a Unique Attack Modifier, and does nto stack with other Unique Attack Modifiers.\r\n+ 60 Damage\r\nARMOR REDUCTION: 6', 'Corruption', 0, 0, 'A wicked weapon, used in torturing political criminals.'),
(33, 'item_diffusal_blade', 'Diffusal Blade', 3300, 'Active: Purge - Purges a target unit, removing buffs, slowing, and dealing damage if it is a summoned unit.\r\nPassive: Feedback - Your attacks burn 20/36 mana and deal the same amount in physical damage. Upgradable.\r\n\r\nDiffusal Blade is a unique Attack Modifier , and does not stack with other Unique Attack Modifiers.\r\n+ 22/26 Agility\r\n+ 6/10 Intelligence', 'Feedback', 8, 0, 'An enchanted blade that allows the user to cut straight into the enemy’s soul.'),
(34, 'item_dust', 'Dust of Appearance', 180, 'Use: Reveal - Reveals invisible Heroes in a nearby area.\r\nDURATION: 12\r\nRADIUS: 1050', 'None', 60, 5, ' '),
(35, 'item_eagle', 'Eaglesong', 3300, '+ 25 Agility', 'None', 0, 0, 'Capturing the majestic call of an eagle, this mystical horn brings limitless dexterity to those who hear it.'),
(36, 'item_energy_booster', 'Energy Booster', 1000, '+ 250 Mana', 'None', 0, 0, 'This lapis gemstone is commonly added to the collection of wizards seeking to improve their presence in combat.'),
(37, 'item_ethereal_blade', 'Ethereal Blade', 4900, 'Active: Ether Blast - Converts you and your target into ethereal form. Target unit is slowed and cannot attack or be attcked, and takes 2.0x of your primary attribute + 75 as damage.\r\n+ 40 Agility\r\n+ 10 Strength\r\n+ 10 Intelligence\r\nDURATION: 3', 'None', 30, 150, 'A flickering blade of a ghastly nature, it is capable of dealing damage in both magical and physical planes.'),
(38, 'item_flask', 'Healing Salve', 100, 'Use: Regenerate - Restores HP over time. If the user is attacked, the effect is lost.\r\nDURATION: 10\r\nHEALTH RESTORED: 400', 'None', 0, 0, 'A magical salve that can quickly mend even the deepest of wounds.'),
(39, 'item_flying_courier', 'Flying Courier', 220, 'Fast flying creature that carries items to and from your base. Requires Animal Courier.', 'None', 0, 0, 'Losing the donkey is punishable by death.'),
(40, 'item_force_staff', 'Force Staff', 2350, 'Active: Force - Pushes any target unit 600 units in the direction it is facing. Double click to self-cast.\r\n+ 10 Intelligence\r\n+ 3 HP Regeneration', 'None', 20, 25, 'Allows you to manipulate others, for good or evil.'),
(41, 'item_gauntlets', 'Gauntlets of Strength', 150, '+ 3 Strength', 'None', 0, 0, 'Studded leather gloves that add brute strength.'),
(42, 'item_gem', 'Gem of True Sight', 700, 'Passive: True Sight - Gives the ability to see invisible units and wards. Drops on death.', 'None', 0, 0, '0'),
(43, 'item_ghost', 'Ghost Scepter', 1600, 'Active: Ghost Form - Enter ghost form, unable to attack or be attacked, but take -40% extra magic damage. using a Teleport Scroll or Boots of Travel dispels Ghost Form.\r\n+ 7 All Attributes\r\nGHOST DURATION: 4', 'None', 30, 0, 'Imbues the wielder with a ghostly presence, allowing them to evade physical damage.'),
(44, 'item_gloves', 'Gloves of Haste', 500, '+ 15 Attack Speed', 'None', 0, 0, 'A pair of magical gloves that seems to render weapons weightless.'),
(45, 'item_greater_crit', 'Daedalus', 5550, 'Passive: Critical Strike - Grants a chance to deal critical damage on an attack.\r\n+ 81 Damage\r\nCRITICAL CHANCE: 25%\r\nCRITICAL DAMAGE: 240%', 'None', 0, 0, 'A weapon of incredible power that is difficult for even the strongest of warriors to control.'),
(46, 'item_hand_of_midas', 'Hand of Midas', 1900, 'Active: Transmute - Kills a non-hero target for 190 gold and 2.5x experience. Cannot be used on Ancients.\r\n+ 30 Attack Speed', 'None', 100, 0, 'Preserved through unknown magical means, the Hand of Midas is a weapon of greed, sacrificing animals to line the owner''s pockets.'),
(47, 'item_headdress', 'Headdress', 603, 'Passive: Regeneration Aura - Restores HP to allies in a 500 unit radius.\r\n\r\nMultiple instance of Regeneration Aura do not stack.\r\n+ 2 All Attributes\r\nBONUS REGEN: 3', 'None', 0, 0, 'Creates a soothing aura that restores allies in battle.'),
(48, 'item_heart', 'Heart of Tarrasque', 5500, 'Passive: Health Regeneration - Restores a percentage of max health per second.\r\n\r\nThis ability is disabled if damage is taken from an enemy hero or Roshan within the last 4 seconds if your hero is melee or 6 seconds if your hero is ranged.\r\n+ 40 Strength\r\n+ 300 Health\r\nHEALTH RESTORED: 2%', 'None', 6, 0, 'Preserved heart of an extinct monster, it bolsters the bearer’s fortitude.'),
(49, 'item_heavens_halberd', 'Heaven''s Halberd', 3850, 'Active: Disarms the target for 4.5 seconds. Lasts 3.0 on Melee targets.\r\nPassive: Lesser Maim - Gives a chance on attack to slow movement speed for 4.0 seconds.\r\n+ 25 Damage\r\n* 20 Strength\r\nMAIM CHANCE: 15%\r\nSLOW: 20%\r\n+ 25% Evasion', 'None', 30, 100, 'This halberd moves with the speed of a smaller weapon, allowing the bearer to win duels that a heavy edge would not.'),
(50, 'item_helm_of_iron_will', 'Helm of Iron Will', 950, '+ 5 Armor\r\n+ 3 HP Regeneration', 'None', 0, 0, 'The helmet of a legendary warrior who fell in battle.'),
(51, 'item_helm_of_the_dominator', 'Helm of the Dominator', 1850, 'Active: Dominate - Take control of a non-hero, non-ancient target unit.\r\nPassive: Lifesteal - Gives lifesteal on attacks.\r\n\r\nHelm of the Dominator is a Unique Attack Modifier, and does not stack with other Unique Attack Modifiers.\r\n+ 20 Damage\r\n+ 5 Armor\r\nLIFESTEAL: 15%', 'Lifesteal', 60, 75, 'The powerful headpiece of a dead necromancer.'),
(52, 'item_hood_of_defiance', 'Hood of Defiance', 2125, 'Multiple instances of spell resistance from items do not stack.\r\n+ 8 HP Regeneration\r\n+ 30% Spell Resistance', 'None', 0, 0, 'A furred, magic resistant headpiece that is feared by wizards.'),
(53, 'item_hyperstone', 'Hyperstone', 2100, '+ 55 Attack Speed', 'None', 0, 0, 'A mystical, carved stone that boosts the fervor of the holder.'),
(54, 'item_invis_sword', 'Shadow Blade', 3000, 'Active: Shadow Walk - Makes you invisible until the duration ends, or until you attack or cast a spell. While Shadow Walk is active, you move 20% faster and can move through units. If attacking to break the invisibility, you gain 150 bonus damage on that attack. Lasts 12 seconds.\r\n+ 30 Damage\r\n+ 30 Attack Speed', 'None', 18, 75, 'The blade of a fallen king, it allows you to move unseen and strike from the shadows.'),
(55, 'item_javelin', 'Javelin', 1500, 'Passive: Pierce - Grants a chance to deal bonus damage.\r\n+ 21 Damage\r\nCHANCE TO PIERCE: 20%\r\nPIERCE DAMAGE: 40', 'None', 0, 0, 'A rather typical spear that can sometimes pierce through an enemy''s armor when used to attack.'),
(56, 'item_lesser_crit', 'Crystalys', 2150, 'Passive: Critical Strike - Grants a chance to deal critical damage on an attack.\r\n+ 30 Damage\r\nCRITICAL CHANCE: 20%\r\nCRITICAL DAMAGE: 175%', 'None', 0, 0, 'A blade forged from rare crystals, it seeks weak points in enemy armor.'),
(57, 'item_lifesteal', 'Morbid Mask', 900, 'Passive: Lifesteal - Gives lifesteal on attacks.\r\n\r\nMorbid Mask is a Unique Attack Modifier, and does not stack with other Unique Attack Modifiers.\r\nLIFESTEAL: 15%', 'Lifesteal', 0, 0, 'A mask that drains the energy of those caught in its gaze.'),
(58, 'item_maelstrom', 'Maelstrom', 2700, 'Passive: Chain Lightning - Grants a chance on attack to release a Chain Lightning that hits 4 targets, dealing damage.\r\n\r\nMaelstrom is a Unique Attack Modifier that stacks with other Unique Attack Modifiers, but overrides them when Chain Lightning occurs.\r\n+ 24 Damage\r\n+ 25 Attack Speed\r\nCHANCE TO CHAIN: 25%\r\nCHAIN DAMAGE: 120', 'Chain Lightning', 0, 0, 'A hammer forged for the gods themselves, Maelstrom allows its user to harness the power of lightning.'),
(59, 'item_magic_stick', 'Magic Stick', 200, 'Active: Energy Charge - Gains charges (max 10) based on enemies using abilities in a nearby area. When activated, it restores health and mana based on the number of charges stored.\r\nRESTORE PER CHARGE: 15', 'None', 13, 0, 'A simple wand used to channel magic energies, it is favored by apprentice wizards and great warlocks alike.'),
(60, 'item_magic_wand', 'Magic Wand', 509, 'Active: Energy Charge - Gains charges (max 15) based on enemies using abilities in a nearby area. When activated, it restores health and mana based on the number of charges stored.\r\n+ 3 All Attributes\r\nRESTORE PER CHARGE: 15', 'None', 13, 0, 'A simple wand used to channel magic energies, it is favored by apprentice wizards and great warlocks alike.'),
(61, 'item_manta', 'Manta Style', 5050, 'Active: Mirror Image - Creates 2 illusions of your hero that last for 20 seconds.\r\n\r\nMelee illusions deal 33% damage and take 250% bonus damage. Ranged illusions deal 28% damage and take 300% bonus damage.\r\n\r\nPercentage based movement speed bonuses from multiple items do not stack.\r\n+ 10 Strength\r\n+ 26 Agility\r\n+ 10 Intelligence\r\n+ 15 Attack Speed\r\n+ 10% Movement Speed', 'None', 50, 165, 'An axe made of reflective materials that causes confusion amongst enemy ranks.'),
(62, 'item_mantle', 'Mantle of Intelligence', 150, '+ 3 Intelligence', 'None', 0, 0, 'A beautiful sapphire mantle worn by generations of queens.'),
(63, 'item_mask_of_madness', 'Mask of Madness', 1900, 'Active: Berserk - Gives 100 attack speed and 30% movement speed but causes you to take extra 30% damage. Lasts 12 seconds.\r\nPassive: Lifesteal - Grants lifesteal on attacks.\r\n\r\nMask of Madness is a Unique Attack Modifier, and does not stack with other Unique Attack Modifiers.\r\nLIFESTEAL: 17%', 'None', 25, 25, 'Once this mask is worn, its bearer becomes an uncontrollable aggressive force.'),
(64, 'item_medallion_of_courage', 'Medallion of Courage', 1075, 'Active: Valor - Reduces the armor of you and your target. Lasts 7 seconds.\r\n+ 6 Armor\r\n+ 50% Mana Regeneration\r\nARMOR REDUCTION: 6', 'None', 7, 0, 'The bearer has no fear of combat.'),
(65, 'item_mekansm', 'Mekansm', 2306, 'Active: Restore - Heals 250 HP and gives +2 armor in an area.\r\nPassive: Mekansm Aura - Bonus HP Regen in an area.\r\n\r\nMultiple instances of Mekansm Aura do not stack.\r\n+ 5 All Attributes\r\n+ 5 Armor\r\nBONUS HP REGEN: 4', 'None', 45, 150, 'A glowing jewel formed out of assorted parts that somehow fit together perfectly.'),
(66, 'item_mithril_hammer', 'Mithril Hammer', 1600, '+ 24 Damage', 'None', 0, 0, 'A hammer forged of pure mithril.'),
(67, 'item_mjollnir', 'Mjollnir', 5400, 'Active: Static Charge - Places a charged shield on a target unit.\r\nPassive: Chain Lightning - Grants a chance to release Chain Lightning on attack, dealing damage to multiple targets.\r\n\r\nMjollnir is a Unique Attack Modifier that stacks with other Unique Attack Modifiers, but overrides them when Chain Lightning occurs.\r\n+ 24 Damage\r\n+ 80 Attack Speed\r\nCHANCE TO CHAIN: 25%\r\nCHAIN DAMAGE: 160', 'Chain Lightning', 35, 50, 'Thor’s magical hammer, made for him by the dwarves Brok and Eitri.'),
(68, 'item_monkey_king_bar', 'Monkey King Bar', 5400, 'Passive: Mini-Bash - Gives a chance to minibash and deal bonus damage.\r\nPassive: True Strike - Prevents your attacks from missing.\r\n+ 88 Damage\r\n+ 15 Attack Speed\r\nCHANCE TO MINI-BASH: 35%\r\nMINI-BASH DAMAGE: 100', 'None', 0, 0, 'A powerful staff used by a master warrior.'),
(69, 'item_mystic_staff', 'Mystic Staff', 2700, '+ 25 Intelligence', 'None', 0, 0, 'Enigmatic staff made of only the most expensive crystals.'),
(70, 'item_necronomicon', 'Necronomicon', 2700, 'Active: Demonic Summoning - Summons a Necronomicon Warrior and a Necronomicon Archer to fight for you. Their strength and abilities increase as Necronomicon increases in level. Lasts 35 seconds.\r\n+ 15/21/24 Intelligence\r\n+ 8/12/16 Strength', 'None', 80, 50, 'Considered the holy grail of necromancy and demonology, a powerful malefic force is locked within its pages.'),
(71, 'item_null_talisman', 'Null Talisman', 480, '+ 3 Strength\r\n+ 3 Agility\r\n+ 6 Intelligence\r\n+ 3 Damage', 'None', 0, 0, 'A small gemstone attached to several chains.'),
(72, 'item_oblivion_staff', 'Oblivion Staff', 1675, '+ 6 Intelligence\r\n+ 10 Attack Speed\r\n+ 15 Damage\r\n+ 75% Mana Regeneration', 'None', 0, 0, 'Deceptively hidden as an ordinary quarterstaff, it is actually very powerful, much like the Eldritch who originally possessed it.'),
(73, 'item_ogre_axe', 'Ogre Club', 1000, '+ 10 Strength', 'None', 0, 0, 'You grow stronger just by holding it.'),
(74, 'item_orb_of_venom', 'Orb of Venom', 275, 'Passive: Poison Attack - Poisons the target, dealing damage over time and slowing, depending on whether your hero is melee of ranged.\r\n\r\nOrb of Venom is a Unique Attack Modifier, and does not stack with other Unique Attack Modifiers.\r\nMELEE SLOW: 12%\r\nRANGED SLOW: 4%\r\nDURATION: 4\r\nPOISON DAMAGE: 3', 'Poison Attack', 0, 0, 'Imbues your weapon with the venom of a poisonous spider.'),
(75, 'item_orchid', 'Orchid Malevolence', 5025, 'Active: Soul Burn - Silences target unit for 5.0 seconds and amplifies the damage it takes by 30.0%\r\n+ 25 Intelligence\r\n+ 30 Attack Speed\r\n+ 30 Damage\r\n+ 150% Mana Regeneration', 'None', 18, 100, 'A garnet rod constructed from the essence of a fire demon.'),
(76, 'item_pers', 'Perseverance', 1750, '+ 10 Damage\r\n+ 5 HP Regeneration\r\n+ 125% Mana Regeneration', 'None', 0, 0, 'A gem that grants heart to the bearer.'),
(77, 'item_phase_boots', 'Phase Boots', 1350, 'Active: Phase - Gives increased movement speed and lets you move through units. Phase is cancelled upon using another item or ability.\r\n\r\nFlat movement speed bonuses from multiple pair of boots do not stack.\r\nPHASE DURATION: 4\r\nPHASE MOVE BOOST: 16%\r\n+ 55 Movement Speed\r\n+ 24 Damage', 'None', 8, 0, 'Boots that allow the wearer to travel between the ether.'),
(78, 'item_pipe', 'Pipe of Insight', 3628, 'Active: Barrier - Gives nearby friendly units a shield that blocks 400 spell damage.\r\n\r\nMultiple instance of spell resistance from items do not stack.\r\n+ 11 HP Regeneration\r\n+ 30% Spell Resistance', 'None', 60, 100, 'A powerful artifact of mysterious origin, it creates barriers against magical forces.'),
(79, 'item_platemail', 'Platemail', 1400, '+ 10 Armor', 'None', 0, 0, 'Thick metal plates that protect the entire upper body. Avoid dropping on feet.'),
(80, 'item_point_booster', 'Point Booster', 1200, '+ 200 HP\r\n+ 150 Mana', 'None', 0, 0, 'A perfectly formed amethyst that nourishes body and mind when held.'),
(81, 'item_poor_mans_shield', 'Poor Man''s Shield', 550, 'Passive: Damage Block - Blocks physical attack damage, depending on the type of hero you are. Poor Man''s Shield will always block attacks from enemy Heroes, but has a chance to block damage from creeps.\r\nMELEE BLOCK: 20\r\nRANGED BLOCK: 10\r\nBLOCK CHANCE: 60%\r\n+ 6 Agility', 'None', 0, 0, 'A busted old shield that seems to block more than it should.'),
(82, 'item_power_treads', 'Power Treads', 1400, 'Active: Switch Attribute - Changes selected attribute between Strength, Agility and Intelligence.\r\n\r\nFlat movement speed bonuses from multiple pairs of boots do not stack.\r\n+ 55 Movement Speed\r\n+ 8 Selected Attribute\r\n+ 30 Attack Speed', 'None', 0, 0, 'A pair of tough-skinned boots that change to meet the demands of the wearer.'),
(83, 'item_quarterstaff', 'Quarterstaff', 900, '+ 10 Damage\r\n+ 10 Attack speed', 'None', 0, 0, 'A basic staff that allows you to strike quickly.'),
(84, 'item_quelling_blade', 'Quelling Blade', 225, 'Active: Destroy Tree - Destroy a target tree.\r\nPassive: Quell - Gives bonus attack damage against non-hero units, depending on the type of hero you are.\r\nMELEE BONUS: 32%\r\nRANGED BONUS: 12%', 'None', 5, 0, 'The axe of a fallen gnome, it allows you to effectively maneuver the forest.'),
(85, 'item_radiance', 'Radiance', 5150, 'Active: Toggles Burn Damage on or off.\r\nPassive: Burn Damage - Deals damage per second in a 650 radius.\r\n+ 60 Damage\r\nBURN DAMAGE: 45', 'None', 0, 0, 'A divine weapon that causes damage and a bright burning effect that lays waste to nearby enemies.'),
(86, 'item_rapier', 'Divine Rapier', 6200, 'Drops on death. Divine Rapier is muted to anyone but the owner, as long as he or his teammates pick it up. As soon as an enemy picks it up, Divine Rapier is unmuted, but cannot be dropped except on death.\r\n+ 300 Damage', 'None', 0, 0, 'So powerful, it cannot have a single owner.'),
(87, 'item_reaver', 'Reaver', 3200, '+ 25 Strength', 'None', 0, 0, 'A massive axe capable of tearing whole mountains down.'),
(88, 'item_refresher', 'Refresher Orb', 5300, 'Active: Reset Cooldowns - Resets the cooldowns of all your items and abilities.\r\n+ 5 HP Regeneration\r\n+ 200% Mana Regeneration\r\n+ 40 Damage\r\n+ 6 Intelligence', 'None', 160, 375, 'A powerful artifact created for wizards.'),
(89, 'item_relic', 'Sacred Relic', 3800, '+ 60 Damage', 'None', 0, 0, 'An ancient weapon that often turns the tides of war.'),
(90, 'item_ring_of_aquila', 'Ring of Aquila', 985, 'Passive: Aquila Aura - Grants mana regeneration and armor in a 900 AoE.\r\nActive: Toggle whether the aura affects other non-hero units.\r\n\r\nMultiple instance of Aquila Aura do not stack.\r\n+ 9 Damage\r\n+ 3 All Attributes\r\n+ 3 Agility\r\n+ 1 Armor\r\nAURA MANA REGEN: 0.65\r\nAURA BONUS ARMOR: 2', 'None', 0, 0, 'The ring of the fallen Warlord Aquila continues to support armies in battle.'),
(91, 'item_ring_of_basilius', 'Ring of Basilius', 500, 'Passive: Basilius Aura - Grants man regeneration and armor in a 900 AoE.\r\nActive: Toggle whether the aura affects other non-hero units.\r\n\r\nMultiple instances of Basilius Aura do not stack.\r\n+ 6 Damage\r\nAURA MANA REGEN: 0.65\r\nAURA BONUS ARMOR: 2\r\n+ 1 Armor', 'None', 0, 0, 'Ring given as a reward to the greatest mages.'),
(92, 'item_ring_of_health', 'Ring of Health', 875, '+ 5 HP Regeneration', 'None', 0, 0, 'A shiny ring found beneath a fat halfling’s corpse.'),
(93, 'item_ring_of_protection', 'Ring of Protection', 175, '+ 2 Armor', 'None', 0, 0, 'A glimmering ring that defends its bearer.'),
(94, 'item_ring_of_regen', 'Ring of Regen', 350, '+ 2 HP Regeneration', 'None', 0, 0, 'This ring is considered a good luck charm among the Gnomes.'),
(95, 'item_robe', 'Robe of the Magi', 450, '+ 6 Intelligence', 'None', 0, 0, 'This robe corrupts the soul of the user, but provides wisdom in return.'),
(96, 'item_rod_of_atos', 'Rod of Atos', 3100, 'Active: Cripple - Slows the target''s movement speed.\r\n+ 25 Intelligence\r\n+ 325 Health\r\nCRIPPLE SLOW: 60%\r\nDURATION: 4', 'None', 16, 50, 'Atos, the Lord of Blight, has his essence stored in this deceptively simple wand.'),
(97, 'item_sange', 'Sange', 2050, 'Passive: Lesser Maim - Gives a chance on attack to slow movement speed for 4.0 seconds.\r\n+ 10 Damage\r\n+ 16 Strength\r\nMAIM CHANCE: 15%\r\nSLOW: 20%', 'None', 0, 0, 'Sange is an unusually accurate weapon, seeking weak points automatically.'),
(98, 'item_sange_and_yasha', 'Sange and Yasha', 4100, 'Passive: Greater Maim - Gives a chance on attack to slow movement speed for 4.0 seconds.\r\n\r\nPercentage based movement speed bonuses from multiple items do not stack.\r\n+ 12 Damage\r\n+ 16 Strength\r\n+ 16 Agility\r\n+ 15 Attack Speed\r\n+ 12% Movement Speed\r\nMAIM CHANCE: 15%\r\nSLOW: 30%', 'None', 0, 0, 'Sange and Yasha, when attuned by the moonlight and used together, become a very powerful combination.'),
(99, 'item_satanic', 'Satanic', 6150, 'Active: Unholy Rage - Increase Lifesteal by 175% for 3.5 seconds.\r\nPassive: Lifesteal - Gives Lifesteal on attacks.\r\n\r\nSatanic is a Unique Attack Modifier, and doe snot stack with other Unique Attack Modifiers.\r\n+ 20 Damage\r\n+ 25 Strength\r\n+ 5 Armor\r\nLIFESTEAL: 25%', 'Lifesteal', 35, 0, 'Immense power at the cost of your soul.'),
(100, 'item_sheepstick', 'Scythe of Vyse', 5675, 'Active: Hex - Turns a target unit into a harmless critter for 3.5 seconds. Destroys illusions.\r\n+ 10 Strength\r\n+ 10 Agility\r\n+ 35 Intelligence\r\n+ 150% Mana Regeneration', 'None', 35, 100, 'The most guarded relic among the cult of Vyse, it is the most coveted weapon among magi.'),
(101, 'item_shivas_guard', 'Shiva''s Guard', 4700, 'Active: Arctic Blast - Emits a freezing wave that does 200 damage to enemies and slows their movement by 40% for 4.0 seconds.\r\nPassive: Freezing Aura - Reduces attack speed on enemies.\r\n\r\nMultiple instances of Freezing Aura do not stack.\r\n+ 30 Intelligence\r\n+ 15 Armor\r\nAURA SLOW: 30%', 'None', 30, 100, 'Said to have belonged to a goddess, today it retains much of its former power.'),
(102, 'item_skadi', 'Eye of Skadi', 5675, 'Passive: Cold Attack - Attacks slow the movement and attack speed of the target.\r\n\r\nEye of Skadi is a Unique Attack Modifier, and does not stack with other Unique Attack Modifiers. Eye of Skadi can be combined with Lifesteal Attack Modifiers.\r\n+ 25 All Attributes\r\n+ 250 Health\r\n+ 250 Mana\r\nMOVE SLOW: 30%\r\nATTACK SLOW: 20%', 'Cold Attack', 0, 0, 'Extremely rare artifact, guarded by the azure dragons.'),
(103, 'item_slippers', 'Slippers of Agility', 150, '+ 3 Agility', 'None', 0, 0, 'Light boots made from spider skin that tingles your senses.'),
(104, 'item_smoke_of_deceit', 'Smoke of Deceit', 100, 'Use: Upon activation, the user and all nearby allied player-controlled units gain invisibility and bonus movement speed for a bried time. Minimap icons will also be hidden. Upon moving within 1025 range of an enemy hero or tower, the invisibility is lost.\r\nBONUS SPEED: 15%\r\nDURATION: 40', 'None', 90, 0, ' '),
(105, 'item_sobi_mask', 'Sage''s Mask', 325, '+ 50% Mana Regeneration', 'None', 0, 0, 'A mask commonly used by mages and warlocks for various rituals.'),
(106, 'item_soul_booster', 'Soul Booster', 3300, '+ 450 HP\r\n+ 400 Mana\r\n+ 4 HP Regeneration\r\n+ 100% Mana Regeneration', 'None', 0, 0, 'Regain lost courage.'),
(107, 'item_soul_ring', 'Soul Ring', 800, 'Active: Sacrifice - Consume 150 HP to temporarily gain 150 Mana. Lasts 10 seconds.\r\n+ 3 HP Regeneration\r\n+ 50% Mana Regeneration', 'None', 30, 0, 'A ring that feeds on the souls of those around it.'),
(108, 'item_sphere', 'Linken''s Sphere', 5175, 'Passive: Spellblock - Blocks most targeted spells once every 20 seconds.\r\n+ 15 All Attributes\r\n+ 6 HP Regeneration\r\n+ 150% Mana Regeneration\r\n+ 10 Damage', 'None', 20, 0, 'This magical sphere once protected one of the most famous heroes in history.'),
(109, 'item_staff_of_wizardry', 'Staff of Wizardry', 1000, '+ 10 Intelligence', 'None', 0, 0, 'A staff of magical powers passed down from the eldest mages.'),
(110, 'item_stout_shield', 'Stout Shield', 250, 'Passive: Damage Block - Gives a chance to block damage, depending on the type of hero you are.\r\n\r\nMELEE BLOCK: 20\r\nRANGED BLOCK: 10\r\nBLOCK CHANCE: 60%', 'None', 0, 0, 'One man''s wine barrel bottom is another man''s shield.'),
(111, 'item_talisman_of_evasion', 'Talisman of Evasion', 1800, '+ 25% Evasion', 'None', 0, 0, 'A necklace that allows you to anticipate enemy attacks.'),
(112, 'item_tango', 'Tango', 90, 'Use: Eat Tree - Consume a tree to restore HP over time. Comes with 3 charges.\r\nDURATION: 16\r\nHEALTH RESTORED: 115', 'None', 0, 0, 'Forage to survive on the battlefield.'),
(113, 'item_tpscroll', 'Town Portal Scroll', 135, 'Use: Teleport - Teleports you to a target friendly building.', 'None', 65, 75, ' '),
(114, 'item_tranquil_boots', 'Tranquil Boots', 975, 'Active: Heal - Restores 250 HP over 20 seconds while out of combat.\r\nPassive: Break - Tranquil Boots lose their bonuses and only provide 25 MS until the last 10 seconds don''t have 3 instances of damage.\r\n+ 75 Movement Speed\r\n+ 3 Armor\r\n+ 3 HP Regeneration\r\n', 'None', 60, 25, 'While they increase the longevity of the wearer, this boot is not particularly reliable.'),
(115, 'item_travel_boots', 'Boots of Travel', 2450, 'Active: Teleport - Teleports you to an allied non-hero unit or structure.\r\n\r\nFlat movement speed bonuses form multiple pairs of boots do not stack.\r\n+ 100 Movement Speed', 'None', 60, 75, 'Winged boots that grant omnipresence.'),
(116, 'item_ultimate_orb', 'Ultimate Orb', 2100, '+ 10 All Attributes', 'None', 0, 0, 'A mystical orb containing the essence of life.'),
(117, 'item_ultimate_scepter', 'Aghanim''s Scepter', 4200, 'Passive: Ultimate Upgrade - Upgrades the ultimates of certain heroes.\r\n+ 10 All Attributes\r\n+ 200 Health\r\n+ 150 Mana', 'None', 0, 0, 'The scepter of a wizard with demigod-like powers.'),
(118, 'item_urn_of_shadows', 'Urn of Shadows', 875, 'Gains charges every time an enemy hero dies within 1400 units. Only the closest Urn to the dying hero will gain a charge.\r\nActive: Soul Release - Heals HP over time for friendly units, but deals damage over time for enemy units. The healing effect is lost if the affected unit takes damage from an enemy hero or tower.\r\n+ 50% Mana Regeneration\r\n+ 6 Strength\r\nURN HEAL: 400\r\nDURATION: 8\r\nURN DAMAGE: 150', 'None', 10, 0, 'Contains the ashes of powerful demons.'),
(119, 'item_vanguard', 'Vanguard', 2225, 'Passive: Damage Block - Gives a chance to block damage, depending on the type of hero you are.\r\n+ 250 Health\r\n+ 6 HP Regeneration\r\nBLOCK CHANCE: 70%\r\nRANGED BLOCK: 20\r\nMELEE BLOCK: 40', 'None', 0, 0, 'A powerful shield that defends its wielder from even the most vicious of attacks.'),
(120, 'item_veil_of_discord', 'Veil of Discord', 2650, 'Active: Magic Weakness - Emits a weakening blast that increases the magic damage enemies take. Lasts 20.0 seconds.\r\n+ 6 Armor\r\n+ 12 Intelligence\r\n+ 6 HP Regeneration\r\nRADIUS: 550\r\nBONUS MAGIC DAMAGE: 25%', 'None', 30, 75, 'The headwear of corrupt magi.'),
(121, 'item_vitality_booster', 'Vitality Booster', 1100, '+ 250 HP', 'None', 0, 0, 'A ruby gemstone that has been passed down through generations of warrior kin.'),
(122, 'item_vladmir', 'Vladmir''s Offering', 2050, 'Passive: Vladmir''s Aura - Grants a variety of bonuses to nearby allies. Lifesteal bonuses from Vladmir''s Aura only affect melee units.\r\n\r\nMultiple instances of Vladmir''s Aura do not stack.\r\nAURA LIFESTEAL: 16%\r\nAURA BONUS DAMAGE: 15%\r\nAURA BONUS ARMOR: 5\r\nAURA MANA REGEN: 0.8\r\n+ 2 HP Regeneration', 'None', 0, 0, 'An eerie mask that is haunted with the malice of a fallen vampire.'),
(123, 'item_void_stone', 'Void Stone', 875, '+ 100% Mana Regeneration', 'None', 0, 0, 'Jewelry that was once used to channel nether realm magic, this ring pulses with energy.'),
(124, 'item_ward_observer', 'Observer Ward', 150, 'Use: Places an Observer Ward to give sight of the surrounding area.\r\n\r\nLasts 6 minutes.', 'None', 1, 0, ''),
(125, 'item_ward_sentry', 'Sentry Ward', 200, 'Use: Places a Sentry Ward to give True Sight of the surrounding area.\r\n\r\nLasts 3 minutes.', 'None', 1, 0, ' '),
(126, 'item_wraith_band', 'Wraith Band', 485, '+ 3 Strength\r\n+ 6 Agility\r\n+ 3 Intelligence\r\n+ 3 Damage', 'None', 0, 0, 'A circlet with faint whispers echoing about it.'),
(127, 'item_yasha', 'Yasha', 2050, 'Percentage based movement speed bonuses from multiple items do not stack.\r\n+ 16 Agility\r\n+ 15 Attack Speed\r\n+ 10% Movement Speed', 'None', 0, 0, 'Yasha is regarded as the swiftest weapon ever created.');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `suggestionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `suggestionID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `guideID` int(11) NOT NULL,
  PRIMARY KEY (`suggestionID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `password` varchar(41) NOT NULL,
  `email` varchar(50) NOT NULL,
  `moderator` tinyint(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `password`, `email`, `moderator`) VALUES
(1, 'deathcalibur', '8c23126835b2c758a53c339dddcaf786', 'bmm58@case.edu', 1),
(3, 'Raverenx', 'c02b7d24a066adb747fdeb12deb21bfa', 'eam128@case.edu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `suggestionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `vote` enum('up','down') NOT NULL,
  PRIMARY KEY (`suggestionID`,`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
