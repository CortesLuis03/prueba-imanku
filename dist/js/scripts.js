$('#elections-list').on('click', function() {
    $("div#content").load('./pages/elections/list/');
});

$('#elections-insert').on('click', function() {
    $("div#content").load('./pages/elections/insert/');
});

$('#home').on('click', function() {
    $("div#content").load('./pages/home/');
});

$(document).ready(function() {
    $("div#content").load('./pages/home/');
});