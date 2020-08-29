import React from 'react';
import qs from 'qs'
import axios from 'axios';


class Panelist extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            participantName: '',
            participantEmail: '',
            participantCode: 'Click to generate code',
            ispanelist: 1,
            ishost: false,
            panelData: [],
            participantListDisplay: 0,
            clickedSave: 0 ,
            resetValue: 0
            // hidePanel: 0

        }
    }

    addParticipant = (e) => {

      
// this.setState({clickedSave: 1})




if(this.state.participantName === "" || this.state.participantEmail === "" || this.state.participantCode === "Click to generate code"){
    alert('All fields are mandatory')
}

else{

        if (this.state.ishost === false) {
            var addPar = "0"

        } else {
            var addPar = "1"
        }


        axios.post('https://api.videomeet.in/v2/participants.php/add', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
            conferenceid: this.props.conferId,
            name: this.state.participantName,
            emailid: this.state.participantEmail,
            code: this.state.participantCode,
            ispanelist: this.state.ispanelist,
            ishost: addPar
          


        }), {
            'Content-Type': 'application/x-www-form-urlencoded',
            "Access-Control-Allow-Origin": "*",
        }

        )
            .then((response) => {
                console.log(response)
                alert(response.data.msg)

                if(response.data.msg === "Participant added successfully"){
                    this.setState({clickedSave: 1})
                    this.fetchResult()
                }


            },
                (error) => {
                    console.log(error)
                }
            )
            }

    }


    // it checks for the any participant if present ( comes automatically no need to click !)
    fetchResult = () => {
        axios.post('https://api.videomeet.in/v2/participants.php/participantlist', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
            conferenceid: this.props.conferId


        }), {
            'Content-Type': 'application/x-www-form-urlencoded',
            "Access-Control-Allow-Origin": "*",
        }

        )
            .then((response) => {

                console.log(response)
             
               if(response.data.msg === "participants list fetched successfully"){

              

                var responsePanel = response.data.data
                   this.setState({participantListDisplay: 1 , panelData: responsePanel})
               } else{
                this.setState({participantListDisplay: 1})
               }



            },
                (error) => {
                    console.log(error)
                }
            )

    }

    handleParticipantName = (event) => {

        this.setState({participantName: event.target.value });
    }

    handleParticipantEmail = (event) => {

        this.setState({participantEmail: event.target.value})
    }

    handleParticipantCode = (event) => {

        var fourdigitsrandom = Math.floor(1000 + Math.random() * 9000);
       this.setState({ participantCode: fourdigitsrandom })

    }

    handleHost = () => {
        this.setState({ ishost: !this.state.ishost })
    }

     resetAddPenalist = () => {
      this.setState({ participantName: '' ,participantEmail: '' ,participantCode: '' , ishost: false})

    
    // document.getElementById("create-course-form").reset();
  
    }

    // hidePanelPopup = () => {
    //     this.setState({ hidePanel: 1})
    // }

    componentDidMount() {
        console.log(this.props.conferId)
        this.fetchResult()
    }

    render() {


        return (
            <>
                <div id="dvAddPenalist" className="popBox"  >
                {/* display: this.state.hidePanel === 0 ? 'block' : 'none' */}

                    <div className="popBoxInner">
                        <div className="popBoxHeader" id="dvSetTitlePenalist">
                            <h5 style={{fontSize: 18, color:'black', textAlign:'left'}}>
                                <span>Add Panelist in {this.props.meetingRoomName} </span>
                            </h5>

                        </div>

                        <div className="popBoxBody">
                            <table className="tableNoBorder" style={{ "width": "100%" }}>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label>
                                                <span>Name</span>
                                            </label>
                                        </td>

                                        <td colSpan="3">
                                            <input type="text" maxLength="50" className="textBox" id="txtPenalistName" 
                                            // placeholder="Name" 
                                            value={this.state.participantName}
                                            onClick={this.handleParticipantCode}
                                             onChange={this.handleParticipantName}></input>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label>
                                                <span>Email Address:</span>
                                            </label>
                                        </td>

                                        <td colSpan="3">
                                            <input type="email" maxLength="100" className="textBox"
                                            //  placeholder= "Email-Address:" 
                                            value={this.state.participantEmail}
                                              onChange={this.handleParticipantEmail}></input>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td style={{ "width": "20%" }}>
                                            <label>
                                                <span>Join Code{":"}</span>
                                            </label>
                                        </td>



                                        <td style={{ "width": "40%" }}>
                                            <input type="text" className="textBox" placeholder={this.state.participantCode} 
                                            
                                            id="txtPenalistCode"></input>
                                        </td>



                                        <td style={{ "width": "27%", textAlign: 'center' }}>
                                            <label>
                                                <span>Make Co-Host{":"}</span>
                                            </label>
                                        </td>



                                        <td style={{ "width": "6%" }}>
                                            <label className="switch">
                                                <input type="checkbox" id="chkCoHost" checked={this.state.ishost === true} onChange={this.handleHost}></input>
                                                <span className="slider round"></span>
                                            </label>
                                        </td>
                                    </tr>




                                </tbody>
                            </table>
                        </div>

                        <div className="popBoxFooter">
                            <span id="spnCopyShare">

                             
                                <button className="cancelButton" onClick={()=>{this.props.closePanel();this.props.newMeetingClose();this.props.openSchedulePopup(); this.props.scheduleApi();this.resetAddPenalist()}}>
                              
                                    <span>close</span>
                                </button>

                            



                                <button onClick={()=>{this.addParticipant();this.resetAddPenalist()}} >
                                    <span>Save</span>
                                </button>
                            </span>
                        </div>

                        <div className="popBoxBody" id="dvListAddedPenalistTable" 
                        style={{overflowY: 'auto' , marginTop: 10 , maxHeight: 247 , 
                        display: this.state.clickedSave == 0 ? 'none' : ''}}>

                            <table className="tableBox" style={{"width":"100%"}}>
                                <tbody>
                                    <tr>
                                        <th style={{"width":"20%"}}>
                                            <span>Name</span>
                                        </th>

                                        <th style={{"width":"25%"}}>
                                            <span>Email Address</span>
                                        </th>

                                        <th style={{"width":"10%"}}>
                                            <span>Code</span>
                                        </th>

                                        <th style={{"width":"11%"}}>
                                            <span>Co-Host</span>
                                        </th>

                                        <th style={{"width":"15%"}}>
                                            <span>Invitation</span>
                                        </th>
                                    </tr>

                                    {

                                        this.state.panelData.map((res,k) => {

                                            if(res['ishost'] == 0){
                                                var hostValue = "No"

                                            }else{
                                                var hostValue = "Yes"

                                            }
                                            return(
                                                <>

                                                    <tr>
                                                        <td>{res['name']}</td>
                                                        <td>{res['email']}</td>
                                                        <td>{res['code']}</td>

                                                        <td>
                                                            <span>{hostValue}</span>
                                                        </td>

                                                        <td>
                                                            <a href="">Copy and Share</a>
                                                        </td>

                                                    </tr>

                                                </>
                                            )
                                        })
                                       
                                    }
                               
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </>


        )
    }

}

export default Panelist;

