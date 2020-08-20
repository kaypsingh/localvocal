import React from 'react';
import qs from 'qs'
import axios from 'axios';
import DatePicker from 'react-date-picker';
import Panelist from './Panelist'

class ScheduleMeetinglist extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
      dataEntry: '',
      dataSource: [],
      parentData: {},
      createPopup: 0,
      meetingTitle: '',
      meetingDate: new Date(),
      meetingPwd: 'Meeting Password',
      meetingRoomName: '',
      meetingTime: '',
      selectedOption: 1,
      roomAvail: '',
      emptyValue: 0,
      waitingRoom: false,
      confId: '',
      panelistDialog: 0

    }
  }

  handleMeetingTitle = (event) => {
    this.setState({ meetingTitle: event.target.value }, () => { console.log(this.state.meetingTitle) });

  }

  handleMeetingDate = (event) => {
    this.setState({ meetingDate: event.target.value });
  }

  handleMeetingRoomName = (event) => {

    console.log(event.target.value)
    this.setState({ meetingRoomName: event.target.value }, () => { console.log(this.state.meetingRoomName) })

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

  handleMeetingTime = (event) => {
    this.setState({ meetingTime: event.target.value });
  }

  handlePwd = () => {
    //  var pwd =  Math.floor(1000 + Math.random() * 9000);
    var pwd = Math.floor(Math.random() * 90000) + 10000
    console.log(pwd)
    this.setState({ meetingPwd: pwd })
  }

  newMeetingDialog = () => {
    this.setState({ createPopup: 1 })
  }

  newMeetingClose = () => {
    this.setState({ createPopup: 0 }, this.scheduleApi)
  }

  saveBtn = () => {

   
    var a = this.state.meetingDate
   

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

        this.setState({confId: response.data.data.confrenceid } , () => {
          if(response.data.msg === "conference scheduled successfully"){

            console.log('kooo')
            //do something here
           this.setState({panelistDialog: 1})
          }
        })

     


      },
        (error) => {
          console.log(error)
        }
      )

    // }


  }

  onValueChange = (event) => {

    this.setState({
      selectedOption: event.target.value
    });
  }


  scheduleApi = () => {

    axios.post('https://api.videomeet.in/v2/conference.php/confrencelist', qs.stringify({

      authkey: 'M2atKiuCGKOo9Mj3',
      username: this.props.uname


    }), {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {
        console.log(response)
        console.log(response.data.msg)

        if (response.data.msg === "No record found") {
          this.setState({ dataEntry: 'No record found' })
        }

        else if (response.data.msg === "conference list fetched successfully") {
          var res = response.data.data
          this.setState({ dataSource: res, parentData: response.data.msg })

        }

      },
        (error) => {
          console.log(error)
        }
      )



  }

  componentDidMount() {
    this.scheduleApi()
  }

  render() {
    var logoutImg = 'https://bridge01.videomeet.in/images/logout-username.png'

    return (
      <>

        <div id="dvListScheduleMeeting" className="popBox" style={{ display: this.state.createPopup === 0 ? '' : 'none' }}>

          <div className="popBoxInner">
            <div className="popBoxHeader" id="dvScheduleMeetingTitle">

              <h5>
                <span>Schedule Meeting for {this.props.bc}

                </span>
              </h5>
              <img src={logoutImg} className="shift-right" style={{ cursor: 'pointer' }} />

            </div>

            <div className="popBoxBody" id="dvListScheduleMeetingTable" style={{ overflowY: 'auto' }} >

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

                    this.state.parentData === "conference list fetched successfully" ?

                      this.state.dataSource.map((res, k) => {
                        var j = Object.values(res)

                        var lock = "https://bridge01.videomeet.in/images/lock.png"
                        var videoIcon = "https://bridge01.videomeet.in/images/cameraIconBlue.png"

                        return (
                          <>
                            <tr>
                              <td>
                                <img className="showpassword" style={{ height: 10, width: 10, cursor: 'pointer', display: res['room_pass'] === '' ? 'none' : '' }} src={lock} title={res['room_pass']} />
                                <img className="enterroomdirectly" style={{ height: 10, width: 10, cursor: 'pointer' }} src={videoIcon} title="Click to enter the room" />
                                <a href="">{res['roomname']}</a>
                              </td>
                              <td>{res['topic']}</td>
                              <td>
                                <span>{'Sensitive'}</span>
                              </td>
                              <td>{res['conferencescheduletime']}</td>

                              <td style={{ textAlign: 'center' }}></td>
                              <td style={{ textAlign: 'center' }}></td>
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
              <button className="cancelButton" >
                <span>close</span>
              </button>
              <button onClick={this.newMeetingDialog}>
                <span>New Meeting</span>
              </button>
            </div>



          </div>

        </div>


        <div id="dvCreateNewMeeting" className="popBox" 
        
        style={{ display: this.state.createPopup === 1 && this.state.panelistDialog === 0 ? 'block' :
        this.state.createPopup === 1 && this.state.panelistDialog === 1 ? 'none': 'none'

        
       }}>
          <div className="popBoxInner">
            <div className="popBoxHeader" id="dvSetTitle">
              <h5>
                <span>Good Afternoon! </span>
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


                    <tr id="editRommTr" style={{ display: 'none' }}>

                      <td>
                        <input type="text" maxLength="50" className="textBox" placeholder="Title of Meeting" id="txtMeetingTopicEdit"></input>
                      </td>

                      <td>
                        <input type="text" maxLength="50" className="textBox" placeholder="Name of Room" id="txtRoomNameEdit"></input>
                      </td>
                    </tr>

                    <tr id="createRoomTr" style={{ display: 'table-row' }}>
                      <td>
                        <input type="text" maxLength="50" className="textBox" placeholder="Title of Meeting" id="txtMeetingTopic" onChange={this.handleMeetingTitle}></input>
                      </td>

                      <td>
                        <input type="text" maxLength="50" className="textBox" onChange={this.handleMeetingRoomName}
                          placeholder="Name of Room" id="txtRoomName"></input>

                        <span id="spnRoomExists" style={{ display: 'block', fontSize: 11, padding: 5, top: 4, position: 'relative' }}>

                          <span style={{ color: this.state.roomAvail === "No record found." ? 'green' : 'red' }}>

                            {this.state.roomAvail === "No record found." && this.state.emptyValue !== 0 ? 'available' :
                              this.state.roomAvail === "Data fetched successfully." && this.state.emptyValue !== 0 ? 'not available' :
                                this.state.roomAvail === "No record found." && this.state.emptyValue === 0 ? 'Room name cannot be empty' :
                                  this.state.roomAvail === "Data fetched successfully." && this.state.emptyValue === 0 ? 'Room name cannot be empty' :
                                    this.state.roomAvail === "" && this.state.emptyValue === 0 ? ''

                                      : ''}</span>

                        </span>


                      </td>
                    </tr>


                    <tr>
                      <td>

                        <input type="text" className="textBox flatpickr-input" placeholder="DD-MM-YYYY" onChange={this.handleMeetingDate} id="txtMeetingDate" style={{ color: 'black' }}></input>

                      </td>

                      <td>
                        <input type="text" className="textBox flatpickr-input" onChange={this.handleMeetingTime} placeholder="HH24:MM" id="txtMeetingDate" style={{ color: 'black' }}></input>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <input type="text" className="textBox" placeholder={this.state.meetingPwd} onClick={this.handlePwd} id="txtRoomPassword" style={{ color: 'black', display: 'block' }}></input>
                      </td>

                      <td valign="top">
                        <div className="cstomFile" style={{ display: 'block' }}>
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
              <button className="cancelButton" onClick={this.newMeetingClose}>Close</button>

              <button id="butSave" disabled style={{ display: 'inline-block' }}>
                <span onClick={this.saveBtn}>Save</span>
              </button>

              <button id="butEdit" style={{ display: 'none' }}>

                <span>Save</span>
              </button>
            </div>
          </div>

        </div>
     
     
        {this.state.panelistDialog === 1 ?
          <Panelist
          conferId= {this.state.confId}
          ></Panelist>: ''
        }
     
      </>
    )
  }

}

export default ScheduleMeetinglist;

