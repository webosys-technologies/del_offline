<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<script>
    
    
var validateEmail = function(elementValue) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue);
}


function subscribe() {
       
    var value = $('#email').val();
    var valid = validateEmail(value);
    if (!valid) {
        $("#email_err").html("Invalid Email");    
        return false;
    }else{
        
        var data = new FormData(document.getElementById("subscriber"));
      var url;     
      url = "<?php echo site_url('index.php/Home/add_subscriber')?>";
        
          // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
            dataType: "JSON",
            success: function(json)
            {   
               if(json.status)
               {
                   $("#email_err").html("");            
               $("#email_success").html("Subscribed Successfully");            
               }
               
               if(json.email_err)
               {
                    $("#email_success").html("");        
                    $("#email_err").html(json.email_err);            
               }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data in student');
            }
        });
        
        
    }
}
    

function email_val(){
    
     var value = $("#email").val();
//     alert(value);
    var valid = validateEmail(value);

    if (!valid) {
        $("#email").css('color', 'red');
    } else {
        $("#email_err").html("");    
        $("#email").css('color', 'green');
    }
 // play with event
 // use $(this) to determine which element triggers this event
}
</script>



	<!--====== Javascripts & Jquery ======-->
	<script src="<?php echo base_url('assets/home/js/jquery-3.2.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/owl.carousel.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/jquery.countdown.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/masonry.pkgd.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/magnific-popup.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/main.js'); ?>"></script>
	
</body>
</html>