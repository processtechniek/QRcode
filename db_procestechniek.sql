-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 10:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_procestechniek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `name`) VALUES
(1, 'Procesbeschrijving'),
(2, 'Grondschemas'),
(3, 'P+I'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_document`
--

CREATE TABLE `tb_document` (
  `id` int(11) NOT NULL,
  `uuid` varchar(200) NOT NULL,
  `documentname` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_document`
--

INSERT INTO `tb_document` (`id`, `uuid`, `documentname`, `type_id`) VALUES
(1, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 'uitleg.pdf', 1),
(2, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 'foto1.png', 2),
(3, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 'test.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL,
  `uuid` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id`, `uuid`, `category_id`, `information`) VALUES
(1, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 1, 'Tekst 1\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porttitor augue ut mauris ullamcorper iaculis. Ut dignissim in mauris ac hendrerit. Vivamus commodo suscipit laoreet. Pellentesque vel odio sit amet elit dignissim tempus. Aliquam lacus est, sollicitudin eu faucibus vel, consectetur sit amet leo. Curabitur at tincidunt odio. Nulla semper, orci sit amet mollis laoreet, augue nisi feugiat arcu, vel rutrum felis eros vel ipsum. Nulla eu felis quis dolor interdum mollis ornare a libero. Aliquam sit amet auctor mauris. Sed sodales ligula velit, sed tempus dui feugiat in. In vulputate dui eu vehicula faucibus. Mauris turpis lectus, porta eu odio in, rutrum tincidunt arcu. Nunc ac dui rhoncus, viverra felis at, aliquam neque. Nunc at luctus leo, nec elementum leo. Donec eget dui molestie augue volutpat porttitor.\n\nMorbi laoreet ullamcorper nulla at luctus. Sed quis est a dui aliquet viverra. Aenean ex lorem, ultricies nec ex ac, sagittis venenatis elit. Suspendisse a lectus tempus, vehicula nibh sed, consequat est. Sed quis erat non nulla ultrices cursus. Fusce non mattis ipsum, nec dictum enim. Vestibulum tempus finibus lacus eu tincidunt. Quisque gravida turpis arcu, nec lobortis dui elementum vel. Mauris eget mi eget urna elementum imperdiet. Aenean sed erat pellentesque, convallis lorem vel, luctus purus.\n\nIn elit enim, consectetur quis scelerisque quis, porttitor ut enim. Sed tristique massa congue dolor rutrum, eu luctus felis volutpat. Aenean lacus nibh, hendrerit nec enim vel, aliquet sagittis dui. Integer sit amet porta mauris. Aliquam feugiat congue lectus, ut iaculis justo feugiat eget. Integer non pharetra erat, eget dignissim arcu. Aenean eu felis ac odio eleifend aliquet sed et elit. Nulla rhoncus, justo eget rhoncus pretium, arcu magna blandit odio, in rutrum diam ipsum eu dui. Nulla rhoncus leo ut porta rutrum. Donec arcu odio, lacinia et diam id, imperdiet molestie lorem. Aliquam eget maximus sem. Integer non blandit ante. Ut dictum quam sed viverra molestie. Suspendisse nec porta dolor.\n\nPraesent molestie metus eu felis elementum, id faucibus ligula faucibus. Praesent faucibus nisl vel lobortis porttitor. Nulla quis blandit velit. Curabitur varius porta arcu in interdum. In a mattis purus. Vestibulum ac lectus sed ipsum gravida aliquet a ut massa. Fusce at luctus lectus. Proin quis vehicula odio. Fusce et dolor vel leo rutrum vestibulum sed id arcu. Proin egestas ultricies purus, id tempus nibh feugiat vitae. Donec venenatis consectetur magna, aliquam accumsan nibh ultrices eu. Phasellus tempus orci sit amet nunc lacinia, quis consequat leo cursus. Ut malesuada vitae urna sit amet faucibus. Aenean fringilla mauris ac consectetur imperdiet. In maximus commodo dolor cursus commodo. Etiam consequat pretium eros vitae porttitor.\n\nFusce sed cursus felis, tempor porta ante. Integer auctor pharetra ex non iaculis. Ut a porta orci, vel molestie arcu. Morbi rhoncus erat non condimentum malesuada. Sed nunc nibh, congue non suscipit at, cursus id augue. Ut convallis est id nisl auctor tincidunt. Etiam ut eleifend leo, vitae mattis libero. Aliquam blandit nunc sed lectus convallis suscipit. Phasellus venenatis egestas nibh, quis lobortis arcu lobortis vel. Mauris porta metus at imperdiet semper. Morbi venenatis sapien ac sem auctor posuere. \n\n\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id faucibus arcu, eu semper diam. Ut sit amet sapien lacus. Nulla augue urna, consequat non ligula sed, sagittis elementum justo. Nullam consectetur, dolor sit amet blandit fermentum, nunc sapien accumsan urna, vel varius justo tortor dignissim lorem. Nunc ut placerat ex. Nunc imperdiet neque et hendrerit suscipit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam at lacus malesuada, aliquet libero suscipit, mollis libero. Donec nulla sapien, viverra nec tempus sed, dignissim quis nisi. Pellentesque sed est massa.\n\nNulla at aliquet lacus. Integer eu purus erat. Aliquam in ante eu lorem sagittis lobortis. Pellentesque laoreet risus sit amet quam malesuada, eu placerat lorem vestibulum. Etiam in arcu a enim luctus dignissim volutpat id dolor. Sed feugiat risus id ligula congue, vitae blandit orci ullamcorper. Aliquam sed leo nulla.\n\nProin venenatis tellus nulla, sit amet viverra mauris venenatis et. Pellentesque diam eros, ultrices vel fermentum id, finibus a est. Pellentesque accumsan, erat et vestibulum accumsan, mauris eros ultrices tellus, in varius nisi enim a ex. Cras eleifend congue turpis in elementum. Duis libero nisl, tempus sed nunc sed, pretium consectetur eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque pellentesque nibh at enim blandit, quis vulputate velit fringilla. Vestibulum lorem ligula, aliquet porttitor felis quis, iaculis faucibus sem. Vivamus vel dapibus neque. Nam mollis ac diam eu rhoncus. Fusce tempor ante vitae tempor ullamcorper. Sed finibus convallis mauris, non semper justo pharetra nec. Pellentesque cursus magna justo, et aliquam erat accumsan sollicitudin. Vestibulum consequat tristique finibus. Vestibulum imperdiet venenatis dolor in porttitor. Nam laoreet sollicitudin dolor.\n\nFusce ligula purus, placerat in lorem ac, aliquet efficitur sem. Quisque sed blandit mauris, in sagittis libero. Donec sit amet est tempus, volutpat eros vitae, egestas nisi. Ut porta vel felis eu scelerisque. Curabitur porta enim non augue sodales, nec egestas urna maximus. Nullam accumsan condimentum arcu, ac finibus libero faucibus pretium. Phasellus dui nunc, sagittis nec vulputate non, sollicitudin ut urna. Morbi finibus aliquam libero, a eleifend mi rutrum at. Quisque eget condimentum nibh. Aliquam eget dui at velit fringilla aliquet. Duis bibendum dictum vehicula. Nulla turpis ex, aliquet a metus sit amet, hendrerit varius felis.\n\nAenean porttitor ex et elementum fringilla. Fusce auctor eget eros eget laoreet. Duis lobortis justo in posuere mollis. Aliquam vehicula eros ut leo aliquam fringilla. Mauris mollis commodo dapibus. In semper suscipit molestie. Pellentesque quis placerat leo, vitae ullamcorper augue. Mauris pharetra sit amet massa laoreet efficitur. Cras euismod auctor ligula ac viverra. Etiam laoreet felis est, vitae egestas metus sollicitudin sed. Cras rutrum pulvinar sapien et vulputate. Sed dapibus urna mauris, quis imperdiet nisi accumsan ac. Nam sed dui tortor. Nam fermentum accumsan diam, eu consequat ipsum fermentum et. '),
(2, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 2, 'Tekst 2\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porttitor augue ut mauris ullamcorper iaculis. Ut dignissim in mauris ac hendrerit. Vivamus commodo suscipit laoreet. Pellentesque vel odio sit amet elit dignissim tempus. Aliquam lacus est, sollicitudin eu faucibus vel, consectetur sit amet leo. Curabitur at tincidunt odio. Nulla semper, orci sit amet mollis laoreet, augue nisi feugiat arcu, vel rutrum felis eros vel ipsum. Nulla eu felis quis dolor interdum mollis ornare a libero. Aliquam sit amet auctor mauris. Sed sodales ligula velit, sed tempus dui feugiat in. In vulputate dui eu vehicula faucibus. Mauris turpis lectus, porta eu odio in, rutrum tincidunt arcu. Nunc ac dui rhoncus, viverra felis at, aliquam neque. Nunc at luctus leo, nec elementum leo. Donec eget dui molestie augue volutpat porttitor.\n\nMorbi laoreet ullamcorper nulla at luctus. Sed quis est a dui aliquet viverra. Aenean ex lorem, ultricies nec ex ac, sagittis venenatis elit. Suspendisse a lectus tempus, vehicula nibh sed, consequat est. Sed quis erat non nulla ultrices cursus. Fusce non mattis ipsum, nec dictum enim. Vestibulum tempus finibus lacus eu tincidunt. Quisque gravida turpis arcu, nec lobortis dui elementum vel. Mauris eget mi eget urna elementum imperdiet. Aenean sed erat pellentesque, convallis lorem vel, luctus purus.\n\nIn elit enim, consectetur quis scelerisque quis, porttitor ut enim. Sed tristique massa congue dolor rutrum, eu luctus felis volutpat. Aenean lacus nibh, hendrerit nec enim vel, aliquet sagittis dui. Integer sit amet porta mauris. Aliquam feugiat congue lectus, ut iaculis justo feugiat eget. Integer non pharetra erat, eget dignissim arcu. Aenean eu felis ac odio eleifend aliquet sed et elit. Nulla rhoncus, justo eget rhoncus pretium, arcu magna blandit odio, in rutrum diam ipsum eu dui. Nulla rhoncus leo ut porta rutrum. Donec arcu odio, lacinia et diam id, imperdiet molestie lorem. Aliquam eget maximus sem. Integer non blandit ante. Ut dictum quam sed viverra molestie. Suspendisse nec porta dolor.\n\nPraesent molestie metus eu felis elementum, id faucibus ligula faucibus. Praesent faucibus nisl vel lobortis porttitor. Nulla quis blandit velit. Curabitur varius porta arcu in interdum. In a mattis purus. Vestibulum ac lectus sed ipsum gravida aliquet a ut massa. Fusce at luctus lectus. Proin quis vehicula odio. Fusce et dolor vel leo rutrum vestibulum sed id arcu. Proin egestas ultricies purus, id tempus nibh feugiat vitae. Donec venenatis consectetur magna, aliquam accumsan nibh ultrices eu. Phasellus tempus orci sit amet nunc lacinia, quis consequat leo cursus. Ut malesuada vitae urna sit amet faucibus. Aenean fringilla mauris ac consectetur imperdiet. In maximus commodo dolor cursus commodo. Etiam consequat pretium eros vitae porttitor.\n\nFusce sed cursus felis, tempor porta ante. Integer auctor pharetra ex non iaculis. Ut a porta orci, vel molestie arcu. Morbi rhoncus erat non condimentum malesuada. Sed nunc nibh, congue non suscipit at, cursus id augue. Ut convallis est id nisl auctor tincidunt. Etiam ut eleifend leo, vitae mattis libero. Aliquam blandit nunc sed lectus convallis suscipit. Phasellus venenatis egestas nibh, quis lobortis arcu lobortis vel. Mauris porta metus at imperdiet semper. Morbi venenatis sapien ac sem auctor posuere. \n\n\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id faucibus arcu, eu semper diam. Ut sit amet sapien lacus. Nulla augue urna, consequat non ligula sed, sagittis elementum justo. Nullam consectetur, dolor sit amet blandit fermentum, nunc sapien accumsan urna, vel varius justo tortor dignissim lorem. Nunc ut placerat ex. Nunc imperdiet neque et hendrerit suscipit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam at lacus malesuada, aliquet libero suscipit, mollis libero. Donec nulla sapien, viverra nec tempus sed, dignissim quis nisi. Pellentesque sed est massa.\n\nNulla at aliquet lacus. Integer eu purus erat. Aliquam in ante eu lorem sagittis lobortis. Pellentesque laoreet risus sit amet quam malesuada, eu placerat lorem vestibulum. Etiam in arcu a enim luctus dignissim volutpat id dolor. Sed feugiat risus id ligula congue, vitae blandit orci ullamcorper. Aliquam sed leo nulla.\n\nProin venenatis tellus nulla, sit amet viverra mauris venenatis et. Pellentesque diam eros, ultrices vel fermentum id, finibus a est. Pellentesque accumsan, erat et vestibulum accumsan, mauris eros ultrices tellus, in varius nisi enim a ex. Cras eleifend congue turpis in elementum. Duis libero nisl, tempus sed nunc sed, pretium consectetur eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque pellentesque nibh at enim blandit, quis vulputate velit fringilla. Vestibulum lorem ligula, aliquet porttitor felis quis, iaculis faucibus sem. Vivamus vel dapibus neque. Nam mollis ac diam eu rhoncus. Fusce tempor ante vitae tempor ullamcorper. Sed finibus convallis mauris, non semper justo pharetra nec. Pellentesque cursus magna justo, et aliquam erat accumsan sollicitudin. Vestibulum consequat tristique finibus. Vestibulum imperdiet venenatis dolor in porttitor. Nam laoreet sollicitudin dolor.\n\nFusce ligula purus, placerat in lorem ac, aliquet efficitur sem. Quisque sed blandit mauris, in sagittis libero. Donec sit amet est tempus, volutpat eros vitae, egestas nisi. Ut porta vel felis eu scelerisque. Curabitur porta enim non augue sodales, nec egestas urna maximus. Nullam accumsan condimentum arcu, ac finibus libero faucibus pretium. Phasellus dui nunc, sagittis nec vulputate non, sollicitudin ut urna. Morbi finibus aliquam libero, a eleifend mi rutrum at. Quisque eget condimentum nibh. Aliquam eget dui at velit fringilla aliquet. Duis bibendum dictum vehicula. Nulla turpis ex, aliquet a metus sit amet, hendrerit varius felis.\n\nAenean porttitor ex et elementum fringilla. Fusce auctor eget eros eget laoreet. Duis lobortis justo in posuere mollis. Aliquam vehicula eros ut leo aliquam fringilla. Mauris mollis commodo dapibus. In semper suscipit molestie. Pellentesque quis placerat leo, vitae ullamcorper augue. Mauris pharetra sit amet massa laoreet efficitur. Cras euismod auctor ligula ac viverra. Etiam laoreet felis est, vitae egestas metus sollicitudin sed. Cras rutrum pulvinar sapien et vulputate. Sed dapibus urna mauris, quis imperdiet nisi accumsan ac. Nam sed dui tortor. Nam fermentum accumsan diam, eu consequat ipsum fermentum et. '),
(3, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 3, 'Tekst 3\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porttitor augue ut mauris ullamcorper iaculis. Ut dignissim in mauris ac hendrerit. Vivamus commodo suscipit laoreet. Pellentesque vel odio sit amet elit dignissim tempus. Aliquam lacus est, sollicitudin eu faucibus vel, consectetur sit amet leo. Curabitur at tincidunt odio. Nulla semper, orci sit amet mollis laoreet, augue nisi feugiat arcu, vel rutrum felis eros vel ipsum. Nulla eu felis quis dolor interdum mollis ornare a libero. Aliquam sit amet auctor mauris. Sed sodales ligula velit, sed tempus dui feugiat in. In vulputate dui eu vehicula faucibus. Mauris turpis lectus, porta eu odio in, rutrum tincidunt arcu. Nunc ac dui rhoncus, viverra felis at, aliquam neque. Nunc at luctus leo, nec elementum leo. Donec eget dui molestie augue volutpat porttitor.\n\nMorbi laoreet ullamcorper nulla at luctus. Sed quis est a dui aliquet viverra. Aenean ex lorem, ultricies nec ex ac, sagittis venenatis elit. Suspendisse a lectus tempus, vehicula nibh sed, consequat est. Sed quis erat non nulla ultrices cursus. Fusce non mattis ipsum, nec dictum enim. Vestibulum tempus finibus lacus eu tincidunt. Quisque gravida turpis arcu, nec lobortis dui elementum vel. Mauris eget mi eget urna elementum imperdiet. Aenean sed erat pellentesque, convallis lorem vel, luctus purus.\n\nIn elit enim, consectetur quis scelerisque quis, porttitor ut enim. Sed tristique massa congue dolor rutrum, eu luctus felis volutpat. Aenean lacus nibh, hendrerit nec enim vel, aliquet sagittis dui. Integer sit amet porta mauris. Aliquam feugiat congue lectus, ut iaculis justo feugiat eget. Integer non pharetra erat, eget dignissim arcu. Aenean eu felis ac odio eleifend aliquet sed et elit. Nulla rhoncus, justo eget rhoncus pretium, arcu magna blandit odio, in rutrum diam ipsum eu dui. Nulla rhoncus leo ut porta rutrum. Donec arcu odio, lacinia et diam id, imperdiet molestie lorem. Aliquam eget maximus sem. Integer non blandit ante. Ut dictum quam sed viverra molestie. Suspendisse nec porta dolor.\n\nPraesent molestie metus eu felis elementum, id faucibus ligula faucibus. Praesent faucibus nisl vel lobortis porttitor. Nulla quis blandit velit. Curabitur varius porta arcu in interdum. In a mattis purus. Vestibulum ac lectus sed ipsum gravida aliquet a ut massa. Fusce at luctus lectus. Proin quis vehicula odio. Fusce et dolor vel leo rutrum vestibulum sed id arcu. Proin egestas ultricies purus, id tempus nibh feugiat vitae. Donec venenatis consectetur magna, aliquam accumsan nibh ultrices eu. Phasellus tempus orci sit amet nunc lacinia, quis consequat leo cursus. Ut malesuada vitae urna sit amet faucibus. Aenean fringilla mauris ac consectetur imperdiet. In maximus commodo dolor cursus commodo. Etiam consequat pretium eros vitae porttitor.\n\nFusce sed cursus felis, tempor porta ante. Integer auctor pharetra ex non iaculis. Ut a porta orci, vel molestie arcu. Morbi rhoncus erat non condimentum malesuada. Sed nunc nibh, congue non suscipit at, cursus id augue. Ut convallis est id nisl auctor tincidunt. Etiam ut eleifend leo, vitae mattis libero. Aliquam blandit nunc sed lectus convallis suscipit. Phasellus venenatis egestas nibh, quis lobortis arcu lobortis vel. Mauris porta metus at imperdiet semper. Morbi venenatis sapien ac sem auctor posuere. \n\n\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id faucibus arcu, eu semper diam. Ut sit amet sapien lacus. Nulla augue urna, consequat non ligula sed, sagittis elementum justo. Nullam consectetur, dolor sit amet blandit fermentum, nunc sapien accumsan urna, vel varius justo tortor dignissim lorem. Nunc ut placerat ex. Nunc imperdiet neque et hendrerit suscipit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam at lacus malesuada, aliquet libero suscipit, mollis libero. Donec nulla sapien, viverra nec tempus sed, dignissim quis nisi. Pellentesque sed est massa.\n\nNulla at aliquet lacus. Integer eu purus erat. Aliquam in ante eu lorem sagittis lobortis. Pellentesque laoreet risus sit amet quam malesuada, eu placerat lorem vestibulum. Etiam in arcu a enim luctus dignissim volutpat id dolor. Sed feugiat risus id ligula congue, vitae blandit orci ullamcorper. Aliquam sed leo nulla.\n\nProin venenatis tellus nulla, sit amet viverra mauris venenatis et. Pellentesque diam eros, ultrices vel fermentum id, finibus a est. Pellentesque accumsan, erat et vestibulum accumsan, mauris eros ultrices tellus, in varius nisi enim a ex. Cras eleifend congue turpis in elementum. Duis libero nisl, tempus sed nunc sed, pretium consectetur eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque pellentesque nibh at enim blandit, quis vulputate velit fringilla. Vestibulum lorem ligula, aliquet porttitor felis quis, iaculis faucibus sem. Vivamus vel dapibus neque. Nam mollis ac diam eu rhoncus. Fusce tempor ante vitae tempor ullamcorper. Sed finibus convallis mauris, non semper justo pharetra nec. Pellentesque cursus magna justo, et aliquam erat accumsan sollicitudin. Vestibulum consequat tristique finibus. Vestibulum imperdiet venenatis dolor in porttitor. Nam laoreet sollicitudin dolor.\n\nFusce ligula purus, placerat in lorem ac, aliquet efficitur sem. Quisque sed blandit mauris, in sagittis libero. Donec sit amet est tempus, volutpat eros vitae, egestas nisi. Ut porta vel felis eu scelerisque. Curabitur porta enim non augue sodales, nec egestas urna maximus. Nullam accumsan condimentum arcu, ac finibus libero faucibus pretium. Phasellus dui nunc, sagittis nec vulputate non, sollicitudin ut urna. Morbi finibus aliquam libero, a eleifend mi rutrum at. Quisque eget condimentum nibh. Aliquam eget dui at velit fringilla aliquet. Duis bibendum dictum vehicula. Nulla turpis ex, aliquet a metus sit amet, hendrerit varius felis.\n\nAenean porttitor ex et elementum fringilla. Fusce auctor eget eros eget laoreet. Duis lobortis justo in posuere mollis. Aliquam vehicula eros ut leo aliquam fringilla. Mauris mollis commodo dapibus. In semper suscipit molestie. Pellentesque quis placerat leo, vitae ullamcorper augue. Mauris pharetra sit amet massa laoreet efficitur. Cras euismod auctor ligula ac viverra. Etiam laoreet felis est, vitae egestas metus sollicitudin sed. Cras rutrum pulvinar sapien et vulputate. Sed dapibus urna mauris, quis imperdiet nisi accumsan ac. Nam sed dui tortor. Nam fermentum accumsan diam, eu consequat ipsum fermentum et. '),
(4, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 4, 'Tekst 4\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porttitor augue ut mauris ullamcorper iaculis. Ut dignissim in mauris ac hendrerit. Vivamus commodo suscipit laoreet. Pellentesque vel odio sit amet elit dignissim tempus. Aliquam lacus est, sollicitudin eu faucibus vel, consectetur sit amet leo. Curabitur at tincidunt odio. Nulla semper, orci sit amet mollis laoreet, augue nisi feugiat arcu, vel rutrum felis eros vel ipsum. Nulla eu felis quis dolor interdum mollis ornare a libero. Aliquam sit amet auctor mauris. Sed sodales ligula velit, sed tempus dui feugiat in. In vulputate dui eu vehicula faucibus. Mauris turpis lectus, porta eu odio in, rutrum tincidunt arcu. Nunc ac dui rhoncus, viverra felis at, aliquam neque. Nunc at luctus leo, nec elementum leo. Donec eget dui molestie augue volutpat porttitor.\n\nMorbi laoreet ullamcorper nulla at luctus. Sed quis est a dui aliquet viverra. Aenean ex lorem, ultricies nec ex ac, sagittis venenatis elit. Suspendisse a lectus tempus, vehicula nibh sed, consequat est. Sed quis erat non nulla ultrices cursus. Fusce non mattis ipsum, nec dictum enim. Vestibulum tempus finibus lacus eu tincidunt. Quisque gravida turpis arcu, nec lobortis dui elementum vel. Mauris eget mi eget urna elementum imperdiet. Aenean sed erat pellentesque, convallis lorem vel, luctus purus.\n\nIn elit enim, consectetur quis scelerisque quis, porttitor ut enim. Sed tristique massa congue dolor rutrum, eu luctus felis volutpat. Aenean lacus nibh, hendrerit nec enim vel, aliquet sagittis dui. Integer sit amet porta mauris. Aliquam feugiat congue lectus, ut iaculis justo feugiat eget. Integer non pharetra erat, eget dignissim arcu. Aenean eu felis ac odio eleifend aliquet sed et elit. Nulla rhoncus, justo eget rhoncus pretium, arcu magna blandit odio, in rutrum diam ipsum eu dui. Nulla rhoncus leo ut porta rutrum. Donec arcu odio, lacinia et diam id, imperdiet molestie lorem. Aliquam eget maximus sem. Integer non blandit ante. Ut dictum quam sed viverra molestie. Suspendisse nec porta dolor.\n\nPraesent molestie metus eu felis elementum, id faucibus ligula faucibus. Praesent faucibus nisl vel lobortis porttitor. Nulla quis blandit velit. Curabitur varius porta arcu in interdum. In a mattis purus. Vestibulum ac lectus sed ipsum gravida aliquet a ut massa. Fusce at luctus lectus. Proin quis vehicula odio. Fusce et dolor vel leo rutrum vestibulum sed id arcu. Proin egestas ultricies purus, id tempus nibh feugiat vitae. Donec venenatis consectetur magna, aliquam accumsan nibh ultrices eu. Phasellus tempus orci sit amet nunc lacinia, quis consequat leo cursus. Ut malesuada vitae urna sit amet faucibus. Aenean fringilla mauris ac consectetur imperdiet. In maximus commodo dolor cursus commodo. Etiam consequat pretium eros vitae porttitor.\n\nFusce sed cursus felis, tempor porta ante. Integer auctor pharetra ex non iaculis. Ut a porta orci, vel molestie arcu. Morbi rhoncus erat non condimentum malesuada. Sed nunc nibh, congue non suscipit at, cursus id augue. Ut convallis est id nisl auctor tincidunt. Etiam ut eleifend leo, vitae mattis libero. Aliquam blandit nunc sed lectus convallis suscipit. Phasellus venenatis egestas nibh, quis lobortis arcu lobortis vel. Mauris porta metus at imperdiet semper. Morbi venenatis sapien ac sem auctor posuere. \n\n\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id faucibus arcu, eu semper diam. Ut sit amet sapien lacus. Nulla augue urna, consequat non ligula sed, sagittis elementum justo. Nullam consectetur, dolor sit amet blandit fermentum, nunc sapien accumsan urna, vel varius justo tortor dignissim lorem. Nunc ut placerat ex. Nunc imperdiet neque et hendrerit suscipit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam at lacus malesuada, aliquet libero suscipit, mollis libero. Donec nulla sapien, viverra nec tempus sed, dignissim quis nisi. Pellentesque sed est massa.\n\nNulla at aliquet lacus. Integer eu purus erat. Aliquam in ante eu lorem sagittis lobortis. Pellentesque laoreet risus sit amet quam malesuada, eu placerat lorem vestibulum. Etiam in arcu a enim luctus dignissim volutpat id dolor. Sed feugiat risus id ligula congue, vitae blandit orci ullamcorper. Aliquam sed leo nulla.\n\nProin venenatis tellus nulla, sit amet viverra mauris venenatis et. Pellentesque diam eros, ultrices vel fermentum id, finibus a est. Pellentesque accumsan, erat et vestibulum accumsan, mauris eros ultrices tellus, in varius nisi enim a ex. Cras eleifend congue turpis in elementum. Duis libero nisl, tempus sed nunc sed, pretium consectetur eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque pellentesque nibh at enim blandit, quis vulputate velit fringilla. Vestibulum lorem ligula, aliquet porttitor felis quis, iaculis faucibus sem. Vivamus vel dapibus neque. Nam mollis ac diam eu rhoncus. Fusce tempor ante vitae tempor ullamcorper. Sed finibus convallis mauris, non semper justo pharetra nec. Pellentesque cursus magna justo, et aliquam erat accumsan sollicitudin. Vestibulum consequat tristique finibus. Vestibulum imperdiet venenatis dolor in porttitor. Nam laoreet sollicitudin dolor.\n\nFusce ligula purus, placerat in lorem ac, aliquet efficitur sem. Quisque sed blandit mauris, in sagittis libero. Donec sit amet est tempus, volutpat eros vitae, egestas nisi. Ut porta vel felis eu scelerisque. Curabitur porta enim non augue sodales, nec egestas urna maximus. Nullam accumsan condimentum arcu, ac finibus libero faucibus pretium. Phasellus dui nunc, sagittis nec vulputate non, sollicitudin ut urna. Morbi finibus aliquam libero, a eleifend mi rutrum at. Quisque eget condimentum nibh. Aliquam eget dui at velit fringilla aliquet. Duis bibendum dictum vehicula. Nulla turpis ex, aliquet a metus sit amet, hendrerit varius felis.\n\nAenean porttitor ex et elementum fringilla. Fusce auctor eget eros eget laoreet. Duis lobortis justo in posuere mollis. Aliquam vehicula eros ut leo aliquam fringilla. Mauris mollis commodo dapibus. In semper suscipit molestie. Pellentesque quis placerat leo, vitae ullamcorper augue. Mauris pharetra sit amet massa laoreet efficitur. Cras euismod auctor ligula ac viverra. Etiam laoreet felis est, vitae egestas metus sollicitudin sed. Cras rutrum pulvinar sapien et vulputate. Sed dapibus urna mauris, quis imperdiet nisi accumsan ac. Nam sed dui tortor. Nam fermentum accumsan diam, eu consequat ipsum fermentum et. ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_part`
--

CREATE TABLE `tb_part` (
  `id` int(11) NOT NULL,
  `uuid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `qrcode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_part`
--

INSERT INTO `tb_part` (`id`, `uuid`, `name`, `qrcode`) VALUES
(21, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 'JH-14', 'QR-4850f5a9-ec4c-4984-abe5-e62f60b411fc.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `name`) VALUES
(1, 'Docent'),
(2, 'Beheerder');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`id`, `name`) VALUES
(1, 'Bestanden'),
(2, 'Afbeeldingen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `role_id`) VALUES
(4, 'Jelle', 'jelle.s3112@gmail.com', '$2y$10$59Z.KdZp.tRP3AkyHmzuMuST2jajGY0ODC1L.04FL6vIQ2d2gG7BC', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_document`
--
ALTER TABLE `tb_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_part`
--
ALTER TABLE `tb_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_document`
--
ALTER TABLE `tb_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_part`
--
ALTER TABLE `tb_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
