
import React from 'react';
import Button from '@material-ui/core/Button';
import { makeStyles, createStyles } from "@material-ui/core/styles"
import { MuiThemeProvider } from '@material-ui/core/styles';  // テーマを実際に利用する
import { Modal } from '@material-ui/core';

interface NewModal {
  show: boolean,
  // modalOn:()=> void,
}

const NewModal: React.FC<NewModal> = ({ show }) => {

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
  if (show) {
    
  return (
    <MuiThemeProvider>
    <div className={styleModal.background}>
      <div className="content">
        <p>投稿完了</p>
        {/* <button onClick={topページに移動}></button> */}
        {/* <button onClick={modalOn(false)}>更に投稿 </button> */}
      </div>
      </div>
    </MuiThemeProvider>
  
  )
  }else {
    return null;
  }
}

export default NewModal;