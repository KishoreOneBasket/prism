<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Prism - Labs</title>
	<link rel="icon" type="image/x-icon" href="../assets/img/avatars/logo.jpeg">

	<link href="../assets/css/modern.css" rel="stylesheet">
	<style>
		body {
			opacity: 0;
		}
	</style>
</head>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
	<?php include('../includes/sidebar.php'); ?>
		<div class="main">
		<?php include('../includes/topbar.php'); ?>
			<main class="content">
				<div class="container-fluid">
					<div class="header">
						<h1 class="header-title account-details" >
							Messages
						</h1>
					</div>
                    <div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
										<a href="#" class="mr-1">
											<i class="align-middle" data-feather="refresh-cw"></i>
										</a>
									</div>
									<h5 class="card-title mb-0">Cloud Message</h5>
								</div>
								<div class="card">
									<div class="card-body">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			<?php include('../includes/footer.php'); ?>
		</div>
	</div>
	<script src="../assets/js/app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>
	<script>
        var config = {
            apiKey: "AIzaSyBI-0T-lqtnJ1iJBnMeM_9o8BA-1MU7he8",
            authDomain: "prism-lab.firebaseapp.com",
            databaseURL: "https://prism-lab-default-rtdb.firebaseio.com",
            projectId: "prism-lab",
            storageBucket: "prism-lab.appspot.com",
            messagingSenderId: "622079015981",
            appId: "1:622079015981:web:6fb4f21bb6e2b311e1cca4",
            measurementId: "G-FGDYSDH8WD"
        };
        firebase.initializeApp(config);

        // make auth and firestore references
        const messaging = firebase.messaging();
        // Get registration token. Initially this makes a network call, once retrieved
        // subsequent calls to getToken will return from cache.
        messaging.getToken({ vapidKey: 'AAAAkNbMfC0:APA91bGDnx4MRVRKNR9rvQjWWUBohqlsV4dNDWIWF0A2WVkP4pX7NyevH67pqLDb9FQmKVpN1iHa_j2g1Q4YVjjcxxgNBjo5dUT1MGDMNDDdo0oQi5kdi2oTMgYdYrAfsVLCh3i3Xv2Y' }).then((currentToken) => {
        if (currentToken) {
            // Send the token to your server and update the UI if necessary
            // ...
        } else {
            // Show permission request UI
            console.log('No registration token available. Request permission to generate one.');
            // ...
        }
        }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        // ...
        });
		// These registration tokens come from the client FCM SDKs.
const registrationTokens = [
  'YOUR_REGISTRATION_TOKEN_1',
  // ...
  'YOUR_REGISTRATION_TOKEN_n'
];

// Subscribe the devices corresponding to the registration tokens to the
// topic.
getMessaging().subscribeToTopic(registrationTokens, topic)
  .then((response) => {
    // See the MessagingTopicManagementResponse reference documentation
    // for the contents of response.
    console.log('Successfully subscribed to topic:', response);
  })
  .catch((error) => {
    console.log('Error subscribing to topic:', error);
  });
    </script>

</body>
</html>