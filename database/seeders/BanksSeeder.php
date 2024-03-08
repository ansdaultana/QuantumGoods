<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $banks = [
            'Al Baraka Bank Limited',
            'Allied Bank Limited',
            'Askari Bank',
            'Bank Alfalah Limited',
            'Bank Al-Habib Limited',
            'BankIslami Pakistan Limited',
            'Bank Makramah Limited',
            'Bank of Punjab',
            'Bank of Khyber',
            'Deutsche Bank A.G',
            'Dubai Islamic Bank Pakistan Limited',
            'Faysal Bank Limited',
            'First Women Bank Limited',
            'Habib Bank Limited',
            'Habib Metropolitan Bank Limited',
            'Industrial and Commercial Bank of China',
            'Industrial Development Bank of Pakistan',
            'JS Bank Limited',
            'MCB Bank Limited',
            'MCB Islamic Bank Limited',
            'Meezan Bank Limited',
            'National Bank of Pakistan',
            'Soneri Bank Limited',
            'Standard Chartered Bank Limited',
            'Sindh Bank',
            'The Bank of Tokyo-Mitsubishi UFJ',
            'United Bank Limited',
            'Zarai Taraqiati Bank Limited',
        ];

        // Insert bank names into the database
        foreach ($banks as $bank) {
            DB::table('banks')->insert([
                'name' => $bank,
            ]);
        }
    }
}
