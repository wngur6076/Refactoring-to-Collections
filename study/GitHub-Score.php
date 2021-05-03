<?php

require_once '../vendor/autoload.php';

function curl_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $html = curl_exec($ch);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function githubScore($username)
{
    // Grab the events from the API, in the real world you'd probably use
    // Guzzle or similar here, but keeping it simple for the sake of brevity.
    $url = "https://api.github.com/users/{$username}/events";
    $events = json_decode(curl_get_contents($url), true);
    // Get all of the event types
    $eventTypes = [];
    foreach ($events as $event) {
        $eventTypes[] = $event['type'];
    }
    // Loop over the event types and add up the corresponding scores
    $score = 0;
    foreach ($eventTypes as $eventType) {
        switch ($eventType) {
        case 'PushEvent':
            $score += 5;
            break;
        case 'CreateEvent':
            $score += 4;
            break;
        case 'IssuesEvent':
            $score += 3;
            break;
        case 'CommitCommentEvent':
            $score += 2;
            break;
        default:
            $score += 1;
            break;
        }
    }
    return $score;
}

var_dump(githubScore('torvalds'));