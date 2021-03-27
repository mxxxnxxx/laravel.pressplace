import React from 'react';
import useMediaQuery from '@material-ui/core/useMediaQuery';
import { useTheme } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import DialogActions from '@material-ui/core/DialogActions';
import DialogContent from '@material-ui/core/DialogContent';
import DialogContentText from '@material-ui/core/DialogContentText';
import DialogTitle from '@material-ui/core/DialogTitle';

interface modalProps {
  open: boolean,
  modalOff: () => void
}

const NewModal: React.FC<modalProps> = ({ open, modalOff }) => {
  // const [open, setOpen] = React.useState(false);
  
  // if (show) {
  //   setOpen(true);
  // } else {
  //   setOpen(false);
  // }

  
  // const useStyles = makeStyles(() =>
  //   createStyles({
  //     "background": {
  //       top: 0,
  //       left: 0,
  //       width: 100,
  //       height: 100,
  //       background: "black",
  //     }
  //   }))
  // const styleModal = useStyles();
  const theme = useTheme();
  const fullScreen = useMediaQuery(theme.breakpoints.down('sm'));


  return (
    <div>

      <Dialog
        fullScreen={fullScreen}
        open={open}
        aria-labelledby="responsive-dialog-title"
      >
        <DialogTitle id="responsive-dialog-title">{"Use Google's location service?"}</DialogTitle>
        <DialogContent>
          <DialogContentText>
            投稿完了
          </DialogContentText>
        </DialogContent>
        <DialogActions>
          <Button autoFocus onClick={modalOff} color="primary">
            Disagree
          </Button>
          {/* <button onClick={topページに移動}></button> */}
          <button onClick={modalOff}>更に投稿 </button>
        </DialogActions>
      </Dialog>

    </div>
  );

}

export default NewModal;