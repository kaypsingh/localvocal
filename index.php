<html itemscope itemtype="http://schema.org/Product" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/html">
  <head>
    <!--#include virtual="head.html" -->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--#include virtual="base.html" -->

    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="css/all.css?v=3992">
    <link rel="stylesheet" href="css/signin.css">
    
   <!-- question css -->
   
   <style>

   #questionChatBox.questionChatBox{
    width: 280px;
    background: #2d384a!important;
    border-radius: 12px!important;
    border: 2px solid #ffffff;
    padding-top: 10px;
    padding-bottom: 15px;
    top: auto!important;
    bottom: 70px!important;
    height: calc(100% - calc(40px + 170px));
    left:auto; right:30px;
    position:absolute;
}
#questionChatBox #chat-input{
    position: absolute;
    bottom: 5px;
    left: 0px;
    right: 0px;
}
   .open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

#questionUserChatBox.questionChatBox{
    width: 280px;    
    border: 2px solid #ffffff;
    background: #1f7ae8 !important;
	border-radius: 0px !important;
    padding-top: 10px;
    padding-bottom: 15px;
    top: auto!important;
    bottom: 70px!important;
    height: calc(100% - calc(40px + 170px));
    left:auto; right:30px;
    position:absolute;
}
#questionUserChatBox #chat-input{
    position: absolute;
    bottom: 5px;
    left: 0px;
    right: 0px;
}
   .open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}


#dvEchoTest .videoHelpClose{top:13px;}
#recordingsList{max-height:308px; overflow-y:auto; padding-left:20px;}
#enter_room{position:relative;}
#enter_room .helper-link{position: absolute;top: 29px;right: 31px;font-size: 14px;}
#dvEchoTest .popBoxInner{padding-top:15px; padding-bottom:15px;width: 350px;}  
#dvEchoTest  .popBoxHeader{padding-bottom:10px;}  
#dvEchoTest.popBox button, #dvEchoTest .btnButton{height:33px; font-size:0.900rem;}
#dvEchoTest .popBoxHeader h5{font-size:16px;}  
#recordingsList audio:before{content:''; display:table; width:300px;}
#recordingsList li{margin-bottom:10px;width: 300px;}

/*CSS ADDED TODAY*/
#questionChatBox .usermessage{width:100%; background:#3688ea; border-bottom:1px solid #116bb9; margin-bottom:0px; padding:5px; box-sizing:border-box;}
#questionChatBox .chatTitle{ font-weight:bold; color:#ffffff; left:16px; top:3px; position:absolute; font-size:16px; text-transform: capitalize;}
#questionChatBox .chatUserName{font-weight:bold; font-size:14px; display:block; width:100%; margin-bottom:5px; margin-top:2px;}
.chatQuestionDetail{font-size:13px; line-height:18px; color:#ffffff; font-weight:normal; margin-bottom:5px;}
#questionChatBox .chatQuestionTime{font-size:11px; font-weight:normal; font-style:italic; color:#ffffff; margin-bottom:10px;}

#questionUserChatBox .chatTitle{ font-weight:bold; color:#ffffff; left:16px; top:3px; position:absolute; font-size:16px; text-transform: capitalize;}
#dvWipeAccount.popBox .popBoxBody p{margin-bottom:15px;}
#dvWipeAccount .popBoxBody .textBox{margin-bottom:0px;}
#dvWipeAccount.popBox .popBoxFooter{border-top:1px solid #cfe0eb}

.popBoxBody.txtCenter{text-align:center; padding-bottom:30px; padding-top:15px;}
.popBoxBody.txtCenter h5{margin-bottom:15px;}
.popBoxBody.txtCenter button{margin-left:5px; margin-right:5px;}
#dvPoll .popBoxHeader button{position:absolute; left:auto; transform:translateX(-50%); top:22px; height:33px; font-size:0.875rem; padding-left:10px; padding-right:10px; margin-right:0px; right:10px;}
#dvPoll .padT15{padding-top:12px; padding-bottom:15px;}


#dvListParticipant td input[type="radio"]{position:relative; top:2px}
#dvListParticipant td label{display:inline-block; font-size:13px; font-weight:normal; margin-bottom:4px; width: auto; margin-right: 8px; margin-left: 4px;}
#dvListParticipantModerator td input[type="radio"]{position:relative; top:2px}
#dvListParticipantModerator td label{display:inline-block; font-size:13px; font-weight:normal; margin-bottom:4px; width: auto; margin-right: 8px; margin-left: 4px;}
</style>
<!-- question css end-->

<script src="libs/aes.js"></script>
<script>
	//var apiURL = "https://api.videomeet.in/v2/";
	var apiURL = "https://api.videomeet.in/v3/";
	var key = "2e35f242a46d67eeb74aabc37d5e5d05";
	var CryptoJSAesJson = {
		stringify: function (cipherParams) {
		var j = {ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)};
		if (cipherParams.iv) j.iv = cipherParams.iv.toString();
		if (cipherParams.salt) j.s = cipherParams.salt.toString();
			return JSON.stringify(j);
		},
		parse: function (jsonStr) {
		var j = JSON.parse(jsonStr);
		var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Base64.parse(j.ct)});
		if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv)
		if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s)
			return cipherParams;
		}
	}

	function parseForm(formdata) {
		var secret = {};
		//var formdata = $('#login_form').serializeArray();
		for(let [name, value] of formdata) {
			if(secret[`${name}`]) {
				if (!secret[`${name}`].push) {
					secret[`${name}`] = [secret[`${name}`]];
				}
				secret[`${name}`].push(`${value}` || '');
			} else {
				secret[`${name}`] = `${value}` || '';
			}
		}
		/* $.each(formdata, function () {
			if (secret[this.name]) {
				if (!secret[this.name].push) {
					secret[this.name] = [secret[this.name]];
				}
				secret[this.name].push(this.value || '');
			} else {
				secret[this.name] = this.value || '';
			}
		}); */
		var encrypted = CryptoJS.AES.encrypt(JSON.stringify(secret), key, {format: CryptoJSAesJson}).toString();
		encrypted = JSON.parse(encrypted);
		encrypted = JSON.stringify(encrypted);
		return encrypted;
	}
	
	function getFormData(param) {
		var arrParam = param.split("&");
		var formData = new FormData();
		for(var i=0; i<arrParam.length; i++) {
			formData.append(arrParam[i].split("=")[0].trim(), arrParam[i].split("=")[1].trim());
		}
		
		return "formdata="+encodeURIComponent(parseForm(formData));
		//return param;
	}
	
	function getEncFormData(param) {
		var arrParam = param.split("&");
		var formData1 = new FormData();
		for(var i=0; i<arrParam.length; i++) {
			formData1.append(arrParam[i].split("=")[0].trim(), arrParam[i].split("=")[1].trim());
		}
		
		return encodeURIComponent(parseForm(formData1));
	}
	
	function changeResponse(responseTEXT) {
		//console.log(JSON.parse(CryptoJS.AES.decrypt(responseTEXT, key, {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8)));
		return JSON.parse(CryptoJS.AES.decrypt(responseTEXT, key, {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8));
		//return eval('(' + responseTEXT + ')');
	}
</script>
<script>
		var vnowHostName="";
		var vnowHostPass="";
 		var pollStratFlag=false;
 		var allowedPollOption=5; 
 		var pollDefaultInputStart =2;
 		var prevAudioCode;
 		var saveWaitingSmsTime='';
 		window.setInterval(function(){
 			if(sessionStorage.getItem("check_user_is_moderator") == "YES") {
 				getQuestionList();
 			}
			 
		 }, 60000);
		 
        var check_conference_webinar = "0";
        var isWaitingRoomEnable = "0";
        var totalWaitingParticipantCount =0;
        var totalWaitingParticipantClosePressed =false;
        var userIsModerator =false;
        var moderatorUserName = "";
        var userRecordingSessionId = "";
        var userRecordingStarted = false;
        var userLogout =false;
       	var firstCheck = true;
       	var totalParticipantCount = 0;
       	var moderatorRecordingOn = 0;
       	var moderatorStreamingOn = 0;
       	var startMeetingFromOutside = null;
       	var historyId = 0;
       	var conferenceHistoryDetailId = 0; 
       	var listOfRoomParticipantJoined = "";
       	var meetingTopicForHistory = "";
       	var videomeetUserLoginEmail = "";
       	var isDirectlyEnterTheRoom = "0";
       	var arrPenalist = [];
       	var becomeCoHost = "0";
       	var liveStreamingSetting_show = true;
       	var recordingSetting_show = true;
       	var isRecordingStreamingOn = false;
       	var objRoomPassword = null;
       	var objRoomPasswordReq = null;
       	var setRPValue = "";
       	var objEnterInsideRoom = null;
       	
       	/* window.addEventListener('beforeunload', function (e) { 
       		e.preventDefault(); 
       		var confirmationMessage = "Please close VideoMeet Conference before closing tab / browser.";
       		e.returnValue = confirmationMessage; 
       		return confirmationMessage; 
            //if(sessionStorage.getItem("check_user_is_moderator") == "YES" && parseInt(historyId)!=0) {
	    		//updateRoomDetailsByModerator();
	    		//hideRoomHistory();
	    	//}
	    	//sessionStorage.clear();
        }); */
        
        /*  window.setInterval(function(){
        	logoutUnAuthenticatedUser();
			 
		 }, 20000);  */
    	// IE11 and earlier can be identified via their user agent and be
        // redirected to a page that is known to have no newer js syntax.
        if (window.navigator.userAgent.match(/(MSIE|Trident)/)) {
            var roomName = encodeURIComponent(window.location.pathname);
            window.location.href = "static/recommendedBrowsers.html" + "?room=" + roomName;
        }

        window.indexLoadedTime = window.performance.now();
        console.log("(TIME) index.html loaded:\t", indexLoadedTime);
        // XXX the code below listeners for errors and displays an error message
        // in the document body when any of the required files fails to load.
        // The intention is to prevent from displaying broken page.
        var criticalFiles = [
            "config.js",
            "utils.js",
            "do_external_connect.js",
            "interface_config.js",
            "logging_config.js",
            "lib-jitsi-meet.min.js",
            "app.bundle.min.js",
            "all.css?v=3992"
        ];
        var loadErrHandler = function(e) {
            var target = e.target;
            // Error on <script> and <link>(CSS)
            // <script> will have .src and <link> .href
            var fileRef = (target.src ? target.src : target.href);
            if (("SCRIPT" === target.tagName || "LINK" === target.tagName)
                && criticalFiles.some(
                    function(file) { return fileRef.indexOf(file) !== -1 })) {
                window.onload = function() {
                    // The whole complex part below implements page reloads with
                    // "exponential backoff". The retry attempt is passes as
                    // "rCounter" query parameter
                    var href = window.location.href;

                    var retryMatch = href.match(/.+(\?|&)rCounter=(\d+)/);
                    var retryCountStr = retryMatch ? retryMatch[2] : "0";
                    var retryCount = Number.parseInt(retryCountStr);

                    if (retryMatch == null) {
                        var separator = href.indexOf("?") === -1 ? "?" : "&";
                        var hashIdx = href.indexOf("#");

                        if (hashIdx === -1) {
                            href += separator + "rCounter=1";
                        } else {
                            var hashPart = href.substr(hashIdx);

                            href = href.substr(0, hashIdx)
                                + separator + "rCounter=1" + hashPart;
                        }
                    } else {
                        var separator = retryMatch[1];

                        href = href.replace(
                            /(\?|&)rCounter=(\d+)/,
                            separator + "rCounter=" + (retryCount + 1));
                    }

                    var delay = Math.pow(2, retryCount) * 2000;
                    if (isNaN(delay) || delay < 2000 || delay > 60000)
                        delay = 10000;

                    var showMoreText = "show more";
                    var showLessText = "show less";

                    document.body.innerHTML
                        = "<div style='"
                        + "position: absolute;top: 50%;left: 50%;"
                        + "text-align: center;"
                        + "font-size: medium;"
                        + "font-weight: 400;"
                        + "transform: translate(-50%, -50%)'>"
                        + "Uh oh! We couldn't fully download everything we needed :("
                        + "<br/> "
                        + "We will try again shortly. In the mean time, check for problems with your Internet connection!"
                        + "<br/><br/> "
                        + "<div id='moreInfo' style='"
                        + "display: none;'>" + "Missing " + fileRef
                        + "<br/><br/></div>"
                        + "<a id='showMore' style='"
                        + "text-decoration: underline;"
                        + "font-size:small;"
                        + "cursor: pointer'>" + showMoreText + "</a>"
                        + "&nbsp;&nbsp;&nbsp;"
                        + "<a id ='reloadLink' style='"
                        + "text-decoration: underline;"
                        + "font-size:small;"
                        + "'>reload now</a>"
                        + "</div>";

                    var reloadLink = document.getElementById('reloadLink');
                    reloadLink.setAttribute('href', href);

                    var showMoreElem = document.getElementById("showMore");
                    showMoreElem.addEventListener('click', function () {
                            var moreInfoElem
                                    = document.getElementById("moreInfo");

                            if (showMoreElem.innerHTML === showMoreText) {
                                moreInfoElem.setAttribute(
                                    "style",
                                    "display: block;"
                                    + "color:#FF991F;"
                                    + "font-size:small;"
                                    + "user-select:text;");
                                showMoreElem.innerHTML = showLessText;
                            }
                            else {
                                moreInfoElem.setAttribute(
                                    "style", "display: none;");
                                showMoreElem.innerHTML = showMoreText;
                            }
                        });

                    window.setTimeout(
                        function () { window.location.replace(href); }, delay);

                    // Call extra handler if defined.
                    if (typeof postLoadErrorHandler === "function") {
                        postLoadErrorHandler(fileRef);
                    }
                };
                window.removeEventListener(
                    'error', loadErrHandler, true /* capture phase */);
            }
        };
        window.addEventListener(
            'error', loadErrHandler, true /* capture phase type of listener */);
        
        function _scheduleMeeting() {
        	userLogout=true;
        	if(document.getElementById("hidUserName").value!="") {
				getListOfScheduleMeeting();
        	} else {
        		document.getElementById("dvAuthenticateUser").style.display = "block";
        		document.getElementById("txtUserName").focus();
        	}
        }
        
       function addConference() {
        	var username = document.getElementById("hidUserName").value;
        	var meetingTopic = (document.getElementById("txtMeetingTopic").value).trim();
        	var roomname = (document.getElementById("txtRoomName").value).trim().toLowerCase();
        	var meetingDate = (document.getElementById("txtMeetingDate").value).trim();
        	var meetingTime = (document.getElementById("txtMeetingTime").value).trim();
        	//var meetingMode = document.getElementById("inpRadConference").value;
        	var meetingMode = document.querySelector('input[name="meeting_mode"]:checked').value;
        	var roomPassword = (document.getElementById("txtRoomPassword").value).trim();
        	
        	if (document.getElementById('inpRadConference').checked) {
        		  rate_value = document.getElementById('inpRadConference').value;
        		}
        	
        	if (document.getElementById('inpRadWebinar').checked) {
        		  rate_value = document.getElementById('inpRadWebinar').value;
        		}
        
        	if(document.getElementById("inpRadSensitive").checked==true)
        		meetingMode = document.getElementById("inpRadSensitive").value;
        	
        	var waitingroom = 0;
        	if(document.getElementById("waitingroomid").checked)
        		waitingroom =1;
        	
        	
        	
        	if(meetingTopic=="") {
        		alert("Please enter meeting topic !");
        		document.getElementById("txtMeetingTopic").focus();
        		return false;
        	}
        	
        	if(roomname=="") {
        		alert("Please enter room name !");
        		document.getElementById("txtRoomName").focus();
        		return false;
        	}
        	
        	if(meetingDate=="") {
        		alert("Please enter meeting date !");
        		document.getElementById("txtMeetingDate").focus();
        		return false;
        	} else if(meetingDate.indexOf("-")==-1) {
        		alert("Invalid meeting date !");
        		document.getElementById("txtMeetingDate").focus();
        		return false;
        	}
        	
        	if(meetingTime=="") {
        		alert("Please enter meeting time !");
        		document.getElementById("txtMeetingTime").focus();
        		return false;
        	} else if(meetingTime.indexOf(":")==-1) {
        		alert("Invalid meeting time !");
        		document.getElementById("txtMeetingTime").focus();
        		return false;
        	}
        	
        	if(roomPassword == "") {
        		alert("Please enter room password !");
        		return false;
        	}
        	if(roomPassword.length<5) {
				alert("Invalid room password !");
				return false;
			}
        	
        	var conferencescheduletime = meetingDate.split("-")[2]+"-"+meetingDate.split("-")[1]+"-"+meetingDate.split("-")[0]+" "+meetingTime; 
        	var expDate = new Date(meetingDate.split("-")[2]+","+meetingDate.split("-")[1]+","+meetingDate.split("-")[0]);
        	var expDate = new Date(expDate.getTime() + (7 * 24 * 60 * 60 * 1000));
        	var expiryMonth = expDate.getMonth()+1;
        	if((expDate.getMonth()+1)<10) 
        		expiryMonth = "0"+(expDate.getMonth()+1);
        	var expiryDay = expDate.getDate()
        	if(expDate.getDate()<10)
        		expiryDay = "0"+expDate.getDate();
        	var conferenceexpirationtime = expDate.getFullYear()+"-"+expiryMonth+"-"+expiryDay+" "+meetingTime;
        	var req_origin = "web";
        	
        	
        	var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&conferencescheduletime="+conferencescheduletime+"&topic="+meetingTopic+"&roomname="+roomname+"&req_origin="+req_origin+"&conferenceexpirationtime="+conferenceexpirationtime+"&mode="+meetingMode+"&room_pass="+roomPassword+"&waitingroomenable="+waitingroom;
        	path = getEncFormData(path);
        	var formData = new FormData(document.getElementById("filecatcher"));
        	/* formData.append("authkey", "M2atKiuCGKOo9Mj3");
        	formData.append("username", username);
        	formData.append("conferencescheduletime", conferencescheduletime);
        	formData.append("topic", meetingTopic);
        	formData.append("roomname", roomname);
        	formData.append("req_origin", req_origin);
        	formData.append("conferenceexpirationtime", conferenceexpirationtime);
        	formData.append("mode", meetingMode);
        	formData.append("room_pass", roomPassword);
        	formData.append("waitingroomenable", waitingroom); */
        	formData.append("formdata", path);
        	for (var x = 0; x < document.getElementById('file-input').files.length; x++) {
        		formData.append("image[]", document.getElementById('file-input').files[x]);
        	}

        	try {
            	var myurl = apiURL + "conference.php/add";
    			//var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&conferencescheduletime="+conferencescheduletime+"&topic="+meetingTopic+"&roomname="+roomname+"&req_origin="+req_origin+"&conferenceexpirationtime="+conferenceexpirationtime+"&mode="+meetingMode+"&room_pass="+roomPassword+"&image[]="+document.getElementById('file-input').files;
    			var myRequest = new XMLHttpRequest();
    			myRequest.open("POST", myurl, false);
    			//myRequest.setRequestHeader("Content-type", "multipart/form-data");
    			//myRequest.setRequestHeader("enctype", "multipart/form-data");
    			//myRequest.setRequestHeader("Content-length", formData.length);
    			//myRequest.setRequestHeader("Connection", "close");
    			myRequest.onreadystatechange = function getHttpOutput() {	
    				if (myRequest.readyState == 4 && myRequest.status == 200) {
    					var responseTEXT =  myRequest.responseText;
    					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
    					responseTEXT = changeResponse(responseTEXT);
    					//responseTEXT = eval('(' + responseTEXT + ')');
    					if(responseTEXT.status == 1) {
    						alert("Meeting Scheduled successfully !");
    						document.getElementById("dvCreateNewMeeting").style.display = "none";
    						resetCreateNewMeeting();
    						
    						/* if(meetingMode=="1") {
    							shareScheduleMeetingDetails(username, meetingTopic, conferencescheduletime, roomname);
    						} else { */
    							openAddPenalist('out', responseTEXT.data["confrenceid"], roomname, username, meetingTopic, conferencescheduletime, meetingMode,roomPassword);
    						//}
    						/* document.getElementById("dvSetTitlePenalist").innerHTML = "<h5>Add penalist in "+roomname+"</h5>";
    						document.getElementById("spnCopyShare").innerHTML = "<button onclick=\"addPenalist('nomail',"+responseTEXT.data["confrenceid"]+")\">Add Penalist</button><button onclick=\"addPenalist('sendmail',"+responseTEXT.data["confrenceid"]+")\">Add Penalist and Send code via Email</button><button onclick=\"shareScheduleMeetingDetails('"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+roomname+"')\">Copy and Share</button>";
    						document.getElementById("txtPenalistName").focus();
    						document.getElementById("dvAddPenalist").style.display = "block"; */
    						//shareScheduleMeetingDetails(username, meetingTopic, conferencescheduletime, roomname);
    						//getListOfScheduleMeeting();
						} else {
							//alert("Some problem occurred, please try later");
							alert(responseTEXT.msg);
						}
    				}
    			};
    			myRequest.send(formData);
    		} catch(e) {
    			console.log("Error in add conference:: "+e);
    		}
        }
        
        function addConferenceNonScheduleRoom(roomname, userHostName) {
        	var meetingTopic = roomname;
        	var currentDate = new Date();
        	var meetingDate = ((currentDate.getDate()+"").length==1?"0"+currentDate.getDate():currentDate.getDate())+"-"+(((currentDate.getMonth()+1)+"").length==1?"0"+(currentDate.getMonth()+1):(currentDate.getMonth()+1))+"-"+currentDate.getFullYear();
        	var meetingTime = ((currentDate.getHours()+"").length==1?"0"+currentDate.getHours():currentDate.getHours())+":"+((currentDate.getMinutes()+"").length==1?"0"+currentDate.getMinutes():currentDate.getMinutes());
        	var meetingMode = "1";
        	var roomPassword = "";
        	var waitingroom = 0;
        	
        	var conferencescheduletime = meetingDate.split("-")[2]+"-"+meetingDate.split("-")[1]+"-"+meetingDate.split("-")[0]+" "+meetingTime; 
        	var expDate = new Date(meetingDate.split("-")[2]+","+meetingDate.split("-")[1]+","+meetingDate.split("-")[0]);
        	var expDate = new Date(expDate.getTime() + (7 * 24 * 60 * 60 * 1000));
        	var expiryMonth = expDate.getMonth()+1;
        	if((expDate.getMonth()+1)<10) 
        		expiryMonth = "0"+(expDate.getMonth()+1);
        	var expiryDay = expDate.getDate()
        	if(expDate.getDate()<10)
        		expiryDay = "0"+expDate.getDate();
        	var conferenceexpirationtime = expDate.getFullYear()+"-"+expiryMonth+"-"+expiryDay+" "+meetingTime;
        	var req_origin = "web";
        	
        	
        	var path = "authkey=M2atKiuCGKOo9Mj3&username="+userHostName+"&conferencescheduletime="+conferencescheduletime+"&topic="+meetingTopic+"&roomname="+roomname+"&req_origin="+req_origin+"&conferenceexpirationtime="+conferenceexpirationtime+"&mode="+meetingMode+"&room_pass="+roomPassword+"&waitingroomenable="+waitingroom;
        	path = getEncFormData(path);
        	var formData = new FormData(document.getElementById("filecatcher"));
        	/* formData.append("authkey", "M2atKiuCGKOo9Mj3");
        	formData.append("username", userHostName);
        	formData.append("conferencescheduletime", conferencescheduletime);
        	formData.append("topic", meetingTopic);
        	formData.append("roomname", roomname);
        	formData.append("req_origin", req_origin);
        	formData.append("conferenceexpirationtime", conferenceexpirationtime);
        	formData.append("mode", meetingMode);
        	formData.append("room_pass", roomPassword);
        	formData.append("waitingroomenable", waitingroom); */
        	formData.append("formdata", path);
        	/* for (var x = 0; x < document.getElementById('file-input').files.length; x++) {
        		formData.append("image[]", document.getElementById('file-input').files[x]);
        	} */

        	try {
            	var myurl = apiURL + "conference.php/add";
    			var myRequest = new XMLHttpRequest();
    			myRequest.open("POST", myurl, false);
    			myRequest.onreadystatechange = function getHttpOutput() {	
    				if (myRequest.readyState == 4 && myRequest.status == 200) {
    					var responseTEXT =  myRequest.responseText;
    					responseTEXT = changeResponse(responseTEXT);
    					//responseTEXT = eval('(' + responseTEXT + ')');
    					if(responseTEXT.status == 1) {
    						//alert("Meeting Scheduled successfully !");
						} else {
							//alert(responseTEXT.msg);
						}
    				}
    			};
    			myRequest.send(formData);
    		} catch(e) {
    			console.log("Error in add conference:: "+e);
    		}
        }
        
        function openAddPenalist(flag, conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode,roomPassword) {
        	getParticipantArray(conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode, roomPassword);
        	if(meetingMode==3){
				autoAddPenalist(conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode);
				document.getElementById("dvSetTitlePenalist").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleAddParticipant", {roomname: roomname})+"</h5>";
			} else {
				document.getElementById("dvSetTitlePenalist").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleAddPanelist", {roomname: roomname})+"</h5>";
        	}
			/* document.getElementById("spnCopyShare").innerHTML = "<button onclick=\"addPenalist('nomail',"+conferenceId+",'"+roomname+"')\">Add Penalist</button><button onclick=\"addPenalist('sendmail',"+conferenceId+",'"+roomname+"')\">Add Penalist and Send code via Email</button><button onclick=\"shareScheduleMeetingDetails('"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+roomname+"')\">Copy and Share</button>"; */
			if(flag=="in") {
				document.getElementById("spnCopyShare").innerHTML = "<button class=\"cancelButton\" onclick=\"hideAddPenalist();seeListOfPanelistModerator('"+roomname+"', '"+username+"');\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button><button onclick=\"addPenalist('nomail',"+conferenceId+",'"+roomname+"','"+username+"','"+meetingTopic+"','"+conferencescheduletime+"','"+meetingMode+"','"+roomPassword+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butSave")+" </button>";
			} else {
				document.getElementById("spnCopyShare").innerHTML = "<button class=\"cancelButton\" onclick=\"hideAddPenalist();getListOfScheduleMeeting();\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button><button onclick=\"addPenalist('nomail',"+conferenceId+",'"+roomname+"','"+username+"','"+meetingTopic+"','"+conferencescheduletime+"','"+meetingMode+"','"+roomPassword+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butSave")+" </button>";
			}
			document.getElementById("txtPenalistName").focus();
			document.getElementById("dvAddPenalist").style.display = "block";
			document.getElementById("dvListScheduleMeeting").style.display = "none";
        }
        
		/* function updateConference() {
			var conferencescheduletime = ""; 
			var conferenceexpirationtime = ""; 
			var roomname = "";  
			var confrenceid = "";
			try {
	        	var myurl = apiURL + "conference.php/update";
				var path = "authkey=M2atKiuCGKOo9Mj3&confrenceid="+confrenceid+"&roomname="+roomname+"&conferencescheduletime="+conferencescheduletime+"&conferenceexpirationtime="+conferenceexpirationtime;
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
						responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
							alert(responseTEXT.msg);
						} else {
							alert("Some problem occurred, please try later");
						}
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error in update conference:: "+e);
			}
        } */
        
        function hideDeteteMessage() {
        	document.getElementById("dvDeleteMessage").style.display = "none";
        }
        
        function confirmDeleteConference(conferenceId, mode, roomname) {
        	if(mode=="1")									
        		mode = APP.translation.generateTranslationHTML("userDefinedPopup.labelConference");
			else if(mode=="2")
				mode = APP.translation.generateTranslationHTML("userDefinedPopup.labelWebinar");
			else
				mode = APP.translation.generateTranslationHTML("userDefinedPopup.labelMeeting");
			
        	document.getElementById("dvDeleteMessageTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.comfirmDeleteRoomTitle", {mode: mode, roomname: roomname})+"</h5>";
        	document.getElementById("spnDeleteMessageBody").innerHTML = APP.translation.generateTranslationHTML("userDefinedPopup.messageConfirmDeleteRoom", {
        																	headingstart: "<h6>", 
        																	roomname: roomname,
        																	headingstop: "</h6>",
        																	tagbr: "<br>"
        																});
        	document.getElementById("spnDeleteMessageBut").innerHTML = "<button onclick=\"deleteConference("+conferenceId+")\">"+APP.translation.generateTranslationHTML("userDefinedPopup.yesDelete")+"</button>";
        	document.getElementById("dvDeleteMessage").style.display = "block";
        }
        
		function deleteConference(conferenceId) {
			try {
	        	var myurl = apiURL + "conference.php/delete";
				var path = "authkey=M2atKiuCGKOo9Mj3&confrenceid="+conferenceId;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
							alert("Meeting deleted successfully !");
							hideDeteteMessage();
							getListOfScheduleMeeting();
						} else {
							alert("Some problem occurred, please try later");
						}
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error in delete conference:: "+e);
			}
		}
		
		function hideAuthenticateUserDiv() {
			document.getElementById("dvAuthenticateUser").style.display = "none";
			document.getElementById("txtUserName").value = "";
			document.getElementById("txtPassword").value = "";
		}
		
		function validateUser() {
			var username = (document.getElementById("txtUserName").value).trim();
			var password = (document.getElementById("txtPassword").value).trim();
			
			if(username=="") {
				alert("Please enter username !");
				document.getElementById("txtUserName").focus();
				return false;
			}
			
			if(password=="") {
				alert("Please enter password !");
				document.getElementById("txtPassword").focus();
				return false;
			}
			
			try {
	        	var myurl = apiURL + "authentication.php/";
				var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&password="+password;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
							document.getElementById("hidUserName").value = username;
							document.getElementById("hidUserFullName").value = responseTEXT.data["name"];
							document.getElementById("hidUserEmailAddress").value = responseTEXT.data["email"];
							document.getElementById("dvLoggedInUserName").innerHTML = APP.translation.generateTranslationHTML("userDefinedPopup.welcomeUserGrretings") + " " + responseTEXT.data["name"];
							$("#spnSignup").addClass("hideElement");
							$("#spnLogout").removeClass("hideElement");
							$("#spnManage").removeClass("hideElement");
							$("#spnLogin").addClass("hideElement");
							document.getElementById("dvHostAMeeting").style.display = "none";
							hideAuthenticateUserDiv();
							getListOfScheduleMeeting();
						} else {
							alert(responseTEXT.msg);
						}
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while authenticating user:: "+e);
			}
		}
		
		function getListOfScheduleMeeting() {
			var username = document.getElementById("hidUserName").value;
			try {
	        	var myurl = apiURL + "conference.php/confrencelist";
				var path = "authkey=M2atKiuCGKOo9Mj3&username="+username;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						var tblListSchMeet = "<table class='tableBox' id='tblListScheduleMeeting' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingRoomName")+"</th>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingTopic")+"</th>";
						tblListSchMeet += "<th style='width:16%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingMode")+"</th>";
						tblListSchMeet += "<th style='width:17%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingScheduleTime")+"</th>";
						tblListSchMeet += "<th style='width:13%; text-align:center;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingPanelist")+"</th>";
						tblListSchMeet += "<th style='width:15%; text-align:center;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingAction")+"</th>";
						tblListSchMeet += "</tr>";
						if(responseTEXT.status == 1) {
							for(var i=0; i<responseTEXT.data.length; i++) {
								tblListSchMeet += "<tr>";
								if(responseTEXT.data[i]["room_pass"]!=null && responseTEXT.data[i]["room_pass"].trim()!=""){
									tblListSchMeet += "<td><img class='showpassword' height='10' width='10' style='cursor:pointer;' src='images/lock.png'/ title='"+responseTEXT.data[i]["room_pass"]+"'> <img class='enterroomdirectly' height='10' width='10' style='cursor:pointer;' src='images/cameraIconBlue.png'/ title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.clickEnterroomDirectly"))+"' onclick=\"directlyEnterTheRoom(event, '"+responseTEXT.data[i]["roomname"]+"')\"> <a href=\"javascript:viewListOfParticipant("+responseTEXT.data[i]["confrenceid"]+", '"+responseTEXT.data[i]["roomname"]+"', '"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"','"+responseTEXT.data[i]["mode"]+"','"+responseTEXT.data[i]["room_pass"]+"')\">"+responseTEXT.data[i]["roomname"]+"</a></td>";
								}else{
									tblListSchMeet += "<td><img class='enterroomdirectly' height='10' width='10' style='cursor:pointer;' src='images/cameraIconBlue.png'/ title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.clickEnterroomDirectly"))+"' onclick=\"directlyEnterTheRoom(event, '"+responseTEXT.data[i]["roomname"]+"')\"> <a href=\"javascript:viewListOfParticipant("+responseTEXT.data[i]["confrenceid"]+", '"+responseTEXT.data[i]["roomname"]+"', '"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"','"+responseTEXT.data[i]["mode"]+"','"+responseTEXT.data[i]["room_pass"]+"')\">"+responseTEXT.data[i]["roomname"]+"</a></td>";
								}
								
								tblListSchMeet += "<td>"+responseTEXT.data[i]["topic"]+"</td>";
								if(responseTEXT.data[i]["mode"]=="1")									
								tblListSchMeet += "<td>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelConference")+"</td>";
								else if(responseTEXT.data[i]["mode"]=="2")
									tblListSchMeet += "<td>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelWebinar")+"</td>";
								else{
									tblListSchMeet += "<td>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelSensitive")+"</td>";
								}	
								tblListSchMeet += "<td>"+parseDateTime(responseTEXT.data[i]["conferencescheduletime"])+"</td>"; 
								//if(responseTEXT.data[i]["mode"]=="2") {
									//tblListSchMeet += "<td><a href=\"javascript:openAddPenalist("+responseTEXT.data[i]["confrenceid"]+", '"+responseTEXT.data[i]["roomname"]+"', '"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"','"+responseTEXT.data[i]["mode"]+"','"+responseTEXT.data[i]["room_pass"]+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkPanelist")+"</a> / <a href=\"javascript:viewListOfParticipant("+responseTEXT.data[i]["confrenceid"]+", '"+responseTEXT.data[i]["roomname"]+"', '"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"','"+responseTEXT.data[i]["mode"]+"','"+responseTEXT.data[i]["room_pass"]+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkView")+"</a></td>";
									tblListSchMeet += "<td style='text-align:center;'><a href=\"javascript:openAddPenalist('out', "+responseTEXT.data[i]["confrenceid"]+", '"+responseTEXT.data[i]["roomname"]+"', '"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"','"+responseTEXT.data[i]["mode"]+"','"+responseTEXT.data[i]["room_pass"]+"')\"><img src='images/room_panelist.png' class='image-size-set' alt='' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.linkPanelist"))+"'></a> <span class='spn-pipe-position'>|</span> <a href=\"javascript:viewListOfParticipant("+responseTEXT.data[i]["confrenceid"]+", '"+responseTEXT.data[i]["roomname"]+"', '"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"','"+responseTEXT.data[i]["mode"]+"','"+responseTEXT.data[i]["room_pass"]+"')\"><img src='images/room.png' class='image-size-set' alt='' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.linkView"))+"'></a></td>";
								/* } else {
									tblListSchMeet += "<td>N/A</td>";
								} */
								//tblListSchMeet += "<td><a href=\"javascript:deleteConference("+responseTEXT.data[i]["confrenceid"]+")\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkDelete")+"</a> / <a href=\"javascript:shareScheduleMeetingDetails('"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"', '"+responseTEXT.data[i]["roomname"]+"','"+responseTEXT.data[i]["confrenceid"]+"','"+responseTEXT.data[i]["room_pass"]+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkShare")+"</a>/ <a href=\"javascript:showRoomDetails('"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"', '"+responseTEXT.data[i]["roomname"]+"','"+responseTEXT.data[i]["confrenceid"]+"','"+responseTEXT.data[i]["room_pass"]+"','"+responseTEXT.data[i]["mode"]+"','"+responseTEXT.data[i]["waitingroomenable"]+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkEdit")+"</a></td>";
								tblListSchMeet += "<td style='text-align:center;'><a href=\"javascript:confirmDeleteConference("+responseTEXT.data[i]["confrenceid"]+", '"+responseTEXT.data[i]["mode"]+"', '"+responseTEXT.data[i]["roomname"]+"')\"><img src='images/delete-room.png' class='image-size-set' alt='' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.linkDelete"))+"'></a> <span class='spn-pipe-position'>|</span> <a href=\"javascript:shareScheduleMeetingDetails('"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"', '"+responseTEXT.data[i]["roomname"]+"','"+responseTEXT.data[i]["confrenceid"]+"','"+responseTEXT.data[i]["room_pass"]+"')\"><img src='images/share_room.png' class='image-size-set' alt='' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.linkShare"))+"'></a> <span class='spn-pipe-position'>|</span> <a href=\"javascript:showRoomDetails('"+responseTEXT.data[i]["username"]+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"', '"+responseTEXT.data[i]["roomname"]+"','"+responseTEXT.data[i]["confrenceid"]+"','"+responseTEXT.data[i]["room_pass"]+"','"+responseTEXT.data[i]["mode"]+"','"+responseTEXT.data[i]["waitingroomenable"]+"')\"><img src='images/edit-room.png' class='image-size-set' alt='' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.linkEdit"))+"'></a></td>";
								tblListSchMeet += "</tr>";
							}
							tblListSchMeet += "</table>";
							document.getElementById("dvListScheduleMeetingTable").style.maxHeight  = (document.body.clientHeight-305)+"px";
							/* document.getElementById("dvListScheduleMeetingTable").innerHTML = tblListSchMeet;
							document.getElementById("dvScheduleMeetingTitle").innerHTML = "<h5>Schedule meeting for "+username+"</h5>";
							document.getElementById("dvListScheduleMeeting").style.display = "block"; */
						} else {
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<td colspan='6'>"+APP.translation.generateTranslationHTML("userDefinedPopup.noRecordFound")+"</td>";
							tblListSchMeet += "</tr>";
							tblListSchMeet += "</table>";
							//document.getElementById("dvListScheduleMeetingTable").innerHTML = tblListSchMeet;
							//createNewMeeting();
						}
						document.getElementById("dvListScheduleMeetingTable").innerHTML = tblListSchMeet;
						document.getElementById("dvScheduleMeetingTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleScheduleMeeting", {userhostname: "<a href=\"javascript:getprofile()\">"+document.getElementById("hidUserFullName").value.trim()+"</a>"})+"</h5><img src='images/logout-username.png' onclick=\"logout('dvListScheduleMeeting')\" class='shift-right' alt='' title='' style='cursor:pointer'>";
						document.getElementById("dvListScheduleMeeting").style.display = "block";
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while authenticating user:: "+e);
			}
		}
		
		function updateCoHostValue(flag, value, particiapntId, conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode, radioIdCoHost) {
			try {
				var message = "Are you sure you want to disable Co-Host ?";
				if(value=="1") {
					message = "Are you sure you want to enable Co-Host ?";
				}
				//if(confirm(message)) {
					var myurl = apiURL + "participants.php/updateparticipent";
					var path = "authkey=M2atKiuCGKOo9Mj3&participantid="+particiapntId+"&ishost="+value;
					path = getFormData(path);
					var myRequest = new XMLHttpRequest();
					myRequest.open("POST", myurl, false);
					myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					myRequest.setRequestHeader("Content-length", path.length);
					myRequest.setRequestHeader("Connection", "close");
					myRequest.onreadystatechange = function getHttpOutput() {	
						if (myRequest.readyState == 4 && myRequest.status == 200) {
							var responseTEXT =  myRequest.responseText;
							//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
							responseTEXT = changeResponse(responseTEXT);
							//responseTEXT = eval('(' + responseTEXT + ')');
							if(responseTEXT.status == 1) {
								/* if(value=="1") {
									alert("Co-Host enabled !");
								} else {
									alert("Co-Host disabled !")
								} */
								if(flag=="in") {
									seeListOfPanelistModerator(APP.conference.roomName, document.getElementById("roomHostName").value.trim());
								} else {
									viewListOfParticipant(conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode);
								}
							} else {
								alert(responseTEXT.msg);
							}
						}
					};
					myRequest.send(path);
				/* } else {
					document.getElementById(radioIdCoHost).checked = true;
				} */
			} catch(e) {
				console.log("Error while authenticating user:: "+e);
			}
		}
		
		function viewListOfParticipant(conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode) {
			var roomPassword = "";
			try {
	        	var myurl = apiURL + "participants.php/participantlist";
				var path = "authkey=M2atKiuCGKOo9Mj3&conferenceid="+conferenceId;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						var tblListSchMeet = "<table class='tableBox' id='tblListParticipant' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingName")+"</th>";
						tblListSchMeet += "<th style='width:30%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingEmail")+"</th>";
						tblListSchMeet += "<th style='width:10%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingCode")+"</th>";
						tblListSchMeet += "<th style='width:15%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingActive")+"</th>";
						tblListSchMeet += "<th style='width:15%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelCoHostStatus")+"</th>";
						tblListSchMeet += "<th style='width:5%; text-align:center;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingAction")+"</th>";
						tblListSchMeet += "</tr>";
						roomPassword = responseTEXT.room_pass == null ? "" : responseTEXT.room_pass;
						if(responseTEXT.status == 1) {
							var coHostEnable = "";
							var coHostDisable = "";
							var radioIdCoHost = "";
							var codeStatusEnable = "";
							var codeStatusDisable = "";
							var radioIdCodeStatus = "";
							for(var i=0; i<responseTEXT.data.length; i++) {
								tblListSchMeet += "<tr>";
								tblListSchMeet += "<td>"+responseTEXT.data[i]["name"]+"</td>";
								tblListSchMeet += "<td>"+responseTEXT.data[i]["email"]+"</td>";
								tblListSchMeet += "<td>"+responseTEXT.data[i]["code"]+"</td>";
								if(responseTEXT.data[i]["code_expire"]=="1") {
									codeStatusEnable = "";
									codeStatusDisable = "checked";
									radioIdCodeStatus = "radNoCodeStatus"+i;
								} else {
									codeStatusEnable = "checked";
									codeStatusDisable = "";
									radioIdCodeStatus = "radYesCodeStatus"+i;
								}
								tblListSchMeet += "<td><input style='cursor:pointer;' type='radio' id='radYesCodeStatus"+i+"' name='radCodeStatus"+i+"' "+codeStatusEnable+" onclick=\"updatePanelistCodeStatusOutside('0', '"+responseTEXT.data[i]["participantid"]+"', '"+responseTEXT.data[i]["code"]+"', "+conferenceId+", '"+roomname+"', '"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"', '"+radioIdCodeStatus+"')\"><label for='radYesCodeStatus'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelYes")+"</label><input style='cursor:pointer;' type='radio' id='radNoCodeStatus"+i+"' name='radCodeStatus"+i+"' "+codeStatusDisable+" onclick=\"updatePanelistCodeStatusOutside('1', '"+responseTEXT.data[i]["participantid"]+"', '"+responseTEXT.data[i]["code"]+"', "+conferenceId+", '"+roomname+"', '"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"', '"+radioIdCodeStatus+"')\"><label for='radNoCodeStatus'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelNo")+"</label></td>";
								if(responseTEXT.data[i]["ishost"]=="1") {
									coHostEnable = "checked";
									coHostDisable = "";
									radioIdCoHost = "radYesCoHost"+i;
								} else {
									coHostEnable = "";
									coHostDisable = "checked";
									radioIdCoHost = "radNoCoHost"+i;
								}
								tblListSchMeet += "<td><input style='cursor:pointer;' type='radio' id='radYesCoHost"+i+"' name='radCoHost"+i+"' "+coHostEnable+" onclick=\"updateCoHostValue('out', '1', '"+responseTEXT.data[i]["participantid"]+"', "+conferenceId+", '"+roomname+"', '"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"', '"+radioIdCoHost+"')\"><label for='radYesCoHost'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelYes")+"</label><input style='cursor:pointer;' type='radio' id='radNoCoHost"+i+"' name='radCoHost"+i+"' "+coHostDisable+" onclick=\"updateCoHostValue('out', '0', '"+responseTEXT.data[i]["participantid"]+"', "+conferenceId+", '"+roomname+"', '"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"', '"+radioIdCoHost+"')\"><label for='radNoCoHost'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelNo")+"</label></td>";
								//tblListSchMeet += "<td><a href=\"javascript:deletePenalist("+responseTEXT.data[i]["participantid"]+","+responseTEXT.data[i]["confrenceid"]+",'"+roomname+"')\">Delete</a> / <a href=\"javascript:sendEmailDialog('"+responseTEXT.data[i]["email"]+"','"+responseTEXT.data[i]["code"]+"',"+responseTEXT.data[i]["confrenceid"]+", '"+roomname+"')\">Send Mail</a></td>";
								//tblListSchMeet += "<td><a href=\"javascript:deletePenalist("+responseTEXT.data[i]["participantid"]+","+responseTEXT.data[i]["confrenceid"]+",'"+roomname+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkDelete")+"</a> / <a href=\"javascript:shareDetailsToPenalist('"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+roomname+"', '"+responseTEXT.data[i]["code"]+"', '"+meetingMode+"','"+roomPassword+"','"+responseTEXT.data[i]["email"]+"','"+responseTEXT.data[i]["name"]+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkCopyAndShare")+"</a></td>";
								tblListSchMeet += "<td style='text-align:center;'><a href=\"javascript:deletePenalist("+responseTEXT.data[i]["participantid"]+","+responseTEXT.data[i]["confrenceid"]+",'"+roomname+"')\"><img src='images/delete-room.png' class='image-size-set' alt='' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.linkDelete"))+"'></a> <span class='spn-pipe-position'>|</span> <a href=\"javascript:shareDetailsToPenalist('"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+roomname+"', '"+responseTEXT.data[i]["code"]+"', '"+meetingMode+"','"+roomPassword+"','"+responseTEXT.data[i]["email"]+"','"+responseTEXT.data[i]["name"]+"')\"><img src='images/share_room.png' class='image-size-set' alt='' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.linkCopyAndShare"))+"'></a></td>";
								tblListSchMeet += "</tr>";
							}
							tblListSchMeet += "</table>";
							document.getElementById("dvListParticipantTable").style.maxHeight  = (document.body.clientHeight-305)+"px";
						} else {
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<td colspan='6'>"+APP.translation.generateTranslationHTML("userDefinedPopup.noRecordFound")+"</td>";
							tblListSchMeet += "</tr>";
							tblListSchMeet += "</table>";
						}
						hideListScheduleMeeting();
						var hDate = new Date();
						var historyDate = ((hDate.getDate()+"").length<2?"0"+hDate.getDate():hDate.getDate()) + "-" + (((hDate.getMonth()+1)+"").length<2?"0"+(hDate.getMonth()+1):(hDate.getMonth()+1)) + "-" + hDate.getFullYear();
						document.getElementById("spnShowDocuments").innerHTML = "<button onclick=\"seeListOfDocuments('out','"+roomname+"', '"+username+"',"+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"','"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butDocument")+"</button><button onclick=\"seeListOfMyRecording('out','"+roomname+"', '"+username+"',"+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"','"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butMyRecording")+"</button><button onclick=\"seeListOfMyChat('out','"+roomname+"', '"+username+"',"+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"','"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butMyChat")+"</button><button onclick=\"showRoomHistoryDetails('out','"+roomname+"', '"+username+"',"+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"','"+meetingMode+"','"+historyDate+"','"+historyDate+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butHistory")+"</button>";
						if(meetingMode== 3){
							if(roomPassword!=null && roomPassword.trim()!="") {
								document.getElementById("dvListParticipantTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleListOfParticipant", {roomname: roomname})+"</h5><span style=\"float: right; position: relative; top: -25px;\"><h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetPassword")+": <span id='spnEditRoomPassword' style='cursor:pointer;' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.clickToEditPassword"))+"'><span onclick=\"editRoomPassword('spnEditRoomPassword', '"+roomname+"', '"+roomPassword+"')\">"+roomPassword+"</span></span></h5></span>";
							} else {
								document.getElementById("dvListParticipantTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleListOfParticipant", {roomname: roomname})+"</h5><span style=\"float: right; position: relative; top: -25px;\"><h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetPassword")+": <span id='spnEditRoomPassword' style='cursor:pointer;'><input type='text' style='width:60px;' class='textBox' maxlength=5 id='txtEditRoomPassword' value='' placeholder='Room Password' onkeyup=\"updateRoomPasswordOnEnterKey(event, 'spnEditRoomPassword', '"+roomname+"', '')\"><a href=\"javascript:updateRoomPassword('spnEditRoomPassword', '"+roomname+"', '')\" class='btnUpdate'><img src='images/update.png'></a></span></h5></span>";
							}
						}
						else{
							if(roomPassword!=null && roomPassword.trim()!="") {
								document.getElementById("dvListParticipantTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.listOfPanelist", {roomname: roomname})+"</h5><span style=\"float: right; position: relative; top: -25px;\"><h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetPassword")+": <span id='spnEditRoomPassword' style='cursor:pointer;' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.clickToEditPassword"))+"'><span onclick=\"editRoomPassword('spnEditRoomPassword', '"+roomname+"', '"+roomPassword+"')\">"+roomPassword+"</span></span></h5></span>";
							} else {
								document.getElementById("dvListParticipantTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.listOfPanelist", {roomname: roomname})+"</h5><span style=\"float: right; position: relative; top: -25px;\"><h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetPassword")+": <span id='spnEditRoomPassword' style='cursor:pointer;'><input type='text' style='width:60px;' class='textBox' maxlength=5 id='txtEditRoomPassword' value='' placeholder='Room Password' onkeyup=\"updateRoomPasswordOnEnterKey(event, 'spnEditRoomPassword', '"+roomname+"', '')\"><a href=\"javascript:updateRoomPassword('spnEditRoomPassword', '"+roomname+"', '')\" class='btnUpdate'><img src='images/update.png'></a></span></h5></span>";
							}	
						}
						
						document.getElementById("dvListParticipantTable").innerHTML = tblListSchMeet;
						document.getElementById("dvListParticipant").style.display = "block";
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while authenticating user:: "+e);
			}
		}
		
		function showRoomHistoryDetails(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode, fromDate, toDate) {
			try {
				var apiFromDate = fromDate.split("-")[2] + "-" + fromDate.split("-")[1] + "-" + fromDate.split("-")[0];
				var apiToDate = toDate.split("-")[2] + "-" + toDate.split("-")[1] + "-" + toDate.split("-")[0];
	        	var myurl = apiURL + "room_history.php";
				var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&fromdate="+apiFromDate+"&todate="+apiToDate;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						var file_size = 0;
						document.getElementById("txtHistoryFromDate").value = fromDate;
						document.getElementById("txtHistoryToDate").value = toDate;
						document.getElementById("spnRoomHistorySearchBut").innerHTML = "<button onclick=\"searchRoomHistory('out','"+roomname+"', '"+username+"',"+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"','"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butSearch")+"</button>";
						var tblListSchMeet = "<table class='tableBox' id='tblRoomHistoryDetails' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						/* tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingRoomName")+"</th>"; */
						tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.requestOrigin")+"</th>";
						/* tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingHostName")+"</th>"; */
						/* tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingMode")+"</th>"; */
						tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingStart")+"</th>";
						tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingTotalParticipant")+"</th>";
						tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.recordingOn")+"</th>";
						tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.streamingOn")+"</th>";
						tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingEnd")+"</th>";
						tblListSchMeet += "<th>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingDuration")+"</th>";
						tblListSchMeet += "</tr>";
						var meetingModeLabel = "";
						if(responseTEXT.status == 1) {
							var durationStartDateTime;
				        	var durationEndDateTime;
				        	var durationDate = "";
				        	var durationTime = "";
				        	var duration = 0;
							for(var i=0; i<responseTEXT.data.length; i++) {
								tblListSchMeet += "<tr>";
								/* tblListSchMeet += "<td>"+roomname+"</td>"; */
								tblListSchMeet += "<td>"+responseTEXT.data[i]["request_origin"]+"</td>";
								/* tblListSchMeet += "<td>"+responseTEXT.data[i]["name"]+"</td>"; */
								if(responseTEXT.data[i]["type"]=="1")									
									meetingModeLabel = " | "+APP.translation.generateTranslationHTML("userDefinedPopup.labelConference");
								else if(responseTEXT.data[i]["type"]=="2")
									meetingModeLabel = " | "+APP.translation.generateTranslationHTML("userDefinedPopup.labelWebinar");
								else
									meetingModeLabel = " | "+APP.translation.generateTranslationHTML("userDefinedPopup.labelSensitive");
								tblListSchMeet += "<td>"+parseDateTime(responseTEXT.data[i]["insert_dt"])+"</td>";
								tblListSchMeet += "<td><a style='color:green;' href=\""+apiURL+"participants.php/participantexceldownload?d="+responseTEXT.data[i]["link"].replace(/\n/g,'')+"\" target='_blank'>"+responseTEXT.data[i]["totalparticipant"]+"</a></td>";
								tblListSchMeet += "<td>"+(responseTEXT.data[i]["recording_on"]=="1"?"Y":"N")+"</td>";
								tblListSchMeet += "<td>"+(responseTEXT.data[i]["streaming_on"]=="1"?"Y":"N")+"</td>";
								tblListSchMeet += "<td>"+parseDateTime(responseTEXT.data[i]["end_conference"])+"</td>";
								try {
									durationDate = responseTEXT.data[i]["insert_dt"].split(" ")[0];
									durationTime = responseTEXT.data[i]["insert_dt"].split(" ")[1];
									durationStartDateTime = new Date(durationDate.split("-")[0]+","+durationDate.split("-")[1]+","+durationDate.split("-")[2]+" "+durationTime.split(":")[0]+":"+durationTime.split(":")[1]);
									durationDate = responseTEXT.data[i]["end_conference"].split(" ")[0];
									durationTime = responseTEXT.data[i]["end_conference"].split(" ")[1];
									durationEndDateTime = new Date(durationDate.split("-")[0]+","+durationDate.split("-")[1]+","+durationDate.split("-")[2]+" "+durationTime.split(":")[0]+":"+durationTime.split(":")[1]);
									duration = (durationEndDateTime.getTime()-durationStartDateTime.getTime())/1000;
									duration = duration / 60;
									duration = Math.abs(Math.round(duration));
								} catch(err) {
									duration = 0;
								}
								tblListSchMeet += "<td>"+duration+"</td>";
								tblListSchMeet += "</tr>";
							}
							tblListSchMeet += "</table>";
							document.getElementById("dvRoomHistoryDetailsTable").style.maxHeight  = (document.body.clientHeight-305)+"px";
						} else {
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<td colspan='7'>"+APP.translation.generateTranslationHTML("userDefinedPopup.noRecordFound")+"</td>";
							tblListSchMeet += "</tr>";
							tblListSchMeet += "</table>";
						}
						document.getElementById("dvRoomHistoryDetailsTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.roomHistoryTitle", {roomname: roomname})+meetingModeLabel+"</h5>";
						document.getElementById("dvRoomHistoryDetailsTable").innerHTML = tblListSchMeet;
						document.getElementById("dvRoomHistoryDetails").style.display = "block";
						if(flag=='out') {
							document.getElementById("dvListParticipant").style.display = "none";
							document.getElementById("spnRoomHistoryDetails").innerHTML = "<button class='cancelButton' onclick=\"viewListOfParticipant("+conferenceId+", '"+roomname+"', '"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"');hideRoomHistoryDetails();\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button>";
						} else {
							document.getElementById("spnRoomHistoryDetails").innerHTML = "<button class='cancelButton' onclick=\"hideRoomHistoryDetails()\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button>";
						}
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while fetching documents:: "+e);
			}
		}
		
		function searchRoomHistory(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			var fromDate = document.getElementById("txtHistoryFromDate").value;
			var toDate = document.getElementById("txtHistoryToDate").value;
			showRoomHistoryDetails(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode, fromDate, toDate);
		}
		
		function hideRoomHistoryDetails() {
			document.getElementById('dvRoomHistoryDetails').style.display='none';
		}
		
		function updatePanelistCodeStatusOutside(flagEnableDisable, participantId, penalistCode, conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode, radioIdCodeStatus) {
			var message = "Are you sure you want to enable the panelist code ?";
			if(flagEnableDisable=="1") {
				message = "Are you sure you want to disable the panelist code ?";
			}
			//if(confirm(message)) {
				var myurl = apiURL + "participants.php/participantcodeexpire";
				var path = "authkey=M2atKiuCGKOo9Mj3&expireCode="+flagEnableDisable+"&participantid="+participantId;//+"&code="+penalistCode;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
							/* if(flagEnableDisable=="1") {
								alert("Panelist code disabled successfully !");
							} else {
								alert("Panelist code enabled successfully !");
							} */
							viewListOfParticipant(conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode)
						} else {
							alert(responseTEXT.msg);
						}
					}
				};
				myRequest.send(path);
			/* } else {
				document.getElementById(radioIdCodeStatus).checked = true;
			} */
		}
		
		function editRoomPassword(spanid, roomname, roomPassword) {
			document.getElementById(spanid).innerHTML = "<input type='text' style='width:60px;' class='textBox' maxlength=5 id='txtEditRoomPassword' value='"+roomPassword+"' placeholder='Room Password' onkeyup=\"updateRoomPasswordOnEnterKey(event, '"+spanid+"', '"+roomname+"', '"+roomPassword+"')\"><a href=\"javascript:updateRoomPassword('"+spanid+"', '"+roomname+"', '"+roomPassword+"')\" class='btnUpdate'><img src='images/update.png'></a>";
			//document.getElementById(spanid).innerHTML = "<input type='text' style='width:60px;' class='textBox' maxlength=5 id='txtEditRoomPassword' value='"+roomPassword+"' placeholder='Room Password' onkeyup=\"updateRoomPasswordOnEnterKey(event, '"+spanid+"', '"+roomname+"', '"+roomPassword+"')\">";
			document.getElementById("txtEditRoomPassword").focus();
		}
		
		function updateRoomPasswordOnEnterKey(e, spanid, roomname, roomPassword) {
			if(window.event) {
				if(e.keyCode == 13) {
					updateRoomPassword(spanid, roomname, roomPassword);
				}
			} else if(e.which) {
				if(e.which == 13) {
					updateRoomPassword(spanid, roomname, roomPassword);
				}
			}
		}
		
		function updateRoomPassword(spanid, roomname, roomPassword) {
			var txtEditRoomPassword = document.getElementById("txtEditRoomPassword").value.trim();
			if(txtEditRoomPassword=="") {
				alert("Please enter room password !");
				document.getElementById("txtEditRoomPassword").focus();
				return false;
			} else if(txtEditRoomPassword.length<5) {
				alert("Invalid room password !");
				document.getElementById("txtEditRoomPassword").focus();
				return false;
			} else if(roomPassword==txtEditRoomPassword) {
				document.getElementById(spanid).innerHTML = "<span onclick=\"editRoomPassword('"+spanid+"', '"+roomname+"', '"+roomPassword+"')\">"+txtEditRoomPassword+"</span>";
				return false;
			}
			
			var myurl = apiURL + "conference.php/roompassupdate";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&room_pass="+txtEditRoomPassword;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
		    		if(responseTEXT.status == 1) {
		    			document.getElementById(spanid).innerHTML = "<span onclick=\"editRoomPassword('"+spanid+"', '"+roomname+"', '"+roomPassword+"')\">"+txtEditRoomPassword+"</span>";
		    		} else {
		    			alert(responseTEXT.msg);
		    		}
				}
			};
			myRequest.send(path);
		}
		
		function hideListParticipant() {
			document.getElementById("dvListParticipant").style.display = "none";
			getListOfScheduleMeeting();
		}
		
		function hideListScheduleMeeting() {
			document.getElementById("dvListScheduleMeeting").style.display = "none";
			/* userLogout=false; */
		}
		
		function hideEchoTest() {
			document.getElementById("dvEchoTest").style.display = "none";
		}
		
		function editRoomDetails(){
			var username = document.getElementById("hidUserName").value;
			current_time = new Date();
			hour = current_time.getHours();
			minute = current_time.getMinutes();
			var greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodEvening")+" ";
			
			if((hour>=5 && minute>=0) && (hour<=11 && minute<=59)) {
				greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodMorning")+" ";
			} else if((hour>=12 && minute>=0) && (hour<=16 && minute<=59)) {
				greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodAfternoon")+" ";
			} else {
				greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodEvening")+" ";
			}
			document.getElementById("dvSetTitle").innerHTML = "<h5>"+greetingString+document.getElementById("hidUserFullName").value.trim()+"</h5>";
			
			document.getElementById("dvListScheduleMeeting").style.display = "none";
			document.getElementById("dvCreateNewMeetingBody").style.maxHeight  = (document.body.clientHeight-315)+"px";
			document.getElementById("dvCreateNewMeeting").style.display = "block";
			document.getElementById("txtMeetingTopic").focus();
		
			
		}
		
		function createNewMeeting() {
			resetCreateUpdateMeeting();
			var username = document.getElementById("hidUserName").value;
			current_time = new Date();
			hour = current_time.getHours();
			minute = current_time.getMinutes();
			var greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodEvening")+" ";
			
			if((hour>=5 && minute>=0) && (hour<=11 && minute<=59)) {
				greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodMorning")+" ";
			} else if((hour>=12 && minute>=0) && (hour<=16 && minute<=59)) {
				greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodAfternoon")+" ";
			} else {
				greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodEvening")+" ";
			}
			document.getElementById("dvSetTitle").innerHTML = "<h5>"+greetingString+document.getElementById("hidUserFullName").value.trim()+"</h5>";
			
			document.getElementById("dvListScheduleMeeting").style.display = "none";
			document.getElementById("dvCreateNewMeetingBody").style.maxHeight  = (document.body.clientHeight-315)+"px";
			document.getElementById("dvCreateNewMeeting").style.display = "block";
			document.getElementById("txtMeetingTopic").focus();
		}
		
		function hideCreateNewMeeting() {
			document.getElementById("dvCreateNewMeeting").style.display = "none";
		}
		
		function resetCreateNewMeeting() {
      		document.getElementById("txtMeetingTopic").value = "";
      		document.getElementById("txtRoomName").value = "";
      		document.getElementById("txtMeetingDate").value = "";
       		document.getElementById("txtMeetingTime").value = "";
       		document.getElementById("butSave").disabled = true;
       		document.getElementById("spnRoomExists").style.display = "none";
       		document.getElementById("spnRoomExists").innerHTML = "";
       		document.getElementById("txtRoomPassword").value = "";
       		document.getElementById("file-input").value = "";
       		document.getElementById("file-list-display").innerHTML = "";
		}
		
		function shareScheduleMeetingDetails(username, meetingTopic, scheduleTime, roomname,confrenceId,roompass) {
			roompass = roompass==null?"":roompass;
			var copyContents = decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.inviteYou", {userhostname: document.getElementById("hidUserFullName").value.trim()}))+"<br><br>";
			copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.headingTopic"))+": "+meetingTopic+"<br>";
			copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.headingTime"))+": "+parseDateTime(scheduleTime)+"<br>";
			copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.headingHost"))+": "+document.getElementById("hidUserFullName").value.trim()+"<br><br>";
			copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.joiningDetails"))+": <br>";
			copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomName"))+": "+roomname+"<br>";
			copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomPassword"))+": "+roompass+"<br>";
			
			copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.joinVideoMeet"))+":";
			copyContents += "https:/bridge01.videomeet.in/";
			//copyContents += "https:/bridge01.videomeet.in/"+roomname;
			
			
			var shareDetail = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.inviteYou", {userhostname: document.getElementById("hidUserFullName").value.trim()})+"</h5>";
			shareDetail += "<h6><u>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingTopic")+": "+meetingTopic+"</u></h6>";
			shareDetail += "<p><strong>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingTime")+":</strong> "+parseDateTime(scheduleTime)+"<br>";
			shareDetail += "<strong>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingHost")+":</strong> "+document.getElementById("hidUserFullName").value.trim()+"</p>";
			shareDetail += "<h6><u>"+APP.translation.generateTranslationHTML("userDefinedPopup.joiningDetails")+":</u></h6>";
			shareDetail += "<p><strong>"+APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomName")+":</strong> "+roomname+"<br>";
			shareDetail += "<strong>"+APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomPassword")+":</strong> "+roompass+"</p>";
			shareDetail += "<h6><u>"+APP.translation.generateTranslationHTML("userDefinedPopup.joinVideoMeet")+":</u></h6>";
			shareDetail += "<a href='https:/bridge01.videomeet.in' class='upMove' target='_blank'>https:/bridge01.videomeet.in</a><img src='images/copy.jpg' onclick=\"copyToClipboard('"+copyContents+"')\" title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.titleClickToCopy"))+"' style='right: -545px; position: relative; top: 73px; cursor:pointer;'>";
			var shareDetailBut = " <button class='btnMail' onclick=\"shareParticipantMail('1','"+meetingTopic+"','"+parseDateTime(scheduleTime)+"','"+roomname+"','"+confrenceId+"','"+document.getElementById("hidUserFullName").value.trim()+"')\" style='cursor:pointer;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendMailWithPassword")+"</button>";
			shareDetailBut += " <button class='btnMail' onclick=\"shareParticipantMail('0','"+meetingTopic+"','"+parseDateTime(scheduleTime)+"','"+roomname+"','"+confrenceId+"','"+document.getElementById("hidUserFullName").value.trim()+"')\" style='cursor:pointer;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendMailWithoutPassword")+"</button>";
			shareDetailBut += " <button class='btnMail' onclick=\"shareParticipantMail('2','"+meetingTopic+"','"+parseDateTime(scheduleTime)+"','"+roomname+"','"+confrenceId+"','"+document.getElementById("hidUserFullName").value.trim()+"')\" style='cursor:pointer;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendPassword")+"</button>";
			document.getElementById("dvShareDetailBody").innerHTML = shareDetail;
			document.getElementById("spnSendMailToShare").innerHTML = shareDetailBut;
			hideListScheduleMeeting();
			document.getElementById("dvShareScheduleDetail").style.display = "block";
		}
		
		function shareDetailsToPenalist(username, meetingTopic, scheduleTime, roomname, code, meetingMode,roomPassword,emailAddress,participantName) {
			roomPassword = roomPassword==null?"":roomPassword;
			if(meetingMode=="3"){
				meetingMode = "Sensitive";
				var copyContents = decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.youAreInvitedSensitive"))+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.headingMeetingTopic"))+": "+meetingTopic+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.headingDate"))+": "+parseDateTime(scheduleTime)+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.headingHost"))+": "+document.getElementById("hidUserFullName").value.trim()+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.joiningDetails"))+":<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomName"))+": "+roomname+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.labelEmailID"))+": "+emailAddress+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.labelParticipantCode"))+": "+code+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.howToJoin"))+":<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.youMayUseYourLaptop"))+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.webBrowser"))+"<br>"
				copyContents += "https://bridge01.videomeet.in<br><br>";				
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.labelIphoneIpad"))+"<br>";
				copyContents += "https://apps.apple.com/us/app/videomeet-audio-video/id1346514570<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.labelAndroidPhone"))+"<br>"
				copyContents += "https://play.google.com/store/apps/details?id=com.datainfosys.videomeet&hl=en_IN<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.justEnterYourName"))+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.forHelpVisitVideoSection"))+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.youtubeChannelVideomeet"))+"<br><br>";
				copyContents += "https://www.youtube.com/channel/UCI7YMm-pBA_8TSbYY4DjZUA<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.anyProblemContactHost", {hostemailid: document.getElementById("hidUserEmailAddress").value}))+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.teamVideoMeet"))+".";
				//copyContents += "This is system generated email. Please contact host for any query you may have.";
				
				var shareDetail = "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.youAreInvitedSensitive")+"</p>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingMeetingTopic")+":</span> "+meetingTopic+"</h6>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingDate")+":</span> "+parseDateTime(scheduleTime)+"</h6>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingHost")+":</span> "+document.getElementById("hidUserFullName").value.trim()+"</h6><br>";
				shareDetail += "<h6><span class='suTitle'><u>"+APP.translation.generateTranslationHTML("userDefinedPopup.joiningDetails")+":</u></span></h6><br>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomName")+":</span> "+roomname+"</h6>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelEmailID")+":</span> "+emailAddress+"</h6>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelParticipantCode")+":</span> "+code+"</h6><br>";
				shareDetail += "<h6><span class='suTitle'><u>"+APP.translation.generateTranslationHTML("userDefinedPopup.howToJoin")+":</u></span></h6><br>";				
				shareDetail += "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.youMayUseYourLaptop")+"</p>";
				shareDetail += "<p><strong>"+APP.translation.generateTranslationHTML("userDefinedPopup.webBrowser")+"</strong><br>"
				shareDetail += "<a href='https://bridge01.videomeet.in' target='_blank'>https://bridge01.videomeet.in</a></p>";				
				shareDetail += "<p><strong>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelIphoneIpad")+"</strong><br>";
				shareDetail += "<a href='https://apps.apple.com/us/app/videomeet-audio-video/id1346514570' target='_blank'>https://apps.apple.com/us/app/videomeet-audio-video/id1346514570</a></p>";
				shareDetail += "<p><strong>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelAndroidPhone")+"</strong><br>"
				shareDetail += "<a href='https://play.google.com/store/apps/details?id=com.datainfosys.videomeet&hl=en_IN' target='_blank'>https://play.google.com/store/apps/details?id=com.datainfosys.videomeet&hl=en_IN</a></p>";
				shareDetail += "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.justEnterYourName")+"<br>";
				shareDetail += APP.translation.generateTranslationHTML("userDefinedPopup.forHelpVisitVideoSection")+"</p>";
				shareDetail += "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.youtubeChannelVideomeet")+"<br>";
				shareDetail += "<a href='https://www.youtube.com/channel/UCI7YMm-pBA_8TSbYY4DjZUA' target='_blank'>https://www.youtube.com/channel/UCI7YMm-pBA_8TSbYY4DjZUA</a><br><br>";
				shareDetail += "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.anyProblemContactHost", {hostemailid: document.getElementById("hidUserEmailAddress").value})+"</p>";
				shareDetail += "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.teamVideoMeet")+".</p>";
				
				
				var butshareDetail = " <button onclick=\"inviteMail('1','"+meetingTopic+"','"+parseDateTime(scheduleTime)+"','"+document.getElementById("hidUserFullName").value.trim()+"','"+roomname+"','"+code+"','"+roomPassword+"','"+emailAddress+"','"+participantName+"')\" style='cursor:pointer;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendMailWithPassword")+"</button>";
				butshareDetail += " <button onclick=\"inviteMail('0','"+meetingTopic+"','"+parseDateTime(scheduleTime)+"','"+document.getElementById("hidUserFullName").value.trim()+"','"+roomname+"','"+code+"','"+roomPassword+"','"+emailAddress+"','"+participantName+"')\" style='cursor:pointer;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendMailWithoutPassword")+"</button>";
				butshareDetail += " <button onclick=\"inviteMail('2','"+meetingTopic+"','"+parseDateTime(scheduleTime)+"','"+document.getElementById("hidUserFullName").value.trim()+"','"+roomname+"','"+code+"','"+roomPassword+"','"+emailAddress+"','"+participantName+"')\" style='cursor:pointer;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendPassword")+"</button>";
				butshareDetail += "<img src='images/copy.jpg' onclick=\"copyToClipboard('"+copyContents+"')\" title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.titleClickToCopy"))+"' style='cursor:pointer; position: relative; top:10px;'>";
				
				document.getElementById("dvShareToPenalistDetailBody").style.maxHeight  = (document.body.clientHeight-305)+"px";
				document.getElementById("dvShareToPenalistDetailBody").innerHTML = shareDetail;
				document.getElementById("spnSendMailShareToPanelist").innerHTML = butshareDetail;	
			}
			else{
				meetingMode = meetingMode=="1"?APP.translation.generateTranslationHTML("userDefinedPopup.labelConference"):APP.translation.generateTranslationHTML("userDefinedPopup.labelWebinar");
				var copyContents = decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.youAreInvited", {mode: meetingMode}))+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.headingMeetingTopic"))+": "+meetingTopic+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.headingDate"))+": "+parseDateTime(scheduleTime)+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.headingHost"))+": "+document.getElementById("hidUserFullName").value.trim()+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.joiningDetails"))+":<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomName"))+": "+roomname+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomPassword"))+": "+roomPassword+"<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.panelistCode"))+": "+code+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.howToJoin"))+":<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.onYourComputer"))+" :<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.labelVisit"))+":- https://bridge01.videomeet.in<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.enterYourNameAndRoomName"))+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.onYourIphoneAndroid"))+" :<br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.installAppFromPlaystore"))+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.labelIOS"))+"<br>";
				copyContents += "https://apps.apple.com/us/app/videomeet-audio-video/id1346514570<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.labelANDROID"))+"<br>";
				copyContents += "https://play.google.com/store/apps/details?id=com.datainfosys.videomeet<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.enterCodeToBecomePanelist"))+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.settingsJoinAsPanelist"))+"<br><br>";
				copyContents += decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.doNotShareDetails"));
				//copyContents += "This is system generated email. Please contact host for any query you may have.";
				
				var shareDetail = "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.youAreInvited", {mode: meetingMode})+"</p>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingMeetingTopic")+":</span> "+meetingTopic+"</h6>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingDate")+":</span> "+parseDateTime(scheduleTime)+"</h6>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingHost")+":</span> "+document.getElementById("hidUserFullName").value.trim()+"</h6><br>";
				shareDetail += "<h6><span class='suTitle'><u>"+APP.translation.generateTranslationHTML("userDefinedPopup.joiningDetails")+":</u></span></h6><br>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomName")+":</span> "+roomname+"</h6>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomPassword")+":</span> "+roomPassword+"</h6>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.panelistCode")+":</span> "+code+"</h6><br>";
				shareDetail += "<h6><span class='suTitle'><u>"+APP.translation.generateTranslationHTML("userDefinedPopup.howToJoin")+":</u></span></h6><br>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.onYourComputer")+" :</span></h6>";
				shareDetail += "<h6>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelVisit")+":-  <a href='https://bridge01.videomeet.in' target='_blank'>https://bridge01.videomeet.in</a></h6><br>";
				shareDetail += "<h6>"+APP.translation.generateTranslationHTML("userDefinedPopup.enterYourNameAndRoomName")+"</h6><br>";
				shareDetail += "<h6><span class='suTitle'>"+APP.translation.generateTranslationHTML("userDefinedPopup.onYourIphoneAndroid")+" :</span></h6>";
				shareDetail += "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.installAppFromPlaystore")+"</p>";
				shareDetail += "<h6>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelIOS")+"</h6>";
				shareDetail += "<h6><a href='https://apps.apple.com/us/app/videomeet-audio-video/id1346514570' target='_blank'>https://apps.apple.com/us/app/videomeet-audio-video/id1346514570</a></h6><br>";
				shareDetail += "<h6>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelANDROID")+"</h6>";
				shareDetail += "<h6><a href='https://play.google.com/store/apps/details?id=com.datainfosys.videomeet' target='_blank'>https://play.google.com/store/apps/details?id=com.datainfosys.videomeet</a></h6><br>";
				shareDetail += "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.enterCodeToBecomePanelist")+"</p>";
				shareDetail += "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.settingsJoinAsPanelist")+"</p>";
				shareDetail += "<p>"+APP.translation.generateTranslationHTML("userDefinedPopup.doNotShareDetails")+"</p>";
				var butshareDetail = " <button onclick=\"inviteMail('1','"+meetingTopic+"','"+parseDateTime(scheduleTime)+"','"+document.getElementById("hidUserFullName").value.trim()+"','"+roomname+"','"+code+"','"+roomPassword+"','"+emailAddress+"','"+participantName+"')\" style='cursor:pointer;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendMailWithPassword")+"</button>";
				butshareDetail += " <button onclick=\"inviteMail('0','"+meetingTopic+"','"+parseDateTime(scheduleTime)+"','"+document.getElementById("hidUserFullName").value.trim()+"','"+roomname+"','"+code+"','"+roomPassword+"','"+emailAddress+"','"+participantName+"')\" style='cursor:pointer;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendMailWithoutPassword")+"</button>";
				butshareDetail += " <button onclick=\"inviteMail('2','"+meetingTopic+"','"+parseDateTime(scheduleTime)+"','"+document.getElementById("hidUserFullName").value.trim()+"','"+roomname+"','"+code+"','"+roomPassword+"','"+emailAddress+"','"+participantName+"')\" style='cursor:pointer;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendPassword")+"</button>";
				butshareDetail += "<img src='images/copy.jpg' onclick=\"copyToClipboard('"+copyContents+"')\" title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.titleClickToCopy"))+"' style='cursor:pointer; position: relative; top:10px;'>";
				
				document.getElementById("dvShareToPenalistDetailBody").style.maxHeight  = (document.body.clientHeight-305)+"px";
				document.getElementById("dvShareToPenalistDetailBody").innerHTML = shareDetail;
				document.getElementById("spnSendMailShareToPanelist").innerHTML = butshareDetail;
			}
			
			//hideListScheduleMeeting();
			document.getElementById("dvShareToPenalist").style.display = "block";
		}
		
		function hideShareScheduleMeetingDetails() {
			document.getElementById("dvShareScheduleDetail").style.display = "none";
		}
		
		function hideShareToPenalistDetails() {
			document.getElementById("dvShareToPenalist").style.display = "none";
		}
		
		function isRoomNameExists() {
			replaceSpecialChars('txtRoomName');
			var roomname = (document.getElementById("txtRoomName").value).trim().toLowerCase();
			
			if(roomname!="" && roomname.length>=4) {
	        	var myurl = apiURL + "conferenceschedule.php";
				var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
			    			document.getElementById("spnRoomExists").innerHTML = "<span style='color:red;'>"+roomname+" is not available !</span>";
			        		document.getElementById("txtRoomName").focus();
			        		document.getElementById("butSave").disabled = true;
			    		} else {
			    			document.getElementById("spnRoomExists").innerHTML = "<span style='color:green;'>"+roomname+" is available !</span>";
			    			document.getElementById("butSave").disabled = false;
			    		}
			    		document.getElementById("spnRoomExists").style.display = "block";
					}
				};
				myRequest.send(path);
			} else {
				if(roomname=="") {
					document.getElementById("spnRoomExists").innerHTML = "<span style='color:red;'>Please enter room name !</span>";
				} else {
					document.getElementById("spnRoomExists").innerHTML = "<span style='color:red;'>Room name must be atleast 4 characters !</span>";
				}
				document.getElementById("spnRoomExists").style.display = "block";
				document.getElementById("butSave").disabled = true;
				document.getElementById("txtRoomName").focus();
				return false;
			}
		}
		
		function onPressEnterKey(e, flag) {
			if(window.event) {
				if(e.keyCode == 13) {
					if(flag=="auth") {
						validateUser();
					} else if(flag=="add") {
						addConference();
					} else if(flag=="forgot") {
						forgotPassword();
					} else if(flag=="joinroom") {
						joinMeetingWithPassword();
					} else if(flag=="becomehost") {
						becomeHost();
					} else if(flag=="joinsensitiveroom"){
						joinSensitiveMeetingWithPassword()
					} else if(flag=="verifycodehost") {
						verifyHostCode();
					} else if(flag=="verifycodepanelist") {
						verifyPenalistCode();
					}
				}
			} else if(e.which) {
				if(e.which == 13) {
					if(flag=="auth") {
						validateUser();
					} else if(flag=="add") {
						addConference();
					} else if(flag=="forgot") {
						forgotPassword();
					} else if(flag=="joinroom") {
						joinMeetingWithPassword();
					} else if(flag=="becomehost") {
						becomeHost();
					} else if(flag=="joinsensitiveroom"){
						joinSensitiveMeetingWithPassword()
					} else if(flag=="verifycodehost") {
						verifyHostCode();
					} else if(flag=="verifycodepanelist") {
						verifyPenalistCode();
					}
				}
			}
		}
		
		function copyToClipboard(text) {
			text = text.replace(/<br>/g,"\n");
			var textArea = document.createElement("textarea");
			textArea.value = text;
			  
			// Avoid scrolling to bottom
			textArea.style.top = "0";
			textArea.style.left = "0";
			textArea.style.position = "fixed";
			
			document.body.appendChild(textArea);
			textArea.focus();
			textArea.select();
			
			document.execCommand('copy');
			
			document.body.removeChild(textArea);
		}
		
		function parseDateTime(dateTime) {
			var arrDateTime = dateTime.split(" ");
			var date = arrDateTime[0].split("-")[2]+"-"+arrDateTime[0].split("-")[1]+"-"+arrDateTime[0].split("-")[0];
			var time = arrDateTime[1].split(":")[0]+":"+arrDateTime[1].split(":")[1];
			dateTime = date+" "+time;
			return dateTime;
		}
		
		function replaceSpecialChars(id) {
			var obj = document.getElementById(id);
			obj.value = obj.value.replace(/ +/g, '');
			var specialChars = "<>!#$%^&*()+[]{}?:;|'\"\\,/~`=@.-_"; //@.-_
			for(i = 0; i < specialChars.length;i++){
		        if(obj.value.indexOf(specialChars[i]) > -1){
		        	obj.value = obj.value.split(specialChars[i]).join('');
		        }
		    }
		}
		
		function replaceSpecialCharsName(id) {
			var obj = document.getElementById(id);
			obj.value = obj.value.replace(/  +/g, ' ');
			var specialChars = "<>!$%^&*+[]{}?:;|'\"\\,/~`=@._"; //-#()
			for(i = 0; i < specialChars.length;i++){
		        if(obj.value.indexOf(specialChars[i]) > -1){
		        	obj.value = obj.value.split(specialChars[i]).join('');
		        }
		    }
		}
		
		function randomString(length) {
		    //var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    var chars = '0123456789';
			var result = '';
		    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
		    return result;
		}
		
		function generatePenalistCode() {
			document.getElementById("txtPenalistCode").value = randomString(4);
		}
		
		function generateRoomPassword() {
			document.getElementById("txtRoomPassword").value = randomString(5);
		}
		
		function getParticipantArray(conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode, roomPassword) {
			var myurl = apiURL + "participants.php/participantlist";
			var path = "authkey=M2atKiuCGKOo9Mj3&conferenceid="+conferenceId;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					if(responseTEXT.status == 1) {
						var tblListSchMeet = "<table class='tableBox' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingName")+"</th>";
						tblListSchMeet += "<th style='width:25%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingEmail")+"</th>";
						tblListSchMeet += "<th style='width:10%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingCode")+"</th>";
						tblListSchMeet += "<th style='width:11%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelCoHostStatus")+"</th>";
						tblListSchMeet += "<th style='width:15%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelInvitation")+"</th>";
						tblListSchMeet += "</tr>";
						
						for(var i=0; i<responseTEXT.data.length; i++) {
							var jsonPenalist = {
								"name" : responseTEXT.data[i]["name"],
								"email" : responseTEXT.data[i]["email"],
								"code" : responseTEXT.data[i]["code"],
								"ishost" : responseTEXT.data[i]["ishost"]
							};
							arrPenalist.push(jsonPenalist);
							
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<td>"+responseTEXT.data[i]["name"]+"</td>";
							tblListSchMeet += "<td>"+responseTEXT.data[i]["email"]+"</td>";
							tblListSchMeet += "<td>"+responseTEXT.data[i]["code"]+"</td>";
							if(responseTEXT.data[i]["ishost"] == "1") {
								tblListSchMeet += "<td>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelYes")+"</td>";
							} else {
								tblListSchMeet += "<td>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelNo")+"</td>";
							}
							tblListSchMeet += "<td><a href=\"javascript:shareDetailsToPenalist('"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+roomname+"', '"+responseTEXT.data[i]["code"]+"', '"+meetingMode+"','"+roomPassword+"','"+responseTEXT.data[i]["email"]+"','"+responseTEXT.data[i]["name"]+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkCopyAndShare")+"</a></td>";
							tblListSchMeet += "</tr>";
						}
						tblListSchMeet += "</table>";
						document.getElementById("dvListAddedPenalistTable").style.maxHeight  = (document.body.clientHeight-475)+"px";
						document.getElementById("dvListAddedPenalistTable").innerHTML = tblListSchMeet;
					} else {
						arrPenalist = [];
					}
				}
			};
			myRequest.send(path);
		}
		
		function addPenalist(flag, conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode,roompassword) {
			var penalistName = (document.getElementById("txtPenalistName").value).trim();
			var penalistEmailAddress = (document.getElementById("txtPenalistEmailAddress").value).trim();
			var txtPenalistCode = (document.getElementById("txtPenalistCode").value).trim();
			var makeCoHost = "0";
			if(document.getElementById("chkCoHost").checked==true)
				makeCoHost = "1";
			
			if(penalistName == "") {
				alert("Please enter panelist name !");
				document.getElementById("txtPenalistName").focus();
				return false;
			}
			
			if(penalistEmailAddress == "") {
				alert("Please enter panelist email address !");
				document.getElementById("txtPenalistEmailAddress").focus();
				return false;
			} else if(!validateEmailAddress("txtPenalistEmailAddress")) {
				return false;
			}
			
			/* if(txtPenalistCode == "") {
				alert("Please generate penalist code !");
				return false;
			} else */ if(txtPenalistCode.length<4) {
				alert("Invalid panelist code, please generate again !");
				return false;
			}
			var ispanelist=1;
			if(meetingMode==3){
        		ispanelist= 0;
        	}
			
			var myurl = apiURL + "participants.php/add";
			var path = "authkey=M2atKiuCGKOo9Mj3&conferenceid="+conferenceId+"&name="+penalistName+"&emailid="+penalistEmailAddress+"&code="+txtPenalistCode+"&ispanelist="+ispanelist+"&ishost="+makeCoHost;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						if(meetingMode==3){
							alert("Participant added successfully !");	
						}
						else{
							alert("Panelist added successfully !");
						}
						
						resetAddPenalist();
						
						var jsonPenalist = {
							"name" : penalistName,
							"email" : penalistEmailAddress,
							"code" : txtPenalistCode,
							"ishost" : makeCoHost
						};
						arrPenalist.push(jsonPenalist);
						
						var tblListSchMeet = "<table class='tableBox' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingName")+"</th>";
						tblListSchMeet += "<th style='width:25%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingEmail")+"</th>";
						tblListSchMeet += "<th style='width:10%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingCode")+"</th>";
						tblListSchMeet += "<th style='width:11%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelCoHostStatus")+"</th>";
						tblListSchMeet += "<th style='width:15%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelInvitation")+"</th>";
						tblListSchMeet += "</tr>";
						for(var i=0; i<arrPenalist.length; i++) {
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<td>"+arrPenalist[i].name+"</td>";
							tblListSchMeet += "<td>"+arrPenalist[i].email+"</td>";
							tblListSchMeet += "<td>"+arrPenalist[i].code+"</td>";
							if(arrPenalist[i].ishost == "1") {
								tblListSchMeet += "<td>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelYes")+"</td>";
							} else {
								tblListSchMeet += "<td>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelNo")+"</td>";
							}
							tblListSchMeet += "<td><a href=\"javascript:shareDetailsToPenalist('"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+roomname+"', '"+arrPenalist[i].code+"', '"+meetingMode+"','"+roompassword+"','"+arrPenalist[i].email+"','"+arrPenalist[i].name+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkCopyAndShare")+"</a></td>";
							tblListSchMeet += "</tr>";
						}
						tblListSchMeet += "</table>";
						document.getElementById("dvListAddedPenalistTable").style.maxHeight  = (document.body.clientHeight-475)+"px";
						document.getElementById("dvListAddedPenalistTable").innerHTML = tblListSchMeet;
						
			    		if(flag == "sendmail") {
			    			hideAddPenalist();
			    			sendEmailDialog(penalistEmailAddress, txtPenalistCode, conferenceId, roomname);
			    			
			    			/* document.getElementById("spnEmailAddressPenalist").innerHTML = penalistEmailAddress;
			    			document.getElementById("spnSendEmail").innerHTML = "<button onclick=\"sendMail('"+penalistEmailAddress+"','"+txtPenalistCode+"')\">Send Email</button>";
			    			document.getElementById("txtEmailSubject").focus();
			    			document.getElementById("dvEmailPenalist").style.display = "block"; */
			    		}
			    		else{
			    			/* if(meetingMode == 3)
			    				sendParticipantMail(penalistEmailAddress, txtPenalistCode, conferenceId, roomname); */
			    		}
			    		
					} else {
						alert(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		//var arrPenalist = []; 
		function autoAddPenalist( conferenceId, roomname, username, meetingTopic, conferencescheduletime, meetingMode) {
			var penalistName = '';
			var penalistEmailAddress = '';
			var txtPenalistCode = '';
			var isAutoAddUserExist = false;
			
			var username = document.getElementById("hidUserName").value;
			var myurl = apiURL + "profile.php/getprofile";
			var path = "authkey=M2atKiuCGKOo9Mj3&username="+username;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					//alert(responseTEXT.msg);
					if(responseTEXT.status == 1) {
						penalistName=responseTEXT.data["name"];
						penalistEmailAddress=responseTEXT.data["email"];
						txtPenalistCode=responseTEXT.data["password"];
						
						for(var i=0; i<arrPenalist.length; i++) {
							//if(arrPenalist[i].email.trim().toLowerCase() == penalistEmailAddress.trim().toLowerCase() && arrPenalist[i].name == penalistName && arrPenalist[i].code == txtPenalistCode) {
							if(arrPenalist[i].email.trim().toLowerCase() == penalistEmailAddress.trim().toLowerCase()) {
								isAutoAddUserExist = true;
							}
						}
					}
					
					
				}
			};
			myRequest.send(path);
			
			if(!isAutoAddUserExist) {
				var txtPenalistCode =randomString(4);
				var ispanelist=1;
				if(meetingMode==3){
	        		ispanelist= 0;
	        	}
				var myurl = apiURL + "participants.php/add";
				var path = "authkey=M2atKiuCGKOo9Mj3&conferenceid="+conferenceId+"&name="+penalistName+"&emailid="+penalistEmailAddress+"&code="+txtPenalistCode+"&ispanelist="+ispanelist;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
							//alert("Panelist added successfully !");
							resetAddPenalist();
							
							var jsonPenalist = {
								"name" : penalistName,
								"email" : penalistEmailAddress,
								"code" : txtPenalistCode,
								"ishost" : "0"
							};
							arrPenalist.push(jsonPenalist);
							
							var tblListSchMeet = "<table class='tableBox' style='width:100%;'>";
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingName")+"</th>";
							tblListSchMeet += "<th style='width:25%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingEmail")+"</th>";
							tblListSchMeet += "<th style='width:10%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingCode")+"</th>";
							tblListSchMeet += "<th style='width:11%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelCoHostStatus")+"</th>";
							tblListSchMeet += "<th style='width:15%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelInvitation")+"</th>";
							tblListSchMeet += "</tr>";
							for(var i=0; i<arrPenalist.length; i++) {
								tblListSchMeet += "<tr>";
								tblListSchMeet += "<td>"+arrPenalist[i].name+"</td>";
								tblListSchMeet += "<td>"+arrPenalist[i].email+"</td>";
								tblListSchMeet += "<td>"+arrPenalist[i].code+"</td>";
								tblListSchMeet += "<td>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelNo")+"</td>";
								tblListSchMeet += "<td><a href=\"javascript:shareDetailsToPenalist('"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+roomname+"', '"+arrPenalist[i].code+"', '"+meetingMode+"','','"+arrPenalist[i].email+"','"+arrPenalist[i].name+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkCopyAndShare")+"</a></td>";
								tblListSchMeet += "</tr>";
							}
							tblListSchMeet += "</table>";
							document.getElementById("dvListAddedPenalistTable").style.maxHeight  = (document.body.clientHeight-475)+"px";
							document.getElementById("dvListAddedPenalistTable").innerHTML = tblListSchMeet;
							
							/* if(meetingMode==3){
								sendParticipantMail(penalistEmailAddress, txtPenalistCode, conferenceId, roomname);	
							} */
							
				    		if(flag == "sendmail") {
				    			hideAddPenalist();    		
				    			sendEmailDialog(penalistEmailAddress, txtPenalistCode, conferenceId, roomname);	
				    		
				    		}
						} else {
							alert(responseTEXT.msg);
						}
					}
				};
				myRequest.send(path);
			}
		}
		
		function sendEmailDialog(penalistEmailAddress, penalistCode, conferenceId, roomname) {
			document.getElementById("dvListParticipant").style.display = "none";
			document.getElementById("spnEmailAddressPenalist").innerHTML = penalistEmailAddress;
			document.getElementById("spnSendEmail").innerHTML = "<button onclick=\"sendMail('"+penalistEmailAddress+"','"+penalistCode+"','"+conferenceId+"','"+roomname+"')\">Send Email</button>";
			document.getElementById("txtEmailSubject").focus();
			document.getElementById("dvEmailPenalist").style.display = "block";
		}
		
		function hideAddPenalist() {
			document.getElementById("dvAddPenalist").style.display = "none";
			resetAddPenalist();
			arrPenalist = [];
			document.getElementById("dvListAddedPenalistTable").innerHTML = "";
			//getListOfScheduleMeeting();
		}
		
		function resetAddPenalist() {
			document.getElementById("txtPenalistName").value = "";
			document.getElementById("txtPenalistEmailAddress").value = "";
			document.getElementById("txtPenalistCode").value = "";
			document.getElementById("chkCoHost").checked = false;
		}
		
		function validateEmailAddress(id){
		    var emailAddress = document.getElementById(id).value.trim();
		    //var reg = /^([A-Za-z0-9-._])+\@([A-Za-z0-9-._])+.([A-Za-z]{2,4})$/;
		    var reg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		    if (reg.test(emailAddress) == false) {
		        alert('Invalid Email-Address');
		        document.getElementById(id).focus();
		        return false;
		    }
		    return true;
		}
		
		function sendParticipantMail(penalistEmailAddress, txtPenalistCode, conferenceId, roomname){
			var subject = "Sensitive Meeting Invitation ";
			var mailBody = "Dear Sir <br> Please have a look on below information for following meeting<br> Meeting Name:"+roomname +
			 "You can join with your email address:"+ penalistEmailAddress +" password: "+txtPenalistCode +"<br><br> Videomeet Team <br>" ;
			
			var myurl = apiURL + "mail.php/";
			var path = "authkey=M2atKiuCGKOo9Mj3&to="+penalistEmailAddress+"&subject="+subject+"&body="+mailBody;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					alert(responseTEXT.msg);					
				}
			};
			myRequest.send(path);
		}
		
		function sendMail(emailAddress, code, conferenceId, roomname) {
			var subject = (document.getElementById("txtEmailSubject").value).trim();
			var mailBody = (document.getElementById("txtAreaMailBody").value).trim();
			
			if(subject=="") {
				alert("Please enter mail subject !");
				document.getElementById("txtEmailSubject").focus();
				return false;
			}
			
			if(mailBody=="") {
				alert("Please enter mail content !");
				document.getElementById("txtAreaMailBody").focus();
				return false;
			}
			
			var myurl = apiURL + "mail.php/";
			var path = "authkey=M2atKiuCGKOo9Mj3&to="+emailAddress+"&subject="+subject+"&body="+mailBody;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					alert(responseTEXT.msg);
					hideSendEmail();
					if(responseTEXT.status == 1) {
						viewListOfParticipant(conferenceId, roomname);
					}
				}
			};
			myRequest.send(path);
		}
		
		function hideSendEmail() {
			document.getElementById("dvEmailPenalist").style.display = "none";
			document.getElementById("txtEmailSubject").value = "";
			document.getElementById("txtAreaMailBody").value = "";
		}
		
		function deletePenalist(participantId, conferenceId, roomname) {
			var myurl = apiURL + "participants.php/delete";
			var path = "authkey=M2atKiuCGKOo9Mj3&participantid="+participantId;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert("Panelist deleted successfully !");
						viewListOfParticipant(conferenceId, roomname);
					} else {
						alert(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function hideInCaseOfWebinar() {
			var classElement = document.getElementsByClassName("audio-preview");
			for(var i = 0; i < classElement.length; i++){
		        classElement[i].style.display = "none";
		    }
			classElement = document.getElementsByClassName("video-preview");
			for(var i = 0; i < classElement.length; i++){
		        classElement[i].style.display = "none";
		    }
			classElement = document.getElementsByClassName("toolbox-button");
			for(var i = 0; i < classElement.length; i++){
		        if(classElement[i].getAttribute("aria-label")==decodeHtml(APP.translation.generateTranslationHTML("toolbar.accessibilityLabel.shareYourScreen"))) {
		        	classElement[i].style.display = "none";
		        }
		        if(classElement[i].getAttribute("aria-label")==decodeHtml(APP.translation.generateTranslationHTML("toolbar.accessibilityLabel.tileView"))) {
		        	classElement[i].style.display = "none";
		        }
		    }
		}
		
		function hideInCaseOfConference() {
			/* var classElement = document.getElementsByClassName("audio-preview");
			for(var i = 0; i < classElement.length; i++){
		        classElement[i].style.display = "none";
		    }
			classElement = document.getElementsByClassName("video-preview");
			for(var i = 0; i < classElement.length; i++){
		        classElement[i].style.display = "none";
		    } */
			var classElement = document.getElementsByClassName("toolbox-button");
			for(var i = 0; i < classElement.length; i++){
		        if(classElement[i].getAttribute("aria-label")==decodeHtml(APP.translation.generateTranslationHTML("toolbar.accessibilityLabel.shareYourScreen"))) {
		        	classElement[i].style.display = "none";
		        }
		    }
		}
		
		function showInAnyCase() {
			var classElement = document.getElementsByClassName("audio-preview");
			for(var i = 0; i < classElement.length; i++){
		        classElement[i].style.display = "block";
		    }
			classElement = document.getElementsByClassName("video-preview");
			for(var i = 0; i < classElement.length; i++){
		        classElement[i].style.display = "block";
		    }
			classElement = document.getElementsByClassName("toolbox-button");
			for(var i = 0; i < classElement.length; i++){
		        if(classElement[i].getAttribute("aria-label")==decodeHtml(APP.translation.generateTranslationHTML("toolbar.accessibilityLabel.shareYourScreen"))) {
		        	classElement[i].style.display = "block";
		        }
		        if(classElement[i].getAttribute("aria-label")==decodeHtml(APP.translation.generateTranslationHTML("toolbar.accessibilityLabel.tileView"))) {
		        	classElement[i].style.display = "block";
		        }
		    }
		}
		
		function _checkMeetingMode(roomname) {
			var myurl = apiURL + "conference.php/checkroommode";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						isWaitingRoomEnable = responseTEXT.data["waitingroomenable"];
						if(responseTEXT.data["mode"]=="2") {
							check_conference_webinar = "2";
							document.getElementById("spnTitleOfWebinar").innerHTML = "<h3>"+responseTEXT.data["topic"]+"</h3>";
						} else if(responseTEXT.data["mode"]=="3") {
							check_conference_webinar = "3";
							document.getElementById("spnTitleOfConference").innerHTML = "<h3>"+responseTEXT.data["topic"]+"</h3>";
						} else {
							check_conference_webinar = "1";
							document.getElementById("spnTitleOfConference").innerHTML = "<h3>"+responseTEXT.data["topic"]+"</h3>";
						}
						meetingTopicForHistory = responseTEXT.data["topic"];
						setRPValue = responseTEXT.data["room_pass"];
					} else {
						check_conference_webinar = "0";
					}
					
					var classElement = document.getElementsByClassName("toolbox-button");
					for(var i = 0; i < classElement.length; i++){
				        if(classElement[i].getAttribute("aria-label")==decodeHtml(APP.translation.generateTranslationHTML("info.accessibilityLabel"))) {
				        	classElement[i].style.display = "none";
				        }
				    }
				}
			};
			myRequest.send(path);
		}
		
		function verifyPenalistCode() {
			var meetingCode = document.getElementById("txtVerifyCode").value;
			if(meetingCode=="") {
				alert("Please enter code for verification !");
				document.getElementById("txtVerifyCode").focus();
				return false;
			}
			
			var myurl = apiURL + "participants.php/verifycode";
			var path = "authkey=M2atKiuCGKOo9Mj3&code="+meetingCode;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert("Code verified successfully !");
						showInAnyCase();
						becomeCoHost = responseTEXT.data["ishost"];
						if(check_conference_webinar=="2") {
							check_conference_webinar = "2.1";
						} else {
							check_conference_webinar = "1.1";
						}
						sessionStorage.setItem("change_constraints", "YES");
					} else {
						alert("Invalid code !");
						sessionStorage.setItem("change_constraints", "NO");
					}
					hideJoinAsPenalist();
				}
			};
			myRequest.send(path);
		}
		
		function hideJoinAsPenalist() {
			document.getElementById("dvVerifyCode").style.display = "none";
			document.getElementById("txtVerifyCode").value = "";
		}
		
		function seeListOfPanelistModerator(roomname, username) {
			var roomPassword = "";
			var roomConferenceId = "";
			var roomMeetingTopic = "";
			var roomMeetingMode = "";
			var roomScheduleTime = "";
			try {
	        	var myurl = apiURL + "participants.php/participantlistroomownerbased";
				var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&ownername="+username;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						var tblListSchMeet = "<table class='tableBox' id='tblListParticipantModerator' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:17%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingName")+"</th>";
						tblListSchMeet += "<th style='width:25%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingEmail")+"</th>";
						tblListSchMeet += "<th style='width:10%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingCode")+"</th>";
						tblListSchMeet += "<th style='width:16%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingActive")+"</th>";
						tblListSchMeet += "<th style='width:16%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelCoHostStatus")+"</th>";
						tblListSchMeet += "<th style='width:10%; text-align:center;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingAction")+"</th>";
						tblListSchMeet += "</tr>";
						roomPassword = responseTEXT.room_pass == null ? "" : responseTEXT.room_pass;
						roomConferenceId = responseTEXT.confrenceid == null ? "" : responseTEXT.confrenceid;
						roomMeetingTopic = responseTEXT.topic == null ? "" : responseTEXT.topic;
						roomMeetingMode = responseTEXT.mode == null ? "" : responseTEXT.mode;
						roomScheduleTime = responseTEXT.conferencescheduletime == null ? "" : responseTEXT.conferencescheduletime;
						if(responseTEXT.status == 1) {
							var coHostDisable = "";
							var radioIdCoHost = "";
							var codeStatusEnable = "";
							var codeStatusDisable = "";
							var radioIdCodeStatus = "";
							for(var i=0; i<responseTEXT.data.length; i++) {
								tblListSchMeet += "<tr>";
								tblListSchMeet += "<td>"+responseTEXT.data[i]["name"]+"</td>";
								tblListSchMeet += "<td>"+responseTEXT.data[i]["email"]+"</td>";
								tblListSchMeet += "<td>"+responseTEXT.data[i]["code"]+"</td>";
								if(responseTEXT.data[i]["code_expire"]=="1") {
									codeStatusEnable = "";
									codeStatusDisable = "checked";
									radioIdCodeStatus = "radNoCodeStatus"+i;
								} else {
									codeStatusEnable = "checked";
									codeStatusDisable = "";
									radioIdCodeStatus = "radYesCodeStatus"+i;
								}
								tblListSchMeet += "<td><input style='cursor:pointer;' type='radio' id='radYesCodeStatus"+i+"' name='radCodeStatus"+i+"' "+codeStatusEnable+" onclick=\"updatePanelistCodeStatus('0', '"+responseTEXT.data[i]["participantid"]+"', '"+responseTEXT.data[i]["code"]+"', '"+radioIdCodeStatus+"')\"><label for='radYesCodeStatus'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelYes")+"</label><input style='cursor:pointer;' type='radio' id='radNoCodeStatus"+i+"' name='radCodeStatus"+i+"' "+codeStatusDisable+" onclick=\"updatePanelistCodeStatus('1', '"+responseTEXT.data[i]["participantid"]+"', '"+responseTEXT.data[i]["code"]+"', '"+radioIdCodeStatus+"')\"><label for='radNoCodeStatus'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelNo")+"</label></td>";
								if(responseTEXT.data[i]["ishost"]=="1") {
									coHostEnable = "checked";
									coHostDisable = "";
									radioIdCoHost = "radYesCoHost"+i;
								} else {
									coHostEnable = "";
									coHostDisable = "checked";
									radioIdCoHost = "radNoCoHost"+i;
								}
								tblListSchMeet += "<td><input style='cursor:pointer;' type='radio' id='radYesCoHost"+i+"' name='radCoHost"+i+"' "+coHostEnable+" onclick=\"updateCoHostValue('in', '1', '"+responseTEXT.data[i]["participantid"]+"', '', '', '', '', '', '', '"+radioIdCoHost+"')\"><label for='radYesCoHost'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelYes")+"</label><input style='cursor:pointer;' type='radio' id='radNoCoHost"+i+"' name='radCoHost"+i+"' "+coHostDisable+" onclick=\"updateCoHostValue('in', '0', '"+responseTEXT.data[i]["participantid"]+"', '', '', '', '', '', '', '"+radioIdCoHost+"')\"><label for='radNoCoHost'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelNo")+"</label></td>";
								//tblListSchMeet += "<td><a href=\"javascript:shareDetailsToPenalist('"+username+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"', '"+roomname+"', '"+responseTEXT.data[i]["code"]+"', '"+responseTEXT.data[i]["mode"]+"','"+roomPassword+"','"+responseTEXT.data[i]["email"]+"','"+responseTEXT.data[i]["name"]+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkCopyAndShare")+"</a></td>";
								tblListSchMeet += "<td style='text-align:center;'><a href=\"javascript:shareDetailsToPenalist('"+username+"', '"+responseTEXT.data[i]["topic"]+"', '"+responseTEXT.data[i]["conferencescheduletime"]+"', '"+roomname+"', '"+responseTEXT.data[i]["code"]+"', '"+responseTEXT.data[i]["mode"]+"','"+roomPassword+"','"+responseTEXT.data[i]["email"]+"','"+responseTEXT.data[i]["name"]+"')\"><img src='images/share_room.png' class='image-size-set' alt='' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.linkCopyAndShare"))+"'></a></td>";
								tblListSchMeet += "</tr>";
							}
							tblListSchMeet += "</table>";
							document.getElementById("dvListParticipantTableModerator").style.maxHeight  = (document.body.clientHeight-305)+"px";
						} else {
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<td colspan='6'>"+APP.translation.generateTranslationHTML("userDefinedPopup.noRecordFound")+"</td>";
							tblListSchMeet += "</tr>";
							tblListSchMeet += "</table>";
						}
						hideListScheduleMeeting();
						if(roomPassword!=null && roomPassword.trim()!="") {
							document.getElementById("dvListParticipantTitleModerator").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.listOfPanelist", {roomname: roomname})+"</h5><span style=\"float: right; position: relative; top: -25px;\"><h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetPassword")+": <span id='spnEditRoomPasswordModerator' style='cursor:pointer;' title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.clickToEditPassword"))+"'><span onclick=\"editRoomPassword('spnEditRoomPasswordModerator', '"+roomname+"', '"+roomPassword+"')\">"+roomPassword+"</span></span></h5></span>";
						} else {
							document.getElementById("dvListParticipantTitleModerator").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.listOfPanelist", {roomname: roomname})+"</h5><span style=\"float: right; position: relative; top: -25px;\"><h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetPassword")+": <span id='spnEditRoomPasswordModerator' style='cursor:pointer;'><input type='text' style='width:60px;' class='textBox' maxlength=5 id='txtEditRoomPassword' value='' placeholder='Room Password' onkeyup=\"updateRoomPasswordOnEnterKey(event, 'spnEditRoomPasswordModerator', '"+roomname+"', '')\"><a href=\"javascript:updateRoomPassword('spnEditRoomPasswordModerator', '"+roomname+"', '')\" class='btnUpdate'><img src='images/update.png'></a></span></h5></span>";
						}
						document.getElementById("spnAddPanelistBut").innerHTML = "<button onclick=\"hideListOfPanelistModerator();openAddPenalist('in', "+roomConferenceId+", '"+roomname+"', '"+username+"', '"+roomMeetingTopic+"', '"+roomScheduleTime+"', '"+roomMeetingMode+"', '"+roomPassword+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.labelAddPanelist")+"</button>";
						document.getElementById("dvListParticipantTableModerator").innerHTML = tblListSchMeet;
						document.getElementById("dvListParticipantModerator").style.display = "block";
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while authenticating user:: "+e);
			}
		}
		
		function hideListOfPanelistModerator() {
			document.getElementById("dvListParticipantModerator").style.display = "none";
		}
		
		function saveFeedback() {
			var userHostName = APP.conference.getParticipantDisplayName(APP.conference.getMyUserId());
        	var roomname = APP.conference.roomName;
			var audioStar = document.getElementById("audioStar").value;
			var videoStar = document.getElementById("videoStar").value;
			var description = (document.getElementById("txtAreaDescription").value).trim();
			var teamReach = document.getElementById("reachTeamYes").value;
			var appVersion = getBrowserDetails();
			if(document.getElementById("reachTeamNo").checked==true)
				teamReach = document.getElementById("reachTeamNo").value;
			
			if(teamReach=='1'){
				
				var userEmail = document.getElementById("userEmail").value;
				if(userEmail=="") {
					alert("Please enter mail address !");
					return false;
				}else if(!validateEmailAddress("userEmail")) {
					return false;
				}
			}
			
			document.getElementById("dvFeedback").style.display = "none";
			$("#userEmail").val("");
			$("#txtAreaDescription").val("");
			
			var myurl = apiURL + "feedback.php";
			var path = "authkey=M2atKiuCGKOo9Mj3&audio_star="+audioStar+"&video_star="+videoStar+"&reg_origin=web&description="+description+"&team_reach="+teamReach+"&app_version="+appVersion+"&room_name="+roomname+"&owner_name="+userHostName+"&feedback_email="+userEmail;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					/* if(responseTEXT.status == 1) {
						
					} */
					skipAndCloseFeedback();
				}
			};
			myRequest.send(path);
		}
		
		function skipAndCloseFeedback() {
			//APP.API.dispose();
			eraseCookie("userLoggedRoomName");
			userLogout =true;
			sessionStorage.removeItem("userLoginBypass");	
			//need to save recording if it not saved by user
			
			/* if(userRecordingStarted  ){
				if(!(userRecordingSessionId == null || userRecordingSessionId === ''))
					recordingFileMove(userRecordingSessionId);
			} */
			deleteAllParticipantList();
			APP.conference.hangup(!1);
		}
		
		function setStar(selectedStarCount, id) {
			var tempId = id;
			for(var i=1; i<=5; i++) {
				tempId = id+i;
				if(i<=selectedStarCount) 
					document.getElementById(tempId).src = "images/star.png";
				else 
					document.getElementById(tempId).src = "images/star-not-active.png";
			}
			
			document.getElementById(id).value = selectedStarCount;
		}
		
		function getBrowserDetails() { 
			var browserDetail = 'unknown';
			if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 ) {
				browserDetail = 'Opera';
		    } else if(navigator.userAgent.indexOf("Chrome") != -1) {
		    	browserDetail = 'Chrome';
		    } else if(navigator.userAgent.indexOf("Safari") != -1) {
		    	browserDetail = 'Safari';
		    } else if(navigator.userAgent.indexOf("Firefox") != -1) {
		    	browserDetail = 'Firefox';
		    } else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) {//IF IE > 10
		    	browserDetail = 'IE'; 
		    } else {
		    	browserDetail = 'unknown';
		    }
			
			return browserDetail;
		}
		
		function closeWebinarHelpBox() {
			document.getElementById("webinarHelpBox").style.display = "none";
		}
		
		function showWebinarHelpBox() {
			document.getElementById("webinarHelpBox").style.display = "block";
		}
		
		function closeConferenceHelpBox() {
			document.getElementById("conferenceHelpBox").style.display = "none";
		}
		
		function showConferenceHelpBox() {
			document.getElementById("conferenceHelpBox").style.display = "block";
		}
		
		function forgotPassword() {
			var txtUserName = (document.getElementById("txtUserName1").value).trim();
			
			if(txtUserName=="") {
				alert("Please enter username !");
				document.getElementById("txtUserName1").focus();
				return false;
			}
			
			var myurl = apiURL + "forgotpassword.php";
			var path = "authkey=M2atKiuCGKOo9Mj3&username="+txtUserName;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert("Your password has been sent on registered mobile number or email address !");
					} else {
						alert("Invalid username !");
					}
				}
			};
			myRequest.send(path);
		}
		
		function showForgotPasswordDiv() {
			document.getElementById("dvAuthenticateUser").style.display = "none";
			document.getElementById("dvForgotPassword").style.display = "block";
			document.getElementById("txtUserName1").value = "";
			document.getElementById("txtUserName1").focus();
		}
		
		function hideForgotPasswordDiv() {
			document.getElementById("dvForgotPassword").style.display = "none";
		}
		
		function updatePanelistCodeStatus(flagEnableDisable, participantId, penalistCode, radioIdCodeStatus) {
			var message = "Are you sure you want to enable the panelist code ?";
			if(flagEnableDisable=="1") {
				message = "Are you sure you want to disable the panelist code ?";
			}
			//if(confirm(message)) {
				var myurl = apiURL + "participants.php/participantcodeexpire";
				var path = "authkey=M2atKiuCGKOo9Mj3&expireCode="+flagEnableDisable+"&participantid="+participantId;//+"&code="+penalistCode;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
							/* if(flagEnableDisable=="1") {
								alert("Panelist code disabled successfully !");
							} else {
								alert("Panelist code enabled successfully !");
							} */
							seeListOfPanelistModerator(APP.conference.roomName, document.getElementById("roomHostName").value.trim());
						} else {
							alert(responseTEXT.msg);
						}
					}
				};
				myRequest.send(path);
			/* } else {
				document.getElementById(radioIdCodeStatus).checked = true;
			} */
		}
		
		var objSubmit;
		var checkStatusRoomEverySec;
		var checkWaitingParticipantEverySec;
		function directlyEnterTheRoom(e, roomName) {
			hideListScheduleMeeting();
			var setUserDisplayName = document.getElementById("hidUserFullName").value.trim();
			document.getElementById("user_display_name").value = setUserDisplayName;
			document.getElementById("enter_room_field").value = roomName;
			startMeetingFromOutside.state.room = roomName;
			//startMeetingFromOutside._onFormSubmit(e);
			
			var myurl = apiURL + "conferenceschedule.php";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomName;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1 && (responseTEXT.data["mode"]=="2" || responseTEXT.data["mode"]=="1" || responseTEXT.data["mode"]=="3")) {
						sessionStorage.setItem("userLoginBypass", "YES");
						isDirectlyEnterTheRoom = "1";
						if(responseTEXT.data["waitingroomenable"] == '1')
							addWaitingUsersInDbByPass(startMeetingFromOutside);
						else{
							APP.conference.changeLocalDisplayName(setUserDisplayName);
							startMeetingFromOutside._roomInputRef && !startMeetingFromOutside._roomInputRef.reportValidity() || startMeetingFromOutside._onJoin()
						}
					}
				}
			};
			myRequest.send(path);
		}
		
		function askRoomPassword(obj, meetingMode, hostDisplayName, userHostName) {
			var vRoomName = document.getElementById("enter_room_field").value.trim().toLowerCase();
			objSubmit = obj;
			if(meetingMode=="1") {
				meetingMode = APP.translation.generateTranslationHTML("userDefinedPopup.labelConference");
			} else if(meetingMode=="2") {
				meetingMode = APP.translation.generateTranslationHTML("userDefinedPopup.labelWebinar");
			}else {
				meetingMode = "Sensitive";
			}
			if(typeof hostDisplayName=="undefined") {
				hostDisplayName = userHostName;
			}
			document.getElementById("room_password").value = "";
			
			if(meetingMode=="Sensitive"){
				document.getElementById("dvRoomSensitivePassword").style.display = "block";
				document.getElementById("dvRoomSensitivePasswordTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.welcomeToMeeting")+"<br><br> "+APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomIsHostedBy", {roomname: vRoomName, userhostname: hostDisplayName})+".<br><br>"+APP.translation.generateTranslationHTML("userDefinedPopup.pleaseEnterDetails")+"</h5>";
				document.getElementById("room_email_sensitive").focus();
			}else{
				document.getElementById("dvRoomPassword").style.display = "block";
				document.getElementById("dvRoomPasswordTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleRoomPassword", {mode: meetingMode})+"<br><br> "+APP.translation.generateTranslationHTML("userDefinedPopup.meetingRoomIsHostedBy", {roomname: vRoomName, userhostname: hostDisplayName})+".<br><br>"+APP.translation.generateTranslationHTML("userDefinedPopup.youAreHostWishToJoin")+"</h5>";
				document.getElementById("room_password").focus();
			}
			
		}
		
		function joinMeetingWithPassword() {
			var roomPassword = document.getElementById("room_password").value.trim();
            if(roomPassword=="") {
            	alert("Please enter room password !");
            	document.getElementById("room_password").value = "";
            	return false;
            }
            
          /*   if(roomEmail=="") {
            	alert("Please enter room email !");
            	document.getElementById("room_email").value = "";
            	return false;
            } */
            var setUserDisplayName = document.getElementById("user_display_name").value.trim();
            var vRoomName = document.getElementById("enter_room_field").value.trim().toLowerCase();
            objSubmit._onFormSubmitContinue(setUserDisplayName, vRoomName, roomPassword);
		}
		
		function joinSensitiveMeetingWithPassword() {
			var roomPassword = document.getElementById("room_password_sensitive").value.trim();
			var roomEmail = document.getElementById("room_email_sensitive").value.trim();
            if(roomPassword=="") {
            	alert("Please enter room password !");
            	document.getElementById("room_password").value = "";
            	return false;
            }
            
            if(roomEmail=="") {
            	alert("Please enter room email !");
            	document.getElementById("room_email").value = "";
            	return false;
            }
            var setUserDisplayName = document.getElementById("user_display_name").value.trim();
            var vRoomName = document.getElementById("enter_room_field").value.trim().toLowerCase();
            objSubmit._onFormSubmitSensitiveContinue(setUserDisplayName, vRoomName, roomPassword,roomEmail);
		}
		
		
		function hideRoomPassword() {
			document.getElementById("dvRoomPassword").style.display = "none";
			document.getElementById("dvRoomSensitivePassword").style.display = "none";
		}
		
		function getBrowser() { 
		     if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 ) 
			    return "Opera";
		    else if(navigator.userAgent.indexOf("Chrome") != -1 )
		    	return "Chrome";
		    else if(navigator.userAgent.indexOf("Safari") != -1)
		    	return "Safari";
		    else if(navigator.userAgent.indexOf("Firefox") != -1 )
		    	return "Firefox";
		    else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) 
		    	return "IE";  
		    else 
			    return "WEB"
		}
		
		function addWaitingUsersInDb(obj) {
			objSubmit = obj;
			var roomname = document.getElementById("enter_room_field").value.trim().toLowerCase();
			var displayName = document.getElementById("user_display_name").value.trim();
			var source = getBrowser();
			var myurl = apiURL + "conference_waiting.php/add";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&username="+displayName+"&source="+source;
			path = getFormData(path);
			
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					
					hideRoomPassword();
					document.getElementById("spnShowDisplayName").innerHTML = document.getElementById("user_display_name").value.trim();
					document.getElementById("spnShowRoomName").innerHTML = APP.translation.generateTranslationHTML("userDefinedPopup.titleWaitingRoom", {roomname: roomname.trim()});
					document.getElementById("dvWaitingMessage").style.display = "block";
					document.getElementById("txtBecomeHost").focus();
					document.getElementById("txtBecomeHostWaitingID").value = responseTEXT.data["waiting_id"];
					/* if(responseTEXT.data["HostPresence"]=='1'){
						document.getElementById("hostp").style.display = "none";
						document.getElementById("hostq").style.display = "none";
					} */
					checkStatusRoomEverySec = setInterval(function(){ checkRoomStatus(responseTEXT.data["waiting_id"])}, 5000);
					document.getElementById("dvAudioContainer").innerHTML = "<audio controls autoplay id='audio1'><source src='horse.ogg' type='audio/ogg'><source src='sounds/sample.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><div id='dvAudio2' style='display:none;'><audio controls loop controlsList='nodownload' id='audio2'><source src='horse.ogg' type='audio/ogg'><source src='sounds/sample1.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><span id='dvMusicBy'>Music by Aditya Prakash</span></div>";
					var audio = document.getElementById("audio1");
					var audio2 = document.getElementById("audio2");
					audio.addEventListener("ended", function() {
					   audio2.play();
					   document.getElementById("dvAudio2").style.display = "block";
					});
				}
			};
			myRequest.send(path);
		}
		
		function addWaitingUsersInDbByPass(obj) {
			objSubmit = obj;
			var roomname = document.getElementById("enter_room_field").value.trim().toLowerCase();
			var displayName = document.getElementById("user_display_name").value.trim();
			var source = getBrowser();
			var myurl = apiURL + "conference_waiting.php/add";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&username="+displayName+"&source="+source;
			path = getFormData(path);
			
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					objSubmit._enterTheRoom();					
				}
			};
			myRequest.send(path);
		}
		
		function becomeHost() {
			var txtBecomeHost = document.getElementById("txtBecomeHost").value.trim();
			var roomname = document.getElementById("enter_room_field").value.trim().toLowerCase();
			var waiting_id = document.getElementById("txtBecomeHostWaitingID").value.trim();
			if(txtBecomeHost=="") {
				alert("Please enter host username !");
				document.getElementById("txtBecomeHost").focus();
				return false;
			}
			
			var myurl = apiURL + "conference_waiting.php/checkmoderator";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&username="+txtBecomeHost+"&waiting_id="+waiting_id;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						objSubmit._enterTheRoom();
					} else {
						alert("Invalid username to become host of "+roomname);
						document.getElementById("txtBecomeHost").value = "";
						document.getElementById("txtBecomeHost").focus();
					}
				}
			};
			myRequest.send(path);
		}
		function deleteAllParticipantList() {			
			if(!userIsModerator)
				return false;
			
			var roomname = APP.conference.roomName;			
			var myurl = apiURL + "conference_waiting.php/deletewaitingparticipant";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
			path = getFormData(path);
			
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			/* myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;			
					responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
					
					}
				}
			}; */
			myRequest.send(path);
		}
		function checkRoomStatus(waitingId) {
			var myurl = apiURL + "conference_waiting.php/getstatus";
			var path = "authkey=M2atKiuCGKOo9Mj3&waiting_id="+waitingId;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						if(responseTEXT.data=="1") {
							clearIntervalRoomStatus();
							/* document.getElementById("hostp").style.display = "none";
							document.getElementById("hostq").style.display = "none"; */
							document.getElementById("spnShowStatus").innerHTML = "<span style='color:green !important;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.entryAllowed")+"</span>";
							document.getElementById("spnWaitingBut").innerHTML = "<button onclick=\"allowedParticipant()\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butProceedToJoinMeeting")+"</button>";
							setTimeout(function(){ allowedParticipant() }, 5000);
							document.getElementById("dvAudio2").style.display = "none";
						} else if(responseTEXT.data=="2") {
							clearIntervalRoomStatus();
							/* document.getElementById("hostp").style.display = "none";
							document.getElementById("hostq").style.display = "none"; */
							document.getElementById("spnShowStatus").innerHTML = "<span style='color:red !important;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.entryDenied")+"</span>";
					        document.getElementById("spnWaitingBut").innerHTML = "<button class='cancelButton' onclick=\"cancelWaiting()\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button>";
						}
						
						if(responseTEXT.message!=null)
						document.getElementById("spnShowMessage").innerHTML = "<span style='color:green !important;'>"+responseTEXT.message+"</span>";
						
						if(responseTEXT.audio_code!=prevAudioCode){
							
							if(responseTEXT.audio_code=='1'){
								document.getElementById("dvAudioContainer").innerHTML = "<audio controls autoplay id='audio1'><source src='horse.ogg' type='audio/ogg'><source src='sounds/5minwaiting.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><div id='dvAudio2' style='display:none;'><audio controls loop controlsList='nodownload' id='audio2'><source src='horse.ogg' type='audio/ogg'><source src='sounds/sample1.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><span id='dvMusicBy'>Music by Aditya Prakash</span></div>";
							}else if(responseTEXT.audio_code=='2'){
								document.getElementById("dvAudioContainer").innerHTML = "<audio controls autoplay id='audio1'><source src='horse.ogg' type='audio/ogg'><source src='sounds/10minwaiting.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><div id='dvAudio2' style='display:none;'><audio controls loop controlsList='nodownload' id='audio2'><source src='horse.ogg' type='audio/ogg'><source src='sounds/sample1.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><span id='dvMusicBy'>Music by Aditya Prakash</span></div>";
							}else if(responseTEXT.audio_code=='3'){
								document.getElementById("dvAudioContainer").innerHTML = "<audio controls autoplay id='audio1'><source src='horse.ogg' type='audio/ogg'><source src='sounds/meetingstartsoon.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><div id='dvAudio2' style='display:none;'><audio controls loop controlsList='nodownload' id='audio2'><source src='horse.ogg' type='audio/ogg'><source src='sounds/sample1.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><span id='dvMusicBy'>Music by Aditya Prakash</span></div>";
							}else if(responseTEXT.audio_code=='4'){
								document.getElementById("dvAudioContainer").innerHTML = "<audio controls autoplay id='audio1'><source src='horse.ogg' type='audio/ogg'><source src='sounds/meetingcancelled.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><div id='dvAudio2' style='display:none;'><audio controls loop controlsList='nodownload' id='audio2'><source src='horse.ogg' type='audio/ogg'><source src='sounds/sample1.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><span id='dvMusicBy'>Music by Aditya Prakash</span></div>";
							}else if(responseTEXT.audio_code=='5'){
								document.getElementById("dvAudioContainer").innerHTML = "<audio controls autoplay id='audio1'><source src='horse.ogg' type='audio/ogg'><source src='sounds/meetingreschedule.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><div id='dvAudio2' style='display:none;'><audio controls loop controlsList='nodownload' id='audio2'><source src='horse.ogg' type='audio/ogg'><source src='sounds/sample1.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><span id='dvMusicBy'>Music by Aditya Prakash</span></div>";
							}else if(responseTEXT.audio_code=='6'){
								document.getElementById("dvAudioContainer").innerHTML = "<audio controls autoplay id='audio1'><source src='horse.ogg' type='audio/ogg'><source src='sounds/microphonmuted.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><div id='dvAudio2' style='display:none;'><audio controls loop controlsList='nodownload' id='audio2'><source src='horse.ogg' type='audio/ogg'><source src='sounds/sample1.mp3' type='audio/mpeg'>Your browser does not support the audio element.</audio><span id='dvMusicBy'>Music by Aditya Prakash</span></div>";
							}
							
							var audio = document.getElementById("audio1");
							var audio2 = document.getElementById("audio2");
							audio.addEventListener("ended", function() {
							   audio2.play();
							   document.getElementById("dvAudio2").style.display = "block";
							});
						}
						prevAudioCode=responseTEXT.audio_code;
						
					}
				}
			};
			myRequest.send(path);
		}
		
		function cancelWaiting() {
			document.getElementById('dvWaitingMessage').style.display='none';
			var waiting_id = document.getElementById("txtBecomeHostWaitingID").value.trim();
			var myurl = apiURL + "conference_waiting.php/deletewaitingparticipantbyid";
			var path = "authkey=M2atKiuCGKOo9Mj3&waiting_id="+waiting_id;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					/* if(responseTEXT.status == 1) {
						
					} */
				}
			};
			myRequest.send(path);
		}
		
		function allowedParticipant() {
			objSubmit._enterTheRoom();
		}
		
		function clearIntervalRoomStatus() {
			clearInterval(checkStatusRoomEverySec); 
		}
		
		function clearIntervalWaitingParticipant() {
			clearInterval(checkWaitingParticipantEverySec); 
		}
		
		function getWaitingParticipantListModerator() {
			try {
	        	var myurl = apiURL + "conference_waiting.php/waitingparticipant";
				var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+APP.conference.roomName;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						var file_size = 0;
						var count = 0;
						var tblListSchMeet = "<table class='tableBox' id='tblWaitListOfParticipant' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:30%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingName")+"</th>";
						tblListSchMeet += "<th style='width:15%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingSource")+"</th>";
						tblListSchMeet += "<th style='width:15%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingLastSeen")+"</th>";
						tblListSchMeet += "<th style='width:15%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingWaitingSince")+"</th>";
						tblListSchMeet += "<th style='width:20%; text-align:center;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingAction")+"</th>";
						tblListSchMeet += "</tr>";
						if(responseTEXT.status == 1) {
							var conference_participant_wait_status_id_list = "";
							var currentDate;
				        	var waitingSinceDateTime;
				        	var waitingSince = "";
				        	var waitingSinceDate = "";
				        	var waitingSinceTime = "";
							for(var i=0; i<responseTEXT.data.length; i++) {
								if(responseTEXT.data[i]["wait_status"]=="0" && responseTEXT.data[i]["ishost"]=="0") {
									count++;
									try {
										currentDate = new Date();
										waitingSinceDate = responseTEXT.data[i]["insert_dt"].split(" ")[0];
										waitingSinceTime = responseTEXT.data[i]["insert_dt"].split(" ")[1];
										waitingSinceDateTime = new Date(waitingSinceDate.split("-")[0]+","+waitingSinceDate.split("-")[1]+","+waitingSinceDate.split("-")[2]+" "+waitingSinceTime.split(":")[0]+":"+waitingSinceTime.split(":")[1]);
										waitingSince = (currentDate.getTime()-waitingSinceDateTime.getTime())/1000;
										waitingSince = waitingSince / 60;
										waitingSince = Math.abs(Math.round(waitingSince)) + " minutes";
									} catch(err) {
										waitingSince = "0 min";
									}
									tblListSchMeet += "<tr>";
									tblListSchMeet += "<td>"+responseTEXT.data[i]["username"]+"</td>";
									tblListSchMeet += "<td>"+responseTEXT.data[i]["source"]+"</td>";
									tblListSchMeet += "<td>"+parseDateTime(responseTEXT.data[i]["last_seen"]).split(" ")[1]+"</td>";
									tblListSchMeet += "<td>"+waitingSince+"</td>";
									tblListSchMeet += "<td style='text-align:center;'><a href=\"javascript:updateWaitStatus('"+responseTEXT.data[i]["conference_participant_wait_status_id"]+"', '1')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkAllow")+"</a> / <a href=\"javascript:updateWaitStatus('"+responseTEXT.data[i]["conference_participant_wait_status_id"]+"', '2')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkDeny")+"</a></td>";
									tblListSchMeet += "</tr>";
									if(conference_participant_wait_status_id_list == "") {
										conference_participant_wait_status_id_list = responseTEXT.data[i]["conference_participant_wait_status_id"]
									} else {
										conference_participant_wait_status_id_list += "," + responseTEXT.data[i]["conference_participant_wait_status_id"]
									}
								}
							}
							document.getElementById("dvWaitListOfParticipantTable").style.maxHeight  = (document.body.clientHeight-305)+"px";
							document.getElementById("dvWaitListOfParticipantTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleWaitingParticipant", {roomname: APP.conference.roomName})+"</h5>";
							document.getElementById("spnWaitListOfParticipant").innerHTML = "<button onclick=\"updateWaitStatus('"+conference_participant_wait_status_id_list+"', '1')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butApproveAll")+"</button><button onclick=\"updateWaitStatus('"+conference_participant_wait_status_id_list+"', '2')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butDenyAll")+"</button><button onclick=\"showWaitMsg()\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butSendMessage")+"</button>";
							
							if(totalWaitingParticipantClosePressed){
								tblListSchMeet += "</table>";
								document.getElementById("dvWaitListOfParticipantTable").innerHTML = tblListSchMeet;
								if( count>totalWaitingParticipantCount  )
									document.getElementById("dvWaitListOfParticipant").style.display = "block";																	
							}
							else{
								if( count>0) {
									tblListSchMeet += "</table>";
									document.getElementById("dvWaitListOfParticipantTable").innerHTML = tblListSchMeet;
									document.getElementById("dvWaitListOfParticipant").style.display = "block";
								} else if(! totalWaitingParticipantClosePressed){
									//totalWaitingParticipantClosePressed =true;
									//document.getElementById("dvWaitListOfParticipant").style.display = "none";
									
									tblListSchMeet += "<tr>";
									tblListSchMeet += "<td colspan='5'>"+APP.translation.generateTranslationHTML("userDefinedPopup.noParticipantsInWaiting")+"</td>";
									tblListSchMeet += "</tr>";
									tblListSchMeet += "</table>";
									document.getElementById("dvWaitListOfParticipantTable").innerHTML = tblListSchMeet;
									document.getElementById("dvWaitListOfParticipant").style.display = "block";
								}
																		
							}
							totalWaitingParticipantCount =count;
							//totalWaitingParticipantClosePressed =false;
						} else {
							/* tblListSchMeet += "<tr>";
							tblListSchMeet += "<td colspan='3'>No panelist are waiting.</td>";
							tblListSchMeet += "</tr>";
							tblListSchMeet += "</table>"; */
						}
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while get Participant list:: "+e);
			}
		}
		
		function updateWaitStatus(waitingId, waitStatus) {
			var myurl = apiURL + "conference_waiting.php/updatewaitstatus";
			var path = "authkey=M2atKiuCGKOo9Mj3&waiting_id="+waitingId+"&wait_status="+waitStatus;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						totalWaitingParticipantCount =totalWaitingParticipantCount-1;
						if(waitStatus == 2)
						 	alert("Entry Denied Succesfully");
						else if(waitStatus == 1)
							alert("Entry Allowed Succesfully");
					}
					else {
						alert(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function hideWaitListOfParticipant() {
			document.getElementById("dvWaitListOfParticipant").style.display = "none";
			totalWaitingParticipantClosePressed =true;
		}
		
		function seeListOfDocuments(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			try {
	        	var myurl = apiURL + "conference.php/filelist";
				var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&ownername="+username;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						var file_size = 0;
						var tblListSchMeet = "<table class='tableBox' id='tblListOfDocuments' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:35%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingFileName")+"</th>";
						tblListSchMeet += "<th style='width:15%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingFileSize")+"</th>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingDate")+"</th>";
						tblListSchMeet += "<th style='width:18%; text-align:center;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingAction")+"</th>";
						tblListSchMeet += "</tr>";
						if(responseTEXT.status == 1) {
							for(var i=0; i<responseTEXT.data.length; i++) {
								//roomPassword = responseTEXT.data[i]["room_pass"];
								tblListSchMeet += "<tr>";
								tblListSchMeet += "<td><a style='color:green;' href=\""+apiURL+"conference.php/download?d="+responseTEXT.data[i]["link"].replace(/\n/g,'')+"\" target='_blank'>"+responseTEXT.data[i]["file_name"]+"</a></td>";
								try {
									file_size = parseInt(responseTEXT.data[i]["file_size"]);
									file_size = file_size/1024;
									if(file_size<1) {
										file_size = "1 KB";
									} else if((file_size/1024)>1) { 
										file_size = file_size/1024;
										file_size = parseInt(file_size) + " MB";
									} else {
										file_size = parseInt(file_size) + " KB";
									}
								} catch(err) {
									console.log("Error while calculating file size : "+err);
								}
								tblListSchMeet += "<td>"+file_size+"</td>";
								tblListSchMeet += "<td>"+parseDateTime(responseTEXT.data[i]["upload_date"])+"</td>";
								tblListSchMeet += "<td style='text-align:center;'><span id='spnFileId"+responseTEXT.data[i]["conference_file_id"]+"'><img src='images/copy.jpg' onclick=\"copyLinkContents('spnFileId"+responseTEXT.data[i]["conference_file_id"]+"', '"+apiURL+"conference.php/download?d="+responseTEXT.data[i]["link"].replace(/\n/g,'')+"')\" title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.titleClickToCopyFileDownload"))+"' style='width: 12px; cursor:pointer;'></span> <span style='position: relative; top: -3px;'>|</span> <img src='images/delete.png' onclick=\"deleteDocument('"+responseTEXT.data[i]["file_name"]+"', '"+responseTEXT.data[i]["link"].replace(/\n/g,'')+"', '"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\" title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.titleDeleteFile"))+"' style='width: 12px; cursor:pointer;'></td>"; 
								tblListSchMeet += "</tr>";
							}
							tblListSchMeet += "</table>";
							document.getElementById("dvListOfDocumentsTable").style.maxHeight  = (document.body.clientHeight-305)+"px";
						} else {
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<td colspan='4'>"+APP.translation.generateTranslationHTML("userDefinedPopup.noAvailableDocuments")+"</td>";
							tblListSchMeet += "</tr>";
							tblListSchMeet += "</table>";
						}
						document.getElementById("dvListOfDocumentsTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleListDocument", {roomname: roomname})+"</h5><span class='linkAddDocument'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelUpload")+" <a href=\"javascript:showAddDocuments('"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butDocument")+"</a> | <a href=\"javascript:showAddDocumentLogo('"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkLogo")+"</a> | <a href=\"javascript:showBackgroundImage('"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkBackground")+"</a></span>";
						document.getElementById("dvListOfDocumentsTable").innerHTML = tblListSchMeet;
						document.getElementById("dvListOfDocuments").style.display = "block";
						if(flag=='out') {
							document.getElementById("dvListParticipant").style.display = "none";
							document.getElementById("spnHideDocuments").innerHTML = "<button class='cancelButton' onclick=\"viewListOfParticipant("+conferenceId+", '"+roomname+"', '"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"');hideListOfDocuments();\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button>";
						} else {
							document.getElementById("spnHideDocuments").innerHTML = "<button class='cancelButton' onclick=\"hideListOfDocuments()\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button>";
						}
						getDocumentLogo('out', roomname);
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while fetching documents:: "+e);
			}
		}
		
		function showBackgroundImage(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			var displayButAdd = "display:inline;";
			var displayButUpdate = "display:none;";
			var displayButDelete = "display:none;";
			getBackgroundImage(flag, roomname);
			document.getElementById("dvListOfDocuments").style.display = "none";
			document.getElementById("dvBackgroundImageTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleAddBgImage", {roomname: roomname})+"</h5>";
			if(document.getElementById("hidBgFileName").value!="") {
				displayButAdd = "display:none;";
				displayButUpdate = "display:inline;";
				displayButDelete = "display:inline;";
			}
			document.getElementById("spnBackgroundImageBut").innerHTML = "<button class='cancelButton' onclick=\"hideBackgroundImage();seeListOfDocuments('"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"');\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button><button id='butBGAdd' style='"+displayButAdd+"' onclick=\"addBackgroundImage('"+flag+"', 'NO', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butAdd")+"</button><button id='butBGUpdate' style='"+displayButUpdate+"' onclick=\"addBackgroundImage('"+flag+"', 'YES', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butUpdate")+"</button><button id='butBGDelete' style='"+displayButDelete+"' onclick=\"deleteBackgroundImage('"+flag+"', '"+roomname+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkDelete")+"</button>";
			document.getElementById('dvBackgroundImage').style.display='block';
		}
		
		function hideBackgroundImage() {
			document.getElementById('dvBackgroundImage').style.display='none';
			resetBackgroundImage();
		}
		
		function resetBackgroundImage() {
			document.getElementById('addfile-input-image').value = "";
       		document.getElementById("file-list-display-image").innerHTML = "";
		}
		
		function addBackgroundImage(flag, flagUpdate, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			if(document.getElementById('addfile-input-image').files.length==0) {
        		alert("Please upload background image !");
        		return false;
        	}
        	
        	var filename = document.getElementById('addfile-input-image').files[0].name;
        	var filesize = document.getElementById('addfile-input-image').files[0].size;
        	
        	var fileExt = filename.substring(filename.lastIndexOf(".")+1,filename.length);
        	fileExt = fileExt.toLowerCase();
        	
        	if(fileExt!="jpg" && fileExt!="jpeg" && fileExt!="png" && fileExt!="gif") {
        		alert("Only jpg, jpeg, png, gif file extensions are allowed !");
        		return false;
        	}
        	
        	if((filesize/1024) > 1536) {
        		alert("Background image not more than 1.5 MB size !");
        		return false;
        	}
        	
        	var formData = new FormData(document.getElementById("filecatcherBackgroundImage"));
        	formData.append("roomname", roomname);
        	formData.append("username", username);
        	formData.append("image", document.getElementById('addfile-input-image').files[0]);
        	
        	var filename = document.getElementById('addfile-input-image').files[0].name;
        	var filesize = document.getElementById('addfile-input-image').files[0].size;

           	var myurl = "fileupload1.php";
   			var myRequest = new XMLHttpRequest();
   			myRequest.open("POST", myurl, false);
   			myRequest.onreadystatechange = function getHttpOutput() {	
   				if (myRequest.readyState == 4 && myRequest.status == 200) {
   					var responseTEXT =  myRequest.responseText;
   					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
   					responseTEXT = eval('(' + responseTEXT + ')');
   					if(responseTEXT.status == 1) {
   						if(flagUpdate=="YES") {
   							updateBackgroundImage(roomname, username, filename, filesize, document.getElementById("hidBgFileName").value, document.getElementById("hidBgFilePath").value);  
   						} else {
   							saveBackgroundImage(roomname, username, filename, filesize);
   						}
   						resetBackgroundImage();
   						getBackgroundImage(flag, roomname);
   						//hideBackgroundImage();
   						//seeListOfDocuments(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode);
					} else {
						alert(responseTEXT.msg);
					}
   				}
   			};
   			myRequest.send(formData);
		}
		
		function saveBackgroundImage(roomname, username, filename, filesize) {
			var myurl = apiURL + "conference.php/add_bg_logo";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&filepath=images/"+roomname+"/&file_name="+filename+"&file_size="+filesize;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						//alert("Background image uploaded successfully !");
					} else {
						alert(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function updateBackgroundImage(roomname, username, filename, filesize, oldfilename, oldfilePath) {
			var myurl = apiURL + "conference.php/update_bg_logo";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&filepath=images/"+roomname+"/&file_name="+filename+"&file_size="+filesize;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						//alert("Background image uploaded successfully !");
						deleteFile(oldfilename, oldfilePath);
					} else {
						alert(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function getBackgroundImage(flag, roomname) {
			var myurl = apiURL + "conference.php/getbglogo";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						if(flag=="in") {
							$("#largeVideoContainer").css("background", "url('"+responseTEXT.data["file_path"]+responseTEXT.data["file_name"]+"') no-repeat center center")
							$("#largeVideoContainer").css("background-size", "100% 100%");
						}
						document.getElementById("imgBackgroundImage").src = responseTEXT.data["file_path"]+responseTEXT.data["file_name"];
						document.getElementById("imgBackgroundImage").style.display = "block";
						document.getElementById("hidBgFileName").value = responseTEXT.data["file_name"];
						document.getElementById("hidBgFilePath").value = responseTEXT.data["file_path"];
						if(document.getElementById("butBGAdd"))
							document.getElementById("butBGAdd").style.display = "none";
						if(document.getElementById("butBGUpdate"))
							document.getElementById("butBGUpdate").style.display = "inline";
						if(document.getElementById("butBGDelete"))
							document.getElementById("butBGDelete").style.display = "inline";
					} else {
						document.getElementById("imgBackgroundImage").src = "";
						document.getElementById("imgBackgroundImage").style.display = "none";
						document.getElementById("hidBgFileName").value = "";
						document.getElementById("hidBgFilePath").value = "";
						if(document.getElementById("butBGAdd")) 
							document.getElementById("butBGAdd").style.display = "inline";
						if(document.getElementById("butBGUpdate"))
							document.getElementById("butBGUpdate").style.display = "none";
						if(document.getElementById("butBGDelete"))
							document.getElementById("butBGDelete").style.display = "none";
					}
				}
			};
			myRequest.send(path);
		}
		
		function deleteBackgroundImage(flag, roomname) {
			var oldFileName = document.getElementById("hidBgFileName").value;
			var oldFilePath = document.getElementById("hidBgFilePath").value;
			var myurl = apiURL + "conference.php/deletebglogo";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						deleteFile(oldFileName, oldFilePath);
						if(flag=="in") {
							$("#largeVideoContainer").css("background", interfaceConfig.DEFAULT_BACKGROUND);
						}
						
						document.getElementById("imgBackgroundImage").src = "";
						document.getElementById("imgBackgroundImage").style.display = "none";
						document.getElementById("hidBgFileName").value = "";
						document.getElementById("hidBgFilePath").value = "";
						document.getElementById("butBGAdd").style.display = "inline";
						document.getElementById("butBGUpdate").style.display = "none";
						document.getElementById("butBGDelete").style.display = "none";
						resetBackgroundImage();
					}
				}
			};
			myRequest.send(path);
		}
		
		function deleteFile(filename, filepath) {
			var myurl = "filedelete.php";
           	var path = "filepath="+filepath+filename;
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = eval('(' + responseTEXT + ')');
					/* if(responseTEXT.status == 1) {
						
					} else {
						alert(responseTEXT.msg);
					} */
				}
			}; 
			myRequest.send(path);
		}
		
		function hideListOfDocuments() {
			document.getElementById('dvListOfDocuments').style.display='none';
		}
		
		function showAddDocuments(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			document.getElementById("dvListOfDocuments").style.display = "none";
			document.getElementById("dvSetDocumentTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleAddDocument", {roomname: roomname})+"</h5>";
			document.getElementById("spnAddDocumentBut").innerHTML = "<button class='cancelButton' onclick=\"hideAddDocuments();seeListOfDocuments('"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"');\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button><button onclick=\"addDocuments('"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butAdd")+"</button>";
			document.getElementById('dvAddDocument').style.display='block';
		}
		
		function hideAddDocuments() {
			document.getElementById('dvAddDocument').style.display='none';
			document.getElementById('addfile-input').value = "";
       		document.getElementById("file-list-display1").innerHTML = "";
		}
		
		function addDocuments(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
        	if(document.getElementById('addfile-input').files.length==0) {
        		alert("Please upload atleast one file !");
        		return false;
        	}
        	
        	var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
        	path = getEncFormData(path);
        	
        	var formData = new FormData(document.getElementById("filecatcher1"));
        	/* formData.append("authkey", "M2atKiuCGKOo9Mj3");
        	formData.append("roomname", roomname); */
        	formData.append("formdata", path);
        	for (var x = 0; x < document.getElementById('addfile-input').files.length; x++) {
        		formData.append("image[]", document.getElementById('addfile-input').files[x]);
        	}

        	try {
            	var myurl = apiURL + "conference.php/fileupload";
    			var myRequest = new XMLHttpRequest();
    			myRequest.open("POST", myurl, false);
    			myRequest.onreadystatechange = function getHttpOutput() {	
    				if (myRequest.readyState == 4 && myRequest.status == 200) {
    					var responseTEXT =  myRequest.responseText;
    					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
    					responseTEXT = changeResponse(responseTEXT);
    					//responseTEXT = eval('(' + responseTEXT + ')');
    					if(responseTEXT.status == 1) {
    						alert("File(s) uploaded successfully !");
    						hideAddDocuments();
    						seeListOfDocuments(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode);
						} else {
							alert(responseTEXT.msg);
						}
    				}
    			};
    			myRequest.send(formData);
    		} catch(e) {
    			console.log("Error in add file:: "+e);
    		}
		}
		
		function deleteDocument(fileName, d, flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			if(confirm("Are you sure you want to delete file '"+fileName+"' ?")) {
				var myurl = apiURL + "conference.php/deletefile";
				var path = "fileinfo="+d;
				//path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
							alert("file deleted successfully !");
							seeListOfDocuments(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode)
						} else {
							alert(responseTEXT.msg);
						}
					}
				};
				myRequest.send(path);
			}
		}
		
		function showAddDocumentLogo(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			var displayButAdd = "display:inline;";
			var displayButUpdate = "display:none;";
			var displayButDelete = "display:none;";
			getDocumentLogo(flag, roomname);
			document.getElementById("dvListOfDocuments").style.display = "none";
			document.getElementById("dvSetDocumentLogoTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleAddLogo", {roomname: roomname})+"</h5>";
			if(document.getElementById("hidLogoFileName").value!="") {
				displayButAdd = "display:none;";
				displayButUpdate = "display:inline;";
				displayButDelete = "display:inline;";
			}
			document.getElementById("spnAddDocumentLogoBut").innerHTML = "<button class='cancelButton' onclick=\"hideAddDocumentLogo();seeListOfDocuments('"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"');\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button><button id='butLogoAdd' style='"+displayButAdd+"' onclick=\"addDocumentLogo('"+flag+"', 'NO', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butAdd")+"</button><button id='butLogoUpdate' style='"+displayButUpdate+"' onclick=\"addDocumentLogo('"+flag+"', 'YES', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butUpdate")+"</button><button id='butLogoDelete' style='"+displayButDelete+"' onclick=\"deleteDocumentLogo('"+flag+"', '"+roomname+"')\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkDelete")+"</button>";
			document.getElementById('dvAddDocumentLogo').style.display='block';
		}
		
		function hideAddDocumentLogo() {
			document.getElementById('dvAddDocumentLogo').style.display='none';
			resetDocumentLogo();
		}
		
		function resetDocumentLogo() {
			document.getElementById('addfile-input-logo').value = "";
       		document.getElementById("file-list-display-logo").innerHTML = "";
		}
		
		function addDocumentLogo(flag, flagUpdate, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
        	if(document.getElementById('addfile-input-logo').files.length==0) {
        		alert("Please upload logo image !");
        		return false;
        	}
        	
        	var filename = document.getElementById('addfile-input-logo').files[0].name;
        	var filesize = document.getElementById('addfile-input-logo').files[0].size;
        	
        	var fileExt = filename.substring(filename.lastIndexOf(".")+1,filename.length);
        	fileExt = fileExt.toLowerCase();
        	
        	if(fileExt!="jpg" && fileExt!="jpeg" && fileExt!="png") {
        		alert("Only jpg, jpeg, png file extension are allowed !");
        		return false;
        	}
        	
        	if((filesize/1024) > 100) {
        		alert("Logo image not more than 100 KB size !");
        		return false;
        	}
        	
        	var formData = new FormData(document.getElementById("filecatcherLogo"));
        	formData.append("roomname", roomname);
        	formData.append("username", username);
        	formData.append("image", document.getElementById('addfile-input-logo').files[0]);
        	
        	var filename = document.getElementById('addfile-input-logo').files[0].name;
        	var filesize = document.getElementById('addfile-input-logo').files[0].size;

           	var myurl = "fileupload.php";
   			var myRequest = new XMLHttpRequest();
   			myRequest.open("POST", myurl, false);
   			myRequest.onreadystatechange = function getHttpOutput() {	
   				if (myRequest.readyState == 4 && myRequest.status == 200) {
   					var responseTEXT =  myRequest.responseText;
   					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
   					responseTEXT = eval('(' + responseTEXT + ')');
   					if(responseTEXT.status == 1) {
   						if(flagUpdate=="YES") {
   							updateDocumentLogo(roomname, username, filename, filesize, document.getElementById("hidLogoFileName").value, document.getElementById("hidLogoFilePath").value);  
   						} else {
   							saveDocumentLogo(roomname, username, filename, filesize);
   						}
   						resetDocumentLogo();
   						getDocumentLogo(flag, roomname);
   						//hideAddDocumentLogo();
   						//seeListOfDocuments(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode);
					} else {
						alert(responseTEXT.msg);
					}
   				}
   			};
   			myRequest.send(formData);
		}
		
		function saveDocumentLogo(roomname, username, filename, filesize) {
			var myurl = apiURL + "conference.php/addlogo";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&filepath=images/"+roomname+"/&file_name="+filename+"&file_size="+filesize;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						//alert("Logo uploaded successfully !");
					} else {
						alert(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function updateDocumentLogo(roomname, username, filename, filesize, oldfilename, oldfilePath) {
			var myurl = apiURL + "conference.php/updatelogo";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&filepath=images/"+roomname+"/&file_name="+filename+"&file_size="+filesize;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						//alert("Background image uploaded successfully !");
						deleteFile(oldfilename, oldfilePath);
					} else {
						alert(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function getDocumentLogo(flag, roomname) {
			var myurl = apiURL + "conference.php/getlogo";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						//document.getElementById("imgLogo").src = "images/logosoft.jpg";
						/* if(flag=="out") {
							document.getElementById("spnShowImgLogo").innerHTML = "<label style='font-size:15px; font-weight:bold;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.linkLogo")+":</label> <img src='"+responseTEXT.data["file_path"]+responseTEXT.data["file_name"]+"'>";
						} else {
							document.getElementById("imgLogo").style.backgroundImage = "url('"+responseTEXT.data["file_path"]+responseTEXT.data["file_name"]+"')";
						} */
						if(flag=="in") {
							document.getElementById("imgLogo").style.backgroundImage = "url('"+responseTEXT.data["file_path"]+responseTEXT.data["file_name"]+"')";
						}
						document.getElementById("imgDocumentLogo").src = responseTEXT.data["file_path"]+responseTEXT.data["file_name"];
						document.getElementById("imgDocumentLogo").style.display = "block";
						document.getElementById("hidLogoFileName").value = responseTEXT.data["file_name"];
						document.getElementById("hidLogoFilePath").value = responseTEXT.data["file_path"];
						if(document.getElementById("butLogoAdd"))
							document.getElementById("butLogoAdd").style.display = "none";
						if(document.getElementById("butLogoUpdate"))
							document.getElementById("butLogoUpdate").style.display = "inline";
						if(document.getElementById("butLogoDelete"))
							document.getElementById("butLogoDelete").style.display = "inline";
					} else {
						/* if(flag=="out") {
							document.getElementById("spnShowImgLogo").innerHTML = "";
						} */
						document.getElementById("imgDocumentLogo").src = "";
						document.getElementById("imgDocumentLogo").style.display = "none";
						document.getElementById("hidLogoFileName").value = "";
						document.getElementById("hidLogoFilePath").value = "";
						if(document.getElementById("butLogoAdd")) 
							document.getElementById("butLogoAdd").style.display = "inline";
						if(document.getElementById("butLogoUpdate"))
							document.getElementById("butLogoUpdate").style.display = "none";
						if(document.getElementById("butLogoDelete"))
							document.getElementById("butLogoDelete").style.display = "none";
					}
				}
			};
			myRequest.send(path);
		}
		
		function deleteDocumentLogo(flag, roomname) {
			var oldFileName = document.getElementById("hidLogoFileName").value;
			var oldFilePath = document.getElementById("hidLogoFilePath").value;
			var myurl = apiURL + "conference.php/deletelogo";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						deleteFile(oldFileName, oldFilePath);
						if(flag=="in") {
							document.getElementById("imgLogo").style.backgroundImage = "url('images/logo.png')";
						}
						
						document.getElementById("imgDocumentLogo").src = "";
						document.getElementById("imgDocumentLogo").style.display = "none";
						document.getElementById("hidLogoFileName").value = "";
						document.getElementById("hidLogoFilePath").value = "";
						document.getElementById("butLogoAdd").style.display = "inline";
						document.getElementById("butLogoUpdate").style.display = "none";
						document.getElementById("butLogoDelete").style.display = "none";
						resetDocumentLogo();
					}
				}
			};
			myRequest.send(path);
		}
		
		function copyLinkContents(id, link) {
			copyToClipboard(link);
			document.getElementById(id).innerHTML = "<span style='color:green; font-weight:bold;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.labelCopied")+"<span>";
			setTimeout(function(){ document.getElementById(id).innerHTML = "<img src='images/copy.jpg' onclick=\"copyLinkContents('"+id+"', '"+link+"')\" title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.titleClickToCopyFileDownload"))+"' style='width: 12px; cursor:pointer;'>" }, 3000);
		}
		
		function showHidePassword(flag) {
			if(flag=='show') {
				document.getElementById("spnEyeView").innerHTML = "<img onclick=\"showHidePassword('hide')\" src='images/not-eye.png' alt='Not View'>";
				document.getElementById("room_password").type = "text";
			} else {
				document.getElementById("spnEyeView").innerHTML = "<img onclick=\"showHidePassword('show')\" src='images/eye.png' alt='View'>";
				document.getElementById("room_password").type = "password";
			}
		}
		
		function showHidePasswordSensitive(flag) {
			if(flag=='show') {
				document.getElementById("spnEyeViewSensitive").innerHTML = "<img onclick=\"showHidePassword('hide')\" src='images/not-eye.png' alt='Not View'>";
				document.getElementById("room_password_sensitive").type = "text";
			} else {
				document.getElementById("spnEyeViewSensitive").innerHTML = "<img onclick=\"showHidePassword('show')\" src='images/eye.png' alt='View'>";
				document.getElementById("room_password_sensitive").type = "password";
			}
		}
		
		function showInputHidePassword(flag, id, spanId) {
			if(flag=='show') {
				document.getElementById(spanId).innerHTML = "<img onclick=\"showInputHidePassword('hide', '"+id+"', '"+spanId+"')\" src='images/not-eye.png' alt='Not View'>";
				document.getElementById(id).type = "text";
			} else {
				document.getElementById(spanId).innerHTML = "<img onclick=\"showInputHidePassword('show', '"+id+"', '"+spanId+"')\" src='images/eye.png' alt='View'>";
				document.getElementById(id).type = "password";
			}
		}
		
		function recordingFileMove(sessionid) {
			var roomHostName = document.getElementById("roomHostName").value.trim();
			var roomname = APP.conference.roomName;
			userRecordingStarted=false;
           	var myurl = "movefile.php";
           	var path = "roomname="+roomname+"&hostid="+roomHostName+"&sessionid="+sessionid;
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						saveRecordingDetailsInDB(roomname, roomHostName, responseTEXT.data["filename"], responseTEXT.data["filesize"], responseTEXT.data["filepath"]);
						var filepathname = btoa(responseTEXT.data["filepath"]+responseTEXT.data["filename"]);
						document.getElementById("dvShowLinkDownloadRecording").innerHTML = "<a style='color:green;' href=\"filedownload.php?filepath="+filepathname+"\" target='_blank'>"+responseTEXT.data["filename"]+"</a><br><p>"+APP.translation.generateTranslationHTML("userDefinedPopup.availableFor7Days")+"</p>";
						document.getElementById("dvDownloadLinkRecordingFile").style.display = "block";
						
						sendRecordingFileMailToModerator(responseTEXT.data["filename"], filepathname);
					} else {
						//console.log(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function sendRecordingFileMailToModerator(filename, filepathname) {
			var myurl = apiURL + "conferenceschedule.php";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+APP.conference.roomName;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						var subject = "Download link of recorded file: "+filename;
						var mailBody="Dear <b> "+responseTEXT.data["displayname"]+" </b><br/><br/>Please <a href='"+location.href.toLowerCase().replace(APP.conference.roomName.toLowerCase(),'')+"filedownload.php?filepath="+filepathname+"'>click here</a> to download the recording of meeting <b>"+APP.conference.roomName+"</b>.<br><br><p style='color:red;'>Note: This file will be available for seven days in your account for download.</p><br><br>VideoMeet";
						sendAllInviteMail(subject, mailBody, responseTEXT.data["email"]);
					}
				}
			};
			myRequest.send(path);
		}
		
		function saveRecordingDetailsInDB(roomname, username, filename, filesize, filepath) {
			var myurl = apiURL + "conference_recording.php/add";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&filepath="+filepath+"&file_name="+filename+"&file_size="+filesize;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						console.log("File saved successfully !");
					} else {
						//console.log(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function seeListOfMyRecording(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			try {
	        	var myurl = apiURL + "conference_recording.php/recordinglist";
				var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						var file_size = 0;
						var tblListSchMeet = "<table class='tableBox' id='tblListOfMyRecording' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:35%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingFileName")+"</th>";
						tblListSchMeet += "<th style='width:10%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingFileSize")+"</th>";
						tblListSchMeet += "<th style='width:16%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingDate")+"</th>";
						tblListSchMeet += "<th style='width:13%; color:red !important;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingAutoDelete")+"</th>";
						tblListSchMeet += "<th style='width:10%; text-align:center;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingAction")+"</th>";
						tblListSchMeet += "</tr>";
						if(responseTEXT.status == 1) {
							var filepathname = "";
							var expDate;
							var tempExpiryMonth = "";
							var tempExpiryDay = "";
							var autoDeleteDate = "";
							for(var i=0; i<responseTEXT.data.length; i++) {
								tempExpiryMonth = "";
								tempExpiryDay = "";
								expDate = new Date(responseTEXT.data[i]["upload_date"].split("-")[0]+","+responseTEXT.data[i]["upload_date"].split("-")[1]+","+responseTEXT.data[i]["upload_date"].split("-")[2]);
					        	expDate = new Date(expDate.getTime() + (7 * 24 * 60 * 60 * 1000));
					        	tempExpiryMonth = expDate.getMonth()+1;
					        	if((expDate.getMonth()+1)<10) 
					        		tempExpiryMonth = "0"+(expDate.getMonth()+1);
					        	tempExpiryDay = expDate.getDate();
					        	if(expDate.getDate()<10)
					        		tempExpiryDay = "0"+expDate.getDate();
					        	autoDeleteDate = tempExpiryDay+"-"+tempExpiryMonth+"-"+expDate.getFullYear();
								//roomPassword = responseTEXT.data[i]["room_pass"];
								filepathname = btoa(responseTEXT.data[i]["file_path"]+responseTEXT.data[i]["file_name"]);
								tblListSchMeet += "<tr>";
								tblListSchMeet += "<td><a style='color:green;' href=\"filedownload.php?filepath="+filepathname+"\">"+responseTEXT.data[i]["file_name"]+"</a></td>";
								try {
									file_size = parseInt(responseTEXT.data[i]["file_size"]);
									file_size = file_size/1024;
									if(file_size<1) {
										file_size = "1 KB";
									} else if((file_size/1024)>1) { 
										file_size = file_size/1024;
										file_size = parseInt(file_size) + " MB";
									} else {
										file_size = parseInt(file_size) + " KB";
									}
								} catch(err) {
									console.log("Error while calculating file size : "+err);
								}
								tblListSchMeet += "<td>"+file_size+"</td>";
								tblListSchMeet += "<td>"+parseDateTime(responseTEXT.data[i]["upload_date"])+"</td>";
								tblListSchMeet += "<td style='color:red !important;'>"+autoDeleteDate+"</td>";
								//tblListSchMeet += "<td style='text-align:center;'><span id='spnRecordingFileId"+responseTEXT.data[i]["conference_recording_id"]+"'><img src='images/copy.jpg' onclick=\"copyLinkContents('spnRecordingFileId"+responseTEXT.data[i]["conference_recording_id"]+"', '"+apiURL+"conference.php/download?d="+responseTEXT.data[i]["file_name"].replace(/\n/g,'')+"')\" title='click to copy file download link' style='width: 12px; cursor:pointer;'></span> <span style='position: relative; top: -3px;'>|</span> <img src='images/delete.png' onclick=\"deleteMyRecording('"+responseTEXT.data[i]["file_name"]+"', '"+responseTEXT.data[i]["base_link"]+"', '"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\" title='Delete file' style='width: 12px; cursor:pointer;'></td>";
								tblListSchMeet += "<td style='text-align:center;'><img src='images/delete.png' onclick=\"deleteMyRecording('"+responseTEXT.data[i]["file_name"]+"', '"+responseTEXT.data[i]["file_path"]+"', '"+responseTEXT.data[i]["link"].replace(/\n/g,'')+"', '"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\" title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.titleDeleteFile"))+"' style='width: 12px; cursor:pointer;'></td>";
								tblListSchMeet += "</tr>";
							}
							tblListSchMeet += "</table>";
							document.getElementById("dvListOfMyRecordingTable").style.maxHeight  = (document.body.clientHeight-305)+"px";
						} else {
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<td colspan='5'>"+APP.translation.generateTranslationHTML("userDefinedPopup.noAvailableMyRecordings")+"</td>";
							tblListSchMeet += "</tr>";
							tblListSchMeet += "</table>";
						}
						document.getElementById("dvListOfMyRecordingTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleListRecordingFile", {roomname: roomname})+"</h5>";
						document.getElementById("dvListOfMyRecordingTable").innerHTML = tblListSchMeet;
						document.getElementById("dvListOfMyRecording").style.display = "block";
						if(flag=='out') {
							document.getElementById("dvListParticipant").style.display = "none";
							document.getElementById("spnHideMyRecording").innerHTML = "<button class='cancelButton' onclick=\"viewListOfParticipant("+conferenceId+", '"+roomname+"', '"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"');hideListOfMyRecording();\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button>";
						} else {
							document.getElementById("spnHideMyRecording").innerHTML = "<button class='cancelButton' onclick=\"hideListOfMyRecording()\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button>";
						}
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while fetching documents:: "+e);
			}
		}
		
		function hideListOfMyRecording() {
			document.getElementById('dvListOfMyRecording').style.display='none';
		}
		
		function deleteMyRecording(fileName, filepath, recordingId, flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			if(confirm("Are you sure you want to delete recording file '"+fileName+"' ?")) {
				var myurl = apiURL + "conference_recording.php/deleterecording";
				var path = "d="+recordingId;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
							deleteRecordingFile(roomname, fileName, filepath, flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode)
						} else {
							alert(responseTEXT.msg);
						}
					}
				};
				myRequest.send(path);
			}
		}
		
		function deleteRecordingFile(roomname, filename, filepath, flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
           	var myurl = "filedelete.php";
           	var path = "filepath="+filepath+filename;
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert("File deleted successfully !");
						seeListOfMyRecording(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode);
					} else {
						alert(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function saveRoomDetailsByModerator(roomname, userHostName, type) {
			var myurl = apiURL + "conference_history.php/add";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&request_origin=web&name="+userHostName+"&type="+type;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						historyId = responseTEXT.historyid;
						console.log("Conference history added successfully !");
					} else {
						console.log(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		}
		
		function updateRoomDetailsByModerator() {
			if(listOfRoomParticipantJoined=="") {
				listOfRoomParticipantJoined = moderatorUserName;
			} else {
				listOfRoomParticipantJoined = moderatorUserName + "," + listOfRoomParticipantJoined;
			}
			var myurl = apiURL + "conference_history.php/conference_history_update";
			var path = "authkey=M2atKiuCGKOo9Mj3&historyid="+historyId+"&streaming_on="+moderatorStreamingOn+"&recording_on="+moderatorRecordingOn+"&totalparticipant="+totalParticipantCount+"&participantlist="+listOfRoomParticipantJoined;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						console.log("Conference history updated successfully !");
					} else {
						console.log(responseTEXT.msg);
					}
					totalParticipantCount = 0;
					moderatorRecordingOn = 0;
			       	moderatorStreamingOn = 0;
			       	//historyId = 0;
			       	listOfRoomParticipantJoined = "";
				}
			};
			myRequest.send(path);
		}
	
		function addChatHeaderBtn(){
			
			if(sessionStorage.getItem("check_user_is_moderator") == "YES") {
				$('.dvChatCopy').empty();
				$('.usrmsg-form').after('<div class="dvChatCopy"> <img style="cursor:pointer;" width="32" src="images/copy-text.svg" onclick="copyContent()"></img> </div>');
			}
			
		}

		 function showUserQuestion(){
			//$('.button-group-right').append('<button class="open-button" onclick="openForm()">Chat</button>');
		 	$('.button-group-right').append('<div class="button-group-right-question"> <img style="cursor:pointer;" width="32" src="images/q-icon.svg" onclick="openUserForm()"></img> </div>');
		 }
		 function showQuestion(){
			 
		 	$('.button-group-right-question').empty();
		 	$('.button-group-right').append('<div class="button-group-right-question"> <img style="cursor:pointer;" width="32" src="images/q-icon.svg" onclick="openModForm()"></img> </div>');
		 } 
		 
	 	 function logoutUnAuthenticatedUser(){
			if(!userLogout && (sessionStorage.getItem("userLoginBypass") ==null || sessionStorage.getItem("userLoginBypass") =="null")){
            	//alert("Unauthorised Entry in Room  - Please follow the process. ");            	
            	sessionStorage.removeItem('userLoginBypass');
            	firstCheck= false;
            	window.location.href ="/";
            	APP.conference.hangup(!1);
	     	}
			//&&firstCheck
		 }
		  
		 function getQuestionList() {
				try {
					$("#userQuestions").empty();
					var question='';
					var userHostName = (document.getElementById("roomHostName").value).trim();
					var username = document.getElementById("hidUserName").value;
					var roomname = APP.conference.roomName;
					var myurl = apiURL + "conference.php/questionlist";
					var path = "authkey=M2atKiuCGKOo9Mj3&username="+userHostName+"&roomname="+roomname;
					path = getFormData(path);
					var myRequest = new XMLHttpRequest();
					myRequest.open("POST", myurl, false);
					myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					myRequest.setRequestHeader("Content-length", path.length);
					myRequest.setRequestHeader("Connection", "close");
					myRequest.onreadystatechange = function getHttpOutput() {	
						if (myRequest.readyState == 4 && myRequest.status == 200) {
							var responseTEXT =  myRequest.responseText;
							responseTEXT = changeResponse(responseTEXT);
							//responseTEXT = responseTEXT.replace(/\r/g,"").trim();
							//responseTEXT = '{"status":1,"msg":"list fetched successfully.","data":[{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"},{"conference_question_ans_id":"2","confrenceid":"180","username":"devendra","insert_dt":"2020-06-05 13:13:48.999858","question_text":"test1"},{"conference_question_ans_id":"3","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 14:25:29.94897","question_text":"test11"},{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"},{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"},{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"},{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"},{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"},{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"},{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"},{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"},{"conference_question_ans_id":"1","confrenceid":"180","username":"manvendra","insert_dt":"2020-06-05 13:13:44.634506","question_text":"test11"}]}  ';
							//responseTEXT = eval('(' + responseTEXT + ')');
							if(responseTEXT.status == 1) {
								for(var i=0; i<responseTEXT.data.length; i++) {
									var questiondatetime = responseTEXT.data[i]["insert_dt"].split(" ");
									var displaytime =questiondatetime[1].split(":");
									//alert(responseTEXT.data[i]["question_text"])
								//question+=	'<div class="chatmessage-wrapper"> <div class="chatmessage "> <div class="replywrapper"> <div class="messagecontent"> <div class="usermessage">'+responseTEXT.data[i]["question_text"]+'</div> </div> </div> </div> <div class="timestamp">'+responseTEXT.data[i]["username"]+'</div> </div>';
										question+='<div class="usermessage"> <div class="chatUserName">'+responseTEXT.data[i]["username"]+'</div> <div class="chatQuestionDetail"> '+responseTEXT.data[i]["question_text"]+' </div> </div> <p class="chatQuestionTime">'+displaytime[0]+':'+displaytime[1]+'</p></div></div>';
								}
							} else {
								//alert("Some problem occurred, please try later");
							}
							$("#userQuestions").append(question);
							
						}
					};
					myRequest.send(path);
				} catch(e) {
					console.log("Error in delete conference:: "+e);
				}
			}
		 
		 function insertQuestion(e) {
	 			
	 			e = e || window.event;
	 		    if (e.keyCode == 13)
	 		    {
	 		    	try {
	 		    		var d = new Date();
	 		    		var h = d.getHours();
	 		    		var m = d.getMinutes();
	 					var question = (document.getElementById("qusetion").value).trim();
	 					var userHostName = (document.getElementById("roomHostName").value).trim();
	 					var username = APP.conference.getParticipantDisplayName(APP.conference.getMyUserId());
	 					var roomname = APP.conference.roomName;
	 					var myurl = apiURL + "conference.php/question_ans";
	 					var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&roomname="+roomname+"&questiontext="+question;
	 					path = getFormData(path);
	 					var myRequest = new XMLHttpRequest();
	 					myRequest.open("POST", myurl, false);
	 					myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	 					myRequest.setRequestHeader("Content-length", path.length);
	 					myRequest.setRequestHeader("Connection", "close");
	 					myRequest.onreadystatechange = function getHttpOutput() {	
	 						if (myRequest.readyState == 4 && myRequest.status == 200) {
	 							var responseTEXT =  myRequest.responseText;
	 							responseTEXT = changeResponse(responseTEXT);
	 							//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
	 							//responseTEXT = eval('(' + responseTEXT + ')');
	 							if(responseTEXT.status == 1) {
	 								console.log(responseTEXT.msg);
	 								$("#attachMsg").append('<div class="chatmessage-wrapper"> <div class="chatmessage "> <div class="replywrapper"> <div class="messagecontent"> <div class="usermessage">'+question+'</div> </div> </div> </div> <div class="timestamp">'+h +":"+m+'</div> </div>');
	 								$("#qusetion").val('');
	 								}else{
	 									alert("Some problem occurred, please try later");
	 								}
	 						}
	 					};
	 					myRequest.send(path);
	 				} catch(e) {
	 					console.log("Error in insert question:: "+e);
	 				}
	 		    }
	 		    return true;
				
			}
		
		function openModForm() {
			$("#questionChatBox").css('display','block');
			getQuestionList();
		  
		}
		function openUserForm() {
			 document.getElementById("questionUserChatBox").style.display = "block";
			 document.getElementById("qusetion").focus();
			 
		  
		}
		function closeForm() {
		  document.getElementById("questionChatBox").style.display = "none";
		}

		function closeUserForm() {
			  document.getElementById("questionUserChatBox").style.display = "none";
			  document.getElementById("qusetion").focus();

		}
		
		function decodeHtml(htmlText) {
			document.getElementById("dvDecodeText").innerHTML = htmlText;
			htmlText = document.getElementById("dvDecodeText").innerText;
			document.getElementById("dvDecodeText").innerHTML = "";
			return htmlText;
		}
		
		function showRoomHistory() {
			try {
	        	var myurl = apiURL + "conference_history.php/history";
				var path = "authkey=M2atKiuCGKOo9Mj3&historyid="+historyId;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						var link = "";
						var showHistoryContent = "<strong>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingTopic")+":</strong> "+meetingTopicForHistory+"<br><br>";
						var tblListSchMeet = "<table class='tableBox' id='tblRoomHistory' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingRoomName")+"</th>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingHost")+"</th>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.meetingStatedAt")+"</th>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.meetingEndedAt")+"</th>";
						tblListSchMeet += "<th style='width:20%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.meetingParticipants")+"</th>";
						tblListSchMeet += "</tr>";
						if(responseTEXT.status == 1) {
							for(var i=0; i<responseTEXT.data.length; i++) {
								tblListSchMeet += "<td>"+responseTEXT.data[i]["roomname"]+"</td>";
								tblListSchMeet += "<td>"+responseTEXT.data[i]["name"]+"</td>";
								tblListSchMeet += "<td>"+parseDateTime(responseTEXT.data[i]["insert_dt"])+"</td>";
								tblListSchMeet += "<td>"+parseDateTime(responseTEXT.data[i]["end_conference"])+"</td>";
								tblListSchMeet += "<td>"+responseTEXT.data[i]["totalparticipant"]+"</td>";
								tblListSchMeet += "</tr>";
								link = responseTEXT.data[i]["link"];
							}
							tblListSchMeet += "</table>";
							document.getElementById("dvRoomHistoryTable").style.maxHeight  = (document.body.clientHeight-305)+"px";
						 
							var mode = APP.translation.generateTranslationHTML("userDefinedPopup.labelConference");
							if(check_conference_webinar=="2") {
								mode = APP.translation.generateTranslationHTML("userDefinedPopup.labelWebinar");
							} else if(check_conference_webinar=="3") {
								mode = APP.translation.generateTranslationHTML("userDefinedPopup.labelMeeting");
							} else {
								mode = APP.translation.generateTranslationHTML("userDefinedPopup.labelConference");
							}
							
							showHistoryContent += tblListSchMeet;
							showHistoryContent += APP.translation.generateTranslationHTML("userDefinedPopup.downloadListOfParticipants", {download: "<a target=\"_blank\" href=\""+apiURL+"participants.php/participantexceldownload?d="+link+"\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkDownload")+"</a>"})+"<br>"; 
							showHistoryContent += APP.translation.generateTranslationHTML("userDefinedPopup.downloadMOM", {download: "<a target=\"_blank\" href=\""+apiURL+"participants.php/mom?d="+link+"\">"+APP.translation.generateTranslationHTML("userDefinedPopup.linkDownload")+"</a>"})+"<br><br>"; 
							showHistoryContent += APP.translation.generateTranslationHTML("userDefinedPopup.thankYouUsingVideoMeet"); 
							
							document.getElementById("dvRoomHistoryTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingShowHistory", {mode: mode})+"</h5>";
							document.getElementById("dvRoomHistoryTable").innerHTML = showHistoryContent;
							document.getElementById("dvRoomHistory").style.display = "block";
						} else {
							hideRoomHistory();
						}
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while fetching documents:: "+e);
			}
		}
		
		function hideRoomHistory() {
			document.getElementById('dvRoomHistory').style.display='none';
			//document.getElementById("dvFeedback").style.display = "block";
			kickAllRoomParticipant();
			skipAndCloseFeedback();
		}
		
		function resetHiddenUsername() {
			document.getElementById("hidUserName").value = "";
		}
		function logout(id) {
			document.getElementById("hidUserName").value = "";
			document.getElementById("hidUserFullName").value = "";
			document.getElementById("hidUserEmailAddress").value = "";
			document.getElementById(id).style.display = "none";
			$("#spnSignup").removeClass("hideElement");
			$("#spnLogout").addClass("hideElement");
			$("#spnManage").addClass("hideElement");
			$("#spnLogin").removeClass("hideElement");
			document.getElementById("dvLoggedInUserName").innerHTML = "";
			document.getElementById("dvHostAMeeting").style.display = "block";
			//document.getElementById("dvLoggedInUserName").innerHTML = APP.translation.generateTranslationHTML("welcomepage.hostAMeeting");
		}
		
		function verifyHostCode() {
			var meetingCode = document.getElementById("txtVerifyCodeHost").value;
			if(meetingCode=="") {
				alert("Please enter code for verification !");
				document.getElementById("txtVerifyCodeHost").focus();
				return false;
			}
			
			var myurl = apiURL + "participants.php/verifycode";
			var path = "authkey=M2atKiuCGKOo9Mj3&code="+meetingCode;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						APP.UI.emitEvent("UI.auth_clicked");
					} else {
						alert("Invalid code !");
					}
					hideHostCode();
				}
			};
			myRequest.send(path);
		}
		
		function hideHostCode() {
			document.getElementById("dvVerifyCodeHost").style.display = "none";
			document.getElementById("txtVerifyCodeHost").value = "";
		}
		
		/* function setRoomCookie(roomName) {
			roomName = roomName.trim().toLowerCase();
			document.cookie = "roomname="+roomName+"; expires=everyOneHour; path=https://bridge01.videomeet.in/;";
	    }
	    
	    function getRoomCookie(name) {
	    	var cookieArr = document.cookie.split(";");
	    
	        for(var i = 0; i < cookieArr.length; i++) {
	            var cookiePair = cookieArr[i].split("=");
	            if(name == cookiePair[0].trim()) {
	                return decodeURIComponent(cookiePair[1]);
	            }
	        }
	    
	        return null;
	    } */
	    
	    function setCookie(name,value,days) {
	    	var expires = "";
	    	if (days) {
		    	var date = new Date();
		    	date.setTime(date.getTime() + (days*24*60*60*1000));
		    	expires = "; expires=" + date.toUTCString();
	    	}
	    	document.cookie = name + "=" + (value || "") + expires + "; path=/";
	    }
	    	
	    function getCookie(name) {
	    	var nameEQ = name + "=";
	    	var ca = document.cookie.split(';');
	    	for(var i=0;i < ca.length;i++) {
		    	var c = ca[i];
		    	while (c.charAt(0)==' ') c = c.substring(1,c.length);
		    	if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	    	}
	    	return null;
	    }
	    	
	    function eraseCookie(name) {
	    	document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	    }
	    
	    function saveUserDetailWhileJoiningRoom() {
	    	var user_role = "participant";
	    	if(sessionStorage.getItem("check_user_is_moderator") == "YES") {
	    		user_role = "moderator";
	    	}
	    	
	    	var userDisplayName = APP.conference.getParticipantDisplayName(APP.conference.getMyUserId());
	    	if(userDisplayName.indexOf("<span")!=-1) {
	    		userDisplayName = "participant";
	    	}
	    	
	    	var appVersion = getBrowserDetails();
	    	var myurl = apiURL + "conference_history_detail.php/conference_history_detail";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+APP.conference.roomName+"&app_version="+appVersion+"&name="+userDisplayName+"&request_origin=web&user_role="+user_role+"&info=";
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						sessionStorage.setItem("user_detail_save_once", "YES");
						conferenceHistoryDetailId = responseTEXT.data["conference_history_detail_id"];
					} 
				}
			};
			myRequest.send(path);
		}
	    
	    function updateUserDetailWhileLeavingRoom() {
	    	var appVersion = getBrowserDetails();
	    	var myurl = apiURL + "conference_history_detail.php/conference_history_detail_update";
			var path = "authkey=M2atKiuCGKOo9Mj3&conference_history_detail_id="+conferenceHistoryDetailId;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			/* myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					
				}
			}; */
			myRequest.send(path);
		}
	    
	    function showWhiteBoard(){
	    	$('.button-group-right').append('<div class="button-group-right-whiteboard"><img style="cursor:pointer;" width="32" src="images/white-board.svg" onclick="openWhiteBoard()"></img></div>');
		}
		
	    function openWhiteBoard(){
	    	toggleWhiteBoard();
	    	$('.button-group-right-whiteboard').remove();
		 	$('.button-group-right').append('<div class="button-group-right-whiteboard" style=" background: #3a7bcb; border-radius: 50%;"><img style="cursor:pointer;" width="32" src="images/white-board.svg" onclick="closeWhiteBoard()"></img></div>');
		}
	    
	    function closeWhiteBoard(){
	    	toggleWhiteBoard();
	    	$('.button-group-right-whiteboard').remove();
		 	showWhiteBoard();
		}
	    
	    function toggleWhiteBoard() {
	    	APP.UI.emitEvent("UI.etherpad_clicked");
	    }
	    
	    /* function showAudioVideoOnlyOption(){
	    	$('.button-group-center').prepend('<div class="button-group-center-audio-only"><div class="toolbox-button" onclick="showOnlyAudioParticipants()"><div><div class="toolbox-icon"><div class="jitsi-icon "><img style="cursor:pointer;" width="32" src="images/white-board.svg"></img></div></div></div></div></div><div class="button-group-center-video-only" onclick="showOnlyVideoParticipants()"><div class="toolbox-button"><div><div class="toolbox-icon"><div class="jitsi-icon "><img style="cursor:pointer;" width="32" src="images/white-board.svg"></img></div></div></div></div></div>');
		} */
		
		function _changeComboValue() {
			cmbValue = $("#cmbAudioVideo").val();
			/* if(cmbValue=="AO") {
				showOnlyAudioParticipants();
			} else */ 
			if(cmbValue=="VO") {
				showOnlyVideoParticipants();
			} else if(cmbValue=="speaker") {
				showOnlySpeaker();
			} else if(cmbValue=="HOST") {
				//showOnlyVideoParticipants();
			} else {
				showAllParticipants();
			}
		}
		
		function showOnlySpeaker() {
	    	/* $(".display-name-on-video").addClass("hideElement");
	    	$(".display-avatar-with-name").addClass("hideElement");
	    	$("#dominantSpeaker").removeClass("hideElement"); */
	    	
	    	APP.store.dispatch({
	            type: "SET_TILE_VIEW",
	            enabled: false
	        });
	    }
	    
	    function showOnlyAudioParticipants() {
	    	$(".display-name-on-video").addClass("hideElement");
	    	$(".display-avatar-with-name").removeClass("hideElement");
	    }
	    
		function showOnlyVideoParticipants() {
			$(".display-avatar-with-name").addClass("hideElement");
			$(".display-name-on-video").removeClass("hideElement");
	    }
		
		function showAllParticipants() {
			$(".display-name-on-video").removeClass("hideElement");
			$(".display-avatar-with-name").removeClass("hideElement");
	    }
    </script>
    <link rel="stylesheet" href="css/flatpickr.min.css">
    <script src="libs/flatpickr.js"></script>
    <script><!--#include virtual="/config.js" --></script><!-- adapt to your needs, i.e. set hosts and bosh path -->
    <!--#include virtual="connection_optimization/connection_optimization.html" -->
    <script src="libs/do_external_connect.min.js?v=1"></script>
    <script src="interface_config.js"></script>
    <script src="config.js"></script>
    <script><!--#include virtual="/logging_config.js" --></script>
    <script src="libs/lib-jitsi-meet.min.js?v=3992"></script>
    
    <script src="libs/app.bundle.min.js?v=3992"></script>
    <!--#include virtual="title.html" -->
    <!--#include virtual="plugin.head.html" -->
    <!--#include virtual="static/welcomePageAdditionalContent.html" -->
    <!--#include virtual="static/settingsToolbarAdditionalContent.html" -->
  </head>
  <body>
    <!--#include virtual="body.html" -->
    <div id="react"></div>
    
    <!-- Schedule Meeting (start) -->
    <input type="hidden" class="textBox" id="roomHostName"/>
    <input type="hidden" class="textBox" id="hidUserName"/>
    <input type="hidden" class="textBox" id="hidUserFullName"/>
    <input type="hidden" class="textBox" id="hidUserEmailAddress"/>
    <input type="hidden" class="textBox" id="hideConferenceId"/>
    <div id="dvDecodeText"></div>
    <div id="dvHtmlString"></div>
    
    <!-- echo test (start) -->
    <!-- <div id="dvEchoTest"><iframe src="https://www.w3schools.com" title="W3Schools Free Online Web Tutorials"></iframe></div> -->
    <!-- echo test (end) -->
    <script src="libs/recorder.js"></script>
  	<script src="app.js"></script>
  	<script>
  		function renderHtmlUserDefined() {
  			var htmlString = "";
  			//Authentication (start)
  			htmlString += '<div id="dvAuthenticateUser" class="popBox" style="display:none;">';
  			htmlString += '<div class="popBoxInner">';
  			htmlString += '<div class="popBoxBody">';
  			htmlString += '<label>'+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetUserName")+'</label>';
  	        htmlString += '<input type="text" class="textBox" id="txtUserName" placeholder="username" onkeypress="onPressEnterKey(event,\'auth\')">';
  	        htmlString += '<label>'+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetPassword")+'</label>';
  	        htmlString += '<input type="password" class="textBox" id="txtPassword" placeholder="password" onkeypress="onPressEnterKey(event,\'auth\')">';
  	        htmlString += '</div>';
  	        htmlString += '<div class="popBoxFooter">';
  	        htmlString += '<button class="cancelButton" onclick="hideAuthenticateUserDiv()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butCancel")+'</button>';
  	        htmlString += '<button onclick="validateUser()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butLogin")+'</button>';
  	        htmlString += '<a href="javascript:showForgotPasswordDiv()">'+APP.translation.generateTranslationHTML("userDefinedPopup.linkForgotPassword")+'</a>';
  	       	htmlString += '</div>';
  	      	htmlString += '</div>';          
  	    	htmlString += '</div>';
  	    	//Authentication (end)
  	    	
  	    	//forgot password (start)
    		htmlString += '<div id="dvForgotPassword" class="popBox" style="display:none;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxBody">';
    		htmlString += '<label>'+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetUserName")+'</label>';
    		htmlString += '<input type="text" class="textBox" id="txtUserName1" placeholder="username" onkeypress="onPressEnterKey(event,\'forgot\')">';
    		htmlString += '</div>';
        	htmlString += '<div class="popBoxFooter">';
           	htmlString += '<button class="cancelButton" onclick="hideForgotPasswordDiv()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butCancel")+'</button>';
           	htmlString += '<button onclick="forgotPassword()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butLogin")+'</button>';
        	htmlString += '</div>';
        	htmlString += '</div>';          
    		htmlString += '</div>';
    		//forgot password (end)
    
    		//room password (start)
    		htmlString += '<div id="dvRoomPassword" class="popBox" style="display:none;">';
      		htmlString += '<div class="popBoxInner">';
        	htmlString += '<div class="popBoxBody relativeDiv">';
        	htmlString += '<label id="dvRoomPasswordTitle"></label>';
        	htmlString += '<span class="relativeDivBlock">';
        	htmlString += '<span class="popPrevIcon" id="spnEyeView"><img onclick="showHidePassword(\'show\')" src="images/eye.png" alt="View"></span>';
            htmlString += '<input type="password" class="textBox" id="room_password" placeholder="Enter room password" onkeypress="onPressEnterKey(event,\'joinroom\')">';
            htmlString += '</span>';
       		htmlString += '</div>';
        	htmlString += '<div class="popBoxFooter">';
           	htmlString += '<button class="cancelButton" onclick="hideRoomPassword()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butCancel")+'</button>';
           	htmlString += '<button onclick="joinMeetingWithPassword()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butProceed")+'</button>';
        	htmlString += '</div>';
      		htmlString += '</div>';          
    		htmlString += '</div>';
    		//room password (end)
    
    		//sensitive room password (start)
    		htmlString += '<div id="dvRoomSensitivePassword" class="popBox" style="display:none;">';
      		htmlString += '<div class="popBoxInner">';
   			htmlString += '<div class="popBoxBody relativeDiv">';
       		htmlString += '<label id="dvRoomSensitivePasswordTitle"></label>';
       		htmlString += '<span class="relativeDivBlock">';
        	htmlString += '<input type="text" class="textBox" id="room_email_sensitive" placeholder="Enter Email Address" />';
            htmlString += '<input type="password" class="textBox" id="room_password_sensitive" placeholder="Enter room password" onkeypress="onPressEnterKey(event,\'joinsensitiveroom\')">';
            htmlString += '<span class="popPrevIcon" id="spnEyeViewSensitive" style="top:228px;"><img onclick="showHidePasswordSensitive(\'show\')" src="images/eye.png" alt="View"></span></input>';
            htmlString += '</span>';
        	htmlString += '</div>';
        	htmlString += '<div class="popBoxFooter">';
           	htmlString += '<button class="cancelButton" onclick="hideRoomPassword()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butCancel")+'</button>';
           	htmlString += '<button onclick="joinSensitiveMeetingWithPassword()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butProceed")+'</button>';
        	htmlString += '</div>';
      		htmlString += '</div>';          
    		htmlString += '</div>';
    		//sensitive room password (end)
    
    		//List of schedule meetings (start)
    		htmlString += '<div id="dvListScheduleMeeting" class="popBox" style="display:none;">';
      		htmlString += '<div class="popBoxInner">';
        	htmlString += '<div class="popBoxHeader" id="dvScheduleMeetingTitle"><h5>Scheduled Meetings</h5></div>';
        	htmlString += '<div class="popBoxBody" id="dvListScheduleMeetingTable" style="overflow-y:auto;"></div>';
        	htmlString += '<div class="popBoxFooter">';
       		htmlString += '<button class="cancelButton" onclick="hideListScheduleMeeting()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
           	htmlString += '<button onclick="createNewMeeting()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butNewMeeting")+'</button>';
        	htmlString += '</div>';
      		htmlString += '</div>';          
    		htmlString += '</div>';
    		//List of schedule meetings (end)
    
    		//Schedule create new meeting (start)		
    		htmlString += '<div id="dvCreateNewMeeting" class="popBox" style="display:none;">';
      		htmlString += '<div class="popBoxInner">';
       		htmlString += '<div class="popBoxHeader" id="dvSetTitle"></div>';
        	htmlString += '<div class="popBoxBody" id="dvCreateNewMeetingBody" style="overflow-y:auto;">';
           	htmlString += '<form id=\'filecatcher\'>';
           	htmlString += '<table class="tableNoBorder" style="width:100%;">';  
            htmlString += '<tr>';
            htmlString += '<td ><label class="displayInlineBlock">'+APP.translation.generateTranslationHTML("userDefinedPopup.meetingMode")+': </label> <input type="radio" class="" name="meeting_mode" id="inpRadConference" value="1" checked><span class="spnMeetingMode">'+APP.translation.generateTranslationHTML("userDefinedPopup.labelConference")+'</span>&nbsp;&nbsp;<input type="radio" class="" name="meeting_mode" id="inpRadWebinar" value="2"><span class="spnMeetingMode">'+APP.translation.generateTranslationHTML("userDefinedPopup.labelWebinar")+'</span>&nbsp;&nbsp;<input type="radio" class="" name="meeting_mode" id="inpRadSensitive" value="3"><span class="spnMeetingMode">'+APP.translation.generateTranslationHTML("userDefinedPopup.labelSensitive")+'</span>';
            htmlString += '</td>';
            htmlString += '<td><label class="displayInlineBlock">'+APP.translation.generateTranslationHTML("userDefinedPopup.labelWaitingRoom")+': </label> <input type="checkbox" id="waitingroomid" value="" /> </td>';
           	htmlString += '</tr>';
            htmlString += '<tr id="editRommTr" style="display: none;">';
            htmlString += '<td><input type="text" maxlength=50 class="textBox" placeholder="Title of Meeting" id="txtMeetingTopicEdit" ></td>';
           	htmlString += '<td>';
            htmlString += '<input type="text" maxlength=50 class="textBox" placeholder="Name of Room" id="txtRoomNameEdit" onkeyup="replaceSpecialChars(\'txtRoomName\')" onfocusout="isRoomNameExists()" readonly="readonly">';//<span id="spnRoomExists" style="display:none; font-size:11px; padding: 5px; top: 4px; position: relative;"></span>
            htmlString += '</td>';
           	htmlString += '</tr>';
            htmlString += '<tr id="createRoomTr">';
            htmlString += '<td><input type="text" maxlength=50 class="textBox" placeholder="Title of Meeting" id="txtMeetingTopic" onfocusout="generateRoomPassword()"></td>';
            htmlString += '<td>';
            htmlString += '<input type="text" maxlength=50 class="textBox" placeholder="Name of Room" id="txtRoomName" onkeyup="replaceSpecialChars(\'txtRoomName\')" onfocusout="isRoomNameExists()"><span id="spnRoomExists" style="display:none; font-size:11px; padding: 5px; top: 4px; position: relative;"></span>';
            htmlString += '</td>';
            htmlString += '</tr>';
            htmlString += '<tr>';
            htmlString += '<td><input type="text" class="textBox" placeholder="DD-MM-YYYY" id="txtMeetingDate" style="color: #000000;"></td>';
            htmlString += '<td><input type="text" class="textBox" placeholder="HH24:MM" id="txtMeetingTime" style="color: #000000;"></td>';
            htmlString += '</tr>';
            htmlString += '<tr>';
            htmlString += '<td><input type="text" class="textBox" placeholder="Room Password" id="txtRoomPassword" style="color: #000000;" readonly></td>';
            htmlString += '<td valign="top">';
            htmlString += '<div class="cstomFile">';
            htmlString += '<label for="file-input" class="custom-file-upload fileBtn">'+APP.translation.generateTranslationHTML("userDefinedPopup.clickToUploadFile")+'</label>';
            htmlString += '<input id="file-input" name="files[]" multiple onchange="uploadFilesOnChange(this, \'file-list-display\')" class="file-upload centerDatasheet" name="datasheet" type="file" style="display:none;">';
            htmlString += '</div>';
            htmlString += '</td>';
            htmlString += '</tr>';
            htmlString += '<tr>';
            htmlString += '<td colspan="2"><div class="file-list-display" id=\'file-list-display\'></div></td>';
            htmlString += '</tr>';
            htmlString += '</table>';
            htmlString += '</form>';
        	htmlString += '</div>';
        	htmlString += '<div class="popBoxFooter">';
           	htmlString += '<button class="cancelButton" onclick="hideCreateNewMeeting();getListOfScheduleMeeting();">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
           	htmlString += '<button id="butSave" onclick="addConference()" disabled>'+APP.translation.generateTranslationHTML("userDefinedPopup.butSave")+'</button>';
           	htmlString += '<button id="butEdit" onclick="editConference()" style="display: none;">'+APP.translation.generateTranslationHTML("userDefinedPopup.butSave")+'</button>';
        	htmlString += '</div>';
      		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Schedule create new meeting (end)
    
    		//Share schedule details (start)
    		htmlString += '<div id="dvShareScheduleDetail" class="popBox" style="display:none;">';
      		htmlString += '<div class="popBoxInner">';
      		htmlString += '<div class="popBoxHeader"><h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.titleCopyAndShare")+'</h5></div>';
        	htmlString += '<div class="popBoxBody" id="dvShareDetailBody"></div>';
        	htmlString += '<div class="popBoxFooter">';
           	htmlString += '<button class=\'cancelButton\' onclick="hideShareScheduleMeetingDetails();getListOfScheduleMeeting();">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
           	htmlString += '<span id="spnSendMailToShare"></span>';
        	htmlString += '</div>';
      		htmlString += '</div>';      
    		htmlString += '</div>';
    		//Share schedule details (start)
    
    		//Share Penalist (start)
    		htmlString += '<div id="dvShareToPenalist" class="popBox" style="display:none; z-index: 1000;">';
      		htmlString += '<div class="popBoxInner">';
      		htmlString += '<div class="popBoxHeader"><h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.titleCopyAndShare")+'</h5></div>';
        	htmlString += '<div class="popBoxBody" id="dvShareToPenalistDetailBody" style="overflow-y:auto;"></div>';
        	htmlString += '<div class="popBoxFooter">';
           	htmlString += '<button class=\'cancelButton\' onclick="hideShareToPenalistDetails()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
           	htmlString += '<span id="spnSendMailShareToPanelist"></span>';
        	htmlString += '</div>';
      		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Share Penalist (start)
	    
    		//Add Penalist (start)
    		htmlString += '<div id="dvAddPenalist" class="popBox" style="display:none; z-index: 999;">';
      		htmlString += '<div class="popBoxInner">';
        	htmlString += '<div class="popBoxHeader" id="dvSetTitlePenalist"></div>';
        	htmlString += '<div class="popBoxBody">';
           	htmlString += '<table class="tableNoBorder" style="width:100%;">';  
            htmlString += '<tr>';
            htmlString += '<td><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.headingName")+': </label></td>';
            htmlString += '<td colspan="3"><input type="text" maxlength=50 class="textBox" placeholder="Name" id="txtPenalistName" onfocusout="generatePenalistCode()"></td>';
            htmlString += '</tr>';
            htmlString += '<tr>';
            htmlString += '<td><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.headingEmail")+': </label></td>';
            htmlString += '<td colspan="3">';
            htmlString += '<input type="email" maxlength=100 class="textBox" placeholder="Email-Address" id="txtPenalistEmailAddress">';
            htmlString += '</td>';
           	htmlString += '</tr>';
            htmlString += '<tr>';
            htmlString += '<td style="width:20%"><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.joinCode")+': </label></td>';
            htmlString += '<td style="width:40%"><input type="text" class="textBox" id="txtPenalistCode" readonly></td>';
            htmlString += '<td style="width:27%; text-align: right;"><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.labelBecomeCoHost")+': </label></td>';
            htmlString += '<td style="width:6%">';
            htmlString += '<label class="switch">';
			htmlString += '<input type="checkbox" id="chkCoHost">';
			htmlString += '<span class="slider round"></span>';
			htmlString += '</label>';
			htmlString += '</td>';
            htmlString += '</tr>';
            htmlString += '</table>';
        	htmlString += '</div>';
        	htmlString += '<div class="popBoxFooter">';
           	//htmlString += '<button class="cancelButton" onclick="hideAddPenalist();getListOfScheduleMeeting();">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
           	htmlString += '<span id="spnCopyShare"></span>';
        	htmlString += '</div>';
        	htmlString += '<div class="popBoxBody" id="dvListAddedPenalistTable" style="overflow-y:auto; margin-top: 10px;"></div>';
      		htmlString += '</div>';          
   			htmlString += '</div>';
    		//Add Penalist (end)
    
    		//Send mail to penalist (start)
    		htmlString += '<div id="dvEmailPenalist" class="popBox" style="display:none;">';
      		htmlString += '<div class="popBoxInner">';
       		htmlString += '<div class="popBoxHeader"><h5>Send Mail</h5></div>';
        	htmlString += '<div class="popBoxBody">';
           	htmlString += '<table class="tableNoBorder" style="width:100%;">';  
            htmlString += '<tr>';
            htmlString += '<td style="width:32%"><label>To: </label>';
            htmlString += '</td>';
            htmlString += '<td style="width:68%"><span id="spnEmailAddressPenalist" class="spnMeetingMode"></span></td>';
            htmlString += '</tr>';
            htmlString += '<tr>';
            htmlString += '<td><label>Subject: </label>';
            htmlString += '</td>';
            htmlString += '<td>';
			htmlString += '<input type="text" maxlength=100 class="textBox" placeholder="Subject" id="txtEmailSubject">';
            htmlString += '</td>';
            htmlString += '</tr>';
            htmlString += '<tr>';
            htmlString += '<td>';
            htmlString += '</td>';
            htmlString += '<td><textarea id="txtAreaMailBody" rows="4" cols="20"></textarea></td>';
            htmlString += '</tr>';
            htmlString += '</table>';
        	htmlString += '</div>';
        	htmlString += '<div class="popBoxFooter">';
           	htmlString += '<button class="cancelButton" onclick="hideSendEmail()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butCancel")+'</button>';
           	htmlString += '<span id="spnSendEmail"></span>';
        	htmlString += '</div>';
      		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Send mail to penalist (end)
    
    		//List of participant (start)
    		htmlString += '<div id="dvListParticipant" class="popBox" style="display:none;">';
      		htmlString += '<div class="popBoxInner">';
        	htmlString += '<div class="popBoxHeader" id="dvListParticipantTitle"></div>';
        	htmlString += '<div class="popBoxBody" id="dvListParticipantTable" style="overflow-y:auto;"></div>';
        	htmlString += '<div class="popBoxFooter">';
        	htmlString += '<button class="cancelButton" onclick="hideListParticipant()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
        	htmlString += '<span id="spnShowDocuments"></span>';
        	htmlString += '</div>';
      		htmlString += '</div>';          
    		htmlString += '</div>';
    		//List of participant (end)
    		
    		//Verify Code Penalist (start) -->
    		htmlString += '<div id="dvVerifyCode" class="popBox" style="display:none;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader"><h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.verifyPanelist")+'</h5></div>';
    		htmlString += '<div class="popBoxBody">';
    		htmlString += '<table class="tableNoBorder" style="width:100%;">';  
    		htmlString += '<tr>';
    		htmlString += '<td style="width:32%"><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.panelistCode")+': </label>';
    		htmlString += '</td>';
    		htmlString += '<td style="width:68%"><input type="text" maxlength=4 class="textBox" placeholder="Panelist Code" id="txtVerifyCode" onkeypress="onPressEnterKey(event,\'verifycodepanelist\')"></td>';
    		htmlString += '</tr>';
    		htmlString += '</table>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<button class="cancelButton" onclick="hideJoinAsPenalist()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butCancel")+'</button>';
    		htmlString += '<button onclick="verifyPenalistCode()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butVerify")+'</button>';
    		htmlString += '</div>';
    		htmlString += '</div>';      
    		htmlString += '</div>';
    		//Verify Code Penalist (end) -->
    
    		//Verify Code to Become host (start) -->
    		htmlString += '<div id="dvVerifyCodeHost" class="popBox" style="display:none;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader"><h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.verifyCode")+'</h5></div>';
    		htmlString += '<div class="popBoxBody">';
    		htmlString += '<table class="tableNoBorder" style="width:100%;">';  
    		htmlString += '<tr>';
    		htmlString += '<td style="width:32%"><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.headingCode")+': </label>';
    		htmlString += '</td>';
    		htmlString += '<td style="width:68%"><input type="text" maxlength=4 class="textBox" placeholder="Code" id="txtVerifyCodeHost" onkeypress="onPressEnterKey(event,\'verifycodehost\')"></td>';
    		htmlString += '</tr>';
    		htmlString += '</table>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<button class="cancelButton" onclick="hideHostCode()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butCancel")+'</button>';
    		htmlString += '<button onclick="verifyHostCode()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butVerify")+'</button>';
    		htmlString += '</div>';
    		htmlString += '</div>';      
    		htmlString += '</div>';
    		//Verify Code to Become host (end) -->
    
    		//List of participant moderator (start) -->
    		htmlString += '<div id="dvListParticipantModerator" class="popBox" style="display:none; z-index: 999;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvListParticipantTitleModerator"></div>';
    		htmlString += '<div class="popBoxBody" id="dvListParticipantTableModerator" style="overflow-y:auto;"></div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<button class="cancelButton" onclick="hideListOfPanelistModerator()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
    		htmlString += '<span id="spnAddPanelistBut"></span>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//List of participant moderator (end) -->
    
    		//Show list of documents (start) -->
    		htmlString += '<div id="dvListOfDocuments" class="popBox" style="display:none; z-index: 999;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvListOfDocumentsTitle"></div>';
    		htmlString += '<div class="popBoxBody" id="dvListOfDocumentsTable" style="overflow-y:auto;"></div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<span id="spnHideDocuments"></span>';
    		htmlString += '<span id="spnShowImgLogo"></span>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Show list of documents (end) -->
    
    		//Waiting message (start) -->
    		htmlString += '<div id="dvWaitingMessage" class="popBox" style="display:none;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader"><span id="spnShowRoomName" class="textColorBlack">You are  in Waiting Room</span></div>';
    		htmlString += '<div class="popBoxBody">';
    		htmlString += '<table class="tableNoBorder" style="width:100%;">';  
    		htmlString += '<tr>';
    		htmlString += '<td><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.headingName")+': </label></td>';
    		htmlString += '<td><span id="spnShowDisplayName" class="textColorBlack"></span></td>';
    		htmlString += '</tr>';
    		htmlString += '<tr>';
    		htmlString += '<td><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.headingStatus")+': </label></td>';
    		htmlString += '<td><span id="spnShowStatus" class="textColorBlack">'+APP.translation.generateTranslationHTML("userDefinedPopup.labelWaiting")+'</span></td>';
    		htmlString += '</tr>';
    		htmlString += '<td><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.labelMessage")+': </label></td>';
    		htmlString += '<td><span id="spnShowMessage" class="textColorBlack"></span></td>';
    		htmlString += '</tr>';
    		htmlString += '<tr><td></td><td></td></tr>';
    		htmlString += '<tr><td></td><td></td></tr>';
    		htmlString += '<tr><td></td><td></td></tr>';
    		htmlString += '<tr id="hostp">';
    		htmlString += '<td colspan="4"><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.youAreHostOfMeeting")+'</label></td>';
    		htmlString += '</tr>';
    		htmlString += '<tr id="hostq">';
    		htmlString += '<td colspan="3"><input type="text" class="textBox" id="txtBecomeHost" placeholder="username" onkeypress="onPressEnterKey(event,\'becomehost\')"></td>';
    		htmlString += '<td><button onclick="becomeHost()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butProceed")+'</button></td>';
    		htmlString += '<input type="hidden"  id="txtBecomeHostWaitingID"></td>';
    		htmlString += '</tr>';
    		htmlString += '</table>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<button class=\'cancelButton\' onclick="cancelWaiting();clearIntervalRoomStatus();location.reload();">'+APP.translation.generateTranslationHTML("userDefinedPopup.butCancel")+'</button>';
    		htmlString += '<span id="spnWaitingBut"></span>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Waiting message (end) -->
    
    		//Waiting list of panelist (start) -->
    		htmlString += '<div id="dvWaitListOfParticipant" class="popBox" style="display:none; z-index:999;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvWaitListOfParticipantTitle"></div>';
    		htmlString += '<div class="popBoxBody" id="dvWaitListOfParticipantTable" style="overflow-y:auto;"></div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<button class="cancelButton" onclick="hideWaitListOfParticipant()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
    		htmlString += '<span id="spnWaitListOfParticipant"></span>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Waiting list of panelist (end) -->
    
    		//add documents (start) -->
    		htmlString += '<div id="dvAddDocument" class="popBox" style="display:none;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvSetDocumentTitle"></div>';
    		htmlString += '<div class="popBoxBody">';
    		htmlString += '<table class="tableNoBorder" style="width:100%;">';  
    		htmlString += '<tr>';
    		htmlString += '<td style="width:30%"><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.labelUploadFile")+':</label></td>';
    		htmlString += '<td valign="top" style="width:70%">';
    		htmlString += '<div class="cstomFile">';
    		htmlString += '<form id="filecatcher1">';
    		htmlString += '<label for="addfile-input" class="custom-file-upload fileBtn">'+APP.translation.generateTranslationHTML("userDefinedPopup.clickToUploadFile")+'</label>';
    		htmlString += '<input id="addfile-input" name="files[]" multiple onchange="uploadFilesOnChange(this, \'file-list-display1\')" class="file-upload centerDatasheet" name="datasheet" type="file" style="display:none;">';
    		htmlString += '</form>';
    		htmlString += '</div>';
    		htmlString += '</td>';
    		htmlString += '</tr>';
    		htmlString += '<tr>';
    		htmlString += '<td></td>';
    		htmlString += '<td><div class="file-list-display" id=\'file-list-display1\'></div></td>';
    		htmlString += '</tr>';
    		htmlString += '</table>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<span id="spnAddDocumentBut"></span>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//add documents (end) -->
    
    		//add document logo (start) -->
    		htmlString += '<input type="hidden" id="hidLogoFileName">';
    		htmlString += '<input type="hidden" id="hidLogoFilePath">';
    		htmlString += '<div id="dvAddDocumentLogo" class="popBox" style="display:none;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvSetDocumentLogoTitle"></div>';
    		htmlString += '<div class="popBoxBody">';
    		htmlString += '<table class="tableNoBorder" style="width:100%;">';  
    		htmlString += '<tr>';
    		htmlString += '<td style="width:30%"><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.labelUploadFile")+':</label></td>';
    		htmlString += '<td valign="top" style="width:70%">';
    		htmlString += '<div class="cstomFile">';
    		htmlString += '<form id="filecatcherLogo">';
    		htmlString += '<label for="addfile-input-logo" class="custom-file-upload fileBtn">'+APP.translation.generateTranslationHTML("userDefinedPopup.clickToUploadFile")+'</label>';
    		htmlString += '<input id="addfile-input-logo" name="files" onchange="uploadFilesOnChange1(this, \'file-list-display-logo\')" class="file-upload centerDatasheet" name="datasheet" type="file" style="display:none;">';
    		htmlString += '</form>';
    		htmlString += '</div>';
    		htmlString += '</td>';
    		htmlString += '</tr>';
    		htmlString += '<tr>';
    		htmlString += '<td></td>';
    		htmlString += '<td><div class="file-list-display" id=\'file-list-display-logo\'></div></td>';
    		htmlString += '</tr>';
    		htmlString += '<tr>';
    		htmlString += '<td colspan="2">';
    		htmlString += '<div align="center">';
    		htmlString += '<img src="" style="width:207px; height:71px" id="imgDocumentLogo"/>';
    		htmlString += '</div>';
    		htmlString += '</td>';
    		htmlString += '</tr>';
    		htmlString += '</table>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<span id="spnAddDocumentLogoBut"></span>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//add document logo (end) -->
    
    		//add background image (start) -->
    		htmlString += '<input type="hidden" id="hidBgFileName">';
    		htmlString += '<input type="hidden" id="hidBgFilePath">';
    		htmlString += '<div id="dvBackgroundImage" class="popBox" style="display:none;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvBackgroundImageTitle"></div>';
    		htmlString += '<div class="popBoxBody">';
    		htmlString += '<table class="tableNoBorder" style="width:100%;">';  
    		htmlString += '<tr>';
    		htmlString += '<td style="width:30%"><label>'+APP.translation.generateTranslationHTML("userDefinedPopup.labelUploadFile")+':</label></td>';
    		htmlString += '<td valign="top" style="width:70%">';
    		htmlString += '<div class="cstomFile">';
    		htmlString += '<form id="filecatcherBackgroundImage">';
    		htmlString += '<label for="addfile-input-image" class="custom-file-upload fileBtn">'+APP.translation.generateTranslationHTML("userDefinedPopup.clickToUploadFile")+'</label>';
    		htmlString += '<input id="addfile-input-image" name="files" onchange="uploadFilesOnChange1(this, \'file-list-display-image\')" class="file-upload centerDatasheet" name="datasheet" type="file" style="display:none;">';
    		htmlString += '</form>';
    		htmlString += '</div>';
    		htmlString += '</td>';
    		htmlString += '</tr>';
    		htmlString += '<tr>';
    		htmlString += '<td></td>';
    		htmlString += '<td><div class="file-list-display" id=\'file-list-display-image\'></div></td>';
    		htmlString += '</tr>';
    		htmlString += '<tr>';
    		htmlString += '<td colspan="2">';
    		htmlString += '<div>';
    		htmlString += '<img src="" style="width:100%; height:200px" id="imgBackgroundImage"/>';
    		htmlString += '</div>';
    		htmlString += '</td>';
    		htmlString += '</tr>';
    		htmlString += '</table>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<span id="spnBackgroundImageBut"></span>';
    		htmlString += '</div>';
    		htmlString += '</div>';      
    		htmlString += '</div>';
    		//add background image (end) -->
    
    		//Show list of my recordings (start) -->
    		htmlString += '<div id="dvListOfMyRecording" class="popBox" style="display:none; z-index: 999;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvListOfMyRecordingTitle"></div>';
    		htmlString += '<div class="popBoxBody" id="dvListOfMyRecordingTable" style="overflow-y:auto;"></div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<span id="spnHideMyRecording"></span>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Show list of my recordings (end) -->
    
    		//Show Room History Details (start) -->
    		htmlString += '<div id="dvRoomHistoryDetails" class="popBox" style="display:none; z-index: 999;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvRoomHistoryDetailsTitle"></div>';
    		htmlString += '<div class="popBoxBody">';
    		htmlString += '<div>';
    		htmlString += '<input type=\'text\' class=\'textBox\' placeholder=\'From Date\' value=\'\' id=\'txtHistoryFromDate\' style=\'color: #000000; width:200px;\'>';
    		htmlString += '<input type=\'text\' class=\'textBox\' placeholder=\'To Date\' value=\'\' id=\'txtHistoryToDate\' style=\'color: #000000; width:200px;\'>';
    		htmlString += '<span id="spnRoomHistorySearchBut"></span>';
    		htmlString += '</div>';
    		htmlString += '<div id="dvRoomHistoryDetailsTable" style="overflow-y:auto; overflow-x:hidden;"></div>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<span id="spnRoomHistoryDetails"></span>';
    		htmlString += '</div>';
    		htmlString += '</div>';      
    		htmlString += '</div>';
    		//Show Room History Details (end) -->
    
    		//download recording file moderator (start) -->
    		htmlString += '<div id="dvDownloadLinkRecordingFile" class="popBox" style="display:none; z-index: 999;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader"><h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.downloadRecodingFile")+'</h5></div>';
    		htmlString += '<div class="popBoxBody" id="dvShowLinkDownloadRecording"></div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<button class="cancelButton" onclick="document.getElementById(\'dvDownloadLinkRecordingFile\').style.display=\'none\';">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
    		htmlString += '</div>';
    		htmlString += '</div>';      
    		htmlString += '</div>';
    		//download recording file moderator (end) -->
    		//Schedule Meeting (end) -->
    
    		//Show room history (start) -->
    		htmlString += '<div id="dvRoomHistory" class="popBox" style="display:none; z-index: 999;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvRoomHistoryTitle"></div>';
    		htmlString += '<div class="popBoxBody" id="dvRoomHistoryTable" style="overflow-y:auto; overflow-x:hidden;"></div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<button class="cancelButton" onclick="hideRoomHistory()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
    		htmlString += '</div>';
    		htmlString += '</div>';      
    		htmlString += '</div>';
    		//Show room history (end) -->
    
    		//Feedback (start) -->
    		htmlString += '<input type="hidden" class="textBox" id="audioStar" value="5"/>';
    		htmlString += '<input type="hidden" class="textBox" id="videoStar" value="5"/>';
    		htmlString += '<div id="dvFeedback" class="container popBox" style="display:none; z-index:999;">';
    		htmlString += '<div class="row">';        
    		htmlString += '<div class="col col-md-6 ml-auto mr-auto">';
    		htmlString += '<div class="feedBox">'; 
    		htmlString += '<div class="feedHeader">';
    		htmlString += '<h4>'+APP.translation.generateTranslationHTML("userDefinedPopup.sendUsFeedBack")+'</h4>';
    		htmlString += '<p>'+APP.translation.generateTranslationHTML("userDefinedPopup.giveYourFeedback")+'</p>';
    		htmlString += '</div>';
    		htmlString += '<div class="feedRatingBox">';
    		htmlString += '<div class="feedBoxLf borderRt">';
    		htmlString += '<img src="images/feedIcon1.jpg" class="feedIconImg" alt="VideoMeet Audio">';
    		htmlString += '<h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.labelAudio")+'</h5>';
    		htmlString += '<a href="javascript:setStar(1,\'audioStar\')" class="starRating"><img src="images/star.png" id="audioStar1" alt="VideoMeet Rating"></a>';
    		htmlString += '<a href="javascript:setStar(2,\'audioStar\')" class="starRating"><img src="images/star.png" id="audioStar2" alt="VideoMeet Rating"></a>';
    		htmlString += '<a href="javascript:setStar(3,\'audioStar\')" class="starRating"><img src="images/star.png" id="audioStar3" alt="VideoMeet Rating"></a>';
    		htmlString += '<a href="javascript:setStar(4,\'audioStar\')" class="starRating"><img src="images/star.png" id="audioStar4" alt="VideoMeet Rating"></a>';
    		htmlString += '<a href="javascript:setStar(5,\'audioStar\')" class="starRating"><img src="images/star.png" id="audioStar5" alt="VideoMeet Rating"></a>';
    		htmlString += '</div>';
    		htmlString += '<div class="feedBoxLf">';
    		htmlString += '<img src="images/feedIcon2.jpg" class="feedIconImg"  alt="VideoMeet Video">';
    		htmlString += '<h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.labelVideo")+'</h5>';
    		htmlString += '<a href="javascript:setStar(1,\'videoStar\')" class="starRating"><img src="images/star.png" id="videoStar1" alt="VideoMeet Rating"></a>';
    		htmlString += '<a href="javascript:setStar(2,\'videoStar\')" class="starRating"><img src="images/star.png" id="videoStar2" alt="VideoMeet Rating"></a>';
    		htmlString += '<a href="javascript:setStar(3,\'videoStar\')" class="starRating"><img src="images/star.png" id="videoStar3" alt="VideoMeet Rating"></a>';
    		htmlString += '<a href="javascript:setStar(4,\'videoStar\')" class="starRating"><img src="images/star.png" id="videoStar4" alt="VideoMeet Rating"></a>';
    		htmlString += '<a href="javascript:setStar(5,\'videoStar\')" class="starRating"><img src="images/star.png" id="videoStar5" alt="VideoMeet Rating"></a>';
    		htmlString += '</div>';    
    		htmlString += '</div>';
    		htmlString += '<div class="feedTextArea">';
    		htmlString += '<textarea class="feedTextarea" placeholder="Type your suggestion..." id="txtAreaDescription"></textarea>';
    		htmlString += '</div>'; 
    		htmlString += '<div class="feedQuality">';
    		htmlString += '<h6>'+APP.translation.generateTranslationHTML("userDefinedPopup.qualityTeamReachOut")+'</h6>';
    		htmlString += '<p>';
    		htmlString += '<input type="radio" id="reachTeamYes" name="radio-group" onclick="handleClick(this);" value="1" checked>';
    		htmlString += '<label for="reachTeamYes">'+APP.translation.generateTranslationHTML("userDefinedPopup.labelYes")+'</label>';
    		htmlString += '<input type="radio" id="reachTeamNo" name="radio-group" onclick="handleClick(this);" value="0">';
    		htmlString += '<label for="reachTeamNo">'+APP.translation.generateTranslationHTML("userDefinedPopup.labelNo")+'</label>';
    		htmlString += '<input type="text" id="userEmail" name="userEmail" class="textBox" placeholder="Your email" style="width: 40%; color: #98979c; font-size: 18px; font-weight: normal; background: transparent; outline: none; resize: none; padding: 0px;"/>';
    		htmlString += '</p>';
    		htmlString += '</div>';
    		htmlString += '<div class="feedFooter">';
    		htmlString += '<button class="feedFooterbutton feedFooterbutton-font" onclick=\'skipAndCloseFeedback()\'>'+APP.translation.generateTranslationHTML("userDefinedPopup.butSkip")+'</button>';
    		htmlString += '<button class="feedFooterbutton feedFooterbutton-font" onclick=\'saveFeedback()\'>'+APP.translation.generateTranslationHTML("userDefinedPopup.butSubmit")+'</button>';
    		htmlString += '</div>';           
    		htmlString += '</div>';
    		htmlString += '</div>';
    		htmlString += '</div>';
    		htmlString += '</div>';
    		//Feedback (end) -->
    
    		//Teleprompter (start) -->
    		htmlString += '<div id="dvTeleprompter" class="videoMeetBox" style="display:none; z-index:990;">'; 
    		htmlString += '<div class="dialogHeader">';
    		htmlString += '<a href="javascript:toggleDialogProgress()"><img src="images/playIcon.jpg" id="butPlayPause" alt="PlayPause"></a>';
            /* <a href="javascript:void(0)"><img src="images/textIcon.jpg" alt="Play"></a>';
            <a href="javascript:void(0)"><img src="images/runnerIcon.jpg" alt="Play"></a> */
            htmlString += '<a href="javascript:hideTeleprompter()"><img src="images/closeIcon.jpg" alt="Close" style="position:relative; right: -150px;"></a>';
            htmlString += '<span id="dialogProgress" style="display:none;"></span>';
            htmlString += '</div>';
            htmlString += '<div style="height:330px;" id="dvContent" contenteditable="true">';
            htmlString += APP.translation.generateTranslationHTML("userDefinedPopup.copyPasteYourSpeech")+'<br>';
            htmlString += APP.translation.generateTranslationHTML("userDefinedPopup.automaticallyScroll")+'<br>';
            htmlString += APP.translation.generateTranslationHTML("userDefinedPopup.cantTypeOnlyPaste");	
            htmlString += '<div id=\'speech\' style=\'position:absolute;\'></div>';
            htmlString += '</div>';
        	//<textarea class="dialogBody scrollbar" id="speech">What are the opportunities of Adoption of Industry 4.0 for indian MSMEWhat are the opportunities of Adoption of Industry 4.0 for indian MSME</textarea> -->
 			htmlString += '</div>';
    		//Teleprompter (end) -->
    
    		//Webinar help message (start) -->
    		htmlString += '<div id="webinarHelpBox" style="display:none; z-index:999;">'; 
    		htmlString += '<div class="dialogHeader">';
    		htmlString += '<h4>'+APP.translation.generateTranslationHTML("userDefinedPopup.welcomeWebinar")+'</h4>';
    		htmlString += '<a href="javascript:closeWebinarHelpBox()" class="videoHelpClose"><img src="images/cross.svg" alt="Close" title="Close"></a>';
    		htmlString += '</div>';
    		htmlString += '<div class="videoHelpBody">';           	
    		htmlString += '<span id="spnTitleOfWebinar"></span>';
    		htmlString += '<h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.listenMode")+'</h5>';
    		htmlString += '<ul>';
    		htmlString += '<li>'+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.micCameraDisabled"))+'</li>';
    		htmlString += '<li>'+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.settingMenuJoinAsPanelist"))+'</li>';
    		htmlString += '</ul>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Webinar help message (end) -->
    
    		//Conference help message (start) -->
    		htmlString += '<div id="conferenceHelpBox" style="display:none; z-index:999;">'; 
    		htmlString += '<div class="dialogHeader">';
    		htmlString += '<h4>'+APP.translation.generateTranslationHTML("userDefinedPopup.welcomeConference")+'</h4>';
    		htmlString += '<a href="javascript:closeConferenceHelpBox()" class="videoHelpClose"><img src="images/cross.svg" alt="Close" title="Close"></a>';
    		htmlString += '</div>';
    		htmlString += '<div class="videoHelpBody">';           	
    		htmlString += '<span id="spnTitleOfConference"></span>';
    		htmlString += '<h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.listenMode")+'</h5>';
    		htmlString += '<ul>';
    		htmlString += '<li>'+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.micCameraMuted"))+'</li>';
    		htmlString += '</ul>';
    		htmlString += '<h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.interactiveMode")+'</h5>';
    		htmlString += '<ul>';
    		htmlString += '<li>'+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.enableMicAndCamera"))+'</li>';
    		htmlString += '<li>'+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.keepOffMicAndVideo"))+'</li>';
    		htmlString += '</ul>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Conference help message (end) -->
    
    		//question start -->
    		htmlString += '<div id="questionChatBox" class="sideToolbarContainer slideInExt questionChatBox" style="display: none; overflow: hidden auto; z-index: 999;">';
     		<!-- <div  id="questionChatBox" class="sideToolbarContainer slideInExt questionChatBox" style="display: none;overflow-y: auto;overflow-x:hidden;z-index:999  "> -->
     		htmlString += '<div class="chat-header">';
     		htmlString += '<h2 class="chatTitle">'+APP.translation.generateTranslationHTML("userDefinedPopup.questionFromParticipant")+'</h2>';
     		htmlString += '<div class="chat-close" onclick="closeForm()">';
     		htmlString += '<div class="jitsi-icon ">';
     		htmlString += '<svg height="24" width="24" viewBox="0 0 400 400">';
     		htmlString += '<path d="M275.284,116.716c4.372-4.372,4.369-11.463,0.006-15.826l-16.18-16.18c-4.369-4.369-11.47-4.35-15.826,0.006    l-35.368,35.368c-4.372,4.372-11.475,4.356-15.832,0l-35.368-35.368c-4.372-4.372-11.463-4.369-15.826-0.006l-16.18,16.18    c-4.369,4.369-4.35,11.47,0.006,15.826l35.368,35.368c4.372,4.372,4.356,11.475,0,15.832l-35.368,35.368    c-4.372,4.372-4.369,11.463-0.006,15.826l16.18,16.18c4.369,4.369,11.47,4.35,15.826-0.006l35.368-35.368    c4.372-4.372,11.475-4.356,15.832,0l35.368,35.368c4.372,4.372,11.463,4.369,15.826,0.006l16.18-16.18    c4.369-4.369,4.35-11.47-0.006-15.826l-35.368-35.368c-4.372-4.372-4.356-11.475,0-15.832L275.284,116.716z"></path>';
     		htmlString += '</svg>';
     		htmlString += '</div>';
     		htmlString += '</div>';
     		htmlString += '</div>';
     		htmlString += '<div id="chatconversation">';
     		htmlString += '<div class="chat-message-group local" id="userQuestions"  >';
											/* <!-- <div class="chatmessage-wrapper">
														<div class="chatmessage ">
															<div class="replywrapper">
																<div class="messagecontent">
																	<div class="usermessage">can you answer me</div>
																</div>
															</div>
														</div>
														<div class="timestamp">14:31</div>
													</div> --> */
			htmlString += '</div>';
			htmlString += '<div></div>';
			htmlString += '</div>';
									/* <!-- <div id="chat-input" style="display:none">
										<div class="usrmsg-form">
											<textarea id="usermsg" placeholder="Type a message" style="height: 32px;"></textarea>
										</div>
									</div> --> */
			htmlString += '</div>';
			htmlString += '<div  id="questionUserChatBox" class="sideToolbarContainer slideInExt questionChatBox" style="display: none; z-index:999;overflow-y: auto;overflow-x:hidden;z-index:999">';
			htmlString += '<div class="chat-header">';
			htmlString += '<h2 class="chatTitle">Ask Your Question</h2>';
			htmlString += '<div class="chat-close" onclick="closeUserForm()">';
			htmlString += '<div class="jitsi-icon ">';
			htmlString += '<svg height="24" width="24" viewBox="0 0 400 400">';
			htmlString += '<path d="M275.284,116.716c4.372-4.372,4.369-11.463,0.006-15.826l-16.18-16.18c-4.369-4.369-11.47-4.35-15.826,0.006    l-35.368,35.368c-4.372,4.372-11.475,4.356-15.832,0l-35.368-35.368c-4.372-4.372-11.463-4.369-15.826-0.006l-16.18,16.18    c-4.369,4.369-4.35,11.47,0.006,15.826l35.368,35.368c4.372,4.372,4.356,11.475,0,15.832l-35.368,35.368    c-4.372,4.372-4.369,11.463-0.006,15.826l16.18,16.18c4.369,4.369,11.47,4.35,15.826-0.006l35.368-35.368    c4.372-4.372,11.475-4.356,15.832,0l35.368,35.368c4.372,4.372,11.463,4.369,15.826,0.006l16.18-16.18    c4.369-4.369,4.35-11.47-0.006-15.826l-35.368-35.368c-4.372-4.372-4.356-11.475,0-15.832L275.284,116.716z"></path>';
			htmlString += '</svg>';
			htmlString += '</div>';
			htmlString += '</div>';
			htmlString += '</div>';
			htmlString += '<div id="chatconversation">';
			htmlString += '<div class="chat-message-group local" id="attachMsg">';
			htmlString += '</div>';
			htmlString += '<div></div>';
			htmlString += '</div>';
			htmlString += '<div id="chat-input" >';
			htmlString += '<div class="usrmsg-form">';
			htmlString += '<textarea id="qusetion" placeholder="Type a question" style="height: 32px;" onkeypress="return insertQuestion(event)" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Type a question\'"></textarea>';
			htmlString += '</div>';
			htmlString += '</div>';
			htmlString += '</div>';
    		//question end -->
    
    		//Update Profile (start) -->
   			htmlString += '<div id="dvUpdateProfile" class="popBox" style="display: none;">';
   			htmlString += '<div class="popBoxInner">';
   			htmlString += '<div class="popBoxHeader" id="dvUpdateProfileTitle"></div>';
   			htmlString += '<div class="popBoxBody" id="dvUpdateProfileBody" style="overflow-y: auto; max-height: 380px;">';
   			htmlString += '<form id="filecatcher2">';
   			htmlString += '<table class="tableNoBorder" style="width:100%;">';  
   			htmlString += '<tbody><tr>';
   			htmlString += '<td><input type="text" maxlength="50" class="textBox" placeholder="Name" id="txtProfileUserName"></td>';
   			htmlString += '<td>';
   			htmlString += '<input type="text" maxlength="50" class="textBox" placeholder="Mobile" id="txtUserMobile" readonly="readonly">';
   			htmlString += '</td>';
   			htmlString += '</tr>';
   			htmlString += '<tr>';
   			htmlString += '<td><input type="text" class="textBox" placeholder="Email Address" id="txtUserEmail" style="color: #000000;"></td>';
   			htmlString += '<td>';
   			htmlString += '<span class="relativeDivBlock">';
   			htmlString += '<span class="popPrevIcon" id="spnEyeViewUpdateProfile"><img onclick="showInputHidePassword(\'show\', \'txtUserPassword\', \'spnEyeViewUpdateProfile\')" src="images/eye.png" alt="View"></span>';
   			htmlString += '<input type="password" maxlength="50" class="textBox" placeholder="Password" id="txtUserPassword">';
   			htmlString += '</span>';
   			htmlString += '</td>';
   			htmlString += '</tr>';
   			htmlString += '<tr>';
   			htmlString += '<td valign="top">';
   			htmlString += '<div class="cstomFile">';
   			htmlString += '<label for="addfile-input2" class="custom-file-upload fileBtn">'+APP.translation.generateTranslationHTML("userDefinedPopup.uploadProfilePic")+'</label>';
   			htmlString += '<input id="addfile-input2" name="files[]" multiple="" onchange="uploadFilesOnChange(this, \'file-list-display2\')" class="file-upload centerDatasheet" type="file" style="display:none;">';
   			htmlString += '</div>';
   			htmlString += '</td>';
   			htmlString += '<td colspan="2"><div class="file-list-display" id="file-list-display2"></div></td>';
   			htmlString += '</tr>';
   			htmlString += '</tbody></table>';
   			htmlString += '</form>';
   			htmlString += '</div>';
   			htmlString += '<div class="popBoxFooter">';
   			htmlString += '<button class="cancelButton" onclick="hideProfileUpdate()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
   			htmlString += '<button id="butSave" onclick="updateprofile()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butUpdate")+'</button>';
   			htmlString += '<button class="wipeButton" onclick="openWipeAccount()">'+APP.translation.generateTranslationHTML("userDefinedPopup.labelWipeAccount")+'</button>';
   			htmlString += '</div>';
   			htmlString += '</div>';          
   			htmlString += '</div>';
    		//Update Profile (end) -->
    		//Schedule create new meeting (end) -->
    
    		//Audio container (start) -->
    		htmlString += '<div id="dvAudioContainer"></div>';
    		//Audio container (end) -->
    
    		//wipe account (start) -->
   			htmlString += '<div id="dvWipeAccount" class="popBox" style="display: none;">';
   			htmlString += '<div class="popBoxInner">';
   			htmlString += '<div class="popBoxHeader"><h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.labelWipeAccount")+'</h5></div>';
   			htmlString += '<div class="popBoxBody relativeDiv">';         
   			htmlString += '<span class="relativeDivBlock">';
   			htmlString += '<h6>'+APP.translation.generateTranslationHTML("userDefinedPopup.deletedVideoMeetSystem")+'</h6>';
   			htmlString += '1. '+APP.translation.generateTranslationHTML("userDefinedPopup.accountDetails")+'<br>';
   			htmlString += '2. '+APP.translation.generateTranslationHTML("userDefinedPopup.roomDetails")+'<br>';
   			htmlString += '3. '+APP.translation.generateTranslationHTML("userDefinedPopup.panelistParticipant")+'<br>';
   			htmlString += '4. '+APP.translation.generateTranslationHTML("userDefinedPopup.labelDocumentsAndLogo")+'<br>';
   			htmlString += '5. '+APP.translation.generateTranslationHTML("userDefinedPopup.labelRecordings")+'<br>';
   			htmlString += '6. '+APP.translation.generateTranslationHTML("userDefinedPopup.labelChatMessages")+'<br><br>';
   			htmlString += '<p>'+APP.translation.generateTranslationHTML("userDefinedPopup.yesIUnderStand")+'</p>';
   			htmlString += '<input type="text" id="txtwipeuser" name="txtwipeuser" placeholder="Enter your username" class="textBox"></textarea>';
   			htmlString += '</span>';
   			htmlString += '</div>';
   			htmlString += '<div class="popBoxFooter">';
   			htmlString += '<button class="cancelButton" onclick="hideWipeAccount()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
   			htmlString += '<button onclick="wipeAccount()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butWipeNow")+'</button>';
   			htmlString += '</div>';
   			htmlString += '</div>';          
   			htmlString += '</div>';
			//wipe account (end) -->
	
			//delete message (start) -->
   			htmlString += '<div id="dvDeleteMessage" class="popBox" style="display: none;">';
   			htmlString += '<div class="popBoxInner">';
   			htmlString += '<div class="popBoxHeader" id="dvDeleteMessageTitle"></div>';
   			htmlString += '<div class="popBoxBody relativeDiv">';         
   			htmlString += '<span class="relativeDivBlock" id="spnDeleteMessageBody"></span>';
   			htmlString += '</div>';
   			htmlString += '<div class="popBoxFooter">';
   			htmlString += '<button class="cancelButton" onclick="hideDeteteMessage()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+'</button>';
   			htmlString += '<span id="spnDeleteMessageBut"></span>';
   			htmlString += '</div>';
   			htmlString += '</div>';          
   			htmlString += '</div>';
			//delete message (end) -->

			//Echo Test (start) -->
    		htmlString += '<div id="dvEchoTest" class="popBox" style="display:none;">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader"><h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.videomeetEchoTest")+'</h5>';
    		htmlString += '<a href="" class="videoHelpClose" onclick="hideEchoTest()">';
    		htmlString += '<img src="images/cross.svg" alt="Close" title="Close">';
    		htmlString += '</a>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxBody" style="overflow-y:auto;">';
    		htmlString += '<div id="controls">';
    		htmlString += '<button id="recordButton">'+APP.translation.generateTranslationHTML("userDefinedPopup.butRecord")+'</button>';
    		htmlString += '<button class="cancelButton" id="pauseButton" disabled>'+APP.translation.generateTranslationHTML("userDefinedPopup.butPause")+'</button>';
    		htmlString += '<button id="stopButton" disabled>'+APP.translation.generateTranslationHTML("userDefinedPopup.butStop")+'</button>';
    		htmlString += '</div>';		    
		  	/* <!-- <p><strong>Recordings:</strong></p> --> */
		  	htmlString += '<ol id="recordingsList"></ol>';
		  	htmlString += '</div>';
        	/* <!-- <div class="popBoxFooter">
        	<button class="cancelButton" onclick="hideEchoTest()">Close</button>
        	</div> --> */
        	htmlString += '</div>';          
        	htmlString += '</div>';
    		//Echo Test (end) -->
    
     		//Show list of my chat (start) -->
      		htmlString += '<input type="hidden" class="textBox" id="hidRoomName" name="hidRoomName"/>';
      		htmlString += '<div id="dvListOfMyChat" class="popBox" style="display:none; z-index: 999;">';
      		htmlString += '<div class="popBoxInner">';
      		htmlString += '<div class="popBoxHeader" id="dvListOfMyChatTitle"></div>';
      		htmlString += '<div class="popBoxBody" id="dvListOfMyChatTable" style="overflow-y:auto;"></div>';
      		htmlString += '<div class="popBoxFooter">';
      		htmlString += '<span id="spnHideMyChat"></span>';
      		htmlString += '</div>';
      		htmlString += '</div>';          
      		htmlString += '</div>';
    		//Show list of my chat (end) -->
    
    		htmlString += '<div id="dvWaitSms" class="popBox" style="display:none;z-index: 9999">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader"><h5>'+APP.translation.generateTranslationHTML("userDefinedPopup.butSendMessage")+'</h5></div>';
    		htmlString += '<div class="popBoxBody" id="dvWaitSmsBody" style="overflow-y:auto;">';
    		htmlString += '<form id="filecatcher">';
    		htmlString += '<table class="tableNoBorder" style="width:100%;">';  
    		htmlString += '<tr>';
    		htmlString += '<td colspan="2">';
    		htmlString += '<select id="dropWaitSms" class="selectBox">';
    		htmlString += '<option value="1">'+APP.translation.generateTranslationHTML("userDefinedPopup.meetingStart5mins")+'</option>';
    		htmlString += '<option value="2">'+APP.translation.generateTranslationHTML("userDefinedPopup.meetingStart10mins")+'</option>';
    		htmlString += '<option value="3">'+APP.translation.generateTranslationHTML("userDefinedPopup.meetingStartSoon")+'</option>';
    		htmlString += '<option value="4">'+APP.translation.generateTranslationHTML("userDefinedPopup.meetingCancelled")+'</option>';
    		htmlString += '<option value="5">'+APP.translation.generateTranslationHTML("userDefinedPopup.meetingReScheduled")+'</option>';
    		htmlString += '<option value="6">'+APP.translation.generateTranslationHTML("userDefinedPopup.microphoneOnMuteRequest")+'</option>';
    		htmlString += '</select>';
    		htmlString += '</td>';
    		htmlString += '</tr>';
    		htmlString += '<tr>';
    		htmlString += '<td colspan="2"><textarea id="waitsms" class="textareaBox" placeholder="Type a message" style="height: 32px;" ></textarea></td>';
    		htmlString += '</tr>';
    		htmlString += '</table>';
    		htmlString += '</form>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<button class="cancelButton" onclick="hideWaitMsg()">'+APP.translation.generateTranslationHTML("userDefinedPopup.butCancel")+'</button>';
    		htmlString += '<button id="butsms" onclick="sendWaitSms()" >'+APP.translation.generateTranslationHTML("userDefinedPopup.butSend")+'</button>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    
    		//Poll Div Start -->
    		htmlString += '<div id="dvPoll" class="popBox" style="display: none;z-index: 9999">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader" id="dvUpdateProfileTitle"><h5><span>Poll</span></h5>';
    		htmlString += '<a onclick="closePollDiv()" class="videoHelpClose">';
    		htmlString += '<img src="images/cross.svg" alt="Close" title="Close">';
    		htmlString += '</a>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxBody relativeDiv" style="max-height:400px; overflow-x:hidden;overflow-y:auto">';         
    		htmlString += '<div class="pollTitle">';
    		htmlString += '<label>Question *</label>';
    		htmlString += '<input type="text" class="pollLegend" id="pollTitle">';
    		htmlString += '</div>';
    		htmlString += '<div class="pollTextBox">';            
    		htmlString += '<input type="text" class="polltextBox pollopttext" placeholder="Option 1 *" id="pollOption1">';
    		htmlString += '</div>';
    		htmlString += '<div class="pollTextBox" id="polltext2">';            
    		htmlString += '<input type="text" class="polltextBox pollopttext" placeholder="Option 2 *" id="pollOption2">';
    		htmlString += '</div>';
    		htmlString += '<div class="pollTextBox">'; 
    		htmlString += '<button class="pollBorderBtn" onclick="addPollOption()" > <img src="images/plus.svg"> <span>Add Options</span></button>';
    		htmlString += '</div>';
    		htmlString += '<div class="pollTextBox pollMar20">'; 
    		htmlString += '<input type="checkbox" id="annoymous" checked="checked">';
    		htmlString += '<label for="annoymous" class="checkLabel">Anonymous poll</label>';
    		htmlString += '</div>'; 
    		htmlString += '<div class="pollTextBox" style=\'display:none\'>'; 
    		htmlString += '<input type="checkbox" id="notify">';
    		htmlString += '<label for="notify" class="checkLabel">Notify all attendees</label>';                
    		htmlString += '</div>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter">';
    		htmlString += '<button class="cancelButton" onclick="closePollDiv()"> <span>Cancel</span></button>';
    		htmlString += '<button onclick="savePollData()"> <span>Launch Poll</span></button>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		//Poll Div End -->
    
    		//Poll Result Start -->
    		htmlString += '<input type="hidden" id="hidPollId" name="hidPollId"/>';
    		htmlString += '<div id="dvPoll" class="popBox dvResultPoll" style="display: none;z-index: 9999">';
    		htmlString += '<div class="popBoxInner">';
    		htmlString += '<div class="popBoxHeader"><h5><span id="dvUpdatePollTitle">Poll</span></h5>';
    		htmlString += '<button id="pollEndBtn" style="display: none;" onclick="endPoll();">Poll End</button>';
    		htmlString += '<a onclick="hidePollResultPopUp()" class="videoHelpClose">';
    		htmlString += '<img src="images/cross.svg" alt="Close" title="Close">';
    		htmlString += '</a>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxBody relativeDiv">';         
    		htmlString += '<div class="pollTextBox">';
    		htmlString += '<label>QUESTION</label>';
    		htmlString += '<div class="questionAnswer" style="word-break: break-all;">How to Live Stream with VideoMeet</div>';
    		htmlString += '</div>';
    		htmlString += '<div class="pollTextBox pollMar20" id="pollenddatediv" style="display: none;">'; 
    		htmlString += '<label>EXPIRATION</label>';
    		htmlString += '<div class="pollenddate"></div>';    
    		htmlString += '</div>';
    		htmlString += '<div class="pollTextBox pollMar20" id="pollOptions">'; 
    		htmlString += '<label id="attachOptions">RESPONSES</label>';
    		htmlString += ' </div>';
    		htmlString += '<div class="pollTextBox padT15" id="filepollparticipant" style="display: none;">';
    		htmlString += '<span><a href="#" class="target" target="_blank">Download</a></span> list of participants in excel format.</span>';
    		htmlString += '</div>';
    		htmlString += '</div>';
    		htmlString += '<div class="popBoxFooter participantVoteFooter">';
    		htmlString += '<button class="cancelButton" onclick="hidePollResultPopUp()"> <span>Cancel</span></button>';
    		htmlString += '<button onclick="saveParticipantVote()"> <span>Submit Answer</span></button>';
    		htmlString += '</div>';
    		htmlString += '</div>';          
    		htmlString += '</div>';
    		htmlString += '<div id="dvPollEndconfirmationDetail" class="popBox" style="display: none;">';
    		htmlString += '<div class="popBoxInner" style="width: 293px">';
    		htmlString += '<div class="popBoxBody txtCenter relativeDiv">';
    		htmlString += '<h5>Are You Sure to end poll?</h5>';
    		htmlString += '<button class="cancelButton" onclick="hideendconfirmation()">Close</button>';      
    		htmlString += '<button class="btnMail" onclick="pollendconfirmation()">Submit</button>';
    		htmlString += '</div>';
    		htmlString += '</div>';
    		htmlString += '</div>';
    		//Poll Result End -->
  	    	
  	    	document.getElementById("dvHtmlString").innerHTML = htmlString;
  		}
  		renderHtmlUserDefined();
  	</script>
    <script>
	    var fileList = [];
		function uploadFilesOnChange(obj, displayContainerId) {
			var val = $(obj).val().toLowerCase();
			
			if (displayContainerId == 'file-list-display2'){
				
				regex = new RegExp("(.*?)\.(gif|jpeg|png|bmp|jpg)$");
				
				if (!(regex.test(val))) {
		            $(obj).val('');
		            alert('Please select correct file format.</br>Only following file format allowed (gif,jpeg,png,bmp,jpg)');
		            return false;
		        }
		        
			}else{
				regex = new RegExp("(.*?)\.(docx|doc|pdf|ppt|xls)$");
				
				if (!(regex.test(val))) {
		            $(obj).val('');
		            alert('Please select correct file format.</br>Only following file format allowed (docx,doc,pdf,ppt,xls)');
		            return false;
		        }
		        
			}
            

	        
			console.log('This file size is: ' + obj.files[0].size/1024/1024 + "MB");
			var FileSize = obj.files[0].size / 1024 / 1024; // in MB
			if (FileSize > 1) {
	            alert('File size exceeds 1 MB');
	           $(obj).val(''); //for clearing with Jquery
	           return false;
	        }
			fileList = [];
			var fileListDisplay = document.getElementById(displayContainerId);
			fileListDisplay.innerHTML = '';
			var fileDisplay;
		    for (var i = 0; i < obj.files.length; i++) {
		    	fileList.push(obj.files[i]);
		    	fileDisplay = document.createElement('p');
		    	fileDisplay.innerHTML = obj.files[i].name;
		        fileListDisplay.appendChild(fileDisplay);
		    }
		}
		
		var fileList1 = [];
		function uploadFilesOnChange1(obj, displayContainerId) {
			fileList1 = [];
			var fileListDisplay = document.getElementById(displayContainerId);
			fileListDisplay.innerHTML = '';
			var fileDisplay;
		    for (var i = 0; i < obj.files.length; i++) {
		    	fileList.push(obj.files[i]);
		    	fileDisplay = document.createElement('p');
		    	fileDisplay.innerHTML = obj.files[i].name;
		        fileListDisplay.appendChild(fileDisplay);
		    }
		}
		
		function addRowInTable() {
			var table = document.getElementById("tblUploadFiles");
			var rowCount = table.rows.length;
			
			var cell1Html = "<div class='cstomFile'>";
			cell1Html += "<form id='file-catcher"+rowCount+"'>";
			cell1Html += "<label id='file-input1"+rowCount+"' for='file-input"+rowCount+"' class='custom-file-upload fileBtn'>Upload Files</label>";
			cell1Html += "<input id='file-input"+rowCount+"' onchange=\"uploadFilesOnChange(this, 'file-list-display"+rowCount+"')\" class='file-upload centerDatasheet' name='datasheet' type='file' style='display:none;'>";
			cell1Html += "</form>";
			cell1Html += "</div>";
			//var cell2Html = "<button id='myShow1' class='cancelButton' onclick='myShow1()'>Add More</button>";
			var cell2Html = "<div class='file-list-display' id='file-list-display"+rowCount+"'></div>";
			
			/* var row = table.insertRow(rowCount);
			var cell1 = row.insertCell(0);
		    var cell2 = row.insertCell(1);
		    var cell3 = row.insertCell(2);
		    cell1.innerHTML = cell1Html;
		    cell2.innerHTML = cell2Html;
		    cell3.innerHTML = cell3Html; */
			var row = table.insertRow(rowCount);
			var cell1 = row.insertCell(0);
		    var cell2 = row.insertCell(1);
		    cell1.innerHTML = cell1Html;
		    cell2.innerHTML = cell2Html;
		}
    </script>
    <script>
    	document.getElementById('dvContent').addEventListener('paste', handlePaste);
    	function handlePaste(e) {
    	    var clipboardData, pastedData;

    	    // Stop data actually being pasted into div
    	    e.stopPropagation();
    	    e.preventDefault();

    	    // Get pasted data via clipboard API
    	    clipboardData = e.clipboardData || window.clipboardData;
    	    pastedData = clipboardData.getData('Text');

    	    // Do whatever with pasteddata
    	    document.getElementById("dvContent").innerHTML = "<div id='speech' style='position:absolute;'>"+pastedData+"</div>";
    		document.getElementById("dvContent").scrollTop = "0px";
    		document.getElementById("dialogProgress").style.display = "none";
    		document.getElementById("butPlayPause").src = "images/playIcon.jpg";
    		init();
    	}
    	
    	function showTeleprompter() {
    		document.getElementById("dvTeleprompter").style.display = "block";
    	}
    	
    	function hideTeleprompter() {
    		document.getElementById("dvTeleprompter").style.display = "none";
    	}
    	
    	function toggleDialogProgress() {
			var x = document.getElementById("dialogProgress");
		  	if (x.style.display === "none") {
		    	x.style.display = "block";
		    	document.getElementById("butPlayPause").src = "images/pauseIcon.jpg";
		  	} else {
		    	x.style.display = "none";
		    	document.getElementById("butPlayPause").src = "images/playIcon.jpg";
		  	}
		}
    	
    	var scroll = function(element) {
    		var scrolling = null;
            var inc = 1;
            var wait = 50;
            var getYpos = function() {
            	var ypos = element.offsetTop;
                /* var thisNode = element;
                while (thisNode.offsetParent &&  (thisNode.offsetParent != document.body)) {
                	thisNode = thisNode.offsetParent;
                    ypos += thisNode.offsetTop;
            	} */
                return ypos;
            };

            var doScroll = function() {
            	var y = parseInt(getYpos(),10);
                y=y-inc;
                y=y+"px";
                element.style.top = y;
                scrolling = window.setTimeout(doScroll,wait);
            };

            var toggleScrolling = function() {
            	if (scrolling) {
                	window.clearTimeout(scrolling);
                    scrolling = null;
                } else {
                	doScroll();
                }
            };

            //element.onclick = toggleScrolling;
            document.getElementById("butPlayPause").onclick = toggleScrolling;

            var keys = function(key) {
            	if (!key) {
                	key = event;
                    key.which = key.keyCode;
                }
                switch (key.which) {
                	case 221:        // ]
                    	if (scrolling) {
                    		inc++;
                    	}
                   		break;
               		case 219:        // [
                        if (scrolling && inc>1) {
                        	inc--;
                        }
                        break;
                   	case 10:        // return
                    case 13:        // enter
                    	toggleScrolling();
                        break;
            	}
                return false;
            };
            document.onkeyup = keys;
   		};
   		
   		var init = function() {
            if (document.getElementById && document.getElementById("speech")) {
            	scroll(document.getElementById("speech"));
            }
   		};
   		
   		function addLoadEvent(func) {
		  	var oldonload = window.onload;
		  	if (typeof window.onload != 'function') {
		    	window.onload = func;
		  	} else {
		    	window.onload = function() {
		      		if (oldonload) {
		        		oldonload();
		      		}
		      		func();
		    	}
		  	}
   		}
    </script>
    <script>
    	// flatpickr('selector', options);
 		flatpickr('#txtMeetingDate',{
 			 // A string of characters which are used to define how the date will be displayed in the input box. 
 			 dateFormat: 'd-m-Y',

 			 // Whether clicking on the input should open the picker. You could disable this if you wish to open the calendar manually with.open()
 			 clickOpens: true,

 			 // Sets the initial selected date(s).
 			 // If you're using mode: "multiple" or a range calendar supply an Array of Date objects or an Array of date strings which follow your dateFormat.
 			 // Otherwise, you can supply a single Date object or a date string.
 			 defaultDate: null,  
 			  
 			 // Initial value of the hour element.
 			 defaultHour: 12,  

 			 // Initial value of the minute element.  
 			 defaultMinute: 0, 

 			 // The minimum date that a user can start picking from, as a JavaScript Date.
 			 minDate: null,

 			 // The maximum date that a user can pick to, as a JavaScript Date. 
 			 maxDate: null,

 			 // Enables time picker
 			 enableTime: false, 

 			 // Enables seconds in the time picker.
 			 enableSeconds: false, 

 			 // Displays time picker in 24 hour mode without AM/PM selection when enabled. 
 			 time_24hr: false,
 			 
 			 // Hides the day selection in calendar.
 			 // Use it along with enableTime to create a time picker.
 			 noCalendar: false 
 		});
 		
 		flatpickr('#txtMeetingTime',{
			 // A string of characters which are used to define how the date will be displayed in the input box. 
			 dateFormat: 'H:i',

			 // Whether clicking on the input should open the picker. You could disable this if you wish to open the calendar manually with.open()
			 clickOpens: true,

			 // Sets the initial selected date(s).
			 // If you're using mode: "multiple" or a range calendar supply an Array of Date objects or an Array of date strings which follow your dateFormat.
			 // Otherwise, you can supply a single Date object or a date string.
			 defaultDate: null,  
			  
			 // Initial value of the hour element.
			 defaultHour: 12,  

			 // Initial value of the minute element.  
			 defaultMinute: 0, 

			 // The minimum date that a user can start picking from, as a JavaScript Date.
			 minDate: null,

			 // The maximum date that a user can pick to, as a JavaScript Date. 
			 maxDate: null,

			 // Enables time picker
			 enableTime: true, 

			 // Enables seconds in the time picker.
			 enableSeconds: false, 

			 // Displays time picker in 24 hour mode without AM/PM selection when enabled. 
			 time_24hr: true,
			 
			 // Hides the day selection in calendar.
			 // Use it along with enableTime to create a time picker.
			 noCalendar: true 
		});
 		
 		flatpickr('#txtHistoryFromDate',{
			 // A string of characters which are used to define how the date will be displayed in the input box. 
			 dateFormat: 'd-m-Y',

			 // Whether clicking on the input should open the picker. You could disable this if you wish to open the calendar manually with.open()
			 clickOpens: true,

			 // Sets the initial selected date(s).
			 // If you're using mode: "multiple" or a range calendar supply an Array of Date objects or an Array of date strings which follow your dateFormat.
			 // Otherwise, you can supply a single Date object or a date string.
			 defaultDate: null,  
			  
			 // Initial value of the hour element.
			 defaultHour: 12,  

			 // Initial value of the minute element.  
			 defaultMinute: 0, 

			 // The minimum date that a user can start picking from, as a JavaScript Date.
			 minDate: null,

			 // The maximum date that a user can pick to, as a JavaScript Date. 
			 maxDate: null,

			 // Enables time picker
			 enableTime: false, 

			 // Enables seconds in the time picker.
			 enableSeconds: false, 

			 // Displays time picker in 24 hour mode without AM/PM selection when enabled. 
			 time_24hr: false,
			 
			 // Hides the day selection in calendar.
			 // Use it along with enableTime to create a time picker.
			 noCalendar: false 
		});
 		
 		flatpickr('#txtHistoryToDate',{
			 // A string of characters which are used to define how the date will be displayed in the input box. 
			 dateFormat: 'd-m-Y',

			 // Whether clicking on the input should open the picker. You could disable this if you wish to open the calendar manually with.open()
			 clickOpens: true,

			 // Sets the initial selected date(s).
			 // If you're using mode: "multiple" or a range calendar supply an Array of Date objects or an Array of date strings which follow your dateFormat.
			 // Otherwise, you can supply a single Date object or a date string.
			 defaultDate: null,  
			  
			 // Initial value of the hour element.
			 defaultHour: 12,  

			 // Initial value of the minute element.  
			 defaultMinute: 0, 

			 // The minimum date that a user can start picking from, as a JavaScript Date.
			 minDate: null,

			 // The maximum date that a user can pick to, as a JavaScript Date. 
			 maxDate: null,

			 // Enables time picker
			 enableTime: false, 

			 // Enables seconds in the time picker.
			 enableSeconds: false, 

			 // Displays time picker in 24 hour mode without AM/PM selection when enabled. 
			 time_24hr: false,
			 
			 // Hides the day selection in calendar.
			 // Use it along with enableTime to create a time picker.
			 noCalendar: false 
		});
 		
 		(function() {
 		   //if()
 			//location.href = "/"
 			//alert("window.location.href :: "+window.location.href);
 			
 		   //toolbox icon click close popup
 			$(document).on("click", ".toolbox-button", function(){
					
 				if(sessionStorage.getItem("check_user_is_moderator") == "YES") {
 					closeForm();
 				}else{
 					closeUserForm();
 				}
	
 			});
 			
 			//Body click close popup
 			$(document).on("click", "#sharedVideo", function(){
				
 				if(sessionStorage.getItem("check_user_is_moderator") == "YES") {
 					closeForm();
 				}else{
 					closeUserForm();
 				}
	
 			});
 			
 			//wipe account via textbox enter event
 			
 			$(document).on("keypress", "#txtwipeuser", function(e) {
 			     if (e.which == 13) {
 			        	wipeAccount();
 			     }
 			});
 			
 		})();
 		
		function inviteMail(flag,meetingTopic,scheduleTime,hostname,roomname, code,roomPassword,emailAddress,username){
			var mailBody="";
			var subject="Meeting Invitation";
			
			if(flag==1){
				mailBody="Dear <b> $$username </b><br/><br/> <b>$$hostname</b> is inviting you to a scheduled VideoMeet.<br/> Topic: $$topic<br/> Date Time: $$dateTime<br/><br/> Join VideoMeet:<br/> Meeting Room Name : $$roomName<br/> Meeting Password: $$meetingPass<br/> Panelist Code : $$panelistCode<br/><br/> On your computer / laptop :Visit:- <a href='https://bridge01.videomeet.in'>https://bridge01.videomeet.in</a><br/> Enter your name and room name as mentioned above.<br/><br/> On your Android :<br/> Install App from Playstore by clicking on the <a href='https://play.google.com/store/apps/details?id=com.datainfosys.videomeet'>https://play.google.com/store/apps/details?id=com.datainfosys.videomeet</a> and after installation enter your name and room name as above.<br/><br/> On your iPhone :<br/> Install App from Playstore by clicking on the <a href='https://apps.apple.com/us/app/videomeet-audio-video/id1346514570'>https://apps.apple.com/us/app/videomeet-audio-video/id1346514570</a> and after installation enter your name and room name as above.<br/></br>";
				mailBody=mailBody.replace("$$meetingPass", roomPassword);
			}else if(flag==0){
				mailBody="Dear <b> $$username </b><br/><br/> <b>$$hostname</b> is inviting you to a scheduled VideoMeet.<br/> Topic: $$topic<br/> Date Time: $$dateTime<br/><br/> Join VideoMeet:<br/> Meeting Room Name : $$roomName<br/> Panelist Code : $$panelistCode<br/><br/> On your computer / laptop :Visit:- <a href='https://bridge01.videomeet.in'>https://bridge01.videomeet.in</a><br/> Enter your name and room name as mentioned above.<br/><br/> On your Android :<br/> Install App from Playstore by clicking on the <a href='https://play.google.com/store/apps/details?id=com.datainfosys.videomeet'>https://play.google.com/store/apps/details?id=com.datainfosys.videomeet</a> and after installation enter your name and room name as above.<br/><br/> On your iPhone :<br/> Install App from Playstore by clicking on the <a href='https://apps.apple.com/us/app/videomeet-audio-video/id1346514570'>https://apps.apple.com/us/app/videomeet-audio-video/id1346514570</a> and after installation enter your name and room name as above.<br/></br>Please join the meeting by using the password sent to you in separate email. In case you have no received the password, please contact the host. ";
			}else{
				mailBody="Dear <b> $$username </b><br/><br/> You have already received email from <b>$$hostname</b> to join the meeting <b>$$topic</b><br/> You will need the password to join the meeting.<br/><br/> Room Password: $$meetingPass<br/><br/> Please join the meeting by using the above password.<br/> The joining details are being sent in separate email.<br/><br/> In case of any issue, please contact the host.<br/><br/> VideoMeet.";
				mailBody=mailBody.replace("$$meetingPass", roomPassword);
			}
			
			mailBody=mailBody.replace("$$username", username+",");
			mailBody=mailBody.replace("$$hostname", hostname);
			mailBody=mailBody.replace("$$topic", meetingTopic);
			mailBody=mailBody.replace("$$dateTime", scheduleTime);
			mailBody=mailBody.replace("$$roomName", roomname);
			mailBody=mailBody.replace("$$panelistCode", code);
			sendInviteMail(subject,mailBody,emailAddress);
		}
		function sendInviteMail(subject,mailBody,emailAddress) {
			
			if(emailAddress=="") {
				alert("Please enter mail address !");
				return false;
			}
			
			var myurl = apiURL + "mail.php/";
			var path = "authkey=M2atKiuCGKOo9Mj3&to="+emailAddress+"&subject="+subject+"&body="+mailBody;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					//responseTEXT = eval('(' + responseTEXT + ')');
					alert(responseTEXT.msg);
					
				}
			};
			myRequest.send(path);
		}
		
		function handleClick(myRadio) {
		    /* if(myRadio.value==0){
		    	$("#userEmail").css('display','none');
		    }else{
		    	$("#userEmail").css('display','block');
		    } */
		}
		
		
		function shareParticipantMail(flag,meetingTopic,scheduleTime,roomname,conferenceId,hostname){
			var mailBody="";
			var roomPassword="";
			var emailList="";
			var subject="Meeting Invitation";
			
			 $(".btnMail").prop('disabled', true);
			try {
	        	var myurl = apiURL + "participants.php/participantlist";
				var path = "authkey=M2atKiuCGKOo9Mj3&conferenceid="+conferenceId;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						if(responseTEXT.status == 1) {
							for(var i=0; i<responseTEXT.data.length; i++) {
							
								if(flag==1){
									mailBody="Dear <b> $$username </b><br/><br/> <b>$$hostname</b> is inviting you to a scheduled VideoMeet.<br/> Topic: $$topic<br/> Date Time: $$dateTime<br/><br/> Join VideoMeet:<br/> Meeting Room Name : $$roomName<br/> Meeting Password: $$meetingPass<br/> Panelist Code : $$panelistCode<br/><br/> On your computer / laptop :Visit:- <a href='https://bridge01.videomeet.in'>https://bridge01.videomeet.in</a><br/> Enter your name and room name as mentioned above.<br/><br/> On your Android :<br/> Install App from Playstore by clicking on the <a href='https://play.google.com/store/apps/details?id=com.datainfosys.videomeet'>https://play.google.com/store/apps/details?id=com.datainfosys.videomeet</a> and after installation enter your name and room name as above.<br/><br/> On your iPhone :<br/> Install App from Playstore by clicking on the <a href='https://apps.apple.com/us/app/videomeet-audio-video/id1346514570'>https://apps.apple.com/us/app/videomeet-audio-video/id1346514570</a> and after installation enter your name and room name as above.<br/></br>";
									mailBody=mailBody.replace("$$meetingPass", responseTEXT.data[i]["room_pass"]);
								}else if(flag==0){
									mailBody="Dear <b> $$username </b><br/><br/> <b>$$hostname</b> is inviting you to a scheduled VideoMeet.<br/> Topic: $$topic<br/> Date Time: $$dateTime<br/><br/> Join VideoMeet:<br/> Meeting Room Name : $$roomName<br/> Panelist Code : $$panelistCode<br/><br/> On your computer / laptop :Visit:- <a href='https://bridge01.videomeet.in'>https://bridge01.videomeet.in</a><br/> Enter your name and room name as mentioned above.<br/><br/> On your Android :<br/> Install App from Playstore by clicking on the <a href='https://play.google.com/store/apps/details?id=com.datainfosys.videomeet'>https://play.google.com/store/apps/details?id=com.datainfosys.videomeet</a> and after installation enter your name and room name as above.<br/><br/> On your iPhone :<br/> Install App from Playstore by clicking on the <a href='https://apps.apple.com/us/app/videomeet-audio-video/id1346514570'>https://apps.apple.com/us/app/videomeet-audio-video/id1346514570</a> and after installation enter your name and room name as above.<br/></br>Please join the meeting by using the password sent to you in separate email. In case you have no received the password, please contact the host.";
								}else{
									mailBody="Dear <b> $$username </b><br/><br/> You have already received email from <b>$$hostname</b> to join the meeting <b>$$topic</b>.<br/><br/> You will need the password to join the meeting.<br/> Room Password: $$meetingPass<br/><br/> Please join the meeting by using the above password.<br/> The joining details are  being sent in separate email.<br/><br/> In case of any issue, please contact the host.<br/><br/> VideoMeet.";
									mailBody=mailBody.replace("$$meetingPass", responseTEXT.data[i]["room_pass"]);
								}
								
								mailBody=mailBody.replace("$$hostname", hostname);
								mailBody=mailBody.replace("$$topic", meetingTopic);
								mailBody=mailBody.replace("$$dateTime", scheduleTime);
								mailBody=mailBody.replace("$$roomName", roomname);
								mailBody=mailBody.replace("$$panelistCode", responseTEXT.data[i]["code"]);
								mailBody=mailBody.replace("$$username", responseTEXT.data[i]["name"]+",");
								sendAllInviteMail(subject,mailBody,responseTEXT.data[i]["email"]);
								
							}
							
						}else{
							alert("No Participant Available");
						} 
						
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while authenticating user:: "+e);
			}
			alert("Mail sent successfully.");
			$(".btnMail").prop('disabled', false);
	}
		
		function sendAllInviteMail(subject,mailBody,emailAddress) {
			
			if(emailAddress=="") {
				alert("Please enter mail address !");
				return false;
			}
			
			var myurl = apiURL + "mail1.php/";
			var path = "authkey=M2atKiuCGKOo9Mj3&to="+emailAddress+"&subject="+subject+"&body="+mailBody;
			//path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					//responseTEXT = eval('(' + responseTEXT + ')');
					//alert(responseTEXT.msg);
					
				}
			};
			myRequest.send(path);
		}
	
		function showRoomDetails(username,topic,conferencescheduletime,roomname,confrenceid,room_pass,meetingMode,waitingroomenable){
			
			
			if(room_pass==null || room_pass=='null'){
				room_pass="";
			}
			$("#editRommTr").css('display','table-row');
			$("#createRoomTr").css('display','none');
			$("#hideConferenceId").val(confrenceid);
			$("#txtMeetingTopicEdit").val(topic);
			$("#txtRoomNameEdit").val(roomname);
			//$("#txtRoomPassword").val(room_pass);
			//$("#txtRoomPassword").attr('disabled',true)
			if(meetingMode==1){
				$("#inpRadConference").prop('checked', true);
			}else if(meetingMode==2){
				$("#inpRadWebinar").prop('checked', true);
			}else{
				$("#inpRadSensitive").prop('checked', true);
			}
			
			if(waitingroomenable==1){
				$("#waitingroomid").prop('checked', true);
			}else{
				$("#waitingroomid").prop('checked', false);
			}
			
			var conferencescheduledatetime = conferencescheduletime.split(" ");
			
			var meetingDate = conferencescheduledatetime[0].split("-");
			
			var conferencescheduletime = meetingDate[2]+"-"+meetingDate[1]+"-"+meetingDate[0];
			
			var meetingTime = conferencescheduledatetime[1].split(":");
			
			$("#txtMeetingDate").val(conferencescheduletime);
			$("#txtMeetingTime").val(meetingTime[0]+":"+meetingTime[1]);
			$("#txtRoomPassword").val(room_pass);
			$("#txtRoomPassword").removeAttr('readonly');
			
			
			var username = document.getElementById("hidUserName").value;
			current_time = new Date();
			hour = current_time.getHours();
			minute = current_time.getMinutes();
			var greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodEvening")+" ";
			
			if((hour>=5 && minute>=0) && (hour<=11 && minute<=59)) {
				greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodMorning")+" ";
			} else if((hour>=12 && minute>=0) && (hour<=16 && minute<=59)) {
				greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodAfternoon")+" ";
			} else {
				greetingString = APP.translation.generateTranslationHTML("userDefinedPopup.goodEvening")+" ";
			}
			document.getElementById("dvSetTitle").innerHTML = "<h5>"+greetingString+document.getElementById("hidUserFullName").value.trim()+"</h5>";
			
			$(".cstomFile").css("display", "none");
			document.getElementById("txtRoomPassword").style.display = "block";
			document.getElementById("butEdit").style.display = "inline-block";
			document.getElementById("butSave").style.display = "none";
			document.getElementById("dvListScheduleMeeting").style.display = "none";
			document.getElementById("dvCreateNewMeetingBody").style.maxHeight  = (document.body.clientHeight-315)+"px";
			document.getElementById("dvCreateNewMeeting").style.display = "block";
			document.getElementById("txtMeetingTopicEdit").focus();

		}
		
		function editConference() {
			
        	var username = document.getElementById("hidUserName").value;
        	var meetingTopic = (document.getElementById("txtMeetingTopicEdit").value).trim();
        	var roomname = (document.getElementById("txtRoomNameEdit").value).trim().toLowerCase();
        	var meetingDate = (document.getElementById("txtMeetingDate").value).trim();
        	var meetingTime = (document.getElementById("txtMeetingTime").value).trim();
        	var meetingMode = document.getElementById("inpRadConference").value;
        	var roomPassword = (document.getElementById("txtRoomPassword").value).trim();
        	var waitingroom = 0;
        	if(document.getElementById("waitingroomid").checked)
        		waitingroom =1;
        	
        	if(document.getElementById("inpRadWebinar").checked==true)
        		meetingMode = document.getElementById("inpRadWebinar").value;
        	
        	if(meetingTopic=="") {
        		alert("Please enter meeting topic !");
        		document.getElementById("txtMeetingTopicEdit").focus();
        		return false;
        	}
        	
        	if(roomname=="") {
        		alert("Please enter room name !");
        		document.getElementById("txtRoomNameEdit").focus();
        		return false;
        	}
        	
        	if(meetingDate=="") {
        		alert("Please enter meeting date !");
        		document.getElementById("txtMeetingDate").focus();
        		return false;
        	} else if(meetingDate.indexOf("-")==-1) {
        		alert("Invalid meeting date !");
        		document.getElementById("txtMeetingDate").focus();
        		return false;
        	}
        	
        	if(meetingTime=="") {
        		alert("Please enter meeting time !");
        		document.getElementById("txtMeetingTime").focus();
        		return false;
        	} else if(meetingTime.indexOf(":")==-1) {
        		alert("Invalid meeting time !");
        		document.getElementById("txtMeetingTime").focus();
        		return false;
        	}
        	
        	/* if(roomPassword == "") {
        		alert("Please enter room password !");
        		return false;
        	} */
        	if(roomPassword != "") {
        		
        		if(roomPassword.length<5) {
    				alert("Invalid room password !");
    				return false;
    			}
        	}
        	
        	
        	var conferencescheduletime = meetingDate.split("-")[2]+"-"+meetingDate.split("-")[1]+"-"+meetingDate.split("-")[0]+" "+meetingTime; 
        	var expDate = new Date(meetingDate.split("-")[2]+","+meetingDate.split("-")[1]+","+meetingDate.split("-")[0]);
        	var expDate = new Date(expDate.getTime() + (7 * 24 * 60 * 60 * 1000));
        	var expiryMonth = expDate.getMonth()+1;
        	if((expDate.getMonth()+1)<10) 
        		expiryMonth = "0"+(expDate.getMonth()+1);
        	var expiryDay = expDate.getDate()
        	if(expDate.getDate()<10)
        		expiryDay = "0"+expDate.getDate();
        	var conferenceexpirationtime = expDate.getFullYear()+"-"+expiryMonth+"-"+expiryDay+" "+meetingTime;
        	var req_origin = "web";
        	
        	
        	var path = "authkey=M2atKiuCGKOo9Mj3&conferencescheduletime="+conferencescheduletime+"&topic="+meetingTopic+"&roomname="+roomname+"&conferenceexpirationtime="+conferenceexpirationtime+"&mode="+meetingMode+"&room_pass="+roomPassword+"&waitingroomenable="+waitingroom+"&confrenceid="+$("#hideConferenceId").val();
        	path = getEncFormData(path);
        	
        	var formData = new FormData(document.getElementById("filecatcher"));
        	/* formData.append("authkey", "M2atKiuCGKOo9Mj3");
        	//formData.append("username", username);
        	formData.append("conferencescheduletime", conferencescheduletime);
        	formData.append("topic", meetingTopic);
        	formData.append("roomname", roomname);
        	//formData.append("req_origin", req_origin);
        	formData.append("conferenceexpirationtime", conferenceexpirationtime);
        	formData.append("mode", meetingMode);
        	formData.append("room_pass", roomPassword);
        	formData.append("waitingroomenable", waitingroom);
        	formData.append("confrenceid", $("#hideConferenceId").val()); */
        	formData.append("formdata", path);
        	/* for (var x = 0; x < document.getElementById('file-input').files.length; x++) {
        		formData.append("image[]", document.getElementById('file-input').files[x]);
        	} */
        	
        	try {
            	var myurl = apiURL + "conference.php/update";
    			//var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&conferencescheduletime="+conferencescheduletime+"&topic="+meetingTopic+"&roomname="+roomname+"&req_origin="+req_origin+"&conferenceexpirationtime="+conferenceexpirationtime+"&mode="+meetingMode+"&room_pass="+roomPassword+"&image[]="+document.getElementById('file-input').files;
    			var myRequest = new XMLHttpRequest();
    			myRequest.open("POST", myurl, false);
    			//myRequest.setRequestHeader("Content-type", "multipart/form-data");
    			//myRequest.setRequestHeader("enctype", "multipart/form-data");
    			//myRequest.setRequestHeader("Content-length", formData.length);
    			//myRequest.setRequestHeader("Connection", "close");
    			myRequest.onreadystatechange = function getHttpOutput() {	
    				if (myRequest.readyState == 4 && myRequest.status == 200) {
    					var responseTEXT =  myRequest.responseText;
    					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
    					responseTEXT = changeResponse(responseTEXT);
    					//responseTEXT = eval('(' + responseTEXT + ')');
    					if(responseTEXT.status == 1) {
    						alert("Meeting Updated successfully !");
    						document.getElementById("dvCreateNewMeeting").style.display = "none";
    						resetCreateUpdateMeeting();
    						
    						/* if(meetingMode=="1") {
    							shareScheduleMeetingDetails(username, meetingTopic, conferencescheduletime, roomname);
    						} else { */
    							//openAddPenalist(responseTEXT.data["confrenceid"], roomname, username, meetingTopic, conferencescheduletime, meetingMode);
    							getListOfScheduleMeeting();
    						//}
    						/* document.getElementById("dvSetTitlePenalist").innerHTML = "<h5>Add penalist in "+roomname+"</h5>";
    						document.getElementById("spnCopyShare").innerHTML = "<button onclick=\"addPenalist('nomail',"+responseTEXT.data["confrenceid"]+")\">Add Penalist</button><button onclick=\"addPenalist('sendmail',"+responseTEXT.data["confrenceid"]+")\">Add Penalist and Send code via Email</button><button onclick=\"shareScheduleMeetingDetails('"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+roomname+"')\">Copy and Share</button>";
    						document.getElementById("txtPenalistName").focus();
    						document.getElementById("dvAddPenalist").style.display = "block"; */
    						//shareScheduleMeetingDetails(username, meetingTopic, conferencescheduletime, roomname);
    						//getListOfScheduleMeeting();
						} else {
							//alert("Some problem occurred, please try later");
							alert(responseTEXT.msg);
						}
    				}
    			};
    			myRequest.send(formData);
    		} catch(e) {
    			console.log("Error in add conference:: "+e);
    		}
        }
		
		function resetCreateUpdateMeeting() {
			
			$("#editRommTr").css('display','none');
			$("#createRoomTr").css('display','table-row');
			//$("#txtRoomName").attr('disabled',false);
			$(".cstomFile").css("display", "block");
			$("#inpRadConference").prop('checked', true);
			$("#txtRoomPassword").attr('readonly','readonly');
			document.getElementById("txtRoomPassword").style.display = "block";
			document.getElementById("butEdit").style.display = "none";
			document.getElementById("butSave").style.display = "inline-block";
			document.getElementById("hideConferenceId").value = "";
      		document.getElementById("txtMeetingTopicEdit").value = "";
      		document.getElementById("txtRoomNameEdit").value = "";
      		document.getElementById("txtMeetingDate").value = "";
       		document.getElementById("txtMeetingTime").value = "";
       		document.getElementById("butSave").disabled = true;
       		document.getElementById("spnRoomExists").style.display = "none";
       		document.getElementById("spnRoomExists").innerHTML = "";
       		document.getElementById("txtRoomPassword").value = "";
       		document.getElementById("file-input").value = "";
       		document.getElementById("file-list-display").innerHTML = "";
		}
		
		function getprofile(){
			var username = document.getElementById("hidUserName").value;
			var myurl = apiURL + "profile.php/getprofile";
			var path = "authkey=M2atKiuCGKOo9Mj3&username="+username;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					//responseTEXT = eval('(' + responseTEXT + ')');
					//alert(responseTEXT.msg);
					if(responseTEXT.status == 1) {
						$("#txtProfileUserName").val(responseTEXT.data["name"]);
						$("#txtUserMobile").val(responseTEXT.data["mobile"]);
						$("#txtUserEmail").val(responseTEXT.data["email"]);
						$("#txtUserPassword").val(responseTEXT.data["password"]);
						
						var avtarPath = responseTEXT.data["avtarlink"]==null ? "" : responseTEXT.data["avtarlink"]+"&temp="+new Date().getTime();
						
						document.getElementById("dvUpdateProfileTitle").innerHTML = "<h5><span>"+APP.translation.generateTranslationHTML("userDefinedPopup.updateProfile")+"</span></h5><span><img src='"+avtarPath+"' alt='' title=''></span>";
						document.getElementById("dvUpdateProfileBody").style.maxHeight  = (document.body.clientHeight-315)+"px";
						document.getElementById("dvUpdateProfile").style.display = "block";
					}
				}
			};
			myRequest.send(path);
		}
		
		function hideProfileUpdate() {
			document.getElementById("dvUpdateProfile").style.display = "none";
		}
		
		function updateprofile(){
			
			var username = document.getElementById("hidUserName").value;
			var txtProfileUserName= $("#txtProfileUserName").val();
			var txtUserMobile=$("#txtUserMobile").val();
			var txtUserEmail=$("#txtUserEmail").val();
			var txtUserPassword =$("#txtUserPassword").val();
			
			var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&name="+txtProfileUserName+"&email="+txtUserEmail+"&password="+txtUserPassword;
        	path = getEncFormData(path);
        	
			var formData = new FormData(document.getElementById("filecatcher2"));
			/* formData.append("authkey", "M2atKiuCGKOo9Mj3");
        	formData.append("username", username);
        	formData.append("name", txtProfileUserName);
        	formData.append("email", txtUserEmail);
        	formData.append("password", txtUserPassword); */
        	formData.append("formdata", path);
        	formData.append("image", document.getElementById('addfile-input2').files[0]);
        	
			var myurl = apiURL + "profile.php/updateprofile";
			//var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&name="+txtProfileUserName+"&email="+txtUserEmail+"&password="+txtUserPassword;
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			/* myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close"); */
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					alert(responseTEXT.msg);
					document.getElementById("dvUpdateProfile").style.display = "none";
					document.getElementById("addfile-input2").value = "";
					document.getElementById("file-list-display2").innerHTML = "";
					getprofile();
				}
			};
			myRequest.send(formData);
			
			
			
			
		}
		
		function openWipeAccount(){
			
			document.getElementById("dvWipeAccount").style.display = "block";
			$("#txtwipeuser").focus();
		
		}
		
		function hideWipeAccount(){
			
			document.getElementById("dvWipeAccount").style.display = "none";
			window.href.location="/";
		
		}
		
		function wipeAccount(){
			var username = document.getElementById("hidUserName").value;
			var wipeAccountUser =document.getElementById("txtwipeuser").value;
			
			if(wipeAccountUser.trim()==""){
				alert("Please enter user name");
				$("#txtwipeuser").focus();
				return false;
			}
			
			if(username.trim()!=wipeAccountUser.trim()){
				alert("You are not allowed to wipe account.Please enter your correct user name.");
				$("#txtwipeuser").focus();
				return false;
			}
			//username="jadon1993";
			var myurl = apiURL + "profile.php/deleteprofile";
			var path = "authkey=M2atKiuCGKOo9Mj3&username="+username;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					//responseTEXT='{"status":1,"msg":"profile deleted successfully","data":{"logo":[{"conference_logo_file_id":"22","confrenceid":"122","file_name":"test","upload_date":"2020-06-16 12:04:17.431031","file_size":"10244","file_path":"dfdfds/dfdsfdsf"},{"conference_logo_file_id":"23","confrenceid":"122","file_name":"test","upload_date":"2020-06-16 12:04:25.745646","file_size":"10244","file_path":"dfdfds/dfdsfdsf"},{"conference_logo_file_id":"24","confrenceid":"122","file_name":"test","upload_date":"2020-06-16 12:04:27.190105","file_size":"10244","file_path":"dfdfds/dfdsfdsf"}],"recordings":[{"conference_recording_id":"38","confrenceid":"122","file_name":"test","upload_date":"2020-06-16 12:12:30.382142","file_size":"10244","file_path":"dfdfds/dfdsfdsf"},{"conference_recording_id":"39","confrenceid":"122","file_name":"test","upload_date":"2020-06-16 12:12:34.994099","file_size":"10244","file_path":"dfdfds/dfdsfdsf"},{"conference_recording_id":"40","confrenceid":"122","file_name":"test","upload_date":"2020-06-16 12:12:36.109374","file_size":"10244","file_path":"dfdfds/dfdsfdsf"}]}}';
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert(responseTEXT.msg);
						for(var i=0; i<responseTEXT.data["logo"].length; i++) {
							
							deleteDocuments(responseTEXT.data["logo"][i]["file_name"],responseTEXT.data["logo"][i]["file_path"])
						}
						
						for(var i=0; i<responseTEXT.data["recordings"].length; i++) {
							
							deleteDocuments(responseTEXT.data["recordings"][i]["file_name"],responseTEXT.data["recordings"][i]["file_path"])
						}
					}
				}
			};
			myRequest.send(path);
			hideWipeAccount();
		}
		
		function deleteDocuments(filename, filepath) {
			
			var myurl = "filedelete.php";
		   	var path = "filepath="+filepath+filename;
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						console.log("File deleted successfully !");
					} else {
						console.log(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
			
		}
		
		
		function seeListOfMyChat(flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			try {
		    	var myurl = apiURL + "chat.php/chatlist";
				var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						
						var file_size = 0;
						var tblListSchMeet = "<table class='tableBox' id='tblListOfMyChat' style='width:100%;'>";
						tblListSchMeet += "<tr>";
						tblListSchMeet += "<th style='width:35%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingFileName")+"</th>";
						tblListSchMeet += "<th style='width:10%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingFileSize")+"</th>";
						tblListSchMeet += "<th style='width:16%'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingDate")+"</th>";
						tblListSchMeet += "<th style='width:13%; color:red !important;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingAutoDelete")+"</th>";
						tblListSchMeet += "<th style='width:10%; text-align:center;'>"+APP.translation.generateTranslationHTML("userDefinedPopup.headingAction")+"</th>";
						tblListSchMeet += "</tr>";
						if(responseTEXT.status == 1) {
							var filepathname = "";
							var expDate;
							var tempExpiryMonth = "";
							var tempExpiryDay = "";
							var autoDeleteDate = "";
							for(var i=0; i<responseTEXT.data.length; i++) {
								tempExpiryMonth = "";
								tempExpiryDay = "";
								expDate = new Date(responseTEXT.data[i]["upload_date"].split("-")[0]+","+responseTEXT.data[i]["upload_date"].split("-")[1]+","+responseTEXT.data[i]["upload_date"].split("-")[2]);
					        	expDate = new Date(expDate.getTime() + (7 * 24 * 60 * 60 * 1000));
					        	tempExpiryMonth = expDate.getMonth()+1;
					        	if((expDate.getMonth()+1)<10) 
					        		tempExpiryMonth = "0"+(expDate.getMonth()+1);
					        	tempExpiryDay = expDate.getDate();
					        	if(expDate.getDate()<10)
					        		tempExpiryDay = "0"+expDate.getDate();
					        	autoDeleteDate = tempExpiryDay+"-"+tempExpiryMonth+"-"+expDate.getFullYear();
								//roomPassword = responseTEXT.data[i]["room_pass"];
								filepathname = btoa(responseTEXT.data[i]["file_path"]+responseTEXT.data[i]["file_name"]);
								tblListSchMeet += "<tr>";
								//tblListSchMeet += "<td><a style='color:green;' href=\"filedownload.php?filepath="+filepathname+"\">"+responseTEXT.data[i]["file_name"]+"</a></td>";
								tblListSchMeet += "<td><a style='color:green;' href=\""+apiURL+"chat.php/download?d="+responseTEXT.data[i]["link"].replace(/\n/g,'')+"\" target='_blank'>"+responseTEXT.data[i]["file_name"]+"</a></td>";
								try {
									file_size = parseInt(responseTEXT.data[i]["file_size"]);
									file_size = file_size/1024;
									if(file_size<1) {
										file_size = "1 KB";
									} else if((file_size/1024)>1) { 
										file_size = file_size/1024;
										file_size = parseInt(file_size) + " MB";
									} else {
										file_size = parseInt(file_size) + " KB";
									}
								} catch(err) {
									console.log("Error while calculating file size : "+err);
								}
								tblListSchMeet += "<td>"+file_size+"</td>";
								tblListSchMeet += "<td>"+parseDateTime(responseTEXT.data[i]["upload_date"])+"</td>";
								tblListSchMeet += "<td style='color:red !important;'>"+autoDeleteDate+"</td>";
								//tblListSchMeet += "<td style='text-align:center;'><span id='spnRecordingFileId"+responseTEXT.data[i]["conference_recording_id"]+"'><img src='images/copy.jpg' onclick=\"copyLinkContents('spnRecordingFileId"+responseTEXT.data[i]["conference_recording_id"]+"', '"+apiURL+"conference.php/download?d="+responseTEXT.data[i]["file_name"].replace(/\n/g,'')+"')\" title='click to copy file download link' style='width: 12px; cursor:pointer;'></span> <span style='position: relative; top: -3px;'>|</span> <img src='images/delete.png' onclick=\"deleteMyRecording('"+responseTEXT.data[i]["file_name"]+"', '"+responseTEXT.data[i]["base_link"]+"', '"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\" title='Delete file' style='width: 12px; cursor:pointer;'></td>";
								tblListSchMeet += "<td style='text-align:center;'><img src='images/delete.png' onclick=\"deleteMyChat('"+responseTEXT.data[i]["file_name"]+"', '"+responseTEXT.data[i]["file_path"]+"', '"+responseTEXT.data[i]["link"].replace(/\n/g,'')+"', '"+flag+"', '"+roomname+"', '"+username+"', "+conferenceId+", '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"')\" title='"+decodeHtml(APP.translation.generateTranslationHTML("userDefinedPopup.titleDeleteFile"))+"' style='width: 12px; cursor:pointer;'></td>";
								tblListSchMeet += "</tr>";
							}
							tblListSchMeet += "</table>";
							document.getElementById("dvListOfMyChatTable").style.maxHeight  = (document.body.clientHeight-305)+"px";
						} else {
							tblListSchMeet += "<tr>";
							tblListSchMeet += "<td colspan='5'>"+APP.translation.generateTranslationHTML("userDefinedPopup.noAvailableMyChats")+"</td>";
							tblListSchMeet += "</tr>";
							tblListSchMeet += "</table>";
						}
						document.getElementById("dvListOfMyChatTitle").innerHTML = "<h5>"+APP.translation.generateTranslationHTML("userDefinedPopup.titleListChatFile", {roomname: roomname})+"</h5>";
						document.getElementById("dvListOfMyChatTable").innerHTML = tblListSchMeet;
						document.getElementById("dvListOfMyChat").style.display = "block";
						if(flag=='out') {
							document.getElementById("dvListParticipant").style.display = "none";
							document.getElementById("spnHideMyChat").innerHTML = "<button class='cancelButton' onclick=\"viewListOfParticipant("+conferenceId+", '"+roomname+"', '"+username+"', '"+meetingTopic+"', '"+conferencescheduletime+"', '"+meetingMode+"');hideListOfMyChat();\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button>";
						} else {
							document.getElementById("spnHideMyChat").innerHTML = "<button class='cancelButton' onclick=\"hideListOfMyChat()\">"+APP.translation.generateTranslationHTML("userDefinedPopup.butClose")+"</button>";
						}
					}
				};
				myRequest.send(path);
			} catch(e) {
				console.log("Error while fetching documents:: "+e);
			}
		}
		
		function hideListOfMyChat() {
			document.getElementById('dvListOfMyChat').style.display='none';
		}
		
		function copyContent(){
			var vRoomName = APP.conference.roomName;
			var chatContent = document.getElementsByClassName('sideToolbarContainer slideInExt')[0].innerHTML;
		    var content = $('#chatconversation').html();
		    console.log(content);
		    var myurl = apiURL + "chat.php/add";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+vRoomName+"&chat_content="+content;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert(responseTEXT.msg);
					}
				}
			};
			myRequest.send(path);
		
		}
		
		
		function deleteMyChat(fileName, filepath, chatId, flag, roomname, username, conferenceId, meetingTopic, conferencescheduletime, meetingMode) {
			if(confirm("Are you sure you want to delete recording file '"+fileName+"' ?")) {
				var myurl = apiURL + "chat.php/deletechatfile";
				var path = "authkey=M2atKiuCGKOo9Mj3&fileinfo="+chatId;
				path = getFormData(path);
				var myRequest = new XMLHttpRequest();
				myRequest.open("POST", myurl, false);
				myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				myRequest.setRequestHeader("Content-length", path.length);
				myRequest.setRequestHeader("Connection", "close");
				myRequest.onreadystatechange = function getHttpOutput() {	
					if (myRequest.readyState == 4 && myRequest.status == 200) {
						var responseTEXT =  myRequest.responseText;
						responseTEXT = changeResponse(responseTEXT);
						//responseTEXT = eval('(' + responseTEXT + ')');
						if(responseTEXT.status == 1) {
							alert(responseTEXT.msg);
							hideListOfMyChat();
						} else {
							alert(responseTEXT.msg);
						}
					}
				};
				myRequest.send(path);
			}
		}
		
		function showWaitMsg(){
			document.getElementById('dvWaitSms').style.display='block';
		}
		
		function hideWaitMsg(){
			document.getElementById('dvWaitSms').style.display='none';
		}
		
		
		function sendWaitSms(){
			
			var date = new Date();
			var dateStr =("00"+date.getMinutes()).slice(-2);
			console.log(dateStr);
			
			if(saveWaitingSmsTime!=''){
				
				if((parseInt(dateStr))<(parseInt(saveWaitingSmsTime)+parseInt(5))){
					alert("you are not allowed");
					return false;
				}
			}
			
			
			
			var vRoomName = APP.conference.roomName;
			var e = document.getElementById("dropWaitSms");
			var audiocode = e.options[e.selectedIndex].value;
			var text = e.options[e.selectedIndex].text;
			var sms =  document.getElementById("waitsms").value; 
		    var myurl = apiURL + "conference.php/conference_participant_wait_message";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+vRoomName+"&message="+sms+"&audio_code="+audiocode;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert(responseTEXT.msg);
						saveWaitingSmsTime=dateStr;
						hideWaitMsg();
						
						
					}
				}
			};
			myRequest.send(path);
			
		}
		
		
		function displayPollDiv(){
			if(pollStratFlag==false){
				$("#dvPoll").css('display','block');
			}else{
				showResultPollParticipant();
				$("#pollEndBtn").css('display','block');
				$(".participantVoteFooter").css('display','none');
			}
			
		}
		
		function closePollDiv(){
			$("#pollTitle").val('');
			$("#pollOption1").val('');
			$("#pollOption2").val('');
			$('.pollopttext input[type="text"]').val('');
			$(".checkLabel").attr('checked',false);
			$("#dvPoll").css('display','none');
			if(pollDefaultInputStart>2){
				for(var i=3;i<=allowedPollOption;i++){
					$("#polltext"+i).remove();
				}
			}
			pollDefaultInputStart=2;
			appendOptions='';
		}
		
		function addPollOption(){
			
			if(allowedPollOption>pollDefaultInputStart){
				
				var oldPollId=pollDefaultInputStart;
				var pollnextid = "polltext"+parseInt(pollDefaultInputStart+1);
				$("#polltext"+oldPollId).after('<div class="pollTextBox pollOptionShow" id="'+pollnextid+'"><input type="text" class="polltextBox pollopttext" placeholder="Option '+parseInt(pollDefaultInputStart+1)+' *" id="pollOption'+parseInt(pollDefaultInputStart+1)+'"><div class="pollDeleteBut"><a onclick=deletePollOption("'+pollnextid+'")><img src="images/delete-room.png" alt="Delete" title"Delete"></a></div></div>')
				pollDefaultInputStart++;
				
			}
				
		}
		
		function deletePollOption(id){
			
			$("#"+id).remove();
			pollDefaultInputStart--;
		}
		
		function savePollData(){
			
			var vRoomName = APP.conference.roomName;
			var pollTitle = $("#pollTitle").val();
			if(pollTitle==''){
				alert("Title is required.")
				return false;
			}
			var pollOption1 = $("#pollOption1").val();
			if(pollOption1==''){
				alert("Option 1 is required.")
				return false;
			}
			var pollOption2 = $("#pollOption2").val();
			if(pollOption2==''){
				alert("Option 2 is required.")
				return false;
			}
			var isAnonymousPoll=$('#annoymous').is(':checked');
			if(isAnonymousPoll==true){
				isAnonymousPoll = 1;
			}else{
				isAnonymousPoll = 0;
			}
			
			/* var isNotifyAllAttendees=$('#notify').is(':checked');
			if(isNotifyAllAttendees==true){
				isNotifyAllAttendees = 1;
			}else{
				isNotifyAllAttendees = 0;
			} */
			var isNotifyAllAttendees = 0;
			
			var j=1;
			var urlOption ='';
			var inputs = $(".pollopttext");
			for(var i = 0; i < inputs.length; i++){
				var key = "options[option"+j+"]";
		 		var value=$(inputs[i]).val();
		 		urlOption +="&"+key +"="+value;
		 		j++;
			}
			var myurl = apiURL + "polls.php/add";
			var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+vRoomName+"&title="+pollTitle+"&isanonymouse="+isAnonymousPoll+"&notifyall="+isNotifyAllAttendees+"&historyid="+historyId;
			path = getFormData(path)+urlOption;
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert("Poll launch successfully.");
						
						closePollDiv();
						sendPollNotifictionParticipants(responseTEXT.data["poll_id"]);
						$("#hidPollId").val(responseTEXT.data["poll_id"]);
						pollStratFlag=true;
						
					}
				}
			};
			myRequest.send(path); 
		}
				
		function showResultPoll(id,tag){
			
			$("#dvUpdatePollTitle").text('Poll');
			$(".options").remove();
			
			var myurl = apiURL + "polls.php/pollinfo";
			var path = "authkey=M2atKiuCGKOo9Mj3&poll_id="+id;
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						//alert(responseTEXT.msg);
						//$("#hidPollId").val('54');
						var appendOptions='';
						$(".options").remove();
						$(".progressBar").remove();
						$("#dvPoll.popBox .popBoxBody p").remove();
						
						$("#hidPollId").val(responseTEXT.data["poll_id"]);
						var totalPollParticipant=0;
						if(responseTEXT.data["option1"]!='' && responseTEXT.data["option1"]!=null){
							totalPollParticipant += parseInt(responseTEXT.data["options"]["option1"].total);
						}
						if(responseTEXT.data["option2"]!='' && responseTEXT.data["option2"]!=null){
								totalPollParticipant += parseInt(responseTEXT.data["options"]["option2"].total);
						}
						 
						if(responseTEXT.data["option3"]!='' && responseTEXT.data["option3"]!=null){
								totalPollParticipant += parseInt(responseTEXT.data["options"]["option3"].total);
						}
						 
						if(responseTEXT.data["option4"]!='' && responseTEXT.data["option4"]!=null){
								totalPollParticipant += parseInt(responseTEXT.data["options"]["option4"].total);
						}
						 
						 if(responseTEXT.data["option5"]!='' && responseTEXT.data["option5"]!=null){
								totalPollParticipant += parseInt(responseTEXT.data["options"]["option5"].total);
						}
						
						
						$(".questionAnswer").text(responseTEXT.data["title"]);
						if(tag=='jitsi_participant_end_poll') {
							$("#pollenddatediv").css('display','block');
							$(".pollenddate").text(parseDateTime(responseTEXT.data["end_poll"]))
						}
						
						if(responseTEXT.data["option1"]!='' && responseTEXT.data["option1"]!=null){
							var name = responseTEXT.data["options"]["option1"].name;
							var total = responseTEXT.data["options"]["option1"].total;
							
						if(responseTEXT.data["isanonymouse"]=='1'){
								
								appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test1" class="radioBtnClass" name="radio-group" > <label for="test1">'+responseTEXT.data["option1"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus1"></div></div> </p>';
							}else{
								if(tag=='jitsi_participant_end_poll' && total!='0'){
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test1" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test1">'+responseTEXT.data["option1"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus1"></div></div> </p>';
								}else if(tag=='jitsi_participant_end_poll' && total=='0'){
									appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test1" class="radioBtnClass" name="radio-group" > <label for="test1">'+responseTEXT.data["option1"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus1"></div></div> </p>';
								}else{
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test1" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test1">'+responseTEXT.data["option1"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus1"></div></div> </p>';
								}
								
							}
					}
						if(responseTEXT.data["option2"]!='' && responseTEXT.data["option2"]!=null){
							var name = responseTEXT.data["options"]["option2"].name;
							var total = responseTEXT.data["options"]["option2"].total;
							
							if(responseTEXT.data["isanonymouse"]=='1'){
								appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test2" class="radioBtnClass" name="radio-group" > <label for="test2">'+responseTEXT.data["option2"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus2"></div></div> </p>';
							}else{
								if(tag=='jitsi_participant_end_poll' && total!='0'){
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test2" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test2">'+responseTEXT.data["option2"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus2"></div></div> </p>';
								}else if(tag=='jitsi_participant_end_poll' && total=='0'){
									appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test2" class="radioBtnClass" name="radio-group" > <label for="test2">'+responseTEXT.data["option2"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus2"></div></div> </p>';
								}else{
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test2" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test2">'+responseTEXT.data["option2"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus2"></div></div> </p>';
								}
							}
							
							
						}
						if(responseTEXT.data["option3"]!='' && responseTEXT.data["option3"]!=null){
							var name = responseTEXT.data["options"]["option3"].name;
							var total = responseTEXT.data["options"]["option3"].total;
							
							if(responseTEXT.data["isanonymouse"]=='1'){
								appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test3" class="radioBtnClass" name="radio-group" > <label for="test3">'+responseTEXT.data["option3"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus3"></div></div> </p>';
							}else{
								if(tag=='jitsi_participant_end_poll' && total!='0'){
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test3" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test3">'+responseTEXT.data["option3"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus3"></div></div> </p>';
								}else if(tag=='jitsi_participant_end_poll' && total=='0'){
									appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test3" class="radioBtnClass" name="radio-group" > <label for="test3">'+responseTEXT.data["option3"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus3"></div></div> </p>';
								}else{
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test3" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test3">'+responseTEXT.data["option3"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus3"></div></div> </p>';
								}
								
							}
							
						}
						
						if(responseTEXT.data["option4"]!='' && responseTEXT.data["option4"]!=null){
							var name = responseTEXT.data["options"]["option4"].name;
							var total = responseTEXT.data["options"]["option4"].total;
							
							if(responseTEXT.data["isanonymouse"]=='1'){
								appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test4" class="radioBtnClass" name="radio-group" > <label for="test4">'+responseTEXT.data["option4"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus4"></div></div> </p>';
							}else{
								if(tag=='jitsi_participant_end_poll' && total!='0'){
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test4" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test4">'+responseTEXT.data["option4"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus4"></div></div> </p>';
								}else if(tag=='jitsi_participant_end_poll' && total=='0'){
									appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test4" class="radioBtnClass" name="radio-group" > <label for="test4">'+responseTEXT.data["option4"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus4"></div></div> </p>';
								}else{
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test4" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test4">'+responseTEXT.data["option4"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus4"></div></div> </p>';
								}
							}
							
							
							
						}
						if(responseTEXT.data["option5"]!='' && responseTEXT.data["option5"]!=null){
							var name = responseTEXT.data["options"]["option5"].name;
							var total = responseTEXT.data["options"]["option5"].total;
							
							if(responseTEXT.data["isanonymouse"]=='1'){
								appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test5" class="radioBtnClass" name="radio-group" > <label for="test5">'+responseTEXT.data["option5"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus5"></div></div> </p>';
							}else{
								if(tag=='jitsi_participant_end_poll' && total!='0'){
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test5" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test5">'+responseTEXT.data["option5"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus5"></div></div> </p>';
								}else if(tag=='jitsi_participant_end_poll' && total=='0'){
									appendOptions+='<p class="options poll-borderBottomNo">  <input type="radio" id="test5" class="radioBtnClass" name="radio-group" > <label for="test5">'+responseTEXT.data["option5"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus5"></div></div> </p>';
								}else{
									appendOptions+='<p class="options poll-borderBottomNo" title="'+total+' participant vote"> <span class="arrowRight showParticipant">'+total+' </span> <input type="radio" id="test5" class="radioBtnClass" name="radio-group" checked="checked"> <label for="test5">'+responseTEXT.data["option5"]+'</label><div class="progressBar"><div class="barStatus" id="barStatus5"></div></div> </p>';
								}
							}
							
							
						}
						
						$("#attachOptions").after(appendOptions);
						$(".dvResultPoll").css('display','block');
						
						if(responseTEXT.data["option1"]!='' && responseTEXT.data["option1"]!=null){
							var width = (100* parseInt(responseTEXT.data["options"]["option1"].total))/totalPollParticipant;
							$("#barStatus1").css('width',width+"%");
						}
						if(responseTEXT.data["option2"]!='' && responseTEXT.data["option2"]!=null){
							var width = (100* parseInt(responseTEXT.data["options"]["option2"].total))/totalPollParticipant;
							$("#barStatus2").css('width',width+"%");
						}
						if(responseTEXT.data["option3"]!='' && responseTEXT.data["option3"]!=null){
							var width = (100* parseInt(responseTEXT.data["options"]["option3"].total))/totalPollParticipant;
							$("#barStatus3").css('width',width+"%");
						}
						if(responseTEXT.data["option4"]!='' && responseTEXT.data["option4"]!=null){
							var width = (100* parseInt(responseTEXT.data["options"]["option4"].total))/totalPollParticipant;
							$("#barStatus4").css('width',width+"%");
						}
						if(responseTEXT.data["option5"]!='' && responseTEXT.data["option5"]!=null){
							var width = (100* parseInt(responseTEXT.data["options"]["option5"].total))/totalPollParticipant;
							$("#barStatus5").css('width',width+"%");
						}
						
						if(tag=='jitsi_participant_end_poll') {
							$("#pollEndBtn").css('display','none');
							$(".participantVoteFooter").css('display','none');
							$(".radioBtnClass").attr('disabled',true);
							if(sessionStorage.getItem("check_user_is_moderator") == "YES") {
								$("#filepollparticipant").css('display','block');
								$(".target").attr("href", apiURL+"polls.php/pollreport?poll_id="+responseTEXT.data["poll_id"]);
							}
							
						}else{
							$(".participantVoteFooter").css('display','block');
							$(".radioBtnClass").attr('disabled',false);
							$("#filepollparticipant").css('display','none');
							$(".target").attr("href", '#');
						}
						closePollDiv();
					}
				}
			};
			myRequest.send(path); 
		}
		
		
		
		function saveParticipantVote(){
			
			var j=1;
			var urlOption ='';
			var inputs = $(".radioBtnClass");
			for(var i = 0; i < inputs.length; i++){
					
					var key = "options[option"+j+"]";;
			 		var value=$(inputs[i]).is(":checked");
			 		if(value==true){
			 			value=1;
			 		}else{
			 			value=0;
			 		}
			 		urlOption +="&"+key +"="+value;
			 		j++;
			}
			var username = APP.conference.getParticipantDisplayName(APP.conference.getMyUserId());
			var pollId = document.getElementById("hidPollId").value;
			var myurl = apiURL + "polls.php/polls_voting_add";
			var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&poll_id="+pollId
			path = getFormData(path)+urlOption;
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert(responseTEXT.msg);
						
						hidePollResultPopUp();
						
						
					}
				}
			};
			myRequest.send(path); 
			
		}
		
		function endPoll(){
			
			
			var username = APP.conference.getParticipantDisplayName(APP.conference.getMyUserId());
			var pollId = document.getElementById("hidPollId").value;
			var myurl = apiURL + "polls.php/endpoll";
			var path = "authkey=M2atKiuCGKOo9Mj3&poll_id="+pollId
			path = getFormData(path);
			var myRequest = new XMLHttpRequest();
			myRequest.open("POST", myurl, false);
			myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			myRequest.setRequestHeader("Content-length", path.length);
			myRequest.setRequestHeader("Connection", "close");
			myRequest.onreadystatechange = function getHttpOutput() {	
				if (myRequest.readyState == 4 && myRequest.status == 200) {
					var responseTEXT =  myRequest.responseText;
					//responseTEXT = responseTEXT.replace(/\r;/g,"").trim();
					responseTEXT = changeResponse(responseTEXT);
					//responseTEXT = eval('(' + responseTEXT + ')');
					if(responseTEXT.status == 1) {
						alert(responseTEXT.msg);
						
						sendEndPollNotifictionToParticipants();
						
						
					}
				}
			};
			myRequest.send(path); 
			
		}
		
		
		function sendPollNotifictionParticipants(id){
			
			APP.conference.commands.sendCommandOnce("jitsi_participant_start_poll",{
		      	"attributes": "", 
		      	"tagName": "jitsi_participant_start_poll",
		      	"value": id
		      })
		}
		
		function sendEndPollNotifictionToParticipants(){
			
			//var id="54";
			var id = $("#hidPollId").val();  
			APP.conference.commands.sendCommandOnce("jitsi_participant_end_poll",{
		      	"attributes": "", 
		      	"tagName": "jitsi_participant_end_poll",
		      	"value": id
		      })
		      
		      pollStratFlag=false;
		}
		
		function hidePollResultPopUp(){
			
			$("#pollenddatediv").css('display','none');
			$(".pollenddate").text('');
			$(".questionAnswer").text('');
			
			$(".dvResultPoll").css('display','none');
			
		}
		
		function backPollShowOption(tag){
			
			$(".pollparticipants").remove();
			$(".pollParticipantsName").remove();
			$("#dvUpdatePollTitle").text('Poll');
			$("#pollOptions").css('display','block');
			$(".pollTextBox").css('display','block');
			$(".pollparticipants").css('display','none');
			if(tag=='jitsi_participant_end_poll'){
				$("#pollenddatediv").css('display','block');
			}else{
				$("#pollenddatediv").css('display','none');
			}
			
		}
		
		function showPollParticipant(name,total,headerText,tag){
			
			$(".pollparticipants").remove();
			$(".pollParticipantsName").remove();
			$("#dvUpdatePollTitle").text(headerText);
			$("#pollenddatediv").css('display','none');
			$(".pollTextBox").css('display','none');
			
			$("#pollOptions").after('<div class="pollnoBorder pollParticipantsName"> <span class="arrowRight arrowLeft" onclick=backPollShowOption("'+tag+'")><img src="images/arrowRight.svg" alt="Right Arrow" title="Right Arrow"></span></div>');
			if(name!='null'){
				
				var participantList = name.split(",");
				for(var i = 0; i < participantList.length; i++) {
					  $(".pollParticipantsName").after('<div class="pollTextBox pollMar20 pollparticipants"  style="display: none;" ><p><label>'+participantList[i]+'</label></p></div>')	
				}  
				
				$("#pollOptions").css('display','none');
				$(".pollparticipants").css('display','block');
			}
			
			
		}
		
		function pollendconfirmation(){
			$("#dvPollEndconfirmationDetail").css('display','none');
			sendEndPollNotifictionToParticipants();
		}
		
		function hideendconfirmation(){
			$("#dvPollEndconfirmationDetail").css('display','none');
		}
		
		function showResultPollParticipant(){
			var id = $("#hidPollId").val();  
			if(id==''){
				alert("No Poll Avaliable");
				return false;
			}
			showResultPoll(id,'jitsi_participant_start_poll');
			
		}

		function kickAllRoomParticipant() {
			let kickAllParticipant = true;
			try {
				for(let x=0; x<APP.conference.listMembersIds().length; x++) {
					if(APP.conference._room.participants[APP.conference.listMembersIds()[x]]._role.toLowerCase()=="moderator") {
						kickAllParticipant = false;
						break;
					}
				}
				if(kickAllParticipant) {
					for(let x=0; x<APP.conference.listMembersIds().length; x++) {
						const {
			                conference: t
			            } = APP.store.getState()["features/base/conference"];
			            t.kickParticipant(APP.conference.listMembersIds()[x]);
					}
				}
			} catch(err) {
				console.log("Error while moderator left conference :: "+err);
			}
		}
    </script>
</body>
</html>
