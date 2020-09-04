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
            historyRes: [],
            dataMsg: '',
            statusHistory: '',
            someFdate: new Date(),
            someTdate: new Date(),

            tf: '',
            tt: '',
            defaultDate: ''



        }
    }


    timeFrom = (today) => {

        let d = new Date(today);
        let oneDayFromNow = d.setDate(d.getDate() + 1);
        oneDayFromNow = new Date(oneDayFromNow).toISOString().slice(0, 10);
        console.log(oneDayFromNow)

        this.setState({ tf: oneDayFromNow })

    }


    timeTo = (today) => {

        let d = new Date(today);
        let oneDayNow = d.setDate(d.getDate() + 1);
        oneDayNow = new Date(oneDayNow).toISOString().slice(0, 10);
        console.log(oneDayNow)

        this.setState({ tt: oneDayNow })

    }

    timeToday = () => {
        let f = new Date();
        let od = f.setDate(f.getDate());
        od = new Date(od).toISOString().slice(0, 10);
        console.log(od)

        this.setState({ defaultDate: od }, () => { console.log(this.state.defaultDate) })


    }


    fetchHistoryResult = () => {

        if (this.state.defaultDate !== '') {

            if (this.state.tf === '' && this.state.tt === '') {
                console.log('hijihih')

                var apiFromDate = this.state.defaultDate
                var apiToDate = this.state.defaultDate

            }

            else if (this.state.tf === '' && this.state.tt !== '') {

                var apiFromDate = this.state.defaultDate
                var apiToDate = this.state.tt

            }

            else if (this.state.tf !== '' && this.state.tt === '') {


                var apiFromDate = this.state.tf
                var apiToDate = this.state.defaultDate


            }

            else if (this.state.tf !== '' && this.state.tt !== '') {

                var apiFromDate = this.state.tf
                var apiToDate = this.state.tt

            }
        }


        // default api call on the first time 
        else if (this.state.defaultDate === '') {

            let k = new Date();
            let kn = k.setDate(k.getDate());
            kn = new Date(kn).toISOString().slice(0, 10);

            var apiFromDate = kn
            var apiToDate = kn



        }

        var roomname = this.props.historyActionRoomname

        var path = "authkey=M2atKiuCGKOo9Mj3&roomname=" + roomname + "&fromdate=" + apiFromDate + "&todate=" + apiToDate;
        path = this.props.getFormData(path);


        axios.post('https://api.videomeet.in/v3/room_history.php', path

            , {
                'Content-Type': 'application/x-www-form-urlencoded',
                "Access-Control-Allow-Origin": "*",
            }

        )
            .then((response) => {

                console.log(response.data.status)

                response.data = this.props.changeResponse(response.data)

                this.props.roomActionClose()


                console.log(response)

                this.setState({ historyRes: response.data.data, dataMsg: response.data.msg, statusHistory: response.data.status })

            },
                (error) => {
                    console.log(error)
                }
            )

    }



    componentDidMount() {
        this.timeToday()
        this.fetchHistoryResult()

    }

    render() {

        const { meetingDate } = this.state
        const { someFdate } = this.state;
        const { someTdate } = this.state;

        var today = new Date();
      
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = dd + '-' + mm + '-' + yyyy;

        return (
            <>

                <div id="dvRoomHistoryDetails" className="popBox" style={{ display: this.state.dataMsg === '' ? 'none' : 'block', zIndex: 999 }}>

                    <div className="popBoxInner">
                        <div className="popBoxHeader" id="dvRoomHistoryDetailsTitle" >
                            <h5 style={{ fontSize: 18, color: 'black', textAlign: 'left' }}>
                                <span>History Report - {this.props.historyActionRoomname}</span>
                            </h5>
                        </div>

                        <div className="popBoxBody">
                            <div>


                                <Flatpickr data-enable-time

                                    options={{ dateFormat: 'd-m-Y', clickOpens: true, defaultDate: null, defaultHour: 12, defaultMinute: 0, minDate: null, maxDate: null, enableTime: false, enableSeconds: false, time_24hr: false, noCalendar: false }}

                                    style={{ width: 200 }} className="textBox flatpickr-input" id="txtMeetingDate" placeholder={today} onChange={someFdate => { this.setState({ someFdate }, () => { this.timeFrom(someFdate) }) }}

                                ></Flatpickr>

                                <Flatpickr data-enable-time

                                    options={{ dateFormat: 'd-m-Y', clickOpens: true, defaultDate: null, defaultHour: 12, defaultMinute: 0, minDate: null, maxDate: null, enableTime: false, enableSeconds: false, time_24hr: false, noCalendar: false }}

                                    style={{ width: 200 }} className="textBox flatpickr-input" id="txtHistoryToDate" placeholder={today} onChange={someTdate => { this.setState({ someTdate }, () => { this.timeTo(someTdate) }) }}

                                ></Flatpickr>



                                <span id="spnRoomHistorySearchBut">
                                    <button onClick={this.fetchHistoryResult}>
                                        <span>Search</span>
                                    </button>
                                </span>


                            </div>

                            <div id="dvRoomHistoryDetailsTable" style={{ overflowY: 'auto', overflowX: 'hidden', display: this.state.dataMsg === '' ? 'none' : '' }}>
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

                                            this.state.statusHistory !== 0 ?
                                                this.state.historyRes.map((res, k) => {

                                                    var recOn = res['recording_on']
                                                    var streamOn = res['streaming_on']

                                                    if (recOn === 1) {
                                                        var recStatus = "Y"
                                                    }

                                                    else {
                                                        var recStatus = "N"
                                                    }

                                                    if (streamOn === 1) {
                                                        var streamStatus = "Y"
                                                    }

                                                    else {
                                                        var streamStatus = "N"
                                                    }




                                                    return (
                                                        <tr>

                                                            <td>{res['request_origin']}</td>
                                                            <td>14-07-2020 14:40</td>

                                                            <td>
                                                                <a href="" style={{ color: 'green' }} target="_blank">{res['totalparticipant']}</a>
                                                            </td>

                                                            <td>{recStatus}</td>
                                                            <td>{streamStatus}</td>
                                                            <td>{res['end_conference']}</td>
                                                            <td>0</td>
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

                        </div>



                        <div className="popBoxFooter">
                            <span id="spnRoomHistoryDetails">

                                <button className="cancelButton" onClick={() => { this.props.closeMyHistory(); this.props.panelRedirect() }}>
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

