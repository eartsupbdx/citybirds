<?php
/*
Template Name: debug post pic
*/
?>

<form  id="contact_form" method="post" action="/post-pic/"  ENCTYPE="multipart/form-data">
	<label id="exampleFileUploadLabel" for="exampleFileUpload" class="ajouter button">Ajouter une<br />pièce jointe (1Mo max.)</label>
	<input type="file" id="exampleFileUpload" name="exampleFileUpload" class="show-for-sr" size="1048576">
	<input type="text" name="api_key" id="api_key" value="04282711540040381525457454"/>
	<input type="submit" class="envoyer button" value="Envoyer">
</form>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/jquery-3.3.1.min.js"></script>

<script>
$( "#contact_form" ).submit(function(event) {
	event.preventDefault();

	var form = $('form').get(0);
	var formData = new FormData(form);// get the form data
	// on envoi formData vers mail.php
	$.ajax({
		type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
		url : '/post-pic/', // the url where we want to POST
		data : formData, // our data object
		dataType : 'json', // what type of data do we expect back from the server
		processData : false,
		contentType : false
	})
	.done(function(data) {
		console.log(data);
	});
});


</script>