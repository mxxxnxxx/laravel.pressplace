import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter as Router, Route } from "react-router-dom";
import ImageUp from "./ImageUp";
import PostalCode from "./PostalCode";


function App() {
    return (
        <Router>
            <div>
                    <Route path="/place/new" component={PostalCode} />
                    <Route path="/place/new" component={ImageUp} />
            </div>
        </Router>
    );
}

if (document.getElementById("react")) {
    ReactDOM.render(<App />, document.getElementById("react"));
}
