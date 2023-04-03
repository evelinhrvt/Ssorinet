-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2023 at 09:26 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `sorinet`
--

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
    `id` int(50) NOT NULL AUTO_INCREMENT,
    `linkek` varchar(500) NOT NULL,
    `resz` int(50) NOT NULL,
    `sorozatid` int(50) NOT NULL,
    `hostnev` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `link`
--


-- --------------------------------------------------------

--
-- Table structure for table `sorozat`
--

CREATE TABLE IF NOT EXISTS `sorozat` (
    `id` int(50) NOT NULL AUTO_INCREMENT,
    `nev` varchar(500) NOT NULL,
    `imd` varchar(500) NOT NULL,
    `kep` varchar(500) NOT NULL,
    `leiras` varchar(500) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sorozat`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
    `id` int(50) NOT NULL AUTO_INCREMENT,
    `nev` varchar(50) NOT NULL,
    `jelszo` varchar(255) NOT NULL,
    `email` varchar(100) NOT NULL,
    `kep` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--

