<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnicalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql_stockcontrol')->insert("INSERT INTO `technicals` (`id`, `name`, `fone`, `created_at`, `updated_at`) VALUES
(1, 'Marcos Luciano Lopes Rodriguez', 's/n', '2019-02-08 17:23:26', '2019-02-08 17:23:26'),
(2, 'Luciano da Silva', 's/n', '2019-02-08 17:23:42', '2019-02-08 17:23:42'),
(3, 'William Robert Pimentel', '(48) 9 9918-6741', '2019-02-08 17:23:55', '2019-03-21 12:30:26'),
(4, 'Paulo Roberto da Silva Junior', 's/n', '2019-02-08 17:24:21', '2019-02-08 17:24:21'),
(5, 'Janderson Sena', 's/n', '2019-03-06 12:43:26', '2019-03-06 12:45:36');
");
    }

}
