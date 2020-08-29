import React from 'react';
import qs from 'qs'
import axios from 'axios';


class DeleteRoom extends React.Component {

    constructor(props) {
        super(props)
        this.state = {


        }
    }

    hello = () => {
        console.log('bagga')
    }


    deleteFunctionality = () => {

        axios.post('https://api.videomeet.in/v2/conference.php/delete', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
            confrenceid: this.props.parentResponse.confrenceid


        }), {
            'Content-Type': 'application/x-www-form-urlencoded',
            "Access-Control-Allow-Origin": "*",
        }

        )
            .then((response) => {
                console.log(response)
                console.log(response.data.msg)
                alert(response.data.msg)

                this.props.scheduleApi()

            },
                (error) => {
                    console.log(error)
                }
            )


    }


  


    componentDidMount() {

    }

    render() {


        return (
            <>

                <div className="popBoxInner">
                    <div className="popBoxHeader" id="dvDeleteMessageTitle">
                        <h5 style={{fontSize: 18, color:'black'}}>
                            <span>Confirm Delete</span>
                        </h5>
                    </div>

                    <div className="popBoxBody relativeDiv">
                        <span className="relativeDivBlock" id="spnDeleteMessageBody">
                            <span>
                                <h6>Following will be deleted from the Room - {this.props.deleteRoomName}.</h6>
          1. Document
          <br></br>
          2. Recording
          <br></br>
          3. Participant / Panelist
          <br></br>
          4. Chat
          <br></br>
          5. History

        </span>
                        </span>

                    </div>

                    <div className="popBoxFooter">
                        <button className="cancelButton" onClick={this.props.deletePopupClose} >
                          
                            <span>Close</span>
                        </button>

                        <span id="spnDeleteMessageBut"></span>
                        <button onClick={() => {this.deleteFunctionality();this.props.deletePopupClose()}}>
                            <span>Yes, Delete</span>
                        </button>
                    </div>

                </div>

            </>


        )
    }

}

export default DeleteRoom;

