<?php

return [

    "GOOGLE_API_KEY" => env('GOOGLE_API_KEY'), //admin@cinevesture.com | gmail.com
    "PLATFORM_YOUTUBE" => "youtube",
    "PLATFORM_VIMEO" => "vimeo",
    "PROJECT_NO_IMAGE" => "",
    'SECRET_KEY'=> env('STRIPE_SECRET_KEY'),
    'PUBLISH_KEY'=> env('STRIPE_PUBLISH_KEY'),
    'JOB_PAGINATION_LIMIT' => '5',
    'NO_DATA_FAVOURITE' => '<div class="not-found-text">
                                <h4>No Data Found</h4>
                            </div>',
    'NO_DATA_SEARCH' => '<div class="not-found-text">
                            <h4>No data found, please modify your search.<h4>
                        </div>',
    'NO_DATA_FAVOURITE_NO_CARD' => '<div class="not-found-text">
                                        <h4>No Project Found</h4>
                                    </div>',
    'SOCIAL_MEDIA_LINK_LINKEDIN' => 'https://www.linkedin.com/in/cinevesture',
    'SOCIAL_MEDIA_LINK_INSTAGRAM' => 'https://instagram.com/cinevesture?igshid=YWJhMjlhZTc=',
    'SOCIAL_MEDIA_LINK_FACEBOOK' => 'https://www.facebook.com/cinevesture',
    'SOCIAL_MEDIA_LINK_TWITTER' => 'https://twitter.com/cinevesture',
    'SOCIAL_MEDIA_LINK_YOUTUBE' => 'https://youtube.com/@cinevesture5809',
    'PROFILE_VERIFIED_ON_ENDORSE_COUNT' => '2',
    'MAX_PROJECT_DURATION_IN_MIN' => '60000',
    'MAX_TOTAL_BUDGET' => '1000000000',
    "captcha_site_key"=>env('GOOGLE_CAPTCHA_SITE_KEY'), // admin@cinevesture.com
    "captcha_secret_key"=>env('GOOGLE_CAPTCHA_SECRET_KEY'), // admin@cinevesture.com
    'site-key-local'=>env('GOOGLE_CAPTCHA_SITE_KEY'),

];

?>
