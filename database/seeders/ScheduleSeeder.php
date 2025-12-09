<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $data = [
        ['day'=>'monday','subject'=>'GIM','teacher'=>'Dimas Zafir Hasmi, S.Pd.','room'=>'Lab PPLG 3','start_time'=>'07:45','end_time'=>'08:30'],
        ['day'=>'monday','subject'=>'PTGM','teacher'=>'Yan Imanita Abdillah, S.Pd.','room'=>'Lab PPLG 3','start_time'=>'08:30','end_time'=>'11:30'],
        ['day'=>'monday','subject'=>'BDT','teacher'=>'Sunar Adi Cahyono, S.Kom., Gr','room'=>'Lab PPLG 3','start_time'=>'12:30','end_time'=>'15:30'],

        ['day'=>'tuesday','subject'=>'BNG','teacher'=>'Aji Nugroho, S.S','room'=>'R.5','start_time'=>'07:45','end_time'=>'08:30'],
        ['day'=>'tuesday','subject'=>'POR','teacher'=>'Dani Eko Prasetiyo, S.Pd','room'=>'R.5','start_time'=>'08:30','end_time'=>'10:00'],
        ['day'=>'tuesday','subject'=>'BJW','teacher'=>'Esti Dian Firstyani, S.Pd','room'=>'R.5','start_time'=>'10:00','end_time'=>'10:45'],
        ['day'=>'tuesday','subject'=>'MTK','teacher'=>'Choiriyah, S.Pd., M.Pd.','room'=>'R.5','start_time'=>'10:45','end_time'=>'13:15'],
        ['day'=>'tuesday','subject'=>'SJR','teacher'=>'Dra. Ida Fitri Suryani','room'=>'R.5','start_time'=>'13:15','end_time'=>'14:00'],

        ['day'=>'wednesday','subject'=>'PTGM','teacher'=>'Yan Imanita Abdillah, S.Pd','room'=>'Lab PPLG 3','start_time'=>'07:45','end_time'=>'11:30'],
        ['day'=>'wednesday','subject'=>'PBM','teacher'=>'Dian Nirmala Santi, S.Kom','room'=>'Lab PPLG 3','start_time'=>'11:30','end_time'=>'14:45'],

        ['day'=>'thursday','subject'=>'BIN','teacher'=>'Kalim, S.Pd','room'=>'R.4','start_time'=>'07:45','end_time'=>'08:30'],
        ['day'=>'thursday','subject'=>'KIK','teacher'=>'Drs. Budi Prastowo, M.Si','room'=>'R.4','start_time'=>'08:30','end_time'=>'10:45'],
        ['day'=>'thursday','subject'=>'PPS','teacher'=>'Yunita Suciyati, S.Pd','room'=>'R.4','start_time'=>'10:45','end_time'=>'13:15'],
        ['day'=>'thursday','subject'=>'BNG','teacher'=>'Aji Nugroho, S.S','room'=>'R.4','start_time'=>'13:15','end_time'=>'14:45'],

        ['day'=>'friday','subject'=>'BJP','teacher'=>'Bayu Mada Kusuma, S.S','room'=>'R.8','start_time'=>'07:45','end_time'=>'08:30'],
        ['day'=>'friday','subject'=>'KIK','teacher'=>'Drs. Budi Prastowo, M.Si','room'=>'R.8','start_time'=>'08:30','end_time'=>'10:00'],
        ['day'=>'friday','subject'=>'BJW','teacher'=>'Esti Dian Firstyani, S.Pd','room'=>'R.8','start_time'=>'10:00','end_time'=>'11:30'],
        ['day'=>'friday','subject'=>'PABP','teacher'=>'Istiqomah, S.Ag','room'=>'R.8','start_time'=>'12:30','end_time'=>'14:00'],
    ];

    \DB::table('schedules')->insert($data);
}
}
