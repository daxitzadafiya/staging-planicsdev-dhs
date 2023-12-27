<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'header_logo',
        'header_email',
        'header_button_text',
        'about_us_title',
        'about_us_description',
        'about_us_image',
        'about_us_key_partners',
        'contact_us_title',
        'contact_us_description',
        'contact_us_image',
        'clients_partners_title',
        'clients_partners_description',
        'point_of_differences_title',
        'point_of_differences_description',
        'services_title',
        'services_description',
        'core_values_title',
        'core_values_description',
        'technologies_title',
        'technologies_description',
        'portfolio_title',
        'portfolio_description',
        'key_features_title',
        'key_features_description',
        'success_story_title',
        'success_story_description',
        'success_story_sub_title',
        'success_story_sub_description',
        'success_story_logo',
        'our_process_title',
        'our_process_description',
        'client_says_title',
        'client_says_description',
        'client_says_logo',
        'achievement_title',
        'achievement_description',
        'achievement_logo',
        'contact_news_letter_title',
        'contact_news_letter_button_link',
        'contact_news_letter_button_text',
        'footer_logo',
        'footer_description',
        'footer_email',
        'footer_contact',
        'map_link',
        'footer_address_one',
        'footer_address_two',
        'linked_in_url',
        'instagram_url',
        'facebook_url'
    ];
    
    protected function aboutUsKeyPartners(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value, true),
        );
    }

    public function fullAddress()
    {
        return "{$this->footer_address_one} {$this->footer_address_two}";
    }
}
