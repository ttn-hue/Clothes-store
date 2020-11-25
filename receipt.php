<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php") ?>
</head>
<script>
    $(document).ready(function(){
        var orderId = localStorage.getItem('order_id');

        $.ajax({
            type: 'POST',
            url: 'ajaxreceiptprocess.php',
            data : {
                'orderId' : orderId,
            },
            success : function(result){
                $('#receipt-wrapper').html(result);
            }
        })
    })
</script>
<body>
    <?php include('includes/nav.php') ?>

    <section class="section-receipt">
        <div id="receipt-wrapper">

        </div>
    </section>

    <?php include('includes/footer.php') ?>
</body>
</html>
