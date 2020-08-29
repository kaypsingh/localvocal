import React from 'react';
import qs from 'qs'
import axios from 'axios';


class UploadDocument extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            selectedFile:''

        }
    }

    handleInputChange = (event) => {
        console.log(event.target.files[0])
        this.setState({
            selectedFile: event.target.files[0],
          })
    }


   

    uploadingDocument = () => {


        var formData = new FormData();
        formData.append("roomname", 'hanumangarh');
        formData.append("authkey", 'M2atKiuCGKOo9Mj3');
        formData.append('image[]', this.state.selectedFile); 

     
        axios.post('https://api.videomeet.in/v2/conference.php/fileupload',  formData , {

           
           'content-type': 'multipart/form-data',
            "Access-Control-Allow-Origin": "*"
           
          }
        
          )
            .then((response) => {
        
              console.log(response)

              alert(response.data.msg)

              if(response.data.status === 1){

                this.props.closeUploadDoc()

              this.props.fetchDocumentResult()
              }

              
            
        
            },
              (error) => {
                console.log(error)
              }
            )
        
        
        
        
    }




    render() {


        return (
            <>

                <div className="popBoxInner">

                    <div className="popBoxHeader" id="dvSetDocumentTitle">
                        <h5 style={{fontSize: 18, color:'black'}}>
                            <span>Add document(s) in meeting {this.props.panelActionRoomname}</span>
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
                                                <label for="addfile-input" className="custom-file-upload fileBtn" onChange={this.handleInputChange}>
                                                    <span>Click to Upload File</span>
                                                </label>

                                             
                                             
                                                <input id="addfile-input"  type="file" style={{display: '' }} onChange={this.handleInputChange}></input>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>

                                    <td>
                                        <div className="file-list-display" id="file-list-display1">
                                            {/* <p>{this.state.selectedFile.name}</p> */}
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div className="popBoxFooter">
                        <span id="spnAddDocumentBut">
                            <button className="cancelButton" onClick={this.props.closeUploadDoc}>
                                <span>Close</span>
                            </button>

                            <button onClick={()=>{this.uploadingDocument()}}>
                                <span>Add</span>
                            </button>

                        </span>
                    </div>


                </div>

            </>
        )
    }

}

export default UploadDocument;


