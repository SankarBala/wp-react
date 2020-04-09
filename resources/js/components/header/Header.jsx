import React, { Component, Fragment } from "react";
import HeaderTop from "./HeaderTop";
import "./Header.scss";

class Header extends Component {
  render() {
    return (
      <Fragment>
        <HeaderTop />
        <header className="row">
          <div className="col-4 text-warning pt-4"><h1>w3learnings.com</h1></div>
          <div className="col-8">sds</div>
        </header>
      </Fragment>
    );
  }
}

export default Header;
