-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 07, 2024 alle 18:08
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoAereoporto`
--
CREATE DATABASE IF NOT EXISTS `autoAereoporto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `autoAereoporto`;

-- --------------------------------------------------------

--
-- Struttura della tabella `Aeroporti`
--

CREATE TABLE `Aeroporti` (
  `nome` varchar(128) NOT NULL,
  `Codice` varchar(3) NOT NULL,
  `via` varchar(64) NOT NULL,
  `citta` varchar(64) NOT NULL,
  `nazione` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Aeroporti`
--

INSERT INTO `Aeroporti` (`nome`, `Codice`, `via`, `citta`, `nazione`) VALUES
('Charles de Gaulle', 'CDG', '95700 Roissy-en-France', 'Roissy-en-France', 'Francia'),
('Dubai International Airport', 'DXB', 'Dubai', 'Dubai', 'Emirati Arabi Uniti'),
('Leonardo Da Vinci', 'FCO', 'Via dell\'Aeroporto di Fiumicino, 320', 'Fiumicino\r\n', 'Italia'),
('Frankfurt Airport', 'FRA', '60547 Frankfurt am Main', 'Francoforte', 'Germania\r\n'),
('Airport John Fitzgerald Kennedy International', 'JFK', 'Queens, NY', 'New York', 'Stati Uniti d\'America'),
('Milano Malpensa', 'MXP', '21010 Ferno VA', 'Milano', 'Italia'),
('Narita International Airport', 'NRT', '1-1 Furugome, Narita', 'Tokyo', 'Giappone'),
('Chicago-O\'Hare International Airport', 'ORD', '10000 W Balmoral Ave', 'Chicago', 'Stati Uniti');

-- --------------------------------------------------------

--
-- Struttura della tabella `ImmaginiVeicoli`
--

CREATE TABLE `ImmaginiVeicoli` (
  `Id` int(11) NOT NULL,
  `marca` varchar(64) NOT NULL,
  `modello` varchar(64) NOT NULL,
  `linkImmagine` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ImmaginiVeicoli`
--

INSERT INTO `ImmaginiVeicoli` (`Id`, `marca`, `modello`, `linkImmagine`) VALUES
(1, 'Ford', 'Fiesta', 'https://img.freepik.com/premium-photo/car-isolated-white-background-fiat-500x-rugged-looking-subcompact-crossover-suv-w-white-black_655090-606461.jpg?w=360'),
(2, 'Skoda', 'Octavia', 'https://motori.corriereadriatico.it/photos/HIGH/60/09/5066009_1258_octavia_054.jpg'),
(3, 'Nissan', 'Qashqai', 'https://img.freepik.com/premium-photo/car-isolated-white-background-nissan-rogue-white-car-blank-clean-white-backgro-white-black_655090-606674.jpg'),
(4, 'Audi', 'A3', 'https://img.freepik.com/premium-photo/car-isolated-white-background-audi-a3-sedan-white-car-blank-clean-white-backgr-white-black_655090-605329.jpg'),
(5, 'Land Rover', 'Discovery', 'https://img.freepik.com/premium-photo/car-isolated-white-background-land-rover-discovery-sport-white-car-blank-clean-white-black_655090-607630.jpg'),
(6, 'Peugeot', '208', 'https://visuel3d-secure.peugeot.com/V3DImage.ashx?client=SOLVCG&ratio=1&format=jpg&quality=90&width=1280&height=100%&back=0&view=002&version=1PP2A5HJUJB0A0F4&color=0MM00NEQ&trim=0PAP0RFX&mkt=IT'),
(7, 'Toyota', 'RAV4', 'https://img.freepik.com/premium-photo/car-isolated-white-background-toyota-rav4-white-car-blank-clean-white-backgrou-white-black_655090-605771.jpg'),
(8, 'BMW', 'X3', 'https://img.freepik.com/premium-photo/car-isolated-white-background-bmw-x3-white-car-blank-clean-white-background-tu-white-black_655090-606182.jpg'),
(9, 'Renault', 'Kangoo', 'https://cdnwp.dealerk.com/eed49ed7/uploads/sites/240/2018/03/kangoo-ze-elettrico.jpg'),
(10, 'Fiat', 'Ducato', 'https://www.auto-mobili.it/wp-content/uploads/2020/04/FIAT-DUCATO-PROFESSIONAL.png'),
(11, 'Hyundai', 'i20', 'https://cdn.motor1.com/images/mgl/gJVkm/s3/wcf-hyundai-i20-sport-hyundai-i20-sport1.jpg'),
(12, 'Opel', 'Corsa', 'https://1884403144.rsc.cdn77.org/foto/opel-corsa-e-opel-corsa-e/NjkweDQyNS9jZW50ZXIvbWlkZGxlL3NtYXJ0L2ZpbHRlcnM6cXVhbGl0eSg4NSkvaW1n/6042076.jpg?v=0&st=ObGaYRYRcoOjMUwTFOKlbzk7IxzpSh2k95vAsZ-MPEs&ts=1600812000&e=0'),
(13, 'Mercedes-Benz', 'Vito', 'https://img.freepik.com/premium-photo/isolated-mercedesbenz-evito-electric-cargo-van-2023-model-highroof-white-background-photo_655090-644385.jpg'),
(14, 'Kia', 'Sportage', 'https://www.ilnoleggioalungotermine.it/wordpress/wp-content/uploads/2013/04/2011-Kia-Sportage-0-728x485.jpg'),
(15, 'Seat', 'Ibiza', 'https://storage.edidomus.it/ListinoAuto/webFoto_16_9_640/90024342.jpg'),
(16, 'Mitsubishi', 'Outlander', 'https://s1.1zoom.me/big0/319/Mitsubishi_JP-spec_Outlander_PHEV_Accessorized_581133_1280x853.jpg'),
(17, 'Citroen', 'Berlingo', 'https://prod.pictures.autoscout24.net/listing-images/c3d74942-d411-49bd-a4dc-a59c40eaf0ae_28a61dc4-4de1-4e67-9f4c-30da346dacef.jpg/1920x1080.webp'),
(18, 'Volkswagen', 'Golf', 'https://st2.depositphotos.com/1358992/6523/i/450/depositphotos_65233845-stock-photo-family-car-vw-golf.jpg'),
(19, 'Volvo', 'XC90', 'https://img.freepik.com/premium-photo/car-isolated-white-background-volvo-xc90-suv-white-car-blank-clean-white-backg-white-black_655090-606490.jpg'),
(20, 'Jeep', 'Wrangler', 'https://img.freepik.com/premium-photo/car-isolated-white-background-jeep-wrangler-white-car-blank-clean-white-backgr-white-black_655090-605162.jpg'),
(21, 'null', 'null', 'https://dimages2.gazzettaobjects.it/files/image_620_388/uploads/2022/01/31/61f7934554cd8.jpeg');

-- --------------------------------------------------------

--
-- Struttura della tabella `Parcheggio`
--

CREATE TABLE `Parcheggio` (
  `codice` int(6) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `citta` varchar(64) NOT NULL,
  `indirizzo` varchar(64) NOT NULL,
  `aeroporto` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Parcheggio`
--

INSERT INTO `Parcheggio` (`codice`, `nome`, `citta`, `indirizzo`, `aeroporto`) VALUES
(101234, 'Parcheggio delle Emozioni', 'Parigi', 'Via delle Emozioni 901', 'CDG'),
(102345, 'Parcheggio della Felicità', 'Dubai', 'Via delle Fate 234', 'DXB'),
(112345, 'Parcheggio della Libertà', 'Roma', 'Via della Libertà 234', 'FCO'),
(123456, 'Parcheggio delle Nuvole', 'Milano', 'Via dei Girasoli 123', 'MXP'),
(213456, 'Parcheggio dei Ricordi', 'Parigi', 'Via dei Ricci 567', 'CDG'),
(234567, 'Parcheggio dei Sogni', 'Dubai', 'Via delle Palme 456', 'DXB'),
(324567, 'Parcheggio dei Desideri', 'Roma', 'Via dei Sogni 890', 'FCO'),
(345678, 'Parcheggio delle Stelle', 'Parigi', 'Via dei Fiori 789', 'CDG'),
(435678, 'Parcheggio delle Risate', 'Francoforte', 'Via delle Risorse 123', 'FRA'),
(456789, 'Parcheggio del Sole', 'Roma', 'Via delle Farfalle 234', 'FCO'),
(546789, 'Parcheggio del Vento', 'Tokyo', 'Via dei Venti 456', 'NRT'),
(567890, 'Parcheggio dei Sorrisi', 'Francoforte', 'Via dei Papaveri 567', 'FRA'),
(657890, 'Parcheggio della Musica', 'Chicago', 'Via della Musica 789', 'ORD'),
(678901, 'Parcheggio dei Sakura', 'Tokyo', 'Via dei Ciliegi 890', 'NRT'),
(768901, 'Parcheggio degli Amici', 'New York', 'Via degli Amici 012', 'JFK'),
(789012, 'Parcheggio delle Onde', 'Chicago', 'Via delle Conchiglie 345', 'ORD'),
(879012, 'Parcheggio delle Meraviglie', 'Milano', 'Via delle Meraviglie 345', 'MXP'),
(890123, 'Parcheggio delle Luci', 'New York', 'Via degli Angeli 678', 'JFK'),
(901234, 'Parcheggio degli Arcobaleni', 'Milano', 'Via delle Stelle 901', 'MXP'),
(990123, 'Parcheggio del Cielo', 'Dubai', 'Via del Cielo 678', 'DXB');

-- --------------------------------------------------------

--
-- Struttura della tabella `PostoAuto`
--

CREATE TABLE `PostoAuto` (
  `Numero` int(6) NOT NULL,
  `CodiceParcheggio` int(6) NOT NULL,
  `Dimensioni` varchar(16) NOT NULL,
  `CostoGiornaliero` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `PostoAuto`
--

INSERT INTO `PostoAuto` (`Numero`, `CodiceParcheggio`, `Dimensioni`, `CostoGiornaliero`) VALUES
(1, 101234, 'Grande', '15.00'),
(1, 102345, 'Grande', '15.00'),
(1, 112345, 'Grande', '15.00'),
(1, 123456, 'Grande', '15.00'),
(1, 213456, 'Grande', '15.00'),
(1, 234567, 'Grande', '15.00'),
(1, 324567, 'Grande', '15.00'),
(1, 345678, 'Grande', '15.00'),
(1, 435678, 'Grande', '15.00'),
(1, 456789, 'Grande', '15.00'),
(1, 546789, 'Grande', '15.00'),
(1, 567890, 'Grande', '15.00'),
(1, 657890, 'Grande', '15.00'),
(1, 678901, 'Grande', '15.00'),
(1, 768901, 'Grande', '15.00'),
(1, 789012, 'Grande', '15.00'),
(1, 879012, 'Grande', '15.00'),
(1, 890123, 'Grande', '15.00'),
(1, 901234, 'Grande', '15.00'),
(1, 990123, 'Grande', '15.00'),
(2, 101234, 'Grande', '15.00'),
(2, 102345, 'Grande', '15.00'),
(2, 112345, 'Grande', '15.00'),
(2, 123456, 'Grande', '15.00'),
(2, 213456, 'Grande', '15.00'),
(2, 234567, 'Grande', '15.00'),
(2, 324567, 'Grande', '15.00'),
(2, 345678, 'Grande', '15.00'),
(2, 435678, 'Grande', '15.00'),
(2, 456789, 'Grande', '15.00'),
(2, 546789, 'Grande', '15.00'),
(2, 567890, 'Grande', '15.00'),
(2, 657890, 'Grande', '15.00'),
(2, 678901, 'Grande', '15.00'),
(2, 768901, 'Grande', '15.00'),
(2, 789012, 'Grande', '15.00'),
(2, 879012, 'Grande', '15.00'),
(2, 890123, 'Grande', '15.00'),
(2, 901234, 'Grande', '15.00'),
(2, 990123, 'Grande', '15.00'),
(3, 101234, 'Grande', '15.00'),
(3, 102345, 'Grande', '15.00'),
(3, 112345, 'Grande', '15.00'),
(3, 123456, 'Grande', '15.00'),
(3, 213456, 'Grande', '15.00'),
(3, 234567, 'Grande', '15.00'),
(3, 324567, 'Grande', '15.00'),
(3, 345678, 'Grande', '15.00'),
(3, 435678, 'Grande', '15.00'),
(3, 456789, 'Grande', '15.00'),
(3, 546789, 'Grande', '15.00'),
(3, 567890, 'Grande', '15.00'),
(3, 657890, 'Grande', '15.00'),
(3, 678901, 'Grande', '15.00'),
(3, 768901, 'Grande', '15.00'),
(3, 789012, 'Grande', '15.00'),
(3, 879012, 'Grande', '15.00'),
(3, 890123, 'Grande', '15.00'),
(3, 901234, 'Grande', '15.00'),
(3, 990123, 'Grande', '15.00'),
(4, 101234, 'Grande', '15.00'),
(4, 102345, 'Grande', '15.00'),
(4, 112345, 'Grande', '15.00'),
(4, 123456, 'Grande', '15.00'),
(4, 213456, 'Grande', '15.00'),
(4, 234567, 'Grande', '15.00'),
(4, 324567, 'Grande', '15.00'),
(4, 345678, 'Grande', '15.00'),
(4, 435678, 'Grande', '15.00'),
(4, 456789, 'Grande', '15.00'),
(4, 546789, 'Grande', '15.00'),
(4, 567890, 'Grande', '15.00'),
(4, 657890, 'Grande', '15.00'),
(4, 678901, 'Grande', '15.00'),
(4, 768901, 'Grande', '15.00'),
(4, 789012, 'Grande', '15.00'),
(4, 879012, 'Grande', '15.00'),
(4, 890123, 'Grande', '15.00'),
(4, 901234, 'Grande', '15.00'),
(4, 990123, 'Grande', '15.00'),
(5, 101234, 'Grande', '15.00'),
(5, 102345, 'Grande', '15.00'),
(5, 112345, 'Grande', '15.00'),
(5, 123456, 'Grande', '15.00'),
(5, 213456, 'Grande', '15.00'),
(5, 234567, 'Grande', '15.00'),
(5, 324567, 'Grande', '15.00'),
(5, 345678, 'Grande', '15.00'),
(5, 435678, 'Grande', '15.00'),
(5, 456789, 'Grande', '15.00'),
(5, 546789, 'Grande', '15.00'),
(5, 567890, 'Grande', '15.00'),
(5, 657890, 'Grande', '15.00'),
(5, 678901, 'Grande', '15.00'),
(5, 768901, 'Grande', '15.00'),
(5, 789012, 'Grande', '15.00'),
(5, 879012, 'Grande', '15.00'),
(5, 890123, 'Grande', '15.00'),
(5, 901234, 'Grande', '15.00'),
(5, 990123, 'Grande', '15.00'),
(6, 101234, 'Grande', '15.00'),
(6, 102345, 'Grande', '15.00'),
(6, 112345, 'Grande', '15.00'),
(6, 123456, 'Grande', '15.00'),
(6, 213456, 'Grande', '15.00'),
(6, 234567, 'Grande', '15.00'),
(6, 324567, 'Grande', '15.00'),
(6, 345678, 'Grande', '15.00'),
(6, 435678, 'Grande', '15.00'),
(6, 456789, 'Grande', '15.00'),
(6, 546789, 'Grande', '15.00'),
(6, 567890, 'Grande', '15.00'),
(6, 657890, 'Grande', '15.00'),
(6, 678901, 'Grande', '15.00'),
(6, 768901, 'Grande', '15.00'),
(6, 789012, 'Grande', '15.00'),
(6, 879012, 'Grande', '15.00'),
(6, 890123, 'Grande', '15.00'),
(6, 901234, 'Grande', '15.00'),
(6, 990123, 'Grande', '15.00'),
(7, 101234, 'Grande', '15.00'),
(7, 102345, 'Grande', '15.00'),
(7, 112345, 'Grande', '15.00'),
(7, 123456, 'Grande', '15.00'),
(7, 213456, 'Grande', '15.00'),
(7, 234567, 'Grande', '15.00'),
(7, 324567, 'Grande', '15.00'),
(7, 345678, 'Grande', '15.00'),
(7, 435678, 'Grande', '15.00'),
(7, 456789, 'Grande', '15.00'),
(7, 546789, 'Grande', '15.00'),
(7, 567890, 'Grande', '15.00'),
(7, 657890, 'Grande', '15.00'),
(7, 678901, 'Grande', '15.00'),
(7, 768901, 'Grande', '15.00'),
(7, 789012, 'Grande', '15.00'),
(7, 879012, 'Grande', '15.00'),
(7, 890123, 'Grande', '15.00'),
(7, 901234, 'Grande', '15.00'),
(7, 990123, 'Grande', '15.00'),
(8, 101234, 'Grande', '15.00'),
(8, 102345, 'Grande', '15.00'),
(8, 112345, 'Grande', '15.00'),
(8, 123456, 'Grande', '15.00'),
(8, 213456, 'Grande', '15.00'),
(8, 234567, 'Grande', '15.00'),
(8, 324567, 'Grande', '15.00'),
(8, 345678, 'Grande', '15.00'),
(8, 435678, 'Grande', '15.00'),
(8, 456789, 'Grande', '15.00'),
(8, 546789, 'Grande', '15.00'),
(8, 567890, 'Grande', '15.00'),
(8, 657890, 'Grande', '15.00'),
(8, 678901, 'Grande', '15.00'),
(8, 768901, 'Grande', '15.00'),
(8, 789012, 'Grande', '15.00'),
(8, 879012, 'Grande', '15.00'),
(8, 890123, 'Grande', '15.00'),
(8, 901234, 'Grande', '15.00'),
(8, 990123, 'Grande', '15.00'),
(9, 101234, 'Grande', '15.00'),
(9, 102345, 'Grande', '15.00'),
(9, 112345, 'Grande', '15.00'),
(9, 123456, 'Grande', '15.00'),
(9, 213456, 'Grande', '15.00'),
(9, 234567, 'Grande', '15.00'),
(9, 324567, 'Grande', '15.00'),
(9, 345678, 'Grande', '15.00'),
(9, 435678, 'Grande', '15.00'),
(9, 456789, 'Grande', '15.00'),
(9, 546789, 'Grande', '15.00'),
(9, 567890, 'Grande', '15.00'),
(9, 657890, 'Grande', '15.00'),
(9, 678901, 'Grande', '15.00'),
(9, 768901, 'Grande', '15.00'),
(9, 789012, 'Grande', '15.00'),
(9, 879012, 'Grande', '15.00'),
(9, 890123, 'Grande', '15.00'),
(9, 901234, 'Grande', '15.00'),
(9, 990123, 'Grande', '15.00'),
(10, 101234, 'Grande', '15.00'),
(10, 102345, 'Grande', '15.00'),
(10, 112345, 'Grande', '15.00'),
(10, 123456, 'Grande', '15.00'),
(10, 213456, 'Grande', '15.00'),
(10, 234567, 'Grande', '15.00'),
(10, 324567, 'Grande', '15.00'),
(10, 345678, 'Grande', '15.00'),
(10, 435678, 'Grande', '15.00'),
(10, 456789, 'Grande', '15.00'),
(10, 546789, 'Grande', '15.00'),
(10, 567890, 'Grande', '15.00'),
(10, 657890, 'Grande', '15.00'),
(10, 678901, 'Grande', '15.00'),
(10, 768901, 'Grande', '15.00'),
(10, 789012, 'Grande', '15.00'),
(10, 879012, 'Grande', '15.00'),
(10, 890123, 'Grande', '15.00'),
(10, 901234, 'Grande', '15.00'),
(10, 990123, 'Grande', '15.00'),
(11, 101234, 'Grande', '15.00'),
(11, 102345, 'Grande', '15.00'),
(11, 112345, 'Grande', '15.00'),
(11, 123456, 'Grande', '15.00'),
(11, 213456, 'Grande', '15.00'),
(11, 234567, 'Grande', '15.00'),
(11, 324567, 'Grande', '15.00'),
(11, 345678, 'Grande', '15.00'),
(11, 435678, 'Grande', '15.00'),
(11, 456789, 'Grande', '15.00'),
(11, 546789, 'Grande', '15.00'),
(11, 567890, 'Grande', '15.00'),
(11, 657890, 'Grande', '15.00'),
(11, 678901, 'Grande', '15.00'),
(11, 768901, 'Grande', '15.00'),
(11, 789012, 'Grande', '15.00'),
(11, 879012, 'Grande', '15.00'),
(11, 890123, 'Grande', '15.00'),
(11, 901234, 'Grande', '15.00'),
(11, 990123, 'Grande', '15.00'),
(12, 101234, 'Grande', '15.00'),
(12, 102345, 'Grande', '15.00'),
(12, 112345, 'Grande', '15.00'),
(12, 123456, 'Grande', '15.00'),
(12, 213456, 'Grande', '15.00'),
(12, 234567, 'Grande', '15.00'),
(12, 324567, 'Grande', '15.00'),
(12, 345678, 'Grande', '15.00'),
(12, 435678, 'Grande', '15.00'),
(12, 456789, 'Grande', '15.00'),
(12, 546789, 'Grande', '15.00'),
(12, 567890, 'Grande', '15.00'),
(12, 657890, 'Grande', '15.00'),
(12, 678901, 'Grande', '15.00'),
(12, 768901, 'Grande', '15.00'),
(12, 789012, 'Grande', '15.00'),
(12, 879012, 'Grande', '15.00'),
(12, 890123, 'Grande', '15.00'),
(12, 901234, 'Grande', '15.00'),
(12, 990123, 'Grande', '15.00'),
(13, 101234, 'Grande', '15.00'),
(13, 102345, 'Grande', '15.00'),
(13, 112345, 'Grande', '15.00'),
(13, 123456, 'Grande', '15.00'),
(13, 213456, 'Grande', '15.00'),
(13, 234567, 'Grande', '15.00'),
(13, 324567, 'Grande', '15.00'),
(13, 345678, 'Grande', '15.00'),
(13, 435678, 'Grande', '15.00'),
(13, 456789, 'Grande', '15.00'),
(13, 546789, 'Grande', '15.00'),
(13, 567890, 'Grande', '15.00'),
(13, 657890, 'Grande', '15.00'),
(13, 678901, 'Grande', '15.00'),
(13, 768901, 'Grande', '15.00'),
(13, 789012, 'Grande', '15.00'),
(13, 879012, 'Grande', '15.00'),
(13, 890123, 'Grande', '15.00'),
(13, 901234, 'Grande', '15.00'),
(13, 990123, 'Grande', '15.00'),
(14, 101234, 'Grande', '15.00'),
(14, 102345, 'Grande', '15.00'),
(14, 112345, 'Grande', '15.00'),
(14, 123456, 'Grande', '15.00'),
(14, 213456, 'Grande', '15.00'),
(14, 234567, 'Grande', '15.00'),
(14, 324567, 'Grande', '15.00'),
(14, 345678, 'Grande', '15.00'),
(14, 435678, 'Grande', '15.00'),
(14, 456789, 'Grande', '15.00'),
(14, 546789, 'Grande', '15.00'),
(14, 567890, 'Grande', '15.00'),
(14, 657890, 'Grande', '15.00'),
(14, 678901, 'Grande', '15.00'),
(14, 768901, 'Grande', '15.00'),
(14, 789012, 'Grande', '15.00'),
(14, 879012, 'Grande', '15.00'),
(14, 890123, 'Grande', '15.00'),
(14, 901234, 'Grande', '15.00'),
(14, 990123, 'Grande', '15.00'),
(15, 101234, 'Grande', '15.00'),
(15, 102345, 'Grande', '15.00'),
(15, 112345, 'Grande', '15.00'),
(15, 123456, 'Grande', '15.00'),
(15, 213456, 'Grande', '15.00'),
(15, 234567, 'Grande', '15.00'),
(15, 324567, 'Grande', '15.00'),
(15, 345678, 'Grande', '15.00'),
(15, 435678, 'Grande', '15.00'),
(15, 456789, 'Grande', '15.00'),
(15, 546789, 'Grande', '15.00'),
(15, 567890, 'Grande', '15.00'),
(15, 657890, 'Grande', '15.00'),
(15, 678901, 'Grande', '15.00'),
(15, 768901, 'Grande', '15.00'),
(15, 789012, 'Grande', '15.00'),
(15, 879012, 'Grande', '15.00'),
(15, 890123, 'Grande', '15.00'),
(15, 901234, 'Grande', '15.00'),
(15, 990123, 'Grande', '15.00'),
(16, 101234, 'Grande', '15.00'),
(16, 102345, 'Grande', '15.00'),
(16, 112345, 'Grande', '15.00'),
(16, 123456, 'Grande', '15.00'),
(16, 213456, 'Grande', '15.00'),
(16, 234567, 'Grande', '15.00'),
(16, 324567, 'Grande', '15.00'),
(16, 345678, 'Grande', '15.00'),
(16, 435678, 'Grande', '15.00'),
(16, 456789, 'Grande', '15.00'),
(16, 546789, 'Grande', '15.00'),
(16, 567890, 'Grande', '15.00'),
(16, 657890, 'Grande', '15.00'),
(16, 678901, 'Grande', '15.00'),
(16, 768901, 'Grande', '15.00'),
(16, 789012, 'Grande', '15.00'),
(16, 879012, 'Grande', '15.00'),
(16, 890123, 'Grande', '15.00'),
(16, 901234, 'Grande', '15.00'),
(16, 990123, 'Grande', '15.00'),
(17, 101234, 'Grande', '15.00'),
(17, 102345, 'Grande', '15.00'),
(17, 112345, 'Grande', '15.00'),
(17, 123456, 'Grande', '15.00'),
(17, 213456, 'Grande', '15.00'),
(17, 234567, 'Grande', '15.00'),
(17, 324567, 'Grande', '15.00'),
(17, 345678, 'Grande', '15.00'),
(17, 435678, 'Grande', '15.00'),
(17, 456789, 'Grande', '15.00'),
(17, 546789, 'Grande', '15.00'),
(17, 567890, 'Grande', '15.00'),
(17, 657890, 'Grande', '15.00'),
(17, 678901, 'Grande', '15.00'),
(17, 768901, 'Grande', '15.00'),
(17, 789012, 'Grande', '15.00'),
(17, 879012, 'Grande', '15.00'),
(17, 890123, 'Grande', '15.00'),
(17, 901234, 'Grande', '15.00'),
(17, 990123, 'Grande', '15.00'),
(18, 101234, 'Grande', '15.00'),
(18, 102345, 'Grande', '15.00'),
(18, 112345, 'Grande', '15.00'),
(18, 123456, 'Grande', '15.00'),
(18, 213456, 'Grande', '15.00'),
(18, 234567, 'Grande', '15.00'),
(18, 324567, 'Grande', '15.00'),
(18, 345678, 'Grande', '15.00'),
(18, 435678, 'Grande', '15.00'),
(18, 456789, 'Grande', '15.00'),
(18, 546789, 'Grande', '15.00'),
(18, 567890, 'Grande', '15.00'),
(18, 657890, 'Grande', '15.00'),
(18, 678901, 'Grande', '15.00'),
(18, 768901, 'Grande', '15.00'),
(18, 789012, 'Grande', '15.00'),
(18, 879012, 'Grande', '15.00'),
(18, 890123, 'Grande', '15.00'),
(18, 901234, 'Grande', '15.00'),
(18, 990123, 'Grande', '15.00'),
(19, 101234, 'Grande', '15.00'),
(19, 102345, 'Grande', '15.00'),
(19, 112345, 'Grande', '15.00'),
(19, 123456, 'Grande', '15.00'),
(19, 213456, 'Grande', '15.00'),
(19, 234567, 'Grande', '15.00'),
(19, 324567, 'Grande', '15.00'),
(19, 345678, 'Grande', '15.00'),
(19, 435678, 'Grande', '15.00'),
(19, 456789, 'Grande', '15.00'),
(19, 546789, 'Grande', '15.00'),
(19, 567890, 'Grande', '15.00'),
(19, 657890, 'Grande', '15.00'),
(19, 678901, 'Grande', '15.00'),
(19, 768901, 'Grande', '15.00'),
(19, 789012, 'Grande', '15.00'),
(19, 879012, 'Grande', '15.00'),
(19, 890123, 'Grande', '15.00'),
(19, 901234, 'Grande', '15.00'),
(19, 990123, 'Grande', '15.00'),
(20, 101234, 'Grande', '15.00'),
(20, 102345, 'Grande', '15.00'),
(20, 112345, 'Grande', '15.00'),
(20, 123456, 'Grande', '15.00'),
(20, 213456, 'Grande', '15.00'),
(20, 234567, 'Grande', '15.00'),
(20, 324567, 'Grande', '15.00'),
(20, 345678, 'Grande', '15.00'),
(20, 435678, 'Grande', '15.00'),
(20, 456789, 'Grande', '15.00'),
(20, 546789, 'Grande', '15.00'),
(20, 567890, 'Grande', '15.00'),
(20, 657890, 'Grande', '15.00'),
(20, 678901, 'Grande', '15.00'),
(20, 768901, 'Grande', '15.00'),
(20, 789012, 'Grande', '15.00'),
(20, 879012, 'Grande', '15.00'),
(20, 890123, 'Grande', '15.00'),
(20, 901234, 'Grande', '15.00'),
(20, 990123, 'Grande', '15.00'),
(21, 101234, 'Grande', '15.00'),
(21, 102345, 'Grande', '15.00'),
(21, 112345, 'Grande', '15.00'),
(21, 123456, 'Grande', '15.00'),
(21, 213456, 'Grande', '15.00'),
(21, 234567, 'Grande', '15.00'),
(21, 324567, 'Grande', '15.00'),
(21, 345678, 'Grande', '15.00'),
(21, 435678, 'Grande', '15.00'),
(21, 456789, 'Grande', '15.00'),
(21, 546789, 'Grande', '15.00'),
(21, 567890, 'Grande', '15.00'),
(21, 657890, 'Grande', '15.00'),
(21, 678901, 'Grande', '15.00'),
(21, 768901, 'Grande', '15.00'),
(21, 789012, 'Grande', '15.00'),
(21, 879012, 'Grande', '15.00'),
(21, 890123, 'Grande', '15.00'),
(21, 901234, 'Grande', '15.00'),
(21, 990123, 'Grande', '15.00'),
(22, 101234, 'Grande', '15.00'),
(22, 102345, 'Grande', '15.00'),
(22, 112345, 'Grande', '15.00'),
(22, 123456, 'Grande', '15.00'),
(22, 213456, 'Grande', '15.00'),
(22, 234567, 'Grande', '15.00'),
(22, 324567, 'Grande', '15.00'),
(22, 345678, 'Grande', '15.00'),
(22, 435678, 'Grande', '15.00'),
(22, 456789, 'Grande', '15.00'),
(22, 546789, 'Grande', '15.00'),
(22, 567890, 'Grande', '15.00'),
(22, 657890, 'Grande', '15.00'),
(22, 678901, 'Grande', '15.00'),
(22, 768901, 'Grande', '15.00'),
(22, 789012, 'Grande', '15.00'),
(22, 879012, 'Grande', '15.00'),
(22, 890123, 'Grande', '15.00'),
(22, 901234, 'Grande', '15.00'),
(22, 990123, 'Grande', '15.00'),
(23, 101234, 'Grande', '15.00'),
(23, 102345, 'Grande', '15.00'),
(23, 112345, 'Grande', '15.00'),
(23, 123456, 'Grande', '15.00'),
(23, 213456, 'Grande', '15.00'),
(23, 234567, 'Grande', '15.00'),
(23, 324567, 'Grande', '15.00'),
(23, 345678, 'Grande', '15.00'),
(23, 435678, 'Grande', '15.00'),
(23, 456789, 'Grande', '15.00'),
(23, 546789, 'Grande', '15.00'),
(23, 567890, 'Grande', '15.00'),
(23, 657890, 'Grande', '15.00'),
(23, 678901, 'Grande', '15.00'),
(23, 768901, 'Grande', '15.00'),
(23, 789012, 'Grande', '15.00'),
(23, 879012, 'Grande', '15.00'),
(23, 890123, 'Grande', '15.00'),
(23, 901234, 'Grande', '15.00'),
(23, 990123, 'Grande', '15.00'),
(24, 101234, 'Grande', '15.00'),
(24, 102345, 'Grande', '15.00'),
(24, 112345, 'Grande', '15.00'),
(24, 123456, 'Grande', '15.00'),
(24, 213456, 'Grande', '15.00'),
(24, 234567, 'Grande', '15.00'),
(24, 324567, 'Grande', '15.00'),
(24, 345678, 'Grande', '15.00'),
(24, 435678, 'Grande', '15.00'),
(24, 456789, 'Grande', '15.00'),
(24, 546789, 'Grande', '15.00'),
(24, 567890, 'Grande', '15.00'),
(24, 657890, 'Grande', '15.00'),
(24, 678901, 'Grande', '15.00'),
(24, 768901, 'Grande', '15.00'),
(24, 789012, 'Grande', '15.00'),
(24, 879012, 'Grande', '15.00'),
(24, 890123, 'Grande', '15.00'),
(24, 901234, 'Grande', '15.00'),
(24, 990123, 'Grande', '15.00'),
(25, 101234, 'Grande', '15.00'),
(25, 102345, 'Grande', '15.00'),
(25, 112345, 'Grande', '15.00'),
(25, 123456, 'Grande', '15.00'),
(25, 213456, 'Grande', '15.00'),
(25, 234567, 'Grande', '15.00'),
(25, 324567, 'Grande', '15.00'),
(25, 345678, 'Grande', '15.00'),
(25, 435678, 'Grande', '15.00'),
(25, 456789, 'Grande', '15.00'),
(25, 546789, 'Grande', '15.00'),
(25, 567890, 'Grande', '15.00'),
(25, 657890, 'Grande', '15.00'),
(25, 678901, 'Grande', '15.00'),
(25, 768901, 'Grande', '15.00'),
(25, 789012, 'Grande', '15.00'),
(25, 879012, 'Grande', '15.00'),
(25, 890123, 'Grande', '15.00'),
(25, 901234, 'Grande', '15.00'),
(25, 990123, 'Grande', '15.00'),
(26, 101234, 'Grande', '15.00'),
(26, 102345, 'Grande', '15.00'),
(26, 112345, 'Grande', '15.00'),
(26, 123456, 'Medio', '12.00'),
(26, 213456, 'Grande', '15.00'),
(26, 234567, 'Medio', '12.00'),
(26, 324567, 'Grande', '15.00'),
(26, 345678, 'Grande', '15.00'),
(26, 435678, 'Grande', '15.00'),
(26, 456789, 'Grande', '15.00'),
(26, 546789, 'Grande', '15.00'),
(26, 567890, 'Grande', '15.00'),
(26, 657890, 'Grande', '15.00'),
(26, 678901, 'Grande', '15.00'),
(26, 768901, 'Grande', '15.00'),
(26, 789012, 'Grande', '15.00'),
(26, 879012, 'Grande', '15.00'),
(26, 890123, 'Grande', '15.00'),
(26, 901234, 'Grande', '15.00'),
(26, 990123, 'Grande', '15.00'),
(27, 101234, 'Grande', '15.00'),
(27, 102345, 'Grande', '15.00'),
(27, 112345, 'Grande', '15.00'),
(27, 123456, 'Medio', '12.00'),
(27, 213456, 'Grande', '15.00'),
(27, 234567, 'Medio', '12.00'),
(27, 324567, 'Grande', '15.00'),
(27, 345678, 'Medio', '12.00'),
(27, 435678, 'Grande', '15.00'),
(27, 456789, 'Grande', '15.00'),
(27, 546789, 'Grande', '15.00'),
(27, 567890, 'Grande', '15.00'),
(27, 657890, 'Grande', '15.00'),
(27, 678901, 'Grande', '15.00'),
(27, 768901, 'Grande', '15.00'),
(27, 789012, 'Grande', '15.00'),
(27, 879012, 'Grande', '15.00'),
(27, 890123, 'Grande', '15.00'),
(27, 901234, 'Grande', '15.00'),
(27, 990123, 'Grande', '15.00'),
(28, 101234, 'Grande', '15.00'),
(28, 102345, 'Grande', '15.00'),
(28, 112345, 'Grande', '15.00'),
(28, 123456, 'Medio', '12.00'),
(28, 213456, 'Grande', '15.00'),
(28, 234567, 'Medio', '12.00'),
(28, 324567, 'Grande', '15.00'),
(28, 345678, 'Medio', '12.00'),
(28, 435678, 'Grande', '15.00'),
(28, 456789, 'Medio', '12.00'),
(28, 546789, 'Grande', '15.00'),
(28, 567890, 'Grande', '15.00'),
(28, 657890, 'Grande', '15.00'),
(28, 678901, 'Grande', '15.00'),
(28, 768901, 'Grande', '15.00'),
(28, 789012, 'Grande', '15.00'),
(28, 879012, 'Grande', '15.00'),
(28, 890123, 'Grande', '15.00'),
(28, 901234, 'Grande', '15.00'),
(28, 990123, 'Grande', '15.00'),
(29, 101234, 'Grande', '15.00'),
(29, 102345, 'Grande', '15.00'),
(29, 112345, 'Grande', '15.00'),
(29, 123456, 'Medio', '12.00'),
(29, 213456, 'Grande', '15.00'),
(29, 234567, 'Medio', '12.00'),
(29, 324567, 'Grande', '15.00'),
(29, 345678, 'Medio', '12.00'),
(29, 435678, 'Grande', '15.00'),
(29, 456789, 'Medio', '12.00'),
(29, 546789, 'Grande', '15.00'),
(29, 567890, 'Medio', '12.00'),
(29, 657890, 'Grande', '15.00'),
(29, 678901, 'Grande', '15.00'),
(29, 768901, 'Grande', '15.00'),
(29, 789012, 'Grande', '15.00'),
(29, 879012, 'Grande', '15.00'),
(29, 890123, 'Grande', '15.00'),
(29, 901234, 'Grande', '15.00'),
(29, 990123, 'Grande', '15.00'),
(30, 101234, 'Grande', '15.00'),
(30, 102345, 'Grande', '15.00'),
(30, 112345, 'Grande', '15.00'),
(30, 123456, 'Medio', '12.00'),
(30, 213456, 'Grande', '15.00'),
(30, 234567, 'Medio', '12.00'),
(30, 324567, 'Grande', '15.00'),
(30, 345678, 'Medio', '12.00'),
(30, 435678, 'Grande', '15.00'),
(30, 456789, 'Medio', '12.00'),
(30, 546789, 'Grande', '15.00'),
(30, 567890, 'Medio', '12.00'),
(30, 657890, 'Grande', '15.00'),
(30, 678901, 'Grande', '15.00'),
(30, 768901, 'Grande', '15.00'),
(30, 789012, 'Grande', '15.00'),
(30, 879012, 'Grande', '15.00'),
(30, 890123, 'Grande', '15.00'),
(30, 901234, 'Grande', '15.00'),
(30, 990123, 'Grande', '15.00'),
(31, 123456, 'Piccola', '10.00'),
(31, 234567, 'Piccola', '10.00'),
(31, 345678, 'Piccola', '10.00'),
(31, 456789, 'Piccola', '10.00'),
(31, 567890, 'Piccola', '10.00'),
(31, 678901, 'Piccola', '10.00'),
(31, 789012, 'Piccola', '10.00'),
(31, 890123, 'Piccola', '10.00'),
(32, 123456, 'Piccola', '10.00'),
(32, 234567, 'Piccola', '10.00'),
(32, 345678, 'Piccola', '10.00'),
(32, 456789, 'Piccola', '10.00'),
(32, 567890, 'Piccola', '10.00'),
(32, 678901, 'Piccola', '10.00'),
(32, 789012, 'Piccola', '10.00'),
(32, 890123, 'Piccola', '10.00'),
(33, 123456, 'Piccola', '10.00'),
(33, 234567, 'Piccola', '10.00'),
(33, 345678, 'Piccola', '10.00'),
(33, 456789, 'Piccola', '10.00'),
(33, 567890, 'Piccola', '10.00'),
(33, 678901, 'Piccola', '10.00'),
(33, 789012, 'Piccola', '10.00'),
(33, 890123, 'Piccola', '10.00'),
(34, 123456, 'Piccola', '10.00'),
(34, 234567, 'Piccola', '10.00'),
(34, 345678, 'Piccola', '10.00'),
(34, 456789, 'Piccola', '10.00'),
(34, 567890, 'Piccola', '10.00'),
(34, 678901, 'Piccola', '10.00'),
(34, 789012, 'Piccola', '10.00'),
(34, 890123, 'Piccola', '10.00'),
(35, 123456, 'Piccola', '10.00'),
(35, 234567, 'Piccola', '10.00'),
(35, 345678, 'Piccola', '10.00'),
(35, 456789, 'Piccola', '10.00'),
(35, 567890, 'Piccola', '10.00'),
(35, 678901, 'Piccola', '10.00'),
(35, 789012, 'Piccola', '10.00'),
(35, 890123, 'Piccola', '10.00'),
(36, 123456, 'Piccola', '10.00'),
(36, 234567, 'Piccola', '10.00'),
(36, 345678, 'Piccola', '10.00'),
(36, 456789, 'Piccola', '10.00'),
(36, 567890, 'Piccola', '10.00'),
(36, 678901, 'Piccola', '10.00'),
(36, 789012, 'Piccola', '10.00'),
(36, 890123, 'Piccola', '10.00'),
(37, 123456, 'Piccola', '10.00'),
(37, 234567, 'Piccola', '10.00'),
(37, 345678, 'Piccola', '10.00'),
(37, 456789, 'Piccola', '10.00'),
(37, 567890, 'Piccola', '10.00'),
(37, 678901, 'Piccola', '10.00'),
(37, 789012, 'Piccola', '10.00'),
(37, 890123, 'Piccola', '10.00'),
(38, 123456, 'Piccola', '10.00'),
(38, 234567, 'Piccola', '10.00'),
(38, 345678, 'Piccola', '10.00'),
(38, 456789, 'Piccola', '10.00'),
(38, 567890, 'Piccola', '10.00'),
(38, 678901, 'Piccola', '10.00'),
(38, 789012, 'Piccola', '10.00'),
(38, 890123, 'Piccola', '10.00'),
(39, 123456, 'Piccola', '10.00'),
(39, 234567, 'Piccola', '10.00'),
(39, 345678, 'Piccola', '10.00'),
(39, 456789, 'Piccola', '10.00'),
(39, 567890, 'Piccola', '10.00'),
(39, 678901, 'Piccola', '10.00'),
(39, 789012, 'Piccola', '10.00'),
(39, 890123, 'Piccola', '10.00'),
(40, 123456, 'Piccola', '10.00'),
(40, 234567, 'Piccola', '10.00'),
(40, 345678, 'Piccola', '10.00'),
(40, 456789, 'Piccola', '10.00'),
(40, 567890, 'Piccola', '10.00'),
(40, 678901, 'Piccola', '10.00'),
(40, 789012, 'Piccola', '10.00'),
(40, 890123, 'Piccola', '10.00'),
(41, 123456, 'Media', '12.00'),
(41, 234567, 'Media', '12.00'),
(41, 345678, 'Media', '12.00'),
(41, 456789, 'Media', '12.00'),
(41, 567890, 'Media', '12.00'),
(41, 678901, 'Media', '12.00'),
(41, 789012, 'Media', '12.00'),
(41, 890123, 'Media', '12.00'),
(42, 123456, 'Media', '12.00'),
(42, 234567, 'Media', '12.00'),
(42, 345678, 'Media', '12.00'),
(42, 456789, 'Media', '12.00'),
(42, 567890, 'Media', '12.00'),
(42, 678901, 'Media', '12.00'),
(42, 789012, 'Media', '12.00'),
(42, 890123, 'Media', '12.00'),
(43, 123456, 'Media', '12.00'),
(43, 234567, 'Media', '12.00'),
(43, 345678, 'Media', '12.00'),
(43, 456789, 'Media', '12.00'),
(43, 567890, 'Media', '12.00'),
(43, 678901, 'Media', '12.00'),
(43, 789012, 'Media', '12.00'),
(43, 890123, 'Media', '12.00'),
(44, 123456, 'Media', '12.00'),
(44, 234567, 'Media', '12.00'),
(44, 345678, 'Media', '12.00'),
(44, 456789, 'Media', '12.00'),
(44, 567890, 'Media', '12.00'),
(44, 678901, 'Media', '12.00'),
(44, 789012, 'Media', '12.00'),
(44, 890123, 'Media', '12.00'),
(45, 123456, 'Media', '12.00'),
(45, 234567, 'Media', '12.00'),
(45, 345678, 'Media', '12.00'),
(45, 456789, 'Media', '12.00'),
(45, 567890, 'Media', '12.00'),
(45, 678901, 'Media', '12.00'),
(45, 789012, 'Media', '12.00'),
(45, 890123, 'Media', '12.00'),
(46, 123456, 'Media', '12.00'),
(46, 234567, 'Media', '12.00'),
(46, 345678, 'Media', '12.00'),
(46, 456789, 'Media', '12.00'),
(46, 567890, 'Media', '12.00'),
(46, 678901, 'Media', '12.00'),
(46, 789012, 'Media', '12.00'),
(46, 890123, 'Media', '12.00'),
(47, 123456, 'Media', '12.00'),
(47, 234567, 'Media', '12.00'),
(47, 345678, 'Media', '12.00'),
(47, 456789, 'Media', '12.00'),
(47, 567890, 'Media', '12.00'),
(47, 678901, 'Media', '12.00'),
(47, 789012, 'Media', '12.00'),
(47, 890123, 'Media', '12.00'),
(48, 123456, 'Media', '12.00'),
(48, 234567, 'Media', '12.00'),
(48, 345678, 'Media', '12.00'),
(48, 456789, 'Media', '12.00'),
(48, 567890, 'Media', '12.00'),
(48, 678901, 'Media', '12.00'),
(48, 789012, 'Media', '12.00'),
(48, 890123, 'Media', '12.00'),
(49, 123456, 'Media', '12.00'),
(49, 234567, 'Media', '12.00'),
(49, 345678, 'Media', '12.00'),
(49, 456789, 'Media', '12.00'),
(49, 567890, 'Media', '12.00'),
(49, 678901, 'Media', '12.00'),
(49, 789012, 'Media', '12.00'),
(49, 890123, 'Media', '12.00'),
(50, 123456, 'Media', '12.00'),
(50, 234567, 'Media', '12.00'),
(50, 345678, 'Media', '12.00'),
(50, 456789, 'Media', '12.00'),
(50, 567890, 'Media', '12.00'),
(50, 678901, 'Media', '12.00'),
(50, 789012, 'Media', '12.00'),
(50, 890123, 'Media', '12.00'),
(51, 102345, 'Piccola', '10.00'),
(51, 213456, 'Piccola', '10.00'),
(51, 324567, 'Piccola', '10.00'),
(51, 435678, 'Piccola', '10.00'),
(52, 102345, 'Piccola', '10.00'),
(52, 213456, 'Piccola', '10.00'),
(52, 324567, 'Piccola', '10.00'),
(52, 435678, 'Piccola', '10.00'),
(53, 102345, 'Piccola', '10.00'),
(53, 213456, 'Piccola', '10.00'),
(53, 324567, 'Piccola', '10.00'),
(53, 435678, 'Piccola', '10.00'),
(54, 102345, 'Piccola', '10.00'),
(54, 213456, 'Piccola', '10.00'),
(54, 324567, 'Piccola', '10.00'),
(54, 435678, 'Piccola', '10.00'),
(55, 102345, 'Piccola', '10.00'),
(55, 213456, 'Piccola', '10.00'),
(55, 324567, 'Piccola', '10.00'),
(55, 435678, 'Piccola', '10.00'),
(56, 102345, 'Piccola', '10.00'),
(56, 213456, 'Piccola', '10.00'),
(56, 324567, 'Piccola', '10.00'),
(56, 435678, 'Piccola', '10.00'),
(57, 102345, 'Piccola', '10.00'),
(57, 213456, 'Piccola', '10.00'),
(57, 324567, 'Piccola', '10.00'),
(57, 435678, 'Piccola', '10.00'),
(58, 102345, 'Piccola', '10.00'),
(58, 213456, 'Piccola', '10.00'),
(58, 324567, 'Piccola', '10.00'),
(58, 435678, 'Piccola', '10.00'),
(59, 102345, 'Piccola', '10.00'),
(59, 213456, 'Piccola', '10.00'),
(59, 324567, 'Piccola', '10.00'),
(59, 435678, 'Piccola', '10.00'),
(60, 102345, 'Piccola', '10.00'),
(60, 213456, 'Piccola', '10.00'),
(60, 324567, 'Piccola', '10.00'),
(60, 435678, 'Piccola', '10.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `PrenotazioneStallo`
--

CREATE TABLE `PrenotazioneStallo` (
  `Id` varchar(128) NOT NULL,
  `dataInizio` datetime NOT NULL,
  `dataFine` datetime NOT NULL,
  `costoTotale` decimal(8,2) NOT NULL,
  `Targa` varchar(7) NOT NULL,
  `NumeroParcheggio` int(6) NOT NULL,
  `CodiceParcheggio` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `PrenotazioneVeicolo`
--

CREATE TABLE `PrenotazioneVeicolo` (
  `Id` varchar(128) NOT NULL,
  `dataInizio` datetime NOT NULL,
  `dataFine` datetime NOT NULL,
  `costoTotale` decimal(8,2) NOT NULL,
  `kmPercorsi` int(5) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `targa` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `mail` varchar(128) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `cognome` varchar(64) NOT NULL,
  `dataNascita` date NOT NULL,
  `numeroTelefono` varchar(10) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Utente`
--

INSERT INTO `Utente` (`mail`, `nome`, `cognome`, `dataNascita`, `numeroTelefono`, `password`) VALUES
('mtiziano05@gmail.com', 'Mario', 'Rossi', '0000-00-00', '3492801442', '$2y$10$oKMhly4fmBDVcGTSZgsGnOEwWIRtuGi8pFs5EiJ3hjS83zlo5FuDW'),
('Prova', 'Mario', 'Rossi', '0000-00-00', '3492801442', '$2y$10$Rfag967YeKXbdAqCQhYT2et.OuINaxbnPjs8wS.CDesMTZ8nvmj1q'),
('tiziano.manfredi@buonarroti.tn.it', 'Tiziano', 'Manfredi', '0000-00-00', '3429440047', '$2y$10$lt0vObROfJQCaedhQbe5t.BPhx5M9lJjeipxP/Tl87GSd1dmEpNdS');

-- --------------------------------------------------------

--
-- Struttura della tabella `Veicolo`
--

CREATE TABLE `Veicolo` (
  `targa` varchar(7) NOT NULL,
  `marca` varchar(64) NOT NULL,
  `modello` varchar(64) NOT NULL,
  `tipologia` varchar(64) NOT NULL,
  `mail` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `VeicoloNoleggio`
--

CREATE TABLE `VeicoloNoleggio` (
  `targa` varchar(7) NOT NULL,
  `marca` varchar(64) NOT NULL,
  `modello` varchar(64) NOT NULL,
  `tipologia` varchar(64) NOT NULL,
  `numeroPosti` int(2) NOT NULL,
  `kmTotali` int(6) NOT NULL,
  `costoGiornaliero` decimal(6,2) NOT NULL,
  `aeroporto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `VeicoloNoleggio`
--

INSERT INTO `VeicoloNoleggio` (`targa`, `marca`, `modello`, `tipologia`, `numeroPosti`, `kmTotali`, `costoGiornaliero`, `aeroporto`) VALUES
('AB123CD', 'Ford', 'Fiesta', 'Utilitaria', 4, 50000, '50.00', 'MXP'),
('CD012BC', 'Skoda', 'Octavia', 'Berlina', 5, 35000, '70.00', 'MXP'),
('CD345BC', 'Nissan', 'Qashqai', 'SUV', 5, 38000, '80.00', 'JFK'),
('CD456BC', 'Audi', 'A3', 'Utilitaria', 4, 32000, '65.00', 'CDG'),
('CD567BC', 'Land Rover', 'Discovery', 'SUV', 7, 43000, '95.00', 'CDG'),
('CD678BC', 'Peugeot', '208', 'Utilitaria', 5, 33000, '60.00', 'ORD'),
('CD789BC', 'Toyota', 'RAV4', 'SUV', 5, 40000, '70.00', 'DXB'),
('CD890BC', 'BMW', 'X3', 'SUV', 5, 42000, '95.00', 'DXB'),
('CD901BC', 'Renault', 'Kangoo', 'Furgone', 2, 55000, '75.00', 'NRT'),
('DE456FG', 'Toyota', 'RAV4', 'SUV', 5, 40000, '70.00', 'DXB'),
('FG012EF', 'Fiat', 'Ducato', 'Furgone', 3, 60000, '80.00', 'CDG'),
('FG123EF', 'Audi', 'A3', 'Utilitaria', 4, 32000, '65.00', 'CDG'),
('FG234EF', 'Hyundai', 'i20', 'Utilitaria', 4, 30000, '55.00', 'ORD'),
('FG345EF', 'Opel', 'Corsa', 'Utilitaria', 4, 31000, '55.00', 'DXB'),
('FG678EF', 'Mercedes-Benz', 'Vito', 'Furgone', 3, 62000, '85.00', 'MXP'),
('FG789EF', 'Kia', 'Sportage', 'SUV', 5, 37000, '75.00', 'FCO'),
('FG890EF', 'Seat', 'Ibiza', 'Utilitaria', 5, 34000, '60.00', 'FCO'),
('FG901EF', 'Mitsubishi', 'Outlander', 'SUV', 7, 39000, '85.00', 'JFK'),
('GH234IO', 'Ford', 'Fiesta', 'Utilitaria', 4, 50000, '50.00', 'MXP'),
('GH789IO', 'Fiat', 'Ducato', 'Furgone', 3, 60000, '80.00', 'CDG'),
('IJ012HI', 'Citroen', 'Berlingo', 'Furgone', 2, 58000, '80.00', 'FRA'),
('IJ234HI', 'Skoda', 'Octavia', 'Berlina', 5, 35000, '70.00', 'MXP'),
('IJ345HI', 'Volkswagen', 'Golf', 'Utilitaria', 5, 35000, '60.00', 'FCO'),
('IJ456HI', 'Kia', 'Sportage', 'SUV', 5, 37000, '75.00', 'FCO'),
('IJ567HI', 'Nissan', 'Qashqai', 'SUV', 5, 38000, '80.00', 'JFK'),
('IJ678HI', 'Land Rover', 'Discovery', 'SUV', 7, 43000, '95.00', 'CDG'),
('IJ901HI', 'BMW', 'X3', 'SUV', 5, 42000, '95.00', 'DXB'),
('JK012LM', 'Volkswagen', 'Golf', 'Utilitaria', 5, 35000, '60.00', 'FCO'),
('JK567LM', 'Toyota', 'RAV4', 'SUV', 5, 40000, '70.00', 'DXB'),
('LM234KL', 'Audi', 'A3', 'Utilitaria', 4, 32000, '65.00', 'CDG'),
('LM345KL', 'Volvo', 'XC90', 'SUV', 7, 40000, '100.00', 'NRT'),
('LM567KL', 'Opel', 'Corsa', 'Utilitaria', 4, 31000, '55.00', 'DXB'),
('LM678KL', 'Jeep', 'Wrangler', 'SUV', 4, 45000, '90.00', 'FRA'),
('LM789KL', 'Citroen', 'Berlingo', 'Furgone', 2, 58000, '80.00', 'FRA'),
('LM890KL', 'Mercedes-Benz', 'Vito', 'Furgone', 3, 62000, '85.00', 'MXP'),
('LM901KL', 'Seat', 'Ibiza', 'Utilitaria', 5, 34000, '60.00', 'FCO'),
('NO345MN', 'Jeep', 'Wrangler', 'SUV', 4, 45000, '90.00', 'FRA'),
('NO890MN', 'Fiat', 'Ducato', 'Furgone', 3, 60000, '80.00', 'CDG'),
('OP012NO', 'Volvo', 'XC90', 'SUV', 7, 40000, '100.00', 'NRT'),
('OP123NO', 'BMW', 'X3', 'SUV', 5, 42000, '95.00', 'DXB'),
('OP456NO', 'Ford', 'Fiesta', 'Utilitaria', 4, 50000, '50.00', 'MXP'),
('OP567NO', 'Kia', 'Sportage', 'SUV', 5, 37000, '75.00', 'FCO'),
('OP678NO', 'Peugeot', '208', 'Utilitaria', 5, 33000, '60.00', 'ORD'),
('OP890NO', 'Land Rover', 'Discovery', 'SUV', 7, 43000, '95.00', 'CDG'),
('OP901NO', 'Renault', 'Kangoo', 'Furgone', 2, 55000, '75.00', 'NRT'),
('PQ123RS', 'Volkswagen', 'Golf', 'Utilitaria', 5, 35000, '60.00', 'FCO'),
('PQ678RS', 'Renault', 'Kangoo', 'Furgone', 2, 55000, '75.00', 'NRT'),
('QR123PQ', 'Seat', 'Ibiza', 'Utilitaria', 5, 34000, '60.00', 'FCO'),
('QR234PQ', 'Hyundai', 'i20', 'Utilitaria', 4, 30000, '55.00', 'ORD'),
('QR345PQ', 'Peugeot', '208', 'Utilitaria', 5, 33000, '60.00', 'ORD'),
('QR456PQ', 'Audi', 'A3', 'Utilitaria', 4, 32000, '65.00', 'CDG'),
('QR789PQ', 'Toyota', 'RAV4', 'SUV', 5, 40000, '70.00', 'DXB'),
('QR890PQ', 'Citroen', 'Berlingo', 'Furgone', 2, 58000, '80.00', 'FRA'),
('QR901PQ', 'Mitsubishi', 'Outlander', 'SUV', 7, 39000, '85.00', 'JFK'),
('TU012ST', 'Fiat', 'Ducato', 'Furgone', 3, 60000, '80.00', 'CDG'),
('TU123ST', 'Volvo', 'XC90', 'SUV', 7, 40000, '100.00', 'NRT'),
('TU234ST', 'Skoda', 'Octavia', 'Berlina', 5, 35000, '70.00', 'MXP'),
('TU456ST', 'Jeep', 'Wrangler', 'SUV', 4, 45000, '90.00', 'FRA'),
('TU567ST', 'Nissan', 'Qashqai', 'SUV', 5, 38000, '80.00', 'JFK'),
('TU678ST', 'Mitsubishi', 'Outlander', 'SUV', 7, 39000, '85.00', 'JFK'),
('TU789ST', 'Kia', 'Sportage', 'SUV', 5, 37000, '75.00', 'FCO'),
('TU901ST', 'Hyundai', 'i20', 'Utilitaria', 4, 30000, '55.00', 'ORD'),
('WX012VW', 'Citroen', 'Berlingo', 'Furgone', 2, 58000, '80.00', 'FRA'),
('WX234VW', 'Nissan', 'Qashqai', 'SUV', 5, 38000, '80.00', 'JFK'),
('WX345VW', 'Volkswagen', 'Golf', 'Utilitaria', 5, 35000, '60.00', 'FCO'),
('WX456VW', 'Peugeot', '208', 'Utilitaria', 5, 33000, '60.00', 'ORD'),
('WX567VW', 'Opel', 'Corsa', 'Utilitaria', 4, 31000, '55.00', 'DXB'),
('WX789VW', 'Renault', 'Kangoo', 'Furgone', 2, 55000, '75.00', 'NRT'),
('WX890VW', 'Mercedes-Benz', 'Vito', 'Furgone', 3, 62000, '85.00', 'MXP'),
('WX901VW', 'Skoda', 'Octavia', 'Berlina', 5, 35000, '70.00', 'MXP'),
('ZA012YZ', 'Hyundai', 'i20', 'Utilitaria', 4, 30000, '55.00', 'ORD'),
('ZA123YZ', 'BMW', 'X3', 'SUV', 5, 42000, '95.00', 'DXB'),
('ZA234YZ', 'Opel', 'Corsa', 'Utilitaria', 4, 31000, '55.00', 'DXB'),
('ZA345YZ', 'Volvo', 'XC90', 'SUV', 7, 40000, '100.00', 'NRT'),
('ZA456YZ', 'Ford', 'Fiesta', 'Utilitaria', 4, 50000, '50.00', 'MXP'),
('ZA567YZ', 'Mercedes-Benz', 'Vito', 'Furgone', 3, 62000, '85.00', 'MXP'),
('ZA678YZ', 'Jeep', 'Wrangler', 'SUV', 4, 45000, '90.00', 'FRA'),
('ZA789YZ', 'Mitsubishi', 'Outlander', 'SUV', 7, 39000, '85.00', 'JFK');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Aeroporti`
--
ALTER TABLE `Aeroporti`
  ADD PRIMARY KEY (`Codice`) USING BTREE;

--
-- Indici per le tabelle `ImmaginiVeicoli`
--
ALTER TABLE `ImmaginiVeicoli`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `Parcheggio`
--
ALTER TABLE `Parcheggio`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `FK7` (`aeroporto`);

--
-- Indici per le tabelle `PostoAuto`
--
ALTER TABLE `PostoAuto`
  ADD PRIMARY KEY (`Numero`,`CodiceParcheggio`),
  ADD KEY `FK4` (`CodiceParcheggio`);

--
-- Indici per le tabelle `PrenotazioneStallo`
--
ALTER TABLE `PrenotazioneStallo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK5` (`Targa`),
  ADD KEY `FK6` (`NumeroParcheggio`,`CodiceParcheggio`);

--
-- Indici per le tabelle `PrenotazioneVeicolo`
--
ALTER TABLE `PrenotazioneVeicolo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK1` (`mail`),
  ADD KEY `FK2` (`targa`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`mail`);

--
-- Indici per le tabelle `Veicolo`
--
ALTER TABLE `Veicolo`
  ADD PRIMARY KEY (`targa`),
  ADD KEY `FK3` (`mail`);

--
-- Indici per le tabelle `VeicoloNoleggio`
--
ALTER TABLE `VeicoloNoleggio`
  ADD PRIMARY KEY (`targa`),
  ADD KEY `FK8` (`aeroporto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ImmaginiVeicoli`
--
ALTER TABLE `ImmaginiVeicoli`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Parcheggio`
--
ALTER TABLE `Parcheggio`
  ADD CONSTRAINT `FK7` FOREIGN KEY (`aeroporto`) REFERENCES `Aeroporti` (`Codice`);

--
-- Limiti per la tabella `PostoAuto`
--
ALTER TABLE `PostoAuto`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`CodiceParcheggio`) REFERENCES `Parcheggio` (`codice`);

--
-- Limiti per la tabella `PrenotazioneStallo`
--
ALTER TABLE `PrenotazioneStallo`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`Targa`) REFERENCES `Veicolo` (`targa`),
  ADD CONSTRAINT `FK6` FOREIGN KEY (`NumeroParcheggio`,`CodiceParcheggio`) REFERENCES `PostoAuto` (`Numero`, `CodiceParcheggio`);

--
-- Limiti per la tabella `PrenotazioneVeicolo`
--
ALTER TABLE `PrenotazioneVeicolo`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`mail`) REFERENCES `Utente` (`mail`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`targa`) REFERENCES `VeicoloNoleggio` (`targa`);

--
-- Limiti per la tabella `Veicolo`
--
ALTER TABLE `Veicolo`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`mail`) REFERENCES `Utente` (`mail`);

--
-- Limiti per la tabella `VeicoloNoleggio`
--
ALTER TABLE `VeicoloNoleggio`
  ADD CONSTRAINT `FK8` FOREIGN KEY (`aeroporto`) REFERENCES `Aeroporti` (`Codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
