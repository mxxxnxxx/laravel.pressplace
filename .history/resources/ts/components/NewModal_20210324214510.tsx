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
  
          {/* <button onClick=>topページに移動</button> */}
        <Button autoFocus onClick={modalOff} color="primary">更に投稿 </Button>
        </DialogActions>
      </Dialog>

    </div>
  );

}

export default NewModal;