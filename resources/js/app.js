import React from "react";
import ReactDOM from "react-dom";
import "./bootstrap";
import Index from "./components/Index";

// if ("serviceWorker" in navigator) {
//   window.addEventListener("load", function() {
//     navigator.serviceWorker
//     .register('wpServiceWorker.js')
//   });
//   }

  ReactDOM.render(<Index />, document.getElementById("root"));