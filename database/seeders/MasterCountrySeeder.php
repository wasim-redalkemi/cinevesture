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
        // $query = "INSERT INTO master_countries (id, name, country_code) VALUES
         $query = "INSERT INTO master_countries (id, name, country_Code) VALUES
	('1', 'Afghanistan', 'AF'),
	('2', 'Åland Islands', 'AX'),
	('3', 'Albania', 'AL'),
	('4', 'Algeria', 'DZ'),
	('5', 'American Samoa', 'AS'),
	('6', 'Andorra', 'AD'),
	('7', 'Angola', 'AO'),
	('8', 'Anguilla', 'AI'),
	('9', 'Antarctica', 'AQ'),
	('10', 'Antigua and Barbuda', 'AG'),
	('11', 'Argentina', 'AR'),
	('12', 'Armenia', 'AM'),
	('13', 'Aruba', 'AW'),
	('14', 'Australia', 'AU'),
	('15', 'Austria', 'AT'),
	('16', 'Azerbaijan', 'AZ'),
	('17', 'Bahamas', 'BS'),
	('18', 'Bahrain', 'BH'),
	('19', 'Bangladesh', 'BD'),
	('20', 'Barbados', 'BB'),
	('21', 'Belarus', 'BY'),
	('22', 'Belgium', 'BE'),
	('23', 'Belize', 'BZ'),
	('24', 'Benin', 'BJ'),
	('25', 'Bermuda', 'BM'),
	('26', 'Bhutan', 'BT'),
	('27', 'Bolivia', 'BO'),
	('28', 'Bonaire, Sint Eustatius and Saba', 'BQ'),
	('29', 'Bosnia and Herzegovina', 'BA'),
	('30', 'Botswana', 'BW'),
	('31', 'Bouvet Island', 'BV'),
	('32', 'Brazil', 'BR'),
	('33', 'British Indian Ocean Territory', 'IO'),
	('34', 'British Virgin Islands', 'VG'),
	('35', 'Brunei Darussalam', 'BN'),
	('36', 'Bulgaria', 'BG'),
	('37', 'Burkina Faso', 'BF'),
	('38', 'Burundi', 'BI'),
	('39', 'Cabo Verde', 'CV'),
	('40', 'Cambodia', 'KH'),
	('41', 'Cameroon', 'CM'),
	('42', 'Canada', 'CA'),
	('43', 'Cayman Islands', 'KY'),
	('44', 'Central African Republic', 'CF'),
	('45', 'Chad', 'TD'),
	('46', 'Chile', 'CL'),
	('47', 'China', 'CN'),
	('48', 'Christmas Island', 'CX'),
	('49', 'Cocos (Keeling) Islands', 'CC'),
	('50', 'Colombia', 'CO'),
	('51', 'Comoros', 'KM'),
	('52', 'Congo (The Democratic Republic of)', 'CD'),
	('53', 'Congo (The Republic of)', 'CG'),
	('54', 'Cook Islands', 'CK'),
	('55', 'Costa Rica', 'CR'),
	('56', 'Côte d\'lvoire (Ivory Coast)', 'CI'),
	('57', 'Croatia (Hrvatska)', 'HR'),
	('58', 'Cuba', 'CU'),
	('59', 'Curaçao', 'CW'),
	('60', 'Cyprus', 'CY'),
	('61', 'Czech Republic (Czechia)', 'CZ'),
	('62', 'Denmark', 'DK'),
	('63', 'Djibouti', 'DJ'),
	('64', 'Dominica', 'DM'),
	('65', 'Dominican Republic', 'DO'),
	('66', 'East Timor (Timor-Leste)', 'TL'),
	('67', 'Ecuador', 'EC'),
	('68', 'Egypt', 'EG'),
	('69', 'El Salvador', 'SV'),
	('70', 'Equatorial Guinea', 'GQ'),
	('71', 'Eritrea', 'ER'),
	('72', 'Estonia', 'EE'),
	('73', 'Eswatini', 'SZ'),
	('74', 'Ethiopia', 'ET'),
	('75', 'Falkland Islands (Malvinas)', 'FK'),
	('76', 'Faroe Islands', 'FO'),
	('77', 'Fiji', 'FJ'),
	('78', 'Finland', 'FI'),
	('79', 'France', 'FR'),
	('80', 'French Guiana', 'GF'),
	('81', 'French Polynesia', 'PF'),
	('82', 'French Southern Territories', 'TF'),
	('83', 'Gabon', 'GA'),
	('84', 'Gambia', 'GM'),
	('85', 'Georgia', 'GE'),
	('86', 'Germany', 'DE'),
	('87', 'Ghana', 'GH'),
	('88', 'Gibraltar', 'GI'),
	('89', 'Greece', 'GR'),
	('90', 'Greenland', 'GL'),
	('91', 'Grenada', 'GD'),
	('92', 'Guadeloupe', 'GP'),
	('93', 'Guam', 'GU'),
	('94', 'Guatemala', 'GT'),
	('95', 'Guernsey', 'GG'),
	('96', 'Guinea', 'GN'),
	('97', 'Guinea-Bissau', 'GW'),
	('98', 'Guyana', 'GY'),
	('99', 'Haiti', 'HT'),
	('100', 'Heard and Mc Donald Islands', 'HM'),
	('101', 'Holy See (Vatican City)', 'VA'),
	('102', 'Honduras', 'HN'),
	('103', 'Hong Kong', 'HK'),
	('104', 'Hungary', 'HU'),
	('105', 'Iceland', 'IS'),
	('106', 'India', 'IN'),
	('107', 'Indonesia', 'ID'),
	('108', 'Iran', 'IR'),
	('109', 'Iraq', 'IQ'),
	('110', 'Ireland', 'IE'),
	('111', 'Isle of Man', 'IM'),
	('112', 'Israel', 'IL'),
	('113', 'Italy', 'IT'),
	('114', 'Jamaica', 'JM'),
	('115', 'Japan', 'JP'),
	('116', 'Jersey', 'JE'),
	('117', 'Jordan', 'JO'),
	('118', 'Kazakhstan', 'KZ'),
	('119', 'Kenya', 'KE'),
	('120', 'Kiribati', 'KI'),
	('121', 'Korea (North/ The Democratic People\'s Republic of)', 'KP'),
	('122', 'Korea (South/ The Republic of)', 'KR'),
	('123', 'Kosovo', 'XK'),
	('124', 'Kuwait', 'KW'),
	('125', 'Kyrgyzstan', 'KG'),
	('126', 'Lao People\'s Democratic Republic', 'LA'),
	('127', 'Latvia', 'LV'),
	('128', 'Lebanon', 'LB'),
	('129', 'Lesotho', 'LS'),
	('130', 'Liberia', 'LR'),
	('131', 'Libya', 'LY'),
	('132', 'Liechtenstein', 'LI'),
	('133', 'Lithuania', 'LT'),
	('134', 'Luxembourg', 'LU'),
	('135', 'Macao', 'MO'),
	('136', 'Madagascar', 'MG'),
	('137', 'Malawi', 'MW'),
	('138', 'Malaysia', 'MY'),
	('139', 'Maldives', 'MV'),
	('140', 'Mali', 'ML'),
	('141', 'Malta', 'MT'),
	('142', 'Marshall Islands', 'MH'),
	('143', 'Martinique', 'MQ'),
	('144', 'Mauritania', 'MR'),
	('145', 'Mauritius', 'MU'),
	('146', 'Mayotte', 'YT'),
	('147', 'Mexico', 'MX'),
	('148', 'Micronesia', 'FM'),
	('149', 'Moldova', 'MD'),
	('150', 'Monaco', 'MC'),
	('151', 'Mongolia', 'MN'),
	('152', 'Montenegro', 'ME'),
	('153', 'Montserrat', 'MS'),
	('154', 'Morocco', 'MA'),
	('155', 'Mozambique', 'MZ'),
	('156', 'Myanmar (Burma)', 'MM'),
	('157', 'Namibia', 'NA'),
	('158', 'Nauru', 'NR'),
	('159', 'Nepal', 'NP'),
	('160', 'Netherlands', 'NL'),
	('161', 'New Caledonia', 'NC'),
	('162', 'New Zealand', 'NZ'),
	('163', 'Nicaragua', 'NI'),
	('164', 'Niger', 'NE'),
	('165', 'Nigeria', 'NG'),
	('166', 'Niue', 'NU'),
	('167', 'Norfolk Island', 'NF'),
	('168', 'Northern Mariana Islands', 'MP'),
	('169', 'North Macedonia', 'MK'),
	('170', 'Norway', 'NO'),
	('171', 'Oman', 'OM'),
	('172', 'Pakistan', 'PK'),
	('173', 'Palau', 'PW'),
	('174', 'Palestine', 'PS'),
	('175', 'Panama', 'PA'),
	('176', 'Papua New Guinea', 'PG'),
	('177', 'Paraguay', 'PY'),
	('178', 'Peru', 'PE'),
	('179', 'Philippines', 'PH'),
	('180', 'Pitcairn', 'PN'),
	('181', 'Poland', 'PL'),
	('182', 'Portugal', 'PT'),
	('183', 'Puerto Rico', 'PR'),
	('184', 'Qatar', 'QA'),
	('185', 'Reunion', 'RE'),
	('186', 'Romania', 'RO'),
	('187', 'Russian Federation', 'RU'),
	('188', 'Rwanda', 'RW'),
	('189', 'Saint Barthélemy', 'BL'),
	('190', 'Saint Helena, Ascension and Tristan da Cunha', 'SH'),
	('191', 'Saint Kitts and Nevis', 'KN'),
	('192', 'Saint Lucia', 'LC'),
	('193', 'Saint Martin', 'MF'),
	('194', 'Saint Pierre and Miquelon', 'PM'),
	('195', 'Saint Vincent and the Grenadines', 'VC'),
	('196', 'Samoa', 'WS'),
	('197', 'San Marino', 'SM'),
	('198', 'Sao Tome and Principe', 'ST'),
	('199', 'Saudi Arabia', 'SA'),
	('200', 'Senegal', 'SN'),
	('201', 'Serbia', 'RS'),
	('202', 'Seychelles', 'SC'),
	('203', 'Sierra Leone', 'SL'),
	('204', 'Singapore', 'SG'),
	('205', 'Sint Maarten', 'SX'),
	('206', 'Slovakia', 'SK'),
	('207', 'Slovenia', 'SI'),
	('208', 'Solomon Islands', 'SB'),
	('209', 'Somalia', 'SO'),
	('210', 'South Africa', 'ZA'),
	('211', 'South Georgia and the South Sandwich Islands', 'GS'),
	('212', 'South Sudan', 'SS'),
	('213', 'Spain', 'ES'),
	('214', 'Sri Lanka', 'LK'),
	('215', 'Sudan', 'SD'),
	('216', 'Suriname', 'SR'),
	('217', 'Svalbard and Jan Mayen Islands', 'SJ'),
	('218', 'Sweden', 'SE'),
	('219', 'Switzerland', 'CH'),
	('220', 'Syrian Arab Republic', 'SY'),
	('221', 'Taiwan', 'TW'),
	('222', 'Tajikistan', 'TJ'),
	('223', 'Tanzania', 'TZ'),
	('224', 'Thailand', 'TH'),
	('225', 'Togo', 'TG'),
	('226', 'Tokelau', 'TK'),
	('227', 'Tonga', 'TO'),
	('228', 'Trinidad and Tobago', 'TT'),
	('229', 'Tunisia', 'TN'),
	('230', 'Turkey', 'TR'),
	('231', 'Turkmenistan', 'TM'),
	('232', 'Turks and Caicos Islands', 'TC'),
	('233', 'Tuvalu', 'TV'),
	('234', 'Uganda', 'UG'),
	('235', 'Ukraine', 'UA'),
	('236', 'United Arab Emirates', 'AE'),
	('237', 'United Kingdom', 'GB'),
	('238', 'United States Minor Outlying Islands', 'UM'),
	('239', 'United States of America', 'US'),
	('240', 'United States Vigin Islands', 'VI'),
	('241', 'Uruguay', 'UY'),
	('242', 'Uzbekistan', 'UZ'),
	('243', 'Vanuatu', 'VU'),
	('244', 'Venezuela', 'VE'),
	('245', 'Vietnam', 'VN'),
	('246', 'Wallis and Futuna Islands', 'WF'),
	('247', 'Western Sahara', 'EH'),
	('248', 'Yemen', 'YE'),
	('249', 'Zambia', 'ZM'),
	('250', 'Zimbabwe', 'ZW')";

        DB::unprepared($query);
    }
}
