import React from 'react';
import qs from 'qs'
import axios from 'axios';


class DocumentList extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
         

        }
    }

    deletingDocument = (d) => {
        console.log(d)

        axios.post('https://api.videomeet.in/v2/conference.php/deletefile', qs.stringify ({ 
        
            fileinfo: d
       
        })
        , {

           'Content-Type': 'application/x-www-form-urlencoded',
            "Access-Control-Allow-Origin": "*",
           
          }
        
          )
            .then((response) => {
        
              console.log(response)

              alert(response.data.msg)

              this.props.fetchDocumentResult()
            
        
            },
              (error) => {
                console.log(error)
              }
            )
        

    }




   

    componentDidMount() {
        this.props.fetchDocumentResult()
    }

    render() {

        var deleteIcon = "https://bridge01.videomeet.in/images/delete-room.png"


        return (
            <>
                <div id="dvListOfDocuments" className="popBox" style={{ display: 'block', zIndex: 999 }}>

                    <div className="popBoxInner">

                        <div className="popBoxHeader" id="dvListOfDocumentsTitle">
                            <h5 style={{fontSize: 18, color:'black', textAlign:'left'}}>
                                <span>List of Documents in {this.props.panelActionRoomname}</span>
                            </h5>

                            <span className="linkAddDocument">
                                <span>Upload {" "}</span>



                                <span onClick={() => { this.props.closeListofDocuments(); this.props.uploadDoc() }} style={{ color: '#3572b0' }}>Document {" | "}</span>



                                <span onClick={this.props.uploadLogo} style={{ color: '#3572b0' }}>Logo {" | "}</span>


                                <span onClick={this.props.uploadBackground} style={{ color: '#3572b0' }}>Background</span>


                            </span>

                        </div>

                        <div className="popBoxBody" id="dvListOfDocumentsTable" style={{ overflowY: 'auto' }}>
                            <table className="tableBox" id="tblListOfDocuments" style={{ "width": "100%" }}>
                                <tbody>
                                    <tr>
                                        <th style={{ "width": "35%" }}>
                                            <span>File Name</span>
                                        </th>

                                        <th style={{ "width": "15%" }}>
                                            <span>File Size</span>
                                        </th>

                                        <th style={{ "width": "20%" }}>
                                            <span>Date</span>
                                        </th>

                                        <th style={{ "width": "18%", textAlign: 'center' }}>
                                            <span>Action</span>
                                        </th>
                                    </tr>


                                    {

                                        this.props.documentMessage !== "No record found" ?

                                            this.props.documentData.map((res, k) => {



                                                // var chatId = res["link"].replace(/\n/g, '')

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


                                                        <td style={{ textAlign: 'center' }}>
                                                            <img src={deleteIcon} onClick={()=>{this.deletingDocument(res["link"].replace(/\n/g,''))}} title="Delete file" style={{ width: 12, cursor: 'pointer' }}></img>
                                                        </td>
                                                    </tr>

                                                )

                                            })
                                            :
                                            < tr >
                                                <td colSpan="4">
                                                    <span>Documents not available</span>
                                                </td>
                                            </tr>


                                    }
                                </tbody>
                            </table>
                        </div>


                        <div className="popBoxFooter">
                            <span id="spnHideDocuments">
                                <button className="cancelButton" onClick={() => { this.props.closeListofDocuments();this.props.panelRedirect() }} >
                                    <span>Close</span>
                                </button>
                            </span>

                            <span id="spnShowImgLogo"></span>
                        </div>
                    </div>

                </div>

            </>
        )
    }

}

export default DocumentList;

