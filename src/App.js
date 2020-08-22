import React from 'react';
import './App.css';
import './allstyle.css';
import qs from 'qs';
import axios from 'axios';
import LoginMeeting from './LoginMeeting'
import ScheduleMeetinglist from './ScheduleMeetinglist'
import Panelist from './Panelist'

class App extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
      meetingbox: 0,
      cancelButton: 0,
      name: '',
      username: '',
      dataSource: [],
      parentData: {},
      dataEntry: '',
      scheduleListDisplay: 0
    }
  }


  scheduleApi = () => {


    this.setState({ scheduleListDisplay: 1 })
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




  handleUnameChange = (event) => {

    this.setState({ username: event.target.value });
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
          handleUnameChange={this.handleUnameChange}
          scheduleApi={this.scheduleApi}
          dataSource={this.state.dataSource}
          parentData={this.state.parentData}
          scheduleListDisplay={this.state.scheduleListDisplay}
        ></LoginMeeting>

    )
  }

}

export default App;
