<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Video Meet</title>

<script src='https://bridge01.videomeet.in/external_api.js'></script>

<script>
	function callAPI() {
		var domain = 'bridge01.videomeet.in';
		//var domain = 'meet.jit.si';
		var options = {
		    roomName: 'videomeet',
		    width: 700,
		    height: 500,
		    parentNode: document.querySelector('#meet'),
		    userInfo: {
		        email: 'email@videomeetexamplemail.com',
		        displayName: 'Ashutosh'
		    },
			configOverwrite: {
	            /* hosts: {
	                domain: 'domain.com',
	                muc: 'conference.domain.com',
	                anonymousdomain: 'guest.domain.com',
	            },
	            bosh: '//domain.com/http-bind', */
	            startWithAudioMuted: true
	            //startWithVideoMuted: true,
	            // enableUserRolesBasedOnToken: true, - dont work in our case
	        },
		    interfaceConfigOverwrite: {
	            //TOOLBAR_ALWAYS_VISIBLE: true,
	        },
		}
		api = new JitsiMeetExternalAPI(domain, options);
	}
</script>
</head>
<body>
<div>
	<!-- <input type="text" placeholder="Name" id="txtName"/>&nbsp;
	<input type="text" placeholder="Meeting Number" id="txtMeetingNo"/>&nbsp; -->
	<input type="button" id="txtName" value="GO" onclick="callAPI()"/> <strong>&copy;&nbsp;&nbsp;&reg;&nbsp;&nbsp;&trade;</strong>
	<br><br>
	<div id="meet" style="width:100%; height:100%;"></div>
</div>
</body>
</html>