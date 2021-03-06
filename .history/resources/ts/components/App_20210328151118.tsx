import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter as Router, Route } from "react-router-dom";
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
            <div>
                <Route path="/place/new" component={PlaceForm} />
                <Route path="/places" component={SlickImage}/>
            </div>
        </Router>
    );
}

if (document.getElementById("react")) {
    ReactDOM.render(<App />, document.getElementById("react"));
}
