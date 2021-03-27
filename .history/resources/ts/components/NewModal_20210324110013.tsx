
import React from 'react';
import { makeStyles, createStyles } from "@material-ui/core/styles"
import useMediaQuery from '@material-ui/core/useMediaQuery';
import { useTheme } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import DialogActions from '@material-ui/core/DialogActions';
import DialogContent from '@material-ui/core/DialogContent';
import DialogContentText from '@material-ui/core/DialogContentText';
import DialogTitle from '@material-ui/core/DialogTitle';

interface modalProps{
  show: boolean,
  modalOff: () => void
}

const NewModal: React.FC<modalProps> = ({ show, modalOff }) => {

  const useStyles = makeStyles(() =>
    createStyles({
      "background": {
        top: 0,
        left: 0,
        width: 100,
        height: 100,
        background: "black",
      }
    }))
  const styleModal = useStyles();
  const theme = useTheme();
  const fullScreen = useMediaQuery(theme.breakpoints.down('sm'));
  
    if (show) {
    
      return (
            <div className={styleModal.background}>
      
              <div className="content">
        
                <p>投稿完了</p>
                {/* <button onClick={topページに移動}></button> */}
                <button onClick={modalOff}>更に投稿 </button>
      
              </div>
        
            </div>
        
  
      )
    } else {
      return null;
    }
  
}

export default NewModal;