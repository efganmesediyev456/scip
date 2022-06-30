<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class RouteController extends Controller
{
    public function __invoke(?string $slug = null)
    {

        $urlParts = [];
        $userAgent = request()->userAgent();
        $ip = request()->ip();
        $country = request()->header('cf-ipcountry', 'Unknown');


        if ($slug) {
            $urlParts = explode('/', $slug);
        }

        if (count($urlParts) && in_array($urlParts[0], config('app.locales'))) {
            unset($urlParts[0]);
        }

        /** @var $page Page */
        $page = Cache::rememberForever('mainPage', fn () => Page::findOrFail(1));



//        if(in_array('post',$urlParts) && count($urlParts) >= 3)
//        {
//            $pageSlug =  $urlParts[count($urlParts) - 3] ;
//            $postSlug =  end($urlParts) ;
//            $page = $page?->sub_pages->where("slug." . app()->getLocale(), $pageSlug)->first();
//
//            abort_unless($page, Response::HTTP_NOT_FOUND);
//            $post = Post::where('slug->' . app()->getLocale(), '=', strip_tags($postSlug))->first();
//
//            abort_unless($post, Response::HTTP_NOT_FOUND);
//
//
//            $deviceType = $post->deviceType();
//
//            if (!blank($userAgent)) {
//                dispatch(function () use ($post, $userAgent, $ip, $country, $deviceType) {
//                    $post->saveVisit($userAgent, $ip, $country, $deviceType);
//                })->onQueue('visit');
//            }
//
//            return view('templates.post-' . array_search($post->type, Post::TYPES), compact('post','page'));
//
//        }
//        else{
//
//        }

    //    $page =  $this->getPages($urlParts,$page);

        foreach ($urlParts as $url) {
            $page = $page?->sub_pages->where("slug." . app()->getLocale(), $url)->first();
        }




        //redirect yaratmisam


        if($page?->type === '4')
        {
            abort_unless($page->sub_pages->count(),404);

            $firstChild = $page->sub_pages->first()->slug->{app()->getLocale()} ;
            $urlParts[] = $firstChild ;

            redirect(implode('/',$urlParts))->send();
        }


        /// Single Posts


        if (!$page) {
            $slug = str_replace(array_merge(['post/'], collect(config('app.locales'))
                ->map(fn (string $locale) => $locale . '/')->toArray()), '', $slug);



            /** @var $post Post */
            $post = Post::where('slug->' . app()->getLocale(), '=', strip_tags($slug))->first();


            abort_unless($post, Response::HTTP_NOT_FOUND);

            $deviceType = $post->deviceType();

            if (!blank($userAgent)) {
                dispatch(function () use ($post, $userAgent, $ip, $country, $deviceType) {
                    $post->saveVisit($userAgent, $ip, $country, $deviceType);
                })->onQueue('visit');
            }


            return view('templates.post-' . array_search($post->type, Post::TYPES), compact('post'));
        }

        abort_if(!$page, Response::HTTP_NOT_FOUND);

        $deviceType = $page->deviceType();






        if (!blank($userAgent)) {
            dispatch(function () use ($page, $userAgent, $ip, $country, $deviceType) {
                $page->saveVisit($userAgent, $ip, $country, $deviceType);
            })->onQueue('visit');
        }

        return view('templates.page-' . array_search($page->type, Page::TYPES), compact('page'));
    }


    private function getPages($urlParts,$page)
    {
        foreach ($urlParts as $url) {
            if(in_array('corporate',[request()->segment(1),request()->segment(2)]))
            {
                $page = $page?->sub_pages->
                where("slug." . app()->getLocale(), $url)->
                where('corporate',true)->
                first();


            }
            else
            {
                $page = $page?->sub_pages->
                where("slug." . app()->getLocale(), $url)->
                where('corporate',false)->
                first();
            }


        }

        return $page ;
    }


}
