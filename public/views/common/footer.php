<script>
    function spinnerDowload() {
        const $btnDownload = document.getElementsByClassName('btn-download')[0];
        const $spinner = document.getElementsByClassName('spinner-border')[0];

        $btnDownload.hidden = true;
        $spinner.hidden = false;

        setTimeout(() => {
            $btnDownload.hidden = false;
            $spinner.hidden = true;
        }, 5000);
    }
</script>
</body>

</html>