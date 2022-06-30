<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'page_id' => NULL,
                'type' => '2',
                'slug' => '{"az":"s","en":"s","ru":"s"}',
                'created_at' => '2022-06-21 11:45:31',
                'updated_at' => '2022-06-21 11:45:31',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'page_id' => 1,
                'type' => '2',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-21 13:33:54',
                'updated_at' => '2022-06-21 13:33:54',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'page_id' => 1,
                'type' => '2',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-21 15:46:06',
                'updated_at' => '2022-06-21 15:46:06',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'page_id' => 1,
                'type' => '3',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 13:33:53',
                'updated_at' => '2022-06-24 13:33:53',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'page_id' => 1,
                'type' => '3',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 13:34:45',
                'updated_at' => '2022-06-24 13:34:45',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 8,
                'page_id' => 1,
                'type' => '3',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 13:35:05',
                'updated_at' => '2022-06-24 13:35:05',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 9,
                'page_id' => 1,
                'type' => '4',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 13:58:41',
                'updated_at' => '2022-06-24 13:58:41',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 10,
                'page_id' => 1,
                'type' => '4',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 13:58:58',
                'updated_at' => '2022-06-24 13:58:58',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 11,
                'page_id' => 1,
                'type' => '4',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 13:59:14',
                'updated_at' => '2022-06-24 13:59:14',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 12,
                'page_id' => 1,
                'type' => '4',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 13:59:30',
                'updated_at' => '2022-06-24 13:59:30',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 13,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:32:05',
                'updated_at' => '2022-06-24 14:32:05',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 14,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:39:34',
                'updated_at' => '2022-06-24 14:39:34',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 15,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:46:40',
                'updated_at' => '2022-06-24 14:46:40',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 16,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:47:42',
                'updated_at' => '2022-06-24 14:47:42',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 17,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:48:41',
                'updated_at' => '2022-06-24 14:48:41',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 18,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:49:41',
                'updated_at' => '2022-06-24 14:49:41',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 19,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:50:38',
                'updated_at' => '2022-06-24 14:50:38',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 20,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:51:25',
                'updated_at' => '2022-06-24 14:51:25',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 21,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:52:24',
                'updated_at' => '2022-06-24 14:52:24',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 22,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:53:13',
                'updated_at' => '2022-06-24 14:53:13',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 23,
                'page_id' => 1,
                'type' => '5',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 14:54:04',
                'updated_at' => '2022-06-24 14:54:04',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 24,
                'page_id' => 1,
                'type' => '6',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 15:01:20',
                'updated_at' => '2022-06-24 15:01:20',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 25,
                'page_id' => 1,
                'type' => '6',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-24 15:06:27',
                'updated_at' => '2022-06-24 15:06:27',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 39,
                'page_id' => NULL,
                'type' => '8',
                'slug' => '{"az":"amet-in-unde-cupidi","en":"distinctio-nihil-in","ru":"ut-cupidatat-aut-dol"}',
                'created_at' => '2022-06-26 12:41:08',
                'updated_at' => '2022-06-26 12:41:08',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 54,
                'page_id' => 1,
                'type' => '10',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 13:34:42',
                'updated_at' => '2022-06-26 13:34:42',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 55,
                'page_id' => 1,
                'type' => '10',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 13:35:10',
                'updated_at' => '2022-06-26 13:35:10',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 56,
                'page_id' => 1,
                'type' => '10',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 13:35:29',
                'updated_at' => '2022-06-26 13:35:29',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 57,
                'page_id' => NULL,
                'type' => '11',
                'slug' => '{"az":"pariatur-irure-sit","en":"consequat-magni-sed","ru":"facilis-est-voluptat"}',
                'created_at' => '2022-06-26 13:43:13',
                'updated_at' => '2022-06-26 13:43:13',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 58,
                'page_id' => NULL,
                'type' => '11',
                'slug' => '{"az":"vel-explicabo-accus","en":"qui-eius-officia-tem","ru":"laboriosam-nobis-do"}',
                'created_at' => '2022-06-26 13:43:23',
                'updated_at' => '2022-06-26 13:43:23',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 61,
                'page_id' => NULL,
                'type' => '12',
                'slug' => '{"az":"deserunt-neque-sit","en":"est-eveniet-mollit","ru":"nemo-veniam-animi"}',
                'created_at' => '2022-06-26 14:11:30',
                'updated_at' => '2022-06-26 14:11:30',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 62,
                'page_id' => NULL,
                'type' => '12',
                'slug' => '{"az":"dolore-blanditiis-ut","en":"non-debitis-tempora","ru":"nisi-optio-pariatur"}',
                'created_at' => '2022-06-26 14:11:38',
                'updated_at' => '2022-06-26 14:11:38',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 63,
                'page_id' => 15,
                'type' => '13',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 15:13:14',
                'updated_at' => '2022-06-26 15:13:14',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 64,
                'page_id' => 15,
                'type' => '13',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 15:13:30',
                'updated_at' => '2022-06-26 15:13:30',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 65,
                'page_id' => 15,
                'type' => '13',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 15:13:49',
                'updated_at' => '2022-06-26 15:13:49',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 66,
                'page_id' => 15,
                'type' => '13',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 15:37:48',
                'updated_at' => '2022-06-26 15:37:48',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 68,
                'page_id' => 17,
                'type' => '14',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 18:42:45',
                'updated_at' => '2022-06-26 18:42:45',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 69,
                'page_id' => 17,
                'type' => '14',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 18:43:24',
                'updated_at' => '2022-06-26 18:43:24',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 70,
                'page_id' => 20,
                'type' => '15',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 19:43:54',
                'updated_at' => '2022-06-26 19:43:54',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 71,
                'page_id' => 21,
                'type' => '15',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 20:09:32',
                'updated_at' => '2022-06-26 20:09:32',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 72,
                'page_id' => 22,
                'type' => '15',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 20:10:57',
                'updated_at' => '2022-06-26 20:10:57',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 73,
                'page_id' => 23,
                'type' => '15',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 20:12:04',
                'updated_at' => '2022-06-26 20:12:04',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 74,
                'page_id' => 24,
                'type' => '15',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 20:13:19',
                'updated_at' => '2022-06-26 20:13:19',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 75,
                'page_id' => 34,
                'type' => '16',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 21:41:17',
                'updated_at' => '2022-06-26 21:41:17',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 76,
                'page_id' => 34,
                'type' => '16',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-26 21:55:45',
                'updated_at' => '2022-06-26 21:55:45',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 77,
                'page_id' => 39,
                'type' => '18',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 03:59:49',
                'updated_at' => '2022-06-27 03:59:49',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 78,
                'page_id' => 39,
                'type' => '19',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 04:16:52',
                'updated_at' => '2022-06-27 04:16:52',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 79,
                'page_id' => 39,
                'type' => '19',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 04:17:31',
                'updated_at' => '2022-06-27 04:17:31',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 80,
                'page_id' => 39,
                'type' => '19',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 04:18:03',
                'updated_at' => '2022-06-27 04:18:03',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 81,
                'page_id' => 39,
                'type' => '20',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 20:46:50',
                'updated_at' => '2022-06-27 20:46:50',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 82,
                'page_id' => 39,
                'type' => '21',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 20:56:20',
                'updated_at' => '2022-06-27 20:56:20',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 83,
                'page_id' => 39,
                'type' => '22',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 21:13:24',
                'updated_at' => '2022-06-27 21:13:24',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 84,
                'page_id' => 40,
                'type' => '23',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 21:23:40',
                'updated_at' => '2022-06-27 21:23:40',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 87,
                'page_id' => 39,
                'type' => '24',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 22:03:12',
                'updated_at' => '2022-06-27 22:03:12',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 88,
                'page_id' => 39,
                'type' => '24',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 22:18:30',
                'updated_at' => '2022-06-27 22:18:30',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 89,
                'page_id' => 43,
                'type' => '18',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 22:49:02',
                'updated_at' => '2022-06-27 22:49:02',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 90,
                'page_id' => 43,
                'type' => '19',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 22:51:56',
                'updated_at' => '2022-06-27 22:51:56',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 91,
                'page_id' => 43,
                'type' => '20',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 22:53:35',
                'updated_at' => '2022-06-27 22:53:35',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 92,
                'page_id' => 43,
                'type' => '25',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 22:59:56',
                'updated_at' => '2022-06-27 22:59:56',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 93,
                'page_id' => 43,
                'type' => '21',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 23:03:23',
                'updated_at' => '2022-06-27 23:03:23',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 94,
                'page_id' => 43,
                'type' => '22',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-27 23:05:52',
                'updated_at' => '2022-06-27 23:05:52',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => 95,
                'page_id' => NULL,
                'type' => '8',
                'slug' => '{"az":"et-excepteur-nulla-i","en":"dolores-qui-ab-non-s","ru":"eveniet-ea-voluptat"}',
                'created_at' => '2022-06-28 04:06:18',
                'updated_at' => '2022-06-28 04:06:18',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'id' => 102,
                'page_id' => NULL,
                'type' => '9',
                'slug' => '{"az":"non-quaerat-esse-pro","en":"et-fugiat-qui-asper","ru":"ad-nesciunt-volupta"}',
                'created_at' => '2022-06-28 17:43:38',
                'updated_at' => '2022-06-28 17:43:38',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'id' => 103,
                'page_id' => NULL,
                'type' => '9',
                'slug' => '{"az":"aliqua-beatae-volup","en":"delectus-vel-proide","ru":"odio-aspernatur-eius"}',
                'created_at' => '2022-06-28 18:10:36',
                'updated_at' => '2022-06-28 18:10:36',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'id' => 104,
                'page_id' => NULL,
                'type' => '9',
                'slug' => '{"az":"molestias-cupiditate","en":"sapiente-debitis-vol","ru":"quos-quos-sed-consec"}',
                'created_at' => '2022-06-28 18:10:59',
                'updated_at' => '2022-06-28 18:10:59',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'id' => 105,
                'page_id' => NULL,
                'type' => '9',
                'slug' => '{"az":"quia-consequatur-am","en":"aut-pariatur-nam-li","ru":"sit-totam-modi-natus"}',
                'created_at' => '2022-06-28 18:11:25',
                'updated_at' => '2022-06-28 18:11:25',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'id' => 106,
                'page_id' => NULL,
                'type' => '9',
                'slug' => '{"az":"quos-nihil-nihil-qui","en":"aut-fuga-adipisci-q","ru":"numquam-aut-in-repud"}',
                'created_at' => '2022-06-28 18:11:47',
                'updated_at' => '2022-06-28 18:11:47',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'id' => 107,
                'page_id' => NULL,
                'type' => '9',
                'slug' => '{"az":"fugiat-libero-ut-dol","en":"maxime-laudantium-i","ru":"dolor-eveniet-minim"}',
                'created_at' => '2022-06-29 04:34:35',
                'updated_at' => '2022-06-29 04:34:35',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'id' => 108,
                'page_id' => NULL,
                'type' => '9',
                'slug' => '{"az":"corrupti-esse-aute","en":"culpa-labore-sed-a","ru":"ea-maiores-dolor-cil"}',
                'created_at' => '2022-06-29 04:35:15',
                'updated_at' => '2022-06-29 04:35:15',
                'deleted_at' => NULL,
            ),
            68 => 
            array (
                'id' => 109,
                'page_id' => NULL,
                'type' => '8',
                'slug' => '{"az":"est-deserunt-nesciun","en":"ea-cum-officia-quide","ru":"in-deserunt-providen"}',
                'created_at' => '2022-06-29 04:58:19',
                'updated_at' => '2022-06-29 04:58:19',
                'deleted_at' => NULL,
            ),
            69 => 
            array (
                'id' => 110,
                'page_id' => NULL,
                'type' => '8',
                'slug' => '{"az":"consequatur-aut-exp","en":"aliquam-veniam-aliq","ru":"omnis-aliquam-nobis"}',
                'created_at' => '2022-06-29 04:58:36',
                'updated_at' => '2022-06-29 04:58:36',
                'deleted_at' => NULL,
            ),
            70 => 
            array (
                'id' => 111,
                'page_id' => NULL,
                'type' => '8',
                'slug' => '{"az":"suscipit-et-explicab","en":"natus-tempora-quam-d","ru":"totam-dignissimos-ni"}',
                'created_at' => '2022-06-29 04:58:56',
                'updated_at' => '2022-06-29 04:58:56',
                'deleted_at' => NULL,
            ),
            71 => 
            array (
                'id' => 112,
                'page_id' => NULL,
                'type' => '7',
                'slug' => '{"az":"ut-vel-dignissimos-c","en":"sint-earum-maxime-ex","ru":"architecto-quidem-of"}',
                'created_at' => '2022-06-29 05:22:18',
                'updated_at' => '2022-06-29 05:22:18',
                'deleted_at' => NULL,
            ),
            72 => 
            array (
                'id' => 113,
                'page_id' => NULL,
                'type' => '7',
                'slug' => '{"az":"sed-vitae-consectetu","en":"ut-nesciunt-tempore","ru":"unde-vel-omnis-anim"}',
                'created_at' => '2022-06-29 05:23:29',
                'updated_at' => '2022-06-29 05:23:29',
                'deleted_at' => NULL,
            ),
            73 => 
            array (
                'id' => 114,
                'page_id' => NULL,
                'type' => '7',
                'slug' => '{"az":"nobis-duis-et-laboru","en":"quibusdam-neque-itaq","ru":"ad-do-eiusmod-omnis"}',
                'created_at' => '2022-06-29 05:23:47',
                'updated_at' => '2022-06-29 05:23:47',
                'deleted_at' => NULL,
            ),
            74 => 
            array (
                'id' => 115,
                'page_id' => NULL,
                'type' => '7',
                'slug' => '{"az":"qui-quidem-quibusdam","en":"voluptate-est-dolore","ru":"ut-fugit-at-cillum"}',
                'created_at' => '2022-06-29 05:24:08',
                'updated_at' => '2022-06-29 05:24:08',
                'deleted_at' => NULL,
            ),
            75 => 
            array (
                'id' => 116,
                'page_id' => NULL,
                'type' => '7',
                'slug' => '{"az":"doloribus-qui-libero","en":"eum-nobis-minima-sit","ru":"anim-neque-tempor-eo"}',
                'created_at' => '2022-06-29 05:24:28',
                'updated_at' => '2022-06-29 05:24:28',
                'deleted_at' => NULL,
            ),
            76 => 
            array (
                'id' => 117,
                'page_id' => NULL,
                'type' => '26',
                'slug' => '{"az":"mollitia-qui-asperio","en":"iure-soluta-ut-neces","ru":"id-in-temporibus-qu"}',
                'created_at' => '2022-06-29 10:58:51',
                'updated_at' => '2022-06-29 10:58:51',
                'deleted_at' => NULL,
            ),
            77 => 
            array (
                'id' => 118,
                'page_id' => NULL,
                'type' => '26',
                'slug' => '{"az":"erbaycan-respubli","en":"erbaycan-respubli","ru":"erbaycan-respubli"}',
                'created_at' => '2022-06-29 11:00:03',
                'updated_at' => '2022-06-29 11:00:03',
                'deleted_at' => NULL,
            ),
            78 => 
            array (
                'id' => 119,
                'page_id' => NULL,
                'type' => '26',
                'slug' => '{"az":"atque-atque-qui-volu","en":"amet-officiis-asper","ru":"nostrum-maiores-non"}',
                'created_at' => '2022-06-29 11:24:24',
                'updated_at' => '2022-06-29 11:24:24',
                'deleted_at' => NULL,
            ),
            79 => 
            array (
                'id' => 120,
                'page_id' => 39,
                'type' => '23',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-29 12:38:49',
                'updated_at' => '2022-06-29 12:38:49',
                'deleted_at' => NULL,
            ),
            80 => 
            array (
                'id' => 121,
                'page_id' => 39,
                'type' => '23',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-29 12:39:11',
                'updated_at' => '2022-06-29 12:39:11',
                'deleted_at' => NULL,
            ),
            81 => 
            array (
                'id' => 122,
                'page_id' => 39,
                'type' => '22',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-29 12:59:33',
                'updated_at' => '2022-06-29 12:59:33',
                'deleted_at' => NULL,
            ),
            82 => 
            array (
                'id' => 123,
                'page_id' => 39,
                'type' => '22',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-29 12:59:56',
                'updated_at' => '2022-06-29 12:59:56',
                'deleted_at' => NULL,
            ),
            83 => 
            array (
                'id' => 124,
                'page_id' => 39,
                'type' => '22',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-29 13:00:16',
                'updated_at' => '2022-06-29 13:00:16',
                'deleted_at' => NULL,
            ),
            84 => 
            array (
                'id' => 125,
                'page_id' => 39,
                'type' => '22',
                'slug' => '{"az":"","en":"","ru":""}',
                'created_at' => '2022-06-29 13:00:47',
                'updated_at' => '2022-06-29 13:00:47',
                'deleted_at' => NULL,
            ),
            85 => 
            array (
                'id' => 133,
                'page_id' => NULL,
                'type' => '1',
                'slug' => '{"az":"salamaz","en":"salamen","ru":"salamru"}',
                'created_at' => '2022-06-29 15:16:35',
                'updated_at' => '2022-06-29 15:16:35',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}