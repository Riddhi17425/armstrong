<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $baseUrl = rtrim(url('/'), '/');

        $localSchema = [
            "@context" => "https://schema.org",
            "@type" => "LocalBusiness",
            "name" => "Armstrong",
            "image" => asset('public/front/img/event-banner.webp'),
            "@id" => $baseUrl . "/#business",
            "url" => $baseUrl . "/",
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
                "latitude" => 23.043262774846593,
                "longitude" => 72.5669538386229
            ],
            "sameAs" => [
                "https://www.facebook.com/armstrong.stitchman",
                "https://www.linkedin.com/company/armstrong-india/",
                "https://www.youtube.com/@armstrongmachineryllp1330",
                "https://www.pinterest.com/armstrongmachinery/"
            ]
        ];

        $productSchema = [
            "@context" => "https://schema.org/",
            "@type" => "Product",
            "name" => "Armstrong",
            "image" => asset('public/front/img/logo.svg'),
            "description" => "Armstrong is a trusted manufacturer and exporter of finishing machinery and spare parts for the PP/FIBC and woven sack industries.",
            "brand" => [
                "@type" => "Brand",
                "name" => "Armstrong"
            ],
            "aggregateRating" => [
                "@type" => "AggregateRating",
                "ratingValue" => "5.0",
                "bestRating" => "5",
                "worstRating" => "1",
                "ratingCount" => "9"
            ]
        ];

        View::share([
            'localSchema' => json_encode($localSchema, JSON_UNESCAPED_SLASHES),
        ]);
    }
}