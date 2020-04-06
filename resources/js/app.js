import React from "react";
import ReactDOM from "react-dom";
import "./bootstrap";
import Index from "./components/Index";
const serviceWorker = './serviceWorker.js';

ReactDOM.render(<Index />, document.getElementById("root"));

if ("serviceWorker" in navigator) {
    window.addEventListener("load", function() {
      navigator.serviceWorker
        .register(serviceWorker)
       
    });
  }