import React from 'react';
import qs from 'qs'
import axios from 'axios';


class RecordingList extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            recordingMessage: '',
            recordingData: []

        }
    }


    deleteRecordingFile = (fname , fpath) => {

        axios.post('https://api.videomeet.in/filedelete.php', qs.stringify({

            filepath: +fname+fpath
         

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


    deleteRecording = (rid , rpath , rname) => {
        console.log(rid)

        axios.post('https://api.videomeet.in/v2/conference_recording.php/deleterecording', qs.stringify({

         
            d: rid,
         

        }), {
            'Content-Type': 'application/x-www-form-urlencoded',
            "Access-Control-Allow-Origin": "*",
        }

        )
            .then((response) => {

                console.log(response)

              

                if(response.data.status === 1){

                    alert(response.data.msg)

                   this.deleteRecordingFile( rname, rpath)
                }

                else {

                    alert(response.data.msg)

                }


            },
                (error) => {
                    console.log(error)
                }
            )


    }





    fetchRecordingsResult = () => {
        axios.post('https://api.videomeet.in/v2/conference_recording.php/recordinglist', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
            // roomname: 'javateam',
           roomname: this.props.recordingActionRoomname,

        }), {
            'Content-Type': 'application/x-www-form-urlencoded',
            "Access-Control-Allow-Origin": "*",
        }

        )
            .then((response) => {

                console.log(response)
                this.props.roomActionClose()


                this.setState({ recordingMessage: response.data.msg, recordingData: response.data.data })


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

        var deleteIcon = "https://bridge01.videomeet.in/images/delete-room.png"


        return (
            <>

                <div id="dvListOfMyRecording" className="popBox" style={{ display: this.state.recordingMessage === '' ? 'none' : 'block' }}>

                    <div className="popBoxInner">

                        <div className="popBoxHeader" id="dvListOfMyRecordingTitle">

                            <h5 style={{fontSize: 18, color:'black', textAlign:'left'}}>
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

                                    {



                                        this.state.recordingMessage !== "no record found" ?

                                            this.state.recordingData.map((res, k) => {

                                                var dateTime = res['upload_date']

                                                var arrDateTime = dateTime.split(" ");
                                                var date = arrDateTime[0].split("-")[2] + "-" + arrDateTime[0].split("-")[1] + "-" + arrDateTime[0].split("-")[0];
                                                var time = arrDateTime[1].split(":")[0] + ":" + arrDateTime[1].split(":")[1];
                                                var finaldateTime = date + " " + time;


                                                var file_size = parseInt(res["file_size"]);
                                                file_size = file_size / 1024;
                                                if (file_size < 1) {
                                                    file_size = "1 KB";
                                                } else if ((file_size / 1024) > 1) {
                                                    file_size = file_size / 1024;
                                                    file_size = parseInt(file_size) + " MB";
                                                } else {
                                                    file_size = parseInt(file_size) + " KB";
                                                }

                                                var expDate = new Date(res["upload_date"].split("-")[0] + "," + res["upload_date"].split("-")[1] + "," + res["upload_date"].split("-")[2]);
                                                expDate = new Date(expDate.getTime() + (7 * 24 * 60 * 60 * 1000));
                                                var tempExpiryMonth = expDate.getMonth() + 1;
                                                if ((expDate.getMonth() + 1) < 10)
                                                    tempExpiryMonth = "0" + (expDate.getMonth() + 1);
                                                var tempExpiryDay = expDate.getDate();
                                                if (expDate.getDate() < 10)
                                                    tempExpiryDay = "0" + expDate.getDate();
                                                var autoDeleteDate = tempExpiryDay + "-" + tempExpiryMonth + "-" + expDate.getFullYear();




                                                return (

                                                    <tr>
                                                        <td>
                                                            <a style={{ color: 'green' }}>{res['file_name']}</a>
                                                        </td>

                                                        <td>{file_size}</td>
                                                        <td>{finaldateTime}</td>
                                                        <td style={{ color: 'red' }}>{autoDeleteDate}</td>

                                                        <td style={{ textAlign: 'center' }}>
                                                            <img src={deleteIcon} title="Delete file" onClick={() => {this.deleteRecording(res['conference_recording_id'] , res['file_path'] , res['file_name'])}} style={{ width: 12, cursor: 'pointer' }}></img>
                                                        </td>
                                                    </tr>
                                                )

                                            })

                                            :
                                            <tr>
                                                <td colSpan="5">
                                                    <span>Recording not available</span>
                                                </td>
                                            </tr>

                                    }
                                </tbody>
                            </table>
                        </div>


                        <div className="popBoxFooter">
                            <span id="spnHideMyRecording">

                                <button className="cancelButton" onClick={()=>{this.props.closeMyRecordings();this.props.panelRedirect()}} >
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

