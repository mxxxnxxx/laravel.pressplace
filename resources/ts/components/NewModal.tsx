
import React from 'react';
import { makeStyles, createStyles } from "@material-ui/core/styles"

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
    
    <div className={styleModal.background}>
      <div className="content">
        <p>投稿完了</p>
        {/* <button onClick={topページに移動}></button> */}
        {/* <button onClick={modalOn(false)}>更に投稿 </button> */}
      </div>
    </div>
    
  )
  }else {
    return null;
  }
}

export default NewModal;