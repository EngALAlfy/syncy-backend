<?php

if (!function_exists('upload_image')) {
    function upload_image($image): string
    {
        $image_name = Time() . "-" . $image->getClientOriginalName();
        $dir_name = "images";
        $image->storePubliclyAs($dir_name, $image_name, 'public');
        return $image_name;
    }
}

if (!function_exists('getUserAgent')) {
    /**
     * @throws \UAParser\Exception\FileNotFoundException
     */
    function getUserAgent(): array
    {
        $agent = \UAParser\Parser::create()->parse(request()->userAgent());
        return [
            "ip" => getIp(),
            "device" => $agent->device->toString(),
            "os" => $agent->os->toString(),
            "browser" => $agent->ua->toString(),
        ];
    }
}

if (!function_exists('getIp')) {
    function getIp(): ?string
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return the server IP if the client IP is not found using this method.
    }
}
if (!function_exists('getOnlyClassName')) {

    function getOnlyClassName($fullClassName, $isSnake = true)
    {
        $modelNames = preg_split('/\\\\/', $fullClassName);
        if ($isSnake) {
            return Str::snake(end($modelNames));
        }
        return end($modelNames);

    }
}

if (!function_exists('formatPhone')) {

    function formatPhone($countryCode , $phoneNumber): string
    {
        $phoneNumber = \Illuminate\Support\Str::replaceStart("0" , "", $phoneNumber)  ;
        return $countryCode . $phoneNumber;

    }
}
