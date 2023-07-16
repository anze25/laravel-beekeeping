<?php

namespace Database\Seeders;

use App\Models\ShipState;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use Illuminate\Database\Seeder;

class DivisionDistrictStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 5; $x++) {
            $divisionId = ShipDivision::insertGetId([
                'division_name' => 'Division ' . $x
            ]);
            for ($y = 1; $y <= 5; $y++) {
                $districId = ShipDistrict::insertGetId([
                    'division_id' => $divisionId,
                    'district_name' => 'District ' . $y

                ]);
                for ($z = 1; $z <= 3; $z++) {
                    $stateId = ShipState::insertGetId([
                        'division_id' => $divisionId,
                        'district_id' => $districId,
                        'state_name' => 'State ' . $z

                    ]);
                }
            }
        }
    }
}
