<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "insert into `master_countries` (`id`, `name`, `country_code`) values('1','United States','US'),('2','Canada','CA'),('3','Australia','AU'),('4','United Kingdom','GB'),('5','Japan','JP'),('6','India','IN'),('7','Afghanistan','AF'),('8','Åland Islands','AX'),('9','Albania','AL'),('10','Algeria','DZ'),('11','American Samoa','AS'),('12','Andorra','AD'),('13','Angola','AO'),('14','Anguilla','AI'),('15','Antarctica','AQ'),('16','Antigua and Barbuda','AG'),('17','Argentina','AR'),('18','Armenia','AM'),('19','Aruba','AW'),('20','Austria','AT'),('21','Azerbaijan','AZ'),('22','Bahamas','BS'),('23','Bahrain','BH'),('24','Bangladesh','BD'),('25','Barbados','BB'),('26','Belarus','BY'),('27','Belgium','BE'),('28','Belize','BZ'),('29','Benin','BJ'),('30','Bermuda','BM'),('31','Bhutan','BT'),('32','Bolivia, Plurinational State of','BO'),('33','Bonaire, Sint Eustatius and Saba','BQ'),('34','Bosnia and Herzegovina','BA'),('35','Botswana','BW'),('36','Bouvet Island','BV'),('37','Brazil','BR'),('38','British Indian Ocean Territory','IO'),('39','Brunei Darussalam','BN'),('40','Bulgaria','BG'),('41','Burkina Faso','BF'),('42','Burundi','BI'),('43','Cambodia','KH'),('44','Cameroon','CM'),('45','Cape Verde','CV'),('46','Cayman Islands','KY'),('47','Central African Republic','CF'),('48','Chad','TD'),('49','Chile','CL'),('50','China','CN'),('51','Christmas Island','CX'),('52','Cocos (Keeling) Islands','CC'),('53','Colombia','CO'),('54','Comoros','KM'),('55','Congo','CG'),('56','Congo, The Democratic Republic of the','CD'),('57','Cook Islands','CK'),('58','Costa Rica','CR'),('59','Côte d\'Ivoire','CI'),('60','Croatia','HR'),('61','Cuba','CU'),('62','Curaçao','CW'),('63','Cyprus','CY'),('64','Czech Republic','CZ'),('65','Denmark','DK'),('66','Djibouti','DJ'),('67','Dominica','DM'),('68','Dominican Republic','DO'),('69','Ecuador','EC'),('70','Egypt','EG'),('71','El Salvador','SV'),('72','Equatorial Guinea','GQ'),('73','Eritrea','ER'),('74','Estonia','EE'),('75','Ethiopia','ET'),('76','Falkland Islands (Malvinas)','FK'),('77','Faroe Islands','FO'),('78','Fiji','FJ'),('79','Finland','FI'),('80','France','FR'),('81','French Guiana','GF'),('82','French Polynesia','PF'),('83','French Southern Territories','TF'),('84','Gabon','GA'),('85','Gambia','GM'),('86','Georgia','GE'),('87','Germany','DE'),('88','Ghana','GH'),('89','Gibraltar','GI'),('90','Greece','GR'),('91','Greenland','GL'),('92','Grenada','GD'),('93','Guadeloupe','GP'),('94','Guam','GU'),('95','Guatemala','GT'),('96','Guernsey','GG'),('97','Guinea','GN'),('98','Guinea-Bissau','GW'),('99','Guyana','GY'),('100','Haiti','HT'),('101','Heard Island and McDonald Islands','HM'),('102','Holy See (Vatican City State)','VA'),('103','Honduras','HN'),('104','Hong Kong','HK'),('105','Hungary','HU'),('106','Iceland','IS'),('107','Indonesia','ID'),('108','Iran, Islamic Republic of','IR'),('109','Iraq','IQ'),('110','Ireland','IE'),('111','Isle of Man','IM'),('112','Israel','IL'),('113','Italy','IT'),('114','Jamaica','JM'),('115','Jersey','JE'),('116','Jordan','JO'),('117','Kazakhstan','KZ'),('118','Kenya','KE'),('119','Kiribati','KI'),('120','Korea, Democratic People\'s Republic of','KP'),('121','Korea, Republic of','KR'),('122','Kosovo','XB'),('123','Kuwait','KW'),('124','Kyrgyzstan','KG'),('125','Lao People\'s Democratic Republic','LA'),('126','Latvia','LV'),('127','Lebanon','LB'),('128','Lesotho','LS'),('129','Liberia','LR'),('130','Libya','LY'),('131','Liechtenstein','LI'),('132','Lithuania','LT'),('133','Luxembourg','LU'),('134','Macao','MO'),('135','Macedonia, Republic of','MK'),('136','Madagascar','MG'),('137','Malawi','MW'),('138','Malaysia','MY'),('139','Maldives','MV'),('140','Mali','ML'),('141','Malta','MT'),('142','Marshall Islands','MH'),('143','Martinique','MQ'),('144','Mauritania','MR'),('145','Mauritius','MU'),('146','Mayotte','YT'),('147','Mexico','MX'),('148','Micronesia, Federated States of','FM'),('149','Moldova, Republic of','MD'),('150','Monaco','MC'),('151','Mongolia','MN'),('152','Montenegro','ME'),('153','Montserrat','MS'),('154','Morocco','MA'),('155','Mozambique','MZ'),('156','Myanmar','MM'),('157','Namibia','NA'),('158','Nauru','NR'),('159','Nepal','NP'),('160','Netherlands','NL'),('161','New Caledonia','NC'),('162','New Zealand','NZ'),('163','Nicaragua','NI'),('164','Niger','NE'),('165','Nigeria','NG'),('166','Niue','NU'),('167','Norfolk Island','NF'),('168','Northern Mariana Islands','MP'),('169','Norway','NO'),('170','Oman','OM'),('171','Pakistan','PK'),('172','Palau','PW'),('173','Palestine, State of','PS'),('174','Panama','PA'),('175','Papua New Guinea','PG'),('176','Paraguay','PY'),('177','Peru','PE'),('178','Philippines','PH'),('179','Pitcairn','PN'),('180','Poland','PL'),('181','Portugal','PT'),('182','Puerto Rico','PR'),('183','Qatar','QA'),('184','Réunion','RE'),('185','Romania','RO'),('186','Russian Federation','RU'),('187','Rwanda','RW'),('188','Saint Barthélemy','BL'),('189','Saint Helena, Ascension and Tristan da Cunha','SH'),('190','Saint Kitts and Nevis','KN'),('191','Saint Lucia','LC'),('192','Saint Martin (French part)','MF'),('193','Saint Pierre and Miquelon','PM'),('194','Saint Vincent and the Grenadines','VC'),('195','Samoa','WS'),('196','San Marino','SM'),('197','Sao Tome and Principe','ST'),('198','Saudi Arabia','SA'),('199','Senegal','SN'),('200','Serbia','RS'),('201','Seychelles','SC'),('202','Sierra Leone','SL'),('203','Singapore','SG'),('204','Sint Maarten (Dutch part)','SX'),('205','Slovakia','SK'),('206','Slovenia','SI'),('207','Solomon Islands','SB'),('208','Somalia','SO'),('209','South Africa','ZA'),('210','South Georgia and the South Sandwich Islands','GS'),('211','South Sudan','SS'),('212','Spain','ES'),('213','Sri Lanka','LK'),('214','Sudan','SD'),('215','Suriname','SR'),('216','Svalbard and Jan Mayen','SJ'),('217','Swaziland','SZ'),('218','Sweden','SE'),('219','Switzerland','CH'),('220','Syrian Arab Republic','SY'),('221','Taiwan','TW'),('222','Tajikistan','TJ'),('223','Tanzania, United Republic of','TZ'),('224','Thailand','TH'),('225','Timor-Leste','TL'),('226','Togo','TG'),('227','Tokelau','TK'),('228','Tonga','TO'),('229','Trinidad and Tobago','TT'),('230','Tunisia','TN'),('231','Turkey','TR'),('232','Turkmenistan','TM'),('233','Turks and Caicos Islands','TC'),('234','Tuvalu','TV'),('235','Uganda','UG'),('236','Ukraine','UA'),('237','United Arab Emirates','AE'),('238','United States Minor Outlying Islands','UM'),('239','Uruguay','UY'),('240','Uzbekistan','UZ'),('241','Vanuatu','VU'),('242','Venezuela, Bolivarian Republic of','VE'),('243','Viet Nam','VN'),('244','Virgin Islands, British','VG'),('245','Virgin Islands, U.S.','VI'),('246','Wallis and Futuna','WF'),('247','Western Sahara','EH'),('248','Yemen','YE'),('249','Zambia','ZM'),('250','Zimbabwe','ZW'),('251','India','IN')";

        DB::unprepared($query);
    }
}
