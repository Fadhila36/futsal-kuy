<!-- Bootstrap Core Js -->
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.js"></script>


<!-- Sparkline Chart Plugin Js -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>assets/admin/js/admin.js"></script>
<!-- <script src="<?= base_url() ?>assets/admin/js/pages/index.js"></script> -->

<!-- Demo Js -->
<script src="<?= base_url() ?>assets/admin/js/demo.js"></script>
<script>
    var socket = io.connect('http://' + window.location.hostname + ':3001');

    socket.on('new_count_message', function(data) {

        $("#new_count_message").html(data.new_count_message);
        $('#notif_audio')[0].play();

    });

    socket.on('update_count_message', function(data) {

        $("#new_count_message").html(data.update_count_message);

    });

    socket.on('new_message', function(data) {
        $('#notif_audio')[0].play();
    });
</script>
<audio id="notif_audio">
    <source src="<?php echo base_url('sounds/notify.ogg'); ?>" type="audio/ogg">
    <source src="<?php echo base_url('sounds/notify.mp3'); ?>" type="audio/mpeg">
    <source src="<?php echo base_url('sounds/notify.wav'); ?>" type="audio/wav">
</audio>
</body>

</html>