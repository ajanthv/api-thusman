<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'first_name',
        'last_name',
        'email',
        'address',
        'city',
        'country',
        'phone_number',
        'nationality',
        'company_esg_initiatives',
        'ideal_esg_project',
        'most_important_un_sdgs',
        'why_our_initiative_is_important',
        'what_do_you_hope_to_get_out_of_the_heros_academy_course',
        'project_length_of_project_on_weeks',
        'what_passsion_do_you_have',
        'what_expertise_would_you_like_to_sell_to_international_clients',
        'what_do_you_plan_to_spend_the_initial_kickstart_sponsorship',
        'project_name',
        'project_impact',
        'project_theme',
        'terms_and_condition',
        'password',
        'email_verified',
        'firebase_uid',
        'avatar_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified' => 'boolean',
    ];
}
