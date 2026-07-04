

<!-- BOOTSTRAP CSS -->
<link  id="style" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

<!-- ICONS CSS -->
<link href="<?php echo base_url('assets/plugins/web-fonts/icons.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/plugins/web-fonts/font-awesome/font-awesome.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/plugins/web-fonts/plugin.css');?>" rel="stylesheet">

<!-- STYLE CSS -->
<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/plugins.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/common.min.css');?>" rel="stylesheet">

<!-- SWITCHER CSS -->
<link href="<?php echo base_url('assets/switcher/css/switcher.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/switcher/demo.css');?>" rel="stylesheet">
<style>
.miClose{ margin-right:0px !important;} .form-control[readonly] { background-color: #fff !important;}	.input-group-text i{ color:#06a470;}
.errCls{float: right;color: #c10707; display:none;font-size: .8rem;}#miRsltMessage{ display:none;}

.dnlod {
  color: #ffffff;
  background-color: #233348;
  border-color: #233348;
}
.dnlod:hover{background-color: #080b0f;
  border-color: #080b0f; color:#fff;}

  .show-wave {
  position: relative;
  z-index: 1;
  text-align: center;
  line-height: 80px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.show-wave::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background: rgba(201, 207, 212, 0.3); 
  transform: translate(-50%, -50%);
  animation: wave-pulse 1.8s infinite ease-out;
  z-index: -1;
}

@keyframes wave-pulse {
  0% {
    transform: translate(-50%, -50%) scale(1);
    opacity: 0.7;
  }
  100% {
    transform: translate(-50%, -50%) scale(2.5);
    opacity: 0;
  }
}

</style>


<?php $isProfile=$this->router->fetch_class().$this->router->fetch_method(); if($isProfile=='employeemanages'){?>

<link  id="style" href="<?php echo base_url('assets/css/profile.css');?>" rel="stylesheet">
<?php }?>
<!-- JQUERY JS -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>

<script>
  var base_url = '<?php echo base_url(); ?>';
</script>