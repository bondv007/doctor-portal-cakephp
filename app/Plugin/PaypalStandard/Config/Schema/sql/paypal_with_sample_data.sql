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
-- Table structure for table `paypal_transaction_logs`
--

DROP TABLE IF EXISTS `paypal_transaction_logs`;
CREATE TABLE IF NOT EXISTS `paypal_transaction_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` bigint(20) DEFAULT '0',
  `transaction_id` bigint(20) DEFAULT '0',
  `user_cash_withdrawal_id` bigint(20) NOT NULL,
  `contest_user_id` bigint(20) NOT NULL,
  `ip_id` bigint(20) DEFAULT NULL,
  `host` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `currency_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payer_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_date` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_digicurrency` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_account_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_account_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fees_paid_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_gross` double(50,5) DEFAULT NULL,
  `mc_fee` double(50,5) DEFAULT NULL,
  `mc_currency` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pending_reason` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_response` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `error_no` tinyint(4) DEFAULT '0',
  `error_message` text COLLATE utf8_unicode_ci NOT NULL,
  `memo` text COLLATE utf8_unicode_ci,
  `paypal_post_vars` text COLLATE utf8_unicode_ci,
  `is_mass_pay` tinyint(1) DEFAULT '0',
  `mass_pay_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masspay_response` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `txn_id` (`txn_id`),
  KEY `user_id` (`user_id`),
  KEY `transaction_id` (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paypal_transaction_logs`
--


-- --------------------------------------------------------
