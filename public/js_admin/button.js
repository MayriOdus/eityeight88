<script type="text/javascript">
  $(document).ready(function() { 
  $('#incfont').click(function(){    
        curSize= parseInt($('.cont').css('font-size')) + 2;
  if(curSize<=72)
        $('.cont').css('font-size', curSize);
        });  
  $('#decfont').click(function(){    
        curSize= parseInt($('.cont').css('font-size')) - 2;
  if(curSize>=12)
        $('.cont').css('font-size', curSize);
        }); 
 });
</script>