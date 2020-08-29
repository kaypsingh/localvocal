import React from 'react';
import qs from 'qs'
import axios from 'axios';
import Panelist from './Panelist';
import DocumentList from './DocumentList';
import RecordingList from './RecordingList';
import ChatList from './ChatList';
import HistoryList from './HistoryList';
import ShareDetails from './ShareDetails';

// import "flatpickr/dist/themes/material_green.css";

// import Flatpickr from "react-flatpickr";

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
      // date: new Date()

      sharePanelPopup: 0,
      sharePanelResponse: [],
      secondResponse: [],
      pwdCounter: 0

    }
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


  quickPwdLogic = () => {

    console.log(this.state.panelActionRoomname)
    console.log(this.state.quickPwd)
    axios.post('https://api.videomeet.in/v2/conference.php/roompassupdate', qs.stringify({

      authkey: 'M2atKiuCGKOo9Mj3',
      roomname: this.state.panelActionRoomname,
      room_pass: this.state.quickPwd

    }), {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {

        console.log(response)

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
    axios.post('https://api.videomeet.in/v2/conference.php/filelist', qs.stringify({

        authkey: 'M2atKiuCGKOo9Mj3',
        roomname: this.state.panelActionRoomname,
        ownername: this.state.panelUsername

    }), {
        'Content-Type': 'application/x-www-form-urlencoded',
        "Access-Control-Allow-Origin": "*",
    }

    )
        .then((response) => {

            console.log(response)

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
  
  axios.post('https://api.videomeet.in/v2/participants.php/delete', qs.stringify({

    authkey: 'M2atKiuCGKOo9Mj3',
    participantid: r.participantid

  }), {
    'Content-Type': 'application/x-www-form-urlencoded',
    "Access-Control-Allow-Origin": "*",
  }

  )
    .then((response) => {

      console.log(response.data.msg)
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


    axios.post('https://api.videomeet.in/v2/participants.php/participantlist', qs.stringify({

      authkey: 'M2atKiuCGKOo9Mj3',
      conferenceid: r.confrenceid

    }), {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {

        console.log(response.data.msg)

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


    // const { date } = this.state;
    // var newDate = new Date(date.toDateString());
    // console.log(newDate)
    // this.setState({ meetingDate: newDate } , () => {console.log(this.state.meetingDate)});
    this.setState({ meetingDate: event.target.value });
  }

  editMeetingDateFun = (event) => {
    this.setState({ editMeetingDate: event.target.value })
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

    axios.post('https://api.videomeet.in/v2/conferenceschedule.php', qs.stringify({

      authkey: 'M2atKiuCGKOo9Mj3',
      roomname: event.target.value,


    }), {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {
        console.log(response.data.msg)
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
    console.log(event.target.value)
    this.setState({ meetingTime: event.target.value });
  }

  editMeetingTimeFun = (event) => {
    console.log(event.target.value)
    this.setState({ editMeetingTime: event.target.value })
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


    axios.post('https://api.videomeet.in/v2/conference.php/update', qs.stringify({

      authkey: 'M2atKiuCGKOo9Mj3',
      conferencescheduletime:

        this.state.editMeetingDate == "" && this.state.editMeetingTime === "" ? this.state.editResponse.conferencescheduletime :
          this.state.editMeetingDate !== "" && this.state.editMeetingTime !== "" ? this.state.editMeetingDate.split("-")[2] + "-" + this.state.editMeetingDate.split("-")[1] + "-" + this.state.editMeetingDate.split("-")[0] + " " + this.state.editMeetingTime :
            this.state.editMeetingDate !== "" && this.state.editMeetingTime === "" ? this.state.editMeetingDate.split("-")[2] + "-" + this.state.editMeetingDate.split("-")[1] + "-" + this.state.editMeetingDate.split("-")[0] + " " + this.state.editTime :
              this.state.editResponse.conferencescheduletime


      ,
      topic: t,
      roomname: this.state.editResponse.roomname.toLowerCase(),
      conferenceexpirationtime: conferenceexpirationtime,
      mode: "1",
      room_pass: this.state.editResponse.room_pass,
      waitingroomenable: "1",
      confrenceid: this.state.editResponse.confrenceid
    }), {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {
        this.setState({ editPopup: 0 , schedulePopup: 1 }, () => this.props.scheduleApi())
        console.log(response)
        alert(response.data.msg)

      },
        (error) => {
          console.log(error)
        }
      )




  }







  createFunctionality = () => {

    //     var aday =  this.state.meetingDate
    // console.log(aday)
    //     var today = new Date(aday.toDateString());
    //     console.log(today)  

    //     const { date } = this.state;
    //     var newDate = new Date(date.toDateString());
    //     console.log(newDate)

    // var sortedDate=today.getDate() + "-"+ parseInt(today.getMonth()+1) +"-"+today.getFullYear();

    // console.log(sortedDate)


    //it will accept dash values(meetingDate should be in 29-11-1993)




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

      axios.post('https://api.videomeet.in/v2/conference.php/add', qs.stringify({

        authkey: 'M2atKiuCGKOo9Mj3',
        username: this.props.uname,
        conferencescheduletime: this.state.meetingDate.split("-")[2] + "-" + this.state.meetingDate.split("-")[1] + "-" + this.state.meetingDate.split("-")[0] + " " + this.state.meetingTime,
        topic: this.state.meetingTitle,
        // roomname: "mummy",
        roomname: this.state.meetingRoomName.toLowerCase(),
        req_origin: "web",
        conferenceexpirationtime: conferenceexpirationtime,
        mode: "1",
        room_pass: this.state.meetingPwd,
        waitingroomenable: roomEnable


      }), {
        'Content-Type': 'application/x-www-form-urlencoded',
        "Access-Control-Allow-Origin": "*",
      }

      )
        .then((response) => {
          console.log(response)
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
                  
                  <a href="#" style={{font: 'white'}} >{this.props.bc}</a>

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
             
                <button className="cancelButton" onClick={()=>{this.closeSchedulePopup();this.props.scheduleButton();this.props.panelRedirect()}} >
                  <span>close</span>
                </button>
              <button onClick={()=>{this.props.newMeetingDialog();this.closeSchedulePopup()}}>
                <span>New Meeting</span>
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
                        <input type="text" maxLength="50" className="textBox" id="txtMeetingTopicEdit" placeholder={this.state.editResponse.topic}
                          onChange={this.editMeetingTitleFun}
                        ></input>
                      </td>

                      <td>
                        <input disabled type="text" maxLength="50" className="textBox" id="txtRoomNameEdit" placeholder={this.state.editResponse.roomname} ></input>
                      </td>
                    </tr>

                    <tr id="createRoomTr" style={{ display: this.props.createPopup === 1 ? 'table-row' : 'none' }}>
                      <td>
                        <input type="text" maxLength="50" className="textBox" placeholder="Title of Meeting" id="txtMeetingTopic" onChange={this.handleMeetingTitle}></input>
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

                        {/*                         
                        <Flatpickr data-enable-time
                          options={{
                            dateFormat: 'd-m-Y',

                            clickOpens: true,
                            defaultDate: null,
                            defaultHour: 12,
                            defaultMinute: 0,
                            minDate: null,
                            maxDate: null,
                            enableTime: false,
                            enableSeconds: false,
                            time_24hr: false,
                            noCalendar: false

                          }} */}

                        {/* value={meetingDate} */}

                        {/* onChange={meetingDate => {
                            this.setState({ meetingDate },() => {console.log(this.state.meetingDate)});
                          }}

                       placeholder={this.state.editPopup === 1 ? this.state.editResponse.conferencescheduletime.split(" ")[0].split("-").reverse().join("-") : "DD-MM-YYYY"}
                    
                      //  onChange={this.props.createPopup === 1 ? this.handleMeetingDate : this.editMeetingDateFun}
                        > */}

                        <input type="text" className="textBox flatpickr-input" id="txtMeetingDate" style={{ color: 'black' }}
                          onChange={this.props.createPopup === 1 ? this.handleMeetingDate : this.editMeetingDateFun} placeholder={this.state.editPopup === 1 ? this.state.editResponse.conferencescheduletime.split(" ")[0].split("-").reverse().join("-") : "DD-MM-YYYY"} id="txtMeetingDate" style={{ color: 'black' }}></input>

                      </td>

                      <td>



                        <input type="text" className="textBox flatpickr-input" onChange={this.props.createPopup === 1 ? this.handleMeetingTime : this.editMeetingTimeFun} placeholder={this.state.editPopup === 1 ? this.state.editTime : "HH24:MM"} id="txtMeetingDate" style={{ color: 'black' }}
                        ></input>





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

          ></ShareDetails>

        </div>

        {/* delete action */}

        <div id="dvDeleteMessage" className="popBox" style={{ display: this.state.hideDeletePopup === 0 ? 'block' : 'none' }}>

          <DeleteRoom

            deleteRoomName={this.state.deleteRoomName}
            parentResponse={this.state.parentResponse}
            deletePopupClose={this.deletePopupClose}
            scheduleApi={this.props.scheduleApi}

          ></DeleteRoom>

        </div>


        <div id="dvListParticipant" className="popBox" style={{ display: this.state.panelistActionPopup === 1 ? 'block' : 'none' }}>
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

        <div id="dvAddDocumentLogo" className="popBox" style={{ display: this.state.uploadLogoPopup === 1 ? 'block' : 'none' }} >
          <UploadLogo
            closeUploadLogo={this.closeUploadLogo}
            panelActionRoomname={this.state.panelActionRoomname}
          ></UploadLogo>
        </div>

        <div id="dvBackgroundImage" className="popBox" style={{ display: this.state.uploadBackgroundPopup === 1 ? 'block' : 'none' }}>
          <UploadBackground
            closeUploadBackground={this.closeUploadBackground}
            panelActionRoomname={this.state.panelActionRoomname}
          ></UploadBackground>

        </div>


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
            ></RecordingList> : ''
        }



        {
          this.state.chatPopup === 1 ?

            <ChatList
              closeMyChats={this.closeMyChats}
              chatActionRoomname={this.state.panelActionRoomname}
              panelRedirect={this.panelRedirect}
            roomActionClose={this.roomActionClose}
           

            ></ChatList> : ''
        }


        {
          this.state.historyPopup === 1 ?

            <HistoryList

              closeMyHistory={this.closeMyHistory}
              historyActionRoomname={this.state.panelActionRoomname}
              panelRedirect={this.panelRedirect}
              roomActionClose={this.roomActionClose}

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

          ></Panelist> : ''
        }

      </>
    )
  }

}

export default ScheduleMeetinglist;

