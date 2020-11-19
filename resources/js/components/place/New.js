import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class New extends Component {
  render() {
    return (
      <div>
        <p>タスク</p>
      </div>
    )
  }
}

if (document.getElementById("postal_code")) {
    ReactDOM.render(<New />, document.getElementById("postal_code"));
}