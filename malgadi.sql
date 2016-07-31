-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2016 at 10:59 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `malgadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `earn_money`
--

CREATE TABLE IF NOT EXISTS `earn_money` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `refer_code` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `earn_money`
--

INSERT INTO `earn_money` (`index`, `refer_code`, `fname`, `lname`, `email`, `pass`, `points`) VALUES
(1, '#00AVR', '', '', '', 'SNK.bhimani3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `item_avil` int(11) NOT NULL,
  `tags` text NOT NULL,
  `description` longtext NOT NULL,
  `department` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `avg_star` float NOT NULL DEFAULT '4',
  `total_people` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`index`, `title`, `subtitle`, `item_avil`, `tags`, `description`, `department`, `price`, `discount`, `avg_star`, `total_people`) VALUES
(1, '2 wheel Metal Chassis', '2 Motor High Quality Metal Chassis', 8, '', '<div><h2>2 Motor High Quality Metal Chassis for Arduino/Raspberry-Pi/Robotics</h2><br><br><br>Chassis Board is the mechanical frame structure of the mobile robots. It should is the backbone of the robot. We arrange/connect everything like motors, sensors, wheels, development board, studs, clamps , screws, etc. of the robot to it.<br>It gives us the base to build our robot and allow us place our components according to our requirements.<br><br><br><ul><h3>Features of chassis:</h3><br><li>Single type of screw is compatible.</li><li>Motor Clamp is present.</li><li>There is enough space between the chassis and the wheel for proper movement of the wheel.</li><li>This Chassis board can be used for two  motor based robot.</li><li>This chassis can be used to build for mobile robots.</li><li>This chassis can have one rotary castor wheel for balancing the robot so that it is not tilted to one side of it.</li><li>This chassis can be used along with the Robosapiens Development board.</li></ul></div>', 2, 130, 31, 4, 1),
(2, 'L293D Motor Driver', 'L293D Motor Driver with 4 channel output', 3, '', '<div>\r\nWe bring forth L293D Motor Driver for driving DC motors and is ideal for robotics applications. L293D Motor Driver is a medium power motor driver perfect for driving DC motors and Stepper motors. L293D Motor Driver uses the popular L293D H-bridge motor driver IC. It can drive 4 DC motors in one direction, or drive 2 DC motors in both the directions with speed control. The driver greatly simplifies and increases the ease with which you may control motors, relays, etc. from microcontrollers. L293D Motor Driver can drive motors up to 12 V with a total DC current of up to 600mA\r\n<br><br><br>\r\n<h2>Specifications :</h2><br>\r\n<ul>\r\n<li>Operating Voltage : 7 V to 12V DC</li>\r\n<li>4 channel output(can drive 2 DC motors bidirectional)</li>\r\n<li>600mA output current capability per channel</li>\r\n<li>PTR connectors for easy connections</li>\r\n<li>User accessible enable pins facility</li>\r\n</ul><br><br>\r\nPackage Content : L293D motor driver board</div>', 2, 150, 21, 4, 1),
(4, 'IR Sensor Module', 'Robodo Ir Infrared Obstacle, Proximity, Line Following Sensor Module - For Rasberry Pi, Arduino, Avr, Pic, 8051', 10, '', '<b>1)Applications:</b><br>Obstacle Detector Sensor, Line Following Sensor, Proximity Sensor<br>2) 10-12cm range. Potentiometer for maximum range setting.<br>3) Can be used to differentiate between black and white (Can be used for line sensing<br>4) Onboard LED indication for detection<br>5) Works on 5V or 3.3V input. TTL compatible output', 4, 80, 11, 4, 1),
(5, '9 V battery with cap', '9 V non rechargable battery with cap', 30, '', '9V battery with cap', 1, 25, 6, 4, 1),
(6, 'DC Hobby BO Motor - 60 RPM', 'DC motor', 10, '', '<div>\r\n<b>Voltage:</b> 3V - 9V.<br>\r\n<b>Current:</b> 100mA at 9V @ no load.<br>\r\n<b>Speed:</b> 100 RPM.<br>\r\n</div>', 2, 110, 25, 4, 1),
(7, 'BO small wheel', 'BO wheel with rubber grip', 2, '', 'Screw is mounted from front for keeping wheel in place.<br>\nDiameter of wheel: 75mm (7.5cm).<br>\nWidth of wheel: 15mm (1.5cm).<br>', 2, 25, 15, 4, 1),
(8, 'Caster wheel', 'Caster wheel with 3 mounting holes', 10, '', 'Caster for general robotic application. 15mm diameter caster wheel with 3 mounting holes. Ball diameter 13mm<br>\r\nwidely used in line follower robot', 2, 25, 6, 4, 1),
(9, 'Bread Board 840 Points', 'High Quality Nickel Plated 840 Points Bread Board', 10, '', '840 Tie points - 128 Groups of 5 connected terminals, 8 Bus of 25 connected terminals.<br>\r\nReusable for fast build a prototype of an electronic circuit - will accept transistors, diodes, LEDS, resistors, capacitors and virtually all types of components - No soldering required - Can modify or revise the circuits easily<br>\r\nFit for jumper wire of 0.8mm diameter - Standard 2.54mm hole spacing<br>\r\nAdhesive sheet on the back side of the board - Multiple breadboards can be spliced together too<br>\r\n\r\n', 1, 90, 31, 4, 1),
(10, 'Digital Multimeter ', 'Digital Multimeter Small Yellow Color LCD AC DC Measuring Voltage Current', 10, '', 'Small Multimeter for your day to day needs<br>\r\nIf you have basic knowledge about Multimeters you can try this small Multimeter for basic continuity checks & Voltage Measurements<br>\r\nWhen testing DC voltage, AC voltage, DC current, resistance, diode, buzzer and battery, connect the red test lead to V 0 mA jack and black test lead to COM jack.<br>\r\nWhen testing the current more than 200mA, connect the red test lead to OADC jack and black test lead to COM jack<br>\r\nWhen testing the temperature, connect the temperature probe to V, 0, mA jack or COM jack.<br>', 1, 130, 31, 4, 1),
(11, 'male to female jumper pins (10 unit)', '', 10, '', 'in all different colour', 1, 50, 20, 4, 1),
(12, 'male to male jumper pins (10 unit)', '', 10, '', 'In all different color', 1, 50, 20, 4, 1),
(13, 'Cutter', 'Wire Stripper and Cutter', 10, '', '-High-quality and cost competitive hand tools for safe use.<br>\r\n- Product type:Hand Tools<br>\r\n- PYE make Wire stripper and Wire cutter for Home, Industrial or workmans use.<br> \r\n- Easy to use and durable for long lasting use.', 1, 50, 15, 4, 1),
(14, 'PCB 6 inch x 4 inch( Perfboard )', 'General purpose pcb 6x4', 6, '', '*** MUST HAVE FOR STUDENTS AND HOBBYIST ***', 1, 50, 15, 4, 1),
(15, 'PCB 4 inch x 4 inch( Perfboard )', 'General purpose pcb 4x4', 6, '', '*** MUST HAVE FOR STUDENTS AND HOBBYIST ***', 1, 30, 10, 4, 1),
(16, '7408 AND Gate', '74F08 (7408) Quad 2-Input AND Gate', 10, '', '', 1, 15, 3, 4, 1),
(17, 'Soldering Iron', '', 10, '', 'S150A 50W, 230V<br>\r\nHeavy Duty Max. Temp upto 200 C<br>\r\nSolder Heat Sink,Metal\r\n', 1, 80, 21, 4, 1),
(18, '7400 NAND Gate', 'NAND Gate', 10, '', '', 1, 15, 3, 4, 1),
(22, 'Soldering Wire', '25 gm (flux added)', 10, '', '<ul>\r\n<li>HIgh quality <li>\r\n<li>Flux Added</li>\r\n<li> Weight: 25g</li>\r\n<li>Wire diameter: 0.5mm </li>\r\n<li> Melting point: 361F/183C</li> \r\n</ul>\r\n100% Brand New and High Quality rosin core solder Good solderability, insulation resistance, No spattering and Non-corrosive.', 1, 45, 10, 4, 1),
(24, 'IC 7432 (OR GATE)', 'OR GATE', 10, '', '2 input OR gate', 1, 15, 3, 4, 1),
(25, 'IC 7404 (NOT GATE)', 'NOT GATE', 10, '', 'For LOGIC NOT GATE operations.', 1, 15, 3, 4, 1),
(26, 'ic 7805 voltage regulator', 'voltage regulator', 10, '', 'voltage regulator ic \r\n5V voltage regulation', 1, 22, 0, 4, 1),
(27, 'Resistor Box', '', 10, '', '150 Resistor 1/4 watt mix resistor (Type 30 x 5 Each) Kit with Box', 1, 35, 7, 4, 1),
(28, 'Double Sided Tap', '', 10, '', 'double sided tap is used for general purpose solution.\r\n<ul>\r\n<li>length :1.5 m </li>\r\n<li> width : 1.2 inch</li>', 1, 30, 10, 4, 1),
(29, 'Connecting Wires (4 meter)', 'single core connecting  wire', 10, '', '<ul>\r\n<li>each wire is length of 1.5 meter.</li>\r\n<li>single core wire with high strength</li>', 1, 25, 7, 4, 1),
(31, 'white LEDs 10 Pieces min.', '', 1000, '', '<ul>\r\n<li>color: white</li>\r\n<li>voltage : 5 v</li>\r\n<li>current : 25 mA max</li>\r\n</ul>', 1, 15, 5, 4, 1),
(32, 'Transistors BC547', '10 pieces min', 1000, '', 'basic transistor for electronics circuit.\r\nfor more info refer datasheet of BC547', 1, 10, 0, 4, 1),
(34, '240/9 V Step Down Transformer', '9-0-9 transformer', 10, '', '<ul>\r\n<li>Type : Step Down Transformer</li>\r\nModel No. : IB0514</li>\r\n<li>Primary Winding Voltage (V) : 240 V</li>\r\n<li>Secondry Winding Voltage (V) : 9 V</li>\r\n<li>Product Description : 9 - 0 - 9 Transformer 500mA</li>\r\n\r\n</ul>', 1, 55, 15, 4, 1),
(37, 'UltraSonic Sensor(Hc-Sr04 )', 'Distance Measuring Sensor Module Good Compatible', 10, '', '<ul>\n<li>Working Voltage : 5V(DC) , Static current: Less than 2mA.</li>\n<li>Output signal : Electric frequency signal, high level 5V, low level 0V. , Sensor angle : Not more than 15 degrees. </li>\n<li>Detection distance : 2cm-450cm. ,High precision : Up to 2mm,Input trigger signal : 10us TTL impulse , Echo signal : output TTL PWL signal NOTE : The module has a blind spot of 2cm(very near).</li>\n</ul>', 4, 125, 26, 4, 1),
(40, 'Arduino UNO cable (A To B)', 'A to B cable to program the Arduino UNO', 0, '', 'easy use: plug and play programming cable for any arduino UNO model', 3, 70, 30, 4, 1),
(41, 'Arduino UNO with A to B cable.', 'latest arduino UNO with micro chip of atmel 328', 4, '', '\n<h3>\n\nLatest Brand New arduino UNO with micro chip in design with atmel 328 controller\n</h3>\n<ul>\n<li>\nMicrocontroller ATmega328P</li>\n<li>Operating Voltage : 5V</li>\n<li>Digital I/O Pins 14 (of which 6 provide PWM output)</li>\n<li>PWM Digital I/O Pins 6 Analog Input Pins 6</li>\n<li>Flash Memory 32 KB (ATmega328P) of which 0.5 KB used by bootloader</li>\n</ul>\n\n', 3, 600, 201, 4, 1),
(42, 'Arduino Nano board 3.0 Atmega328 with cable', 'COD + Free Delivery', 6, '', '\n<h3>\nNano v3.0/Atmega328p Specifications:\n</h3>\n\n<ul>\n\n\n<li>Microcontroller: ATmega328</li>\n<li>Operating Voltage (logic level): 5V</li>\n<li>Input Voltage (recommended): 7-12V</li>\n<li>Input Voltage (limits): 6-20V </li>\n<li>Digital I/O Pins: 14 (of which 6 provide PWM output)</li>\n<li>Analog Input Pins: 8</li>\n<li>DC Current per I/O Pin: 40mA</li>\n<li>Flash Memory: 32KB (ATmega328) of which 2 KB used by bootloader</li>\n<li>SRAM: 2KB (ATmega328)</li>\n<li>EEPROM: 1KB (ATmega328)</li>\n<li>Clock Speed: 16 MHz</li>\n<li>Dimensions: 43 x 18 x 19mm</li>\n<li>Weight: 6</li>\n</ul>', 3, 355, 100, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `od_index` int(11) NOT NULL AUTO_INCREMENT,
  `odid` char(21) NOT NULL,
  `item` int(11) NOT NULL,
  `fname` text NOT NULL,
  `branch` text NOT NULL,
  `sem` int(11) NOT NULL,
  `address` text NOT NULL,
  `ccity` text NOT NULL,
  `mnumber` text NOT NULL,
  `email` text NOT NULL,
  `date` text NOT NULL,
  `status` text NOT NULL,
  `refer_code` text NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`od_index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`od_index`, `odid`, `item`, `fname`, `branch`, `sem`, `address`, `ccity`, `mnumber`, `email`, `date`, `status`, `refer_code`, `price`) VALUES
(3, '#1607200427590PCJ', 1, 'solanki sagar r', 'ec', 5, 'satyam society 2 college road "arti", 2', 'Nadiad', '9714031087', 'solankisagar521@gmail.com', '20/07/2016', 'delivered', '000000', 99),
(5, '#1607200748494UDE', 11, 'Aarsj', 'Ic', 5, 'Aarav boys hostel, ', 'Nadiad', '9879113923', 'desaiaarsh78@gmail.com', '20/07/2016', 'delivered', '000000', 30),
(7, '#1607200409463SBT', 14, 'Punil R Morasiya', 'IC', 7, '119,JANAK KUTIR,L.B.AVENUE SOCIETY,NEAR KISHAN SAMOSA KHANCHO,VANIYAVAD,NADIAD-387001, Kisan samosa khancho', 'NADIAD', '9725137917', 'punilmorasiya@gmail.com', '20/07/2016', 'delivered', '000000', 35),
(8, '#1607200409463SBT', 8, 'Punil R Morasiya', 'IC', 7, '119,JANAK KUTIR,L.B.AVENUE SOCIETY,NEAR KISHAN SAMOSA KHANCHO,VANIYAVAD,NADIAD-387001, Kisan samosa khancho', 'NADIAD', '9725137917', 'punilmorasiya@gmail.com', '20/07/2016', 'delivered', '000000', 19),
(9, '#1607200409463SBT', 8, 'Punil R Morasiya', 'IC', 7, '119,JANAK KUTIR,L.B.AVENUE SOCIETY,NEAR KISHAN SAMOSA KHANCHO,VANIYAVAD,NADIAD-387001, Kisan samosa khancho', 'NADIAD', '9725137917', 'punilmorasiya@gmail.com', '20/07/2016', 'delivered', '000000', 19),
(28, '#1607210122206VBG', 3, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 499),
(30, '#1607210122206VBG', 6, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 85),
(31, '#1607210122206VBG', 6, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 85),
(32, '#1607210122206VBG', 6, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 85),
(33, '#1607210122206VBG', 6, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 85),
(34, '#1607210122206VBG', 8, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 19),
(35, '#1607210122206VBG', 8, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 19),
(36, '#1607210122206VBG', 1, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 99),
(37, '#1607210122206VBG', 1, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 99),
(38, '#1607210122206VBG', 11, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 30),
(39, '#1607210122206VBG', 12, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 30),
(40, '#1607210122206VBG', 2, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 129),
(41, '#1607210122206VBG', 2, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 129),
(42, '#1607210122206VBG', 28, 'Parth Dave', 'CE', 0, 'ddu collage, ce department', 'nadiad', '9558333928', 'snk.bhimani@gmail.com', '21/07/2016', 'delivered', '000000', 15),
(43, '#16072104461519KD', 4, 'Siddharth Patel', 'EC', 5, '19,Rohini soc. , vaniyavad circle, opp. IPCO flats', 'Nadiad', '8460497794', 'siddharthpatel2597@gmail.com', '21/07/2016', 'delivered', '000000', 69),
(44, '#16072104461519KD', 4, 'Siddharth Patel', 'EC', 5, '19,Rohini soc. , vaniyavad circle, opp. IPCO flats', 'Nadiad', '8460497794', 'siddharthpatel2597@gmail.com', '21/07/2016', 'delivered', '000000', 69),
(45, '#16072201110921UE', 10, 'Makhecha Prashant Prahladbhai', 'EC', 3, 'Damodar Nivas Chankya park kishan samosa street, ', 'Nadiad', '9428211517', 'makhechaprashant15@gmail.com', '22/07/2016', 'delivered', '000000', 99),
(46, '#16072201163122UE', 9, 'Makhecha Prashant Prahladbhai', 'EC', 3, 'Damodar Nivas Chankya park kishan samosa street, ', 'Nadiad', '9428211517', 'makhechaprashant15@gmail.com', '22/07/2016', 'delivered', '000000', 69),
(48, '#16072203132624JK', 28, 'Sadrani Jenil Mukeshbhai', 'IT', 5, '19,Rohini Society, Opp.Ipcowala Flats,Vaniyavad,', 'Nadiad', '9687551555', 'sadranijenil@gmail.com', '22/07/2016', 'delivered', '000000', 15),
(58, '#16072205483924LAJ', 18, 'Shivam Hemant Nadiadwala', 'CE', 3, 'C-9,Shree Recidency,B/H New Civil Hospital, Bharuch, Bharuch', 'Bharuch', '9409343100', 'shivam21parmar@gmail.com', '22/07/2016', 'dispattched', '000000', 12),
(59, '#16072205483924LAJ', 18, 'Shivam Hemant Nadiadwala', 'CE', 3, 'C-9,Shree Recidency,B/H New Civil Hospital, Bharuch, Bharuch', 'Bharuch', '9409343100', 'shivam21parmar@gmail.com', '22/07/2016', 'dispattched', '000000', 12),
(60, '#16072206453626BRV', 13, 'Daksh Desai', 'CE', 3, '2 Vimal Park , B/H Shital Cinema Nadiad', 'Nadiad', '9714946562', 'dakshdesai.prof@gmail.com', '22/07/2016', 'delivered', '000000', 35),
(61, '#16072206453626BRV', 5, 'Daksh Desai', 'CE', 3, '2 Vimal Park , B/H Shital Cinema Nadiad', 'Nadiad', '9714946562', 'dakshdesai.prof@gmail.com', '22/07/2016', 'delivered', '000000', 19),
(62, '#16072308202928YUK', 29, 'pankaj sharma', 'EC', 3, 'Room no 101 Royal Care Hostel, ', 'Nadiad', '8128495944', 'makhechaprashant15@gmail.com', '23/07/2016', 'delivered', '000000', 18),
(63, '#16072308202928YUK', 27, 'pankaj sharma', 'EC', 3, 'Room no 101 Royal Care Hostel, ', 'Nadiad', '8128495944', 'makhechaprashant15@gmail.com', '23/07/2016', 'delivered', '000000', 28),
(64, '#16072308481630XSM', 12, 'jainil desai', 'IT', 3, '8 New Swastik society, , vaniyawad circle', 'Nadiad', '7405747597', 'jainil27@gmail.com', '23/07/2016', 'delivered', '000000', 30),
(65, '#16072308481630XSM', 13, 'jainil desai', 'IT', 3, '8 New Swastik society, , vaniyawad circle', 'Nadiad', '7405747597', 'jainil27@gmail.com', '23/07/2016', 'delivered', '000000', 35),
(66, '#16072308481630XSM', 29, 'jainil desai', 'IT', 3, '8 New Swastik society, , vaniyawad circle', 'Nadiad', '7405747597', 'jainil27@gmail.com', '23/07/2016', 'delivered', '000000', 18),
(67, '#16072308481630XSM', 29, 'jainil desai', 'IT', 3, '8 New Swastik society, , vaniyawad circle', 'Nadiad', '7405747597', 'jainil27@gmail.com', '23/07/2016', 'delivered', '000000', 18),
(68, '#16072311364234MSM', 10, 'Rushi shah', 'CE', 3, 'DDU boys Hostel , ', 'Nadiad', '9426559256', 'shah.rushi1802@gmail.com', '23/07/2016', 'delivered', '000000', 99),
(69, '#16072311364234MSM', 9, 'Rushi shah', 'CE', 3, 'DDU boys Hostel , ', 'Nadiad', '9426559256', 'shah.rushi1802@gmail.com', '23/07/2016', 'delivered', '000000', 69),
(70, '#16072311364234MSM', 5, 'Rushi shah', 'CE', 3, 'DDU boys Hostel , ', 'Nadiad', '9426559256', 'shah.rushi1802@gmail.com', '23/07/2016', 'delivered', '000000', 19),
(71, '#16072311364234MSM', 29, 'Rushi shah', 'CE', 3, 'DDU boys Hostel , ', 'Nadiad', '9426559256', 'shah.rushi1802@gmail.com', '23/07/2016', 'delivered', '000000', 18),
(118, '#16072406055760ODN', 10, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 99),
(119, '#16072406055760ODN', 9, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 69),
(120, '#16072406055760ODN', 13, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 35),
(121, '#16072406055760ODN', 16, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 12),
(122, '#16072406055760ODN', 24, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 12),
(123, '#16072406055760ODN', 25, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 12),
(124, '#16072406055760ODN', 18, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 12),
(125, '#16072406055760ODN', 27, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 28),
(126, '#16072406055760ODN', 29, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 18),
(127, '#16072406055760ODN', 29, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 18),
(128, '#16072406055760ODN', 32, 'Dhruv kantharia', 'IC', 3, 'room nu 111,royal care hostel, collage road', 'nadiad', '9033918930', 'dhruvkantharia230@yahoo.com', '24/07/2016', 'delivered', '000000', 10),
(140, '#16072503472649ZZN', 12, 'Vinesh nakum', 'IC', 7, 'Baps CHHATRALAY , ', 'Nadiad', '9624749007', 'makadiyaparth2@gmail.com', '25/07/2016', 'dispattched', '000000', 30),
(150, '#16072512103758KQZ', 10, 'Patel Nachiket P', 'Ce', 3, 'Ddu boys hostel,room no. 306, ', 'Nadiad', '9601284172', 'nachiketpatelnava@gmail.com', '25/07/2016', 'delivered', '000000', 99),
(151, '#16072512103758KQZ', 9, 'Patel Nachiket P', 'Ce', 3, 'Ddu boys hostel,room no. 306, ', 'Nadiad', '9601284172', 'nachiketpatelnava@gmail.com', '25/07/2016', 'delivered', '000000', 69),
(152, '#16072512103758KQZ', 5, 'Patel Nachiket P', 'Ce', 3, 'Ddu boys hostel,room no. 306, ', 'Nadiad', '9601284172', 'nachiketpatelnava@gmail.com', '25/07/2016', 'delivered', '000000', 19),
(153, '#16072512103758KQZ', 29, 'Patel Nachiket P', 'Ce', 3, 'Ddu boys hostel,room no. 306, ', 'Nadiad', '9601284172', 'nachiketpatelnava@gmail.com', '25/07/2016', 'delivered', '000000', 18),
(154, '#16072512103758KQZ', 9, 'Patel Nachiket P', 'Ce', 3, 'Ddu boys hostel,room no. 306, ', 'Nadiad', '9601284172', 'nachiketpatelnava@gmail.com', '25/07/2016', 'delivered', '000000', 69),
(158, '#16072504362158QMZ', 5, 'nero', 'it', 5, 'nadiad, it', 'nadiad', '7567420323', 'nreo1707@gmail.com', '25/07/2016', 'delivered', '000000', 19),
(159, '#16072504464057NSV', 10, 'Rupal Agrawal', 'EC', 3, 'Dinsha Patel Hostel,Alkapuri, Nr. Mahagujarat Hospital', 'Nadiad', '9913090365', 'rupalagrawal94@yahoo.com', '25/07/2016', 'delivered', '000000', 99),
(160, '#16072504464057NSV', 10, 'Rupal Agrawal', 'EC', 3, 'Dinsha Patel Hostel,Alkapuri, Nr. Mahagujarat Hospital', 'Nadiad', '9913090365', 'rupalagrawal94@yahoo.com', '25/07/2016', 'delivered', '000000', 99),
(161, '#16072504464057NSV', 9, 'Rupal Agrawal', 'EC', 3, 'Dinsha Patel Hostel,Alkapuri, Nr. Mahagujarat Hospital', 'Nadiad', '9913090365', 'rupalagrawal94@yahoo.com', '25/07/2016', 'delivered', '000000', 69),
(162, '#16072505483459IAN', 10, 'Ranjana Bairva ', 'EC', 5, 'Yogi krupa, Swastik Society , College Roaf', 'Nadiad', '9426184378', 'ritu.bairva2@gmail.com', '25/07/2016', 'delivered', '000000', 99),
(163, '#16072505514960NNB', 39, 'Sathvara dilip g', 'Ec', 5, '9 A, vrundavan society, vaniyavad, Student vali gali ', 'Nadiad', '9624472763', 'sathvaradilip@gmail.com', '25/07/2016', 'delivered', '000000', 399),
(164, '#16072505514960NNB', 7, 'Sathvara dilip g', 'Ec', 5, '9 A, vrundavan society, vaniyavad, Student vali gali ', 'Nadiad', '9624472763', 'sathvaradilip@gmail.com', '25/07/2016', 'delivered', '000000', 10),
(165, '#16072505514960NNB', 7, 'Sathvara dilip g', 'Ec', 5, '9 A, vrundavan society, vaniyavad, Student vali gali ', 'Nadiad', '9624472763', 'sathvaradilip@gmail.com', '25/07/2016', 'delivered', '000000', 10),
(166, '#16072505514960NNB', 6, 'Sathvara dilip g', 'Ec', 5, '9 A, vrundavan society, vaniyavad, Student vali gali ', 'Nadiad', '9624472763', 'sathvaradilip@gmail.com', '25/07/2016', 'delivered', '000000', 85),
(167, '#16072505514960NNB', 6, 'Sathvara dilip g', 'Ec', 5, '9 A, vrundavan society, vaniyavad, Student vali gali ', 'Nadiad', '9624472763', 'sathvaradilip@gmail.com', '25/07/2016', 'delivered', '000000', 85),
(168, '#16072505514960NNB', 2, 'Sathvara dilip g', 'Ec', 5, '9 A, vrundavan society, vaniyavad, Student vali gali ', 'Nadiad', '9624472763', 'sathvaradilip@gmail.com', '25/07/2016', 'delivered', '000000', 129),
(169, '#16072505514960NNB', 1, 'Sathvara dilip g', 'Ec', 5, '9 A, vrundavan society, vaniyavad, Student vali gali ', 'Nadiad', '9624472763', 'sathvaradilip@gmail.com', '25/07/2016', 'delivered', '000000', 99),
(170, '#16072505514960NNB', 8, 'Sathvara dilip g', 'Ec', 5, '9 A, vrundavan society, vaniyavad, Student vali gali ', 'Nadiad', '9624472763', 'sathvaradilip@gmail.com', '25/07/2016', 'delivered', '000000', 19),
(171, '#16072505514960NNB', 5, 'Sathvara dilip g', 'Ec', 5, '9 A, vrundavan society, vaniyavad, Student vali gali ', 'Nadiad', '9624472763', 'sathvaradilip@gmail.com', '25/07/2016', 'delivered', '000000', 19),
(172, '#16072602113469AUR', 10, 'Rupal Agrawal', 'EC', 3, 'Dinsha Patel Hostel,Alkapuri, Nr. Mahagujarat Hospital', 'Nadiad', '9913090365', 'rupalagrawal94@yahoo.com', '26/07/2016', 'delivered', '000000', 99),
(173, '#16072602113469AUR', 5, 'Rupal Agrawal', 'EC', 3, 'Dinsha Patel Hostel,Alkapuri, Nr. Mahagujarat Hospital', 'Nadiad', '9913090365', 'rupalagrawal94@yahoo.com', '26/07/2016', 'delivered', '000000', 19),
(174, '#16072602113469AUR', 9, 'Rupal Agrawal', 'EC', 3, 'Dinsha Patel Hostel,Alkapuri, Nr. Mahagujarat Hospital', 'Nadiad', '9913090365', 'rupalagrawal94@yahoo.com', '26/07/2016', 'delivered', '000000', 69),
(175, '#16072602113469AUR', 29, 'Rupal Agrawal', 'EC', 3, 'Dinsha Patel Hostel,Alkapuri, Nr. Mahagujarat Hospital', 'Nadiad', '9913090365', 'rupalagrawal94@yahoo.com', '26/07/2016', 'delivered', '000000', 18),
(176, '#16072609384373OXX', 5, 'Raj parmar', 'ce', 3, '4 , aksharpark, opp shilalaekh appartement', 'nadiad', '9033781997', 'parmaraj7@gmail.com', '26/07/2016', 'delivered', '000000', 19),
(177, '#16072612520474CXV', 10, 'karma', 'it', 3, 'ddu boys hostel, near vaniyavad', 'nadiad', '8460529800', 'karmagandhi@ymail.com', '26/07/2016', 'delivered', '000000', 99),
(179, '#16072712333175YES', 27, 'Raj Doshi', 'EC', 3, 'ddu boys hostel, near vaniyavad', 'nadiad', '9913827574', 'rajdoshi13@outlook.com', '27/07/2016', 'delivered', '000000', 28),
(180, '#16072712333175YES', 9, 'Raj Doshi', 'EC', 3, 'ddu boys hostel, near vaniyavad', 'nadiad', '9913827574', 'rajdoshi13@outlook.com', '27/07/2016', 'delivered', '000000', 59),
(181, '#16072712333175YES', 10, 'Raj Doshi', 'EC', 3, 'ddu boys hostel, near vaniyavad', 'nadiad', '9913827574', 'rajdoshi13@outlook.com', '27/07/2016', 'dispattched', '000000', 99),
(182, '#16072911523378URT', 41, 'ishan pattel', 'ic', 7, '109,krishna township,, vaniyawad', 'nadiad', '9574051119', 'ishan1195@gmail.com', '29/07/2016', 'dispattched', '000000', 399),
(183, '#16072911523378URT', 5, 'ishan pattel', 'ic', 7, '109,krishna township,, vaniyawad', 'nadiad', '9574051119', 'ishan1195@gmail.com', '29/07/2016', 'dispattched', '000000', 19),
(184, '#16072911523378URT', 29, 'ishan pattel', 'ic', 7, '109,krishna township,, vaniyawad', 'nadiad', '9574051119', 'ishan1195@gmail.com', '29/07/2016', 'dispattched', '000000', 18),
(185, '#16072911523378URT', 11, 'ishan pattel', 'ic', 7, '109,krishna township,, vaniyawad', 'nadiad', '9574051119', 'ishan1195@gmail.com', '29/07/2016', 'dispattched', '000000', 30),
(186, '#16072911523378URT', 31, 'ishan pattel', 'ic', 7, '109,krishna township,, vaniyawad', 'nadiad', '9574051119', 'ishan1195@gmail.com', '29/07/2016', 'dispattched', '000000', 10);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile_no` text NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `enable` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3339 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`index`, `name`, `email`, `mobile_no`, `subject`, `message`, `enable`) VALUES
(1, 'Avilash Mohanty', 'avilashmohanty1920@gmail.com', '9560372680', 'Spelling errors', 'Hey! It''s me. Your eYSIP Batchmate.\r\nAvoid spelling and grammatical errors, leaves negative impact on Customers and site visitors.', 1),
(2, 'Chaudhary Lakshmi', 'chaudharylakshmi44@gmail.com', 'mobile no', 'Subject', 'Nice idea of providing the components quicker n at cheaper rates... Would be quite useful.!\r\nThank You :) ', 0),
(3, 'SHYAM K BUTANI', 'shyam.butani96@gmail.com', '9586658132', 'too cheap...!!!', 'please increase some price...!!!!!!! ;)', 1),
(4, 'Vekariya Earnest', 'epvekariya28@gmail.com', '9408910948', 'mivrocontroller', 'add TIVA board also.', 0),
(5, 'Makadiya parth', 'makadiyaparth2@gmail.com', '9426177576', 'Require components', 'Arduino neno\r\nMini pump with tube\r\nLCD \r\nRgb led\r\nUSB to TTL for program arduino\r\nUltrasonic sensor\r\n', 0),
(6, 'Earnest', 'epvekariya28@gmail.com', '9408910948', 'Subject', 'add soldering wire', 0),
(7, 'Punil ', 'punilmorasiya@gmail.com', '9725137917', 'Electronics', 'Transistors,CRO probes,arduino nano,LCD display,op amp741,resistors,capacitors,inductors,ir led,photodiode,,LDR,IC LM-35,MOTORS \r\nABOVE COMPONENTS YOU CAN ADD', 0),
(8, 'your respectful father.', 'bencho@gmail.com', '1231231231', 'Topa tu j cho subject', 'F**K your website and you sweetheart', 0),
(9, '', 'sanjaybhut123@gmail.com', '', '', '', 0),
(10, 'sanket', 'snk.bhimani@gmail.com', '9409506643', 'Subject', 'Message...', 0),
(11, 'Siddharth Patel', 'siddharthpatel2597@gmail.com', '8460497794', 'Servo', 'I need small servo motor...', 0),
(12, 'YASH PATEL', 'yashdpatel555@gmail.com', '9998084424', 'Subject', 'GOOD WORK GUYS.\r\nTHE PRODUCTS R VERY GOOD IN QUALITY & AVAILABLE IN REASONABLE PRICE.', 1),
(13, 'keyu', 'jayparekh56@gmail.com', 'mobile no.', 'Subject', 'Message...', 0),
(14, 'Siddharth Patel', 'siddharthpatel2597@gmail.com', '8460497794', 'About Site', 'I would suggest that if Anyone click any where on image then the page should open rather than to click on quick view button.....', 1),
(15, 'i want transistor tip41 A nd tip 42 a.....', 'pp704554@gmail.com', '', '', '', 0),
(16, 'Siddharth Patel', 'siddharthpatel2597@gmail.com', '8460497794', 'Component', 'Can i get audio sensor & buzzer..', 0),
(17, 'Suraj', 'suraj6345@gmail.com', 'mobile no', 'Smooth and Awesome. ', 'Good Looking. \r\nClean and Simple Pics. \r\nCongoðŸ‘ðŸ»ðŸ‘ðŸ»ðŸ‘ðŸ»', 1),
(3332, 'Mehul Budasna', 'mehulbudasna23@gmail.com', '777881025', 'Subject', 'GOOD WORK GUYS.....', 1),
(3333, 'Mehul Budasna', 'mehulbudasna23@gmail.com', '777881025', 'Subject', 'GOOD WORK GUYS.....', 0),
(3334, 'Mehul Budasna', 'mehulbudasna23@gmail.com', '777881025', 'Subject', 'GOOD WORK GUYS.....', 0),
(3335, 'Sadrani Jenil ', 'sadranijenil@gmail.com', '9687551556', 'Subject', 'Great work guys.....!!!!\r\nKeep it up.....!!!ðŸ™ðŸ»ðŸ™ðŸ»ðŸ™ðŸ»ðŸ‘ðŸ»ðŸ‘ðŸ»ðŸ‘ðŸ»', 1),
(3336, 'Meetali Patel', 'patelmeetali27@gmail.com', '9687627496', 'Requirements', 'I need a 12-0-12 V step down transformer. If possible please do arrange it.', 0),
(3337, 'Meetali Patel', 'patelmeetali27@gmail.com', '9687627496', 'Requirements', 'I need a 12-0-12 V step down transformer. If possible please do arrange it.', 0),
(3338, 'Harsh Mandali', 'mandli@gmail.com', '9876543210', 'want latest fresh porn ', 'fuck you!!!!!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `tag` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`index`, `tag`, `value`) VALUES
(1, '', '2 wheel Metal Chassis'),
(2, '', 'L293D Motor Driver'),
(3, '', ''),
(4, '', 'IR Sensor Module'),
(5, '', '9 V battery with cap'),
(6, '', 'DC Hobby BO Motor - 60 RPM'),
(7, '', 'BO small wheel'),
(8, '', 'Caster wheel'),
(9, '', 'Bread Board 840 Points'),
(10, '', 'Digital Multimeter '),
(11, '', 'male to female jumper pins (10 unit)'),
(12, '', 'male to male jumper pins (10 unit)'),
(13, '', 'Cutter'),
(14, '', 'PCB  6cm x 4cm( Perfboard )'),
(15, '', 'PCB  4cm x 4cm( Perfboard )'),
(16, '', '7408 AND Gate'),
(17, '', 'Soldering Iron'),
(18, '', '7400 NAND Gate'),
(19, 'resistor box', 'Resistor Box'),
(20, '', 'Resistor Box'),
(21, '8051 , controller', 'Atmel 89C51 Microcontroller'),
(22, '', 'Soldering Wire'),
(23, '', '7408 IC Quad 2 Input Positive AND Gate '),
(24, '', 'IC 7432 (OR GATE)'),
(25, '', 'IC 7404 (NOT GATE)'),
(26, '', 'ic 7805 voltage regulator'),
(27, '', 'Resistor Box'),
(28, '', 'Double Sided Tap'),
(29, '', 'Connecting Wires (4 meter)'),
(30, '', 'Leds white(minimum 10 pc)'),
(31, '', 'white LEDs 10 Pieces min.'),
(32, '', 'Transistors BC547'),
(33, '', ' 240/9 V Step Down Transformer'),
(34, '', '240/9 V Step Down Transformer'),
(35, '', 'Arduino cable (A To B)'),
(36, '', 'UltraSonic Sensor(Hc-Sr04 )'),
(37, '', 'UltraSonic Sensor(Hc-Sr04 )'),
(38, '', 'Arduino UNO with A to B cable'),
(39, '', 'Arduino UNO with A to B cable'),
(40, '', 'Arduino cable (A To B)'),
(41, '', 'Arduino UNO with A to B cable.'),
(42, '', 'Arduino Nano board 3.0 Atmega328 + Free delivery');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
