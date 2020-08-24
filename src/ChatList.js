import React from 'react';
import qs from 'qs'
import axios from 'axios';


class ChatList extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            documentMessage: ''

        }
    }





    fetchChatResult = () => {
        axios.post('https://api.videomeet.in/v2/chat.php/chatlist', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
            roomname: this.props.chatActionRoomname,

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
        this.fetchChatResult()
    }

    render() {


        return (
            <>

                <div id="dvListOfMyChat" className="popBox" style={{ display: 'block' }}>

                    <div className="popBoxInner">

                        <div className="popBoxHeader" id="dvListOfMyChatTitle">

                            <h5>
                                <span>List of Chat file(s) in {this.props.chatActionRoomname}</span>
                            </h5>
                        </div>

                        <div className="popBoxBody" id="dvListOfMyChatTable" style={{ overflowY: 'auto' }}>
                            <table className="tableBox" id="tblListOfMyChat" style={{ "width": "100%" }}>
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
                                            <span>Chat not available</span>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>


                        <div className="popBoxFooter">
                            <span id="spnHideMyChat">

                                <button className="cancelButton" onClick={this.props.closeMyChats} >
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

export default ChatList;



