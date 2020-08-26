import React from 'react';
import './App.css';
import './allstyle.css';
import qs from 'qs';
import axios from 'axios';
import LoginMeeting from './LoginMeeting'
import ScheduleMeetinglist from './ScheduleMeetinglist'
import Panelist from './Panelist'
import DocumentList from './DocumentList'
import RecordingList from './RecordingList'
import ChatList from './ChatList';
import HistoryList from './HistoryList.js';

class App extends React.Component {

  constructor(props) {
    super(props)
    this.state = {

      createPopup: 0,
      meetingbox: 0,
      cancelButton: 0,
      name: '',
      username: '',
      password: '',
      loginCredentials: [],
     
      login: 0,
      dataSource: [],
      parentData: '',
      dataEntry: '',
      scheduleListDisplay: 0
    }
  }


  newMeetingDialog = () => {
    this.setState({ createPopup: 1 })
  }

  newMeetingClose = () => {
 
    console.log('hanji')
    this.setState({ createPopup: 0 })
    // , this.scheduleApi
  }

  onSaveAddMeating = () => {
    console.log('clickedddddddddddd')
    this.setState({ createPopup: 1 })
  }
  
  handlePwdChange = (event) => {
    this.setState({ password: event.target.value });
  }



  handleLogin = () => {

    if (this.state.username === '' && this.state.password === '') { alert('enter username and password') }

    else if(this.state.username === '' && this.state.password !== '') {alert('enter username')}

    else if(this.state.username !== '' && this.state.password === '') {alert('enter password')}

    else {

      axios.post('https://api.videomeet.in/v2/authentication.php/', qs.stringify({

        authkey: 'M2atKiuCGKOo9Mj3',
        username: this.state.username,
        password: this.state.password,

      }), {
        'Content-Type': 'application/x-www-form-urlencoded',
        "Access-Control-Allow-Origin": "*",
      }

      )
        .then((response) => {
          console.log(response)

          const loginCredentials = localStorage.getItem('added-credentials')
          // console.log(loginCredentials.length)

          const parsedrest = []
          parsedrest.push({ username: this.state.username, password: this.state.password })


          localStorage.setItem('added-credentials', JSON.stringify(parsedrest));
          console.log(loginCredentials)
        
          if (response.request.readyState === 4 && response.request.status === 200) {

            if (response.data.status === 1) {

           var name = response.data.data.name

           if(loginCredentials !== null)   {

              this.setState({ login: 1  }, () => {this.getName(name)})

           }else{
             
           }


            }

            else if (response.data.status === 0) {

              alert('Please check Username and Password')

            }
          }
        },
          (error) => {
            console.log(error)
          }
        )


    }

  }







  scheduleApi = () => {

console.log('ji')
    this.setState({ createPopup: 0 })
    axios.post('https://api.videomeet.in/v2/conference.php/confrencelist', qs.stringify({

      authkey: 'M2atKiuCGKOo9Mj3',
      username: this.state.username


    }), {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
      .then((response) => {
        console.log(response)
        console.log(response.data.msg)

        if (response.data.msg === "No record found") {
          this.setState({ dataEntry: 'No record found', parentData: "No record found" })
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




  handleUnameChange = (event) => {

    // var a = event.target.value
    // if(a.match(/^[a-zA-Z ]*$/)){

    //   alert('invalid')}else{

    this.setState({ username: event.target.value });
      // }
  }

  loginSuccessful = () => {
    console.log('ho gay')
  }

  cancelBtn = () => {
    this.setState({ cancelButton: 1, meetingbox: 0 })
    console.log('ll')
  }

  scheduleMeet = () => {
    this.setState({ meetingbox: 1 })

  }

  getName = (val) => {
    this.setState({ name: val })
    console.log(val)
  }

  meetingList = () => {
    console.log('login')
    return (
      <ScheduleMeetinglist></ScheduleMeetinglist>
    )
  }


  componentDidMount() {

  }

  render() {

    return (

      this.state.meetingbox === 0 ?

        <>
          <div className="welcome-page-settings">
            <div className="welcome-page-signup-container">
              <div className="welcome-page-signup-div" id="dvLoggedInUserName"></div>
              <div className="welcome-page-signup-div" id="dvHostAMeeting">Host a Meeting</div>


            </div>
          </div>
          <div className="header-text">
            <h1 className=" header-text-title">Bringing People Together</h1>


            <div className="welcome without-content">

              <div id="enter_room" style={{ display: this.state.meetingbox === 0 ? '' : 'none' }}>
                <div className="enter-room-input-container">
                  <div className="enter-room-title" >Create / Join Meeting</div>
                  <a className="helper-link">Echo Test</a>
                  <input className="enter-room-input" id="user_display_name" placeholder="Your Name" type="text" maxlength="50" autoComplet="0ff" tabIndex="1" />

                  <form>

                    <input className="enter-room-input" id="enter_room_field" placeholder="Meeting Room Name" type="text" maxlength="50" autoComplete="off" />

                  </form>
                </div>

                <button className="welcome-page-button" id="enter_room_button" tabIndex="3">Start</button>

                <div className="welcome-page-button-schedule" onClick={this.scheduleMeet} id="schedule_button" tabIndex="4">Schedule</div>

                <div className="welcome-page-conf-web" >Conference / Webinar </div>


              </div>
            </div>
          </div>

        </> :

        <LoginMeeting
          cancelBtn={this.cancelBtn}
          meetingList={this.meetingList}
          loginSuccessful={this.loginSuccessful}
          name={this.state.name}
          getName={this.getName}
          username={this.state.username}
          handleLogin={this.handleLogin}
          handleUnameChange={this.handleUnameChange}
          handlePwdChange={this.handlePwdChange}
          scheduleApi={this.scheduleApi}
          dataSource={this.state.dataSource}
          parentData={this.state.parentData}
          scheduleListDisplay={this.state.scheduleListDisplay}
          login={this.state.login}

          newMeetingDialog={this.newMeetingDialog}
          newMeetingClose={this.newMeetingClose}
          createPopup={this.state.createPopup}
          onSaveAddMeating={this.onSaveAddMeating}

        ></LoginMeeting>

    )
  }

}

export default App;
