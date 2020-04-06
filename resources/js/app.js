import React from "react";
import ReactDOM from "react-dom";
import "./bootstrap";
import Index from "./components/Index";

ReactDOM.render(<Index />, document.getElementById("root"));

const serviceWorker = './serviceWorker.js';
if ("serviceWorker" in navigator) {
    window.addEventListener("load", function() {
      navigator.serviceWorker
        .register(serviceWorker)
       
    });
  }