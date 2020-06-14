<?php
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    session_write_close();
    while(1)
    {
        $data = file_get_contents("data.txt");
        if ($data != "N|")
        {
            echo "data: " . $data . "\n\n";
            @ob_flush();
			flush();
            file_put_contents("data.txt", "N|");
        }
        usleep(500000);
    }
?>