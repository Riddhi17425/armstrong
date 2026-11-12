<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $localSchema = [
            "@context" => "https://schema.org",
            "@type" => "LocalBusiness",
            "name" => "Armstrong",
            "image" => "https://www.armstrongex.com/public/front/home-new/icons/hdr-logo-text.svg",
            "@id" => "https://www.armstrongex.com/#business",
            "url" => "https://www.armstrongex.com/",
            "telephone" => "+91 63587 40011",
            "priceRange" => "₹₹",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "Sarap Complex, 601, Navjeevan Marg, near Ashram Road, Sattar Taluka Society, Usmanpura",
                "addressLocality" => "Ahmedabad",
                "postalCode" => "380009",
                "addressCountry" => "IN"
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => 23.042932,
                "longitude" => 72.5645506
            ],
            "sameAs" => [
                "https://www.facebook.com/armstrong.stitchman",
                "https://www.linkedin.com/company/armstrong-india/",
                "https://www.youtube.com/@armstrongmachineryllp1330",            ]
        ];

         View::share([
            'localSchema' => json_encode($localSchema, JSON_UNESCAPED_SLASHES),
        ]);
    }
}
