<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('template'); ?>

<div class="col-md-3"  id="main-div">

    <form  class="form-horizontal">
        <div class="form-body">
            <h4><b>Step 3 : Your Results</b></h4>

            <h5>
                You have calculated the area of a <b> <?php echo $shapeName; ?> </b> <br>with a <?php echo $paramText; ?> .Below is your result:
            </h5>
            <br>
            <br>
            <br>
            <br>
            <label style="margin-left: 50px;font-size: 20px;">The Area is <?php echo $area; ?>  .  </label>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-offset-3 col-md-9"  style="margin-left:02px;margin-bottom: 15px;">
                <button type="button" class="start-over"  class="btn green">Start Over</button>
            </div>
        </div>
    </form>

</div>
<div class="col-md-1" id="banner-ad">
    <label style="margin-top: 100px;margin-left: 15px;"> 120 x 240 Ad <br>
       (Vertical Banner) </label>
</div>
</html>

<script>
    $(".start-over").click(function () {
        window.location.href = "<?php echo site_url('getshapedimension'); ?>";
    });

    document.getElementById("main-div").style.border = "thick solid rgba(142, 142, 155, 0.11)";
    document.getElementById("banner-ad").style.border = "thick solid rgba(142, 142, 155, 0.11)";
</script>
<style>
    #main-div{
        border-radius: 10px;
    }

    #banner-ad{
        height: 285px;
        width: 180px;
        margin-left: 40px;
        background-color: darkgray;
        /*border: "thick solid rgba(142, 142, 155, 0.11)";*/
    }

</style>