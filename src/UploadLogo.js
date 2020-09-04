import React from 'react';
import qs from 'qs'
import axios from 'axios';


class UploadLogo extends React.Component {

    constructor(props) {
        super(props)
        this.state = {

            selectedLogo: ''
        }
    }

    handleInputChange = (event) => {
        console.log(event.target.files[0])
        this.setState({
            selectedLogo: event.target.files[0],
        })
    }


    uploadingLogo = () => {

        var formData = new FormData();
        formData.append("roomname", this.props.logoActionRoomname);
        formData.append("username", 'kpkpkp');
        formData.append("image", this.state.selectedLogo);


        axios.post('https://bridge01.videomeet.in/fileupload.php', formData, {


            'content-type': 'multipart/form-data',
            "Access-Control-Allow-Origin": "*"

        }

        )
            .then((response) => {



            },
                (error) => {
                    console.log(error)
                }
            )




    }


    getLogoLogic = () => {

        axios.post('https://api.videomeet.in/v2/conference.php/getlogo', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',

            roomname: this.props.logoActionRoomname,

        }), {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Origin': '*',
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

        this.getLogoLogic()

    }

    render() {

      
        return (
            <>

<div id="dvAddDocumentLogo" className="popBox"  >

                <div className="popBoxInner">

                    <div className="popBoxHeader" id="dvSetDocumentTitle">
                        <h5 style={{ fontSize: 18, color: 'black' }}>
                            <span>Add logo in meeting {}</span>
                        </h5>
                    </div>

                    <div className="popBoxBody">
                        <table className="tableNoBorder" style={{ "width": "100%" }}>
                            <tbody>
                                <tr>
                                    <td style={{ "width": "30%" }}>
                                        <label>
                                            <span>Upload File:</span>
                                        </label>
                                    </td>

                                    <td style={{ "width": "70%" }}>
                                        <div className="cstomFile">
                                            <form id="filecatcher1">

                                                {/* <label for="addfile-input" className="custom-file-upload fileBtn">
                                                    <span>Click to Upload File</span>
                                                </label> */}

                                                <input id="addfile-input" names="files[]" type="file" style={{ display: '' }}></input>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>

                                    <td>
                                        <div className="file-list-display" id="file-list-display1"></div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div className="popBoxFooter">
                        <span id="spnAddDocumentBut">
                            <button className="cancelButton" onClick={this.props.closeUploadLogo}>
                                <span>Close</span>
                            </button>

                            <button onClick={this.uploadingLogo}>
                                <span>Add</span>
                            </button>

                        </span>
                    </div>


                </div>

                </div>

            </>
        )
    }

}

export default UploadLogo;

