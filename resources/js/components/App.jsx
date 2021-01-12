import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import PostalCode from "./PostalCode";


function App() {
    return (
        <Router>
            <div>
                <Switch>
                    <Route path="/place/new" component={PostalCode} />
                </Switch>
            </div>
        </Router>
    );
}

if (document.getElementById("react")) {
    ReactDOM.render(<App />, document.getElementById("react"));
}
