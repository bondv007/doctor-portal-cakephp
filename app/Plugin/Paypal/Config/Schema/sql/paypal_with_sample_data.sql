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
-- Table structure for table `adaptive_transaction_logs`
--

DROP TABLE IF EXISTS `adaptive_transaction_logs`;
CREATE TABLE IF NOT EXISTS `adaptive_transaction_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `class` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_id` bigint(20) NOT NULL,
  `transaction_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contest_user_id` bigint(20) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primary` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refunded_amount` double(10,2) DEFAULT NULL,
  `pending_refund` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_transaction_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_transaction_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ack` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correlation_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `build` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tracking_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fees_payer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memo` text COLLATE utf8_unicode_ci,
  `reverse_all_parallel_payments_on_error` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_net_amount` double(10,2) DEFAULT NULL,
  `refund_fee_amount` double(10,2) DEFAULT NULL,
  `refund_gross_amount` double(10,2) DEFAULT NULL,
  `total_of_alll_refunds` double(10,2) DEFAULT NULL,
  `refund_has_become_full` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `encrypted_refund_transaction_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_transaction_status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_post_vars` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `transaction_id` (`transaction_id`),
  KEY `class` (`class`),
  KEY `foreign_id` (`foreign_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `sender_transaction_id` (`sender_transaction_id`),
  KEY `correlation_id` (`correlation_id`),
  KEY `tracking_id` (`tracking_id`),
  KEY `encrypted_refund_transaction_id` (`encrypted_refund_transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adaptive_ipn_logs`
--

-- -----------------------------------------------------------------------

--
-- Table structure for table `adaptive_ipn_logs`
--

DROP TABLE IF EXISTS `adaptive_ipn_logs`;
CREATE TABLE IF NOT EXISTS `adaptive_ipn_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_variable` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adaptive_ipn_logs`
--

INSERT INTO `adaptive_ipn_logs` (`id`, `created`, `modified`, `ip`, `post_variable`) VALUES
(1, '2012-03-12 10:21:07', '2012-03-12 10:21:07', '127.0.0.1', '_method=POST&data[_Token][key]=c046f4c26a2fa50134b89b0244cd070ffc4f4586&data[_Token][fields]=c3e86cdfe59f52ad19b422863e0742743142eb7f%253AContest.id&data[_Token][unlocked]=Payment.connect%257CPayment.normal%257CPayment.payment_type%257CPayment.wallet&data[Contest][id]=14&data[Payment][payment_gateway_id]=2&');

-- -----------------------------------------------------------------------

ALTER TABLE `user_profiles` ADD `paypal_account` VARCHAR( 255 ) NOT NULL AFTER `dob` , 
ADD `paypal_first_name` VARCHAR( 255 ) NOT NULL AFTER `paypal_account` , 
ADD `paypal_last_name` VARCHAR( 255 ) NOT NULL AFTER `paypal_first_name` ;

