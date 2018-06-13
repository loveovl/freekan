SET NAMES utf8;
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `admin_name` varchar(50) NOT NULL COMMENT '管理员昵称',
  `admin_pass` varchar(255) NOT NULL COMMENT '管理员密码',
  `admin_last_time` int(10) DEFAULT NULL COMMENT '管理员上次登录时间',
  `admin_now_time` int(10) DEFAULT NULL COMMENT '管理员当前登录时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `admin` VALUES ('1', 'admin', 'f8a145384b65099b17b9b17b9d64dd03e1', '1522217113', '1522217158');

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `banner_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '轮播id',
  `banner_title` varchar(50) NOT NULL COMMENT '轮播标题',
  `banner_link` varchar(100) NOT NULL COMMENT '轮播连接',
  `banner_img` varchar(100) NOT NULL COMMENT '轮播图片',
  `banner_create_time` int(10) DEFAULT NULL COMMENT '轮播创建时间',
  `banner_update_time` int(10) DEFAULT NULL COMMENT '轮播更新时间',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


INSERT INTO `banner` VALUES ('2', '明天的我和昨天的你约会', 'http://www.yanshi.com/play/3.html', 'http://www.jdanzhan.com/vod/2017-06/5941e601d3ee6.jpg', '1520492414', '1520492414');


DROP TABLE IF EXISTS `dydata`;
CREATE TABLE `dydata` (
  `dy_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '电影id',
  `dy_title` varchar(50) NOT NULL COMMENT '电影标题',
  `dy_img` varchar(100) NOT NULL COMMENT '电影图片地址',
  `dy_desc` varchar(500) NOT NULL COMMENT '电影描述',
  `dy_addr` mediumtext NOT NULL COMMENT '电影数据',
  `dy_sort` int(10) NOT NULL COMMENT '视频排序 数字越大越靠前',
  `dy_create_time` int(10) DEFAULT NULL COMMENT '电影创建时间',
  `dy_update_time` int(10) DEFAULT NULL COMMENT '电影更新时间',
  PRIMARY KEY (`dy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `dydata` VALUES ('3', '明日的我与昨日的你约会', 'http://www.jdanzhan.com/vod/2017-06/5941e601d3ee6.jpg', '美术大学学生南山高寿与福寿爱美电车相遇，他鼓起勇气向女孩表白。在一起后，高寿慢慢发现两人原是旧识，而女孩身上，也隐藏着诸多秘密。', '超清HD$http://jiexi.rxffzh.cn/mp4.php?url=http://down.xgysxz.me:2429/明日的我与昨日的你约会BD日语中字.mp4', '0', '1520492359', null);
INSERT INTO `dydata` VALUES ('4', '我脑中的橡皮擦', 'http://tupian.tupianzy.com/pic/upload/vod/2017-04-06/201704061491492572.jpg', '一次偶尔中，25岁的香野可菜（深田恭子 饰）结识了名叫濑尾凉介（及川光博 饰）的女子，两人之间很快就发生了真诚的感情。就在可菜和凉介的感情急速升温之时，可菜的母亲梓（田中好子 饰【《玫瑰汽车旅馆》短评：男主眼熟no idea】）从医生处失掉了凶讯——年岁悄悄的可菜居然患上了阿尔茨海默氏症，这一病症的最大症状就是失忆，并且无法治愈，梓决议将这一音讯瞒着可菜和凉介。 　　病发的可菜被送入了病院，之后，凉介决议同可菜结婚。再也无法隐瞒病情的梓将一切的一切都通知了凉介，但这却并没有坚定凉介对可菜的爱意，就这样，凉介和可菜结婚了。婚后，可菜的病情不时的减轻，可她自己照旧被蒙在鼓里。纸终于无法再包住火焰，凉介向可菜道明的本相，肉体和肉体上都蒙受了繁重打击的可菜堕入了深深的苦楚中无法自拔。', '超清HD$http://jiexi.rxffzh.cn/mp4.php?url=http://hao.zuida-youku.com/20170705/qbaOtsJm/index.m3u8', '0', '1520575871', '1521971269');
INSERT INTO `dydata` VALUES ('5', '黑豹', 'http://img3.doubanio.com/view/photo/s_ratio_poster/public/p2512123434.jpg', '在漫威影业的影片《黑豹》中，特查拉在其父亲——前瓦坎达国王去世之后，回到了这个科技先进但与世隔绝的非洲国家，继任成为新一任“黑豹”及国王。当旧敌重现时，作为“黑豹”及国王的特查拉身陷两难境地，眼看着瓦坎达及全世界陷于危难之中。面对背叛与危险，这位年轻的国王必须联合同盟，释放“黑豹”全部力量，奋力捍卫他的人民和国土。', '超清HD$/public/player/player.php?url=https://v4.438vip.com/20180228/OrU7Nvjn/index.m3u8', '9', '1521993489', '1521993511');
INSERT INTO `dydata` VALUES ('6', '环太平洋：雷霆再起', 'http://tupian.tupianzy.com/pic/upload/vod/2018-03-22/201803221521717237.jpg', '故事发生在距离前作战乱结束十年之后的2035年。随着科技的进步，机甲更新换代，拥有了更先进的功能和更强劲的战斗力。但外星“先驱”仍对地球蠢蠢欲动，当海底虫洞再次被打开，进化而来的怪兽更加庞大且智慧，它们似乎酝酿着更具威胁的阴谋，地球再次陷入被巨兽侵袭的危机。面对机甲驾驶员的短缺，杰克（约翰·波耶加 饰）与奈特（斯科特·伊斯特伍德 饰）这对曾经的机甲驾驶员搭档再次联手，不得不冒险率领从未有过实战经验的机甲学员们奋起抵抗，为守护住人类最后的希望与怪兽展开硬碰硬的激烈一战。', '超清HD$/public/player/player.php?url=http://cn2.zuidadianying.com/20180322/PKehNFo4/index.m3u8', '10', '1521995410', null);


DROP TABLE IF EXISTS `kami`;
CREATE TABLE `kami` (
  `km_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '卡密id',
  `km_num` varchar(100) NOT NULL COMMENT '卡密编号',
  `km_time` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0代表1天  1代表1月 2代表1年',
  `km_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '卡密使用状态  0未使用  1已使用',
  `km_create_time` int(10) unsigned NOT NULL COMMENT '卡密创建时间',
  `km_update_time` int(10) unsigned DEFAULT NULL COMMENT '卡密使用时间',
  `km_used_mem` varchar(20) DEFAULT NULL COMMENT '使用会员名',
  PRIMARY KEY (`km_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS `nav`;
CREATE TABLE `nav` (
  `nav_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `nav_title` varchar(20) NOT NULL COMMENT '导航标题',
  `nav_addr` varchar(255) NOT NULL COMMENT '导航地址',
  `nav_sort` int(10) NOT NULL DEFAULT '0' COMMENT '导航排序 数字越大越靠前',
  `nav_create_time` int(10) DEFAULT NULL COMMENT '导航创建时间',
  `nav_update_time` int(10) DEFAULT NULL COMMENT '导航更新时间',
  PRIMARY KEY (`nav_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `nav` VALUES ('2', '电影', '/movielist/all/1.html', '11', '1520495324', '1520569060');
INSERT INTO `nav` VALUES ('3', '电视', '/tvlist/all/1.html', '13', '1520495358', '1520568944');
INSERT INTO `nav` VALUES ('4', '综艺', '/zylist/all/1.html', '10', '1520569004', '1520569004');
INSERT INTO `nav` VALUES ('5', '动漫', '/dmlist/all/1.html', '9', '1520569028', '1520569028');
INSERT INTO `nav` VALUES ('6', '直播', '/zhibo.html', '3', '1522217218', '1522217218');


DROP TABLE IF EXISTS `tort`;
CREATE TABLE `tort` (
  `tort_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '侵权视频id',
  `tort_name` varchar(20) NOT NULL COMMENT '侵权视频名字',
  `tort_addr` varchar(100) NOT NULL COMMENT '侵权视频地址',
  `tort_create_time` int(10) DEFAULT NULL COMMENT '侵权视频创建时间',
  `tort_update_time` int(10) DEFAULT NULL COMMENT '侵权视频更新时间',
  PRIMARY KEY (`tort_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(20) NOT NULL COMMENT '用户昵称',
  `user_pass` varchar(50) NOT NULL COMMENT '用户密码',
  `user_level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户等级 0表示普通会员 1表示vip会员',
  `user_email` varchar(100) NOT NULL COMMENT '用户邮箱',
  `user_vip_time` int(10) unsigned DEFAULT NULL COMMENT 'VIP到期时间',
  `user_create_date` int(10) unsigned DEFAULT NULL COMMENT '用户创建时间',
  `user_update_date` int(10) unsigned DEFAULT NULL COMMENT '用户更新时间',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1013 DEFAULT CHARSET=utf8;


INSERT INTO `user` VALUES ('1010', 'syskey', 'd714975168b413153fb846fbd523429e', '1', 'huijingdandan@gmail.com', '1525766175', '1520051437', '1520406729');


DROP TABLE IF EXISTS `yqlink`;
CREATE TABLE `yqlink` (
  `yq_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情连接id',
  `yq_name` varchar(30) NOT NULL COMMENT '友情链接名称',
  `yq_link` varchar(50) NOT NULL COMMENT '友情链接',
  `yq_create_time` int(10) DEFAULT NULL COMMENT '友情连接创建时间',
  `yq_update_time` int(10) DEFAULT NULL COMMENT '友情连接更新时间',
  PRIMARY KEY (`yq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `yqlink` VALUES ('5', '苍白影院', 'http://www.29148459.com', '1521994198', '1521994198');
INSERT INTO `yqlink` VALUES ('6', '百度', 'http://www.baidu.com', '1521994257', '1521994257');


DROP TABLE IF EXISTS `zbdata`;
CREATE TABLE `zbdata` (
  `zb_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '直播数据id',
  `zb_title` varchar(20) NOT NULL DEFAULT '' COMMENT '直播标题',
  `zb_addr` varchar(255) NOT NULL COMMENT '直播地址',
  `zb_type` tinyint(4) NOT NULL COMMENT '直播分类 1表示央视 2表示卫视 3 表示其他',
  `zb_sort` int(10) NOT NULL COMMENT '直播排序 数字越大越靠前',
  `zb_create_time` int(10) DEFAULT NULL COMMENT '直播创建时间',
  `zb_update_time` int(10) DEFAULT NULL COMMENT '直播更新时间',
  PRIMARY KEY (`zb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


INSERT INTO `zbdata` VALUES ('0000000002', 'CCTV9', 'http://183.252.176.35//PLTV/88888888/224/3221225929/index.m3u8', '1', '9', '1520493666', '1522150181');
