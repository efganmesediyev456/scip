<?php

use App\Models\Page;
use App\Models\Post;
use App\Models\Settings;
use Illuminate\Database\Eloquent\Collection;

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst($string, $encoding = null): string
    {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, null, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}

if (!function_exists('format_filesize')) {
    function format_filesize($bytes, $force_unit = null, $format = null, $si = true)
    {
        // Format string
        $format = ($format === null) ? '%01.2f %s' : (string)$format;

        // IEC prefixes (binary)
        if ($si == false or strpos($force_unit, 'i') !== false) {
            $units = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB');
            $mod = 1024;
        } // SI prefixes (decimal)
        else {
            $units = array('B', 'kB', 'MB', 'GB', 'TB', 'PB');
            $mod = 1000;
        }

        // Determine unit to use
        if (($power = array_search((string)$force_unit, $units)) === false) {
            $power = ($bytes > 0) ? floor(log($bytes, $mod)) : 0;
        }

        return sprintf($format, $bytes / pow($mod, $power), $units[$power]);
    }
}

if (!function_exists('localized')) {
    function localized(object|string|null $data, string $locale = null, bool $decode = false): string|null
    {
        if (is_null($data)) return  null ;

        if($decode) {
            $data = json_decode($data);
        }
        if (!$locale) {
            $locale = app()->getLocale();
        }
        return $data?->$locale ?? $data?->{config('app.fallback_locale')} ?? "";
    }
}



if (!function_exists('localed')) {
    function localed(array $data): array
    {
        foreach (config('app.locales') as $locale) {
            if (!array_key_exists($locale, $data)) {
                $data[$locale] = "";
            }
        }

        return $data;
    }
}

if (!function_exists('mainPage')) {
    function mainPage(): Page
    {
        return Cache::rememberForever('mainPage', fn () => Page::findOrFail(1));
    }
}

if (!function_exists('posts')) {
    function posts(int $postType)
    {
        return  Post::whereType($postType);
    }
}

if (!function_exists('array_to_xml')) {
    function array_to_xml(array $data, bool $convertEntities = true): string
    {
        $xml = '';
        foreach ($data as $element => $value) {
            if (is_array($value)) {
                $xml .= "<$element>" . array_to_xml($value, $convertEntities) . "</$element>";
            } else {
                if ($value == '') {
                    $xml .= "<$element />";
                } else {
                    $xml .= "<$element>" . ($convertEntities ? htmlentities($value) : $value) . "</$element>";
                }
            }
        }

        return $xml;
    }
}

if (!function_exists('xml_to_countable')) {
    /**
     * @throws Exception
     */
    function xml_to_countable(string $xml, bool $array = false): object
    {
        libxml_use_internal_errors(true);

        $loadedXml = simplexml_load_string($xml);

        if (!$loadedXml) {
            $error = implode('|', libxml_get_errors());

            throw new Exception('Failed to load XML: ' . $error);
        }

        return json_decode(json_encode($loadedXml), $array);
    }
}

if (!function_exists('page_generator')) {
    function page_generator(Page $page, int $level = 0): string
    {
        $string = "<li>";

        $slug = "/";

        if (app()->getLocale() !== config('app.fallback_locale')) {
            $slug .= app()->getLocale() . '/';
        }

        $slug .= implode('/', $page->makeSlug(app()->getLocale()));

        $string .= "<a href='" . route('view', ['slug' => $slug]) . "'>" . localized($page->name) . "</a></li>";

        foreach ($page->sub_pages as $child) {
            $string .= "<ul>";
            $string .= page_generator($child, $level + 1);
            $string .= "</ul>";
        }

        return $string;
    }
}


if (!function_exists('breadcrumb_generator')) {
    function breadcrumb_generator(Page $page, bool $urlify = false): string
    {
        $string = "";

        if ($page->page_id) {
            $string .= breadcrumb_generator($page->parent, true);
        }

        if ($urlify) {
            $url = "/";

            if (app()->getLocale() !== config('app.fallback_locale')) {
                $url .= app()->getLocale() . '/';
            }

            $url .= implode('/', $page->makeSlug(app()->getLocale()));

            $string .= "<li><a href='" . url($url) . "'>" . localized($page->name) . "</a></li>";
        } else {
            $string .= "<li><span>" . localized($page->name) . "</span></li>";
        }

        return $string;
    }
}



if (!function_exists('sidebar_generator')) {
    function sidebar_generator(Page $page, bool $urlify = false): string
    {
        $string = "";




    $language=app()->getLocale()=='az' ? '' : app()->getLocale();







        foreach ($page->parent->sub_pages()->where('shown_in_menu',1)->get()->sortBy("order") as $pag){
            if($pag->id==$page->id){
                $string.="<li   class='active' ><a href='".url( $language."/". implode('/',$pag->makeSlug(app()->getLocale())) ."'>".localized($pag->name))."</a> </li>";
            }else{
                $string.="<li><a href='".url($language."/".implode('/',$pag->makeSlug(app()->getLocale())))."'>".localized($pag->name)."</a> </li>";
            }
        }




//        if($page->parent){
//
//            $string.=sidebar_generator($page->parent);
//
//        }






        return $string;
    }
}

if (!function_exists('language_picker')) {
    function language_picker(Page|Post $model): string
    {





//        dd($model);




    $string = [];

        foreach (config('app.locales') as $key=>$locale) {


            if ($locale === app()->getLocale()) {
                $url = '#';
            } elseif ($locale === config('app.fallback_locale')) {
                if ($model instanceof Page) {
                    $url = url(implode('/', $model->makeSlug($locale)));
                } else {
                    $url = url("post/".localized($model->slug, $locale));
                }
            } else {
                if ($model instanceof Page) {
                    $url = url($locale . '/' . implode('/', $model->makeSlug($locale)));
                } else {
                    $url = url($locale . '/' . "post/".localized($model->slug, $locale));
                }
            }


            if(app()->getLocale()==$locale){
                $string[0]='
                 <a class="list__link" href="javascript:void(0)">
                                <span>'.strtoupper(app()->getLocale()).'</span><i class="icon-chevron-down"></i>
                            </a><div class="language__dropdown dropdown">';
            }else{
                $string[$key+1]= "<a href='$url'>$locale</a>";
            }



        }

        $string[]= "</div>";
        ksort($string);



        return implode('',$string);
    }
}

if (!function_exists('getPreferredLocale')) {
    function getPreferredLocale(): string
    {
        $locale = request()->segment(1);

        abort_if($locale === config('app.fallback_locale'), \Illuminate\Http\Response::HTTP_NOT_FOUND);

        if (!in_array($locale, config('app.locales'))) {
            $locale = config('app.fallback_locale');
        }

        return $locale;
    }
}

if (!function_exists('localePrefix')) {
    function localePrefix(): string
    {
        return app()->getLocale() === config('app.fallback_locale') ? '' : app()->getLocale();
    }
}

if (!function_exists('setting')) {
    function setting(string $key): string
    {
        $setting = Cache::rememberForever('settings', function () {
            return Settings::with('media')->latest()->get();
        })->where('key', $key)->first();

        if (!$setting) {
            return "";
        }

        return match ($setting->type) {
            Settings::TYPES['string'] => localized($setting->value),
            Settings::TYPES['bool'] => localized($setting->value),
            Settings::TYPES['url'] => localized($setting->value),
            Settings::TYPES['text'] => localized($setting->value),
            Settings::TYPES['image'] => $setting->getFirstMedia('image', ['locale' => app()->getLocale()])?->getUrl() ?? asset('empty.jpeg'),
            default => ""
        };
    }
}

if (!function_exists('page_field')) {
    function page_field($page,$field)
    {
      return $page->getField($page->fields->where('identifier',$field)->first())->value;
    }
}

if (!function_exists('page_image')) {
    function page_image($page,$field)
    {
      return $page->getField($page->fields->where('identifier',$field)->first())->getFirstMediaUrl('file');
    }
}
