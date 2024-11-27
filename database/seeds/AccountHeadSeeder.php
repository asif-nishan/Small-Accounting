<?php

use Illuminate\Database\Seeder;

class AccountHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_heads')->insert([
            'code' => '522',
            'name' => 'Corporate Office Rent',
            'type' => null,
        ]);
        DB::table('account_heads')->insert([
            'code' => '523',
            'name' => 'Store Rent - NIKDU',
            'type' => null,
        ]);
        DB::table('account_heads')->insert([
            'code' => '524',
            'name' => 'Store Rent - CMCH',
            'type' => null,
        ]);
        DB::table('account_heads')->insert([
            'code' => '525',
            'name' => 'Guest House Rent- NIKDU',
            'type' => null,

        ]);
        DB::table('account_heads')->insert([
            'code' => '526',
            'name' => 'Guest House Rent- CMCH',
            'type' => null,
        ]);
        DB::table('account_heads')->insert([
            'code' => '530',
            'name' => 'Professional Fees (HBD)',
            'type' => null,
        ]);
        DB::table('account_heads')->insert([
            'code' => '543',
            'name' => 'Security Services - Dhaka',
            'type' => null,
        ]);
        DB::table('account_heads')->insert([
            'code' => '544',
            'name' => 'Security Services - CMCH',
            'type' => null,
        ]);
        DB::table('account_heads')->insert([
            'code' => '537',
            'name' => 'Meals & Boarding Exp (GH- NIKDU)',
            'type' => null,
        ]);
        DB::table('account_heads')->insert([
            'code' => '538',
            'name' => 'Meals & Boarding Exp (GH- CMCH)',
            'type' => null,
        ]);
    }
}
