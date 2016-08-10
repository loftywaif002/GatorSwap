
<style>

#gatorSwapFooter{
    bottom: 0;
    width: 100%;
}


.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 0px;
  background-color: #efefef;
  text-align: center;
}

#siteText{
  color: #fff;
  background-color:none;
  margin-bottom: 15px;
  margin-top: 0px;
  padding-left:15px;
}

</style>

<footer>
<div class="container">
    <div class = "row">
        <div class=" col-md-4 ">
            <a class="col-md-12" href="http://www.sfsu.edu"><img id="logo" class="col-md-12" src="<?php echo URL; ?>public/img/SFState_Logo.png" alt="GatorSwap"  height="110"></img></a>
        </div>
        <div id="siteText" class=" col-med-8">
              <h3>Disclamer: This is a SFSU Software Engineering project for Summer 2016. This website is for demonstration purposes only.</h3>
        </div> 
   </div>
   <hr>
    <div class="row">
        <div class="col-md-2 col-md-offset-1"><a href="<?php echo URL; ?>about/index" title="About us" class="footerLinks"> About</a> </div>
        <div class="col-md-2"><a href="<?php echo URL; ?>help/index" title="Help" class="footerLinks"> Help</a></div>
        <div class="col-md-2"><a href="<?php echo URL; ?>privacy/index" title="Privacy policy" class="footerLinks"> Privacy</a></div>
        <div class="col-md-2"><a href="<?php echo URL; ?>contact/index" title="Contact_info" class="footerLinks"> Contact info</a></div>
        <div class="col-md-2"><a href="<?php echo URL; ?>terms/index" title="Terms and conditions" class="footerLinks"> Terms and conditions</a></div>
    </div> <!--Row-->
</div> <!--container-->
</footer>


</body>
</html>

