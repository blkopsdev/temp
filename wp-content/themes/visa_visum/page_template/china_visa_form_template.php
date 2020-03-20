<?php
/**
* Template Name: China Visa Form
*
* @package WordPress
* @subpackage visa_visum
* @since Visa 1.0
*/

$china_nonce = wp_create_nonce('china_form_nonce');
$formSubmit = '';
$cntTraveller = 1;
$redirectURL = '/thank-you/';
$isError = false;

if(!empty($_POST)) {

  $email_address = $_POST['email_address'];
  $telephone = $_POST['telephone'];
  $type_address = $_POST['type_address'];
  $countries = $_POST['countries'];
  $postcode = $_POST['postcode'];
  $house_number = $_POST['house_number'];
  $appart_number = $_POST['appart_number'];
  $street_name = $_POST['street_name'];
  $place_name = $_POST['place_name'];
  $province_name = $_POST['province_name'];
  $departure_date = $_POST['departure_date'];
  $purpose_trip = $_POST['purpose_trip'];
  $number_entries = $_POST['number_entries'];
  $urgent_procedure = $_POST['urgent_procedure'];
  $return_shipment = $_POST['return_shipment'];

  // $postCodeExpression = '/\\A\\b[0-9]{5}(?:-[0-9]{4})?\\b\\z/i';

  if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    $isError = true;
  }

  if (empty($telephone)) {
    $phoneErr = "Please Enter Phone Number";
    $isError = true;
  }

  if (empty($type_address)) {
    $typeAddErr = "Please select address type.";
    $isError = true;
  }

  if (empty($countries)) {
    $countryErr = "Please select country.";
    $isError = true;
  }

  if (empty($postcode)) {
    $postcodeErr = "Please enter postal code.";
    $isError = true;
  }
  if (!empty($postcode) && strlen($postcode) > 8) {
    $postcodeErr = "Please enter valid postal code.";
    $isError = true;
  }

  if (empty($house_number)) {
    $houseErr = "Please enter house number.";
    $isError = true;
  }

  if (empty($street_name)) {
    $streetErr = "Please enter street name.";
    $isError = true;
  }

  if (empty($departure_date)) {
    $departureErr = "Please enter departure date.";
    $isError = true;
  }

  if (empty($purpose_trip)) {
    $purposeErr = "Please select purpose trip.";
    $isError = true;
  }
  /* echo '<pre>';
    var_dump($_POST);
  echo '</pre>'; */

  if(!$isError) {
    $formSubmit = chine_form_submit($_POST);
    wp_redirect( $redirectURL );
    // die();
  }
}
$entries = [
	'single-entry' => [
		'label' => 'Single Entry',
		'price' => 163.35
	],
	'double-entry' => [
		'label' => 'Single or Double Entry',
		'price' => 211.75
	],
	// 'multiple-entry' => [
	// 	'label' => 'Multiple Entry',
	// 	'price' => 230.65
	// ]
];

$cities = [
  "Aba","Aksu","Altay","Alxa Meng","AnKang","Anqing","Anshan","Anshun","Anyang","Baicheng","Baisha Lizu Zizhixian","Baishan","Baiyin","Baoding","Baoji","Baoshan","Baoting Lizu Miaozu Zizhixian","Baotou","Bayannur","Bayingolin Mongol","Bazhong","Beihai","Beijing","Bengbu","Benxi","Bijie","Binzhou","Bortala Mongol","Bose","Bozhou","Cangzhou","Changchun","Changde","Changji","Changjiang Lizu Zizhixian","Changsha","Changzhi","Changzhou","Chaoyang","Chaozhou","Chengde","Chengdu","Chengmai Qu","Chenzhou","Chifeng","Chizhou","Chongqing","Chongzuo","Chuxiong","Chuzhou","Da Hinggan Ling","Dali","Dalian","Dandong","Danzhou Shi","Daqing","Datong","Dazhou","Dehong","Deyang","Dezhou","Dingan Xian","Dingxi","Dongfang  Shi","Dongguan","Dongying","Dêqên","Enshi","Ezhou","Fangchenggang","Foshan","Fushun","Fuxin","Fuyang","Fuzhou","Fuzhou","Gannan","Ganzhou","Gaoxiong","Garzê","Golog","Guangan","Guangyuan","Guangzhou","Guigang","Guilin","Guiyang","Guyuan","Haibei","Haidong","Haikou","Hainan","Haixi","Hami","Handan","Hangzhou","Hanzhong","Harbin","Hebi","Hechi","Hefei","Hegang","Heihe","Hengshui","Hengyang","Heyuan","Heze","Hezhou","Hohhot","Honghe","Hongkong Island","Hotan","Huai'an","Huaibei","Huaihua","Huainan","Hualian","Huanggang","Huangnan","Huangshan","Huangshi","Huizhou","Huludao","Hulun Buir","Huzhou","Ili Kazak","Ji'an","Jiamusi","Jiangmen","Jiaozuo","Jiaxing","Jiayi","Jiayuguan","Jieyang","Jilin","Jilong","Jinan","Jinchang","Jincheng","Jingdezhen","Jingmen","Jingzhou","Jinhua","Jining","Jinzhong","Jinzhou","Jiujiang","Jiulong","Jiuquan","Jixi","Kaifeng","Karamay","Kashi","Kizilsu Kirgiz","Kunming","Laibin","Laiwu","Langfang","Lanzhou","Ledong Lizu Zizhixian","Leshan","Lhasa","Liangshan","Lianyungang","Liaocheng","Liaoyang","Liaoyuan","Lijiang","Lincang","Linfen","Lingao Xian","Lingshui Lizu Zizhixian","Linxia","Linyi","Linzhi Shi","Lishui","Liupanshui","Liuzhou","Longnan","Longyan","Loudi","Lu'an","Luohe","Luoyang","Luzhou","Lüliang","Ma'anshan","Macao","Maoming","Meishan","Meizhou","Mianyang","Miaosu","MudanJiang","Nagqu","Nanchang","Nanchong","Nanjing","Nanning","Nanping","Nansha","Nantong","Nantou","Nanyang","Neijiang","Ngari","Ningbo","Ningde","Nujiang","Ordos","Panjin","Panzhihua","Penghu","Pingdingshan","Pingdong","Pingliang","Pingxiang","Pu'er","Putian","Puyang","Qamdo","Qian'an Shi","Qiandongnan","Qianjiang","Qiannan","Qianxinan","Qingdao","Qingyang","Qingyuan","Qinhuangdao","Qinzhou","Qionghai   Shi","Qiongzhong Lizu Miaozu Zizhixian","Qiqihar","QitaiHe","Quanzhou","Qujing","Quzhou","Rizhao","Sanmenxia","Sanming","Sanya","Shanghai","Shangluo","Shangqiu","Shangrao","Shannan","Shantou","Shanwei","Shaoguan","Shaoxing","Shaoyang","Shennongjia","Shenyang","Shenzhen","Shijiazhuang","Shiyan","Shizuishan","ShuangyaShan","Shuozhou","Siping","Songyuan","Suihua","Suining","Suizhou","Suqian","Suzhou","Suzhou","Tacheng","Tai'an","Taibei","Taidong","Tainan","Taiyuan","Taizhong","Taizhou","Taizhou","Tangshan","Taoyuan","Tianjin","Tianmen","Tianshui","Tieling","Tongchuan","Tonghua","Tongliao","Tongling","Tongren","Tunchang Xian","Turpan","Ulanqab","Wanning Qu","Weifang","Weihai","Weinan","Wenchang Qu","Wenshan","Wenzhou","Wuhai","Wuhan","Wuhu","Wuwei","Wuxi","Wuzhishan   Shi","Wuzhong","Wuzhou","Xi'an","Xiamen","Xiangfan","Xiangtan","Xiangxi","Xianning","Xiantao","Xianyang","Xiaogan","Xigazê ","Xilin Gol Meng","Xingan Meng","Xingtai","Xining","Xinjie","Xinxiang","Xinyang","Xinyu","Xinzhou","Xinzhu","Xishuangbanna","Xuancheng","Xuchang","Xuzhou","Ya'an","Yan'an","Yanbian","Yancheng","Yangjiang","Yangquan","Yangzhou","Yantai","Yibin","Yichang","Yichun","Yichun","Yilan","Yinchuan","Yingkou","Yingtan","Yiyang","Yongzhou","Yueyang","Yulin","Yulin","Yuncheng","Yunfu","Yunlin","Yushu","Yuxi","Zaozhuang","Zhanghua","Zhangjiajie","Zhangjiakou","Zhangye","Zhangzhou","Zhanjiang","Zhaoqing","Zhaotong","Zhengzhou","Zhenjiang","Zhongshan","Zhongwei","Zhoukou","Zhoushan","Zhuhai","Zhumadian","Zhuzhou","Zibo","Zigong","Ziyang","Zunyi","ürümqi"
];

$districts = [
  "Lushan Shi","A'ershan Shi","A'rong Qi","Abaga Qi","Aba （Ngawa） Xian","Acheng Qu","Aihui Qu","Aimin Qu","Akesai Hashakezu Zizhixian","Akqi Xian","Aksu Shi","Akto Xian","Alashan Youqi","Alashan Zuoqi","Alashankou Shi","Altay Shi","Aluke'erqin Qi","Anci Qu","Anda Shi","Anding Xian","Anduo Xian","Anfu Xian","Angangxi Qu","Angren Xian","Anguo Shi","Anhua Xian","Anji Xian","Anju Qu","Anlong Xian","Anlu Shi","Anning Qu","Anning Shi","Anping Xian","Anqiu Shi","Anren Xian","Ansai Qu","Antu Xian","Anxi Xian","Anxiang Xian","Anxin Xian","Anyang Xian","Anyi Xian","Anyuan Qu","Anyuan Xian","Anyue Xian","Anze Xian","Anzhou Qu","Aohan Qi","Artux Shi","Awat Xian","Babu Qu","Bachu （Maralbexi） Xian","Badong Xian","Bagongshan Qu","Baicheng （Bay） Xian","Baihe Xian","Baijiantan Qu","Bailang Xian","Baima Xian","Baiquan Xian","Baishui Xian","Baita Qu","Baixiang Xian","Baiyin Qu","Baiyu Xian","Baiyun Ebo Kuangqu","Baiyun Qu","Balikunhasake Zizhixian","Balin Youqi","Balin Zuoqi","Bama Yaozu  Zizhixian","Banan Qu","Bange Xian","Bao'an Qu","Baode Xian","Baodi Qu","Baofeng Xian","Baohe Qu","Baojing Xian","Baokang Xian","Baoqing Xian","Baoshan Qu","Baota Qu","Baoxing Xian","Baoying Xian","Baqiao Qu","Baqing Xian","Basu Xian","Batang Xian","Bayan Xian","Bayi Qu","Bayuquan Qu","Bazhou Shi","Bazhou Xian","Bei'an Shi","Beibei Qu","Beichen Qu","Beichuan Qiangzu Zizhixian","Beidaihe Qu","Beiguan Qu","Beihu Qu","Beilin Qu","Beiliu Shi","Beilun Qu","Beipiao Shi","Beita Qu","Beizhen Shi","Bengshan  Qu","Benxi Manzu Zizhixian","Bianba Xian","Bijiang Qu","Bin Xian","Bincheng Xian","Binchuan Xian","Binhai Xian","Binhai Xinqu","Binhu Qu","Binjiang Qu","Binyang Xian","Biru Xian","Bishan Qu","Bo'ai Xian","Bobai Xian","Bohu（Bagrax）Xian","Bole（Bortala）Shi","Boli Xian","Boluo Xian","Bomi Xian","Boshan Qu","Botou Shi","Bowang Qu","Boxing Xian","Boye Xian","Bozhou Qu","Burang Xian","Burqin Xian","Butuo Xian","Caidian Qu","Cang Xian","Cangnan Xian","Cangshan Qu","Cangshan Xian","Cangwu Xian","Cangxi Xian","Cangyuan Wazu Zizhixian","Cao Xian","Caofeidian Qu","Ceheng Xian","Cengdou Qu","Cengong Xian","Cenxi Shi","Chabuchaerxibozizhi Xian","Chaha'er Youyihouqi","Chaha'er Youyiqianqi","Chaha'er Youyizhongqi","Chaisang Qu","Chaling Xian","Chancheng Qu","Chang'an Qu","Changbai Chaoxianzu Zizhixian","Changdao Xian","Changfeng Xian","Changge Shi","Changhai Xian","Changji Shi","Changjiang Qu","Changle Qu","Changle Xian","Changli Xian","Changling Xian","Changning Qu","Changning Shi","Changning Xian","Changping Qu","Changqing Qu","Changsha Xian","Changshan Xian","Changshou Qu","Changshu Shi","Changshun Xian","Changtai Xian","Changting Xian","Changtu Xian","Changwu Xian","Changxing Xian","Changyang Tujiazu Zizhixian","Changyi Qu","Changyi Shi","Changyuan Xian","Changzhi Xian","Changzhou Qu","Chanhe Huizu Qu","Chao'an Qu","Chaohu Shi","Chaonan Qu","Chaotian Qu","Chaoyang Qu","Chaoyang Xian","Chaya Xian","Chayu Xian","Chenba'er Huqi ","Chencang Qu","Cheng Xian","Cheng'an Xian","ChengWu Xian ","Chengbei Qu","Chengbu Miaozu Zizhixian","Chengcheng Xian","Chengde Xian","Chengdong Qu","Chenggong Qu","Chenggu Qu","Chenggu Xian","Chengguan Qu","Chenghai Qu","Chenghua Qu","Chengjiang Xian","Chengkou Xian","Chengqu","Chengxi Qu","Chengxiang Qu","Chengyang Qu","Chengzhong Qu","Chengzihe Qu","Chenxi Xian","Chibi Shi","Chicheng Xian","Chikan Qu","Chindu Xian","Chiping Xian","Chishui Shi","Chongchuan Qu","Chongli Qu","Chongming Qu","Chongren Xian","Chongxin Xian","Chongyang Xian","Chongyi Xian","Chongzhou Shi","Chuanhui Qu","Chuanshan Qu","Chuanying Qu","Chun'an Xian","Chunhua Xian","Chuxiong Shi","Ci Xian","Cili Xian","Cixi Shi","Conghua Qu","Congjiang Xian","Congtai Qu","Coqên Xian","Cuiluan Qu","Cuiping Qu","Cuomei Xian","Cuona Xian","Da'an Qu","Da'an Shi","DaBanCheng Qu","Dabu Xian","Dachang Huizu Zizhixian","Dachuan shi","Dadong Qu","Dadukou Qu","Daerhanmaomingan Lianheqi","Dafang xian","Dafeng Qu","Daguan Qu","Daguan Xian","Dahua Yaozu  Zizhixian","Dai Xian","Daicheng Xian","Dailing Qu","Daishan Xian","Dalate Qi","Dali Shi","Dali Xian","Daming Xian","Damu Qu","Danba（Rongzhag）Xian","Dancheng Xian","Danfeng Xian","Dangchang Xian","Dangshan Xian","Dangtu Xian","Dangxiong Xian","Dangyang Shi","Daning Xian","Danjiangkou Shi","Danling Xian","Danyang Shi","Danzhai Xian","Dao Xian","Daocheng（Dabba）Xian","Daoli Qu","Daowai Qu","Daozhen Gelaozu Miaozu Zizhixian","Dashiqiao Shi","Datian Xian","Datong Huizu Tuzu Zizhixian","Datong Qu","Datong Xian","Dawa Qu","Dawu Xian","Dawukou Qu","Daxiang Qu","Daxin Xian","Daxing Qu","Dayao Xian","Daye Shi","Dayi Xian","Daying Xian","Dayu Xian","Dazhu Xian","Dazu Qu","De'an Xian","Dechang Xian","Decheng Qu","Dedeping  Xian","Dehua Xian","Dehui Shi","Dejiang Xian","Delhi Shi","Dengfeng Shi","Dengkou Xian","Dengta Shi","Dengzhou Shi","Deqing Xian","Dexing Shi","Dianbai Qu","Dianjiang Xian","Dianjun Qu","Didao Qu","Diecai Qu","Dingbian Xian","Dingcheng Qu","Dinghai Qu","Dinghu Qu","Dingjie Xian","Dingnan Xian","Dingqing Xian","Dingri Xian","Dingtao Qu","Dingxiang Xian","Dingxing Xian","Dingyuan Xian","Dingzhou Shi","Dong Qu","Dong Wuzhumuqin Qi","Dong'an Xian","Dong'e Xian","Dongan Qu","Dongbao Qu","Dongchang Qu","Dongchangfu Qu","Dongcheng Qu","Dongchuan Qu","Dongfeng Qu","Dongfeng Xian","Donggang Qu","Donggang Shi","Dongguang Xian","Donghai Xian","Donghe Qu","Donghu Qu","Dongkou Xian","Donglan Xian","Dongli Qu","Dongliao Xian","Dongming Xian","Dongning Shi","Dongping Xian","Dongpo Qu","Dongshan Qu","Dongshan Xian","Dongsheng Qu","Dongtai Shi","Dongtou Qu","Dongxiang Qu","Dongxiangzu Zizhixian","Dongxihu Qu","Dongxing Qu","Dongxing Shi","Dongyang Shi","Dongying Qu","Dongyuan Xian","Dongzhi Xian","Dongzhou Qu","Doumen Qu","Du'an Yaozu  Zizhixian","Duanzhou Qu","Duchang Xian","Duerbote Mengguzu Zizhixian","Duilongdeqing Qu","Duji Qu","Dujiangyan Shi","Dulan Xian","Dunhua Shi","Dunhuang Shi","Dunhuasala Zizhixian","Duodao Qu","Duolun  Xian","Dushan Xian","Dushanzi Qu","Duyun Shi","Dêgê Xian","Dêqên Xian","Dêrong Xian","E'ergu'na Shi","E'lunchun Zizhiqi","E'tuoke Qi","E'tuoke Qianqi","Ebian Yizu Zizhixian","Echeng Qu","Ejina Qi","Emeishan Shi","Emin（Dorbiljin）Xian","Enping Shi","Enshi Shi","Enyang Xian","Er'lianhaote Shi","Erdao Qu","Erdaojiang Qu","Erqi Qu","Eryuan Xian","Eshan Yizu Zizhixian","Faku Xian","Fan Xian","Fanchang Xian","Fancheng Qu","Fang Xian","Fangcheng Qu","Fangcheng Xian","Fangshan Qu","Fangshan Xian","Fangzheng Xian","Fangzi Qu","Fanyu Qu","Fanzhi Xian","Fei Xian","Feicheng Shi","Feidong Xian","Feixi Xian","Feixiang Qu","Feng Xian","Fengcheng Shi","Fengdu Xian","Fengfeng Kuangqu","Fenggang Xian","Fenghua Qu","Fenghuang Xian","Fengjie Xian","Fengkai Xian","Fengman Qu","Fengnan Qu","Fengning Manzu Zizhixian","Fengqing Xian","Fengqiu Xian","Fengquan Qu","Fengrun Qu","Fengshan Xian","Fengshun Xian","Fengtai Qu","Fengtai Xian","Fengxian Qu","Fengxiang Xian","Fengxin Xian","Fengyang Xian","Fengze Qu","Fengzhen Shi ","Fenxi Xian","Fenyang Shi","Fenyi Xian","Fogang Xian","Foping Xian","Fu Xian","Fuan Shi","Fucheng Qu","Fucheng Xian","Fuchuanyaozu  Zizhixian","Fuding Shi ","Fufeng Xian","Fugong Xian","Fugou Xian","Fugu Xian","Fuhai（Burultokay）Xian","Fujin Shi","Fukang Shi","Fulaerqu Qu","Fuliang Xian","Fuling Qu","Fumian Qu","Fumin Xian","Funan Xian","Funing Qu","Funing Xian","Fuping Xian","Fuqing Shi","Fuquan Shi","Furong Qu","Fushan Qu","Fushan Xian","Fushun Xian","Fusong Xian","Fusui Xian","Futian Qu","Fuxin Mengguzu Zizhixian","Fuxing Qu","Fuyang Qu","Fuyu Shi","Fuyu Xian","Fuyuan Shi","Fuyuan Xian","Fuyun（Koktokay）Xian","Gadê Xian","Gaizhou Shi","Ganan Shi","Gangba Xian","Gangbei Qu","Gangca Xian","Gangcheng Qu","Gangkou Qu","Gangnan Qu","Gangu Xian","Gangzha Qu","Ganjingzi Qu","Ganluo Xian","Gannan Xian","Ganquan Xian","Ganxian Qu","Ganyu Qu","Ganzhou Qu","Gao Xian","Gaobeidian Shi","Gaochang Qu","Gaocheng Qu","Gaochun Qu","Gaogang Qu","Gaolan Xian","Gaoling Qu","Gaomi Shi","Gaoming Qu","Gaoping Qu","Gaoping Shi","Gaoqing Xian","Gaotai Xian","Gaotang Xian","Gaoyang Xian","Gaoyao Qu","Gaoyi Xian","Gaoyou Shi","Gaozhou Shi","Gar Xian","Garzê Xian","Gejiu Shi","Gengma Daizu Wazu Zizhixian","Genhe Shi","Golmud Shi","Gong Xian","Gong'an Xian","Gongbujiangda Xian","Gongchangling Qu","Gongcheng Yaozu Zizhixian","Gongga Xian","Gonghe Xian","Gongjing Qu","Gongjue Xian","Gongliu Xian","Gongnong Qu","Gongqing Chengshi","Gongshan Derungzu Nuzu Zizhixian","Gongshu Qu","Gongyi Shi","Gongzhuling Shi","Gu Xian","Gu'an Xian","Guan Xian","Guancheng Huizu Qu","Guandu Qu","Guang'an Qu","Guangchang Xian","Guangde Xian","Guangfeng Qu","Guanghan Shi","Guanghe Xian","Guangling Qu","Guangling Xian","Guangnan Xian","Guangning Xian","Guangping Xian","Guangrao Xian","Guangshan Xian","Guangshui Shi","Guangyang Qu","Guangze Xian","Guangzong Xian","Guanling Buyizu Miaozu Zizhixian","Guannan Xian","Guanshanhu Qu","Guantao Xian","Guanyang Xian","Guanyun Xian","Guazhou Xian","Gucheng Qu","Gucheng Xian","Guichi Qu","Guide Xian","Guiding Xian","Guidong Xian","Guinan Xian","Guiping Shi","Guixi Shi","Guiyang Xian","Gujiao Shi","Gulang  Xian","Gulin Xian","Gulou Qu","Gushi Xian","Gusu Qu","Guta Qu","Gutian Xian","Guyang Xian","Guye Qu","Guyuan Xian","Guzhang Xian","Guzhen Xian","Gê'gyai Xian","Gêrzê Xian","Habahe（Kaba）Xian","Hai'an Xian","Haibowan Qu","Haicang Qu","Haicheng Qu","Haicheng Shi","Haidian Qu","Haifeng Xian","Haigang Qu","Haila'er Qu","Hailin Shi","Hailing Qu","Hailun Shi","Haimen Shi","Hainan Qu","Haining Shi","Haishu Qu","Haitang Qu","Haixing Xian","Haiyan Xian","Haiyang Shi","Haiyuan Xian","Haizhou Qu","Haizhu Qu","Hanbin Qu","Hancheng Shi","Hanchuan Shi","Hangjin Houqi","Hangjin Qi","Hanjiang Qu","Hannan Qu","Hanshan Qu","Hanshan Shan","Hanshou Xian","Hantai Qu","Hanting Qu","Hanyang Qu","Hanyin Xian","Hanyuan Xian","Haojiang Qu","Harqin Zuoyi Mongolzu Zizhixian","He Xian","Hebei Qu","Hecheng Qu","Hechuan Qu","Hedong Qu","Hefeng Xian","Heishan Xian","Heishui Xian","Hejian Shi","Hejiang Xian","Hejin Shi","Hejing Xian","Hekou Qu","Hekou Yaozu Zizhixian","Helan Xian","Helingeer Xian  ","Helong Shi","Henan Mongolzu Zizhixian","Heng Xian","Hengdong Xian","Hengfeng Xian","Hengnan Xian","Hengshan Qu","Hengshan Xian","Hengyang Xian","Heping Qu","Heping Xian","Hepu Xian","Heqing Xian","Hequ Xian","Heshan  Shi","Heshan Qu","Heshan Shi","Heshui Xian","Heshun Xian","Hetang Qu","Hexi Qu","Heyang Xian","Hezhang Xian","Hezheng Xian","Hezuo Shi","Hianya Qu","Hoboksar Mongol Zizhixian","Hondlon Qu","Hong'an Xian","Hongdong Xian","Honggang Qu","Honggu Qu","Honghe Xian","Honghu Shi","Honghuagang Qu","Hongjiang Shi","Hongkou Qu","Hongqi Qu","Hongqiao Qu","Hongshan Qu","Hongta Qu","Hongwei Qu","Hongxing Qu","Hongya Xian","Hongyuan Xian","Hongze Qu","Hotan Shi","Hotan Xian","Houma Shi","Hoxud Xian","Hua Xian","Hua'an Xian","Huachi Xian","Huachuan Xian","Huade Xian","Huadian Shi","Huadou Qu","Huai'an Xian","Huaian Qu","Huaibin Xian","Huaiji Xian","Huailai Xian","Huaining Xian","Huairen Xian","Huairou Qu","Huaishang Qu","Huaiyang Xian","Huaiyin Qu","Huaiyuan Xian","Hualong Huizu zizhixian","Hualong Qu","Huan Xian","Huanan Xian","Huancui Qu","Huangchuan Xian","Huangdao Qu","Huanggu Qu","Huanghua Shi","Huangling Xian","Huanglong Xian","Huangmei Xian","Huangpi Qu","Huangping Xian","Huangpu Qu","Huangshan Qu","Huangshigang Qu","Huangyan Qu","Huangyuan Xian","Huangzhong Xian","Huangzhou Qu","Huaning Xian","Huanren Manzu Zizhixian","Huantai Xian","Huaping Xian","Huarong Qu","Huarong Xian","Huashan Qu","Huating Xian","Huaxi Qu","Huayin Shi","Huaying Shi","Huayuan Xian","Huazhou Qu","Huazhou Shi","Hubin Qu","Huguan Xian","Hui Xian","Hui'an Xian","HuiJi Qu","Huichang Xian","Huicheng Qu","Huichuan Qu","Huidong Xian","Huilai Xian","Huili Xian","Huimin Qu","Huimin Xian","Huinan Xian","Huining Xian","Huinong Qu","Huishui Xian","Huitong Xian","Huixian Shi","Huiyang Qu","Huize Xian","Huizhou Qu","Hukou Xian","Hulan Qu","Huli Qu","Hulin Shi","Huma Xian","Hun'nan Qu","Hunchun Shi","Hunjiang Qu","Hunyuan Xian","Huocheng Xian","Huoerguoshi Shi","Huojia Xian","Huolinguole Shi","Huoqiu Xian","Huoshan Xian","Huozhou Shi","Huqiu Qu","Hutubi Xian","Huyi Qu","Huzhu Tuzu Zizhixian","Jeminay Xian","Ji Xian","Ji'an Xian","Ji'ning Qu","Jia Xian","Jiacha Xian","Jiading Qu","Jiahe Xian","Jiajiang Xian","Jiali Xian","Jialing Qu","Jian Shi","Jian'an Qu","Jian'ou Shi","Jiancaoping Qu","Jianchang Xian","Jianchuan Xian","Jiande Shi","Jiang Xian","Jiang'an Qu","Jiang'an Xian","Jiangbei Qu","Jiangcheng Hanizu Yizu Zizhixian","Jiangcheng Qu","Jiangchuan Qu","Jiangda Xian","Jiangdu Qu","Jiange Xian","Jianggan Qu","Jianghai Qu","Jianghan Qu","Jianghua Yaozu Zizhixian","Jiangjin Qu","Jiangkou Xian","Jiangle Xian","Jiangling Xian","Jiangnan Qu","Jiangshan Shi","Jiangxia Qu","Jiangyan Qu","Jiangyang Qu","Jiangyin Shi","Jiangyong Xian","Jiangyou Shi","Jiangyuan Qu","Jiangzhou Qu","Jiangzi Xian","Jianhe Xian","Jianhu Xian","Jianhua Qu","Jianli Xian","Jianning Xian","Jianping Xian","Jianshan Qu","Jianshi Xian","Jianshui Xian","Jianxi Qu","Jianyang Qu","Jianye Qu","Jianzha Xian","Jiaocheng Qu","Jiaocheng Xian","Jiaohe Shi","Jiaojiang Qu","Jiaokou Xian","Jiaoling Xian","Jiaoqu","Jiaoqu Qu","Jiaozhou Shi","Jiashan Xian","Jiashi（Payzawat）Xian","Jiawang Qu","Jiaxiang Xian","Jiayin Xian","Jiayu Xian","Jidong Xian","Jiedong Qu","Jiefang Qu","Jieshou Shi","Jiexi Xian","Jiexiu Shi","Jiguan Qu","Jigzhi Xian","Jili Qu","Jilong Xian","Jimei Qu","Jimo Qu","Jimsar Xian","Jin'an Qu","Jinan QU","Jinchengjiang Qu","Jinchuan Qu","Jinchuan（Quqên）Xian","Jindong Qu","Jing Xian","Jing'an Qu","Jingan Xian","Jingbian Xian","Jingchuan Xian","Jingde Xian ","Jingdong Yizu Zizhixian","Jinggangshan Shi","Jinggu Daizu Yizu Zizhixian","Jinghai Qu","Jinghe（Jing）Xian","Jinghong Shi","Jinghu Qu","Jingjiang Shi","Jingkou Qu","Jingle Xian","Jingning Shezu Zizhixian","Jingning Xian","Jingsha Xian","Jingshan Xian","Jingtai Xian","Jingxi Shi","Jingxing Kuangqu","Jingxing Xian","Jingyan Xian","Jingyang Qu","Jingyang Xian","Jingyu Xian","Jingyuan Xian","Jingzhou Miaozu Dongzu Zizhixian","Jingzhou Qu","Jinhu Xian","Jinjiang Qu","Jinjiang Shi","Jinkouhe Qu","Jinmen Xian","Jinnan Qu","Jinning Qu","Jinniu Qu","Jinping Miaozu Yaozu Daizu Zizhixian","Jinping Qu","Jinping Xian","Jinshan Qu","Jinshantun Qu","Jinshi Shi","Jinshui Qu","Jinta Xian","Jintai Qu","Jintan Qu","Jintang Xian","Jinwan Qu","Jinxi Xian","Jinxian Xian","Jinxiang Xian","Jinxiu Yaozu   Zizhixian","Jinyang Xian","Jinyuan Qu","Jinyun Xian","Jinzhai Xian","Jinzhou Qu","Jinzhou Shi","Jishan Xian","Jishishan Bonanzu Dongxiangzu Salarzu Zizhixian","Jishou Shi","Jishui Xian","Jiujiang Qu","Jiulongpo Qu","Jiulong（Gyaisi）Xian","Jiutai Qu","Jiuyuan Qu","Jiuzhaigou Xian","Jixi Xian","Jixian Xian","Jiyang Qu","Jiyang Xian","Jiyuan Shi","Jize Xian","Jizhou Qu","Jizhou Xian","Ju Xian","JuYe Xian","JuanCheng Xian","Julu Xian","Junan Xian","Junlian Xian","Junshan Qu","Jurong Shi","Kaifu Qu","Kaihua Xian","Kaijiang Xian","Kaili Shi","Kailu Xian","Kaiping Qu","Kaiping Shi","Kaiyang Xian","Kaiyuan Shi","Kaizhou Qu","Kalaqin Qi","Kalpin Xian","Kang Xian","Kangbao Xian","Kangbashi Qu","Kangding Shi","Kangle Xian","Kangma Xian","Kangping Xian","Karamay Qu","Karuo Qu","Kashi（Kaxgar）Shi","Ke'erqin Qu","Ke'erqin Youyi Qianqi","Ke'erqin Youyi Zhongqi","Ke'erqin Zuoyi Houqi","Ke'erqin Zuoyi Zhongqi","Kecheng Qu","Kedong Xian","Kelan Xian","Kenli Qu","Keqiao Qu","Keshan Xian","Keshiketeng Qi","Kongtong Qu","Korla Shi","Kuancheng Manzu Zizhixian","Kuancheng Qu","Kuandian Manzu Zizhixian","Kuangqu","Kuitun Shi","Kuiwen Qu","Kulun Qi","Kunshan Shi","Kuqa Xian","Lai'an Xian","Laicheng Qu","Laifeng Xian","Laishan Qu","Laishui Xian","Laixi Shi","Laiyang Shi","Laiyuan Xian","Laizhou Shi","Lan Xian","Lancang Lahuzu Zizhixian","Lang Xian","Langao Xian","Langkazi Xian","Langxi Xian","Langya Qu","Langzhong Shi","Lankao Xian","Lanping Baizu Pumizu Zizhixian","Lanshan Qu","Lanshan Xian","Lantian Xian","Lanxi Shi","Lanxi Xian","Lanze Xian","Laobian Qu","Laocheng Qu","Laohekou Shi","Laoshan Qu","Lazi Xian","Le'an Xian","Lechang Shi","Ledu Xian","Leibo Xian","Leishan Xian","Leiwuqi Xian","Leiyang Shi","Leizhou Shi","Leling Shi","Lengshuijiang Shi","Lengshuitan Qu","Leping Shi","Leting Xian","Leye  Xian","Lezhi Xian","Li Xian","Liancheng Xian","Lianchi Qu","Liandu Qu","Liangcheng Xian","Liangdang Xian","Lianghe Xian","Liangping Qu","Liangqing Qu","Liangshan Xian","Liangxi Qu","Liangyuan Qu","Liangzhou Qu","Liangzihu Qu","Lianhu Qu","Lianhua Xian","Lianjiang Shi","Lianjiang Xian","Liannan Yaozu Zizhixian","Lianping Xian","Lianshan Qu","Lianshan Zhuangzu Yaozu Zizhixian","Lianshui Xian","Lianxi  Qu","Lianyuan Shi","Lianyun Qu","Lianzhou Shi","Liaoyang Xian","Liaozhong Qu","Libo Xian","Licang Qu","Licheng Qu","Licheng Xian","Lichuan Shi","Lichuan Xian","Lieshan Qu","Lijin Xian","Liling Shi","Lin Xian","Lincheng Xian","Linchuan Qu","Lindian Xian","Lingan Qu","Lingbao Shi","Lingbi Xian","Lingcheng Qu","Lingchuan Xian","Lingdong Qu","Linghai Shi","Linghe Qu","Lingling Qu","Lingqiu Xian","Lingshan Xian","Lingshi Xian","Lingshou Xian","Lingtai Xian","Lingui Qu","Lingwu Qu","Lingyuan Shi","Lingyun  Xian","Linhai Shi","Linhe Qu","Linjiang Shi","Linkou Xian","Linli Xian","Linqing Shi","Linqu Xian","Linquan Xian","Linshu Xian","Linshui Xian","Lintan Xian","Lintao Xian","Lintong Qu","Linwei Qu","Linwu Xian","Linxi Xian","Linxia Shi","Linxia Xian","Linxiang Qu","Linxiang Shi","Linyi Xian","Linying Xian","Linyou Xian","Linzhang Xian","Linzhou Shi","Linzhou Xian","Linzi Qu","Liping Xian","Lipu Xian","Liquan Xian","Lishan Qu","Lishi Qu","Lishu Qu","Lishu Xian","Lishui Qu","Litang Xian","Litong Qu","Liuba Xian","Liubei Qu","Liucheng Xian","Liuhe Qu","Liuhe Xian","Liujiang Qu","Liulin Xian","Liunan Qu","Liuyang Shi","Liwan Qu","Lixia Qu","Lixin Xian","Liyang Shi","Long Xian","Long'an Qu","Long'an Xian","Longchang Qu","Longcheng Qu","Longchuan Xian","Longde Xian","Longfeng Qu","Longgang Qu","Longhai Shi","Longhu Qu","Longhua Qu","Longhua Xian","Longhui Xian","Longjiang Xian","Longjing Shi","Longkou Shi","Longli Xian","Longlin Gezu Zizi Xian","Longling Xian","Longmatan Qu","Longmen Xian","Longnan Xian","Longquan Shi","Longquanyi Qu","Longsha Qu","Longshan Qu","Longshan Xian","Longsheng Gezu Zizhixian","Longtan Qu","Longting Qu","Longwan Qu","Longwen Qu","Longxi Xian","Longxu Qu","Longyang Qu","Longyao Xian","Longyou Xian","Longzhou Xian","Longzi Xian","Longzihu Qu","Lop Xian","Loufan Xian","Louxing Qu","Lu Xian","Luan Xian","Luancheng Qu","Luanchuan Xian","Luannan Xian","Luanping Xian","Lubei Qu","Lucheng Qu","Lucheng Shi","Luchuan Xian","Luchuan Yizu Miaozu Zizhixian","Ludian Xian","Luding（Jagsamka）Xian","Lufeng Shi","Lufeng Xian","Luhe Xian","Luhuo（Zhaggo）Xian","Lujiang Xian","Luliang Xian","Lulong Xian","Lunan Qu","Luntai（Bügür）Xian","Luobei Xian","Luocheng Mulaozu   Zizhixian","Luochuan Xian","Luodian Xian","Luoding Shi","Luohu Qu","Luojiang Qu","Luojiang Xian","Luolong Qu","Luolong Xian","Luonan Xian","Luoning Xian","Luoping Xian","Luoshan Xian","Luotian Xian","Luoyuan Xian","Luozha Xian","Luozhuang Qu","Luqiao Qu","Luqu Xian","Luquan Qu","Lushan Xian","Lushi Xian","Lushui Shi","Lusong Qu","Luxi Shi","Luxi Xian","Luyi Xian","Luzhai Xian","Luzhi Tequ","Lüchun Xian","Lüshunkou Qu","Lüyuan Qu","Lǜeyang Xian","Ma'erkangshi","Mabian Yizu Zizhixian","Macheng Shi","Macun Qu","Madoi Xian","Maguan Xian","Maiji Qu","Majiang Xian","Malipo Xian","Malong Xian","Manas Xian","Mancheng Qu","Mangkang Xian","Manzhouli Shi ","Mao Xian","Maojian Qu","Maonan Qu","Maqu Xian","Maqên Xian","Markit Xian","Mashan Qu","Mashan Xian","Mawei Qu","Mayang Miaozu Zizhixian","Mazhang Qu","Mei Xian","Meigu Xian","Meihekou Shi","Meijiang Qu","Meilan Qu","Meilie Qu","Meilisi Dahanerzu Qu","Meitan Xian","Meixi Qu","Meixian Qu","Mengcheng Xian","Mengcun Huizu Zizhixian","Menghai Xian","Menghla Xian","Mengjin Xian","Menglian Daizu Lahuzu Wazu  Zizhixian","Mengshan Xian","Mengyin Xian","Mengzhou Shi","Mengzi Shi","Mentougou Qu","Menyuan Huizu Zizhixian","Mian Xian","Mianchi Xian","Mianning Xian","Mianzhu Shi","Midong Qu","Midu Xian","Mile Shi","Milin Xian","Miluo Shi","Min Xian","Minfeng（Niya）Xian","Mingguang Shi","Mingshan Qu","Mingshui Xian","Mingxi Xian","Minhang Qu","Minhe HuizuTuzu Zizhixian","Minhou Xian","Minle Xian","Minqin Xian","Minqing Xian","Minquan Xian","Mishan Shi","Miyang Xian","Miyi Xian","Miyun Qu","Mizhi Xian","Mohe Xian","Mojiang Hanizu Zizhixian","Molidawada Wo'erzu Zizhiqi","Mori Kazak Zizhixian","Motuo Xian","Mouding Xian","Moyu（Karakax）Xian","Mozhugongka Xian","Muchuan Xian","Mudan Qu","Mulan Xian","Muli Zangzu Zizhixian","Muling Shi","Muping Qu","Muye Qu","Naidong Qu","Naiman Qi","Nan Xian","Nan'an Qu","Nan'an Shi","Nan'ao Xian","Nanbu Xian","Nancha Qu","Nanchang Xian","Nancheng Xian","Nanchuan Qu","Nandan Xian","Nanfen Qu","Nanfeng Xian","Nangang Qu","Nangong Shi","Nangqên Xian","Nanguan Qu","Nanhai Qu","Nanhe Xian","Nanhu Qu","Nanhua Xian","Nanjian Yizu Zizhixian","Nanjiang Xian","Nanjiao Qu","Nanjing Xian","Nankai Qu","Nankang Qu","Nanle Xian","Nanling Xian","Nanming Qu","Nanmulin Xian","Nanpi Xian","Nanpiao Qu","Nanqiao Qu","Nansha QU","Nanshan Qu","Nanxi Qu","Nanxiong Shi","Nanxun Qu","Nanyue Qu","Nanzhang Xian","Nanzhao Xian","Napo  Xian","Naxi Qu","Nayong Xian","Nehe Shi","Neihuang Xian","Neiqiu Xian","Neixiang Xian","Nenjiang Xian","Nianzishan Qu","Nielamu Xian","Nierong Xian","Nileke Xian","Nima Xian","Nimu Xian","Ning Xian","Ning'an Shi","Ningcheng Xian","Ningdu Xian","Ninger Hanizu Yizu Zizhixian","Ningguo Shi","Ninghai Xian","Ninghe Qu","Ninghua Xian","Ningjiang Qu","Ningjin Xian","Ninglang Yizu Zizhixian","Ningling Xian","Ningming Xian","Ningnan Xian","Ningqiang Xian","Ningshan Xian","Ningwu Xian","Ningxiang Shi","Ningyang Xian","Ningyuan Xian","Nong'an Xian","Orku Qu","Ouhai Qu","Pan'an Xian","Panji Qu","Panlong Qu","Panshan Xian","Panshi Shi","Panzhou Shi","Pei Xian","Peng'an Xian","Pengjiang Qu","Penglai Shi","Pengshan Qu","Pengshui Miaozu Tujiazu Zizhixian","Pengxi Xian","Pengyang Xian","Pengze Xian","Pengzhou Shi","Pianguan Xian","Pidou Qu","Ping'an Qu","Pingba Qu","Pingbian Miaozu Zizhixian","Pingchang Xian","Pingchuan Qu","Pingding Xian","Pingdu Shi","Pingfang Qu","Pinggu Qu","Pinggui Qu","Pingguo  Xian","Pinghe Xian","Pinghu Shi","Pingjiang Xian","Pingle Xian","Pingli Xian","Pinglu Qu","Pinglu Xian","Pingluo Xian","Pingnan Xian","Pingqiao Qu","Pingquan Shi","Pingshan Qu","Pingshan Xian","Pingshun Xian","Pingtan Xian","Pingtang Xian","Pingwu Xian","Pingxiang Shi","Pingxiang Xian","Pingyang Xian","Pingyao Xian","Pingyi Xian","Pingyin Xian","Pingyu Xian","Pingyuan Xian","Pishan（Guma）Xian","Pizhou Shi","Potou Qu","Poyang Xian","Pu Xian","Pu'an Xian","PuLanDian Qu","Pubei Xian","Pucheng Xian","Puding Xian","Pudong Xinqu","Puge Xian","Pujiang Xian","Pukou Qu","Puning Shi","Putuo Qu","Puyang Xian","Qi Xian","Qian Guoerluosi Mengguzu Zizhixian","Qian Xian","Qianan Xian","Qianfeng Qu","Qianjiang Qu","Qianjin Qu","Qianshan Qu","Qianshan Xian","Qianwei Xian","Qianxi Xian","Qianyang Xian","Qiaocheng Qu","Qiaodong Qu","Qiaojia Xian","Qiaokou Qu","Qiaoxi Qu","Qibin Qu","Qichun Xian","Qidong Shi","Qidong Xian","Qiemo（Qarqan）Xian","Qiezihe Qu","Qihe Xian","Qijiang Qu","Qilian Xian","Qilihe Qu","Qilin Qu","Qimen Xian","Qin Xian","Qin'an Xian","Qinbei Qu","Qincheng Qu","Qindu Qu","Qing Xian","Qingan Xian","Qingbaijiang Qu","Qingcheng Qu","Qingcheng Xian","Qingchuan Xian","Qingfeng Xian","Qinggang Xian","Qinghe Qu","Qinghe Xian","Qinghemen Qu","Qinghe（Qinggil）Xian","Qingjian Xian","Qingjiangpu Qu","Qingliu Xian","Qinglong Manzu Zizhixian","Qinglong Xian","Qingpu Qu","Qingshan Qu","Qingshanhu Qu","Qingshen Xian","Qingshui Xian","Qingshuihe Xian","Qingtian Xian","Qingtongxia Shi","Qingxin Qu","Qingxu Xian","Qingyang Qu","Qingyang Xian","Qingyuan Manzu Zizhixian","Qingyuan Qu","Qingyuan Xian","Qingyun Xian","Qingyunpu Qu","Qingzhen Shi","Qingzhou Shi","Qinhuai Qu","Qinnan Qu","Qinshui Xian","Qinyang Shi","Qinyuan Xian","Qiongjie Xian","Qionglai Shi","Qiongshan Qu","Qira Xian","Qishan Xian","Qitai Xian","Qiu Xian","Qiubei Xian","Qixia Qu","Qixia Shi","Qixing Qu","Qixingguan Qu","Qiyang Xian","Qu xian","QuanGang Qu","Quanjiao Xian","Quannan Xian","Quanshan Qu","Quanzhou Xian","Queshan Xian","Qufu Shi","Qujiang Qu","Qumarlêb Xian","Qushui Xian","Qusong Xian","Quwo Xian","Quyang Xian","Quzhou Xian","Ranghulu Qu","Raodu Qu","Raohe Xian","Raoping Xian","Raoyang Xian","Ren Xian","Renbu Xian","Rencheng Qu","Renhe Qu","Renhua Xian","Renhuai Shi","Renqiu Shi","Renshou Xian","Rong Xian","Rong'an Xian","Rongchang Qu","Rongcheng Qu","Rongcheng Shi","Rongcheng Xian","Rongjiang Xian","Rongshui Miaozu Zizhixian","Rucheng Xian","Rudong Xian","Rugao Shi","Rui'an Shi","Ruichang Shi","Ruicheng Xian","Ruijin Shi","Ruili Shi","Runan Xian","Runzhou Qu","Ruoqiang（Qakilik）Xian","Rushan Shi","Rutog Xian","Ruyang Xian","Ruyuan Yaozu Zizhixian","Ruzhou Shi","Saertu Qu","Saga Xian","Saihan Qu","Sajia Xian","Sandu Suizu Zizhixian","Sangri Xian","Sangzhi Xian","Sangzhuzi Qu","Sanhe Shi","Sanjiang Dongzu Zizhixian","Sanmen Xian","Sanshan Qu","Sanshui Qu","Sansui Xian","Santai Xian","Sanyuan Qu","Sanyuan Xian","Saybag Qu","Seda Xian","Seni Qu","Sha Xian","Shache（Yarkant）Xian","Shahe Shi","Shahekou Qu","Shan Xian","Shancheng Qu","Shandan Xian","Shangcai Xian","Shangcheng Qu","Shangcheng Xian","Shangdou Xian","Shangganling Qu","Shanggao Xian","Shanghang Xian","Shanghe Xian","Shangjie Qu","Shangli Xian","Shanglin Xian","Shangnan Xian","Shangrao Xian","Shangshui Xian","Shangsi Xian","Shangyi Xian","Shangyou Xian","Shangyu Qu","Shangzhi Shi","Shanhaiguan Qu","Shanshan Xian","Shanting Qu","Shanyang  Xian","Shanyang Qu","Shanyin Xian","Shanzhou Qu","Shaodong Xian","Shaoshan Shi","Shaowu Shi","Shaoyang Xian","Shapingba Qu","Shapotou Qu","Shashi Qu","Shawan Qu","Shawan Xian","Shayang Xian","She Xian","Shehong Xian","Shen Xian","Shenbeixin Qu","Shenchi Xian","Shengsi Xian","Shengzhou Shi","Shenhe Qu","Shenmu Shi","Shenqiu Xian","Shenze Xian","Shenzha Xian","Shenzhou Shi","Sheqi Xian","Sheyang Xian","Shibei Qu","Shibing Xian","Shicheng Xian","Shidian Xian","Shifang Shi","Shifeng Qu","Shigu Qu","Shiguai Kuangqu","Shihe Qu","Shihezi Shi","Shijingshan Qu","Shilin Yizu Zizhixian","Shilong Qu","Shilou Xian","Shimen Xian","Shimian Xian","Shinan Qu","Shiping Xian","Shiqu Xian","Shiquan Xian","Shishi Shi","Shishou Shi","Shitai Xian","Shixing Xian","Shizhong Qu","Shizhu Tujiazu Zizhixian","Shizong Xian","Shou Xian","Shouguang Shi","Shouning Xian","Shouyang Xian","Shuangbai Xian","Shuangcheng Qu","Shuangfeng Xian","Shuanghu Xian","Shuangjiang Lahuzu Bulangzu Daizu Zizhixian","Shuanglang Xian","Shuangliao Shi","Shuangliu Qu","Shuangluan Qu","Shuangpai Xian","Shuangqiao Qu","Shuangqing Qu","Shuangta Qu","Shuangtaizi Qu","Shuangyang Qu","Shucheng Xian","Shufu Xian","Shuicheng Xian","Shuifu Xian","Shuimogou Qu","Shulan Shi","Shule Xian","Shunchang Xian","Shuncheng Qu","Shunde Qu","Shunhe Huizu Qu","Shunping Xian","Shunqing Qu","Shunyi Qu","Shuocheng Qu","Shushan Qu","Shuyang Xian","Si Xian","Sifangtai Qu","Sihong Xian","Sihui Shi","Simao Qu","Siming Qu","Sinan Xian","Sishui Xian","Siyang Xian","Siziwang Qi","Song Xian","Songbei Qu","Songjiang Qu","Songming Xian","Songpan（Sungqu）Xian","Songshan Qu","Songtao Miaozu Zizhixian","Songxi Xian","Songzi Shi","Su'nanyu Guzu Zizhixian","Subei Mengguzu Zizhixian","Sucheng Qu","Sui Xian","Suibin Xian","Suichang Xian","Suichuan Xian","Suide Xian","Suifenhe Shi","Suijiang Xian","Suileng Xian","Suining Xian","Suiping Xian","Suixi Xian","Suiyang Qu","Suiyang Xian","Suizhong Xian","Sujiatun Qu","Suning Xian","Sunite Youqi","Sunite Zuoqi","Sunwu Xian","Suo Xian","Susong Xian","Suxian Qu","Suyu Qu","Suzhou Qu","Tacheng（Qoqek）Shi","Tahe Xian","Tai'an Xian","Tai'erzhuang Qu","Taibai Xian","Taicang Shi","Taigu Xian","Taihe Qu","Taihe Xian","Taihu Xian","Taijiang Qu","Taijiang Xian","Taikang Xian","Tailai Xian","Taining Xian","Taiping Qu","Taipusi Qi","Taiqian Xian","Taishan Qu","Taishan Shi","Taishun Xian","Taixing Shi","Taizihe Qu","Tancheng Xian","Tang Xian","Tanghe Xian","Tangwanghe Qu","Tangyin Xian","Tangyuan Xian","Tantang Qu","Taobei Qu","Taocheng Qu","Taojiang Xian","Taonan Shi","Taoshan Qu","Taoyuan Xian","Tarlag Xian","Taxkorgan Tajik Zizhixian","Tekesi Xian","Teng Xian","Tengchong Shi","Tengzhou Shi","Tian'e Xian","Tianchang Shi","Tiandeng Xian","Tiandong  Xian","Tianhe Qu","Tianjia'an Qu","Tianjun Xian","Tianlin  Xian","Tianning Qu","Tianqiao Qu","Tianquan Xian","Tianshan Qu","Tiantai Xian","Tianxin Qu","Tianyang  Xian","Tianyuan Qu","Tianzhen Xian","Tianzhu Xian","Tianzhu Zangzu Zizhixian","Tiedong Qu","Tiefa Shi","Tiefeng Qu","Tieli Shi","Tieling Xian","Tieshan Qu","Tieshangang Qu","Tiexi Qu","Tinghu Qu","Toli Xian","Tong'an Qu","Tongbai Xian","Tongcheng Shi","Tongcheng Xian","Tongchuan Shi","Tongdao Dongzu Zizhixian","Tongde Xian","Tonggu Xian","Tongguan Qu","Tongguan Xian","Tonghai Xian","Tonghe Xian","Tonghua Xian","Tongjiang Shi","Tongjiang Xian","Tongliang Qu","Tonglu Xian","Tongnan Qu","Tongren Xian","Tongshan Qu","Tongshan Xian","Tongwei xian","Tongxiang Shi","Tongxin Xian","Tongxu Xian","Tongyu Xian","Tongzhou QU","Tongzhou Qu","Tongzi Xian","Toutunhe Qu","Tuanfeng Xian","Tumen Shi","Tumote Youqi","Tumote Zuoqi","Tumushuke Shi","Tunliu Xian","Tunxi Qu","Tuoketuo Xian","Tuokexun Xian","Tuquan Xian","Ulan Xian","Usu Shi","Wafangdian Shi","Wanan Xian","Wanbailin Qu","Wancheng Qu","Wangcang Xian","Wangcheng Qu","Wangdu Xian","Wanghua Qu","Wangjiang Xian","Wangkui Xian","Wangmo Xian","Wangqing Xian","Wangyi Qu","Wanli Qu","Wannian Xian","Wanquan Qu","Wanrong Xian","Wanshan qu","Wanxiu Qu","Wanyuan Xian","Wanzai Xian","Wanzhou Qu","Wei Xian","Weibin Qu","Weichang Manzu Mongolzu Zizhixian","Weicheng Qu","Weidong Qu","Weidu Qu","Weihui Shi","Weining Yizu Huizu Miaozu Zizhixian","Weishan Xian","Weishan Yizu Huizu Zizhixian","Weishi Xian","Weixi Lisuzu Zizhixian","Weixin Xian","Weiyang Qu","Weiyuan Xian","Wen Xian","Wen'an Xian","Wencheng Xian","Wenchuan Xian","Wendeng Qu","Wenfeng Qu","Weng'an Xian","Wengniute Qi","Wengyuan Xian","Wenjiang Qu","Wenkezu Zizhiqi ","Wenling Shi","Wenquan（Arixang）Xian","Wenshan Shi","Wenshang Xian","Wensheng Qu","Wenshui Xian","Wensu Xian","Wenxi Xian","Wolong Qu","Wu'an Shi","Wubu Xian","Wuchang Qu","Wuchang Shi","Wucheng Qu","Wucheng Xian","Wuchuan Gelaozu Miaozu Zizhixian","Wuchuan Shi","Wuchuan Xian","Wuda Qu","Wudalianchi Shi","Wudang Qu","Wudi Xian","Wuding Xian","Wudu Qu","Wufeng Tujiazu Zizhixian","Wugang Shi","Wugong Xian","Wuhe Xian","Wuhou Qu","Wuhu Xian","Wuhua Qu","Wuhua Xian","Wuji Xian","Wujiagang Qu","Wujiang Qu","Wujin Qu","Wulanhaote Shi","Wulate Houqi","Wulate Qianqi","Wulate Zhongqi","Wulian Xian","Wuling Qu","Wulingyuan Qu","Wulong Qu","Wumahe Qu","Wuming Qu","Wuning Xian","Wuping Xian","Wuqi Xian","Wuqiang Xian","Wuqiao Xian","Wuqia（Ulugqat）Xian","Wuqing Qu","Wushan Xian","Wushen Qi","Wusheng Xian","Wushi（Uqturpan）Xian","Wutai Xian","Wutongqiao Qu","Wuwei Xian","Wuxi Xian","Wuxiang Xian","Wuxing Qu","Wuxue Shi","Wuyang Xian","Wuyi Xian","Wuyiling Qu","Wuying Qu","Wuyishan Shi","Wuyuan Xian","Wuyuan Xian ","Wuzhai Xian","Wuzhi Xian","Xayar Xian","Xi Qu","Xi Wuzhumuqin Qi","Xi Xian","Xi'an Qu","XiXia Qu","Xia Xian","Xiacheng Qu","Xiahe Xian","Xiahuayuan Qu","Xiajiang Xian","Xiajin Xian","Xialu Qu","Xian Qu","Xian Xian","Xian'an Qu","Xianfeng Xian","Xiangan Qu","Xiangcheng Qu","Xiangcheng Shi","Xiangcheng Xian","Xiangcheng（Qagchêng）Xian","Xiangdong Qu","Xiangfen Xian","Xiangfu Qu","Xianggelila Shi","Xianghe Xian","Xianghuang Qi","Xiangning Xian","Xiangqiao Qu","Xiangshan Qu","Xiangshan Xian","Xiangshui Xian","Xiangtan Xian","Xiangxiang Shi","Xiangyang Qu","Xiangyin Xian","Xiangyuan Xian","Xiangyun Xian","Xiangzhou Qu","Xiangzhou Xian","Xianju Xian","Xianyou Xian","Xiao Xian","Xiaochang Xian","Xiaodian Qu","Xiaojin Xian","Xiaonan Qu","Xiaoshan Qu","Xiaoting Qu","Xiaoyi Shi","Xiapu Xian","Xiashan Qu","Xiayi Xian","Xichang Shi","Xicheng Qu","Xichong Xian","Xichou Xian","Xichuan Xian","Xide Xian","Xiejiaji Qu","Xietongmen Xian","Xifen Qu","Xifeng Xian","Xigang Qu","Xigong Qu","Xigu Qu","Xihe Qu","Xihe Xian","Xihu Qu","Xihua Xian","Xiji Xian","Xilin  Xian","Xilin Qu","Xiling Qu","Xilinhaote Shi","Ximeng Wazu Zizhixian","Xin Xian","Xin'an Xian","Xinba'er Huyouqi","Xinba'er Huzuoqi","Xinbin Manzu Zizhixian","Xincai Xian","Xinchang Xian","Xincheng Qu","Xincheng Xian","Xindu Qu","Xinfeng Xian","Xinfu Qu","Xing Xian","Xing'an Xian","Xingan Qu","Xingan Xian","Xingbin Qu","Xingcheng Shi","Xingguo Xian","Xinghai Xian","Xinghe Xian","Xinghua Shi","Xinghualing Qu","Xinglong Xian","Xinglongtai Qu","Xingning Qu","Xingning Shi","Xingping Shi","Xingqing Qu","Xingren Xian","Xingshan Qu","Xingshan Xian","Xingtai Xian","Xingtang Xian","Xingwen Xian","Xingyang Shi","Xingye Xian","Xingyi Shi","Xinhe Xian","Xinhe（Toksu）Xian","Xinhua Qu","Xinhua Xian","Xinhuang Dongzu Zizhixian","Xinhui Qu","Xinji Shi","Xinjian Qu","Xinjiang Xian","Xinjin Xian","Xinle Shi","Xinlong（Nyagrong）Xian","Xinluo Qu","Xinmi Shi","Xinmin Shi","Xinning Xian","Xinping Yizu Daizu Zizhixian","Xinqing Qu","Xinqiu Qu","Xinrong Qu","Xinshao Xian","Xinshi Qu","Xintai Shi","Xintian Xian","Xinwu Qu","Xinxiang Xian","Xinxing Qu","Xinxing Xian","Xinye Xian","Xinyi Shi","Xinyuan Xian","Xinzheng Shi","Xinzhou Qu","Xiong Xian","Xiping Xian","Xiqing Qu","Xisaishan Qu","Xishan Qu","Xishi Qu","Xishui Xian","Xiufeng Qu","Xiuning Xian","Xiushan Tujiazu Miaozu Zizhixian","Xiushui Xian","Xiuwen Xian","Xiuwu Xian","Xiuyan Manzu Zizhixian","Xiuying Qu","Xiuyu Qu","Xiuzhou Qu","Xixia Xian","Xixiang Xian","Xixiangtang Qu","Xixiu Qu","Xiyang Xian","Xuan'en Xian","Xuanhan xian","Xuanhua Qu","Xuanwei Shi","Xuanwu Qu","Xuanzhou Qu","Xuecheng Qu","Xuhui Qu","Xun Xian","Xundian Huizu Yizu Zizhixian","Xunke Xian","Xunwu Xian","Xunyang Qu","Xunyang Xian","Xunyi Xian","Xupu Xian","Xushui Qu","Xuwen Xian","Xuxuan Xian","Xuyi Xian","Xuyong Xian","Yadong Xian","Yajiang（Nyagquka）Xian","Yakeshi Shi ","Yanbian Xian","Yanchang Xian","Yancheng Qu","Yanchi Xian","Yanchuan Xian","Yandu Qu","Yanfeng Qu","Yang Xian","Yangbi Yizu Zizhixian","Yangcheng Xian","Yangchun Shi","Yangdong Qu","Yanggao Xian","Yanggu Xian","Yangling Qu","Yangming Qu","Yangpu Qu","Yangqu Xian","Yangshan Xian","Yangshuo Xian","Yangxi Xian","Yangxin Xian","Yangyuan Xian","Yangzhong Shi","Yanhe Tujiazu Zizhixian","Yanji Shi","Yanjiang Qu","Yanjin Xian","Yanliang Qu","Yanling Xian","Yanping Qu","Yanqi Huizu Zizhixian","Yanqing  Qu","Yanshan Qu","Yanshan Xian","Yanshi Shi","Yanshou Xian","Yanta Qu","Yantan Qu","Yantian Qu","Yanting Xian","Yanyuan Xian","Yanzhou Qu","Yao'an Xian","Yaohai Qu","Yaozhou Qu","Ye Xian","Yecheng（Kargilik）Xian","Yeji Qu","Yengisar Xian","Yi Xian","Yian Qu","Yian Xian","Yibin Xian","Yicheng Qu","Yicheng Shi","Yicheng Xian","Yichuan Xian","Yichun Qu","Yidu Shi","Yifeng Xian","Yihuang Xian","Yijiang Qu","Yijinhuoluo Qi","Yijun Xian","Yilan Xian","Yiliang Xian","Yiling Qu","Yilong Xian","Yima Shi","Yimen Xian","Yinan Xian","Yindou Qu","Ying Xian","Yingcheng Shi","Yingde Shi","Yingdong Qu","Yingjiang Qu","Yingjiang Xian","Yingjing Xian","Yingquan Qu","Yingshan Xian","Yingshang Xian","Yingshouyingzi Kuangqu","Yingze Qu","Yingzhou Qu","Yinhai Qu","Yining Shi","Yinjiang Tujiazu Miaozu  Zizhixian","Yintai Qu","Yinzhou Qu","Yishui Xian","Yitong Manzu Zizhixian","Yiwu Shi","Yiwu xian","Yixing Shi","Yixiu Qu","Yiyang Xian","Yiyuan Xian","Yizhang Xian","Yizheng Shi","Yizhou Qu","Yong'an Shi","Yongchang Xian","Yongcheng Shi","Yongchun Xian","Yongde Xian","Yongdeng Xian","Yongding Qu","Yongfeng Xian","Yongfu Xian","Yonghe Xian","Yongji Shi","Yongji Xian","Yongjia Xian","Yongjing Xian","Yongkang Shi","Yongnan Qu","Yongnian Qu","Yongning Qu","Yongning Xian","Yongping Xian","Yongqiao Qu","Yongqing Xian","Yongren Xian","Yongsheng Xian","Yongshou Xian","Yongshun Xian","Yongtai Xian","Yongxin Xian","Yongxing Xian","Yongxiu Xian","Yopurga Xian","You Xian","Youhao Qu","Youjiang Qu","Youxi Xian","Youxian Qu","Youyang Tujiazu Miaozu Zizhixian","Youyi Xian","Youyu Xian","Yu Xian","Yuan Qu","Yuan'an Xian","Yuanba Qu","Yuanbao Qu","Yuanbaoshan Qu","Yuancheng Qu","Yuanhui Qu","Yuanjiang Hanizu Yizu Daizu Zizhixian","Yuanjiang Shi","Yuanling Xian","Yuanmou Xian","Yuanping Shi","Yuanqu Xian","Yuanshi Xian","Yuanyang Xian","Yuanzhou Qu","Yubei Qu","Yucheng Qu","Yucheng Shi","Yucheng Xian","Yuci Qu","Yudu Xian","Yuecheng Qu","Yuechi Xian","Yuehu Qu","Yuelu Qu","Yueqing Shi","Yuetang Qu","Yuexi Xian","Yuexiu Qu","Yueyang Xian","Yueyanglou Qu","Yufeng Qu","Yugan Xian","Yuhang Qu","Yuhong Qu","Yuhu Qu","Yuhua Qu","Yuhuan Shi","Yuhuatai Qu","Yuhui Qu","Yuli（Lopnur）Xian","Yulong Naxizu Zizhixian","Yumen Shi","Yumin（Qagantokay）Xian","Yun Xian","Yun'an Qu","YunCheng Xian ","Yunan Xian","Yuncheng Qu","Yunhe Qu","Yunhe Xian","Yunlong Qu","Yunlong Xian","Yunmeng Xian","Yunxi Qu","Yunxi Xian","Yunxiao Xian","Yunyan Qu","Yunyang Qu","Yunyang Xian","Yuping Dongzu Zizhixian","Yuqing Xian","Yuquan Qu","Yushan Qu","Yushan Xian","Yushe Xian","Yushu Shi","Yushu Xian","Yushui Qu","Yutai Xian","Yutian Xian","Yutian（Keriya）Xian","Yuwangtai Qu","Yuyang Qu","Yuyao Shi","Yuzhong Qu","Yuzhong Xian","Yuzhou Qu","Yuzhou Shi","Zadoi Xian","Zamtang Xian","Zanda Xian","Zanhuang Xian","Zaoqiang Xian","Zaoyang Shi","Zazhou Qu","Zeku Xian","Zengcheng Qu","Zepu（Poskam）Xian","Zezhou Xian","Zhalainuo'er Qu","Zhalaite Qi","Zhalantun Shi","Zhalute Qi","Zhanang Xian","Zhang Xian","Zhangbei Xian","Zhangdian Qu","Zhanggong Qu","Zhangjiachuan Huizu Zizhixian","Zhangjiagang Shi","Zhangping Shi","Zhangpu Xian","Zhangqiu Qu","Zhangwan Qu","Zhangwu Xian","Zhangzi Xian","Zhanhe Qu","Zhanhua Xian","Zhanqian Qu","ZhanyiQu","Zhao Xian","Zhao'an Xian","Zhaodong Shi","Zhaojue Xian","Zhaoling Qu","Zhaopingxina","Zhaosu Xian","Zhaoyang Shi","Zhaoyuan Shi","Zhaoyuan Xian","Zhaozhou Xian","Zhashui Xian","Zhecheng Xian","Zhenan Qu","Zhenan Xian","Zhenba Xian","Zhenfeng Xian","Zheng'an Xian","Zhengding Xian","Zhenghe Xian","Zhenglan Qi","Zhengning Xian","Zhengxiang Qu","Zhengxiangbai Qi","Zhengyang Xian","Zhenhai Qu","Zhenjiang Qu","Zhenkang Xian","Zhenlai Xian","Zhenning Buyizu Miaozu Zizhixian","Zhenping Xian","Zhenxing Qu","Zhenxiong Xian","Zhenyuan Xian","Zhenyuan Yizu Hanizu Lahuzu Zizhixian","Zherong Xian","Zhidan Xian","Zhidoi Xian","Zhifu Qu","Zhijiang Dongzu Zizhixian","Zhijiang Shi","Zhijin Xian","Zhong Xian","Zhongba Xian","Zhongfang Xian","Zhongjiang Xian","Zhonglou Qu","Zhongmou Xian","Zhongning Xian","Zhongshan Qu","Zhongshan Xian","Zhongxiang Shi","Zhongyang Xian","Zhongyuan Qu","Zhongzhan Qu","Zhoucun Qu","Zhouning Xian","Zhouqu Xian","Zhouzhi Xian","Zhuanghe Shi","Zhucheng Shi","Zhuhui Qu","Zhuji Shi","Zhunge'er Qi","Zhuolu Xian","Zhuoni Xian","Zhuozhou Shi","Zhuozi Xian","Zhushan Qu","Zhushan Xian","Zhuxi Xian","Zhuzhou Xian","Zichang Xian","Zichuan Qu","Zigui Xian","Zijin Xian","Ziliujing Qu","Zitong Xian","Zixi Xian ","Zixing Shi","Ziyang Qu","Ziyang Xian","Ziyuan Xian","Ziyun Miaozu Buyizu Zizhixian","Zizhong Xian","Zizhou Xian","Zoigê Xian","Zongyang Xian","Zoucheng Shi","Zouping Xian","Zunhua Shi","Zuogong Xian","Zuoquan Xian","Zuoyun Xian","alaer Shi","beitun Shi","dantu Qu","diebu Xian","hongsipu qu","huanjiang Maonanzu Zizhixian","housan Qu","Jiangning Qu","jingfengqu","kekedala Shi","kunyu Shi","luyang Qu","shangzhouqu","shiqian Xian","shuanghe Shi","songyang xian","TiiGenguan Shi","wujiaqu Shi","wuzhong Qu","xiangfang Qu","yining Xian","yongshanxian","yujiang Xian","zhangshu Shi","ürümqi Xian"
];

$provinces = [
  "AnHui","BeiJing","ChongQing","FuJian","GanSu","GuangDong","GuangXi","GuiZhou","HaiNan","HeBei","HeNan","HeiLongJiang","HuBei","HuNan","JiLin","JiangSu","JiangXi","LiaoNing","NeiMengGu","NingXia","QingHai","ShaanXi","ShanDong","ShanXi","ShangHai","SiChuan","TianJin","XiZang","XinJiang","YunNan","ZheJiang"
];
get_header();
?>
<div class="container">

<?php
$outHtml = '';
$outHtml .= '<div class="recordaddedMessage"> <p> '. __( 'Form Submitted Successfully', 'visachild' ) .' </p> </div>';
if ($formSubmit) {
  echo $outHtml;
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="row">
		<div class="col-md-12" style="margin-bottom: 40px !important;">
				<ul class="process-steps process-2 clearfix">
						<li class=" active">
							<a href="#" class="i-bordered i-circled divcenter"><i class="fa fa-wpforms" aria-hidden="true"></i></a>
								<h5>1. Gegevens invullen</h5>
						</li>
						<li class="">
								<a href="javascript:jQuery('#order-form').submit(); return false;" class="i-bordered i-circled divcenter"><i class="fa fa-check" aria-hidden="true"></i></a>
								<h5>2. Controle en betaling</h5>
						</li>
				</ul>
		</div>
	</div>
  <form method="post" class="visa_form_submit">
    <div id="visa_travel-information" class="form_seprationSection">
      <h3><?php echo __( 'Travel details', 'visachild' ); ?></h3>
      <div class="form-group row">
        <label for="destination_country" class="vc_col-md-3 col-form-label"><?php echo __( 'Destination', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" value="China" name="destination_country" id="destination_country" readonly="true">
        </div>
      </div><!-- form-group -->

      <div class="form-group row">
        <label for="nationality" class="vc_col-md-3 col-form-label"><?php echo __( 'Nationality', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <select name="nationality" id="nationality">
            <?php
              if(!empty(get_list_countries())){
                foreach(get_list_countries() as $country){?>
                <option <?php echo 'Netherlands' == $country->name ? 'selected' : ''; ?>><?php echo $country->name;?></option>
              <?php } } ?>
          </select>
        </div>
      </div><!-- form-group -->

      <div class="form-group row">
        <label for="purpose" class="vc_col-md-3 col-form-label"><?php echo __( 'Purpose', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" value="<?php echo isset($visa_purpose) ? $visa_purpose : 'Tourism'; ?>" name="purpose" id="purpose" readonly="true">
          <span class="validate_error"><?php echo isset($purposeErr) ? $purposeErr : ''; ?></span>
          <span><a id="change_purpose" href="#purpose_modal" class="trigger-btn" data-toggle="modal">change</a></span>
        </div>
        <!-- Modal HTML -->
        <div id="purpose_modal" class="modal fade">
          <div class="modal-dialog modal-confirm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title tourism"><b>Are you sure to change to Tourism purpose?</b></h3>
                <h3 class="modal-title business hidden"><b>Are you sure to change to  purpose?</b></h3>
              </div>
              <div class="modal-body" style="text-align: center;">
                <p>You must enter all the details again..</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="change_purpose_btn">Yes proceed</button>
              </div>
            </div>
          </div>
        </div> <!-- Modal -->
      </div><!-- form-group -->

      <div class="form-group row business hidden">
        <label for="number_of_entries" class="vc_col-md-3 col-form-label"><?php echo __( 'Number of Entries', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <select name="number_of_entries" id="number_of_entries">
            <?php 
              foreach($entries as $key => $en) {
            ?>
              <option value="<?= $key ?>" <?= (isset($entry) == $key) ? 'selected' : ''; ?> data-price="<?= $en['price']?>">
                <?= __( $en['label'], 'visachild' ); ?>
              </option>
            <?php 
              }
            ?>
          </select>
        </div>
      </div><!-- form-group -->
    </div> <!-- visa_travel-information -->
    <div id="visa_general-information" class="form_seprationSection">
      <h2><?php echo __( 'General data', 'visachild' ); ?></h2>
      <p><?php echo __( "Enter all your details below. Copy this carefully from your passport. You must apply for a visa for all travelers (including children included in their parents' passport). You can do this in one go by pressing \"add traveler\" at the bottom. You only need to fill in the general information once (all visas are sent to the same address). It is not necessary that all travelers reside at the entered address. The address is only used for sending the visas, if desired.", 'visachild' ); ?></p>

      <div class="form-group row">
        <label for="arrival_date" class="vc_col-md-3 col-form-label"><?php echo __( 'Arrival date', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="date" class="form-control" value="<?php echo isset($arrival_date) ? $arrival_date : ''; ?>" name="arrival_date" id="arrival_date" placeholder="<?php echo __( 'Arrival Date', 'visachild' ); ?>">
          <span class="validate_error"><?php echo isset($arrivalErr) ? $arrivalErr : ''; ?></span>
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="email_address" class="vc_col-md-3 col-form-label"><?php echo __( 'Email Address', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="email" class="form-control" value="<?php echo isset($email_address) ? $email_address : ''; ?>" name="email_address" id="email_address" placeholder="name@example.com">
          <span class="validate_error"><?php echo isset($emailErr) ? $emailErr : ''; ?></span>
        </div>
      </div> <!-- form-group -->

      <div class="form-group row">
        <label for="telephone" class="vc_col-md-3 col-form-label"><?php echo __( 'Telephone Number', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="phone" class="form-control" value="<?php echo isset($telephone) ? $telephone : ''; ?>" name="telephone" id="telephone" placeholder="123456790">
          <span class="validate_error"><?php echo isset($phoneErr) ? $phoneErr : ''; ?></span>
        </div>
      </div><!-- form-group -->
    </div>

    <div id="visa_adres-information" class="form_seprationSection">
      <h3><?php echo __( 'Address data', 'visachild' ); ?></h3>
      <p><?php echo __( 'Enter the address details on which you wish to receive all visas.', 'visachild' ); ?></p>
      <div class="form-group row">
        <label for="countries" class="vc_col-md-3 col-form-label"><?php echo __( 'Country', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <select name="countries" id="countries">
            <option value="Belgium">Belgium</option>
            <option value="Denmark">Denmark</option>
            <option value="Germany">Germany</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="The Netherlands">The Netherlands</option>
            <option value="Norway">Norway</option>
            <option value="Austria">Austria</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Spain">Spain</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="Sweden">Sweden</option>
            <option value="---" disabled="">--------------------------------------------</option>
            <?php
            if(!empty(get_list_countries())){
              foreach(get_list_countries() as $country){?>
              <option value="<?php echo $country->name;?>" <?php echo 'Netherlands' == $country->name ? 'selected' : ''; ?>><?php echo $country->name;?></option>
            <?php } } ?>
          </select>
          <span class="validate_error"><?php echo isset($countryErr) ? $countryErr : ''; ?></span>
        </div>
      </div><!-- form-group -->

      <div class="form-group row">
        <label for="street_name" class="vc_col-md-3 col-form-label"><?php echo __( 'Street name', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" value="<?php echo isset($street_name) ? $street_name : ''; ?>" name="street_name" id="street_name" placeholder="<?php echo __( 'Straatnaam', 'visachild' ); ?>">
          <span class="validate_error"><?php echo isset($streetErr) ? $streetErr : ''; ?></span>
        </div>
      </div><!-- form-group -->

      <div class="form-group row">
        <label for="house_number" class="vc_col-md-3 col-form-label"><?php echo __( 'House number', 'visachild' ); ?></label>
        <div class="vc_col-md-9 house_section">
          <input type="text" class="form-control" value="<?php echo isset($house_number) ? $house_number : ''; ?>" name="house_number" id="house_number" placeholder="<?php echo __( 'Huisnummer', 'visachild' ); ?>">
          <span class="validate_error"><?php echo isset($houseErr) ? $houseErr : ''; ?></span>
        </div>
      </div><!-- form-group -->

      <div class="form-group row">
        <label for="postcode" class="vc_col-md-3 col-form-label"><?php echo __( 'Postcode', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" value="<?php echo isset($postcode) ? $postcode : ''; ?>" name="postcode" id="postcode" placeholder="<?php echo __( '1234', 'visachild' ); ?>">
          <span class="validate_error"><?php echo isset($postcodeErr) ? $postcodeErr : ''; ?></span>
        </div>
      </div><!-- form-group -->

      <div class="form-group row">
        <label for="province_name" class="vc_col-md-3 col-form-label"><?php echo __( 'Province', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control hidden" value="<?php echo isset($province_name) ? $province_name : ''; ?>" name="province_name" id="inp_province_name" placeholder="<?php echo __( 'Province', 'visachild' ); ?>" id="inp_province_name">
          <select class="form-control" name="province_name" id="sel_province_name">
            <option></option>
            <option>Drenthe</option>
            <option>Flevoland</option>
            <option>Friesland</option>
            <option>Gelderland</option>
            <option>Groningen</option>
            <option>Limburg</option>
            <option>Noord-Brabant</option>
            <option>Noord-Holland</option>
            <option>Overijssel</option>
            <option>Utrecht</option>
            <option>Zeeland</option>
            <option>Zuid-Holland</option>
          </select>
        </div>
      </div><!-- form-group -->
    </div> <!-- visa_adres-information -->
    <div id="order_details" class="form_seprationSection">
      <h3><?php echo __( 'Order details', 'visachild' ); ?></h3>
      <p><?=  __( 'Enter the date on which you will leave the country and the other requested information below.', 'visachild' );?></p>
      <div class="form-group row business hidden">
        <label for="flight_number_arrival" class="vc_col-md-3 col-form-label"><?php echo __( 'Flight Number Arrival', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="flight_number_arrival" id="flight_number_arrival">
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="arrival_city" class="vc_col-md-3 col-form-label"><?php echo __( 'Arrival city', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <select class="form-control" name="arrival_city" id="arrival_city">
            <option>Select Arrival City...</option>
            <?php foreach($cities as $c) {?>
              <option><?php echo __( $c, 'visachild' ); ?></option>
            <?php }?>
          </select>
        </div>
      </div><!-- form-group -->
      <div class="form-group row business hidden">
        <label for="arrival_district" class="vc_col-md-3 col-form-label"><?php echo __( 'Arrival District', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <select class="form-control" name="arrival_district" id="arrival_district">
            <option>Select Arrival District...</option>
            <?php foreach($districts as $c) {?>
              <option><?php echo __( $c, 'visachild' ); ?></option>
            <?php }?>
          </select>
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="return_date" class="vc_col-md-3 col-form-label"><?php echo __( 'Return date', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="date" class="form-control" value="<?php echo isset($return_date) ? $return_date : ''; ?>" name="return_date" id="return_date" placeholder="<?php echo __( 'Return Date', 'visachild' ); ?>">
          <span class="validate_error"><?php echo isset($returnErr) ? $returnErr : ''; ?></span>
        </div>
      </div><!-- form-group -->
      <div class="business hidden">
        <div class="form-group row">
          <label for="flight_number_departure" class="vc_col-md-3 col-form-label"><?php echo __( 'Flight Number Departure', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="text" class="form-control" name="flight_number_departure" id="flight_number_departure">
          </div>
        </div><!-- form-group -->
        <div class="form-group row">
          <label for="departure_city" class="vc_col-md-3 col-form-label"><?php echo __( 'Departure city', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select class="form-control" name="departure_city" id="departure_city">
              <option>Select Departure City...</option>
              <?php foreach($cities as $c) {?>
                <option><?php echo __( $c, 'visachild' ); ?></option>
              <?php }?>
            </select>
          </div>
        </div><!-- form-group -->
        <div class="form-group row">
          <label for="departure_district" class="vc_col-md-3 col-form-label"><?php echo __( 'Departure District', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select class="form-control" name="departure_district" id="departure_district">
              <option>Select Departure District...</option>
              <?php foreach($districts as $c) {?>
                <option><?php echo __( $c, 'visachild' ); ?></option>
              <?php }?>
            </select>
          </div>
        </div><!-- form-group -->
      </div>
    </div> <!-- order_details -->
    <div id="destinations_china" class="form_seprationSection business hidden">
      <h3><?php echo __( 'Destinations in China', 'visachild' ); ?></h3>
      <p><?php echo __( 'Please indicate below the cities in which you are staying in China. You must fill in the arrival and departure date. You must also enter the address where you are staying.', 'visachild' ); ?></p>
      <div class="destination-china multiple" data-index="1">
        <h4 class="d-flex justify-content-between"><span class="text"><?= __('Destination China')?> <span class="index">1</span></span> <button type="button" class="remove-btn hidden" data-parent="#destinations_china" onclick="removeMulti(this)">Remove destination <span class="index">1</span></button></h4>
        <div class="form-group row">
          <label class="vc_col-md-3 col-form-label"><?php echo __( 'District', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select class="form-control" name="destination_district[]">
              <option>Select District...</option>
              <?php foreach($districts as $c) {?>
                <option><?php echo __( $c, 'visachild' ); ?></option>
              <?php }?>
            </select>
          </div>
        </div><!-- form-group -->
        <div class="form-group row">
          <label class="vc_col-md-3 col-form-label"><?php echo __( 'City', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select class="form-control" name="destination_city[]">
              <option>Select City...</option>
              <?php foreach($cities as $c) {?>
                <option><?php echo __( $c, 'visachild' ); ?></option>
              <?php }?>
            </select>
          </div>
        </div><!-- form-group -->
        <div class="form-group row">
          <label class="vc_col-md-3 col-form-label"><?php echo __( 'Address', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="text" class="form-control" name="destination_address[]">
          </div>
        </div><!-- form-group -->
        <div class="form-group row">
          <label class="vc_col-md-3 col-form-label"><?php echo __( 'From', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="date" class="form-control" name="destination_from[]">
          </div>
        </div><!-- form-group -->
        <div class="form-group row">
          <label class="vc_col-md-3 col-form-label"><?php echo __( 'Until', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="date" class="form-control" name="destination_until[]">
          </div>
        </div><!-- form-group -->
      </div>
      <div class="add-more" data-parent="#destinations_china">
        <span class="btn btn-full-width btn-primary" data-total="<?php echo $cntIntended; ?>">
          <i class="fa fa-user-plus" aria-hidden="true"></i>  Destination China
        </span>
      </div> <!-- add_intended-section -->
    </div>

    <div id="emergency_contact" class="">
      <h3><?= __( 'Emergency contact', 'visachild' ); ?></h3>
      <p><?= __( 'For the application it is necessary to provide an emergency contact person, who will be contacted in case of emergency. This may be a family member, friend, or business associate.', 'visachild' ); ?></p>
      <div class="form-group row">
        <label for="emergency_first_name" class="vc_col-md-3 col-form-label"><?php echo __( 'First Name', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input class="form-control" name="emergency_first_name" id="emergency_first_name">
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="emergency_surname" class="vc_col-md-3 col-form-label"><?php echo __( 'Surname', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input class="form-control" name="emergency_surname" id="emergency_surname" type="text">
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="emergency_relationship" class="vc_col-md-3 col-form-label"><?php echo __( 'Relationship Type', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input class="form-control" name="emergency_relationship" id="emergency_relationship" type="text">
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="emergency_phone" class="vc_col-md-3 col-form-label"><?php echo __( 'Phone Number', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input class="form-control" name="emergency_phone" id="emergency_phone" placeholder="+31455889977" type="text">
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="emergency_email" class="vc_col-md-3 col-form-label"><?php echo __( 'Email Address', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input class="form-control" name="emergency_email" id="emergency_email" placeholder="+31455889977" type="text">
        </div>
      </div><!-- form-group -->

      <div class="form-group row">
        <label for="temergency_country" class="vc_col-md-3 col-form-label"><?php echo __( 'Country', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <select name="emergency_country" id="emergency_country">
            <option value="" <?php echo (isset($emergency_country) == '') ? 'selected' : ''; ?>>Select Nationality</option>
            <option value="Belgium">Belgium</option>
            <option value="Denmark">Denmark</option>
            <option value="Germany">Germany</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="The Netherlands">The Netherlands</option>
            <option value="Norway">Norway</option>
            <option value="Austria">Austria</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Spain">Spain</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="Sweden">Sweden</option>
            <option value="---" disabled="">--------------------------------------------</option>
            <?php
            if(!empty(get_list_countries())){
              foreach(get_list_countries() as $country){?>
                <option value="<?php echo $country->name;?>" <?isset($emergency_count) == $country->name ? 'selected' : ''; ?>><?php echo $country->name;?></option>
              <?php } } ?>
          </select>
        </div>
      </div><!-- form-group -->

      <div class="form-group row">
        <label for="emergency_email" class="vc_col-md-3 col-form-label"><?php echo __( 'Email Address', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input class="form-control" name="emergency_email" id="emergency_email" placeholder="+31455889977" type="text">
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="emergency_city" class="vc_col-md-3 col-form-label"><?php echo __( 'Emergency City', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input class="form-control" name="emergency_city" id="emergency_city" placeholder="" type="text">
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="emergency_potal_code" class="vc_col-md-3 col-form-label"><?php echo __( 'Postal Code', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input class="form-control" name="emergency_potalcode" id="emergency_postal_code" type="text">
        </div>
      </div><!-- form-group -->
    </div>

    <div id="tavel_expenses" class="form_seprationSection business hidden">
      <h3><?php echo __( 'Travel expenses', 'visachild' ); ?></h3>
      <p>
        <?= __( 'Who will pay for your travel and other expenses during your stay in China? Enter the full name of this person (you may also be this yourself).', 'visachild' );
        ?>
      </p>
      <div class="form-group row business now">
        <label for="sel_travel_expenses" class="vc_col-md-3 col-form-label"><?php echo __( 'Travel expenses', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <select id="sel_travel_expenses" name="travel_expenses" class="form-control">
            <option value="self"><?=__('Self', 'visachild')?></option>
            <option value="others"><?=__('Others', 'visachild')?></option>
            <option value="company"><?=__('Company / Organization', 'visachild')?></option>
          </select>
        </div>
      </div>
      <div class="form-group row expense-others expense-company hidden travel-expenses">
        <label for="travel_expenses_full_name" class="vc_col-md-3 col-form-label"><?php echo __( 'Full Name', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" id="travel_expenses_full_name" name="travel_expenses_full_name" class="form-control">
        </div>
      </div>
      <div class="form-group row expense-others hidden travel-expenses">
        <label for="travel_expenses_phone" class="vc_col-md-3 col-form-label"><?php echo __( 'Phone Number', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" id="travel_expenses_phone" name="travel_expenses_phone" class="form-control" placeholder="+31455889977">
        </div>
      </div>
      <div class="form-group row expense-others hidden travel-expenses">
        <label for="travel_expenses_email" class="vc_col-md-3 col-form-label"><?php echo __( 'Email Address', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" id="travel_expenses_email" name="travel_expenses_email" class="form-control">
        </div>
      </div>

      <div class="form-group row expense-company hidden travel-expenses">
        <label for="travel_expenses_relationship" class="vc_col-md-3 col-form-label"><?php echo __( 'Relationship Type', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" id="travel_expenses_relationship" name="travel_expenses_relationship" class="form-control">
        </div>
      </div>
      <div class="form-group row expense-company hidden travel-expenses">
        <label for="travel_expenses_address" class="vc_col-md-3 col-form-label"><?php echo __( 'Address', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" id="travel_expenses_address" name="travel_expenses_address" class="form-control">
        </div>
      </div>
      <div class="form-group row expense-company hidden travel-expenses">
        <label for="travel_expenses_country" class="vc_col-md-3 col-form-label"><?php echo __( 'Country', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
        <select id="travel_expenses_country" name="travel_expenses_country" class="form-control">
              <option value="" <?php echo (isset($_POST['traverler']['nationality'][$j]) == '') ? 'selected' : ''; ?>>Select Country</option>
              <option value="Belgium">Belgium</option>
              <option value="Denmark">Denmark</option>
              <option value="Germany">Germany</option>
              <option value="Finland">Finland</option>
              <option value="France">France</option>
              <option value="The Netherlands">The Netherlands</option>
              <option value="Norway">Norway</option>
              <option value="Austria">Austria</option>
              <option value="Slovakia">Slovakia</option>
              <option value="Spain">Spain</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
              <option value="Sweden">Sweden</option>
              <option value="---" disabled="">--------------------------------------------</option>
              <?php
              if(!empty(get_list_countries())){
                foreach(get_list_countries() as $country){?>
                  <option> <?php echo $country->name;?></option>
                <?php } } ?>
            </select>
        </div>
      </div>
    </div>

    <div id="documents" class="form_seprationSection tourism">
      <h3><?php echo __( 'Documents', 'visachild' ); ?></h3>
      <p>
        <span>
          <?=  __( 'For your visa application it is necessary that you provide a number of documents. You can submit these documents now, or later. Make your choice below.', 'visachild' );?>
        </span>
        <b>
          <?=  __( 'It is important that the documents are complete and correct. In any other case, we cannot submit your application to the government of China.', 'visachild' );?>
        </b>
      </p>
      <p><?php echo __( 'You must upload a flight reservation that includes both your outbound and return flights. This reservation must be valid for all travelers.', 'visachild' ); ?></p>
      <p>
        <span>
          <?=  __( 'The document that you upload for your residence must provide accommodation for your entire stay. For example: a hotel reservation, an invitation letter.', 'visachild' );?>
        </span>
        <span class="highlight">
          <?=  __( 'Pay attention! Your hotel reservations must be paid. You must also provide proof of this in the form of, for example, an invoice. Alternatively, you may make a statement in English, indicating that you do not deviate from your original hotel reservation (s). This must contain the name + address of the accommodation and your signature.', 'visachild' );?>
        </span>
      </p>
      <div class="form-group row">
        <label for="sel_documents" class="vc_col-md-3 col-form-label">
          <?= __( 'Documents', 'visachild' ); ?>
        </label>
        <div class="vc_col-md-9">
          <select class="form-control" id="sel_documents" name="documents">
            <option>A Document</option>
            <option>Two Documents</option>
          </select>
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="travel_documents" class="vc_col-md-3 col-form-label">
          <?= __( 'Travel Documents', 'visachild' ); ?>
        </label>
        <div class="vc_col-md-9">
          <input type="file" class="form-control" name="travel_documents" id="travel_documents">
        </div>
      </div><!-- form-group -->
    </div> <!-- order_details -->

    <div id="contact_information" class="form_seprationSection">
      <h3><?= __( 'Contact in China', 'visachild' ); ?></h3>
      <p><?= __( 'Enter the details of a contact person in China here. This can be your own phone number, or that of a family member, friend or acquaintance in China. The Chinese government wants to be able to contact you during your stay in China.', 'visachild' ); ?></p>
      <div class="form-group row">
        <label for="contact_name" class="vc_col-md-3 col-form-label"><?php echo __( 'Name', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="contact_name" id="contact_name">
        </div>
      </div>
      <div class="form-group row">
        <label for="contact_phone" class="vc_col-md-3 col-form-label"><?php echo __( 'PHONE NUMBER', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="contact_phone" id="contact_phone">
        </div>
      </div>
      <div class="business hidden">
        <div class="form-group row">
          <label for="contact_relationship_type" class="vc_col-md-3 col-form-label"><?php echo __( 'Relationship Type', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="text" class="form-control" name="contact_relationship_type" id="contact_relationship_type">
          </div>
        </div>
        <div class="form-group row">
          <label for="contact_email" class="vc_col-md-3 col-form-label"><?php echo __( 'Email Address', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="text" class="form-control" name="contact_email" id="contact_email">
          </div>
        </div>
        <div class="form-group row">
          <label for="contact_province" class="vc_col-md-3 col-form-label"><?php echo __( 'Province', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select class="form-control" name="contact_province" id="contact_province">
              <option><?=__('Select Province...', 'visachild')?></option>
              <?php foreach($provinces as $p) { ?>
                <option><?=__($p, 'visachild')?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="contact_city" class="vc_col-md-3 col-form-label"><?php echo __( 'City', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select class="form-control" name="contact_city" id="contact_city">
              <option><?=__('Select City...', 'visachild')?></option>
              <?php foreach($cities as $c) { ?>
                <option><?=__($c, 'visachild')?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="contact_district" class="vc_col-md-3 col-form-label"><?php echo __( 'District', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select class="form-control" name="contact_district" id="contact_district">
              <option><?=__('Select District...', 'visachild')?></option>
              <?php foreach($districts as $d) { ?>
                <option><?=__($d, 'visachild')?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="contact_postcode" class="vc_col-md-3 col-form-label"><?php echo __( 'Post Code', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="text" class="form-control" name="contact_postcode" id="contact_postcode">
          </div>
        </div>
      </div>
    </div>

    <div id="sponsor" class="form_seprationSection business hidden">
      <h3><?= __( 'Sponsor', 'visachild' ); ?></h3>
      <p><?= __( 'Please indicate below if you have a sponsor for your trip to China. If you have a sponsor, you must also fill in the details of the person / organization.', 'visachild' ); ?></p>
      <h4><?= __( 'Sponsor Type', 'visachild' ); ?></h4>
      <div class="form-group row">
        <label for="sponsor_type" class="vc_col-md-3 col-form-label">
          <?= __( 'Sponsor Type', 'visachild' ); ?>
        </label>
        <div class="vc_col-md-9">
          <select class="form-control" id="sponsor_type">
            <option value="company">Company / Organization</option>
            <option value="individual">Individual</option>
          </select>
        </div>
      </div><!-- form-group -->
      <div class="form-group row sponsor-company sponsor-individual sponsor-type">
        <label for="sponsor_full_name" class="vc_col-md-3 col-form-label"><?php echo __( 'Full Name', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="sponsor_full_name" id="sponsor_full_name">
        </div>
      </div><!-- form-group -->
      <div class="form-group row sponsor-individual sponsor-type hidden">
        <label for="sponsor_relationship_type" class="vc_col-md-3 col-form-label"><?php echo __( 'Relationship Type', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="sponsor_relationship_type" id="sponsor_relationship_type">
        </div>
      </div><!-- form-group -->

      <div class="form-group row sponsor-company sponsor-individual sponsor-type">
        <label for="sponsor_phone" class="vc_col-md-3 col-form-label"><?php echo __( 'Phone Number', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="sponsor_phone" id="sponsor_phone" placeholder="+31455998877">
        </div>
      </div><!-- form-group -->

      <div class="form-group row sponsor-company sponsor-individual sponsor-type">
        <label for="sponsor_email" class="vc_col-md-3 col-form-label"><?php echo __( 'Email Address', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="sponsor_email" id="sponsor_email">
        </div>
      </div><!-- form-group -->

      <div class="form-group row sponsor-company sponsor-individual sponsor-type">
        <label for="sponsor_country" class="vc_col-md-3 col-form-label"><?php echo __( 'Country', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <select name="sponsor_country" id="sponsor_country">
            <option value="">Select Country</option>
            <option value="Belgium">Belgium</option>
            <option value="Denmark">Denmark</option>
            <option value="Germany">Germany</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="The Netherlands">The Netherlands</option>
            <option value="Norway">Norway</option>
            <option value="Austria">Austria</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Spain">Spain</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="Sweden">Sweden</option>
            <option value="---" disabled="">--------------------------------------------</option>
            <?php
            if(!empty(get_list_countries())){
              foreach(get_list_countries() as $country){?>
                <option value="<?php echo $country->name;?>" <?php echo (isset($_POST['traverler']['nationality'][$j]) == $country->name) ? 'selected' : ''; ?>><?php echo $country->name;?></option>
              <?php } } ?>
            </select>
        </div>
      </div><!-- form-group -->
      <div class="form-group row sponsor-company sponsor-individual sponsor-type">
        <label for="sponsor_province" class="vc_col-md-3 col-form-label"><?php echo __( 'Province', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="sponsor_province" id="sponsor_province">
        </div>
      </div><!-- form-group -->
      <div class="form-group row sponsor-company sponsor-individual sponsor-type">
        <label for="sponsor_city" class="vc_col-md-3 col-form-label"><?php echo __( 'City', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="sponsor_city" id="sponsor_city">
        </div>
      </div><!-- form-group -->
      <div class="form-group row sponsor-company sponsor-individual sponsor-type">
        <label for="sponsor_postcode" class="vc_col-md-3 col-form-label"><?php echo __( 'Postal Code', 'visachild' ); ?></label>
        <div class="vc_col-md-9">
          <input type="text" class="form-control" name="sponsor_postcode" id="sponsor_postcode">
        </div>
      </div><!-- form-group -->
    </div>

    <div id="shipping_method" class="form_seprationSection business hidden">
      <h3><?= __( 'Shpping Method', 'visachild' ); ?></h3>
      <p><?= __( 'Select below how you want to send the passport to us (shipping method) and how you want to receive the passport return (return method).', 'visachild' ); ?></p>
      <div class="form-group row">
        <label for="sel_shipping_method" class="vc_col-md-3 col-form-label">
          <?= __( 'SHIPPING METHOD', 'visachild' ); ?>
        </label>
        <div class="vc_col-md-9">
          <select class="form-control" id="sel_shipping_method" name="shipping_method">
            <option value="">Select Shipping Method ...</option>
            <option value="44.95">Courier next working day before 12:00 (€ 44.95)</option>
            <option value="34.95">Courier next working day before 17:00 (€ 34.95)</option>
            <option value="delivery">Deliver yourself in Rotterdam</option>
            <option value="yourself">Send it yourself</option>
          </select>
        </div>
      </div><!-- form-group -->
      <div class="form-group row">
        <label for="sel_return_method" class="vc_col-md-3 col-form-label">
          <?= __( 'SHIPPING METHOD', 'visachild' ); ?>
        </label>
        <div class="vc_col-md-9">
          <select class="form-control" id="sel_return_method" name="return_method">
            <option value="">Select Return method ...</option>
            <option value="69.95">Avia partner desk (€ 69.95)</option>
            <option value="18.15">Warranty post 2 working days (€ 18.15)</option>
            <option value="44.95">Courier next working day before 12:00 (€ 44.95)</option>
            <option value="34.95">Courier next working day before 17:00 (€ 34.95)</option>
            <option value="yourself">Pick up in Rotterdam yourself</option>
          </select>
        </div>
      </div><!-- form-group -->
    </div>

    <div id="delivery_time" class="form_seprationSection business hidden">
      <h3><?= __( 'Delivery time', 'visachild' ); ?></h3>
      <p><?= __( 'You can choose from different delivery times. If you do not need fast shipping, we recommend that you choose six days.', 'visachild' ); ?></p>
      <div class="form-group row">
        <label for="sel_delivery_time" class="vc_col-md-3 col-form-label">
          <?= __( 'DELIVERY TIME', 'visachild' ); ?>
        </label>
        <div class="vc_col-md-9">
          <select class="form-control" id="sel_delivery_time" name="delivery_time">
            <option value="">Select Delivery Time ...</option>
            <option value="6">6 working days (+ 99.95)</option>
            <option value="4">4 working days (+ 99.95)</option>
            <option value="3">3 working days (+ 124.95)</option>
            <option value="2">2 working days (+ 149.95)</option>
          </select>
        </div>
      </div><!-- form-group -->
    </div>

    <div id="visa_travel_details-information" class="form_seprationSection">
      <h3><?php echo __( 'Travel data', 'visachild' ); ?></h3>
      <p><?php echo __( 'Enter the details of all travelers, including yourself and accompanying children. Do you not have the details of all travelers at hand? It is also possible to submit individual applications per person.', 'visachild' ); ?></p>
      <?php
      if(isset($_POST['traverler'])){
        $cntTraveller = count($_POST['traverler']['nationality']);
      }

      for ($j = 0; $j < $cntTraveller; $j++) {
      ?>
      <div class="travel_details_container" id="traveler_info_<?php echo $j; ?>">
        <h4 id="traveler_id_<?php echo $j; ?>">
          Traveler <?php echo $j + 1 ; ?>
          <?php if($j > 0): ?>
            <span onclick="removeTraverler(<?php echo $j; ?>)" > Remove Traveler <?php echo $j + 1 ; ?></span>
          <?php endif; ?>
        </h4>

        <div class="form-group row">
          <label for="traverler_nationality_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Nationality', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select name="traverler[nationality][]" id="traverler_nationality_<?php echo $j; ?>">
              <option value="" <?php echo (isset($_POST['traverler']['nationality'][$j]) == '') ? 'selected' : ''; ?>>Select Nationality</option>
              <option value="Belgium">Belgium</option>
              <option value="Denmark">Denmark</option>
              <option value="Germany">Germany</option>
              <option value="Finland">Finland</option>
              <option value="France">France</option>
              <option value="The Netherlands">The Netherlands</option>
              <option value="Norway">Norway</option>
              <option value="Austria">Austria</option>
              <option value="Slovakia">Slovakia</option>
              <option value="Spain">Spain</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
              <option value="Sweden">Sweden</option>
              <option value="---" disabled="">--------------------------------------------</option>
              <?php
              if(!empty(get_list_countries())){
                foreach(get_list_countries() as $country){?>
                  <option value="<?php echo $country->name;?>" <?php echo (isset($_POST['traverler']['nationality'][$j]) == $country->name) ? 'selected' : ''; ?>><?php echo $country->name;?></option>
                <?php } } ?>
            </select>
          </div>
        </div><!-- form-group -->
        <div class="form-group row">
          <label for="traverler_gender_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Sex', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select name="traverler[gender][]" id="traverler_gender_<?php echo $j; ?>">
              <option value="" <?php echo (isset($_POST['traverler']['gender'][$j]) == '') ? 'selected' : ''; ?>>Select gender</option>
              <option value="Male" <?php echo (isset($_POST['traverler']['gender'][$j]) == 'Male') ? 'selected' : ''; ?>>Male</option>
              <option value="Female" <?php echo (isset($_POST['traverler']['gender'][$j]) == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select>
          </div>
        </div><!-- form-group -->
        <div class="form-group row">
          <label for="traverler_first_name_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'First name', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="text" value="<?php echo isset($_POST['traverler']['first_name'][$j]) ? $_POST['traverler']['first_name'][$j] : ''; ?>" class="form-control" name="traverler[first_name][]" id="traverler_first_name_<?php echo $j; ?>" placeholder="<?php echo __( 'First name', 'visachild' ); ?>">
          </div>
        </div><!-- form-group -->
        
        <div class="form-group row">
          <label for="traverler_surname_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Surname', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="text" class="form-control" value="<?php echo isset($_POST['traverler']['surname'][$j]) ? $_POST['traverler']['surname'][$j] : ''; ?>" name="traverler[surname][]" id="traverler_surname_<?php echo $j; ?>" placeholder="<?php echo __( 'Surname', 'visachild' ); ?>">
          </div>
        </div><!-- form-group -->

        <div class="form-group row">
          <label for="traverler_date_birth_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Date of birth', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <input type="date" class="form-control" value="<?php echo isset($_POST['traverler']['date_birth'][$j]) ? $_POST['traverler']['date_birth'][$j] : ''; ?>" name="traverler[date_birth][]" id="traverler_date_birth_<?php echo $j; ?>" placeholder="<?php echo __( 'Date of birth', 'visachild' ); ?>">
          </div>
        </div><!-- form-group -->
        <div class="form-group row">
          <label for="traverler_country_of_birth_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Country of Birth', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select name="traverler[country_of_birth][]" id="traverler_country_of_birth_<?php echo $j; ?>">
              <option value="" <?php echo (isset($_POST['traverler']['country_of_birth'][$j]) == '') ? 'selected' : ''; ?>>Select Country of Birth</option>
              <option value="Belgium">Belgium</option>
              <option value="Denmark">Denmark</option>
              <option value="Germany">Germany</option>
              <option value="Finland">Finland</option>
              <option value="France">France</option>
              <option value="The Netherlands">The Netherlands</option>
              <option value="Norway">Norway</option>
              <option value="Austria">Austria</option>
              <option value="Slovakia">Slovakia</option>
              <option value="Spain">Spain</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
              <option value="Sweden">Sweden</option>
              <option value="---" disabled="">--------------------------------------------</option>
              <?php
              if(!empty(get_list_countries())){
                foreach(get_list_countries() as $country){?>
                  <option value="<?php echo $country->name;?>" <?php echo (isset($_POST['traverler']['country_of_birth'][$j]) == $country->name) ? 'selected' : ''; ?>><?php echo $country->name;?></option>
                <?php } } ?>
            </select>
          </div>
        </div><!-- form-group -->

        <div class="business form_seprationSection hidden">
          <div class="form-group row">
            <label for="traverler_province_birth_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Province of Birth', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <input type="type" class="form-control" value="<?php echo isset($_POST['traverler']['province_birth'][$j]) ? $_POST['traverler']['province_birth'][$j] : ''; ?>" name="traverler[province_birth][]" id="traverler_province_birth_<?php echo $j; ?>" placeholder="<?php echo __( 'Province of birth', 'visachild' ); ?>">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label for="traverler_birthplace_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Birthplace', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <input type="text" class="form-control" value="<?php echo isset($_POST['traverler']['birthplace'][$j]) ? $_POST['traverler']['birthplace'][$j] : ''; ?>" name="traverler[province_birth][]" id="traverler_birthplace_<?php echo $j; ?>" placeholder="<?php echo __( 'Birthplace', 'visachild' ); ?>">
            </div>
          </div><!-- form-group -->
        </div>

        <div class="passport-information">
          <h5>
            <?= __('Passport information', 'visachild'); ?>
          </h5>
          <p>
            <?= __('Please enter the information of your passport below. For Dutch people, the document number is nine characters long and starts with a letter (N, B, A, D). The Dutch passport number contains both numbers and letters. For Belgians, the passport number is eight characters long. It has the form: XX999999 (two letters, six numbers).', 'visachild'); ?>
          </p>
          <p>
            <?= __('You must upload a scan or photo of an official passport photo. This should not be a cut-out of the passport. The passport photo must have a white background. Color is not allowed!', 'visachild'); ?>
          </p>
          <div class="form-group row">
            <label for="traverler_document_number_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Document Number', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <input type="text" value="<?php echo isset($_POST['traverler']['document_number'][$j]) ? $_POST['traverler']['document_number'][$j] : ''; ?>" class="form-control" name="traverler[document_number][]" id="traverler_document_number_<?php echo $j; ?>" placeholder="<?php echo __( 'Document Number', 'visachild' ); ?>">
            </div>
          </div><!-- form-group -->

          <div class="form-group row">
            <label for="traverler_release_date_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Release Date', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <input type="date" class="form-control" value="<?php echo isset($_POST['traverler']['release_date'][$j]) ? $_POST['traverler']['release_date'][$j] : ''; ?>" name="traverler[release_date][]" id="traverler_release_date_<?php echo $j; ?>" placeholder="<?php echo __( 'Release Date', 'visachild' ); ?>">
            </div>
          </div><!-- form-group -->

          <div class="form-group row">
            <label for="traverler_expiration_date_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Expiration Date', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <input type="date" class="form-control" value="<?php echo isset($_POST['traverler']['expiration_date'][$j]) ? $_POST['traverler']['expiration_date'][$j] : ''; ?>" name="traverler[expiration_date][]" id="traverler_expiration_date_<?php echo $j; ?>" placeholder="<?php echo __( 'Expiration Date', 'visachild' ); ?>">
              <span class="validate_error"><?php echo isset($arrivalErr) ? $arrivalErr : ''; ?></span>
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label for="traverler_delivery_country_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?= __( 'COUNTRY OF DELIVERY', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <select name="traverler[delivery_country][]" id="traverler_delivery_country_<?php echo $j; ?>">
                <option value="" <?php echo (isset($_POST['traverler']['delivery_country'][$j]) == '') ? 'selected' : ''; ?>>Select Delivery Country</option>
                <option value="Belgium">Belgium</option>
                <option value="Denmark">Denmark</option>
                <option value="Germany">Germany</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="The Netherlands">The Netherlands</option>
                <option value="Norway">Norway</option>
                <option value="Austria">Austria</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Spain">Spain</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="Sweden">Sweden</option>
                <option value="---" disabled="">--------------------------------------------</option>
                <?php
                if(!empty(get_list_countries())){
                  foreach(get_list_countries() as $country){?>
                    <option value="<?php echo $country->name;?>" <?php echo (isset($_POST['traverler']['delivery_country'][$j]) == $country->name) ? 'selected' : ''; ?>><?php echo $country->name;?></option>
                  <?php } } ?>
              </select>
            </div>
          </div><!-- form-group -->
          <div class="form-group row business hidden">
            <label for="traverler_issuing_authority_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Issuing Authority' ); ?></label>
            <div class="vc_col-md-9">
              <input type="date" class="form-control" value="<?php echo isset($_POST['traverler']['issuing_authority'][$j]) ? $_POST['traverler']['issuing_authority'][$j] : ''; ?>" name="traverler[issuing_authority][]" id="traverler_issuing_authority_<?php echo $j; ?>" placeholder="<?php echo __( 'Issuing Authority', 'visachild' ); ?>">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label for="passport_photograph_<?=$j?>" class="vc_col-md-3 col-form-label">
              <?= __( 'Passport Photograph', 'visachild' ); ?>
            </label>
            <div class="vc_col-md-9">
              <input type="file" class="form-control" name="traverler[passport_photograph][]" id="passport_photograph_<?=$j?>">
              <span>
                If desired, you can also upload this file later. You can now leave this field empty.
              </span>
            </div>
          </div><!-- form-group -->
          <div class="form-group row tourism">
            <label for="passport_information_<?=$j?>" class="vc_col-md-3 col-form-label">
              <?= __( 'Scan Passport Information', 'visachild' ); ?>
            </label>
            <div class="vc_col-md-9">
              <input type="file" class="form-control" name="traverler[passport_information][]" id="passport_information_<?=$j?>">
              <span>
                If desired, you can also upload this file later. You can now leave this field empty.
              </span>
            </div>
          </div><!-- form-group -->
        </div>
        <div class="business hidden" id="other_nationalities_<?= $j ?>">
          <h4><?= __('Other nationalities', 'visachild'); ?></h4>
          <p><?= __('If you have a second or third nationality (and hold a passport of this country), please select the relevant nationality (s) below.', 'visachild'); ?></p>
          <div class="form-group row">
            <label for="traverler_other_nationalities_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?= __( 'Other Nationalities', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <select name="traverler[other_nationalities]" class="traverler-select" data-parent="#other_nationalities_<?= $j ?>">
                <option value="no"><?=__('No', 'visachild')?></option>
                <option value="yes"><?=__('Yes', 'visachild')?></option>
              </select>
            </div>
          </div><!-- form-group -->
          <div class="select-yes select hidden">
            <div class="multiple" data-index="1">
              <h5><b><?= __('Other nationality')?><b class="index">1</b></b><button type="button" class="remove-btn hidden" data-parent="#other_nationalities_<?= $j ?>" onclick="removeMulti(this)">Remove Nationality <b class="index">1</b></button></h5>
              <div class="form-group row">
                <label class="vc_col-md-3 col-form-label"><?= __( 'Alternative Nationality', 'visachild' ); ?></label>
                <div class="vc_col-md-9">
                  <select name="traverler[alternative_nationalities][<?=$j?>][]">
                    <option value="">Select Alternative nationality</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Germany">Germany</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="The Netherlands">The Netherlands</option>
                    <option value="Norway">Norway</option>
                    <option value="Austria">Austria</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Spain">Spain</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="Sweden">Sweden</option>
                    <option value="---" disabled="">--------------------------------------------</option>
                    <?php
                    if(!empty(get_list_countries())){
                      foreach(get_list_countries() as $country){?>
                        <option value="<?php echo $country->name;?>" <?php echo (isset($_POST['traverler']['country_of_birth'][$j]) == $country->name) ? 'selected' : ''; ?>><?php echo $country->name;?></option>
                      <?php } } ?>
                  </select>
                </div>
              </div><!-- form-group -->
              <div class="form-group row">
                <label class="vc_col-md-3 col-form-label"><?= __( 'Citizen Service Number (BSN)', 'visachild' ); ?></label>
                <div class="vc_col-md-9">
                  <input type="text" class="form-control" name="traverler[bsn][<?=$j?>][]" placeholder="<?= __( 'Citizen Service Number (BSN)', 'visachild' ); ?>">
                </div>
              </div><!-- form-group -->
              <div class="form-group row">
                <label class="vc_col-md-3 col-form-label"><?= __( 'Document Number' ); ?></label>
                <div class="vc_col-md-9">
                  <input type="text" class="form-control" name="traverler[document_number_business][<?=$j?>][]" placeholder="<?= __( 'Citizen Service Number (BSN)', 'visachild' ); ?>">
                </div>
              </div><!-- form-group -->
              <div class="form-group row">
                <label class="vc_col-md-3 col-form-label"><?= __( 'Nationality Justification (in English)' ); ?></label>
                <div class="vc_col-md-9">
                  <input type="text" class="form-control" name="traverler[nationality_justification][<?=$j?>][]" placeholder="<?= __( 'Nationality Justification (in English)' ); ?>">
                </div>
              </div><!-- form-group -->
            </div>
            <div class="add-more" data-parent="#other_nationalities_<?= $j ?>">
              <span class="btn btn-full-width btn-primary">
                <i class="fa fa-user-plus" aria-hidden="true"></i>  Other nationality
              </span>
            </div> <!-- add_intended-section -->
          </div>
        </div>

        <div class="business hidden" id="other_residence_<?= $j ?>">
          <h4><?= __('Other residence', 'visachild'); ?></h4>
          <p><?= __('Do you have an official residence / home in another country?', 'visachild'); ?></p>
          <div class="form-group row">
            <label class="vc_col-md-3 col-form-label"><?= __( 'Other Residence', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <select name="traverler[other_residence]" class="traverler-select" data-parent="#other_residence_<?= $j ?>">
                <option value="no"><?=__('No', 'visachild')?></option>
                <option value="yes"><?=__('Yes', 'visachild')?></option>
              </select>
            </div>
          </div><!-- form-group -->
          <div class="select-yes select hidden">
            <div class="multiple" data-index="1">
              <h5><b><?= __('Other Residence')?><b class="index">1</b></b><button type="button" class="remove-btn hidden" data-parent="#other_residence_<?= $j ?>" onclick="removeMulti(this)">Remove Residence <b class="index">1</b></button></h5>
              <div class="form-group row">
                <label class="vc_col-md-3 col-form-label"><?= __( 'Other Residence', 'visachild' ); ?></label>
                <div class="vc_col-md-9">
                  <select name="traverler[other_residence_country][<?=$j?>][]">
                    <option value="">Select Country</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Germany">Germany</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="The Netherlands">The Netherlands</option>
                    <option value="Norway">Norway</option>
                    <option value="Austria">Austria</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Spain">Spain</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="Sweden">Sweden</option>
                    <option value="---" disabled="">--------------------------------------------</option>
                    <?php
                    if(!empty(get_list_countries())){
                      foreach(get_list_countries() as $country){?>
                        <option value="<?php echo $country->name;?>" <?php echo (isset($_POST['traverler']['country_of_birth'][$j]) == $country->name) ? 'selected' : ''; ?>><?php echo $country->name;?></option>
                      <?php } } ?>
                  </select>
                </div>
              </div><!-- form-group -->
            </div>
            <div class="add-more" data-parent="#other_residence_<?= $j ?>">
              <span class="btn btn-full-width btn-primary">
                <i class="fa fa-user-plus" aria-hidden="true"></i>  Other Residence
              </span>
            </div> <!-- add_intended-section -->
          </div>
        </div>

        <div class="business hidden" id="previous_nationalties_<?= $j ?>">
          <h4><?= __('Previous Nationalities', 'visachild'); ?></h4>
          <p><?= __('Please indicate below whether you have had another nationality in the past. In that case you must select the countries of which you have had a nationality (and therefore a passport), but no longer have it.', 'visachild'); ?></p>
          <div class="form-group row">
            <label class="vc_col-md-3 col-form-label"><?= __( 'Previous Nationalities', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <select name="traverler[other_nationalities]" class="traverler-select" data-parent="#previous_nationalties_<?= $j ?>">
                <option value="no"><?=__('No', 'visachild')?></option>
                <option value="yes"><?=__('Yes', 'visachild')?></option>
              </select>
            </div>
          </div><!-- form-group -->
          <div class="select-yes select hidden">
            <div class="multiple" data-index="1">
              <h5><b><?= __('Previous Nationalities')?><b class="index">1</b></b><button type="button" class="remove-btn hidden" data-parent="#previous_nationalties_<?= $j ?>" onclick="removeMulti(this)">Remove Nationalities <b class="index">1</b></button></h5>
              <div class="form-group row">
                <label class="vc_col-md-3 col-form-label"><?= __( 'Previous Nationalities', 'visachild' ); ?></label>
                <div class="vc_col-md-9">
                  <select name="traverler[previous_nationalties_country][<?=$j?>][]">
                    <option value="">Select Country</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Germany">Germany</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="The Netherlands">The Netherlands</option>
                    <option value="Norway">Norway</option>
                    <option value="Austria">Austria</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Spain">Spain</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="Sweden">Sweden</option>
                    <option value="---" disabled="">--------------------------------------------</option>
                    <?php
                    if(!empty(get_list_countries())){
                      foreach(get_list_countries() as $country){?>
                        <option value="<?php echo $country->name;?>" <?php echo (isset($_POST['traverler']['country_of_birth'][$j]) == $country->name) ? 'selected' : ''; ?>><?php echo $country->name;?></option>
                      <?php } } ?>
                  </select>
                </div>
              </div><!-- form-group -->
            </div>
            <div class="add-more" data-parent="#previous_nationalties_<?= $j ?>">
              <span class="btn btn-full-width btn-primary">
                <i class="fa fa-user-plus" aria-hidden="true"></i>  Previous Nationalities
              </span>
            </div> <!-- add_intended-section -->
          </div>
        </div>

        <div class="business hidden" id="alternative_names_<?=$j?>">
          <h4><?= __('Alternative names', 'visachild'); ?></h4>
          <p><?= __('Please indicate below whether you are known or have ever been known under another name or alias.', 'visachild'); ?></p>
          <div class="form-group row">
            <label for="traverler_alternative_names_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?= __( 'Other Nationalities', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <select name="traverler[alternative_names]" class="traverler-select" data-parent="#alternative_names_<?= $j ?>">
                <option value="no"><?=__('No', 'visachild')?></option>
                <option value="yes"><?=__('Yes', 'visachild')?></option>
              </select>
            </div>
          </div><!-- form-group -->
          <div class="select select-yes hidden">
            <div class="form-group row business hidden">
              <label for="traverler_alternative_names_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Full Name' ); ?></label>
              <div class="vc_col-md-9">
                <input type="text" class="form-control" name="traverler[alternative_names][]" id="traverler_alternative_names_<?php echo $j; ?>" placeholder="<?php echo __( 'Full Name', 'visachild' ); ?>">
              </div>
            </div><!-- form-group -->
          </div>
        </div>

        <div class="work-information" class="tourism">
          <h5>
            <?= __('Work', 'visachild');?>
          </h5>
          <p>
            <?= __('Enter your job title below. If you don\'t have a job, enter "unemployed". If you are a student, you can enter "student".', 'visachild') ?>
          </p>
          <div class="form-group row">
            <label for="traverler_work_<?php echo $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Work', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <select name="traverler[work][]" id="traverler_work_<?php echo $j; ?>">
                <option value="business_person" <?php echo (isset($_POST['traverler']['work'][$j]) == 'business_person') ? 'selected' : ''; ?>><?=__('Business Person', 'visachild') ?></option>
                <option value="executive" <?php echo (isset($_POST['traverler']['work'][$j]) == 'Male') ? 'selected' : ''; ?>>
                  <?=__('Executive', 'visachild') ?>
                </option>
                <option value="trader" <?php echo (isset($_POST['traverler']['work'][$j]) == 'trader') ? 'selected' : ''; ?>>
                  <?=__('Trader', 'visachild') ?>
                </option>
                <option value="employee" <?php echo (isset($_POST['traverler']['work'][$j]) == 'employee') ? 'selected' : ''; ?>>
                  <?=__('Employee', 'visachild') ?>
                </option>
                <option value="others" <?php echo (isset($_POST['traverler']['work'][$j]) == 'others') ? 'selected' : ''; ?>>
                  <?=__('Others', 'visachild') ?>
                </option>
              </select>
            </div>
          </div><!-- form-group -->
          <div class="form-group other-work row <?php if(isset($_POST['traverler']['work'][$j]) != 'others') echo "hidden"; ?>">
            <label for="traverler_otherwork_<?= $j; ?>" class="vc_col-md-3 col-form-label"><?php echo __( 'Work', 'visachild' ); ?></label>
            <div class="vc_col-md-9">
              <input class="form-control" id="traverler_otherwork_<?= $j; ?>" placeholder="Others">
            </div>
          </div><!-- form-group -->
        </div>

      </div> <!-- traveler_info -->

      <?php } ?>

      <div class="add_travelers-section" id="add_travelers-section">
        <h3><?php echo __( 'Add travelers to the form', 'visachild' ); ?></h3>
        <p><?php echo __( 'Every traveler needs their own visa, including accompanying children. By adding your fellow travelers to this application form, you do not have to re-enter the contact and travel details each time.', 'visachild' ); ?></p>
        <span id="add_traverl_info_button" class="btn btn-full-width btn-primary" data-total="<?php echo $cntTraveller; ?>">
          <i class="fa fa-user-plus" aria-hidden="true"></i>  Add a traveler
        </span>

      </div> <!-- add_travelers-section -->
    </div> <!-- visa_travel_details-information -->

    <div class="return_shipment-section" id="return_shipment-section">
        <h3><?php echo __( 'Delivery and return shipment', 'visachild' ); ?></h3>
        <p><?php echo __( 'After completing this form you will receive a personal e-mail with instructions on how to submit / send the required documents, including the passport of each traveler. Please note: do not send documents until you have read this email carefully.', 'visachild' ); ?></p>
        <p><?php echo __( 'The visa for China is usually granted on the 7th working day after we have received all necessary information and documents. If desired, this can be accelerated through an emergency procedure.', 'visachild' ); ?></p>
        <div class="form-group row">
          <label for="urgent_procedure" class="vc_col-md-3 col-form-label"><?php echo __( 'Urgent procedure', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select name="urgent_procedure" id="urgent_procedure">
              <option value="No emergency procedure"><?php echo __('No emergency procedure', 'visachild') ?></option>
              <option value="4 working days (+ € 14.50 per visa)" <?php echo (isset($urgent_procedure) == '4 working days (+ € 14.50 per visa)') ? 'selected' : ''; ?>><?php echo __('4 working days (+ € 14.50 per visa)', 'visachild') ?></option>
              <option value="3 working days (+ € 78.50 per visa)" <?php echo (isset($urgent_procedure) == '3 working days (+ € 78.50 per visa)') ? 'selected' : ''; ?>><?php echo __('3 working days (+ € 78.50 per visa)', 'visachild') ?></option>
              <option value="2 working days (+ € 118.50 per visa)" <?php echo (isset($urgent_procedure) == '2 working days (+ € 118.50 per visa)') ? 'selected' : ''; ?>><?php echo __('2 working days (+ € 118.50 per visa)', 'visachild') ?></option>
            </select>
          </div>
        </div><!-- form-group -->

        <p><?php echo __( 'On the day of granting, the passport with the visa applied can be collected in Hoofddorp or at Schiphol. Delivery on the next working day after allocation is also possible; that can be registered or by courier.', 'visachild' ); ?></p>

        <div class="form-group row">
          <label for="return_shipment" class="vc_col-md-3 col-form-label"><?php echo __( 'Return shipment', 'visachild' ); ?></label>
          <div class="vc_col-md-9">
            <select name="return_shipment" id="return_shipment">
              <option value="Registered shipping (+ € 17.09)" <?php echo (isset($return_shipment) == 'Registered shipping (+ € 17.09)') ? 'selected' : ''; ?>><?php echo __('Registered shipping (+ € 17.09)', 'visachild') ?></option>
              <option value="Shipping by courier (+ € 39.95)" <?php echo (isset($return_shipment) == 'Shipping by courier (+ € 39.95)') ? 'selected' : ''; ?>><?php echo __('Shipping by courier (+ € 39.95)', 'visachild') ?></option>
              <option value="Pick up at Schiphol (+ € 44.95)" <?php echo (isset($return_shipment) == 'Pick up at Schiphol (+ € 44.95)') ? 'selected' : ''; ?>><?php echo __('Pick up at Schiphol (+ € 44.95)', 'visachild') ?></option>
              <option value="Pick up in Hoofddorp (+ € 0.00)" <?php echo (isset($return_shipment) == 'Pick up in Hoofddorp (+ € 0.00)') ? 'selected' : ''; ?>><?php echo __('Pick up in Hoofddorp (+ € 0.00)', 'visachild') ?></option>
            </select>
          </div>

      </div> <!-- return_shipment-section -->

    <div class="visa_form_submit_section">
      <button type="submit" class="btn btn-conv" data-nonce="<?php echo $china_nonce; ?>">
        <span>Apply for visas</span><i class="fa fa-angle-right" aria-hidden="true"></i>
      </button>
    </div>
  </form>
</div>
<?php get_footer();
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
jQuery(document).ready(function ($) {
  $('#change_purpose_btn').click(function() {
    // updatePrice();
    if ($('#purpose').val() == "Tourism") {
      newselectedValue = "Business";
      $('.business.hidden').removeClass('hidden');
      $('.tourism').not('.hidden').addClass('hidden');
    // 	$('#purpose').val( newselectedValue );
    // 	$('#visum').html('<p><b>Visum: </b> Russia '+ newselectedValue +'</p>');
    // 	if ($('#duration_option').val() ==  '1 t/m 8 days') {
    // 		$('#price').html('39.95');
    // 		$('#invitation_letter').not('.hidden').addClass('hidden');
    // 	}
    // 	else if ($('#duration_option').val() ==  '9 t/m 30 days'){
    // 		$('#price').html('104.95');
    // 		$('#invitation_letter.hidden').removeClass('hidden');
    // 	}
    }
    else {
      newselectedValue = "Tourism";
      $('.business').not('.hidden').addClass('hidden');
      $('.tourism.hidden').removeClass('hidden');
    // 	$('.single-entry.hidden').removeClass('hidden');
    // 	$('.matlassidebar .double-entry').not('hidden').addClass('hidden');
      
    // 	$('#visum').html('<p><b>Visum: </b> Russia '+ newselectedValue +'</p>');
    // 	if ($('#duration_option').val() ==  '1 t/m 8 days') {
    // 		$('#price').html('39.95');
    // 		$('#invitation_letter').not('.hidden').addClass('hidden');
    // 		$('.matlassidebar .duration-9-30').not('hidden').addClass('hidden');
    // 		$('.matlassidebar .duration-1-8.hidden').removeClass('hidden');
    // 	}
    // 	if ($('#duration_option').val() ==  '9 t/m 30 days'){
    // 		$('#price').html('104.95');
    // 		$('#invitation_letter.hidden').removeClass('hidden');
    // 		$('.matlassidebar .duration-1-8').not('hidden').addClass('hidden');
    // 		$('.matlassidebar .duration-9-30.hidden').removeClass('hidden');
    // 	}
    }

    $('#purpose').val( newselectedValue );
    $('#purpose_modal').modal('hide');
    // $('.visa_form_submit')[0].reset();

  });
  $('#countries').change(function (e) {
    if ($(this).val() === 'Netherlands') {
      $('#sel_province_name').attr('name', 'province_name');
      $('#inp_province_name').attr('name', 'inp_province_name');
      $('#sel_province_name.hidden').removeClass('hidden');
      $('#inp_province_name').not('.hidden').addClass('hidden');
    } else {
      $('#inp_province_name').attr('name', 'province_name');
      $('#sel_province_name').attr('name', 'inp_province_name');
      $('#inp_province_name.hidden').removeClass('hidden');
      $('#sel_province_name').not('.hidden').addClass('hidden');
    }
  });

  $('#sel_travel_expenses').change(function (e) {
    var val = $(this).val();
    $('.travel-expenses').not('.expense-' + val).not('.hidden').addClass('hidden');
    $('.travel-expenses.hidden.expense-' + val).removeClass('hidden');
  });

  $('#sponsor_type').change(function () {
    var val = $(this).val();
    $('.sponsor-type').not('.sponsor-' + val).not('.hidden').addClass('hidden');
    $('.sponsor-type.hidden.sponsor-' + val).removeClass('hidden');
  })

  $('.traverler-select').change(function () {
    var parent = $(this).data('parent');
    var val = $(this).val();
    $(parent).find('.select').not('.select-' + val).not('.hidden').addClass('hidden');;
    $(parent).find('.select.hidden.select-' + val).removeClass('hidden');;
  });
})
</script>