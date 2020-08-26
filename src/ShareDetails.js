import React from 'react';
import qs from 'qs'
import axios from 'axios';


class ShareDetails extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            clickedPwd: 0

        }
    }


    fetchParticipants = () => {


        axios.post('https://api.videomeet.in/v2/participants.php/participantlist', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
            conferenceid: this.props.shareConId

        }), {
            'Content-Type': 'application/x-www-form-urlencoded',
            "Access-Control-Allow-Origin": "*",
        }

        )
            .then((response) => {

                console.log(response.data.msg)

               console.log(response)

               response.data.data.map((res,k) => {

                var resCode = res.code
               var resEmail = res.email
                 var resName = res.name
                 var resPwd = res.room_pass
               
                this.handleEmail(resName,resCode,resEmail,resPwd)

               })


            },
                (error) => {
                    console.log(error)
                }
            )



    }

    pwdHandle = () => {
        console.log('clicked!')
        this.setState({ clickedPwd: 1})
    }


    handleEmail = (penalistName,txtPenalistCode,penalistEmailAddress,penalistPwd) => {

        var roomname = this.props.shareRoomName
        axios.post('https://api.videomeet.in/v2/mail1.php/', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
            emailAddress: penalistEmailAddress,
            subject: "Sensitive Meeting Invitation",
            mailBody: 
            
           this.state.clickedPwd === 0 ?
            `Dear <b> ${penalistName} </b><br/><br/> <b>${this.props.bc}</b> is inviting you to a scheduled VideoMeet.<br/> Topic: $$topic<br/> Date Time: $$dateTime<br/><br/> Join VideoMeet:<br/> Meeting Room Name : $$roomName<br/> Panelist Code :${txtPenalistCode} <br/><br/> On your computer / laptop :Visit:- <a href='https://bridge01.videomeet.in'>https://bridge01.videomeet.in</a><br/> Enter your name and room name as mentioned above.<br/><br/> On your Android :<br/> Install App from Playstore by clicking on the <a href='https://play.google.com/store/apps/details?id=com.datainfosys.videomeet'>https://play.google.com/store/apps/details?id=com.datainfosys.videomeet</a> and after installation enter your name and room name as above.<br/><br/> On your iPhone :<br/> Install App from Playstore by clicking on the <a href='https://apps.apple.com/us/app/videomeet-audio-video/id1346514570'>https://apps.apple.com/us/app/videomeet-audio-video/id1346514570</a> and after installation enter your name and room name as above.<br/></br>Please join the meeting by using the password sent to you in separate email. In case you have no received the password, please contact the host.`
:
            `Dear <b> ${penalistName} </b><br/><br/> You have already received email from <b>${this.props.bc}</b> to join the meeting <b>$$topic</b><br/> You will need the password to join the meeting.<br/><br/> Room Password: ${penalistPwd}<br/><br/> Please join the meeting by using the above password.<br/> The joining details are being sent in separate email.<br/><br/> In case of any issue, please contact the host.<br/><br/> VideoMeet.`

      
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
      
    }


    componentDidMount() {


    }

    render() {

        var copyIcon = "https://bridge01.videomeet.in/images/copy.jpg";

        return (
            <>

                <div className="popBoxInner">
                    <div className="popBoxHeader">
                        <h5>
                            <span>Copy and Share to Invite</span>
                        </h5>
                    </div>

                    <div className="popBoxBody" id="dvShareDetailBody">
                        <h5>
                            <span>
                                <strong> {this.props.bc}  is inviting you to a scheduled VideoMeet.</strong>
                            </span>
                        </h5>


                        <h6>
                            <u><span>Topic</span>{": "}{this.props.shareTopic}</u>
                        </h6>

                        <p>
                            <strong>
                                <span>Time</span>{": "}{this.props.shareTime}
                            </strong>

                            <br>
                            </br>

                            <strong>
                                <span>Host</span>{": "}{this.props.bc}
                            </strong>
                        </p>


                        <h6>
                            <u>
                                <span>Joining Details</span>
                            </u>
                        </h6>

                        <p>
                            <strong>Meeting Room Name</strong>{": "}{this.props.shareRoomName}
                            <br></br>

                            <strong>Meeting Room Password</strong>{": "}{this.props.sharePassword}


                        </p>


                        <h6>
                            <u>
                                <span>Join VideoMeet</span>
                            </u>

                        </h6>

                        <a href="https://bridge01.videomeet.in/" className="upMove" target="_blank">https:/bridge01.videomeet.in</a>

                        <img src={copyIcon} title="Click to copy" style={{ right: -545, position: "relative", top: 73, cursor: 'pointer' }} />

                    </div>

                    <div className="popBoxFooter">
                        <button className="cancelButton" onClick={this.props.sharePopupClose} >
                            <span>Close</span>
                        </button>

                        <span id="spnSendMailToShare">
                        {/* onClick={this.handleEmail} */}
                            <button className="btnMail" onClick={this.fetchParticipants} >
                                <span>  Send Mail With Password</span>
                            </button>

                            <button className="btnMail" onClick={this.fetchParticipants}>
                                <span>  Send Mail Without Password</span>
                            </button>

                            <button className="btnMail" onClick={() => {this.fetchParticipants() ; this.pwdHandle()}}>
                                <span>  Send Password</span>
                            </button>



                        </span>

                    </div>
                </div>


            </>


        )
    }

}

export default ShareDetails;

