<script>
    $(document).ready(function (){
        $('#exit_type').change(function(e) {
            e.preventDefault();
            // alert($("#exit_type option:contains('0')"))
            // return false;
            if ($(this).val() == '2') {
                $("#enexDiv").show();
                $("#goodName").hide();
                $("#weightKg").hide();
                $("#bxTotal").hide();
            } else if ($(this).val() == '3') {
                $("#enexDiv").hide();
                $("#goodName").show();
                $("#weightKg").hide();
                $("#bxTotal").hide();
            } else {
                $("#enexDiv").show();
                $("#goodName").show();
                $("#weightKg").show();
                $("#bxTotal").show();
            }
        });
    });
</script>
