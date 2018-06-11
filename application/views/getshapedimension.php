<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('template'); ?>

<div class="col-md-3"  id="main-div">

    <form action="<?php echo site_url('getshapedimension/askforparms') ?>"  class="form-horizontal" method="post">

        <div class="form-body">
            <h4><b>Step 1 : Select your shape</b></h4>
            <h5>
                Please select the shape that you would like
                to calculate the area of and press the button "Go to step 2"
            </h5>

            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('shapes'))) ? 'has-error' : ''; ?>"  style="margin-left:02px;">

                <?php
                $a = getShapeArray();
                for ($i = 1; $i <= count($a); $i++) {
                    ?>
                    <input type="radio" name="shapes"  value="<?php echo $i ?>" <?php echo set_radio('shapes', $i, $shapeId != NULL ? ($shapeId == $i ? TRUE : FALSE ) : FALSE ) ?>>   <?php echo $a[$i]; ?>
                    <br>
                <?php } ?>
                <span class="help-block"><?php echo form_error('shapes') ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-9" style="margin-left:02px;margin-bottom: 15px;" >
                <button type="submit" class="btn green">Go to step 2</button>
                <a  id="cancel"  class="btn blue">or Cancel</a>
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
    $("#cancel").click(function () {
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