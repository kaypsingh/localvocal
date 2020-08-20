import React from 'react';
import qs from 'qs'
import axios from 'axios';


class Panelist extends React.Component {

    constructor(props) {
        super(props)
        this.state = {

        }
    }

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



            },
                (error) => {
                    console.log(error)
                }
            )

    }

    componentDidMount() {
        this.fetchResult()
    }

    render() {


        return (
            <>
                <div className="dvAddPenalist" className="popBox" style={{ display: 'block' }}>

                    <div className="popBoxInner">
                        <div className="popBoxHeader" id="dvSetTitlePenalist">
                            <h5>
                                <span>Add Panelist in </span>
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
                                            <input type="text" maxLength="50" className="textBox" id="txtPenalistName" placeholder="Name"></input>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label>
                                                <span>Email Address {":"}</span>
                                            </label>
                                        </td>

                                        <td colSpan="3">
                                            <input type="email" maxLength="100" className="textBox" placeholder="Email-Address"></input>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td style={{ "width": "20%" }}>
                                            <label>
                                                <span>Join Code{":"}</span>
                                            </label>
                                        </td>



                                        <td style={{ "width": "40%" }}>
                                            <input type="text" className="textBox" id="txtPenalistCode"></input>
                                        </td>



                                        <td style={{ "width": "27%", textAlign: 'center' }}>
                                            <label>
                                                <span>Make Co-Host{":"}</span>
                                            </label>
                                        </td>



                                        <td style={{ "width": "6%" }}>
                                            <label className="switch">
                                                <input type="checkbox" id="chkCoHost"></input>
                                                <span className="slider round"></span>
                                            </label>
                                        </td>
                                    </tr>




                                </tbody>
                            </table>
                        </div>

                        <div className="popBoxFooter">
                            <span id="spnCopyShare">
                                <button className="cancelButton" >
                                    <span>close</span>
                                </button>

                                <button  >
                                    <span>Save</span>
                                </button>
                            </span>
                        </div>

                    </div>
                </div>
            </>


        )
    }

}

export default Panelist;

