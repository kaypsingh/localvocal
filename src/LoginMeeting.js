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

 




  // handleLogin = () => {

  //   if (this.props.username === '' && this.state.password === '') { alert('enter username and password') }

  //   else if(this.props.username === '' && this.state.password !== '') {alert('enter username')}

  //   else if(this.props.username !== '' && this.state.password === '') {alert('enter password')}

  //   else {

  //     axios.post('https://api.videomeet.in/v2/authentication.php/', qs.stringify({

  //       authkey: 'M2atKiuCGKOo9Mj3',
  //       username: this.props.username,
  //       password: this.state.password,

  //     }), {
  //       'Content-Type': 'application/x-www-form-urlencoded',
  //       "Access-Control-Allow-Origin": "*",
  //     }

  //     )
  //       .then((response) => {
  //         console.log(response)

  //         const loginCredentials = localStorage.getItem('added-credentials')
  //         console.log(loginCredentials.length)

  //         const parsedrest = []
  //         parsedrest.push({ username: this.props.username, password: this.state.password })


  //         localStorage.setItem('added-credentials', JSON.stringify(parsedrest));
  //         console.log(loginCredentials)
        
  //         if (response.request.readyState === 4 && response.request.status === 200) {

  //           if (response.data.status === 1) {

  //          var name = response.data.data.name

  //          if(loginCredentials.length !== 0) {

  //             this.setState({ login: 1  }, () => {this.props.getName(name)})

  //          }else{
             
  //          }


  //           }

  //           else if (response.data.status === 0) {

  //             alert('Please check Username and Password')

  //           }
  //         }
  //       },
  //         (error) => {
  //           console.log(error)
  //         }
  //       )


  //   }

  // }


 

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

