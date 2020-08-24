import React from 'react';
import qs from 'qs'
import axios from 'axios';
import './LoginMeeting.css'
import ScheduleMeetinglist from './ScheduleMeetinglist';


class LoginMeeting extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
   
    }
  }

 


 

  render() {

  
    return (


      this.props.login === 0 && this.props.name === ''?
        <>

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
            </div>
          </div>

        </>

        : this.props.login === 1 && this.props.name !== "" ?

       <ScheduleMeetinglist
       bc = {this.props.name}
       uname = {this.props.username}
       scheduleApi = {this.props.scheduleApi}
      //  scheduleApi={this.scheduleApi}
       dataSource={this.props.dataSource}
       parentData={this.props.parentData}

       >

       </ScheduleMeetinglist>

       : ''


    )
  }

}

export default LoginMeeting;

