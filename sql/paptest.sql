/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : paptest

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-07-14 13:20:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cartoes
-- ----------------------------
DROP TABLE IF EXISTS `cartoes`;
CREATE TABLE `cartoes` (
  `cartaoId` int(11) NOT NULL AUTO_INCREMENT,
  `cartaoSaldo` varchar(45) NOT NULL,
  `cartaoPessoaId` int(11) NOT NULL,
  PRIMARY KEY (`cartaoId`),
  KEY `fk_cartoes_pessoas1_idx` (`cartaoPessoaId`),
  CONSTRAINT `fk_cartoes_pessoas1` FOREIGN KEY (`cartaoPessoaId`) REFERENCES `pessoas` (`pessoaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cartoes
-- ----------------------------
INSERT INTO `cartoes` VALUES ('12', '15', '107');
INSERT INTO `cartoes` VALUES ('13', '5', '108');
INSERT INTO `cartoes` VALUES ('14', '10', '109');

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `categoriaId` int(11) NOT NULL AUTO_INCREMENT,
  `categoriaName` varchar(45) NOT NULL,
  `categoriaImagePath` varchar(255) NOT NULL,
  PRIMARY KEY (`categoriaId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('34', 'categoria 1', 'images/categorias/categoria 1.png');
INSERT INTO `categorias` VALUES ('35', 'categoria 2', 'images/categorias/categoria 2.png');
INSERT INTO `categorias` VALUES ('36', 'categoria 3', 'images/categorias/categoria 3.png');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `orderNumber` varchar(45) NOT NULL,
  `orderTotal` varchar(45) NOT NULL,
  `orderProdutosArray` varchar(128) NOT NULL,
  `orderCreateTime` varchar(128) NOT NULL,
  `orderStatus` int(11) NOT NULL,
  `orderCartaoId` int(11) NOT NULL,
  PRIMARY KEY (`orderId`),
  KEY `fk_orders_cartoes1_idx` (`orderCartaoId`),
  CONSTRAINT `fk_orders_cartoes1` FOREIGN KEY (`orderCartaoId`) REFERENCES `cartoes` (`cartaoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', 'A74', '1', '[18] => (1), 0, 0, 0, 0, 0, 0, 0', '2017-07-12 11:50:15', '2', '12');
INSERT INTO `orders` VALUES ('2', 'A75', '2', '[18] => (2), 0, 0, 0, 0, 0, 0, 0', '2017-07-12 03:08:00', '2', '12');
INSERT INTO `orders` VALUES ('3', 'A77', '5', '[18] => (5), 0, 0, 0, 0, 0, 0, 0', '2017-07-13 04:53:11', '0', '13');
INSERT INTO `orders` VALUES ('4', 'A77', '2.5', '[18] => (1), [19] => (1), 0, 0, 0, 0, 0, 0', '2017-07-13 04:59:45', '0', '12');
INSERT INTO `orders` VALUES ('5', 'A78', '1.5', '[19] => (1), 0, 0, 0, 0, 0, 0, 0', '2017-07-13 05:03:31', '0', '13');
INSERT INTO `orders` VALUES ('6', 'A78', '1.5', '[19] => (1), 0, 0, 0, 0, 0, 0, 0', '2017-07-13 05:04:16', '0', '13');
INSERT INTO `orders` VALUES ('7', 'A78', '2.5', '[19] => (1), [18] => (1), 0, 0, 0, 0, 0, 0', '2017-07-13 05:04:23', '0', '13');
INSERT INTO `orders` VALUES ('8', 'A78', '2.5', '[19] => (1), [18] => (1), 0, 0, 0, 0, 0, 0', '2017-07-13 05:04:28', '0', '13');
INSERT INTO `orders` VALUES ('9', 'A78', '3.5', '[19] => (1), [18] => (2), 0, 0, 0, 0, 0, 0', '2017-07-13 05:06:03', '0', '13');
INSERT INTO `orders` VALUES ('10', 'A78', '3.5', '[19] => (1), [18] => (2), 0, 0, 0, 0, 0, 0', '2017-07-13 05:06:41', '0', '13');
INSERT INTO `orders` VALUES ('11', 'A78', '2.85', '[22] => (1), [21] => (1), 0, 0, 0, 0, 0, 0', '2017-07-13 05:06:57', '0', '13');
INSERT INTO `orders` VALUES ('12', 'A78', '6', '[18] => (3), [19] => (2), 0, 0, 0, 0, 0, 0', '2017-07-13 05:08:04', '0', '14');
INSERT INTO `orders` VALUES ('13', 'A78', '6', '[18] => (3), [19] => (2), 0, 0, 0, 0, 0, 0', '2017-07-13 05:08:22', '0', '14');
INSERT INTO `orders` VALUES ('14', 'A78', '6', '[18] => (3), [19] => (2), 0, 0, 0, 0, 0, 0', '2017-07-13 05:09:06', '0', '14');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `permissionId` int(11) NOT NULL AUTO_INCREMENT,
  `permissionName` varchar(45) NOT NULL,
  `permissionLevel` varchar(1) NOT NULL,
  PRIMARY KEY (`permissionId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('6', 'admin', '1');

-- ----------------------------
-- Table structure for pessoas
-- ----------------------------
DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE `pessoas` (
  `pessoaId` int(11) NOT NULL AUTO_INCREMENT,
  `pessoaNome` varchar(45) NOT NULL,
  `pessoaMorada` varchar(45) NOT NULL,
  `pessoaTelefone` varchar(45) NOT NULL,
  `pessoaImagePath` varchar(45) NOT NULL,
  PRIMARY KEY (`pessoaId`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pessoas
-- ----------------------------
INSERT INTO `pessoas` VALUES ('107', 'Ze 2', 'Morada', '912123123', 'images/pessoas/Ze Pirilau 2.png');
INSERT INTO `pessoas` VALUES ('108', 'guidance', 'yeayeah', '91123123', 'images/pessoas/guidance.jpeg');
INSERT INTO `pessoas` VALUES ('109', 'first take', 'aaa', 'ttt', 'images/pessoas/first take.jpg');

-- ----------------------------
-- Table structure for produtos
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `produtoId` int(11) NOT NULL AUTO_INCREMENT,
  `produtoName` varchar(45) NOT NULL,
  `produtoPreco` varchar(45) NOT NULL,
  `produtoImagePath` varchar(45) NOT NULL,
  `produtoCategoriaId` int(11) NOT NULL,
  PRIMARY KEY (`produtoId`),
  KEY `fk_produtos_categorias1_idx` (`produtoCategoriaId`),
  CONSTRAINT `fk_produtos_categorias1` FOREIGN KEY (`produtoCategoriaId`) REFERENCES `categorias` (`categoriaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO `produtos` VALUES ('18', 'produto 1', '1', 'images/produtos/produto 1.PNG', '34');
INSERT INTO `produtos` VALUES ('19', 'sumol', '1.50', 'images/produtos/sumol.jpg', '34');
INSERT INTO `produtos` VALUES ('20', 'cola', '1.50', 'images/produtos/cola.jpg', '34');
INSERT INTO `produtos` VALUES ('21', 'ice tea', '1.35', 'images/produtos/ice tea.jpg', '34');
INSERT INTO `produtos` VALUES ('22', 'fanta', '1.50', 'images/produtos/fanta.jpg', '34');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `sessionId` int(11) NOT NULL AUTO_INCREMENT,
  `sessionData` varchar(45) NOT NULL,
  `sessionDateCreated` varchar(45) NOT NULL,
  PRIMARY KEY (`sessionId`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('113', '107 / A72 - vMCXCkOyBudWvtF5X0wr2iBY', '2017-07-10 16:09:20');
INSERT INTO `sessions` VALUES ('114', '107 / A73 - y0oATPYuEzOZUrL3hbb9PZUe', '2017-07-12 10:38:43');
INSERT INTO `sessions` VALUES ('115', '107 / A74 - jGBOF9iJro4DRgVaC5inYIaS', '2017-07-12 11:49:47');
INSERT INTO `sessions` VALUES ('116', '107 / A75 - gSQMZDjonGtrnF3ftEhFCeR3', '2017-07-12 15:07:16');
INSERT INTO `sessions` VALUES ('117', '107 / A76 - WNexAvqxXu3SSIJfHFwSgi3v', '2017-07-13 16:10:44');
INSERT INTO `sessions` VALUES ('118', '108 / A77 - D2m235o1wJMYw4LI0G1CtHNv', '2017-07-13 16:52:38');
INSERT INTO `sessions` VALUES ('119', '107 / A77 - gyMGGEkupJF6LiTJChA5jbRo', '2017-07-13 16:59:42');
INSERT INTO `sessions` VALUES ('120', '108 / A78 - 44YejuvHMGZZiDZQcNDrm9vx', '2017-07-13 17:03:22');
INSERT INTO `sessions` VALUES ('121', '108 / A78 - Zw3y7yGDPyZAGdjTOLvuMVTT', '2017-07-13 17:06:52');
INSERT INTO `sessions` VALUES ('122', '109 / A78 - m19rcneJiUxvX6aZ4VHTWPfq', '2017-07-13 17:07:58');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(45) NOT NULL,
  `userPw` varchar(255) NOT NULL,
  `userPermissionId` int(11) NOT NULL,
  PRIMARY KEY (`userId`),
  KEY `fk_users_permission_idx` (`userPermissionId`),
  CONSTRAINT `fk_users_permission` FOREIGN KEY (`userPermissionId`) REFERENCES `permissions` (`permissionId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('5', 'admin', '$2y$12$T0NxGA46akUgarzW4y9inu6nYRlYaE4wnd3OvqbpeucX1LMjae.cW', '6');
SET FOREIGN_KEY_CHECKS=1;
