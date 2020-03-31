<!-- jQuery scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- This is materialize CSS for the selection categories -->
<script>
          $(document).ready(function(){
        $('select').formSelect();
      });
</script>
<!-- This is materialize CSS for the selection playlists -->
<script>  $('.dropdown-trigger').dropdown();</script>

<script>

$(document).ready(function() {
    M.updateTextFields();
  });
  
</script>
<script>
$(function(){
	$('input[type="submit"]').click(function(e){
		console.log('It is here...');
		e.preventDefault();
		$.ajax({
			url: 'categories.php',
			type: 'post',
			data: $('form').serialize(),
			success: function(result) {
            $('#resultForm').html('<div class="green">'+result+'</div>');
             
			},
			error: function(err){
             $('#resultForm').html('<div class="red">'+result+'</div>');
              
				// If ajax errors happens
			}
		});
	});
});



        $('#category').click(function(data){
          let query = $(this).val();
          if (query != "") {
            $.ajax({
              url: 'categories.php',
              method: 'POST',
              data: {query:query},
              success: function(data){
 
                $('#name').css('display', 'block');
                $("#category").focusout(function(){
                    $('#name').css('display', 'none');
                });
                $("#category").focusin(function(){
                    $('#name').css('display', 'block');
                });
              }
              
            });
          } else {
          $('#name').css('display', 'none');
        }
      });


$(function() {
    $("select").on("change", function() {
        if($(this).val() === "") {
            $("#name").hide();
        } else {
            $("#name='" + $(this).val() + "'").show().siblings("[#name]").hide();
        }
    });
});
  

</script>
