<script>
    setTimeout(function() {
        const alertElement = document.querySelector('.alert-success');
        if (alertElement) {
            bootstrap.Alert.getOrCreateInstance(alertElement).close();
        }
    }, {{ config('custom.alert', 5000) }})
</script>
