<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO `master_skills` (`id`, `name`) VALUES
        ('1', 'Best boy Electric'),
        ('2', 'Best Boy Rigging Electric'),
        ('3', 'Book Adaptations'),
        ('4', 'Boom Operator'),
        ('5', 'Breakdown Artist'),
        ('6', 'Breakdown Artist Key'),
        ('7', 'Budgeting'),
        ('8', 'Buyer Film Rights'),
        ('9', 'Camera Assistant'),
        ('10', 'Camera Assistant 1st'),
        ('11', 'Camera Assistant 2nd'),
        ('12', 'Camera Department Translator'),
        ('13', 'Camera Dolly Grip'),
        ('14', 'Camera Intern/ 3rd AC'),
        ('15', 'Camera PA'),
        ('16', 'Camera Trainee'),
        ('17', 'Car Hunter /Mechanics'),
        ('18', 'Carpenters'),
        ('19', 'Cashier'),
        ('20', 'Casting Agent'),
        ('21', 'Casting Director'),
        ('22', 'Caterer'),
        ('23', 'Catering Manager'),
        ('24', 'Choreographer'),
        ('25', 'Cinema Owner'),
        ('26', 'Cleaner/Launder'),
        ('27', 'Color Assistants'),
        ('28', 'Colorist'),
        ('29', 'Concept Artists'),
        ('30', 'Construction Coordinator'),
        ('31', 'Consultant'),
        ('32', 'Costume Coordinator'),
        ('33', 'Costume Designer'),
        ('34', 'Costume Designer Assistant'),
        ('35', 'Costume Main Cutter'),
        ('36', 'Costume Supervisor'),
        ('37', 'Costume Supervisor Assistant'),
        ('38', 'Costume Tailor'),
        ('39', 'Craft Assistant'),
        ('40', 'Craft Service Production Key'),
        ('41', 'Crane Grip'),
        ('42', 'Crane Grip Boy'),
        ('43', 'Crowd Hair & Makeup Artist'),
        ('44', 'Crowd Handler'),
        ('45', 'Crowd Trainee'),
        ('46', 'Data I/O'),
        ('47', 'Dialect Coach'),
        ('48', 'Digital Composting Supervisor'),
        ('49', 'Digital Intermediate Producer'),
        ('50', 'Digital Recordist'),
        ('51', 'Dimmer Board Operator'),
        ('52', 'Director'),
        ('53', 'Director of Photography (DoP)'),
        ('54', 'Director\'s Assistant'),
        ('55', 'Distributor'),
        ('56', 'DIT'),
        ('57', 'DIT Assistant'),
        ('58', 'DIT/ Media Management'),
        ('59', 'DMX Board Operator'),
        ('60', 'Dolly Grip'),
        ('61', 'Draughtsperson'),
        ('62', 'Dressmen'),
        ('63', 'Driver'),
        ('64', 'Drone Assistant'),
        ('65', 'Drone Camera Operator'),
        ('66', 'Drone Pilot'),
        ('67', 'Dubbing Artist'),
        ('68', 'Editor'),
        ('69', 'Electrician'),
        ('70', 'EPK Cameraman'),
        ('71', 'Equity Investor'),
        ('72', 'Exhibitor'),
        ('73', 'F&B Suppliers'),
        ('74', 'Festival Programmer'),
        ('75', 'Fight Coordinator'),
        ('76', 'Film Commission'),
        ('77', 'Film Fund'),
        ('78', 'Film Rights'),
        ('79', 'Filmmaker - Documentary'),
        ('80', 'Filmmaker - Feature'),
        ('81', 'Filmmaker - Series'),
        ('82', 'Filmmaker - Short'),
        ('83', 'Financial Controller - Key'),
        ('84', 'Finishing Editor'),
        ('85', 'Foley Artist'),
        ('86', 'Food stylist'),
        ('87', 'Gaffer'),
        ('88', 'Gaming Content Creator'),
        ('89', 'Generator Operator'),
        ('90', 'Graphics Designer'),
        ('91', 'Green Supervisor'),
        ('92', 'Greensmen'),
        ('93', 'Grim Support Electrician'),
        ('94', 'Grip Best Boy'),
        ('95', 'Grip Department Translator'),
        ('96', 'Wardrobe Assistant'),
        ('97', 'Wardrobe Supervisor'),
        ('98', 'Weapons Maker'),
        ('99', 'Welder - Head'),
        ('100', 'Workshop Assistant'),
        ('101', 'Workshop Director'),
        ('102', 'Writer'),
        ('103', 'Writer - Adapted Screenplay'),
        ('104', 'Writer - Commissioned'),
        ('105', 'Writer - Dialogue'),
        ('106', 'Writer - Feature'),
        ('107', 'Writer - Series'),
        ('108', 'Writer - Sub-Titles'),
        ('109', 'Writer - Video Games'),
        ('110', 'Writers\' Room'),
        ('111', 'Venture Capital Fund'),
        ('112', 'VFX Supervisor'),
        ('113', 'Video Playback'),
        ('114', 'Video Playback Assistants'),
        ('115', 'Visual Effects'),
        ('116', 'Voice-over'),
        ('117', 'Underwater DP'),
        ('118', 'Unit PA'),
        ('119', 'Unit Production Manager'),
        ('120', 'Unit Publicist'),
        ('121', 'Technologist'),
        ('122', 'Theatre Manager'),
        ('123', 'Titles Designer'),
        ('124', 'Trailer Editor'),
        ('125', 'Tranportation Captain'),
        ('126', 'Transport Suppliers'),
        ('127', 'Transportation Co-Captain'),
        ('128', 'Transportation Coordinator'),
        ('129', 'Travel Agent'),
        ('130', 'Travel Consultants'),
        ('131', 'Travel Coordinators'),
        ('132', 'Scenic Artist'),
        ('133', 'Scheduler'),
        ('134', 'Score Editor'),
        ('135', 'Scoring Stage Manager'),
        ('136', 'Script Doctor'),
        ('137', 'Script Supervisor'),
        ('138', 'Seamstress'),
        ('139', 'Set Buyers'),
        ('140', 'Set Carpenter'),
        ('141', 'Set Costumes'),
        ('142', 'Set Decorator'),
        ('143', 'Set Designer'),
        ('144', 'Set Dresser'),
        ('145', 'Set PA'),
        ('146', 'Set Runner'),
        ('147', 'Set Scenic Artist'),
        ('148', 'Setting Boys'),
        ('149', 'SFX Technician'),
        ('150', 'Shipping and Transport'),
        ('151', 'Shopper'),
        ('152', 'Shotover DOP'),
        ('153', 'Showrunner'),
        ('154', 'Sigh Board Artist'),
        ('155', 'Sign Writer'),
        ('156', 'Sound Cableman'),
        ('157', 'Sound Mixer/ Designer'),
        ('158', 'Sound Utility'),
        ('159', 'Special Effects Coordinator'),
        ('160', 'Special Effects Foreman'),
        ('161', 'Special Effects Supervisor'),
        ('162', 'Stand-by Props'),
        ('163', 'Steadicam Operator'),
        ('164', 'Still Photographer'),
        ('165', 'Storeman'),
        ('166', 'Stunt Administrator'),
        ('167', 'Stunt Coordinator'),
        ('168', 'Stunt Coordinator Assistant'),
        ('169', 'Stunt Costumer'),
        ('170', 'Stunt Double'),
        ('171', 'Stunt Equipment Assistant'),
        ('172', 'Stunt Office Coordinator'),
        ('173', 'Stunt Performer'),
        ('174', 'Sub-titles'),
        ('175', 'Supervising Art Director'),
        ('176', 'Swing Gang'),
        ('177', 'Railway Coordinator'),
        ('178', 'Re-recording Mixer'),
        ('179', 'Re-writing'),
        ('180', 'Remake Rights'),
        ('181', 'Remote Head Technician'),
        ('182', 'Researcher'),
        ('183', 'Rigging Gaffers'),
        ('184', 'Rigging Grips'),
        ('185', 'Painter'),
        ('186', 'Personal Assistants'),
        ('187', 'Plasterer Head'),
        ('188', 'Post Production Accountant'),
        ('189', 'Post Production Supervisor'),
        ('190', 'Producer'),
        ('191', 'Producer Assistant'),
        ('192', 'Production Accountants'),
        ('193', 'Production Assistant'),
        ('194', 'Production Coordinator'),
        ('195', 'Production Designer'),
        ('196', 'Production Legal Services'),
        ('197', 'Production Manager'),
        ('198', 'Production Secretary'),
        ('199', 'Production Supervisor'),
        ('200', 'Projectionist'),
        ('201', 'Projectionist'),
        ('202', 'Prop Assistants'),
        ('203', 'Prop Maker'),
        ('204', 'Property Master'),
        ('205', 'Props Assistant'),
        ('206', 'Prosthetics Advanced'),
        ('207', 'Prosthetics Basic'),
        ('208', 'Publicist'),
        ('209', 'Publisher'),
        ('210', 'Office PAs'),
        ('211', 'On Set Dresser'),
        ('212', 'On Set Vehicles Art Director'),
        ('213', 'On-set Auditors'),
        ('214', 'On-set Carpenter'),
        ('215', 'Orchestra Conductor'),
        ('216', 'Illustrator'),
        ('217', 'Image Scientist'),
        ('218', 'Insurance Provider'),
        ('219', 'Intern'),
        ('220', 'Intimacy Coordinator'),
        ('221', 'Hair Deptt. Head'),
        ('222', 'Hair Stylist'),
        ('223', 'Hotels'),
        ('224', 'Key Craft Services'),
        ('225', 'Key Hair Department'),
        ('226', 'Key Makeup Department'),
        ('227', 'Key PA'),
        ('228', 'Key Scenic'),
        ('229', 'Key Set Medics'),
        ('230', 'Key Stunt Rigger'),
        ('231', 'Labour Coordinator'),
        ('232', 'Labour Supervisor'),
        ('233', 'Leadman'),
        ('234', 'Legal Counsel'),
        ('235', 'Librarian'),
        ('236', 'Light Boys'),
        ('237', 'Line Producer'),
        ('238', 'Loader'),
        ('239', 'Location Assistant'),
        ('240', 'Location Manager'),
        ('241', 'Location Scout'),
        ('242', 'Makeup Assistant'),
        ('243', 'Makeup Deptt. Head'),
        ('244', 'Marine Coordinator'),
        ('245', 'Marine Technicians'),
        ('246', 'Mentors'),
        ('247', 'Merchandise'),
        ('248', 'Model Maker'),
        ('249', 'Moulder'),
        ('250', 'Music Composer'),
        ('251', 'Music Director')";

    DB::unprepared($query);
    }
}
