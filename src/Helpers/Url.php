<?php

namespace ThinKit\Helpers;

class Url
{
    /**
     * Update url arguments.
     *
     * @param  string  $url
     * @param  string  $key
     * @param  mixed|null  $value
     * @return string
     */
    public static function addOrUpdateArgs(string $url, string $key, mixed $value = null): string
    {
        $a     = parse_url($url);
        $query = $a['query'] ?? '';

        parse_str($query, $params);
        $params[$key] = $value;
        $query        = http_build_query($params);

        $result = '';
        if (!empty($a['scheme'])) {
            $result .= $a['scheme'].':';
        }
        if (!empty($a['host'])) {
            $result .= '//'.$a['host'];
        }
        if (!empty($a['path'])) {
            $result .= $a['path'];
        }
        if ($query) {
            $result .= '?'.$query;
        }

        return $result;
    }
}
