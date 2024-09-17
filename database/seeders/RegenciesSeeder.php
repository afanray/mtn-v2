<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Regencies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('regencies')->truncate();
      Regencies::create( [
        'code'=>'1101',
        'province_code'=>'11',
        'name'=>'KABUPATEN SIMEULUE'
      ] );



      Regencies::create( [
        'code'=>'1102',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH SINGKIL'
      ] );



      Regencies::create( [
        'code'=>'1103',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1104',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH TENGGARA'
      ] );



      Regencies::create( [
        'code'=>'1105',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH TIMUR'
      ] );



      Regencies::create( [
        'code'=>'1106',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH TENGAH'
      ] );



      Regencies::create( [
        'code'=>'1107',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH BARAT'
      ] );



      Regencies::create( [
        'code'=>'1108',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH BESAR'
      ] );



      Regencies::create( [
        'code'=>'1109',
        'province_code'=>'11',
        'name'=>'KABUPATEN PIDIE'
      ] );



      Regencies::create( [
        'code'=>'1110',
        'province_code'=>'11',
        'name'=>'KABUPATEN BIREUEN'
      ] );



      Regencies::create( [
        'code'=>'1111',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH UTARA'
      ] );



      Regencies::create( [
        'code'=>'1112',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH BARAT DAYA'
      ] );



      Regencies::create( [
        'code'=>'1113',
        'province_code'=>'11',
        'name'=>'KABUPATEN GAYO LUES'
      ] );



      Regencies::create( [
        'code'=>'1114',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH TAMIANG'
      ] );



      Regencies::create( [
        'code'=>'1115',
        'province_code'=>'11',
        'name'=>'KABUPATEN NAGAN RAYA'
      ] );



      Regencies::create( [
        'code'=>'1116',
        'province_code'=>'11',
        'name'=>'KABUPATEN ACEH JAYA'
      ] );



      Regencies::create( [
        'code'=>'1117',
        'province_code'=>'11',
        'name'=>'KABUPATEN BENER MERIAH'
      ] );



      Regencies::create( [
        'code'=>'1118',
        'province_code'=>'11',
        'name'=>'KABUPATEN PIDIE JAYA'
      ] );



      Regencies::create( [
        'code'=>'1171',
        'province_code'=>'11',
        'name'=>'KOTA BANDA ACEH'
      ] );



      Regencies::create( [
        'code'=>'1172',
        'province_code'=>'11',
        'name'=>'KOTA SABANG'
      ] );



      Regencies::create( [
        'code'=>'1173',
        'province_code'=>'11',
        'name'=>'KOTA LANGSA'
      ] );



      Regencies::create( [
        'code'=>'1174',
        'province_code'=>'11',
        'name'=>'KOTA LHOKSEUMAWE'
      ] );



      Regencies::create( [
        'code'=>'1175',
        'province_code'=>'11',
        'name'=>'KOTA SUBULUSSALAM'
      ] );



      Regencies::create( [
        'code'=>'1201',
        'province_code'=>'12',
        'name'=>'KABUPATEN NIAS'
      ] );



      Regencies::create( [
        'code'=>'1202',
        'province_code'=>'12',
        'name'=>'KABUPATEN MANDAILING NATAL'
      ] );



      Regencies::create( [
        'code'=>'1203',
        'province_code'=>'12',
        'name'=>'KABUPATEN TAPANULI SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1204',
        'province_code'=>'12',
        'name'=>'KABUPATEN TAPANULI TENGAH'
      ] );



      Regencies::create( [
        'code'=>'1205',
        'province_code'=>'12',
        'name'=>'KABUPATEN TAPANULI UTARA'
      ] );



      Regencies::create( [
        'code'=>'1206',
        'province_code'=>'12',
        'name'=>'KABUPATEN TOBA SAMOSIR'
      ] );



      Regencies::create( [
        'code'=>'1207',
        'province_code'=>'12',
        'name'=>'KABUPATEN LABUHAN BATU'
      ] );



      Regencies::create( [
        'code'=>'1208',
        'province_code'=>'12',
        'name'=>'KABUPATEN ASAHAN'
      ] );



      Regencies::create( [
        'code'=>'1209',
        'province_code'=>'12',
        'name'=>'KABUPATEN SIMALUNGUN'
      ] );



      Regencies::create( [
        'code'=>'1210',
        'province_code'=>'12',
        'name'=>'KABUPATEN DAIRI'
      ] );



      Regencies::create( [
        'code'=>'1211',
        'province_code'=>'12',
        'name'=>'KABUPATEN KARO'
      ] );



      Regencies::create( [
        'code'=>'1212',
        'province_code'=>'12',
        'name'=>'KABUPATEN DELI SERDANG'
      ] );



      Regencies::create( [
        'code'=>'1213',
        'province_code'=>'12',
        'name'=>'KABUPATEN LANGKAT'
      ] );



      Regencies::create( [
        'code'=>'1214',
        'province_code'=>'12',
        'name'=>'KABUPATEN NIAS SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1215',
        'province_code'=>'12',
        'name'=>'KABUPATEN HUMBANG HASUNDUTAN'
      ] );



      Regencies::create( [
        'code'=>'1216',
        'province_code'=>'12',
        'name'=>'KABUPATEN PAKPAK BHARAT'
      ] );



      Regencies::create( [
        'code'=>'1217',
        'province_code'=>'12',
        'name'=>'KABUPATEN SAMOSIR'
      ] );



      Regencies::create( [
        'code'=>'1218',
        'province_code'=>'12',
        'name'=>'KABUPATEN SERDANG BEDAGAI'
      ] );



      Regencies::create( [
        'code'=>'1219',
        'province_code'=>'12',
        'name'=>'KABUPATEN BATU BARA'
      ] );



      Regencies::create( [
        'code'=>'1220',
        'province_code'=>'12',
        'name'=>'KABUPATEN PADANG LAWAS UTARA'
      ] );



      Regencies::create( [
        'code'=>'1221',
        'province_code'=>'12',
        'name'=>'KABUPATEN PADANG LAWAS'
      ] );



      Regencies::create( [
        'code'=>'1222',
        'province_code'=>'12',
        'name'=>'KABUPATEN LABUHAN BATU SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1223',
        'province_code'=>'12',
        'name'=>'KABUPATEN LABUHAN BATU UTARA'
      ] );



      Regencies::create( [
        'code'=>'1224',
        'province_code'=>'12',
        'name'=>'KABUPATEN NIAS UTARA'
      ] );



      Regencies::create( [
        'code'=>'1225',
        'province_code'=>'12',
        'name'=>'KABUPATEN NIAS BARAT'
      ] );



      Regencies::create( [
        'code'=>'1271',
        'province_code'=>'12',
        'name'=>'KOTA SIBOLGA'
      ] );



      Regencies::create( [
        'code'=>'1272',
        'province_code'=>'12',
        'name'=>'KOTA TANJUNG BALAI'
      ] );
      Regencies::create( [
        'code'=>'1273',
        'province_code'=>'12',
        'name'=>'KOTA PEMATANG SIANTAR'
      ] );



      Regencies::create( [
        'code'=>'1274',
        'province_code'=>'12',
        'name'=>'KOTA TEBING TINGGI'
      ] );



      Regencies::create( [
        'code'=>'1275',
        'province_code'=>'12',
        'name'=>'KOTA MEDAN'
      ] );



      Regencies::create( [
        'code'=>'1276',
        'province_code'=>'12',
        'name'=>'KOTA BINJAI'
      ] );



      Regencies::create( [
        'code'=>'1277',
        'province_code'=>'12',
        'name'=>'KOTA PADANGSIDIMPUAN'
      ] );



      Regencies::create( [
        'code'=>'1278',
        'province_code'=>'12',
        'name'=>'KOTA GUNUNGSITOLI'
      ] );



      Regencies::create( [
        'code'=>'1301',
        'province_code'=>'13',
        'name'=>'KABUPATEN KEPULAUAN MENTAWAI'
      ] );



      Regencies::create( [
        'code'=>'1302',
        'province_code'=>'13',
        'name'=>'KABUPATEN PESISIR SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1303',
        'province_code'=>'13',
        'name'=>'KABUPATEN SOLOK'
      ] );



      Regencies::create( [
        'code'=>'1304',
        'province_code'=>'13',
        'name'=>'KABUPATEN SIJUNJUNG'
      ] );



      Regencies::create( [
        'code'=>'1305',
        'province_code'=>'13',
        'name'=>'KABUPATEN TANAH DATAR'
      ] );



      Regencies::create( [
        'code'=>'1306',
        'province_code'=>'13',
        'name'=>'KABUPATEN PADANG PARIAMAN'
      ] );



      Regencies::create( [
        'code'=>'1307',
        'province_code'=>'13',
        'name'=>'KABUPATEN AGAM'
      ] );



      Regencies::create( [
        'code'=>'1308',
        'province_code'=>'13',
        'name'=>'KABUPATEN LIMA PULUH KOTA'
      ] );



      Regencies::create( [
        'code'=>'1309',
        'province_code'=>'13',
        'name'=>'KABUPATEN PASAMAN'
      ] );



      Regencies::create( [
        'code'=>'1310',
        'province_code'=>'13',
        'name'=>'KABUPATEN SOLOK SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1311',
        'province_code'=>'13',
        'name'=>'KABUPATEN DHARMASRAYA'
      ] );



      Regencies::create( [
        'code'=>'1312',
        'province_code'=>'13',
        'name'=>'KABUPATEN PASAMAN BARAT'
      ] );



      Regencies::create( [
        'code'=>'1371',
        'province_code'=>'13',
        'name'=>'KOTA PADANG'
      ] );



      Regencies::create( [
        'code'=>'1372',
        'province_code'=>'13',
        'name'=>'KOTA SOLOK'
      ] );



      Regencies::create( [
        'code'=>'1373',
        'province_code'=>'13',
        'name'=>'KOTA SAWAH LUNTO'
      ] );



      Regencies::create( [
        'code'=>'1374',
        'province_code'=>'13',
        'name'=>'KOTA PADANG PANJANG'
      ] );



      Regencies::create( [
        'code'=>'1375',
        'province_code'=>'13',
        'name'=>'KOTA BUKITTINGGI'
      ] );



      Regencies::create( [
        'code'=>'1376',
        'province_code'=>'13',
        'name'=>'KOTA PAYAKUMBUH'
      ] );



      Regencies::create( [
        'code'=>'1377',
        'province_code'=>'13',
        'name'=>'KOTA PARIAMAN'
      ] );



      Regencies::create( [
        'code'=>'1401',
        'province_code'=>'14',
        'name'=>'KABUPATEN KUANTAN SINGINGI'
      ] );



      Regencies::create( [
        'code'=>'1402',
        'province_code'=>'14',
        'name'=>'KABUPATEN INDRAGIRI HULU'
      ] );



      Regencies::create( [
        'code'=>'1403',
        'province_code'=>'14',
        'name'=>'KABUPATEN INDRAGIRI HILIR'
      ] );



      Regencies::create( [
        'code'=>'1404',
        'province_code'=>'14',
        'name'=>'KABUPATEN PELALAWAN'
      ] );



      Regencies::create( [
        'code'=>'1405',
        'province_code'=>'14',
        'name'=>'KABUPATEN S I A K'
      ] );



      Regencies::create( [
        'code'=>'1406',
        'province_code'=>'14',
        'name'=>'KABUPATEN KAMPAR'
      ] );



      Regencies::create( [
        'code'=>'1407',
        'province_code'=>'14',
        'name'=>'KABUPATEN ROKAN HULU'
      ] );



      Regencies::create( [
        'code'=>'1408',
        'province_code'=>'14',
        'name'=>'KABUPATEN BENGKALIS'
      ] );



      Regencies::create( [
        'code'=>'1409',
        'province_code'=>'14',
        'name'=>'KABUPATEN ROKAN HILIR'
      ] );



      Regencies::create( [
        'code'=>'1410',
        'province_code'=>'14',
        'name'=>'KABUPATEN KEPULAUAN MERANTI'
      ] );



      Regencies::create( [
        'code'=>'1471',
        'province_code'=>'14',
        'name'=>'KOTA PEKANBARU'
      ] );



      Regencies::create( [
        'code'=>'1473',
        'province_code'=>'14',
        'name'=>'KOTA D U M A I'
      ] );



      Regencies::create( [
        'code'=>'1501',
        'province_code'=>'15',
        'name'=>'KABUPATEN KERINCI'
      ] );



      Regencies::create( [
        'code'=>'1502',
        'province_code'=>'15',
        'name'=>'KABUPATEN MERANGIN'
      ] );



      Regencies::create( [
        'code'=>'1503',
        'province_code'=>'15',
        'name'=>'KABUPATEN SAROLANGUN'
      ] );



      Regencies::create( [
        'code'=>'1504',
        'province_code'=>'15',
        'name'=>'KABUPATEN BATANG HARI'
      ] );



      Regencies::create( [
        'code'=>'1505',
        'province_code'=>'15',
        'name'=>'KABUPATEN MUARO JAMBI'
      ] );



      Regencies::create( [
        'code'=>'1506',
        'province_code'=>'15',
        'name'=>'KABUPATEN TANJUNG JABUNG TIMUR'
      ] );



      Regencies::create( [
        'code'=>'1507',
        'province_code'=>'15',
        'name'=>'KABUPATEN TANJUNG JABUNG BARAT'
      ] );



      Regencies::create( [
        'code'=>'1508',
        'province_code'=>'15',
        'name'=>'KABUPATEN TEBO'
      ] );



      Regencies::create( [
        'code'=>'1509',
        'province_code'=>'15',
        'name'=>'KABUPATEN BUNGO'
      ] );



      Regencies::create( [
        'code'=>'1571',
        'province_code'=>'15',
        'name'=>'KOTA JAMBI'
      ] );



      Regencies::create( [
        'code'=>'1572',
        'province_code'=>'15',
        'name'=>'KOTA SUNGAI PENUH'
      ] );



      Regencies::create( [
        'code'=>'1601',
        'province_code'=>'16',
        'name'=>'KABUPATEN OGAN KOMERING ULU'
      ] );



      Regencies::create( [
        'code'=>'1602',
        'province_code'=>'16',
        'name'=>'KABUPATEN OGAN KOMERING ILIR'
      ] );
      Regencies::create( [
        'code'=>'1603',
        'province_code'=>'16',
        'name'=>'KABUPATEN MUARA ENIM'
      ] );



      Regencies::create( [
        'code'=>'1604',
        'province_code'=>'16',
        'name'=>'KABUPATEN LAHAT'
      ] );



      Regencies::create( [
        'code'=>'1605',
        'province_code'=>'16',
        'name'=>'KABUPATEN MUSI RAWAS'
      ] );



      Regencies::create( [
        'code'=>'1606',
        'province_code'=>'16',
        'name'=>'KABUPATEN MUSI BANYUASIN'
      ] );



      Regencies::create( [
        'code'=>'1607',
        'province_code'=>'16',
        'name'=>'KABUPATEN BANYU ASIN'
      ] );



      Regencies::create( [
        'code'=>'1608',
        'province_code'=>'16',
        'name'=>'KABUPATEN OGAN KOMERING ULU SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1609',
        'province_code'=>'16',
        'name'=>'KABUPATEN OGAN KOMERING ULU TIMUR'
      ] );



      Regencies::create( [
        'code'=>'1610',
        'province_code'=>'16',
        'name'=>'KABUPATEN OGAN ILIR'
      ] );



      Regencies::create( [
        'code'=>'1611',
        'province_code'=>'16',
        'name'=>'KABUPATEN EMPAT LAWANG'
      ] );



      Regencies::create( [
        'code'=>'1612',
        'province_code'=>'16',
        'name'=>'KABUPATEN PENUKAL ABAB LEMATANG ILIR'
      ] );



      Regencies::create( [
        'code'=>'1613',
        'province_code'=>'16',
        'name'=>'KABUPATEN MUSI RAWAS UTARA'
      ] );



      Regencies::create( [
        'code'=>'1671',
        'province_code'=>'16',
        'name'=>'KOTA PALEMBANG'
      ] );



      Regencies::create( [
        'code'=>'1672',
        'province_code'=>'16',
        'name'=>'KOTA PRABUMULIH'
      ] );



      Regencies::create( [
        'code'=>'1673',
        'province_code'=>'16',
        'name'=>'KOTA PAGAR ALAM'
      ] );



      Regencies::create( [
        'code'=>'1674',
        'province_code'=>'16',
        'name'=>'KOTA LUBUKLINGGAU'
      ] );



      Regencies::create( [
        'code'=>'1701',
        'province_code'=>'17',
        'name'=>'KABUPATEN BENGKULU SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1702',
        'province_code'=>'17',
        'name'=>'KABUPATEN REJANG LEBONG'
      ] );



      Regencies::create( [
        'code'=>'1703',
        'province_code'=>'17',
        'name'=>'KABUPATEN BENGKULU UTARA'
      ] );



      Regencies::create( [
        'code'=>'1704',
        'province_code'=>'17',
        'name'=>'KABUPATEN KAUR'
      ] );



      Regencies::create( [
        'code'=>'1705',
        'province_code'=>'17',
        'name'=>'KABUPATEN SELUMA'
      ] );



      Regencies::create( [
        'code'=>'1706',
        'province_code'=>'17',
        'name'=>'KABUPATEN MUKOMUKO'
      ] );



      Regencies::create( [
        'code'=>'1707',
        'province_code'=>'17',
        'name'=>'KABUPATEN LEBONG'
      ] );



      Regencies::create( [
        'code'=>'1708',
        'province_code'=>'17',
        'name'=>'KABUPATEN KEPAHIANG'
      ] );



      Regencies::create( [
        'code'=>'1709',
        'province_code'=>'17',
        'name'=>'KABUPATEN BENGKULU TENGAH'
      ] );



      Regencies::create( [
        'code'=>'1771',
        'province_code'=>'17',
        'name'=>'KOTA BENGKULU'
      ] );



      Regencies::create( [
        'code'=>'1801',
        'province_code'=>'18',
        'name'=>'KABUPATEN LAMPUNG BARAT'
      ] );



      Regencies::create( [
        'code'=>'1802',
        'province_code'=>'18',
        'name'=>'KABUPATEN TANGGAMUS'
      ] );



      Regencies::create( [
        'code'=>'1803',
        'province_code'=>'18',
        'name'=>'KABUPATEN LAMPUNG SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1804',
        'province_code'=>'18',
        'name'=>'KABUPATEN LAMPUNG TIMUR'
      ] );



      Regencies::create( [
        'code'=>'1805',
        'province_code'=>'18',
        'name'=>'KABUPATEN LAMPUNG TENGAH'
      ] );



      Regencies::create( [
        'code'=>'1806',
        'province_code'=>'18',
        'name'=>'KABUPATEN LAMPUNG UTARA'
      ] );



      Regencies::create( [
        'code'=>'1807',
        'province_code'=>'18',
        'name'=>'KABUPATEN WAY KANAN'
      ] );



      Regencies::create( [
        'code'=>'1808',
        'province_code'=>'18',
        'name'=>'KABUPATEN TULANGBAWANG'
      ] );



      Regencies::create( [
        'code'=>'1809',
        'province_code'=>'18',
        'name'=>'KABUPATEN PESAWARAN'
      ] );



      Regencies::create( [
        'code'=>'1810',
        'province_code'=>'18',
        'name'=>'KABUPATEN PRINGSEWU'
      ] );



      Regencies::create( [
        'code'=>'1811',
        'province_code'=>'18',
        'name'=>'KABUPATEN MESUJI'
      ] );



      Regencies::create( [
        'code'=>'1812',
        'province_code'=>'18',
        'name'=>'KABUPATEN TULANG BAWANG BARAT'
      ] );



      Regencies::create( [
        'code'=>'1813',
        'province_code'=>'18',
        'name'=>'KABUPATEN PESISIR BARAT'
      ] );



      Regencies::create( [
        'code'=>'1871',
        'province_code'=>'18',
        'name'=>'KOTA BANDAR LAMPUNG'
      ] );



      Regencies::create( [
        'code'=>'1872',
        'province_code'=>'18',
        'name'=>'KOTA METRO'
      ] );



      Regencies::create( [
        'code'=>'1901',
        'province_code'=>'19',
        'name'=>'KABUPATEN BANGKA'
      ] );



      Regencies::create( [
        'code'=>'1902',
        'province_code'=>'19',
        'name'=>'KABUPATEN BELITUNG'
      ] );



      Regencies::create( [
        'code'=>'1903',
        'province_code'=>'19',
        'name'=>'KABUPATEN BANGKA BARAT'
      ] );



      Regencies::create( [
        'code'=>'1904',
        'province_code'=>'19',
        'name'=>'KABUPATEN BANGKA TENGAH'
      ] );



      Regencies::create( [
        'code'=>'1905',
        'province_code'=>'19',
        'name'=>'KABUPATEN BANGKA SELATAN'
      ] );



      Regencies::create( [
        'code'=>'1906',
        'province_code'=>'19',
        'name'=>'KABUPATEN BELITUNG TIMUR'
      ] );



      Regencies::create( [
        'code'=>'1971',
        'province_code'=>'19',
        'name'=>'KOTA PANGKAL PINANG'
      ] );



      Regencies::create( [
        'code'=>'2101',
        'province_code'=>'21',
        'name'=>'KABUPATEN KARIMUN'
      ] );



      Regencies::create( [
        'code'=>'2102',
        'province_code'=>'21',
        'name'=>'KABUPATEN BINTAN'
      ] );



      Regencies::create( [
        'code'=>'2103',
        'province_code'=>'21',
        'name'=>'KABUPATEN NATUNA'
      ] );
      Regencies::create( [
        'code'=>'2104',
        'province_code'=>'21',
        'name'=>'KABUPATEN LINGGA'
      ] );



      Regencies::create( [
        'code'=>'2105',
        'province_code'=>'21',
        'name'=>'KABUPATEN KEPULAUAN ANAMBAS'
      ] );



      Regencies::create( [
        'code'=>'2171',
        'province_code'=>'21',
        'name'=>'KOTA B A T A M'
      ] );



      Regencies::create( [
        'code'=>'2172',
        'province_code'=>'21',
        'name'=>'KOTA TANJUNG PINANG'
      ] );



      Regencies::create( [
        'code'=>'3101',
        'province_code'=>'31',
        'name'=>'KABUPATEN KEPULAUAN SERIBU'
      ] );



      Regencies::create( [
        'code'=>'3171',
        'province_code'=>'31',
        'name'=>'KOTA JAKARTA SELATAN'
      ] );



      Regencies::create( [
        'code'=>'3172',
        'province_code'=>'31',
        'name'=>'KOTA JAKARTA TIMUR'
      ] );



      Regencies::create( [
        'code'=>'3173',
        'province_code'=>'31',
        'name'=>'KOTA JAKARTA PUSAT'
      ] );



      Regencies::create( [
        'code'=>'3174',
        'province_code'=>'31',
        'name'=>'KOTA JAKARTA BARAT'
      ] );



      Regencies::create( [
        'code'=>'3175',
        'province_code'=>'31',
        'name'=>'KOTA JAKARTA UTARA'
      ] );



      Regencies::create( [
        'code'=>'3201',
        'province_code'=>'32',
        'name'=>'KABUPATEN BOGOR'
      ] );



      Regencies::create( [
        'code'=>'3202',
        'province_code'=>'32',
        'name'=>'KABUPATEN SUKABUMI'
      ] );



      Regencies::create( [
        'code'=>'3203',
        'province_code'=>'32',
        'name'=>'KABUPATEN CIANJUR'
      ] );



      Regencies::create( [
        'code'=>'3204',
        'province_code'=>'32',
        'name'=>'KABUPATEN BANDUNG'
      ] );



      Regencies::create( [
        'code'=>'3205',
        'province_code'=>'32',
        'name'=>'KABUPATEN GARUT'
      ] );



      Regencies::create( [
        'code'=>'3206',
        'province_code'=>'32',
        'name'=>'KABUPATEN TASIKMALAYA'
      ] );



      Regencies::create( [
        'code'=>'3207',
        'province_code'=>'32',
        'name'=>'KABUPATEN CIAMIS'
      ] );



      Regencies::create( [
        'code'=>'3208',
        'province_code'=>'32',
        'name'=>'KABUPATEN KUNINGAN'
      ] );



      Regencies::create( [
        'code'=>'3209',
        'province_code'=>'32',
        'name'=>'KABUPATEN CIREBON'
      ] );



      Regencies::create( [
        'code'=>'3210',
        'province_code'=>'32',
        'name'=>'KABUPATEN MAJALENGKA'
      ] );



      Regencies::create( [
        'code'=>'3211',
        'province_code'=>'32',
        'name'=>'KABUPATEN SUMEDANG'
      ] );



      Regencies::create( [
        'code'=>'3212',
        'province_code'=>'32',
        'name'=>'KABUPATEN INDRAMAYU'
      ] );



      Regencies::create( [
        'code'=>'3213',
        'province_code'=>'32',
        'name'=>'KABUPATEN SUBANG'
      ] );



      Regencies::create( [
        'code'=>'3214',
        'province_code'=>'32',
        'name'=>'KABUPATEN PURWAKARTA'
      ] );



      Regencies::create( [
        'code'=>'3215',
        'province_code'=>'32',
        'name'=>'KABUPATEN KARAWANG'
      ] );



      Regencies::create( [
        'code'=>'3216',
        'province_code'=>'32',
        'name'=>'KABUPATEN BEKASI'
      ] );



      Regencies::create( [
        'code'=>'3217',
        'province_code'=>'32',
        'name'=>'KABUPATEN BANDUNG BARAT'
      ] );



      Regencies::create( [
        'code'=>'3218',
        'province_code'=>'32',
        'name'=>'KABUPATEN PANGANDARAN'
      ] );



      Regencies::create( [
        'code'=>'3271',
        'province_code'=>'32',
        'name'=>'KOTA BOGOR'
      ] );



      Regencies::create( [
        'code'=>'3272',
        'province_code'=>'32',
        'name'=>'KOTA SUKABUMI'
      ] );



      Regencies::create( [
        'code'=>'3273',
        'province_code'=>'32',
        'name'=>'KOTA BANDUNG'
      ] );



      Regencies::create( [
        'code'=>'3274',
        'province_code'=>'32',
        'name'=>'KOTA CIREBON'
      ] );



      Regencies::create( [
        'code'=>'3275',
        'province_code'=>'32',
        'name'=>'KOTA BEKASI'
      ] );



      Regencies::create( [
        'code'=>'3276',
        'province_code'=>'32',
        'name'=>'KOTA DEPOK'
      ] );



      Regencies::create( [
        'code'=>'3277',
        'province_code'=>'32',
        'name'=>'KOTA CIMAHI'
      ] );



      Regencies::create( [
        'code'=>'3278',
        'province_code'=>'32',
        'name'=>'KOTA TASIKMALAYA'
      ] );



      Regencies::create( [
        'code'=>'3279',
        'province_code'=>'32',
        'name'=>'KOTA BANJAR'
      ] );



      Regencies::create( [
        'code'=>'3301',
        'province_code'=>'33',
        'name'=>'KABUPATEN CILACAP'
      ] );



      Regencies::create( [
        'code'=>'3302',
        'province_code'=>'33',
        'name'=>'KABUPATEN BANYUMAS'
      ] );



      Regencies::create( [
        'code'=>'3303',
        'province_code'=>'33',
        'name'=>'KABUPATEN PURBALINGGA'
      ] );



      Regencies::create( [
        'code'=>'3304',
        'province_code'=>'33',
        'name'=>'KABUPATEN BANJARNEGARA'
      ] );



      Regencies::create( [
        'code'=>'3305',
        'province_code'=>'33',
        'name'=>'KABUPATEN KEBUMEN'
      ] );



      Regencies::create( [
        'code'=>'3306',
        'province_code'=>'33',
        'name'=>'KABUPATEN PURWOREJO'
      ] );



      Regencies::create( [
        'code'=>'3307',
        'province_code'=>'33',
        'name'=>'KABUPATEN WONOSOBO'
      ] );



      Regencies::create( [
        'code'=>'3308',
        'province_code'=>'33',
        'name'=>'KABUPATEN MAGELANG'
      ] );



      Regencies::create( [
        'code'=>'3309',
        'province_code'=>'33',
        'name'=>'KABUPATEN BOYOLALI'
      ] );



      Regencies::create( [
        'code'=>'3310',
        'province_code'=>'33',
        'name'=>'KABUPATEN KLATEN'
      ] );



      Regencies::create( [
        'code'=>'3311',
        'province_code'=>'33',
        'name'=>'KABUPATEN SUKOHARJO'
      ] );



      Regencies::create( [
        'code'=>'3312',
        'province_code'=>'33',
        'name'=>'KABUPATEN WONOGIRI'
      ] );



      Regencies::create( [
        'code'=>'3313',
        'province_code'=>'33',
        'name'=>'KABUPATEN KARANGANYAR'
      ] );
      Regencies::create( [
        'code'=>'3314',
        'province_code'=>'33',
        'name'=>'KABUPATEN SRAGEN'
      ] );



      Regencies::create( [
        'code'=>'3315',
        'province_code'=>'33',
        'name'=>'KABUPATEN GROBOGAN'
      ] );



      Regencies::create( [
        'code'=>'3316',
        'province_code'=>'33',
        'name'=>'KABUPATEN BLORA'
      ] );



      Regencies::create( [
        'code'=>'3317',
        'province_code'=>'33',
        'name'=>'KABUPATEN REMBANG'
      ] );



      Regencies::create( [
        'code'=>'3318',
        'province_code'=>'33',
        'name'=>'KABUPATEN PATI'
      ] );



      Regencies::create( [
        'code'=>'3319',
        'province_code'=>'33',
        'name'=>'KABUPATEN KUDUS'
      ] );



      Regencies::create( [
        'code'=>'3320',
        'province_code'=>'33',
        'name'=>'KABUPATEN JEPARA'
      ] );



      Regencies::create( [
        'code'=>'3321',
        'province_code'=>'33',
        'name'=>'KABUPATEN DEMAK'
      ] );



      Regencies::create( [
        'code'=>'3322',
        'province_code'=>'33',
        'name'=>'KABUPATEN SEMARANG'
      ] );



      Regencies::create( [
        'code'=>'3323',
        'province_code'=>'33',
        'name'=>'KABUPATEN TEMANGGUNG'
      ] );



      Regencies::create( [
        'code'=>'3324',
        'province_code'=>'33',
        'name'=>'KABUPATEN KENDAL'
      ] );



      Regencies::create( [
        'code'=>'3325',
        'province_code'=>'33',
        'name'=>'KABUPATEN BATANG'
      ] );



      Regencies::create( [
        'code'=>'3326',
        'province_code'=>'33',
        'name'=>'KABUPATEN PEKALONGAN'
      ] );



      Regencies::create( [
        'code'=>'3327',
        'province_code'=>'33',
        'name'=>'KABUPATEN PEMALANG'
      ] );



      Regencies::create( [
        'code'=>'3328',
        'province_code'=>'33',
        'name'=>'KABUPATEN TEGAL'
      ] );



      Regencies::create( [
        'code'=>'3329',
        'province_code'=>'33',
        'name'=>'KABUPATEN BREBES'
      ] );



      Regencies::create( [
        'code'=>'3371',
        'province_code'=>'33',
        'name'=>'KOTA MAGELANG'
      ] );



      Regencies::create( [
        'code'=>'3372',
        'province_code'=>'33',
        'name'=>'KOTA SURAKARTA'
      ] );



      Regencies::create( [
        'code'=>'3373',
        'province_code'=>'33',
        'name'=>'KOTA SALATIGA'
      ] );



      Regencies::create( [
        'code'=>'3374',
        'province_code'=>'33',
        'name'=>'KOTA SEMARANG'
      ] );



      Regencies::create( [
        'code'=>'3375',
        'province_code'=>'33',
        'name'=>'KOTA PEKALONGAN'
      ] );



      Regencies::create( [
        'code'=>'3376',
        'province_code'=>'33',
        'name'=>'KOTA TEGAL'
      ] );



      Regencies::create( [
        'code'=>'3401',
        'province_code'=>'34',
        'name'=>'KABUPATEN KULON PROGO'
      ] );



      Regencies::create( [
        'code'=>'3402',
        'province_code'=>'34',
        'name'=>'KABUPATEN BANTUL'
      ] );



      Regencies::create( [
        'code'=>'3403',
        'province_code'=>'34',
        'name'=>'KABUPATEN GUNUNG KIDUL'
      ] );



      Regencies::create( [
        'code'=>'3404',
        'province_code'=>'34',
        'name'=>'KABUPATEN SLEMAN'
      ] );



      Regencies::create( [
        'code'=>'3471',
        'province_code'=>'34',
        'name'=>'KOTA YOGYAKARTA'
      ] );



      Regencies::create( [
        'code'=>'3501',
        'province_code'=>'35',
        'name'=>'KABUPATEN PACITAN'
      ] );



      Regencies::create( [
        'code'=>'3502',
        'province_code'=>'35',
        'name'=>'KABUPATEN PONOROGO'
      ] );



      Regencies::create( [
        'code'=>'3503',
        'province_code'=>'35',
        'name'=>'KABUPATEN TRENGGALEK'
      ] );



      Regencies::create( [
        'code'=>'3504',
        'province_code'=>'35',
        'name'=>'KABUPATEN TULUNGAGUNG'
      ] );



      Regencies::create( [
        'code'=>'3505',
        'province_code'=>'35',
        'name'=>'KABUPATEN BLITAR'
      ] );



      Regencies::create( [
        'code'=>'3506',
        'province_code'=>'35',
        'name'=>'KABUPATEN KEDIRI'
      ] );



      Regencies::create( [
        'code'=>'3507',
        'province_code'=>'35',
        'name'=>'KABUPATEN MALANG'
      ] );



      Regencies::create( [
        'code'=>'3508',
        'province_code'=>'35',
        'name'=>'KABUPATEN LUMAJANG'
      ] );



      Regencies::create( [
        'code'=>'3509',
        'province_code'=>'35',
        'name'=>'KABUPATEN JEMBER'
      ] );



      Regencies::create( [
        'code'=>'3510',
        'province_code'=>'35',
        'name'=>'KABUPATEN BANYUWANGI'
      ] );



      Regencies::create( [
        'code'=>'3511',
        'province_code'=>'35',
        'name'=>'KABUPATEN BONDOWOSO'
      ] );



      Regencies::create( [
        'code'=>'3512',
        'province_code'=>'35',
        'name'=>'KABUPATEN SITUBONDO'
      ] );



      Regencies::create( [
        'code'=>'3513',
        'province_code'=>'35',
        'name'=>'KABUPATEN PROBOLINGGO'
      ] );



      Regencies::create( [
        'code'=>'3514',
        'province_code'=>'35',
        'name'=>'KABUPATEN PASURUAN'
      ] );



      Regencies::create( [
        'code'=>'3515',
        'province_code'=>'35',
        'name'=>'KABUPATEN SIDOARJO'
      ] );



      Regencies::create( [
        'code'=>'3516',
        'province_code'=>'35',
        'name'=>'KABUPATEN MOJOKERTO'
      ] );



      Regencies::create( [
        'code'=>'3517',
        'province_code'=>'35',
        'name'=>'KABUPATEN JOMBANG'
      ] );



      Regencies::create( [
        'code'=>'3518',
        'province_code'=>'35',
        'name'=>'KABUPATEN NGANJUK'
      ] );



      Regencies::create( [
        'code'=>'3519',
        'province_code'=>'35',
        'name'=>'KABUPATEN MADIUN'
      ] );



      Regencies::create( [
        'code'=>'3520',
        'province_code'=>'35',
        'name'=>'KABUPATEN MAGETAN'
      ] );



      Regencies::create( [
        'code'=>'3521',
        'province_code'=>'35',
        'name'=>'KABUPATEN NGAWI'
      ] );



      Regencies::create( [
        'code'=>'3522',
        'province_code'=>'35',
        'name'=>'KABUPATEN BOJONEGORO'
      ] );



      Regencies::create( [
        'code'=>'3523',
        'province_code'=>'35',
        'name'=>'KABUPATEN TUBAN'
      ] );
      Regencies::create( [
        'code'=>'3524',
        'province_code'=>'35',
        'name'=>'KABUPATEN LAMONGAN'
      ] );

      Regencies::create( [
        'code'=>'3525',
        'province_code'=>'35',
        'name'=>'KABUPATEN GRESIK'
      ] );

      Regencies::create( [
        'code'=>'3526',
        'province_code'=>'35',
        'name'=>'KABUPATEN BANGKALAN'
      ] );

      Regencies::create( [
        'code'=>'3527',
        'province_code'=>'35',
        'name'=>'KABUPATEN SAMPANG'
      ] );

      Regencies::create( [
        'code'=>'3528',
        'province_code'=>'35',
        'name'=>'KABUPATEN PAMEKASAN'
      ] );

      Regencies::create( [
        'code'=>'3529',
        'province_code'=>'35',
        'name'=>'KABUPATEN SUMENEP'
      ] );

      Regencies::create( [
        'code'=>'3571',
        'province_code'=>'35',
        'name'=>'KOTA KEDIRI'
      ] );

      Regencies::create( [
        'code'=>'3572',
        'province_code'=>'35',
        'name'=>'KOTA BLITAR'
      ] );

      Regencies::create( [
        'code'=>'3573',
        'province_code'=>'35',
        'name'=>'KOTA MALANG'
      ] );

      Regencies::create( [
        'code'=>'3574',
        'province_code'=>'35',
        'name'=>'KOTA PROBOLINGGO'
      ] );

      Regencies::create( [
        'code'=>'3575',
        'province_code'=>'35',
        'name'=>'KOTA PASURUAN'
      ] );

      Regencies::create( [
        'code'=>'3576',
        'province_code'=>'35',
        'name'=>'KOTA MOJOKERTO'
      ] );

      Regencies::create( [
        'code'=>'3577',
        'province_code'=>'35',
        'name'=>'KOTA MADIUN'
      ] );

      Regencies::create( [
        'code'=>'3578',
        'province_code'=>'35',
        'name'=>'KOTA SURABAYA'
      ] );

      Regencies::create( [
        'code'=>'3579',
        'province_code'=>'35',
        'name'=>'KOTA BATU'
      ] );

      Regencies::create( [
        'code'=>'3601',
        'province_code'=>'36',
        'name'=>'KABUPATEN PANDEGLANG'
      ] );

      Regencies::create( [
        'code'=>'3602',
        'province_code'=>'36',
        'name'=>'KABUPATEN LEBAK'
      ] );

      Regencies::create( [
        'code'=>'3603',
        'province_code'=>'36',
        'name'=>'KABUPATEN TANGERANG'
      ] );

      Regencies::create( [
        'code'=>'3604',
        'province_code'=>'36',
        'name'=>'KABUPATEN SERANG'
      ] );

      Regencies::create( [
        'code'=>'3671',
        'province_code'=>'36',
        'name'=>'KOTA TANGERANG'
      ] );

      Regencies::create( [
        'code'=>'3672',
        'province_code'=>'36',
        'name'=>'KOTA CILEGON'
      ] );

      Regencies::create( [
        'code'=>'3673',
        'province_code'=>'36',
        'name'=>'KOTA SERANG'
      ] );

      Regencies::create( [
        'code'=>'3674',
        'province_code'=>'36',
        'name'=>'KOTA TANGERANG SELATAN'
      ] );

      Regencies::create( [
        'code'=>'5101',
        'province_code'=>'51',
        'name'=>'KABUPATEN JEMBRANA'
      ] );

      Regencies::create( [
        'code'=>'5102',
        'province_code'=>'51',
        'name'=>'KABUPATEN TABANAN'
      ] );

      Regencies::create( [
        'code'=>'5103',
        'province_code'=>'51',
        'name'=>'KABUPATEN BADUNG'
      ] );

      Regencies::create( [
        'code'=>'5104',
        'province_code'=>'51',
        'name'=>'KABUPATEN GIANYAR'
      ] );

      Regencies::create( [
        'code'=>'5105',
        'province_code'=>'51',
        'name'=>'KABUPATEN KLUNGKUNG'
      ] );

      Regencies::create( [
        'code'=>'5106',
        'province_code'=>'51',
        'name'=>'KABUPATEN BANGLI'
      ] );

      Regencies::create( [
        'code'=>'5107',
        'province_code'=>'51',
        'name'=>'KABUPATEN KARANG ASEM'
      ] );

      Regencies::create( [
        'code'=>'5108',
        'province_code'=>'51',
        'name'=>'KABUPATEN BULELENG'
      ] );

      Regencies::create( [
        'code'=>'5171',
        'province_code'=>'51',
        'name'=>'KOTA DENPASAR'
      ] );

      Regencies::create( [
        'code'=>'5201',
        'province_code'=>'52',
        'name'=>'KABUPATEN LOMBOK BARAT'
      ] );

      Regencies::create( [
        'code'=>'5202',
        'province_code'=>'52',
        'name'=>'KABUPATEN LOMBOK TENGAH'
      ] );

      Regencies::create( [
        'code'=>'5203',
        'province_code'=>'52',
        'name'=>'KABUPATEN LOMBOK TIMUR'
      ] );

      Regencies::create( [
        'code'=>'5204',
        'province_code'=>'52',
        'name'=>'KABUPATEN SUMBAWA'
      ] );

      Regencies::create( [
        'code'=>'5205',
        'province_code'=>'52',
        'name'=>'KABUPATEN DOMPU'
      ] );

      Regencies::create( [
        'code'=>'5206',
        'province_code'=>'52',
        'name'=>'KABUPATEN BIMA'
      ] );

      Regencies::create( [
        'code'=>'5207',
        'province_code'=>'52',
        'name'=>'KABUPATEN SUMBAWA BARAT'
      ] );

      Regencies::create( [
        'code'=>'5208',
        'province_code'=>'52',
        'name'=>'KABUPATEN LOMBOK UTARA'
      ] );

      Regencies::create( [
        'code'=>'5271',
        'province_code'=>'52',
        'name'=>'KOTA MATARAM'
      ] );

      Regencies::create( [
        'code'=>'5272',
        'province_code'=>'52',
        'name'=>'KOTA BIMA'
      ] );

      Regencies::create( [
        'code'=>'5301',
        'province_code'=>'53',
        'name'=>'KABUPATEN SUMBA BARAT'
      ] );

      Regencies::create( [
        'code'=>'5302',
        'province_code'=>'53',
        'name'=>'KABUPATEN SUMBA TIMUR'
      ] );

      Regencies::create( [
        'code'=>'5303',
        'province_code'=>'53',
        'name'=>'KABUPATEN KUPANG'
      ] );

      Regencies::create( [
        'code'=>'5304',
        'province_code'=>'53',
        'name'=>'KABUPATEN TIMOR TENGAH SELATAN'
      ] );

      Regencies::create( [
        'code'=>'5305',
        'province_code'=>'53',
        'name'=>'KABUPATEN TIMOR TENGAH UTARA'
      ] );

      Regencies::create( [
        'code'=>'5306',
        'province_code'=>'53',
        'name'=>'KABUPATEN BELU'
      ] );

      Regencies::create( [
        'code'=>'5307',
        'province_code'=>'53',
        'name'=>'KABUPATEN ALOR'
      ] );

      Regencies::create( [
        'code'=>'5308',
        'province_code'=>'53',
        'name'=>'KABUPATEN LEMBATA'
      ] );
      Regencies::create( [
        'code'=>'5309',
        'province_code'=>'53',
        'name'=>'KABUPATEN FLORES TIMUR'
      ] );



      Regencies::create( [
        'code'=>'5310',
        'province_code'=>'53',
        'name'=>'KABUPATEN SIKKA'
      ] );



      Regencies::create( [
        'code'=>'5311',
        'province_code'=>'53',
        'name'=>'KABUPATEN ENDE'
      ] );



      Regencies::create( [
        'code'=>'5312',
        'province_code'=>'53',
        'name'=>'KABUPATEN NGADA'
      ] );



      Regencies::create( [
        'code'=>'5313',
        'province_code'=>'53',
        'name'=>'KABUPATEN MANGGARAI'
      ] );



      Regencies::create( [
        'code'=>'5314',
        'province_code'=>'53',
        'name'=>'KABUPATEN ROTE NDAO'
      ] );



      Regencies::create( [
        'code'=>'5315',
        'province_code'=>'53',
        'name'=>'KABUPATEN MANGGARAI BARAT'
      ] );



      Regencies::create( [
        'code'=>'5316',
        'province_code'=>'53',
        'name'=>'KABUPATEN SUMBA TENGAH'
      ] );



      Regencies::create( [
        'code'=>'5317',
        'province_code'=>'53',
        'name'=>'KABUPATEN SUMBA BARAT DAYA'
      ] );



      Regencies::create( [
        'code'=>'5318',
        'province_code'=>'53',
        'name'=>'KABUPATEN NAGEKEO'
      ] );



      Regencies::create( [
        'code'=>'5319',
        'province_code'=>'53',
        'name'=>'KABUPATEN MANGGARAI TIMUR'
      ] );



      Regencies::create( [
        'code'=>'5320',
        'province_code'=>'53',
        'name'=>'KABUPATEN SABU RAIJUA'
      ] );



      Regencies::create( [
        'code'=>'5321',
        'province_code'=>'53',
        'name'=>'KABUPATEN MALAKA'
      ] );



      Regencies::create( [
        'code'=>'5371',
        'province_code'=>'53',
        'name'=>'KOTA KUPANG'
      ] );



      Regencies::create( [
        'code'=>'6101',
        'province_code'=>'61',
        'name'=>'KABUPATEN SAMBAS'
      ] );



      Regencies::create( [
        'code'=>'6102',
        'province_code'=>'61',
        'name'=>'KABUPATEN BENGKAYANG'
      ] );



      Regencies::create( [
        'code'=>'6103',
        'province_code'=>'61',
        'name'=>'KABUPATEN LANDAK'
      ] );



      Regencies::create( [
        'code'=>'6104',
        'province_code'=>'61',
        'name'=>'KABUPATEN MEMPAWAH'
      ] );



      Regencies::create( [
        'code'=>'6105',
        'province_code'=>'61',
        'name'=>'KABUPATEN SANGGAU'
      ] );



      Regencies::create( [
        'code'=>'6106',
        'province_code'=>'61',
        'name'=>'KABUPATEN KETAPANG'
      ] );



      Regencies::create( [
        'code'=>'6107',
        'province_code'=>'61',
        'name'=>'KABUPATEN SINTANG'
      ] );



      Regencies::create( [
        'code'=>'6108',
        'province_code'=>'61',
        'name'=>'KABUPATEN KAPUAS HULU'
      ] );



      Regencies::create( [
        'code'=>'6109',
        'province_code'=>'61',
        'name'=>'KABUPATEN SEKADAU'
      ] );



      Regencies::create( [
        'code'=>'6110',
        'province_code'=>'61',
        'name'=>'KABUPATEN MELAWI'
      ] );



      Regencies::create( [
        'code'=>'6111',
        'province_code'=>'61',
        'name'=>'KABUPATEN KAYONG UTARA'
      ] );



      Regencies::create( [
        'code'=>'6112',
        'province_code'=>'61',
        'name'=>'KABUPATEN KUBU RAYA'
      ] );



      Regencies::create( [
        'code'=>'6171',
        'province_code'=>'61',
        'name'=>'KOTA PONTIANAK'
      ] );



      Regencies::create( [
        'code'=>'6172',
        'province_code'=>'61',
        'name'=>'KOTA SINGKAWANG'
      ] );



      Regencies::create( [
        'code'=>'6201',
        'province_code'=>'62',
        'name'=>'KABUPATEN KOTAWARINGIN BARAT'
      ] );



      Regencies::create( [
        'code'=>'6202',
        'province_code'=>'62',
        'name'=>'KABUPATEN KOTAWARINGIN TIMUR'
      ] );



      Regencies::create( [
        'code'=>'6203',
        'province_code'=>'62',
        'name'=>'KABUPATEN KAPUAS'
      ] );



      Regencies::create( [
        'code'=>'6204',
        'province_code'=>'62',
        'name'=>'KABUPATEN BARITO SELATAN'
      ] );



      Regencies::create( [
        'code'=>'6205',
        'province_code'=>'62',
        'name'=>'KABUPATEN BARITO UTARA'
      ] );



      Regencies::create( [
        'code'=>'6206',
        'province_code'=>'62',
        'name'=>'KABUPATEN SUKAMARA'
      ] );



      Regencies::create( [
        'code'=>'6207',
        'province_code'=>'62',
        'name'=>'KABUPATEN LAMANDAU'
      ] );



      Regencies::create( [
        'code'=>'6208',
        'province_code'=>'62',
        'name'=>'KABUPATEN SERUYAN'
      ] );



      Regencies::create( [
        'code'=>'6209',
        'province_code'=>'62',
        'name'=>'KABUPATEN KATINGAN'
      ] );



      Regencies::create( [
        'code'=>'6210',
        'province_code'=>'62',
        'name'=>'KABUPATEN PULANG PISAU'
      ] );



      Regencies::create( [
        'code'=>'6211',
        'province_code'=>'62',
        'name'=>'KABUPATEN GUNUNG MAS'
      ] );



      Regencies::create( [
        'code'=>'6212',
        'province_code'=>'62',
        'name'=>'KABUPATEN BARITO TIMUR'
      ] );



      Regencies::create( [
        'code'=>'6213',
        'province_code'=>'62',
        'name'=>'KABUPATEN MURUNG RAYA'
      ] );



      Regencies::create( [
        'code'=>'6271',
        'province_code'=>'62',
        'name'=>'KOTA PALANGKA RAYA'
      ] );



      Regencies::create( [
        'code'=>'6301',
        'province_code'=>'63',
        'name'=>'KABUPATEN TANAH LAUT'
      ] );



      Regencies::create( [
        'code'=>'6302',
        'province_code'=>'63',
        'name'=>'KABUPATEN KOTA BARU'
      ] );



      Regencies::create( [
        'code'=>'6303',
        'province_code'=>'63',
        'name'=>'KABUPATEN BANJAR'
      ] );



      Regencies::create( [
        'code'=>'6304',
        'province_code'=>'63',
        'name'=>'KABUPATEN BARITO KUALA'
      ] );



      Regencies::create( [
        'code'=>'6305',
        'province_code'=>'63',
        'name'=>'KABUPATEN TAPIN'
      ] );



      Regencies::create( [
        'code'=>'6306',
        'province_code'=>'63',
        'name'=>'KABUPATEN HULU SUNGAI SELATAN'
      ] );



      Regencies::create( [
        'code'=>'6307',
        'province_code'=>'63',
        'name'=>'KABUPATEN HULU SUNGAI TENGAH'
      ] );



      Regencies::create( [
        'code'=>'6308',
        'province_code'=>'63',
        'name'=>'KABUPATEN HULU SUNGAI UTARA'
      ] );
      Regencies::create( [
        'code'=>'6309',
        'province_code'=>'63',
        'name'=>'KABUPATEN TABALONG'
      ] );



      Regencies::create( [
        'code'=>'6310',
        'province_code'=>'63',
        'name'=>'KABUPATEN TANAH BUMBU'
      ] );



      Regencies::create( [
        'code'=>'6311',
        'province_code'=>'63',
        'name'=>'KABUPATEN BALANGAN'
      ] );



      Regencies::create( [
        'code'=>'6371',
        'province_code'=>'63',
        'name'=>'KOTA BANJARMASIN'
      ] );



      Regencies::create( [
        'code'=>'6372',
        'province_code'=>'63',
        'name'=>'KOTA BANJAR BARU'
      ] );



      Regencies::create( [
        'code'=>'6401',
        'province_code'=>'64',
        'name'=>'KABUPATEN PASER'
      ] );



      Regencies::create( [
        'code'=>'6402',
        'province_code'=>'64',
        'name'=>'KABUPATEN KUTAI BARAT'
      ] );



      Regencies::create( [
        'code'=>'6403',
        'province_code'=>'64',
        'name'=>'KABUPATEN KUTAI KARTANEGARA'
      ] );



      Regencies::create( [
        'code'=>'6404',
        'province_code'=>'64',
        'name'=>'KABUPATEN KUTAI TIMUR'
      ] );



      Regencies::create( [
        'code'=>'6405',
        'province_code'=>'64',
        'name'=>'KABUPATEN BERAU'
      ] );



      Regencies::create( [
        'code'=>'6409',
        'province_code'=>'64',
        'name'=>'KABUPATEN PENAJAM PASER UTARA'
      ] );



      Regencies::create( [
        'code'=>'6411',
        'province_code'=>'64',
        'name'=>'KABUPATEN MAHAKAM HULU'
      ] );



      Regencies::create( [
        'code'=>'6471',
        'province_code'=>'64',
        'name'=>'KOTA BALIKPAPAN'
      ] );



      Regencies::create( [
        'code'=>'6472',
        'province_code'=>'64',
        'name'=>'KOTA SAMARINDA'
      ] );



      Regencies::create( [
        'code'=>'6474',
        'province_code'=>'64',
        'name'=>'KOTA BONTANG'
      ] );



      Regencies::create( [
        'code'=>'6501',
        'province_code'=>'65',
        'name'=>'KABUPATEN MALINAU'
      ] );



      Regencies::create( [
        'code'=>'6502',
        'province_code'=>'65',
        'name'=>'KABUPATEN BULUNGAN'
      ] );



      Regencies::create( [
        'code'=>'6503',
        'province_code'=>'65',
        'name'=>'KABUPATEN TANA TIDUNG'
      ] );



      Regencies::create( [
        'code'=>'6504',
        'province_code'=>'65',
        'name'=>'KABUPATEN NUNUKAN'
      ] );



      Regencies::create( [
        'code'=>'6571',
        'province_code'=>'65',
        'name'=>'KOTA TARAKAN'
      ] );



      Regencies::create( [
        'code'=>'7101',
        'province_code'=>'71',
        'name'=>'KABUPATEN BOLAANG MONGONDOW'
      ] );



      Regencies::create( [
        'code'=>'7102',
        'province_code'=>'71',
        'name'=>'KABUPATEN MINAHASA'
      ] );



      Regencies::create( [
        'code'=>'7103',
        'province_code'=>'71',
        'name'=>'KABUPATEN KEPULAUAN SANGIHE'
      ] );



      Regencies::create( [
        'code'=>'7104',
        'province_code'=>'71',
        'name'=>'KABUPATEN KEPULAUAN TALAUD'
      ] );



      Regencies::create( [
        'code'=>'7105',
        'province_code'=>'71',
        'name'=>'KABUPATEN MINAHASA SELATAN'
      ] );



      Regencies::create( [
        'code'=>'7106',
        'province_code'=>'71',
        'name'=>'KABUPATEN MINAHASA UTARA'
      ] );



      Regencies::create( [
        'code'=>'7107',
        'province_code'=>'71',
        'name'=>'KABUPATEN BOLAANG MONGONDOW UTARA'
      ] );



      Regencies::create( [
        'code'=>'7108',
        'province_code'=>'71',
        'name'=>'KABUPATEN SIAU TAGULANDANG BIARO'
      ] );



      Regencies::create( [
        'code'=>'7109',
        'province_code'=>'71',
        'name'=>'KABUPATEN MINAHASA TENGGARA'
      ] );



      Regencies::create( [
        'code'=>'7110',
        'province_code'=>'71',
        'name'=>'KABUPATEN BOLAANG MONGONDOW SELATAN'
      ] );



      Regencies::create( [
        'code'=>'7111',
        'province_code'=>'71',
        'name'=>'KABUPATEN BOLAANG MONGONDOW TIMUR'
      ] );



      Regencies::create( [
        'code'=>'7171',
        'province_code'=>'71',
        'name'=>'KOTA MANADO'
      ] );



      Regencies::create( [
        'code'=>'7172',
        'province_code'=>'71',
        'name'=>'KOTA BITUNG'
      ] );



      Regencies::create( [
        'code'=>'7173',
        'province_code'=>'71',
        'name'=>'KOTA TOMOHON'
      ] );



      Regencies::create( [
        'code'=>'7174',
        'province_code'=>'71',
        'name'=>'KOTA KOTAMOBAGU'
      ] );



      Regencies::create( [
        'code'=>'7201',
        'province_code'=>'72',
        'name'=>'KABUPATEN BANGGAI KEPULAUAN'
      ] );



      Regencies::create( [
        'code'=>'7202',
        'province_code'=>'72',
        'name'=>'KABUPATEN BANGGAI'
      ] );



      Regencies::create( [
        'code'=>'7203',
        'province_code'=>'72',
        'name'=>'KABUPATEN MOROWALI'
      ] );



      Regencies::create( [
        'code'=>'7204',
        'province_code'=>'72',
        'name'=>'KABUPATEN POSO'
      ] );



      Regencies::create( [
        'code'=>'7205',
        'province_code'=>'72',
        'name'=>'KABUPATEN DONGGALA'
      ] );



      Regencies::create( [
        'code'=>'7206',
        'province_code'=>'72',
        'name'=>'KABUPATEN TOLI-TOLI'
      ] );



      Regencies::create( [
        'code'=>'7207',
        'province_code'=>'72',
        'name'=>'KABUPATEN BUOL'
      ] );



      Regencies::create( [
        'code'=>'7208',
        'province_code'=>'72',
        'name'=>'KABUPATEN PARIGI MOUTONG'
      ] );



      Regencies::create( [
        'code'=>'7209',
        'province_code'=>'72',
        'name'=>'KABUPATEN TOJO UNA-UNA'
      ] );



      Regencies::create( [
        'code'=>'7210',
        'province_code'=>'72',
        'name'=>'KABUPATEN SIGI'
      ] );



      Regencies::create( [
        'code'=>'7211',
        'province_code'=>'72',
        'name'=>'KABUPATEN BANGGAI LAUT'
      ] );



      Regencies::create( [
        'code'=>'7212',
        'province_code'=>'72',
        'name'=>'KABUPATEN MOROWALI UTARA'
      ] );



      Regencies::create( [
        'code'=>'7271',
        'province_code'=>'72',
        'name'=>'KOTA PALU'
      ] );



      Regencies::create( [
        'code'=>'7301',
        'province_code'=>'73',
        'name'=>'KABUPATEN KEPULAUAN SELAYAR'
      ] );



      Regencies::create( [
        'code'=>'7302',
        'province_code'=>'73',
        'name'=>'KABUPATEN BULUKUMBA'
      ] );
      Regencies::create( [
        'code'=>'7303',
        'province_code'=>'73',
        'name'=>'KABUPATEN BANTAENG'
      ] );



      Regencies::create( [
        'code'=>'7304',
        'province_code'=>'73',
        'name'=>'KABUPATEN JENEPONTO'
      ] );



      Regencies::create( [
        'code'=>'7305',
        'province_code'=>'73',
        'name'=>'KABUPATEN TAKALAR'
      ] );



      Regencies::create( [
        'code'=>'7306',
        'province_code'=>'73',
        'name'=>'KABUPATEN GOWA'
      ] );



      Regencies::create( [
        'code'=>'7307',
        'province_code'=>'73',
        'name'=>'KABUPATEN SINJAI'
      ] );



      Regencies::create( [
        'code'=>'7308',
        'province_code'=>'73',
        'name'=>'KABUPATEN MAROS'
      ] );



      Regencies::create( [
        'code'=>'7309',
        'province_code'=>'73',
        'name'=>'KABUPATEN PANGKAJENE DAN KEPULAUAN'
      ] );



      Regencies::create( [
        'code'=>'7310',
        'province_code'=>'73',
        'name'=>'KABUPATEN BARRU'
      ] );



      Regencies::create( [
        'code'=>'7311',
        'province_code'=>'73',
        'name'=>'KABUPATEN BONE'
      ] );



      Regencies::create( [
        'code'=>'7312',
        'province_code'=>'73',
        'name'=>'KABUPATEN SOPPENG'
      ] );



      Regencies::create( [
        'code'=>'7313',
        'province_code'=>'73',
        'name'=>'KABUPATEN WAJO'
      ] );



      Regencies::create( [
        'code'=>'7314',
        'province_code'=>'73',
        'name'=>'KABUPATEN SIDENRENG RAPPANG'
      ] );



      Regencies::create( [
        'code'=>'7315',
        'province_code'=>'73',
        'name'=>'KABUPATEN PINRANG'
      ] );



      Regencies::create( [
        'code'=>'7316',
        'province_code'=>'73',
        'name'=>'KABUPATEN ENREKANG'
      ] );



      Regencies::create( [
        'code'=>'7317',
        'province_code'=>'73',
        'name'=>'KABUPATEN LUWU'
      ] );



      Regencies::create( [
        'code'=>'7318',
        'province_code'=>'73',
        'name'=>'KABUPATEN TANA TORAJA'
      ] );



      Regencies::create( [
        'code'=>'7322',
        'province_code'=>'73',
        'name'=>'KABUPATEN LUWU UTARA'
      ] );



      Regencies::create( [
        'code'=>'7325',
        'province_code'=>'73',
        'name'=>'KABUPATEN LUWU TIMUR'
      ] );



      Regencies::create( [
        'code'=>'7326',
        'province_code'=>'73',
        'name'=>'KABUPATEN TORAJA UTARA'
      ] );



      Regencies::create( [
        'code'=>'7371',
        'province_code'=>'73',
        'name'=>'KOTA MAKASSAR'
      ] );



      Regencies::create( [
        'code'=>'7372',
        'province_code'=>'73',
        'name'=>'KOTA PAREPARE'
      ] );



      Regencies::create( [
        'code'=>'7373',
        'province_code'=>'73',
        'name'=>'KOTA PALOPO'
      ] );



      Regencies::create( [
        'code'=>'7401',
        'province_code'=>'74',
        'name'=>'KABUPATEN BUTON'
      ] );



      Regencies::create( [
        'code'=>'7402',
        'province_code'=>'74',
        'name'=>'KABUPATEN MUNA'
      ] );



      Regencies::create( [
        'code'=>'7403',
        'province_code'=>'74',
        'name'=>'KABUPATEN KONAWE'
      ] );



      Regencies::create( [
        'code'=>'7404',
        'province_code'=>'74',
        'name'=>'KABUPATEN KOLAKA'
      ] );



      Regencies::create( [
        'code'=>'7405',
        'province_code'=>'74',
        'name'=>'KABUPATEN KONAWE SELATAN'
      ] );



      Regencies::create( [
        'code'=>'7406',
        'province_code'=>'74',
        'name'=>'KABUPATEN BOMBANA'
      ] );



      Regencies::create( [
        'code'=>'7407',
        'province_code'=>'74',
        'name'=>'KABUPATEN WAKATOBI'
      ] );



      Regencies::create( [
        'code'=>'7408',
        'province_code'=>'74',
        'name'=>'KABUPATEN KOLAKA UTARA'
      ] );



      Regencies::create( [
        'code'=>'7409',
        'province_code'=>'74',
        'name'=>'KABUPATEN BUTON UTARA'
      ] );



      Regencies::create( [
        'code'=>'7410',
        'province_code'=>'74',
        'name'=>'KABUPATEN KONAWE UTARA'
      ] );



      Regencies::create( [
        'code'=>'7411',
        'province_code'=>'74',
        'name'=>'KABUPATEN KOLAKA TIMUR'
      ] );



      Regencies::create( [
        'code'=>'7412',
        'province_code'=>'74',
        'name'=>'KABUPATEN KONAWE KEPULAUAN'
      ] );



      Regencies::create( [
        'code'=>'7413',
        'province_code'=>'74',
        'name'=>'KABUPATEN MUNA BARAT'
      ] );



      Regencies::create( [
        'code'=>'7414',
        'province_code'=>'74',
        'name'=>'KABUPATEN BUTON TENGAH'
      ] );



      Regencies::create( [
        'code'=>'7415',
        'province_code'=>'74',
        'name'=>'KABUPATEN BUTON SELATAN'
      ] );



      Regencies::create( [
        'code'=>'7471',
        'province_code'=>'74',
        'name'=>'KOTA KENDARI'
      ] );



      Regencies::create( [
        'code'=>'7472',
        'province_code'=>'74',
        'name'=>'KOTA BAUBAU'
      ] );



      Regencies::create( [
        'code'=>'7501',
        'province_code'=>'75',
        'name'=>'KABUPATEN BOALEMO'
      ] );



      Regencies::create( [
        'code'=>'7502',
        'province_code'=>'75',
        'name'=>'KABUPATEN GORONTALO'
      ] );



      Regencies::create( [
        'code'=>'7503',
        'province_code'=>'75',
        'name'=>'KABUPATEN POHUWATO'
      ] );



      Regencies::create( [
        'code'=>'7504',
        'province_code'=>'75',
        'name'=>'KABUPATEN BONE BOLANGO'
      ] );



      Regencies::create( [
        'code'=>'7505',
        'province_code'=>'75',
        'name'=>'KABUPATEN GORONTALO UTARA'
      ] );



      Regencies::create( [
        'code'=>'7571',
        'province_code'=>'75',
        'name'=>'KOTA GORONTALO'
      ] );



      Regencies::create( [
        'code'=>'7601',
        'province_code'=>'76',
        'name'=>'KABUPATEN MAJENE'
      ] );



      Regencies::create( [
        'code'=>'7602',
        'province_code'=>'76',
        'name'=>'KABUPATEN POLEWALI MANDAR'
      ] );



      Regencies::create( [
        'code'=>'7603',
        'province_code'=>'76',
        'name'=>'KABUPATEN MAMASA'
      ] );



      Regencies::create( [
        'code'=>'7604',
        'province_code'=>'76',
        'name'=>'KABUPATEN MAMUJU'
      ] );



      Regencies::create( [
        'code'=>'7605',
        'province_code'=>'76',
        'name'=>'KABUPATEN MAMUJU UTARA'
      ] );
      Regencies::create( [
        'code'=>'7606',
        'province_code'=>'76',
        'name'=>'KABUPATEN MAMUJU TENGAH'
      ] );



      Regencies::create( [
        'code'=>'8101',
        'province_code'=>'81',
        'name'=>'KABUPATEN MALUKU TENGGARA BARAT'
      ] );



      Regencies::create( [
        'code'=>'8102',
        'province_code'=>'81',
        'name'=>'KABUPATEN MALUKU TENGGARA'
      ] );



      Regencies::create( [
        'code'=>'8103',
        'province_code'=>'81',
        'name'=>'KABUPATEN MALUKU TENGAH'
      ] );



      Regencies::create( [
        'code'=>'8104',
        'province_code'=>'81',
        'name'=>'KABUPATEN BURU'
      ] );



      Regencies::create( [
        'code'=>'8105',
        'province_code'=>'81',
        'name'=>'KABUPATEN KEPULAUAN ARU'
      ] );



      Regencies::create( [
        'code'=>'8106',
        'province_code'=>'81',
        'name'=>'KABUPATEN SERAM BAGIAN BARAT'
      ] );



      Regencies::create( [
        'code'=>'8107',
        'province_code'=>'81',
        'name'=>'KABUPATEN SERAM BAGIAN TIMUR'
      ] );



      Regencies::create( [
        'code'=>'8108',
        'province_code'=>'81',
        'name'=>'KABUPATEN MALUKU BARAT DAYA'
      ] );



      Regencies::create( [
        'code'=>'8109',
        'province_code'=>'81',
        'name'=>'KABUPATEN BURU SELATAN'
      ] );



      Regencies::create( [
        'code'=>'8171',
        'province_code'=>'81',
        'name'=>'KOTA AMBON'
      ] );



      Regencies::create( [
        'code'=>'8172',
        'province_code'=>'81',
        'name'=>'KOTA TUAL'
      ] );



      Regencies::create( [
        'code'=>'8201',
        'province_code'=>'82',
        'name'=>'KABUPATEN HALMAHERA BARAT'
      ] );



      Regencies::create( [
        'code'=>'8202',
        'province_code'=>'82',
        'name'=>'KABUPATEN HALMAHERA TENGAH'
      ] );



      Regencies::create( [
        'code'=>'8203',
        'province_code'=>'82',
        'name'=>'KABUPATEN KEPULAUAN SULA'
      ] );



      Regencies::create( [
        'code'=>'8204',
        'province_code'=>'82',
        'name'=>'KABUPATEN HALMAHERA SELATAN'
      ] );



      Regencies::create( [
        'code'=>'8205',
        'province_code'=>'82',
        'name'=>'KABUPATEN HALMAHERA UTARA'
      ] );



      Regencies::create( [
        'code'=>'8206',
        'province_code'=>'82',
        'name'=>'KABUPATEN HALMAHERA TIMUR'
      ] );



      Regencies::create( [
        'code'=>'8207',
        'province_code'=>'82',
        'name'=>'KABUPATEN PULAU MOROTAI'
      ] );



      Regencies::create( [
        'code'=>'8208',
        'province_code'=>'82',
        'name'=>'KABUPATEN PULAU TALIABU'
      ] );



      Regencies::create( [
        'code'=>'8271',
        'province_code'=>'82',
        'name'=>'KOTA TERNATE'
      ] );



      Regencies::create( [
        'code'=>'8272',
        'province_code'=>'82',
        'name'=>'KOTA TIDORE KEPULAUAN'
      ] );



      Regencies::create( [
        'code'=>'9101',
        'province_code'=>'91',
        'name'=>'KABUPATEN FAKFAK'
      ] );



      Regencies::create( [
        'code'=>'9102',
        'province_code'=>'91',
        'name'=>'KABUPATEN KAIMANA'
      ] );



      Regencies::create( [
        'code'=>'9103',
        'province_code'=>'91',
        'name'=>'KABUPATEN TELUK WONDAMA'
      ] );



      Regencies::create( [
        'code'=>'9104',
        'province_code'=>'91',
        'name'=>'KABUPATEN TELUK BINTUNI'
      ] );



      Regencies::create( [
        'code'=>'9105',
        'province_code'=>'91',
        'name'=>'KABUPATEN MANOKWARI'
      ] );



      Regencies::create( [
        'code'=>'9106',
        'province_code'=>'91',
        'name'=>'KABUPATEN SORONG SELATAN'
      ] );



      Regencies::create( [
        'code'=>'9107',
        'province_code'=>'91',
        'name'=>'KABUPATEN SORONG'
      ] );



      Regencies::create( [
        'code'=>'9108',
        'province_code'=>'91',
        'name'=>'KABUPATEN RAJA AMPAT'
      ] );



      Regencies::create( [
        'code'=>'9109',
        'province_code'=>'91',
        'name'=>'KABUPATEN TAMBRAUW'
      ] );



      Regencies::create( [
        'code'=>'9110',
        'province_code'=>'91',
        'name'=>'KABUPATEN MAYBRAT'
      ] );



      Regencies::create( [
        'code'=>'9111',
        'province_code'=>'91',
        'name'=>'KABUPATEN MANOKWARI SELATAN'
      ] );



      Regencies::create( [
        'code'=>'9112',
        'province_code'=>'91',
        'name'=>'KABUPATEN PEGUNUNGAN ARFAK'
      ] );



      Regencies::create( [
        'code'=>'9171',
        'province_code'=>'91',
        'name'=>'KOTA SORONG'
      ] );



      Regencies::create( [
        'code'=>'9401',
        'province_code'=>'94',
        'name'=>'KABUPATEN MERAUKE'
      ] );



      Regencies::create( [
        'code'=>'9402',
        'province_code'=>'94',
        'name'=>'KABUPATEN JAYAWIJAYA'
      ] );



      Regencies::create( [
        'code'=>'9403',
        'province_code'=>'94',
        'name'=>'KABUPATEN JAYAPURA'
      ] );



      Regencies::create( [
        'code'=>'9404',
        'province_code'=>'94',
        'name'=>'KABUPATEN NABIRE'
      ] );



      Regencies::create( [
        'code'=>'9408',
        'province_code'=>'94',
        'name'=>'KABUPATEN KEPULAUAN YAPEN'
      ] );



      Regencies::create( [
        'code'=>'9409',
        'province_code'=>'94',
        'name'=>'KABUPATEN BIAK NUMFOR'
      ] );



      Regencies::create( [
        'code'=>'9410',
        'province_code'=>'94',
        'name'=>'KABUPATEN PANIAI'
      ] );



      Regencies::create( [
        'code'=>'9411',
        'province_code'=>'94',
        'name'=>'KABUPATEN PUNCAK JAYA'
      ] );



      Regencies::create( [
        'code'=>'9412',
        'province_code'=>'94',
        'name'=>'KABUPATEN MIMIKA'
      ] );



      Regencies::create( [
        'code'=>'9413',
        'province_code'=>'94',
        'name'=>'KABUPATEN BOVEN DIGOEL'
      ] );



      Regencies::create( [
        'code'=>'9414',
        'province_code'=>'94',
        'name'=>'KABUPATEN MAPPI'
      ] );



      Regencies::create( [
        'code'=>'9415',
        'province_code'=>'94',
        'name'=>'KABUPATEN ASMAT'
      ] );



      Regencies::create( [
        'code'=>'9416',
        'province_code'=>'94',
        'name'=>'KABUPATEN YAHUKIMO'
      ] );



      Regencies::create( [
        'code'=>'9417',
        'province_code'=>'94',
        'name'=>'KABUPATEN PEGUNUNGAN BINTANG'
      ] );



      Regencies::create( [
        'code'=>'9418',
        'province_code'=>'94',
        'name'=>'KABUPATEN TOLIKARA'
      ] );
      Regencies::create( [
        'code'=>'9419',
        'province_code'=>'94',
        'name'=>'KABUPATEN SARMI'
      ] );



      Regencies::create( [
        'code'=>'9420',
        'province_code'=>'94',
        'name'=>'KABUPATEN KEEROM'
      ] );



      Regencies::create( [
        'code'=>'9426',
        'province_code'=>'94',
        'name'=>'KABUPATEN WAROPEN'
      ] );



      Regencies::create( [
        'code'=>'9427',
        'province_code'=>'94',
        'name'=>'KABUPATEN SUPIORI'
      ] );



      Regencies::create( [
        'code'=>'9428',
        'province_code'=>'94',
        'name'=>'KABUPATEN MAMBERAMO RAYA'
      ] );



      Regencies::create( [
        'code'=>'9429',
        'province_code'=>'94',
        'name'=>'KABUPATEN NDUGA'
      ] );



      Regencies::create( [
        'code'=>'9430',
        'province_code'=>'94',
        'name'=>'KABUPATEN LANNY JAYA'
      ] );



      Regencies::create( [
        'code'=>'9431',
        'province_code'=>'94',
        'name'=>'KABUPATEN MAMBERAMO TENGAH'
      ] );



      Regencies::create( [
        'code'=>'9432',
        'province_code'=>'94',
        'name'=>'KABUPATEN YALIMO'
      ] );



      Regencies::create( [
        'code'=>'9433',
        'province_code'=>'94',
        'name'=>'KABUPATEN PUNCAK'
      ] );



      Regencies::create( [
        'code'=>'9434',
        'province_code'=>'94',
        'name'=>'KABUPATEN DOGIYAI'
      ] );



      Regencies::create( [
        'code'=>'9435',
        'province_code'=>'94',
        'name'=>'KABUPATEN INTAN JAYA'
      ] );
      Regencies::create( [
        'code'=>'9436',
        'province_code'=>'94',
        'name'=>'KABUPATEN DEIYAI'
      ] );
      Regencies::create( [
        'code'=>'9471',
        'province_code'=>'94',
        'name'=>'KOTA JAYAPURA'
      ] );

      $provinces = Province::all();
      foreach ($provinces as $p){
        Regencies::where('province_code', $p->code)
          ->update(['province_id' => $p->id]);
      }
    }
}
