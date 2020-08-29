import React from 'react';
import qs from 'qs'
import axios from 'axios';


class UploadBackground extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            selectedFileImage:''

        }
    }

    handleInputChange = (event) => {
        console.log(event.target.files[0])
        this.setState({
            selectedFileImage: event.target.files[0],
          })
    }


    uploadingBack = () => {


        // if(document.getElementById('addfile-input-image').files.length==0) {
        //     alert("Please upload background image !");
        //     return false;
        // }
        
        // var filename = document.getElementById('addfile-input-image').files[0].name;
        // var filesize = document.getElementById('addfile-input-image').files[0].size;
        
        // var fileExt = filename.substring(filename.lastIndexOf(".")+1,filename.length);
        // fileExt = fileExt.toLowerCase();
        
        // if(fileExt!="jpg" && fileExt!="jpeg" && fileExt!="png" && fileExt!="gif") {
        //     alert("Only jpg, jpeg, png, gif file extensions are allowed !");
        //     return false;
        // }
        
        // if((filesize/1024) > 1536) {
        //     alert("Background image not more than 1.5 MB size !");
        //     return false;
        // }
        
        var formData = new FormData();
        formData.append("roomname", 'hanumangarh');
        formData.append("username", 'kpkpkp');
        formData.append("image", this.state.selectedFileImage);





        axios.post('https://bridge01.videomeet.in/fileupload1.php',  formData , {

           
            'content-type': 'multipart/form-data',
             "Access-Control-Allow-Origin": "*"
            
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

    }

    render() {


        return (
            <>

                <div className="popBoxInner">

                    <div className="popBoxHeader" id="dvBackgroundImageTitle">
                        <h5 style={{ fontSize: 18, color: 'black' }}>
                            <span>Add background image in meeting {}</span>
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

                                                <input id="addfile-input" names="files[]" type="file" style={{ display: 'none' }}></input>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>

                                    <td>
                                        <div className="file-list-display" id="file-list-display-image"></div>
                                    </td>


                                </tr>

                                <tr>
                                    <td colSpan="2" >
                                        <div>
                                            {/* <img src={} style={{"width":"100%",height:200,display: 'block'}} id="imgBackgroundImage"/> */}
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div className="popBoxFooter">
                        <span id="spnBackgroundImageBut">
                            <button className="cancelButton" onClick={this.props.closeUploadBackground}>
                                <span>Close</span>
                            </button>

                            <button id="butBGAdd" onClick={this.uploadingBack}>
                                <span>Add</span>
                            </button>

                            <button id="butBGUpdate">
                                <span>Update</span>
                            </button>

                            <button id="butBGDelete">
                                <span>Delete</span>
                            </button>

                        </span>
                    </div>


                </div>

            </>
        )
    }

}

export default UploadBackground;

