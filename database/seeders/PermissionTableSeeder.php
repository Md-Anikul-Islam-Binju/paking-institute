<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [

            //For roll and permission
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            //For Role and permission
            'role-and-permission-list',

            //For User
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            //Dashboard
            'card-list',


            //about
            'about-list',
            //our vision
            'vision-list',
            //join us
            'join-list',
            //leadership
            'leadership-list',
            //goal
            'goal-list',
            //career
            'career-list',
            //culture
            'culture-list',


            //management board
            'management-list',
            'management-create',
            'management-edit',
            'management-delete',

            //expert category board
            'expert-category-list',
            'expert-category-create',
            'expert-category-edit',
            'expert-category-delete',





        ];
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
