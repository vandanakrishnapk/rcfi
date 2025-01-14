<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class leavetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leave_types')->insert([
            ['leave_name' => 'Casual Leave', 'short_name' => 'CL', 'yearly_limit' => 12, 'carry_forward_limit' => 12],
            ['leave_name' => 'Sick Leave', 'short_name' => 'SL', 'yearly_limit' => 10, 'carry_forward_limit' => null],
            ['leave_name' => 'Marriage Leave', 'short_name' => 'ML', 'yearly_limit' => 7, 'carry_forward_limit' => null],
            ['leave_name' => 'Paternity Leave', 'short_name' => 'Pat.L', 'yearly_limit' => 3, 'carry_forward_limit' => null],
            ['leave_name' => 'Maternity Leave', 'short_name' => 'Mat.L', 'yearly_limit' => 135, 'carry_forward_limit' => null],
            ['leave_name' => 'Pilgrimage Leave', 'short_name' => 'Pil.L', 'yearly_limit' => 20, 'carry_forward_limit' => null],
            ['leave_name' => 'Long Service Leave', 'short_name' => 'LSL', 'yearly_limit' => 10, 'carry_forward_limit' => null],
            ['leave_name' => 'Week Off', 'short_name' => 'WO', 'yearly_limit' => null, 'carry_forward_limit' => null],
            ['leave_name' => 'Leave Without Payment', 'short_name' => 'LWP', 'yearly_limit' => null, 'carry_forward_limit' => null],
            ['leave_name' => 'Extra Ordinary Leave', 'short_name' => 'EOL', 'yearly_limit' => null, 'carry_forward_limit' => null],
            ['leave_name' => 'Holiday Leave', 'short_name' => 'HL', 'yearly_limit' => null, 'carry_forward_limit' => null],
        ]);
    
    }
}
