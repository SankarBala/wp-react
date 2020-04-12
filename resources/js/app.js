import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter as Router } from "react-router-dom";
import "./bootstrap";
import Index from "./components/Index";
import Store from "./redux_store/store";
import { Provider } from "react-redux";
import config from "./config";

// if ("serviceWorker" in navigator) {
//   window.addEventListener("load", function() {
//     navigator.serviceWorker
//     .register('wpServiceWorker.js')
//   });
//   }

ReactDOM.render(
  <Provider store={Store}>
    <Router basename={config.siteUrl}>
      <Index />
    </Router>
  </Provider>,
  document.getElementById("root")
);
