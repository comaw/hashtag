<?php
/**
 * powered by php-shaman
 * UrlHelper.php 23.02.2016
 * Hashtag
 */

namespace common;


class UrlHelper
{
    public static function autoLink($str, $type = 'both', $popup = FALSE, $noindex = false)
    {
        // Find and replace any URLs.
        if ($type !== 'email' && preg_match_all('#(\w*://|www\.)[^\s()<>;]+\w#i', $str, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER))
        {
            // Set our target HTML if using popup links.
            $target = ($popup) ? ' target="_blank"' : '';
            $nofollow = $noindex ? ' rel="nofollow" ' : '' ;

            // We process the links in reverse order (last -> first) so that
            // the returned string offsets from preg_match_all() are not
            // moved as we add more HTML.
            foreach (array_reverse($matches) as $match)
            {
                // $match[0] is the matched string/link
                // $match[1] is either a protocol prefix or 'www.'
                //
                // With PREG_OFFSET_CAPTURE, both of the above is an array,
                // where the actual value is held in [0] and its offset at the [1] index.
                $a = (($noindex) ? '<!--noindex-->' : '').'<a href="'.(mb_strpos($match[1][0], '/', null, 'UTF-8') ? '' : 'http://').$match[0][0].'"'.$target.$nofollow.'>'.$match[0][0].'</a>'.(($noindex) ? '<!--/noindex-->' : '');
                $str = substr_replace($str, $a, $match[0][1], mb_strlen($match[0][0], 'UTF-8'));
            }
        }

        // Find and replace any emails.
        if ($type !== 'url' && preg_match_all('#([\w\.\-\+]+@[a-z0-9\-]+\.[a-z0-9\-\.]+[^[:punct:]\s])#i', $str, $matches, PREG_OFFSET_CAPTURE))
        {
            foreach (array_reverse($matches[0]) as $match)
            {
                if (filter_var($match[0], FILTER_VALIDATE_EMAIL) !== FALSE)
                {
                    $str = substr_replace($str, self::safeMailto($match[0]), $match[1], mb_strlen($match[0], 'UTF-8'));
                }
            }
        }

        return $str;
    }

    public static function safeMailto($email, $title = '', $attributes = '')
    {
        $title = (string) $title;

        if ($title === '')
        {
            $title = $email;
        }

        $x = str_split('<a href="mailto:', 1);

        for ($i = 0, $l = mb_strlen($email, 'UTF-8'); $i < $l; $i++)
        {
            $x[] = '|'.ord($email[$i]);
        }

        $x[] = '"';

        if ($attributes !== '')
        {
            if (is_array($attributes))
            {
                foreach ($attributes as $key => $val)
                {
                    $x[] = ' '.$key.'="';
                    for ($i = 0, $l = mb_strlen($val, 'UTF-8'); $i < $l; $i++)
                    {
                        $x[] = '|'.ord($val[$i]);
                    }
                    $x[] = '"';
                }
            }
            else
            {
                for ($i = 0, $l = mb_strlen($attributes, 'UTF-8'); $i < $l; $i++)
                {
                    $x[] = $attributes[$i];
                }
            }
        }

        $x[] = '>';

        $temp = array();
        for ($i = 0, $l = mb_strlen($title, 'UTF-8'); $i < $l; $i++)
        {
            $ordinal = ord($title[$i]);

            if ($ordinal < 128)
            {
                $x[] = '|'.$ordinal;
            }
            else
            {
                if (count($temp) === 0)
                {
                    $count = ($ordinal < 224) ? 2 : 3;
                }

                $temp[] = $ordinal;
                if (count($temp) === $count)
                {
                    $number = ($count === 3)
                        ? (($temp[0] % 16) * 4096) + (($temp[1] % 64) * 64) + ($temp[2] % 64)
                        : (($temp[0] % 32) * 64) + ($temp[1] % 64);
                    $x[] = '|'.$number;
                    $count = 1;
                    $temp = array();
                }
            }
        }

        $x[] = '<'; $x[] = '/'; $x[] = 'a'; $x[] = '>';

        $x = array_reverse($x);

        $output = "<script type=\"text/javascript\">\n"
            ."\t//<![CDATA[\n"
            ."\tvar l=new Array();\n";

        for ($i = 0, $c = count($x); $i < $c; $i++)
        {
            $output .= "\tl[".$i."] = '".$x[$i]."';\n";
        }

        $output .= "\n\tfor (var i = l.length-1; i >= 0; i=i-1) {\n"
            ."\t\tif (l[i].substring(0, 1) === '|') document.write(\"&#\"+unescape(l[i].substring(1))+\";\");\n"
            ."\t\telse document.write(unescape(l[i]));\n"
            ."\t}\n"
            ."\t//]]>\n"
            .'</script>';

        return $output;
    }
}