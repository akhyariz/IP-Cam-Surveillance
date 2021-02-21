-- phpMyAdmin SQL Dump
-- version 2.11.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2010 at 10:03 AM
-- Server version: 5.0.84
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `stream`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `seftitle` varchar(100) default NULL,
  `text` longtext,
  `date` datetime default NULL,
  `category` int(8) NOT NULL default '0',
  `position` int(6) default NULL,
  `displaytitle` char(3) NOT NULL default 'YES',
  `displayinfo` char(3) NOT NULL default 'YES',
  `commentable` varchar(5) NOT NULL default '',
  `published` int(3) NOT NULL default '1',
  `description_meta` varchar(255) default NULL,
  `keywords_meta` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `seftitle`, `text`, `date`, `category`, `position`, `displaytitle`, `displayinfo`, `commentable`, `published`, `description_meta`, `keywords_meta`) VALUES
(5, 'Welcome', 'welcome', '<p align=''justify''>Welcome to WebCam Monitoring System, web-based IP Camera.<br>\r\nCaptured by webcam video device and streamed by Motion Video Streaming Server.</p>\r\n', '2009-09-15 16:25:15', 0, 3, 'NO', 'NO', 'NO', 1, 'Webcam Monitoring System.', 'webcam, streaming, monitoring, motion, snews');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(8) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `seftitle` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `published` varchar(4) NOT NULL default 'YES',
  `catorder` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL auto_increment,
  `articleid` int(11) default '0',
  `name` varchar(50) default NULL,
  `url` varchar(100) NOT NULL,
  `comment` text,
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  `approved` varchar(5) NOT NULL default 'True',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(8) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `value` varchar(60) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'website_title', 'WebCam Monitoring System'),
(2, 'home_sef', 'home'),
(3, 'website_description', 'WebCam System Monitoring'),
(4, 'website_keywords', 'streaming, webcam, video'),
(5, 'website_email', 'akhyari@gmail.com'),
(6, 'contact_subject', 'Contact Form'),
(7, 'language', 'EN'),
(8, 'charset', 'UTF-8'),
(9, 'date_format', 'd.m.Y. H:i'),
(10, 'article_limit', '1'),
(11, 'rss_limit', '0'),
(12, 'display_page', '5'),
(13, 'display_new_on_home', ''),
(14, 'display_pagination', ''),
(15, 'num_categories', ''),
(16, 'approve_comments', 'on'),
(17, 'comments_order', 'ASC'),
(18, 'comment_limit', '10'),
(19, 'word_filter_enable', ''),
(20, 'word_filter_file', ''),
(21, 'word_filter_change', ''),
(22, 'username', '21232f297a57a5a743894a0e4a801fc3'),
(23, 'password', '21232f297a57a5a743894a0e4a801fc3');
