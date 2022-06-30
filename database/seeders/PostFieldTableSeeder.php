<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostFieldTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_field')->delete();
        
        \DB::table('post_field')->insert(array (
            0 => 
            array (
                'id' => 1,
                'field_id' => 1,
                'post_id' => 1,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'field_id' => 2,
                'post_id' => 1,
                'field_value_id' => NULL,
                'value' => '2004-05-26 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'field_id' => 3,
                'post_id' => 1,
                'field_value_id' => NULL,
                'value' => '{"az":"Animi maiores dolor","en":"Sequi quidem quod cu","ru":"Qui ea placeat dolo"}',
            ),
            3 => 
            array (
                'id' => 5,
                'field_id' => 1,
                'post_id' => 3,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'field_id' => 2,
                'post_id' => 3,
                'field_value_id' => NULL,
                'value' => '1979-08-20 00:00:00',
            ),
            5 => 
            array (
                'id' => 7,
                'field_id' => 3,
                'post_id' => 3,
                'field_value_id' => NULL,
                'value' => '{"az":"Ut molestiae laboris","en":"Recusandae Optio d","ru":"Ut harum a sed modi"}',
            ),
            6 => 
            array (
                'id' => 12,
                'field_id' => 1,
                'post_id' => 5,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            7 => 
            array (
                'id' => 13,
                'field_id' => 2,
                'post_id' => 5,
                'field_value_id' => NULL,
                'value' => '2022-06-23 00:00:00',
            ),
            8 => 
            array (
                'id' => 14,
                'field_id' => 3,
                'post_id' => 5,
                'field_value_id' => NULL,
                'value' => '{"az":"Omnis non et archite","en":"Commodi vel sunt vel","ru":"Facilis necessitatib"}',
            ),
            9 => 
            array (
                'id' => 24,
                'field_id' => 13,
                'post_id' => 8,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            10 => 
            array (
                'id' => 25,
                'field_id' => 12,
                'post_id' => 8,
                'field_value_id' => NULL,
                'value' => '{"az":"Repudiandae commodo","en":"Impedit beatae eu q","ru":"Quia labore et dolor"}',
            ),
            11 => 
            array (
                'id' => 26,
                'field_id' => 11,
                'post_id' => 8,
                'field_value_id' => NULL,
                'value' => '{"az":"Kyla Oneil","en":"Portia Steele","ru":"Dai Cross"}',
            ),
            12 => 
            array (
                'id' => 27,
                'field_id' => 13,
                'post_id' => 7,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            13 => 
            array (
                'id' => 28,
                'field_id' => 12,
                'post_id' => 7,
                'field_value_id' => NULL,
                'value' => '{"az":"A cupiditate ut sunt","en":"Quos necessitatibus","ru":"Ut nobis magnam even"}',
            ),
            14 => 
            array (
                'id' => 29,
                'field_id' => 11,
                'post_id' => 7,
                'field_value_id' => NULL,
                'value' => '{"az":"Odette Beasley","en":"Adele Buck","ru":"Sloane Crawford"}',
            ),
            15 => 
            array (
                'id' => 30,
                'field_id' => 13,
                'post_id' => 6,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            16 => 
            array (
                'id' => 31,
                'field_id' => 12,
                'post_id' => 6,
                'field_value_id' => NULL,
                'value' => '{"az":"Praesentium perspici","en":"Dolores dolore conse","ru":"Excepteur non sed qu"}',
            ),
            17 => 
            array (
                'id' => 32,
                'field_id' => 11,
                'post_id' => 6,
                'field_value_id' => NULL,
                'value' => '{"az":"Honorato Murray","en":"TaShya Mcbride","ru":"Myles Lawrence"}',
            ),
            18 => 
            array (
                'id' => 33,
                'field_id' => 15,
                'post_id' => 9,
                'field_value_id' => NULL,
                'value' => '{"az":"Judah Maxwell","en":"Graiden Pratt","ru":"Brock Mcfadden"}',
            ),
            19 => 
            array (
                'id' => 34,
                'field_id' => 16,
                'post_id' => 9,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            20 => 
            array (
                'id' => 35,
                'field_id' => 15,
                'post_id' => 10,
                'field_value_id' => NULL,
                'value' => '{"az":"Lesley Savage","en":"Barry Kirby","ru":"Iris Watson"}',
            ),
            21 => 
            array (
                'id' => 36,
                'field_id' => 16,
                'post_id' => 10,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            22 => 
            array (
                'id' => 37,
                'field_id' => 15,
                'post_id' => 11,
                'field_value_id' => NULL,
                'value' => '{"az":"Herman Richard","en":"Hamilton Ruiz","ru":"Carolyn Hodge"}',
            ),
            23 => 
            array (
                'id' => 38,
                'field_id' => 16,
                'post_id' => 11,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            24 => 
            array (
                'id' => 39,
                'field_id' => 15,
                'post_id' => 12,
                'field_value_id' => NULL,
                'value' => '{"az":"Alexandra Shannon","en":"Caesar Jones","ru":"Sopoline Hewitt"}',
            ),
            25 => 
            array (
                'id' => 40,
                'field_id' => 16,
                'post_id' => 12,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            26 => 
            array (
                'id' => 41,
                'field_id' => 18,
                'post_id' => 13,
                'field_value_id' => NULL,
                'value' => '{"az":"Sumqay\\u0131t s\\u0259naye park\\u0131","en":"Sumqay\\u0131t s\\u0259naye park\\u0131","ru":"Sumqay\\u0131t s\\u0259naye park\\u0131"}',
            ),
            27 => 
            array (
                'id' => 42,
                'field_id' => 20,
                'post_id' => 13,
                'field_value_id' => NULL,
                'value' => '{"az":"Sapiente aut dolores","en":"Sed excepturi dolor","ru":"Maxime officiis hic"}',
            ),
            28 => 
            array (
                'id' => 43,
                'field_id' => 21,
                'post_id' => 13,
                'field_value_id' => NULL,
                'value' => '{"az":"Eos quo tempora ess","en":"Sunt dolorum et dolo","ru":"Minus nisi tempor nu"}',
            ),
            29 => 
            array (
                'id' => 44,
                'field_id' => 22,
                'post_id' => 13,
                'field_value_id' => NULL,
                'value' => '{"az":"Quia iste tempora sa","en":"Et cumque voluptatem","ru":"Id molestiae magni"}',
            ),
            30 => 
            array (
                'id' => 45,
                'field_id' => 23,
                'post_id' => 13,
                'field_value_id' => NULL,
                'value' => '{"az":"Suscipit in quidem u","en":"Et incidunt ullam a","ru":"Sit enim eveniet om"}',
            ),
            31 => 
            array (
                'id' => 46,
                'field_id' => 24,
                'post_id' => 13,
                'field_value_id' => NULL,
            'value' => '+1 (987) 404-3772',
            ),
            32 => 
            array (
                'id' => 47,
                'field_id' => 25,
                'post_id' => 13,
                'field_value_id' => NULL,
                'value' => 'cuki@mailinator.com',
            ),
            33 => 
            array (
                'id' => 48,
                'field_id' => 26,
                'post_id' => 13,
                'field_value_id' => NULL,
                'value' => '2',
            ),
            34 => 
            array (
                'id' => 49,
                'field_id' => 18,
                'post_id' => 14,
                'field_value_id' => NULL,
                'value' => '{"az":"PirAllahi s\\u0259naye park\\u0131","en":"PirAllahi s\\u0259naye park\\u0131","ru":"PirAllahi s\\u0259naye park\\u0131"}',
            ),
            35 => 
            array (
                'id' => 50,
                'field_id' => 20,
                'post_id' => 14,
                'field_value_id' => NULL,
                'value' => '{"az":"Ad sed consequuntur","en":"Ea dolore officia at","ru":"Id consequatur esse"}',
            ),
            36 => 
            array (
                'id' => 51,
                'field_id' => 21,
                'post_id' => 14,
                'field_value_id' => NULL,
                'value' => '{"az":"Molestias dicta et v","en":"Qui aut mollit saepe","ru":"Excepteur maiores od"}',
            ),
            37 => 
            array (
                'id' => 52,
                'field_id' => 22,
                'post_id' => 14,
                'field_value_id' => NULL,
                'value' => '{"az":"Inventore ullamco qu","en":"Quos quis maxime omn","ru":"Fugiat exercitatione"}',
            ),
            38 => 
            array (
                'id' => 53,
                'field_id' => 23,
                'post_id' => 14,
                'field_value_id' => NULL,
                'value' => '{"az":"Sapiente et reprehen","en":"Sit aperiam Nam adi","ru":"Dolorem ea esse dolo"}',
            ),
            39 => 
            array (
                'id' => 54,
                'field_id' => 24,
                'post_id' => 14,
                'field_value_id' => NULL,
            'value' => '+1 (821) 965-2877',
            ),
            40 => 
            array (
                'id' => 55,
                'field_id' => 25,
                'post_id' => 14,
                'field_value_id' => NULL,
                'value' => 'vykufewaj@mailinator.com',
            ),
            41 => 
            array (
                'id' => 56,
                'field_id' => 26,
                'post_id' => 14,
                'field_value_id' => NULL,
                'value' => '4',
            ),
            42 => 
            array (
                'id' => 57,
                'field_id' => 18,
                'post_id' => 15,
                'field_value_id' => NULL,
                'value' => '{"az":"Qaradag s\\u0259naye park\\u0131","en":"Qaradag s\\u0259naye park\\u0131","ru":"Qaradag s\\u0259naye park\\u0131"}',
            ),
            43 => 
            array (
                'id' => 58,
                'field_id' => 20,
                'post_id' => 15,
                'field_value_id' => NULL,
                'value' => '{"az":"Architecto pariatur","en":"Fugiat illo magna sa","ru":"Maxime est libero v"}',
            ),
            44 => 
            array (
                'id' => 59,
                'field_id' => 21,
                'post_id' => 15,
                'field_value_id' => NULL,
                'value' => '{"az":"Magna nulla eos enim","en":"Laudantium dicta il","ru":"Aut hic aliquip rem"}',
            ),
            45 => 
            array (
                'id' => 60,
                'field_id' => 22,
                'post_id' => 15,
                'field_value_id' => NULL,
                'value' => '{"az":"Vel cumque libero id","en":"Incididunt eiusmod i","ru":"Dolore molestiae eu"}',
            ),
            46 => 
            array (
                'id' => 61,
                'field_id' => 23,
                'post_id' => 15,
                'field_value_id' => NULL,
                'value' => '{"az":"Impedit sit dolorib","en":"Quas obcaecati simil","ru":"Consequatur iusto de"}',
            ),
            47 => 
            array (
                'id' => 62,
                'field_id' => 24,
                'post_id' => 15,
                'field_value_id' => NULL,
            'value' => '+1 (895) 689-8942',
            ),
            48 => 
            array (
                'id' => 63,
                'field_id' => 25,
                'post_id' => 15,
                'field_value_id' => NULL,
                'value' => 'virevabi@mailinator.com',
            ),
            49 => 
            array (
                'id' => 64,
                'field_id' => 26,
                'post_id' => 15,
                'field_value_id' => NULL,
                'value' => '5',
            ),
            50 => 
            array (
                'id' => 65,
                'field_id' => 18,
                'post_id' => 16,
                'field_value_id' => NULL,
                'value' => '{"az":"Haciqabul","en":"Haciqabul","ru":"Haciqabul"}',
            ),
            51 => 
            array (
                'id' => 66,
                'field_id' => 20,
                'post_id' => 16,
                'field_value_id' => NULL,
                'value' => '{"az":"Officia quia est es","en":"Placeat qui et omni","ru":"Qui et dolor tempora"}',
            ),
            52 => 
            array (
                'id' => 67,
                'field_id' => 21,
                'post_id' => 16,
                'field_value_id' => NULL,
                'value' => '{"az":"In veniam esse dol","en":"Sed qui assumenda pl","ru":"Aut proident corrup"}',
            ),
            53 => 
            array (
                'id' => 68,
                'field_id' => 22,
                'post_id' => 16,
                'field_value_id' => NULL,
                'value' => '{"az":"Repudiandae quaerat","en":"Ipsam voluptatem et","ru":"Qui non corporis imp"}',
            ),
            54 => 
            array (
                'id' => 69,
                'field_id' => 23,
                'post_id' => 16,
                'field_value_id' => NULL,
                'value' => '{"az":"Perspiciatis except","en":"Nihil adipisci ullam","ru":"Doloremque placeat"}',
            ),
            55 => 
            array (
                'id' => 70,
                'field_id' => 24,
                'post_id' => 16,
                'field_value_id' => NULL,
            'value' => '+1 (242) 261-2318',
            ),
            56 => 
            array (
                'id' => 71,
                'field_id' => 25,
                'post_id' => 16,
                'field_value_id' => NULL,
                'value' => 'zuqyvo@mailinator.com',
            ),
            57 => 
            array (
                'id' => 72,
                'field_id' => 26,
                'post_id' => 16,
                'field_value_id' => NULL,
                'value' => '6',
            ),
            58 => 
            array (
                'id' => 73,
                'field_id' => 18,
                'post_id' => 17,
                'field_value_id' => NULL,
                'value' => '{"az":"Sabirabad s\\u0259naye park\\u0131","en":"Sabirabad s\\u0259naye park\\u0131","ru":"Sabirabad s\\u0259naye park\\u0131"}',
            ),
            59 => 
            array (
                'id' => 74,
                'field_id' => 20,
                'post_id' => 17,
                'field_value_id' => NULL,
                'value' => '{"az":"Iste cum rerum persp","en":"Qui ipsum voluptate","ru":"Enim ducimus est un"}',
            ),
            60 => 
            array (
                'id' => 75,
                'field_id' => 21,
                'post_id' => 17,
                'field_value_id' => NULL,
                'value' => '{"az":"Ea accusamus dolores","en":"Hic reprehenderit eu","ru":"Magna sint fugiat c"}',
            ),
            61 => 
            array (
                'id' => 76,
                'field_id' => 22,
                'post_id' => 17,
                'field_value_id' => NULL,
                'value' => '{"az":"Itaque aute eos libe","en":"Distinctio Est labo","ru":"Est corporis dolore"}',
            ),
            62 => 
            array (
                'id' => 77,
                'field_id' => 23,
                'post_id' => 17,
                'field_value_id' => NULL,
                'value' => '{"az":"Et aliquam dolor cul","en":"Aliquip at nemo quia","ru":"Ullamco odit est sin"}',
            ),
            63 => 
            array (
                'id' => 78,
                'field_id' => 24,
                'post_id' => 17,
                'field_value_id' => NULL,
            'value' => '+1 (755) 684-6755',
            ),
            64 => 
            array (
                'id' => 79,
                'field_id' => 25,
                'post_id' => 17,
                'field_value_id' => NULL,
                'value' => 'cokana@mailinator.com',
            ),
            65 => 
            array (
                'id' => 80,
                'field_id' => 26,
                'post_id' => 17,
                'field_value_id' => NULL,
                'value' => '7',
            ),
            66 => 
            array (
                'id' => 81,
                'field_id' => 18,
                'post_id' => 18,
                'field_value_id' => NULL,
                'value' => '{"az":"Neftcala s\\u0259naye park\\u0131","en":"Neftcala s\\u0259naye park\\u0131","ru":"Neftcala s\\u0259naye park\\u0131"}',
            ),
            67 => 
            array (
                'id' => 82,
                'field_id' => 20,
                'post_id' => 18,
                'field_value_id' => NULL,
                'value' => '{"az":"Voluptatibus praesen","en":"Dolor quia voluptate","ru":"Repudiandae eligendi"}',
            ),
            68 => 
            array (
                'id' => 83,
                'field_id' => 21,
                'post_id' => 18,
                'field_value_id' => NULL,
                'value' => '{"az":"Facere iste quia ver","en":"Aut enim quis enim a","ru":"Non nisi in enim quo"}',
            ),
            69 => 
            array (
                'id' => 84,
                'field_id' => 22,
                'post_id' => 18,
                'field_value_id' => NULL,
                'value' => '{"az":"Tempora debitis ex n","en":"Omnis distinctio Qu","ru":"Maiores ut ipsum la"}',
            ),
            70 => 
            array (
                'id' => 85,
                'field_id' => 23,
                'post_id' => 18,
                'field_value_id' => NULL,
                'value' => '{"az":"Iusto commodi ut dol","en":"Quam neque in autem","ru":"Lorem qui nostrum so"}',
            ),
            71 => 
            array (
                'id' => 86,
                'field_id' => 24,
                'post_id' => 18,
                'field_value_id' => NULL,
            'value' => '+1 (215) 751-4873',
            ),
            72 => 
            array (
                'id' => 87,
                'field_id' => 25,
                'post_id' => 18,
                'field_value_id' => NULL,
                'value' => 'kakove@mailinator.com',
            ),
            73 => 
            array (
                'id' => 88,
                'field_id' => 26,
                'post_id' => 18,
                'field_value_id' => NULL,
                'value' => '8',
            ),
            74 => 
            array (
                'id' => 89,
                'field_id' => 18,
                'post_id' => 19,
                'field_value_id' => NULL,
                'value' => '{"az":"Masallli s\\u0259naye park\\u0131","en":"Masallli s\\u0259naye park\\u0131","ru":"Masallli s\\u0259naye park\\u0131"}',
            ),
            75 => 
            array (
                'id' => 90,
                'field_id' => 20,
                'post_id' => 19,
                'field_value_id' => NULL,
                'value' => '{"az":"Deserunt laudantium","en":"Voluptate sit adipis","ru":"Consequuntur ut dolo"}',
            ),
            76 => 
            array (
                'id' => 91,
                'field_id' => 21,
                'post_id' => 19,
                'field_value_id' => NULL,
                'value' => '{"az":"Corporis atque enim","en":"Molestias iusto nost","ru":"Omnis veniam est id"}',
            ),
            77 => 
            array (
                'id' => 92,
                'field_id' => 22,
                'post_id' => 19,
                'field_value_id' => NULL,
                'value' => '{"az":"Dolor hic voluptate","en":"Non exercitationem m","ru":"Iusto incididunt aut"}',
            ),
            78 => 
            array (
                'id' => 93,
                'field_id' => 23,
                'post_id' => 19,
                'field_value_id' => NULL,
                'value' => '{"az":"Labore accusantium d","en":"Eos minima magnam c","ru":"Nihil necessitatibus"}',
            ),
            79 => 
            array (
                'id' => 94,
                'field_id' => 24,
                'post_id' => 19,
                'field_value_id' => NULL,
            'value' => '+1 (807) 402-7265',
            ),
            80 => 
            array (
                'id' => 95,
                'field_id' => 25,
                'post_id' => 19,
                'field_value_id' => NULL,
                'value' => 'tixez@mailinator.com',
            ),
            81 => 
            array (
                'id' => 96,
                'field_id' => 26,
                'post_id' => 19,
                'field_value_id' => NULL,
                'value' => '9',
            ),
            82 => 
            array (
                'id' => 97,
                'field_id' => 18,
                'post_id' => 20,
                'field_value_id' => NULL,
                'value' => '{"az":"Cebrayil s\\u0259naye park\\u0131","en":"Cebrayil s\\u0259naye park\\u0131","ru":"Cebrayil s\\u0259naye park\\u0131"}',
            ),
            83 => 
            array (
                'id' => 98,
                'field_id' => 20,
                'post_id' => 20,
                'field_value_id' => NULL,
                'value' => '{"az":"Et aliqua Amet occ","en":"Doloremque consequat","ru":"Autem incididunt fac"}',
            ),
            84 => 
            array (
                'id' => 99,
                'field_id' => 21,
                'post_id' => 20,
                'field_value_id' => NULL,
                'value' => '{"az":"Aut officiis sit mol","en":"Numquam ea ut et fug","ru":"Magna aliquam qui al"}',
            ),
            85 => 
            array (
                'id' => 100,
                'field_id' => 22,
                'post_id' => 20,
                'field_value_id' => NULL,
                'value' => '{"az":"Aut accusamus molest","en":"In esse doloremque f","ru":"Nesciunt blanditiis"}',
            ),
            86 => 
            array (
                'id' => 101,
                'field_id' => 23,
                'post_id' => 20,
                'field_value_id' => NULL,
                'value' => '{"az":"Fugiat et nisi vel o","en":"Facere perspiciatis","ru":"Dolore duis labore i"}',
            ),
            87 => 
            array (
                'id' => 102,
                'field_id' => 24,
                'post_id' => 20,
                'field_value_id' => NULL,
            'value' => '+1 (295) 429-3159',
            ),
            88 => 
            array (
                'id' => 103,
                'field_id' => 25,
                'post_id' => 20,
                'field_value_id' => NULL,
                'value' => 'kuqy@mailinator.com',
            ),
            89 => 
            array (
                'id' => 104,
                'field_id' => 26,
                'post_id' => 20,
                'field_value_id' => NULL,
                'value' => '10',
            ),
            90 => 
            array (
                'id' => 105,
                'field_id' => 18,
                'post_id' => 21,
                'field_value_id' => NULL,
                'value' => '{"az":"Agdam","en":"Agdam","ru":"Agdam"}',
            ),
            91 => 
            array (
                'id' => 106,
                'field_id' => 20,
                'post_id' => 21,
                'field_value_id' => NULL,
                'value' => '{"az":"Lorem officia doloru","en":"Sapiente ipsum facil","ru":"Voluptatum et ad opt"}',
            ),
            92 => 
            array (
                'id' => 107,
                'field_id' => 21,
                'post_id' => 21,
                'field_value_id' => NULL,
                'value' => '{"az":"Id veritatis quod qu","en":"Illo ut nihil ad des","ru":"Nulla maxime quas su"}',
            ),
            93 => 
            array (
                'id' => 108,
                'field_id' => 22,
                'post_id' => 21,
                'field_value_id' => NULL,
                'value' => '{"az":"Beatae ipsam rerum e","en":"Qui numquam qui aut","ru":"Pariatur Necessitat"}',
            ),
            94 => 
            array (
                'id' => 109,
                'field_id' => 23,
                'post_id' => 21,
                'field_value_id' => NULL,
                'value' => '{"az":"Animi dicta dolorem","en":"Delectus odit sequi","ru":"Cupiditate illum qu"}',
            ),
            95 => 
            array (
                'id' => 110,
                'field_id' => 24,
                'post_id' => 21,
                'field_value_id' => NULL,
            'value' => '+1 (976) 166-4274',
            ),
            96 => 
            array (
                'id' => 111,
                'field_id' => 25,
                'post_id' => 21,
                'field_value_id' => NULL,
                'value' => 'bexa@mailinator.com',
            ),
            97 => 
            array (
                'id' => 112,
                'field_id' => 26,
                'post_id' => 21,
                'field_value_id' => NULL,
                'value' => '11',
            ),
            98 => 
            array (
                'id' => 113,
                'field_id' => 18,
                'post_id' => 22,
                'field_value_id' => NULL,
                'value' => '{"az":"Yevlax s\\u0259naye park\\u0131","en":"Yevlax s\\u0259naye park\\u0131","ru":"Yevlax s\\u0259naye park\\u0131"}',
            ),
            99 => 
            array (
                'id' => 114,
                'field_id' => 20,
                'post_id' => 22,
                'field_value_id' => NULL,
                'value' => '{"az":"Yevlax s\\u0259naye park\\u0131","en":"Yevlax s\\u0259naye park\\u0131","ru":"Yevlax s\\u0259naye park\\u0131"}',
            ),
            100 => 
            array (
                'id' => 115,
                'field_id' => 21,
                'post_id' => 22,
                'field_value_id' => NULL,
                'value' => '{"az":"Yevlax s\\u0259naye park\\u0131","en":"Yevlax s\\u0259naye park\\u0131","ru":"Yevlax s\\u0259naye park\\u0131"}',
            ),
            101 => 
            array (
                'id' => 116,
                'field_id' => 22,
                'post_id' => 22,
                'field_value_id' => NULL,
                'value' => '{"az":"Yevlax s\\u0259naye park\\u0131","en":"Yevlax s\\u0259naye park\\u0131","ru":"Yevlax s\\u0259naye park\\u0131"}',
            ),
            102 => 
            array (
                'id' => 117,
                'field_id' => 23,
                'post_id' => 22,
                'field_value_id' => NULL,
                'value' => '{"az":"Yevlax s\\u0259naye park\\u0131","en":"Yevlax s\\u0259naye park\\u0131","ru":"Yevlax s\\u0259naye park\\u0131"}',
            ),
            103 => 
            array (
                'id' => 118,
                'field_id' => 24,
                'post_id' => 22,
                'field_value_id' => NULL,
                'value' => 'Yevlax sənaye parkı',
            ),
            104 => 
            array (
                'id' => 119,
                'field_id' => 25,
                'post_id' => 22,
                'field_value_id' => NULL,
                'value' => 'cuki@mailinator.com',
            ),
            105 => 
            array (
                'id' => 120,
                'field_id' => 26,
                'post_id' => 22,
                'field_value_id' => NULL,
                'value' => '3',
            ),
            106 => 
            array (
                'id' => 121,
                'field_id' => 18,
                'post_id' => 23,
                'field_value_id' => NULL,
                'value' => '{"az":"Mingecevir s\\u0259naye park\\u0131","en":"Mingecevir s\\u0259naye park\\u0131","ru":"Mingecevir s\\u0259naye park\\u0131"}',
            ),
            107 => 
            array (
                'id' => 122,
                'field_id' => 20,
                'post_id' => 23,
                'field_value_id' => NULL,
                'value' => '{"az":"Mollit omnis magnam","en":"Ut ut et est ea non","ru":"Dolore distinctio Q"}',
            ),
            108 => 
            array (
                'id' => 123,
                'field_id' => 21,
                'post_id' => 23,
                'field_value_id' => NULL,
                'value' => '{"az":"Voluptatem mollitia","en":"Molestiae consectetu","ru":"Dolore alias quo adi"}',
            ),
            109 => 
            array (
                'id' => 124,
                'field_id' => 22,
                'post_id' => 23,
                'field_value_id' => NULL,
                'value' => '{"az":"Porro voluptas eum c","en":"Impedit incidunt r","ru":"Omnis excepteur moll"}',
            ),
            110 => 
            array (
                'id' => 125,
                'field_id' => 23,
                'post_id' => 23,
                'field_value_id' => NULL,
                'value' => '{"az":"Fuga Perferendis do","en":"Eos dolor atque har","ru":"Magnam ex proident"}',
            ),
            111 => 
            array (
                'id' => 126,
                'field_id' => 24,
                'post_id' => 23,
                'field_value_id' => NULL,
            'value' => '+1 (228) 113-8688',
            ),
            112 => 
            array (
                'id' => 127,
                'field_id' => 25,
                'post_id' => 23,
                'field_value_id' => NULL,
                'value' => 'wujewyviqi@mailinator.com',
            ),
            113 => 
            array (
                'id' => 128,
                'field_id' => 26,
                'post_id' => 23,
                'field_value_id' => NULL,
                'value' => '1',
            ),
            114 => 
            array (
                'id' => 132,
                'field_id' => 28,
                'post_id' => 24,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            115 => 
            array (
                'id' => 133,
                'field_id' => 30,
                'post_id' => 24,
                'field_value_id' => NULL,
                'value' => '{"az":"Culpa duis nihil ducimus ut","en":"Eaque commodo natus amet magna eum voluptate ut sit nobis eiusmod nisi","ru":"Voluptas maiores eos accusamus voluptas aspernatur accusamus et dignissimos enim et delectus aut non eum nihil quidem commodo"}',
            ),
            116 => 
            array (
                'id' => 134,
                'field_id' => 29,
                'post_id' => 24,
                'field_value_id' => NULL,
                'value' => '{"az":"Bell Evans","en":"Lawrence Rowland","ru":"Clementine Riley"}',
            ),
            117 => 
            array (
                'id' => 135,
                'field_id' => 28,
                'post_id' => 25,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            118 => 
            array (
                'id' => 136,
                'field_id' => 29,
                'post_id' => 25,
                'field_value_id' => NULL,
                'value' => '{"az":"Vance Andrews","en":"Cade Foley","ru":"Solomon Johnson"}',
            ),
            119 => 
            array (
                'id' => 137,
                'field_id' => 30,
                'post_id' => 25,
                'field_value_id' => NULL,
                'value' => '{"az":"Voluptatem Molestiae non consequatur atque eos quia et dolore architecto","en":"Quae id ipsum quod voluptatibus recusandae Non beatae est et ab et","ru":"Aliquip rem excepteur cumque cupidatat earum pariatur Omnis ipsa tempora temporibus ut sit minim aute exercitationem non"}',
            ),
            120 => 
            array (
                'id' => 205,
                'field_id' => 38,
                'post_id' => 39,
                'field_value_id' => NULL,
                'value' => '{"az":"Debitis earum natus","en":"Hic pariatur Sed co","ru":"Porro fuga Elit po"}',
            ),
            121 => 
            array (
                'id' => 206,
                'field_id' => 39,
                'post_id' => 39,
                'field_value_id' => NULL,
                'value' => '{"az":"Dolores accusamus qu","en":"Sint nisi aut aliqu","ru":"Voluptatem voluptat"}',
            ),
            122 => 
            array (
                'id' => 207,
                'field_id' => 40,
                'post_id' => 39,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            123 => 
            array (
                'id' => 208,
                'field_id' => 41,
                'post_id' => 39,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            124 => 
            array (
                'id' => 209,
                'field_id' => 42,
                'post_id' => 39,
                'field_value_id' => NULL,
                'value' => '1996-03-06 00:00:00',
            ),
            125 => 
            array (
                'id' => 298,
                'field_id' => 50,
                'post_id' => 54,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            126 => 
            array (
                'id' => 299,
                'field_id' => 51,
                'post_id' => 54,
                'field_value_id' => NULL,
                'value' => '{"az":"Earum doloribus sint","en":"A voluptatem aut asp","ru":"Non consectetur sed"}',
            ),
            127 => 
            array (
                'id' => 300,
                'field_id' => 52,
                'post_id' => 54,
                'field_value_id' => NULL,
                'value' => '{"az":"In ad eum deserunt e","en":"Dignissimos voluptas","ru":"Excepteur quo et qui"}',
            ),
            128 => 
            array (
                'id' => 301,
                'field_id' => 50,
                'post_id' => 55,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            129 => 
            array (
                'id' => 302,
                'field_id' => 51,
                'post_id' => 55,
                'field_value_id' => NULL,
                'value' => '{"az":"Eiusmod quia explica","en":"Dolor in minim tempo","ru":"Non quam aperiam ut"}',
            ),
            130 => 
            array (
                'id' => 303,
                'field_id' => 52,
                'post_id' => 55,
                'field_value_id' => NULL,
                'value' => '{"az":"Rem cupiditate sunt","en":"Eiusmod porro consec","ru":"Voluptatem reiciend"}',
            ),
            131 => 
            array (
                'id' => 304,
                'field_id' => 50,
                'post_id' => 56,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            132 => 
            array (
                'id' => 305,
                'field_id' => 51,
                'post_id' => 56,
                'field_value_id' => NULL,
                'value' => '{"az":"Sint exercitationem","en":"Minus accusamus aut","ru":"At corrupti nisi vo"}',
            ),
            133 => 
            array (
                'id' => 306,
                'field_id' => 52,
                'post_id' => 56,
                'field_value_id' => NULL,
                'value' => '{"az":"Incididunt non cillu","en":"Quo qui dolor conseq","ru":"Neque consequatur t"}',
            ),
            134 => 
            array (
                'id' => 307,
                'field_id' => 53,
                'post_id' => 57,
                'field_value_id' => NULL,
                'value' => '{"az":"Nulla voluptatem Re","en":"Neque fugiat molest","ru":"A aut quas qui rerum"}',
            ),
            135 => 
            array (
                'id' => 308,
                'field_id' => 54,
                'post_id' => 57,
                'field_value_id' => NULL,
                'value' => '{"az":"Quia qui neque non et illo excepteur sed suscipit at non earum hic voluptas temporibus labore praesentium ullam sint dicta","en":"Anim quis amet porro rem itaque possimus id id sed nulla aut alias","ru":"Ad corporis voluptatem odit deserunt ea deleniti quos dolore eveniet aut"}',
            ),
            136 => 
            array (
                'id' => 309,
                'field_id' => 53,
                'post_id' => 58,
                'field_value_id' => NULL,
                'value' => '{"az":"Ut asperiores facili","en":"Vel omnis labore ut","ru":"Ab magni voluptatem"}',
            ),
            137 => 
            array (
                'id' => 310,
                'field_id' => 54,
                'post_id' => 58,
                'field_value_id' => NULL,
                'value' => '{"az":"Est deserunt amet aut libero in laboris ut dolor sint qui accusamus distinctio Voluptas ipsum cupidatat quis quasi","en":"Totam incidunt explicabo Labore explicabo Aut quo quis","ru":"Perferendis delectus itaque sit commodi id dolore beatae incidunt ut dolor qui"}',
            ),
            138 => 
            array (
                'id' => 315,
                'field_id' => 55,
                'post_id' => 61,
                'field_value_id' => NULL,
                'value' => '{"az":"Consectetur at anim","en":"Obcaecati iure quia","ru":"Quae eveniet invent"}',
            ),
            139 => 
            array (
                'id' => 316,
                'field_id' => 56,
                'post_id' => 61,
                'field_value_id' => NULL,
                'value' => 'https://www.mupeleruluf.info',
            ),
            140 => 
            array (
                'id' => 317,
                'field_id' => 57,
                'post_id' => 61,
                'field_value_id' => NULL,
                'value' => '{"az":"Allen Bean","en":"Preston Shields","ru":"Charde Kinney"}',
            ),
            141 => 
            array (
                'id' => 318,
                'field_id' => 55,
                'post_id' => 62,
                'field_value_id' => NULL,
                'value' => '{"az":"Voluptate quaerat en","en":"Doloremque non simil","ru":"Dignissimos ipsum v"}',
            ),
            142 => 
            array (
                'id' => 319,
                'field_id' => 56,
                'post_id' => 62,
                'field_value_id' => NULL,
                'value' => 'https://www.naj.me.uk',
            ),
            143 => 
            array (
                'id' => 320,
                'field_id' => 57,
                'post_id' => 62,
                'field_value_id' => NULL,
                'value' => '{"az":"Lunea Drake","en":"Byron Rutledge","ru":"Kessie Huffman"}',
            ),
            144 => 
            array (
                'id' => 321,
                'field_id' => 62,
                'post_id' => 63,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            145 => 
            array (
                'id' => 322,
                'field_id' => 63,
                'post_id' => 63,
                'field_value_id' => NULL,
                'value' => '{"az":"Voluptatem molestiae","en":"Illum repellendus","ru":"In cupiditate aut la"}',
            ),
            146 => 
            array (
                'id' => 323,
                'field_id' => 64,
                'post_id' => 63,
                'field_value_id' => NULL,
                'value' => '{"az":"Illana Simon","en":"Hedley Strickland","ru":"Armand Barrett"}',
            ),
            147 => 
            array (
                'id' => 324,
                'field_id' => 65,
                'post_id' => 63,
                'field_value_id' => NULL,
                'value' => '{"az":"Vitae harum qui volu","en":"Quae porro praesenti","ru":"Consequat Nobis sun"}',
            ),
            148 => 
            array (
                'id' => 325,
                'field_id' => 62,
                'post_id' => 64,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            149 => 
            array (
                'id' => 326,
                'field_id' => 63,
                'post_id' => 64,
                'field_value_id' => NULL,
                'value' => '{"az":"Iste cupiditate volu","en":"Eum voluptatum volup","ru":"Ipsum qui dolor sed"}',
            ),
            150 => 
            array (
                'id' => 327,
                'field_id' => 64,
                'post_id' => 64,
                'field_value_id' => NULL,
                'value' => '{"az":"Lillith James","en":"Adele Hobbs","ru":"Molly Cotton"}',
            ),
            151 => 
            array (
                'id' => 328,
                'field_id' => 65,
                'post_id' => 64,
                'field_value_id' => NULL,
                'value' => '{"az":"Earum sit nulla id l","en":"Lorem dolorem culpa","ru":"Deserunt in non omni"}',
            ),
            152 => 
            array (
                'id' => 329,
                'field_id' => 62,
                'post_id' => 65,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            153 => 
            array (
                'id' => 330,
                'field_id' => 63,
                'post_id' => 65,
                'field_value_id' => NULL,
                'value' => '{"az":"Velit ut architecto","en":"Repudiandae et autem","ru":"Expedita molestias i"}',
            ),
            154 => 
            array (
                'id' => 331,
                'field_id' => 64,
                'post_id' => 65,
                'field_value_id' => NULL,
                'value' => '{"az":"Hanae Watts","en":"Noelani Fitzpatrick","ru":"Bernard Stanton"}',
            ),
            155 => 
            array (
                'id' => 332,
                'field_id' => 65,
                'post_id' => 65,
                'field_value_id' => NULL,
                'value' => '{"az":"In et autem veniam","en":"Doloremque inventore","ru":"Et quisquam maiores"}',
            ),
            156 => 
            array (
                'id' => 333,
                'field_id' => 62,
                'post_id' => 66,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            157 => 
            array (
                'id' => 334,
                'field_id' => 63,
                'post_id' => 66,
                'field_value_id' => NULL,
                'value' => '{"az":"Sint laudantium vel","en":"Iusto do ducimus do","ru":"Ad quis enim ut aliq"}',
            ),
            158 => 
            array (
                'id' => 335,
                'field_id' => 64,
                'post_id' => 66,
                'field_value_id' => NULL,
                'value' => '{"az":"Raymond Short","en":"Bianca Wallace","ru":"Charissa Rivers"}',
            ),
            159 => 
            array (
                'id' => 336,
                'field_id' => 65,
                'post_id' => 66,
                'field_value_id' => NULL,
                'value' => '{"az":"Expedita distinctio","en":"Dolor et tenetur et","ru":"Ullamco lorem laboru"}',
            ),
            160 => 
            array (
                'id' => 340,
                'field_id' => 72,
                'post_id' => 68,
                'field_value_id' => NULL,
                'value' => '{"az":"Nam sequi laudantium","en":"Delectus labore tem","ru":"Explicabo Eos reru"}',
            ),
            161 => 
            array (
                'id' => 341,
                'field_id' => 73,
                'post_id' => 68,
                'field_value_id' => NULL,
                'value' => '1994-07-26 00:00:00',
            ),
            162 => 
            array (
                'id' => 342,
                'field_id' => 74,
                'post_id' => 68,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            163 => 
            array (
                'id' => 343,
                'field_id' => 72,
                'post_id' => 69,
                'field_value_id' => NULL,
                'value' => '{"az":"Qui doloremque tenet","en":"Optio id neque aut","ru":"Minus qui sed recusa"}',
            ),
            164 => 
            array (
                'id' => 344,
                'field_id' => 73,
                'post_id' => 69,
                'field_value_id' => NULL,
                'value' => '1975-01-29 00:00:00',
            ),
            165 => 
            array (
                'id' => 345,
                'field_id' => 74,
                'post_id' => 69,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            166 => 
            array (
                'id' => 346,
                'field_id' => 82,
                'post_id' => 70,
                'field_value_id' => NULL,
                'value' => '2022-06-21 00:00:00',
            ),
            167 => 
            array (
                'id' => 347,
                'field_id' => 83,
                'post_id' => 70,
                'field_value_id' => NULL,
                'value' => '{"az":"\\u0130qtisadi Zonalar\\u0131n \\u0130nki\\u015faf\\u0131 Agentliyinin n\\u0259znind\\u0259 Pe\\u015f\\u0259 T\\u0259hsil M\\u0259rk\\u0259zi haqq\\u0131nda","en":"\\u0130qtisadi Zonalar\\u0131n \\u0130nki\\u015faf\\u0131 Agentliyinin n\\u0259znind\\u0259 Pe\\u015f\\u0259 T\\u0259hsil M\\u0259rk\\u0259zi haqq\\u0131nda","ru":"\\u0130qtisadi Zonalar\\u0131n \\u0130nki\\u015faf\\u0131 Agentliyinin n\\u0259znind\\u0259 Pe\\u015f\\u0259 T\\u0259hsil M\\u0259rk\\u0259zi haqq\\u0131nda"}',
            ),
            168 => 
            array (
                'id' => 348,
                'field_id' => 84,
                'post_id' => 70,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            169 => 
            array (
                'id' => 349,
                'field_id' => 82,
                'post_id' => 71,
                'field_value_id' => NULL,
                'value' => '1970-10-28 00:00:00',
            ),
            170 => 
            array (
                'id' => 350,
                'field_id' => 83,
                'post_id' => 71,
                'field_value_id' => NULL,
                'value' => '{"az":"In quo voluptatem a","en":"Aut nulla quae et do","ru":"Lorem accusantium pr"}',
            ),
            171 => 
            array (
                'id' => 351,
                'field_id' => 84,
                'post_id' => 71,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            172 => 
            array (
                'id' => 352,
                'field_id' => 82,
                'post_id' => 72,
                'field_value_id' => NULL,
                'value' => '2019-11-01 00:00:00',
            ),
            173 => 
            array (
                'id' => 353,
                'field_id' => 83,
                'post_id' => 72,
                'field_value_id' => NULL,
                'value' => '{"az":"Beatae cillum iste a","en":"Voluptate maiores te","ru":"Sit assumenda nulla"}',
            ),
            174 => 
            array (
                'id' => 354,
                'field_id' => 84,
                'post_id' => 72,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            175 => 
            array (
                'id' => 355,
                'field_id' => 82,
                'post_id' => 73,
                'field_value_id' => NULL,
                'value' => '1992-08-23 00:00:00',
            ),
            176 => 
            array (
                'id' => 356,
                'field_id' => 83,
                'post_id' => 73,
                'field_value_id' => NULL,
                'value' => '{"az":"In iure nisi consect","en":"Est elit iste deser","ru":"Aliquip obcaecati no"}',
            ),
            177 => 
            array (
                'id' => 357,
                'field_id' => 84,
                'post_id' => 73,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            178 => 
            array (
                'id' => 358,
                'field_id' => 82,
                'post_id' => 74,
                'field_value_id' => NULL,
                'value' => '1977-08-04 00:00:00',
            ),
            179 => 
            array (
                'id' => 359,
                'field_id' => 83,
                'post_id' => 74,
                'field_value_id' => NULL,
                'value' => '{"az":"Et sit temporibus d","en":"Voluptatem sunt vel","ru":"Tenetur fugit exped"}',
            ),
            180 => 
            array (
                'id' => 360,
                'field_id' => 84,
                'post_id' => 74,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            181 => 
            array (
                'id' => 361,
                'field_id' => 86,
                'post_id' => 75,
                'field_value_id' => NULL,
                'value' => '{"az":"Bell Buckner","en":"Chantale Phillips","ru":"Kenyon Burks"}',
            ),
            182 => 
            array (
                'id' => 362,
                'field_id' => 87,
                'post_id' => 75,
                'field_value_id' => NULL,
                'value' => '{"az":"Et voluptas et animi","en":"Numquam beatae ut ra","ru":"Lorem elit voluptat"}',
            ),
            183 => 
            array (
                'id' => 363,
                'field_id' => 88,
                'post_id' => 75,
                'field_value_id' => NULL,
                'value' => '{"az":"24hhhhhhh","en":"1hhhhhhhhh","ru":"4jjjjjjjjjjjjj"}',
            ),
            184 => 
            array (
                'id' => 364,
                'field_id' => 89,
                'post_id' => 75,
                'field_value_id' => NULL,
                'value' => '{"az":"Non est sed tempor","en":"Aut aspernatur aut v","ru":"Elit amet distinct"}',
            ),
            185 => 
            array (
                'id' => 365,
                'field_id' => 90,
                'post_id' => 75,
                'field_value_id' => NULL,
                'value' => '{"az":"410hhhh","en":"576hhhhh","ru":"523jjjjjjj"}',
            ),
            186 => 
            array (
                'id' => 366,
                'field_id' => 86,
                'post_id' => 76,
                'field_value_id' => NULL,
                'value' => '{"az":"Vielka Warner","en":"Nicholas Craft","ru":"Bethany Romero"}',
            ),
            187 => 
            array (
                'id' => 367,
                'field_id' => 87,
                'post_id' => 76,
                'field_value_id' => NULL,
                'value' => '{"az":"Cupidatat minus pari","en":"Placeat ullam volup","ru":"Perspiciatis cupida"}',
            ),
            188 => 
            array (
                'id' => 368,
                'field_id' => 88,
                'post_id' => 76,
                'field_value_id' => NULL,
                'value' => '{"az":"3","en":"3","ru":"6"}',
            ),
            189 => 
            array (
                'id' => 369,
                'field_id' => 89,
                'post_id' => 76,
                'field_value_id' => NULL,
                'value' => '{"az":"Ea fugiat suscipit v","en":"Unde maxime mollitia","ru":"Dolorem esse ipsa d"}',
            ),
            190 => 
            array (
                'id' => 370,
                'field_id' => 90,
                'post_id' => 76,
                'field_value_id' => NULL,
                'value' => '{"az":"368","en":"940","ru":"401"}',
            ),
            191 => 
            array (
                'id' => 371,
                'field_id' => 98,
                'post_id' => 77,
                'field_value_id' => NULL,
                'value' => '{"az":"Sumqay\\u0131t sanaye park\\u0131 haqq\\u0131nda","en":"Sumqay\\u0131t sanaye park\\u0131 haqq\\u0131nda","ru":"Sumqay\\u0131t sanaye park\\u0131 haqq\\u0131nda"}',
            ),
            192 => 
            array (
                'id' => 372,
                'field_id' => 99,
                'post_id' => 77,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131 \\u201cSumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n yarad\\u0131lmas\\u0131 haqq\\u0131nda\\u201d Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 2011-ci il 21 dekabr tarixli 548 n\\u00f6mr\\u0259li F\\u0259rman\\u0131 il\\u0259 yarad\\u0131lm\\u0131\\u015fd\\u0131r.<\\/p><p><br><img class=\\"image_resized\\" style=\\"width:100%;\\" src=\\"https:\\/\\/scip-html.saffman.uk\\/assets\\/images\\/ricardo-gomez-angel-F2iCP_knaj8-unsplash%203.png\\" alt=\\"\\"><br><br>Sumqay\\u0131t sanaye park\\u0131 yarad\\u0131lmas\\u0131nda m\\u0259qs\\u0259d<\\/p><p>Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131 \\u201cSumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n yarad\\u0131lmas\\u0131 haqq\\u0131nda\\u201d Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 2011-ci il 21 dekabr tarixli 548 n\\u00f6mr\\u0259li F\\u0259rman\\u0131 il\\u0259 yarad\\u0131lm\\u0131\\u015fd\\u0131r.<\\/p><p><br>&nbsp;<\\/p><ul><li>Accessibility and affordability of financial resources<\\/li><li>Government Funds<\\/li><li>Alternative funding models\\/new financing sources<\\/li><li>Developing tailored lending practices through banks<\\/li><\\/ul><p>&nbsp;<\\/p>","en":"<p>Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131 \\u201cSumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n yarad\\u0131lmas\\u0131 haqq\\u0131nda\\u201d Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 2011-ci il 21 dekabr tarixli 548 n\\u00f6mr\\u0259li F\\u0259rman\\u0131 il\\u0259 yarad\\u0131lm\\u0131\\u015fd\\u0131r.<\\/p><p><br><img class=\\"image_resized\\" style=\\"width:100%;\\" src=\\"https:\\/\\/scip-html.saffman.uk\\/assets\\/images\\/ricardo-gomez-angel-F2iCP_knaj8-unsplash%203.png\\" alt=\\"\\"><br><br>Sumqay\\u0131t sanaye park\\u0131 yarad\\u0131lmas\\u0131nda m\\u0259qs\\u0259d<\\/p><p>Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131 \\u201cSumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n yarad\\u0131lmas\\u0131 haqq\\u0131nda\\u201d Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 2011-ci il 21 dekabr tarixli 548 n\\u00f6mr\\u0259li F\\u0259rman\\u0131 il\\u0259 yarad\\u0131lm\\u0131\\u015fd\\u0131r.<\\/p><p><br>&nbsp;<\\/p><ul><li>Accessibility and affordability of financial resources<\\/li><li>Government Funds<\\/li><li>Alternative funding models\\/new financing sources<\\/li><li>Developing tailored lending practices through banks<\\/li><\\/ul><p>&nbsp;<\\/p>","ru":"<p>Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131 \\u201cSumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n yarad\\u0131lmas\\u0131 haqq\\u0131nda\\u201d Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 2011-ci il 21 dekabr tarixli 548 n\\u00f6mr\\u0259li F\\u0259rman\\u0131 il\\u0259 yarad\\u0131lm\\u0131\\u015fd\\u0131r.<\\/p><p><br><img class=\\"image_resized\\" style=\\"width:100%;\\" src=\\"https:\\/\\/scip-html.saffman.uk\\/assets\\/images\\/ricardo-gomez-angel-F2iCP_knaj8-unsplash%203.png\\" alt=\\"\\"><br><br>Sumqay\\u0131t sanaye park\\u0131 yarad\\u0131lmas\\u0131nda m\\u0259qs\\u0259d<\\/p><p>Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131 \\u201cSumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n yarad\\u0131lmas\\u0131 haqq\\u0131nda\\u201d Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 2011-ci il 21 dekabr tarixli 548 n\\u00f6mr\\u0259li F\\u0259rman\\u0131 il\\u0259 yarad\\u0131lm\\u0131\\u015fd\\u0131r.<\\/p><p><br>&nbsp;<\\/p><ul><li>Accessibility and affordability of financial resources<\\/li><li>Government Funds<\\/li><li>Alternative funding models\\/new financing sources<\\/li><li>Developing tailored lending practices through banks<\\/li><\\/ul><p>&nbsp;<\\/p>"}',
            ),
            193 => 
            array (
                'id' => 373,
                'field_id' => 100,
                'post_id' => 77,
                'field_value_id' => NULL,
                'value' => '{"az":"3,2 milyard AB\\u015e dollar\\u0131","en":"3,2 milyard AB\\u015e dollar\\u0131","ru":"3,2 milyard AB\\u015e dollar\\u0131"}',
            ),
            194 => 
            array (
                'id' => 374,
                'field_id' => 101,
                'post_id' => 77,
                'field_value_id' => NULL,
                'value' => '{"az":"5500 n\\u0259f\\u0259r","en":"5500 n\\u0259f\\u0259r","ru":"5500 n\\u0259f\\u0259r"}',
            ),
            195 => 
            array (
                'id' => 375,
                'field_id' => 102,
                'post_id' => 77,
                'field_value_id' => NULL,
                'value' => '{"az":"583,5 hektar","en":"583,5 hektar","ru":"583,5 hektar"}',
            ),
            196 => 
            array (
                'id' => 376,
                'field_id' => 103,
                'post_id' => 78,
                'field_value_id' => NULL,
                'value' => '01',
            ),
            197 => 
            array (
                'id' => 377,
                'field_id' => 104,
                'post_id' => 78,
                'field_value_id' => NULL,
                'value' => '{"az":"Kimya s\\u0259nayesi m\\u0259hsullar\\u0131, o c\\u00fcml\\u0259d\\u0259n qeyri-\\u00fczvi kimya, \\u00fczvi sintez kimyas\\u0131, polimerl\\u0259r kimyas\\u0131, m\\u0259i\\u015f\\u0259t kimyas\\u0131 v\\u0259 \\u0259cza\\u00e7\\u0131l\\u0131q kimyas\\u0131 m\\u0259hsullar\\u0131;","en":"Kimya s\\u0259nayesi m\\u0259hsullar\\u0131, o c\\u00fcml\\u0259d\\u0259n qeyri-\\u00fczvi kimya, \\u00fczvi sintez kimyas\\u0131, polimerl\\u0259r kimyas\\u0131, m\\u0259i\\u015f\\u0259t kimyas\\u0131 v\\u0259 \\u0259cza\\u00e7\\u0131l\\u0131q kimyas\\u0131 m\\u0259hsullar\\u0131;","ru":"Kimya s\\u0259nayesi m\\u0259hsullar\\u0131, o c\\u00fcml\\u0259d\\u0259n qeyri-\\u00fczvi kimya, \\u00fczvi sintez kimyas\\u0131, polimerl\\u0259r kimyas\\u0131, m\\u0259i\\u015f\\u0259t kimyas\\u0131 v\\u0259 \\u0259cza\\u00e7\\u0131l\\u0131q kimyas\\u0131 m\\u0259hsullar\\u0131;"}',
            ),
            198 => 
            array (
                'id' => 378,
                'field_id' => 103,
                'post_id' => 79,
                'field_value_id' => NULL,
                'value' => '02',
            ),
            199 => 
            array (
                'id' => 379,
                'field_id' => 104,
                'post_id' => 79,
                'field_value_id' => NULL,
                'value' => '{"az":"Ma\\u015f\\u0131nqay\\u0131rma s\\u0259nayesi m\\u0259hsullar\\u0131, o c\\u00fcml\\u0259d\\u0259n elektroenergetika \\u00fczr\\u0259 m\\u0259hsullar, d\\u0259zgah v\\u0259 al\\u0259tqay\\u0131rma, avtomobilqay\\u0131rma, k\\u0259nd t\\u0259s\\u0259rr\\u00fcfat\\u0131 \\u00fc\\u00e7\\u00fcn texnika v\\u0259 cihazqay\\u0131rma m\\u0259hsullar\\u0131","en":"Ma\\u015f\\u0131nqay\\u0131rma s\\u0259nayesi m\\u0259hsullar\\u0131, o c\\u00fcml\\u0259d\\u0259n elektroenergetika \\u00fczr\\u0259 m\\u0259hsullar, d\\u0259zgah v\\u0259 al\\u0259tqay\\u0131rma, avtomobilqay\\u0131rma, k\\u0259nd t\\u0259s\\u0259rr\\u00fcfat\\u0131 \\u00fc\\u00e7\\u00fcn texnika v\\u0259 cihazqay\\u0131rma m\\u0259hsullar\\u0131","ru":"Ma\\u015f\\u0131nqay\\u0131rma s\\u0259nayesi m\\u0259hsullar\\u0131, o c\\u00fcml\\u0259d\\u0259n elektroenergetika \\u00fczr\\u0259 m\\u0259hsullar, d\\u0259zgah v\\u0259 al\\u0259tqay\\u0131rma, avtomobilqay\\u0131rma, k\\u0259nd t\\u0259s\\u0259rr\\u00fcfat\\u0131 \\u00fc\\u00e7\\u00fcn texnika v\\u0259 cihazqay\\u0131rma m\\u0259hsullar\\u0131"}',
            ),
            200 => 
            array (
                'id' => 380,
                'field_id' => 103,
                'post_id' => 80,
                'field_value_id' => NULL,
                'value' => '03',
            ),
            201 => 
            array (
                'id' => 381,
                'field_id' => 104,
                'post_id' => 80,
                'field_value_id' => NULL,
                'value' => '{"az":"Metallurgiya s\\u0259nayesi m\\u0259hsullar\\u0131, metallurji prosesl\\u0259r \\u00fc\\u00e7\\u00fcn qatq\\u0131lar, o c\\u00fcml\\u0259d\\u0259n qara v\\u0259 \\u0259lvan metal m\\u0259hsullar\\u0131","en":"Metallurgiya s\\u0259nayesi m\\u0259hsullar\\u0131, metallurji prosesl\\u0259r \\u00fc\\u00e7\\u00fcn qatq\\u0131lar, o c\\u00fcml\\u0259d\\u0259n qara v\\u0259 \\u0259lvan metal m\\u0259hsullar\\u0131","ru":"Metallurgiya s\\u0259nayesi m\\u0259hsullar\\u0131, metallurji prosesl\\u0259r \\u00fc\\u00e7\\u00fcn qatq\\u0131lar, o c\\u00fcml\\u0259d\\u0259n qara v\\u0259 \\u0259lvan metal m\\u0259hsullar\\u0131"}',
            ),
            202 => 
            array (
                'id' => 382,
                'field_id' => 105,
                'post_id' => 81,
                'field_value_id' => NULL,
                'value' => '{"az":"Ba\\u015f plan","en":"Ba\\u015f plan","ru":"Ba\\u015f plan"}',
            ),
            203 => 
            array (
                'id' => 383,
                'field_id' => 106,
                'post_id' => 81,
                'field_value_id' => NULL,
                'value' => '{"az":"<p style=\\"margin-left:-12px;\\">&nbsp; &nbsp; Ba\\u015f plan<\\/p>","en":"<p>&nbsp; &nbsp; Ba\\u015f plan<\\/p>","ru":"<p>&nbsp; &nbsp; Ba\\u015f plan<\\/p>"}',
            ),
            204 => 
            array (
                'id' => 388,
                'field_id' => 110,
                'post_id' => 82,
                'field_value_id' => NULL,
                'value' => '{"az":"Totam qui non ipsum","en":"Ipsum omnis qui lab","ru":"Et modi et amet in"}',
            ),
            205 => 
            array (
                'id' => 389,
                'field_id' => 109,
                'post_id' => 82,
                'field_value_id' => NULL,
                'value' => 'icon-icon-1',
            ),
            206 => 
            array (
                'id' => 390,
                'field_id' => 108,
                'post_id' => 82,
                'field_value_id' => NULL,
                'value' => '120VT',
            ),
            207 => 
            array (
                'id' => 391,
                'field_id' => 107,
                'post_id' => 82,
                'field_value_id' => NULL,
                'value' => '{"az":"Ut ipsam unde quia e","en":"Enim veniam libero","ru":"In at nulla quibusda"}',
            ),
            208 => 
            array (
                'id' => 392,
                'field_id' => 111,
                'post_id' => 83,
                'field_value_id' => NULL,
                'value' => '35 km',
            ),
            209 => 
            array (
                'id' => 393,
                'field_id' => 112,
                'post_id' => 83,
                'field_value_id' => NULL,
                'value' => '{"az":"Heyd\\u0259r \\u018fliyev ad\\u0131na Beyn\\u0259lxalq Hava liman\\u0131na 35 km m\\u0259saf\\u0259d\\u0259 yerl\\u0259\\u015fir","en":"Heyd\\u0259r \\u018fliyev ad\\u0131na Beyn\\u0259lxalq Hava liman\\u0131na 35 km m\\u0259saf\\u0259d\\u0259 yerl\\u0259\\u015fir","ru":"Heyd\\u0259r \\u018fliyev ad\\u0131na Beyn\\u0259lxalq Hava liman\\u0131na 35 km m\\u0259saf\\u0259d\\u0259 yerl\\u0259\\u015fir"}',
            ),
            210 => 
            array (
                'id' => 394,
                'field_id' => 113,
                'post_id' => 84,
                'field_value_id' => NULL,
                'value' => '{"az":"<p style=\\"margin-left:-12px;\\">Se\\u00e7ilmi\\u015f m\\u0259hsullar<\\/p><p><br>&nbsp;<\\/p><p>&nbsp;<\\/p><p>&nbsp;<\\/p>","en":"<p style=\\"margin-left:-12px;\\">Se\\u00e7ilmi\\u015f m\\u0259hsullar<\\/p><p><br>&nbsp;<\\/p><p>&nbsp;<\\/p><p>&nbsp;<\\/p>","ru":"<p style=\\"margin-left:-12px;\\">Se\\u00e7ilmi\\u015f m\\u0259hsullar<\\/p><p><br>&nbsp;<\\/p><p>&nbsp;<\\/p><p>&nbsp;<\\/p>"}',
            ),
            211 => 
            array (
                'id' => 402,
                'field_id' => 114,
                'post_id' => 87,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            212 => 
            array (
                'id' => 403,
                'field_id' => 115,
                'post_id' => 87,
                'field_value_id' => NULL,
                'value' => '{"az":"\\u201cBaku Non Ferrous and Foundry Company\\u201d MMC","en":"\\u201cBaku Non Ferrous and Foundry Company\\u201d MMC","ru":"\\u201cBaku Non Ferrous and Foundry Company\\u201d MMC"}',
            ),
            213 => 
            array (
                'id' => 404,
                'field_id' => 116,
                'post_id' => 87,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>\\u201cAzertexnolayn\\u201d M\\u0259hdud M\\u0259suliyy\\u0259tli C\\u0259miyy\\u0259ti Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n rezidenti kimi qeydiyyata al\\u0131n\\u0131b.<\\/p><p><br>&nbsp;<\\/p><p>M\\u00fc\\u0259ssis\\u0259d\\u0259 Almaniya, T\\u00fcrkiy\\u0259, \\u00c7in texnologiyalar\\u0131 \\u0259sas\\u0131nda m\\u00fcxt\\u0259lif diametrli polad borular, y\\u00fcks\\u0259k t\\u0259zyiq\\u0259 davaml\\u0131 hidrotexniki avadanl\\u0131qlar, x\\u00fcsusi t\\u0259yinatl\\u0131 m\\u00fcxt\\u0259lif diametrli polietilen borular istehsal edilir. \\u201cAzertexnolayn\\u201d MMC-nin 3 zavodu \\u2013 Polad boru zavodu, Polietilen m\\u0259mulatlar\\u0131 zavodu v\\u0259 Texniki avadanl\\u0131qlar zavodu f\\u0259aliyy\\u0259t g\\u00f6st\\u0259rir.<\\/p>","en":"<p>\\u201cAzertexnolayn\\u201d M\\u0259hdud M\\u0259suliyy\\u0259tli C\\u0259miyy\\u0259ti Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n rezidenti kimi qeydiyyata al\\u0131n\\u0131b.<\\/p><p><br>&nbsp;<\\/p><p>M\\u00fc\\u0259ssis\\u0259d\\u0259 Almaniya, T\\u00fcrkiy\\u0259, \\u00c7in texnologiyalar\\u0131 \\u0259sas\\u0131nda m\\u00fcxt\\u0259lif diametrli polad borular, y\\u00fcks\\u0259k t\\u0259zyiq\\u0259 davaml\\u0131 hidrotexniki avadanl\\u0131qlar, x\\u00fcsusi t\\u0259yinatl\\u0131 m\\u00fcxt\\u0259lif diametrli polietilen borular istehsal edilir. \\u201cAzertexnolayn\\u201d MMC-nin 3 zavodu \\u2013 Polad boru zavodu, Polietilen m\\u0259mulatlar\\u0131 zavodu v\\u0259 Texniki avadanl\\u0131qlar zavodu f\\u0259aliyy\\u0259t g\\u00f6st\\u0259rir.<\\/p>","ru":"<p>\\u201cAzertexnolayn\\u201d M\\u0259hdud M\\u0259suliyy\\u0259tli C\\u0259miyy\\u0259ti Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n rezidenti kimi qeydiyyata al\\u0131n\\u0131b.<\\/p><p><br>&nbsp;<\\/p><p>M\\u00fc\\u0259ssis\\u0259d\\u0259 Almaniya, T\\u00fcrkiy\\u0259, \\u00c7in texnologiyalar\\u0131 \\u0259sas\\u0131nda m\\u00fcxt\\u0259lif diametrli polad borular, y\\u00fcks\\u0259k t\\u0259zyiq\\u0259 davaml\\u0131 hidrotexniki avadanl\\u0131qlar, x\\u00fcsusi t\\u0259yinatl\\u0131 m\\u00fcxt\\u0259lif diametrli polietilen borular istehsal edilir. \\u201cAzertexnolayn\\u201d MMC-nin 3 zavodu \\u2013 Polad boru zavodu, Polietilen m\\u0259mulatlar\\u0131 zavodu v\\u0259 Texniki avadanl\\u0131qlar zavodu f\\u0259aliyy\\u0259t g\\u00f6st\\u0259rir.<\\/p>"}',
            ),
            214 => 
            array (
                'id' => 405,
                'field_id' => 117,
                'post_id' => 87,
                'field_value_id' => NULL,
            'value' => '(+99412) 000 00 00',
            ),
            215 => 
            array (
                'id' => 406,
                'field_id' => 118,
                'post_id' => 87,
                'field_value_id' => NULL,
                'value' => 'qynegexa@mailinator.com',
            ),
            216 => 
            array (
                'id' => 407,
                'field_id' => 119,
                'post_id' => 87,
                'field_value_id' => NULL,
                'value' => 'https://www.pyx.co.uk',
            ),
            217 => 
            array (
                'id' => 408,
                'field_id' => 120,
                'post_id' => 87,
                'field_value_id' => NULL,
                'value' => '{"az":"Az\\u0259rtexnonline","en":"Az\\u0259rtexnonline","ru":"Az\\u0259rtexnonline"}',
            ),
            218 => 
            array (
                'id' => 416,
                'field_id' => 116,
                'post_id' => 88,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>\\u201cAzertexnolayn\\u201d M\\u0259hdud M\\u0259suliyy\\u0259tli C\\u0259miyy\\u0259ti Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n rezidenti kimi qeydiyyata al\\u0131n\\u0131b.<\\/p><p><br>&nbsp;<\\/p><p>M\\u00fc\\u0259ssis\\u0259d\\u0259 Almaniya, T\\u00fcrkiy\\u0259, \\u00c7in texnologiyalar\\u0131 \\u0259sas\\u0131nda m\\u00fcxt\\u0259lif diametrli polad borular, y\\u00fcks\\u0259k t\\u0259zyiq\\u0259 davaml\\u0131 hidrotexniki avadanl\\u0131qlar, x\\u00fcsusi t\\u0259yinatl\\u0131 m\\u00fcxt\\u0259lif diametrli polietilen borular istehsal edilir. \\u201cAzertexnolayn\\u201d MMC-nin 3 zavodu \\u2013 Polad boru zavodu, Polietilen m\\u0259mulatlar\\u0131 zavodu v\\u0259 Texniki avadanl\\u0131qlar zavodu f\\u0259aliyy\\u0259t g\\u00f6st\\u0259rir.<\\/p>","en":"<p>\\u201cAzertexnolayn\\u201d M\\u0259hdud M\\u0259suliyy\\u0259tli C\\u0259miyy\\u0259ti Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n rezidenti kimi qeydiyyata al\\u0131n\\u0131b.<\\/p><p><br>&nbsp;<\\/p><p>M\\u00fc\\u0259ssis\\u0259d\\u0259 Almaniya, T\\u00fcrkiy\\u0259, \\u00c7in texnologiyalar\\u0131 \\u0259sas\\u0131nda m\\u00fcxt\\u0259lif diametrli polad borular, y\\u00fcks\\u0259k t\\u0259zyiq\\u0259 davaml\\u0131 hidrotexniki avadanl\\u0131qlar, x\\u00fcsusi t\\u0259yinatl\\u0131 m\\u00fcxt\\u0259lif diametrli polietilen borular istehsal edilir. \\u201cAzertexnolayn\\u201d MMC-nin 3 zavodu \\u2013 Polad boru zavodu, Polietilen m\\u0259mulatlar\\u0131 zavodu v\\u0259 Texniki avadanl\\u0131qlar zavodu f\\u0259aliyy\\u0259t g\\u00f6st\\u0259rir.<\\/p>","ru":"<p>\\u201cAzertexnolayn\\u201d M\\u0259hdud M\\u0259suliyy\\u0259tli C\\u0259miyy\\u0259ti Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n rezidenti kimi qeydiyyata al\\u0131n\\u0131b.<\\/p><p><br>&nbsp;<\\/p><p>M\\u00fc\\u0259ssis\\u0259d\\u0259 Almaniya, T\\u00fcrkiy\\u0259, \\u00c7in texnologiyalar\\u0131 \\u0259sas\\u0131nda m\\u00fcxt\\u0259lif diametrli polad borular, y\\u00fcks\\u0259k t\\u0259zyiq\\u0259 davaml\\u0131 hidrotexniki avadanl\\u0131qlar, x\\u00fcsusi t\\u0259yinatl\\u0131 m\\u00fcxt\\u0259lif diametrli polietilen borular istehsal edilir. \\u201cAzertexnolayn\\u201d MMC-nin 3 zavodu \\u2013 Polad boru zavodu, Polietilen m\\u0259mulatlar\\u0131 zavodu v\\u0259 Texniki avadanl\\u0131qlar zavodu f\\u0259aliyy\\u0259t g\\u00f6st\\u0259rir.<\\/p>"}',
            ),
            219 => 
            array (
                'id' => 417,
                'field_id' => 118,
                'post_id' => 88,
                'field_value_id' => NULL,
                'value' => 'info@azertexnolayn.com',
            ),
            220 => 
            array (
                'id' => 418,
                'field_id' => 114,
                'post_id' => 88,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            221 => 
            array (
                'id' => 419,
                'field_id' => 117,
                'post_id' => 88,
                'field_value_id' => NULL,
            'value' => '(+99412) 000 00 00',
            ),
            222 => 
            array (
                'id' => 420,
                'field_id' => 120,
                'post_id' => 88,
                'field_value_id' => NULL,
                'value' => '{"az":"\\u201cBaku Non Ferrous and Foundry Company\\u201d MMC","en":"\\u201cBaku Non Ferrous and Foundry Company\\u201d MMC","ru":"\\u201cBaku Non Ferrous and Foundry Company\\u201d MMC"}',
            ),
            223 => 
            array (
                'id' => 421,
                'field_id' => 115,
                'post_id' => 88,
                'field_value_id' => NULL,
                'value' => '{"az":"\\u201cBaku Non Ferrous and Foundry Company\\u201d MMC","en":"\\u201cBaku Non Ferrous and Foundry Company\\u201d MMC","ru":"\\u201cBaku Non Ferrous and Foundry Company\\u201d MMC"}',
            ),
            224 => 
            array (
                'id' => 422,
                'field_id' => 119,
                'post_id' => 88,
                'field_value_id' => NULL,
                'value' => 'http://www.azertexnolayn.com',
            ),
            225 => 
            array (
                'id' => 423,
                'field_id' => 98,
                'post_id' => 89,
                'field_value_id' => NULL,
                'value' => '{"az":"Sumqay\\u0131t sanaye park\\u0131 haqq\\u0131nda","en":"Sumqay\\u0131t sanaye park\\u0131 haqq\\u0131nda","ru":"Sumqay\\u0131t sanaye park\\u0131 haqq\\u0131nda"}',
            ),
            226 => 
            array (
                'id' => 424,
                'field_id' => 99,
                'post_id' => 89,
                'field_value_id' => NULL,
                'value' => '{"az":"<p><img class=\\"image_resized\\" style=\\"width:100%;\\" src=\\"https:\\/\\/scip-html.saffman.uk\\/assets\\/images\\/ricardo-gomez-angel-F2iCP_knaj8-unsplash%203.png\\" alt=\\"\\"><br><br>Sumqay\\u0131t sanaye park\\u0131 yarad\\u0131lmas\\u0131nda m\\u0259qs\\u0259d<\\/p><p>Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131 \\u201cSumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n yarad\\u0131lmas\\u0131 haqq\\u0131nda\\u201d Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 2011-ci il 21 dekabr tarixli 548 n\\u00f6mr\\u0259li F\\u0259rman\\u0131 il\\u0259 yarad\\u0131lm\\u0131\\u015fd\\u0131r.<\\/p><p><br>&nbsp;<\\/p><ul><li>Accessibility and affordability of financial resources<\\/li><li>Government Funds<\\/li><li>Alternative funding models\\/new financing sources<\\/li><li>Developing tailored lending practices through banks<\\/li><\\/ul><p>&nbsp;<\\/p>","en":"<p><img class=\\"image_resized\\" style=\\"width:100%;\\" src=\\"https:\\/\\/scip-html.saffman.uk\\/assets\\/images\\/ricardo-gomez-angel-F2iCP_knaj8-unsplash%203.png\\" alt=\\"\\"><br><br>Sumqay\\u0131t sanaye park\\u0131 yarad\\u0131lmas\\u0131nda m\\u0259qs\\u0259d<\\/p><p>Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131 \\u201cSumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n yarad\\u0131lmas\\u0131 haqq\\u0131nda\\u201d Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 2011-ci il 21 dekabr tarixli 548 n\\u00f6mr\\u0259li F\\u0259rman\\u0131 il\\u0259 yarad\\u0131lm\\u0131\\u015fd\\u0131r.<\\/p><p><br>&nbsp;<\\/p><ul><li>Accessibility and affordability of financial resources<\\/li><li>Government Funds<\\/li><li>Alternative funding models\\/new financing sources<\\/li><li>Developing tailored lending practices through banks<\\/li><\\/ul><p>&nbsp;<\\/p>","ru":"<p><img class=\\"image_resized\\" style=\\"width:100%;\\" src=\\"https:\\/\\/scip-html.saffman.uk\\/assets\\/images\\/ricardo-gomez-angel-F2iCP_knaj8-unsplash%203.png\\" alt=\\"\\"><br><br>Sumqay\\u0131t sanaye park\\u0131 yarad\\u0131lmas\\u0131nda m\\u0259qs\\u0259d<\\/p><p>Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131 \\u201cSumqay\\u0131t Kimya S\\u0259naye Park\\u0131n\\u0131n yarad\\u0131lmas\\u0131 haqq\\u0131nda\\u201d Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 2011-ci il 21 dekabr tarixli 548 n\\u00f6mr\\u0259li F\\u0259rman\\u0131 il\\u0259 yarad\\u0131lm\\u0131\\u015fd\\u0131r.<\\/p><p><br>&nbsp;<\\/p><ul><li>Accessibility and affordability of financial resources<\\/li><li>Government Funds<\\/li><li>Alternative funding models\\/new financing sources<\\/li><li>Developing tailored lending practices through banks<\\/li><\\/ul><p>&nbsp;<\\/p>"}',
            ),
            227 => 
            array (
                'id' => 425,
                'field_id' => 100,
                'post_id' => 89,
                'field_value_id' => NULL,
                'value' => '{"az":"3,2 milyard AB\\u015e dollar\\u0131","en":"3,2 milyard AB\\u015e dollar\\u0131","ru":"3,2 milyard AB\\u015e dollar\\u0131"}',
            ),
            228 => 
            array (
                'id' => 426,
                'field_id' => 101,
                'post_id' => 89,
                'field_value_id' => NULL,
                'value' => '{"az":"5500 n\\u0259f\\u0259r","en":"5500 n\\u0259f\\u0259r","ru":"5500 n\\u0259f\\u0259r"}',
            ),
            229 => 
            array (
                'id' => 427,
                'field_id' => 102,
                'post_id' => 89,
                'field_value_id' => NULL,
                'value' => '{"az":"583,5 hektar","en":"583,5 hektar","ru":"583,5 hektar"}',
            ),
            230 => 
            array (
                'id' => 428,
                'field_id' => 103,
                'post_id' => 90,
                'field_value_id' => NULL,
                'value' => '01',
            ),
            231 => 
            array (
                'id' => 429,
                'field_id' => 104,
                'post_id' => 90,
                'field_value_id' => NULL,
                'value' => '{"az":"2 906 hektarl\\u0131q \\u0259razid\\u0259 bitki\\u00e7ilik, heyvandarl\\u0131q, v\\u0259 pamb\\u0131q emal\\u0131n\\u0131n t\\u0259\\u015fkili","en":"2 906 hektarl\\u0131q \\u0259razid\\u0259 bitki\\u00e7ilik, heyvandarl\\u0131q, v\\u0259 pamb\\u0131q emal\\u0131n\\u0131n t\\u0259\\u015fkili","ru":"2 906 hektarl\\u0131q \\u0259razid\\u0259 bitki\\u00e7ilik, heyvandarl\\u0131q, v\\u0259 pamb\\u0131q emal\\u0131n\\u0131n t\\u0259\\u015fkili"}',
            ),
            232 => 
            array (
                'id' => 430,
                'field_id' => 105,
                'post_id' => 91,
                'field_value_id' => NULL,
                'value' => '{"az":"plan","en":"plan","ru":"plan"}',
            ),
            233 => 
            array (
                'id' => 431,
                'field_id' => 106,
                'post_id' => 91,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>plan<\\/p>","en":"<p>plan<\\/p>","ru":"<p>plan<\\/p>"}',
            ),
            234 => 
            array (
                'id' => 432,
                'field_id' => 121,
                'post_id' => 92,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            235 => 
            array (
                'id' => 433,
                'field_id' => 107,
                'post_id' => 93,
                'field_value_id' => NULL,
                'value' => '{"az":"Elektrik enerjisi t\\u0259chizat\\u0131","en":"Elektrik enerjisi t\\u0259chizat\\u0131","ru":"Elektrik enerjisi t\\u0259chizat\\u0131"}',
            ),
            236 => 
            array (
                'id' => 434,
                'field_id' => 108,
                'post_id' => 93,
                'field_value_id' => NULL,
                'value' => '140 MVt',
            ),
            237 => 
            array (
                'id' => 435,
                'field_id' => 109,
                'post_id' => 93,
                'field_value_id' => NULL,
                'value' => 'icon-icon-1',
            ),
            238 => 
            array (
                'id' => 436,
                'field_id' => 110,
                'post_id' => 93,
                'field_value_id' => NULL,
                'value' => '{"az":"Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131nda f\\u0259aliyy\\u0259t g\\u00f6st\\u0259r\\u0259n m\\u00fc\\u0259ssis\\u0259l\\u0259rin fasil\\u0259siz v\\u0259 keyfiyy\\u0259tli elektrik enerjisi il\\u0259 t\\u0259min edilm\\u0259si \\u00fc\\u00e7\\u00fcn 2 \\u0259d\\u0259d 110\\/35\\/6 kV-luq v\\u0259 1 \\u0259d\\u0259d 110\\/6 kV-luq elektrik yar\\u0131mstansiyalar\\u0131, 5 \\u0259d\\u0259d paylay\\u0131c\\u0131 m\\u0259nt\\u0259q\\u0259, 22 \\u0259d\\u0259d transformator m\\u0259nt\\u0259q\\u0259si f\\u0259aliyy\\u0259t g\\u00f6st\\u0259rir. \\u00dcmumi g\\u00fcc 140 MVt t\\u0259\\u015fkil edir.","en":"Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131nda f\\u0259aliyy\\u0259t g\\u00f6st\\u0259r\\u0259n m\\u00fc\\u0259ssis\\u0259l\\u0259rin fasil\\u0259siz v\\u0259 keyfiyy\\u0259tli elektrik enerjisi il\\u0259 t\\u0259min edilm\\u0259si \\u00fc\\u00e7\\u00fcn 2 \\u0259d\\u0259d 110\\/35\\/6 kV-luq v\\u0259 1 \\u0259d\\u0259d 110\\/6 kV-luq elektrik yar\\u0131mstansiyalar\\u0131, 5 \\u0259d\\u0259d paylay\\u0131c\\u0131 m\\u0259nt\\u0259q\\u0259, 22 \\u0259d\\u0259d transformator m\\u0259nt\\u0259q\\u0259si f\\u0259aliyy\\u0259t g\\u00f6st\\u0259rir. \\u00dcmumi g\\u00fcc 140 MVt t\\u0259\\u015fkil edir.","ru":"Sumqay\\u0131t Kimya S\\u0259naye Park\\u0131nda f\\u0259aliyy\\u0259t g\\u00f6st\\u0259r\\u0259n m\\u00fc\\u0259ssis\\u0259l\\u0259rin fasil\\u0259siz v\\u0259 keyfiyy\\u0259tli elektrik enerjisi il\\u0259 t\\u0259min edilm\\u0259si \\u00fc\\u00e7\\u00fcn 2 \\u0259d\\u0259d 110\\/35\\/6 kV-luq v\\u0259 1 \\u0259d\\u0259d 110\\/6 kV-luq elektrik yar\\u0131mstansiyalar\\u0131, 5 \\u0259d\\u0259d paylay\\u0131c\\u0131 m\\u0259nt\\u0259q\\u0259, 22 \\u0259d\\u0259d transformator m\\u0259nt\\u0259q\\u0259si f\\u0259aliyy\\u0259t g\\u00f6st\\u0259rir. \\u00dcmumi g\\u00fcc 140 MVt t\\u0259\\u015fkil edir."}',
            ),
            239 => 
            array (
                'id' => 437,
                'field_id' => 111,
                'post_id' => 94,
                'field_value_id' => NULL,
                'value' => '35 km',
            ),
            240 => 
            array (
                'id' => 438,
                'field_id' => 112,
                'post_id' => 94,
                'field_value_id' => NULL,
                'value' => '{"az":"Heyd\\u0259r \\u018fliyev ad\\u0131na Beyn\\u0259lxalq Hava liman\\u0131na 35 km m\\u0259saf\\u0259d\\u0259 yerl\\u0259\\u015fir","en":"Heyd\\u0259r \\u018fliyev ad\\u0131na Beyn\\u0259lxalq Hava liman\\u0131na 35 km m\\u0259saf\\u0259d\\u0259 yerl\\u0259\\u015fir","ru":"Heyd\\u0259r \\u018fliyev ad\\u0131na Beyn\\u0259lxalq Hava liman\\u0131na 35 km m\\u0259saf\\u0259d\\u0259 yerl\\u0259\\u015fir"}',
            ),
            241 => 
            array (
                'id' => 439,
                'field_id' => 38,
                'post_id' => 95,
                'field_value_id' => NULL,
                'value' => '{"az":"Aut asperiores ea ex","en":"Excepteur et magna e","ru":"Aperiam qui reprehen"}',
            ),
            242 => 
            array (
                'id' => 440,
                'field_id' => 39,
                'post_id' => 95,
                'field_value_id' => NULL,
                'value' => '{"az":"In tenetur et dolor","en":"Qui est nihil qui co","ru":"Tenetur dicta nihil"}',
            ),
            243 => 
            array (
                'id' => 441,
                'field_id' => 40,
                'post_id' => 95,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            244 => 
            array (
                'id' => 442,
                'field_id' => 41,
                'post_id' => 95,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            245 => 
            array (
                'id' => 443,
                'field_id' => 42,
                'post_id' => 95,
                'field_value_id' => NULL,
                'value' => '2006-02-18 00:00:00',
            ),
            246 => 
            array (
                'id' => 489,
                'field_id' => 43,
                'post_id' => 102,
                'field_value_id' => NULL,
                'value' => '{"az":"Duis in illum volup","en":"Sint vitae temporibu","ru":"Non expedita laborum"}',
            ),
            247 => 
            array (
                'id' => 490,
                'field_id' => 44,
                'post_id' => 102,
                'field_value_id' => NULL,
                'value' => '2008-05-19 00:00:00',
            ),
            248 => 
            array (
                'id' => 491,
                'field_id' => 45,
                'post_id' => 102,
                'field_value_id' => NULL,
                'value' => '{"az":"Id ab quod provident","en":"Quia nobis sed ut ut","ru":"Officia illum quis"}',
            ),
            249 => 
            array (
                'id' => 492,
                'field_id' => 46,
                'post_id' => 102,
                'field_value_id' => NULL,
                'value' => 'https://www.youtube.com/embed/8u-_64S7plI,https://www.youtube.com/embed/wIft-t-MQuE,https://www.youtube.com/embed/X46t8ZFqUB4',
            ),
            250 => 
            array (
                'id' => 493,
                'field_id' => 47,
                'post_id' => 102,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            251 => 
            array (
                'id' => 494,
                'field_id' => 48,
                'post_id' => 102,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            252 => 
            array (
                'id' => 495,
                'field_id' => 43,
                'post_id' => 103,
                'field_value_id' => NULL,
                'value' => '{"az":"Voluptatem proident","en":"Natus quia esse eu i","ru":"Aspernatur et quas n"}',
            ),
            253 => 
            array (
                'id' => 496,
                'field_id' => 44,
                'post_id' => 103,
                'field_value_id' => NULL,
                'value' => '1987-05-15 00:00:00',
            ),
            254 => 
            array (
                'id' => 497,
                'field_id' => 45,
                'post_id' => 103,
                'field_value_id' => NULL,
                'value' => '{"az":"Distinctio Quis ani","en":"Enim beatae cillum e","ru":"Aliquip nulla facili"}',
            ),
            255 => 
            array (
                'id' => 498,
                'field_id' => 46,
                'post_id' => 103,
                'field_value_id' => NULL,
                'value' => 'https://www.youtube.com/embed/Qc9c12q3mrc',
            ),
            256 => 
            array (
                'id' => 499,
                'field_id' => 47,
                'post_id' => 103,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            257 => 
            array (
                'id' => 500,
                'field_id' => 48,
                'post_id' => 103,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            258 => 
            array (
                'id' => 501,
                'field_id' => 43,
                'post_id' => 104,
                'field_value_id' => NULL,
                'value' => '{"az":"Consequatur sunt adi","en":"Et alias sunt occae","ru":"Laboris eaque et har"}',
            ),
            259 => 
            array (
                'id' => 502,
                'field_id' => 44,
                'post_id' => 104,
                'field_value_id' => NULL,
                'value' => '2009-03-24 00:00:00',
            ),
            260 => 
            array (
                'id' => 503,
                'field_id' => 45,
                'post_id' => 104,
                'field_value_id' => NULL,
                'value' => '{"az":"Soluta eos ut et cul","en":"Mollit quis lorem qu","ru":"Sunt et dolorum nesc"}',
            ),
            261 => 
            array (
                'id' => 504,
                'field_id' => 46,
                'post_id' => 104,
                'field_value_id' => NULL,
                'value' => 'https://www.youtube.com/embed/Qc9c12q3mrc',
            ),
            262 => 
            array (
                'id' => 505,
                'field_id' => 47,
                'post_id' => 104,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            263 => 
            array (
                'id' => 506,
                'field_id' => 48,
                'post_id' => 104,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            264 => 
            array (
                'id' => 507,
                'field_id' => 43,
                'post_id' => 105,
                'field_value_id' => NULL,
                'value' => '{"az":"Incididunt vel do qu","en":"Praesentium sequi do","ru":"Reiciendis laboriosa"}',
            ),
            265 => 
            array (
                'id' => 508,
                'field_id' => 44,
                'post_id' => 105,
                'field_value_id' => NULL,
                'value' => '2002-04-24 00:00:00',
            ),
            266 => 
            array (
                'id' => 509,
                'field_id' => 45,
                'post_id' => 105,
                'field_value_id' => NULL,
                'value' => '{"az":"Saepe et dolor culpa","en":"Ratione ducimus pra","ru":"Maxime deleniti pers"}',
            ),
            267 => 
            array (
                'id' => 510,
                'field_id' => 46,
                'post_id' => 105,
                'field_value_id' => NULL,
                'value' => 'https://www.youtube.com/embed/Qc9c12q3mrc',
            ),
            268 => 
            array (
                'id' => 511,
                'field_id' => 47,
                'post_id' => 105,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            269 => 
            array (
                'id' => 512,
                'field_id' => 48,
                'post_id' => 105,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            270 => 
            array (
                'id' => 513,
                'field_id' => 43,
                'post_id' => 106,
                'field_value_id' => NULL,
                'value' => '{"az":"Facilis in dolore as","en":"Nam qui in dolor eos","ru":"Eveniet doloremque"}',
            ),
            271 => 
            array (
                'id' => 514,
                'field_id' => 44,
                'post_id' => 106,
                'field_value_id' => NULL,
                'value' => '1999-02-12 00:00:00',
            ),
            272 => 
            array (
                'id' => 515,
                'field_id' => 45,
                'post_id' => 106,
                'field_value_id' => NULL,
                'value' => '{"az":"Officiis magnam sed","en":"Dolores quidem a ut","ru":"Est illum dicta aut"}',
            ),
            273 => 
            array (
                'id' => 516,
                'field_id' => 46,
                'post_id' => 106,
                'field_value_id' => NULL,
                'value' => 'Et quia ut veniam u',
            ),
            274 => 
            array (
                'id' => 517,
                'field_id' => 47,
                'post_id' => 106,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            275 => 
            array (
                'id' => 518,
                'field_id' => 48,
                'post_id' => 106,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            276 => 
            array (
                'id' => 519,
                'field_id' => 43,
                'post_id' => 107,
                'field_value_id' => NULL,
                'value' => '{"az":"Nemo voluptatum modi","en":"Ut numquam rerum eaq","ru":"Libero ex dolor nost"}',
            ),
            277 => 
            array (
                'id' => 520,
                'field_id' => 44,
                'post_id' => 107,
                'field_value_id' => NULL,
                'value' => '1998-06-22 00:00:00',
            ),
            278 => 
            array (
                'id' => 521,
                'field_id' => 45,
                'post_id' => 107,
                'field_value_id' => NULL,
                'value' => '{"az":"Omnis non qui fuga","en":"Perferendis eos mol","ru":"Quod eum qui reprehe"}',
            ),
            279 => 
            array (
                'id' => 522,
                'field_id' => 46,
                'post_id' => 107,
                'field_value_id' => NULL,
                'value' => 'https://www.youtube.com/embed/Qc9c12q3mrc',
            ),
            280 => 
            array (
                'id' => 523,
                'field_id' => 47,
                'post_id' => 107,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            281 => 
            array (
                'id' => 524,
                'field_id' => 48,
                'post_id' => 107,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            282 => 
            array (
                'id' => 525,
                'field_id' => 43,
                'post_id' => 108,
                'field_value_id' => NULL,
                'value' => '{"az":"Aut animi incidunt","en":"Ab nisi nulla conseq","ru":"Officia consequatur"}',
            ),
            283 => 
            array (
                'id' => 526,
                'field_id' => 44,
                'post_id' => 108,
                'field_value_id' => NULL,
                'value' => '2012-03-12 00:00:00',
            ),
            284 => 
            array (
                'id' => 527,
                'field_id' => 45,
                'post_id' => 108,
                'field_value_id' => NULL,
                'value' => '{"az":"Ut eaque quia optio","en":"In delectus deserun","ru":"Obcaecati magni labo"}',
            ),
            285 => 
            array (
                'id' => 528,
                'field_id' => 46,
                'post_id' => 108,
                'field_value_id' => NULL,
                'value' => 'https://www.youtube.com/embed/Qc9c12q3mrc',
            ),
            286 => 
            array (
                'id' => 529,
                'field_id' => 47,
                'post_id' => 108,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            287 => 
            array (
                'id' => 530,
                'field_id' => 48,
                'post_id' => 108,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            288 => 
            array (
                'id' => 531,
                'field_id' => 38,
                'post_id' => 109,
                'field_value_id' => NULL,
                'value' => '{"az":"Ratione quia ad cons","en":"Sed sint nesciunt n","ru":"Ipsum Nam cillum occ"}',
            ),
            289 => 
            array (
                'id' => 532,
                'field_id' => 39,
                'post_id' => 109,
                'field_value_id' => NULL,
                'value' => '{"az":"Ut dolorem voluptas","en":"Reprehenderit eum i","ru":"Sint quia consectet"}',
            ),
            290 => 
            array (
                'id' => 533,
                'field_id' => 40,
                'post_id' => 109,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            291 => 
            array (
                'id' => 534,
                'field_id' => 41,
                'post_id' => 109,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            292 => 
            array (
                'id' => 535,
                'field_id' => 42,
                'post_id' => 109,
                'field_value_id' => NULL,
                'value' => '2020-12-17 00:00:00',
            ),
            293 => 
            array (
                'id' => 536,
                'field_id' => 38,
                'post_id' => 110,
                'field_value_id' => NULL,
                'value' => '{"az":"Laborum Ut omnis im","en":"Dolore quo et vel id","ru":"Sit doloribus quibus"}',
            ),
            294 => 
            array (
                'id' => 537,
                'field_id' => 39,
                'post_id' => 110,
                'field_value_id' => NULL,
                'value' => '{"az":"Iure vel tempore fa","en":"Et perspiciatis qui","ru":"Aut odit assumenda c"}',
            ),
            295 => 
            array (
                'id' => 538,
                'field_id' => 40,
                'post_id' => 110,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            296 => 
            array (
                'id' => 539,
                'field_id' => 41,
                'post_id' => 110,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            297 => 
            array (
                'id' => 540,
                'field_id' => 42,
                'post_id' => 110,
                'field_value_id' => NULL,
                'value' => '1971-01-22 00:00:00',
            ),
            298 => 
            array (
                'id' => 541,
                'field_id' => 38,
                'post_id' => 111,
                'field_value_id' => NULL,
                'value' => '{"az":"Aspernatur aliquid v","en":"Id natus maiores ist","ru":"Soluta quia elit al"}',
            ),
            299 => 
            array (
                'id' => 542,
                'field_id' => 39,
                'post_id' => 111,
                'field_value_id' => NULL,
                'value' => '{"az":"Ipsam iusto totam fu","en":"Ullamco mollitia del","ru":"Voluptatibus ut vero"}',
            ),
            300 => 
            array (
                'id' => 543,
                'field_id' => 40,
                'post_id' => 111,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            301 => 
            array (
                'id' => 544,
                'field_id' => 41,
                'post_id' => 111,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            302 => 
            array (
                'id' => 545,
                'field_id' => 42,
                'post_id' => 111,
                'field_value_id' => NULL,
                'value' => '1983-12-22 00:00:00',
            ),
            303 => 
            array (
                'id' => 546,
                'field_id' => 36,
                'post_id' => 112,
                'field_value_id' => NULL,
                'value' => '{"az":"Voluptatibus proiden","en":"Quas odio voluptatib","ru":"Et eos et ut maxime"}',
            ),
            304 => 
            array (
                'id' => 547,
                'field_id' => 37,
                'post_id' => 112,
                'field_value_id' => NULL,
                'value' => '1991-12-15 00:00:00',
            ),
            305 => 
            array (
                'id' => 548,
                'field_id' => 49,
                'post_id' => 112,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            306 => 
            array (
                'id' => 549,
                'field_id' => 122,
                'post_id' => 112,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>s<\\/p>","en":"<p>s<\\/p>","ru":"<p>s<\\/p>"}',
            ),
            307 => 
            array (
                'id' => 550,
                'field_id' => 36,
                'post_id' => 113,
                'field_value_id' => NULL,
                'value' => '{"az":"Ea culpa ab aut qua","en":"Aspernatur veniam m","ru":"Non ullamco omnis se"}',
            ),
            308 => 
            array (
                'id' => 551,
                'field_id' => 37,
                'post_id' => 113,
                'field_value_id' => NULL,
                'value' => '2005-06-13 00:00:00',
            ),
            309 => 
            array (
                'id' => 552,
                'field_id' => 49,
                'post_id' => 113,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            310 => 
            array (
                'id' => 553,
                'field_id' => 122,
                'post_id' => 113,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>s<\\/p>","en":"<p>s<\\/p>","ru":"<p>s<\\/p>"}',
            ),
            311 => 
            array (
                'id' => 554,
                'field_id' => 36,
                'post_id' => 114,
                'field_value_id' => NULL,
                'value' => '{"az":"Ea qui Nam eos est","en":"Et aliqua Est cillu","ru":"Occaecat officia nos"}',
            ),
            312 => 
            array (
                'id' => 555,
                'field_id' => 37,
                'post_id' => 114,
                'field_value_id' => NULL,
                'value' => '1991-01-19 00:00:00',
            ),
            313 => 
            array (
                'id' => 556,
                'field_id' => 49,
                'post_id' => 114,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            314 => 
            array (
                'id' => 557,
                'field_id' => 122,
                'post_id' => 114,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>s<\\/p>","en":"<p>s<\\/p>","ru":"<p>s<\\/p>"}',
            ),
            315 => 
            array (
                'id' => 558,
                'field_id' => 36,
                'post_id' => 115,
                'field_value_id' => NULL,
                'value' => '{"az":"Officia exercitation","en":"Nemo laborum laborio","ru":"Exercitationem volup"}',
            ),
            316 => 
            array (
                'id' => 559,
                'field_id' => 37,
                'post_id' => 115,
                'field_value_id' => NULL,
                'value' => '2022-04-30 00:00:00',
            ),
            317 => 
            array (
                'id' => 560,
                'field_id' => 49,
                'post_id' => 115,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            318 => 
            array (
                'id' => 561,
                'field_id' => 122,
                'post_id' => 115,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>s<\\/p>","en":"<p>s<\\/p>","ru":"<p>s<\\/p>"}',
            ),
            319 => 
            array (
                'id' => 562,
                'field_id' => 36,
                'post_id' => 116,
                'field_value_id' => NULL,
                'value' => '{"az":"Non consequatur itaq","en":"Voluptatem iure in","ru":"Dolore quod quaerat"}',
            ),
            320 => 
            array (
                'id' => 563,
                'field_id' => 37,
                'post_id' => 116,
                'field_value_id' => NULL,
                'value' => '2021-06-11 00:00:00',
            ),
            321 => 
            array (
                'id' => 564,
                'field_id' => 49,
                'post_id' => 116,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            322 => 
            array (
                'id' => 565,
                'field_id' => 122,
                'post_id' => 116,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>s<\\/p>","en":"<p>s<\\/p>","ru":"<p>s<\\/p>"}',
            ),
            323 => 
            array (
                'id' => 566,
                'field_id' => 123,
                'post_id' => 117,
                'field_value_id' => NULL,
                'value' => '{"az":"D\\u0130REKTOR","en":"D\\u0130REKTOR","ru":"D\\u0130REKTOR"}',
            ),
            324 => 
            array (
                'id' => 567,
                'field_id' => 124,
                'post_id' => 117,
                'field_value_id' => NULL,
                'value' => '{"az":"El\\u015fad Nuru o\\u011flu Nuriyev","en":"El\\u015fad Nuru o\\u011flu Nuriyev","ru":"El\\u015fad Nuru o\\u011flu Nuriyev"}',
            ),
            325 => 
            array (
                'id' => 568,
                'field_id' => 125,
                'post_id' => 117,
                'field_value_id' => NULL,
                'value' => '{"az":"Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 21 aprel 2018-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0259m\\u0259k v\\u0259 \\u0259halinin sosial m\\u00fcdafi\\u0259si naziri v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilib.","en":"Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 21 aprel 2018-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0259m\\u0259k v\\u0259 \\u0259halinin sosial m\\u00fcdafi\\u0259si naziri v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilib.","ru":"Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 21 aprel 2018-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0259m\\u0259k v\\u0259 \\u0259halinin sosial m\\u00fcdafi\\u0259si naziri v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilib."}',
            ),
            326 => 
            array (
                'id' => 569,
                'field_id' => 126,
                'post_id' => 117,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            327 => 
            array (
                'id' => 570,
                'field_id' => 127,
                'post_id' => 117,
                'field_value_id' => NULL,
            'value' => '{"az":"<p>1978-ci ild\\u0259 anadan olub.<\\/p><p>2000-ci ild\\u0259 Kiyev D\\u00f6vl\\u0259t Universitetinin \\"Beyn\\u0259lxalq h\\u00fcquq\\" fak\\u00fclt\\u0259sini bitir\\u0259r\\u0259k bakalavr,2001-ci ild\\u0259 is\\u0259 magistr d\\u0259r\\u0259c\\u0259si al\\u0131b<\\/p><p>2008-ci ild\\u0259 Az\\u0259rbaycan D\\u00f6vl\\u0259t \\u0130qtisad Universitetini Maliyy\\u0259 v\\u0259 kredit ixtisas\\u0131 \\u00fczr\\u0259 bitirib.<\\/p><p>BMT-nin Proqramlar\\u0131n v\\u0259 layih\\u0259l\\u0259rin idar\\u0259olunmas\\u0131n\\u0131n \\u0259saslar\\u0131 (Az\\u0259rbaycan), Asiya \\u0130nki\\u015faf Bank\\u0131n\\u0131n \\u0130nvestisiyalar (Laos), UN\\u0130DO-nun \\u201cQida m\\u0259hsullar\\u0131n\\u0131n qabla\\u015fd\\u0131r\\u0131lmas\\u0131 v\\u0259 onun davaml\\u0131l\\u0131\\u011f\\u0131n\\u0131n izl\\u0259nm\\u0259si\\u201d (T\\u00fcrkiy\\u0259), Avropa \\u0130ttifaq\\u0131 Tasis layih\\u0259si \\u00e7\\u0259r\\u00e7iv\\u0259sind\\u0259 \\u201cRegional iqtisadi inki\\u015faf\\u0131n d\\u0259st\\u0259kl\\u0259nm\\u0259si\\u201d \\u00fczr\\u0259 kurslar\\u0131 (\\u0130rlandiya) bitirib.<\\/p><p>\\u018fm\\u0259k f\\u0259aliyy\\u0259tin\\u0259 2001-ci ild\\u0259 Bel\\u00e7ika Krall\\u0131\\u011f\\u0131nda Avropa M\\u0259sl\\u0259h\\u0259t\\u00e7il\\u0259r T\\u0259\\u015fkilat\\u0131nda (ECO) Avropa \\u0130ttifaq\\u0131 TACIS layih\\u0259si \\u00fczr\\u0259 ekspert k\\u00f6m\\u0259k\\u00e7isi kimi ba\\u015flay\\u0131b.<\\/p><p>2002-ci ild\\u0259 BMT-nin Beyn\\u0259lxalq Miqrasiya T\\u0259\\u015fkilat\\u0131n\\u0131n (\\u0130OM) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 miqrasiya m\\u0259s\\u0259l\\u0259l\\u0259ri \\u00fczr\\u0259 ekspert, Avropa \\u0130ttifaq\\u0131 v\\u0259 Az\\u0259rbaycan aras\\u0131nda t\\u0259r\\u0259fda\\u015fl\\u0131q v\\u0259 \\u0259m\\u0259kda\\u015fl\\u0131q sazi\\u015finin icras\\u0131 \\u00fczr\\u0259 Az\\u0259rbaycanda Avropa \\u0130ttifaq\\u0131 TAS\\u0130S layih\\u0259sind\\u0259 ekspert i\\u015fl\\u0259yib.<\\/p><p>2003-2004-c\\u00fc ill\\u0259rd\\u0259 Avropa Komissiyas\\u0131n\\u0131n Az\\u0259rbaycandak\\u0131 \\u0130nformasiya v\\u0259 texniki d\\u0259st\\u0259k Ofisind\\u0259 \\u201cEuropa House\\u201d informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs, BMT-nin Qa\\u00e7q\\u0131nlar \\u00fczr\\u0259 Ali Komissarl\\u0131\\u011f\\u0131n\\u0131n (UNHCR) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2004-2007-ci ill\\u0259rd\\u0259 \\u0130qtisadi \\u0130nki\\u015faf Nazirliyind\\u0259 ba\\u015f m\\u0259sl\\u0259h\\u0259t\\u00e7i, sektor m\\u00fcdiri, \\u015f\\u00f6b\\u0259 m\\u00fcdirinin m\\u00fcavini v\\u0259 Davaml\\u0131 inki\\u015faf v\\u0259 regional siyas\\u0259t \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2009-cu ild\\u0259n \\u0130qtisadi \\u0130nki\\u015faf Nazirliyinin Regionlar\\u0131n inki\\u015faf\\u0131 v\\u0259 d\\u00f6vl\\u0259t proqramlar\\u0131 \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 mart 2014-c\\u00fc il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131 iqtisadiyyat v\\u0259 s\\u0259naye nazirinin m\\u00fcavini, 30 yanvar 2016-c\\u0131 il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n iqtisadiyyat nazirinin m\\u00fcavini v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 may 2020-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0130qtisadiyyat Nazirliyi yan\\u0131nda Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isinin m\\u00fcavini v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilmi\\u015f v\\u0259 Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isi t\\u0259yin olunana q\\u0259d\\u0259r h\\u0259min v\\u0259zif\\u0259nin icras\\u0131 ona h\\u0259val\\u0259 edilmi\\u015fdir.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin s\\u0259r\\u0259ncamlar\\u0131 il\\u0259 2012-ci ild\\u0259 \\"D\\u00f6vl\\u0259t qullu\\u011funda f\\u0259rql\\u0259nm\\u0259y\\u0259 g\\u00f6r\\u0259\\", 2018-ci ild\\u0259 \\u201cT\\u0259r\\u0259qqi\\u201d medallar\\u0131 il\\u0259 t\\u0259ltif olunmu\\u015fdur.<\\/p><p>Az\\u0259rbaycan, \\u0130ngilis, Rus, Ukrayna dill\\u0259rini bilir.<\\/p><p>Ail\\u0259lidir, 2 \\u00f6vlad\\u0131 var.<\\/p>","en":"<p>1978-ci ild\\u0259 anadan olub.<\\/p><p>2000-ci ild\\u0259 Kiyev D\\u00f6vl\\u0259t Universitetinin \\"Beyn\\u0259lxalq h\\u00fcquq\\" fak\\u00fclt\\u0259sini bitir\\u0259r\\u0259k bakalavr,2001-ci ild\\u0259 is\\u0259 magistr d\\u0259r\\u0259c\\u0259si al\\u0131b<\\/p><p>2008-ci ild\\u0259 Az\\u0259rbaycan D\\u00f6vl\\u0259t \\u0130qtisad Universitetini Maliyy\\u0259 v\\u0259 kredit ixtisas\\u0131 \\u00fczr\\u0259 bitirib.<\\/p><p>BMT-nin Proqramlar\\u0131n v\\u0259 layih\\u0259l\\u0259rin idar\\u0259olunmas\\u0131n\\u0131n \\u0259saslar\\u0131 (Az\\u0259rbaycan), Asiya \\u0130nki\\u015faf Bank\\u0131n\\u0131n \\u0130nvestisiyalar (Laos), UN\\u0130DO-nun \\u201cQida m\\u0259hsullar\\u0131n\\u0131n qabla\\u015fd\\u0131r\\u0131lmas\\u0131 v\\u0259 onun davaml\\u0131l\\u0131\\u011f\\u0131n\\u0131n izl\\u0259nm\\u0259si\\u201d (T\\u00fcrkiy\\u0259), Avropa \\u0130ttifaq\\u0131 Tasis layih\\u0259si \\u00e7\\u0259r\\u00e7iv\\u0259sind\\u0259 \\u201cRegional iqtisadi inki\\u015faf\\u0131n d\\u0259st\\u0259kl\\u0259nm\\u0259si\\u201d \\u00fczr\\u0259 kurslar\\u0131 (\\u0130rlandiya) bitirib.<\\/p><p>\\u018fm\\u0259k f\\u0259aliyy\\u0259tin\\u0259 2001-ci ild\\u0259 Bel\\u00e7ika Krall\\u0131\\u011f\\u0131nda Avropa M\\u0259sl\\u0259h\\u0259t\\u00e7il\\u0259r T\\u0259\\u015fkilat\\u0131nda (ECO) Avropa \\u0130ttifaq\\u0131 TACIS layih\\u0259si \\u00fczr\\u0259 ekspert k\\u00f6m\\u0259k\\u00e7isi kimi ba\\u015flay\\u0131b.<\\/p><p>2002-ci ild\\u0259 BMT-nin Beyn\\u0259lxalq Miqrasiya T\\u0259\\u015fkilat\\u0131n\\u0131n (\\u0130OM) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 miqrasiya m\\u0259s\\u0259l\\u0259l\\u0259ri \\u00fczr\\u0259 ekspert, Avropa \\u0130ttifaq\\u0131 v\\u0259 Az\\u0259rbaycan aras\\u0131nda t\\u0259r\\u0259fda\\u015fl\\u0131q v\\u0259 \\u0259m\\u0259kda\\u015fl\\u0131q sazi\\u015finin icras\\u0131 \\u00fczr\\u0259 Az\\u0259rbaycanda Avropa \\u0130ttifaq\\u0131 TAS\\u0130S layih\\u0259sind\\u0259 ekspert i\\u015fl\\u0259yib.<\\/p><p>2003-2004-c\\u00fc ill\\u0259rd\\u0259 Avropa Komissiyas\\u0131n\\u0131n Az\\u0259rbaycandak\\u0131 \\u0130nformasiya v\\u0259 texniki d\\u0259st\\u0259k Ofisind\\u0259 \\u201cEuropa House\\u201d informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs, BMT-nin Qa\\u00e7q\\u0131nlar \\u00fczr\\u0259 Ali Komissarl\\u0131\\u011f\\u0131n\\u0131n (UNHCR) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2004-2007-ci ill\\u0259rd\\u0259 \\u0130qtisadi \\u0130nki\\u015faf Nazirliyind\\u0259 ba\\u015f m\\u0259sl\\u0259h\\u0259t\\u00e7i, sektor m\\u00fcdiri, \\u015f\\u00f6b\\u0259 m\\u00fcdirinin m\\u00fcavini v\\u0259 Davaml\\u0131 inki\\u015faf v\\u0259 regional siyas\\u0259t \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2009-cu ild\\u0259n \\u0130qtisadi \\u0130nki\\u015faf Nazirliyinin Regionlar\\u0131n inki\\u015faf\\u0131 v\\u0259 d\\u00f6vl\\u0259t proqramlar\\u0131 \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 mart 2014-c\\u00fc il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131 iqtisadiyyat v\\u0259 s\\u0259naye nazirinin m\\u00fcavini, 30 yanvar 2016-c\\u0131 il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n iqtisadiyyat nazirinin m\\u00fcavini v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 may 2020-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0130qtisadiyyat Nazirliyi yan\\u0131nda Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isinin m\\u00fcavini v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilmi\\u015f v\\u0259 Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isi t\\u0259yin olunana q\\u0259d\\u0259r h\\u0259min v\\u0259zif\\u0259nin icras\\u0131 ona h\\u0259val\\u0259 edilmi\\u015fdir.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin s\\u0259r\\u0259ncamlar\\u0131 il\\u0259 2012-ci ild\\u0259 \\"D\\u00f6vl\\u0259t qullu\\u011funda f\\u0259rql\\u0259nm\\u0259y\\u0259 g\\u00f6r\\u0259\\", 2018-ci ild\\u0259 \\u201cT\\u0259r\\u0259qqi\\u201d medallar\\u0131 il\\u0259 t\\u0259ltif olunmu\\u015fdur.<\\/p><p>Az\\u0259rbaycan, \\u0130ngilis, Rus, Ukrayna dill\\u0259rini bilir.<\\/p><p>Ail\\u0259lidir, 2 \\u00f6vlad\\u0131 var.<\\/p>","ru":"<p>1978-ci ild\\u0259 anadan olub.<\\/p><p>2000-ci ild\\u0259 Kiyev D\\u00f6vl\\u0259t Universitetinin \\"Beyn\\u0259lxalq h\\u00fcquq\\" fak\\u00fclt\\u0259sini bitir\\u0259r\\u0259k bakalavr,2001-ci ild\\u0259 is\\u0259 magistr d\\u0259r\\u0259c\\u0259si al\\u0131b<\\/p><p>2008-ci ild\\u0259 Az\\u0259rbaycan D\\u00f6vl\\u0259t \\u0130qtisad Universitetini Maliyy\\u0259 v\\u0259 kredit ixtisas\\u0131 \\u00fczr\\u0259 bitirib.<\\/p><p>BMT-nin Proqramlar\\u0131n v\\u0259 layih\\u0259l\\u0259rin idar\\u0259olunmas\\u0131n\\u0131n \\u0259saslar\\u0131 (Az\\u0259rbaycan), Asiya \\u0130nki\\u015faf Bank\\u0131n\\u0131n \\u0130nvestisiyalar (Laos), UN\\u0130DO-nun \\u201cQida m\\u0259hsullar\\u0131n\\u0131n qabla\\u015fd\\u0131r\\u0131lmas\\u0131 v\\u0259 onun davaml\\u0131l\\u0131\\u011f\\u0131n\\u0131n izl\\u0259nm\\u0259si\\u201d (T\\u00fcrkiy\\u0259), Avropa \\u0130ttifaq\\u0131 Tasis layih\\u0259si \\u00e7\\u0259r\\u00e7iv\\u0259sind\\u0259 \\u201cRegional iqtisadi inki\\u015faf\\u0131n d\\u0259st\\u0259kl\\u0259nm\\u0259si\\u201d \\u00fczr\\u0259 kurslar\\u0131 (\\u0130rlandiya) bitirib.<\\/p><p>\\u018fm\\u0259k f\\u0259aliyy\\u0259tin\\u0259 2001-ci ild\\u0259 Bel\\u00e7ika Krall\\u0131\\u011f\\u0131nda Avropa M\\u0259sl\\u0259h\\u0259t\\u00e7il\\u0259r T\\u0259\\u015fkilat\\u0131nda (ECO) Avropa \\u0130ttifaq\\u0131 TACIS layih\\u0259si \\u00fczr\\u0259 ekspert k\\u00f6m\\u0259k\\u00e7isi kimi ba\\u015flay\\u0131b.<\\/p><p>2002-ci ild\\u0259 BMT-nin Beyn\\u0259lxalq Miqrasiya T\\u0259\\u015fkilat\\u0131n\\u0131n (\\u0130OM) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 miqrasiya m\\u0259s\\u0259l\\u0259l\\u0259ri \\u00fczr\\u0259 ekspert, Avropa \\u0130ttifaq\\u0131 v\\u0259 Az\\u0259rbaycan aras\\u0131nda t\\u0259r\\u0259fda\\u015fl\\u0131q v\\u0259 \\u0259m\\u0259kda\\u015fl\\u0131q sazi\\u015finin icras\\u0131 \\u00fczr\\u0259 Az\\u0259rbaycanda Avropa \\u0130ttifaq\\u0131 TAS\\u0130S layih\\u0259sind\\u0259 ekspert i\\u015fl\\u0259yib.<\\/p><p>2003-2004-c\\u00fc ill\\u0259rd\\u0259 Avropa Komissiyas\\u0131n\\u0131n Az\\u0259rbaycandak\\u0131 \\u0130nformasiya v\\u0259 texniki d\\u0259st\\u0259k Ofisind\\u0259 \\u201cEuropa House\\u201d informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs, BMT-nin Qa\\u00e7q\\u0131nlar \\u00fczr\\u0259 Ali Komissarl\\u0131\\u011f\\u0131n\\u0131n (UNHCR) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2004-2007-ci ill\\u0259rd\\u0259 \\u0130qtisadi \\u0130nki\\u015faf Nazirliyind\\u0259 ba\\u015f m\\u0259sl\\u0259h\\u0259t\\u00e7i, sektor m\\u00fcdiri, \\u015f\\u00f6b\\u0259 m\\u00fcdirinin m\\u00fcavini v\\u0259 Davaml\\u0131 inki\\u015faf v\\u0259 regional siyas\\u0259t \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2009-cu ild\\u0259n \\u0130qtisadi \\u0130nki\\u015faf Nazirliyinin Regionlar\\u0131n inki\\u015faf\\u0131 v\\u0259 d\\u00f6vl\\u0259t proqramlar\\u0131 \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 mart 2014-c\\u00fc il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131 iqtisadiyyat v\\u0259 s\\u0259naye nazirinin m\\u00fcavini, 30 yanvar 2016-c\\u0131 il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n iqtisadiyyat nazirinin m\\u00fcavini v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 may 2020-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0130qtisadiyyat Nazirliyi yan\\u0131nda Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isinin m\\u00fcavini v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilmi\\u015f v\\u0259 Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isi t\\u0259yin olunana q\\u0259d\\u0259r h\\u0259min v\\u0259zif\\u0259nin icras\\u0131 ona h\\u0259val\\u0259 edilmi\\u015fdir.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin s\\u0259r\\u0259ncamlar\\u0131 il\\u0259 2012-ci ild\\u0259 \\"D\\u00f6vl\\u0259t qullu\\u011funda f\\u0259rql\\u0259nm\\u0259y\\u0259 g\\u00f6r\\u0259\\", 2018-ci ild\\u0259 \\u201cT\\u0259r\\u0259qqi\\u201d medallar\\u0131 il\\u0259 t\\u0259ltif olunmu\\u015fdur.<\\/p><p>Az\\u0259rbaycan, \\u0130ngilis, Rus, Ukrayna dill\\u0259rini bilir.<\\/p><p>Ail\\u0259lidir, 2 \\u00f6vlad\\u0131 var.<\\/p>"}',
            ),
            328 => 
            array (
                'id' => 571,
                'field_id' => 123,
                'post_id' => 118,
                'field_value_id' => NULL,
                'value' => '{"az":"D\\u0130REKTORUN B\\u0130R\\u0130NC\\u0130 M\\u00dcAV\\u0130N\\u0130","en":"D\\u0130REKTORUN B\\u0130R\\u0130NC\\u0130 M\\u00dcAV\\u0130N\\u0130","ru":"D\\u0130REKTORUN B\\u0130R\\u0130NC\\u0130 M\\u00dcAV\\u0130N\\u0130"}',
            ),
            329 => 
            array (
                'id' => 572,
                'field_id' => 124,
                'post_id' => 118,
                'field_value_id' => NULL,
                'value' => '{"az":"Nazim Natiq o\\u011flu Tal\\u0131bov","en":"Nazim Natiq o\\u011flu Tal\\u0131bov","ru":"Nazim Natiq o\\u011flu Tal\\u0131bov"}',
            ),
            330 => 
            array (
                'id' => 573,
                'field_id' => 125,
                'post_id' => 118,
                'field_value_id' => NULL,
                'value' => '{"az":"Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 21 aprel 2018-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0259m\\u0259k v\\u0259 \\u0259halinin sosial m\\u00fcdafi\\u0259si naziri v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilib.","en":"Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 21 aprel 2018-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0259m\\u0259k v\\u0259 \\u0259halinin sosial m\\u00fcdafi\\u0259si naziri v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilib.","ru":"Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 21 aprel 2018-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0259m\\u0259k v\\u0259 \\u0259halinin sosial m\\u00fcdafi\\u0259si naziri v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilib."}',
            ),
            331 => 
            array (
                'id' => 574,
                'field_id' => 126,
                'post_id' => 118,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            332 => 
            array (
                'id' => 575,
                'field_id' => 127,
                'post_id' => 118,
                'field_value_id' => NULL,
            'value' => '{"az":"<p>1978-ci ild\\u0259 anadan olub.<\\/p><p>2000-ci ild\\u0259 Kiyev D\\u00f6vl\\u0259t Universitetinin \\"Beyn\\u0259lxalq h\\u00fcquq\\" fak\\u00fclt\\u0259sini bitir\\u0259r\\u0259k bakalavr,2001-ci ild\\u0259 is\\u0259 magistr d\\u0259r\\u0259c\\u0259si al\\u0131b<\\/p><p>2008-ci ild\\u0259 Az\\u0259rbaycan D\\u00f6vl\\u0259t \\u0130qtisad Universitetini Maliyy\\u0259 v\\u0259 kredit ixtisas\\u0131 \\u00fczr\\u0259 bitirib.<\\/p><p>BMT-nin Proqramlar\\u0131n v\\u0259 layih\\u0259l\\u0259rin idar\\u0259olunmas\\u0131n\\u0131n \\u0259saslar\\u0131 (Az\\u0259rbaycan), Asiya \\u0130nki\\u015faf Bank\\u0131n\\u0131n \\u0130nvestisiyalar (Laos), UN\\u0130DO-nun \\u201cQida m\\u0259hsullar\\u0131n\\u0131n qabla\\u015fd\\u0131r\\u0131lmas\\u0131 v\\u0259 onun davaml\\u0131l\\u0131\\u011f\\u0131n\\u0131n izl\\u0259nm\\u0259si\\u201d (T\\u00fcrkiy\\u0259), Avropa \\u0130ttifaq\\u0131 Tasis layih\\u0259si \\u00e7\\u0259r\\u00e7iv\\u0259sind\\u0259 \\u201cRegional iqtisadi inki\\u015faf\\u0131n d\\u0259st\\u0259kl\\u0259nm\\u0259si\\u201d \\u00fczr\\u0259 kurslar\\u0131 (\\u0130rlandiya) bitirib.<\\/p><p>\\u018fm\\u0259k f\\u0259aliyy\\u0259tin\\u0259 2001-ci ild\\u0259 Bel\\u00e7ika Krall\\u0131\\u011f\\u0131nda Avropa M\\u0259sl\\u0259h\\u0259t\\u00e7il\\u0259r T\\u0259\\u015fkilat\\u0131nda (ECO) Avropa \\u0130ttifaq\\u0131 TACIS layih\\u0259si \\u00fczr\\u0259 ekspert k\\u00f6m\\u0259k\\u00e7isi kimi ba\\u015flay\\u0131b.<\\/p><p>2002-ci ild\\u0259 BMT-nin Beyn\\u0259lxalq Miqrasiya T\\u0259\\u015fkilat\\u0131n\\u0131n (\\u0130OM) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 miqrasiya m\\u0259s\\u0259l\\u0259l\\u0259ri \\u00fczr\\u0259 ekspert, Avropa \\u0130ttifaq\\u0131 v\\u0259 Az\\u0259rbaycan aras\\u0131nda t\\u0259r\\u0259fda\\u015fl\\u0131q v\\u0259 \\u0259m\\u0259kda\\u015fl\\u0131q sazi\\u015finin icras\\u0131 \\u00fczr\\u0259 Az\\u0259rbaycanda Avropa \\u0130ttifaq\\u0131 TAS\\u0130S layih\\u0259sind\\u0259 ekspert i\\u015fl\\u0259yib.<\\/p><p>2003-2004-c\\u00fc ill\\u0259rd\\u0259 Avropa Komissiyas\\u0131n\\u0131n Az\\u0259rbaycandak\\u0131 \\u0130nformasiya v\\u0259 texniki d\\u0259st\\u0259k Ofisind\\u0259 \\u201cEuropa House\\u201d informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs, BMT-nin Qa\\u00e7q\\u0131nlar \\u00fczr\\u0259 Ali Komissarl\\u0131\\u011f\\u0131n\\u0131n (UNHCR) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2004-2007-ci ill\\u0259rd\\u0259 \\u0130qtisadi \\u0130nki\\u015faf Nazirliyind\\u0259 ba\\u015f m\\u0259sl\\u0259h\\u0259t\\u00e7i, sektor m\\u00fcdiri, \\u015f\\u00f6b\\u0259 m\\u00fcdirinin m\\u00fcavini v\\u0259 Davaml\\u0131 inki\\u015faf v\\u0259 regional siyas\\u0259t \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2009-cu ild\\u0259n \\u0130qtisadi \\u0130nki\\u015faf Nazirliyinin Regionlar\\u0131n inki\\u015faf\\u0131 v\\u0259 d\\u00f6vl\\u0259t proqramlar\\u0131 \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 mart 2014-c\\u00fc il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131 iqtisadiyyat v\\u0259 s\\u0259naye nazirinin m\\u00fcavini, 30 yanvar 2016-c\\u0131 il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n iqtisadiyyat nazirinin m\\u00fcavini v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 may 2020-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0130qtisadiyyat Nazirliyi yan\\u0131nda Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isinin m\\u00fcavini v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilmi\\u015f v\\u0259 Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isi t\\u0259yin olunana q\\u0259d\\u0259r h\\u0259min v\\u0259zif\\u0259nin icras\\u0131 ona h\\u0259val\\u0259 edilmi\\u015fdir.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin s\\u0259r\\u0259ncamlar\\u0131 il\\u0259 2012-ci ild\\u0259 \\"D\\u00f6vl\\u0259t qullu\\u011funda f\\u0259rql\\u0259nm\\u0259y\\u0259 g\\u00f6r\\u0259\\", 2018-ci ild\\u0259 \\u201cT\\u0259r\\u0259qqi\\u201d medallar\\u0131 il\\u0259 t\\u0259ltif olunmu\\u015fdur.<\\/p><p>Az\\u0259rbaycan, \\u0130ngilis, Rus, Ukrayna dill\\u0259rini bilir.<\\/p><p>Ail\\u0259lidir, 2 \\u00f6vlad\\u0131 var.<\\/p>","en":"<p>1978-ci ild\\u0259 anadan olub.<\\/p><p>2000-ci ild\\u0259 Kiyev D\\u00f6vl\\u0259t Universitetinin \\"Beyn\\u0259lxalq h\\u00fcquq\\" fak\\u00fclt\\u0259sini bitir\\u0259r\\u0259k bakalavr,2001-ci ild\\u0259 is\\u0259 magistr d\\u0259r\\u0259c\\u0259si al\\u0131b<\\/p><p>2008-ci ild\\u0259 Az\\u0259rbaycan D\\u00f6vl\\u0259t \\u0130qtisad Universitetini Maliyy\\u0259 v\\u0259 kredit ixtisas\\u0131 \\u00fczr\\u0259 bitirib.<\\/p><p>BMT-nin Proqramlar\\u0131n v\\u0259 layih\\u0259l\\u0259rin idar\\u0259olunmas\\u0131n\\u0131n \\u0259saslar\\u0131 (Az\\u0259rbaycan), Asiya \\u0130nki\\u015faf Bank\\u0131n\\u0131n \\u0130nvestisiyalar (Laos), UN\\u0130DO-nun \\u201cQida m\\u0259hsullar\\u0131n\\u0131n qabla\\u015fd\\u0131r\\u0131lmas\\u0131 v\\u0259 onun davaml\\u0131l\\u0131\\u011f\\u0131n\\u0131n izl\\u0259nm\\u0259si\\u201d (T\\u00fcrkiy\\u0259), Avropa \\u0130ttifaq\\u0131 Tasis layih\\u0259si \\u00e7\\u0259r\\u00e7iv\\u0259sind\\u0259 \\u201cRegional iqtisadi inki\\u015faf\\u0131n d\\u0259st\\u0259kl\\u0259nm\\u0259si\\u201d \\u00fczr\\u0259 kurslar\\u0131 (\\u0130rlandiya) bitirib.<\\/p><p>\\u018fm\\u0259k f\\u0259aliyy\\u0259tin\\u0259 2001-ci ild\\u0259 Bel\\u00e7ika Krall\\u0131\\u011f\\u0131nda Avropa M\\u0259sl\\u0259h\\u0259t\\u00e7il\\u0259r T\\u0259\\u015fkilat\\u0131nda (ECO) Avropa \\u0130ttifaq\\u0131 TACIS layih\\u0259si \\u00fczr\\u0259 ekspert k\\u00f6m\\u0259k\\u00e7isi kimi ba\\u015flay\\u0131b.<\\/p><p>2002-ci ild\\u0259 BMT-nin Beyn\\u0259lxalq Miqrasiya T\\u0259\\u015fkilat\\u0131n\\u0131n (\\u0130OM) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 miqrasiya m\\u0259s\\u0259l\\u0259l\\u0259ri \\u00fczr\\u0259 ekspert, Avropa \\u0130ttifaq\\u0131 v\\u0259 Az\\u0259rbaycan aras\\u0131nda t\\u0259r\\u0259fda\\u015fl\\u0131q v\\u0259 \\u0259m\\u0259kda\\u015fl\\u0131q sazi\\u015finin icras\\u0131 \\u00fczr\\u0259 Az\\u0259rbaycanda Avropa \\u0130ttifaq\\u0131 TAS\\u0130S layih\\u0259sind\\u0259 ekspert i\\u015fl\\u0259yib.<\\/p><p>2003-2004-c\\u00fc ill\\u0259rd\\u0259 Avropa Komissiyas\\u0131n\\u0131n Az\\u0259rbaycandak\\u0131 \\u0130nformasiya v\\u0259 texniki d\\u0259st\\u0259k Ofisind\\u0259 \\u201cEuropa House\\u201d informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs, BMT-nin Qa\\u00e7q\\u0131nlar \\u00fczr\\u0259 Ali Komissarl\\u0131\\u011f\\u0131n\\u0131n (UNHCR) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2004-2007-ci ill\\u0259rd\\u0259 \\u0130qtisadi \\u0130nki\\u015faf Nazirliyind\\u0259 ba\\u015f m\\u0259sl\\u0259h\\u0259t\\u00e7i, sektor m\\u00fcdiri, \\u015f\\u00f6b\\u0259 m\\u00fcdirinin m\\u00fcavini v\\u0259 Davaml\\u0131 inki\\u015faf v\\u0259 regional siyas\\u0259t \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2009-cu ild\\u0259n \\u0130qtisadi \\u0130nki\\u015faf Nazirliyinin Regionlar\\u0131n inki\\u015faf\\u0131 v\\u0259 d\\u00f6vl\\u0259t proqramlar\\u0131 \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 mart 2014-c\\u00fc il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131 iqtisadiyyat v\\u0259 s\\u0259naye nazirinin m\\u00fcavini, 30 yanvar 2016-c\\u0131 il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n iqtisadiyyat nazirinin m\\u00fcavini v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 may 2020-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0130qtisadiyyat Nazirliyi yan\\u0131nda Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isinin m\\u00fcavini v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilmi\\u015f v\\u0259 Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isi t\\u0259yin olunana q\\u0259d\\u0259r h\\u0259min v\\u0259zif\\u0259nin icras\\u0131 ona h\\u0259val\\u0259 edilmi\\u015fdir.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin s\\u0259r\\u0259ncamlar\\u0131 il\\u0259 2012-ci ild\\u0259 \\"D\\u00f6vl\\u0259t qullu\\u011funda f\\u0259rql\\u0259nm\\u0259y\\u0259 g\\u00f6r\\u0259\\", 2018-ci ild\\u0259 \\u201cT\\u0259r\\u0259qqi\\u201d medallar\\u0131 il\\u0259 t\\u0259ltif olunmu\\u015fdur.<\\/p><p>Az\\u0259rbaycan, \\u0130ngilis, Rus, Ukrayna dill\\u0259rini bilir.<\\/p><p>Ail\\u0259lidir, 2 \\u00f6vlad\\u0131 var.<\\/p>","ru":"<p>1978-ci ild\\u0259 anadan olub.<\\/p><p>2000-ci ild\\u0259 Kiyev D\\u00f6vl\\u0259t Universitetinin \\"Beyn\\u0259lxalq h\\u00fcquq\\" fak\\u00fclt\\u0259sini bitir\\u0259r\\u0259k bakalavr,2001-ci ild\\u0259 is\\u0259 magistr d\\u0259r\\u0259c\\u0259si al\\u0131b<\\/p><p>2008-ci ild\\u0259 Az\\u0259rbaycan D\\u00f6vl\\u0259t \\u0130qtisad Universitetini Maliyy\\u0259 v\\u0259 kredit ixtisas\\u0131 \\u00fczr\\u0259 bitirib.<\\/p><p>BMT-nin Proqramlar\\u0131n v\\u0259 layih\\u0259l\\u0259rin idar\\u0259olunmas\\u0131n\\u0131n \\u0259saslar\\u0131 (Az\\u0259rbaycan), Asiya \\u0130nki\\u015faf Bank\\u0131n\\u0131n \\u0130nvestisiyalar (Laos), UN\\u0130DO-nun \\u201cQida m\\u0259hsullar\\u0131n\\u0131n qabla\\u015fd\\u0131r\\u0131lmas\\u0131 v\\u0259 onun davaml\\u0131l\\u0131\\u011f\\u0131n\\u0131n izl\\u0259nm\\u0259si\\u201d (T\\u00fcrkiy\\u0259), Avropa \\u0130ttifaq\\u0131 Tasis layih\\u0259si \\u00e7\\u0259r\\u00e7iv\\u0259sind\\u0259 \\u201cRegional iqtisadi inki\\u015faf\\u0131n d\\u0259st\\u0259kl\\u0259nm\\u0259si\\u201d \\u00fczr\\u0259 kurslar\\u0131 (\\u0130rlandiya) bitirib.<\\/p><p>\\u018fm\\u0259k f\\u0259aliyy\\u0259tin\\u0259 2001-ci ild\\u0259 Bel\\u00e7ika Krall\\u0131\\u011f\\u0131nda Avropa M\\u0259sl\\u0259h\\u0259t\\u00e7il\\u0259r T\\u0259\\u015fkilat\\u0131nda (ECO) Avropa \\u0130ttifaq\\u0131 TACIS layih\\u0259si \\u00fczr\\u0259 ekspert k\\u00f6m\\u0259k\\u00e7isi kimi ba\\u015flay\\u0131b.<\\/p><p>2002-ci ild\\u0259 BMT-nin Beyn\\u0259lxalq Miqrasiya T\\u0259\\u015fkilat\\u0131n\\u0131n (\\u0130OM) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 miqrasiya m\\u0259s\\u0259l\\u0259l\\u0259ri \\u00fczr\\u0259 ekspert, Avropa \\u0130ttifaq\\u0131 v\\u0259 Az\\u0259rbaycan aras\\u0131nda t\\u0259r\\u0259fda\\u015fl\\u0131q v\\u0259 \\u0259m\\u0259kda\\u015fl\\u0131q sazi\\u015finin icras\\u0131 \\u00fczr\\u0259 Az\\u0259rbaycanda Avropa \\u0130ttifaq\\u0131 TAS\\u0130S layih\\u0259sind\\u0259 ekspert i\\u015fl\\u0259yib.<\\/p><p>2003-2004-c\\u00fc ill\\u0259rd\\u0259 Avropa Komissiyas\\u0131n\\u0131n Az\\u0259rbaycandak\\u0131 \\u0130nformasiya v\\u0259 texniki d\\u0259st\\u0259k Ofisind\\u0259 \\u201cEuropa House\\u201d informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs, BMT-nin Qa\\u00e7q\\u0131nlar \\u00fczr\\u0259 Ali Komissarl\\u0131\\u011f\\u0131n\\u0131n (UNHCR) Az\\u0259rbaycan n\\u00fcmay\\u0259nd\\u0259liyind\\u0259 informasiya \\u00fczr\\u0259 m\\u0259sul \\u015f\\u0259xs v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2004-2007-ci ill\\u0259rd\\u0259 \\u0130qtisadi \\u0130nki\\u015faf Nazirliyind\\u0259 ba\\u015f m\\u0259sl\\u0259h\\u0259t\\u00e7i, sektor m\\u00fcdiri, \\u015f\\u00f6b\\u0259 m\\u00fcdirinin m\\u00fcavini v\\u0259 Davaml\\u0131 inki\\u015faf v\\u0259 regional siyas\\u0259t \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259l\\u0259rind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>2009-cu ild\\u0259n \\u0130qtisadi \\u0130nki\\u015faf Nazirliyinin Regionlar\\u0131n inki\\u015faf\\u0131 v\\u0259 d\\u00f6vl\\u0259t proqramlar\\u0131 \\u015f\\u00f6b\\u0259sinin m\\u00fcdiri v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 mart 2014-c\\u00fc il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131 iqtisadiyyat v\\u0259 s\\u0259naye nazirinin m\\u00fcavini, 30 yanvar 2016-c\\u0131 il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n iqtisadiyyat nazirinin m\\u00fcavini v\\u0259zif\\u0259sind\\u0259 i\\u015fl\\u0259yib.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin 13 may 2020-ci il tarixli S\\u0259r\\u0259ncam\\u0131 il\\u0259 Az\\u0259rbaycan Respublikas\\u0131n\\u0131n \\u0130qtisadiyyat Nazirliyi yan\\u0131nda Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isinin m\\u00fcavini v\\u0259zif\\u0259sin\\u0259 t\\u0259yin edilmi\\u015f v\\u0259 Antiinhisar v\\u0259 \\u0130stehlak Bazar\\u0131na N\\u0259zar\\u0259t D\\u00f6vl\\u0259t Xidm\\u0259tinin r\\u0259isi t\\u0259yin olunana q\\u0259d\\u0259r h\\u0259min v\\u0259zif\\u0259nin icras\\u0131 ona h\\u0259val\\u0259 edilmi\\u015fdir.<\\/p><p>Az\\u0259rbaycan Respublikas\\u0131 Prezidentinin s\\u0259r\\u0259ncamlar\\u0131 il\\u0259 2012-ci ild\\u0259 \\"D\\u00f6vl\\u0259t qullu\\u011funda f\\u0259rql\\u0259nm\\u0259y\\u0259 g\\u00f6r\\u0259\\", 2018-ci ild\\u0259 \\u201cT\\u0259r\\u0259qqi\\u201d medallar\\u0131 il\\u0259 t\\u0259ltif olunmu\\u015fdur.<\\/p><p>Az\\u0259rbaycan, \\u0130ngilis, Rus, Ukrayna dill\\u0259rini bilir.<\\/p><p>Ail\\u0259lidir, 2 \\u00f6vlad\\u0131 var.<\\/p>"}',
            ),
            333 => 
            array (
                'id' => 576,
                'field_id' => 123,
                'post_id' => 119,
                'field_value_id' => NULL,
                'value' => '{"az":"Similique placeat s","en":"Ullamco est excepteu","ru":"Qui ut anim delectus"}',
            ),
            334 => 
            array (
                'id' => 577,
                'field_id' => 124,
                'post_id' => 119,
                'field_value_id' => NULL,
                'value' => '{"az":"Fay Mays","en":"Rylee Wolfe","ru":"Kaseem Ferrell"}',
            ),
            335 => 
            array (
                'id' => 578,
                'field_id' => 125,
                'post_id' => 119,
                'field_value_id' => NULL,
                'value' => '{"az":"Voluptate eiusmod qu","en":"Exercitation volupta","ru":"In optio voluptate"}',
            ),
            336 => 
            array (
                'id' => 579,
                'field_id' => 126,
                'post_id' => 119,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            337 => 
            array (
                'id' => 580,
                'field_id' => 127,
                'post_id' => 119,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>d<\\/p>","en":"<p>d<\\/p>","ru":"<p>d<\\/p>"}',
            ),
            338 => 
            array (
                'id' => 581,
                'field_id' => 113,
                'post_id' => 120,
                'field_value_id' => NULL,
                'value' => '01',
            ),
            339 => 
            array (
                'id' => 582,
                'field_id' => 128,
                'post_id' => 120,
                'field_value_id' => NULL,
                'value' => '{"az":"Ab ad rerum optio ipsum est in quia mollitia non sed ad officiis corrupti rerum perferendis","en":"Amet enim sunt corporis consectetur delectus harum maiores dolores consequatur sunt odio ad beatae aliquid commodi mollitia","ru":"Eiusmod ex officia praesentium accusantium culpa iusto reiciendis ut aut Nam esse veniam rerum"}',
            ),
            340 => 
            array (
                'id' => 583,
                'field_id' => 113,
                'post_id' => 121,
                'field_value_id' => NULL,
                'value' => '02',
            ),
            341 => 
            array (
                'id' => 584,
                'field_id' => 128,
                'post_id' => 121,
                'field_value_id' => NULL,
                'value' => '{"az":"Et aperiam nulla voluptas unde amet esse sint facere qui repellendus Soluta eum","en":"Alias nulla consequat Fugit reiciendis debitis laboris atque ea ab mollitia magna accusantium sunt","ru":"Occaecat nihil voluptate dolor excepturi"}',
            ),
            342 => 
            array (
                'id' => 585,
                'field_id' => 111,
                'post_id' => 122,
                'field_value_id' => NULL,
                'value' => '45 km',
            ),
            343 => 
            array (
                'id' => 586,
                'field_id' => 112,
                'post_id' => 122,
                'field_value_id' => NULL,
                'value' => '{"az":"Obcaecati aut ut sunt optio excepturi quis a dolores omnis","en":"Est iusto at sunt nihil","ru":"Minus minima reprehenderit voluptatem quam molestiae quis qui doloremque ipsa illum quia iste quos velit dolorum cillum consequat"}',
            ),
            344 => 
            array (
                'id' => 587,
                'field_id' => 111,
                'post_id' => 123,
                'field_value_id' => NULL,
                'value' => '46km',
            ),
            345 => 
            array (
                'id' => 588,
                'field_id' => 112,
                'post_id' => 123,
                'field_value_id' => NULL,
                'value' => '{"az":"Repellendus Temporibus et rem vero velit in eu fugit illo","en":"Voluptatem culpa eaque qui itaque vel esse et soluta","ru":"Doloribus est dolor occaecat libero rerum dolore molestias non"}',
            ),
            346 => 
            array (
                'id' => 589,
                'field_id' => 111,
                'post_id' => 124,
                'field_value_id' => NULL,
                'value' => '46km',
            ),
            347 => 
            array (
                'id' => 590,
                'field_id' => 112,
                'post_id' => 124,
                'field_value_id' => NULL,
                'value' => '{"az":"Esse ut in sint fugiat eos quidem rem sint consequatur ut","en":"Accusamus qui ullamco iure rem sit recusandae Quas ipsum","ru":"Doloribus natus sed nobis qui quia sint quo perferendis laudantium necessitatibus et lorem voluptas sit quasi at"}',
            ),
            348 => 
            array (
                'id' => 591,
                'field_id' => 111,
                'post_id' => 125,
                'field_value_id' => NULL,
                'value' => '48km',
            ),
            349 => 
            array (
                'id' => 592,
                'field_id' => 112,
                'post_id' => 125,
                'field_value_id' => NULL,
                'value' => '{"az":"Et consequatur Consectetur non ut in aliqua Provident perferendis nihil est aut culpa eveniet dolor ut reiciendis","en":"Culpa ut ab excepteur sunt quis","ru":"Assumenda tenetur qui amet omnis eu sed quis voluptatem cupiditate eu reiciendis est facilis quia assumenda in ut dolor"}',
            ),
            350 => 
            array (
                'id' => 683,
                'field_id' => 8,
                'post_id' => 133,
                'field_value_id' => NULL,
                'value' => '{"az":"salam","en":"salamen","ru":"salamru"}',
            ),
            351 => 
            array (
                'id' => 684,
                'field_id' => 9,
                'post_id' => 133,
                'field_value_id' => NULL,
                'value' => '{"az":"<p>salamru<\\/p>","en":"<p>salamru<\\/p>","ru":"<p>salamru<\\/p>"}',
            ),
            352 => 
            array (
                'id' => 685,
                'field_id' => 10,
                'post_id' => 133,
                'field_value_id' => NULL,
                'value' => '2022-06-28 00:00:00',
            ),
            353 => 
            array (
                'id' => 686,
                'field_id' => 33,
                'post_id' => 133,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
            354 => 
            array (
                'id' => 687,
                'field_id' => 35,
                'post_id' => 133,
                'field_value_id' => NULL,
                'value' => '{"az":"salamru","en":"salamru","ru":"salamru"}',
            ),
            355 => 
            array (
                'id' => 688,
                'field_id' => 130,
                'post_id' => 133,
                'field_value_id' => NULL,
                'value' => NULL,
            ),
        ));
        
        
    }
}