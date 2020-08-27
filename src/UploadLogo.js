import React from 'react';
import qs from 'qs'
import axios from 'axios';


class UploadLogo extends React.Component {

    constructor(props) {
        super(props)
        this.state = {


        }
    }





    componentDidMount() {

    }

    render() {


        return (
            <>

                <div className="popBoxInner">

                    <div className="popBoxHeader" id="dvSetDocumentTitle">
                        <h5>
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
                                                <label for="addfile-input" className="custom-file-upload fileBtn">
                                                    <span>Click to Upload File</span>
                                                </label>

                                                <input id="addfile-input" names="files[]" type="file" style={{display: 'none'}}></input>
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

                            <button>
                                <span>Add</span>
                            </button>

                        </span>
                    </div>


                </div>

            </>
        )
    }

}

export default UploadLogo;

