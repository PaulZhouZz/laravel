<script>
    Echo.private('order.' + id)
        .listen('ShippingStatusUpdated', (e) => {
            console.log(e.update);
        })
</script>