import React from 'react';
import qs from 'qs'
import axios from 'axios';


class RecordingList extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            documentMessage: ''

        }
    }





    fetchRecordingsResult = () => {
        axios.post('https://api.videomeet.in/v2/conference_recording.php/recordinglist', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
           roomname: this.props.recordingActionRoomname,
           
        }), {
            'Content-Type': 'application/x-www-form-urlencoded',
            "Access-Control-Allow-Origin": "*",
        }

        )
            .then((response) => {

                console.log(response)

                alert(response.data.msg)

                // this.setState({documentMessage: response.data.msg})


            },
                (error) => {
                    console.log(error)
                }
            )

    }



    componentDidMount() {
       this.fetchRecordingsResult()
    }

    render() {


        return (
            <>

                <div id="dvListOfMyRecording" className="popBox" style={{ display: 'block' }}>

                    <div className="popBoxInner">

                        <div className="popBoxHeader" id="dvListOfMyRecordingTitle">

                            <h5>
                                <span>List of Recording file(s) in {this.props.recordingActionRoomname}</span>
                            </h5>
                        </div>

                        <div className="popBoxBody" id="dvListOfMyRecordingTable" style={{ overflowY: 'auto' }}>
                            <table className="tableBox" id="tblListOfMyRecording" style={{ "width": "100%" }}>
                                <tbody>
                                    <tr>
                                        <th style={{ "width": "35%" }}>
                                            <span>File Name</span>
                                        </th>


                                        <th style={{ "width": "10%" }}>
                                            <span>File Size</span>
                                        </th>


                                        <th style={{ "width": "16%" }}>
                                            <span>Date</span>
                                        </th>


                                        <th style={{ "width": "13%", color: 'red' }}>
                                            <span>Auto Delete</span>
                                        </th>

                                        <th style={{ "width": "10%", textAlign: "center" }}>
                                            <span>Action</span>
                                        </th>

                                    </tr>


                                    <tr>
                                        <td colSpan="5">
                                            <span>Recording not available</span>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                  
                  
                  <div className="popBoxFooter">
                      <span id="spnHideMyRecording">

                          <button className="cancelButton" onClick={this.props.closeMyRecordings} >
                              <span>Close</span>
                          </button>
                      </span>
                  </div>
                    </div>
                </div>

            </>
        )
    }

}

export default RecordingList;

