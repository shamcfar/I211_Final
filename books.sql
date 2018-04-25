-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2018 at 12:01 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `author` varchar(40) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `genre`, `image`, `publisher`, `description`) VALUES
(1, 'Ultimate Galactus Trilogy', 'Warren Ellis', 'Superhero', 'https://images-na.ssl-images-amazon.com/images/I/51q6NgVzbgL._SX339_BO1,204,203,200_.jpg', 'Marvel Comics', 'The Ultimate Galactus Trilogy is a collection of three comic book limited series published by Marvel Comics. All three series are set in the Ultimate Marvel universe and are written by Warren Ellis. The series showcase the arrival of the planet-eating entity Gah Lak Tus on Earth.'),
(2, 'Wiseguy', 'Nicholas Pileggi', 'Biography, Case Studies', 'https://upload.wikimedia.org/wikipedia/en/f/f3/Wiseguy_%28book%29_-_bookcover.jpg', 'Simon & Schuster', 'Wiseguy: Life in a Mafia Family is a 1986 non-fiction book by crime reporter Nicholas Pileggi that chronicles the story of Mafia mobster-turned-informant Henry Hill.  The book is the basis for the 1990 Academy Award-winning film Goodfellas directed by Martin Scorsese. \r\n'),
(3, 'The Outsiders', 'S.E. Hinton', 'Young Adult Fiction', 'https://upload.wikimedia.org/wikipedia/en/3/32/The_outsiders_1967_first_edition.jpg', 'Viking Press', 'The book follows two rival groups, the Greasers and the Socs (short for Socials), who are divided by their socioeconomic status. The story is told in first-person narrative by protagonist Ponyboy Curtis.'),
(4, '‘Salem’s Lot', 'Stephen King', 'Horror', 'https://upload.wikimedia.org/wikipedia/en/d/df/Salemslothardcover.jpg', 'Doubleday', 'The story involves a writer named Ben Mears who returns to the town of Jerusalem\'s Lot (or \'Salem\'s Lot for short) in Maine, where he had lived from the age of five through nine, only to discover that the residents are becoming vampires.'),
(5, 'It', 'Stephen King', 'Horror', 'https://upload.wikimedia.org/wikipedia/en/5/5a/It_cover.jpg', 'Viking', 'The story follows the experiences of seven children as they are terrorized by an entity that exploits the fears and phobias of its victims to disguise itself while hunting its prey. \"It\" primarily appears in the form of a clown to attract its preferred prey of young children.'),
(6, 'Old Man Logan', 'Mark Millar, Brian Bendis, Jeff Lemire', 'Superhero', 'https://upload.wikimedia.org/wikipedia/en/e/e0/Logan_%28Earth-807128%29.png', 'Marvel Comics', 'Old Man Logan is an alternative version of the Marvel Comics character Wolverine. This character is an aged Wolverine set in an alternate future universe designated Earth-807128, where the supervillains overthrew the superheroes. '),
(7, 'The Zombie Survival Guide', 'Max Brooks', 'Horror, Informative', 'https://upload.wikimedia.org/wikipedia/en/c/c2/Zombiesurvivalguide.jpg', 'Three River Press', 'The Zombie Survival Guide is a survival manual dealing with the fictional potentiality of a zombie attack. It contains detailed plans for the average citizen to survive zombie uprisings of varying intensity and reach, and describes \"cases\" of zombie outbreaks in history, including an interpretation of Roanoke Colony. '),
(8, 'The Godfather', 'Mario Puzo', 'Crime', 'https://upload.wikimedia.org/wikipedia/en/f/f4/Godfather-Novel-Cover.png', 'G.P. Putnam’s Sons', 'The Godfather is a crime novel that details the story of a fictional Mafia family based in New York City (and Long Beach, New York), headed by Vito Corleone. The novel covers the years 1945 to 1955, and also provides the back story of Vito Corleone from early childhood to adulthood.'),
(9, 'Planet Hulk', 'Greg Pak', 'Superhero', 'http://3.bp.blogspot.com/-ElrQNV9QzKs/VfB13N6ec1I/AAAAAAAPtVU/RniD76tq_lg/s1600/79_00.jpg', 'Marvel', 'Description: When a Gamma bomb causes the Hulk to lose control and attack Las Vegas, the Illuminati decide the Hulk is too dangerous to remain on Earth. They trick him into entering orbit to destroy a rogue satellite, and then use a shuttle to jettison him from the solar system. They intended for him to land on a peaceful planet, but the shuttle passes through a wormhole on its way.\r\n'),
(10, 'The Mist\r\n', 'Stephen King', 'Horror', ' https://upload.wikimedia.org/wikipedia/en/a/ae/Mist2007.jpg\r\n', 'Viking Press', 'The morning after a violent thunderstorm, a thick unnatural mist quickly spreads across the small town of Bridgton, Maine, reducing visibility to near-zero and concealing numerous species of bizarre creatures which viciously attack anyone and anything that dare venture out into the open.\r\n'),
(11, 'The Dead Zone\r\n', 'Stephen King', 'Horror, Supernatural', 'https://upload.wikimedia.org/wikipedia/en/5/57/DeadZone.jpg\r\n', 'Viking Press', 'The Dead Zone concerns Johnny Smith, who is injured in an accident and remains in a coma for nearly five years. Upon emergence, he exhibits clairvoyance and precognition with limitations, apparently because of a \"dead zone,\" an area of his brain that suffered permanent damage as the result of his accident. \r\n'),
(12, 'Tales of Ordinary Madness\r\n', 'Charles Bukowski', 'Short Stories', 'https://upload.wikimedia.org/wikipedia/en/0/02/TalesOfOrdinaryMadness.jpg\r\n', 'City Lights Books', 'Tales of Ordinary Madness is one of two collections of short stories by Charles Bukowski that City Lights Publishers culled from its 1972 paperback volume Erections, Ejaculations, Exhibitions, and General Tales of Ordinary Madness. (The other volume is entitled The Most Beautiful Woman in Town). Both volumes were first published in 1983 and remain in print.\r\n'),
(13, 'Fight Club\r\n', 'Chuck Palahniuk', 'Satirical Novel', 'https://upload.wikimedia.org/wikipedia/en/c/ce/Fightclubcvr.jpg\r\n', ' W. W. Norton', 'Fight Club centers on an anonymous narrator, who works as a product recall specialist for an unnamed car company. Because of the stress of his job and the jet lagbrought upon by frequent business trips, he begins to suffer from recurring insomnia. When he seeks treatment, his doctor advises him to visit a support group victims to \"see what real suffering is like\". He finds that sharing the problems of others—despite not having testicular cancer himself—alleviates his insomnia.\r\n'),
(14, 'Choke\r\n', 'Chuck Palahniuk', 'Satirical Novel', 'https://upload.wikimedia.org/wikipedia/en/5/53/Chokecvr.jpg\r\n', 'Doubleday', 'Choke follows Victor Mancini and his friend Denny through a few months of their lives with frequent flashbacks to the days when Victor was a child. He had grown up moving from one foster home to another, as his mother was found to be unfit to raise him. Several times throughout his childhood, his mother would kidnap him from his various foster parents, though every time they would eventually be caught, and he would again be remanded over to the governmental child welfare agency.\r\n'),
(15, 'Snuff\r\n', 'Chuck Palahniuk', 'Satirical Novel', ' https://upload.wikimedia.org/wikipedia/en/d/d3/Snuff_by_Chuck_Palahniuk.jpg\r\n', 'Doubleday', 'Snuff follows three men who are waiting to immortalize themselves into pornography history as they wait to bed Cassie Wright, a former porn queen who has fallen into harder times. Each chapter follows a different guy (Mr. 600, Mr. 72, and Mr. 137), as well as Sheila, the female wrangler who dictates who is the next to be filmed with Cassie Wright. As the three men wait, each starts to divulge their true reasons for wanting to be filmed, as well as discuss the sordid history of Cassie Wright and her reason for suddenly dropping out of the pornography industry for a year. As backgrounds, secrets, and would-be children start to appear, the tensions in the room start to rise and in the end the true secrets of her comeback, and who really is Cassie Wright\'s porn child, are the last things any of them suspect.\r\n'),
(16, 'The Bible\r\n', 'Multiple Authors', 'Fiction', 'https://upload.wikimedia.org/wikipedia/commons/b/b6/Gutenberg_Bible%2C_Lenox_Copy%2C_New_York_Public_Library%2C_2009._Pic_01.jpg\r\n', 'Gutenburg', 'Follow Jesus and friends on their wacky adventures in this collection of sacred texts or scriptures that Jews and Christians consider to be a product of divine inspiration and a record of the relationship between God and humans. \r\n'),
(17, 'The Old Man and the Sea\r\n', 'Ernest Hemingway', 'Literary Fiction', 'https://upload.wikimedia.org/wikipedia/en/7/73/Oldmansea.jpg\r\n', 'Charles Scribner', 'The Old Man and the Sea tells the story of a battle between an aging, experienced fisherman, Santiago, and a large marlin. The story opens with Santiago having gone 84 days without catching a fish, and now being seen as \"salao,\" the worst form of unluckiness. He is so unlucky that his young apprentice, Manolin, has been forbidden by his parents to sail with him and has been told instead to fish with successful fishermen. The boy visits Santiago\'s shack each night, hauling his fishing gear, preparing food, talking about American baseball and his favorite player, Joe DiMaggio. Santiago tells Manolin that on the next day, he will venture far out into the Gulf Stream, north of Cuba in the Straits of Florida to fish, confident that his unlucky streak is near its end.\r\n'),
(18, 'For Whom the Bell Tolls\r\n', 'Ernest Hemingway', 'War Novel', 'https://upload.wikimedia.org/wikipedia/en/4/48/ErnestHemmingway_ForWhomTheBellTolls.jpg\r\n', 'Charles Scribner', 'The novel graphically describes the brutality of the civil war in Spain during this time. It is told primarily through the thoughts and experiences of the protagonist, Robert Jordan. It draws on Hemingway\'s own experiences in the Spanish Civil War as a reporter for the North American Newspaper Alliance. Jordan is an American who had lived in Spain during the pre-war period, and fights as an irregular soldier for the Republic against Francisco Franco\'s fascist forces. An experienced dynamiter, he is ordered by a Soviet general to travel behind enemy lines and destroy a bridge with the aid of a band of local anti-fascist guerrillas, in order to prevent enemy troops from responding to an upcoming offensive. On his mission, Jordan meets the rebel Anselmo who brings him to the hidden guerrilla camp and initially acts as an intermediary between Jordan and the other guerrilla fighters.\r\n'),
(19, 'Green Eggs and Ham\r\n', 'Dr. Seuss', 'Children’s Literature', 'https://upload.wikimedia.org/wikipedia/en/1/11/Green_Eggs_and_Ham.jpg\r\n', 'Random House', ' A character named \"Sam\" pesters Joey to try a plate of green eggs and ham. Joey refuses, responding, \"I do not like green eggs and ham. I do not like them, Sam-I-am.\" He continues to repeat this as Sam persistently follows him, asking him to try them in eight locations (house, box, car, tree, train, dark, rain, boat) and with three animals (mouse, fox, and goat). Finally, he gives into Sam\'s pestering and tries the green eggs and ham, which he does like after all and happily responds, \"I do so like green eggs and ham. Thank you. Thank you, Sam-I-am.\"\r\n'),
(20, 'Crime and Punishment\r\n', ' Fyodor Dostoevsky', 'Novel', 'https://upload.wikimedia.org/wikipedia/en/4/4b/Crimeandpunishmentcover.png\r\n', 'Russian Messenger', 'Rodion Romanovich Raskolnikov, a former law student, lives in extreme poverty in a tiny, rented room in Saint Petersburg. He has abandoned all attempts to support himself and has devised a plan to murder and rob an elderly pawn-broker, Alyona Ivanovna. While still considering the plan, Raskolnikov makes the acquaintance of Semyon Zakharovich Marmeladov, a drunkard who recently squandered his family\'s little wealth. Marmeladov tells him about his teenage daughter, Sonya, who has chosen to become a prostitute in order to support the family. Raskolnikov also receives a letter from his mother in which she speaks of their coming visit to Saint Petersburg, and describes at length the problems of his sister Dunya, who has been working as a governess, with her ill-intentioned employer. To escape her vulnerable position, and with hopes of helping her brother, Dunya has chosen to marry a wealthy suitor. Raskolnikov is inwardly enraged at her sacrifice, feeling it is the same as what Sonya felt compelled to do.\r\n'),
(21, 'The Brothers Karamazov\r\n', 'Fyodor Dostoevsky', 'Philosophical Novel', 'https://upload.wikimedia.org/wikipedia/commons/2/2d/Dostoevsky-Brothers_Karamazov.jpg\r\n', 'Russian Messenger', 'The Brothers Karamazov is a passionate philosophical novel set in 19th-century Russia, that enters deeply into the ethicaldebates of God, free will, and morality. It is a spiritual drama of moral struggles concerning faith, doubt, judgment, and reason, set against a modernizing Russia, with a plot which revolves around the subject of patricide.\r\n'),
(22, 'War and Peace\r\n', 'Leo Tolstoy', 'Novel', 'https://upload.wikimedia.org/wikipedia/commons/a/af/Tolstoy_-_War_and_Peace_-_first_edition%2C_1869.jpg\r\n', 'Russian Messenger', 'The novel chronicles the history of the French invasion of Russia and the impact of the Napoleonic era on Tsarist society through the stories of five Russian aristocratic families. Portions of an earlier version, titled The Year 1805, were serialized in The Russian Messenger from 1865 to 1867. The novel was first published in its entirety in 1869. \r\n'),
(23, 'Charlie and the Chocolate Factory\r\n', 'Roald Dahl', 'Children’s Literature', 'https://upload.wikimedia.org/wikipedia/en/f/f6/Charlie_and_the_Chocolate_Factory_original_cover.jpg\r\n', 'Puffin Books', '12-year-old Charlie Bucket lives in poverty in a tiny house with his parents and four grandparents. His grandparents share the only bed in the house, located in the only bedroom. Charlie and his parents sleep on a mattress on the floor. One day, Grandpa Joe tells him about the legendary and eccentric chocolatier, Willy Wonka and all the wonderful sweets he made until the other sweetmakers sent in spies to steal his secret recipes, which led him to close the factory forever. The next day, the newspaper announces that Mr Wonka is reopening the factory and has invited five children to come on a tour, after they find a golden ticket in a Wonka Bar. Each ticket find is a media sensation and each finder becomes a celebrity. The first four golden tickets are found by the gluttonous Augustus Gloop, the spoiled and petulant Veruca Salt, the gum-addicted Violet Beauregarde, and the TV-obsessed Mike Teavee.\r\n'),
(24, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Motivational & Inspirational', 'https://books.google.com/books/content/images/frontcover/yng_CwAAQBAJ?fife=w400-h600', 'HarperCollins', 'In this generation-defining self-help guide, a superstar blogger cuts through the crap to show us how to stop trying to be &#34;positive&#34; all the time so that we can truly become better, happier people.\r\n\r\nFor decades, we’ve been told that positive thinking is the key to a happy, rich life. &#34;F**k positivity,&#34; Mark Manson says. &#34;Let’s be honest, shit is f**ked and we have to live with it.&#34; In his wildly popular Internet blog, Manson doesn’t sugarcoat or equivocate. He tells it like it is—a dose of raw, refreshing, honest truth that is sorely lacking today. The Subtle Art of Not Giving a F**k is his antidote to the coddling, let’s-all-feel-good mindset that has infected American society and spoiled a generation, rewarding them with gold medals just for showing up.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `role`) VALUES
(1, 'captain', 'captain', 'Jean-Luc Picard', 'jeanluc@enterprise.co.uk', 1),
(2, 'shamcfar', 'unCameron07', 'Shaun McFarland', 'shamcfar@iu.edu', 1),
(9, 'ashnhold', 'Ashley', 'Ashley Holden', 'ashnhold@iu.edu', 0),
(10, 'TheSolo', '14parsecs', 'Han Solo', 'solo_han@rebellion.gov', 0),
(11, 'playerone', 'Parcival', 'Wade Watts', 'wwatts@oasis.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
