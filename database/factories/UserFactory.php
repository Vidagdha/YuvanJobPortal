<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/******************** 1.Factory for Admin ********************/

$factory->define(\App\Admin::class, function (Faker $faker) {
    return [
        'email' => 'admin@example.com',
        'name' => 'Admin',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});

/******************** 1.Factory for Users ********************/

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_notification_active' => $faker->boolean($chanceOfGettingTrue = 20),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});

/******************** 1.Factory for Employer ********************/

$factory->define(\App\Employer::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});

/******************** 1.Factory for Company ********************/

$factory->define(\App\Company::class, function (Faker $faker) {
    return [
        'company_name' => $name=$faker->unique()->company,
        'profile_description' => $faker->paragraph(rand(2,3)),
        'business_stream_id' => \App\BusinessStream::all()->random()->id,
        'employer_id' => \App\Employer::all()->random()->id,
        'establishment_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'company_logo' => 'company-1.png',
        'company_slug' => Str::slug($name),
        'company_address' => $faker->address,
        'company_contact' => $faker->phoneNumber,
        'company_slogan' => 'learn, earn and grow',
        'company_website_url' => $faker->domainName,
    ];
});

/******************** 1.Factory for Job Location ********************/
$factory->define(\App\JobLocation::class, function (Faker $faker) {
    return [
        'street_address' => $faker->streetName,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'zip' => $faker->postcode,
    ];
});

/******************** 1.Factory for Job Post ********************/

$factory->define(\App\JobPost::class, function (Faker $faker) {
    return [
        'posted_by_id' => \App\Employer::all()->random()->id,
        'job_type_id' => \App\JobType::all()->random()->id,
        'job_title' => $title=$faker->jobTitle,
        'company_id' => \App\Company::all()->random()->id,
        'business_stream_id' => \App\BusinessStream::all()->random()->id,
        'created_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'last_date' => $faker->date($format = 'Y-m-d', $min = 'now'),
        'salary' => rand(8000, 200000),
        'slug' => Str::slug($title),
        'job_description' => $faker->paragraph(rand(3,5)),
        'job_location' => $faker->address,
        'is_active' => $faker->boolean($chanceOfGettingTrue = 90),
    ];
});

/******************** 1.Factory for Job Post Skill Sets ********************/

$factory->define(\App\JobPostSkillSet::class, function (Faker $faker) {
    return [
        'skill_set_id' => \App\SkillSet::all()->random()->id,
        'job_post_id' => \App\JobPost::all()->random()->id,
        'skill_level' => rand(0,2),
    ];
});
