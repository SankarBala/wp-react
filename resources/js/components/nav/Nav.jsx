import React, { Component, Fragment } from "react";
import { BrowserRouter as Router, Link, NavLink } from "react-router-dom";
import config from './../../config';
import "./Nav.scss";

class Nav extends Component {
  constructor(props) {
    super(props);
  }
  render() {
    return (
      <Fragment>
        <nav className="row">

        <div className="col-12">
          {config.jsonUrl}
        </div>
        </nav>
      </Fragment>
    );
  }
}
export default Nav;

const NavMenu = () => {
  return (
      sdfis
  );
}
