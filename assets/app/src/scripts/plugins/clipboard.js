var clipboard = new ClipboardJS('.btn-clipboard');

clipboard.on('click touchstart', function(e) {
    e.preventDefault();
});
