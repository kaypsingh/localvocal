import React from 'react';
import qs from 'qs'
import axios from 'axios';


class DocumentList extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            documentMessage: ''

        }
    }

  
  

   
    fetchDocumentResult = () => {
        axios.post('https://api.videomeet.in/v2/conference.php/filelist', qs.stringify({

            authkey: 'M2atKiuCGKOo9Mj3',
            roomname: this.props.panelActionRoomname,
            ownername: this.props.panelUsername

        }), {
            'Content-Type': 'application/x-www-form-urlencoded',
            "Access-Control-Allow-Origin": "*",
        }

        )
            .then((response) => {

                console.log(response)
            
                // alert(response.data.msg)

                // this.setState({documentMessage: response.data.msg})


            },
                (error) => {
                    console.log(error)
                }
            )

    }

 

    componentDidMount() {
       this.fetchDocumentResult()
    }

    render() {


        return (
            <>
              <div id="dvListOfDocuments" className="popBox" style={{display: 'block' , zIndex: 999}}>

                  <div className="popBoxInner">

                      <div className="popBoxHeader" id="dvListOfDocumentsTitle">
                          <h5>
                              <span>List of Documents in {this.props.panelActionRoomname}</span>
                          </h5>

                          <span className="linkAddDocument">
                              <span>Upload {" "}</span>
                         

                       
                              <span onClick={() => {this.props.closeListofDocuments(); this.props.uploadDoc()}} style={{color: '#3572b0'}}>Document {" | "}</span>
                        

                        
                              <span onClick={this.props.uploadLogo} style={{color: '#3572b0'}}>Logo {" | "}</span>
                          

                              <span onClick={this.props.uploadBackground} style={{color: '#3572b0'}}>Background</span>
                         

                          </span>

                      </div>
                
                      <div className="popBoxBody" id="dvListOfDocumentsTable" style={{overflowY: 'auto'}}>
                          <table className="tableBox" id="tblListOfDocuments" style={{"width" : "100%"}}>
                              <tbody>
                                  <tr>
                                      <th style={{"width":"35%"}}>
                                          <span>File Name</span>
                                      </th>

                                      <th style={{"width":"15%"}}>
                                          <span>File Size</span>
                                      </th>

                                      <th style={{"width":"20%"}}>
                                          <span>Date</span>
                                      </th>

                                      <th style={{"width":"18%" , textAlign: 'center'}}>
                                          <span>Action</span>
                                      </th>
                                  </tr>

                                    {

                                        <tr>
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
                             <button className="cancelButton" onClick={() => {this.props.closeListofDocuments()}} >
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

