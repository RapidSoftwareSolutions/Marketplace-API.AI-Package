<?php

namespace AppBundle\Utils\Library;

/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */
class RequestBuilder
{
    public function buildUriParams($schema, $parameters)
    {
        if ($schema['object_uri'] !== false) {

            $uri = [];

            foreach ($schema['object_uri'] as $apiValue => $rapidApiValue) {
                if (isset($parameters[$rapidApiValue]) && $parameters[$rapidApiValue] != '') {

                    $uri[$apiValue] = $parameters[$rapidApiValue];

                }
            }

            $patterns = array_keys($uri);

            $replacements = array_values($uri);

            return str_replace($patterns, $replacements, $schema['uri']);
        } else {

            return $schema['uri'];
        }
    }

    public function buildArgsParams($schema, $parameters)
    {
        if ($schema['args'] !== false) {

            $query = [];

            foreach ($schema['args'] as $apiValue => $rapidApiValue) {
                if (isset($parameters[$rapidApiValue]) && $parameters[$rapidApiValue] != '') {

                    $query[$apiValue] = $parameters[$rapidApiValue];

                }
            }
            if ($schema['content_body_json'] !== false) {

                return json_encode($query);
            } else {

                return http_build_query($query, '', '&');
            }
        } else {

            return '';
        }
    }

    public function buildHeaders($schema, $parameters)
    {
        if ($schema['object_headers'] !== false) {

            $headers = [];

            $objects = [];

            foreach ($schema['object_headers'] as $apiValue => $rapidApiValue) {
                if (isset($parameters[$rapidApiValue]) && $parameters[$rapidApiValue] != '') {

                    $objects[$apiValue] = $parameters[$rapidApiValue];

                }
            }

            $patterns = array_keys($objects);

            $replacements = array_values($objects);

            foreach ($schema['headers'] as $name => $value) {
                $headers[$name] = str_replace($patterns, $replacements, $value);
            }

            return $headers;
        } else {

            return $schema['headers'];
        }
    }
}