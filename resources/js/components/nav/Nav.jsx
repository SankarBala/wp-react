import React, { Component } from "react";
import { restUrl } from "./../../config";
import { NavLink } from "react-router-dom";
import $ from "jquery";
import axios from "axios/dist/axios";
import { FaBars, FaSearch } from "react-icons/fa";
import "./Nav.scss";

class Nav extends Component {
  constructor(props) {
    super(props);
    this.state = {
      menus: []
    };

    this.createMarkup = this.createMarkup.bind();
    this.menuMaker = this.menuMaker.bind();
  }

  componentDidMount() {
    $("#menu-toggler").click(function() {
      $("#menu")
        .toggle()
        .removeClass("d-none");
    });
    $("header, figure, footer, .search-box").click(function() {
      $("#menu").addClass("d-none d-md-block");
    });

    axios.get(restUrl + "locations/" + "navmenu").then(menus => {
      this.setState({
        menus: menus.data.items
      });
    });
  }

  createMarkup(html) {
    return { __html: html };
  }

  menuMaker(menu) {
    if (menu.object) {
      if (menu.child_items) {
        return (
          <li className="haschild">
            {menu.object == "custom" ? (
              <a target="_blank" href={menu.url}>
                {menu.title}
              </a>
            ) : (
              <NavLink
                to={{
                  pathname: menu.url.replace(new URL(menu.url).origin, ""),
                  object: menu.object,
                  object_id: menu.object_id
                }}
              >
                {menu.title}
              </NavLink>
            )}

            <ul>
              {menu.child_items.map(submenu =>
                submenu.child_items ? (
                  <li className="haschild">
                    {submenu.object == "custom" ? (
                      <a target="_blank" href={submenu.url}>
                        {submenu.title}
                      </a>
                    ) : (
                      <NavLink
                        to={{
                          pathname: submenu.url.replace(
                            new URL(submenu.url).origin,
                            ""
                          ),
                          object: submenu.object,
                          object_id: submenu.object_id
                        }}
                      >
                        {submenu.title}
                      </NavLink>
                    )}
                    <ul>
                      {submenu.child_items.map(submenu2 => (
                        <li>
                          {submenu2.object == "custom" ? (
                            <a target="_blank" href={submenu2.url}>
                              {submenu2.title}
                            </a>
                          ) : (
                            <NavLink
                              to={{
                                pathname: submenu2.url.replace(
                                  new URL(submenu2.url).origin,
                                  ""
                                ),
                                object: submenu2.object,
                                object_id: submenu2.object_id
                              }}
                            >
                              {submenu2.title}
                            </NavLink>
                          )}
                        </li>
                      ))}
                    </ul>
                  </li>
                ) : (
                  <li>
                    {submenu.object == "custom" ? (
                      <a target="_blank" href={submenu.url}>
                        {submenu.title}
                      </a>
                    ) : (
                      <NavLink
                        to={{
                          pathname: submenu.url.replace(
                            new URL(submenu.url).origin,
                            ""
                          ),
                          object: submenu.object,
                          object_id: submenu.object_id
                        }}
                      >
                        {submenu.title}
                      </NavLink>
                    )}
                  </li>
                )
              )}
            </ul>
          </li>
        );
      } else {
        return (
          <li>
            {menu.object == "custom" ? (
              <a target="_blank" href={menu.url}>
                {menu.title}
              </a>
            ) : (
              <NavLink
                to={{
                  pathname: menu.url.replace(new URL(menu.url).origin, ""),
                  object: menu.object,
                  object_id: menu.object_id
                }}
              >
                {menu.title}
              </NavLink>
            )}
          </li>
        );
      }
    }
  }

  render() {
    return (
      <React.Fragment>
        <nav className="">
          <div className="row d-md-none sm-nav bg-danger">
            <div className="menu-bar col-2 text-center">
              <h4>
                <FaBars id="menu-toggler" />
              </h4>
            </div>
            <div className="col-10 search-box">
              <div className="input-group">
                <input
                  type="search"
                  className="form-control"
                  placeholder="What you need?"
                />
                <div className="input-group-append">
                  <div className="input-group-text">
                    <button>
                      <FaSearch />
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="row">
            <ul id="menu">
              {this.state.menus[0] ? (
                this.state.menus.map(menu => this.menuMaker(menu))
              ) : (
                <div
                  dangerouslySetInnerHTML={this.createMarkup(
                    "<li><a href=''>Navbar is initialising . . . .</a></li>"
                  )}
                />
              )}
            </ul>
          </div>
        </nav>
      </React.Fragment>
    );
  }
}

export default Nav;
