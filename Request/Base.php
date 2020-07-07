<?php

function request()
{
    $request = new stdClass();
    foreach ($_GET as $key => $value) {
        $request->$key = $value;
    }

    foreach ($_POST as $key => $value) {
        $request->$key = $value;
    }
    $rawBody = file_get_contents('php://input') ?? null;
    if ($rawBody) {
        $request->rawBody = getBody();
    }

    return $request;
}

function getBody()
{
    $body = '';
    $fh   = @fopen('php://input', 'r');
    if ($fh)
    {
        while (!feof($fh))
        {
            $s = fread($fh, 1024);
            if (is_string($s))
            {
                $body .= $s;
            }
        }
        fclose($fh);
    }
    return $body;
}
