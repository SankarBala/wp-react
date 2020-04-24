import React, { Component, Fragment } from "react";
import { NavLink } from "react-router-dom";
import { restUrl } from "./../../config";
import axios from "axios";

class HeaderTop extends Component {
  constructor(props) {
    super(props);
    this.state = {
      menus: ""
    };
  }

  componentDidMount() {
    axios.get(restUrl + "menus/topmenu/").then(data => {
      this.setState({
        menus: data.data.items
      });
    });
  }

  createMarkup(html) {
    return { __html: html };
  }

  menuMaker(menu) {
    if (menu.object) {
      return (
        <li key={menu.ID}>
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

  render() {
    return (
      <React.Fragment>
        <div className="row headerTop">
          <div className="col-md-12">
            <ul className="text-center text-md-right">
              {this.state.menus[0] ? (
                this.state.menus.map(menu => this.menuMaker(menu))
              ) : (
                <div
                  dangerouslySetInnerHTML={this.createMarkup(
                    "<li><a href=''>Fetching data . . . .</a></li>"
                  )}
                />
              )}
            </ul>
          </div>
        </div>
      </React.Fragment>
    );
  }
}

export default HeaderTop;
