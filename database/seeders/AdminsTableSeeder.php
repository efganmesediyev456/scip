<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'ima.russel@example.com',
                'name' => 'Prof. Uriah Ziemann III',
                'company' => 'Hand-Morar',
                'position' => 'Test admin',
                'phone' => '123232155499+',
                'role' => 'eyJpdiI6InB1cG80d2ZlVFhNVUI1aWM3bVVENUE9PSIsInZhbHVlIjoiUStwSWNOZkhNakRUMy8zMXlWNVdKdz09IiwibWFjIjoiNjZlOTg4MjFjNmViODNiMDhjM2RjZGJiMWE4MzI5NzY0Nzg3NzdlYTQzMmIxMDljMjIxMjBhZmI4MzQ1OGUxYyIsInRhZyI6IiJ9',
                'tfa_secret' => NULL,
                'sms_enabled' => 0,
                'password' => '$argon2id$v=19$m=65536,t=4,p=1$blJLVGV1eHV4Ym1WdERJRA$zlNuFQe8sZuC4Iz9Z1RvyDTeKlAwaCYomHqd7CKEsP0',
                'password_changed_at' => NULL,
                'created_at' => '2022-06-21 11:27:03',
                'updated_at' => '2022-06-21 11:27:03',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'email' => 'wkohler@example.net',
                'name' => 'Russell Auer',
                'company' => 'Turcotte, Lemke and Thiel',
                'position' => 'Test admin',
                'phone' => '123232155499+',
                'role' => 'eyJpdiI6InNKSHFoR1cvenV2QWNNQjNndHhHdHc9PSIsInZhbHVlIjoiYk9JTFlpMHVHZzVCTDQwNEowUGd6Zz09IiwibWFjIjoiMDNmYjNlYmU1MzA4ZDhmZDlkYTVlMjY1ODM5MzBlMWE1NDA3ZjcyNDY0MGRhYjlmNTE2MmJjMDMyNWE2Y2I4MiIsInRhZyI6IiJ9',
                'tfa_secret' => NULL,
                'sms_enabled' => 0,
                'password' => '$argon2id$v=19$m=65536,t=4,p=1$UW5sYlFQTk5BcGI3bGVXSA$HIKhmBcGMJ5f8zBClsuHs9+4DBj3uJ/xPFWgBAAAb6U',
                'password_changed_at' => NULL,
                'created_at' => '2022-06-21 11:27:03',
                'updated_at' => '2022-06-21 11:27:03',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'email' => 'ynitzsche@example.org',
                'name' => 'Jared Watsica',
                'company' => 'Sipes, Stiedemann and Ryan',
                'position' => 'Test admin',
                'phone' => '123232155499+',
                'role' => 'eyJpdiI6IlRCSFVXTmV3cUIrN0dRTWQyaDVVZkE9PSIsInZhbHVlIjoiaWtQT3pETFVFTjJwSXAzcElkbTZFQT09IiwibWFjIjoiMGFjZjRmNjI0MjcwOGMyZjEyNGZkNDRjOGJlZDIxZDQ2ZTc3YzVmZjM0MTUyZWRiOGYwM2E0YWZiYWNkNjA1MSIsInRhZyI6IiJ9',
                'tfa_secret' => NULL,
                'sms_enabled' => 0,
                'password' => '$argon2id$v=19$m=65536,t=4,p=1$S2ZCWld4MzhDNWhmckRnUA$Y6YHVe5Oy+LsiN/gPhQSjyP4aZvf4F/b/QInmdl7ZdY',
                'password_changed_at' => NULL,
                'created_at' => '2022-06-21 11:27:03',
                'updated_at' => '2022-06-21 11:27:03',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'email' => 'owaelchi@example.net',
                'name' => 'Prof. Martine Ratke',
                'company' => 'McGlynn, Rutherford and Gorczany',
                'position' => 'Test admin',
                'phone' => '123232155499+',
                'role' => 'eyJpdiI6Ik95aHhyKzFidmpRWEM0UVJPZjU0cmc9PSIsInZhbHVlIjoiSUhyWC84SE9GdTdiZ3lvbllIRlZCZz09IiwibWFjIjoiZDIyMzc2NzA5MjIzMmUyZWI5OTI4MDA3NGRlNDBlNGViODY1ZWI3Y2JiMzIzN2Q0YTFlNGI2ODY5NDNkZTY5YSIsInRhZyI6IiJ9',
                'tfa_secret' => NULL,
                'sms_enabled' => 0,
                'password' => '$argon2id$v=19$m=65536,t=4,p=1$U2dabXNyclptbVIxdE9BLw$0sq7ropAs+6aHwf6vV+4oXL24OjiskewH27okI7E/lU',
                'password_changed_at' => NULL,
                'created_at' => '2022-06-21 11:27:03',
                'updated_at' => '2022-06-21 11:27:03',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'email' => 'arlie.crona@example.com',
                'name' => 'Dr. Rahsaan Douglas',
                'company' => 'Witting Ltd',
                'position' => 'Test admin',
                'phone' => '123232155499+',
                'role' => 'eyJpdiI6Ik93OXlGbkRXSU5WeFRYMmZBT2xvekE9PSIsInZhbHVlIjoiOC82WUVJS3FEQWxPNmpLdmNvWFB2Zz09IiwibWFjIjoiNTY4YWZlNWVlZGU2OThmMDZjMDQ5MTA5ZGI2MzQ1NTA3OWY3MjkyNTNmOTI0YmJkOWUxMWVlZGFkNjEyNTAzZSIsInRhZyI6IiJ9',
                'tfa_secret' => NULL,
                'sms_enabled' => 0,
                'password' => '$argon2id$v=19$m=65536,t=4,p=1$Q0lidzBMWHBMS25uOTZveg$l0gvW+E+ROpsnUC7e8m54T4b1ybNnxAqCFR9z656zcY',
                'password_changed_at' => NULL,
                'created_at' => '2022-06-21 11:27:03',
                'updated_at' => '2022-06-21 11:27:03',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}