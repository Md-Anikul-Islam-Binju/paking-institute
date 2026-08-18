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
            //approach
            'approach-list',
            //how work
            'how-work-list',
            //partnership
            'partnership-list',
            //future
            'future-list',
            //radical
            'radical-list',
            //slider
            'slider-list',
            //setting
            'setting-list',

            //news-letter board
            'news-letter-list',
            'news-letter-create',
            'news-letter-edit',
            'news-letter-delete',

            //site setting board
            'site-setting-list',
            'site-setting-create',
            'site-setting-edit',
            'site-setting-delete',



            //management board
            'management-list',
            'management-create',
            'management-edit',
            'management-delete',

            //involved board
            'involved-list',
            'involved-create',
            'involved-edit',
            'involved-delete',

            //key benefit board
            'key-benefit-list',
            'key-benefit-create',
            'key-benefit-edit',
            'key-benefit-delete',

            //expert category board
            'expert-category-list',
            'expert-category-create',
            'expert-category-edit',
            'expert-category-delete',

            //insight type board
            'insight-type-list',
            'insight-type-create',
            'insight-type-edit',
            'insight-type-delete',

            //about slider
            'about-slider-list',
            'about-slider-create',
            'about-slider-edit',
            'about-slider-delete',


            //insight  board
            'insight-list',
            'insight-create',
            'insight-edit',
            'insight-delete',

            //insight book board
            'insight-book-list',
            'insight-book-create',
            'insight-book-edit',
            'insight-book-delete',

            //explore board
            'explore-list',
            'explore-create',
            'explore-edit',
            'explore-delete',

            //explore vision
            'explore-vision-list',
            'explore-vision-create',
            'explore-vision-edit',
            'explore-vision-delete',

            //conference category
            'conference-category-list',
            'conference-category-create',
            'conference-category-edit',
            'conference-category-delete',

            //conference sub category
            'conference-sub-category-list',
            'conference-sub-category-create',
            'conference-sub-category-edit',
            'conference-sub-category-delete',

            //conference
            'conference-list',
            'conference-create',
            'conference-edit',
            'conference-delete',


        ];
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
