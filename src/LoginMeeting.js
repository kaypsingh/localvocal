import React from 'react';
import qs from 'qs'
import axios from 'axios';

import ScheduleMeetinglist from './ScheduleMeetinglist';


class LoginMeeting extends React.Component {

  constructor(props) {
    super(props)
    this.state = {

      forgotPopup: 0,
      forgotUsername: ''

    }
  }

  handleForgotUsername = (event) => {

    var txtUserName = event.target.value
    this.setState({forgotUsername: txtUserName } , () => {console.log(this.state.forgotUsername)})
  }

  forgotPwd = () => {

    this.setState({ forgotPopup: 1 })
  }

  closeForgotPwd = () => {

    this.setState({ forgotPopup: 0 })
  }

  handleForgotPwd = () => {

this.state.forgotUsername !== "" ? 

    axios.post('https://api.videomeet.in/v2/forgotpassword.php', qs.stringify({

      authkey: 'M2atKiuCGKOo9Mj3',
      username: this.state.forgotUsername,
    

    }), {
      'Content-Type': 'application/x-www-form-urlencoded',
      "Access-Control-Allow-Origin": "*",
    }

    )
    .then((response) => {
      console.log(response)
      alert(response.data.msg)
     
      
      },
        (error) => {
          console.log(error)
        }
      )


: alert('invalid username')


  }



  render() {


    return (


      this.props.login === 0 && this.props.name === '' ?
        <>
          <div id="dvAuthenticateUser" className="popBox" style={{ display: this.state.forgotPopup === 0 ? '' : 'none' }}>

            <div className="popBoxInner">

              <div className="popBoxBody">
                <label>
                  <span>VIDEOMEET Username</span>
                </label>
                <input type="text" className="textBox" id="txtUserName" placeholder="username"
                  onChange={this.props.handleUnameChange}
                />

                <label>
                  <span>Password</span>

                </label>
                <input type="password" className="textBox" id="txtPassword" placeholder="password"
                  onChange={this.props.handlePwdChange}
                />
              </div>

              <div className="popBoxFooter">

                <button className="cancelButton" onClick={this.props.cancelBtn} >Cancel</button>
                <button className="loginButton" onClick={this.props.handleLogin} >Login</button>

                <a>
                  <span onClick={this.forgotPwd}>Forgot Password</span>
                </a>

              </div>
            </div>

          </div>

 {/* forgot popup */}

          <div className="popBox" id="dvForgotPassword" style={{ display: this.state.forgotPopup === 1 ? 'block' : 'none' }}>

            <div className="popBoxInner">

              <div className="popBoxBody">
                <label>
                  <span>VIDEOMEET Username</span>
                </label>

                <input type="text" className="textBox" id="txtUserName1" placeholder="username" onChange={this.handleForgotUsername}>

                </input>

            
              </div>

              <div className="popBoxFooter">
                <button className="cancelButton" onClick={this.closeForgotPwd} >
                  <span>Cancel</span>
                </button>

                <button onClick={this.handleForgotPwd}>
                  <span>Login</span>
                </button>
              </div>
            </div>
          </div>

        </>

        : this.props.login === 1 && this.props.name !== "" ?

          <ScheduleMeetinglist
            bc={this.props.name}
            uname={this.props.username}
            scheduleApi={this.props.scheduleApi}
            //  scheduleApi={this.scheduleApi}
            dataSource={this.props.dataSource}
            parentData={this.props.parentData}

            newMeetingDialog={this.props.newMeetingDialog}
            newMeetingClose={this.props.newMeetingClose}
          
            createPopup={this.props.createPopup}
            onSaveAddMeating={this.props.onSaveAddMeating}
            scheduleButton={this.props.scheduleButton}

            logoutLogic={this.props.logoutLogic}
          >

          </ScheduleMeetinglist>

          : ''


    )
  }

}

export default LoginMeeting;

