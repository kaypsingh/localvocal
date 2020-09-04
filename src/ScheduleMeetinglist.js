import React from 'react';
import qs from 'qs'
import axios from 'axios';
import Panelist from './Panelist';
import DocumentList from './DocumentList';
import RecordingList from './RecordingList';
import ChatList from './ChatList';
import HistoryList from './HistoryList';
import ShareDetails from './ShareDetails';

import "flatpickr/dist/themes/material_green.css";

import Flatpickr from "react-flatpickr";

import DeleteRoom from './DeleteRoom';
import UploadDocument from './UploadDocument';
import UploadLogo from './UploadLogo';
import UploadBackground from './UploadBackground';
import SharePanelist from './SharePanelist';

class ScheduleMeetinglist extends React.Component {

  constructor(props) {
    super(props)
    this.state = {

      documentMessage: '',

      documentData: [],

    
      schedulePopup: 1,

      greetingString: '',

      editPopup: 0,
      // createPopup: 0,
      meetingTitle: '',
      meetingDate: '',
      meetingPwd: 'Meeting Password',
      meetingRoomName: '',
      meetingTime: '',
      selectedOption: 1,

      editMeetingTitle: '',
      editMeetingDate: '',
      editMeetingPwd: '',
      editMeetingTime: '',
      editwaitingRoom: false,


      roomAvail: '',
      emptyValue: 0,
      waitingRoom: false,
      confId: '',
      panelistDialog: 0,
      sharePopup: 0,

      shareRoomName: '',
      sharePassword: '',
      shareTopic: '',
      shareConId: '',
      shareTime: '',
      hidePanelistPopup: 1,
      hideDeletePopup: 1,
      deleteRoomName: '',
      parentResponse: {},
      editResponse: {},
      dateFormat: '',

      panelConfrenceId: '',
      panelRoomName: '',

      panelistActionPopup: 0,
      panelActionRoomname: '',
      panelActionPwd: '',
      panelActionResponse: [],
      panelActionDataMsg: "",

      documentPopup: 0,
      recordingpopup: 0,
      chatPopup: 0,
      historyPopup: 0,

      clickPanelIcon: 0,
      quickPwd: '',
      roomPwdUpdateMsg: '',

      uploadDocPopup: 0,

      uploadLogoPopup: 0,

      uploadBackgroundPopup: 0,
    

      sharePanelPopup: 0,
      sharePanelResponse: [],
      secondResponse: [],
      pwdCounter: 0,

      userPop: 0,
      wipe: 0,
      wipeUser: '',

      uu: '',
      ue: '',
      up: '',

      someTime: '',
      someDate: ''

    }
  }

  updateUsername = (event) => {
    this.setState({uu: event.target.value})
  }

  updateEmail = (event) => {
    this.setState({ue: event.target.value})
  }

  updatePass = (event) => {
    this.setState({up: event.target.value})
  }

  wipeUsername = (event) => {
    console.log(event.target.value)
    this.setState({ wipeUser:event.target.value })
  }

  wipePopup = () => {
    this.setState({wipe: 1})
  }

  closeWipePopup = () => {
    this.setState({wipe: 0})
  }

  clickUserPop = () => {
    this.setState({ userPop: 1})
  }

  closeUser = () => {
    this.setState({ userPop: 0})
  }
 

pwdStatus = () => {
  this.setState({pwdCounter: 1})
}

  closeSchedulePopup = () => {
    this.setState({schedulePopup: 0})
  }

  openSchedulePopup = () => {
    this.setState({schedulePopup: 1})
  }

  sharePanel = (r) => {

    console.log(r)
    this.setState({ sharePanelPopup: 1, secondResponse: r })

  }

  closeSharePanel = () => {
    this.setState({ sharePanelPopup: 0 })
  }


  uploadDoc = () => {
    this.setState({ uploadDocPopup: 1, panelistActionPopup: 0 })
  }

  uploadLogo = () => {
    this.setState({ uploadLogoPopup: 1, panelistActionPopup: 0, documentPopup: 0 })
  }

  uploadBackground = () => {
    this.setState({ uploadBackgroundPopup: 1, panelistActionPopup: 0, documentPopup: 0 })
  }

  closeUploadDoc = () => {
    this.setState({ uploadDocPopup: 0, documentPopup: 1 })
  }

  closeUploadLogo = () => {
    this.setState({ uploadLogoPopup: 0, documentPopup: 1 })
  }

  closeUploadBackground = () => {
    this.setState({ uploadBackgroundPopup: 0, documentPopup: 1 })
  }

  quickUpdatePwd = (event) => {
    console.log(event.target.value)
    this.setState({ quickPwd: event.target.value })

  }


  handleUpdateLogic = () => {

    if(this.state.uu === '' && this.state.ue === '' && this.state.up === ''){
      alert('Details are updated sucessfully !')
    }

    else{

      var username = this.props.uname
      console.log(username)
      var txtProfileUserName = this.state.uu === '' ? this.props.bc : this.state.uu
      console.log(txtProfileUserName)
      var txtUserEmail = this.state.ue === '' ? this.props.email : this.state.ue
      console.log(txtUserEmail)
      var txtUserPassword = this.state.up === '' ? this.props.password : this.state.up
      console.log(txtUserPassword)

      var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&name="+txtProfileUserName+"&email="+txtUserEmail+"&password="+txtUserPassword;
        	path = this.props.getEncFormData(path);
        	
      var formData = new FormData(document.getElementById("filecatcher2"));

      formData.append("formdata", path);
        	formData.append("image", document.getElementById('addfile-input2').files[0]);
      
      axios.post('https://api.videomeet.in/v3/profile.php/updateprofile', formData

      , {
       'Content-Type': 'application/x-www-form-urlencoded',
       "Access-Control-Allow-Origin": "*",
   }

   )
       .then((response) => {
           console.log(response)

           response.data =  this.props.changeResponse(response.data)
           alert(response.data.msg)

           this.props.scheduleApi()

          

       },
           (error) => {
               console.log(error)
           }
       )
       }


   

  }


  deleteAccount = () => {

if(this.state.wipeUser === ''){

  alert('Please enter user name')
}

else if(this.state.wipeUser !== this.props.uname){
  alert("You are not allowed to wipe account.Please enter your correct user name.");
}

else{

    var username = this.state.wipeUser
    var path = "authkey=M2atKiuCGKOo9Mj3&username="+username;
      path = this.props.getFormData(path);
      
      axios.post('https://api.videomeet.in/v3/profile.php/deleteprofile', path

      , {
         'Content-Type': 'application/x-www-form-urlencoded',
         "Access-Control-Allow-Origin": "*",
       }
   
       )
         .then((response) => {
   
           console.log(response)
   
           response.data =  this.props.changeResponse(response.data)
   
           alert(response.data.msg)
   
          //  window.location.reload();
        
   
         },
           (error) => {
             console.log(error)
           }
         )
   
          }


  }


  quickPwdLogic = () => {

    // console.log(this.state.panelActionRoomname)
    // console.log(this.state.quickPwd)

    var roomname = this.state.panelActionRoomname
    var txtEditRoomPassword = this.state.quickPwd

    var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&room_pass="+txtEditRoomPassword;
    path = this.props.getFormData(path);


    axios.post('https://api.videomeet.in/v3/conference.php/roompassupdate', path

   , {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {

        console.log(response)

        response.data =  this.props.changeResponse(response.data)

        alert(response.data.msg)

        this.setState({ roomPwdUpdateMsg: "room pass update successfully." })

      },
        (error) => {
          console.log(error)
        }
      )





  }

  closeEditMeeting = () => {
    this.setState({ editPopup: 0 })
  }

  closePanel = () => {


    this.setState({ panelistDialog: 0, hidePanelistPopup: 1 })
  }


  sharePopupClose = () => {
    this.setState({ sharePopup: 0 })
  }

  deletePopupClose = () => {
    this.setState({ hideDeletePopup: 1 })
  }


  seeListOfDocuments = () => {
    this.setState({ documentPopup: 1 })

  }

  closeListofDocuments = () => {
    this.setState({ documentPopup: 0 })

  }

  myRecordings = () => {
    this.setState({ recordingpopup: 1 })
  }

  closeMyRecordings = () => {
    this.setState({ recordingpopup: 0 })
  }

  myChats = () => {
    this.setState({ chatPopup: 1 })
  }

  closeMyChats = () => {
    this.setState({ chatPopup: 0 })
  }

  myHistory = () => {
    this.setState({ historyPopup: 1 })
  }

  closeMyHistory = () => {
    this.setState({ historyPopup: 0 })
  }

  roomActionClose = () => {
    this.setState({ panelistActionPopup: 0 })
  }

  panelRedirect = () => {
    this.setState({ panelistActionPopup: 1 })
  } 


  fetchDocumentResult = () => {

    var roomname = this.state.panelActionRoomname
    var username = this.state.panelUsername
    var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomname+"&ownername="+username;
        path = this.props.getFormData(path);
        
    axios.post('https://api.videomeet.in/v3/conference.php/filelist', path

   , {
        'Content-Type': 'application/x-www-form-urlencoded',
        "Access-Control-Allow-Origin": "*",
    }

    )
        .then((response) => {

            console.log(response)

            response.data =  this.props.changeResponse(response.data)

      this.roomActionClose()

            // this.setState({documentMessage: response.data.msg})
            this.setState({ documentMessage: response.data.msg, documentData: response.data.data })


        },
            (error) => {
                console.log(error)
            }
        )

}





deleteParticipant = (r) => {

  console.log(r)

  var participantId = r.participantid

  var path = "authkey=M2atKiuCGKOo9Mj3&participantid="+participantId;
			path = this.props.getFormData(path);
  
  axios.post('https://api.videomeet.in/v3/participants.php/delete', path

  , {
    'Content-Type': 'application/x-www-form-urlencoded',
    "Access-Control-Allow-Origin": "*",
  }

  )
    .then((response) => {

      console.log(response.data.msg)

      response.data =  this.props.changeResponse(response.data)

      alert(response.data.msg)

      this.listPanelistAction(this.state.sharePanelResponse)

    },
      (error) => {
        console.log(error)
      }
    )




}


  listPanelistAction = (r) => {
    console.log(r)
    this.setState({ panelistActionPopup: 1, panelActionRoomname: r.roomname, panelActionPwd: r.room_pass, sharePanelResponse: r })


    var conferenceId = r.confrenceid
      

    var path = "authkey=M2atKiuCGKOo9Mj3&conferenceid="+conferenceId;

    path = this.props.getFormData(path);

    axios.post('https://api.videomeet.in/v3/participants.php/participantlist', path

  , {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {

        console.log(response.data.msg)

        response.data =  this.props.changeResponse(response.data)

        if (response.data.msg === "participants list fetched successfully") {

          this.setState({ panelActionResponse: response.data.data, panelActionDataMsg: response.data.msg })
        }

        else if(response.data.msg === "No record found"){
          this.setState({panelActionDataMsg: response.data.msg})
        }


      },
        (error) => {
          console.log(error)
        }
      )



  }

  handlePanelistPopup = (r) => {
    console.log(r.confrenceid)

    this.setState({ hidePanelistPopup: 0, panelConfrenceId: r.confrenceid, panelRoomName: r.roomname, clickPanelIcon: 1 })
  }

  handleDeletePopup = (r) => {
    console.log(r)
    this.setState({ hideDeletePopup: 0, deleteRoomName: r.roomname, parentResponse: r })
    console.log(r.roomname)
  }

  handleSharePopup = (r) => {

    console.log(r)
    this.setState({ sharePopup: 1, shareRoomName: r.roomname, shareTopic: r.topic, sharePassword: r.room_pass, shareTime: r.conferencescheduletime, shareConId: r.confrenceid })
  }

  handleMeetingTitle = (event) => {
    this.setState({ meetingTitle: event.target.value }, () => { console.log(this.state.meetingTitle) });

  }

  editMeetingTitleFun = (event) => {

    console.log(this.state.editResponse)
    this.setState({ editMeetingTitle: event.target.value })
  }

  handleMeetingDate = (event) => {

    let d = new Date(event);
    let anyDayNow = d.setDate(d.getDate() + 1);
    anyDayNow = new Date(anyDayNow).toISOString().slice(0, 10);
    console.log(anyDayNow)

    
    var exp = anyDayNow.split("-")[2] + "-" + anyDayNow.split("-")[1] + "-" + anyDayNow.split("-")[0]
  

    this.setState({ meetingDate: exp });
  }

  editMeetingDateFun = (event) => {

    let d = new Date(event);
    let someDayNow = d.setDate(d.getDate() + 1);
    someDayNow = new Date(someDayNow).toISOString().slice(0, 10);
    console.log(someDayNow)

    
    var ex = someDayNow.split("-")[2] + "-" + someDayNow.split("-")[1] + "-" + someDayNow.split("-")[0]
  

    this.setState({ editMeetingDate: ex })
  }

  handleMeetingRoomName = (event) => {


			var obj = event.target.value
			obj = obj.replace(/ +/g, '');
			var specialChars = "<>!#$%^&*()+[]{}?:;|'\"\\,/~`=@.-_"; //@.-_
			for(var i = 0; i < specialChars.length;i++){
		        if(obj.indexOf(specialChars[i]) > -1){
		        	obj = obj.split(specialChars[i]).join('');
		        }
		    }





    console.log(event.target.value)
    this.setState({ meetingRoomName: obj }, () => { console.log(this.state.meetingRoomName) })

    if (event.target.value === "") {
      this.setState({ emptyValue: 0 })
    } else {
      this.setState({ emptyValue: 1 })
      
    }

    var roomName = event.target.value

    var path = "authkey=M2atKiuCGKOo9Mj3&roomname="+roomName;
			path = this.props.getFormData(path);

    axios.post('https://api.videomeet.in/v3/conferenceschedule.php', path

   , {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {
        console.log(response.data.msg)

        response.data =  this.props.changeResponse(response.data)

        this.setState({ roomAvail: response.data.msg })


      },
        (error) => {
          console.log(error)
        }
      )





  }

  handleWaitingRoom = () => {

    this.setState({ waitingRoom: !this.state.waitingRoom })
  }

  editWaitingRoomFun = () => {

    this.setState({ waitingRoom: !this.state.editwaitingRoom })
  }

  handleMeetingTime = (event) => {
   
    var d = new Date(event); 
    var hh = d.getHours(); 
   var mm =  d.getMinutes(); 

    var j = hh + ':' + mm 
    console.log(j)
   

    this.setState({ meetingTime: j });
  }

  editMeetingTimeFun = (event) => {
    var d = new Date(event); 
    var hh = d.getHours(); 
   var mm =  d.getMinutes(); 

    var e = hh + ':' + mm 
   
    this.setState({ editMeetingTime: e })
  }

  handlePwd = () => {
    //  var pwd =  Math.floor(1000 + Math.random() * 9000);
    var pwd = Math.floor(Math.random() * 90000) + 10000
    console.log(pwd)
    this.setState({ meetingPwd: pwd })
  }


  // newMeetingDialog = () => {
  //   this.setState({ createPopup: 1 })
  // }

  editMeetingDialog = (r) => {
    console.log(r)

    var string = r.conferencescheduletime
    console.log(string)
    var result = string.substring(string.lastIndexOf(" ") + 1);
    var str = result.substring(0, result.length - 3);
    this.setState({ editPopup: 1, editResponse: r, editTime: str } ,() => {this.closeSchedulePopup()})

  }

  // newMeetingClose = () => {
  //   this.setState({ createPopup: 0 }, this.props.scheduleApi)
  // }

  editDateFormat = () => {

    // this.state.editPopup === 1 ?
    var d = this.state.editResponse.conferencescheduletime.split(" ")[0];
    d = d.split("-").reverse().join("-");
    console.log(d)

    if (this.state.editPopup === 1) {
      return d
    } else {
      return this.state.dateFormat



    }

  }



  editFunctionality = () => {


    // if date unchanged time changed----time not updating (data is going right)
    console.log('updating')

    console.log(this.state.editMeetingTime)

    if (this.state.editMeetingTitle === "") {
      var t = this.state.editResponse.topic
    } else {
      var t = this.state.editMeetingTitle
    }


    if (this.state.editMeetingDate == "" && this.state.editMeetingTime === "") {


      var conferenceexpirationtime = this.state.editResponse.conferenceexpirationtime

    } else if (this.state.editMeetingDate !== "" && this.state.editMeetingTime !== "") {


      var expDate = new Date(this.state.editMeetingDate.split("-")[2] + "," + this.state.editMeetingDate.split("-")[1] + "," + this.state.editMeetingDate.split("-")[0]);
      var expDate = new Date(expDate.getTime() + (7 * 24 * 60 * 60 * 1000));
      var expiryMonth = expDate.getMonth() + 1;
      if ((expDate.getMonth() + 1) < 10)
        expiryMonth = "0" + (expDate.getMonth() + 1);
      var expiryDay = expDate.getDate()
      if (expDate.getDate() < 10)
        expiryDay = "0" + expDate.getDate();

      var conferenceexpirationtime = expDate.getFullYear() + "-" + expiryMonth + "-" + expiryDay + " " + this.state.editMeetingTime;

      console.log(conferenceexpirationtime)


    }

    else if (this.state.editMeetingDate !== "" && this.state.editMeetingTime === "") {


      var conferenceexpirationtime = this.state.editResponse.conferenceexpirationtime

    }

    else if (this.state.editMeetingDate == "" && this.state.editMeetingTime !== "") {

      var newVar = this.state.editResponse.conferencescheduletime.split(" ")[0].split("-").reverse().join("-")
      console.log(newVar)

      var expDate = new Date(this.state.editResponse.conferencescheduletime.split(" ")[0].split("-").reverse().join("-").split("-")[2] + "," + this.state.editResponse.conferencescheduletime.split(" ")[0].split("-").reverse().join("-").split("-")[1] + "," + this.state.editResponse.conferencescheduletime.split(" ")[0].split("-").reverse().join("-").split("-")[0]);
      var expDate = new Date(expDate.getTime() + (7 * 24 * 60 * 60 * 1000));
      var expiryMonth = expDate.getMonth() + 1;
      if ((expDate.getMonth() + 1) < 10)
        expiryMonth = "0" + (expDate.getMonth() + 1);
      var expiryDay = expDate.getDate()
      if (expDate.getDate() < 10)
        expiryDay = "0" + expDate.getDate();

      var conferenceexpirationtime = expDate.getFullYear() + "-" + expiryMonth + "-" + expiryDay + " " + this.state.editMeetingTime;
      console.log(conferenceexpirationtime)


    }


    var scheduletime =  this.state.editMeetingDate == "" && this.state.editMeetingTime === "" ? this.state.editResponse.conferencescheduletime :
    this.state.editMeetingDate !== "" && this.state.editMeetingTime !== "" ? this.state.editMeetingDate.split("-")[2] + "-" + this.state.editMeetingDate.split("-")[1] + "-" + this.state.editMeetingDate.split("-")[0] + " " + this.state.editMeetingTime :
      this.state.editMeetingDate !== "" && this.state.editMeetingTime === "" ? this.state.editMeetingDate.split("-")[2] + "-" + this.state.editMeetingDate.split("-")[1] + "-" + this.state.editMeetingDate.split("-")[0] + " " + this.state.editTime :
        this.state.editResponse.conferencescheduletime

        var meetingTopic = t
        var roomname = this.state.editResponse.roomname.toLowerCase()
       var expirationtime = conferenceexpirationtime
        var meetingMode = "1"
        var roomPassword = this.state.editResponse.room_pass
        var waitingroom = "1"
        var conId = this.state.editResponse.confrenceid

    
    var path = "authkey=M2atKiuCGKOo9Mj3&conferencescheduletime="+scheduletime+"&topic="+meetingTopic+"&roomname="+roomname+"&conferenceexpirationtime="+expirationtime+"&mode="+meetingMode+"&room_pass="+roomPassword+"&waitingroomenable="+waitingroom+"&confrenceid="+conId
    path = this.props.getEncFormData(path);
    
    var formData = new FormData(document.getElementById("filecatcher"));

    formData.append("formdata", path);


    axios.post('https://api.videomeet.in/v3/conference.php/update',formData, {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {
      
        console.log(response)

        response.data =  this.props.changeResponse(response.data)
        alert(response.data.msg)

        this.setState({ editPopup: 0 , schedulePopup: 1 }, () => this.props.scheduleApi())

      },
        (error) => {
          console.log(error)
        }
      )




  }







  createFunctionality = () => {

    console.log(this.state.meetingDate)
   
    if (this.state.meetingTitle === "" || this.state.meetingDate === "" || this.state.meetingRoomName === "" || this.state.meetingTime === "" || this.state.meetingPwd === "Meeting Password") {
      alert('All fields are mandatory')
    }
    else {


      var expDate = new Date(this.state.meetingDate.split("-")[2] + "," + this.state.meetingDate.split("-")[1] + "," + this.state.meetingDate.split("-")[0]);
      var expDate = new Date(expDate.getTime() + (7 * 24 * 60 * 60 * 1000));
      var expiryMonth = expDate.getMonth() + 1;
      if ((expDate.getMonth() + 1) < 10)
        expiryMonth = "0" + (expDate.getMonth() + 1);
      var expiryDay = expDate.getDate()
      if (expDate.getDate() < 10)
        expiryDay = "0" + expDate.getDate();
      var conferenceexpirationtime = expDate.getFullYear() + "-" + expiryMonth + "-" + expiryDay + " " + this.state.meetingTime;

      if (this.state.waitingRoom === "false") {
        var roomEnable = "0"
      }
      else {
        var roomEnable = "1"
      }

      var username = this.props.uname
     
      var scheduletime =this.state.meetingDate.split("-")[2] + "-" + this.state.meetingDate.split("-")[1] + "-" + this.state.meetingDate.split("-")[0] + " " + this.state.meetingTime
    
      var meetingTopic = this.state.meetingTitle
    
      var roomname = this.state.meetingRoomName.toLowerCase()
    
      var req_origin = "web"
     
      var expirationtime = conferenceexpirationtime
     
      var meetingMode = "1"
     
      var roomPassword = this.state.meetingPwd
     
      var waitingroom = roomEnable
      

      var path = "authkey=M2atKiuCGKOo9Mj3&username="+username+"&conferencescheduletime="+scheduletime+"&topic="+meetingTopic+"&roomname="+roomname+"&req_origin="+req_origin+"&conferenceexpirationtime="+expirationtime+"&mode="+meetingMode+"&room_pass="+roomPassword+"&waitingroomenable="+waitingroom;

      path = this.props.getEncFormData(path);

      var formData = new FormData(document.getElementById("filecatcher"));

      formData.append("formdata", path);
        	for (var x = 0; x < document.getElementById('file-input').files.length; x++) {
        		formData.append("image[]", document.getElementById('file-input').files[x]);
        	}

      axios.post('https://api.videomeet.in/v3/conference.php/add', formData , {
        'Content-Type': 'application/x-www-form-urlencoded',
        "Access-Control-Allow-Origin": "*",
      }

      )
        .then((response) => {
          console.log(response)

          response.data =  this.props.changeResponse(response.data)

          console.log(response.data.data)
          alert(response.data.msg)

          this.setState({ confId: response.data.data.confrenceid }, () => {

            console.log(this.state.confId)
            if (response.data.msg === "conference scheduled successfully") {


              console.log('kooo')
              //do something here
              this.setState({ panelistDialog: 1 },() => {this.props.newMeetingClose()})
            }
          })




        },
          (error) => {
            console.log(error)
          }
        )

    }


  }

  logoutHandle = () => {

    this.setState({schedulePopup: 0},() => {this.props.logoutLogic()})

  //   var c = localStorage.getItem('added-credentials')
  //   console.log(c)



  //   localStorage.removeItem('added-credentials');
  //   console.log(c)

 }

  onValueChange = (event) => {

    this.setState({
      selectedOption: event.target.value
    });
  }

  componentDidMount() {

    var current_time = new Date();
    var hour = current_time.getHours();
    var minute = current_time.getMinutes();


    if ((hour >= 5 && minute >= 0) && (hour <= 11 && minute <= 59)) {
      this.setState({ greetingString: 'Good Morning!' })

    } else if ((hour >= 12 && minute >= 0) && (hour <= 16 && minute <= 59)) {
      this.setState({ greetingString: 'Good Afternoon!' })

    } else {
      this.setState({ greetingString: 'Good Evening!' })
    }

    this.props.scheduleApi()
  }

  render() {

    const { meetingDate } = this.state;

    

    var logoutImg = 'https://bridge01.videomeet.in/images/logout-username.png';
    var updateImg = "https://bridge01.videomeet.in/images/update.png"



    return (
      <>

        {/* schedule meeting list */}

        <div id="dvListScheduleMeeting" className="popBox" style={{

          display: this.props.createPopup === 0 && this.props.parentData !== '' && this.state.schedulePopup === 1 ? '' : 'none'
        }}>

          <div className="popBoxInner">
            <div className="popBoxHeader" id="dvScheduleMeetingTitle">
          
    

              <h5 style={{fontSize: 18, color:'black', textAlign:'left'}} >
                <span>Schedule Meeting for
                  
                  <a href="#" onClick={this.clickUserPop} style={{font: 'white'}} >{this.props.bc}</a>

                </span>
              </h5>
              <img src={logoutImg} onClick={this.logoutHandle} className="shift-right" style={{ cursor: 'pointer' }} />

            </div>

            <div className="popBoxBody" id="dvListScheduleMeetingTable" style={{ overflowY: 'auto', maxHeight: 369 }} >

              <table className="tableBox" id="tblListScheduleMeeting" style={{ "width": "100%" }}>
                <tbody>
                  <tr>
                    <th style={{ "width": "20%" }}>
                      <span>Room Name</span>
                    </th>

                    <th style={{ "width": "20%" }}>
                      <span>Topic</span>
                    </th>

                    <th style={{ "width": "16%" }}>
                      <span>Mode</span>
                    </th>

                    <th style={{ "width": "17%" }}>
                      <span>Schedule Time</span>
                    </th>

                    <th style={{ "width": "13%", textAlign: 'center' }}>
                      <span>Manage</span>
                    </th>

                    <th style={{ "width": "15%", textAlign: 'center' }}>
                      <span>Action</span>
                    </th>


                  </tr>


                  {

                    this.props.parentData === "conference list fetched successfully" ?

                      this.props.dataSource.map((res, k) => {

                        var dateTime = res['conferencescheduletime']

                        var arrDateTime = dateTime.split(" ");
                        var date = arrDateTime[0].split("-")[2]+"-"+arrDateTime[0].split("-")[1]+"-"+arrDateTime[0].split("-")[0];
                        var time = arrDateTime[1].split(":")[0]+":"+arrDateTime[1].split(":")[1];
                        dateTime = date+" "+time;



                        var j = Object.values(res)

                        if (res['mode'] === "1") {
                          var conMode = "Conference"
                        }

                        else if (res['mode'] === "2") {
                          var conMode = "Webinar"
                        }

                        else {
                          var conMode = "Sensitive"
                        }

                        var lock = "https://bridge01.videomeet.in/images/lock.png"
                        var videoIcon = "https://bridge01.videomeet.in/images/cameraIconBlue.png"
                        var panelistIcon = "https://bridge01.videomeet.in/images/room_panelist.png"
                        var roomIcon = "https://bridge01.videomeet.in/images/room.png"
                        var deleteIcon = "https://bridge01.videomeet.in/images/delete-room.png"
                        var shareIcon = "https://bridge01.videomeet.in/images/share_room.png"
                        var editIcon = "https://bridge01.videomeet.in/images/edit-room.png"

                        return (
                          <>
                            <tr>
                              <td>
                                <img className="showpassword" style={{ height: 10, width: 10, cursor: 'pointer', display: res['room_pass'] === '' ? 'none' : '' }} src={lock} title={res['room_pass']} />
                                <img className="enterroomdirectly" style={{ height: 10, width: 10, cursor: 'pointer' }} src={videoIcon} title="Click to enter the room" />
                                <a href="#" onClick={() => { this.listPanelistAction(res); this.props.newMeetingDialog() }}>{res['roomname']}</a>
                              </td>
                              <td>{res['topic']}</td>
                              <td>
                                <span>{conMode}</span>
                              </td>
                              <td>{dateTime}</td>

                              <td style={{ textAlign: 'center' }}>

                                <img src={panelistIcon} onClick={() => { this.handlePanelistPopup(res); this.props.newMeetingDialog() }} className="image-size-set" alt title="Panelist" />


                                <span className="spn-pipe-position">{"  "}</span>

                                <img src={roomIcon} onClick={() => { this.listPanelistAction(res); this.props.newMeetingDialog() }} className="image-size-set" alt title="Room" />


                              </td>
                              <td style={{ textAlign: 'center' }}>


                                <img src={deleteIcon} onClick={() => { this.handleDeletePopup(res) }} className="image-size-set" alt title="Delete" />


                                <span className="spn-pipe-position">{"   "}</span>


                                <img src={shareIcon} onClick={() => { this.handleSharePopup(res) }} className="image-size-set" alt title="Share" />

                                <span className="spn-pipe-position">{"   "}</span>


                                <img src={editIcon} onClick={() => {this.editMeetingDialog(res)}} className="image-size-set" alt title="Edit" />


                              </td>
                            </tr>
                          </>
                        )


                      })

                      :
                      <tr>
                        <td colSpan='6' >
                          <span>No Records Found.</span>
                        </td>
                      </tr>

                  }




                </tbody>
              </table>

            </div>

            <div className="popBoxFooter">
             
                <button className="cancelButton" onClick={()=>{this.closeSchedulePopup();this.props.scheduleButton();this.panelRedirect()}} >
                  <span>close</span>
                </button>
              <button onClick={()=>{this.props.newMeetingDialog();this.closeSchedulePopup()}}>
                <span>New Meeting</span>
              </button>
            </div>



          </div>

        </div>

       
       <div id="dvUpdateProfile" className="popBox" style={{display: this.state.userPop === 1 ? 'block' : 'none'}}>
         <div className="popBoxInner">
           <div className="popBoxHeader" id="dvUpdateProfileTitle">
             <h5>
               <span>
                 <span>Update Profile</span>
               </span>
             </h5>

             <span>
               {/* <img src={}/> */}
             </span>
           </div>
         
         <div className="popBoxBody" id="dvUpdateProfileBody" style={{overflowY:'auto',maxHeight: 407}}>
           <form id="filecatcher2">
             <table className="tableNoBorder" style={{"width":"100%"}}>
               <tbody>
                 <tr>
                   <td>
                     <input type="text" maxLength="50" className="textBox" onChange={this.updateUsername} placeholder={this.props.bc} id="txtProfileUserName"></input>
                   </td>

                   <td>
                     <input type="text" maxLength="50" className="textBox" disabled placeholder={this.props.mobile} readOnly="readonly" id="txtUserMobile"></input>
                   </td>
                 </tr>

                 <tr>
                   <td>
                     <input type="text" maxLength="50" className="textBox" onChange={this.updateEmail} placeholder={this.props.email} id="txtUserEmail" style={{color:'black'}}></input>
                   </td>

                  <td>
                    <span className="relativeDivBlock">
                      <span className="popPrevIcon" id="spnEyeViewUpdateProfile" ></span>
                      <input type="password" maxLength="50" className="textBox" onChange={this.updatePass} placeholder={this.props.password} id="txtUserPassword"></input> 
                    </span>
                  </td>

</tr>

                  <tr>
                    <td valign="top">
                      <div className="cstomFile">
                        <label for="addfile-input2" className="custom-file-upload fileBtn">
                          <span>Upload Profile Picture</span>
                        </label>

                        <input id="addfile-input2" name="files[]" className="file-upload centerDatasheet" type="file" style={{display:"none"}}></input>
                      </div>
                    </td>

                    <td colSpan="2">
                      <div className="file-list-display" id="file-list-display2"></div> 

                    </td>



                  </tr>
               



               </tbody>
             </table>
           </form>
         </div>
        
        
        <div className="popBoxFooter">
          <button className="cancelButton" onClick={this.closeUser} >
            <span>Close</span>
          </button>

          <button id="butSave" onClick={this.handleUpdateLogic} >
            <span>Update</span>
          </button>

          <button className="wipeButton" onClick={this.wipePopup} >
            <span>Wipe Account</span>
          </button>
        </div>
        
         </div>
       </div>

       

       <div id="dvWipeAccount" className="popBox" style={{display: this.state.wipe === 1 ? 'block' : 'none'}}>
         <div className="popBoxInner" >
           <div className="popBoxHeader">
             <h5>
               <span>Wipe Account</span>
             </h5>
           </div>


           <div className="popBoxBody relativeDiv">
             <span className="relativeDivBlock">
               <h6>
                 <span>Following will be deleted from the VideoMeet System.</span>
               </h6>
               1. 
               <span>Account Details</span>
               <br></br>
               2. 
               <span>Rooms Details</span>
               <br></br>
               3.
               <span>Panelist / Participants</span>
               <br></br>
               4.
               <span>Documents and Logo</span>
               <br></br>
               5.
               <span>Recordings</span>
               <br></br>
               6.
               <span>Chat Messages</span>
               <br></br>
               <br></br>

               <p>
                 <span>Yes, I understand that I will not be able to get them again.</span>
               </p>

               <input type="text" id="txtwipeuser"  onChange={this.wipeUsername} placeholder="Enter your username" className="textBox"></input>


             </span>
           </div>

<div className="popBoxFooter">
  <button className="cancelButton" onClick={this.closeWipePopup}>
    <span>Close</span>
  </button>

  <button onClick={this.deleteAccount}>
    <span>Wipe Now - Forget Everything</span>
  </button>
</div>


         </div>
       </div>
       
        {/* create/edit meeting  */}

        <div id="dvCreateNewMeeting" className="popBox"

          style={{
            display: (this.props.createPopup === 1 && this.state.schedulePopup === 0 )|| (this.state.editPopup === 1 ) ? 'block' : 'none'



          }}>
          <div className="popBoxInner">
            <div className="popBoxHeader" id="dvSetTitle">
              <h5 style={{fontSize: 18, color:'black', textAlign:'left'}}>
                <span>{this.state.greetingString} </span>
                {this.props.uname}
              </h5>
            </div>

            <div className="popBoxBody" id="dvCreateNewMeetingBody" style={{ overflowY: 'auto', maxHeight: 407 }}>
              <form id="filecatcher">
                <table className="tableNoBorder" style={{ "width": "100%" }}>
                  <tbody>
                    <tr>
                      <td>
                        <label className="displayInlineBlock">
                          <span>Meeting Mode</span>:
                       </label>

                        <input type="radio" className="meeting_mode" id="inpRadConference" value="1"
                          checked={this.state.selectedOption == 1}
                          onChange={this.onValueChange}></input>


                        <span className="spnMeetingMode">
                          <span>
                            Conference{" "}
                          </span>
                        </span>


                        <input type="radio" className="meeting_mode" id="inpRadWebinar" value="2"
                          checked={this.state.selectedOption == 2}
                          onChange={this.onValueChange} ></input>


                        <span className="spnMeetingMode">
                          <span>
                            Webinar{" "}
                          </span>
                        </span>
                        <input type="radio" className="meeting_mode" id="inpRadSensitive" value="3"
                          checked={this.state.selectedOption == 3}
                          onChange={this.onValueChange}
                        ></input>



                        <span className="spnMeetingMode">
                          <span>
                            {" "}Sensitive
                         </span>
                        </span>


                      </td>

                      <td>
                        <label className="displayInlineBlock">
                          <span >Waiting Room</span>{":"}
                        </label>
                        <input type="checkbox" id="waitingroomid"
                          checked={this.state.waitingRoom === true} onChange={this.handleWaitingRoom}></input>
                      </td>


                    </tr>


                    <tr id="editRommTr" style={{ display: this.state.editPopup === 1 ? '' : 'none' }}>

                      <td>
                        <input type="text" maxLength="50" className="textBox" id="txtMeetingTopicEdit" placeholder={this.state.editResponse.topic} style={{ color: 'black' }}
                          onChange={this.editMeetingTitleFun}
                        ></input>
                      </td>

                      <td>
                        <input disabled type="text" maxLength="50" className="textBox" id="txtRoomNameEdit" placeholder={this.state.editResponse.roomname} ></input>
                      </td>
                    </tr>

                    <tr id="createRoomTr" style={{ display: this.props.createPopup === 1 ? 'table-row' : 'none' }}>
                      <td>
                        <input type="text" maxLength="50" className="textBox" placeholder="Title of Meeting" id="txtMeetingTopic" onChange={this.handleMeetingTitle} style={{ color: 'black' }}></input>
                      </td>

                      <td>
                        <input type="text" maxLength="50" className="textBox" onChange={this.handleMeetingRoomName} 
                          placeholder="Name of Room"
                           id="txtRoomName"></input>

                        <span id="spnRoomExists" style={{ display: 'block', fontSize: 11, padding: 5, top: 4, position: 'relative' }}>

                          <span style={{ color: this.state.roomAvail === "No record found." && this.state.meetingRoomName.length >=4 ? 'green' : 'red' }}>

                            {this.state.roomAvail === "No record found." && this.state.emptyValue !== 0 && this.state.meetingRoomName.length >= 4 ? `${this.state.meetingRoomName} is available` :
                              this.state.roomAvail === "Data fetched successfully." && this.state.emptyValue !== 0 && this.state.meetingRoomName.length >= 4 ? `${this.state.meetingRoomName} is not available` :
                                this.state.roomAvail === "No record found." && this.state.emptyValue === 0 ? 'Room name cannot be empty' :
                                  this.state.roomAvail === "Data fetched successfully." && this.state.emptyValue === 0 ? 'Room name cannot be empty' :
                                    this.state.roomAvail === "" && this.state.emptyValue === 0 ? '' :
                                    this.state.meetingRoomName.length < 4 && this.state.meetingRoomName.length > 0 ? 'Room name can not be of less than 4 characters' 

                                      : ''}</span>

                        </span>


                      </td>
                    </tr>


                    <tr>
                      <td>

                        <Flatpickr data-enable-time
                          options={{ dateFormat: 'd-m-Y', clickOpens: true, defaultDate: null, defaultHour: 12, defaultMinute: 0, minDate: null, maxDate: null, enableTime: false, enableSeconds: false, time_24hr: false, noCalendar: false }}

                         type="text" className="textBox flatpickr-input" id="txtMeetingDate" style={{ color: 'black' }}
                          onChange={this.props.createPopup === 1 ? someDate => { this.setState({ someDate }, () => {this.handleMeetingDate(someDate) })} : this.editMeetingDateFun} placeholder={this.state.editPopup === 1 ? this.state.editResponse.conferencescheduletime.split(" ")[0].split("-").reverse().join("-") : "DD-MM-YYYY"} id="txtMeetingDate" style={{ color: 'black' }}>

                          </Flatpickr>

                      </td>

                      <td>



                        <Flatpickr data-enable-time
                        options={{ dateFormat: 'H:i',clickOpens: true, defaultDate: null, defaultHour: 12, defaultMinute: 0, minDate: null, maxDate: null, enableTime: true, enableSeconds: false, time_24hr: true, noCalendar: true }}
                    
                        type="text" className="textBox flatpickr-input" onChange={this.props.createPopup === 1 ? someTime => { this.setState({ someTime }, () => { this.handleMeetingTime(someTime) }) } : this.editMeetingTimeFun} placeholder={this.state.editPopup === 1 ? this.state.editTime : "HH24:MM"} id="txtMeetingDate" style={{ color: 'black' }}
                        ></Flatpickr>





                      </td>
                    </tr>

                    <tr>
                      <td>
                        <input type="text" className="textBox" placeholder={this.state.editPopup === 1 ? this.state.editResponse.room_pass : this.state.meetingPwd} onClick={this.handlePwd} id="txtRoomPassword" style={{ color: 'black', display: 'block' }}></input>
                      </td>

                      <td valign="top">
                        <div className="cstomFile" style={{ display: this.props.createPopup === 1 ? 'block' : 'none' }}>
                          <label for="file-input" className="custom-file-upload fileBtn">
                            <span>Click to Upload File</span>
                          </label>

                          <input id="file-input" name="files[]" className="file-upload centerDatasheet" type="file" style={{ display: 'none' }}></input>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td colSpan="2">
                        <div className="file-list-display" id="file-list-display"></div>
                      </td>
                    </tr>


                  </tbody>
                </table>
              </form>
            </div>


            <div className="popBoxFooter">
              <button className="cancelButton" onClick={() => { this.props.newMeetingClose(); this.closeEditMeeting(); this.openSchedulePopup() }}>Close</button>

              <button id="butSave" onClick={() => { this.createFunctionality(); this.props.onSaveAddMeating() }} style={{ display: this.props.createPopup === 1 ? 'inline-block' : 'none' }}>
                <span >Save</span>
              </button>

              <button id="butEdit" onClick={() => { this.editFunctionality() }} style={{ display: this.state.editPopup === 1 ? 'inline-block' : 'none' }}>

                <span >Save</span>
              </button>
            </div>
          </div>

        </div>

        {/* share action */}

        <div id="dvShareScheduleDetail" className="popBox" style={{ display: this.state.sharePopup === 1 ? 'block' : 'none' }}>

          <ShareDetails

            bc={this.props.bc}
            uname={this.props.uname}
            shareConId={this.state.shareConId}
            shareRoomName={this.state.shareRoomName}
            sharePassword={this.state.sharePassword}
            shareTopic={this.state.shareTopic}
            shareTime={this.state.shareTime}
            sharePopupClose={this.sharePopupClose}

            getFormData={this.props.getFormData}
            getEncFormData={this.props.getEncFormData}
            changeResponse={this.props.changeResponse}

          ></ShareDetails>

        </div>

        {/* delete action */}

        <div id="dvDeleteMessage" className="popBox" style={{ display: this.state.hideDeletePopup === 0 ? 'block' : 'none' }}>

          <DeleteRoom

            deleteRoomName={this.state.deleteRoomName}
            parentResponse={this.state.parentResponse}
            deletePopupClose={this.deletePopupClose}
            scheduleApi={this.props.scheduleApi}
            getFormData={this.props.getFormData}
            getEncFormData={this.props.getEncFormData}
            changeResponse={this.props.changeResponse}

          ></DeleteRoom>

        </div>


        <div id="dvListParticipant" className="popBox" style={{ display: this.state.panelistActionPopup === 1  && this.state.panelActionDataMsg !== '' ? 'block' : 'none' }}>
          <div className="popBoxInner">
            <div className="popBoxHeader" id="dvListParticipantTitle" >
              <h5 style={{fontSize: 18, color:'black', textAlign:'left'}} >
                <span>List of panelist in {this.state.panelActionRoomname}</span>
              </h5>

              <span style={{ float: "right", position: "relative", top: -25 }}>
                <h5 style={{fontSize: 18, color:'black'}}>
                  <span onClick={this.pwdStatus}>Password:</span>

                  {this.state.pwdCounter === 0 ? this.state.panelActionPwd  :
                  <span id="spnEditRoomPassword">{

                    this.state.roomPwdUpdateMsg !== "room pass update successfully." ?

                      <>

                        <input type="text" className="textBox" onChange={this.quickUpdatePwd} id="txtEditRoomPassword" placeholder="Room Password" ></input>


                        <img src={updateImg} onClick={this.quickPwdLogic} className="btnUpdate" />
                      </>

                      : this.state.quickPwd



                  }
                  </span>}
                </h5>
              </span>
            </div>

            <div className="popBoxBody" id="dvListParticipantTable" style={{ overflowY: 'auto', maxHeight: 417 }}>
              <table className="tableBox" id="tblListParticipant" style={{ "width": "100%" }}>
                <tbody>
                  <tr>
                    <th >
                      {/* style={{ "width": "17%" }} */}
                      <span>Name</span>
                    </th>

                    <th >
                    {/* style={{ "width": "22%" }} */}
                      <span>Email Address</span>
                    </th>

                    <th>
                    {/* style={{ "width": "9%" }} */}
                      <span>Code</span>
                    </th>

                    <th >
                    {/* style={{ "width": "15%" }} */}
                      <span>Active</span>
                    </th>

                    <th >
                    {/* style={{ "width": "14%" }} */}
                      <span>Co-Host</span>
                    </th>

                    <th style={{ textAlign: 'center' }}>
                    {/* "width": "7%", */}
                      <span>Action</span>
                    </th>
                  </tr>

                  {



                    this.state.panelActionDataMsg === "participants list fetched successfully" ?

                      this.state.panelActionResponse.map((par, k) => {

                        console.log(par)
                        var deleteActionIcon = "https://bridge01.videomeet.in/images/delete-room.png"
                        var shareActionIcon = "https://bridge01.videomeet.in/images/share_room.png"

                        return (
                          <>
                            <tr>
                              <td>{par.name}</td>
                              <td>{par.email}</td>
                              <td>{par.code}</td>
                              <td>
                                <input type="radio" id="radYesCodeStatus1" readOnly checked={par.code_expire == 0}  style={{ cursor: 'pointer' }}></input>

                                <label for="radYesCodeStatus">
                                  <span>Yes</span>
                                </label>

                                <input type="radio" id="radNoCodeStatus1" readOnly checked={par.code_expire == 1}  style={{ cursor: 'pointer' }}></input>

                                <label for="radNoCodeStatus">
                                  <span>No</span>
                                </label>

                              </td>

                              <td>
                                <input type="radio" id="radYesCoHost1" readOnly checked={par.ishost == 1}  style={{ cursor: 'pointer' }}></input>

                                <label for="radYesCoHost">
                                  <span>Yes</span>
                                </label>

                                <input type="radio" id="radNoCoHost1" readOnly checked={par.ishost == 0}  style={{ cursor: 'pointer' }}></input>

                                <label for="radNoCoHost">
                                  <span>No</span>
                                </label>
                              </td>

                              <td style={{ textAlign: 'center' }}>

                             
                                  <img src={deleteActionIcon} onClick={() => {this.deleteParticipant(par)}} className="image-size-set" alt title="Delete" />
                              

                                <br></br>
                                <br></br>

                                {/* <a href=""> */}
                                <img src={shareActionIcon} onClick={() => { this.sharePanel(par) }} className="image-size-set" alt title="Copy and Share" />
                                {/* </a> */}

                              </td>

                            </tr>
                          </>
                        )

                      })

                      :

                      <tr>
                        <td colSpan="6" >
                          <span>No Records Found.</span>
                        </td>
                      </tr>

                  }

                </tbody>
              </table>
            </div>

            <div className="popBoxFooter">
              <button className="cancelButton" onClick={() => { this.roomActionClose(); this.props.scheduleApi() }} >
                <span>Close</span>
              </button>

              <span id="spnShowDocuments">

                <button onClick={()=>{this.seeListOfDocuments()}}>
                  <span>Document</span>
                </button>

                <button onClick={()=>{this.myRecordings()}}>
                  <span>My Recording</span>
                </button>

                <button onClick={()=>{this.myChats()}}>
                  <span>My Chat</span>
                </button>

                <button onClick={()=>{this.myHistory()}}>
                  <span>History</span>
                </button>

              </span>
            </div>


          </div>
        </div>


        <div id="dvShareToPenalist" className="popBox" style={{ display: this.state.sharePanelPopup === 1 ? 'block' : 'none' }}>

          <SharePanelist
            sharePanelResponse={this.state.sharePanelResponse}
            secondResponse={this.state.secondResponse}
            bc={this.props.bc}
            closeSharePanel={this.closeSharePanel}
          ></SharePanelist>

        </div>




        <div id="dvAddDocument" className="popBox" style={{ display: this.state.uploadDocPopup === 1 ? 'block' : 'none' }}>

          <UploadDocument
            closeUploadDoc={this.closeUploadDoc}
            panelActionRoomname={this.state.panelActionRoomname}
            fetchDocumentResult={this.fetchDocumentResult}
          

          ></UploadDocument>

        </div>

     {
        this.state.uploadLogoPopup === 1 ?
             <UploadLogo
            closeUploadLogo={this.closeUploadLogo}
            panelActionRoomname={this.state.panelActionRoomname}

            getFormData={this.props.getFormData}
            getEncFormData={this.props.getEncFormData}
            changeResponse={this.props.changeResponse}
          ></UploadLogo>

          : ''

     }
       

{ 

this.state.uploadBackgroundPopup === 1 ? 
       
          <UploadBackground
            closeUploadBackground={this.closeUploadBackground}
            panelActionRoomname={this.state.panelActionRoomname}

            getFormData={this.props.getFormData}
            getEncFormData={this.props.getEncFormData}
            changeResponse={this.props.changeResponse}
          ></UploadBackground>
: ''
       
  }

        {

          this.state.documentPopup === 1 ?

            <DocumentList
              closeListofDocuments={this.closeListofDocuments}
              panelActionRoomname={this.state.panelActionRoomname}
              panelUsername={this.props.username}
              uploadDoc={this.uploadDoc}
              uploadLogo={this.uploadLogo}
              uploadBackground={this.uploadBackground}
              listPanelistAction={this.listPanelistAction}
              closeUploadDoc={this.closeUploadDoc}
              closeUploadLogo={this.closeUploadLogo}
              closeUploadBackground={this.closeUploadBackground}
              panelRedirect={this.panelRedirect}
              roomActionClose={this.roomActionClose}

              fetchDocumentResult={this.fetchDocumentResult}
              documentMessage={this.state.documentMessage}
              documentData={this.state.documentData}

              getFormData={this.props.getFormData}
            getEncFormData={this.props.getEncFormData}
            changeResponse={this.props.changeResponse}


            ></DocumentList>


            : ''
        }

        {
          this.state.recordingpopup === 1 ?

            <RecordingList
              closeMyRecordings={this.closeMyRecordings}
              recordingActionRoomname={this.state.panelActionRoomname}
              recordingUsername={this.props.username}
              panelRedirect={this.panelRedirect}
              roomActionClose={this.roomActionClose}

              getFormData={this.props.getFormData}
            getEncFormData={this.props.getEncFormData}
            changeResponse={this.props.changeResponse}
            ></RecordingList> : ''
        }



        {
          this.state.chatPopup === 1 ?

            <ChatList
              closeMyChats={this.closeMyChats}
              chatActionRoomname={this.state.panelActionRoomname}
              panelRedirect={this.panelRedirect}
            roomActionClose={this.roomActionClose}

            getFormData={this.props.getFormData}
            getEncFormData={this.props.getEncFormData}
            changeResponse={this.props.changeResponse}
           

            ></ChatList> : ''
        }


        {
          this.state.historyPopup === 1 ?

            <HistoryList

              closeMyHistory={this.closeMyHistory}
              historyActionRoomname={this.state.panelActionRoomname}
              panelRedirect={this.panelRedirect}
              roomActionClose={this.roomActionClose}

              getFormData={this.props.getFormData}  
            getEncFormData={this.props.getEncFormData}
            changeResponse={this.props.changeResponse}

            ></HistoryList> : ''
        }


        {/* Add Panel popup */}

        {this.state.panelistDialog === 1 || this.state.hidePanelistPopup === 0 ?
          <Panelist

            conferId={this.state.hidePanelistPopup === 0 ? this.state.panelConfrenceId : this.state.panelistDialog === 1 ? this.state.confId : ''}
            meetingRoomName={this.state.hidePanelistPopup === 0 ? this.state.panelRoomName : this.state.panelistDialog === 1 ? this.state.meetingRoomName : ''}
            scheduleApi={this.props.scheduleApi}
            newMeetingClose={this.props.newMeetingClose}
            onSaveAddMeating={this.props.onSaveAddMeating}
            closePanel={this.closePanel}
            clickPanelIcon={this.state.clickPanelIcon}
            newMeetingDialog={this.props.newMeetingDialog}
            openSchedulePopup={this.openSchedulePopup}
            getFormData={this.props.getFormData}
            changeResponse={this.props.changeResponse}

          ></Panelist> : ''
        }

      </>
    )
  }

}

export default ScheduleMeetinglist;

