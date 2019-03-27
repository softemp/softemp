<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentDestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql_stockcontrol')->insert("INSERT INTO `equipment_destinations` (`id`, `equipment_id`, `order_out_id`, `destination`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'jemmy.0811', '2019-02-12 13:24:20', '2019-02-12 13:24:20'),
(2, 13, 3, 'maria.5208', '2019-02-15 13:10:47', '2019-02-15 13:10:47'),
(3, 7, 4, 'maria.5208', '2019-02-15 13:12:20', '2019-02-15 13:12:20'),
(4, 9, 7, 'Instalação tuanne.0813', '2019-02-19 19:51:48', '2019-02-19 19:51:48'),
(5, 11, 9, 'tuanne.0813', '2019-02-19 19:59:49', '2019-02-19 19:59:49'),
(6, 61, 10, 'Renato.1475 Renato Meirelles Leite Filho. \r\nTroca de equipamento', '2019-02-26 19:09:13', '2019-02-26 19:09:13'),
(7, 23, 7, 'Foi usada para substituir equipamento.\r\nNão foi anotado o nome do cliente', '2019-02-26 19:19:42', '2019-02-26 19:19:42'),
(8, 38, 8, 'Feita a troca da antena, não foi anotado o nome do cliente', '2019-02-26 19:29:20', '2019-02-26 19:29:20'),
(9, 4, 11, 'joelson.0592', '2019-02-28 16:40:52', '2019-02-28 16:40:52'),
(10, 45, 15, 'Joelson de Carvalho Pacheco instalação', '2019-03-04 18:07:48', '2019-03-04 18:07:48'),
(11, 84, 17, 'Tayana Cezimbra Matté instalação', '2019-03-04 18:12:48', '2019-03-04 18:12:48'),
(12, 48, 16, 'Tayana Cezimbra Matté instalação.', '2019-03-04 18:13:07', '2019-03-04 18:13:07'),
(13, 2, 12, 'Carla Daiane dos Anjos instalação', '2019-03-04 18:18:13', '2019-03-04 18:18:13'),
(14, 55, 12, 'Carla Daiane dos Anjos instalação', '2019-03-04 18:18:21', '2019-03-04 18:18:21'),
(15, 2, 18, 'Carla Daiane dos Anjos troca de equipamento.(superaquecendo)', '2019-03-04 18:25:28', '2019-03-04 18:25:28'),
(16, 55, 18, 'Carla Daiane dos Anjos troca de equipamento.(superaquecendo)', '2019-03-04 18:25:32', '2019-03-04 18:25:32'),
(17, 8, 19, 'Bruno Rangel Zilz instalação', '2019-03-04 18:31:56', '2019-03-04 18:31:56'),
(18, 57, 19, 'Bruno Rangel Zilz instalação', '2019-03-04 18:32:08', '2019-03-04 18:32:08'),
(19, 5, 20, 'Mirian Pereira de Souza (Instalação)', '2019-03-04 18:35:04', '2019-03-04 18:35:04'),
(20, 47, 20, 'Mirian Pereira de Souza (Instalação)', '2019-03-04 18:35:08', '2019-03-04 18:35:08'),
(21, 21, 6, 'Rui Carlos Marques de Barcellos equipamento substituído dia 01/03/2019', '2019-03-04 18:41:46', '2019-03-04 18:41:46'),
(22, 1, 24, 'Mercado VAVA', '2019-03-06 13:24:20', '2019-03-06 13:24:20'),
(23, 91, 34, 'Troca de equipamento Zenilto Ferreirra de Jesus 09/03/2019', '2019-03-12 13:48:41', '2019-03-12 13:48:41'),
(24, 58, 30, 'Vilmar Soares Instalação nova', '2019-03-12 13:58:10', '2019-03-12 13:58:10'),
(25, 90, 32, 'Vilmar Soares Instalação nova', '2019-03-12 13:58:36', '2019-03-12 13:58:36'),
(26, 52, 36, 'JANAINA.0693', '2019-03-13 15:01:50', '2019-03-13 15:01:50'),
(27, 82, 35, 'Leandro.0455 feito transferência de fibra para o rádio.\r\nFoi retirada a ONU e instalada a antena APC 5A 20', '2019-03-13 19:36:53', '2019-03-13 19:36:53'),
(28, 51, 13, 'Daiane Marques Soares Instalação nova.', '2019-03-13 19:59:21', '2019-03-13 19:59:21'),
(29, 44, 26, 'Monique Cardoso da Silva roteador substituído  06/03/2019', '2019-03-13 20:16:56', '2019-03-13 20:16:56'),
(30, 74, 38, 'Tatiane de Souza Leandro antena trocada dia 28/02/2019', '2019-03-13 20:19:37', '2019-03-13 20:19:37'),
(31, 10, 1, 'Jemmy Edgard Ficher Neto  instalação nova 09/02/2019', '2019-03-13 20:56:48', '2019-03-13 20:56:48'),
(32, 14, 1, 'Jemmy Edgard Ficher Neto instalação 09/02/2019', '2019-03-13 20:57:57', '2019-03-13 20:57:57'),
(33, 50, 39, 'Bruno de Avila Martins instalação nova', '2019-03-13 21:18:31', '2019-03-13 21:18:31'),
(34, 56, 39, 'Danilo de Campos instalação nova', '2019-03-13 21:18:53', '2019-03-13 21:18:53'),
(35, 120, 40, 'Danilo de Campos danilo.1060 instalação nova', '2019-03-13 21:24:02', '2019-03-13 21:24:02'),
(36, 54, 33, 'Jomae Embalagens LTDA-ME instalação nova.', '2019-03-14 11:51:49', '2019-03-14 11:51:49'),
(37, 53, 41, 'segundo ponto de cyndel.0729.1', '2019-03-15 13:14:14', '2019-03-15 13:14:14'),
(38, 122, 41, 'segundo ponto de cyndel.0729.1', '2019-03-15 13:14:19', '2019-03-15 13:14:19'),
(39, 3, 13, 'rui.0630', '2019-03-15 14:52:53', '2019-03-15 14:52:53'),
(40, 125, 43, 'Instalação Mariana.0949 cabo WDS central gabriel', '2019-03-15 19:56:04', '2019-03-15 19:56:04'),
(41, 99, 48, 'Cristiane Oliveira da Silva instalação nova Cristiane.0561', '2019-03-19 13:34:29', '2019-03-19 13:34:29'),
(42, 112, 44, 'Clades.0074 colocada no dia da tranferência', '2019-03-19 14:44:23', '2019-03-19 14:44:23'),
(43, 107, 51, 'Maria Eliete Julio Fernandes antena substituída dia 18/03/2019', '2019-03-19 18:51:07', '2019-03-19 18:51:07'),
(44, 43, 50, 'Cliente francisco.8890', '2019-03-19 19:07:11', '2019-03-19 19:07:11'),
(45, 116, 49, 'Troca de equipamento cliente antonio.78479', '2019-03-19 20:03:02', '2019-03-19 20:03:02'),
(46, 28, 49, 'Instalação cristiane.0166', '2019-03-19 20:04:05', '2019-03-19 20:04:05'),
(47, 49, 49, 'Instalação cristiane.0166', '2019-03-19 20:04:22', '2019-03-19 20:04:22'),
(48, 136, 53, 'Paul Miller troca de antena dia 19-03-2019', '2019-03-20 12:32:40', '2019-03-20 12:32:40'),
(49, 128, 52, 'darla.0851 troca de equipamento', '2019-03-21 14:15:36', '2019-03-21 14:15:36'),
(50, 124, 52, 'aline.0297 transferência de fibra para rádio.', '2019-03-21 14:16:07', '2019-03-21 14:16:07');");
    }
}
