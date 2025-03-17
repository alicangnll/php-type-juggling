<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function crc32_collusion($hash, $length, $verbose) {
    $counter = 0;
    $found = false;
    while (!$found) {
        $counter++;
        $test_string = generateRandomString($length);
        $test_hash = crc32($test_string);
        // Only print every 10000 attempts to reduce output overhead
        if($verbose === true) {
            if ($counter % 10000 == 0) {
                echo "[CRC32] Attempts: $counter, Current length: $length, Last hash: $test_hash\n";
            }
        }
        if ($test_hash == $hash) {
            $found = true;
            echo "[CRC32] Found a match after $counter attempts!\n";
            echo "[CRC32] Collusion String: $test_string\n";
            echo "[CRC32] Original Hash: $hash\n";
            echo "[CRC32] Collusion Hash: $test_hash\n";
            die("Found!");
        }
        // Increase length after a certain number of attempts
        if ($counter % 10000000 == 0) {
            $length++;
            echo "Increasing string length to $length\n";
        }
    }
}

function sha1_collusion($hash, $length, $verbose) {
    $counter = 0;
    $found = false;
    while (!$found) {
        $counter++;
        $test_string = generateRandomString($length);
        $test_hash = sha1($test_string);
        // Only print every 10000 attempts to reduce output overhead
        if($verbose === true) {
            if ($counter % 10000 == 0) {
                echo "[SHA1] Attempts: $counter, Current length: $length, Last hash: $test_hash\n";
            }
        }
        if ($test_hash == $hash) {
            $found = true;
            echo "[SHA1] Found a match after $counter attempts!\n";
            echo "[SHA1] Collusion String: $test_string\n";
            echo "[SHA1] Original Hash: $hash\n";
            echo "[SHA1] Collusion Hash: $test_hash\n";
            die("Found!");
        }
        // Increase length after a certain number of attempts
        if ($counter % 10000000 == 0) {
            $length++;
            echo "Increasing string length to $length\n";
        }
    }
}


function md5_collusion($hash, $length, $verbose) {
    $counter = 0;
    $found = false;
    while (!$found) {
        $counter++;
        $test_string = generateRandomString($length);
        $test_hash = md5($test_string);
        // Only print every 10000 attempts to reduce output overhead
        if($verbose === true) {
            if ($counter % 10000 == 0) {
                echo "[MD5] Attempts: $counter, Current length: $length, Last hash: $test_hash\n";
            }
        }
        if ($test_hash == $hash) {
            $found = true;
            echo "[MD5] Found a match after $counter attempts!\n";
            echo "[MD5] Collusion String: $test_string\n";
            echo "[MD5] Original Hash: $hash\n";
            echo "[MD5] Collusion Hash: $test_hash\n";
            die("Found!");
        }
        // Increase length after a certain number of attempts
        if ($counter % 10000000 == 0) {
            $length++;
            echo "Increasing string length to $length\n";
        }
    }
}

function main() {
    $hash_type = "md5";
    $hash = "0e830400451993494058024219903391";
    $length = 1;
    $verbose = true;
    // Original Password : 9Hz7AuNRykKpd9Lyrm1PFV
    // $hash = "82057da899f897984e17c3efa0d35920bf979bd1"; -> SHA1
    // $hash = "df89f49c4f6daf56bd82fabb435336d1"; -> MD5
    // $hash = "2499062230"; -> CRC32
    echo(" ==================================================");
    echo(" SHA1 / MD5 / CRC32 Collision Vulnerability Scanner");
    echo(" ==================================================\n ");
    if($hash_type == "md5") {
        md5_collusion($hash, $length, $verbose);
    } else if($hash_type == "sha1") {
        sha1_collusion($hash, $length, $verbose);
    } else if($hash_type == "crc32") {
        crc32_collusion($hash, $length, $verbose);
    } else {
        die("Hash type not supporting!");
    }
}

main();
?>
