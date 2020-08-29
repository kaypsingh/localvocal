import React from 'react';
import qs from 'qs'
import axios from 'axios';


class SharePanelist extends React.Component {

    constructor(props) {
        super(props)
        this.state = {


        }
    }





    componentDidMount() {


    }

    render() {

var resPan = this.props.sharePanelResponse
 console.log(resPan)

var secRes = this.props.secondResponse
console.log(secRes)

        return (
            <>

                <div className="popBoxInner">
                    <div className="popBoxHeader">
                        <h5 style={{fontSize: 18, color:'black'}}>
                            <span>Copy and Share to Invite</span>
                        </h5>
                    </div>


                    <div className="popBoxBody" id="dvShareToPenalistDetailBody" style={{ overflowY: 'auto', maxHeight: 417 }}>

                        <p>
                            <span>You are invited to join as panelist for the following
                <strong>
                                    <span> {" " }Conference</span>
                                </strong>
                            </span>
                        </p>


                        <h6>
                            <span className="suTitle">
                                <span>Meeting Topic:</span>
                            </span>
                            {" "}{resPan.topic}
                        </h6>

                        <h6>
                            <span className="suTitle">
                                <span>Date:</span>
                            </span>
                           {" "} {resPan.conferencescheduletime}
                        </h6>

                        <h6>
                            <span className="suTitle">
                                <span>Host:</span>
                            </span>
                           {" "} {this.props.bc}
                        </h6>

                        <br></br>

                        <h6>
                            <span className="suTitle">
                                <u>
                                    <span>Joining Details:</span>
                                </u>
                            </span>
                            {}
                        </h6>

                        <br></br>

                        <h6>
                            <span className="suTitle">
                                <span>Meeting Room Name:</span>
                            </span>
                            {" "}{resPan.roomname}
                        </h6>

                        <h6>
                            <span className="suTitle">
                                <span>Meeting Room Password:</span>
                            </span>
                            {resPan.room_pass}
                        </h6>

                        <h6>
                            <span className="suTitle">
                                <span>Panelist Code:</span>
                            </span>
                            {" "}{secRes.code}
                        </h6>

                        <br></br>

                        <h6>
                            <span className="suTitle">
                                <u>
                                    <span>How to Join::</span>
                                </u>
                            </span>
                            {}
                        </h6>

                        <h6>
                            <span className="suTitle">
                                <span>On your computer / laptop:</span>
                            </span>
                            {}
                        </h6>

                        <h6>
                            <span>Visit:</span>
                            <a href="https://bridge01.videomeet.in/" target="_blank">https://bridge01.videomeet.in</a>
                        </h6>

                        <br></br>

                        <h6>
                            <span>Enter your name and room name as mentioned above.</span>
                        </h6>

                        <br></br>
                        <h6>

                            <span className="suTitle">
                                <span>On your iPhone / Android:</span>
                            </span>

                        </h6>

                        <p>
                            <span>Install App from Playstore by clicking on the following URL and after installation of App enter your name and room name as above.</span>
                        </p>

                        <h6>
                            <span>iOS</span>
                        </h6>

                        <h6>
                            <a href="https://apps.apple.com/us/app/videomeet-audio-video/id1346514570" target="_blank">https://apps.apple.com/us/app/videomeet-audio-video/id1346514570</a>
                        </h6>

                        <br></br>

                        <h6>
                            <span>Android</span>
                        </h6>

                        <h6>
                            <a href="https://play.google.com/store/apps/details?id=com.datainfosys.videomeet" target="_blank">https://play.google.com/store/apps/details?id=com.datainfosys.videomeet</a>
                        </h6>

                        <br></br>

                        <p>
                            <span>You will need to also enter code to enter become panelist.</span>
                        </p>

                        <p>
                            <span>Go to Settings and click on [Join as Panelist] , enter your unique panelist code and enter. You will get the access to audio / video / presentation.</span>
                        </p>

                        <p>
                            <span>Please do not share the above details with anyone as this is personal details for you to join as panelist.</span>
                        </p>

                    </div>


                    <div className="popBoxFooter">
                        <button className="cancelButton" onClick={this.props.closeSharePanel} >
                            <span>Close</span>
                        </button>

                        <span id="spnSendMailToShare">
                        {/* onClick={this.handleEmail} */}
                            <button className="btnMail" >
                                <span>  Send Mail With Password</span>
                            </button>

                            <button className="btnMail" >
                                <span>  Send Mail Without Password</span>
                            </button>

                            <button className="btnMail">
                                <span>  Send Password</span>
                            </button>



                        </span>

                    </div>


               
            </div>
               


            </>


        )
    }

}

export default SharePanelist;

