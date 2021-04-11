import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import PlaceForm from "./PlaceForm";
import SlickImage from "./SlickImage"

declare global {
    interface Window {
        axios: any;
        Popper: any;
        _: any;
        $: any;
        jQuery: any;
    }
}


function App() {
    return (
        <Router>
            <Switch>
                <Route path="/place/new" component={PlaceForm} />
                <Route path="/places" component={SlickImage}/>
            </Switch>
        </Router>
    );
}

if (document.getElementById("react")) {
    ReactDOM.render(<App />, document.getElementById("react"));
}
