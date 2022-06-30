<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;

class SitemapController extends Controller
{
    public function __invoke()
    {
        header('Content-Type: text/xml');
        $sitemap = '<?xml version = "1.0" encoding = "UTF-8" ?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';

        $mainPage = Page::findOrFail(1);

        $entries = [];

        foreach (config('app.locales') as $locale) {
            $entries[] = [
                'url' => url('/' . $locale),
                'lmod' => $mainPage->updated_at->format('Y-m-d'),
                'freq' => 'weekly',
                'priority' => 1
            ];
        }

        foreach (Page::whereKeyNot(1)->without(['sub_pages'])->with('parent.parent')->get() as $page) {
            /** @var $page Page */

            foreach (config('app.locales') as $locale) {
                if (!blank($page->slug->$locale)) {
                    $entries[] = [
                        'url' => url($locale . '/' . implode('/', $page->makeSlug($locale))),
                        'lmod' => $page->updated_at->format('Y-m-d'),
                        'freq' => 'daily',
                        'priority' => 1,
                    ];
                }
            }
        }

        foreach (Post::all() as $post) {
            /** @var $post Post */

            if (Post::isShownOnPageOnly($post->type)) {
                continue;
            }

            foreach (config('app.locales') as $locale) {
                if (!blank($post->slug->$locale)) {
                    $title = $post->seo->title->$locale;

                    $data = [
                        'url' => route('view', ['slug' => $post->slug->$locale]),
                        'lmod' => $post->updated_at->format('Y-m-d'),
                        'freq' => 'weekly',
                        'priority' => 1,
                    ];

                    if ($post->created_at->addDays(2)->isFuture() && !blank($title)) {
                        $data['news'] = true;
                        $data['title'] = $title;
                        $data['locale'] = $locale;
                        $data['created_at'] = $post->created_at->format('Y-m-d');
                    }

                    $entries[] = $data;
                }
            }
        }

        foreach ($entries as $entry) {
            $sitemap .= "<url>
                            <loc>{$entry['url']}</loc>
                            <lastmod>{$entry['lmod']}</lastmod>
                            <changefreq>{$entry['freq']}</changefreq>
                            <priority>{$entry['priority']}</priority>";

            if (array_key_exists('news', $entry) && $entry['news']) {
                $sitemap .= "<news:news>
                               <news:publication>
                                 <news:name>{$entry['title']}</news:name>
                                 <news:language>{$entry['locale']}</news:language>
                               </news:publication>
                               <news:publication_date>{$entry['created_at']}</news:publication_date>
                               <news:title>{$entry['title']}</news:title>
                             </news:news>";
            }

            $sitemap.= "</url>";
        }

        $sitemap .= '</urlset>';

        echo $sitemap;
        die();
    }
}
