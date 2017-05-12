<?php

kirby()->routes([

    [
        'method' => 'GET|DELETE|PUT|PATCH|COPY',
        'pattern' => "save",
        'action' => function() {


            return response::error('(￢_￢;) Oh no. You need to use an app (or send a POST request) to post a URL.', 405, []);
        }
    ],

    [
        'method' => 'POST',
        'pattern' => "save",
        'action' => function() {

            # CHECK FOR SAFEWORDS
            if(!threeWordsCheck(kirby()->request()->postData('sha1'))) return response::error('Please check your safe words.', 403, []);


            # CONTINUE; GRAB THE URL
            $newUrl = kirby()->request()->postData('url');
            $url = reallyurl($newUrl);


            # CHECK THE URL
            if (!$url){
                return response::error('Not a URL. Shh.', 400, []);
            }

            #CONTINUE, SAVE THE URL
            echo saveTheUrl($url);

        }
    ],

]);