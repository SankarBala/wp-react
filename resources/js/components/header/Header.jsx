import React, { Component, Fragment } from "react";
import HeaderTop from "./HeaderTop";
import "./Header.scss";

class Header extends Component {
  render() {
    return (
      <Fragment>
        <HeaderTop />
        <header className="row">
          <div className="col-md-5 text-center text-md-left display-4 text-info pb-4 pl-4">
            <b>w3learnings.com</b>
          </div>
          <div className="col-md-7 d-none d-md-block">
            <div className="col-8 search-box pt-4 float-right">
              <div className="input-group align-middle">
                <input
                  type="search"
                  className="form-control"
                  placeholder="What are you looking?"
                />
                <div className="input-group-append">
                  <div className="input-group-text py-0 search-btn">Search</div>
                </div>
              </div>
            </div>
          </div>
        </header>
      </Fragment>
    );
  }
}

export default Header;
