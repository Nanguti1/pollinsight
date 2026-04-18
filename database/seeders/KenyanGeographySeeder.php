<?php

namespace Database\Seeders;

use App\Models\Constituency;
use App\Models\County;
use App\Models\Ward;
use Illuminate\Database\Seeder;

class KenyanGeographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countiesData = [
            [
                'name' => 'MOMBASA',
                'constituencies' => [
                    [
                        'name' => 'CHANGAMWE',
                        'wards' => ['PORT REITZ', 'KIPEVU', 'AIRPORT', 'CHANGAMWE', 'CHAANI']
                    ],
                    [
                        'name' => 'JOMVU',
                        'wards' => ['JOMVU KUU', 'MIRITINI', 'MIKINDANI']
                    ],
                    [
                        'name' => 'KISAUNI',
                        'wards' => ['MJAMBERE', 'JUNDA', 'BAMBURI', 'MWAKIRUNGE', 'MTOPANGA', 'MAGOGONI', 'SHANZU']
                    ],
                    [
                        'name' => 'NYALI',
                        'wards' => ['FRERE TOWN', 'ZIWA LA NG\'OMBE', 'MKOMANI', 'KONGOWEA', 'KADZANDANI']
                    ],
                    [
                        'name' => 'LIKONI',
                        'wards' => ['MTONGWE', 'SHIKA ADABU', 'BOFU', 'LIKONI', 'TIMBWANI']
                    ],
                    [
                        'name' => 'MVITA',
                        'wards' => ['MJI WA KALE/MAKADARA', 'TUDOR', 'TONONOKA', 'SHIMANZI/GANJONI', 'MAJENGO']
                    ],
                ]
            ],
            [
                'name' => 'KWALE',
                'constituencies' => [
                    [
                        'name' => 'MSAMBWENI',
                        'wards' => ['GOMBATO BONGWE', 'UKUNDA', 'KINONDO', 'RAMISI']
                    ],
                    [
                        'name' => 'LUNGALUNGA',
                        'wards' => ['PONGWE/KIKONENI', 'DZOMBO', 'MWERENI 2,040', 'VANGA']
                    ],
                    [
                        'name' => 'MATUGA',
                        'wards' => ['TSIMBA GOLINI', 'WAA', 'TIWI', 'KUBO SOUTH', 'MKONGANI']
                    ],
                    [
                        'name' => 'KINANGO',
                        'wards' => ['NDAVAYA', 'PUMA', 'KINANGO', 'MACKINNON ROAD 1,106', 'CHENGONI/SAMBURU', 'MWAVUMBO', 'KASEMENI']
                    ],
                ]
            ],
            [
                'name' => 'KILIFI',
                'constituencies' => [
                    [
                        'name' => 'KILIFI NORTH',
                        'wards' => ['TEZO', 'SOKONI', 'KIBARANI', 'DABASO', 'MATSANGONI', 'WATAMU', 'MNARANI']
                    ],
                    [
                        'name' => 'KILIFI SOUTH',
                        'wards' => ['JUNJU', 'MWARAKAYA', 'SHIMO LA TEWA', 'CHASIMBA', 'MTEPENI']
                    ],
                    [
                        'name' => 'KALOLENI',
                        'wards' => ['MARIAKANI', 'KAYAFUNGO', 'KALOLENI', 'MWANAMWINGA']
                    ],
                    [
                        'name' => 'RABAI',
                        'wards' => ['MWAWESA', 'RURUMA', 'KAMBE/RIBE', 'RABAI/KISURUTINI']
                    ],
                    [
                        'name' => 'GANZE',
                        'wards' => ['GANZE', 'BAMBA 1,533', 'JARIBUNI', 'SOKOKE']
                    ],
                    [
                        'name' => 'MALINDI',
                        'wards' => ['JILORE', 'KAKUYUNI', 'GANDA', 'MALINDI TOWN', 'SHELLA']
                    ],
                    [
                        'name' => 'MAGARINI',
                        'wards' => ['MARAFA', 'MAGARINI', 'GONGONI', 'ADU 5,427', 'GARASHI', 'SABAKI']
                    ],
                ]
            ],
            [
                'name' => 'TANA RIVER',
                'constituencies' => [
                    [
                        'name' => 'GARSEN',
                        'wards' => ['KIPINI EAST', 'GARSEN SOUTH', 'KIPINI WEST', 'GARSEN CENTRAL', 'GARSEN WEST 9,159', 'GARSEN NORTH 1,586']
                    ],
                    [
                        'name' => 'GALOLE',
                        'wards' => ['KINAKOMBA 1,224', 'MIKINDUNI', 'CHEWANI', 'WAYU 7,606']
                    ],
                    [
                        'name' => 'BURA',
                        'wards' => ['CHEWELE 2,300', 'HIRIMANI 3,073', 'BANGALE 5,269', 'SALA', 'MADOGO 1,880']
                    ],
                ]
            ],
            [
                'name' => 'LAMU',
                'constituencies' => [
                    [
                        'name' => 'LAMU EAST',
                        'wards' => ['FAZA', 'KIUNGA', 'BASUBA 1,709']
                    ],
                    [
                        'name' => 'LAMU WEST',
                        'wards' => ['SHELLA', 'MKOMANI', 'HINDI 1,151', 'MKUNUMBI 1,429', 'HONGWE', 'WITU', 'BAHARI']
                    ],
                ]
            ],
            [
                'name' => 'TAITA TAVETA',
                'constituencies' => [
                    [
                        'name' => 'TAVETA',
                        'wards' => ['CHALA', 'MAHOO', 'BOMANI', 'MBOGHONI', 'MATA 3,064']
                    ],
                    [
                        'name' => 'WUNDANYI',
                        'wards' => ['WUNDANYI/MBALE', 'WERUGHA', 'WUMINGU/KISHUSHE', 'MWANDA/MGANGE']
                    ],
                    [
                        'name' => 'MWATATE',
                        'wards' => ['RONG\'E', 'MWATATE', 'BURA 8,701', 'CHAWIA', 'WUSI/KISHAMBA']
                    ],
                    [
                        'name' => 'VOI',
                        'wards' => ['MBOLOLO 4,220', 'SAGALLA', 'KALOLENI', 'MARUNGU', 'KASIGAU 1,654', 'NGOLIA 3,885']
                    ],
                ]
            ],
            [
                'name' => 'GARISSA',
                'constituencies' => [
                    [
                        'name' => 'GARISSA TOWNSHIP',
                        'wards' => ['WABERI', 'GALBET', 'TOWNSHIP', 'IFTIN']
                    ],
                    [
                        'name' => 'BALAMBALA',
                        'wards' => ['BALAMBALA 1,631', 'DANYERE 1,140', 'JARA JARA', 'SAKA', 'SANKURI 1,104']
                    ],
                    [
                        'name' => 'LAGDERA',
                        'wards' => ['MODOGASHE 1,191', 'BENANE', 'GOREALE 1,468', 'MAALIMIN 1,322', 'SABENA', 'BARAKI 1,357']
                    ],
                    [
                        'name' => 'DADAAB',
                        'wards' => ['DERTU 1,596', 'DADAAB', 'LABASIGALE', 'DAMAJALE 2,144', 'LIBOI 1,180', 'ABAKAILE 1,384']
                    ],
                    [
                        'name' => 'FAFI',
                        'wards' => ['BURA 3,724', 'DEKAHARIA 1,347', 'JARAJILA 3,269', 'FAFI 5,607', 'NANIGHI 1,523']
                    ],
                    [
                        'name' => 'IJARA',
                        'wards' => ['HULUGHO 3,729', 'SANGAILU 2,218', 'IJARA 2,052', 'MASALANI 1,522']
                    ],
                ]
            ],
            [
                'name' => 'WAJIR',
                'constituencies' => [
                    [
                        'name' => 'WAJIR NORTH',
                        'wards' => ['GURAR', 'BUTE', 'KORONDILE 2,038', 'MALKAGUFU', 'BATALU 1,971', 'DANABA 1,766', 'GODOMA']
                    ],
                    [
                        'name' => 'WAJIR EAST',
                        'wards' => ['WAGBERI', 'TOWNSHIP', 'BARWAGO', 'KHOROF/HARAR 3,869']
                    ],
                    [
                        'name' => 'TARBAJ',
                        'wards' => ['ELBEN 2,185', 'SARMAN 2,690', 'TARBAJ 2,252', 'WARGADUD 1,719']
                    ],
                    [
                        'name' => 'WAJIR WEST',
                        'wards' => ['ARBAJAHAN 3,064', 'HADADO/ATHIBOHOL 2,853', 'ADAMASAJIDE 1,017', 'GANYURE/WAGALLA 2,076']
                    ],
                    [
                        'name' => 'ELDAS',
                        'wards' => ['ELDAS', 'DELLA', 'LAKOLEY SOUTH/BASIR 1,292', 'ELNUR/TULA TULA 1,310']
                    ],
                    [
                        'name' => 'WAJIR SOUTH',
                        'wards' => ['BENANE 6,120', 'BURDER 2,779', 'DADAJA BULLA 1,064', 'HABASSWEIN 2,610', 'LAGBOGHOL SOUTH 3,661', 'IBRAHIM URE 2,745', 'DIIF 2,618']
                    ],
                ]
            ],
            [
                'name' => 'MANDERA',
                'constituencies' => [
                    [
                        'name' => 'MANDERA WEST',
                        'wards' => ['TAKABA SOUTH 1,725', 'TAKABA', 'LAGSURE', 'DANDU', 'GITHER']
                    ],
                    [
                        'name' => 'BANISSA',
                        'wards' => ['BANISSA', 'DERKHALE', 'GUBA', 'MALKAMARI 1,304', 'KILIWEHIRI']
                    ],
                    [
                        'name' => 'MANDERA NORTH',
                        'wards' => ['ASHABITO 1,372', 'GUTICHA 3,083', 'MOROTHILE', 'RHAMU', 'RHAMU-DIMTU']
                    ],
                    [
                        'name' => 'MANDERA SOUTH',
                        'wards' => ['WARGADUD', 'KUTULO 2,470', 'ELWAK SOUTH', 'ELWAK NORTH', 'SHIMBIR FATUMA 1,737']
                    ],
                    [
                        'name' => 'MANDERA EAST',
                        'wards' => ['ARABIA 1,238', 'TOWNSHIP', 'NEBOI', 'KHALALIO', 'LIBEHIA']
                    ],
                    [
                        'name' => 'LAFEY',
                        'wards' => ['SALA 1,577', 'FINO', 'LAFEY', 'WARANQARA', 'ALUNGO']
                    ],
                ]
            ],
            [
                'name' => 'MARSABIT',
                'constituencies' => [
                    [
                        'name' => 'MOYALE',
                        'wards' => ['BUTIYE', 'SOLOLO', 'HEILLU/MANYATTA', 'GOLBO 2,374', 'MOYALE TOWNSHIP', 'URAN 3,227', 'OBBU 3,247']
                    ],
                    [
                        'name' => 'NORTH HORR',
                        'wards' => ['DUKANA 6,798', 'MAIKONA 9,868', 'TURBI 10,821', 'NORTH HORR 7,723', 'ILLERET 4,042']
                    ],
                    [
                        'name' => 'SAKU',
                        'wards' => ['SAGANTE/JALDESA', 'KARARE', 'MARSABIT CENTRAL']
                    ],
                    [
                        'name' => 'LAISAMIS',
                        'wards' => ['LOIYANGALANI 4,203', 'KARGI/SOUTH HORR 7,528', 'KORR/NGURUNIT 2,781', 'LOGO LOGO 1,894', 'LAISAMIS 3,885']
                    ],
                ]
            ],
            [
                'name' => 'ISIOLO',
                'constituencies' => [
                    [
                        'name' => 'ISIOLO NORTH',
                        'wards' => ['WABERA', 'BULLA PESA', 'CHARI 3,761', 'CHERAB 8,862', 'NGARE MARA', 'BURAT', 'OLDO/NYIRO 1,161']
                    ],
                    [
                        'name' => 'ISIOLO SOUTH',
                        'wards' => ['GARBATULLA 3,821', 'KINNA 2,181', 'SERICHO 3,816']
                    ],
                ]
            ],
            [
                'name' => 'MERU',
                'constituencies' => [
                    [
                        'name' => 'IGEMBE SOUTH',
                        'wards' => ['MAUA', 'KIEGOI/ANTUBOCHIU', 'ATHIRU GAITI', 'AKACHIU', 'KANUNI']
                    ],
                    [
                        'name' => 'IGEMBE CENTRAL',
                        'wards' => ['AKIRANG\'ONDU', 'ATHIRU RUUJINE', 'IGEMBE EAST', 'NJIA', 'KANGETA']
                    ],
                    [
                        'name' => 'IGEMBE NORTH',
                        'wards' => ['ANTUAMBUI', 'NTUNENE', 'ANTUBETWE KIONGO', 'NAATHU', 'AMWATHI']
                    ],
                    [
                        'name' => 'TIGANIA WEST',
                        'wards' => ['ATHWANA', 'AKITHII', 'KIANJAI', 'NKOMO', 'MBEU']
                    ],
                    [
                        'name' => 'TIGANIA EAST',
                        'wards' => ['THANGATHA', 'MIKINDURI', 'KIGUCHWA', 'MUTHARA', 'KARAMA']
                    ],
                    [
                        'name' => 'NORTH IMENTI',
                        'wards' => ['MUNICIPALITY', 'NTIMA EAST', 'NTIMA WEST', 'NYAKI WEST', 'NYAKI EAST']
                    ],
                    [
                        'name' => 'BUURI',
                        'wards' => ['TIMAU', 'KISIMA', 'KIIRUA/NAARI', 'RUIRI/RWARERA', 'KIBIRICHIA']
                    ],
                    [
                        'name' => 'CENTRAL IMENTI',
                        'wards' => ['MWANGANTHIA', 'ABOTHUGUCHI CENTRAL', 'ABOTHUGUCHI WEST', 'KIAGU']
                    ],
                    [
                        'name' => 'SOUTH IMENTI',
                        'wards' => ['MITUNGUU', 'IGOJI EAST', 'IGOJI WEST', 'ABOGETA EAST', 'ABOGETA WEST', 'NKUENE']
                    ],
                ]
            ],
            [
                'name' => 'THARAKA - NITHI',
                'constituencies' => [
                    [
                        'name' => 'MAARA',
                        'wards' => ['MITHERU', 'MUTHAMBI', 'MWIMBI', 'GANGA', 'CHOGORIA']
                    ],
                    [
                        'name' => 'CHUKA/IGAMBANG\'OMBE',
                        'wards' => ['MARIANI', 'KARINGANI', 'MAGUMONI', 'MUGWE', 'IGAMBANG\'OMBE']
                    ],
                    [
                        'name' => 'THARAKA',
                        'wards' => ['GATUNGA', 'MUKOTHIMA', 'NKONDI', 'CHIAKARIGA', 'MARIMANTI']
                    ],
                ]
            ],
            [
                'name' => 'EMBU',
                'constituencies' => [
                    [
                        'name' => 'MANYATTA',
                        'wards' => ['RUGURU/NGANDORI', 'KITHIMU', 'NGINDA', 'MBETI NORTH', 'KIRIMARI', 'GATURI SOUTH']
                    ],
                    [
                        'name' => 'RUNYENJES',
                        'wards' => ['GATURI NORTH', 'KAGAARI SOUTH', 'CENTRAL WARD', 'KAGAARI NORTH', 'KYENI NORTH', 'KYENI SOUTH']
                    ],
                    [
                        'name' => 'MBEERE SOUTH',
                        'wards' => ['MWEA', 'MAKIMA', 'MBETI SOUTH', 'MAVURIA', 'KIAMBERE']
                    ],
                    [
                        'name' => 'MBEERE NORTH',
                        'wards' => ['NTHAWA', 'MUMINJI', 'EVURORE']
                    ],
                ]
            ],
            [
                'name' => 'KITUI',
                'constituencies' => [
                    [
                        'name' => 'MWINGI NORTH',
                        'wards' => ['NGOMENI 1,619', 'KYUSO', 'MUMONI', 'TSEIKURU 1,328', 'THARAKA']
                    ],
                    [
                        'name' => 'MWINGI WEST',
                        'wards' => ['KYOME/THAANA', 'NGUUTANI', 'MIGWANI', 'KIOMO/KYETHANI']
                    ],
                    [
                        'name' => 'MWINGI CENTRAL',
                        'wards' => ['CENTRAL', 'KIVOU', 'NGUNI 1,759', 'NUU 1,324', 'MUI', 'WAITA']
                    ],
                    [
                        'name' => 'KITUI WEST',
                        'wards' => ['MUTONGUNI', 'KAUWI', 'MATINYANI', 'KWA MUTONGA/KITHUMULA']
                    ],
                    [
                        'name' => 'KITUI RURAL',
                        'wards' => ['KISASI', 'MBITINI', 'KWAVONZA/YATTA', 'KANYANGI']
                    ],
                    [
                        'name' => 'KITUI CENTRAL',
                        'wards' => ['MIAMBANI', 'TOWNSHIP', 'KYANGWITHYA WEST', 'MULANGO', 'KYANGWITHYA EAST']
                    ],
                    [
                        'name' => 'KITUI EAST',
                        'wards' => ['ZOMBE/MWITIKA', 'NZAMBANI', 'CHULUNI', 'VOO/KYAMATU 1,115', 'ENDAU/MALALANI 2,528', 'MUTITO/KALIKU']
                    ],
                    [
                        'name' => 'KITUI SOUTH',
                        'wards' => ['IKANGA/KYATUNE', 'MUTOMO', 'MUTHA 3,477', 'IKUTHA', 'KANZIKO', 'ATHI']
                    ],
                ]
            ],
            [
                'name' => 'MACHAKOS',
                'constituencies' => [
                    [
                        'name' => 'MASINGA',
                        'wards' => ['KIVAA', 'MASINGA CENTRAL', 'EKALAKALA', 'MUTHESYA', 'NDITHINI']
                    ],
                    [
                        'name' => 'YATTA',
                        'wards' => ['NDALANI', 'MATUU', 'KITHIMANI', 'IKOMBE', 'KATANGI']
                    ],
                    [
                        'name' => 'KANGUNDO',
                        'wards' => ['KANGUNDO NORTH', 'KANGUNDO CENTRAL', 'KANGUNDO EAST', 'KANGUNDO WEST']
                    ],
                    [
                        'name' => 'MATUNGULU',
                        'wards' => ['TALA', 'MATUNGULU NORTH', 'MATUNGULU EAST', 'MATUNGULU WEST', 'KYELENI']
                    ],
                    [
                        'name' => 'KATHIANI',
                        'wards' => ['MITABONI', 'KATHIANI CENTRAL', 'UPPER KAEWA/IVETI', 'LOWER KAEWA/KAANI']
                    ],
                    [
                        'name' => 'MAVOKO',
                        'wards' => ['ATHI RIVER', 'KINANIE', 'MUTHWANI', 'SYOKIMAU/MULOLONGO']
                    ],
                    [
                        'name' => 'MACHAKOS TOWN',
                        'wards' => ['KALAMA', 'MUA', 'MUTITUNI', 'MACHAKOS CENTRAL', 'MUMBUNI NORTH', 'MUVUTI/KIIMA-KIMWE', 'KOLA']
                    ],
                    [
                        'name' => 'MWALA',
                        'wards' => ['MBIUNI', 'MAKUTANO/ MWALA', 'MASII', 'MUTHETHENI', 'WAMUNYU', 'KIBAUNI']
                    ],
                ]
            ],
            [
                'name' => 'MAKUENI',
                'constituencies' => [
                    [
                        'name' => 'MBOONI',
                        'wards' => ['TULIMANI', 'MBOONI', 'KITHUNGO/KITUNDU', 'KITETA/KISAU', 'WAIA-KAKO', 'KALAWA']
                    ],
                    [
                        'name' => 'KILOME',
                        'wards' => ['KASIKEU', 'MUKAA', 'KIIMA KIU/KALANZONI']
                    ],
                    [
                        'name' => 'KAITI',
                        'wards' => ['UKIA', 'KEE', 'KILUNGU', 'ILIMA']
                    ],
                    [
                        'name' => 'MAKUENI',
                        'wards' => ['WOTE', 'MUVAU/KIKUUMINI', 'MAVINDINI', 'KITISE/KITHUKI', 'KATHONZWENI', 'NZAUI/KILILI/KALAMBA', 'MBITINI']
                    ],
                    [
                        'name' => 'KIBWEZI WEST',
                        'wards' => ['MAKINDU', 'NGUUMO', 'KIKUMBULYU NORTH', 'KIKUMBULYU SOUTH', 'NGUU/MASUMBA', 'EMALI/MULALA']
                    ],
                    [
                        'name' => 'KIBWEZI EAST',
                        'wards' => ['MASONGALENI', 'MTITO ANDEI', 'THANGE', 'IVINGONI/NZAMBANI']
                    ],
                ]
            ],
            [
                'name' => 'NYANDARUA',
                'constituencies' => [
                    [
                        'name' => 'KINANGOP',
                        'wards' => ['ENGINEER', 'GATHARA', 'NORTH KINANGOP', 'MURUNGARU', 'NJABINI\KIBURU', 'NYAKIO', 'GITHABAI', 'MAGUMU']
                    ],
                    [
                        'name' => 'KIPIPIRI',
                        'wards' => ['WANJOHI', 'KIPIPIRI', 'GETA', 'GITHIORO']
                    ],
                    [
                        'name' => 'OL KALOU',
                        'wards' => ['KARAU', 'KANJUIRI RANGE', 'MIRANGINE', 'KAIMBAGA', 'RURII']
                    ],
                    [
                        'name' => 'OL JOROK',
                        'wards' => ['GATHANJI', 'GATIMU', 'WERU', 'CHARAGITA']
                    ],
                    [
                        'name' => 'NDARAGWA',
                        'wards' => ['LESHAU/PONDO', 'KIRIITA', 'CENTRAL', 'SHAMATA']
                    ],
                ]
            ],
            [
                'name' => 'NYERI',
                'constituencies' => [
                    [
                        'name' => 'TETU',
                        'wards' => ['DEDAN KIMANTHI', 'WAMAGANA', 'AGUTHI-GAAKI']
                    ],
                    [
                        'name' => 'KIENI',
                        'wards' => ['MWEIGA', 'NAROMORU KIAMATHAGA', 'MWIYOGO/ENDARASHA', 'MUGUNDA', 'GATARAKWA', 'THEGU RIVER', 'KABARU', 'GAKAWA']
                    ],
                    [
                        'name' => 'MATHIRA',
                        'wards' => ['RUGURU', 'MAGUTU', 'IRIAINI', 'KONYU', 'KIRIMUKUYU', 'KARATINA TOWN']
                    ],
                    [
                        'name' => 'OTHAYA',
                        'wards' => ['MAHIGA', 'IRIA-INI', 'CHINGA', 'KARIMA']
                    ],
                    [
                        'name' => 'MUKURWEINI',
                        'wards' => ['GIKONDI', 'RUGI', 'MUKURWE-INI WEST', 'MUKURWE-INI CENTRAL']
                    ],
                    [
                        'name' => 'NYERI TOWN',
                        'wards' => ['KIGANJO/MATHARI', 'RWARE', 'GATITU/MURUGURU', 'RURING\'U', 'KAMAKWA/MUKARO']
                    ],
                ]
            ],
            [
                'name' => 'KIRINYAGA',
                'constituencies' => [
                    [
                        'name' => 'MWEA',
                        'wards' => ['MUTITHI', 'KANGAI', 'THIBA', 'WAMUMU', 'NYANGATI', 'MURINDUKO', 'GATHIGIRIRI', 'TEBERE']
                    ],
                    [
                        'name' => 'GICHUGU',
                        'wards' => ['KABARE', 'BARAGWI', 'NJUKIINI', 'NGARIAMA', 'KARUMANDI']
                    ],
                    [
                        'name' => 'NDIA',
                        'wards' => ['MUKURE', 'KIINE', 'KARITI']
                    ],
                    [
                        'name' => 'KIRINYAGA CENTRAL',
                        'wards' => ['MUTIRA', 'KANYEKINI', 'KERUGOYA', 'INOI']
                    ],
                ]
            ],
            [
                'name' => 'MURANG\'A',
                'constituencies' => [
                    [
                        'name' => 'KANGEMA',
                        'wards' => ['KANYENYA-INI', 'MUGURU', 'RWATHIA']
                    ],
                    [
                        'name' => 'MATHIOYA',
                        'wards' => ['GITUGI', 'KIRU', 'KAMACHARIA']
                    ],
                    [
                        'name' => 'KIHARU',
                        'wards' => ['WANGU', 'MUGOIRI', 'MBIRI', 'TOWNSHIP', 'MURARANDIA', 'GATURI']
                    ],
                    [
                        'name' => 'KIGUMO',
                        'wards' => ['KAHUMBU', 'MUTHITHI', 'KIGUMO', 'KANGARI', 'KINYONA']
                    ],
                    [
                        'name' => 'MARAGWA',
                        'wards' => ['KIMORORI/WEMPA', 'MAKUYU', 'KAMBITI', 'KAMAHUHA', 'ICHAGAKI', 'NGINDA']
                    ],
                    [
                        'name' => 'KANDARA',
                        'wards' => ['NG\'ARARIA', 'MURUKA', 'KAGUNDU-INI', 'GAICHANJIRU', 'ITHIRU', 'RUCHU']
                    ],
                    [
                        'name' => 'GATANGA',
                        'wards' => ['ITHANGA', 'KAKUZI/MITUBIRI', 'MUGUMO-INI', 'KIHUMBU-INI', 'GATANGA', 'KARIARA']
                    ],
                ]
            ],
            [
                'name' => 'KIAMBU',
                'constituencies' => [
                    [
                        'name' => 'GATUNDU SOUTH',
                        'wards' => ['KIAMWANGI', 'KIGANJO', 'NDARUGU', 'NGENDA']
                    ],
                    [
                        'name' => 'GATUNDU NORTH',
                        'wards' => ['GITUAMBA', 'GITHOBOKONI', 'CHANIA', 'MANG\'U']
                    ],
                    [
                        'name' => 'JUJA',
                        'wards' => ['MURERA', 'THETA', 'JUJA', 'WITEITHIE', 'KALIMONI']
                    ],
                    [
                        'name' => 'THIKA TOWN',
                        'wards' => ['TOWNSHIP', 'KAMENU', 'HOSPITAL', 'GATUANYAGA', 'NGOLIBA']
                    ],
                    [
                        'name' => 'RUIRU',
                        'wards' => ['GITOTHUA', 'BIASHARA', 'GATONGORA', 'KAHAWA SUKARI', 'KAHAWA WENDANI', 'KIUU', 'MWIKI', 'MWIHOKO']
                    ],
                    [
                        'name' => 'GITHUNGURI',
                        'wards' => ['GITHUNGURI', 'GITHIGA', 'IKINU', 'NGEWA', 'KOMOTHAI']
                    ],
                    [
                        'name' => 'KIAMBU',
                        'wards' => ['TING\'ANG\'A', 'NDUMBERI', 'RIABAI', 'TOWNSHIP']
                    ],
                    [
                        'name' => 'KIAMBAA',
                        'wards' => ['CIANDA', 'KARURI', 'NDENDERU', 'MUCHATHA', 'KIHARA']
                    ],
                    [
                        'name' => 'KABETE',
                        'wards' => ['GITARU', 'MUGUGA', 'NYADHUNA', 'KABETE', 'UTHIRU']
                    ],
                    [
                        'name' => 'KIKUYU',
                        'wards' => ['KARAI', 'NACHU', 'SIGONA', 'KIKUYU', 'KINOO']
                    ],
                    [
                        'name' => 'LIMURU',
                        'wards' => ['BIBIRIONI', 'LIMURU CENTRAL', 'NDEIYA', 'LIMURU EAST', 'NGECHA TIGONI']
                    ],
                    [
                        'name' => 'LARI',
                        'wards' => ['KINALE', 'KIJABE', 'NYANDUMA', 'KAMBURU', 'LARI/KIRENGA']
                    ],
                ]
            ],
            [
                'name' => 'TURKANA',
                'constituencies' => [
                    [
                        'name' => 'TURKANA NORTH',
                        'wards' => ['KAERIS 4,082', 'LAKE ZONE 1,909', 'LAPUR 3,241', 'KAALENG/KAIKOR 3,834', 'KIBISH 5,087', 'NAKALALE 1,867']
                    ],
                    [
                        'name' => 'TURKANA WEST',
                        'wards' => ['KAKUMA 1,577', 'LOPUR 1,992', 'LETEA 2,909', 'SONGOT 2,365', 'KALOBEYEI 1,600', 'LOKICHOGGIO 1,482', 'NANAAM 3,520']
                    ],
                    [
                        'name' => 'TURKANA CENTRAL',
                        'wards' => ['KERIO DELTA 1,935', 'KANG\'ATOTHA 1,005', 'KALOKOL 1,135', 'LODWAR TOWNSHIP', 'KANAMKEMER']
                    ],
                    [
                        'name' => 'LOIMA',
                        'wards' => ['KOTARUK/LOBEI 1,139', 'TURKWEL 3,518', 'LOIMA 2,119', 'LOKIRIAMA/LORENGIPPI 1,000']
                    ],
                    [
                        'name' => 'TURKANA SOUTH',
                        'wards' => ['KAPUTIR', 'KATILU 1,143', 'LOBOKAT 1,002', 'KALAPATA 1,984', 'LOKICHAR 2,899']
                    ],
                    [
                        'name' => 'TURKANA EAST',
                        'wards' => ['KAPEDO/NAPEITOM 4,216', 'KATILIA 3,338', 'LOKORI/KOCHODIN 8,186']
                    ],
                ]
            ],
            [
                'name' => 'WEST POKOT',
                'constituencies' => [
                    [
                        'name' => 'KAPENGURIA',
                        'wards' => ['RIWO', 'KAPENGURIA', 'MNAGEI', 'SIYOI', 'ENDUGH', 'SOOK']
                    ],
                    [
                        'name' => 'SIGOR',
                        'wards' => ['SEKERR', 'MASOOL', 'LOMUT', 'WEIWEI']
                    ],
                    [
                        'name' => 'KACHELIBA',
                        'wards' => ['SUAM', 'KODICH', 'KASEI', 'KAPCHOK', 'KIWAWA', 'ALALE 1,020']
                    ],
                    [
                        'name' => 'POKOT SOUTH',
                        'wards' => ['CHEPARERIA', 'BATEI', 'LELAN', 'TAPACH']
                    ],
                ]
            ],
            [
                'name' => 'SAMBURU',
                'constituencies' => [
                    [
                        'name' => 'SAMBURU WEST',
                        'wards' => ['LODOKEJEK', 'SUGUTA MARMAR', 'MARALAL', 'LOOSUK', 'PORO']
                    ],
                    [
                        'name' => 'SAMBURU NORTH',
                        'wards' => ['EL-BARTA 1,022', 'NACHOLA 2,179', 'NDOTO 1,777', 'NYIRO 1,689', 'ANGATA NANYOKIE', 'BAAWA']
                    ],
                    [
                        'name' => 'SAMBURU EAST',
                        'wards' => ['WASO 4,950', 'WAMBA WEST', 'WAMBA EAST 1,468', 'WAMBA NORTH 2,294']
                    ],
                ]
            ],
            [
                'name' => 'TRANS NZOIA',
                'constituencies' => [
                    [
                        'name' => 'KWANZA',
                        'wards' => ['KAPOMBOI', 'KWANZA', 'KEIYO', 'BIDII']
                    ],
                    [
                        'name' => 'ENDEBESS',
                        'wards' => ['CHEPCHOINA', 'ENDEBESS', 'MATUMBEI']
                    ],
                    [
                        'name' => 'SABOTI',
                        'wards' => ['KINYORO', 'MATISI', 'TUWANI', 'SABOTI', 'MACHEWA']
                    ],
                    [
                        'name' => 'KIMININI',
                        'wards' => ['KIMININI', 'WAITALUK', 'SIRENDE', 'HOSPITAL', 'SIKHENDU', 'NABISWA']
                    ],
                    [
                        'name' => 'CHERANGANY',
                        'wards' => ['SINYERERE', 'MAKUTANO', 'KAPLAMAI', 'MOTOSIET', 'CHERANGANY/SUWERWA', 'CHEPSIRO/KIPTOROR', 'SITATUNGA']
                    ],
                ]
            ],
            [
                'name' => 'UASIN GISHU',
                'constituencies' => [
                    [
                        'name' => 'SOY',
                        'wards' => ['MOI\'S BRIDGE', 'KAPKURES', 'ZIWA', 'SEGERO/BARSOMBE', 'KIPSOMBA', 'SOY', 'KUINET/KAPSUSWA']
                    ],
                    [
                        'name' => 'TURBO',
                        'wards' => ['NGENYILEL', 'TAPSAGOI', 'KAMAGUT', 'KIPLOMBE', 'KAPSAOS', 'HURUMA']
                    ],
                    [
                        'name' => 'MOIBEN',
                        'wards' => ['TEMBELIO', 'SERGOIT', 'KARUNA/MEIBEKI', 'MOIBEN', 'KIMUMU']
                    ],
                    [
                        'name' => 'AINABKOI',
                        'wards' => ['KAPSOYA', 'KAPTAGAT', 'AINABKOI/OLARE']
                    ],
                    [
                        'name' => 'KAPSERET',
                        'wards' => ['SIMAT/KAPSERET', 'KIPKENYO', 'NGERIA', 'MEGUN', 'LANGAS']
                    ],
                    [
                        'name' => 'KESSES',
                        'wards' => ['RACECOURSE', 'CHEPTIRET/KIPCHAMO', 'TULWET/CHUIYAT', 'TARAKWA']
                    ],
                ]
            ],
            [
                'name' => 'ELGEYO/MARAKWET',
                'constituencies' => [
                    [
                        'name' => 'MARAKWET EAST',
                        'wards' => ['KAPYEGO', 'SAMBIRIR', 'ENDO', 'EMBOBUT / EMBULOT']
                    ],
                    [
                        'name' => 'MARAKWET WEST',
                        'wards' => ['LELAN', 'SENGWER', 'CHERANG\'ANY/CHEBORORWA', 'MOIBEN/KUSERWO', 'KAPSOWAR', 'ARROR']
                    ],
                    [
                        'name' => 'KEIYO NORTH',
                        'wards' => ['EMSOO', 'KAMARINY', 'KAPCHEMUTWA', 'TAMBACH']
                    ],
                    [
                        'name' => 'KEIYO SOUTH',
                        'wards' => ['KAPTARAKWA', 'CHEPKORIO', 'SOY NORTH', 'SOY SOUTH', 'KABIEMIT', 'METKEI']
                    ],
                ]
            ],
            [
                'name' => 'NANDI',
                'constituencies' => [
                    [
                        'name' => 'TINDERET',
                        'wards' => ['SONGHOR/SOBA', 'TINDIRET', 'CHEMELIL/CHEMASE', 'KAPSIMOTWO']
                    ],
                    [
                        'name' => 'ALDAI',
                        'wards' => ['KABWARENG', 'TERIK', 'KEMELOI-MARABA', 'KOBUJOI', 'KAPTUMO-KABOI', 'KOYO-NDURIO']
                    ],
                    [
                        'name' => 'NANDI HILLS',
                        'wards' => ['NANDI HILLS', 'CHEPKUNYUK', 'OL\'LESSOS', 'KAPCHORUA']
                    ],
                    [
                        'name' => 'CHESUMEI',
                        'wards' => ['CHEMUNDU/KAPNG\'ETUNY', 'KOSIRAI', 'LELMOKWO/NGECHEK', 'KAPTEL/KAMOIYWO', 'KIPTUYA']
                    ],
                    [
                        'name' => 'EMGWEN',
                        'wards' => ['CHEPKUMIA', 'KAPKANGANI', 'KAPSABET', 'KILIBWONI']
                    ],
                    [
                        'name' => 'MOSOP',
                        'wards' => ['CHEPTERWAI', 'KIPKAREN', 'KURGUNG/SURUNGAI', 'KABIYET', 'NDALAT', 'KABISAGA', 'SANGALO/KEBULONIK']
                    ],
                ]
            ],
            [
                'name' => 'BARINGO',
                'constituencies' => [
                    [
                        'name' => 'TIATY',
                        'wards' => ['TIRIOKO 1,103', 'KOLOWA', 'RIBKWO', 'SILALE', 'LOIYAMOROCK', 'TANGULBEI/KOROSSI', 'CHURO/AMAYA']
                    ],
                    [
                        'name' => 'BARINGO NORTH',
                        'wards' => ['BARWESSA', 'KABARTONJO', 'SAIMO/KIPSARAMAN', 'SAIMO/SOI', 'BARTABWA']
                    ],
                    [
                        'name' => 'BARINGO CENTRAL',
                        'wards' => ['KABARNET', 'SACHO', 'TENGES', 'EWALEL/CHAPCHAP', 'KAPROPITA']
                    ],
                    [
                        'name' => 'BARINGO SOUTH',
                        'wards' => ['MARIGAT', 'ILCHAMUS', 'MOCHONGOI', 'MUKUTANI']
                    ],
                    [
                        'name' => 'MOGOTIO',
                        'wards' => ['MOGOTIO', 'EMINING', 'KISANANA']
                    ],
                    [
                        'name' => 'ELDAMA RAVINE',
                        'wards' => ['LEMBUS', 'LEMBUS KWEN', 'RAVINE', 'MUMBERES/MAJI MAZURI', 'LEMBUS/PERKERRA', 'KOIBATEK']
                    ],
                ]
            ],
            [
                'name' => 'LAIKIPIA',
                'constituencies' => [
                    [
                        'name' => 'LAIKIPIA WEST',
                        'wards' => ['OL-MORAN', 'RUMURUTI TOWNSHIP', 'GITHIGA', 'MARMANET', 'IGWAMITI', 'SALAMA']
                    ],
                    [
                        'name' => 'LAIKIPIA EAST',
                        'wards' => ['NGOBIT', 'TIGITHI', 'THINGITHU', 'NANYUKI', 'UMANDE']
                    ],
                    [
                        'name' => 'LAIKIPIA NORTH',
                        'wards' => ['SOSIAN 1,726', 'SEGERA 1,380', 'MUGOGODO WEST', 'MUGOGODO EAST']
                    ],
                ]
            ],
            [
                'name' => 'NAKURU',
                'constituencies' => [
                    [
                        'name' => 'MOLO',
                        'wards' => ['MARIASHONI', 'ELBURGON', 'TURI', 'MOLO']
                    ],
                    [
                        'name' => 'NJORO',
                        'wards' => ['MAU NAROK', 'MAUCHE', 'KIHINGO', 'NESSUIT', 'LARE', 'NJORO']
                    ],
                    [
                        'name' => 'NAIVASHA',
                        'wards' => ['BIASHARA', 'HELLS GATE', 'LAKE VIEW', 'MAI MAHIU', 'MAIELLA', 'OLKARIA', 'NAIVASHA EAST', 'VIWANDANI']
                    ],
                    [
                        'name' => 'GILGIL',
                        'wards' => ['GILGIL', 'ELEMENTAITA', 'MBARUK/EBURU', 'MALEWA WEST', 'MURINDATI']
                    ],
                    [
                        'name' => 'KURESOI SOUTH',
                        'wards' => ['AMALO', 'KERINGET', 'KIPTAGICH', 'TINET']
                    ],
                    [
                        'name' => 'KURESOI NORTH',
                        'wards' => ['KIPTORORO', 'NYOTA', 'SIRIKWA', 'KAMARA']
                    ],
                    [
                        'name' => 'SUBUKIA',
                        'wards' => ['SUBUKIA', 'WASEGES', 'KABAZI']
                    ],
                    [
                        'name' => 'RONGAI',
                        'wards' => ['MENENGAI WEST', 'SOIN', 'VISOI', 'MOSOP', 'SOLAI']
                    ],
                    [
                        'name' => 'BAHATI',
                        'wards' => ['DUNDORI', 'KABATINI', 'KIAMAINA', 'LANET/UMOJA', 'BAHATI']
                    ],
                    [
                        'name' => 'NAKURU TOWN WEST',
                        'wards' => ['BARUT', 'LONDON', 'KAPTEMBWO', 'KAPKURES', 'RHODA', 'SHAABAB']
                    ],
                    [
                        'name' => 'NAKURU TOWN EAST',
                        'wards' => ['BIASHARA', 'KIVUMBINI', 'FLAMINGO', 'MENENGAI', 'NAKURU EAST']
                    ],
                ]
            ],
            [
                'name' => 'NAROK',
                'constituencies' => [
                    [
                        'name' => 'KILGORIS',
                        'wards' => ['KILGORIS CENTRAL', 'KEYIAN', 'ANGATA BARIKOI', 'SHANKOE', 'KIMINTET', 'LOLGORIAN']
                    ],
                    [
                        'name' => 'EMURUA DIKIRR',
                        'wards' => ['ILKERIN', 'OLOlMASANI', 'MOGONDO', 'KAPSASIAN']
                    ],
                    [
                        'name' => 'NAROK NORTH',
                        'wards' => ['OLPUSIMORU', 'OLOKURTO', 'NAROK TOWN', 'NKARETA', 'OLORROPIL', 'MELILI']
                    ],
                    [
                        'name' => 'NAROK EAST',
                        'wards' => ['MOSIRO', 'ILDAMAT', 'KEEKONYOKIE', 'SUSWA']
                    ],
                    [
                        'name' => 'NAROK SOUTH',
                        'wards' => ['MAJIMOTO/NAROOSURA 2,139', 'OLOLULUNG\'A', 'MELELO', 'LOITA 1,676', 'SOGOO', 'SAGAMIAN']
                    ],
                    [
                        'name' => 'NAROK WEST',
                        'wards' => ['ILMOTIOK', 'MARA 1,318', 'SIANA 2,803', 'NAIKARRA 1,053']
                    ],
                ]
            ],
            [
                'name' => 'KAJIADO',
                'constituencies' => [
                    [
                        'name' => 'KAJIADO NORTH',
                        'wards' => ['OLKERI', 'ONGATA RONGAI', 'NKAIMURUNYA', 'OLOOLUA', 'NGONG']
                    ],
                    [
                        'name' => 'KAJIADO CENTRAL',
                        'wards' => ['PURKO', 'ILDAMAT', 'DALALEKUTUK', 'MATAPATO NORTH 1,660', 'MATAPATO SOUTH 1,311']
                    ],
                    [
                        'name' => 'KAJIADO EAST',
                        'wards' => ['KAPUTIEI NORTH', 'KITENGELA', 'OLOOSIRKON/SHOLINKE', 'KENYAWA-POKA 1,340', 'IMARORO']
                    ],
                    [
                        'name' => 'KAJIADO WEST',
                        'wards' => ['KEEKONYOKIE', 'ILOODOKILANI 2,011', 'MAGADI 3,086', 'EWUASO OoNKIDONG\'I 2,007', 'MOSIRO']
                    ],
                    [
                        'name' => 'KAJIADO SOUTH',
                        'wards' => ['ENTONET/LENKISIM 2,322', 'MBIRIKANI/ESELENKEI 1,923', 'KUKU 1,280', 'ROMBO', 'KIMANA']
                    ],
                ]
            ],
            [
                'name' => 'KERICHO',
                'constituencies' => [
                    [
                        'name' => 'KIPKELION EAST',
                        'wards' => ['LONDIANI', 'KEDOWA/KIMUGUL', 'CHEPSEON', 'TENDENO/SORGET']
                    ],
                    [
                        'name' => 'KIPKELION WEST',
                        'wards' => ['KUNYAK', 'KAMASIAN', 'KIPKELION', 'CHILCHILA']
                    ],
                    [
                        'name' => 'AINAMOI',
                        'wards' => ['KAPSOIT', 'AINAMOI', 'KAPKUGERWET', 'KIPCHEBOR', 'KIPCHIMCHIM', 'KAPSAOS']
                    ],
                    [
                        'name' => 'BURETI',
                        'wards' => ['KISIARA', 'TEBESONIK', 'CHEBOIN', 'CHEMOSOT', 'LITEIN', 'CHEPLANGET', 'KAPKATET']
                    ],
                    [
                        'name' => 'BELGUT',
                        'wards' => ['WALDAI', 'KABIANGA', 'CHEPTORORIET/SERETUT', 'CHAIK', 'KAPSUSER']
                    ],
                    [
                        'name' => 'SIGOWET/SOIN',
                        'wards' => ['SIGOWET', 'KAPLELARTET', 'SOLIAT', 'SOIN']
                    ],
                ]
            ],
            [
                'name' => 'BOMET',
                'constituencies' => [
                    [
                        'name' => 'SOTIK',
                        'wards' => ['NDANAI/ABOSI', 'CHEMAGEL', 'KIPSONOI', 'KAPLETUNDO', 'RONGENA/MANARET']
                    ],
                    [
                        'name' => 'CHEPALUNGU',
                        'wards' => ['KONG\'ASIS', 'NYANGORES', 'SIGOR', 'CHEBUNYO', 'SIONGIROI']
                    ],
                    [
                        'name' => 'BOMET EAST',
                        'wards' => ['MERIGI', 'KEMBU', 'LONGISA', 'KIPRERES', 'CHEMANER']
                    ],
                    [
                        'name' => 'BOMET CENTRAL',
                        'wards' => ['SILIBWET TOWNSHIP', 'NDARAWETA', 'SINGORWET', 'CHESOEN', 'MUTARAKWA']
                    ],
                    [
                        'name' => 'KONOIN',
                        'wards' => ['CHEPCHABAS', 'KIMULOT', 'MOGOGOSIEK', 'BOITO', 'EMBOMOS']
                    ],
                ]
            ],
            [
                'name' => 'KAKAMEGA',
                'constituencies' => [
                    [
                        'name' => 'LUGARI',
                        'wards' => ['MAUTUMA', 'LUGARI', 'LUMAKANDA', 'CHEKALINI', 'CHEVAYWA', 'LWANDETI']
                    ],
                    [
                        'name' => 'LIKUYANI',
                        'wards' => ['LIKUYANI', 'SANGO', 'KONGONI', 'NZOIA', 'SINOKO']
                    ],
                    [
                        'name' => 'MALAVA',
                        'wards' => ['WEST KABRAS', 'CHEMUCHE', 'EAST KABRAS', 'BUTALI/CHEGULO', 'MANDA-SHIVANGA', 'SHIRUGU-MUGAI', 'SOUTH KABRAS']
                    ],
                    [
                        'name' => 'LURAMBI',
                        'wards' => ['BUTSOTSO EAST', 'BUTSOTSO SOUTH', 'BUTSOTSO CENTRAL', 'SHEYWE', 'MAHIAKALO', 'SHIRERE']
                    ],
                    [
                        'name' => 'NAVAKHOLO',
                        'wards' => ['INGOSTSE-MATHIA', 'SHINOYI-SHIKOMARI-ESUMEYIA', 'BUNYALA WEST', 'BUNYALA EAST', 'BUNYALA CENTRAL']
                    ],
                    [
                        'name' => 'MUMIAS WEST',
                        'wards' => ['MUMIAS CENTRAL', 'MUMIAS NORTH', 'ETENJE', 'MUSANDA']
                    ],
                    [
                        'name' => 'MUMIAS EAST',
                        'wards' => ['LUSHEYA/LUBINU', 'MALAHA/ISONGO/MAKUNGA', 'EAST WANGA']
                    ],
                    [
                        'name' => 'MATUNGU',
                        'wards' => ['KOYONZO', 'KHOLERA', 'KHALABA', 'MAYONI', 'NAMAMALI']
                    ],
                    [
                        'name' => 'BUTERE',
                        'wards' => ['MARAMA WEST', 'MARAMA CENTRAL', 'MARENYO - SHIANDA', 'MARAMA NORTH', 'MARAMA SOUTH']
                    ],
                    [
                        'name' => 'KHWISERO',
                        'wards' => ['KISA NORTH', 'KISA EAST', 'KISA WEST', 'KISA CENTRAL']
                    ],
                    [
                        'name' => 'SHINYALU',
                        'wards' => ['ISUKHA NORTH', 'MURHANDA', 'ISUKHA CENTRAL', 'ISUKHA SOUTH', 'ISUKHA EAST', 'ISUKHA WEST']
                    ],
                    [
                        'name' => 'IKOLOMANI',
                        'wards' => ['IDAKHO SOUTH', 'IDAKHO EAST', 'IDAKHO NORTH', 'IDAKHO CENTRAL']
                    ],
                ]
            ],
            [
                'name' => 'VIHIGA',
                'constituencies' => [
                    [
                        'name' => 'VIHIGA',
                        'wards' => ['LUGAGA-WAMULUMA', 'SOUTH MARAGOLI', 'CENTRAL MARAGOLI', 'MUNGOMA']
                    ],
                    [
                        'name' => 'SABATIA',
                        'wards' => ['LYADUYWA/IZAVA', 'WEST SABATIA', 'CHAVAKALI', 'NORTH MARAGOLI', 'WODANGA', 'BUSALI']
                    ],
                    [
                        'name' => 'HAMISI',
                        'wards' => ['SHIRU', 'GISAMBAI', 'SHAMAKHOKHO', 'BANJA', 'MUHUDU', 'TAMBUA', 'JEPKOYAI']
                    ],
                    [
                        'name' => 'LUANDA',
                        'wards' => ['LUANDA TOWNSHIP', 'WEMILABI', 'MWIBONA', 'LUANDA SOUTH', 'EMABUNGO']
                    ],
                    [
                        'name' => 'EMUHAYA',
                        'wards' => ['NORTH EAST BUNYORE', 'CENTRAL BUNYORE', 'WEST BUNYORE']
                    ],
                ]
            ],
            [
                'name' => 'BUNGOMA',
                'constituencies' => [
                    [
                        'name' => 'MT. ELGON',
                        'wards' => ['CHEPTAIS', 'CHESIKAKI', 'CHEPYUK', 'KAPKATENY', 'KAPTAMA', 'ELGON']
                    ],
                    [
                        'name' => 'SIRISIA',
                        'wards' => ['NAMWELA', 'MALAKISI/SOUTH KULISIRU', 'LWANDANYI']
                    ],
                    [
                        'name' => 'KABUCHAI',
                        'wards' => ['KABUCHAI/CHWELE', 'WEST NALONDO', 'BWAKE/LUUYA', 'MUKUYUNI']
                    ],
                    [
                        'name' => 'BUMULA',
                        'wards' => ['SOUTH BUKUSU', 'BUMULA', 'KHASOKO', 'KABULA', 'KIMAETI', 'WEST BUKUSU', 'SIBOTI']
                    ],
                    [
                        'name' => 'KANDUYI',
                        'wards' => ['BUKEMBE WEST', 'BUKEMBE EAST', 'TOWNSHIP', 'KHALABA', 'MUSIKOMA', 'EAST SANG\'ALO', 'MARAKARU/TUUTI', 'WEST SANG\'ALO']
                    ],
                    [
                        'name' => 'WEBUYE EAST',
                        'wards' => ['MIHUU', 'NDIVISI', 'MARAKA']
                    ],
                    [
                        'name' => 'WEBUYE WEST',
                        'wards' => ['MISIKHU', 'SITIKHO', 'MATULO', 'BOKOLI']
                    ],
                    [
                        'name' => 'KIMILILI',
                        'wards' => ['KIBINGEI', 'KIMILILI', 'MAENI', 'KAMUKUYWA']
                    ],
                    [
                        'name' => 'TONGAREN',
                        'wards' => ['MBAKALO', 'NAITIRI/KABUYEFWE', 'MILIMA', 'NDALU/ TABANI', 'TONGAREN', 'SOYSAMBU/ MITUA']
                    ],
                ]
            ],
            [
                'name' => 'BUSIA',
                'constituencies' => [
                    [
                        'name' => 'TESO NORTH',
                        'wards' => ['MALABA CENTRAL', 'MALABA NORTH', 'ANG\'URAI SOUTH', 'ANG\'URAI NORTH', 'ANG\'URAI EAST', 'MALABA SOUTH']
                    ],
                    [
                        'name' => 'TESO SOUTH',
                        'wards' => ['ANG\'OROM', 'CHAKOL SOUTH', 'CHAKOL NORTH', 'AMUKURA WEST', 'AMUKURA EAST', 'AMUKURA CENTRAL']
                    ],
                    [
                        'name' => 'NAMBALE',
                        'wards' => ['NAMBALE TOWNSHIP', 'BUKHAYO NORTH/WALTSI', 'BUKHAYO EAST', 'BUKHAYO CENTRAL']
                    ],
                    [
                        'name' => 'MATAYOS',
                        'wards' => ['BUKHAYO WEST', 'MAYENJE', 'MATAYOS SOUTH', 'BUSIBWABO', 'BURUMBA']
                    ],
                    [
                        'name' => 'BUTULA',
                        'wards' => ['MARACHI WEST', 'KINGANDOLE', 'MARACHI CENTRAL', 'MARACHI EAST', 'MARACHI NORTH', 'ELUGULU']
                    ],
                    [
                        'name' => 'FUNYULA',
                        'wards' => ['NAMBOBOTO NAMBUKU', 'NANGINA', 'AGENG\'A NANGUBA', 'BWIRI']
                    ],
                    [
                        'name' => 'BUDALANGI',
                        'wards' => ['BUNYALA CENTRAL', 'BUNYALA NORTH', 'BUNYALA WEST', 'BUNYALA SOUTH']
                    ],
                ]
            ],
            [
                'name' => 'SIAYA',
                'constituencies' => [
                    [
                        'name' => 'UGENYA',
                        'wards' => ['WEST UGENYA', 'UKWALA', 'NORTH UGENYA', 'EAST UGENYA']
                    ],
                    [
                        'name' => 'UGUNJA',
                        'wards' => ['SIDINDI', 'SIGOMERE', 'UGUNJA']
                    ],
                    [
                        'name' => 'ALEGO USONGA',
                        'wards' => ['USONGA', 'WEST ALEGO', 'CENTRAL ALEGO', 'SIAYA TOWNSHIP', 'NORTH ALEGO', 'SOUTH EAST ALEGO']
                    ],
                    [
                        'name' => 'GEM',
                        'wards' => ['NORTH GEM', 'WEST GEM', 'CENTRAL GEM', 'YALA TOWNSHIP', 'EAST GEM', 'SOUTH GEM']
                    ],
                    [
                        'name' => 'BONDO',
                        'wards' => ['WEST YIMBO', 'CENTRAL SAKWA', 'SOUTH SAKWA', 'YIMBO EAST', 'WEST SAKWA', 'NORTH SAKWA']
                    ],
                    [
                        'name' => 'RARIEDA',
                        'wards' => ['EAST ASEMBO', 'WEST ASEMBO', 'NORTH UYOMA', 'SOUTH UYOMA', 'WEST UYOMA']
                    ],
                ]
            ],
            [
                'name' => 'KISUMU',
                'constituencies' => [
                    [
                        'name' => 'KISUMU EAST',
                        'wards' => ['KAJULU', 'KOLWA EAST', 'MANYATTA \'B\'', 'NYALENDA \'A\'', 'KOLWA CENTRAL']
                    ],
                    [
                        'name' => 'KISUMU WEST',
                        'wards' => ['SOUTH WEST KISUMU', 'CENTRAL KISUMU', 'KISUMU NORTH', 'WEST KISUMU', 'NORTH WEST KISUMU']
                    ],
                    [
                        'name' => 'KISUMU CENTRAL',
                        'wards' => ['RAILWAYS', 'MIGOSI', 'SHAURIMOYO KALOLENI', 'MARKET MILIMANI', 'KONDELE', 'NYALENDA B']
                    ],
                    [
                        'name' => 'SEME',
                        'wards' => ['WEST SEME', 'CENTRAL SEME', 'EAST SEME', 'NORTH SEME']
                    ],
                    [
                        'name' => 'NYANDO',
                        'wards' => ['EAST KANO/WAWIDHI', 'AWASI/ONJIKO', 'AHERO', 'KABONYO/KANYAGWAL', 'KOBURA']
                    ],
                    [
                        'name' => 'MUHORONI',
                        'wards' => ['MIWANI', 'OMBEYI', 'MASOGO/NYANG\'OMA', 'CHEMELIL', 'MUHORONI/KORU']
                    ],
                    [
                        'name' => 'NYAKACH',
                        'wards' => ['SOUTH WEST NYAKACH', 'NORTH NYAKACH', 'CENTRAL NYAKACH', 'WEST NYAKACH', 'SOUTH EAST NYAKACH']
                    ],
                ]
            ],
            [
                'name' => 'HOMA BAY',
                'constituencies' => [
                    [
                        'name' => 'KASIPUL',
                        'wards' => ['WEST KASIPUL', 'SOUTH KASIPUL', 'CENTRAL KASIPUL', 'EAST KAMAGAK', 'WEST KAMAGAK']
                    ],
                    [
                        'name' => 'KABONDO KASIPUL',
                        'wards' => ['KABONDO WEST', 'KOKWANYO/KAKELO', 'KOJWACH']
                    ],
                    [
                        'name' => 'KARACHUONYO',
                        'wards' => ['WEST KARACHUONYO', 'NORTH KARACHUONYO', 'CENTRAL', 'KANYALUO', 'KIBIRI', 'WANGCHIENG', 'KENDU BAY TOWN']
                    ],
                    [
                        'name' => 'RANGWE',
                        'wards' => ['WEST GEM', 'EAST GEM', 'KAGAN', 'KOCHIA']
                    ],
                    [
                        'name' => 'HOMA BAY TOWN',
                        'wards' => ['HOMA BAY CENTRAL', 'HOMA BAY ARUJO', 'HOMA BAY WEST', 'HOMA BAY EAST']
                    ],
                    [
                        'name' => 'NDHIWA',
                        'wards' => ['KWABWAI', 'KANYADOTO', 'KANYIKELA', 'KABUOCH NORTH', 'KABUOCH SOUTH/PALA', 'KANYAMWA KOLOGI', 'KANYAMWA KOSEWE']
                    ],
                    [
                        'name' => 'SUBA NORTH',
                        'wards' => ['MFANGANO ISLAND', 'RUSINGA ISLAND', 'KASGUNGA', 'GEMBE', 'LAMBWE']
                    ],
                    [
                        'name' => 'SUBA SOUTH',
                        'wards' => ['GWASSI SOUTH', 'GWASSI NORTH', 'KAKSINGRI WEST', 'RUMA-KAKSINGRI']
                    ],
                ]
            ],
            [
                'name' => 'MIGORI',
                'constituencies' => [
                    [
                        'name' => 'RONGO',
                        'wards' => ['NORTH KAMAGAMBO', 'CENTRAL KAMAGAMBO', 'EAST KAMAGAMBO', 'SOUTH KAMAGAMBO']
                    ],
                    [
                        'name' => 'AWENDO',
                        'wards' => ['NORTH SAKWA', 'SOUTH SAKWA', 'WEST SAKWA', 'CENTRAL SAKWA']
                    ],
                    [
                        'name' => 'SUNA EAST',
                        'wards' => ['GOD JOPE', 'SUNA CENTRAL', 'KAKRAO', 'KWA']
                    ],
                    [
                        'name' => 'SUNA WEST',
                        'wards' => ['WIGA', 'WASWETA II', 'RAGANA-ORUBA', 'WASIMBETE']
                    ],
                    [
                        'name' => 'URIRI',
                        'wards' => ['WEST KANYAMKAGO', 'NORTH KANYAMKAGO', 'CENTRAL KANYAMKAGO', 'SOUTH KANYAMKAGO', 'EAST KANYAMKAGO']
                    ],
                    [
                        'name' => 'NYATIKE',
                        'wards' => ['KACHIEN\'G', 'KANYASA', 'NORTH KADEM', 'MACALDER/KANYARWANDA', 'KALER', 'GOT KACHOLA', 'MUHURU']
                    ],
                    [
                        'name' => 'KURIA WEST',
                        'wards' => ['BUKIRA EAST', 'BUKIRA CENTRL/IKEREGE', 'ISIBANIA', 'MAKERERO', 'MASABA', 'TAGARE', 'NYAMOSENSE/KOMOSOKO']
                    ],
                    [
                        'name' => 'KURIA EAST',
                        'wards' => ['GOKEHARAKA/GETAMBWEGA', 'NTIMARU WEST', 'NTIMARU EAST', 'NYABASI EAST', 'NYABASI WEST']
                    ],
                ]
            ],
            [
                'name' => 'KISII',
                'constituencies' => [
                    [
                        'name' => 'BONCHARI',
                        'wards' => ['BOMARIBA', 'BOGIAKUMU', 'BOMORENDA', 'RIANA']
                    ],
                    [
                        'name' => 'SOUTH MUGIRANGO',
                        'wards' => ['TABAKA', 'BOIKANG\'A', 'BOGETENGA', 'BORABU / CHITAGO', 'MOTICHO', 'GETENGA']
                    ],
                    [
                        'name' => 'BOMACHOGE BORABU',
                        'wards' => ['BOMBABA BORABU', 'BOOCHI BORABU', 'BOKIMONGE', 'MAGENCHE']
                    ],
                    [
                        'name' => 'BOBASI',
                        'wards' => ['MASIGE WEST', 'MASIGE EAST', 'BASI CENTRAL', 'NYACHEKI', 'BASI BOGETAORIO', 'BOBASI CHACHE', 'SAMETA/MOKWERERO', 'BOBASI BOITANGARE']
                    ],
                    [
                        'name' => 'BOMACHOGE CHACHE',
                        'wards' => ['MAJOGE BASI', 'BOOCHI/TENDERE', 'BOSOTI/SENGERA']
                    ],
                    [
                        'name' => 'NYARIBARI MASABA',
                        'wards' => ['ICHUNI', 'NYAMASIBI', 'MASIMBA', 'GESUSU', 'KIAMOKAMA']
                    ],
                    [
                        'name' => 'NYARIBARI CHACHE',
                        'wards' => ['BOBARACHO', 'KISII CENTRAL', 'KEUMBU', 'KIOGORO', 'BIRONGO', 'IBENO']
                    ],
                    [
                        'name' => 'KITUTU CHACHE NORTH',
                        'wards' => ['MONYERERO', 'SENSI', 'MARANI', 'KEGOGI']
                    ],
                    [
                        'name' => 'KITUTU CHACHE SOUTH',
                        'wards' => ['BOGUSERO', 'BOGEKA', 'NYAKOE', 'KITUTU CENTRAL', 'NYATIEKO']
                    ],
                ]
            ],
            [
                'name' => 'NYAMIRA',
                'constituencies' => [
                    [
                        'name' => 'KITUTU MASABA',
                        'wards' => ['RIGOMA', 'GACHUBA', 'KEMERA', 'MAGOMBO', 'MANGA', 'GESIMA']
                    ],
                    [
                        'name' => 'WEST MUGIRANGO',
                        'wards' => ['NYAMAIYA', 'BOGICHORA', 'BOSAMARO', 'BONYAMATUTA', 'TOWNSHIP']
                    ],
                    [
                        'name' => 'NORTH MUGIRANGO',
                        'wards' => ['ITIBO', 'BOMWAGAMO', 'BOKEIRA', 'MAGWAGWA', 'EKERENYO']
                    ],
                    [
                        'name' => 'BORABU',
                        'wards' => ['MEKENENE', 'KIABONYORU', 'NYANSIONGO', 'ESISE']
                    ],
                ]
            ],
            [
                'name' => 'NAIROBI CITY',
                'constituencies' => [
                    [
                        'name' => 'WESTLANDS',
                        'wards' => ['KITISURU', 'PARKLANDS/HIGHRIDGE', 'KARURA', 'KANGEMI', 'MOUNTAIN VIEW']
                    ],
                    [
                        'name' => 'DAGORETTI NORTH',
                        'wards' => ['KILIMANI', 'KAWANGWARE', 'GATINA', 'KILELESHWA', 'KABIRO']
                    ],
                    [
                        'name' => 'DAGORETTI SOUTH',
                        'wards' => ['MUTU-INI', 'NGANDO', 'RIRUTA', 'UTHIRU/RUTHIMITU', 'WAITHAKA']
                    ],
                    [
                        'name' => 'LANGATA',
                        'wards' => ['KAREN', 'NAIROBI WEST', 'MUGUMU-INI', 'SOUTH C', 'NYAYO HIGHRISE']
                    ],
                    [
                        'name' => 'KIBRA',
                        'wards' => ['LAINI SABA', 'LINDI', 'MAKINA', 'WOODLEY/KENYATTA GOLF COURSE', 'SARANGOMBE']
                    ],
                    [
                        'name' => 'ROYSAMBU',
                        'wards' => ['GITHURAI', 'KAHAWA WEST', 'ZIMMERMAN', 'ROYSAMBU', 'KAHAWA']
                    ],
                    [
                        'name' => 'KASARANI',
                        'wards' => ['CLAY CITY', 'MWIKI', 'KASARANI', 'NJIRU', 'RUAI']
                    ],
                    [
                        'name' => 'RUARAKA',
                        'wards' => ['BABA DOGO', 'UTALII', 'MATHARE NORTH', 'LUCKY SUMMER', 'KOROGOCHO']
                    ],
                    [
                        'name' => 'EMBAKASI SOUTH',
                        'wards' => ['IMARA DAIMA', 'KWA NJENGA', 'KWA REUBEN', 'PIPELINE', 'KWARE']
                    ],
                    [
                        'name' => 'EMBAKASI NORTH',
                        'wards' => ['KARIOBANGI NORTH', 'DANDORA AREA I', 'DANDORA AREA II', 'DANDORA AREA III', 'DANDORA AREA IV']
                    ],
                    [
                        'name' => 'EMBAKASI CENTRAL',
                        'wards' => ['KAYOLE NORTH', 'KAYOLE CENTRAL', 'KAYOLE SOUTH', 'KOMAROCK', 'MATOPENI/SPRING VALLEY']
                    ],
                    [
                        'name' => 'EMBAKASI EAST',
                        'wards' => ['UPPER SAVANNAH', 'LOWER SAVANNAH', 'EMBAKASI', 'UTAWALA', 'MIHANGO']
                    ],
                    [
                        'name' => 'EMBAKASI WEST',
                        'wards' => ['UMOJA I', 'UMOJA II', 'MOWLEM', 'KARIOBANGI SOUTH']
                    ],
                    [
                        'name' => 'MAKADARA',
                        'wards' => ['MARINGO/HAMZA', 'VIWANDANI', 'HARAMBEE', 'MAKONGENI']
                    ],
                    [
                        'name' => 'KAMUKUNJI',
                        'wards' => ['PUMWANI', 'EASTLEIGH NORTH', 'EASTLEIGH SOUTH', 'AIRBASE', 'CALIFORNIA']
                    ],
                    [
                        'name' => 'STAREHE',
                        'wards' => ['NAIROBI CENTRAL', 'NGARA', 'PANGANI', 'ZIWANI/KARIOKOR', 'LANDIMAWE', 'NAIROBI SOUTH']
                    ],
                    [
                        'name' => 'MATHARE',
                        'wards' => ['HOSPITAL', 'MABATINI', 'HURUMA', 'NGEI', 'MLANGO KUBWA', 'KIAMAIKO']
                    ],
                ]
            ],
        ];

        foreach ($countiesData as $countyData) {
            $county = County::create(['name' => $countyData['name']]);

            foreach ($countyData['constituencies'] as $constituencyData) {
                $constituency = Constituency::create([
                    'name' => $constituencyData['name'],
                    'county_id' => $county->id,
                ]);

                foreach ($constituencyData['wards'] as $wardName) {
                    Ward::create([
                        'name' => $wardName,
                        'constituency_id' => $constituency->id,
                    ]);
                }
            }
        }
    }
}
