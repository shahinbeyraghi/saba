<?php

use \Core\Response;


function response($data, $code = 200, $message = 'success')
{
    header($message, true, $code);
    $response = new Response($code, $data, $message);
    echo json_encode($response);exit;
}

function dd($data)
{
    print_r($data);exit;
}
