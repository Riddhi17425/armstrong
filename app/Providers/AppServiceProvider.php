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
            "image" => "https://www.armstrongex.com/public/front/img/event-banner.webp",
            "@id" => "https://www.armstrongex.com/#business",
            "url" => "https://www.armstrongex.com/",
            "telephone" => "+91 63587 40011",
            "priceRange" => "-",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "6th Floor, SARAP Building, Opp. Navjivan Press, B/H Gujarat Vidyapith",
                "addressLocality" => "Ahmedabad",
                "postalCode" => "380014",
                "addressCountry" => "IN"
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => 22.97104358549153,
                "longitude" => 72.64164987116435
            ],
            "openingHoursSpecification" => [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday"
                ],
                "opens" => "09:00",
                "closes" => "18:00"
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
            "image" => "https://www.armstrongex.com/public/front/img/logo.svg",
            "description" => "Armstrong is a trusted manufacturer and exporter of finishing machinery and
            spare parts for the PP/FIBC and woven sack industries.",
            "brand" => [
                "@type" => "Brand",
                "name" => "Armstrong"
            ],
            "aggregateRating" => [
                "@type" => "AggregateRating",
                "ratingValue" => "5.0",
                "bestRating" => "5",
                "worstRating" => "1",
                "ratingCount" => "09"
            ]
        ];

         View::share([
            'localSchema' => json_encode($localSchema, JSON_UNESCAPED_SLASHES),
            'productSchema' => json_encode($productSchema, JSON_UNESCAPED_SLASHES)
        ]);
    }
}
