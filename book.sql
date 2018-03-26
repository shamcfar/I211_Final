-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2018 at 02:10 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `book`
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
(1, 'Ultimate Galactus Trilogy', 'Warren Ellis', 'Superhero', 'https://en.wikipedia.org/wiki/Ultimate_Galactus_Trilogy#/media/File:Ultimate_Extinction_1.jpg', 'Marvel Comics', 'The Ultimate Galactus Trilogy is a collection of three comic book limited series published by Marvel Comics. All three series are set in the Ultimate Marvel universe and are written by Warren Ellis. The series showcase the arrival of the planet-eating entity Gah Lak Tus on Earth.'),
(2, 'Wiseguy', 'Nicholas Pileggi', 'Biography, Case Studies', 'https://upload.wikimedia.org/wikipedia/en/f/f3/Wiseguy_%28book%29_-_bookcover.jpg', 'Simon & Schuster', 'Wiseguy: Life in a Mafia Family is a 1986 non-fiction book by crime reporter Nicholas Pileggi that chronicles the story of Mafia mobster-turned-informant Henry Hill.  The book is the basis for the 1990 Academy Award-winning film Goodfellas directed by Martin Scorsese. \r\n'),
(3, 'The Outsiders', 'S.E. Hinton', 'Young Adult Fiction', 'https://upload.wikimedia.org/wikipedia/en/3/32/The_outsiders_1967_first_edition.jpg', 'Viking Press', 'The book follows two rival groups, the Greasers and the Socs (short for Socials), who are divided by their socioeconomic status. The story is told in first-person narrative by protagonist Ponyboy Curtis.'),
(4, '‘Salem’s Lot', 'Stephen King', 'Horror', 'https://upload.wikimedia.org/wikipedia/en/d/df/Salemslothardcover.jpg', 'Doubleday', 'The story involves a writer named Ben Mears who returns to the town of Jerusalem\'s Lot (or \'Salem\'s Lot for short) in Maine, where he had lived from the age of five through nine, only to discover that the residents are becoming vampires.'),
(5, 'It', 'Stephen King', 'Horror', 'https://upload.wikimedia.org/wikipedia/en/5/5a/It_cover.jpg', 'Viking', 'The story follows the experiences of seven children as they are terrorized by an entity that exploits the fears and phobias of its victims to disguise itself while hunting its prey. \"It\" primarily appears in the form of a clown to attract its preferred prey of young children.'),
(6, 'Old Man Logan', 'Mark Millar, Brian Bendis, Jeff Lemire', 'Superhero', 'https://upload.wikimedia.org/wikipedia/en/e/e0/Logan_%28Earth-807128%29.png', 'Marvel Comics', 'Old Man Logan is an alternative version of the Marvel Comics character Wolverine. This character is an aged Wolverine set in an alternate future universe designated Earth-807128, where the supervillains overthrew the superheroes. '),
(7, 'The Zombie Survival Guide', 'Max Brooks', 'Horror, Informative', 'https://upload.wikimedia.org/wikipedia/en/c/c2/Zombiesurvivalguide.jpg', 'Three River Press', 'The Zombie Survival Guide is a survival manual dealing with the fictional potentiality of a zombie attack. It contains detailed plans for the average citizen to survive zombie uprisings of varying intensity and reach, and describes \"cases\" of zombie outbreaks in history, including an interpretation of Roanoke Colony. '),
(8, 'The Godfather', 'Mario Puzo', 'Crime', 'https://upload.wikimedia.org/wikipedia/en/f/f4/Godfather-Novel-Cover.png', 'G.P. Putnam’s Sons', 'The Godfather is a crime novel that details the story of a fictional Mafia family based in New York City (and Long Beach, New York), headed by Vito Corleone. The novel covers the years 1945 to 1955, and also provides the back story of Vito Corleone from early childhood to adulthood.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'captain', 'captain', 'Jean-Luc Picard', 'jeanluc@enterprise.com');

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
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;