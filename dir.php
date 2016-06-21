<?php
header('Access-Control-Allow-Origin: *');
if ( isset($_REQUEST['dir']) ) {
    $book_dir = "$_REQUEST[dir]/";
}
else {
    $book_dir = "data/book/";
}


$dirs = [];
foreach (glob($book_dir . '*', GLOB_ONLYDIR) as $file) {
    $pi = pathinfo($file);
    $enc = rawurlencode($file);
    $dirs[$enc] = $pi['basename'];
}

$files = [];
foreach ( glob("{$book_dir}*") as $file ) {
    $pi = pathinfo($file);
    if ( isset( $pi['extension'] ) ) {
        $ext = strtolower($pi['extension']);
        if ( in_array($ext, ['jpg', 'gif', 'png'] ) ) {
            $file_enc = rawurlencode( $file );
            $files[$file_enc] = pathinfo( $file, PATHINFO_BASENAME );
        }
    }
}

echo json_encode(  [ 'dirs' => $dirs, 'files' => $files ]);
