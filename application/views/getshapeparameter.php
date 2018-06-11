<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('template'); ?>

<div class="col-md-3"  id="main-div">
    <form action="<?php echo site_url('getshapedimension/getareaofshape') ?>"  class="form-horizontal" method="post">


        <div class="form-body">
            <h4><b>Step 2 : Insert your values</b></h4>

            <h5>
                You have selected <b><?php echo getShapeName($shapeId); ?></b>,please input the<br> required variables.
            </h5>

            <div class="col-md-5">
                <?php
                $responseForField = getDetailedParamAboutShape($shapeId);
                $responseForName = $responseForField['name'];
                for ($i = 0; $i < $responseForField['param']; $i++) {
                    ?>

                    <div class="form-group  margin-top-20 <?php echo (!empty(form_error('param' . $i))) ? 'has-error' : ''; ?>">
                        <label>
                            <?php echo ucwords($responseForName[$i]); ?>
                        </label>

                        <input class="form-control" name="param<?php echo $i; ?>"  value="<?php echo set_value('param' . $i); ?>" type="text" placeholder="<?php echo $responseForName[$i]; ?>">
                        <br>
                        <span class="help-block"><?php echo form_error('param' . $i) ?></span>
                    </div>

                <?php }
                ?>            
            </div>

            <input type="hidden" name="countOfParams" value="<?php echo $responseForField['param']; ?>" aria-hidden="TRUE" />
            <input type="hidden" name="shapeId" value="<?php echo $shapeId; ?>" aria-hidden="TRUE" />


        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-9"  style="margin-left:02px;margin-bottom: 15px;">
                <button type="submit" class="btn green">Go to step 3</button>
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
        window.location.href = "<?php echo base_url('getshapedimension/index/') . $shapeId; ?>";
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