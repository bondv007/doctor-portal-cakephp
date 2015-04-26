-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2012 at 07:54 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `key` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lang_text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_translated` tinyint(1) NOT NULL,
  `is_google_translate` tinyint(1) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `language_id` (`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `created`, `modified`, `language_id`, `key`, `lang_text`, `is_translated`, `is_google_translate`, `is_verified`) VALUES
(1, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Dashboard', 'Dashboard', 0, 0, 0),
(2, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Snapshot', 'Snapshot', 0, 0, 0),
(3, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Users', 'Users', 0, 0, 0),
(4, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Activities', 'Activities', 0, 0, 0),
(5, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'User Logins', 'User Logins', 0, 0, 0),
(6, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'User Views', 'User Views', 0, 0, 0),
(7, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'User Favorites', 'User Favorites', 0, 0, 0),
(8, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages', 'Messages', 0, 0, 0),
(9, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Settings', 'Settings', 0, 0, 0),
(10, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Payments', 'Payments', 0, 0, 0),
(11, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Transactions', 'Transactions', 0, 0, 0),
(12, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Payment Gateways', 'Payment Gateways', 0, 0, 0),
(13, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Masters', 'Masters', 0, 0, 0),
(14, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Regional', 'Regional', 0, 0, 0),
(15, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Banned Ips', 'Banned Ips', 0, 0, 0),
(16, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Cities', 'Cities', 0, 0, 0),
(17, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Countries', 'Countries', 0, 0, 0),
(18, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'States', 'States', 0, 0, 0),
(19, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Email', 'Email', 0, 0, 0),
(20, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Email Templates', 'Email Templates', 0, 0, 0),
(21, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Others', 'Others', 0, 0, 0),
(22, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'IPs', 'IPs', 0, 0, 0),
(23, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Transaction Types', 'Transaction Types', 0, 0, 0),
(24, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'User Flag Categories', 'User Flag Categories', 0, 0, 0),
(25, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Site Builder', 'Site Builder', 0, 0, 0),
(26, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Cms Utilities', 'Cms Utilities', 0, 0, 0),
(27, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Adaptive Transaction Logs', 'Adaptive Transaction Logs', 0, 0, 0),
(28, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Adaptive Transaction Log', 'Adaptive Transaction Log', 0, 0, 0),
(29, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Maintenance Mode', 'Maintenance Mode', 0, 0, 0),
(30, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid request', 'Invalid request', 0, 0, 0),
(31, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Attachments', 'Attachments', 0, 0, 0),
(32, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add Attachment', 'Add Attachment', 0, 0, 0),
(33, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Attachment has been saved', 'The Attachment has been saved', 0, 0, 0),
(34, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Attachment could not be saved. Please, try again.', 'The Attachment could not be saved. Please, try again.', 0, 0, 0),
(35, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit Attachment', 'Edit Attachment', 0, 0, 0),
(36, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid Attachment', 'Invalid Attachment', 0, 0, 0),
(37, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid id for Attachment', 'Invalid id for Attachment', 0, 0, 0),
(38, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Attachment deleted', 'Attachment deleted', 0, 0, 0),
(39, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Banned IPs', 'Banned IPs', 0, 0, 0),
(40, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add Banned IP', 'Add Banned IP', 0, 0, 0),
(41, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Must be a valid URL', 'Must be a valid URL', 0, 0, 0),
(42, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Banned IP has been added', 'Banned IP has been added', 0, 0, 0),
(43, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Banned IP could not be added. Please, try again', 'Banned IP could not be added. Please, try again', 0, 0, 0),
(44, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'You cannot add your IP address. Please, try again', 'You cannot add your IP address. Please, try again', 0, 0, 0),
(45, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'You cannot add your own domain. Please, try again', 'You cannot add your own domain. Please, try again', 0, 0, 0),
(46, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Banned IP deleted', 'Banned IP deleted', 0, 0, 0),
(47, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Blocks', 'Blocks', 0, 0, 0),
(48, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add Block', 'Add Block', 0, 0, 0),
(49, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Block has been saved', 'The Block has been saved', 0, 0, 0),
(50, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Block could not be saved. Please, try again.', 'The Block could not be saved. Please, try again.', 0, 0, 0),
(51, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit Block', 'Edit Block', 0, 0, 0),
(52, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid Block', 'Invalid Block', 0, 0, 0),
(53, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Block deleted', 'Block deleted', 0, 0, 0),
(54, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Moved up successfully', 'Moved up successfully', 0, 0, 0),
(55, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Could not move up', 'Could not move up', 0, 0, 0),
(56, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Moved down successfully', 'Moved down successfully', 0, 0, 0),
(57, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Could not move down', 'Could not move down', 0, 0, 0),
(58, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'No items selected.', 'No items selected.', 0, 0, 0),
(59, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Blocks deleted.', 'Blocks deleted.', 0, 0, 0),
(60, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Blocks published', 'Blocks published', 0, 0, 0),
(61, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Blocks unpublished', 'Blocks unpublished', 0, 0, 0),
(62, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'An error occurred.', 'An error occurred.', 0, 0, 0),
(63, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Last 7 days', 'Last 7 days', 0, 0, 0),
(64, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Last 4 weeks', 'Last 4 weeks', 0, 0, 0),
(65, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Last 3 months', 'Last 3 months', 0, 0, 0),
(66, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Last 3 years', 'Last 3 years', 0, 0, 0),
(67, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Site Earned Amount', 'Site Earned Amount', 0, 0, 0),
(68, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Deposited', 'Deposited', 0, 0, 0),
(69, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Withdrawn Amount', 'Withdrawn Amount', 0, 0, 0),
(70, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Pending Withdraw Request', 'Pending Withdraw Request', 0, 0, 0),
(71, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'All', 'All', 0, 0, 0),
(72, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Contests', 'Contests', 0, 0, 0),
(73, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Normal', 'Normal', 0, 0, 0),
(74, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Twitter', 'Twitter', 0, 0, 0),
(75, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Facebook', 'Facebook', 0, 0, 0),
(76, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'OpenID', 'OpenID', 0, 0, 0),
(77, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Gmail', 'Gmail', 0, 0, 0),
(78, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Yahoo', 'Yahoo', 0, 0, 0),
(79, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Affiliate', 'Affiliate', 0, 0, 0),
(80, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Not Mentioned', 'Not Mentioned', 0, 0, 0),
(81, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, '18 - 34 Yrs', '18 - 34 Yrs', 0, 0, 0),
(82, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, '35 - 44 Yrs', '35 - 44 Yrs', 0, 0, 0),
(83, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, '45 - 54 Yrs', '45 - 54 Yrs', 0, 0, 0),
(84, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, '55+ Yrs', '55+ Yrs', 0, 0, 0),
(85, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' - Approved', ' - Approved', 0, 0, 0),
(86, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' - Unapproved', ' - Unapproved', 0, 0, 0),
(87, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' - Search - %s', ' - Search - %s', 0, 0, 0),
(88, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit City', 'Edit City', 0, 0, 0),
(89, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'City has been updated', 'City has been updated', 0, 0, 0),
(90, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'City could not be updated. Please, try again.', 'City could not be updated. Please, try again.', 0, 0, 0),
(91, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add City', 'Add City', 0, 0, 0),
(92, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' City has been added', ' City has been added', 0, 0, 0),
(93, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' City could not be added. Please, try again.', ' City could not be added. Please, try again.', 0, 0, 0),
(94, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'City deleted', 'City deleted', 0, 0, 0),
(95, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Comments', 'Comments', 0, 0, 0),
(96, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Comments: Published', 'Comments: Published', 0, 0, 0),
(97, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Comments: Approval', 'Comments: Approval', 0, 0, 0),
(98, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit Comment', 'Edit Comment', 0, 0, 0),
(99, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid Comment', 'Invalid Comment', 0, 0, 0),
(100, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Comment has been saved', 'The Comment has been saved', 0, 0, 0),
(101, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Comment could not be saved. Please, try again.', 'The Comment could not be saved. Please, try again.', 0, 0, 0),
(102, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Comment deleted', 'Comment deleted', 0, 0, 0),
(103, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Comments deleted.', 'Comments deleted.', 0, 0, 0),
(104, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Comments published', 'Comments published', 0, 0, 0),
(105, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Comments unpublished', 'Comments unpublished', 0, 0, 0),
(106, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid Node', 'Invalid Node', 0, 0, 0),
(107, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Maximum level reached. You cannot reply to that comment.', 'Maximum level reached. You cannot reply to that comment.', 0, 0, 0),
(108, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Your comment has been added successfully.', 'Your comment has been added successfully.', 0, 0, 0),
(109, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Your comment will appear after moderation.', 'Your comment will appear after moderation.', 0, 0, 0),
(110, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'New comment posted under', 'New comment posted under', 0, 0, 0),
(111, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Sorry, the comment appears to be spam.', 'Sorry, the comment appears to be spam.', 0, 0, 0),
(112, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid captcha entry', 'Invalid captcha entry', 0, 0, 0),
(113, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Thank you, we received your message and will get back to you as soon as possible.', 'Thank you, we received your message and will get back to you as soon as possible.', 0, 0, 0),
(114, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Contact Us', 'Contact Us', 0, 0, 0),
(115, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add Country', 'Add Country', 0, 0, 0),
(116, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Country has been added', 'Country has been added', 0, 0, 0),
(117, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Country could not be updated. Please, try again', 'Country could not be updated. Please, try again', 0, 0, 0),
(118, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit Country', 'Edit Country', 0, 0, 0),
(119, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Country has been updated', 'Country has been updated', 0, 0, 0),
(120, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Country could not be updated. Please, try again.', 'Country could not be updated. Please, try again.', 0, 0, 0),
(121, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Country deleted', 'Country deleted', 0, 0, 0),
(122, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Contest status updated successfully', 'Contest status updated successfully', 0, 0, 0),
(123, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit Email Template', 'Edit Email Template', 0, 0, 0),
(124, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Email Template has been updated', 'Email Template has been updated', 0, 0, 0),
(125, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Email Template could not be updated. Please, try again.', 'Email Template could not be updated. Please, try again.', 0, 0, 0),
(126, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'File Manager', 'File Manager', 0, 0, 0),
(127, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit file: %s', 'Edit file: %s', 0, 0, 0),
(128, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'File saved successfully', 'File saved successfully', 0, 0, 0),
(129, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Upload', 'Upload', 0, 0, 0),
(130, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'File uploaded successfully.', 'File uploaded successfully.', 0, 0, 0),
(131, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'File deleted', 'File deleted', 0, 0, 0),
(132, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'An error occured', 'An error occured', 0, 0, 0),
(133, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Directory deleted', 'Directory deleted', 0, 0, 0),
(134, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'New Directory', 'New Directory', 0, 0, 0),
(135, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Directory created successfully.', 'Directory created successfully.', 0, 0, 0),
(136, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'New File', 'New File', 0, 0, 0),
(137, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'File created successfully.', 'File created successfully.', 0, 0, 0),
(138, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'IP deleted', 'IP deleted', 0, 0, 0),
(139, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add Label', 'Add Label', 0, 0, 0),
(140, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' Label has been added', ' Label has been added', 0, 0, 0),
(141, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' Label could not be added. Please, try again', ' Label could not be added. Please, try again', 0, 0, 0),
(142, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Labels Users', 'Labels Users', 0, 0, 0),
(143, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add Labels User', 'Add Labels User', 0, 0, 0),
(144, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, '\\"%s\\" Labels User has been added', '\\"%s\\" Labels User has been added', 0, 0, 0),
(145, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, '\\"%s\\" Labels User could not be added. Please, try again.', '\\"%s\\" Labels User could not be added. Please, try again.', 0, 0, 0),
(146, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit Labels User', 'Edit Labels User', 0, 0, 0),
(147, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' Labels User has been updated', ' Labels User has been updated', 0, 0, 0),
(148, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' Labels User could not be updated. Please, try again.', ' Labels User could not be updated. Please, try again.', 0, 0, 0),
(149, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' Labels already exist.', ' Labels already exist.', 0, 0, 0),
(150, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Labels User deleted', 'Labels User deleted', 0, 0, 0),
(151, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Languages', 'Languages', 0, 0, 0),
(152, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' - Active ', ' - Active ', 0, 0, 0),
(153, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, ' - Inactive ', ' - Inactive ', 0, 0, 0),
(154, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add Language', 'Add Language', 0, 0, 0),
(155, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Language has been added', 'Language has been added', 0, 0, 0),
(156, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Language could not be added. Please, try again.', 'Language could not be added. Please, try again.', 0, 0, 0),
(157, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit Language', 'Edit Language', 0, 0, 0),
(158, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Language  has been updated', 'Language  has been updated', 0, 0, 0),
(159, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Language  could not be updated. Please, try again.', 'Language  could not be updated. Please, try again.', 0, 0, 0),
(160, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Links: %s', 'Links: %s', 0, 0, 0),
(161, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add Link', 'Add Link', 0, 0, 0),
(162, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Link has been saved', 'The Link has been saved', 0, 0, 0),
(163, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Link could not be saved. Please, try again.', 'The Link could not be saved. Please, try again.', 0, 0, 0),
(164, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit link', 'Edit link', 0, 0, 0),
(165, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit Link', 'Edit Link', 0, 0, 0),
(166, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid Link', 'Invalid Link', 0, 0, 0),
(167, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid id for Link', 'Invalid id for Link', 0, 0, 0),
(168, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Link deleted', 'Link deleted', 0, 0, 0),
(169, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Links deleted.', 'Links deleted.', 0, 0, 0),
(170, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Links published', 'Links published', 0, 0, 0),
(171, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Links unpublished', 'Links unpublished', 0, 0, 0),
(172, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Menus', 'Menus', 0, 0, 0),
(173, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add Menu', 'Add Menu', 0, 0, 0),
(174, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Menu has been saved', 'The Menu has been saved', 0, 0, 0),
(175, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'The Menu could not be saved. Please, try again.', 'The Menu could not be saved. Please, try again.', 0, 0, 0),
(176, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Edit Menu', 'Edit Menu', 0, 0, 0),
(177, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Invalid Menu', 'Invalid Menu', 0, 0, 0),
(178, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Menu deleted', 'Menu deleted', 0, 0, 0),
(179, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages - Inbox', 'Messages - Inbox', 0, 0, 0),
(180, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages - Sent Mail', 'Messages - Sent Mail', 0, 0, 0),
(181, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages - Drafts', 'Messages - Drafts', 0, 0, 0),
(182, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages - Spam', 'Messages - Spam', 0, 0, 0),
(183, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages - Trash', 'Messages - Trash', 0, 0, 0),
(184, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages - All', 'Messages - All', 0, 0, 0),
(185, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages - %s', 'Messages - %s', 0, 0, 0),
(186, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Message Board', 'Message Board', 0, 0, 0),
(187, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Message Board - ', 'Message Board - ', 0, 0, 0),
(188, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages - Starred', 'Messages - Starred', 0, 0, 0),
(189, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Message', 'Message', 0, 0, 0),
(190, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'All mails', 'All mails', 0, 0, 0),
(191, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Message deleted', 'Message deleted', 0, 0, 0),
(192, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Messages - Compose', 'Messages - Compose', 0, 0, 0),
(193, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Compose', 'Compose', 0, 0, 0),
(194, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Message send is temporarily stopped. Please try again later.', 'Message send is temporarily stopped. Please try again later.', 0, 0, 0),
(195, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Message has been saved successfully', 'Message has been saved successfully', 0, 0, 0),
(196, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Problem in saving message', 'Problem in saving message', 0, 0, 0),
(197, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Message has been sent successfully', 'Message has been sent successfully', 0, 0, 0),
(198, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Message saved successfully', 'Message saved successfully', 0, 0, 0),
(199, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Problem in sending message. You can send message only to your friends network', 'Problem in sending message. You can send message only to your friends network', 0, 0, 0),
(200, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Please specify coreect recipient', 'Please specify coreect recipient', 0, 0, 0),
(201, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Please specify atleast one recipient', 'Please specify atleast one recipient', 0, 0, 0),
(202, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Problem in sending message.', 'Problem in sending message.', 0, 0, 0),
(203, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Re:', 'Re:', 0, 0, 0),
(204, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Fwd:', 'Fwd:', 0, 0, 0),
(205, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Public', 'Public', 0, 0, 0),
(206, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Post to all', 'Post to all', 0, 0, 0),
(207, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Private to %s', 'Private to %s', 0, 0, 0),
(208, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Selecte a', 'Selecte a', 0, 0, 0),
(209, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Search Results', 'Search Results', 0, 0, 0),
(210, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, '---- More actions ----', '---- More actions ----', 0, 0, 0),
(211, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Mark as read', 'Mark as read', 0, 0, 0),
(212, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Mark as unread', 'Mark as unread', 0, 0, 0),
(213, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Add star', 'Add star', 0, 0, 0),
(214, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, 'Remove star', 'Remove star', 0, 0, 0),
(215, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, '----Apply label----', '----Apply label----', 0, 0, 0),
(216, '2012-04-17 02:29:47', '2012-04-17 02:29:47', 42, '----Remove label----', '----Remove label----', 0, 0, 0),
(217, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Message Settings has been updated', 'Message Settings has been updated', 0, 0, 0),
(218, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Message Settings could not be updated', 'Message Settings could not be updated', 0, 0, 0),
(219, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Suspend ', ' - Suspend ', 0, 0, 0),
(220, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Flagged ', ' - Flagged ', 0, 0, 0),
(221, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Added today', ' - Added today', 0, 0, 0),
(222, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Added in this week', ' - Added in this week', 0, 0, 0),
(223, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Added in this month', ' - Added in this month', 0, 0, 0),
(224, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Message has been flagged', 'Message has been flagged', 0, 0, 0),
(225, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Message has been Unflagged', 'Message has been Unflagged', 0, 0, 0),
(226, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Message has been suspend', 'Message has been suspend', 0, 0, 0),
(227, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Message has been unsuspend', 'Message has been unsuspend', 0, 0, 0),
(228, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked messages has been deleted', 'Checked messages has been deleted', 0, 0, 0),
(229, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked messages has been Suspended', 'Checked messages has been Suspended', 0, 0, 0),
(230, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked messages has been Unsuspended', 'Checked messages has been Unsuspended', 0, 0, 0),
(231, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked messages has been Flagged', 'Checked messages has been Flagged', 0, 0, 0),
(232, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked messages has been Unflagged', 'Checked messages has been Unflagged', 0, 0, 0),
(233, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Activities', 'Contest Activities', 0, 0, 0),
(234, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Content', 'Content', 0, 0, 0),
(235, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Create content', 'Create content', 0, 0, 0),
(236, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Content type does not exist.', 'Content type does not exist.', 0, 0, 0),
(237, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Create content: %s', 'Create content: %s', 0, 0, 0),
(238, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '%s has been saved', '%s has been saved', 0, 0, 0),
(239, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '%s could not be saved. Please, try again.', '%s could not be saved. Please, try again.', 0, 0, 0),
(240, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid content', 'Invalid content', 0, 0, 0),
(241, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Node', 'Edit Node', 0, 0, 0),
(242, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit content: %s', 'Edit content: %s', 0, 0, 0),
(243, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Paths updated.', 'Paths updated.', 0, 0, 0),
(244, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Node deleted', 'Node deleted', 0, 0, 0),
(245, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Nodes deleted.', 'Nodes deleted.', 0, 0, 0),
(246, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Nodes published', 'Nodes published', 0, 0, 0),
(247, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Nodes unpublished', 'Nodes unpublished', 0, 0, 0),
(248, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Nodes promoted', 'Nodes promoted', 0, 0, 0),
(249, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Nodes unpromoted', 'Nodes unpromoted', 0, 0, 0),
(250, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid content type.', 'Invalid content type.', 0, 0, 0),
(251, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Term.', 'Invalid Term.', 0, 0, 0),
(252, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Nodes', 'Nodes', 0, 0, 0),
(253, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Search Results: %s', 'Search Results: %s', 0, 0, 0),
(254, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Tools', 'Tools', 0, 0, 0),
(255, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Home', 'Home', 0, 0, 0),
(256, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Payment Gateway Setting', 'Add Payment Gateway Setting', 0, 0, 0),
(257, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Gateway Setting has been added', 'Payment Gateway Setting has been added', 0, 0, 0),
(258, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Gateway Setting could not be added. Please, try again.', 'Payment Gateway Setting could not be added. Please, try again.', 0, 0, 0),
(259, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Payment Gateway Setting', 'Edit Payment Gateway Setting', 0, 0, 0),
(260, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment gateway settings updated.', 'Payment gateway settings updated.', 0, 0, 0),
(261, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Gateway Setting deleted', 'Payment Gateway Setting deleted', 0, 0, 0),
(262, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Test Mode ', ' - Test Mode ', 0, 0, 0),
(263, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Live Mode ', ' - Live Mode ', 0, 0, 0),
(264, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Payment Gateway', 'Add Payment Gateway', 0, 0, 0),
(265, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Gateway has been added', 'Payment Gateway has been added', 0, 0, 0),
(266, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Gateway could not be added. Please, try again.', 'Payment Gateway could not be added. Please, try again.', 0, 0, 0),
(267, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Payment Gateway', 'Edit Payment Gateway', 0, 0, 0),
(268, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Gateway has been updated', 'Payment Gateway has been updated', 0, 0, 0),
(269, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Gateway could not be updated. Please, try again.', 'Payment Gateway could not be updated. Please, try again.', 0, 0, 0),
(270, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Gateway deleted', 'Payment Gateway deleted', 0, 0, 0),
(271, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment updated successfully.', 'Payment updated successfully.', 0, 0, 0),
(272, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked payment gateways has been changed to active', 'Checked payment gateways has been changed to active', 0, 0, 0),
(273, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked payment gateways has been changed to inactive', 'Checked payment gateways has been changed to inactive', 0, 0, 0),
(274, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked payment gateways has been changed to test mode', 'Checked payment gateways has been changed to test mode', 0, 0, 0),
(275, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked payment gateways has been changed to live mode', 'Checked payment gateways has been changed to live mode', 0, 0, 0),
(276, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked payment gateways has been deleted', 'Checked payment gateways has been deleted', 0, 0, 0),
(277, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pay Now', 'Pay Now', 0, 0, 0),
(278, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pay Membership Fee - ', 'Pay Membership Fee - ', 0, 0, 0),
(279, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your payment could not be completed.', 'Your payment could not be completed.', 0, 0, 0),
(280, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Region', 'Region', 0, 0, 0),
(281, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Region', 'Add Region', 0, 0, 0),
(282, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Region has been saved', 'The Region has been saved', 0, 0, 0),
(283, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Region could not be saved. Please, try again.', 'The Region could not be saved. Please, try again.', 0, 0, 0),
(284, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Region', 'Edit Region', 0, 0, 0),
(285, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Region', 'Invalid Region', 0, 0, 0),
(286, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Region deleted', 'Region deleted', 0, 0, 0),
(287, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Settings could not be updated. Please try again.', 'Settings could not be updated. Please try again.', 0, 0, 0),
(288, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'This is image base URL should not trailing slash', 'This is image base URL should not trailing slash', 0, 0, 0),
(289, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'This is css base URL should have trailing slash', 'This is css base URL should have trailing slash', 0, 0, 0),
(290, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'This is JS base URL should have trailing slash', 'This is JS base URL should have trailing slash', 0, 0, 0),
(291, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The file uploaded is too big, only files less than %s permitted', 'The file uploaded is too big, only files less than %s permitted', 0, 0, 0),
(292, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Watermark image is not uploaded. Please try again ', 'Watermark image is not uploaded. Please try again ', 0, 0, 0),
(293, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Settings updated successfully.', 'Settings updated successfully.', 0, 0, 0),
(294, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sorry. You Cannot Update the Settings in Demo Mode', 'Sorry. You Cannot Update the Settings in Demo Mode', 0, 0, 0),
(295, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' Settings', ' Settings', 0, 0, 0),
(296, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Update Facebook', 'Update Facebook', 0, 0, 0),
(297, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Update Twitter', 'Update Twitter', 0, 0, 0),
(298, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Facebook credentials updated', 'Facebook credentials updated', 0, 0, 0),
(299, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Facebook credentials could not be updated. Please, try again.', 'Facebook credentials could not be updated. Please, try again.', 0, 0, 0),
(300, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'PNG images crushed successfully', 'PNG images crushed successfully', 0, 0, 0),
(301, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add State', 'Add State', 0, 0, 0),
(302, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'State has been added', 'State has been added', 0, 0, 0),
(303, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'State could not be added. Please, try again.', 'State could not be added. Please, try again.', 0, 0, 0),
(304, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit State', 'Edit State', 0, 0, 0),
(305, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'State has been updated', 'State has been updated', 0, 0, 0),
(306, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'State could not be updated. Please, try again.', 'State could not be updated. Please, try again.', 0, 0, 0),
(307, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'State deleted', 'State deleted', 0, 0, 0),
(308, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Vocabulary ID.', 'Invalid Vocabulary ID.', 0, 0, 0),
(309, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Vocabulary: %s', 'Vocabulary: %s', 0, 0, 0),
(310, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '%s: Add Term', '%s: Add Term', 0, 0, 0),
(311, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Term with same slug already exists in the vocabulary.', 'Term with same slug already exists in the vocabulary.', 0, 0, 0),
(312, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Term saved successfuly.', 'Term saved successfuly.', 0, 0, 0),
(313, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Term could not be added to the vocabulary. Please try again.', 'Term could not be added to the vocabulary. Please try again.', 0, 0, 0),
(314, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Term could not be saved. Please try again.', 'Term could not be saved. Please try again.', 0, 0, 0),
(315, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '%s: Edit Term', '%s: Edit Term', 0, 0, 0),
(316, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid id for Term', 'Invalid id for Term', 0, 0, 0),
(317, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Term deleted', 'Term deleted', 0, 0, 0),
(318, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Term could not be deleted. Please, try again.', 'Term could not be deleted. Please, try again.', 0, 0, 0),
(319, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Transaction Type', 'Edit Transaction Type', 0, 0, 0),
(320, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Transaction Type has been updated', 'Transaction Type has been updated', 0, 0, 0),
(321, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Transaction Type could not be updated. Please, try again.', 'Transaction Type could not be updated. Please, try again.', 0, 0, 0),
(322, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'My Transactions', 'My Transactions', 0, 0, 0),
(323, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'From date should greater than To date. Please, try again.', 'From date should greater than To date. Please, try again.', 0, 0, 0),
(324, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Amount Earned today', ' - Amount Earned today', 0, 0, 0),
(325, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Amount Earned in this week', ' - Amount Earned in this week', 0, 0, 0),
(326, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Amount Earned in this month', ' - Amount Earned in this month', 0, 0, 0),
(327, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Today', 'Today', 0, 0, 0),
(328, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'This Week', 'This Week', 0, 0, 0),
(329, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'This Month', 'This Month', 0, 0, 0),
(330, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Custom', 'Custom', 0, 0, 0),
(331, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Transactions - Today', 'Transactions - Today', 0, 0, 0),
(332, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '- Today', '- Today', 0, 0, 0),
(333, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Transactions - This Week', 'Transactions - This Week', 0, 0, 0),
(334, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '- This Week', '- This Week', 0, 0, 0),
(335, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Transactions - This Month', 'Transactions - This Month', 0, 0, 0),
(336, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '- This Month', '- This Month', 0, 0, 0),
(337, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Transactions - Total', 'Transactions - Total', 0, 0, 0),
(338, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '- Total', '- Total', 0, 0, 0),
(339, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Transaction deleted', 'Transaction deleted', 0, 0, 0),
(340, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Type', 'Type', 0, 0, 0),
(341, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Type', 'Add Type', 0, 0, 0),
(342, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Type has been saved', 'The Type has been saved', 0, 0, 0),
(343, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Type could not be saved. Please, try again.', 'The Type could not be saved. Please, try again.', 0, 0, 0),
(344, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Type', 'Edit Type', 0, 0, 0),
(345, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Type', 'Invalid Type', 0, 0, 0),
(346, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Type deleted', 'Type deleted', 0, 0, 0),
(347, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Add Wallet Amounts', 'User Add Wallet Amounts', 0, 0, 0),
(348, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User has been added as favorite', 'User has been added as favorite', 0, 0, 0),
(349, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User could not be added as favorite. Please, try again', 'User could not be added as favorite. Please, try again', 0, 0, 0),
(350, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have already added this user as favorite', 'You have already added this user as favorite', 0, 0, 0),
(351, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Favorite deleted', 'User Favorite deleted', 0, 0, 0),
(352, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - User - %s', ' - User - %s', 0, 0, 0),
(353, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add User Flag Category', 'Add User Flag Category', 0, 0, 0),
(354, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Flag Category has been added', 'User Flag Category has been added', 0, 0, 0),
(355, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Flag Category could not be added. Please, try again.', 'User Flag Category could not be added. Please, try again.', 0, 0, 0),
(356, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit User Flag Category', 'Edit User Flag Category', 0, 0, 0),
(357, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Flag Category has been updated', 'User Flag Category has been updated', 0, 0, 0),
(358, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Flag Category could not be updated. Please, try again.', 'User Flag Category could not be updated. Please, try again.', 0, 0, 0),
(359, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Flag Category deleted', 'User Flag Category deleted', 0, 0, 0),
(360, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Flag has been added', 'User Flag has been added', 0, 0, 0),
(361, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Flag could not be added. Please, try again.', 'User Flag could not be added. Please, try again.', 0, 0, 0),
(362, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have already reported this user.', 'You have already reported this user.', 0, 0, 0),
(363, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Flags', 'User Flags', 0, 0, 0),
(364, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Category - %s', ' - Category - %s', 0, 0, 0),
(365, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Flag has been deleted', 'User Flag has been deleted', 0, 0, 0),
(366, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - today', ' - today', 0, 0, 0),
(367, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '- in this week', '- in this week', 0, 0, 0),
(368, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - in this month', ' - in this month', 0, 0, 0),
(369, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Login through OpenID ', ' - Login through OpenID ', 0, 0, 0),
(370, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Login through Twitter ', ' - Login through Twitter ', 0, 0, 0),
(371, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Login through Facebook ', ' - Login through Facebook ', 0, 0, 0),
(372, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Login through Gmail ', ' - Login through Gmail ', 0, 0, 0),
(373, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Login through Yahoo ', ' - Login through Yahoo ', 0, 0, 0),
(374, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Normal Users ', ' - Normal Users ', 0, 0, 0),
(375, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Login deleted', 'User Login deleted', 0, 0, 0),
(376, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Notification Settings', 'Notification Settings', 0, 0, 0),
(377, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Notification settings has been updated', 'Notification settings has been updated', 0, 0, 0),
(378, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Notification settings could not be updated. Please, try again.', 'Notification settings could not be updated. Please, try again.', 0, 0, 0),
(379, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Openids', 'User Openids', 0, 0, 0),
(380, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add New Openid', 'Add New Openid', 0, 0, 0),
(381, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Authenticated failed or you may not have profile in your OpenID account', 'Authenticated failed or you may not have profile in your OpenID account', 0, 0, 0),
(382, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Openid has been added', 'User Openid has been added', 0, 0, 0),
(383, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Openid could not be added. Please, try again.', 'User Openid could not be added. Please, try again.', 0, 0, 0),
(384, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid OpenID', 'Invalid OpenID', 0, 0, 0),
(385, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Openid deleted', 'User Openid deleted', 0, 0, 0),
(386, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sorry, you registered through OpenID account. So you should have atleast one OpenID account for login', 'Sorry, you registered through OpenID account. So you should have atleast one OpenID account for login', 0, 0, 0),
(387, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Profile', 'Edit Profile', 0, 0, 0),
(388, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Enter PayPal verification email and name associated with your PayPal', 'Enter PayPal verification email and name associated with your PayPal', 0, 0, 0),
(389, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Profile has been updated', 'User Profile has been updated', 0, 0, 0),
(390, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Profile could not be updated. Please, try again.', 'User Profile could not be updated. Please, try again.', 0, 0, 0),
(391, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User View deleted', 'User View deleted', 0, 0, 0),
(392, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have reached maximum limit for failed login attempts. Please try again after a few minutes.', 'You have reached maximum limit for failed login attempts. Please try again after a few minutes.', 0, 0, 0),
(393, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Registered through OpenID ', ' - Registered through OpenID ', 0, 0, 0),
(394, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Registered through Facebook ', ' - Registered through Facebook ', 0, 0, 0),
(395, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Registered through Twitter ', ' - Registered through Twitter ', 0, 0, 0),
(396, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Registered through Gmail ', ' - Registered through Gmail ', 0, 0, 0),
(397, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Registered through Yahoo ', ' - Registered through Yahoo ', 0, 0, 0),
(398, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid User', 'Invalid User', 0, 0, 0),
(399, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The User has been saved', 'The User has been saved', 0, 0, 0),
(400, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The User could not be saved. Please, try again.', 'The User could not be saved. Please, try again.', 0, 0, 0),
(401, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Password has been reset.', 'Password has been reset.', 0, 0, 0),
(402, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Password could not be reset. Please, try again.', 'Password could not be reset. Please, try again.', 0, 0, 0),
(403, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Current password did not match. Please, try again.', 'Current password did not match. Please, try again.', 0, 0, 0),
(404, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Top', 'Top', 0, 0, 0),
(405, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Account activated successfully.', 'Account activated successfully.', 0, 0, 0),
(406, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Reset Password', 'Reset Password', 0, 0, 0),
(407, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your password has been changed successfully, Please login now', 'Your password has been changed successfully, Please login now', 0, 0, 0),
(408, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid change password request', 'Invalid change password request', 0, 0, 0),
(409, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User cannot be found in server or admin deactivated your account, please register again', 'User cannot be found in server or admin deactivated your account, please register again', 0, 0, 0),
(410, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Registration', 'User Registration', 0, 0, 0),
(411, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your registration process is not completed. Please, try again.', 'Your registration process is not completed. Please, try again.', 0, 0, 0),
(412, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have successfully registered with our site.', 'You have successfully registered with our site.', 0, 0, 0),
(413, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' You have successfully registered with our site after paying only login to site.', ' You have successfully registered with our site after paying only login to site.', 0, 0, 0),
(414, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have successfully registered with our site and your activation mail has been sent to your mail inbox.', 'You have successfully registered with our site and your activation mail has been sent to your mail inbox.', 0, 0, 0),
(415, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'OpenID verification is completed successfully. But you have to fill the following required fields to complete our registration process.', 'OpenID verification is completed successfully. But you have to fill the following required fields to complete our registration process.', 0, 0, 0),
(416, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Activate your account', 'Activate your account', 0, 0, 0);
INSERT INTO `translations` (`id`, `created`, `modified`, `language_id`, `key`, `lang_text`, `is_translated`, `is_google_translate`, `is_verified`) VALUES
(417, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid activation request, please register again', 'Invalid activation request, please register again', 0, 0, 0),
(418, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid activation request', 'Invalid activation request', 0, 0, 0),
(419, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have successfully activated your account. But you can login after pay the membership fee.', 'You have successfully activated your account. But you can login after pay the membership fee.', 0, 0, 0),
(420, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have successfully activated your account. But you can login after admin activate your account.', 'You have successfully activated your account. But you can login after admin activate your account.', 0, 0, 0),
(421, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have successfully activated and logged in to your account.', 'You have successfully activated and logged in to your account.', 0, 0, 0),
(422, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have successfully activated your account. Now you can login with your %s.', 'You have successfully activated your account. Now you can login with your %s.', 0, 0, 0),
(423, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Activation mail has been resent.', 'Activation mail has been resent.', 0, 0, 0),
(424, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'A Mail for activating your account has been sent.', 'A Mail for activating your account has been sent.', 0, 0, 0),
(425, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Try some time later as mail could not be dispatched due to some error in the server', 'Try some time later as mail could not be dispatched due to some error in the server', 0, 0, 0),
(426, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Facebook Connection. Please try again', 'Invalid Facebook Connection. Please try again', 0, 0, 0),
(427, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Problem in Facebook connect. Please try again', 'Problem in Facebook connect. Please try again', 0, 0, 0),
(428, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sorry, login failed.  Your account has been blocked', 'Sorry, login failed.  Your account has been blocked', 0, 0, 0),
(429, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' You have successfully registered with our site after paying membership fee only you can login to site.', ' You have successfully registered with our site after paying membership fee only you can login to site.', 0, 0, 0),
(430, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your twitter credentials are updated', 'Your twitter credentials are updated', 0, 0, 0),
(431, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Forgot Password', 'Forgot Password', 0, 0, 0),
(432, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'An email has been sent with a link where you can change your password', 'An email has been sent with a link where you can change your password', 0, 0, 0),
(433, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'There is no user registered with the email %s or admin deactivated your account. If you spelled the address incorrectly or entered the wrong address, please try again.', 'There is no user registered with the email %s or admin deactivated your account. If you spelled the address incorrectly or entered the wrong address, please try again.', 0, 0, 0),
(434, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Change Password', 'Change Password', 0, 0, 0),
(435, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your password has been changed successfully. Please login now', 'Your password has been changed successfully. Please login now', 0, 0, 0),
(436, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your password has been changed successfully', 'Your password has been changed successfully', 0, 0, 0),
(437, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Password could not be changed', 'Password could not be changed', 0, 0, 0),
(438, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Login', 'Login', 0, 0, 0),
(439, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sorry, login failed. Your ', 'Sorry, login failed. Your ', 0, 0, 0),
(440, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' or password are incorrect', ' or password are incorrect', 0, 0, 0),
(441, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sorry, login failed.  Your %s or password are incorrect', 'Sorry, login failed.  Your %s or password are incorrect', 0, 0, 0),
(442, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Required', 'Required', 0, 0, 0),
(443, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid OpenID entered. Please enter valid OpenID', 'Invalid OpenID entered. Please enter valid OpenID', 0, 0, 0),
(444, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You are now logged out of the site.', 'You are now logged out of the site.', 0, 0, 0),
(445, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid User.', 'Invalid User.', 0, 0, 0),
(446, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Email to users', 'Email to users', 0, 0, 0),
(447, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Email sent successfully', 'Email sent successfully', 0, 0, 0),
(448, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Email sent successfully. Some emails are not sent', 'Email sent successfully. Some emails are not sent', 0, 0, 0),
(449, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No email send', 'No email send', 0, 0, 0),
(450, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add New User/Admin', 'Add New User/Admin', 0, 0, 0),
(451, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User has been added', 'User has been added', 0, 0, 0),
(452, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User could not be added. Please, try again.', 'User could not be added. Please, try again.', 0, 0, 0),
(453, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User has neen deleted', 'User has neen deleted', 0, 0, 0),
(454, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Diagnostics', 'Diagnostics', 0, 0, 0),
(455, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Vocabularies', 'Vocabularies', 0, 0, 0),
(456, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Vocabulary', 'Add Vocabulary', 0, 0, 0),
(457, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Vocabulary has been saved', 'The Vocabulary has been saved', 0, 0, 0),
(458, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Vocabulary could not be saved. Please, try again.', 'The Vocabulary could not be saved. Please, try again.', 0, 0, 0),
(459, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Vocabulary', 'Edit Vocabulary', 0, 0, 0),
(460, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Vocabulary', 'Invalid Vocabulary', 0, 0, 0),
(461, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Vocabulary deleted', 'Vocabulary deleted', 0, 0, 0),
(462, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Accept', 'Accept', 0, 0, 0),
(463, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Reject', 'Reject', 0, 0, 0),
(464, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Cancel', 'Cancel', 0, 0, 0),
(465, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'has added this message', 'has added this message', 0, 0, 0),
(466, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Enter number higher than 0', 'Enter number higher than 0', 0, 0, 0),
(467, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You cannot add your own domain in redirect URL', 'You cannot add your own domain in redirect URL', 0, 0, 0),
(468, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Must be a valid URL, starting with http://', 'Must be a valid URL, starting with http://', 0, 0, 0),
(469, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Single IP or hostname', 'Single IP or hostname', 0, 0, 0),
(470, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'IP Range', 'IP Range', 0, 0, 0),
(471, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Referer block', 'Referer block', 0, 0, 0),
(472, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Permanent', 'Permanent', 0, 0, 0),
(473, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Day(s)', 'Day(s)', 0, 0, 0),
(474, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Week(s)', 'Week(s)', 0, 0, 0),
(475, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Delete', 'Delete', 0, 0, 0),
(476, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Publish', 'Publish', 0, 0, 0),
(477, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Unpublish', 'Unpublish', 0, 0, 0),
(478, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Unapproved', 'Unapproved', 0, 0, 0),
(479, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Approved', 'Approved', 0, 0, 0),
(480, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Must be a valid email', 'Must be a valid email', 0, 0, 0),
(481, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Please enter valid captcha', 'Please enter valid captcha', 0, 0, 0),
(482, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Give numeric format', 'Give numeric format', 0, 0, 0),
(483, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Labels already exist.', 'Labels already exist.', 0, 0, 0),
(484, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Inactive', 'Inactive', 0, 0, 0),
(485, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Active', 'Active', 0, 0, 0),
(486, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Enter subject', 'Enter subject', 0, 0, 0),
(487, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Enter message', 'Enter message', 0, 0, 0),
(488, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Suspend', 'Suspend', 0, 0, 0),
(489, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Unsuspend', 'Unsuspend', 0, 0, 0),
(490, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Flag', 'Flag', 0, 0, 0),
(491, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Clear flag', 'Clear flag', 0, 0, 0),
(492, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Create Label', 'Create Label', 0, 0, 0),
(493, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Test Mode', 'Test Mode', 0, 0, 0),
(494, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Live Mode', 'Live Mode', 0, 0, 0),
(495, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Auto Approved', 'Auto Approved', 0, 0, 0),
(496, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Non Auto Approved', 'Non Auto Approved', 0, 0, 0),
(497, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Should be greater than 0', 'Should be greater than 0', 0, 0, 0),
(498, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Required valid amount', 'Required valid amount', 0, 0, 0),
(499, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Must be between of 3 to 30 characters', 'Must be between of 3 to 30 characters', 0, 0, 0),
(500, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Must be a valid character', 'Must be a valid character', 0, 0, 0),
(501, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Username is already exist', 'Username is already exist', 0, 0, 0),
(502, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Must be start with an alphabets', 'Must be start with an alphabets', 0, 0, 0),
(503, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Email address is already exist', 'Email address is already exist', 0, 0, 0),
(504, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Must be at least 6 characters', 'Must be at least 6 characters', 0, 0, 0),
(505, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your old password is incorrect, please try again', 'Your old password is incorrect, please try again', 0, 0, 0),
(506, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'New and confirm password field must match, please try again', 'New and confirm password field must match, please try again', 0, 0, 0),
(507, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You must agree to the terms and conditions', 'You must agree to the terms and conditions', 0, 0, 0),
(508, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Export', 'Export', 0, 0, 0),
(509, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'All Users', 'All Users', 0, 0, 0),
(510, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Inactive Users', 'Inactive Users', 0, 0, 0),
(511, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Active Users', 'Active Users', 0, 0, 0),
(512, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Male Users', 'Male Users', 0, 0, 0),
(513, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Female Users', 'Female Users', 0, 0, 0),
(514, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Facebook Users', 'Facebook Users', 0, 0, 0),
(515, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Gmail Users', 'Gmail Users', 0, 0, 0),
(516, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'TwitterUsers', 'TwitterUsers', 0, 0, 0),
(517, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Yahoo Users', 'Yahoo Users', 0, 0, 0),
(518, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'OpenID Users', 'OpenID Users', 0, 0, 0),
(519, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Given amount should lies from  %s%s to %s%s', 'Given amount should lies from  %s%s to %s%s', 0, 0, 0),
(520, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Amount should be greater than minimum amount', 'Amount should be greater than minimum amount', 0, 0, 0),
(521, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Amount should be Numeric', 'Amount should be Numeric', 0, 0, 0),
(522, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'OpenID already exist', 'OpenID already exist', 0, 0, 0),
(523, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Enter valid OpenID', 'Enter valid OpenID', 0, 0, 0),
(524, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Must be a valid date', 'Must be a valid date', 0, 0, 0),
(525, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ACL Actions', 'ACL Actions', 0, 0, 0),
(526, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ACL Action', 'ACL Action', 0, 0, 0),
(527, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add ACL Action', 'Add ACL Action', 0, 0, 0),
(528, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Acl Action has been added', 'Acl Action has been added', 0, 0, 0),
(529, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Acl Action could not be added. Please, try again.', 'Acl Action could not be added. Please, try again.', 0, 0, 0),
(530, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Acl Action already available.', 'Acl Action already available.', 0, 0, 0),
(531, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit ACL Action', 'Edit ACL Action', 0, 0, 0),
(532, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Request', 'Invalid Request', 0, 0, 0),
(533, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ACL Action has been updated', 'ACL Action has been updated', 0, 0, 0),
(534, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ACL Action could not be updated. Please, try again.', 'ACL Action could not be updated. Please, try again.', 0, 0, 0),
(535, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ACL Action deleted', 'ACL Action deleted', 0, 0, 0),
(536, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ACL Actions generated successfully', 'ACL Actions generated successfully', 0, 0, 0),
(537, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ACL Actions already generated.', 'ACL Actions already generated.', 0, 0, 0),
(538, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Roles', 'Roles', 0, 0, 0),
(539, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Role', 'Add Role', 0, 0, 0),
(540, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' | %s', ' | %s', 0, 0, 0),
(541, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Role has been added', 'Role has been added', 0, 0, 0),
(542, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Role could not be added. Please, try again.', 'Role could not be added. Please, try again.', 0, 0, 0),
(543, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Role', 'Edit Role', 0, 0, 0),
(544, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Type has been updated', 'User Type has been updated', 0, 0, 0),
(545, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Type could not be updated. Please, try again.', 'User Type could not be updated. Please, try again.', 0, 0, 0),
(546, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User Type deleted', 'User Type deleted', 0, 0, 0),
(547, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Permission', 'Edit Permission', 0, 0, 0),
(548, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Permission has been set successfully', 'Permission has been set successfully', 0, 0, 0),
(549, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You are not authorized to view this page', 'You are not authorized to view this page', 0, 0, 0),
(550, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Authorisation Required', 'Authorisation Required', 0, 0, 0),
(551, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Role is already exist', 'Role is already exist', 0, 0, 0),
(552, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add', 'Add', 0, 0, 0),
(553, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Update', 'Update', 0, 0, 0),
(554, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add New Acl Link', 'Add New Acl Link', 0, 0, 0),
(555, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Generate Actions', 'Generate Actions', 0, 0, 0),
(556, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'It will generate actions from file structure', 'It will generate actions from file structure', 0, 0, 0),
(557, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Actions', 'Actions', 0, 0, 0),
(558, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Action', 'Action', 0, 0, 0),
(559, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit', 'Edit', 0, 0, 0),
(560, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Acl Links available', 'No Acl Links available', 0, 0, 0),
(561, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Delete Role', 'Delete Role', 0, 0, 0),
(562, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Move Role', 'Move Role', 0, 0, 0),
(563, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Roles Available', 'No Roles Available', 0, 0, 0),
(564, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Alias', 'Alias', 0, 0, 0),
(565, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'None', 'None', 0, 0, 0),
(566, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Owner', 'Owner', 0, 0, 0),
(567, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Group', 'Group', 0, 0, 0),
(568, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Templates', 'Contest Templates', 0, 0, 0),
(569, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flags', 'Contest Flags', 0, 0, 0),
(570, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entries', 'Entries', 0, 0, 0),
(571, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Ratings', 'Entry Ratings', 0, 0, 0),
(572, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flags', 'Entry Flags', 0, 0, 0),
(573, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Downloads', 'Entry Downloads', 0, 0, 0),
(574, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Statuses', 'Contest Statuses', 0, 0, 0),
(575, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flag Categories', 'Contest Flag Categories', 0, 0, 0),
(576, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flag Categories', 'Entry Flag Categories', 0, 0, 0),
(577, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Prize Packages', 'Prize Packages', 0, 0, 0),
(578, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Days', 'Contest Days', 0, 0, 0),
(579, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Resources', 'Resources', 0, 0, 0),
(580, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Validation Rules', 'Validation Rules', 0, 0, 0),
(581, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Comments', 'Contest Comments', 0, 0, 0),
(582, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Comment', 'Contest Comment', 0, 0, 0),
(583, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid contest comment', 'Invalid contest comment', 0, 0, 0),
(584, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Contest Comment', 'Add Contest Comment', 0, 0, 0),
(585, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest comment has been added', 'Contest comment has been added', 0, 0, 0),
(586, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest comment could not be added. Please, try again.', 'Contest comment could not be added. Please, try again.', 0, 0, 0),
(587, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest comment deleted', 'Contest comment deleted', 0, 0, 0),
(588, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest comment was not deleted', 'Contest comment was not deleted', 0, 0, 0),
(589, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest comment has been added', 'contest comment has been added', 0, 0, 0),
(590, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest comment could not be added. Please, try again.', 'contest comment could not be added. Please, try again.', 0, 0, 0),
(591, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Contest Comment', 'Edit Contest Comment', 0, 0, 0),
(592, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest comment has been updated', 'contest comment has been updated', 0, 0, 0),
(593, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest comment could not be updated. Please, try again.', 'contest comment could not be updated. Please, try again.', 0, 0, 0),
(594, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Contest Flag Category', 'Add Contest Flag Category', 0, 0, 0),
(595, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flag Category has been added', 'Contest Flag Category has been added', 0, 0, 0),
(596, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flag Category could not be added. Please, try again.', 'Contest Flag Category could not be added. Please, try again.', 0, 0, 0),
(597, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Contest Flag Category', 'Edit Contest Flag Category', 0, 0, 0),
(598, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flag Category has been updated', 'Contest Flag Category has been updated', 0, 0, 0),
(599, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flag Category could not be updated. Please, try again.', 'Contest Flag Category could not be updated. Please, try again.', 0, 0, 0),
(600, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flag Category deleted', 'Contest Flag Category deleted', 0, 0, 0),
(601, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flag has been added', 'Contest Flag has been added', 0, 0, 0),
(602, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flag could not be added. Please, try again.', 'Contest Flag could not be added. Please, try again.', 0, 0, 0),
(603, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have already reported this contest.', 'You have already reported this contest.', 0, 0, 0),
(604, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Contest - %s', ' - Contest - %s', 0, 0, 0),
(605, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Flag has been deleted', 'Contest Flag has been deleted', 0, 0, 0),
(606, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest has already added to your watch list', 'Contest has already added to your watch list', 0, 0, 0),
(607, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest has added to your watchlist', 'Contest has added to your watchlist', 0, 0, 0),
(608, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest follower has been removed.', 'Contest follower has been removed.', 0, 0, 0),
(609, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest has removed from your watchlist.', 'Contest has removed from your watchlist.', 0, 0, 0),
(610, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Followers', 'Contest Followers', 0, 0, 0),
(611, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Follows', 'Contest Follows', 0, 0, 0),
(612, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Contest Status', 'Edit Contest Status', 0, 0, 0),
(613, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Status has been updated', 'Contest Status has been updated', 0, 0, 0),
(614, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Status could not be updated. Please, try again.', 'Contest Status could not be updated. Please, try again.', 0, 0, 0),
(615, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Form Fields', 'Edit Form Fields', 0, 0, 0),
(616, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Contest Type id. Please, try again.', 'Invalid Contest Type id. Please, try again.', 0, 0, 0),
(617, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Contest Template has been saved', 'The Contest Template has been saved', 0, 0, 0),
(618, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest form fields has been saved', 'Contest form fields has been saved', 0, 0, 0),
(619, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Template could not be saved. Please, try again.', 'Contest Template could not be saved. Please, try again.', 0, 0, 0),
(620, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Type could not be saved. Please, try again.', 'Contest Type could not be saved. Please, try again.', 0, 0, 0),
(621, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Form and Pricing', 'Contest Form and Pricing', 0, 0, 0),
(622, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Contest Template has been created', 'The Contest Template has been created', 0, 0, 0),
(623, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Contest Type has been created', 'The Contest Type has been created', 0, 0, 0),
(624, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Contest Template could not be created. Please, try again.', 'The Contest Template could not be created. Please, try again.', 0, 0, 0),
(625, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Contest Type could not be created. Please, try again.', 'The Contest Type could not be created. Please, try again.', 0, 0, 0),
(626, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add New Contest Template', 'Add New Contest Template', 0, 0, 0),
(627, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add New Contest Type', 'Add New Contest Type', 0, 0, 0),
(628, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Contest Type has been deleted', 'The Contest Type has been deleted', 0, 0, 0),
(629, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Type - Pricing', 'Contest Type - Pricing', 0, 0, 0),
(630, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Contest type pricing has been updated', 'The Contest type pricing has been updated', 0, 0, 0),
(631, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Type - Pricing Organize', 'Contest Type - Pricing Organize', 0, 0, 0),
(632, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - In process ', ' - In process ', 0, 0, 0),
(633, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Closed', ' - Closed', 0, 0, 0),
(634, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Types PricingPackages', 'Contest Types PricingPackages', 0, 0, 0),
(635, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Types Pricing Package', 'Contest Types Pricing Package', 0, 0, 0),
(636, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid contest types pricing package', 'Invalid contest types pricing package', 0, 0, 0),
(637, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Contest Types Pricing Package', 'Add Contest Types Pricing Package', 0, 0, 0),
(638, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest types pricing package has been added', 'contest types pricing package has been added', 0, 0, 0),
(639, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest types pricing package could not be added. Please, try again.', 'contest types pricing package could not be added. Please, try again.', 0, 0, 0),
(640, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Contest Types Pricing Package', 'Edit Contest Types Pricing Package', 0, 0, 0),
(641, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest types pricing package has been updated', 'contest types pricing package has been updated', 0, 0, 0),
(642, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest types pricing package could not be updated. Please, try again.', 'contest types pricing package could not be updated. Please, try again.', 0, 0, 0),
(643, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contestTypesPricingPackages', 'contestTypesPricingPackages', 0, 0, 0),
(644, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest types pricing package deleted', 'Contest types pricing package deleted', 0, 0, 0),
(645, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Types PricingRequirements', 'Contest Types PricingRequirements', 0, 0, 0),
(646, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Types Pricing Requirement', 'Contest Types Pricing Requirement', 0, 0, 0),
(647, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid contest types pricing requirement', 'Invalid contest types pricing requirement', 0, 0, 0),
(648, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Contest Types Pricing Requirement', 'Add Contest Types Pricing Requirement', 0, 0, 0),
(649, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest types pricing requirement has been added', 'contest types pricing requirement has been added', 0, 0, 0),
(650, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest types pricing requirement could not be added. Please, try again.', 'contest types pricing requirement could not be added. Please, try again.', 0, 0, 0),
(651, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contestTypesPricingRequirements', 'contestTypesPricingRequirements', 0, 0, 0),
(652, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Contest Types Pricing Requirement', 'Edit Contest Types Pricing Requirement', 0, 0, 0),
(653, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest types pricing requirement has been updated', 'contest types pricing requirement has been updated', 0, 0, 0),
(654, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contest types pricing requirement could not be updated. Please, try again.', 'contest types pricing requirement could not be updated. Please, try again.', 0, 0, 0),
(655, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest types pricing requirement deleted', 'Contest types pricing requirement deleted', 0, 0, 0),
(656, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry download deleted', 'Entry download deleted', 0, 0, 0),
(657, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Entry Flag Category', 'Add Entry Flag Category', 0, 0, 0),
(658, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flag Category has been added', 'Entry Flag Category has been added', 0, 0, 0),
(659, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flag Category could not be added. Please, try again.', 'Entry Flag Category could not be added. Please, try again.', 0, 0, 0),
(660, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Entry Flag Category', 'Edit Entry Flag Category', 0, 0, 0),
(661, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flag Category has been updated', 'Entry Flag Category has been updated', 0, 0, 0),
(662, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flag Category could not be updated. Please, try again.', 'Entry Flag Category could not be updated. Please, try again.', 0, 0, 0),
(663, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flag Category deleted', 'Entry Flag Category deleted', 0, 0, 0),
(664, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flag has been added', 'Entry Flag has been added', 0, 0, 0),
(665, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flag could not be added. Please, try again.', 'Entry Flag could not be added. Please, try again.', 0, 0, 0),
(666, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have already reported this entry.', 'You have already reported this entry.', 0, 0, 0),
(667, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You could not flag your own entry.', 'You could not flag your own entry.', 0, 0, 0),
(668, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - ContestUser - %s', ' - ContestUser - %s', 0, 0, 0),
(669, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ContestUser Flag has been deleted', 'ContestUser Flag has been deleted', 0, 0, 0),
(670, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Rating has been added', 'Rating has been added', 0, 0, 0),
(671, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Rating could not be added. Please, try again', 'Rating could not be added. Please, try again', 0, 0, 0),
(672, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have already rated this contestUser', 'You have already rated this contestUser', 0, 0, 0),
(673, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest User Ratings', 'Contest User Ratings', 0, 0, 0),
(674, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid contest user rating', 'Invalid contest user rating', 0, 0, 0),
(675, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest user rating deleted', 'Contest user rating deleted', 0, 0, 0),
(676, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest user rating was not deleted', 'Contest user rating was not deleted', 0, 0, 0),
(677, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest User Views', 'Contest User Views', 0, 0, 0),
(678, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest View deleted', 'Contest View deleted', 0, 0, 0),
(679, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Contest', 'Invalid Contest', 0, 0, 0),
(680, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Showing Only Unrated', 'Showing Only Unrated', 0, 0, 0),
(681, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Showing Only Rated', 'Showing Only Rated', 0, 0, 0),
(682, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sorted By Highest Rated', 'Sorted By Highest Rated', 0, 0, 0),
(683, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sorted By Recently Added', 'Sorted By Recently Added', 0, 0, 0),
(684, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'My %s', 'My %s', 0, 0, 0),
(685, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'My Entries & Won Contests', 'My Entries & Won Contests', 0, 0, 0),
(686, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Participated Contests', 'Participated Contests', 0, 0, 0),
(687, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Withdrawn ', ' - Withdrawn ', 0, 0, 0),
(688, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Eliminated ', ' - Eliminated ', 0, 0, 0),
(689, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Won', ' - Won', 0, 0, 0),
(690, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Lost', ' - Lost', 0, 0, 0),
(691, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Change Request', ' - Change Request', 0, 0, 0),
(692, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Change Completed', ' - Change Completed', 0, 0, 0),
(693, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Completed', ' - Completed', 0, 0, 0),
(694, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Close', ' - Close', 0, 0, 0),
(695, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Entry', ' - Entry', 0, 0, 0),
(696, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Development', ' - Development', 0, 0, 0),
(697, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest User', 'Contest User', 0, 0, 0),
(698, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Its too late!!! This contest has reached its maximum allowed entry :(', 'Its too late!!! This contest has reached its maximum allowed entry :(', 0, 0, 0),
(699, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Contest Entry', 'Add Contest Entry', 0, 0, 0),
(700, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry could not be added. Please, try again.', 'Entry could not be added. Please, try again.', 0, 0, 0),
(701, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry has been added', 'Entry has been added', 0, 0, 0),
(702, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You''ve succesfully sent a message to', 'You''ve succesfully sent a message to', 0, 0, 0),
(703, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your contest entry has added succesfully', 'Your contest entry has added succesfully', 0, 0, 0),
(704, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Requested process done.', 'Requested process done.', 0, 0, 0),
(705, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Problem in accepting the Request. Try again later!', 'Problem in accepting the Request. Try again later!', 0, 0, 0),
(706, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You''ve succesfully accepted request.', 'You''ve succesfully accepted request.', 0, 0, 0),
(707, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Entries', 'Contest Entries', 0, 0, 0),
(708, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Entries - Today', 'Contest Entries - Today', 0, 0, 0),
(709, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Entries - This Week', 'Contest Entries - This Week', 0, 0, 0),
(710, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Entries - This Month', 'Contest Entries - This Month', 0, 0, 0),
(711, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Entries - Total', 'Contest Entries - Total', 0, 0, 0),
(712, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid contest user', 'Invalid contest user', 0, 0, 0),
(713, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest user deleted', 'Contest user deleted', 0, 0, 0),
(714, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest user was not deleted', 'Contest user was not deleted', 0, 0, 0),
(715, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked contest entries has been actived', 'Checked contest entries has been actived', 0, 0, 0),
(716, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked entries has been eliminated', 'Checked entries has been eliminated', 0, 0, 0),
(717, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked entries has been withdrawn', 'Checked entries has been withdrawn', 0, 0, 0),
(718, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked entries has been deleted', 'Checked entries has been deleted', 0, 0, 0),
(719, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Views', 'Contest Views', 0, 0, 0),
(720, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Browse Contests', 'Browse Contests', 0, 0, 0),
(721, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests ', 'Contests ', 0, 0, 0),
(722, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'My Contests', 'My Contests', 0, 0, 0),
(723, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Featured Contests', 'Featured Contests', 0, 0, 0),
(724, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Open ', ' - Open ', 0, 0, 0),
(725, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - All', ' - All', 0, 0, 0),
(726, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Payment Pending ', ' - Payment Pending ', 0, 0, 0),
(727, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Pending Approval ', ' - Pending Approval ', 0, 0, 0),
(728, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Rejected', ' - Rejected', 0, 0, 0),
(729, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Canceled ', ' - Canceled ', 0, 0, 0),
(730, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Canceled By Admin ', ' - Canceled By Admin ', 0, 0, 0),
(731, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Judging ', ' - Judging ', 0, 0, 0),
(732, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Winner Selected', ' - Winner Selected', 0, 0, 0),
(733, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Winner Selected By Admin ', ' - Winner Selected By Admin ', 0, 0, 0),
(734, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Change Requested ', ' - Change Requested ', 0, 0, 0),
(735, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Change Completed ', ' - Change Completed ', 0, 0, 0),
(736, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Paid To %s', ' - Paid To %s', 0, 0, 0),
(737, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - Expired', ' - Expired', 0, 0, 0),
(738, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' - development', ' - development', 0, 0, 0),
(739, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Created Contests', 'Created Contests', 0, 0, 0),
(740, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest', 'Contest', 0, 0, 0),
(741, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid contest', 'Invalid contest', 0, 0, 0),
(742, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Contest', 'Add Contest', 0, 0, 0),
(743, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Preview Form Fields', 'Preview Form Fields', 0, 0, 0),
(744, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest has been added successfully. It will be list out after paying contest fee and admin approval.', 'Contest has been added successfully. It will be list out after paying contest fee and admin approval.', 0, 0, 0),
(745, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest could not be added. Please, try again.', 'Contest could not be added. Please, try again.', 0, 0, 0),
(746, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Packages', 'Packages', 0, 0, 0),
(747, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest prize should not be less than ', 'Contest prize should not be less than ', 0, 0, 0),
(748, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your wallet has insufficient money to add this contest', 'Your wallet has insufficient money to add this contest', 0, 0, 0),
(749, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Thank you! Your payment was successful.', 'Thank you! Your payment was successful.', 0, 0, 0),
(750, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest could not be updated. Please, try again.', 'Contest could not be updated. Please, try again.', 0, 0, 0),
(751, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Contest', 'Edit Contest', 0, 0, 0),
(752, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest has been updated', 'Contest has been updated', 0, 0, 0),
(753, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest deleted', 'Contest deleted', 0, 0, 0),
(754, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest was not deleted', 'Contest was not deleted', 0, 0, 0),
(755, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests - Today', 'Contests - Today', 0, 0, 0),
(756, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests - This Week', 'Contests - This Week', 0, 0, 0),
(757, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests - This Month', 'Contests - This Month', 0, 0, 0),
(758, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests - Total', 'Contests - Total', 0, 0, 0),
(759, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Winner has been selected for the selected contest', 'Winner has been selected for the selected contest', 0, 0, 0),
(760, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked contest has been opened', 'Checked contest has been opened', 0, 0, 0),
(761, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked contest has been reject', 'Checked contest has been reject', 0, 0, 0),
(762, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked contest has been canceled', 'Checked contest has been canceled', 0, 0, 0),
(763, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Checked contest has been deleted', 'Checked contest has been deleted', 0, 0, 0),
(764, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Winner selected for the Checked contest', 'Winner selected for the Checked contest', 0, 0, 0),
(765, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Refund Request', 'Refund Request', 0, 0, 0),
(766, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your request for cancelation added successfully and the amount will be refunded after admin approval.', 'Your request for cancelation added successfully and the amount will be refunded after admin approval.', 0, 0, 0),
(767, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your request cannot be add. Please specif the reason for cancelation.', 'Your request cannot be add. Please specif the reason for cancelation.', 0, 0, 0),
(768, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'This week', 'This week', 0, 0, 0),
(769, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'This month', 'This month', 0, 0, 0),
(770, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Total', 'Total', 0, 0, 0),
(771, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contests Pricing Requirements', 'contests Pricing Requirements', 0, 0, 0),
(772, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests Pricing Requirement', 'Contests Pricing Requirement', 0, 0, 0),
(773, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid contests pricing requirement', 'Invalid contests pricing requirement', 0, 0, 0),
(774, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Contests Pricing Requirement', 'Add Contests Pricing Requirement', 0, 0, 0),
(775, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contests pricing requirement has been added', 'contests pricing requirement has been added', 0, 0, 0),
(776, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contests pricing requirement could not be added. Please, try again.', 'contests pricing requirement could not be added. Please, try again.', 0, 0, 0),
(777, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests pricing requirement deleted', 'Contests pricing requirement deleted', 0, 0, 0),
(778, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contestsPricingRequirements', 'contestsPricingRequirements', 0, 0, 0),
(779, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Contests Pricing Requirement', 'Edit Contests Pricing Requirement', 0, 0, 0),
(780, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contests pricing requirement has been updated', 'contests pricing requirement has been updated', 0, 0, 0),
(781, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'contests pricing requirement could not be updated. Please, try again.', 'contests pricing requirement could not be updated. Please, try again.', 0, 0, 0),
(782, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid id for FormField', 'Invalid id for FormField', 0, 0, 0),
(783, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'FormField deleted', 'FormField deleted', 0, 0, 0),
(784, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The FormField could not be deleted. Please, try again.', 'The FormField could not be deleted. Please, try again.', 0, 0, 0),
(785, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Contest Day', 'Add Contest Day', 0, 0, 0),
(786, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest day has been added', 'Contest day has been added', 0, 0, 0),
(787, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest day could not be added. Please, try again.', 'Contest day could not be added. Please, try again.', 0, 0, 0),
(788, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Contest Day', 'Edit Contest Day', 0, 0, 0),
(789, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid contest day', 'Invalid contest day', 0, 0, 0),
(790, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest day has been updated', 'Contest day has been updated', 0, 0, 0),
(791, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest day could not be updated. Please, try again.', 'Contest day could not be updated. Please, try again.', 0, 0, 0),
(792, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest day deleted', 'Contest day deleted', 0, 0, 0),
(793, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Prize Package', 'Add Prize Package', 0, 0, 0),
(794, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Prize package has been added', 'Prize package has been added', 0, 0, 0),
(795, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Prize package could not be added. Please, try again.', 'Prize package could not be added. Please, try again.', 0, 0, 0),
(796, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Prize Package', 'Edit Prize Package', 0, 0, 0),
(797, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid prize package', 'Invalid prize package', 0, 0, 0),
(798, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Prize package has been updated', 'Prize package has been updated', 0, 0, 0),
(799, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Prize package could not be updated. Please, try again.', 'Prize package could not be updated. Please, try again.', 0, 0, 0),
(800, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'pricing Requirements', 'pricing Requirements', 0, 0, 0),
(801, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Pricing Requirement', 'Add Pricing Requirement', 0, 0, 0),
(802, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'pricing requirement has been added', 'pricing requirement has been added', 0, 0, 0),
(803, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'pricing requirement could not be added. Please, try again.', 'pricing requirement could not be added. Please, try again.', 0, 0, 0),
(804, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Pricing Requirement', 'Edit Pricing Requirement', 0, 0, 0),
(805, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid pricing requirement', 'Invalid pricing requirement', 0, 0, 0),
(806, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'pricing requirement has been updated', 'pricing requirement has been updated', 0, 0, 0);
INSERT INTO `translations` (`id`, `created`, `modified`, `language_id`, `key`, `lang_text`, `is_translated`, `is_google_translate`, `is_verified`) VALUES
(807, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'pricing requirement could not be updated. Please, try again.', 'pricing requirement could not be updated. Please, try again.', 0, 0, 0),
(808, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pricing requirement deleted', 'Pricing requirement deleted', 0, 0, 0),
(809, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Requirement Group', 'Add Requirement Group', 0, 0, 0),
(810, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'requirement group could not be added. Please check at least one requirement to this group.', 'requirement group could not be added. Please check at least one requirement to this group.', 0, 0, 0),
(811, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'requirement group has been added', 'requirement group has been added', 0, 0, 0),
(812, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'requirement group could not be added. Please, try again.', 'requirement group could not be added. Please, try again.', 0, 0, 0),
(813, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Requirement Group', 'Edit Requirement Group', 0, 0, 0),
(814, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid requirement group', 'Invalid requirement group', 0, 0, 0),
(815, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'requirement group has been updated', 'requirement group has been updated', 0, 0, 0),
(816, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'requirement group could not be updated. Please, try again.', 'requirement group could not be updated. Please, try again.', 0, 0, 0),
(817, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Requirement group deleted', 'Requirement group deleted', 0, 0, 0),
(818, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Requirement Package', 'Add Requirement Package', 0, 0, 0),
(819, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'requirement package has been added', 'requirement package has been added', 0, 0, 0),
(820, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'requirement package could not be added. Please, try again.', 'requirement package could not be added. Please, try again.', 0, 0, 0),
(821, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Requirement Package', 'Edit Requirement Package', 0, 0, 0),
(822, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid requirement package', 'Invalid requirement package', 0, 0, 0),
(823, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'requirement package could not be updated. Please, try again.', 'requirement package could not be updated. Please, try again.', 0, 0, 0),
(824, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Requirement package deleted', 'Requirement package deleted', 0, 0, 0),
(825, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Submission', 'Invalid Submission', 0, 0, 0),
(826, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Submissions', 'Submissions', 0, 0, 0),
(827, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid id for Submission', 'Invalid id for Submission', 0, 0, 0),
(828, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Submission deleted', 'Submission deleted', 0, 0, 0),
(829, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The Submission could not be deleted. Please, try again.', 'The Submission could not be deleted. Please, try again.', 0, 0, 0),
(830, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The ValidationRule has been saved', 'The ValidationRule has been saved', 0, 0, 0),
(831, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The ValidationRule could not be saved. Please, try again.', 'The ValidationRule could not be saved. Please, try again.', 0, 0, 0),
(832, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Validation Rule', 'Edit Validation Rule', 0, 0, 0),
(833, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid ValidationRule', 'Invalid ValidationRule', 0, 0, 0),
(834, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ValidationRule deleted', 'ValidationRule deleted', 0, 0, 0),
(835, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Open', 'Open', 0, 0, 0),
(836, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Judging', 'Judging', 0, 0, 0),
(837, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Winner Selected', 'Winner Selected', 0, 0, 0),
(838, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Completed', 'Completed', 0, 0, 0),
(839, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pay to %s', 'Pay to %s', 0, 0, 0),
(840, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Withdrawn', 'Withdrawn', 0, 0, 0),
(841, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Eliminated', 'Eliminated', 0, 0, 0),
(842, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Won', 'Won', 0, 0, 0),
(843, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You''ve withdrawn this entry successfully.', 'You''ve withdrawn this entry successfully.', 0, 0, 0),
(844, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You''ve eliminated this entry successfully.', 'You''ve eliminated this entry successfully.', 0, 0, 0),
(845, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You''ve selected the winner, Proceed to activity section for your final work to be received.', 'You''ve selected the winner, Proceed to activity section for your final work to be received.', 0, 0, 0),
(846, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Error occured. Please try again later.', 'Error occured. Please try again later.', 0, 0, 0),
(847, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You''ve approved the winner.', 'You''ve approved the winner.', 0, 0, 0),
(848, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Unable to process your request.', 'Unable to process your request.', 0, 0, 0),
(849, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Please enter a valid URL.', 'Please enter a valid URL.', 0, 0, 0),
(850, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'This field cannot be left blank', 'This field cannot be left blank', 0, 0, 0),
(851, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests / Entries', 'Contests / Entries', 0, 0, 0),
(852, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Select Range', 'Select Range', 0, 0, 0),
(853, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Submit a Comment', 'Submit a Comment', 0, 0, 0),
(854, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Please Select', 'Please Select', 0, 0, 0),
(855, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'User', 'User', 0, 0, 0),
(856, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Search', 'Search', 0, 0, 0),
(857, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Select', 'Select', 0, 0, 0),
(858, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Created', 'Created', 0, 0, 0),
(859, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Comment', 'Comment', 0, 0, 0),
(860, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'IP', 'IP', 0, 0, 0),
(861, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No contestComments available', 'No contestComments available', 0, 0, 0),
(862, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Select:', 'Select:', 0, 0, 0),
(863, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '-- More actions --', '-- More actions --', 0, 0, 0),
(864, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '[Image: %s]', '[Image: %s]', 0, 0, 0),
(865, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Recommended', 'Recommended', 0, 0, 0),
(866, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contest Comments available', 'No Contest Comments available', 0, 0, 0),
(867, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Id', 'Id', 0, 0, 0),
(868, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Modified', 'Modified', 0, 0, 0),
(869, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Ip', 'Ip', 0, 0, 0),
(870, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Admin Suspend', 'Admin Suspend', 0, 0, 0),
(871, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Is System Flagged', 'Is System Flagged', 0, 0, 0),
(872, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Detected Suspicious Words', 'Detected Suspicious Words', 0, 0, 0),
(873, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'posted %s', 'posted %s', 0, 0, 0),
(874, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'said', 'said', 0, 0, 0),
(875, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contest Flag Categories available', 'No Contest Flag Categories available', 0, 0, 0),
(876, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Flag This Contest', 'Flag This Contest', 0, 0, 0),
(877, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Username', 'Username', 0, 0, 0),
(878, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Flag Category', 'Flag Category', 0, 0, 0),
(879, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Posted on', 'Posted on', 0, 0, 0),
(880, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'whois', 'whois', 0, 0, 0),
(881, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contest Flags available', 'No Contest Flags available', 0, 0, 0),
(882, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contest Followers available', 'No Contest Followers available', 0, 0, 0),
(883, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Liked Contests', 'Liked Contests', 0, 0, 0),
(884, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Title', 'Contest Title', 0, 0, 0),
(885, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Ends', 'Ends', 0, 0, 0),
(886, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Package', 'Package', 0, 0, 0),
(887, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Winner', 'Winner', 0, 0, 0),
(888, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Unlike', 'Unlike', 0, 0, 0),
(889, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Name', 'Name', 0, 0, 0),
(890, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contest Statuses available', 'No Contest Statuses available', 0, 0, 0),
(891, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Global', 'Global', 0, 0, 0),
(892, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Form Fields', 'Form Fields', 0, 0, 0),
(893, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Available Packages', 'Available Packages', 0, 0, 0),
(894, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests Posted', 'Contests Posted', 0, 0, 0),
(895, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entries Posted', 'Entries Posted', 0, 0, 0),
(896, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Revenue ($)', 'Revenue ($)', 0, 0, 0),
(897, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Prize / Maximum entries', 'Prize / Maximum entries', 0, 0, 0),
(898, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pricing', 'Pricing', 0, 0, 0),
(899, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Preview', 'Preview', 0, 0, 0),
(900, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Prize', 'Contest Prize', 0, 0, 0),
(901, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Create new contest prize', 'Create new contest prize', 0, 0, 0),
(902, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '%s Commision (%%)', '%s Commision (%%)', 0, 0, 0),
(903, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Create new contest days', 'Create new contest days', 0, 0, 0),
(904, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Grouping', 'Grouping', 0, 0, 0),
(905, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Pricing Group', 'Add Pricing Group', 0, 0, 0),
(906, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Pricing Group', 'Edit Pricing Group', 0, 0, 0),
(907, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Delete Pricing Group', 'Delete Pricing Group', 0, 0, 0),
(908, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No groups available', 'No groups available', 0, 0, 0),
(909, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Package', 'Add Package', 0, 0, 0),
(910, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'saved', 'saved', 0, 0, 0),
(911, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit Pricing Package', 'Edit Pricing Package', 0, 0, 0),
(912, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Delete Pricing Package', 'Delete Pricing Package', 0, 0, 0),
(913, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No packages available', 'No packages available', 0, 0, 0),
(914, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No contest types available', 'No contest types available', 0, 0, 0),
(915, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Types', 'Contest Types', 0, 0, 0),
(916, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'What do you want launch?', 'What do you want launch?', 0, 0, 0),
(917, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Brief', 'Contest Brief', 0, 0, 0),
(918, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment', 'Payment', 0, 0, 0),
(919, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Types Pricing Packages', 'Contest Types Pricing Packages', 0, 0, 0),
(920, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contest Types Pricing Packages available', 'No Contest Types Pricing Packages available', 0, 0, 0),
(921, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Type', 'Contest Type', 0, 0, 0),
(922, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pricing Package', 'Pricing Package', 0, 0, 0),
(923, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Price', 'Price', 0, 0, 0),
(924, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Types Pricing Requirements', 'Contest Types Pricing Requirements', 0, 0, 0),
(925, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contest Types Pricing Requirements available', 'No Contest Types Pricing Requirements available', 0, 0, 0),
(926, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pricing Requirement', 'Pricing Requirement', 0, 0, 0),
(927, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Downloaded Time', 'Downloaded Time', 0, 0, 0),
(928, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry', 'Entry', 0, 0, 0),
(929, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Guest', 'Guest', 0, 0, 0),
(930, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'N/A', 'N/A', 0, 0, 0),
(931, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No User Views available', 'No User Views available', 0, 0, 0),
(932, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Flag Count', 'Entry Flag Count', 0, 0, 0),
(933, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Entry Flag Categories available', 'No Entry Flag Categories available', 0, 0, 0),
(934, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Flag This Contest Entry', 'Flag This Contest Entry', 0, 0, 0),
(935, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'ContestUser', 'ContestUser', 0, 0, 0),
(936, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contest User Flags available', 'No Contest User Flags available', 0, 0, 0),
(937, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Contest User Rating', 'Add Contest User Rating', 0, 0, 0),
(938, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Rating', 'Rating', 0, 0, 0),
(939, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No contest entries available', 'No contest entries available', 0, 0, 0),
(940, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Stars', 'Stars', 0, 0, 0),
(941, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '1 star out of 5', '1 star out of 5', 0, 0, 0),
(942, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '2 star out of 5', '2 star out of 5', 0, 0, 0),
(943, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '3 star out of 5', '3 star out of 5', 0, 0, 0),
(944, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '4 star out of 5', '4 star out of 5', 0, 0, 0),
(945, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '5 star out of 5', '5 star out of 5', 0, 0, 0),
(946, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contest User Ratings available', 'No Contest User Ratings available', 0, 0, 0),
(947, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Your Entry', 'Add Your Entry', 0, 0, 0),
(948, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Average Rating', 'Average Rating', 0, 0, 0),
(949, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Select as winner', 'Select as winner', 0, 0, 0),
(950, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Withdrawan', 'Withdrawan', 0, 0, 0),
(951, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Click to view', 'Click to view', 0, 0, 0),
(952, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Won!!!', 'Won!!!', 0, 0, 0),
(953, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add as Favorite', 'Add as Favorite', 0, 0, 0),
(954, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Remove from Favorite', 'Remove from Favorite', 0, 0, 0),
(955, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Flag this entry', 'Flag this entry', 0, 0, 0),
(956, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Select As Winner!', 'Select As Winner!', 0, 0, 0),
(957, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Select Winner!', 'Select Winner!', 0, 0, 0),
(958, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Withdraw This Entry', 'Withdraw This Entry', 0, 0, 0),
(959, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Eliminate This Entry', 'Eliminate This Entry', 0, 0, 0),
(960, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'View:', 'View:', 0, 0, 0),
(961, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Unrated', 'Unrated', 0, 0, 0),
(962, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Rated', 'Rated', 0, 0, 0),
(963, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sort:', 'Sort:', 0, 0, 0),
(964, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'By Rating', 'By Rating', 0, 0, 0),
(965, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'By Time', 'By Time', 0, 0, 0),
(966, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Entries Available', 'No Entries Available', 0, 0, 0),
(967, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Lost', 'Lost', 0, 0, 0),
(968, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'All Entries', 'All Entries', 0, 0, 0),
(969, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry Image', 'Entry Image', 0, 0, 0),
(970, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Posted date', 'Posted date', 0, 0, 0),
(971, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'View Count', 'View Count', 0, 0, 0),
(972, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Message Count', 'Message Count', 0, 0, 0),
(973, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'proceeds through this option to post your changes', 'proceeds through this option to post your changes', 0, 0, 0),
(974, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Flag this user', 'Flag this user', 0, 0, 0),
(975, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Prev', 'Prev', 0, 0, 0),
(976, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Previous', 'Previous', 0, 0, 0),
(977, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Next', 'Next', 0, 0, 0),
(978, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entry #', 'Entry #', 0, 0, 0),
(979, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, ' from', ' from', 0, 0, 0),
(980, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Report Abuse', 'Report Abuse', 0, 0, 0),
(981, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'View all', 'View all', 0, 0, 0),
(982, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Flip In', 'Flip In', 0, 0, 0),
(983, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Flip Out', 'Flip Out', 0, 0, 0),
(984, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Discussions', 'Discussions', 0, 0, 0),
(985, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Date', 'Date', 0, 0, 0),
(986, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Start', 'Start', 0, 0, 0),
(987, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'End', 'End', 0, 0, 0),
(988, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Prize', 'Prize', 0, 0, 0),
(989, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Site Revenue', 'Site Revenue', 0, 0, 0),
(990, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Any Time Contest', 'Any Time Contest', 0, 0, 0),
(991, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No contests available', 'No contests available', 0, 0, 0),
(992, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Inprocess', 'Inprocess', 0, 0, 0),
(993, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Closed', 'Closed', 0, 0, 0),
(994, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Step 1. What do you want launch?', 'Step 1. What do you want launch?', 0, 0, 0),
(995, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Step 2. Contest Brief', 'Step 2. Contest Brief', 0, 0, 0),
(996, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Step 3. Payment', 'Step 3. Payment', 0, 0, 0),
(997, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Total Fee', 'Total Fee', 0, 0, 0),
(998, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'This payment transacts in ', 'This payment transacts in ', 0, 0, 0),
(999, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '. Your total charge is ', '. Your total charge is ', 0, 0, 0),
(1000, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Select Payment Type', 'Select Payment Type', 0, 0, 0),
(1001, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entries count', 'Entries count', 0, 0, 0),
(1002, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'My Entries', 'My Entries', 0, 0, 0),
(1003, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Categories', 'Categories', 0, 0, 0),
(1004, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'by', 'by', 0, 0, 0),
(1005, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Ends On', 'Ends On', 0, 0, 0),
(1006, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Views count', 'Views count', 0, 0, 0),
(1007, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Download', 'Download', 0, 0, 0),
(1008, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pay', 'Pay', 0, 0, 0),
(1009, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Request for change', 'Request for change', 0, 0, 0),
(1010, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Request refund', 'Request refund', 0, 0, 0),
(1011, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Create a contest that attracts the right %s to your brief.', 'Create a contest that attracts the right %s to your brief.', 0, 0, 0),
(1012, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'We''ve got the largest design community online so it''s important to create a contest that attracts the kinds of designers you want to work on your brief.', 'We''ve got the largest design community online so it''s important to create a contest that attracts the kinds of designers you want to work on your brief.', 0, 0, 0),
(1013, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'What contest package do you want?', 'What contest package do you want?', 0, 0, 0),
(1014, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'All packages come with a 100% money-back guarantee and you own full copyright to the final work.', 'All packages come with a 100% money-back guarantee and you own full copyright to the final work.', 0, 0, 0),
(1015, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'How quickly do you need to complete your contest?', 'How quickly do you need to complete your contest?', 0, 0, 0),
(1016, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'days', 'days', 0, 0, 0),
(1017, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'day', 'day', 0, 0, 0),
(1018, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'In', 'In', 0, 0, 0),
(1019, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Standard', 'Standard', 0, 0, 0),
(1020, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'FREE', 'FREE', 0, 0, 0),
(1021, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Request for Cancellation', 'Request for Cancellation', 0, 0, 0),
(1022, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Request', 'Request', 0, 0, 0),
(1023, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Enddate', 'Enddate', 0, 0, 0),
(1024, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Status', 'Contest Status', 0, 0, 0),
(1025, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Description', 'Description', 0, 0, 0),
(1026, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Balance ', 'Balance ', 0, 0, 0),
(1027, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Amount to Wallet', 'Add Amount to Wallet', 0, 0, 0),
(1028, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Add Amount to Wallet ', 'Add Amount to Wallet ', 0, 0, 0),
(1029, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Click to View Details', 'Click to View Details', 0, 0, 0),
(1030, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Like', 'Like', 0, 0, 0),
(1031, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest - ', 'Contest - ', 0, 0, 0),
(1032, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Report Project', 'Report Project', 0, 0, 0),
(1033, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contact Creator', 'Contact Creator', 0, 0, 0),
(1034, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Tweet!', 'Tweet!', 0, 0, 0),
(1035, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Creator:', 'Creator:', 0, 0, 0),
(1036, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Ends On:', 'Ends On:', 0, 0, 0),
(1037, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Category:', 'Category:', 0, 0, 0),
(1038, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Entries:', 'Entries:', 0, 0, 0),
(1039, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Followers:', 'Followers:', 0, 0, 0),
(1040, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Submit your work', 'Submit your work', 0, 0, 0),
(1041, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Change Completed', 'Change Completed', 0, 0, 0),
(1042, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Completed', 'Contest Completed', 0, 0, 0),
(1043, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Change Requested', 'Change Requested', 0, 0, 0),
(1044, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Followers', 'Followers', 0, 0, 0),
(1045, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Follower', 'Contest Follower', 0, 0, 0),
(1046, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contests Pricing Requirements', 'Contests Pricing Requirements', 0, 0, 0),
(1047, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Contests Pricing Requirements available', 'No Contests Pricing Requirements available', 0, 0, 0),
(1048, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Entires', 'Contest Entires', 0, 0, 0),
(1049, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Pending', 'Payment Pending', 0, 0, 0),
(1050, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pending Approval', 'Pending Approval', 0, 0, 0),
(1051, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Rejected', 'Rejected', 0, 0, 0),
(1052, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Request  refund', 'Request  refund', 0, 0, 0),
(1053, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Canceled By Admin', 'Canceled By Admin', 0, 0, 0),
(1054, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Expired', 'Expired', 0, 0, 0),
(1055, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Admin will automatically select the winner after 15 days from completed date', 'Admin will automatically select the winner after 15 days from completed date', 0, 0, 0),
(1056, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Help', 'Help', 0, 0, 0),
(1057, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Paid To %s', 'Paid To %s', 0, 0, 0),
(1058, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Winner Selected by Admin', 'Winner Selected by Admin', 0, 0, 0),
(1059, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Development', 'Development', 0, 0, 0),
(1060, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'All Contests', 'All Contests', 0, 0, 0),
(1061, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Flagged', 'Flagged', 0, 0, 0),
(1062, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '(Manage your contests)', '(Manage your contests)', 0, 0, 0),
(1063, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Post Your Contest', 'Post Your Contest', 0, 0, 0),
(1064, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Liked %s', 'Liked %s', 0, 0, 0),
(1065, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Top %s', 'Top %s', 0, 0, 0),
(1066, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'My Participations', 'My Participations', 0, 0, 0),
(1067, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '(Your participations contests)', '(Your participations contests)', 0, 0, 0),
(1068, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Comma seperated for multiple options.', 'Comma seperated for multiple options.', 0, 0, 0),
(1069, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'As', 'As', 0, 0, 0),
(1070, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Posted Contest:', 'Posted Contest:', 0, 0, 0),
(1071, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Contest Won', 'Contest Won', 0, 0, 0),
(1072, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'FormField', 'FormField', 0, 0, 0),
(1073, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Label', 'Label', 0, 0, 0),
(1074, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Length', 'Length', 0, 0, 0),
(1075, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Null', 'Null', 0, 0, 0),
(1076, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Default', 'Default', 0, 0, 0),
(1077, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Cform', 'Cform', 0, 0, 0),
(1078, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit FormField', 'Edit FormField', 0, 0, 0),
(1079, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Delete FormField', 'Delete FormField', 0, 0, 0),
(1080, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Are you sure you want to delete # %s?', 'Are you sure you want to delete # %s?', 0, 0, 0),
(1081, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'List FormFields', 'List FormFields', 0, 0, 0),
(1082, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'New FormField', 'New FormField', 0, 0, 0),
(1083, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'List Cforms', 'List Cforms', 0, 0, 0),
(1084, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'New Cform', 'New Cform', 0, 0, 0),
(1085, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'List Validation Rules', 'List Validation Rules', 0, 0, 0),
(1086, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'New Validation Rule', 'New Validation Rule', 0, 0, 0),
(1087, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Related Validation Rules', 'Related Validation Rules', 0, 0, 0),
(1088, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Rule', 'Rule', 0, 0, 0),
(1089, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'View', 'View', 0, 0, 0),
(1090, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No of Days', 'No of Days', 0, 0, 0),
(1091, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Global Price', 'Global Price', 0, 0, 0),
(1092, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No pricing packages available', 'No pricing packages available', 0, 0, 0),
(1093, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Global price', 'Global price', 0, 0, 0),
(1094, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You can edit the Global price using the pricing option in contest type.', 'You can edit the Global price using the pricing option in contest type.', 0, 0, 0),
(1095, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, '%s Commission', '%s Commission', 0, 0, 0),
(1096, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Maximum Entry Allowed', 'Maximum Entry Allowed', 0, 0, 0),
(1097, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Featured', 'Featured', 0, 0, 0),
(1098, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Features', 'Features', 0, 0, 0),
(1099, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No pricing requirement available', 'No pricing requirement available', 0, 0, 0),
(1100, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Resources available', 'No Resources available', 0, 0, 0),
(1101, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Back to Index', 'Back to Index', 0, 0, 0),
(1102, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Export Records', 'Export Records', 0, 0, 0),
(1103, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', 0, 0, 0),
(1104, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'previous', 'previous', 0, 0, 0),
(1105, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'next', 'next', 0, 0, 0),
(1106, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Plugins', 'Plugins', 0, 0, 0),
(1107, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Locales', 'Locales', 0, 0, 0),
(1108, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Locale does not exist.', 'Locale does not exist.', 0, 0, 0),
(1109, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Locale ''%s'' set as default', 'Locale ''%s'' set as default', 0, 0, 0),
(1110, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Could not edit cms_bootstrap.php file.', 'Could not edit cms_bootstrap.php file.', 0, 0, 0),
(1111, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Upload a new locale', 'Upload a new locale', 0, 0, 0),
(1112, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid locale.', 'Invalid locale.', 0, 0, 0),
(1113, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Locale already exists.', 'Locale already exists.', 0, 0, 0),
(1114, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Edit locale: %s', 'Edit locale: %s', 0, 0, 0),
(1115, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'The file default.po does not exist.', 'The file default.po does not exist.', 0, 0, 0),
(1116, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Locale updated successfully', 'Locale updated successfully', 0, 0, 0),
(1117, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid locale', 'Invalid locale', 0, 0, 0),
(1118, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Locale deleted successfully.', 'Locale deleted successfully.', 0, 0, 0),
(1119, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Local could not be deleted.', 'Local could not be deleted.', 0, 0, 0),
(1120, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Upload a new plugin', 'Upload a new plugin', 0, 0, 0),
(1121, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid plugin.', 'Invalid plugin.', 0, 0, 0),
(1122, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Plugin already exists.', 'Plugin already exists.', 0, 0, 0),
(1123, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid plugin', 'Invalid plugin', 0, 0, 0),
(1124, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You cannot delete a plugin that is currently active.', 'You cannot delete a plugin that is currently active.', 0, 0, 0),
(1125, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Plugin deleted successfully.', 'Plugin deleted successfully.', 0, 0, 0),
(1126, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Plugin could not be deleted.', 'Plugin could not be deleted.', 0, 0, 0),
(1127, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Plugin deactivated successfully.', 'Plugin deactivated successfully.', 0, 0, 0),
(1128, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Plugin activated successfully.', 'Plugin activated successfully.', 0, 0, 0),
(1129, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Plugin \\"%s\\" depends on \\"%s\\" plugin.', 'Plugin \\"%s\\" depends on \\"%s\\" plugin.', 0, 0, 0),
(1130, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Themes', 'Themes', 0, 0, 0),
(1131, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Theme activated successfully.', 'Theme activated successfully.', 0, 0, 0),
(1132, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Upload a new theme', 'Upload a new theme', 0, 0, 0),
(1133, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid YML file', 'Invalid YML file', 0, 0, 0),
(1134, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid zip archive.', 'Invalid zip archive.', 0, 0, 0),
(1135, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Directory with theme alias already exists.', 'Directory with theme alias already exists.', 0, 0, 0),
(1136, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Theme uploaded successfully', 'Theme uploaded successfully', 0, 0, 0),
(1137, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Theme Editor', 'Theme Editor', 0, 0, 0),
(1138, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invalid Theme', 'Invalid Theme', 0, 0, 0),
(1139, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Default theme cannot be deleted', 'Default theme cannot be deleted', 0, 0, 0),
(1140, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You cannot delete a theme that is currently active', 'You cannot delete a theme that is currently active', 0, 0, 0),
(1141, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Theme could not be deleted. Please try again.', 'Theme could not be deleted. Please try again.', 0, 0, 0),
(1142, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Theme deleted successfully', 'Theme deleted successfully', 0, 0, 0),
(1143, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Save', 'Save', 0, 0, 0),
(1144, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Locale', 'Locale', 0, 0, 0),
(1145, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Activate', 'Activate', 0, 0, 0),
(1146, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Are you sure?', 'Are you sure?', 0, 0, 0),
(1147, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Deactivate', 'Deactivate', 0, 0, 0),
(1148, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No Plugins available.', 'No Plugins available.', 0, 0, 0),
(1149, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Current Theme', 'Current Theme', 0, 0, 0),
(1150, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Regions supported: ', 'Regions supported: ', 0, 0, 0),
(1151, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Available Themes', 'Available Themes', 0, 0, 0),
(1152, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'No themes available', 'No themes available', 0, 0, 0),
(1153, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Installation: Welcome', 'Installation: Welcome', 0, 0, 0),
(1154, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Step 1: Database', 'Step 1: Database', 0, 0, 0),
(1155, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Could not connect to database: %s', 'Could not connect to database: %s', 0, 0, 0),
(1156, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Could not connect to database.', 'Could not connect to database.', 0, 0, 0),
(1157, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Could not write database.php file.', 'Could not write database.php file.', 0, 0, 0),
(1158, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Step 2: Build database', 'Step 2: Build database', 0, 0, 0),
(1159, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Could not create table: %s', 'Could not create table: %s', 0, 0, 0),
(1160, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Installation completed successfully', 'Installation completed successfully', 0, 0, 0),
(1161, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Click here to build your database', 'Click here to build your database', 0, 0, 0),
(1162, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your tmp directory is writable.', 'Your tmp directory is writable.', 0, 0, 0),
(1163, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your tmp directory is NOT writable.', 'Your tmp directory is NOT writable.', 0, 0, 0),
(1164, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your config directory is writable.', 'Your config directory is writable.', 0, 0, 0),
(1165, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Your config directory is NOT writable.', 'Your config directory is NOT writable.', 0, 0, 0),
(1166, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'PHP version %s > 5', 'PHP version %s > 5', 0, 0, 0),
(1167, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'PHP version %s < 5', 'PHP version %s < 5', 0, 0, 0),
(1168, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Installation cannot continue as minimum requirements are not met.', 'Installation cannot continue as minimum requirements are not met.', 0, 0, 0),
(1169, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Cms', 'Cms', 0, 0, 0),
(1170, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Install Cms', 'Install Cms', 0, 0, 0),
(1171, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have paid membership fee successfully, will be activated once administrator approved', 'You have paid membership fee successfully, will be activated once administrator approved', 0, 0, 0),
(1172, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have paid membership fee successfully. Now you can login with your %s after verified your email', 'You have paid membership fee successfully. Now you can login with your %s after verified your email', 0, 0, 0),
(1173, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'You have paid contest fee successfully. Now your contest has been opened', 'You have paid contest fee successfully. Now your contest has been opened', 0, 0, 0),
(1174, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Payment Failed. Please, try again', 'Payment Failed. Please, try again', 0, 0, 0),
(1175, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Foreign', 'Foreign', 0, 0, 0),
(1176, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Class', 'Class', 0, 0, 0),
(1177, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Transaction', 'Transaction', 0, 0, 0),
(1178, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Amount', 'Amount', 0, 0, 0),
(1179, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Primary', 'Primary', 0, 0, 0),
(1180, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Invoice', 'Invoice', 0, 0, 0),
(1181, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Refunded Amount', 'Refunded Amount', 0, 0, 0),
(1182, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pending Refund', 'Pending Refund', 0, 0, 0),
(1183, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sender Transaction', 'Sender Transaction', 0, 0, 0),
(1184, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sender Transaction Status', 'Sender Transaction Status', 0, 0, 0),
(1185, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'TimeStamp', 'TimeStamp', 0, 0, 0),
(1186, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Acknowledgment', 'Acknowledgment', 0, 0, 0),
(1187, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Correlation', 'Correlation', 0, 0, 0),
(1188, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Build', 'Build', 0, 0, 0),
(1189, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Currency Code', 'Currency Code', 0, 0, 0),
(1190, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Sender Email', 'Sender Email', 0, 0, 0),
(1191, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Status', 'Status', 0, 0, 0),
(1192, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Tracking', 'Tracking', 0, 0, 0),
(1193, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Pay Key', 'Pay Key', 0, 0, 0),
(1194, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Action Type', 'Action Type', 0, 0, 0),
(1195, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Fees Payer', 'Fees Payer', 0, 0, 0),
(1196, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Memo', 'Memo', 0, 0, 0),
(1197, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Reverse All Parallel Payments On Error', 'Reverse All Parallel Payments On Error', 0, 0, 0),
(1198, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Refund Status', 'Refund Status', 0, 0, 0),
(1199, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Refund Net Amount', 'Refund Net Amount', 0, 0, 0),
(1200, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Refund Fee Amount', 'Refund Fee Amount', 0, 0, 0),
(1201, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Refund Gross Amount', 'Refund Gross Amount', 0, 0, 0),
(1202, '2012-04-17 02:29:48', '2012-04-17 02:29:48', 42, 'Total Of Alll Refunds', 'Total Of Alll Refunds', 0, 0, 0),
(1203, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Refund Has Become Full', 'Refund Has Become Full', 0, 0, 0),
(1204, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Encrypted Refund Transaction', 'Encrypted Refund Transaction', 0, 0, 0),
(1205, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Refund Transaction Status', 'Refund Transaction Status', 0, 0, 0),
(1206, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Adaptive Transaction Logs available', 'No Adaptive Transaction Logs available', 0, 0, 0),
(1207, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Foreign Id', 'Foreign Id', 0, 0, 0),
(1208, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Transaction Id', 'Transaction Id', 0, 0, 0),
(1209, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Invoice Id', 'Invoice Id', 0, 0, 0),
(1210, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sender Transaction Id', 'Sender Transaction Id', 0, 0, 0),
(1211, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Timestamp', 'Timestamp', 0, 0, 0),
(1212, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Ack', 'Ack', 0, 0, 0),
(1213, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Correlation Id', 'Correlation Id', 0, 0, 0),
(1214, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Tracking Id', 'Tracking Id', 0, 0, 0),
(1215, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Encrypted Refund Transaction Id', 'Encrypted Refund Transaction Id', 0, 0, 0),
(1216, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'PayPal Post Vars', 'PayPal Post Vars', 0, 0, 0),
(1217, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment completed.', 'Payment completed.', 0, 0, 0),
(1218, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Paypal Transaction Logs', 'Paypal Transaction Logs', 0, 0, 0),
(1219, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mass Paypal Transaction Logs', 'Mass Paypal Transaction Logs', 0, 0, 0),
(1220, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Normal Paypal Transaction Logs', 'Normal Paypal Transaction Logs', 0, 0, 0),
(1221, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Paypal Transaction Log', 'Paypal Transaction Log', 0, 0, 0),
(1222, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'click here', 'click here', 0, 0, 0),
(1223, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Redirecting you to PayPal', 'Redirecting you to PayPal', 0, 0, 0),
(1224, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'If your browser doesn''t redirect you please ', 'If your browser doesn''t redirect you please ', 0, 0, 0),
(1225, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'to continue ', 'to continue ', 0, 0, 0),
(1226, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Transaction ID', 'Transaction ID', 0, 0, 0),
(1227, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'User email', 'User email', 0, 0, 0),
(1228, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Fees', 'Fees', 0, 0, 0),
(1229, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization', 'Authorization', 0, 0, 0),
(1230, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture', 'Capture', 0, 0, 0),
(1231, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Void', 'Void', 0, 0, 0),
(1232, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization ID', 'Authorization ID', 0, 0, 0),
(1233, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New User', 'New User', 0, 0, 0),
(1234, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Paypal Transaction Logs available', 'No Paypal Transaction Logs available', 0, 0, 0),
(1235, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Date Added', 'Date Added', 0, 0, 0),
(1236, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Deal User', 'Deal User', 0, 0, 0),
(1237, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Currency Type', 'Currency Type', 0, 0, 0),
(1238, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Txn Id', 'Txn Id', 0, 0, 0),
(1239, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payer Email', 'Payer Email', 0, 0, 0),
(1240, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment Date', 'Payment Date', 0, 0, 0),
(1241, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'To Digicurrency', 'To Digicurrency', 0, 0, 0),
(1242, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'To Account No', 'To Account No', 0, 0, 0),
(1243, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'To Account Name', 'To Account Name', 0, 0, 0),
(1244, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Fees Paid By', 'Fees Paid By', 0, 0, 0),
(1245, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mc Gross', 'Mc Gross', 0, 0, 0),
(1246, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mc Fee', 'Mc Fee', 0, 0, 0),
(1247, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mc Currency', 'Mc Currency', 0, 0, 0),
(1248, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment Status', 'Payment Status', 0, 0, 0),
(1249, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Pending Reason', 'Pending Reason', 0, 0, 0),
(1250, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Receiver Email', 'Receiver Email', 0, 0, 0),
(1251, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Paypal Response', 'Paypal Response', 0, 0, 0),
(1252, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Error No', 'Error No', 0, 0, 0),
(1253, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Error Message', 'Error Message', 0, 0, 0),
(1254, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Paypal Post Vars', 'Paypal Post Vars', 0, 0, 0),
(1255, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Is Mass Pay', 'Is Mass Pay', 0, 0, 0),
(1256, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mass Pay Status', 'Mass Pay Status', 0, 0, 0),
(1257, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Masspay Response', 'Masspay Response', 0, 0, 0),
(1258, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'User Cash Withdrawal Id', 'User Cash Withdrawal Id', 0, 0, 0);
INSERT INTO `translations` (`id`, `created`, `modified`, `language_id`, `key`, `lang_text`, `is_translated`, `is_google_translate`, `is_verified`) VALUES
(1259, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Charity Cash Withdrawal Id', 'Charity Cash Withdrawal Id', 0, 0, 0),
(1260, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Affiliate Cash Withdrawal Id', 'Affiliate Cash Withdrawal Id', 0, 0, 0),
(1261, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Is Authorization', 'Is Authorization', 0, 0, 0),
(1262, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Auth Exp', 'Authorization Auth Exp', 0, 0, 0),
(1263, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Transaction Entity', 'Authorization Transaction Entity', 0, 0, 0),
(1264, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Parent Txn Id', 'Authorization Parent Txn Id', 0, 0, 0),
(1265, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Remaining Settle', 'Authorization Remaining Settle', 0, 0, 0),
(1266, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Auth Id', 'Authorization Auth Id', 0, 0, 0),
(1267, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Auth Amount', 'Authorization Auth Amount', 0, 0, 0),
(1268, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Pending Reason', 'Authorization Pending Reason', 0, 0, 0),
(1269, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Payment Gross', 'Authorization Payment Gross', 0, 0, 0),
(1270, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Auth Status', 'Authorization Auth Status', 0, 0, 0),
(1271, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Authorization Data', 'Authorization Data', 0, 0, 0),
(1272, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Authorizationid', 'Capture Authorizationid', 0, 0, 0),
(1273, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Timestamp', 'Capture Timestamp', 0, 0, 0),
(1274, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Correlationid', 'Capture Correlationid', 0, 0, 0),
(1275, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Ack', 'Capture Ack', 0, 0, 0),
(1276, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Version', 'Capture Version', 0, 0, 0),
(1277, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Build', 'Capture Build', 0, 0, 0),
(1278, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Transactionid', 'Capture Transactionid', 0, 0, 0),
(1279, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Parenttransactionid', 'Capture Parenttransactionid', 0, 0, 0),
(1280, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Transactiontype', 'Capture Transactiontype', 0, 0, 0),
(1281, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Paymenttype', 'Capture Paymenttype', 0, 0, 0),
(1282, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Expectedecheckcleardate', 'Capture Expectedecheckcleardate', 0, 0, 0),
(1283, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Ordertime', 'Capture Ordertime', 0, 0, 0),
(1284, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Amt', 'Capture Amt', 0, 0, 0),
(1285, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Feeamt', 'Capture Feeamt', 0, 0, 0),
(1286, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Taxamt', 'Capture Taxamt', 0, 0, 0),
(1287, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Currencycode', 'Capture Currencycode', 0, 0, 0),
(1288, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Paymentstatus', 'Capture Paymentstatus', 0, 0, 0),
(1289, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Shippingmethod', 'Capture Shippingmethod', 0, 0, 0),
(1290, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Pendingreason', 'Capture Pendingreason', 0, 0, 0),
(1291, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Reasoncode', 'Capture Reasoncode', 0, 0, 0),
(1292, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Protectioneligibility', 'Capture Protectioneligibility', 0, 0, 0),
(1293, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Capture Data', 'Capture Data', 0, 0, 0),
(1294, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Void Timestamp', 'Void Timestamp', 0, 0, 0),
(1295, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Void Correlationid', 'Void Correlationid', 0, 0, 0),
(1296, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Void Ack', 'Void Ack', 0, 0, 0),
(1297, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Void Data', 'Void Data', 0, 0, 0),
(1298, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Currency', 'Currency', 0, 0, 0),
(1299, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Converted Currency', 'Converted Currency', 0, 0, 0),
(1300, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Orginal Amount', 'Orginal Amount', 0, 0, 0),
(1301, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Rate', 'Rate', 0, 0, 0),
(1302, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translations', 'Translations', 0, 0, 0),
(1303, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translation deleted successfully', 'Translation deleted successfully', 0, 0, 0),
(1304, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translation', 'Translation', 0, 0, 0),
(1305, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add New Language Variable', 'Add New Language Variable', 0, 0, 0),
(1306, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Language variables has been added', 'Language variables has been added', 0, 0, 0),
(1307, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Language variables could not be added', 'Language variables could not be added', 0, 0, 0),
(1308, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add Translation', 'Add Translation', 0, 0, 0),
(1309, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Default English variable is missing', 'Default English variable is missing', 0, 0, 0),
(1310, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translation could not be updated. Please, try again.', 'Translation could not be updated. Please, try again.', 0, 0, 0),
(1311, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translation could not be updated. Please check iso2 of this language and try again', 'Translation could not be updated. Please check iso2 of this language and try again', 0, 0, 0),
(1312, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translation has been added', 'Translation has been added', 0, 0, 0),
(1313, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Edit Translation', 'Edit Translation', 0, 0, 0),
(1314, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '\\"%s\\" Translation has been updated', '\\"%s\\" Translation has been updated', 0, 0, 0),
(1315, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '\\"%s\\" Translation could not be updated. Please, try again.', '\\"%s\\" Translation could not be updated. Please, try again.', 0, 0, 0),
(1316, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translation deleted', 'Translation deleted', 0, 0, 0),
(1317, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Edit Translations', 'Edit Translations', 0, 0, 0),
(1318, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translation updated successfully', 'Translation updated successfully', 0, 0, 0),
(1319, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, ' - Verified ', ' - Verified ', 0, 0, 0),
(1320, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, ' - Unverified ', ' - Unverified ', 0, 0, 0),
(1321, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'English', 'English', 0, 0, 0),
(1322, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'To Language', 'To Language', 0, 0, 0),
(1323, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'It will only populate site labels for selected new language. You need to manually enter all the equivalent translated labels.', 'It will only populate site labels for selected new language. You need to manually enter all the equivalent translated labels.', 0, 0, 0),
(1324, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'It will automatically translate site labels into selected language with Google. You may then edit necessary labels.', 'It will automatically translate site labels into selected language with Google. You may then edit necessary labels.', 0, 0, 0),
(1325, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Google Translate service is currently a paid service and you''d need API key to use it.', 'Google Translate service is currently a paid service and you''d need API key to use it.', 0, 0, 0),
(1326, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Please enter Google Translate API key in ', 'Please enter Google Translate API key in ', 0, 0, 0),
(1327, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, ' page', ' page', 0, 0, 0),
(1328, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Original', 'Original', 0, 0, 0),
(1329, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Make New Translation', 'Make New Translation', 0, 0, 0),
(1330, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add New Text', 'Add New Text', 0, 0, 0),
(1331, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sorry, in order to translate, default English strings should be extracted and available. Please contact support.', 'Sorry, in order to translate, default English strings should be extracted and available. Please contact support.', 0, 0, 0),
(1332, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Language', 'Language', 0, 0, 0),
(1333, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Verified', 'Verified', 0, 0, 0),
(1334, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Not Verified', 'Not Verified', 0, 0, 0),
(1335, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Manage', 'Manage', 0, 0, 0),
(1336, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Delete Translation', 'Delete Translation', 0, 0, 0),
(1337, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Translations available', 'No Translations available', 0, 0, 0),
(1338, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Unverified', 'Unverified', 0, 0, 0),
(1339, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Verified: ', 'Verified: ', 0, 0, 0),
(1340, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'If you translated with Google Translate, it may not be perfect translation and it may have mistakes. So you need to manually check all translated texts. The translation stats will give summary of verified/unverified translated text.', 'If you translated with Google Translate, it may not be perfect translation and it may have mistakes. So you need to manually check all translated texts. The translation stats will give summary of verified/unverified translated text.', 0, 0, 0),
(1341, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Submit', 'Submit', 0, 0, 0),
(1342, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translated', 'Translated', 0, 0, 0),
(1343, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No translations available', 'No translations available', 0, 0, 0),
(1344, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Key', 'Key', 0, 0, 0),
(1345, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Lang Text', 'Lang Text', 0, 0, 0),
(1346, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Unable to process payment please try again.', 'Unable to process payment please try again.', 0, 0, 0),
(1347, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'You Dont have sufficient amount in you wallet.', 'You Dont have sufficient amount in you wallet.', 0, 0, 0),
(1348, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Amount could not be added to wallet', 'Amount could not be added to wallet', 0, 0, 0),
(1349, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Your Current Available Balance:', 'Your Current Available Balance:', 0, 0, 0),
(1350, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Minimum Amount: %s%s <br/> Maximum Amount: %s', 'Minimum Amount: %s%s <br/> Maximum Amount: %s', 0, 0, 0),
(1351, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'User Cash Withdrawals', 'User Cash Withdrawals', 0, 0, 0),
(1352, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Money Transfer Accounts', 'Money Transfer Accounts', 0, 0, 0),
(1353, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'money transfer account has been added', 'money transfer account has been added', 0, 0, 0),
(1354, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'money transfer account could not be updated. Please, try again.', 'money transfer account could not be updated. Please, try again.', 0, 0, 0),
(1355, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Transfer account deleted', 'Transfer account deleted', 0, 0, 0),
(1356, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Primary money transfer account has been updated', 'Primary money transfer account has been updated', 0, 0, 0),
(1357, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mark as paid/manual', 'Mark as paid/manual', 0, 0, 0),
(1358, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Withdraw Fund Request', 'Withdraw Fund Request', 0, 0, 0),
(1359, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add Fund Withdraw', 'Add Fund Withdraw', 0, 0, 0),
(1360, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Withdraw Fund Requests', 'Withdraw Fund Requests', 0, 0, 0),
(1361, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, ' - Requested today', ' - Requested today', 0, 0, 0),
(1362, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, ' - Requested in this week', ' - Requested in this week', 0, 0, 0),
(1363, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, ' - Requested in this month', ' - Requested in this month', 0, 0, 0),
(1364, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Withdraw fund request deleted', 'Withdraw fund request deleted', 0, 0, 0),
(1365, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Checked requests have been moved to pending status', 'Checked requests have been moved to pending status', 0, 0, 0),
(1366, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Checked requests have been moved to rejected status, Refunded  Money to Wallet', 'Checked requests have been moved to rejected status, Refunded  Money to Wallet', 0, 0, 0),
(1367, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Pay via ', 'Pay via ', 0, 0, 0),
(1368, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'API', 'API', 0, 0, 0),
(1369, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Withdraw Fund Requests - Approved', 'Withdraw Fund Requests - Approved', 0, 0, 0),
(1370, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Manual payment process has been completed.', 'Manual payment process has been completed.', 0, 0, 0),
(1371, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mass payment request is submitted in', 'Mass payment request is submitted in', 0, 0, 0),
(1372, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'User will be paid once process completed.', 'User will be paid once process completed.', 0, 0, 0),
(1373, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Withdrawal has beed successfully moved to ', 'Withdrawal has beed successfully moved to ', 0, 0, 0),
(1374, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Masspay not completed. Please try again', 'Masspay not completed. Please try again', 0, 0, 0),
(1375, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Should be numeric', 'Should be numeric', 0, 0, 0),
(1376, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Pending', 'Pending', 0, 0, 0),
(1377, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Approved...', 'Approved...', 0, 0, 0),
(1378, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Given amount is greater than wallet amount', 'Given amount is greater than wallet amount', 0, 0, 0),
(1379, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'one the selected withdrawal has not configured the money transfer account. Please try again', 'one the selected withdrawal has not configured the money transfer account. Please try again', 0, 0, 0),
(1380, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Account', 'Account', 0, 0, 0),
(1381, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'In order to withdrawal cash/amount from your account balance in the site, You first need to create a ''Money tranfer account''. You can also add multiple transfer accounts with different gateways and mark any one of them as ''Primary''. The approved withdrawal amount from your account balance will be credited to the ''Primary'' marked transfer account.', 'In order to withdrawal cash/amount from your account balance in the site, You first need to create a ''Money tranfer account''. You can also add multiple transfer accounts with different gateways and mark any one of them as ''Primary''. The approved withdrawal amount from your account balance will be credited to the ''Primary'' marked transfer account.', 0, 0, 0),
(1382, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment Gateway', 'Payment Gateway', 0, 0, 0),
(1383, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Make as primary', 'Make as primary', 0, 0, 0),
(1384, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No money transfer account available', 'No money transfer account available', 0, 0, 0),
(1385, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'The requested amount will be deducted from your wallet and the amount will be blocked until it get approved or rejected by the administrator. Once its approved, the requested amount will be sent to your paypal account. In case of failure, the amount will be refunded to your wallet.', 'The requested amount will be deducted from your wallet and the amount will be blocked until it get approved or rejected by the administrator. Once its approved, the requested amount will be sent to your paypal account. In case of failure, the amount will be refunded to your wallet.', 0, 0, 0),
(1386, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Minimum withdraw amount: %s <br/> Maximum withdraw amount: %s', 'Minimum withdraw amount: %s <br/> Maximum withdraw amount: %s', 0, 0, 0),
(1387, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Request Withdraw', 'Request Withdraw', 0, 0, 0),
(1388, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Under Process', 'Under Process', 0, 0, 0),
(1389, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Success', 'Success', 0, 0, 0),
(1390, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Failed', 'Failed', 0, 0, 0),
(1391, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Withdrawal fund frequest which were unable to process will be returned as failed. The amount requested will be automatically refunded to the user.', 'Withdrawal fund frequest which were unable to process will be returned as failed. The amount requested will be automatically refunded to the user.', 0, 0, 0),
(1392, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Following withdrawal request has been submitted to payment geteway API, These are waiting for IPN from the payment geteway API. Eiether it will move to Success or Failed', 'Following withdrawal request has been submitted to payment geteway API, These are waiting for IPN from the payment geteway API. Eiether it will move to Success or Failed', 0, 0, 0),
(1393, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Transfer Account: ', 'Transfer Account: ', 0, 0, 0),
(1394, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Requested on', 'Requested on', 0, 0, 0),
(1395, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Paid on', 'Paid on', 0, 0, 0),
(1396, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Move to success', 'Move to success', 0, 0, 0),
(1397, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Move to failed', 'Move to failed', 0, 0, 0),
(1398, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No records available', 'No records available', 0, 0, 0),
(1399, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Gateway', 'Gateway', 0, 0, 0),
(1400, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Paid Amount', 'Paid Amount', 0, 0, 0),
(1401, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Proceed', 'Proceed', 0, 0, 0),
(1402, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Edit Withdraw Fund Request', 'Edit Withdraw Fund Request', 0, 0, 0),
(1403, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Withdrawal Status ', 'Withdrawal Status ', 0, 0, 0),
(1404, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Remark', 'Remark', 0, 0, 0),
(1405, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Your money transfer account is empty, so click here to update money transfer account.', 'Your money transfer account is empty, so click here to update money transfer account.', 0, 0, 0),
(1406, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'money transfer accounts', 'money transfer accounts', 0, 0, 0),
(1407, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Requested On', 'Requested On', 0, 0, 0),
(1408, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No withdraw fund requests available', 'No withdraw fund requests available', 0, 0, 0),
(1409, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Could not add a new language.', 'Could not add a new language.', 0, 0, 0),
(1410, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Adaptive Ipn Logs', 'Adaptive Ipn Logs', 0, 0, 0),
(1411, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Added On', 'Added On', 0, 0, 0),
(1412, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Post Variable', 'Post Variable', 0, 0, 0),
(1413, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Adaptive Ipn Logs available', 'No Adaptive Ipn Logs available', 0, 0, 0),
(1414, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New Attachment', 'New Attachment', 0, 0, 0),
(1415, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'URL', 'URL', 0, 0, 0),
(1416, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Insert', 'Insert', 0, 0, 0),
(1417, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Attachment', 'Attachment', 0, 0, 0),
(1418, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Info', 'Info', 0, 0, 0),
(1419, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Caption', 'Caption', 0, 0, 0),
(1420, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'File URL', 'File URL', 0, 0, 0),
(1421, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mime Type', 'Mime Type', 0, 0, 0),
(1422, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Current User Information', 'Current User Information', 0, 0, 0),
(1423, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Your IP: ', 'Your IP: ', 0, 0, 0),
(1424, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Your Hostname: ', 'Your Hostname: ', 0, 0, 0),
(1425, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Ban Type', 'Ban Type', 0, 0, 0),
(1426, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Select method', 'Select method', 0, 0, 0),
(1427, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Address/Range', 'Address/Range', 0, 0, 0),
(1428, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '(IP address, domain or hostname)', '(IP address, domain or hostname)', 0, 0, 0),
(1429, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Possibilities:', 'Possibilities:', 0, 0, 0),
(1430, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '- Single IP/Hostname: Fill in either a hostname or IP address in the first field.', '- Single IP/Hostname: Fill in either a hostname or IP address in the first field.', 0, 0, 0),
(1431, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '- IP Range: Put the starting IP address in the left and the ending IP address in the right field.', '- IP Range: Put the starting IP address in the left and the ending IP address in the right field.', 0, 0, 0),
(1432, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '- Referer block: To block google.com put google.com in the first field. To block google altogether.', '- Referer block: To block google.com put google.com in the first field. To block google altogether.', 0, 0, 0),
(1433, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Ban Details', 'Ban Details', 0, 0, 0),
(1434, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Reason', 'Reason', 0, 0, 0),
(1435, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '(optional, shown to victim)', '(optional, shown to victim)', 0, 0, 0),
(1436, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Redirect', 'Redirect', 0, 0, 0),
(1437, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '(optional)', '(optional)', 0, 0, 0),
(1438, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'How long', 'How long', 0, 0, 0),
(1439, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Leave field empty when using permanent. Fill in a number higher than 0 when using another option!', 'Leave field empty when using permanent. Fill in a number higher than 0 when using another option!', 0, 0, 0),
(1440, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Hints and tips:', 'Hints and tips:', 0, 0, 0),
(1441, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '- Banning hosts in the 10.x.x.x / 169.254.x.x / 172.16.x.x or 192.168.x.x range probably won''t work.', '- Banning hosts in the 10.x.x.x / 169.254.x.x / 172.16.x.x or 192.168.x.x range probably won''t work.', 0, 0, 0),
(1442, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '- Banning by internet hostname might work unexpectedly and resulting in banning multiple people from the same ISP!', '- Banning by internet hostname might work unexpectedly and resulting in banning multiple people from the same ISP!', 0, 0, 0),
(1443, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '- Wildcards on IP addresses are allowed. Block 84.234.*.* to block the whole 84.234.x.x range!', '- Wildcards on IP addresses are allowed. Block 84.234.*.* to block the whole 84.234.x.x range!', 0, 0, 0),
(1444, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '- Setting a ban on a range of IP addresses might work unexpected and can result in false positives!', '- Setting a ban on a range of IP addresses might work unexpected and can result in false positives!', 0, 0, 0),
(1445, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '- An IP address always contains 4 parts with numbers no higher than 254 separated by a dot!', '- An IP address always contains 4 parts with numbers no higher than 254 separated by a dot!', 0, 0, 0),
(1446, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '- If a ban does not seem to work try to find out if the person you''re trying to ban doesn''t use <a href=\\"http://en.wikipedia.org/wiki/DHCP\\" target=\\"_blank\\" title=\\"DHCP\\">DHCP.</a>', '- If a ban does not seem to work try to find out if the person you''re trying to ban doesn''t use <a href=\\"http://en.wikipedia.org/wiki/DHCP\\" target=\\"_blank\\" title=\\"DHCP\\">DHCP.</a>', 0, 0, 0),
(1447, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Victims', 'Victims', 0, 0, 0),
(1448, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Redirect to', 'Redirect to', 0, 0, 0),
(1449, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Date Set', 'Date Set', 0, 0, 0),
(1450, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Expiry Date', 'Expiry Date', 0, 0, 0),
(1451, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Never', 'Never', 0, 0, 0),
(1452, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Banned IPs available', 'No Banned IPs available', 0, 0, 0),
(1453, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Block', 'Block', 0, 0, 0),
(1454, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Visibilities', 'Visibilities', 0, 0, 0),
(1455, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Params', 'Params', 0, 0, 0),
(1456, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'unique name for your block', 'unique name for your block', 0, 0, 0),
(1457, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'if you are not sure, choose ''none''', 'if you are not sure, choose ''none''', 0, 0, 0),
(1458, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Enter one URL per line. Leave blank if you want this Block to appear in all pages.', 'Enter one URL per line. Leave blank if you want this Block to appear in all pages.', 0, 0, 0),
(1459, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Apply', 'Apply', 0, 0, 0),
(1460, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Access', 'Access', 0, 0, 0),
(1461, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Title', 'Title', 0, 0, 0),
(1462, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Overview', 'Overview', 0, 0, 0),
(1463, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Value', 'Value', 0, 0, 0),
(1464, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'User Login', 'User Login', 0, 0, 0),
(1465, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Registration', 'Registration', 0, 0, 0),
(1466, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Approved?', 'Approved?', 0, 0, 0),
(1467, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Disapproved', 'Disapproved', 0, 0, 0),
(1468, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Keyword', 'Keyword', 0, 0, 0),
(1469, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add New City', 'Add New City', 0, 0, 0),
(1470, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Country', 'Country', 0, 0, 0),
(1471, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'State', 'State', 0, 0, 0),
(1472, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No cities available', 'No cities available', 0, 0, 0),
(1473, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Contact Info', 'Contact Info', 0, 0, 0),
(1474, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Published', 'Published', 0, 0, 0),
(1475, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Approval', 'Approval', 0, 0, 0),
(1476, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Comment on', 'Comment on', 0, 0, 0),
(1477, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'First Name', 'First Name', 0, 0, 0),
(1478, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Last Name', 'Last Name', 0, 0, 0),
(1479, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Telephone', 'Telephone', 0, 0, 0),
(1480, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Subject', 'Subject', 0, 0, 0),
(1481, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '[Image: CAPTCHA image. You will need to recognize the text in it; audible CAPTCHA available too.]', '[Image: CAPTCHA image. You will need to recognize the text in it; audible CAPTCHA available too.]', 0, 0, 0),
(1482, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'CAPTCHA image', 'CAPTCHA image', 0, 0, 0),
(1483, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Reload CAPTCHA', 'Reload CAPTCHA', 0, 0, 0),
(1484, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Click to play', 'Click to play', 0, 0, 0),
(1485, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Security Code', 'Security Code', 0, 0, 0),
(1486, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Send', 'Send', 0, 0, 0),
(1487, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Filter', 'Filter', 0, 0, 0),
(1488, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add New Country', 'Add New Country', 0, 0, 0),
(1489, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Nationality', 'Nationality', 0, 0, 0),
(1490, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Singular', 'Singular', 0, 0, 0),
(1491, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Plural', 'Plural', 0, 0, 0),
(1492, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Code', 'Code', 0, 0, 0),
(1493, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No countries available', 'No countries available', 0, 0, 0),
(1494, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'said on %s', 'said on %s', 0, 0, 0),
(1495, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Reply', 'Reply', 0, 0, 0),
(1496, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add new comment', 'Add new comment', 0, 0, 0),
(1497, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Go back to original post', 'Go back to original post', 0, 0, 0),
(1498, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Website', 'Website', 0, 0, 0),
(1499, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Post comment', 'Post comment', 0, 0, 0),
(1500, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Register', 'Register', 0, 0, 0),
(1501, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Inbox', 'Inbox', 0, 0, 0),
(1502, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '(change your profile settings)', '(change your profile settings)', 0, 0, 0),
(1503, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'My Account', 'My Account', 0, 0, 0),
(1504, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '(Your account details)', '(Your account details)', 0, 0, 0),
(1505, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Your public profile', 'Your public profile', 0, 0, 0),
(1506, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'My Fund', 'My Fund', 0, 0, 0),
(1507, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '(Your fund details)', '(Your fund details)', 0, 0, 0),
(1508, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Email settings', 'Email settings', 0, 0, 0),
(1509, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Deposit', 'Deposit', 0, 0, 0),
(1510, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Cash Withdrawal', 'Cash Withdrawal', 0, 0, 0),
(1511, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Logout', 'Logout', 0, 0, 0),
(1512, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Posted', 'Posted', 0, 0, 0),
(1513, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'on', 'on', 0, 0, 0),
(1514, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Posted in', 'Posted in', 0, 0, 0),
(1515, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Leave a comment', 'Leave a comment', 0, 0, 0),
(1516, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'All rights reserved', 'All rights reserved', 0, 0, 0),
(1517, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Visit website', 'Visit website', 0, 0, 0),
(1518, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Log out', 'Log out', 0, 0, 0),
(1519, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Unpublished', 'Unpublished', 0, 0, 0),
(1520, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '(eg. \\"displayname &lt;email address>\\")', '(eg. \\"displayname &lt;email address>\\")', 0, 0, 0),
(1521, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No e-mail templates added yet.', 'No e-mail templates added yet.', 0, 0, 0),
(1522, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'A new comment has been posted under: %s', 'A new comment has been posted under: %s', 0, 0, 0),
(1523, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Name: %s', 'Name: %s', 0, 0, 0),
(1524, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Email: %s', 'Email: %s', 0, 0, 0),
(1525, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Website: %s', 'Website: %s', 0, 0, 0),
(1526, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'IP Address: %s', 'IP Address: %s', 0, 0, 0),
(1527, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Comment: %s', 'Comment: %s', 0, 0, 0),
(1528, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'You have received a new message at: %s', 'You have received a new message at: %s', 0, 0, 0),
(1529, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Subject: %s', 'Subject: %s', 0, 0, 0),
(1530, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Message: %s', 'Message: %s', 0, 0, 0),
(1531, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Hello %s', 'Hello %s', 0, 0, 0),
(1532, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Please visit this link to reset your password: %s', 'Please visit this link to reset your password: %s', 0, 0, 0),
(1533, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'If you did not request a password reset, then please ignore this email.', 'If you did not request a password reset, then please ignore this email.', 0, 0, 0),
(1534, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Please visit this link to activate your account: %s', 'Please visit this link to activate your account: %s', 0, 0, 0),
(1535, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Page not found', 'Page not found', 0, 0, 0),
(1536, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Error', 'Error', 0, 0, 0),
(1537, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'The requested address was not found on this server.', 'The requested address was not found on this server.', 0, 0, 0),
(1538, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Security Error', 'Security Error', 0, 0, 0),
(1539, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Upload here', 'Upload here', 0, 0, 0),
(1540, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Create directory', 'Create directory', 0, 0, 0),
(1541, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Create file', 'Create file', 0, 0, 0),
(1542, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'You are here:', 'You are here:', 0, 0, 0),
(1543, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Directory content', 'Directory content', 0, 0, 0),
(1544, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Create', 'Create', 0, 0, 0),
(1545, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Remove', 'Remove', 0, 0, 0),
(1546, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Settings Overview', 'Settings Overview', 0, 0, 0),
(1547, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Warning! Please edit with caution.', 'Warning! Please edit with caution.', 0, 0, 0),
(1548, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Contest Builder', 'Contest Builder', 0, 0, 0),
(1549, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Contest Form and Pricing for Types', 'Contest Form and Pricing for Types', 0, 0, 0),
(1550, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'e.g., Entry Form for logo contest, Webdesign contest, etc', 'e.g., Entry Form for logo contest, Webdesign contest, etc', 0, 0, 0),
(1551, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'CMS Builder', 'CMS Builder', 0, 0, 0),
(1552, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Contents', 'Contents', 0, 0, 0),
(1553, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Blocks for reusable chunks for contents', 'Blocks for reusable chunks for contents', 0, 0, 0),
(1554, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Menus for CMS contents', 'Menus for CMS contents', 0, 0, 0),
(1555, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Manage files in server', 'Manage files in server', 0, 0, 0),
(1556, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Auto detected', 'Auto detected', 0, 0, 0),
(1557, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'City', 'City', 0, 0, 0),
(1558, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Latitude', 'Latitude', 0, 0, 0),
(1559, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Longitude', 'Longitude', 0, 0, 0),
(1560, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Ips available', 'No Ips available', 0, 0, 0),
(1561, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Iso2', 'Iso2', 0, 0, 0),
(1562, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Iso3', 'Iso3', 0, 0, 0),
(1563, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Active Records', 'Active Records', 0, 0, 0),
(1564, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Inactive Records', 'Inactive Records', 0, 0, 0),
(1565, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Disapproved Records', 'Disapproved Records', 0, 0, 0),
(1566, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Total Records', 'Total Records', 0, 0, 0),
(1567, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'ISO2', 'ISO2', 0, 0, 0),
(1568, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'ISO3', 'ISO3', 0, 0, 0),
(1569, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Languages available', 'No Languages available', 0, 0, 0),
(1570, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New Language', 'New Language', 0, 0, 0),
(1571, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Back to Settings', 'Back to Settings', 0, 0, 0),
(1572, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'To reflect setting changes, you need to', 'To reflect setting changes, you need to', 0, 0, 0),
(1573, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'clear cache', 'clear cache', 0, 0, 0),
(1574, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, ' plugin is currently enabled. You can disable it from ', ' plugin is currently enabled. You can disable it from ', 0, 0, 0),
(1575, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'plugins', 'plugins', 0, 0, 0),
(1576, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Back to', 'Back to', 0, 0, 0),
(1577, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, ' You are logged in as Admin', ' You are logged in as Admin', 0, 0, 0),
(1578, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Products Info', 'Products Info', 0, 0, 0),
(1579, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Follow Us On', 'Follow Us On', 0, 0, 0),
(1580, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Link', 'Link', 0, 0, 0),
(1581, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Misc.', 'Misc.', 0, 0, 0),
(1582, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Parent', 'Parent', 0, 0, 0),
(1583, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Link to a Node', 'Link to a Node', 0, 0, 0),
(1584, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New Link', 'New Link', 0, 0, 0),
(1585, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Move up', 'Move up', 0, 0, 0),
(1586, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Move down', 'Move down', 0, 0, 0),
(1587, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Menu', 'Menu', 0, 0, 0),
(1588, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New Menu', 'New Menu', 0, 0, 0),
(1589, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Link Count', 'Link Count', 0, 0, 0),
(1590, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'View links', 'View links', 0, 0, 0),
(1591, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Request Information', 'Request Information', 0, 0, 0),
(1592, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Made On', 'Made On', 0, 0, 0),
(1593, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Winner Selected On?', 'Winner Selected On?', 0, 0, 0),
(1594, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Yes', 'Yes', 0, 0, 0),
(1595, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No', 'No', 0, 0, 0),
(1596, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Completed On?', 'Completed On?', 0, 0, 0),
(1597, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Won Entry', 'Won Entry', 0, 0, 0),
(1598, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Response/Actions', 'Response/Actions', 0, 0, 0),
(1599, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Upload Changes/Final', 'Upload Changes/Final', 0, 0, 0),
(1600, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Need Changes?', 'Need Changes?', 0, 0, 0),
(1601, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Send Message', 'Send Message', 0, 0, 0),
(1602, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Completed?', 'Completed?', 0, 0, 0),
(1603, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Complete Request', 'Complete Request', 0, 0, 0),
(1604, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Reply to Dispute', 'Reply to Dispute', 0, 0, 0),
(1605, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'From', 'From', 0, 0, 0),
(1606, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'To', 'To', 0, 0, 0),
(1607, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Project', 'Project', 0, 0, 0),
(1608, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'To:', 'To:', 0, 0, 0),
(1609, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Dispute discussion', 'Dispute discussion', 0, 0, 0),
(1610, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add more attachment', 'Add more attachment', 0, 0, 0),
(1611, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Created on', 'Created on', 0, 0, 0),
(1612, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Contact', 'Contact', 0, 0, 0),
(1613, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Contactr', 'Contactr', 0, 0, 0),
(1614, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Attached', 'Attached', 0, 0, 0),
(1615, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'view', 'view', 0, 0, 0),
(1616, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No messages available', 'No messages available', 0, 0, 0),
(1617, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Under dispute. Actions can be continued only after dispute gets closed.', 'Under dispute. Actions can be continued only after dispute gets closed.', 0, 0, 0),
(1618, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Dispute Information', 'Dispute Information', 0, 0, 0),
(1619, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Disputed On', 'Disputed On', 0, 0, 0),
(1620, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Disputer', 'Disputer', 0, 0, 0),
(1621, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Disputed', 'Disputed', 0, 0, 0),
(1622, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Dispute Status', 'Dispute Status', 0, 0, 0),
(1623, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Dispute Reason', 'Dispute Reason', 0, 0, 0),
(1624, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Last Replied', 'Last Replied', 0, 0, 0),
(1625, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Dispute Action', 'Dispute Action', 0, 0, 0),
(1626, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Suspended', 'Suspended', 0, 0, 0),
(1627, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'System Flagged', 'System Flagged', 0, 0, 0),
(1628, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Unsuspend Message', 'Unsuspend Message', 0, 0, 0),
(1629, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Suspend Message', 'Suspend Message', 0, 0, 0),
(1630, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Admin Suspended', 'Admin Suspended', 0, 0, 0),
(1631, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Unflagged', 'Unflagged', 0, 0, 0),
(1632, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Post Comment', 'Post Comment', 0, 0, 0),
(1633, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No activities available', 'No activities available', 0, 0, 0),
(1634, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'See All', 'See All', 0, 0, 0),
(1635, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'You have', 'You have', 0, 0, 0),
(1636, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'messages', 'messages', 0, 0, 0),
(1637, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Star', 'Star', 0, 0, 0),
(1638, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'To: ', 'To: ', 0, 0, 0),
(1639, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Me   : ', 'Me   : ', 0, 0, 0),
(1640, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'activities', 'activities', 0, 0, 0),
(1641, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'messages available', 'messages available', 0, 0, 0),
(1642, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Read', 'Read', 0, 0, 0),
(1643, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Unread', 'Unread', 0, 0, 0),
(1644, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Starred', 'Starred', 0, 0, 0),
(1645, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Unstarred', 'Unstarred', 0, 0, 0),
(1646, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Archive', 'Archive', 0, 0, 0),
(1647, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sent Mail', 'Sent Mail', 0, 0, 0),
(1648, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Trash', 'Trash', 0, 0, 0),
(1649, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Compose Message', 'Compose Message', 0, 0, 0),
(1650, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sent a new message', 'Sent a new message', 0, 0, 0),
(1651, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Descending', 'Descending', 0, 0, 0),
(1652, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Ascending', 'Ascending', 0, 0, 0),
(1653, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Freshness', 'Freshness', 0, 0, 0),
(1654, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Private', 'Private', 0, 0, 0),
(1655, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Private Message', 'Private Message', 0, 0, 0),
(1656, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Reply will not allowed in this level', 'Reply will not allowed in this level', 0, 0, 0),
(1657, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Search results', 'Search results', 0, 0, 0),
(1658, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'All,', 'All,', 0, 0, 0),
(1659, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'None,', 'None,', 0, 0, 0),
(1660, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Read,', 'Read,', 0, 0, 0),
(1661, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Unread,', 'Unread,', 0, 0, 0),
(1662, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Starred,', 'Starred,', 0, 0, 0),
(1663, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Drafts', 'Drafts', 0, 0, 0),
(1664, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'me', 'me', 0, 0, 0),
(1665, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No messages matched your search.', 'No messages matched your search.', 0, 0, 0),
(1666, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'General Settings', 'General Settings', 0, 0, 0),
(1667, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Back to Label', 'Back to Label', 0, 0, 0),
(1668, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Back to Starred', 'Back to Starred', 0, 0, 0),
(1669, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'star-select', 'star-select', 0, 0, 0),
(1670, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'show details', 'show details', 0, 0, 0),
(1671, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'from', 'from', 0, 0, 0),
(1672, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'to', 'to', 0, 0, 0),
(1673, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'date', 'date', 0, 0, 0),
(1674, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'at', 'at', 0, 0, 0),
(1675, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'subject', 'subject', 0, 0, 0),
(1676, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Forward', 'Forward', 0, 0, 0),
(1677, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'attachments', 'attachments', 0, 0, 0),
(1678, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Spam', 'Spam', 0, 0, 0);
INSERT INTO `translations` (`id`, `created`, `modified`, `language_id`, `key`, `lang_text`, `is_translated`, `is_google_translate`, `is_verified`) VALUES
(1679, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'private message for ', 'private message for ', 0, 0, 0),
(1680, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Login to view', 'Login to view', 0, 0, 0),
(1681, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Public message for all', 'Public message for all', 0, 0, 0),
(1682, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Publishing', 'Publishing', 0, 0, 0),
(1683, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sort by:', 'Sort by:', 0, 0, 0),
(1684, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'When cron is not working, you may trigger it by clicking below link. For the processes that happen during a cron run, refer the ', 'When cron is not working, you may trigger it by clicking below link. For the processes that happen during a cron run, refer the ', 0, 0, 0),
(1685, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Manually trigger cron to update contest status', 'Manually trigger cron to update contest status', 0, 0, 0),
(1686, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'You can use this to update contest status. This will be used in the scenario where cron is not working.', 'You can use this to update contest status. This will be used in the scenario where cron is not working.', 0, 0, 0),
(1687, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translate in a new language', 'Translate in a new language', 0, 0, 0),
(1688, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No translations available.', 'No translations available.', 0, 0, 0),
(1689, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Plenty of creative minds, many solutions,Graphic design, Industrial design and many more ...', 'Plenty of creative minds, many solutions,Graphic design, Industrial design and many more ...', 0, 0, 0),
(1690, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Client creates a contest for particular design and submits brief.', 'Client creates a contest for particular design and submits brief.', 0, 0, 0),
(1691, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Designers submit the designs to particular contest. Client gives feedback and rates the designs', 'Designers submit the designs to particular contest. Client gives feedback and rates the designs', 0, 0, 0),
(1692, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Submission closes. Client reviews highest rated designs. Designers can vote for one design per contest, other than their own design.', 'Submission closes. Client reviews highest rated designs. Designers can vote for one design per contest, other than their own design.', 0, 0, 0),
(1693, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Client chooses winning entry. Designer gets awarded.', 'Client chooses winning entry. Designer gets awarded.', 0, 0, 0),
(1694, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No items found.', 'No items found.', 0, 0, 0),
(1695, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add Payment Gateway Settings', 'Add Payment Gateway Settings', 0, 0, 0),
(1696, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Edit %s Settings', 'Edit %s Settings', 0, 0, 0),
(1697, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment Gateway Setting Update', 'Payment Gateway Setting Update', 0, 0, 0),
(1698, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sorry no settings added.', 'Sorry no settings added.', 0, 0, 0),
(1699, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment Gateway Settings', 'Payment Gateway Settings', 0, 0, 0),
(1700, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Payment Gateway Settings available', 'No Payment Gateway Settings available', 0, 0, 0),
(1701, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment Gateway Setting', 'Payment Gateway Setting', 0, 0, 0),
(1702, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment Gateway Id', 'Payment Gateway Id', 0, 0, 0),
(1703, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Test Mode?', 'Test Mode?', 0, 0, 0),
(1704, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mass Pay Enabled?', 'Mass Pay Enabled?', 0, 0, 0),
(1705, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Enable for Contest listing', 'Enable for Contest listing', 0, 0, 0),
(1706, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Enable for Signup', 'Enable for Signup', 0, 0, 0),
(1707, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Enable for add to wallet', 'Enable for add to wallet', 0, 0, 0),
(1708, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payee Details', 'Payee Details', 0, 0, 0),
(1709, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Adaptive Payment Details', 'Adaptive Payment Details', 0, 0, 0),
(1710, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Adaptive used to send money to host.', 'Adaptive used to send money to host.', 0, 0, 0),
(1711, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Create Adaptive API from PayPal profile. Refer', 'Create Adaptive API from PayPal profile. Refer', 0, 0, 0),
(1712, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Merchant Referral Bonus ID', 'Merchant Referral Bonus ID', 0, 0, 0),
(1713, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Copy your ID, which is at the end of the Referral Email URL: ', 'Copy your ID, which is at the end of the Referral Email URL: ', 0, 0, 0),
(1714, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mass Payment Details', 'Mass Payment Details', 0, 0, 0),
(1715, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Masspay used to send money to user.', 'Masspay used to send money to user.', 0, 0, 0),
(1716, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Create masspay API from paypal profile. Refer', 'Create masspay API from paypal profile. Refer', 0, 0, 0),
(1717, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'display_name', 'display_name', 0, 0, 0),
(1718, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Where to use?', 'Where to use?', 0, 0, 0),
(1719, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mass Pay', 'Mass Pay', 0, 0, 0),
(1720, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Wallet', 'Wallet', 0, 0, 0),
(1721, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Contest Listing', 'Contest Listing', 0, 0, 0),
(1722, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Signup', 'Signup', 0, 0, 0),
(1723, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Payment Gateways available', 'No Payment Gateways available', 0, 0, 0),
(1724, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Gateway Fees', 'Gateway Fees', 0, 0, 0),
(1725, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Transaction Count', 'Transaction Count', 0, 0, 0),
(1726, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment Gateway Setting Count', 'Payment Gateway Setting Count', 0, 0, 0),
(1727, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Is Test Mode', 'Is Test Mode', 0, 0, 0),
(1728, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Is Auto Approved', 'Is Auto Approved', 0, 0, 0),
(1729, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Is Active', 'Is Active', 0, 0, 0),
(1730, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Pay with Paypal Standard', 'Pay with Paypal Standard', 0, 0, 0),
(1731, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Pay with Paypal', 'Pay with Paypal', 0, 0, 0),
(1732, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Pay by Wallet', 'Pay by Wallet', 0, 0, 0),
(1733, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Pay Membership Fee', 'Pay Membership Fee', 0, 0, 0),
(1734, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Listing Fee', 'Listing Fee', 0, 0, 0),
(1735, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New Region', 'New Region', 0, 0, 0),
(1736, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Setting Category', 'Setting Category', 0, 0, 0),
(1737, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Translations add', 'Translations add', 0, 0, 0),
(1738, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Application Info', 'Application Info', 0, 0, 0),
(1739, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Credentials', 'Credentials', 0, 0, 0),
(1740, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Other Info', 'Other Info', 0, 0, 0),
(1741, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Here you can update Facebook credentials . Click ''Update Facebook Credentials'' link below and Follow the steps. Please make sure that you have updated the API Key and Secret before you click this link.', 'Here you can update Facebook credentials . Click ''Update Facebook Credentials'' link below and Follow the steps. Please make sure that you have updated the API Key and Secret before you click this link.', 0, 0, 0),
(1742, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Here you can update Twitter credentials like Access key and Accss Token. Click ''Update Twitter Credentials'' link below and Follow the steps. Please make sure that you have updated the Consumer Key and  Consumer secret before you click this link.', 'Here you can update Twitter credentials like Access key and Accss Token. Click ''Update Twitter Credentials'' link below and Follow the steps. Please make sure that you have updated the Consumer Key and  Consumer secret before you click this link.', 0, 0, 0),
(1743, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '<span>Update Facebook Credentials</span>', '<span>Update Facebook Credentials</span>', 0, 0, 0),
(1744, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Here you can update Facebook credentials . Click this link and Follow the steps. Please make sure that you have updated the API Key and Secret before you click this link.', 'Here you can update Facebook credentials . Click this link and Follow the steps. Please make sure that you have updated the API Key and Secret before you click this link.', 0, 0, 0),
(1745, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '<span>Update Twitter Credentials</span>', '<span>Update Twitter Credentials</span>', 0, 0, 0),
(1746, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Here you can update Twitter credentials like Access key and Accss Token. Click this link and Follow the steps. Please make sure that you have updated the Consumer Key and  Consumer secret before you click this link.', 'Here you can update Twitter credentials like Access key and Accss Token. Click this link and Follow the steps. Please make sure that you have updated the Consumer Key and  Consumer secret before you click this link.', 0, 0, 0),
(1747, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'hrs', 'hrs', 0, 0, 0),
(1748, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Watermark image', 'Watermark image', 0, 0, 0),
(1749, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Not Allow Beyond Original', 'Not Allow Beyond Original', 0, 0, 0),
(1750, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Allow Handle Aspect', 'Allow Handle Aspect', 0, 0, 0),
(1751, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No settings available', 'No settings available', 0, 0, 0),
(1752, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add New State', 'Add New State', 0, 0, 0),
(1753, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No states available', 'No states available', 0, 0, 0),
(1754, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Term', 'Term', 0, 0, 0),
(1755, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New Term', 'New Term', 0, 0, 0),
(1756, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Slug', 'Slug', 0, 0, 0),
(1757, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Credit', 'Credit', 0, 0, 0),
(1758, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Transaction Types available', 'No Transaction Types available', 0, 0, 0),
(1759, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'CSV', 'CSV', 0, 0, 0),
(1760, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Export This Report In CSV', 'Export This Report In CSV', 0, 0, 0),
(1761, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Debit', 'Debit', 0, 0, 0),
(1762, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Transactions available', 'No Transactions available', 0, 0, 0),
(1763, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Account Summary', 'Account Summary', 0, 0, 0),
(1764, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Account Balance', 'Account Balance', 0, 0, 0),
(1765, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Withdraw Request', 'Withdraw Request', 0, 0, 0),
(1766, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'all', 'all', 0, 0, 0),
(1767, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'To ', 'To ', 0, 0, 0),
(1768, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Total ', 'Total ', 0, 0, 0),
(1769, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Taxonomy', 'Taxonomy', 0, 0, 0),
(1770, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Format', 'Format', 0, 0, 0),
(1771, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Show author''s name', 'Show author''s name', 0, 0, 0),
(1772, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Show date', 'Show date', 0, 0, 0),
(1773, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Disabled', 'Disabled', 0, 0, 0),
(1774, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Read only', 'Read only', 0, 0, 0),
(1775, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Read/Write', 'Read/Write', 0, 0, 0),
(1776, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Spam protection (requires Akismet API key)', 'Spam protection (requires Akismet API key)', 0, 0, 0),
(1777, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Use captcha? (requires Recaptcha API key)', 'Use captcha? (requires Recaptcha API key)', 0, 0, 0),
(1778, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'You can manage your API keys here.', 'You can manage your API keys here.', 0, 0, 0),
(1779, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New Type', 'New Type', 0, 0, 0),
(1780, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No User Add Wallet Amounts available', 'No User Add Wallet Amounts available', 0, 0, 0),
(1781, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Added on', 'Added on', 0, 0, 0),
(1782, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Favorite User', 'Favorite User', 0, 0, 0),
(1783, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No user favorites available', 'No user favorites available', 0, 0, 0),
(1784, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No. of Entries', 'No. of Entries', 0, 0, 0),
(1785, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Winning Contests', 'Winning Contests', 0, 0, 0),
(1786, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Liked %s available', 'No Liked %s available', 0, 0, 0),
(1787, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No User Flag Categories available', 'No User Flag Categories available', 0, 0, 0),
(1788, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Flag This User', 'Flag This User', 0, 0, 0),
(1789, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No User Flags available', 'No User Flags available', 0, 0, 0),
(1790, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Login Time', 'Login Time', 0, 0, 0),
(1791, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Login IP', 'Login IP', 0, 0, 0),
(1792, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'User Agent', 'User Agent', 0, 0, 0),
(1793, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No User Logins available', 'No User Logins available', 0, 0, 0),
(1794, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Send notification when your contest receives a new entry.', 'Send notification when your contest receives a new entry.', 0, 0, 0),
(1795, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Send notification when your entry awarded.', 'Send notification when your entry awarded.', 0, 0, 0),
(1796, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Send notification when your awarded contest completed.', 'Send notification when your awarded contest completed.', 0, 0, 0),
(1797, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Send acknowledgement notification when you awarded the entry.', 'Send acknowledgement notification when you awarded the entry.', 0, 0, 0),
(1798, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Send acknowledgement notification when you completed the contest.', 'Send acknowledgement notification when you completed the contest.', 0, 0, 0),
(1799, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Send notification when any activities in your awarded contest.', 'Send notification when any activities in your awarded contest.', 0, 0, 0),
(1800, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Add New OpenID', 'Add New OpenID', 0, 0, 0),
(1801, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No User Openids available', 'No User Openids available', 0, 0, 0),
(1802, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Manage your OpenIDs', 'Manage your OpenIDs', 0, 0, 0),
(1803, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'The following OpenIDs are currently attached to your %s account. You can use any of them to sign in.', 'The following OpenIDs are currently attached to your %s account. You can use any of them to sign in.', 0, 0, 0),
(1804, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No OpenIDs available', 'No OpenIDs available', 0, 0, 0),
(1805, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Attach a new OpenID', 'Attach a new OpenID', 0, 0, 0),
(1806, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Edit Profile - %s', 'Edit Profile - %s', 0, 0, 0),
(1807, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'PayPal Email', 'PayPal Email', 0, 0, 0),
(1808, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'PayPal First Name', 'PayPal First Name', 0, 0, 0),
(1809, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'As given in PayPal', 'As given in PayPal', 0, 0, 0),
(1810, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'PayPal Last Name', 'PayPal Last Name', 0, 0, 0),
(1811, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Viewed Time', 'Viewed Time', 0, 0, 0),
(1812, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Viewed User', 'Viewed User', 0, 0, 0),
(1813, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'You have not yet activated your account. Please activate it. If you have not received the activation mail, %s to resend the activation mail.', 'You have not yet activated your account. Please activate it. If you have not received the activation mail, %s to resend the activation mail.', 0, 0, 0),
(1814, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Password', 'Password', 0, 0, 0),
(1815, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Diagnostics are for developer purpose only.', 'Diagnostics are for developer purpose only.', 0, 0, 0),
(1816, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Payment Transaction Log', 'Payment Transaction Log', 0, 0, 0),
(1817, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'View the transaction details done via Normal PayPal', 'View the transaction details done via Normal PayPal', 0, 0, 0),
(1818, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Adaptive Payment Transaction Log', 'Adaptive Payment Transaction Log', 0, 0, 0),
(1819, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'View the transaction details done via PayPal Adaptive Payment', 'View the transaction details done via PayPal Adaptive Payment', 0, 0, 0),
(1820, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Mass Payment Transaction Log', 'Mass Payment Transaction Log', 0, 0, 0),
(1821, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'View the transaction details done via Mass PayPal', 'View the transaction details done via Mass PayPal', 0, 0, 0),
(1822, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Debug & Error Log', 'Debug & Error Log', 0, 0, 0),
(1823, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'View debug, error log, used cache memory and used log memory', 'View debug, error log, used cache memory and used log memory', 0, 0, 0),
(1824, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Edit User', 'Edit User', 0, 0, 0),
(1825, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Reset password', 'Reset password', 0, 0, 0),
(1826, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Available Balance', 'Available Balance', 0, 0, 0),
(1827, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Logins', 'Logins', 0, 0, 0),
(1828, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Registered on', 'Registered on', 0, 0, 0),
(1829, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Earned', 'Earned', 0, 0, 0),
(1830, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Count', 'Count', 0, 0, 0),
(1831, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Time', 'Time', 0, 0, 0),
(1832, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Resend Activation', 'Resend Activation', 0, 0, 0),
(1833, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Change password', 'Change password', 0, 0, 0),
(1834, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Admin', 'Admin', 0, 0, 0),
(1835, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No users available', 'No users available', 0, 0, 0),
(1836, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Forgot password?', 'Forgot password?', 0, 0, 0),
(1837, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Log In', 'Log In', 0, 0, 0),
(1838, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Online Users', 'Online Users', 0, 0, 0),
(1839, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No users online', 'No users online', 0, 0, 0),
(1840, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Recently Registered Users', 'Recently Registered Users', 0, 0, 0),
(1841, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Recently no users registered', 'Recently no users registered', 0, 0, 0),
(1842, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Current Password', 'Current Password', 0, 0, 0),
(1843, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New Password', 'New Password', 0, 0, 0),
(1844, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Reset', 'Reset', 0, 0, 0),
(1845, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Timings', 'Timings', 0, 0, 0),
(1846, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Current time: ', 'Current time: ', 0, 0, 0),
(1847, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Last login: ', 'Last login: ', 0, 0, 0),
(1848, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, '360Contest', '360Contest', 0, 0, 0),
(1849, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Version', 'Version', 0, 0, 0),
(1850, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Product Support', 'Product Support', 0, 0, 0),
(1851, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Product Manual', 'Product Manual', 0, 0, 0),
(1852, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'CSSilize', 'CSSilize', 0, 0, 0),
(1853, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'My Blog', 'My Blog', 0, 0, 0),
(1854, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Redirecting you to authorize %s', 'Redirecting you to authorize %s', 0, 0, 0),
(1855, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'If your browser doesn''t redirect you please %s to continue.', 'If your browser doesn''t redirect you please %s to continue.', 0, 0, 0),
(1856, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Old Password', 'Old Password', 0, 0, 0),
(1857, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Confirm Password', 'Confirm Password', 0, 0, 0),
(1858, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Forgot your password?', 'Forgot your password?', 0, 0, 0),
(1859, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Enter your Email, and we will send you instructions for resetting your password.', 'Enter your Email, and we will send you instructions for resetting your password.', 0, 0, 0),
(1860, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Graphic Design ', 'Graphic Design ', 0, 0, 0),
(1861, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Won Count', 'Won Count', 0, 0, 0),
(1862, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Avg Rating', 'Avg Rating', 0, 0, 0),
(1863, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'No Top %s available', 'No Top %s available', 0, 0, 0),
(1864, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign in using: ', 'Sign in using: ', 0, 0, 0),
(1865, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign in with Facebook', 'Sign in with Facebook', 0, 0, 0),
(1866, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign in with Twitter', 'Sign in with Twitter', 0, 0, 0),
(1867, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign in with Yahoo', 'Sign in with Yahoo', 0, 0, 0),
(1868, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign in with Gmail', 'Sign in with Gmail', 0, 0, 0),
(1869, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign in with Open ID', 'Sign in with Open ID', 0, 0, 0),
(1870, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Remember me on this computer.', 'Remember me on this computer.', 0, 0, 0),
(1871, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Login via OpenID', 'Login via OpenID', 0, 0, 0),
(1872, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign up using: ', 'Sign up using: ', 0, 0, 0),
(1873, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign up with Facebook', 'Sign up with Facebook', 0, 0, 0),
(1874, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign up with Twitter', 'Sign up with Twitter', 0, 0, 0),
(1875, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign up with Yahoo', 'Sign up with Yahoo', 0, 0, 0),
(1876, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign up with Gmail', 'Sign up with Gmail', 0, 0, 0),
(1877, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Sign up with Open ID', 'Sign up with Open ID', 0, 0, 0),
(1878, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'I have read, understood & agree to the %s', 'I have read, understood & agree to the %s', 0, 0, 0),
(1879, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Reset your password', 'Reset your password', 0, 0, 0),
(1880, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Enter a new password', 'Enter a new password', 0, 0, 0),
(1881, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Since:', 'Since:', 0, 0, 0),
(1882, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Last Activity:', 'Last Activity:', 0, 0, 0),
(1883, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Contact Me', 'Contact Me', 0, 0, 0),
(1884, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Vocabulary', 'Vocabulary', 0, 0, 0),
(1885, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Options', 'Options', 0, 0, 0),
(1886, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'New Vocabulary', 'New Vocabulary', 0, 0, 0),
(1887, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'View terms', 'View terms', 0, 0, 0),
(1888, '2012-04-17 02:29:49', '2012-04-17 02:29:49', 42, 'Debug setting does not allow access to this url.', 'Debug setting does not allow access to this url.', 0, 0, 0);

-- ---------------------------------------------------------------------------------

INSERT INTO `settings` (`id`, `setting_category_id`, `setting_category_parent_id`, `name`, `value`, `description`, `type`, `options`, `label`, `order`) VALUES
(171, 50, 15, 'google.translation_api_key', '', 'This is the configured Google Translate API key.', 'text', NULL, 'API Key', 0);

INSERT INTO `setting_categories` (`id`, `created`, `modified`, `parent_id`, `name`, `description`) VALUES
(50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 'Google Translations', '<p>We use this service for quick translation to support new languages in ##TRANSLATIONADD##.</p> <p>Note that Google Translate API is now a <a href="http://code.google.com/apis/language/translate/v2/pricing.html" target="_blank">paid service</a>.</p>');
