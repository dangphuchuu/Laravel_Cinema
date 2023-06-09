<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

DB::table('users')->insert(
    [
        [
            'fullName' => 'Phúc Hữu',
            'password' => bcrypt('1'),
            'email' => 'admin@gmail.com',
            'phone' => '123456789',
            'code'=>rand(10000000000, 9999999999999999),
            'point'=>'10000',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'fullName' => 'Quốc Minh',
            'password' => bcrypt('1'),
            'email' => 'tqminh0907@gmail.com',
            'phone' => '789456123',
            'code'=>rand(10000000000, 9999999999999999),
            'point'=>'10000',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'fullName' => 'Phúc Hữu',
            'password' => bcrypt('1'),
            'email' => 'phuchuu0120@gmail.com',
            'phone' => '1111111',
            'code'=>rand(10000000000, 9999999999999999),
            'point'=>'10000',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'fullName' => 'Quốc Minh',
            'password' => bcrypt('1'),
            'email' => 'minh@gmail.com',
            'phone' => '1212121212',
            'code'=>rand(10000000000, 9999999999999999),
            'point'=>'10000',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]
    ]);

