<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = app(Faker\Generator::class);

        $avatars = [
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
        ];

        $users = factory(User::class)->times(10)->make()->each(function ($user, $index) use ($faker, $avatars) {
            $user->avatar = $faker->randomElement($avatars);
        });

        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($user_array);

        $user = User::find(1);

        $user->assignRole('Founder');

        $user->name = 'Xian';
        $user->email = '648132694@qq.com';
        $user->avatar = 'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200';
        $user->password = bcrypt(123456);
        $user->save();

        $user = User::find(2);
        $user->email = 'manager@manager.com';
        $user->password = bcrypt(123456);
        $user->save();
        $user->assignRole('Maintainer');
    }
}
