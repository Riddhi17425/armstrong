<?php

namespace App\Http\Controllers;

use App\Models\ProductMaster;
use App\Models\ProductCategory;
use App\Models\Application;
use App\Models\Blogs;

class SitemapController extends Controller
{
    protected function xmlResponse(string $xml)
    {
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Escape values for XML
     */
    protected function xmlEscape($value)
    {
        return htmlspecialchars(
            (string) $value,
            ENT_XML1 | ENT_QUOTES,
            'UTF-8'
        );
    }

    public function index()
    {
        $todayTime = now()->toAtomString();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // HOMEPAGE
        $xml .= '
        <url>
            <loc>' . $this->xmlEscape(url('/')) . '</loc>
            <lastmod>' . $this->xmlEscape($todayTime) . '</lastmod>
            <priority>1.00</priority>
        </url>';


        // PRODUCT PAGES
        $products = ProductMaster::where('product_status', 1)
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($products as $product) {

            $productUrl = route('products.detail', $product->url);

            $xml .= '
            <url>
                <loc>' . $this->xmlEscape($productUrl) . '</loc>
                <lastmod>' . $this->xmlEscape(optional($product->updated_at)->toAtomString()) . '</lastmod>
                <priority>0.80</priority>
            </url>';
        }


        // CATEGORY PAGES
        $categories = ProductCategory::where('status', 1)
            ->whereNotNull('name')
            ->where('name', '!=', '')
            ->get();

        foreach ($categories as $category) {

            $slug = \Illuminate\Support\Str::slug($category->name);

            $categoryUrl = route('products.listing', $slug);

            $xml .= '
            <url>
                <loc>' . $this->xmlEscape($categoryUrl) . '</loc>
                <lastmod>' . $this->xmlEscape(optional($category->updated_at)->toAtomString()) . '</lastmod>
                <priority>0.80</priority>
            </url>';
        }


        // APPLICATION DETAIL PAGES
        $applications = Application::where('status', 1)
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($applications as $application) {

            $applicationUrl = route(
                'front.application.details',
                $application->url
            );

            $xml .= '
            <url>
                <loc>' . $this->xmlEscape($applicationUrl) . '</loc>
                <lastmod>' . $this->xmlEscape(optional($application->updated_at)->toAtomString()) . '</lastmod>
                <priority>0.60</priority>
            </url>';
        }


        // STATIC PAGES
        $staticPages = [
            route('productlist'),
            route('certificates'),
            route('about'),
            route('front.lifearmstrong'),
            route('front.video'),
            route('contact'),
            route('blog'),
            route('our.infrastructure'),
            route('research.development'),
            route('front.event'),
            route('front.gallery'),
            route('front.application'),
            route('career'),
            route('landing'),
            route('products.fibc-fabric-cutting-machine'),
            route('woven-bag-lamination-machine'),
            route('channelpartner'),
        ];

        foreach ($staticPages as $page) {

            $xml .= '
            <url>
                <loc>' . $this->xmlEscape($page) . '</loc>
                <lastmod>' . $this->xmlEscape($todayTime) . '</lastmod>
                <priority>0.60</priority>
            </url>';
        }


        // BLOG DETAIL PAGES
        $blogs = Blogs::where('status', 1)
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($blogs as $blog) {

            $blogUrl = route('blogs.detail', $blog->url);

            $xml .= '
            <url>
                <loc>' . $this->xmlEscape($blogUrl) . '</loc>
                <lastmod>' . $this->xmlEscape(optional($blog->updated_at)->toAtomString()) . '</lastmod>
                <priority>0.60</priority>
            </url>';
        }


        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }
}