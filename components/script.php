<!-- jQuery scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
          $(document).ready(function(){
        $('select').formSelect();
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
                // $('#resultForm').html('<div class="green">'+result+'</div>');
             
			},
			error: function(err){
                // $('#resultForm').html('<div class="red">'+result+'</div>');
              
				// If ajax errors happens
			}
		});
	});
});

</script>
