<?php

try {
    echo generateResponse($_POST['url']);
} catch (\mysql_xdevapi\Exception $e) {
    echo $e->getMessage();
}

function generateResponse(string $url): string
{
    $url = str_replace(' ', '', $url);

    if (isValidUrl($url)) {
        $shortUrl = selectShortUrl($url);
        if (!$shortUrl) {
            return createShortUrl($url);
        }
        return $shortUrl;
    }

    return 'Invalid URL!';
}

function isValidUrl(string $url): bool
{
    return !empty($url) && get_headers($url, 1) !== false;
}


function createShortUrl($url): string
{
    $row = ["\n" . $url,];
    $row[] = generateShortUrl($url);
    $row[] = 0;

    file_put_contents(
        'short_urls.csv',
        implode(';', $row),
        FILE_APPEND
    );
    return $row[1];
}

function generateShortUrl($url): string
{
    return 'http://' . 'localhost' . ':' . '8888' . '/' . generateToken($url);
}

function generateToken($url): string
{
    return mb_substr(md5($url), 0, 8);
}

function selectShortUrl($url): false|string
{
    $arr = getFileToArray();

    if (array_key_exists($url, $arr)) {
        return $arr[$url][1];
    }
    return false;
}

function getFileToArray(): array
{
    $arr = [];
    $file = file('short_urls.csv');

    foreach ($file as $row) {
        $row = explode(';', $row);
        $arr[$row[0]] = $row;
    }
    return $arr;
}
