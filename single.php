<?php
if(in_category(6)) {
    include 'single-transfer.php';
}
else if(in_category(7)) {
    include 'single-turi.php';
}
else if(in_category(27)) {
    include 'single-turi.php';
}
else if(in_category(12)) {
    include 'single-news.php';
}
else if(in_category(15)) {
    include 'single-accommodation.php';
}
else {
    include 'index.php';
}
?>
