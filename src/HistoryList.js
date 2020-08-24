import React from 'react';
import qs from 'qs'
import axios from 'axios';


class HistoryList extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            meetingFromDate: new Date(),
            meetingToDate: new Date(),
            searchClick: 0,

            changeFromDate: 0,
            changeToDate: 0

        }
    }


    handleFromDate = (event) => {
        console.log(event.target.value)
        this.setState({ meetingFromDate: event.target.value , changeFromDate: 1 })
    }

    handleToDate = (event) => {
        console.log(event.target.value)
        this.setState({ meetingToDate: event.target.value , changeToDate: 1})
    }

    fetchHistoryResult = () => {

        // var apiFromDate = this.state.meetingFromDate.split("-")[2] + "-" + this.state.meetingFromDate.split("-")[1] + "-" + this.state.meetingFromDate.split("-")[0];
        // var apiToDate = this.state.meetingToDate.split("-")[2] + "-" + this.state.meetingToDate.split("-")[1] + "-" + this.state.meetingToDate.split("-")[0];

      if(this.state.changeFromDate === 0 && this.state.changeToDate === 0){

        var c = this.state.meetingFromDate.getDate() + '-' + (this.state.meetingFromDate.getMonth() + 1) + '-' + this.state.meetingFromDate.getFullYear();
        var apiFromDate = c.split("-")[2] + "-" + c.split("-")[1] + "-" + c.split("-")[0];

        var d = this.state.meetingToDate.getDate() + '-' + (this.state.meetingToDate.getMonth() + 1) + '-' + this.state.meetingToDate.getFullYear();
        var apiToDate = d.split("-")[2] + "-" + d.split("-")[1] + "-" + d.split("-")[0];

      }

      else if(this.state.changeFromDate === 1 && this.state.changeToDate === 1){

         var apiFromDate = this.state.meetingFromDate.split("-")[2] + "-" + this.state.meetingFromDate.split("-")[1] + "-" + this.state.meetingFromDate.split("-")[0];
         var apiToDate = this.state.meetingToDate.split("-")[2] + "-" + this.state.meetingToDate.split("-")[1] + "-" + this.state.meetingToDate.split("-")[0];

      }

      else if(this.state.changeFromDate === 1 && this.state.changeToDate === 0){

        var apiFromDate = this.state.meetingFromDate.split("-")[2] + "-" + this.state.meetingFromDate.split("-")[1] + "-" + this.state.meetingFromDate.split("-")[0];

        var d = this.state.meetingToDate.getDate() + '-' + (this.state.meetingToDate.getMonth() + 1) + '-' + this.state.meetingToDate.getFullYear();
        var apiToDate = d.split("-")[2] + "-" + d.split("-")[1] + "-" + d.split("-")[0];
    }

      else if(this.state.changeFromDate === 0 && this.state.changeToDate === 1){

        var c = this.state.meetingFromDate.getDate() + '-' + (this.state.meetingFromDate.getMonth() + 1) + '-' + this.state.meetingFromDate.getFullYear();
        var apiFromDate = c.split("-")[2] + "-" + c.split("-")[1] + "-" + c.split("-")[0];

        var apiToDate = this.state.meetingToDate.split("-")[2] + "-" + this.state.meetingToDate.split("-")[1] + "-" + this.state.meetingToDate.split("-")[0];

      }
       
        axios.post('https://api.videomeet.in/v2/room_history.php', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
            roomname: this.props.historyActionRoomname,
            fromdate: apiFromDate,
            todate: apiToDate

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
        this.fetchHistoryResult()

    }

    render() {


        return (
            <>

                <div id="dvRoomHistoryDetails" className="popBox" style={{ display: 'block', zIndex: 999 }}>

                    <div className="popBoxInner">
                        <div className="popBoxHeader" id="dvRoomHistoryDetailsTitle" >
                            <h5>
                                <span>History Report - {this.props.historyActionRoomname}</span>
                            </h5>
                        </div>

                        <div className="popBoxBody">
                            <div>
                                <input type="text" className="textBox flatpickr-input"
                                    placeholder={this.state.meetingFromDate.getDate() + '-' + (this.state.meetingFromDate.getMonth() + 1) + '-' + this.state.meetingFromDate.getFullYear()}
                                    onChange={this.handleFromDate}
                                    id="txtHistoryFromDate"
                                    style={{ color: 'black', width: 200 }}></input>

                                <input type="text" className="textBox flatpickr-input"
                                    plac eholder={this.state.meetingFromDate.getDate() + '-' + (this.state.meetingFromDate.getMonth() + 1) + '-' + this.state.meetingFromDate.getFullYear()}
                                    onChange={this.handleToDate} id="txtHistoryToDate"
                                    style={{ color: 'black', width: 200 }}></input>

                                <span id="spnRoomHistorySearchBut">
                                    <button onClick={this.fetchHistoryResult}>
                                        <span>Search</span>
                                    </button>
                                </span>


                            </div>

                            <div id="dvRoomHistoryDetailsTable" style={{ overflowY: 'auto', overflowX: 'hidden' }}>
                                <table className="tableBox" id="tblRoomHistoryDetails" style={{ "width": "100%" }}>
                                    <tbody>
                                        <tr>
                                            <th>
                                                <span>Request Origin</span>
                                            </th>

                                            <th>
                                                <span>Start</span>
                                            </th>

                                            <th>
                                                <span>Total Participant</span>
                                            </th>

                                            <th>
                                                <span>Recording</span>
                                            </th>

                                            <th>
                                                <span>Streaming</span>
                                            </th>

                                            <th>
                                                <span>End</span>
                                            </th>

                                            <th>
                                                <span>Duration(Min.)</span>
                                            </th>
                                        </tr>

                                        <tr>
                                            <td colSpan="7">
                                                <span>No Records Found.</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>



                        <div className="popBoxFooter">
                            <span id="spnRoomHistoryDetails">

                                <button className="cancelButton" onClick={this.props.closeMyHistory}>
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

export default HistoryList;



