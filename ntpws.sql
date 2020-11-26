-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 26, 2020 at 08:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntpws`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`code`, `name`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Netherlands Antilles'),
('AO', 'Angola'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Ivory Coast'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DS', 'American Samoa'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesia, Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('FX', 'France, Metropolitan'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GK', 'Guernsey'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard and Mc Donald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia (Hrvatska)'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran (Islamic Republic of)'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea, Democratic People\'s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People\'s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libyan Arab Jamahiriya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova, Republic of'),
('ME', 'Montenegro'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macau'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'St. Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestine'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'St. Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen Islands'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TP', 'East Timor'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan'),
('TY', 'Mayotte'),
('TZ', 'Tanzania, United Republic of'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States minor outlying islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Vatican City State'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands (British)'),
('VI', 'Virgin Islands (U.S.)'),
('VN', 'Vietnam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna Islands'),
('WS', 'Samoa'),
('XK', 'Kosovo'),
('YE', 'Yemen'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZR', 'Zaire'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `picture`, `post`) VALUES
(27, '7-653875.jpg', 7),
(28, '7-389990.jpg', 7),
(29, '8-880282.jpg', 8),
(30, '8-295210.jpg', 8),
(31, '2-787273.jpg', 2),
(32, '9-986767.jpg', 9),
(33, '9-784882.jpg', 9),
(34, '9-646531.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archive` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `date`, `archive`) VALUES
(2, 'A New Way to Build Thickness in the Upper Backs', 'Lorem upper back, thickness like Arnold and other greats of the times passed at your fingertips with this quick guide.', '2020-11-25 10:08:59', 'N'),
(7, 'Some Say This is How You Should Train', 'Pellentesque et lacinia velit, non pulvinar lacus. Integer posuere velit vel elit mollis tempus. Morbi laoreet elit quam, quis lacinia magna lacinia in. Phasellus eu purus et tortor ullamcorper convallis sit amet non massa. Morbi cursus accumsan nibh, ut lobortis nulla blandit ut. Vestibulum aliquam viverra tincidunt. Vestibulum hendrerit volutpat enim, ut molestie elit ultrices vitae. Morbi hendrerit est vel nisi sollicitudin, quis tempus ex aliquam.\r\n\r\nNullam vel aliquam nisi. Maecenas non mauris id quam sagittis porttitor sed quis nisl. Nunc dui mauris, dignissim ac ultricies nec, semper at ligula. Ut a semper quam, sit amet ornare dolor. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum in odio a tortor tristique varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum vehicula suscipit turpis. Quisque suscipit a elit eu aliquam.\r\n\r\nOrci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam ornare commodo magna. Maecenas aliquam mauris vel dui lobortis, sit amet pharetra eros scelerisque. Duis placerat mollis nunc viverra fringilla. Morbi interdum lobortis est, eu tristique purus pretium nec. Vivamus dignissim consequat semper. Integer nec turpis nec leo luctus congue. Quisque ac ipsum et ligula ornare rhoncus. Duis tempor velit diam, a egestas urna efficitur ut. Etiam pharetra interdum quam, nec dignissim quam volutpat et. Proin sagittis dolor justo, nec ornare lectus gravida non.', '2020-11-25 08:43:16', 'N'),
(8, 'New Legs Routine That Brings Pros to the Floor', 'Nulla id ligula diam. Praesent at lectus nisl. In malesuada aliquam egestas. Sed turpis velit, convallis sed porttitor eu, dictum in dolor. Sed egestas congue massa, porttitor sodales felis semper a. Suspendisse imperdiet dolor a turpis ultricies viverra. Suspendisse nunc leo, porta tempus nisl et, viverra maximus dolor. Aliquam vel cursus metus, eget ultrices nulla.\r\n\r\nNam vel placerat nunc, at accumsan felis. Curabitur in pretium felis. Fusce porttitor cursus mauris quis ullamcorper. Morbi condimentum porta urna. Nam dolor lacus, varius vel consequat ac, fringilla et nisl. Nulla varius ultricies libero a aliquam. Phasellus fermentum mi sed orci vulputate tincidunt. Sed orci nunc, pharetra eu tincidunt laoreet, tempus consectetur ligula. Sed elementum vitae ligula sit amet ultrices. Sed viverra urna enim, viverra feugiat tellus auctor nec. Suspendisse ullamcorper tincidunt vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sapien sapien, mollis a imperdiet nec, elementum vitae ipsum. Pellentesque vitae lacinia libero. Fusce at venenatis purus. Sed dolor tortor, mattis venenatis pulvinar et, mattis sed ligula.\r\n\r\nPellentesque et lacinia velit, non pulvinar lacus. Integer posuere velit vel elit mollis tempus. Morbi laoreet elit quam, quis lacinia magna lacinia in. Phasellus eu purus et tortor ullamcorper convallis sit amet non massa. Morbi cursus accumsan nibh, ut lobortis nulla blandit ut. Vestibulum aliquam viverra tincidunt. Vestibulum hendrerit volutpat enim, ut molestie elit ultrices vitae. Morbi hendrerit est vel nisi sollicitudin, quis tempus ex aliquam.\r\n\r\nNullam vel aliquam nisi. Maecenas non mauris id quam sagittis porttitor sed quis nisl. Nunc dui mauris, dignissim ac ultricies nec, semper at ligula. Ut a semper quam, sit amet ornare dolor. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum in odio a tortor tristique varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum vehicula suscipit turpis. Quisque suscipit a elit eu aliquam.', '2020-11-25 08:44:52', 'N'),
(9, 'One Meal To Rule Them All', 'Aliquam malesuada, odio ac varius semper, leo urna facilisis neque, ut tincidunt augue orci id ligula. Mauris tincidunt luctus nisi nec fringilla. Aenean non ante est. Curabitur rhoncus, tellus non feugiat blandit, enim ex finibus tellus, at ultricies urna leo eu risus. Ut laoreet blandit consequat. Maecenas vitae pulvinar lectus, eu egestas eros. Aliquam vitae tempor nibh, sit amet congue sem. Integer ut quam bibendum, vestibulum lectus eget, accumsan dolor.\r\n\r\nSed vel mollis sapien. Curabitur nibh mi, feugiat id lobortis in, consequat non massa. Fusce nec sodales augue. Etiam pharetra, libero at varius vehicula, magna massa fringilla odio, et suscipit neque eros nec nunc. Aliquam vulputate sollicitudin sem. Vestibulum iaculis consectetur pulvinar. Vivamus nec nunc mauris. Pellentesque dignissim, tellus a fermentum tempor, ante libero dictum nunc, nec convallis enim urna vel quam. Mauris ultricies turpis id nisi vehicula, nec ultrices neque ullamcorper. Duis aliquam auctor eros eget placerat. Aliquam iaculis lobortis nisl, quis ullamcorper erat. Morbi non eleifend mauris. Pellentesque semper rhoncus placerat.\r\n\r\nDonec lorem mauris, semper nec pretium a, mollis eget justo. Ut scelerisque ac orci id ornare. Nullam auctor et neque non tincidunt. Cras lacinia dolor sit amet nisi posuere porta. Donec sed sollicitudin purus. Ut nibh ex, auctor ut convallis sit amet, ornare nec metus. Cras feugiat turpis ut neque blandit, at pulvinar velit pretium. Cras efficitur auctor tincidunt. Integer ipsum nulla, ultricies ac ultricies quis, aliquet ut massa. Integer dolor orci, sodales at egestas et, pellentesque blandit eros. Nulla aliquet vehicula metus eu pulvinar. Praesent quam nulla, ornare nec maximus eu, volutpat sit amet diam. Maecenas tristique pharetra massa, consequat efficitur tortor eleifend ut. Etiam eu laoreet nisi.\r\n\r\nMaecenas tempus est quis sem tempor, et interdum libero venenatis. In dolor nisi, ultricies nec ullamcorper vitae, sollicitudin non tellus. Donec pretium mi nec enim hendrerit congue. Maecenas eu diam sit amet justo facilisis venenatis. Nulla rutrum mollis metus, eu finibus augue laoreet quis. Maecenas consequat purus nunc, in dictum nisi blandit eget. Pellentesque sed bibendum lorem. Morbi mattis quam quis diam efficitur, in porttitor ipsum venenatis. Nullam facilisis diam a ipsum consectetur blandit sit amet in justo.', '2020-11-26 18:03:59', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` char(2) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` char(10) NOT NULL,
  `role` enum('admin','editor','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `country`, `city`, `street`, `dob`, `password`, `username`, `role`) VALUES
(16, 'Ante', 'Piket', 'apiket@gmail.com', 'BA', 'Tuzla', 'Mastafador 6', '1977-02-24', '$2y$12$4i7dw4aE/9KEJw4e4PtzuOoBmZsD28i3./X2YHYhnHP39uwY7BLUa', 'PiketMan', 'editor'),
(17, 'Admin', 'Boy', 'admin@gmail.com', 'SB', 'Pariz', 'Le Mache St. 21b', '1994-05-04', '$2y$12$7FTPYPdCvDrht.OKMqDyK.ovZFI00lVbZt22HVG0uBUIE3wT8QG6W', 'AdminMan', 'admin'),
(22, 'Test', 'User', 'testuser@gmail.com', 'KI', 'Pariz', 'Le Mache St. 21b', '2020-10-31', '$2y$12$JOfgXB60C25/RvEm5Vjq2OZPnRjN4IUwXB8LhGW9TeBQZloEfLNti', 'TestMan', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post` (`post`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country` (`country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `post` FOREIGN KEY (`post`) REFERENCES `post` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `country` FOREIGN KEY (`country`) REFERENCES `country` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
