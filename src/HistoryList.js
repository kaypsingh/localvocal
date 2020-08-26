import React from 'react';
import qs from 'qs'
import axios from 'axios';
import "flatpickr/dist/themes/material_green.css";

import Flatpickr from "react-flatpickr";


class HistoryList extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            meetingFromDate: '',
            meetingToDate: '',
            searchClick: 0,

            changeFromDate: 0,
            changeToDate: 0,

            meetingDate: new Date()

        }
    }


    handleFromDate = (event) => {
        console.log(event.target.value)
        this.setState({ meetingFromDate: event.target.value, changeFromDate: 1 })
    }

    handleToDate = (event) => {
        console.log(event.target.value)
        this.setState({ meetingToDate: event.target.value, changeToDate: 1 })
    }

    fetchHistoryResult = () => {


        if(this.state.meetingFromDate === '' && this.state.meetingToDate === ''){

        var t = new Date();
        var d = String(t.getDate()).padStart(2, '0');
        var m = String(t.getMonth() + 1).padStart(2, '0'); //January is 0!
        var y = t.getFullYear();

        t = d + '-' + m + '-' + y;
        console.log(t)

        var apiFromDate = t.split("-")[2] + "-" + t.split("-")[1] + "-" + t.split("-")[0];
        
        var apiToDate = t.split("-")[2] + "-" + t.split("-")[1] + "-" + t.split("-")[0];

        }

        else if(this.state.meetingFromDate !== '' && this.state.meetingToDate !== ''){

            var t = this.state.meetingFromDate
            console.log(t)
            var apiFromDate = t.split("-")[2] + "-" + t.split("-")[1] + "-" + t.split("-")[0];
            console.log(apiFromDate)

            var z = this.state.meetingToDate
            var apiToDate = z.split("-")[2] + "-" + z.split("-")[1] + "-" + z.split("-")[0];
        


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

        const { meetingDate } = this.state

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = dd + '-' + mm + '-' + yyyy;
        console.log(today)

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
                                <Flatpickr data-enable-time
                                 options={{
                                    dateFormat: 'd-m-Y',
        
                                    clickOpens: true,
                                    defaultDate: null,
                                    defaultHour: 12,
                                    defaultMinute: 0,
                                    minDate: null,
                                    maxDate: null,
                                    enableTime: false,
                                    enableSeconds: false,
                                    time_24hr: false,
                                    noCalendar: false
        
                                  }} 
                                
                                
                                
                                type="text" className="textBox flatpickr-input"
                                    placeholder={today}
                                    // onChange={this.handleFromDate}
                                    onChange={meetingDate => {
                                        this.setState({ meetingDate },() => {console.log(this.state.meetingDate)});
                                      }}
                                    id="txtHistoryFromDate"
                                    style={{ color: 'black', width: 200 }} ></Flatpickr>

                                <input type="text" className="textBox flatpickr-input"
                                    placeholder={today}
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

                                        {

                                            <tr>

                                                <td>web</td>
                                                <td>14-07-2020 14:40</td>

                                                <td>
                                                    <a href="" style={{ color: 'green' }} target="_blank">2</a>
                                                </td>

                                                <td>N</td>
                                                <td>N</td>
                                                <td>14-07-2020 14:40</td>
                                                <td>0</td>
                                            </tr>
                                        }
                                        {/* 
                                        <tr>
                                            <td colSpan="7">
                                                <span>No Records Found.</span>
                                            </td>
                                        </tr> */}



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



