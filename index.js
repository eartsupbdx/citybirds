var api_key = "VOTRE_CLE_API";

// gestion des interuptions GPIO
var Gpio = require('onoff').Gpio;
var pir = new Gpio(17, 'in', 'both');

// execution d'un process
var child_process = require('child_process');
var shooting = false;

// effectuer des requetes vers le web
var request = require('request');

// utiliser le systeme de fichiers
var fs = require('fs');

pir.watch(function(err, value) {
  if (err) exit();
	if(value == 1){
		if(!shooting){
			console.log('Intruder detected, shooting');
			shooting = true;
			
			var timestamp = new Date().getTime();
			
			child_process.exec('fswebcam -d /dev/video0 -p YUYV -r 640x480 --jpeg 90 -s Sharpness=40% --fps 30 image.jpg', function(error, stdout, stderr){
				console.log("end shooting");
				
				console.log("uploading image" );
				var formData = {
					api_key: api_key,
					exampleFileUpload: fs.createReadStream( "/var/www/html/image.jpg" )
				};
				request.post({url:'http://www.citybirds.info/post-pic/', formData: formData}, function optionalCallback(err, httpResponse, body) {
					if (err) {
						return console.error('upload failed:', err);
					}
					console.log( httpResponse.body );
					console.log('Upload successful!');
					
					setTimeout(function() {
						console.log('ready again after 10s delay');
						shooting = false;
					}, 10000);
				});
				
			});
		}
	}
	
});
 
console.log('Birdie box running !');
 
function exit() {
  pir.unexport();
  process.exit();
}


